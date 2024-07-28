<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\LoaiSp;
class Quantri
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
        \View::share('avt', 0);
    }
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->idgroup==1){
            return $next($request);
        }
        
        else return redirect('/thongbao')->with('thongbao',"Bạn không phải là admin!");
    }
}
