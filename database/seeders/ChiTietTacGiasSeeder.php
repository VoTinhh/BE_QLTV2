<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietTacGiasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chi_tiet_tac_gias')->insert([
            [
                'sach_id' => 1,
                'tac_gia_id' => 1,
                'vai_tro' => 'Tác giả chính',
            ],
            [
                'sach_id' => 1,
                'tac_gia_id' => 2,
                'vai_tro' => 'Đồng tác giả',
            ],
            [
                'sach_id' => 2,
                'tac_gia_id' => 3,
                'vai_tro' => 'Tác giả chính',
            ],
        ]);
    }
}
