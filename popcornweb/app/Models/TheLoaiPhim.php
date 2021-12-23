<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class TheLoaiPhim
{
    public static function getTheLoaiPhim(){
        return DB::table('theloaiphim')
        ->join('phim','theloaiphim.PHIM_ID','=','phim.PHIM_ID')
        ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        ->select('phim.PHIM_ID','theloai.THELOAI_TEN')
        ->get();
    }
    public static function insertTheLoaiPhim($phim_id,$i){
        DB::table('theloaiphim')->insert([
            'PHIM_ID'=>$phim_id,'THELOAI_ID'=>$i
        ]);
    }
    public static function getTheLoaiPhimEdit($phim_id){
        return DB::table('theloaiphim')
         ->select('*')
         ->where('PHIM_ID','=',$phim_id)
         ->get();

    }
    public static function editTheLoaiPhim($phim_id,$i){
        DB::table('theloaiphim')->insert([
            'PHIM_ID'=>$phim_id,'THELOAI_ID'=>$i
        ]);

    }
    public static function deleteTheLoaiPhim($phim_id){
        DB::table('theloaiphim')->where('PHIM_ID','=',$phim_id)->delete();
    }

}
