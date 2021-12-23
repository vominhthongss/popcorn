<?php

namespace App\Http\Controllers\Users;

use App\Models\GiaGoi;
use App\Models\GoiMua;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class TransactionController extends Controller
{
    private $path='users.transaction';
    function index(){

        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $view=$this->path.'.index';
        if(Cookie::get('id')==false){
            return redirect()->route('404');
        }
        $thanhvien_id=Cookie::get('id');

        $goidamua=GoiMua::getTatCaGoiDaMua($thanhvien_id);
        // DB::table('goimua')
        // ->join('loaigoi','loaigoi.LOAIGOI_ID','=','goimua.LOAIGOI_ID')
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
        // ->orderByDesc('goimua.GOIMUA_NGAYMUA')
        // ->paginate($soPhanTuTrongTrang);
        $giagoi=GiaGoi::getTatCaGiaGoi();
        //DB::table('giagoi')->select('*')->get();

        return view($view,['goiDaMua'=>$goidamua,'giaGoi'=>$giagoi]);
    }

}
