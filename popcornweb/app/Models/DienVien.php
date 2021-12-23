<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DienVien
{
    public static function getDienVien($phim_id){
        return DB::table('thamgia')
        ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        ->select('PHIM_ID','DIENVIEN_TEN')
        ->where('PHIM_ID','=',$phim_id)
        ->groupBy('PHIM_ID','DIENVIEN_TEN')
        ->get();
    }
    public static function getAllDienVien(){
        return DB::table('dienvien')->select('*')->get();
    }


}
