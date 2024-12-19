<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubKategori extends Model
{
    use HasFactory;

    protected $table = 'subkategoris';

    public function jenisKarya(): BelongsTo
    {
        return $this->belongsTo(JenisKarya::class, 'jenis_karya_id', 'id');
    }
}
