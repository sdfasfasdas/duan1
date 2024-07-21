<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillCT extends Model
{
    use HasFactory;

    protected $table = 'Billct';

    protected $fillable = [
        'idsp',
        'price',
        'name',
        'img',
        'soluong',
        'idbill',
        'size',
    ];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'idsp');
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'idbill');
    }
}