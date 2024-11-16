<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    protected $table = 'thanh_toans';
    
    protected $fillable = [
        'so_tien',              // Số tiền thanh toán
        'phuong_thuc_thanh_toan', // Phương thức thanh toán
        'id_hoa_don',            // ID hóa đơn liên kết
    ];

    public function hoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'id_hoa_don'); // Mối quan hệ N-1 với bảng hóa đơn
    }
}
