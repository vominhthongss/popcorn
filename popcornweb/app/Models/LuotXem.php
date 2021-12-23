<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class LuotXem
{
    public static function insertLuotXem($phim_id,$theloai_id){
        DB::table('luotxem')->insert([
            'PHIM_ID'=>$phim_id,
            'THELOAI_ID'=>$theloai_id
        ]);
    }
    public static function getLuotXem(){
        return DB::select('
        SELECT B.PHIM_ID,A.LUOT FROM phim AS B,
        (SELECT PHIM_ID,COUNT(LUOTXEM_THOIGIAN) AS LUOT FROM luotxem
        GROUP BY PHIM_ID) AS A
        WHERE B.PHIM_ID=A.PHIM_ID
        ');

    }
    public static function getCacNam(){
        return DB::select('select YEAR(LUOTXEM_THOIGIAN) AS NAM from luotxem GROUP BY YEAR(LUOTXEM_THOIGIAN) ');
    }
    public static function getThongKeLuotXemTuan($nam){
        return DB::select('
        SELECT WEEK(LUOTXEM_THOIGIAN) AS THONGKE
        FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
        GROUP BY WEEK(LUOTXEM_THOIGIAN)
        ORDER BY THONGKE DESC
        ',[
            $nam
        ]);
    }
    public static function getThongKeLuotXemSoLuongTuan($nam){
        return DB::select('

        SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
        FROM
        (SELECT PHIM_ID,THELOAI_TEN,WEEK(LUOTXEM_THOIGIAN) AS THONGKE
            FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
        GROUP BY THELOAI_TEN,THONGKE
        ORDER BY THONGKE

        ',[
            $nam
        ]);
    }
    public static function getThongKeLuotXemThang($nam){
        return DB::select('
        SELECT MONTH(LUOTXEM_THOIGIAN) AS THONGKE
        FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
        GROUP BY MONTH(LUOTXEM_THOIGIAN)
        ORDER BY THONGKE DESC
        ',[
            $nam
        ]);
    }
    public static function getThongKeLuotXemSoLuongThang($nam){
        return DB::select('

        SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
        FROM
        (SELECT PHIM_ID,THELOAI_TEN,MONTH(LUOTXEM_THOIGIAN) AS THONGKE
            FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
        GROUP BY THELOAI_TEN,THONGKE
        ORDER BY THONGKE

        ',[
            $nam
        ]);
    }
    public static function getThongKeLuotXemQuy($nam){
        return DB::select('
        SELECT QUARTER(LUOTXEM_THOIGIAN) AS THONGKE
        FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
        GROUP BY QUARTER(LUOTXEM_THOIGIAN)
        ORDER BY THONGKE DESC
        ',[
            $nam
        ]);
    }
    public static function getThongKeLuotXemSoLuongQuy($nam){
        return DB::select('

        SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
        FROM
        (SELECT PHIM_ID,THELOAI_TEN,QUARTER(LUOTXEM_THOIGIAN) AS THONGKE
            FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
        GROUP BY THELOAI_TEN,THONGKE
        ORDER BY THONGKE

        ',[
            $nam
        ]);
    }
    public static function getThongKeLuotXemNam($nam){
        return DB::select('
        SELECT YEAR(LUOTXEM_THOIGIAN) AS THONGKE
        FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=?
        GROUP BY YEAR(LUOTXEM_THOIGIAN)
        ORDER BY THONGKE DESC
        ',[
            $nam
        ]);
    }
    public static function getThongKeLuotXemSoLuongNam($nam){
        return DB::select('

        SELECT THELOAI_TEN,THONGKE, COUNT(THONGKE) AS LUOT
        FROM
        (SELECT PHIM_ID,THELOAI_TEN,YEAR(LUOTXEM_THOIGIAN) AS THONGKE
            FROM luotxem,theloai WHERE theloai.THELOAI_ID=luotxem.THELOAI_ID and YEAR(LUOTXEM_THOIGIAN)=?) AS A
        GROUP BY THELOAI_TEN,THONGKE
        ORDER BY THONGKE

        ',[
            $nam
        ]);
    }


}
