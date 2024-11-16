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
        'id_sach',
        'id_user',
    ];
}
