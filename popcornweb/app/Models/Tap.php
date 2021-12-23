<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Tap
{
    public static function getTapGoiCaoCap($phim_id,$goiXemPhim){
        return DB::table('tap')
        ->select('*')
        ->where('PHIM_ID','=',$phim_id)
        ->orderBy('TAP_STT','ASC')
        ->paginate($goiXemPhim);
    }
    public static function getTapGoiPremium($phim_id,$goiXemPhim){
        return DB::table('tap')
        ->select('*')
        ->where(function($query) use($phim_id){
            $query->where('PHIM_ID','=',$phim_id);
        })
        ->where(function($query){
            $query->where('CHATLUONG_ID','=','1')
            ->orWhere('CHATLUONG_ID','=','2');
        })
        ->orderBy('TAP_STT','ASC')
        ->paginate($goiXemPhim);
    }
    public static function getTapGoiCoBan($phim_id,$goiXemPhim){
        return DB::table('tap')
        ->select('*')
        ->where('PHIM_ID','=',$phim_id)
        ->where('CHATLUONG_ID','=','1')
        ->orderBy('TAP_STT','ASC')
        ->paginate($goiXemPhim);
    }
    public static function insertTap($phim_id,$chatluong_id,$tap_stt,$tap_url,$captions){
        DB::table('tap')->insert([
            'PHIM_ID'=>$phim_id,
            'CHATLUONG_ID'=>$chatluong_id,
            'TAP_STT'=>$tap_stt,
            'TAP_URL'=>$tap_url,
            'TAP_PHUDE'=>$captions

        ]);
    }

}
