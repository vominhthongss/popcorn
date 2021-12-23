<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class GoiMua
{
    public static function getGoiDaMua($id){
        return DB::table('goimua')
        ->join('loaigoi','loaigoi.LOAIGOI_ID','=','goimua.LOAIGOI_ID')
        ->join('chatluong','loaigoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
        ->select(
            'chatluong.CHATLUONG_DIENGIAI',
            'goimua.GOIMUA_NGAYHETHAN'
        )
        ->where('goimua.THANHVIEN_ID','=',$id)
        ->where('goimua.GOIMUA_TRANGTHAI','=','Đang sử dụng')
        ->get();
    }
    public static function getTatCaGoiDaMua($thanhvien_id){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('goimua')
        ->join('loaigoi','loaigoi.LOAIGOI_ID','=','goimua.LOAIGOI_ID')
        ->select(

            'loaigoi.LOAIGOI_ID',
            'loaigoi.CHATLUONG_ID',
            'loaigoi.SOTHANG_ID',
            'loaigoi.LOAIGOI_TEN',
            'loaigoi.LOAIGOI_THONGTIN',
            'goimua.GOIMUA_ID',
            'goimua.GOIMUA_NGAYMUA',
            'goimua.GOIMUA_NGAYHETHAN',
            'goimua.GOIMUA_TRANGTHAI'
        )
        ->where('goimua.THANHVIEN_ID','=',$thanhvien_id)
        ->orderByDesc('goimua.GOIMUA_NGAYMUA')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getGoiMua($thanhvien_id){
        return DB::select('
        SELECT * FROM goimua as A,loaigoi as B, chatluong as C, sothang as D
        WHERE A.LOAIGOI_ID=B.LOAIGOI_ID and C.CHATLUONG_ID=B.CHATLUONG_ID and D.SOTHANG_ID=B.SOTHANG_ID
        and A.THANHVIEN_ID=? and A.GOIMUA_TRANGTHAI=? and A.GOIMUA_NGAYHETHAN >= ?
        ',
        [
            $thanhvien_id,
            'Đang sử dụng',
            date('Y-m-d'),

        ]);
    }
    public static function updateGoiMua($thanhvien_id){
        DB::table('goimua')
                ->where('THANHVIEN_ID','=',$thanhvien_id)
                ->where('GOIMUA_TRANGTHAI','=','Đang sử dụng')
                ->update([
                    'GOIMUA_TRANGTHAI'=>'Hủy'
                ]);
    }
    public static function insertGoiMua($goi_id,$thanhvien_id,$goimua_ngaymua,$goimua_ngayhethan){
        DB::table('goimua')->insert([
            'LOAIGOI_ID'=>$goi_id,
            'THANHVIEN_ID'=>$thanhvien_id,
            'GOIMUA_NGAYMUA'=>$goimua_ngaymua,
            'GOIMUA_NGAYHETHAN'=>$goimua_ngayhethan,
            'GOIMUA_TRANGTHAI'=>'Đang sử dụng'

        ]);
    }
    public static function getSoGoiMua($thanhvien_id){
        return DB::select('
        SELECT count(*) FROM goimua as A,loaigoi as B, chatluong as C, sothang as D
        WHERE A.LOAIGOI_ID=B.LOAIGOI_ID and C.CHATLUONG_ID=B.CHATLUONG_ID and D.SOTHANG_ID=B.SOTHANG_ID
        and A.THANHVIEN_ID=? and A.GOIMUA_TRANGTHAI=? and A.GOIMUA_NGAYHETHAN >= ?
        ',
        [
            $thanhvien_id,
            'Đang sử dụng',
            date('Y-m-d'),

        ]);
    }
    public static function getThongKeTuan($nam){
        return DB::select('SELECT

        week(GOIMUA_NGAYMUA) as THONGKE

        FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
            $nam
        ]);
    }
    public static function getThongKeThang($nam){
        return DB::select('SELECT

        month(GOIMUA_NGAYMUA) as THONGKE

        FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
            $nam
        ]);
    }
    public static function getThongKeQuy($nam){
        return DB::select('SELECT

        quarter(GOIMUA_NGAYMUA) as THONGKE

        FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
            $nam
        ]);
    }
    public static function getThongKeNam($nam){
        return DB::select('SELECT

        year(GOIMUA_NGAYMUA) as THONGKE

        FROM goimua WHERE year(GOIMUA_NGAYMUA)=?  GROUP BY THONGKE ORDER BY THONGKE DESC',[
            $nam
        ]);
    }
    public static function getThongKeSoLuongTuan($nam){
        return DB::select('
        SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
            SELECT

            week(GOIMUA_NGAYMUA) as THONGKE,

            B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
            WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
            ORDER BY THONGKE) AS C
        GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
        ',[
            $nam
        ]);
    }
    public static function getThongKeSoLuongThang($nam){
        return DB::select('
        SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
            SELECT

            month(GOIMUA_NGAYMUA) as THONGKE,

            B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
            WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
            ORDER BY THONGKE) AS C
        GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
        ',[
            $nam
        ]);
    }
    public static function getThongKeSoLuongQuy($nam){
        return DB::select('
        SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
            SELECT

            quarter(GOIMUA_NGAYMUA) as THONGKE,

            B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
            WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
            ORDER BY THONGKE) AS C
        GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
        ',[
            $nam
        ]);
    }
    public static function getThongKeSoLuongNam($nam){
        return DB::select('
        SELECT THONGKE,LOAIGOI_ID,LOAIGOI_TEN, COUNT(THONGKE) as SOLUONG FROM (
            SELECT

            year(GOIMUA_NGAYMUA) as THONGKE,

            B.LOAIGOI_TEN, B.LOAIGOI_ID FROM goimua as A, loaigoi as B
            WHERE A.LOAIGOI_ID=B.LOAIGOI_ID AND year(GOIMUA_NGAYMUA)=?
            ORDER BY THONGKE) AS C
        GROUP BY THONGKE,LOAIGOI_ID,LOAIGOI_TEN
        ',[
            $nam
        ]);
    }
    public static function cacNam(){
        return DB::select('
        SELECT year(GOIMUA_NGAYMUA) as NAM FROM `goimua` GROUP BY NAM ORDER BY NAM
        ');
    }
}
