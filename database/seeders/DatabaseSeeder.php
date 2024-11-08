<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShirtsSeeder::class,
            CountrySeeder::class,
            DimensionsSeeder::class,
            ImagesSeeder::class,
            ReviewsSeeder::class,
            ScanSeeder::class,
            StockSeeder::class,
            UserSeeder::class,
        ]);
    }
}
