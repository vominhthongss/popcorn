<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class PhimYeuThich
{
    public static function getPhimYeuThich(){
        return DB::table('phimyeuthich')->select('*')->get();
    }
    public static function insertPhimYeuThich($filmid,$userid){
        DB::table('phimyeuthich')->insert([
            'PHIM_ID'=>$filmid,
            'THANHVIEN_ID'=>$userid
        ]);
    }
    public static function deletePhimYeuThich($filmid,$userid){
        DB::table('phimyeuthich')
        ->where('PHIM_ID','=',$filmid)
        ->where('THANHVIEN_ID','=',$userid)
        ->delete();
    }
}
