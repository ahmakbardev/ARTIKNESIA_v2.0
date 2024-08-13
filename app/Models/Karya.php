<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
