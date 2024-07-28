<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        \App\Models\User::factory(10)->create();


        \DB::table('users')->insert([
            'name' => 'Vui Từng Phút Giây',
            'email' => 'vuiqua@gmail.com',
            'password' => bcrypt('hehe'),
            'idgroup' => 1,
            'sdt' => 123456789,
            'diachi' => 'TPHCM'
        ]);
        \DB::table('users')->insert([
            'name' => 'Buồn Từng Phút Giây',
            'email' => 'buonqua@gmail.com',
            'password' => bcrypt('huhu'),
            'idgroup' => 1,
            'sdt' => 123456789,
            'diachi' => 'TPHCM'
        ]);
        \DB::table('users')->insert([
            'name' => 'Nguyen Thi Gia Hu',
            'email' => 'giahu@gmail.com',
            'password' => bcrypt('hihi'),
            'sdt' => 123456789,
            'idgroup' => 0,
            'diachi' => 'HN'
        ]);
        // Chèn dữ liệu cho bảng 'loaisp'
        DB::table('loaisp')->insert([
            ['tenloai' => 'Nike'],
            ['tenloai' => 'Adidas'],
            ['tenloai' => 'MLB'],
            ['tenloai' => 'Reebok'],
            ['tenloai' => 'Fila'],
            ['tenloai' => 'Asics'],
            ['tenloai' => 'Puma']
        ]);


        DB::table('anhtc')->insert([
            ['tenanh' => 'c4.jpg', 'link' => '/'],
            ['tenanh' => 'c1.jpg', 'link' => '/'],
            ['tenanh' => 'c3.jpg', 'link' => '/'],
            ['tenanh' => 'c2.jpg', 'link' => '/'],
        ]);
        DB::table('banner')->insert([
            [
                'img' => '1.png',
                'link' => '/ct/1',
                'ten' => 'Nike New Collection!',
                'motangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.'
            ],
            [
                'img' => '2.png',
                'link' => '/ct/2',
                'ten' => 'Nike New Collection!',
                'motangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.'
            ],
            [
                'img' => '3.png',
                'link' => '/ct/3',
                'ten' => 'Nike New Collection!',
                'motangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.'
            ],
        ]);
        $ten = ['Founs', 'Vip', 'Short', 'Max', 'INT', 'Vare', 'Hunv', 'Huni'];
        $t = ['Nike', 'Adidas', 'MLB', 'Reebok', 'Fila', 'Asics', 'Puma'];
        $hinh = ['p1.jpg', 'p2.jpg', 'p3.jpg', 'p4.jpg', 'p5.jpg', 'p6.jpg', 'p7.jpg', 'p8.jpg'];
        for ($i = 0; $i < 1000; $i++) {
            $ht = Arr::random($ten);
            $hinh1 = Arr::random($hinh);
            $gh = Arr::random($t);
            DB::table('sanpham')->insert([
                [
                    'tensp' => $gh . ' ' . $ht . ' ' . $i,
                    'hinhanh' => $hinh1,
                    'view' => mt_rand(1, 20000),  
                    'bestseller' => mt_rand(10, 50) / 100,  
                    'giaban' => mt_rand(1500000, 15000000),  
                    'mota' => 'Đôi giày thể thao Adidas New Hammer Solfor là sự kết hợp tuyệt vời giữa thiết kế và hiệu suất...',
                    'trangthai' => 0,
                    'idloaisp' => mt_rand(1, 7),  
                    'sizemax' => 41,
                    'sizemin' => 31
                ]
            ]);
        }
    }
}
