<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phieu_muons', function (Blueprint $table) {
            $table->id();
            $table->date('ngay_muon');
            $table->date('ngay_tra');
            $table->date('ngay_tra_thuc_te')->nullable();
            $table->decimal('tien_phat', 10, 2)->default(0);
            $table->integer('so_luong_sach');
            $table->integer('id_sach');
            $table->integer('id_thanh_toan')->nullable();
            $table->integer('id_nguoi_dung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_muons');
    }
};
