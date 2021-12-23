<?php

namespace App\Http\Controllers\Admin;

use App\Models\GiaGoi;
use App\Models\GoiMua;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class StatisticalController extends Controller
{
    private $path='admin.statistical';
    function index(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }

        $view=$this->path.'.index';


        $sapXep="Tuần";
        $nam=date("Y");

        $thongKe=GoiMua::getThongKeTuan($nam);

        // DB::select('SELECT

        // week(GOIMUA_NGAYMUA) as THONGKE

        // FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
        //     $nam
        // ]);

        $thongKeSoLuong=GoiMua::getThongKeSoLuongTuan($nam);

        // DB::select('
        // SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
        //     SELECT

        //     week(GOIMUA_NGAYMUA) as THONGKE,

        //     B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
        //     WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
        //     ORDER BY THONGKE) AS C
        // GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
        // ',[
        //     $nam
        // ]);

        $giaGoi1=GiaGoi::getGoiCoBan();
        // DB::select('
        // SELECT GIAGOI FROM
        //     (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
        //         WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
        //         ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói cơ bản"

        // ');
        foreach($giaGoi1 as $i){
            $giaCoBan=$i->GIAGOI;
        }
        $giaGoi2=GiaGoi::getGoiPremium();
        // DB::select('
        // SELECT GIAGOI FROM
        //     (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
        //         WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
        //         ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói premium"

        // ');
        foreach($giaGoi2 as $i){
            $giaPremium=$i->GIAGOI;
        }
        $giaGoi3=GiaGoi::getGoiCaoCap();
        // DB::select('
        // SELECT GIAGOI FROM
        //     (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
        //         WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
        //         ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói cao cấp"

        // ');
        foreach($giaGoi3 as $i){
            $giaCaoCap=$i->GIAGOI;
        }
        $cacNam=GoiMua::cacNam();
        // DB::select('
        // SELECT year(GOIMUA_NGAYMUA) as NAM FROM `goimua` GROUP BY NAM ORDER BY NAM
        // ');

        return view($view,[
            'sapXep'=>$sapXep,
            'nam'=>$nam,
            'thongKe'=>$thongKe,
            'thongKeSoLuong'=>$thongKeSoLuong,
            'giaCoBan'=>$giaCoBan,
            'giaPremium'=>$giaPremium,
            'giaCaoCap'=>$giaCaoCap,
            'cacNam'=>$cacNam
        ]);


    }

    function statisticalfilter(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }

        $view=$this->path.'.index';

        $sapXep=$request->input('sapXep');
        $nam=$request->input('nam');

        $giaGoi1=GiaGoi::getGoiCoBan();
        // DB::select('
        // SELECT GIAGOI FROM
        //     (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
        //         WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
        //         ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói cơ bản"

        // ');
        foreach($giaGoi1 as $i){
            $giaCoBan=$i->GIAGOI;
        }
        $giaGoi2=GiaGoi::getGoiPremium();
        // DB::select('
        // SELECT GIAGOI FROM
        //     (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
        //         WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
        //         ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói premium"

        // ');
        foreach($giaGoi2 as $i){
            $giaPremium=$i->GIAGOI;
        }
        $giaGoi3=GiaGoi::getGoiCaoCap();
        // DB::select('
        // SELECT GIAGOI FROM
        //     (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
        //         WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
        //         ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói cao cấp"

        // ');
        foreach($giaGoi3 as $i){
            $giaCaoCap=$i->GIAGOI;
        }
        $cacNam=GoiMua::cacNam();
        // DB::select('
        // SELECT year(GOIMUA_NGAYMUA) as NAM FROM `goimua` GROUP BY NAM ORDER BY NAM
        // ');

        if($sapXep=="Tuần"){
            $thongKe=GoiMua::getThongKeTuan($nam);
            // DB::select('SELECT

            // week(GOIMUA_NGAYMUA) as THONGKE

            // FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
            //     $nam
            // ]);
            $thongKeSoLuong=GoiMua::getThongKeSoLuongTuan($nam);
            // DB::select('
            // SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
            //     SELECT

            //     week(GOIMUA_NGAYMUA) as THONGKE,

            //     B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
            //     WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
            //     ORDER BY THONGKE) AS C
            // GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
            // ',[
            //     $nam
            // ]);
            return view($view,[
                'sapXep'=>$sapXep,
                'nam'=>$nam,
                'thongKe'=>$thongKe,
                'thongKeSoLuong'=>$thongKeSoLuong,
                'giaCoBan'=>$giaCoBan,
                'giaPremium'=>$giaPremium,
                'giaCaoCap'=>$giaCaoCap,
                'cacNam'=>$cacNam
            ]);
        }
        elseif($sapXep=="Tháng"){
            $thongKe=GoiMua::getThongKeThang($nam);
            // DB::select('SELECT

            // month(GOIMUA_NGAYMUA) as THONGKE

            // FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
            //     $nam
            // ]);
            $thongKeSoLuong=GoiMua::getThongKeSoLuongThang($nam);
            // DB::select('
            // SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
            //     SELECT

            //     month(GOIMUA_NGAYMUA) as THONGKE,

            //     B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
            //     WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
            //     ORDER BY THONGKE) AS C
            // GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
            // ',[
            //     $nam
            // ]);

            return view($view,[
                'sapXep'=>$sapXep,
                'nam'=>$nam,
                'thongKe'=>$thongKe,
                'thongKeSoLuong'=>$thongKeSoLuong,
                'giaCoBan'=>$giaCoBan,
                'giaPremium'=>$giaPremium,
                'giaCaoCap'=>$giaCaoCap,
                'cacNam'=>$cacNam
            ]);
        }
        elseif($sapXep=="Quý"){
            $thongKe=GoiMua::getThongKeQuy($nam);
            // DB::select('SELECT

            // quarter(GOIMUA_NGAYMUA) as THONGKE

            // FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
            //     $nam
            // ]);
            $thongKeSoLuong=GoiMua::getThongKeSoLuongQuy($nam);
            // DB::select('
            // SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
            //     SELECT

            //     quarter(GOIMUA_NGAYMUA) as THONGKE,

            //     B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
            //     WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
            //     ORDER BY THONGKE) AS C
            // GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
            // ',[
            //     $nam
            // ]);

            return view($view,[
                'sapXep'=>$sapXep,
                'nam'=>$nam,
                'thongKe'=>$thongKe,
                'thongKeSoLuong'=>$thongKeSoLuong,
                'giaCoBan'=>$giaCoBan,
                'giaPremium'=>$giaPremium,
                'giaCaoCap'=>$giaCaoCap,
                'cacNam'=>$cacNam
            ]);
        }
        elseif($sapXep=="Năm"){
            $thongKe=GoiMua::getThongKeNam($nam);
            // DB::select('SELECT

            // year(GOIMUA_NGAYMUA) as THONGKE

            // FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
            //     $nam
            // ]);
            $thongKeSoLuong=GoiMua::getThongKeSoLuongNam($nam);
            // DB::select('
            // SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
            //     SELECT

            //     year(GOIMUA_NGAYMUA) as THONGKE,

            //     B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
            //     WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
            //     ORDER BY THONGKE) AS C
            // GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
            // ',[
            //     $nam
            // ]);

            return view($view,[
                'sapXep'=>$sapXep,
                'nam'=>$nam,
                'thongKe'=>$thongKe,
                'thongKeSoLuong'=>$thongKeSoLuong,
                'giaCoBan'=>$giaCoBan,
                'giaPremium'=>$giaPremium,
                'giaCaoCap'=>$giaCaoCap,
                'cacNam'=>$cacNam
            ]);
        }



        return "Sorry, something was wrong !";


    }


}
