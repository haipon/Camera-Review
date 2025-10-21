<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'body'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // A review belongs to a product (morph-to)
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;
}
