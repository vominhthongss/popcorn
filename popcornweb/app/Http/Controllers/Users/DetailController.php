<?php

namespace App\Http\Controllers\Users;

use App\Models\DanhGia;
use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\KhieuNaiDanhGia;
use App\Models\LoaiKhieuNai;
use App\Models\LuotXem;
use App\Models\Phim;
use App\Models\PhimYeuThich;
use App\Models\Tap;
use App\Models\TheLoai;
use App\Models\TheLoaiPhim;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use function PHPSTORM_META\map;
class DetailController extends Controller
{
    private $path='users.detail';
    function index($phim_id){
        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        #Sửa
        // if(Cookie::get('goixemphim')){
        //     $goiXemPhim=Cookie::get('goixemphim');
        // }
        if(session('goixemphim')){
            $goiXemPhim=session('goixemphim');
        }
        else{
            $goiXemPhim=3;
        }
        #lấy thể loại
        $theloai=TheLoai::getTheLoai($phim_id);
        //DB::select('select * from theloaiphim where PHIM_ID=?', [$phim_id]);
        #tăng lượt xem
        foreach($theloai as $item){
            LuotXem::insertLuotXem($phim_id,$item->THELOAI_ID);
            // DB::table('luotxem')->insert([
            //     'PHIM_ID'=>$phim_id,
            //     'THELOAI_ID'=>$item->THELOAI_ID
            // ]);
        }

        #thể loại

        $theloaiphim=TheLoaiPhim::getTheLoaiPhim();
        // DB::table('theloaiphim')
        // ->join('phim','theloaiphim.PHIM_ID','=','phim.PHIM_ID')
        // ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        // ->select('phim.PHIM_ID','theloai.THELOAI_TEN')
        // ->get();
        #diễn viên
        $dienvien=DienVien::getDienVien($phim_id);
        // DB::table('thamgia')
        // ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        // ->select('PHIM_ID','DIENVIEN_TEN')
        // ->where('PHIM_ID','=',$phim_id)
        // ->groupBy('PHIM_ID','DIENVIEN_TEN')
        // ->get();
        #đạo diễn
        $daodien=DaoDien::getDaoDien($phim_id);
        // DB::table('thamgia')
        // ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        // ->select('PHIM_ID','DAODIEN_TEN')
        // ->where('PHIM_ID','=',$phim_id)
        // ->groupBy('PHIM_ID','DAODIEN_TEN')
        // ->get();
        #tập phim

        ###Gói cao cấp
        $tapphim=Tap::getTapGoiCaoCap($phim_id,$goiXemPhim);
        // DB::table('tap')
        // ->select('*')
        // ->where('PHIM_ID','=',$phim_id)
        // ->orderBy('TAP_STT','ASC')
        // ->paginate($goiXemPhim);
        ###Gói premium
        if($goiXemPhim==2){
            $tapphim=Tap::getTapGoiPremium($phim_id,$goiXemPhim);
            // DB::table('tap')
            // ->select('*')
            // ->where(function($query) use($phim_id){
            //     $query->where('PHIM_ID','=',$phim_id);
            // })
            // ->where(function($query){
            //     $query->where('CHATLUONG_ID','=','1')
            //     ->orWhere('CHATLUONG_ID','=','2');
            // })
            // ->orderBy('TAP_STT','ASC')
            // ->paginate($goiXemPhim);
        }
         ###Gói cơ bản
        if($goiXemPhim==1){
            $tapphim=Tap::getTapGoiCoBan($phim_id,$goiXemPhim);
            // DB::table('tap')
            // ->select('*')
            // ->where('PHIM_ID','=',$phim_id)
            // ->where('CHATLUONG_ID','=','1')
            // ->orderBy('TAP_STT','ASC')
            // ->paginate($goiXemPhim);
        }

        // ->where('PHIM_ID','=',$phim_id)
        // ->where('CHATLUONG','=','480')
        // ->orWhere('CHATLUONG','=','720')



        #thông tin phim
        $thongtinphim=Phim::getThongTinPhim($phim_id);
        // DB::table('phim')
        // ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        // ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        // ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        // ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        // ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->join('thamgia','phim.PHIM_ID','=','thamgia.PHIM_ID')
        // ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        // ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        // ->select(
        //     'phim.PHIM_ID',
        //     'dotuoi.DOTUOI_TEN',
        //     'quocgia.QUOCGIA_TEN',
        //     'nam.NAM_TEN',
        //     'phanloai.PHANLOAI_TEN',
        //     'phim.PHIM_TEN',
        //     'phim.PHIM_THOILUONG',
        //     'phim.PHIM_TOMTAT',
        //     'phim.PHIM_DIEMIMDB',
        //     'phim.PHIM_URLPOSTER',
        //     'phim.PHIM_TRANGTHAI',
        //     'phim.PHIM_NGAYTHEM',
        //     )
        // ->groupBy(
        //     'phim.PHIM_ID',
        //     'dotuoi.DOTUOI_TEN',
        //     'quocgia.QUOCGIA_TEN',
        //     'nam.NAM_TEN',
        //     'phanloai.PHANLOAI_TEN',
        //     'phim.PHIM_TEN',
        //     'phim.PHIM_THOILUONG',
        //     'phim.PHIM_TOMTAT',
        //     'phim.PHIM_DIEMIMDB',
        //     'phim.PHIM_URLPOSTER',
        //     'phim.PHIM_TRANGTHAI',
        //     'phim.PHIM_NGAYTHEM',
        // )
        // ->where('phim.PHIM_ID','=',$phim_id)
        // ->get();
        #view('users.detail.index')

        $danhgia=DanhGia::getDanhGia($phim_id);
        //DB::table('danhgia')->select('*')->where('PHIM_ID','=',$phim_id)->get();
        $sodanhgia=DanhGia::getSoDanhGia($phim_id);
        //DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->count('*');


        $sodanhgia_tatca=DanhGia::getSoDanhGiaTatCa($phim_id);
        //DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->count('*');
        $danhgia_tatca=DanhGia::getDanhGiaTatCa($phim_id);
        // DB::table(DB::raw('danhgia','thanhvien'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO'
        // )
        // ->where('PHIM_ID','=',$phim_id)
        // ->orderByDesc('DANHGIA_SOSAO','DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);

        $sodanhgia_5sao=DanhGia::getSoDanhGiaVoi($phim_id,'5.0');
        //DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->where('DANHGIA_SOSAO','=','5.0')->count('*');
        $danhgia_5sao=DanhGia::getDanhGiaVoi($phim_id,'5.0');
        // DB::table(DB::raw('danhgia','thanhvien'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO'
        // )
        // ->where('DANHGIA_SOSAO','=','5.0')->where('PHIM_ID','=',$phim_id)
        // ->orderByDesc('DANHGIA_SOSAO','DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);

        $sodanhgia_4sao=DanhGia::getSoDanhGiaVoi($phim_id,'4.0');
        //DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->where('DANHGIA_SOSAO','=','4.0')->count('*');
        $danhgia_4sao=DanhGia::getDanhGiaVoi($phim_id,'4.0');
        // DB::table(DB::raw('danhgia','thanhvien'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO'
        // )
        // ->where('DANHGIA_SOSAO','=','4.0')->where('PHIM_ID','=',$phim_id)
        // ->orderByDesc('DANHGIA_SOSAO','DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);

        $sodanhgia_3sao=DanhGia::getSoDanhGiaVoi($phim_id,'3.0');
        //DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->where('DANHGIA_SOSAO','=','3.0')->count('*');
        $danhgia_3sao=DanhGia::getDanhGiaVoi($phim_id,'3.0');
        // DB::table(DB::raw('danhgia','thanhvien'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO'
        // )
        // ->where('DANHGIA_SOSAO','=','3.0')->where('PHIM_ID','=',$phim_id)
        // ->orderByDesc('DANHGIA_SOSAO','DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);

        $sodanhgia_2sao=DanhGia::getSoDanhGiaVoi($phim_id,'2.0');
        //DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->where('DANHGIA_SOSAO','=','2.0')->count('*');
        $danhgia_2sao=DanhGia::getDanhGiaVoi($phim_id,'2.0');
        // DB::table(DB::raw('danhgia','thanhvien'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO'
        // )
        // ->where('DANHGIA_SOSAO','=','2.0')->where('PHIM_ID','=',$phim_id)
        // ->orderByDesc('DANHGIA_SOSAO','DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);

        $sodanhgia_1sao=DanhGia::getSoDanhGiaVoi($phim_id,'1.0');
        //DB::table('danhgia')->where('PHIM_ID','=',$phim_id)->where('DANHGIA_SOSAO','=','1.0')->count('*');
        $danhgia_1sao=DanhGia::getDanhGiaVoi($phim_id,'1.0');
        // DB::table(DB::raw('danhgia','thanhvien'))
        // ->join('thanhvien','danhgia.THANHVIEN_ID','=','thanhvien.THANHVIEN_ID')
        // ->select(
        //     'thanhvien.THANHVIEN_ID',
        //     'thanhvien.THANHVIEN_HOTEN',
        //     'thanhvien.THANHVIEN_ANHDAIDIEN',
        //     'danhgia.DANHGIA_NOIDUNG',
        //     'danhgia.DANHGIA_SOSAO',
        //     'danhgia.DANHGIA_NGAYGIO'
        // )
        // ->where('DANHGIA_SOSAO','=','1.0')->where('PHIM_ID','=',$phim_id)
        // ->orderByDesc('DANHGIA_SOSAO','DANHGIA_NGAYGIO')
        // ->paginate($soPhanTuTrongTrang);


        if($thongtinphim=="[]"){
            return view('users.404.index');
        }

        $danhsachyeuthich=PhimYeuThich::getPhimYeuThich();
        //DB::table('phimyeuthich')->select('*')->get();

        #phim đề xuất

        $phimdexuat=Phim::getPhimDeXuat();
        // DB::table('phim')
        // ->join('theloaiphim','phim.PHIM_ID','=','theloaiphim.PHIM_ID')
        // ->join('theloai','theloaiphim.THELOAI_ID','=','theloai.THELOAI_ID')
        // ->join('dotuoi','phim.DOTUOI_ID','=','dotuoi.DOTUOI_ID')
        // ->join('quocgia','phim.QUOCGIA_ID','=','quocgia.QUOCGIA_ID')
        // ->join('nam','phim.NAM_ID','=','nam.NAM_ID')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select(
        //     'phim.PHIM_ID',
        //     'dotuoi.DOTUOI_TEN',
        //     'quocgia.QUOCGIA_TEN',
        //     'nam.NAM_TEN',
        //     'phanloai.PHANLOAI_TEN',
        //     'phim.PHIM_TEN',
        //     'phim.PHIM_THOILUONG',
        //     'phim.PHIM_TOMTAT',
        //     'phim.PHIM_DIEMIMDB',
        //     'phim.PHIM_URLPOSTER',
        //     'phim.PHIM_TRANGTHAI',
        //     'phim.PHIM_NGAYTHEM',
        //     )
        // ->groupBy(
        //     'phim.PHIM_ID',
        //     'dotuoi.DOTUOI_TEN',
        //     'quocgia.QUOCGIA_TEN',
        //     'nam.NAM_TEN',
        //     'phanloai.PHANLOAI_TEN',
        //     'phim.PHIM_TEN',
        //     'phim.PHIM_THOILUONG',
        //     'phim.PHIM_TOMTAT',
        //     'phim.PHIM_DIEMIMDB',
        //     'phim.PHIM_URLPOSTER',
        //     'phim.PHIM_TRANGTHAI',
        //     'phim.PHIM_NGAYTHEM',
        // )
        // ->where('PHIM_TRANGTHAI','=','Đã ra mắt')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->limit(6)
        // ->get();

        $cacbaocao=LoaiKhieuNai::getCacBaoCao();
        // DB::table('loaikhieunai')
        // ->select('*')
        // ->orderBy('LOAIKHIEUNAI_TEN')
        // ->get();

        return view($view,[
            'theLoaiPhim'=>$theloaiphim,
            'dienVien'=>$dienvien,
            'daoDien'=>$daodien,
            'tapPhim'=>$tapphim,
            'thongTinPhim'=>$thongtinphim,

            'soDanhGia'=>$sodanhgia,
            'danhGia'=>$danhgia,

            'danhGia_TatCa'=>$danhgia_tatca,
            'soDanhGia_TatCa'=>$sodanhgia_tatca,

            'danhGia_5sao'=>$danhgia_5sao,
            'soDanhGia_5sao'=>$sodanhgia_5sao,

            'danhGia_4sao'=>$danhgia_4sao,
            'soDanhGia_4sao'=>$sodanhgia_4sao,

            'danhGia_3sao'=>$danhgia_3sao,
            'soDanhGia_3sao'=>$sodanhgia_3sao,

            'danhGia_2sao'=>$danhgia_2sao,
            'soDanhGia_2sao'=>$sodanhgia_2sao,

            'danhGia_1sao'=>$danhgia_1sao,
            'soDanhGia_1sao'=>$sodanhgia_1sao,

            'danhSachYeuThich'=>$danhsachyeuthich,

             'phimDeXuat'=>$phimdexuat,

            'cacBaoCao'=>$cacbaocao
        ]);




    }


