<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Exhibition extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['start_date', 'end_date'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getFormattedDateRangeAttribute()
    {
        $startDate = Carbon::parse($this->start_date)->translatedFormat('d F Y');
        $endDate = Carbon::parse($this->end_date)->translatedFormat('d F Y');

        return $startDate . ' - ' . $endDate;
    }

    public function getFormattedPriceAttribute()
    {

        return ($this->price != 0) ? 'IDR ' . number_format($this->price, 0, ',', '.') : 'GRATIS';
    }
}
