<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThanhVien;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserAccountController extends Controller
{
    private $path='admin.useraccount';
    function index(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $danhsachthanhvien=ThanhVien::getDanhSachThanhVien();

        // DB::table('thanhvien')
        // ->select('*')
        // ->orderBy('THANHVIEN_ID')
        // ->paginate($soPhanTuTrongTrang);

        return view($view,['danhSachThanhVien'=>$danhsachthanhvien,'sapXep'=>'ID']);
    }
    function userfind(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }

        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');

        $keyword = $request->input('keyword');

        $danhsachthanhvien=ThanhVien::findDanhSachThanhVien($keyword);
        // DB::table('thanhvien')
        // ->select('*')
        // ->where('THANHVIEN_EMAIL','like','%'.$keyword.'%')
        // ->orWhere('THANHVIEN_HOTEN','like','%'.$keyword.'%')
        // ->orWhere('THANHVIEN_SODIENTHOAI','like','%'.$keyword.'%')
        // ->orderBy('THANHVIEN_ID')
        // ->paginate($soPhanTuTrongTrang);

        return view($view,['danhSachThanhVien'=>$danhsachthanhvien,'sapXep'=>'ID']);
    }
    function useridsort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $danhsachthanhvien=ThanhVien::getDanhSachThanhVien();
        // DB::table('thanhvien')
        // ->select('*')
        // ->orderBy('THANHVIEN_ID')
        // ->paginate($soPhanTuTrongTrang);
        return view($view,['danhSachThanhVien'=>$danhsachthanhvien,'sapXep'=>'ID']);
    }
    function usernamesort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $danhsachthanhvien=ThanhVien::getDanhSachThanhVienName();
        // DB::table('thanhvien')
        // ->select('*')
        // ->orderBy('THANHVIEN_HOTEN')
        // ->paginate($soPhanTuTrongTrang);
        return view($view,['danhSachThanhVien'=>$danhsachthanhvien,'sapXep'=>'Họ tên']);
    }
    function userstatussort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $danhsachthanhvien=ThanhVien::getDanhSachThanhVienStatus();
        // DB::table('thanhvien')
        // ->select('*')
        // ->orderBy('THANHVIEN_TRANGTHAI')
        // ->paginate($soPhanTuTrongTrang);
        return view($view,['danhSachThanhVien'=>$danhsachthanhvien,'sapXep'=>'Trạng thái']);
    }
    function useredit(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }

        $view=$this->path.'.useredit';
        return view($view);
    }
    function userlock(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $thanhvien_id = $request->input('thanhvien_id');
        ThanhVien::lock($thanhvien_id);
        // DB::table('thanhvien')
        // ->where('THANHVIEN_ID','=',$thanhvien_id)
        // ->update(['THANHVIEN_TRANGTHAI'=>'Khóa']);

        return back();
    }
    function userunlock(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        $thanhvien_id = $request->input('thanhvien_id');
        ThanhVien::unlock($thanhvien_id);
        // DB::table('thanhvien')
        // ->where('THANHVIEN_ID','=',$thanhvien_id)
        // ->update(['THANHVIEN_TRANGTHAI'=>'Kích hoạt']);

        return back();
    }

}
