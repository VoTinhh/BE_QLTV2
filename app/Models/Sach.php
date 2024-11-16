<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    // Chỉ định bảng liên kết
    protected $table = 'saches';

    // Đặt khóa chính là id_sach
    protected $primaryKey = 'id_sach';

    // Tắt tự động tăng nếu cột id_sach không tự động tăng
    public $incrementing = true;

    // Định nghĩa kiểu dữ liệu của khóa chính
    protected $keyType = 'int';

    // Các cột có thể được gán giá trị
    protected $fillable = [
        'id_sach',
        'ten_sach',
        'so_luong',
        'trang_thai',
        'hinh_anh',
        'gia_tien',
        'mo_ta',
    ];
}
