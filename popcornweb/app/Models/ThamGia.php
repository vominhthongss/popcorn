<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ThamGia
{
    public static function insertThamGia($phim_id,$j,$i){
        DB::table('thamgia')->insert([
            'PHIM_ID'=>$phim_id,
            'DIENVIEN_ID'=>$j,
            'DAODIEN_ID'=>$i

        ]);
    }
    public static function getAllDienVienThamGia($phim_id){
        return DB::table('thamgia')
        ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        ->select('thamgia.PHIM_ID','dienvien.DIENVIEN_TEN','dienvien.DIENVIEN_ID')
        ->where('PHIM_ID','=',$phim_id)
        ->groupBy('thamgia.PHIM_ID','dienvien.DIENVIEN_TEN','dienvien.DIENVIEN_ID')
        ->get();

    }
    public static function getAllDaoDienThamGia($phim_id){
        return DB::table('thamgia')
        ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        ->select('thamgia.PHIM_ID','daodien.DAODIEN_TEN','daodien.DAODIEN_ID')
        ->where('PHIM_ID','=',$phim_id)
        ->groupBy('thamgia.PHIM_ID','daodien.DAODIEN_TEN','daodien.DAODIEN_ID')
        ->get();

    }
    public static function deleteThamGia($phim_id){
        DB::table('thamgia')->where('PHIM_ID','=',$phim_id)->delete();
    }


}
