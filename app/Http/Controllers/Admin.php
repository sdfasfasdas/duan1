<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\LoaiSp;
use App\Models\SanPham;
use App\Models\AnhTc;
use App\Models\Banner;
use App\Models\User;
use App\Models\Bill;
use App\Models\Billct;
use App\Models\UserT;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function getSanPham()
    {
        $sanPham = SanPham::All();
        return view('quantri/quantrisanpham', ['sanPham' => $sanPham]);
    }
    public function getSanPhamThungRac()
    {
        $sanPham = SanPham::onlyTrashed()->get();
        return view('quantri/quantrithungrac', ['sanPham' => $sanPham]);
    }
    public function getHang()
    {
        $LoaiSp = LoaiSp::All();
        return view('quantri/quantriLoaiSp', ['LoaiSp' => $LoaiSp]);
    }
    public function getDonhang()
    {
        $Bill = Bill::All();
        return view('quantri/quantriBill', ['Bill' => $Bill]);
    }
    public function getDonhangct($id)
    {
        $Billct = Billct::where('idbill', $id)->get();

        // Check if the query returned any results
        if ($Billct->isEmpty()) {
            return redirect()->back()->with('error', 'No order details found for the given ID.');
        }

        return view('quantri.quantriBillct', ['Billct' => $Billct]);
    }
    public function getKh()
    {
        $users = User::withTrashed()->get();
        return view('quantri/quantriUser', ['User' => $users]);
    }
    public function getBanner()
    {
        $Banner = Banner::withTrashed()->get();
        return view('quantri/quantriBanner', ['Banner' => $Banner]);
    }
    public function getAnhct()
    {
        $AnhTc = AnhTc::All();
        return view('quantri/quantriAnhTc', ['AnhTc' => $AnhTc]);
    }
    function themSanPham()
    {
        $LoaiSp = LoaiSp::all();

        return view("quantri/them/themsanpham", ['LoaiSp' => $LoaiSp]);
    }



    function themSanPham_(Request $request)
    {
        $request->validate([
            'tensp' => 'required|string|max:255',
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'giaban' => 'required|numeric',
            'mota' => 'required|string',
            'view' => 'required|numeric',
            'bestseller' => 'required|numeric|min:0|max:100', // Chú ý đặt giới hạn tối thiểu và tối đa
            'trangthai' => 'required|in:0,1',
            'idloaisp' => 'required|exists:loaisp,id',
            'sizemax' => 'required|numeric',
            'sizemin' => 'required|numeric',
        ]);

        $sanPham = new SanPham();
        $sanPham->tensp = $request->tensp;
        $sanPham->giaban = $request->giaban;
        $sanPham->mota = $request->mota;
        $sanPham->view = $request->view;
        $sanPham->bestseller = $request->bestseller / 100; // Chuyển đổi tỉ lệ bán chạy thành phần trăm
        $sanPham->trangthai = $request->trangthai;
        $sanPham->idloaisp = $request->idloaisp;
        $sanPham->sizemax = $request->sizemax;
        $sanPham->sizemin = $request->sizemin;

        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $sanPham->hinhanh = 'images/' . $fileName;
        }

        $sanPham->save();
        Session::flash('success', 'Thêm Sản Phẩm Thành Công');
        return redirect('admin/sanpham');
    }
    public function suaSanPham($id)
    {
        $sanPham = SanPham::findOrFail($id);
        $LoaiSp = LoaiSp::all();

        return view('quantri/sua/sanpham', ['id' => $id, 'sanPham' => $sanPham, 'LoaiSp' => $LoaiSp]);
    }

    public function suaSanPham_(Request $request, $id)
    {


        $sanPham = SanPham::find($id);
        $sanPham->tensp = $request->tensp;
        $sanPham->giaban = $request->giaban;
        $sanPham->mota = $request->mota;
        $sanPham->view = $request->view;
        $sanPham->bestseller = $request->bestseller / 100; // Chuyển đổi tỉ lệ bán chạy thành phần trăm
        $sanPham->trangthai = $request->trangthai;
        $sanPham->idloaisp = $request->idloaisp;
        $sanPham->sizemax = $request->sizemax;
        $sanPham->sizemin = $request->sizemin;

        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $sanPham->hinhanh = 'images/' . $fileName;
        }


        $sanPham->save();
        Session::flash('success', 'Sửa Sản Phẩm Thành Công');
        return redirect('admin/sanpham');
    }
    public function xoaSanpham($id)
    {
        $sanpham = SanPham::find($id);
        if ($sanpham) {
            $sanpham->delete();
            Session::flash('success', 'Sản phẩm đã được đưa vào thùng rácrác thành công!');
        } else {
            Session::flash('error', 'Không tìm thấy sản phẩm để xóa!');
        }
        return redirect()->back();
    }
    public function khoiPhucSanpham($id)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if ($sanpham) {
            $sanpham->restore();
            Session::flash('success', 'Khôi phục sản phẩm thành công!');
        } else {
            Session::flash('error', 'Không tìm thấy sản phẩm để khôi phục!');
        }
        return redirect()->back();
    }
    public function xoaVinhVienSanPham($id)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if ($sanpham) {
            $sanpham->forceDelete();
            Session::flash('success', 'Xóa sản phẩm vĩnh viễn thành công!');
        } else {
            Session::flash('error', 'Không tìm thấy sản phẩm để xóa!');
        }
        return redirect()->back();
    }
    public function xoaUser($id)
    {
        $User = User::find($id);
        if ($User) {
            $User->delete();
            Session::flash('success', 'Người dùng đã bị khóa tài khoản!');
        } else {
            Session::flash('error', 'Không tìm thấy người dùng để Khóa!');
        }
        return redirect()->back();
    }
    public function khoiUser($id)
    {
        $User = User::withTrashed()->find($id);
        if ($User) {
            $User->restore();
            Session::flash('success', 'Khôi phục User thành công!');
        } else {
            Session::flash('error', 'Không tìm thấy User để khôi phục!');
        }
        return redirect()->back();
    }
    public function suaUser($id)
    {
        $User = User::findOrFail($id);
        return view('quantri/sua/kh', ['id' => $id, 'User' => $User]);
    }

    /**
     * Cập nhật thông tin người dùng.
     */
    public function suaUser_(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'diachi' => 'required|string|max:255',
            'sdt' => 'required|string|max:20',
            'idgroup' => 'required|integer',
            'gioi' => 'required|integer',
        ]);

        // Tìm người dùng theo ID
        $User = User::findOrFail($id);

        // Cập nhật thông tin người dùng
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->diachi = $request->input('diachi');
        $User->sdt = $request->input('sdt');
        $User->idgroup = $request->input('idgroup');
        $User->gioi = $request->input('gioi');

        // Lưu lại thông tin người dùng
        $User->save();
        Session::flash('success', 'Sửa User thành công!');
        // Chuyển hướng về trang danh sách người dùng với thông báo thành công
        return redirect('admin/kh')->with('success', 'Cập nhật người dùng thành công.');
    }
    public function xoaBanner($id)
    {
        $Banner = Banner::find($id);
        if ($Banner) {
            $Banner->delete();
            Session::flash('success', 'Banner đã Ẩn!');
        } else {
            Session::flash('error', 'Không tìm thấy Banner đã Ẩn!');
        }
        return redirect()->back();
    }
    public function khoiBanner($id)
    {
        $Banner = Banner::withTrashed()->find($id);
        if ($Banner) {
            $Banner->restore();
            Session::flash('success', 'Khôi phục Banner thành công!');
        } else {
            Session::flash('error', 'Không tìm thấy Banner để khôi phục!');
        }
        return redirect()->back();
    }
    public function xoaBannerVV($id)
    {
        $Banner = Banner::withTrashed()->find($id);
        if ($Banner) {
            $Banner->forceDelete();
            Session::flash('success', 'Xóa Banner vĩnh viễn thành công!');
        } else {
            Session::flash('error', 'Không tìm thấy Banner để xóa!');
        }
        return redirect()->back();
    }
    function themBanner_(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|url|max:255',
            'ten' => 'required|string|max:50',
            'motangan' => 'required|string|max:255',
        ]);

        $Banner = new Banner();
        $Banner->link = $request->link;
        $Banner->ten = $request->ten;
        $Banner->motangan = $request->motangan;


        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/banner/'), $fileName);
            $Banner->img = $fileName;
        }

        $Banner->save();
        Session::flash('success', 'Thêm Banner Thành Công');
        return redirect('admin/bn');
    }
    function themBanner()
    {
        $SanPham = SanPham::all();

        return view("quantri/them/bn", ['SanPham' => $SanPham]);
    }
    function suaBanner_(Request $request, $id)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|url|max:255',
            'ten' => 'required|string|max:50',
            'motangan' => 'required|string|max:255',
        ]);

        $Banner = Banner::findOrFail($id);
        $Banner->link = $request->link;
        $Banner->ten = $request->ten;
        $Banner->motangan = $request->motangan;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/banner/'), $fileName);
            $Banner->img = $fileName;
        }

        $Banner->save();
        Session::flash('success', 'Sửa Banner Thành Công');
        return redirect('admin/bn');
    }

    function suaBanner($id)
    {
        $SanPham = SanPham::all();
        $Banner = Banner::findOrFail($id);
        return view("quantri/sua/banner", ['SanPham' => $SanPham, 'Banner' => $Banner]);
    }
    public function xoaLoai($id)
    {
        $loai = LoaiSp::findOrFail($id);
        $loai->delete();
        Session::flash('success', 'Xóa Loại Sp Thành Công');
        return redirect()->back();
    }
    function themLoaiSp_(Request $request)
    {
        $request->validate([
            'tenloai' => 'required|string|max:50',
        ]);

        $LoaiSp = new LoaiSp();

        $LoaiSp->tenloai = $request->tenloai;

        $LoaiSp->save();
        Session::flash('success', 'Thêm Banner Thành Công');
        return redirect('admin/hang');
    }
    function themLoaiSp()
    {
        return view("quantri/them/laoi");
    }
    function suaLoaiSp_(Request $request, $id)
    {
        $request->validate([
            'tenloai' => 'required|string|max:50',

        ]);

        $LoaiSp = LoaiSp::findOrFail($id);

        $LoaiSp->tenloai = $request->tenloai;


        $LoaiSp->save();
        Session::flash('success', 'Sửa LoaiSp Thành Công');
        return redirect('admin/hang');
    }

    function suaLoaiSp($id)
    {

        $LoaiSp = LoaiSp::findOrFail($id);
        return view("quantri/sua/loaisp", ['LoaiSp' => $LoaiSp]);
    }
    function suaAnhTc_(Request $request, $id)
    {
        // Tìm kiếm và lấy ra đối tượng AnhTc cần sửa
        $AnhTc = AnhTc::findOrFail($id);

        // Thực hiện các thay đổi cần thiết trên đối tượng AnhTc
        if ($request->hasFile('tenanh')) {
            $file = $request->file('tenanh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/category/'), $fileName);
            $AnhTc->tenanh = $fileName;
        }
        $AnhTc->link = $request->link;

        // Lưu các thay đổi vào cơ sở dữ liệu
        $AnhTc->save();

        // Đặt thông báo thành công bằng session
        Session::flash('success', 'Sửa AnhTc Thành Công');

        // Chuyển hướng người dùng đến trang danh sách anhtc
        return redirect('admin/anhtc');
    }

    function suaAnhTc($id)
    {

        $AnhTc = AnhTc::findOrFail($id);
        return view("quantri/sua/anhtc", ['AnhTc' => $AnhTc]);
    }
    public function dashboard()
    {
        // Get total counts
        $totalProducts = SanPham::count();
        $totalUsers = User::count();
        $totalOrders = Bill::count();
        $totalBanners = Banner::count();

        // Additional statistics
        $latestOrders = Bill::orderBy('created_at', 'desc')->take(10)->get();
        $latestUsers = User::orderBy('created_at', 'desc')->take(10)->get();
        $latestProducts = SanPham::orderBy('created_at', 'desc')->take(10)->get();

        // Best-selling product
        $bestsellerProduct = SanPham::withCount('billct')->orderBy('billct_count', 'desc')->first();

        // Top 10 discounted products based on bestseller
        $topDiscountedProducts = SanPham::orderBy('bestseller', 'desc')->take(10)->get();

        return view('quantri/indexqt', compact('totalProducts', 'totalUsers', 'totalOrders', 'totalBanners', 'latestOrders', 'latestUsers', 'latestProducts', 'bestsellerProduct', 'topDiscountedProducts'));
    }
    function suadonhang_(Request $request, $id)
    {
        // Tìm kiếm và lấy ra đối tượng AnhTc cần sửa
        $Bill = Bill::findOrFail($id);


        $Bill->ten = $request->ten;
        $Bill->diachi = $request->diachi;
        $Bill->dienthoai = $request->dienthoai;
        $Bill->email = $request->email;
        $Bill->trangthai = $request->trangthai;

        // Lưu các thay đổi vào cơ sở dữ liệu
        $Bill->save();

        // Đặt thông báo thành công bằng session
        Session::flash('success', 'Sửa Đơn Hàng Thành Công');

        // Chuyển hướng người dùng đến trang danh sách anhtc
        return redirect('admin/donhang');
    }

    function suadonhang($id)
    {

        $Bill = Bill::findOrFail($id);
        return view("quantri/sua/suadonhang", ['Bill' => $Bill]);
    }
}
