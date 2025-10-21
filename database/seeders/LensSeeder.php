<?php

namespace Database\Seeders;

use App\Models\Lens;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Remember to:
        // 1. Add 'image_name' to the $fillable array in App\Models\Lens.php.
        // 2. Ensure your database table has an 'image_name' column (via migration).
        
        Lens::create([
            'model' => 'RF 70-200mm',
            'manufacturer' => 'Canon',
            'description' => 'A compact and high-performance telephoto zoom lens with a fast, constant maximum aperture, ideal for sports, wildlife, and portrait photography.',
            'focal_length' => '70-200mm',
            'aperture' => 'f/2.8',
            'image_name' => 'canon_rf_70-200.jpg', // Suggested Image Name
        ]);
        
        Lens::create([
            'model' => 'FE 35mm',
            'manufacturer' => 'Sony',
            'description' => 'A sharp, versatile wide-angle prime lens perfect for street photography, environmental portraits, and documentary work, offering excellent low-light performance.',
            'focal_length' => '35mm',
            'aperture' => 'f/1.4',
            'image_name' => 'sony_fe_35mm.jpg', // Suggested Image Name
        ]);
        
        Lens::create([
            'model' => 'NIKKOR Z 14-30mm',
            'manufacturer' => 'Nikon',
            'description' => 'An ultra-wide zoom lens designed for landscape and architecture, known for its superb edge-to-edge sharpness and compact design that accepts screw-on filters.',
            'focal_length' => '14-30mm',
            'aperture' => 'f/4',
            'image_name' => 'nikon_z_14-30mm.jpg', // Suggested Image Name
        ]);
        
        Lens::create([
            'model' => 'XF 56mm',
            'manufacturer' => 'Fujifilm',
            'description' => 'A classic portrait lens that delivers beautiful bokeh and incredibly sharp images, making it a favorite for professional portrait photographers using the X-Mount system.',
            'focal_length' => '56mm',
            'aperture' => 'f/1.2',
            'image_name' => 'fuji_xf_56mm.jpg', // Suggested Image Name
        ]);
        
        Lens::create([
            'model' => 'Sigma 85mm DG DN',
            'manufacturer' => 'Sigma',
            'description' => 'A premium mid-telephoto prime lens offering exceptional resolution and clarity, optimized for mirrorless cameras, and featuring a fast and quiet autofocus motor.',
            'focal_length' => '85mm',
            'aperture' => 'f/1.4',
            'image_name' => 'sigma_85mm_dn.jpg', // Suggested Image Name
        ]);
        
        // Ensure your LensFactory is also updated to provide a default 'image_name'
        Lens::factory()->count(5)->create();
    }
}