<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\LoaiSp;
use App\Models\Bill;
use App\Models\Billct;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();
class ProfileController extends Controller
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
    public function show()
    {
        $user = Auth::user();
        $avt = 5;
        return view('profile', compact('user', 'avt'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'diachi' => 'nullable|string|max:100',
            'sdt' => 'nullable|digits_between:10,11',
            'gioi' => 'required|in:0,1'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->diachi = $request->diachi;
        $user->sdt = $request->sdt;
        $user->gioi = $request->gioi;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Hô sơ được cập nhật thành công!');
    }
    public function ordersindex()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            $avt = 5;
            $iduser = Auth::id(); // Lấy id của người dùng đã đăng nhập
            $orders = Bill::where('iduser', $iduser)
                ->orderBy('id', 'desc') // Sắp xếp theo id giảm dần
                ->paginate(6);
            return view('orders', ['orders' => $orders, 'avt' => $avt]);
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem đơn hàng.');
        }
    }

    public function showOrderDetail($id)
    {
        $order = Bill::findOrFail($id); // Tìm đơn hàng theo ID
        $avt = 5;
        // Lấy danh sách chi tiết hóa đơn của đơn hàng
        $orderDetails = Billct::where('idbill', $order->id)->get();

        return view('order_detail', compact('order', 'orderDetails', 'avt'));
    }
    public function cancel($id)
    {
        // Tìm đơn hàng theo id
        $order = Bill::find($id);

        if (!$order) {
            return back()->with('error', 'Đơn hàng không tồn tại.');
        }

        // Kiểm tra trạng thái của đơn hàng
        if ($order->trangthai != 'Chờ Duyệt') {
            return back()->with('error', 'Không thể hủy đơn hàng với trạng thái hiện tại.');
        }

        // Thay đổi trạng thái của đơn hàng thành "Đã Hủy"
        $order->trangthai = 'Đã Hủy';
        $order->save();

        return back()->with('success', 'Đã hủy đơn hàng thành công.');
    }
    public function showHoanthanh($mahd)
    {
        // Tìm đơn hàng theo mã hóa đơn (mahd)
        $order = Bill::where('mahd', $mahd)->first();

        // Kiểm tra nếu đơn hàng tồn tại
        if (!$order) {
            // Xử lý khi không tìm thấy đơn hàng
            return redirect()->back()->withErrors('Order not found.');
        }

        $avt = 5;

        // Lấy danh sách chi tiết hóa đơn của đơn hàng
        $orderDetails = Billct::where('idbill', $order->id)->get();

        return view('hoanthanh', compact('order', 'orderDetails', 'avt'));
    }
}






