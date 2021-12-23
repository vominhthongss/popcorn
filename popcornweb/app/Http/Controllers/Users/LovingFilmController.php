<?php

namespace App\Http\Controllers\Users;

use App\Models\Phim;
use App\Models\TheLoaiPhim;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LovingFilmController extends Controller
{
    private $path='users.lovingfilm';
    // function index(Request $request){
    function index(){

        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang');
        //$thanhvien_id=$request->input('thanhvien_id');

        $thanhvien_id=Cookie::get('id');
        if(Cookie::get('id')==false){
            return redirect()->route('404');
        }
        $theloaiphim=TheLoaiPhim::getTheLoaiPhim();
        #catalog phim
        $catalogphimyeuthich=Phim::getCatalogPhimYeuThich($thanhvien_id);
        return view($view,[
            'theLoaiPhim'=>$theloaiphim,
            'catalogPhim'=>$catalogphimyeuthich,
        ]);

    }

}
