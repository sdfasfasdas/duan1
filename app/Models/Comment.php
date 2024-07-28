<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $fillable = [
        'noidung',
        'ngabl',
        'idpro',
        'iduser',
    ];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'idpro');
    }

    public function user()
    {
        return $this->belongsTo(UserT::class, 'iduser');
    }
}