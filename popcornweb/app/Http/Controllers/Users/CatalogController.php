<?php

namespace App\Http\Controllers\Users;

use App\Models\Nam;
use App\Models\Phim;
use App\Models\QuocGia;
use App\Models\TheLoai;
use App\Models\TheLoaiPhim;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    private $path='users.catalog';
    private $soPhanTu=2; //số phần tử trong 1 trang lọc
    function index(){
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang');
        $filter_theloai=TheLoai::getFilerTheLoai();
        $filter_quocgia=QuocGia::getFilerQuocGia();
        $filter_nam=Nam::getFilerNam();
        $theloaiphim=TheLoaiPhim::getTheLoaiPhim();
        #catalog phim
        $catalogphim=Phim::getCatalogPhim();
        #view('users.catalog.index')
        return view($view,[
            'theLoaiPhim'=>$theloaiphim,
            'filterTheLoai'=>$filter_theloai,
            'filterQuocGia'=>$filter_quocgia,
            'filterNam'=>$filter_nam,
            'catalogPhim'=>$catalogphim
        ]);
    }
    function filter(Request $request){
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang');

        $filter_theloai=TheLoai::getFilerTheLoai();
        //DB::table('theloai')->select('*')->get();
        $filter_quocgia=QuocGia::getFilerQuocGia();
        //DB::table('quocgia')->select('*')->get();
        $filter_nam=Nam::getFilerNam();
        //DB::table('nam')->select('*')->orderByDesc('NAM_TEN')->get();

        $theloai=$request->input('genre');
        $quocgia=$request->input('country');
        $nam=$request->input('year');
        $dangxem=$request->input('view');



        // $theloaiphim=DB::table('theloaiphim')
        // ->select('PHIM_ID','THELOAI')
        // ->get();

        $theloaiphim=TheLoaiPhim::getTheLoaiPhim();
        // DB::table('theloaiphim')
        // ->join('phim','theloaiphim.PHIM_ID','=','phim.PHIM_ID')
        // ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        // ->select('phim.PHIM_ID','theloai.THELOAI_TEN')
        // ->get();
        #catalog phim

        // DB::table(DB::raw('phim','theloaiphim'))
        // ->join('theloaiphim','theloaiphim.PHIM_ID','=','phim.PHIM_ID')
        // ->select('*')
        # 0 0 0 rỗng =>1
        $data1=Phim::getCatalogPhimFilter($theloai,$quocgia,$nam);
        // if($theloai=="" && $quocgia=="" && $nam=="")
        // {
        //     $data1=
        //     DB::table('phim')
        //     ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        //     ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        //     ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        //     ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        //     ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        //     ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        //     ->select(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //         )
        //     ->groupBy(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //     )

        //     ->orderByDesc('PHIM_NGAYTHEM')
        //     ->orderByDesc('PHIM_DIEMIMDB')
        //     ->paginate($soPhanTuTrongTrang);
        // }
        // # 0 0 1 rỗng =>2
        // if($theloai=="" && $quocgia=="" && $nam!="")
        // {
        //     $data1=
        //     DB::table('phim')
        //     ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        //     ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        //     ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        //     ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        //     ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        //     ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        //     ->select(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //         )
        //     ->groupBy(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //     )
        //     ->orderByDesc('PHIM_NGAYTHEM')
        //     ->where('NAM_TEN','=',$nam)
        //     ->orderByDesc('PHIM_DIEMIMDB')
        //     ->paginate($soPhanTuTrongTrang);
        // }
        //  # 0 1 0 rỗng =>3
        // if($theloai=="" && $quocgia!="" && $nam=="")
        // {
        //     $data1=
        //     DB::table('phim')
        //     ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        //     ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        //     ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        //     ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        //     ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        //     ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        //     ->select(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //         )
        //     ->groupBy(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //     )
        //     ->orderByDesc('PHIM_NGAYTHEM')
        //     ->where('QUOCGIA_TEN','=',$quocgia)
        //     ->orderByDesc('PHIM_DIEMIMDB')
        //     ->paginate($soPhanTuTrongTrang);
        // }
        // # 0 1 1 rỗng =>4
        // if($theloai=="" && $quocgia!="" && $nam!="")
        // {
        //     $data1=
        //     DB::table('phim')
        //     ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        //     ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        //     ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        //     ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        //     ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        //     ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        //     ->select(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //         )
        //     ->groupBy(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //     )
        //     ->orderByDesc('PHIM_NGAYTHEM')
        //     ->where('QUOCGIA_TEN','=',$quocgia)
        //     ->where('NAM_TEN','=',$nam)
        //     ->orderByDesc('PHIM_DIEMIMDB')
        //     ->paginate($soPhanTuTrongTrang);
        // }
        //  # 1 0 0 rỗng =>5
        // if($theloai!="" && $quocgia=="" && $nam=="")
        // {
        //     $data1=
        //     DB::table('phim')
        //     ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        //     ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        //     ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        //     ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        //     ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        //     ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        //     ->select(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //         )
        //     ->groupBy(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //     )
        //     ->orderByDesc('PHIM_NGAYTHEM')
        //     ->where('THELOAI_TEN','=',$theloai)
        //     ->orderByDesc('PHIM_DIEMIMDB')
        //     ->paginate($soPhanTuTrongTrang);
        // }
        // # 1 0 1 rỗng =>6
        // if($theloai!="" && $quocgia=="" && $nam!="")
        // {
        //     $data1=
        //     DB::table('phim')
        //     ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        //     ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        //     ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        //     ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        //     ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        //     ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        //     ->select(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //         )
        //     ->groupBy(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //     )
        //     ->orderByDesc('PHIM_NGAYTHEM')
        //     ->where('THELOAI_TEN','=',$theloai)
        //     ->where('NAM_TEN','=',$nam)
        //     ->orderByDesc('PHIM_DIEMIMDB')
        //     ->paginate($soPhanTuTrongTrang);
        // }
        // # 1 1 0 rỗng =>7
        // if($theloai!="" && $quocgia!="" && $nam=="")
        // {
        //     $data1=
        //     DB::table('phim')
        //     ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        //     ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        //     ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        //     ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        //     ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        //     ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        //     ->select(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //         )
        //     ->groupBy(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //     )
        //     ->orderByDesc('PHIM_NGAYTHEM')
        //     ->where('THELOAI_TEN','=',$theloai)
        //     ->where('QUOCGIA_TEN','=',$quocgia)
        //     ->orderByDesc('PHIM_DIEMIMDB')
        //     ->paginate($soPhanTuTrongTrang);
        // }
        // # 1 1 1 rỗng =>8
        // if($theloai!="" && $quocgia!="" && $nam!="")
        // {
        //     $data1=
        //     DB::table('phim')
        //     ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        //     ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        //     ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        //     ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        //     ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        //     ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        //     ->select(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //         )
        //     ->groupBy(
        //         'phim.PHIM_ID',
        //         'dotuoi.DOTUOI_TEN',
        //         'quocgia.QUOCGIA_TEN',
        //         'nam.NAM_TEN',
        //         'phanloai.PHANLOAI_TEN',
        //         'phim.PHIM_TEN',
        //         'phim.PHIM_THOILUONG',
        //         'phim.PHIM_TOMTAT',
        //         'phim.PHIM_DIEMIMDB',
        //         'phim.PHIM_URLPOSTER',
        //         'phim.PHIM_TRANGTHAI',
        //         'phim.PHIM_NGAYTHEM',
        //     )
        //     ->orderByDesc('PHIM_NGAYTHEM')
        //     ->where('THELOAI_TEN','=',$theloai)
        //     ->where('QUOCGIA_TEN','=',$quocgia)
        //     ->where('NAM_TEN','=',$nam)
        //     ->orderByDesc('PHIM_DIEMIMDB')
        //     ->paginate($soPhanTuTrongTrang);

        // }

        return view($view,[
            'theLoaiPhim'=>$theloaiphim,
            'filterTheLoai'=>$filter_theloai,
            'filterQuocGia'=>$filter_quocgia,
            'filterNam'=>$filter_nam,
            'theloai'=>array('theloai'=>$theloai),
            'quocgia'=>array('quocgia'=>$quocgia),
            'nam'=>array('nam'=>$nam),
            'dangxem'=>array('dangxem'=>$dangxem),
            'catalogPhim'=>$data1
        ]);

        #view('users.catalog.index')

    }
}
