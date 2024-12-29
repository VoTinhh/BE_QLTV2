<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaXuatBansSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nha_xuat_bans')->insert(
            array_map(function ($i) {
                return [
                    'ten_nha_xuat_ban' => 'NXB ' . $i,
                ];
            }, range(1, 10))
        );
    }
}
