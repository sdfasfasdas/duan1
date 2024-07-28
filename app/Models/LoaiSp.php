<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    use HasFactory;

    protected $table = 'loaisp';

    protected $fillable = [
        'tenloai',
    ];

    public function sanphams()
    {
        return $this->hasMany(SanPham::class, 'idloaisp');
    }
}