<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhGia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\DoTuoi;
use App\Models\LuotXem;
use App\Models\Nam;
use App\Models\Phim;
use App\Models\QuocGia;
use App\Models\ThamGia;
use App\Models\ThanhVien;
use App\Models\TheLoai;
use App\Models\TheLoaiPhim;

class DashboardController extends Controller
{
    private $path='admin.dashboard';
    function index(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }

        $view=$this->path.'.index';

        $phimdathemthangnay=Phim::getPhimDaThemThangNay();
        // DB::table('phim')
        // ->whereMonth('PHIM_NGAYTHEM', date("m"))
        // ->count();

        $danhgiahomnay=DanhGia::getDanhGiaHomNay();
        // DB::table('danhgia')
        // ->whereDate('DANHGIA_NGAYGIO', date("Y-m-d"))
        // ->count();

        $phimGayDay=Phim::getPhimGanDay();
        // DB::table('phim')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select('phim.PHIM_ID','phim.PHIM_TEN','phanloai.PHANLOAI_TEN','phim.PHIM_TRANGTHAI')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->LIMIT(5)
        // ->get();

        $phimTop=Phim::getPhimTop();
        // DB::table('phim')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select('phim.PHIM_ID','phim.PHIM_TEN','phanloai.PHANLOAI_TEN','phim.PHIM_DIEMIMDB')
        // ->orderByDesc('PHIM_DIEMIMDB')
        // ->LIMIT(5)
        // ->get();

        $thanhvienganday=ThanhVien::getThanhVienGanDay();
        //DB::table('thanhvien')->select('*')->orderByDesc('THANHVIEN_ID')->LIMIT(5)->get();

        $danhGiaGanDay=DanhGia::getDanhGiaGanDay();
        // DB::table('danhgia')->select('*')->orderByDesc('DANHGIA_NGAYGIO')->LIMIT(5)->get();

        return view($view,[
            'phimDaThemThangNay'=>$phimdathemthangnay,
            'danhGiaHomNay'=>$danhgiahomnay,

            'phimGanDay'=>$phimGayDay,
            'phimTop'=>$phimTop,
            'thanhVienGanDay'=>$thanhvienganday,
            'danhGiaGanDay'=>$danhGiaGanDay
        ]);
    }


}
