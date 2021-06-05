<?php

namespace App\Models\DataConstants;

abstract class FuelType {
    const DIESEL = 'Diesel';
    const PETROL = 'Petrol';
    const HYBRID = 'Hybrid';

    public static function getSelectOptions() {
        return [
            'DIESEL' => 'Diesel',
            'PETROL' => 'Petrol',
            'HYBRID' => 'Hybrid',
        ];
    }
}
