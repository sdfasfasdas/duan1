<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('diachi',100)->nullable();
            $table->integer('idgroup')->default(0);
            $table->integer('gioi')->default(0);
            $table->softDeletes();
            $table->string('sdt', 11)->nullable();
          
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        Schema::create('loaisp', function (Blueprint $table) {
            $table->id();
            $table->string('tenloai', 20);
            $table->timestamps();
        });

        Schema::create('anhtc', function (Blueprint $table) {
            $table->id();
            $table->string('tenanh', 255);
            $table->string('link', 255);
            $table->timestamps();
        });

        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('tensp', 50);
            $table->string('hinhanh', 255);
            $table->integer('view')->default(0);
            $table->float('bestseller')->default(0);
            $table->integer('giaban');
            $table->text('mota');
            $table->integer('trangthai')->default(0);
            $table->foreignId('idloaisp')->constrained('loaisp');
            $table->integer('sizemax');
            $table->integer('sizemin');
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->string('img', 255);
            $table->string('link', 255);
            $table->string('ten', 50);
            $table->string('motangan', 255);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->string('mahd', 255);
            $table->foreignId('iduser')->nullable()->constrained('users');
            $table->string('ten', 100);
            $table->string('diachi', 255);
            $table->string('dienthoai', 15);
            $table->string('email', 255);
            $table->string('pttt', 255);
            $table->string('voucher', 255);
            $table->integer('tongthanhtoan');
            $table->string('trangthai', 255)->default('Chờ Duyệt');
            $table->string('ngay', 30);
            $table->timestamps();
        });

        Schema::create('billct', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idsp')->constrained('sanpham');
            $table->integer('price');
            $table->string('name', 100);
            $table->string('img', 255);
            $table->integer('soluong');
            $table->foreignId('idbill')->nullable()->constrained('bill');
            $table->integer('size');
            $table->timestamps();
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->text('noidung');
            $table->string('ngabl', 30);
            $table->foreignId('idpro')->constrained('sanpham');
            $table->foreignId('iduser')->constrained('users');
            $table->timestamps();
        });

        Schema::create('link', function (Blueprint $table) {
            $table->id();
            $table->string('link', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('anhtc');
        Schema::dropIfExists('billct');
        Schema::dropIfExists('bill');
        Schema::dropIfExists('link');
        Schema::dropIfExists('comment');
        Schema::dropIfExists('banner');
        Schema::dropIfExists('users');
        Schema::dropIfExists('sanpham');
        Schema::dropIfExists('loaisp');
    }
};
