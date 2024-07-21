<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bill';

    protected $fillable = [
        'mahd',
        'iduser',
        'ten',
        'diachi',
        'dienthoai',
        'email',
        'pttt',
        'voucher',
        'tongthanhtoan',
        'trangthai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function billct()
    {
        return $this->hasMany(BillCT::class, 'idbill');
    }
}