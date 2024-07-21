<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Billct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function confirmOrder(Request $request)
    {
        
        if (!Auth::check()) {

            $user = new User();
            $user->name = $request->input('ten');
            $user->email = $request->input('email');
            $user->password = Hash::make('Kingshop123');
            $user->diachi = $request->input('diachi');
            $user->sdt = $request->input('dienthoai');
            $user->save();


            Auth::login($user);
        }


        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }



        $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');
        $currentDateTime1 = Carbon::now()->format('Y-m-d');
        $mahd = 'KINGSHOP_' . rand(10000, 99999) . '-' . $currentDateTime1;


        $tongthanhtoan = 0;
        foreach ($cart as $item) {
            $tongthanhtoan += $item['price'] * $item['quantity'];
        }

        $bill = new Bill();
        $bill->mahd = $mahd;
        $bill->iduser = Auth::id();
        $bill->ten = $request->input('ten');
        $bill->diachi = $request->input('diachi');
        $bill->dienthoai = $request->input('dienthoai');
        $bill->email = $request->input('email');
        $bill->pttt = $request->input('pttt');
        $bill->voucher = $request->input('voucher', '');
        $bill->tongthanhtoan = $tongthanhtoan;
        $bill->ngay = $currentDateTime;
        $bill->save();

        foreach ($cart as $id => $item) {
            $billct = new Billct();
            $billct->idsp = $id;
            $billct->price = $item['price'];
            $billct->name = $item['name'];
            $billct->img = $item['image'];
            $billct->soluong = $item['quantity'];
            $billct->idbill = $bill->id;
            $billct->size = $request->input('size', 0);
            $billct->save();
        }


        session()->forget('cart');

        return redirect('order/hoanthanh/' . $mahd)->with('success', 'Đơn hàng của bạn đã được xác nhận!');
    }
}