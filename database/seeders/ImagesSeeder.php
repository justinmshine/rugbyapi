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
                'title' => 'Argentina',
                'location' => '/public/images/argentina.jpg',
                'shirt_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Australia',
                'location' => '/public/images/australia.jpg',
                'shirt_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'England',
                'location' => '/public/images/england.jpg',
                'shirt_id' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Fiji',
                'location' => '/public/images/fiji.jpg',
                'shirt_id' => 4,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'France',
                'location' => '/public/images/france.jpg',
                'shirt_id' => 5,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Italy',
                'location' => '/public/images/italy.jpg',
                'shirt_id' => 6,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Ireland',
                'location' => '/public/images/ireland.jpg',
                'shirt_id' => 7,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Japan',
                'shirt_id' => 8,
                'location' => 'public/images/japan.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'New Zealand',
                'shirt_id' => 9,
                'location' => 'public/images/newzealand.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'title' => 'Scotland',
                'shirt_id' => 10,
                'location' => 'public/images/scotland.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'South Africa',
                'shirt_id' => 11,
                'location' => 'public/images/southafrica.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'Wales',
                'shirt_id' => 12,
                'location' => 'public/images/wales.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        DB::table('images')->insert($images);
    }
}