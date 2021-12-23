<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuanTri;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    private $path='admin.signup';
    function index(){

        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $view=$this->path.'.index';
        return view($view);
    }
    function create(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $hoten=$request->input('hoten');
        $sodienthoai=$request->input('sodienthoai');
        $email=$request->input('email');
        $matkhau=Hash::make($request->input('matkhau'));

        try {
            QuanTri::insertQuanTri($hoten,$sodienthoai,$email,$matkhau);
            // DB::table('quantri')
            // ->insert([
            //     'QUANTRI_HOTEN'=>$hoten,
            //     'QUANTRI_SODIENTHOAI'=>$sodienthoai,
            //     'QUANTRI_EMAIL'=>$email,
            //     'QUANTRI_MATKHAU'=>$matkhau,
            //     'QUANTRI_TRANGTHAI'=>'Kích hoạt',
            //     'QUANTRI_VAITRO'=>'Nhân viên'
            // ]);
            return back()->with('success',"Đăng ký thành công");
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('unsuccess',"Không thành công");
        }
    }

}
