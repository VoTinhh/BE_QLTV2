<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_dons';

    protected $fillable = [
        'trang_thai',
        'id_thanh_toan',
        'id_sach',
        'id_nguoi_dung',
        'id_phieu_muon',
    ];

    public function thanhToan()
    {
        return $this->belongsTo(ThanhToan::class, 'id_thanh_toan');
    }
    public function phieuMuon()
{
    return $this->belongsTo(PhieuMuon::class, 'id_phieu_muon');
}

}
