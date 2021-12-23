<?php

namespace App\Http\Controllers\Admin;

use App\Models\LuotXem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class ViewController extends Controller
{
    private $path='admin.view';
    function index(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }

        $view=$this->path.'.index';


        $sapXep="Tuần";
        $nam=date("Y");

        $thongKe=LuotXem::getThongKeLuotXemTuan($nam);
        // DB::select('
        // SELECT WEEK(LUOTXEM_THOIGIAN) AS THONGKE
        // FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
        // GROUP BY WEEK(LUOTXEM_THOIGIAN)
        // ORDER BY THONGKE DESC
        // ',[
        //     $nam
        // ]);

        $thongKeSoLuong=LuotXem::getThongKeLuotXemSoLuongTuan($nam);
        // DB::select('

        // SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
        // FROM
        // (SELECT PHIM_ID,THELOAI_TEN,WEEK(LUOTXEM_THOIGIAN) AS THONGKE
        //     FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
        // GROUP BY THELOAI_TEN,THONGKE
        // ORDER BY THONGKE

        // ',[
        //     $nam
        // ]);

        $cacNam=LuotXem::getCacNam();
        //DB::select('select YEAR(LUOTXEM_THOIGIAN) AS NAM from luotxem GROUP BY YEAR(LUOTXEM_THOIGIAN) ');


        return view($view,[
            'sapXep'=>$sapXep,
            'nam'=>$nam,
            'thongKe'=>$thongKe,
            'thongKeSoLuong'=>$thongKeSoLuong,
            'cacNam'=>$cacNam
        ]);


    }


    function viewfilter(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }

        $view=$this->path.'.index';

        $sapXep=$request->input('sapXep');
        $nam=$request->input('nam');


        if($sapXep=="Tuần"){
            $thongKe=LuotXem::getThongKeLuotXemTuan($nam);
            // DB::select('
            // SELECT WEEK(LUOTXEM_THOIGIAN) AS THONGKE
            // FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
            // GROUP BY WEEK(LUOTXEM_THOIGIAN)
            // ORDER BY THONGKE DESC
            // ',[
            //     $nam
            // ]);

            $thongKeSoLuong=LuotXem::getThongKeLuotXemSoLuongTuan($nam);
            // DB::select('

            // SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
            // FROM
            // (SELECT PHIM_ID,THELOAI_TEN,WEEK(LUOTXEM_THOIGIAN) AS THONGKE
            //     FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
            // GROUP BY THELOAI_TEN,THONGKE
            // ORDER BY THONGKE

            // ',[
            //     $nam
            // ]);


        }
        if($sapXep=="Tháng"){
            $thongKe=LuotXem::getThongKeLuotXemThang($nam);
            // DB::select('
            // SELECT MONTH(LUOTXEM_THOIGIAN) AS THONGKE
            // FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
            // GROUP BY MONTH(LUOTXEM_THOIGIAN)
            // ORDER BY THONGKE DESC
            // ',[
            //     $nam
            // ]);
            $thongKeSoLuong=LuotXem::getThongKeLuotXemSoLuongThang($nam);
            // DB::select('

            // SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
            // FROM
            // (SELECT PHIM_ID,THELOAI_TEN,MONTH(LUOTXEM_THOIGIAN) AS THONGKE
            //     FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
            // GROUP BY THELOAI_TEN,THONGKE
            // ORDER BY THONGKE

            // ',[
            //     $nam
            // ]);

        }
        if($sapXep=="Quý"){
            $thongKe=LuotXem::getThongKeLuotXemQuy($nam);
            // DB::select('
            // SELECT QUARTER(LUOTXEM_THOIGIAN) AS THONGKE
            // FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
            // GROUP BY QUARTER(LUOTXEM_THOIGIAN)
            // ORDER BY THONGKE DESC
            // ',[
            //     $nam
            // ]);

            $thongKeSoLuong=LuotXem::getThongKeLuotXemSoLuongQuy($nam);
            // DB::select('

            // SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
            // FROM
            // (SELECT PHIM_ID,THELOAI_TEN,QUARTER(LUOTXEM_THOIGIAN) AS THONGKE
            //     FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
            // GROUP BY THELOAI_TEN,THONGKE
            // ORDER BY THONGKE

            // ',[
            //     $nam
            // ]);

        }
        if($sapXep=="Năm"){
            $thongKe=LuotXem::getThongKeLuotXemNam($nam);
            // DB::select('
            // SELECT YEAR(LUOTXEM_THOIGIAN) AS THONGKE
            // FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
            // GROUP BY YEAR(LUOTXEM_THOIGIAN)
            // ORDER BY THONGKE DESC
            // ',[
            //     $nam
            // ]);
            $thongKeSoLuong=LuotXem::getThongKeLuotXemSoLuongNam($nam);
            // DB::select('

            // SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
            // FROM
            // (SELECT PHIM_ID,THELOAI_TEN,YEAR(LUOTXEM_THOIGIAN) AS THONGKE
            //     FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
            // GROUP BY THELOAI_TEN,THONGKE
            // ORDER BY THONGKE

            // ',[
            //     $nam
            // ]);

        }
        $cacNam=LuotXem::getCacNam();
        //DB::select('select YEAR(LUOTXEM_THOIGIAN) AS NAM from luotxem GROUP BY YEAR(LUOTXEM_THOIGIAN) ');
        return view($view,[
            'sapXep'=>$sapXep,
            'nam'=>$nam,
            'thongKe'=>$thongKe,
            'thongKeSoLuong'=>$thongKeSoLuong,
            'cacNam'=>$cacNam
        ]);

    }



}
