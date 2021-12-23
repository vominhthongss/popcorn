<?php

namespace App\Http\Controllers\Users;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Phim;
use App\Models\TheLoaiPhim;

// xong 1 bảng thể loại
class HomeController extends Controller
{
    private $path='users.home';
    function index(){
        $view=$this->path.'.index';

        // $theloaiphim=DB::table('theloaiphim')->select('PHIM_ID','THELOAI_ID')
        // ->get();

        // DB::select('
        // select phim.PHIM_ID,theloai.THELOAI_TEN FROM theloaiphim,phim,theloai
        // where theloaiphim.PHIM_iD=phim.PHIM_ID and theloaiphim.THELOAI_ID=theloai.THELOAI_ID
        // ');
        $theloaiphim=TheLoaiPhim::getTheLoaiPhim();
        // DB::table('theloaiphim')
        // ->join('phim','theloaiphim.PHIM_ID','=','phim.PHIM_ID')
        // ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        // ->select('phim.PHIM_ID','theloai.THELOAI_TEN')
        // ->get();


        #phim nổi bật
        $phimnoibat=Phim::getPhimNoiBat();
        // $phimnoibat=DB::table('phim')->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB')
        // ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->limit(6)
        // ->get();

        #phim đã ra mắt
        $phimdaramat=Phim::getPhimDaRaMat();

        // DB::table('phim')
        // ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        // ->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB','PHIM_TOMTAT','DOTUOI_TEN')
        // ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->limit(12)->get();
        #phim điện ảnh
        $phimdienanh=Phim::getPhimDienAnh();
        // DB::table('phim')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB')
        // ->where('PHANLOAI_TEN','=','Phim điện ảnh')
        // ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->limit(12)->get();
        #phim truyền hình
        $phimtruyenhinh=Phim::getPhimTruyenHinh();
        // DB::table('phim')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB')
        // ->where('PHANLOAI_TEN','=','Phim truyền hình')
        // ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->limit(12)->get();

        #phim sắp ra mắt
        $phimsapramat=Phim::getPhimSapRaMat();
        // DB::table('phim')
        // ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        // ->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB','PHIM_TOMTAT','DOTUOI_TEN')
        // ->where('PHIM_TRANGTHAI','=','Sắp ra mắt')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->limit(6)->get();
        #view('users.home.index')
        // foreach ($theloaiphim as $item2){
        //     echo $item2->PHIM_ID;
        // }
        return view($view,[
            'theLoaiPhim'=>$theloaiphim,
            'phimNoiBat'=>$phimnoibat,
            'phimDaRaMat'=>$phimdaramat,
            'phimDienAnh'=>$phimdienanh,
            'phimTruyenHinh'=>$phimtruyenhinh,
            'phimSapRaMat'=>$phimsapramat
        ]);
    }

}
