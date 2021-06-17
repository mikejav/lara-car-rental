<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'email' => 'customer1@example.com',
            'first_name' => 'Edgar',
            'last_name' => 'V. Humphreys',
            'type' => 'B2C',
            'address1' => '4041 Simpson Square',
            'address2' => '',
            'city' => 'Duke',
            'postcode' => '73532',
        ]);

        DB::table('customers')->insert([
            'email' => 'customer2@example.com',
            'first_name' => 'Amanda',
            'last_name' => 'C. Moore',
            'type' => 'B2B',
            'address1' => '3795 Jarvisville Road',
            'address2' => '',
            'city' => 'Jersey City',
            'postcode' => '07307',
        ]);

        DB::table('customers')->insert([
            'email' => 'customer3@example.com',
            'first_name' => 'Lee',
            'last_name' => 'Hansley',
            'type' => 'B2C',
            'address1' => '1513 Conference Center Way',
            'address2' => '',
            'city' => 'Great Falls',
            'postcode' => '22066',
        ]);

        DB::table('customers')->insert([
            'email' => 'customer4@example.com',
            'first_name' => 'Robert',
            'last_name' => 'J. Hendricks',
            'type' => 'B2C',
            'address1' => '1601 Kerry Way',
            'address2' => '',
            'city' => 'Los Angeles',
            'postcode' => '90017',
        ]);

        DB::table('customers')->insert([
            'email' => 'customer5@example.com',
            'first_name' => 'Debra',
            'last_name' => 'C. Long',
            'type' => 'B2B',
            'address1' => '3157 Pike Street',
            'address2' => '',
            'city' => 'San Diego',
            'postcode' => '92126',
        ]);

    }
}
