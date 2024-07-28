<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoaiSp;
class CheckoutController extends Controller
{
    public function __construct()
    {
        // Sử dụng Eloquent để lấy danh sách loại sản phẩm và số lượng sản phẩm
        $listhang = LoaiSp::withCount('sanphams')
            ->orderBy('id', 'asc')
            ->get();
        \View::share('id_nhasx', 0);
        \View::share('min_price', null);
        \View::share('max_price', null);
        \View::share('listhang', $listhang);
        \View::share('searchTerm', 0);
    }
    public function showCheckoutForm()
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);
        $avt=5;
        $subtotal = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $shipping = 50; // Flat rate shipping
        $total = $subtotal + $shipping;

        return view('checkout', compact('user', 'cart', 'subtotal', 'shipping', 'total','avt'));
    }
}