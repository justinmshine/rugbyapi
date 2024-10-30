<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimensionsSeeder extends Seeder
{
    /**
     * Run the database seeder that inserts the dimensions.
     */
    public function run(): void
    {
        $dimensions = [
            [
                'type' => 'SMALL',
                'waste' => '30',
                'length' => '26',
                'chest' => '38',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],  
            [
                'type' => 'MEDIUM',
                'waste' => '32',
                'length' => '28',
                'chest' => '40',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],  
            [
                'type' => 'LARGE',
                'waste' => '34',
                'length' => '30',
                'chest' => '42',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],  
            [
                'type' => 'XLARGE',
                'waste' => '36',
                'length' => '32',
                'chest' => '44',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        DB::table('dimensions')->insert($dimensions);
    }
}
