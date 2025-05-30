<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhibitionImage extends Model
{
    use HasFactory;

    protected $fillable = ['exhibition_id', 'image_path'];

    public function exhibition()
    {
        $this->belongsTo(Exhibition::class);
    }
}
