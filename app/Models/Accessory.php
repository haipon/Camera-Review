<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = ['name', 'manufacturer', 'description', 'type', 'compatibility'];

    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    /** @use HasFactory<\Database\Factories\AccessoryFactory> */
    use HasFactory;
}
