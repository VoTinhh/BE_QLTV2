<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanLoai extends Model
{
    protected $table = 'phan_loais';
    protected $fillable = [
        'ten_phan_loai'
    ];
}
