<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ThanhVien
{
    public static function getThanhVien($email){
        return DB::table('thanhvien')
        ->select('*')
        ->where('THANHVIEN_EMAIL','=',$email)
        ->where('THANHVIEN_TRANGTHAI','=','Kích hoạt')
        ->get();
    }
    public static function getThanhVienInfo($thanhvien_id){
        return DB::table('thanhvien')
        ->select('*')
        ->where('THANHVIEN_ID','=',$thanhvien_id)
        ->get();
    }
    public static function updateThanhVienInfo($thanhvien_id,$email,$sodienthoai,$hoten){
        DB::table('thanhvien')
            ->where('THANHVIEN_ID','=',$thanhvien_id)
            ->update([
                'THANHVIEN_EMAIL'=>$email,
                'THANHVIEN_SODIENTHOAI'=>$sodienthoai,
                'THANHVIEN_HOTEN'=>$hoten
            ]);
    }
    public static function insertThanhVien($hoten,$sodienthoai,$email, $matkhau){
        return DB::table('thanhvien')
        ->insert([
            'THANHVIEN_HOTEN'=>$hoten,
            'QUANTRI_ID'=>1,
            'THANHVIEN_SODIENTHOAI'=>$sodienthoai,
            'THANHVIEN_EMAIL'=>$email,
            'THANHVIEN_MATKHAU'=>$matkhau,
            'THANHVIEN_TRANGTHAI'=>'Kích hoạt',
            'THANHVIEN_ANHDAIDIEN'=>'asset/avatar/no_avatar.png'
        ]);
    }
    public static function getPassThanhVien($thanhvien_id){
        return DB::table('thanhvien')
        ->select('THANHVIEN_MATKHAU')
        ->where('THANHVIEN_ID','=',$thanhvien_id)
        ->get();
    }
    public static function updatePassThanhVien($thanhvien_id,$matkhau){
        DB::table('thanhvien')
                ->where('THANHVIEN_ID','=',$thanhvien_id)
                ->update([
                    'THANHVIEN_MATKHAU'=>$matkhau,
        ]);
    }
    public static function updateAvtThanhVien($thanhvien_id,$pathfilename){
        DB::table('thanhvien')
                ->where('THANHVIEN_ID','=',$thanhvien_id)
                ->update(['THANHVIEN_ANHDAIDIEN'=>$pathfilename]);
    }
    public static function deleteAvtThanhVien($thanhvien_id){
        DB::table('thanhvien')
        ->where('THANHVIEN_ID','=',$thanhvien_id)
        ->update(['THANHVIEN_ANHDAIDIEN'=>'asset/avatar/no_avatar.png']);
    }
    public static function deleteAccountThanhVien($thanhvien_id){
        DB::table('thanhvien')
            ->where('THANHVIEN_ID','=',$thanhvien_id)
            ->delete();
    }
    public static function getThanhVienGanDay(){
        return DB::table('thanhvien')->select('*')->orderByDesc('THANHVIEN_ID')->LIMIT(5)->get();
    }
    public static function getDanhSachThanhVien(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return
        DB::table('thanhvien')
        ->select('*')
        ->orderBy('THANHVIEN_ID')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getDanhSachThanhVienName(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return
        DB::table('thanhvien')
        ->select('*')
        ->orderBy('THANHVIEN_HOTEN')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getDanhSachThanhVienStatus(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('thanhvien')
        ->select('*')
        ->orderBy('THANHVIEN_TRANGTHAI')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function findDanhSachThanhVien($keyword){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('thanhvien')
        ->select('*')
        ->where('THANHVIEN_EMAIL','like','%'.$keyword.'%')
        ->orWhere('THANHVIEN_HOTEN','like','%'.$keyword.'%')
        ->orWhere('THANHVIEN_SODIENTHOAI','like','%'.$keyword.'%')
        ->orderBy('THANHVIEN_ID')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function lock($thanhvien_id){
        DB::table('thanhvien')
        ->where('THANHVIEN_ID','=',$thanhvien_id)
        ->update(['THANHVIEN_TRANGTHAI'=>'Khóa']);
    }
    public static function unlock($thanhvien_id){
        DB::table('thanhvien')
        ->where('THANHVIEN_ID','=',$thanhvien_id)
        ->update(['THANHVIEN_TRANGTHAI'=>'Kích hoạt']);
    }

}
