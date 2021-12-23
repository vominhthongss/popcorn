<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhGia;
use App\Models\KhieuNaiDanhGia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    private $path='admin.reviews';
    function index(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');

        $danhgia_tatca=DanhGia::getReviews();
        // DB::table(DB::raw('danhgia','thanhvien','phim'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->join('phim','danhgia.PHIM_ID','=','phim.PHIM_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO',
        //     'phim.PHIM_ID',
        //     'phim.PHIM_TEN'
        // )
        // ->orderByDesc('DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);

        $cacbaocao=KhieuNaiDanhGia::getKhieuNaiDanhGia();
        //DB::table('khieunaidanhgia')->select('*')->get();


        return view($view,['danhGiaTatCa'=>$danhgia_tatca,'sapXep'=>'Ngày giờ','cacBaoCao'=>$cacbaocao]);
    }

    function datereview(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $danhgia_tatca=DanhGia::getReviews();
        // DB::table(DB::raw('danhgia','thanhvien','phim'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->join('phim','danhgia.PHIM_ID','=','phim.PHIM_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO',
        //     'phim.PHIM_ID',
        //     'phim.PHIM_TEN'
        // )
        // ->orderByDesc('DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);
        $cacbaocao=KhieuNaiDanhGia::getKhieuNaiDanhGia();
        //DB::table('khieunaidanhgia')->select('*')->get();
        return view($view,['danhGiaTatCa'=>$danhgia_tatca,'sapXep'=>'Ngày giờ','cacBaoCao'=>$cacbaocao]);
    }
    function ratereview(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $danhgia_tatca=DanhGia::getReviewsRate();
        // DB::table(DB::raw('danhgia','thanhvien','phim'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->join('phim','danhgia.PHIM_ID','=','phim.PHIM_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO',
        //     'phim.PHIM_ID',
        //     'phim.PHIM_TEN'
        // )
        // ->orderByDesc('DANHGIA_SOSAO')
        // ->paginate($soPhanTuTrongTrang);
        $cacbaocao=KhieuNaiDanhGia::getKhieuNaiDanhGia();
        //DB::table('khieunaidanhgia')->select('*')->get();
        return view($view,['danhGiaTatCa'=>$danhgia_tatca,'sapXep'=>'Số sao','cacBaoCao'=>$cacbaocao]);
    }
    function findreview(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $keyword=$request->input('keyword');

        $danhgia_tatca=DanhGia::findReviews($keyword);
        // DB::table(DB::raw('danhgia','thanhvien','phim'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->join('phim','danhgia.PHIM_ID','=','phim.PHIM_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO',
        //     'phim.PHIM_ID',
        //     'phim.PHIM_TEN'
        // )
        // ->where('DANHGIA_NOIDUNG','like','%'.$keyword.'%')
        // ->orWhere('THANHVIEN_HOTEN','like','%'.$keyword.'%')
        // ->orWhere('PHIM_TEN','like','%'.$keyword.'%')
        // ->orderBy('THANHVIEN_ID')
        // ->orderByDesc('DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);

        $cacbaocao=KhieuNaiDanhGia::getKhieuNaiDanhGia();
        //DB::table('khieunaidanhgia')->select('*')->get();
        return view($view,['danhGiaTatCa'=>$danhgia_tatca,'sapXep'=>'Ngày giờ','cacBaoCao'=>$cacbaocao]);
    }
    function deletereview(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $thanhvien_id=$request->input('thanhvien_id');
        $phim_id =$request->input('phim_id');
        $cacbaocao=KhieuNaiDanhGia::getKhieuNaiDanhGia();
        //DB::table('khieunaidanhgia')->select('*')->get();

        // DB::table('danhgia')
        // ->where('THANHVIEN_ID','=',$thanhvien_id)
        // ->where('PHIM_ID','=',$phim_id)
        // ->delete();
        DanhGia::deleteDanhGia($thanhvien_id,$phim_id);

        return back();
    }

}
