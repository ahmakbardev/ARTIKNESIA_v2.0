<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NegotiationBatch extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function negotiations(): HasMany
    {
        return $this->hasMany(Negotiation::class)->orderBy('price', 'desc');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Karya::class, 'product_id', 'id');
    }
}
