<?php

namespace App\Models\DataConstants;

abstract class CustomerType {
    const B2C = 'Individual';
    const B2B = 'Business';

    public static function getSelectOptions() {
        return [
            'B2C' => 'Individual',
            'B2B' => 'Business',
        ];
    }
}
