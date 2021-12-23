<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class KhieuNaiDanhGia
{
    public static function getKhieuNaiDanhGia(){
        return DB::table('khieunaidanhgia')->select('*')->get();
    }
    public static function insertKhieuNaiDanhGia($userid,$filmid,$report){
        DB::table('khieunaidanhgia')->insert([
            'THANHVIEN_ID'=>$userid,
            'PHIM_ID'=>$filmid,
            'LOAIKHIEUNAI_ID'=>$report
        ]);
    }

}
