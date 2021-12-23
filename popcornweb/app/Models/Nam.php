<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Nam
{
    public static function getFilerNam(){
        return DB::table('nam')->select('*')->orderByDesc('NAM_TEN')->get();
    }
    public static function getAllNam(){
        return DB::table('nam')->select('*')->get();
    }


}
