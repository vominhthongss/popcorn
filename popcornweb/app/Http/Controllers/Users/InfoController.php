<?php

namespace App\Http\Controllers\Users;

use App\Models\GoiMua;
use App\Models\ThanhVien;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class InfoController extends Controller
{
    private $path='users.info';
    // function index(Request $request){
    //     $view=$this->path.'.index';
    //     $thanhvien_id=$request->input('thanhvien_id');

    //     $data=DB::table('thanHvien')->select('*')->where('THANHVIEN_ID','=',$thanhvien_id)->get();

    //     return view($view,['thongTinCaNhan'=>$data]);
    // }

    function index(){
        $view=$this->path.'.index';
        $thanhvien_id=Cookie::get('id');
        if(Cookie::get('id')==false){
            return redirect()->route('404');
        }
        $data=ThanhVien::getThanhVienInfo($thanhvien_id);
        //DB::table('thanhvien')->select('*')->where('THANHVIEN_ID','=',$thanhvien_id)->get();


        // $goidamua=DB::table('loaigoi','goimua')
        // ->join('loaigoi','loaigoi.LOAIGOI_ID','=','goimua.LOAIGOI_ID')
        // ->join('chatluong','loaigoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
        // ->join('sothang','loaigoi.SOTHANG_ID','=','sothang.SOTHANG_ID')
        // ->select(

        //     'loaigoi.LOAIGOI_ID',
        //     'loaigoi.CHATLUONG_ID',
        //     'loaigoi.SOTHANG_ID',
        //     'loaigoi.LOAIGOI_TEN',
        //     'loaigoi.LOAIGOI_THONGTIN',
        //     'goimua.GOIMUA_ID',
        //     'goimua.GOIMUA_NGAYMUA',
        //     'goimua.GOIMUA_NGAYHETHAN',
        //     'goimua.GOIMUA_TRANGTHAI'
        // )
        // ->where('goimua.THANHVIEN_ID','=',$thanhvien_id)
        // ->where('goimua.GOIMUA_TRANGTHAI','=','Đang sử dụng')
        // ->where('goimua.GOIMUA_NGAYHETHAN','>=',date('Y-m-d'))
        // ->get();

        $goidamua=GoiMua::getGoiMua($thanhvien_id);
        // DB::select('
        // SELECT * FROM goimua as A,loaigoi as B, chatluong as C, sothang as D
        // WHERE A.LOAIGOI_ID=B.LOAIGOI_ID and C.CHATLUONG_ID=B.CHATLUONG_ID and D.SOTHANG_ID=B.SOTHANG_ID
        // and A.THANHVIEN_ID=? and A.GOIMUA_TRANGTHAI=? and A.GOIMUA_NGAYHETHAN >= ?
        // ',
        // [
        //     $thanhvien_id,
        //     'Đang sử dụng',
        //     date('Y-m-d'),

        // ]);

        // $count=DB::table(DB::raw('goimua','goi'))
        // ->join('goi','goi.GOI_ID','=','goimua.GOI_ID')
        // ->where('goimua.THANHVIEN_ID','=',$thanhvien_id)
        // ->where('goimua.GOIMUA_NGAYHETHAN','>=',date('Y-m-d'))
        // ->where('goimua.GOIMUA_TRANGTHAI','=','Đang sử dụng')
        // ->count();
        $count=GoiMua::getSoGoiMua($thanhvien_id);
        // DB::select('
        // SELECT count(*) FROM goimua as A,loaigoi as B, chatluong as C, sothang as D
        // WHERE A.LOAIGOI_ID=B.LOAIGOI_ID and C.CHATLUONG_ID=B.CHATLUONG_ID and D.SOTHANG_ID=B.SOTHANG_ID
        // and A.THANHVIEN_ID=? and A.GOIMUA_TRANGTHAI=? and A.GOIMUA_NGAYHETHAN >= ?
        // ',
        // [
        //     $thanhvien_id,
        //     'Đang sử dụng',
        //     date('Y-m-d'),

        // ]);

        return view($view,['thongTinCaNhan'=>$data,'goiDaMua'=>$goidamua,'soGoi'=>$count]);
    }



    function changepass(Request $request){
        // $view=$this->path.'.index';
        $thanhvien_id=$request->input('thanhvien_id');
        $oldpass=$request->input('oldpass');
        $newpass=$request->input('newpass');
        $confirmpass=$request->input('confirmpass');

        $matkhauxacthuc="-999";
        $data=ThanhVien::getPassThanhVien($thanhvien_id);
        // DB::table('thanhvien')
        // ->select('THANHVIEN_MATKHAU')
        // ->where('THANHVIEN_ID','=',$thanhvien_id)
        // ->get();
        foreach($data as $i){
            $matkhauxacthuc=$i->THANHVIEN_MATKHAU;
        }

        if ($newpass!=$confirmpass){
            return back()->with('unsuccess1','Đổi mật khẩu KHÔNG thành công');
        }
        if (Hash::check($oldpass, $matkhauxacthuc)) {

            $matkhau=Hash::make($newpass);
            try {
                ThanhVien::updatePassThanhVien($thanhvien_id,$matkhau);
                // DB::table('thanhvien')
                // ->where('THANHVIEN_ID','=',$thanhvien_id)
                // ->update([
                //     'THANHVIEN_MATKHAU'=>$matkhau,
                // ]);
                return back()->with('success1','Đổi mật khẩu thành công');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('unsuccess3','Đổi mật khẩu KHÔNG thành công');
            }
        }

           // return back()->with('success','Đổi mật khẩu thành công');

        else{
            return back()->with('unsuccess2','Đổi mật khẩu KHÔNG thành công');
        }


    }
    function changeinfo(Request $request){
        $thanhvien_id=$request->input('thanhvien_id');
        $email=$request->input('email');
        $sodienthoai=$request->input('sodienthoai');
        $hoten=$request->input('hoten');
        DB::beginTransaction();
        try {
            ThanhVien::updateThanhVienInfo($thanhvien_id,$email,$sodienthoai,$hoten);
            // DB::table('thanhvien')
            // ->where('THANHVIEN_ID','=',$thanhvien_id)
            // ->update([
            //     'THANHVIEN_EMAIL'=>$email,
            //     'THANHVIEN_SODIENTHOAI'=>$sodienthoai,
            //     'THANHVIEN_HOTEN'=>$hoten
            // ]);


            if(Cookie::get('ghinho')=='1'){
                Cookie::queue(Cookie::forever('hoten', $hoten));
            }
            else{
                Cookie::queue('hoten', $hoten, 0);
            }
            DB::commit();
            return back()->with('success2','Chỉnh sửa thông tin thành công');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return back()->with('unsuccess4','Chỉnh sửa thông tin KHÔNG thành công');
        }

    }
    function changeavt(Request $request){
        $thanhvien_id=Cookie::get('id');
        DB::beginTransaction();
        try{
            if($request->hasFile('avatar'))
            {

                $file=$request->file('avatar');
                //$filename = $file->getClientOriginalName();
                $filename=$thanhvien_id.'.'.$file->extension();
                $path = 'asset/avatar/';
                if(File::exists($path)) {
                    File::delete($path);
                }
                $file->move($path, $filename);
                ThanhVien::updateAvtThanhVien($thanhvien_id,$path.$filename);
                // DB::table('thanhvien')
                // ->where('THANHVIEN_ID','=',$thanhvien_id)
                // ->update(['THANHVIEN_ANHDAIDIEN'=>$path.$filename]);

                DB::commit();
            }
            DB::commit();
            return back()->with('success3','Đổi ảnh đại diện thành công');

        } catch (\Exception $ex) {
            DB::rollback();
            return back()->with('unsuccess5','Đổi ảnh đại diện KHÔNG thành công');
        }
    }
    #Request $request
    function deleteavt(){
        $thanhvien_id=Cookie::get('id');
        DB::beginTransaction();
        try{
            ThanhVien::deleteAvtThanhVien($thanhvien_id);
            // DB::table('thanhvien')
            // ->where('THANHVIEN_ID','=',$thanhvien_id)
            // ->update(['THANHVIEN_ANHDAIDIEN'=>'asset/avatar/no_avatar.png']);
            DB::commit();
            return back()->with('success4','Xóa ảnh đại diện thành công');

        } catch (\Exception $ex) {
                DB::rollback();
                return back()->with('unsuccess6','Xóa ảnh đại diện KHÔNG thành công');
        }
    }
    function deleteaccount(Request $request){
        $thanhvien_id=Cookie::get('id');
        $thanhvien_matkhau=$request->input('thanhvien_matkhau');
        try {
            $data=ThanhVien::getThanhVienInfo($thanhvien_id);
            // DB::table('thanhvien')
            // ->select('*')
            // ->where('THANHVIEN_ID','=',$thanhvien_id)
            // ->get();
            $matkhauxacthuc="-999";
            foreach($data as $i){
                $matkhauxacthuc=$i->THANHVIEN_MATKHAU;
            }
            if($matkhauxacthuc=="-999"){
                return back()->with('unsuccess7',"Không thành công, mật khẩu xác nhận sai");
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('unsuccess7',"Không thành công, mật khẩu xác nhận sai");
        }
        if (Hash::check($thanhvien_matkhau, $matkhauxacthuc)) {
            ThanhVien::deleteAccountThanhVien($thanhvien_id);
            // DB::table('thanhvien')
            // ->where('THANHVIEN_ID','=',$thanhvien_id)
            // ->delete();

            Cookie::queue(Cookie::forget('id'));
            Cookie::queue(Cookie::forget('hoten'));
            Cookie::queue(Cookie::forget('anhdaidien'));
            Cookie::queue(Cookie::forget('ghinho'));
            session()->forget('goixemphim');
            session()->forget('ngayhethan');
            return redirect()->route('home');
        }

    }

}
