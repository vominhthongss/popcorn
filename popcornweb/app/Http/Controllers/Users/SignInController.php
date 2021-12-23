<?php

namespace App\Http\Controllers\Users;

use App\Models\GoiMua;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\ThanhVien;
class SignInController extends Controller
{
    private $path='users.signin';
    function index(){
        return view($this->path.'.index');
    }
    function auth(Request $request){
        $view='users.home.index';
        $email=$request->input('email');
        $matkhau=$request->input('matkhau');
        $ghinho=$request->input('remember');
        try {
            $data=ThanhVien::getThanhVien($email);
            // DB::table('thanhvien')
            // ->select('*')
            // ->where('THANHVIEN_EMAIL','=',$email)
            // ->where('THANHVIEN_TRANGTHAI','=','Kích hoạt')
            // ->get();
            $matkhauxacthuc="-999";
            $id="-999";
            foreach($data as $i){
                $id=$i->THANHVIEN_ID;
                $hoten=$i->THANHVIEN_HOTEN;
                $anhdaidien=$i->THANHVIEN_ANHDAIDIEN;
                $matkhauxacthuc=$i->THANHVIEN_MATKHAU;
            }
            if($matkhauxacthuc=="-999"){
                return back()->with('unsuccess1',"Không thành công, sai email");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('unsuccess1',"Không thành công, sai email");
        }
        if (Hash::check($matkhau, $matkhauxacthuc)) {
            echo $ghinho;

            $goidamua=GoiMua::getGoiDaMua($id);
            // DB::table('goimua')
            // ->join('loaigoi','loaigoi.LOAIGOI_ID','=','goimua.LOAIGOI_ID')
            // ->join('chatluong','loaigoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
            // ->select(
            //     'chatluong.CHATLUONG_DIENGIAI',
            //     'goimua.GOIMUA_NGAYHETHAN'
            // )
            // ->where('goimua.THANHVIEN_ID','=',$id)
            // ->where('goimua.GOIMUA_TRANGTHAI','=','Đang sử dụng')
            // ->get();

            $chatluong="-999";
            $ngayhethan="-999";
            foreach($goidamua as $j){
                $chatluong=$j->CHATLUONG_DIENGIAI;
                $ngayhethan=$j->GOIMUA_NGAYHETHAN;
            }

            // nếu ghi nhớ bằng "on" thì sẽ lưu thông tin lại, còn không sẽ không lưu khi tắt trình duyệt
            if($ghinho=="on"){
                Cookie::queue(Cookie::forever('id', $id));
                Cookie::queue(Cookie::forever('hoten', $hoten));
                Cookie::queue(Cookie::forever('ghinho', '1'));
                if($chatluong=="480"){
                    #Cookie::queue(Cookie::forever('goixemphim', config('allparameters.goiCoBan')));
                    #Sửa
                    session()->put('goixemphim',1);

                }
                else if($chatluong=="720"){
                    #Cookie::queue(Cookie::forever('goixemphim', config('allparameters.goiPremium')));
                    #Sửa
                    session()->put('goixemphim',2);
                }
                else if($chatluong=="1080"){
                    #Cookie::queue(Cookie::forever('goixemphim', config('allparameters.goiCaoCap')));
                    #Sửa
                    session()->put('goixemphim',3);
                }
                else{
                    #Cookie::queue(Cookie::forever('goixemphim', 0));
                    #Sửa
                    session()->put('goixemphim',0);
                }
                #Cookie::queue(Cookie::forever('ngayhethan', $ngayhethan));
                #Sửa
                session()->put('ngayhethan',$ngayhethan);
                return redirect()->route('home');


            }
            else{
                Cookie::queue('id', $id, 0);
                Cookie::queue('hoten', $hoten, 0);
                Cookie::queue('anhdaidien', '0', 0);
                Cookie::queue('ghinho', '0',0);
                if($chatluong=="480"){
                    #Cookie::queue('goixemphim', config('allparameters.goiCoBan'),0);
                    #Sửa
                    session()->put('goixemphim',1);
                }
                else if($chatluong=="720"){
                    #Cookie::queue('goixemphim', config('allparameters.goiPremium'),0);
                    #Sửa
                    session()->put('goixemphim',2);
                }
                else if($chatluong=="1080"){
                    #Cookie::queue('goixemphim', config('allparameters.goiCaoCap'),0);
                    #Sửa
                    session()->put('goixemphim',0);
                }
                else{
                    #$Cookie::queue('goixemphim', 0 , 0);
                    session()->put('goixemphim',0);
                }
                #Cookie::queue('ngayhethan', $ngayhethan, 0);
                #Sửa
                session()->put('ngayhethan',$ngayhethan);
                return redirect()->route('home');
            }


        }
        else{
            return back()->with('unsuccess2',"Không thành công, sai mật khẩu");;
        }




    }
    function logout(){
        Cookie::queue(Cookie::forget('id'));
        Cookie::queue(Cookie::forget('hoten'));
        Cookie::queue(Cookie::forget('ghinho'));
        #Cookie::queue(Cookie::forget('goixemphim'));
        #Cookie::queue(Cookie::forget('ngayhethan'));
        session()->forget('goixemphim');
        session()->forget('ngayhethan');
        return redirect()->route('home');
    }
}
