<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SachesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('saches')->truncate();
        DB::table('saches')->insert(
            array_map(function ($i) {
                return [
                    'ten_sach' => 'Sach ' . $i,
                    'so_luong' => rand(1, 50),
                    'trang_thai' => 'available',
                    'hinh_anh' => 'image_' . $i . '.jpg',
                    'gia_tien' => rand(100, 500),
                    'mo_ta' => 'Mo ta sach ' . $i,
                    'id_tac_gia' => $i,
                    'id_nha_xuat_ban' => $i,
                    'id_vi_tri' => $i,
                ];
            }, range(1, 10))
        );
    }
}
