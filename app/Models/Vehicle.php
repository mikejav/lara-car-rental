<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manufacturer',
        'model',
        'segment',
        'production_date',
        'first_registration_date',
        'color',
        'doors_count',
        'engine_displacement',
        'fuel_type',
    ];
}
