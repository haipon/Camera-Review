<?php

namespace Database\Seeders;

use App\Models\Camera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remember to:
        // 1. Add 'image_name' to the $fillable array in App\Models\Camera.php.
        // 2. Ensure your database table has an 'image_name' column (via migration).
        
        Camera::create([
            'model' => 'A7 IV',
            'manufacturer' => 'Sony',
            'description' => 'A versatile full-frame mirrorless camera offering 33MP resolution, advanced real-time tracking autofocus, and 4K 60p video recording capabilities. It\'s ideal for hybrid shooters.',
            'image_name' => 'sony_a7iv.jpg', // Suggested Image Name
        ]);

        Camera::create([
            'model' => 'D850',
            'manufacturer' => 'Nikon',
            'description' => 'A professional-grade DSLR camera featuring a high-resolution 45.7MP sensor, excellent dynamic range, and a rugged build quality suitable for studio and landscape photography.',
            'image_name' => 'nikon_d850.jpg', // Suggested Image Name
        ]);

        Camera::create([
            'model' => 'EOS R6 II',
            'manufacturer' => 'Canon',
            'description' => 'An advanced mirrorless camera built around a 24.2MP full-frame sensor, excelling in speed, low-light performance, and sophisticated video features, including 6K RAW external recording.',
            'image_name' => 'canon_r6ii.jpg', // Suggested Image Name
        ]);

        Camera::create([
            'model' => 'X-T5',
            'manufacturer' => 'Fujifilm',
            'description' => 'A classic, retro-styled mirrorless camera boasting a 40.2MP X-Trans CMOS 5 HR sensor in a compact body. It\'s highly favored for its exceptional image quality and color science.',
            'image_name' => 'fuji_xt5.jpg', // Suggested Image Name
        ]);
        
        Camera::create([
            'model' => 'LUMIX GH6',
            'manufacturer' => 'Panasonic',
            'description' => 'A micro four-thirds flagship designed specifically for video production, offering 5.7K 30p internal recording, Apple ProRes support, and excellent in-body image stabilization.',
            'image_name' => 'lumix_gh6.jpg', // Suggested Image Name
        ]);
        
        // Ensure your CameraFactory is also updated to provide a default 'image_name' 
        // if you want the seeded data to display images too.
        Camera::factory()->count(5)->create();
    }
};