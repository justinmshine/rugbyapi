<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeder that inserts the images.
     */
    public function run(): void
    {
        $images = [
            [
                'title' => 'Ireland',
                'location' => '/images/ireland.jpg',
                'shirt_id' => 6, 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'title' => 'Japan',
                'shirt_id' => 7, 
                'location' => '/images/japan.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
        ];

        DB::table('images')->insert($images);
    }
}