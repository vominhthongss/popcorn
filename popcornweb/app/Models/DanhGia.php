<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DanhGia
{
    public static function insertDanhGia($userid,$filmid,$review,$rating){
        DB::table('danhgia')->insert([
            'THANHVIEN_ID'=>$userid,
            'PHIM_ID'=>$filmid,
            'DANHGIA_NOIDUNG'=>$review,
            'DANHGIA_SOSAO'=>$rating
        ]);
    }
    public static function updateDanhGia($userid,$filmid,$review,$rating){
        DB::table('danhgia')
        ->where('THANHVIEN_ID','=',$userid)
        ->where('PHIM_ID','=',$filmid)
        ->update([
            'DANHGIA_NOIDUNG'=>$review,
            'DANHGIA_SOSAO'=>$rating
        ]);
    }
    public static function deleteDanhGia($userid,$filmid){
        DB::table('danhgia')
            ->where('THANHVIEN_ID','=',$userid)
            ->where('PHIM_ID','=',$filmid)
            ->delete();
    }
    public static function getDanhGia($phim_id){
        return DB::table('danhgia')->select('*')->where('PHIM_ID','=',$phim_id)->get();
    }
    public static function getSoDanhGia($phim_id){
        return DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->count('*');
    }
    public static function getSoDanhGiaTatCa($phim_id){
        return DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->count('*');
    }
    public static function getDanhGiaTatCa($phim_id){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table(DB::raw('danhgia','thanhvien'))
        ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        ->select(
            'thanhvien.THANHVIEN_ID',
            'thanhvien.THANHVIEN_HOTEN',
            'thanhvien.THANHVIEN_ANHDAIDIEN',
            'danhgia.DANHGIA_NOIDUNG',
            'danhgia.DANHGIA_SOSAO',
            'danhgia.DANHGIA_NGAYGIO'
        )
        ->where('PHIM_ID','=',$phim_id)
        ->orderByDesc('DANHGIA_SOSAO','DANHGIA_NGAYGIO')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getSoDanhGiaVoi($phim_id,$sosao){
        return DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->where('DANHGIA_SOSAO','=',$sosao)->count('*');
    }
    public static function getDanhGiaVoi($phim_id,$sosao){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table(DB::raw('danhgia','thanhvien'))
        ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        ->select(
            'thanhvien.THANHVIEN_ID',
            'thanhvien.THANHVIEN_HOTEN',
            'thanhvien.THANHVIEN_ANHDAIDIEN',
            'danhgia.DANHGIA_NOIDUNG',
            'danhgia.DANHGIA_SOSAO',
            'danhgia.DANHGIA_NGAYGIO'
        )
        ->where('DANHGIA_SOSAO','=',$sosao)->where('PHIM_ID','=',$phim_id)
        ->orderByDesc('DANHGIA_SOSAO','DANHGIA_NGAYGIO')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getDanhGiaHomNay(){
        return DB::table('danhgia')
        ->whereDate('DANHGIA_NGAYGIO',date("Y-m-d"))
        ->count();
    }
    public static function getDanhGiaGanDay(){
        return DB::table('danhgia')->select('*')->orderByDesc('DANHGIA_NGAYGIO')->LIMIT(5)->get();
    }
    public static function getReviews(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table(DB::raw('danhgia','thanhvien','phim'))
        ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        ->join('phim','danhgia.PHIM_ID','=','phim.PHIM_ID')
        ->select(
            'thanhvien.THANHVIEN_ID',
            'thanhvien.THANHVIEN_HOTEN',
            'thanhvien.THANHVIEN_ANHDAIDIEN',
            'danhgia.DANHGIA_NOIDUNG',
            'danhgia.DANHGIA_SOSAO',
            'danhgia.DANHGIA_NGAYGIO',
            'phim.PHIM_ID',
            'phim.PHIM_TEN'
        )
        ->orderByDesc('DANHGIA_NGAYGIO')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getReviewsRate(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table(DB::raw('danhgia','thanhvien','phim'))
        ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        ->join('phim','danhgia.PHIM_ID','=','phim.PHIM_ID')
        ->select(
            'thanhvien.THANHVIEN_ID',
            'thanhvien.THANHVIEN_HOTEN',
            'thanhvien.THANHVIEN_ANHDAIDIEN',
            'danhgia.DANHGIA_NOIDUNG',
            'danhgia.DANHGIA_SOSAO',
            'danhgia.DANHGIA_NGAYGIO',
            'phim.PHIM_ID',
            'phim.PHIM_TEN'
        )
        ->orderByDesc('DANHGIA_SOSAO')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function findReviews($keyword){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table(DB::raw('danhgia','thanhvien','phim'))
        ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        ->join('phim','danhgia.PHIM_ID','=','phim.PHIM_ID')
        ->select(
            'thanhvien.THANHVIEN_ID',
            'thanhvien.THANHVIEN_HOTEN',
            'thanhvien.THANHVIEN_ANHDAIDIEN',
            'danhgia.DANHGIA_NOIDUNG',
            'danhgia.DANHGIA_SOSAO',
            'danhgia.DANHGIA_NGAYGIO',
            'phim.PHIM_ID',
            'phim.PHIM_TEN'
        )
        ->where('DANHGIA_NOIDUNG','like','%'.$keyword.'%')
        ->orWhere('THANHVIEN_HOTEN','like','%'.$keyword.'%')
        ->orWhere('PHIM_TEN','like','%'.$keyword.'%')
        ->orderBy('THANHVIEN_ID')
        ->orderByDesc('DANHGIA_NGAYGIO')
        ->paginate($soPhanTuTrongTrang);
    }

}
