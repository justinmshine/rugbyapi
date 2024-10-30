<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeder that inserts the reviews.
     */
    public function run(): void
    {
        $reviews = [
            [
                'rating' => 8,  
                'comment' => 'I love this shirt',
                'added_at' => date("Y-m-d H:i:s"),
                'reviewer_name' => 'Austin Ryan',
                'reviewer_email' => 'austin@ryan.net',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'rating' => 6,  
                'comment' => 'Could be better',
                'added_at' => date("Y-m-d H:i:s"),
                'reviewer_name' => 'Jimmy Chang',
                'reviewer_email' => 'jchang@yahoo.com',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),            
            ]              

        ];

        DB::table('reviews')->insert($reviews);
    }
}
