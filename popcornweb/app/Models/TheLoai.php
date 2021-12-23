<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class TheLoai
{
    public static function getFilerTheLoai(){
        return DB::table('theloai')->select('*')->get();
    }
    public static function getTheLoai($phim_id){
        return DB::select('select * from theloaiphim where PHIM_ID=?', [$phim_id]);
    }
    public static function getAllTheLoai(){
        return DB::table('theloai')->select('*')->get();
    }

}
