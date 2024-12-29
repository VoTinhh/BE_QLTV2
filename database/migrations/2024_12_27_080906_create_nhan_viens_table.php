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
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id('id_nhan_vien');
            $table->string('ten_nhan_vien');
            $table->string('hinh_anh')->nullable();
            $table->string('email')->unique();
            $table->string('so_dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('mat_khau');
            $table->integer('is_master')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
