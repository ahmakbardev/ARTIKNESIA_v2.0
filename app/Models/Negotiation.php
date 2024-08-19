<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Negotiation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function batch(): BelongsTo
    {
        return $this->belongsTo(NegotiationBatch::class, 'negotiation_batch_id', 'id');
    }
}
