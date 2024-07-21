<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSp;
class ProductController extends Controller
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
    public function addToCart(Request $request, $id)
    {
        $product = SanPham::find($id);

        if (!$product) {
            Session::flash('error', 'No Product added to cart!');
            return redirect('sptnsx/');
        }

        $cart = session()->get('cart', []);


        if (!isset($cart[$id])) {
            $cart[$id] = [
                "name" => $product->tensp,
                "quantity" => 1,
                "price" => $product->giaban,
                "image" => $product->hinhanh
            ];
        } else {

            $cart[$id]['quantity']++;
        }

        session()->put('cart', $cart);
        Session::flash('success', 'Product added to cart!');
        return redirect('sptnsx/');
    }

    public function showCart()
    {
        $avt = 4;
        $cart = session()->get('cart');
        return view('cart', compact('cart', 'avt'));
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Số lượng sản phẩm được cập nhập thành công!');
        }
    }
    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function clearCart()
    {
        session()->forget('cart');
        session()->flash('success', 'Xóa hết sản phẩm thành công!');
        return redirect('sptnsx/');
    }
}