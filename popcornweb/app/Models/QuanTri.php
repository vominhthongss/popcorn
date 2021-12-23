<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class QuanTri
{
    public static function getQuanTri($email){
        return DB::table('quantri')
        ->select('*')
        ->where('QUANTRI_EMAIL','=',$email)
        ->where('QUANTRI_TRANGTHAI','=','Kích hoạt')
        ->get();

    }
    public static function insertQuanTri($hoten,$sodienthoai,$email,$matkhau){
        DB::table('quantri')
        ->insert([
            'QUANTRI_HOTEN'=>$hoten,
            'QUANTRI_SODIENTHOAI'=>$sodienthoai,
            'QUANTRI_EMAIL'=>$email,
            'QUANTRI_MATKHAU'=>$matkhau,
            'QUANTRI_TRANGTHAI'=>'Kích hoạt',
            'QUANTRI_VAITRO'=>'Nhân viên'
        ]);
    }
    public static function getDanhSachNhanVien(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('quantri')
        ->select('*')
        ->where('QUANTRI_VAITRO','!=','Admin')
        ->orderBy('QUANTRI_ID')
        ->paginate($soPhanTuTrongTrang);

    }
    public static function getDanhSachNhanVienName(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('quantri')
        ->select('*')
        ->where('QUANTRI_VAITRO','!=','Admin')
        ->orderBy('QUANTRI_HOTEN')
        ->paginate($soPhanTuTrongTrang);

    }
    public static function getDanhSachNhanVienStatus(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('quantri')
        ->select('*')
        ->where('QUANTRI_VAITRO','!=','Admin')
        ->orderBy('QUANTRI_TRANGTHAI')
        ->paginate($soPhanTuTrongTrang);

    }

    public static function findNhanVien($keyword){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('quantri')
        ->select('*')
        ->where('QUANTRI_VAITRO','!=','Admin')
        ->where(function($query) use ($keyword){
            $query->where('QUANTRI_EMAIL','like','%'.$keyword.'%')
                ->orWhere('QUANTRI_HOTEN','like','%'.$keyword.'%')
                ->orWhere('QUANTRI_SODIENTHOAI','like','%'.$keyword.'%');
        })
        ->orderBy('QUANTRI_ID')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getNhanVien($quantri_id){
        return DB::table('quantri')
        ->select('*')
        ->where('QUANTRI_ID','=',$quantri_id)
        ->orderBy('QUANTRI_ID')
        ->get();

    }
    public static function editNhanVien($quantri_id,$quantri_hoten,$quantri_email,$quantri_sodienthoai,$quantri_vaitro){
        DB::table('quantri')
        ->where('QUANTRI_ID','=',$quantri_id)
        ->update([
            'QUANTRI_HOTEN'=>$quantri_hoten,
            'QUANTRI_EMAIL'=>$quantri_email,
            'QUANTRI_SODIENTHOAI'=>$quantri_sodienthoai,
            'QUANTRI_VAITRO'=>$quantri_vaitro
        ]);
    }
    public static function changePassNhanVien($quantri_id,$matkhau){
        DB::table('quantri')
        ->where('QUANTRI_ID','=',$quantri_id)
        ->update([
            'QUANTRI_MATKHAU'=>$matkhau
        ]);
    }
    public static function lockNhanVien($quantri_id){
        DB::table('quantri')
        ->where('QUANTRI_ID','=',$quantri_id)
        ->update(['QUANTRI_TRANGTHAI'=>'Khóa']);

    }
    public static function unlockNhanVien($quantri_id){

        DB::table('quantri')
        ->where('QUANTRI_ID','=',$quantri_id)
        ->update(['QUANTRI_TRANGTHAI'=>'Kích hoạt']);
    }
    public static function deleteNhanVien($quantri_id){
        DB::table('quantri')
        ->where('QUANTRI_ID','=',$quantri_id)
        ->delete();
    }


}
