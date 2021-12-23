<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DoTuoi
{
    public static function getAllDoTuoi(){
        return DB::table('dotuoi')->select('*')->get();
    }

}
