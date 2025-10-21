<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lens extends Model
{
    protected $fillable = ['model', 'manufacturer', 'description', 'focal_length', 'aperture'];

    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    /** @use HasFactory<\Database\Factories\LensFactory> */
    use HasFactory;
}
