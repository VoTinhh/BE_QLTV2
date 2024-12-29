<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PhieuMuonsSeeder::class,
            SachesSeeder::class,
            HoaDonsSeeder::class,
            ThanhToansSeeder::class,
            NguoiDungsSeeder::class,
            LichSuMuonsSeeder::class,
            ViTrisSeeder::class,
            PhanLoaisSeeder::class,
            NhaXuatBansSeeder::class,
            TacGiasSeeder::class,
            NhanViensSeeder::class,
        ]);
    }
}