    function writingreview(Request $request){



        $review=$request->input('review');
        $rating=$request->input('rating');
        $userid=$request->input('userid');
        $filmid=$request->input('filmid');

        $res = Http::post('http://127.0.0.1:5000/predict', [
            'text' => $review,
        ]);
        #prediction
        $result="";
        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody());
        } elseif ($res->getStatusCode() == 404) {
            $result = redirect()->route('/');
        }
        if(($result->prediction=="0" && $rating>=3) or ($result->prediction=="1" && $rating<3)){
            try{
                DanhGia::insertDanhGia($userid,$filmid,$review,$rating);
                // DB::table('danhgia')->insert([
                //     'THANHVIEN_ID'=>$userid,
                //     'PHIM_ID'=>$filmid,
                //     'DANHGIA_NOIDUNG'=>$review,
                //     'DANHGIA_SOSAO'=>$rating
                // ]);
                return back()->with('success',"Đánh giá hoàn tất");
                //return redirect()->route('detail', ['phim_id'=>$filmid])->with('success',"Đánh giá hoàn tất");
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('unsuccess',"Đánh giá không hoàn tất");
                //return redirect()->route('detail', ['phim_id'=>$filmid])->with('unsuccess',"Đánh giá không hoàn tất");
            }
        }
        else{
            return back()->with('sentiment',"Bình luận và đánh giá không hợp lẹ");
        }


        // // return redirect()->route('detail', ['phim_id'=>$filmid])->with('success',"Đánh giá hoàn tất");


    }
    function editreview(Request $request){

        $review=$request->input('review');
        $rating=$request->input('rating');
        $userid=$request->input('userid');
        $filmid=$request->input('filmid');


        $res = Http::post('http://127.0.0.1:5000/predict', [
            'text' => $review,
        ]);
        #prediction
        $result="";
        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody());
        } elseif ($res->getStatusCode() == 404) {
            $result = redirect()->route('/');
        }


        // return redirect()->route('detail', ['phim_id'=>$filmid])->with('success',"Đánh giá hoàn tất");
        if(($result->prediction=="0" && $rating>=3) or ($result->prediction=="1" && $rating<3)){

            try{
                DanhGia::updateDanhGia($userid,$filmid,$review,$rating);
                // DB::table('danhgia')->where('THANHVIEN_ID','=',$userid)->where('PHIM_ID','=',$filmid)
                // ->update([
                //     'DANHGIA_NOIDUNG'=>$review,
                //     'DANHGIA_SOSAO'=>$rating
                // ]);
                return back()->with('success',"Đánh giá hoàn tất");
                //return redirect()->route('detail', ['phim_id'=>$filmid])->with('success',"Chỉnh sửa đánh giá hoàn tất");
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('unsuccess',"Đánh giá không hoàn tất");
                //return redirect()->route('detail', ['phim_id'=>$filmid])->with('unsuccess',"Chỉnh sửa đánh giá không hoàn tất");
            }
        }
        else{
            return back()->with('sentiment',"Bình luận và đánh giá không hợp lệ");
        }


    }
    function deletereview(Request $request){

        $userid=$request->input('userid');
        $filmid=$request->input('filmid');


        // return redirect()->route('detail', ['phim_id'=>$filmid])->with('success',"Đánh giá hoàn tất");

        try{
            DanhGia::deleteDanhGia($userid,$filmid);
            // DB::table('danhgia')
            // ->where('THANHVIEN_ID','=',$userid)
            // ->where('PHIM_ID','=',$filmid)
            // ->delete();
            return back();
            //return redirect()->route('detail', ['phim_id'=>$filmid])->with('success',"Chỉnh sửa đánh giá hoàn tất");
        } catch (\Illuminate\Database\QueryException $e) {
            return back();
            //return redirect()->route('detail', ['phim_id'=>$filmid])->with('unsuccess',"Chỉnh sửa đánh giá không hoàn tất");
        }

    }
    function love(Request $request){
        $userid=$request->input('userid');
        $filmid=$request->input('filmid');
        try{
            PhimYeuThich::insertPhimYeuThich($filmid,$userid);
            // DB::table('phimyeuthich')->insert([
            //     'PHIM_ID'=>$filmid,
            //     'THANHVIEN_ID'=>$userid
            // ]);
            return back();
            // return redirect()->route('detail', ['phim_id'=>$filmid]);
        } catch (\Illuminate\Database\QueryException $e) {
            return back();
            //return redirect()->route('detail', ['phim_id'=>$filmid]);
        }

    }
    function unlove(Request $request){
        $userid=$request->input('userid');
        $filmid=$request->input('filmid');
        $userid=$request->input('userid');
        $filmid=$request->input('filmid');
        try{
            PhimYeuThich::deletePhimYeuThich($filmid,$userid);
            // DB::table('phimyeuthich')
            // ->where('PHIM_ID','=',$filmid)
            // ->where('THANHVIEN_ID','=',$userid)
            // ->delete();
            // return back();
            // return redirect()->route('detail', ['phim_id'=>$filmid]);
        } catch (\Illuminate\Database\QueryException $e) {
            return back();
            //return redirect()->route('detail', ['phim_id'=>$filmid]);
        }
    }
    function report(Request $request){
        $userid=$request->input('thanhvien_id');
        $filmid=$request->input('phim_id');
        $report=$request->input('report');
        try{
            KhieuNaiDanhGia::insertKhieuNaiDanhGia($userid,$filmid,$report);
            // DB::table('khieunaidanhgia')->insert([
            //     'THANHVIEN_ID'=>$userid,
            //     'PHIM_ID'=>$filmid,
            //     'LOAIKHIEUNAI_ID'=>$report
            // ]);
            return back();
            // return redirect()->route('detail', ['phim_id'=>$filmid]);
        } catch (\Illuminate\Database\QueryException $e) {
            return back();
            //return redirect()->route('detail', ['phim_id'=>$filmid]);
        }
    }
}
