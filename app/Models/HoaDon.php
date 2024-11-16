<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_dons';
    
    protected $fillable = [
        'tong_tien',        // Tổng tiền của hóa đơn
        'trang_thai',       // Trạng thái của hóa đơn
        'id_phieu_muon',    // ID phiếu mượn liên kết
    ];

    public function thanhToans()
    {
        return $this->hasMany(ThanhToan::class, 'id_hoa_don'); // Mối quan hệ 1-N với bảng thanh toán
    }

    public function phieuMuon()
    {
        return $this->belongsTo(PhieuMuon::class, 'id_phieu_muon'); // Mối quan hệ N-1 với bảng phiếu mượn
    }
}
