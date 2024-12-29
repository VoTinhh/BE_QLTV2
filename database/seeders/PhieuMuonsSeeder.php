<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PhieuMuonsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('phieu_muons')->insert(
            array_map(function ($i) {
                return [
                    'ngay_muon' => Carbon::now(),
                    'ngay_tra' => Carbon::now()->addDays(7),
                    'ngay_tra_thuc_te' => null,
                    'tien_phat' => 0,
                    'so_luong_sach' => 1,
                    'id_sach' => $i,
                    'id_thanh_toan' => null,
                    'id_nguoi_dung' => $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }, range(1, 10))
        );
    }
}
