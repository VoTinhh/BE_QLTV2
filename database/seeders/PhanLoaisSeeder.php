<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanLoaisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('phan_loais')->insert(
            array_map(function ($i) {
                return [
                    'ten_phan_loai' => 'Phan loai ' . $i,
                ];
            }, range(1, 10))
        );
    }
}
