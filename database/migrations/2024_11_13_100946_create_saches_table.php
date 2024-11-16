<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saches', function (Blueprint $table) {
            $table->id('id_sach');
            $table->string('ten_sach');
            $table->integer('so_luong');
            $table->string('trang_thai');
            $table->string('hinh_anh');
            $table->decimal('gia_tien', 10, 2);
            $table->text('mo_ta');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saches');
    }
};
