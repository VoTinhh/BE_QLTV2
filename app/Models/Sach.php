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
        'id_tac_gia',
        'id_nha_xuat_ban',
        'id_vi_tri',
    ];

    public function phieuMuon()
    {
        return $this->hasMany(PhieuMuon::class, 'id_sach');
    }

    public function tacGia()
    {
        return $this->belongsTo(TacGia::class, 'id_tac_gia');
    }

    public function nhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class, 'id_nha_xuat_ban');
    }

    public function viTri()
    {
        return $this->belongsTo(ViTri::class, 'id_vi_tri');
    }
}
