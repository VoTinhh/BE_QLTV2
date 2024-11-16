<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoi_dungs'; // Đảm bảo đúng tên bảng
    protected $primaryKey = 'id_nguoi_dung'; // Chỉ định tên cột khóa chính
    public $incrementing = false; // Nếu khóa chính không tự động tăng (nếu cần)

    protected $fillable = [
        'id_nguoi_dung',
        'ten_nguoi_dung',
        'hinh_anh',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'mat_khau',
        'phan_quyen',
    ];
}
