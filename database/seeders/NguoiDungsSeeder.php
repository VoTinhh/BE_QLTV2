<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NguoiDungsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nguoi_dungs')->insert(
            array_map(function ($i) {
                return [
                    'ten_nguoi_dung' => 'Nguoi Dung ' . $i,
                    'hinh_anh' => 'user_' . $i . '.jpg',
                    'email' => 'user' . $i . '@example.com',
                    'so_dien_thoai' => '012345678' . $i,
                    'dia_chi' => 'Dia chi ' . $i,
                    'password' => bcrypt('password'),
                ];
            }, range(1, 10))
        );
        DB::table('nguoi_dungs')->insert(
            [
                'ten_nguoi_dung' => 'admin',
                'hinh_anh' => 'user.jpg',
                'email' => 'admin@gmail.com',
                'so_dien_thoai' => '012345678',
                'dia_chi' => 'Dia chi ',
                'password' => bcrypt('123123'),
            ]
        );
    }
}
