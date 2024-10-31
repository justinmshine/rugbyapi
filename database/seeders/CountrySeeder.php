<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeder that inserts the countries.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'Argentina',
                'capital_city' => 'Buenos Aires',
                'iso_code' => 'ARG',
                'shirt_id' => 1, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'name' => 'Australia',
                'capital_city' => 'Canberra',
                'iso_code' => 'AUS',
                'shirt_id' => 2, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'name' => 'England',
                'capital_city' => 'London',
                'iso_code' => 'GBR',
                'shirt_id' => 3, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'name' => 'Fiji',
                'capital_city' => 'Suva',
                'iso_code' => 'FJI',
                'shirt_id' => 4, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'France',
                'capital_city' => 'Paris',
                'iso_code' => 'FRA',
                'shirt_id' => 5, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Italy',
                'capital_city' => 'Rome',
                'iso_code' => 'ITA',
                'shirt_id' => 6, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Ireland',
                'capital_city' => 'Dublin',
                'iso_code' => 'IRL',
                'shirt_id' => 7, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Japan',
                'capital_city' => 'Tokyo',
                'iso_code' => 'JPN',
                'shirt_id' => 8, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'New Zealand',
                'capital_city' => 'Auckland',
                'iso_code' => 'NZL',
                'shirt_id' => 9, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Scotland',
                'capital_city' => 'Edinburgh',
                'iso_code' => 'GBR',
                'shirt_id' => 10, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'South Africa',
                'capital_city' => 'Pretoria',
                'iso_code' => 'ZAF',
                'shirt_id' => 11, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'Wales',
                'capital_city' => 'Cardiff',
                'iso_code' => 'GBR',
                'shirt_id' => 12, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        DB::table('countries')->insert($countries);
    }
}
