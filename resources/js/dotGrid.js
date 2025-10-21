// resources/js/dotGrid.js (This holds the core logic)

import { gsap } from 'gsap';
import { InertiaPlugin } from 'gsap/InertiaPlugin';

gsap.registerPlugin(InertiaPlugin);

// --- Utility Functions ---

function throttle(func, limit) { /* ... (paste throttle function here) ... */ }
function hexToRgb(hex) { /* ... (paste hexToRgb function here) ... */ }

// --- Configuration (using default props) ---
const config = {
    dotSize: 18,
    gap: 36,
    baseColor: '#A6CFD555', // Subtle Cyan
    activeColor: '#A6CFD5', // Full Cyan
    proximity: 300,
    speedTrigger: 100,
    shockRadius: 250,
    shockStrength: 5,
    maxSpeed: 5000,
    resistance: 750,
    returnDuration: 1.5,
};

const pointer = { x: 0, y: 0, vx: 0, vy: 0, speed: 0, lastTime: 0, lastX: 0, lastY: 0 };
let dots = [];
let canvas, ctx, circlePath;
const baseRgb = hexToRgb(config.baseColor);
const activeRgb = hexToRgb(config.activeColor);

// 1. Build the Dot Grid Array
function buildGrid() {
    canvas = document.getElementById('dot-grid-canvas');
    if (!canvas) return;

    const { width, height } = canvas.getBoundingClientRect();
    const dpr = window.devicePixelRatio || 1;

    canvas.width = width * dpr;
    canvas.height = height * dpr;
    canvas.style.width = `${width}px`;
    canvas.style.height = `${height}px`;

    ctx = canvas.getContext('2d');
    if (ctx) ctx.scale(dpr, dpr);
    
    // Create the Path2D object once
    circlePath = new Path2D();
    circlePath.arc(0, 0, config.dotSize / 2, 0, Math.PI * 2);

    const cell = config.dotSize + config.gap;
    const cols = Math.floor((width + config.gap) / cell);
    const rows = Math.floor((height + config.gap) / cell);

    const gridW = cell * cols - config.gap;
    const gridH = cell * rows - config.gap;
    const startX = (width - gridW) / 2 + config.dotSize / 2;
    const startY = (height - gridH) / 2 + config.dotSize / 2;

    dots = [];
    for (let y = 0; y < rows; y++) {
        for (let x = 0; x < cols; x++) {
            dots.push({ 
                cx: startX + x * cell, 
                cy: startY + y * cell, 
                xOffset: 0, 
                yOffset: 0, 
                _inertiaApplied: false 
            });
        }
    }
}

// 2. The Animation Loop
function draw() {
    if (!ctx || !circlePath) return;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    const proxSq = config.proximity * config.proximity;

    for (const dot of dots) {
        const ox = dot.cx + dot.xOffset;
        const oy = dot.cy + dot.yOffset;
        const dx = dot.cx - pointer.x;
        const dy = dot.cy - pointer.y;
        const dsq = dx * dx + dy * dy;

        let style = config.baseColor;
        if (dsq <= proxSq) {
            const dist = Math.sqrt(dsq);
            const t = 1 - dist / config.proximity;
            const r = Math.round(baseRgb.r + (activeRgb.r - baseRgb.r) * t);
            const g = Math.round(baseRgb.g + (activeRgb.g - baseRgb.g) * t);
            const b = Math.round(baseRgb.b + (activeRgb.b - baseRgb.b) * t);
            style = `rgb(${r},${g},${b})`;
        }

        ctx.save();
        ctx.translate(ox, oy);
        ctx.fillStyle = style;
        ctx.fill(circlePath);
        ctx.restore();
    }

    requestAnimationFrame(draw);
}

// 3. Mouse Interaction Logic
const onMove = (e) => {
    const now = performance.now();
    const dt = pointer.lastTime ? now - pointer.lastTime : 16;
    const dx = e.clientX - pointer.lastX;
    const dy = e.clientY - pointer.lastY;
    
    // Velocity calculation (Vx/Vy) and speed capping
    let vx = (dx / dt) * 1000;
    let vy = (dy / dt) * 1000;
    let speed = Math.hypot(vx, vy);
    if (speed > config.maxSpeed) {
        const scale = config.maxSpeed / speed;
        vx *= scale;
        vy *= scale;
        speed = config.maxSpeed;
    }

    pointer.lastTime = now;
    pointer.lastX = e.clientX;
    pointer.lastY = e.clientY;
    pointer.vx = vx;
    pointer.vy = vy;
    pointer.speed = speed;

    const rect = canvas.getBoundingClientRect();
    pointer.x = e.clientX - rect.left;
    pointer.y = e.clientY - rect.top;

    // Apply GSAP Inertia on speed threshold
    for (const dot of dots) {
        const dist = Math.hypot(dot.cx - pointer.x, dot.cy - pointer.y);
        if (speed > config.speedTrigger && dist < config.proximity && !dot._inertiaApplied) {
            dot._inertiaApplied = true;
            gsap.killTweensOf(dot);
            
            const pushX = dot.cx - pointer.x + vx * 0.005;
            const pushY = dot.cy - pointer.y + vy * 0.005;
            
            gsap.to(dot, {
                inertia: { xOffset: pushX, yOffset: pushY, resistance: config.resistance },
                onComplete: () => {
                    gsap.to(dot, {
                        xOffset: 0,
                        yOffset: 0,
                        duration: config.returnDuration,
                        ease: 'elastic.out(1,0.75)'
                    });
                    dot._inertiaApplied = false;
                }
            });
        }
    }
};

const onClick = (e) => {
    const rect = canvas.getBoundingClientRect();
    const cx = e.clientX - rect.left;
    const cy = e.clientY - rect.top;

    for (const dot of dots) {
        const dist = Math.hypot(dot.cx - cx, dot.cy - cy);
        if (dist < config.shockRadius && !dot._inertiaApplied) {
            dot._inertiaApplied = true;
            gsap.killTweensOf(dot);
            
            const falloff = Math.max(0, 1 - dist / config.shockRadius);
            const pushX = (dot.cx - cx) * config.shockStrength * falloff;
            const pushY = (dot.cy - cy) * config.shockStrength * falloff;
            
            gsap.to(dot, {
                inertia: { xOffset: pushX, yOffset: pushY, resistance: config.resistance },
                onComplete: () => {
                    gsap.to(dot, {
                        xOffset: 0,
                        yOffset: 0,
                        duration: config.returnDuration,
                        ease: 'elastic.out(1,0.75)'
                    });
                    dot._inertiaApplied = false;
                }
            });
        }
    }
};


// 4. Initialization and Event Listeners
function initDotGrid() {
    buildGrid();
    draw();

    // Use ResizeObserver for responsive canvas sizing
    if ('ResizeObserver' in window) {
        new ResizeObserver(buildGrid).observe(canvas);
    } else {
        window.addEventListener('resize', buildGrid);
    }

    // Attach interaction events
    const throttledMove = throttle(onMove, 50);
    window.addEventListener('mousemove', throttledMove, { passive: true });
    window.addEventListener('click', onClick);
}

// Call init when the DOM is ready
document.addEventListener('DOMContentLoaded', initDotGrid);
window.addEventListener('load', initDotGrid); // Fallback for initial sizing issues