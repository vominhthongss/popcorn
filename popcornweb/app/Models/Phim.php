<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class Phim
{

    public static function getPhimNoiBat(){
        return DB::table('phim')->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB')
        ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        ->whereMonth('PHIM_NGAYTHEM',date('m'))
        ->orderByDesc('PHIM_NGAYTHEM')
        ->orderBy('PHIM_TEN')
        ->limit(6)
        ->get();
    }
    public static function getPhimDaRaMat(){
        return DB::table('phim')
        ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        ->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB','PHIM_TOMTAT','DOTUOI_TEN')
        ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->orderBy('PHIM_TEN')
        ->limit(10)->get();
    }
    public static function getPhimDienAnh(){
        return DB::table('phim')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB')
        ->where('PHANLOAI_TEN','=','Phim điện ảnh')
        ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->limit(12)->get();
    }
    public static function getPhimTruyenHinh(){
        return DB::table('phim')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB')
        ->where('PHANLOAI_TEN','=','Phim truyền hình')
        ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->limit(12)->get();
    }
    public static function getPhimSapRaMat(){
        return DB::table('phim')
        ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        ->select('PHIM_ID','PHIM_TEN','PHIM_URLPOSTER','PHIM_DIEMIMDB','PHIM_TOMTAT','DOTUOI_TEN')
        ->where('PHIM_TRANGTHAI','=','Sắp ra mắt')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->limit(6)->get();
    }
    public static function getCatalogPhim(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang');
        return DB::table('phim')
        ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        ->select('*')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->orderByDesc('PHIM_DIEMIMDB')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getCatalogPhimYeuThich($thanhvien_id){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang');
        return DB::table('phim')
        ->join('phimyeuthich','phim.PHIM_ID','=','phimyeuthich.PHIM_ID')
        ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select(

            'phim.PHIM_ID',
            'dotuoi.DOTUOI_TEN',
            'quocgia.QUOCGIA_TEN',
            'nam.NAM_TEN',
            'phanloai.PHANLOAI_TEN',
            'phim.PHIM_TEN',
            'phim.PHIM_THOILUONG',
            'phim.PHIM_TOMTAT',
            'phim.PHIM_DIEMIMDB',
            'phim.PHIM_URLPOSTER',
            'phim.PHIM_TRANGTHAI',
            'phim.PHIM_NGAYTHEM',

            )
        ->where('phimyeuthich.THANHVIEN_ID','=',$thanhvien_id)
        ->groupBy('phim.PHIM_ID',
        'phim.PHIM_ID',
        'dotuoi.DOTUOI_TEN',
        'quocgia.QUOCGIA_TEN',
        'nam.NAM_TEN',
        'phanloai.PHANLOAI_TEN',
        'phim.PHIM_TEN',
        'phim.PHIM_THOILUONG',
        'phim.PHIM_TOMTAT',
        'phim.PHIM_DIEMIMDB',
        'phim.PHIM_URLPOSTER',
        'phim.PHIM_TRANGTHAI',
        'phim.PHIM_NGAYTHEM',
        )
        ->orderByDesc('PHIM_NGAYTHEM')
        ->orderByDesc('PHIM_DIEMIMDB')
        ->paginate($soPhanTuTrongTrang);

    }
    public static function getThongTinPhim($phim_id){
        return DB::table('phim')
        ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->join('thamgia','phim.PHIM_ID','=','thamgia.PHIM_ID')
        ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        ->select(
            'phim.PHIM_ID',
            'dotuoi.DOTUOI_TEN',
            'quocgia.QUOCGIA_TEN',
            'nam.NAM_TEN',
            'phanloai.PHANLOAI_TEN',
            'phim.PHIM_TEN',
            'phim.PHIM_THOILUONG',
            'phim.PHIM_TOMTAT',
            'phim.PHIM_DIEMIMDB',
            'phim.PHIM_URLPOSTER',
            'phim.PHIM_TRANGTHAI',
            'phim.PHIM_NGAYTHEM',
            )
        ->groupBy(
            'phim.PHIM_ID',
            'dotuoi.DOTUOI_TEN',
            'quocgia.QUOCGIA_TEN',
            'nam.NAM_TEN',
            'phanloai.PHANLOAI_TEN',
            'phim.PHIM_TEN',
            'phim.PHIM_THOILUONG',
            'phim.PHIM_TOMTAT',
            'phim.PHIM_DIEMIMDB',
            'phim.PHIM_URLPOSTER',
            'phim.PHIM_TRANGTHAI',
            'phim.PHIM_NGAYTHEM',
        )
        ->where('phim.PHIM_ID','=',$phim_id)
        ->get();
    }
    public static function getPhimDeXuat(){
        return DB::table('phim')
        ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select(
            'phim.PHIM_ID',
            'dotuoi.DOTUOI_TEN',
            'quocgia.QUOCGIA_TEN',
            'nam.NAM_TEN',
            'phanloai.PHANLOAI_TEN',
            'phim.PHIM_TEN',
            'phim.PHIM_THOILUONG',
            'phim.PHIM_TOMTAT',
            'phim.PHIM_DIEMIMDB',
            'phim.PHIM_URLPOSTER',
            'phim.PHIM_TRANGTHAI',
            'phim.PHIM_NGAYTHEM',
            )
        ->groupBy(
            'phim.PHIM_ID',
            'dotuoi.DOTUOI_TEN',
            'quocgia.QUOCGIA_TEN',
            'nam.NAM_TEN',
            'phanloai.PHANLOAI_TEN',
            'phim.PHIM_TEN',
            'phim.PHIM_THOILUONG',
            'phim.PHIM_TOMTAT',
            'phim.PHIM_DIEMIMDB',
            'phim.PHIM_URLPOSTER',
            'phim.PHIM_TRANGTHAI',
            'phim.PHIM_NGAYTHEM',
        )
        ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->limit(6)
        ->get();
    }
    public static function getCatalogPhimFilter($theloai,$quocgia,$nam){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang');
        if($theloai=="" && $quocgia=="" && $nam=="")
        {
            $data1=
            DB::table('phim')
            ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
            ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
            ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
            ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
            ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
            ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
            ->select(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
                )
            ->groupBy(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
            )

            ->orderByDesc('PHIM_NGAYTHEM')
            ->orderByDesc('PHIM_DIEMIMDB')
            ->paginate($soPhanTuTrongTrang);
        }
        # 0 0 1 rỗng =>2
        if($theloai=="" && $quocgia=="" && $nam!="")
        {
            $data1=
            DB::table('phim')
            ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
            ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
            ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
            ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
            ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
            ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
            ->select(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
                )
            ->groupBy(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
            )
            ->orderByDesc('PHIM_NGAYTHEM')
            ->where('NAM_TEN','=',$nam)
            ->orderByDesc('PHIM_DIEMIMDB')
            ->paginate($soPhanTuTrongTrang);
        }
         # 0 1 0 rỗng =>3
        if($theloai=="" && $quocgia!="" && $nam=="")
        {
            $data1=
            DB::table('phim')
            ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
            ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
            ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
            ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
            ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
            ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
            ->select(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
                )
            ->groupBy(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
            )
            ->orderByDesc('PHIM_NGAYTHEM')
            ->where('QUOCGIA_TEN','=',$quocgia)
            ->orderByDesc('PHIM_DIEMIMDB')
            ->paginate($soPhanTuTrongTrang);
        }
        # 0 1 1 rỗng =>4
        if($theloai=="" && $quocgia!="" && $nam!="")
        {
            $data1=
            DB::table('phim')
            ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
            ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
            ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
            ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
            ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
            ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
            ->select(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
                )
            ->groupBy(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
            )
            ->orderByDesc('PHIM_NGAYTHEM')
            ->where('QUOCGIA_TEN','=',$quocgia)
            ->where('NAM_TEN','=',$nam)
            ->orderByDesc('PHIM_DIEMIMDB')
            ->paginate($soPhanTuTrongTrang);
        }
         # 1 0 0 rỗng =>5
        if($theloai!="" && $quocgia=="" && $nam=="")
        {
            $data1=
            DB::table('phim')
            ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
            ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
            ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
            ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
            ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
            ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
            ->select(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
                )
            ->groupBy(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
            )
            ->orderByDesc('PHIM_NGAYTHEM')
            ->where('THELOAI_TEN','=',$theloai)
            ->orderByDesc('PHIM_DIEMIMDB')
            ->paginate($soPhanTuTrongTrang);
        }
        # 1 0 1 rỗng =>6
        if($theloai!="" && $quocgia=="" && $nam!="")
        {
            $data1=
            DB::table('phim')
            ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
            ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
            ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
            ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
            ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
            ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
            ->select(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
                )
            ->groupBy(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
            )
            ->orderByDesc('PHIM_NGAYTHEM')
            ->where('THELOAI_TEN','=',$theloai)
            ->where('NAM_TEN','=',$nam)
            ->orderByDesc('PHIM_DIEMIMDB')
            ->paginate($soPhanTuTrongTrang);
        }
        # 1 1 0 rỗng =>7
        if($theloai!="" && $quocgia!="" && $nam=="")
        {
            $data1=
            DB::table('phim')
            ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
            ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
            ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
            ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
            ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
            ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
            ->select(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
                )
            ->groupBy(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
            )
            ->orderByDesc('PHIM_NGAYTHEM')
            ->where('THELOAI_TEN','=',$theloai)
            ->where('QUOCGIA_TEN','=',$quocgia)
            ->orderByDesc('PHIM_DIEMIMDB')
            ->paginate($soPhanTuTrongTrang);
        }
        # 1 1 1 rỗng =>8
        if($theloai!="" && $quocgia!="" && $nam!="")
        {
            $data1=
            DB::table('phim')
            ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
            ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
            ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
            ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
            ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
            ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
            ->select(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
                )
            ->groupBy(
                'phim.PHIM_ID',
                'dotuoi.DOTUOI_TEN',
                'quocgia.QUOCGIA_TEN',
                'nam.NAM_TEN',
                'phanloai.PHANLOAI_TEN',
                'phim.PHIM_TEN',
                'phim.PHIM_THOILUONG',
                'phim.PHIM_TOMTAT',
                'phim.PHIM_DIEMIMDB',
                'phim.PHIM_URLPOSTER',
                'phim.PHIM_TRANGTHAI',
                'phim.PHIM_NGAYTHEM',
            )
            ->orderByDesc('PHIM_NGAYTHEM')
            ->where('THELOAI_TEN','=',$theloai)
            ->where('QUOCGIA_TEN','=',$quocgia)
            ->where('NAM_TEN','=',$nam)
            ->orderByDesc('PHIM_DIEMIMDB')
            ->paginate($soPhanTuTrongTrang);

        }
        return $data1;
    }
    public static function searchPhim($keyword){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang');
        return DB::table('phim')
        ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->join('thamgia','phim.PHIM_ID','=','thamgia.PHIM_ID')
        ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        ->select(
            'phim.PHIM_ID',
            'dotuoi.DOTUOI_TEN',
            'quocgia.QUOCGIA_TEN',
            'nam.NAM_TEN',
            'phanloai.PHANLOAI_TEN',
            'phim.PHIM_TEN',
            'phim.PHIM_THOILUONG',
            'phim.PHIM_TOMTAT',
            'phim.PHIM_DIEMIMDB',
            'phim.PHIM_URLPOSTER',
            'phim.PHIM_TRANGTHAI',
            'phim.PHIM_NGAYTHEM',
            )
        ->groupBy(
            'phim.PHIM_ID',
            'dotuoi.DOTUOI_TEN',
            'quocgia.QUOCGIA_TEN',
            'nam.NAM_TEN',
            'phanloai.PHANLOAI_TEN',
            'phim.PHIM_TEN',
            'phim.PHIM_THOILUONG',
            'phim.PHIM_TOMTAT',
            'phim.PHIM_DIEMIMDB',
            'phim.PHIM_URLPOSTER',
            'phim.PHIM_TRANGTHAI',
            'phim.PHIM_NGAYTHEM',
        )
        ->where('PHIM_TEN','like','%'.$keyword.'%')
        ->orWhere('PHIM_TOMTAT','like','%'.$keyword.'%')
        ->orWhere('THELOAI_TEN','like','%'.$keyword.'%')
        ->orWhere('DIENVIEN_TEN','like','%'.$keyword.'%')
        ->orWhere('DAODIEN_TEN','like','%'.$keyword.'%')
        ->orWhere('QUOCGIA_TEN','like','%'.$keyword.'%')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->orderByDesc('PHIM_DIEMIMDB')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function insertPhimGetId($age,$country,$year,$type,$title,$time,$summary,$imdb,$poster,$status){
        return DB::table('phim')->insertGetId(
            [
                'DOTUOI_ID'=>$age,
                'QUOCGIA_ID'=>$country,
                'NAM_ID'=>$year,
                'PHANLOAI_ID'=>$type,
                'PHIM_TEN'=>$title,
                'PHIM_THOILUONG'=>$time,
                'PHIM_TOMTAT'=>$summary,
                'PHIM_DIEMIMDB'=>$imdb,
                'PHIM_URLPOSTER'=>$poster,
                'PHIM_NGAYTHEM'=>date('Y-m-d'),
                'PHIM_TRANGTHAI'=>$status

        ]);
    }
    public static function getTongPhim(){
        return DB::table('phim')->count('*');
    }
    public static function getTBSaoDanhGia(){
        return DB::select('SELECT a.PHIM_ID, AVG(c.DANHGIA_SOSAO) TBSAO from phim as a, danhgia as c WHERE a.PHIM_ID=c.PHIM_ID GROUP BY a.PHIM_ID');
    }

    public static function getDanhMucPhim(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('phim')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select('*')
        ->orderBy('PHIM_ID')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function getPhim($phim_id){
        return DB::table('phim')->select('*')->where('PHIM_ID','=',$phim_id)->get();
    }
    public static function updatePhim($phim_id,$pathfilename){
        DB::table('phim')
        ->where('PHIM_ID','=',$phim_id)
        ->update(['PHIM_URLPOSTER'=>$pathfilename]);

    }
    public static function searchPhimAdmin($keyword){

        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('phim')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select('*')
        ->where('PHIM_TEN','like','%'.$keyword.'%')
        ->orderBy('PHIM_ID')
        ->paginate($soPhanTuTrongTrang);

    }
    public static function sortPhimId(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('phim')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select('*')
        ->orderBy('PHIM_TEN')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function sortPhimDate(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('phim')->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')->select('*')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function sortPhimStatus(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('phim')->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')->select('*')
        ->orderBy('PHIM_TRANGTHAI')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function sortPhimImdb(){
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        return DB::table('phim')->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')->select('*')
        ->orderByDesc('PHIM_DIEMIMDB')
        ->paginate($soPhanTuTrongTrang);
    }
    public static function lockFilm($phim_id){
        DB::table('phim')
        ->where('PHIM_ID','=',$phim_id)
        ->update([
            'PHIM_TRANGTHAI'=>'Sắp ra mắt'
        ]);
    }
    public static function unLockFilm($phim_id){
        DB::table('phim')
        ->where('PHIM_ID','=',$phim_id)
        ->update([
            'PHIM_TRANGTHAI'=>'Đã ra mắt'
        ]);
    }
    public static function editPhim($phim_id,$age,$country,$year,$title,$time,$summary,$imdb,$status){
        DB::table('phim')
        ->where('PHIM_ID','=',$phim_id)
        ->update(
            [
                'DOTUOI_ID'=>$age,
                'QUOCGIA_ID'=>$country,
                'NAM_ID'=>$year,
                'PHIM_TEN'=>$title,
                'PHIM_THOILUONG'=>$time,
                'PHIM_TOMTAT'=>$summary,
                'PHIM_DIEMIMDB'=>$imdb,
                'PHIM_TRANGTHAI'=>$status

        ]);
    }
    public static function getUrlPhim($phim_id){
        return DB::select('select * from tap where PHIM_ID = ?', [$phim_id]);
    }
    public static function deletePhim($phim_id){
        return DB::table('phim')->where('PHIM_ID','=',$phim_id)->delete();
    }
    public static function getPhimDaThemThangNay(){
        return DB::table('phim')
        ->whereMonth('PHIM_NGAYTHEM', date("m"))
        ->count();
    }
    public static function getPhimGanDay(){
        return DB::table('phim')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select('phim.PHIM_ID','phim.PHIM_TEN','phanloai.PHANLOAI_TEN','phim.PHIM_TRANGTHAI')
        ->orderByDesc('PHIM_NGAYTHEM')
        ->LIMIT(5)
        ->get();
    }
    public static function getPhimTop(){
        return DB::table('phim')
        ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        ->select('phim.PHIM_ID','phim.PHIM_TEN','phanloai.PHANLOAI_TEN','phim.PHIM_DIEMIMDB')
        ->orderByDesc('PHIM_DIEMIMDB')
        ->LIMIT(5)
        ->get();
    }


}
