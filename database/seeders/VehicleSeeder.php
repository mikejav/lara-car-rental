<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
            'manufacturer' => 'Audi',
            'model' => 'A3',
            'segment' => 'C',
            'description' => '',
            'production_date' => '2008-05-01',
            'color' => 'BLACK',
            'first_registration_date' => '2008-07-01',
            'doors_count' => '3',
            'engine_displacement' => '1900',
            'fuel_type' => 'DIESEL',
        ]);

        DB::table('vehicles')->insert([
            'manufacturer' => 'Audi',
            'model' => 'A4',
            'segment' => 'D',
            'description' => '',
            'production_date' => '2012-04-01',
            'color' => 'BLACK',
            'first_registration_date' => '2021-05-01',
            'doors_count' => '5',
            'engine_displacement' => '3000',
            'fuel_type' => 'PETROL',
        ]);

        DB::table('vehicles')->insert([
            'manufacturer' => 'BMW',
            'model' => 'E46',
            'segment' => 'C',
            'description' => '',
            'production_date' => '2005-08-01',
            'color' => 'WHITE',
            'first_registration_date' => '2005-09-01',
            'doors_count' => '3',
            'engine_displacement' => '3000',
            'fuel_type' => 'PETROL',
        ]);

        DB::table('vehicles')->insert([
            'manufacturer' => 'Toyota',
            'model' => 'Yaris',
            'segment' => 'A',
            'description' => '',
            'production_date' => '2014-03-01',
            'color' => 'RED',
            'first_registration_date' => '2014-05-01',
            'doors_count' => '5',
            'engine_displacement' => '1400',
            'fuel_type' => 'PETROL',
        ]);

        DB::table('vehicles')->insert([
            'manufacturer' => 'Toyota',
            'model' => 'Yaris',
            'segment' => 'A',
            'description' => '',
            'production_date' => '2014-04-01',
            'color' => 'SILVER',
            'first_registration_date' => '2014-07-01',
            'doors_count' => '3',
            'engine_displacement' => '1400',
            'fuel_type' => 'PETROL',
        ]);

        DB::table('vehicles')->insert([
            'manufacturer' => 'Toyota',
            'model' => 'Aygo',
            'segment' => 'A',
            'description' => '',
            'production_date' => '2017-09-01',
            'color' => 'SILVER',
            'first_registration_date' => '2017-10-01',
            'doors_count' => '3',
            'engine_displacement' => '1000',
            'fuel_type' => 'PETROL',
        ]);
    }
}
