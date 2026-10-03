<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'platform',
        'username',
        'url',
        'label',
        'icon',
        'is_visible',
        'is_verified',
        'sort_order',
        'verified_at',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'is_verified' => 'boolean',
        'verified_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
