<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuanTri;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StaffAccountController extends Controller
{
    private $path='admin.staffaccount';
    function index(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');

        $danhsachnhanvien=QuanTri::getDanhSachNhanVien();
        // DB::table('quantri')
        // ->select('*')
        // ->where('QUANTRI_VAITRO','!=','Admin')
        // ->orderBy('QUANTRI_ID')
        // ->paginate($soPhanTuTrongTrang);

        return view($view,['danhSachNhanVien'=>$danhsachnhanvien,'sapXep'=>'ID']);
    }
    function staffidsort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');

        $danhsachnhanvien=QuanTri::getDanhSachNhanVien();
        // DB::table('quantri')
        // ->select('*')
        // ->where('QUANTRI_VAITRO','!=','Admin')
        // ->orderBy('QUANTRI_ID')
        // ->paginate($soPhanTuTrongTrang);

        return view($view,['danhSachNhanVien'=>$danhsachnhanvien,'sapXep'=>'ID']);
    }
    function staffnamesort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');

        $danhsachnhanvien=QuanTri::getDanhSachNhanVienName();
        // DB::table('quantri')
        // ->select('*')
        // ->where('QUANTRI_VAITRO','!=','Admin')
        // ->orderBy('QUANTRI_HOTEN')
        // ->paginate($soPhanTuTrongTrang);

        return view($view,['danhSachNhanVien'=>$danhsachnhanvien,'sapXep'=>'Họ tên']);
    }
    function staffstatussort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');

        $danhsachnhanvien=QuanTri::getDanhSachNhanVienStatus();
        // DB::table('quantri')
        // ->select('*')
        // ->where('QUANTRI_VAITRO','!=','Admin')
        // ->orderBy('QUANTRI_TRANGTHAI')
        // ->paginate($soPhanTuTrongTrang);

        return view($view,['danhSachNhanVien'=>$danhsachnhanvien,'sapXep'=>'Trạng thái']);
    }
    function stafffind(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $keyword=$request->input('keyword');
        $danhsachnhanvien=QuanTri::findNhanVien($keyword);
        // DB::table('quantri')
        // ->select('*')
        // ->where('QUANTRI_VAITRO','!=','Admin')
        // ->where(function($query) use ($keyword){
        //     $query->where('QUANTRI_EMAIL','like','%'.$keyword.'%')
        //         ->orWhere('QUANTRI_HOTEN','like','%'.$keyword.'%')
        //         ->orWhere('QUANTRI_SODIENTHOAI','like','%'.$keyword.'%');
        // })
        // ->orderBy('QUANTRI_ID')
        // ->paginate($soPhanTuTrongTrang);

        return view($view,['danhSachNhanVien'=>$danhsachnhanvien,'sapXep'=>'ID']);
    }
    function staffedit($quantri_id){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $view=$this->path.'.staffedit';


        $nhanvien=QuanTri::getNhanVien($quantri_id);
        // DB::table('quantri')
        // ->select('*')
        // ->where('QUANTRI_ID','=',$quantri_id)
        // ->orderBy('QUANTRI_ID')
        // ->get();

        return view($view,['nhanVien'=>$nhanvien]);

    }
    function staffedited(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $quantri_id=$request->input('quantri_id');
        $quantri_hoten=$request->input('quantri_hoten');
        $quantri_email=$request->input('quantri_email');
        $quantri_sodienthoai=$request->input('quantri_sodienthoai');
        $quantri_vaitro=$request->input('quantri_vaitro');
        QuanTri::editNhanVien($quantri_id,$quantri_hoten,$quantri_email,$quantri_sodienthoai,$quantri_vaitro);
        // DB::table('quantri')
        // ->where('QUANTRI_ID','=',$quantri_id)
        // ->update([
        //     'QUANTRI_HOTEN'=>$quantri_hoten,
        //     'QUANTRI_EMAIL'=>$quantri_email,
        //     'QUANTRI_SODIENTHOAI'=>$quantri_sodienthoai,
        //     'QUANTRI_VAITRO'=>$quantri_vaitro
        // ]);

        return back();
    }
    function staffchangepass(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $quantri_id=$request->input('quantri_id');
        $quantri_matkhau=$request->input('quantri_matkhau');
        $quantri_matkhau2=$request->input('quantri_matkhau2');
        if($quantri_matkhau==$quantri_matkhau2){
            $matkhau=Hash::make($quantri_matkhau);
            QuanTri::changePassNhanVien($quantri_id,$matkhau);
            // DB::table('quantri')
            // ->where('QUANTRI_ID','=',$quantri_id)
            // ->update([
            //     'QUANTRI_MATKHAU'=>$matkhau
            // ]);
            return back()->with('success','Đổi thành công mật khẩu');
        }else{
            return back()->with('unsuccess','Hai mật khẩu không khớp nhau !');;
        }

    }
    function stafflock(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $quantri_id = $request->input('quantri_id');
        QuanTri::lockNhanVien($quantri_id);
        // DB::table('quantri')
        // ->where('QUANTRI_ID','=',$quantri_id)
        // ->update(['QUANTRI_TRANGTHAI'=>'Khóa']);

        return back();
    }
    function staffunlock(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $quantri_id = $request->input('quantri_id');
        QuanTri::unlockNhanVien($quantri_id);
        // DB::table('quantri')
        // ->where('QUANTRI_ID','=',$quantri_id)
        // ->update(['QUANTRI_TRANGTHAI'=>'Kích hoạt']);

        return back();
    }
    function staffdelete(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $quantri_id = $request->input('quantri_id');
        QuanTri::deleteNhanVien($quantri_id);
        // DB::table('quantri')
        // ->where('QUANTRI_ID','=',$quantri_id)
        // ->delete();

        return back();
    }

}
