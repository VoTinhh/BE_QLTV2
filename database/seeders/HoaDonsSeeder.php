<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoaDonsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hoa_dons')->insert(
            array_map(function ($i) {
                return [
                    'trang_thai' => rand(0, 1),
                    'id_thanh_toan' => rand(1, 10),
                    'id_sach' => rand(1, 10),
                    'id_nguoi_dung' => rand(1, 10),
                    'id_phieu_muon' => rand(1, 10),
                ];
            }, range(1, 10))
        );
    }
}
