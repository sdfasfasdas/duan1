<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\LoaiSp;

class AuthenticatedSessionController extends Controller
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
        \View::share('avt', 5);
    }
    /**
     * Hiển thị trang đăng nhập.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Xử lý yêu cầu đăng nhập.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Kiểm tra biến deleted
            if ($user->deleted_at) {
                Auth::logout();

                return redirect()->route('login')->withErrors([
                    'email' => 'Tài khoản của bạn đã bị khóa.',
                ]);
            }

            $request->session()->regenerate();

            return redirect()->back();
        }
        

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
    

    /**
     * Hủy phiên đăng nhập.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}