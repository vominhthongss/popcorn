<?php

namespace App\Http\Controllers\Users;

use App\Models\ThanhVien;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    private $path='users.signup';
    function index(){
        $view=$this->path.'.index';

        return view($view);
    }
    function create(Request $request){
        //$view='users.signin.index';
        $hoten=$request->input('hoten');
        $sodienthoai=$request->input('sodienthoai');
        $email=$request->input('email');
        $matkhau=Hash::make($request->input('matkhau'));
        echo $email;
        echo $sodienthoai;
        try {
            ThanhVien::insertThanhVien($hoten,$sodienthoai,$email, $matkhau);
            // DB::table('thanhvien')
            // ->insert([
            //     'THANHVIEN_HOTEN'=>$hoten,
            //     'QUANTRI_ID'=>1,
            //     'THANHVIEN_SODIENTHOAI'=>$sodienthoai,
            //     'THANHVIEN_EMAIL'=>$email,
            //     'THANHVIEN_MATKHAU'=>$matkhau,
            //     'THANHVIEN_TRANGTHAI'=>'Kích hoạt',
            //     'THANHVIEN_ANHDAIDIEN'=>'asset/avatar/no_avatar.png'
            // ]);
            return back()->with('success',"Đăng ký thành công");
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('unsuccess',"Không thành công");
        }
    }
}
