<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichSuMuon extends Model
{
    protected $table = 'lich_su_muons';
    protected $fillable = [
        'id_phieu_muon',
    ];

    public function phieuMuon()
    {
        return $this->belongsTo(PhieuMuon::class, 'id_phieu_muon');
    }
}
