<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class LoaiKhieuNai
{
    public static function getCacBaoCao(){
        return DB::table('loaikhieunai')
        ->select('*')
        ->orderBy('LOAIKHIEUNAI_TEN')
        ->get();
    }

}
