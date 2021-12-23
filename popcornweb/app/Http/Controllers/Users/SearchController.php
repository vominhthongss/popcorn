<?php

namespace App\Http\Controllers\Users;

use App\Models\Phim;
use App\Models\TheLoaiPhim;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $path='users.search';
    #private $soPhanTu=2; //số phần tử trong 1 trang lọc
    function index(Request $request){
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang');
        $keyword=$request->input('keyword');

        $theloaiphim=TheLoaiPhim::getTheLoaiPhim();
        // DB::table('theloaiphim')
        // ->join('phim','theloaiphim.PHIM_ID','=','phim.PHIM_ID')
        // ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        // ->select('phim.PHIM_ID','theloai.THELOAI_TEN')
        // ->get();
        #catalog phim

        $data=Phim::searchPhim($keyword);
        // DB::table('phim')
        // ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        // ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        // ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        // ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        // ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->join('thamgia','phim.PHIM_ID','=','thamgia.PHIM_ID')
        // ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        // ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        // ->select(
        //     'phim.PHIM_ID',
        //     'dotuoi.DOTUOI_TEN',
        //     'quocgia.QUOCGIA_TEN',
        //     'nam.NAM_TEN',
        //     'phanloai.PHANLOAI_TEN',
        //     'phim.PHIM_TEN',
        //     'phim.PHIM_THOILUONG',
        //     'phim.PHIM_TOMTAT',
        //     'phim.PHIM_DIEMIMDB',
        //     'phim.PHIM_URLPOSTER',
        //     'phim.PHIM_TRANGTHAI',
        //     'phim.PHIM_NGAYTHEM',
        //     )
        // ->groupBy(
        //     'phim.PHIM_ID',
        //     'dotuoi.DOTUOI_TEN',
        //     'quocgia.QUOCGIA_TEN',
        //     'nam.NAM_TEN',
        //     'phanloai.PHANLOAI_TEN',
        //     'phim.PHIM_TEN',
        //     'phim.PHIM_THOILUONG',
        //     'phim.PHIM_TOMTAT',
        //     'phim.PHIM_DIEMIMDB',
        //     'phim.PHIM_URLPOSTER',
        //     'phim.PHIM_TRANGTHAI',
        //     'phim.PHIM_NGAYTHEM',
        // )
        // ->where('PHIM_TEN','like','%'.$keyword.'%')
        // ->orWhere('PHIM_TOMTAT','like','%'.$keyword.'%')
        // ->orWhere('THELOAI_TEN','like','%'.$keyword.'%')
        // ->orWhere('DIENVIEN_TEN','like','%'.$keyword.'%')
        // ->orWhere('DAODIEN_TEN','like','%'.$keyword.'%')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->orderByDesc('PHIM_DIEMIMDB')
        // ->paginate($soPhanTuTrongTrang);
        // DB::table('phim')
        // ->join('thamgia','phim.PHIM_ID','=','thamgia.PHIM_ID')
        // ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        // ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        // ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        // ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        // ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select(
        //     'phim.PHIM_ID',
        //     'dotuoi.DOTUOI_TEN',
        //     'quocgia.QUOCGIA_TEN',
        //     'nam.NAM_TEN',
        //     'phanloai.PHANLOAI_TEN',
        //     'phim.PHIM_TEN',
        //     'phim.PHIM_THOILUONG',
        //     'phim.PHIM_TOMTAT',
        //     'phim.PHIM_DIEMIMDB',
        //     'phim.PHIM_URLPOSTER',
        //     'phim.PHIM_TRANGTHAI',
        //     'phim.PHIM_NGAYTHEM',
        //     )
        // ->groupBy(
        //     'phim.PHIM_ID',
        //     'dotuoi.DOTUOI_TEN',
        //     'quocgia.QUOCGIA_TEN',
        //     'nam.NAM_TEN',
        //     'phanloai.PHANLOAI_TEN',
        //     'phim.PHIM_TEN',
        //     'phim.PHIM_THOILUONG',
        //     'phim.PHIM_TOMTAT',
        //     'phim.PHIM_DIEMIMDB',
        //     'phim.PHIM_URLPOSTER',
        //     'phim.PHIM_TRANGTHAI',
        //     'phim.PHIM_NGAYTHEM',
        // )
        // ->where('PHIM_TEN','like','%'.$keyword.'%')
        // ->orWhere('PHIM_TOMTAT','like','%'.$keyword.'%')
        // ->orWhere('THELOAI_TEN','like','%'.$keyword.'%')
        // ->orWhere('DIENVIEN_TEN','like','%'.$keyword.'%')
        // ->orWhere('DAODIEN_TEN','like','%'.$keyword.'%')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->paginate($soPhanTuTrongTrang);
        #view('users.search.index')
        return view($view,[
            'theLoaiPhim'=>$theloaiphim,
            'catalogPhim'=>$data
        ]);
    }
}
