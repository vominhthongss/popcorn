<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuanTri;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class SignInController extends Controller
{
    private $path='admin.signin';
    function index(){
        return view($this->path.'.index');
    }
    function auth(Request $request){
        $view=$this->path.'.index';
        $email=$request->input('email');
        $matkhau=$request->input('matkhau');
        //$ghinho=$request->input('remember');
        try {
            $data=QuanTri::getQuanTri($email);
            // DB::table('quantri')
            // ->select('*')
            // ->where('QUANTRI_EMAIL','=',$email)
            // ->where('QUANTRI_TRANGTHAI','=','Kích hoạt')
            // ->get();

            $matkhauxacthuc="-999";
            $id="-999";
            foreach($data as $i){
                $id=$i->QUANTRI_ID;
                $hoten=$i->QUANTRI_HOTEN;
                $vaitro=$i->QUANTRI_VAITRO;
                $matkhauxacthuc=$i->QUANTRI_MATKHAU;
            }
            if($matkhauxacthuc=="-999"){
                return back()->with('unsuccess1',"Không thành công, sai email");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('unsuccess1',"Không thành công, sai email");
        }
        if (Hash::check($matkhau, $matkhauxacthuc)) {
            Cookie::queue('adminid', $id, 0);
            Cookie::queue('adminhoten', $hoten, 0);
            session()->put('adminvaitro',$vaitro);
           // Cookie::queue('adminghinho', '0',0);
            return redirect()->route('admindashboard');
            // nếu ghi nhớ bằng "on" thì sẽ lưu thông tin lại, còn không sẽ không lưu khi tắt trình duyệt
            // if($ghinho=="on"){
            //     Cookie::queue(Cookie::forever('adminid', $id));
            //     Cookie::queue(Cookie::forever('adminhoten', $hoten));
            //     Cookie::queue(Cookie::forever('adminghinho', '1'));
            //     return redirect()->route('admindashboard');


            // }
            // else{
            //     Cookie::queue('adminid', $id, 0);
            //     Cookie::queue('adminhoten', $hoten, 0);
            //     Cookie::queue('adminghinho', '0',0);
            //     return redirect()->route('admindashboard');
            // }


        }
        else{
            return back()->with('unsuccess2',"Không thành công, sai mật khẩu");;
        }




    }
    function logout(){
        Cookie::queue(Cookie::forget('adminid'));
        Cookie::queue(Cookie::forget('adminhoten'));
        session()->forget('adminvaitro');
        return redirect()->route('adminsignin');
    }
}
