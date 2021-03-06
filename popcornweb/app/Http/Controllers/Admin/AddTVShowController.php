<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
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

class AddTVShowController extends Controller
{
    private $path='admin.addtvshow';
    function index(Request $request){
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


        $sotap=$request->input('episode');
        #view('admin.addtvshow.index')
        return view($view,['soTap'=>$sotap,'nam'=>$nam,'doTuoi'=>$dotuoi,'quocGia'=>$quocgia,'theLoai'=>$theloai,'dienVien'=>$dienvien,'daoDien'=>$daodien]);
    }
    function uploadtvshow(Request $request){
        if (!Cookie::get('adminhoten')){
            return redirect()->route('adminsignin');
        }
        if (session('adminvaitro')!='Admin'){

            return redirect()->route('admin404');
        }


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


            // foreach ($genre as $a){
            //     echo $a;
            // }
            // foreach ($cast as $a){
            //     echo $a;
            // }
            // foreach ($director as $a){
            //     echo $a;
            // }
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
            //B?????C 1:Ch??n v??o b???ng PHIM sau ???? l???y phim_id ch??n v??o b???ng TAP
            $phim_id=Phim::insertPhimGetId($age,$country,$year,1,$title,$time,$summary,$imdb,$poster[0],$status);
            // DB::table('phim')->insertGetId(
            //     [
            //         'DOTUOI_ID'=>$age,
            //         'QUOCGIA_ID'=>$country,
            //         'NAM_ID'=>$year,
            //         'PHANLOAI_ID'=>1,
            //         'PHIM_TEN'=>$title,
            //         'PHIM_THOILUONG'=>$time,
            //         'PHIM_TOMTAT'=>$summary,
            //         'PHIM_DIEMIMDB'=>$imdb,
            //         'PHIM_URLPOSTER'=>$poster[0],
            //         'PHIM_NGAYTHEM'=>date('Y-m-d'),
            //         'PHIM_TRANGTHAI'=>$status

            // ]);
            //B?????C 2: Ch??n v??o b???ng THELOAIPHIM
            foreach ($genre as $i){
                TheLoaiPhim::insertTheLoaiPhim($phim_id,$i);
                // DB::table('theloaiphim')->insert([
                //     'PHIM_ID'=>$phim_id,
                //     'THELOAI_ID'=>$i
                // ]);
            }
            //B?????C 3: Ch??n v??o b???ng THAMGIA
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

            //T???o m???ng l??u ???????ng d???n ph??? ?????
            $captions=array();
            if($request->hasFile('caption'))
            {

                $episode=1;
                foreach ($request->file('caption') as $file) {
                    //$filename = $file->getClientOriginalName();
                    $filename=$title.'_ep_'.$episode.'.vtt';
                    $path = 'asset/captions/';
                    if(File::exists($path)) {
                        File::delete($path);
                    }
                    $file->move($path, $filename);
                    $episode+=1;
                    //Th??m ???????ng d???n v??o m???ng
                    array_push($captions,$path.$filename);
                }
            }
            //B?????C 4: Ch??n v??o b???ng TAP
            if($request->hasFile('tvshow'))
            {
                $count=1;
                $episode=1;
                foreach ($request->file('tvshow') as $file) {
                    //$filename = $file->getClientOriginalName();
                    if($count==4){

                        $count=1;
                        $episode+=1;

                    }
                    $filename=$title.'_ep_'.$episode.'-'.$count.'.'.$file->extension();

                    $path = 'asset/videos/';
                    if(File::exists($path)) {
                        File::delete($path);
                    }
                    $file->move($path, $filename);
                    $tap_url=$path.$filename;
                    //Th??m v??o b???ng TAP th??ng tin theo t???ng ch???t l?????ng
                    if($count==1){
                        Tap::insertTap($phim_id,1,$episode,$tap_url,$captions[$episode-1]);
                        // DB::table('tap')->insert([
                        //     'PHIM_ID'=>$phim_id,
                        //     'CHATLUONG_ID'=>1,
                        //     'TAP_STT'=>$episode,
                        //     'TAP_URL'=>$tap_url,
                        //     'TAP_PHUDE'=>$captions[$episode-1]

                        // ]);
                    }
                    else if($count==2){
                        Tap::insertTap($phim_id,2,$episode,$tap_url,$captions[$episode-1]);
                        // DB::table('tap')->insert([
                        //     'PHIM_ID'=>$phim_id,
                        //     'CHATLUONG_ID'=>2,
                        //     'TAP_STT'=>$episode,
                        //     'TAP_URL'=>$tap_url,
                        //     'TAP_PHUDE'=>$captions[$episode-1]

                        // ]);
                    }
                    else if($count==3){
                        Tap::insertTap($phim_id,3,$episode,$tap_url,$captions[$episode-1]);
                        // DB::table('tap')->insert([
                        //     'PHIM_ID'=>$phim_id,
                        //     'CHATLUONG_ID'=>3,
                        //     'TAP_STT'=>$episode,
                        //     'TAP_URL'=>$tap_url,
                        //     'TAP_PHUDE'=>$captions[$episode-1]

                        // ]);
                    }
                    $count+=1;

                }
            }
            DB::commit();
            return redirect()->route('admindashboard')->with('success',"Th??m th??nh c??ng !");


        } catch (\Exception $ex) {
            DB::rollback();
            print($ex);
            //return back();
        }
    }

}
