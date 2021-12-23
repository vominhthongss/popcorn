<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DaoDien
{
    public static function getDaoDien($phim_id){
        return DB::table('thamgia')
        ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        ->select('PHIM_ID','DAODIEN_TEN')
        ->where('PHIM_ID','=',$phim_id)
        ->groupBy('PHIM_ID','DAODIEN_TEN')
        ->get();
    }
    public static function getAllDaoDien(){
        return DB::table('daodien')->select('*')->get();
    }

}
