<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NhanVien extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'nhan_viens';

    protected $primaryKey ='id_nhan_vien';

    protected $fillable = [
        'id_nhan_vien',
        'ten_nhan_vien',
        'hinh_anh',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'mat_khau',
        'is_master',
    ];
}
