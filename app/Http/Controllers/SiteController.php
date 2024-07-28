<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSp;
use App\Models\SanPham;
use App\Models\AnhTc;
use App\Models\Banner;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();
class SiteController extends Controller
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

    public function index(Request $request)
    {
        $avt = 1;

        $productsByView = SanPham::orderBy('view', 'desc')->take(8)->get();
        $productsById = SanPham::orderBy('id', 'desc')->take(8)->get();
        $productsByBestseller = SanPham::orderBy('bestseller', 'desc')->take(6)->get();
        $anhTc = AnhTc::all();
        $banner = Banner::all();

        return view('home', compact('productsByView', 'productsById', 'productsByBestseller', 'anhTc', 'banner', 'avt'));
    }

    public function chitietsp($id = 0)
    {
        $avt = 2;

        $sanpham = SanPham::findOrFail($id);
        $productsByBestseller = SanPham::orderBy('bestseller', 'desc')->take(6)->get();

        return view('chitietsp', compact('id', 'sanpham', 'avt', 'productsByBestseller'));
    }

    public function sptheonhasx(Request $request, $id_nhasx = 0, $min_price = null, $max_price = null)
    {
        $avt = 2;

        $searchTerm = $request->input('search');
        $productsQuery = SanPham::query();

        if ($id_nhasx > 0) {
            $productsQuery->where('idloaisp', $id_nhasx);
        }

        if ($searchTerm) {
            $productsQuery->where('tensp', 'like', '%' . $searchTerm . '%');
        }

        if ($min_price !== null && $max_price !== null) {
            $productsQuery->whereBetween('giaban', [(int) $min_price, (int) $max_price]);
        }

        $products = $productsQuery->orderBy('id', 'desc')->paginate(6);
        $products->appends(['search' => $searchTerm]);

        $productsByBestseller = SanPham::orderBy('bestseller', 'desc')->take(6)->get();

        return view('sptheonhasx', compact('id_nhasx', 'products', 'avt', 'productsByBestseller', 'searchTerm', 'min_price', 'max_price'));
    }
}