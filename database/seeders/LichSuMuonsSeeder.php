<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichSuMuonsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lich_su_muons')->insert(
            array_map(function ($i) {
                return [
                    'id_phieu_muon' => rand(1, 10),
                ];
            }, range(1, 10))
        );
    }
}
