<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    protected $table = 'tac_gias';
    protected $fillable = [
        'ten_tac_gia',
        'tieu_su',
        'hinh_anh',
        'tac_pham',
    ];
}
