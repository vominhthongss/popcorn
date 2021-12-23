<?php

namespace App\Http\Controllers\Admin;

use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\DoTuoi;
use App\Models\LuotXem;
use App\Models\Nam;
use App\Models\Phim;
use App\Models\QuocGia;
use App\Models\ThamGia;
use App\Models\TheLoai;
use App\Models\TheLoaiPhim;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class CatalogController extends Controller
{
    private $path='admin.catalog';
    function index(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $tongphim=Phim::getTongPhim();
        //DB::table('phim')->count('*');
        $data=Phim::getDanhMucPhim();
        // DB::table('phim')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select('*')
        // ->orderBy('PHIM_ID')
        // ->paginate($soPhanTuTrongTrang);

        $luotxem=LuotXem::getLuotXem();
        $tbsao=Phim::getTBSaoDanhGia();
        // DB::select('
        // SELECT B.PHIM_ID,A.LUOT FROM phim AS B,
        // (SELECT PHIM_ID,COUNT(LUOTXEM_THOIGIAN) AS LUOT FROM luotxem
        // GROUP BY PHIM_ID) AS A
        // WHERE B.PHIM_ID=A.PHIM_ID
        // ');
        return view($view,['tongPhim'=>$tongphim,'danhMucPhim'=>$data,'luotXem'=>$luotxem,'sapXep'=>'Tên','tbSao'=>$tbsao]);
    }
    function catalogedit($phim_id){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $view=$this->path.'.catalogedit';
        $nam=Nam::getAllNam();
        //DB::table('nam')->select('*')->get();
        $dotuoi=DoTuoi::getAllDoTuoi();
        //DB::table('dotuoi')->select('*')->get();
        $quocgia=QuocGia::getAllQuocGia();
        //DB::table('quocgia')->select('*')->get();
        $theloai=TheLoai::getAllTheLoai();
        //DB::table('theloai')->select('*')->get();
        $dienvien=DienVien::getAllDienVien();
        //DB::table('dienvien')->select('*')->get();
        $daodien=DaoDien::getAllDaoDien();
        //DB::table('daodien')->select('*')->get();
        $phim=Phim::getPhim($phim_id);
        //DB::table('phim')->select('*')->where('PHIM_ID','=',$phim_id)->get();

        $theloaiphim=
         TheLoaiPhim::getTheLoaiPhimEdit($phim_id);
        // DB::table('theloaiphim')
        // ->select('*')
        // ->where('PHIM_ID','=',$phim_id)
        // ->get();

        $thamgia=ThamGia::getAllDienVienThamGia($phim_id);
        // DB::table('thamgia')
        // ->join('dienvien','thamgia.DIENVIEN_ID','=','dienvien.DIENVIEN_ID')
        // ->select('thamgia.PHIM_ID','dienvien.DIENVIEN_TEN','dienvien.DIENVIEN_ID')
        // ->where('PHIM_ID','=',$phim_id)
        // ->groupBy('thamgia.PHIM_ID','dienvien.DIENVIEN_TEN','dienvien.DIENVIEN_ID')
        // ->get();

        $daodienthamgia=ThamGia::getAllDaoDienThamGia($phim_id);
        // DB::table('thamgia')
        // ->join('daodien','thamgia.DAODIEN_ID','=','daodien.DAODIEN_ID')
        // ->select('thamgia.PHIM_ID','daodien.DAODIEN_TEN','daodien.DAODIEN_ID')
        // ->where('PHIM_ID','=',$phim_id)
        // ->groupBy('thamgia.PHIM_ID','daodien.DAODIEN_TEN','daodien.DAODIEN_ID')
        // ->get();

        return view($view,[
            'nam'=>$nam,
            'doTuoi'=>$dotuoi,
            'quocGia'=>$quocgia,
            'theLoai'=>$theloai,
            'dienVien'=>$dienvien,
            'daoDien'=>$daodien,
            'phim'=>$phim,
            'theLoaiPhim'=>$theloaiphim,
            'thamGia'=>$thamgia,
            'daoDienThamGia'=>$daodienthamgia
        ]);
    }
    function changeposter(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $title=$request->input('title');
        $phim_id=$request->input('phim_id');
        DB::beginTransaction();
        try{
            if($request->hasFile('poster'))
            {

                $file=$request->file('poster');
                //$filename = $file->getClientOriginalName();
                $filename=$title.'.'.$file->extension();
                $path = 'asset/posters/';
                if(File::exists($path)) {
                    File::delete($path);
                }
                $file->move($path, $filename);
                Phim::updatePhim($phim_id,$path.$filename);
                // DB::table('phim')
                // ->where('PHIM_ID','=',$phim_id)
                // ->update(['PHIM_URLPOSTER'=>$path.$filename]);

                DB::commit();
            }
            DB::commit();
            return back();

        } catch (\Exception $ex) {
            DB::rollback();
            return back();
        }
    }
    function filmfind(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');

        $keyword=$request->input('keyword');
        $tongphim=Phim::getTongPhim();
       // DB::table('phim')->count('*');
        $data=Phim::searchPhimAdmin($keyword);
        // DB::table('phim')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select('*')
        // ->where('PHIM_TEN','like','%'.$keyword.'%')
        // ->orderBy('PHIM_ID')
        // ->paginate($soPhanTuTrongTrang);

        $luotxem=LuotXem::getLuotXem();
        // DB::select('
        // SELECT B.PHIM_ID,A.LUOT FROM phim AS B,
        // (SELECT PHIM_ID,COUNT(LUOTXEM_THOIGIAN) AS LUOT FROM luotxem
        // GROUP BY PHIM_ID) AS A
        // WHERE B.PHIM_ID=A.PHIM_ID
        // ');
        $tbsao=Phim::getTBSaoDanhGia();
        return view($view,['tongPhim'=>$tongphim,'danhMucPhim'=>$data,'luotXem'=>$luotxem,'sapXep'=>'ID','tbSao'=>$tbsao]);
    }
    function filmnamesort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $tongphim=Phim::getTongPhim();
        //DB::table('phim')->count('*');
        $data=Phim::sortPhimId();
        // DB::table('phim')
        // ->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')
        // ->select('*')
        // ->orderBy('PHIM_ID')
        // ->paginate($soPhanTuTrongTrang);

        $luotxem=LuotXem::getLuotXem();
        // DB::select('
        // SELECT B.PHIM_ID,A.LUOT FROM phim AS B,
        // (SELECT PHIM_ID,COUNT(LUOTXEM_THOIGIAN) AS LUOT FROM luotxem
        // GROUP BY PHIM_ID) AS A
        // WHERE B.PHIM_ID=A.PHIM_ID
        // ');
        $tbsao=Phim::getTBSaoDanhGia();
        return view($view,['tongPhim'=>$tongphim,'danhMucPhim'=>$data,'luotXem'=>$luotxem,'sapXep'=>'Tên','tbSao'=>$tbsao]);
    }
    function filmdatesort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $tongphim=Phim::getTongPhim();
        //DB::table('phim')->count('*');
        $data=Phim::sortPhimDate();
        // DB::table('phim')->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')->select('*')
        // ->orderByDesc('PHIM_NGAYTHEM')
        // ->paginate($soPhanTuTrongTrang);
        $luotxem=LuotXem::getLuotXem();
        // DB::select('
        // SELECT B.PHIM_ID,A.LUOT FROM phim AS B,
        // (SELECT PHIM_ID,COUNT(LUOTXEM_THOIGIAN) AS LUOT FROM luotxem
        // GROUP BY PHIM_ID) AS A
        // WHERE B.PHIM_ID=A.PHIM_ID
        // ');
        $tbsao=Phim::getTBSaoDanhGia();
        return view($view,['tongPhim'=>$tongphim,'danhMucPhim'=>$data,'luotXem'=>$luotxem,'sapXep'=>'Ngày thêm','tbSao'=>$tbsao]);
    }
    function filmstatussort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $tongphim=Phim::getTongPhim();
        //DB::table('phim')->count('*');
        $data=Phim::sortPhimStatus();
        // DB::table('phim')->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')->select('*')
        // ->orderBy('PHIM_TRANGTHAI')
        // ->paginate($soPhanTuTrongTrang);
        $luotxem=LuotXem::getLuotXem();
        // DB::select('
        // SELECT B.PHIM_ID,A.LUOT FROM phim AS B,
        // (SELECT PHIM_ID,COUNT(LUOTXEM_THOIGIAN) AS LUOT FROM luotxem
        // GROUP BY PHIM_ID) AS A
        // WHERE B.PHIM_ID=A.PHIM_ID
        // ');
        $tbsao=Phim::getTBSaoDanhGia();
        return view($view,['tongPhim'=>$tongphim,'danhMucPhim'=>$data,'luotXem'=>$luotxem,'sapXep'=>'Trạng thái','tbSao'=>$tbsao]);
    }
    function filmimdbsort(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $view=$this->path.'.index';
        $soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2');
        $tongphim=Phim::getTongPhim();
        //DB::table('phim')->count('*');
        $data=Phim::sortPhimImdb();
        // DB::table('phim')->join('phanloai','phim.PHANLOAI_ID','=','phanloai.PHANLOAI_ID')->select('*')
        // ->orderByDesc('PHIM_DIEMIMDB')
        // ->paginate($soPhanTuTrongTrang);

        $luotxem=LuotXem::getLuotXem();
        // DB::select('
        // SELECT B.PHIM_ID,A.LUOT FROM phim AS B,
        // (SELECT PHIM_ID,COUNT(LUOTXEM_THOIGIAN) AS LUOT FROM luotxem
        // GROUP BY PHIM_ID) AS A
        // WHERE B.PHIM_ID=A.PHIM_ID
        // ');
        $tbsao=Phim::getTBSaoDanhGia();
        return view($view,['tongPhim'=>$tongphim,'danhMucPhim'=>$data,'luotXem'=>$luotxem,'sapXep'=>'Điểm IMDB','tbSao'=>$tbsao]);
    }

    function filmlock(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $phim_id=$request->input('phim_id');
        Phim::lockFilm($phim_id);
        // DB::table('phim')
        // ->where('PHIM_ID','=',$phim_id)
        // ->update([
        //     'PHIM_TRANGTHAI'=>'Sắp ra mắt'
        // ]);
        return back();

    }
    function filmunlock(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $phim_id=$request->input('phim_id');
        Phim::unLockFilm($phim_id);
        // DB::table('phim')
        // ->where('PHIM_ID','=',$phim_id)
        // ->update([
        //     'PHIM_TRANGTHAI'=>'Đã ra mắt'
        // ]);
        return back();
    }

    function catalogedited(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $phim_id=$request->input('phim_id');
        $title=$request->input('title');
        $summary=$request->input('summary');
        $imdb=$request->input('imdb');
        $time=$request->input('time');
        $year=$request->input('year');
        $age=$request->input('age');
        $country=$request->input('country');
        $genre = $request->input('genre');
        $cast= $request->input('cast');
        $director = $request->input('director');
        $status=$request->input('status');
        DB::beginTransaction();
        try {
            //BƯỚC 1:Cập nhật vào bảng PHIM
            Phim::editPhim($phim_id,$age,$country,$year,$title,$time,$summary,$imdb,$status);
            // DB::table('phim')
            // ->where('PHIM_ID','=',$phim_id)
            // ->update(
            //     [
            //         'DOTUOI_ID'=>$age,
            //         'QUOCGIA_ID'=>$country,
            //         'NAM_ID'=>$year,
            //         'PHIM_TEN'=>$title,
            //         'PHIM_THOILUONG'=>$time,
            //         'PHIM_TOMTAT'=>$summary,
            //         'PHIM_DIEMIMDB'=>$imdb,
            //         'PHIM_TRANGTHAI'=>$status

            // ]);
            //BƯỚC 2: Cập nhật vào bảng THELOAIPHIM
            TheLoaiPhim::deleteTheLoaiPhim($phim_id);
            // DB::table('theloaiphim')->where('PHIM_ID','=',$phim_id)->delete();
            foreach ($genre as $i){
                TheLoaiPhim::editTheLoaiPhim($phim_id,$i);
                // DB::table('theloaiphim')->insert([
                //     'PHIM_ID'=>$phim_id,'THELOAI_ID'=>$i
                // ]);
            }
            //BƯỚC 3: Cập nhật vào bảng THAMGIA
            ThamGia::deleteThamGia($phim_id);
            // DB::table('thamgia')->where('PHIM_ID','=',$phim_id)->delete();
            foreach ($director as $i){
                foreach ($cast as $j){
                    ThamGia::insertThamGia($phim_id,$j,$i);
                    // DB::table('thamgia')->insert([
                    //     'PHIM_ID'=>$phim_id,
                    //     'DIENVIEN_ID'=>$j,
                    //     'DAODIEN_ID'=>$i
                    // ]);
                }
            }
            DB::commit();
            return back();

        } catch (\Exception $ex) {
            DB::rollback();
            return back();
        }


    }
    function deletefilm(Request $request){
        $phim_id=$request->input('phim_id');
        DB::beginTransaction();
        try{
            $row=Phim::getUrlPhim($phim_id);
            //DB::select('select * from tap where PHIM_ID = ?', [$phim_id]);
            foreach($row as $item){
                if(File::exists($item->TAP_URL)) {
                    File::delete($item->TAP_URL);
                }
            }
            Phim::deletePhim($phim_id);
            //DB::table('phim')->where('PHIM_ID','=',$phim_id)->delete();
            DB::commit();
            return back();

        } catch (\Exception $ex) {
            DB::rollback();
            return back();
        }

    }

}
