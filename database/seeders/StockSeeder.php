<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeder that inserts the stock data.
     */
    public function run(): void
    {
        $stock = [
            [
                'stock' => 15, 
                'shirt_id' => 1, 
                'size_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'stock' => 7, 
                'shirt_id' => 1, 
                'size_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'stock' => 12, 
                'shirt_id' => 1, 
                'size_id' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'stock' => 15, 
                'shirt_id' => 5, 
                'size_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'stock' => 11, 
                'shirt_id' => 5, 
                'size_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
        ];

        DB::table('size_stock')->insert($stock);
    }
}
