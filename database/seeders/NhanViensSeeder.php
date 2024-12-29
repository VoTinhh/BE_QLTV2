<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanViensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nhan_viens')->insert(
            array_map(function ($i) {
                return [
                    'ten_nhan_vien' => 'Nhan vien ' . $i,
                    'hinh_anh' => 'staff_' . $i . '.jpg',
                    'email' => 'staff' . $i . '@example.com',
                    'so_dien_thoai' => '098765432' . $i,
                    'dia_chi' => 'Dia chi nhan vien ' . $i,
                    'mat_khau' => bcrypt('password'),
                    'is_master' => rand(0, 1),
                ];
            }, range(1, 10))
        );
    }
}
