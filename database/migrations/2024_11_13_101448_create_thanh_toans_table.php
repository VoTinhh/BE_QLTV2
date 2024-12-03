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
        Schema::create('thanh_toans', function (Blueprint $table) {
            $table->id();
            $table->decimal('tien_phat', 10, 2)->default(0);
            $table->decimal('tien_thue', 10, 2)->default(0);
            $table->decimal('tong_tien', 10, 2);
            $table->integer('trang_thai')->default(0);
            $table->integer('id_phieu_muon');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_toans');
    }
};
