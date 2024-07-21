<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserT extends Model
{
    use HasFactory;

    protected $table = 'user_t';

    protected $fillable = [
        'tendn',
        'pass',
        'ten',
        'hinhanh',
        'diachi',
        'dienthoai',
        'email',
        'role',
        'gioitinh',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class, 'iduser');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'iduser');
    }
}