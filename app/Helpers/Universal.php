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
}
