<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class QuocGia
{
    public static function getFilerQuocGia(){
        return DB::table('quocgia')->select('*')->get();
    }
    public static function getAllQuocGia(){
        return DB::table('quocgia')->select('*')->get();
    }

}
