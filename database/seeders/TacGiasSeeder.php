<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TacGiasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tac_gias')->insert(
            array_map(function ($i) {
                return [
                    'ten_tac_gia' => 'Tac gia ' . $i,
                    'tieu_su' => 'Tieu su tac gia ' . $i,
                    'hinh_anh' => 'author_' . $i . '.jpg',
                    'tac_pham' => 'Tac pham ' . $i,
                ];
            }, range(1, 10))
        );
    }
}
