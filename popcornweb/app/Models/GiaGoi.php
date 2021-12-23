<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class GiaGoi
{
    public static function getGiaGoi(){
        return DB::table('giagoi')
        ->join('chatluong','giagoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
        ->join('sothang','giagoi.SOTHANG_ID','=','sothang.SOTHANG_ID')
        ->select('GIAGOI','CHATLUONG_DIENGIAI','SOTHANG_DIENGIAI')
        ->get();
    }
    public static function getTatCaGiaGoi(){
        return DB::table('giagoi')->select('*')->get();
    }
    public static function getGoiCoBan(){
        return DB::select('
        SELECT GIAGOI FROM
            (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
                WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
                ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói cơ bản"

        ');
    }
    public static function getGoiPremium(){
        return DB::select('
        SELECT GIAGOI FROM
            (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
                WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
                ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói premium"

        ');
    }
    public static function getGoiCaoCap(){
        return DB::select('
        SELECT GIAGOI FROM
            (SELECT A.LOAIGOI_ID,A.CHATLUONG_ID,A.SOTHANG_ID,A.LOAIGOI_TEN,B.GIAGOI FROM LOAIGOI as A,GIAGOI as B,SOTHANG as C,CHATLUONG as D
                WHERE A.SOTHANG_ID=C.SOTHANG_ID AND A.CHATLUONG_ID=D.CHATLUONG_ID AND B.SOTHANG_ID=C.SOTHANG_ID AND B.CHATLUONG_ID=D.CHATLUONG_ID
                ORDER BY A.LOAIGOI_ID) AS F WHERE LOAIGOI_TEN="Gói cao cấp"

        ');
    }
}
