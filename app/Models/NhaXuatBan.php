<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaXuatBan extends Model
{
    protected $table = 'nha_xuat_bans';
    protected $fillable = [
        'ten_nha_xuat_ban'
    ];
}
