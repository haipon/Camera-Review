<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accessory;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remember to add 'image_name' to the $fillable array in Accessory.php
        
        Accessory::create([
            'name' => 'Peak Design Slide Lite',
            'manufacturer' => 'Peak Design',
            'description' => 'A versatile, lightweight camera strap that quickly adjusts and secures with anchor links, suitable for mirrorless and smaller DSLRs.',
            'type' => 'Strap',
            'compatibility' => 'Universal (Mirrorless, Small DSLR)',
            'image_name' => 'peak_design_strap.jpg', // Suggested Image Name
        ]);
        
        Accessory::create([
            'name' => 'SanDisk Extreme Pro 128GB',
            'manufacturer' => 'SanDisk',
            'description' => 'A high-speed 128GB SDXC memory card designed for capturing uninterrupted 4K video and fast continuous burst photography.',
            'type' => 'Memory Card',
            'compatibility' => 'SDXC compatible cameras (e.g., Nikon Z, Sony Alpha)',
            'image_name' => 'sandisk_sdcard.jpg', // Suggested Image Name
        ]);
        
        Accessory::create([
            'name' => 'Rode VideoMic Go II',
            'manufacturer' => 'Røde',
            'description' => 'A compact, lightweight shotgun microphone that improves audio quality over built-in camera mics, connecting via a standard 3.5mm jack.',
            'type' => 'Microphone',
            'compatibility' => 'Universal (any camera with 3.5mm mic input)',
            'image_name' => 'rode_videomic.jpg', // Suggested Image Name
        ]);
        
        // Ensure your AccessoryFactory also handles the 'image_name' field
        Accessory::factory()->count(3)->create();
    }
}