<?php

namespace App\Http\Controllers\Users;

use App\Models\GiaGoi;
use App\Models\LoaiGoi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
class PricingController extends Controller
{
    private $path='users.pricing';
    function index(){
        $view=$this->path.'.index';
        $goi=LoaiGoi::getTatCaLoaiGoi();
        // DB::table('loaigoi')
        // ->join('chatluong','loaigoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
        // ->join('sothang','loaigoi.SOTHANG_ID','=','sothang.SOTHANG_ID')
        // ->select('LOAIGOI_ID','LOAIGOI_TEN','LOAIGOI_THONGTIN','CHATLUONG_DIENGIAI','SOTHANG_DIENGIAI')
        // ->get();

        $giagoi=GiaGoi::getGiaGoi();
        // DB::table('giagoi')
        // ->join('chatluong','giagoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
        // ->join('sothang','giagoi.SOTHANG_ID','=','sothang.SOTHANG_ID')
        // ->select('GIAGOI','CHATLUONG_DIENGIAI','SOTHANG_DIENGIAI')
        // ->get();

        return view($view,['loaigoi'=>$goi,'giaGoi'=>$giagoi]);
    }


}
