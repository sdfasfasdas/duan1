<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'tensp',
        'hinhanh',
        'view',
        'bestseller',
        'giaban',
        'mota',
        'trangthai',
        'idloaisp',
        'sizemax',
        'sizemin',
    ];

    public function loaisp()
    {
        return $this->belongsTo(LoaiSP::class, 'idloaisp');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'idpro');
    }

    public function billct()
    {
        return $this->hasMany(BillCT::class, 'idsp');
    }
    
}