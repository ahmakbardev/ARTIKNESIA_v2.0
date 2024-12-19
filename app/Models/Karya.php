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
    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function seniman(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function batches(): HasMany
    {
        return $this->hasMany(NegotiationBatch::class, 'product_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(SubKategori::class, 'category_id', 'id');
    }
}
