<?php

namespace App\Helpers;

class Universal
{
    public static function idr($number)
    {
        if ($number) {
            return 'Rp ' . number_format($number, 0, ',', '.');
        }
        return '';
    }

    public static function formatViewCount($number)
    {
        if ($number < 1000) {
            return $number;
        } elseif ($number < 1000000) {
            return round($number / 1000, 1) . 'k';
        } elseif ($number < 1000000000) {
            return round($number / 1000000, 1) . 'm';
        } else {
            return round($number / 1000000000, 1) . 'b';
        }
    }
}
