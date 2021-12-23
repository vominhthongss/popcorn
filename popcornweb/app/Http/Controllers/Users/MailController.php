<?php
namespace App\Http\Controllers\Users;


use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $thanhvien_email=$request->input('thanhvien_email');
        //tạo random token
        $thanhvien_token = Str::random(100);
        //insert vào db
        DB::table('thanhvien')
        ->where('THANHVIEN_EMAIL','=',$thanhvien_email)
        ->update([
            'THANHVIEN_TOKEN'=>$thanhvien_token
        ]);

        $objDemo = new \stdClass();
        $objDemo->thanhvien_email = $thanhvien_email;
        $objDemo->thanhvien_token = $thanhvien_token;


        $objDemo->sender = 'HoTroPopCorn';
        $objDemo->receiver = 'Vo Minh Thong';

        $row=DB::select('select count(*) COUNT from thanhvien where THANHVIEN_EMAIL = ?', [
            $request->input('thanhvien_email')

        ]);
        $count=0;
        foreach($row as $i){
            $count=$i->COUNT;
        }
        if($count==0){
            return back()->with('unsuccess','Không thấy email này !');
        }
        else{
            Mail::to($thanhvien_email)->send(new ResetPassword($objDemo));
        }
        return back()->with('success','Không thấy email này !');;
    }
    public function confirmtoken(Request $request){
        //nếu token đúng trong db thì chuyển hướng qua
        // echo $request->input('thanhvien_email');
        // echo $request->input('thanhvien_token');
        $row=DB::select('select count(*) COUNT from thanhvien where THANHVIEN_EMAIL = ? and THANHVIEN_TOKEN = ?', [
            $request->input('thanhvien_email'),
            $request->input('thanhvien_token')

        ]);
        $count=0;
        foreach($row as $i){
            $count=$i->COUNT;
        }
        if($count==1){
            return view('users.resetpassword.index',['thanhvien_email'=>$request->input('thanhvien_email')]);
        }
        //Nếu không đúng token sẽ không hiển thị trang cho đổi password
        else{
            return view('users.404.index');
        }


    }

    public function resetpassword(Request $request){
        $thanhvien_email=$request->input('thanhvien_email');
        $thanhvien_matkhau=$request->input('thanhvien_matkhau');
        $thanhvien_matkhau2=$request->input('thanhvien_matkhau');

        if($thanhvien_matkhau==$thanhvien_matkhau2){
            $matkhau=Hash::make($thanhvien_matkhau);
            //Đổi mật khẩu
            DB::table('thanhvien')->where('THANHVIEN_EMAIL','=',$thanhvien_email)
            ->update([
                'THANHVIEN_MATKHAU'=>$matkhau
            ]);
            //Đổi lại token
            DB::table('thanhvien')->where('THANHVIEN_EMAIL','=',$thanhvien_email)
            ->update([
                'THANHVIEN_TOKEN'=>''
            ]);
            return view('users.resetpassword.success');

        }


    }
}
