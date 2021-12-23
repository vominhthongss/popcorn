<?php

namespace App\Http\Controllers\Admin;

use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\DoTuoi;
use App\Models\Nam;
use App\Models\QuocGia;
use App\Models\TheLoai;
use App\Models\Phim;
use App\Models\ThamGia;
use App\Models\TheLoaiPhim;
use App\Models\Tap;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class AddMovieController extends Controller
{
    private $path='admin.addmovie';
    function index(){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }

        $view=$this->path.'.index';

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



        return view($view,['nam'=>$nam,'doTuoi'=>$dotuoi,'quocGia'=>$quocgia,'theLoai'=>$theloai,'dienVien'=>$dienvien,'daoDien'=>$daodien]);
    }
    function uploadmovie(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }
        $loi="0";

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

            $poster=array();
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
                array_push($poster,$path.$filename);

            }
            //BƯỚC 1:Chèn vào bảng PHIM sau đó lấy phim_id chèn vào bảng TAP
            $phim_id=Phim::insertPhimGetId($age,$country,$year,2,$title,$time,$summary,$imdb,$poster[0],$status);
            // DB::table('phim')->insertGetId(
            //     [
            //         'DOTUOI_ID'=>$age,
            //         'QUOCGIA_ID'=>$country,
            //         'NAM_ID'=>$year,
            //         'PHANLOAI_ID'=>2,
            //         'PHIM_TEN'=>$title,
            //         'PHIM_THOILUONG'=>$time,
            //         'PHIM_TOMTAT'=>$summary,
            //         'PHIM_DIEMIMDB'=>$imdb,
            //         'PHIM_URLPOSTER'=>$poster[0],
            //         'PHIM_NGAYTHEM'=>date('Y-m-d'),
            //         'PHIM_TRANGTHAI'=>$status

            // ]);

            //BƯỚC 2: Chèn vào bảng THELOAIPHIM
            foreach ($genre as $i){
                TheLoaiPhim::insertTheLoaiPhim($phim_id,$i);
                // DB::table('theloaiphim')->insert([
                //     'PHIM_ID'=>$phim_id,'THELOAI_ID'=>$i
                // ]);
            }
            //BƯỚC 3: Chèn vào bảng THAMGIA
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

            //Tạo mảng lưu đường dẫn phụ đề
            $captions=array();
            if($request->hasFile('caption'))
            {

                $file=$request->file('caption');
                //$filename = $file->getClientOriginalName();
                $filename=$title.'.vtt';
                $path = 'asset/captions/';
                if(File::exists($path)) {
                    File::delete($path);
                }
                $file->move($path, $filename);
                //Thêm đường dẫn vào mảng
                array_push($captions,$path.$filename);

            }
            //BƯỚC 4: Chèn vào bảng TAP
            if($request->hasFile('movie'))
            {

                $count=1;
                foreach ($request->file('movie') as $file) {
                    //$file->getClientOriginalName();
                    if($count==4){
                        $count=1;
                    }
                    $filename=$title.'-'.$count.'.'.$file->extension();
                    $path = 'asset/videos/';
                    if(File::exists($path)) {
                        File::delete($path);
                    }
                    $file->move($path, $filename);
                    $tap_url=$path.$filename;

                    //Thêm vào bảng TAP thông tin theo từng chất lượng
                    if($count==1){
                        Tap::insertTap($phim_id,1,'1',$tap_url,$captions[0]);
                        // DB::table('tap')->insert([
                        //     'PHIM_ID'=>$phim_id,
                        //     'CHATLUONG_ID'=>1,
                        //     'TAP_STT'=>'1',
                        //     'TAP_URL'=>$tap_url,
                        //     'TAP_PHUDE'=>$captions[0]

                        // ]);
                    }
                    else if($count==2){
                        Tap::insertTap($phim_id,2,'1',$tap_url,$captions[0]);
                        // DB::table('tap')->insert([
                        //     'PHIM_ID'=>$phim_id,
                        //     'CHATLUONG_ID'=>2,
                        //     'TAP_STT'=>'1',
                        //     'TAP_URL'=>$tap_url,
                        //     'TAP_PHUDE'=>$captions[0]

                        // ]);
                    }
                    else if($count==3){
                        Tap::insertTap($phim_id,3,'1',$tap_url,$captions[0]);
                        // DB::table('tap')->insert([
                        //     'PHIM_ID'=>$phim_id,
                        //     'CHATLUONG_ID'=>3,
                        //     'TAP_STT'=>'1',
                        //     'TAP_URL'=>$tap_url,
                        //     'TAP_PHUDE'=>$captions[0]

                        // ]);
                    }
                    $count+=1;

                }


            }


            DB::commit();
            return redirect()->route('admindashboard')->with('success',"Thêm thành công !");

        } catch (\Exception $ex) {

            DB::rollback();

            //return back();
        }


    }

}
