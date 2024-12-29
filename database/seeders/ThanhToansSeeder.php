<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThanhToansSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('thanh_toans')->insert(
            array_map(function ($i) {
                return [
                    'tien_phat' => rand(0, 100),
                    'tien_thue' => rand(10, 50),
                    'tong_tien' => rand(100, 500),
                    'trang_thai' => rand(0, 1),
                    'id_phieu_muon' => rand(1, 10),
                ];
            }, range(1, 10))
        );
    }
}
