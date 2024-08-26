<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Karya extends Model
{
    use HasFactory;

    protected $table = 'karyas';

    protected $casts = [
        'images' => 'array',
    ];

    public function seniman(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function batches(): HasMany
    {
        return $this->hasMany(NegotiationBatch::class, 'product_id', 'id');
    }
}
