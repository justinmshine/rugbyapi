<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScanSeeder extends Seeder
{
    /**
     * Run the database seeder that inserts the scan data.
     */
    public function run(): void
    {
        $scans = [
            [
                'bar_code' => '1519451213215941516',
                'qr_code' => '151912318546130206',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
            [
                'bar_code' => '978412032135312354',
                'qr_code' => '02192326596161644',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ], 
        ];

        DB::table('scan')->insert($scans);
    }
}

