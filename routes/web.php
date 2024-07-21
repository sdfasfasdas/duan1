<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuanTriTinController;
use App\Http\Middleware\Quantri;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/download', function () {
    return view('download');
})->middleware('auth');
Route::get('/quantritin', [QuanTriTinController::class, 'index']);
Route::get('/quantri', function () {
    return view('quantri');
})->middleware('auth', Quantri::class);
Route::get('/thongbao', function () {
    return view('thongbao');
});
require __DIR__ . '/auth.php';
use App\Http\Controllers\Admin;

Route::get('/', [SiteController::class, 'index']);
Route::get('/ct/{id}', [SiteController::class, 'chitietsp']);
//view
Route::get('/sptnsx/{id_nhasx?}/{min_price?}/{max_price?}', [SiteController::class, 'sptheonhasx']);


//end view
//lh
use App\Mail\GuiEmail;
Route::post("/guilienhe", function(Illuminate\Http\Request $request){ 
  $arr = request()->post(); 
  $ht = trim(strip_tags( $arr['ht'] ));
  $em = trim(strip_tags( $arr['em'] ));
  $nd = trim(strip_tags( $arr['nd'] ));
  $adminEmail = 'dinhngochoangdq@gmail.com'; //Gửi thư đến ban quản trị
  Mail::mailer('smtp')->to( $adminEmail )
  ->send( new GuiEmail($ht, $em, $nd) );
   $request->session()->flash('thongbao', "Đã gửi mail");
   return redirect("thongbao"); 
});
//enlh
//sanpham
Route::patch('/update-cart', [ProductController::class, 'updateCart'])->name('cart.update');
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('products.addToCart');
Route::get('/cart', [ProductController::class, 'showCart'])->name('cart.index');
Route::delete('/remove-from-cart', [ProductController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/clear-cart', [ProductController::class, 'clearCart'])->name('clear.cart');
//endsanpham
//admin
Route::get('admin/', [Admin::class, 'dashboard'])->name('admin.dashboard')->middleware('auth', Quantri::class);;
Route::get('/admin/sanpham', [Admin::class, 'getSanPham'])->middleware('auth', Quantri::class);
Route::get('/admin/Thungrac', [Admin::class, 'getSanPhamThungRac'])->middleware('auth', Quantri::class);
Route::get('/admin/hang', [Admin::class, 'getHang'])->middleware('auth', Quantri::class);
Route::get('/admin/donhang', [Admin::class, 'getDonhang'])->middleware('auth', Quantri::class);
Route::get('/admin/donhangct/{id?}', [Admin::class, 'getDonhangct'])->middleware('auth', Quantri::class);
Route::get('/admin/kh', [Admin::class, 'getkh'])->middleware('auth', Quantri::class);
Route::get('/admin/bn', [Admin::class, 'getBanner'])->middleware('auth', Quantri::class);
Route::get('/admin/anhtc', [Admin::class, 'getAnhct'])->middleware('auth', Quantri::class);
Route::get('/admin/sanpham/them', [Admin::class, 'themSanPham'])->middleware('auth', Quantri::class);
Route::post('/admin/sanpham/them', [Admin::class, 'themSanPham_'])->middleware('auth', Quantri::class);
Route::get('/admin/sanpham/sua/{id?}', [Admin::class, 'suaSanPham'])->middleware('auth', Quantri::class);
Route::post('/admin/sanpham/sua/{id?}', [Admin::class, 'suaSanPham_'])->middleware('auth', Quantri::class);
Route::get('/admin/sanpham/khoiphuc/{id?}', [Admin::class, 'khoiPhucSanpham'])->middleware('auth', Quantri::class);
Route::get('/admin/sanpham/xoavv/{id?}', [Admin::class, 'xoaVinhVienSanPham'])->middleware('auth', Quantri::class);
Route::get('/admin/sanpham/xoa/{id?}', [Admin::class, 'xoaSanpham'])->middleware('auth', Quantri::class);
Route::get('/admin/Kh/chan/{id?}', [Admin::class, 'xoaUser'])->middleware('auth', Quantri::class);
Route::get('/admin/Kh/bochan/{id?}', [Admin::class, 'khoiUser'])->middleware('auth', Quantri::class);
Route::get('/admin/Kh/sua/{id?}', [Admin::class, 'suaUser'])->middleware('auth', Quantri::class);
Route::post('/admin/Kh/sua/{id?}', [Admin::class, 'suaUser_'])->middleware('auth', Quantri::class);
Route::get('/admin/banner/chan/{id?}', [Admin::class, 'xoaBanner'])->middleware('auth', Quantri::class);
Route::get('/admin/banner/bochan/{id?}', [Admin::class, 'khoiBanner'])->middleware('auth', Quantri::class);
Route::get('/admin/banner/sua/{id?}', [Admin::class, 'suaBanner'])->middleware('auth', Quantri::class);
Route::post('/admin/banner/sua/{id?}', [Admin::class, 'suaBanner_'])->middleware('auth', Quantri::class);
Route::get('/admin/banner/xoa/{id?}', [Admin::class, 'xoaBannerVV'])->middleware('auth', Quantri::class);
Route::get('/admin/banner/them', [Admin::class, 'themBanner'])->middleware('auth', Quantri::class);
Route::post('/admin/banner/them', [Admin::class, 'themBanner_'])->middleware('auth', Quantri::class);
Route::get('/admin/loai/them', [Admin::class, 'themLoaiSp'])->middleware('auth', Quantri::class);
Route::post('/admin/loai/them', [Admin::class, 'themLoaiSp_'])->middleware('auth', Quantri::class);
Route::get('/admin/loai/sua/{id?}', [Admin::class, 'suaLoaiSp'])->middleware('auth', Quantri::class);
Route::post('/admin/loai/sua/{id?}', [Admin::class, 'suaLoaiSp_'])->middleware('auth', Quantri::class);
Route::get('/admin/loai/xoa/{id?}', [Admin::class, 'xoaLoai'])->middleware('auth', Quantri::class);
Route::post('/admin/anhtc/sua/{id?}', [Admin::class, 'suaAnhTc_'])->middleware('auth', Quantri::class);
Route::get('/admin/anhtc/sua/{id?}', [Admin::class, 'suaAnhTc'])->middleware('auth', Quantri::class);
Route::post('/admin/donhang/sua/{id?}', [Admin::class, 'suadonhang_'])->middleware('auth', Quantri::class);
Route::get('/admin/donhang/sua/{id?}', [Admin::class, 'suadonhang'])->middleware('auth', Quantri::class);
//end admin
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
//xav nhan don hang
Route::post('/checkout/confirm', [OrderController::class, 'confirmOrder'])->name('checkout.confirm');
Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.show');
Route::get('/orders',[ProfileController::class, 'ordersindex']);
Route::get('/order/{id}',[ProfileController::class, 'showOrderDetail'] )->name('order.detail');
Route::get('/order/cancel/{id}', [ProfileController::class, 'cancel'])->name('order.cancel');
Route::get('/order/hoanthanh/{mahd?}', [ProfileController::class, 'showHoanthanh'])->name('order.hoanthanh');