<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViTrisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vi_tris')->insert(
            array_map(function ($i) {
                return [
                    'ten_vi_tri' => 'Vi tri ' . $i,
                ];
            }, range(1, 10))
        );
    }
}
