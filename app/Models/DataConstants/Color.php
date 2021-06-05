<?php

namespace App\Models\DataConstants;

abstract class Color {
    const BLACK = 'Black';
    const RED = 'Red';
    const SILVER = 'Silver';
    const WHITE = 'White';

    public static function getSelectOptions() {
        return [
            'BLACK' => 'Black',
            'RED' => 'Red',
            'SILVER' => 'Silver',
            'WHITE' => 'White',
        ];
    }
}
