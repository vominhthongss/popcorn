<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class LoaiGoi
{
    public static function getLoaiGoi($goi_id){
        return DB::table('loaigoi')
        ->join('chatluong','loaigoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
        ->select(
            'chatluong.CHATLUONG_DIENGIAI',
        )
        ->where('loaigoi.LOAIGOI_ID','=', $goi_id)
        ->get();
    }

    public static function getTatCaLoaiGoi(){
        return DB::table('loaigoi')
        ->join('chatluong','loaigoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
        ->join('sothang','loaigoi.SOTHANG_ID','=','sothang.SOTHANG_ID')
        ->select('LOAIGOI_ID','LOAIGOI_TEN','LOAIGOI_THONGTIN','CHATLUONG_DIENGIAI','SOTHANG_DIENGIAI')
        ->get();
    }
}
