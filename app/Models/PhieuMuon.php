<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuMuon extends Model
{
    protected $table = 'phieu_muons';
    protected $fillable = [
        'ngay_muon',
        'ngay_tra',
        'ngay_tra_thuc_te',
        'tien_phat',
        'so_luong_sach',
        'id_sach',
        'id_thanh_toan',
        'id_nguoi_dung',
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'id_sach');
    }

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'id_nguoi_dung');
    }

    public function thanhToan()
    {
        return $this->belongsTo(ThanhToan::class, 'id_thanh_toan');
    }

    public function lichSuMuons()
    {
        return $this->hasMany(LichSuMuon::class, 'id_phieu_muon');
    }
}
