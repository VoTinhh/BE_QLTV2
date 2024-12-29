<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NguoiDung extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'nguoi_dungs';

    protected $fillable = [
        'ten_nguoi_dung',
        'hinh_anh',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'password',
        'isAdmin'
    ];
}
