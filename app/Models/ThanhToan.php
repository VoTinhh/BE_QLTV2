<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    protected $table = 'thanh_toans';

    protected $fillable = [
        'tien_phat',
        'tien_thue',
        'tong_tien',
        'pending',
        'id_phieu_muon',
    ];

    public function phieuMuon()
    {
        return $this->belongsTo(PhieuMuon::class, 'id_phieu_muon');
    }

    public function hoaDon()
    {
        return $this->hasMany(HoaDon::class, 'id_thanh_toan');
    }
}
