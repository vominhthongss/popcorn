<?php

namespace App\Http\Controllers\Users;

use App\Models\GoiMua;
use App\Models\LoaiGoi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class PaymentController extends Controller
{

    public function payment(Request $request)
    {


        //session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/return-vnpay";
        $vnp_TxnRef =date('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo =  $request->input('id');
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount')*100; //INPUT--------------------------------------------------
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();


        $inputData = array(
            "vnp_Version" => "2.0.0", //vnp_Version=2.1.0
            "vnp_TmnCode" => $vnp_TmnCode, //vnp_TmnCode=DEMOV210
            "vnp_Amount" => $vnp_Amount, //vnp_Amount=1806000
            "vnp_Command" => "pay", //vnp_Command=pay
            "vnp_CreateDate" => date('YmdHis'), //vnp_CreateDate=20210801153333
            "vnp_CurrCode" => "VND", //vnp_CurrCode=VND
            "vnp_IpAddr" => $vnp_IpAddr, //vnp_IpAddr=127.0.0.1
            "vnp_Locale" => $vnp_Locale, //vnp_Locale=vn
            "vnp_OrderInfo" => $vnp_OrderInfo, //vnp_OrderInfo=Thanh+toan+don+hang+%3A5
            "vnp_OrderType" => $vnp_OrderType, //vnp_OrderType=other
            "vnp_ReturnUrl" => $vnp_Returnurl, //vnp_ReturnUrl=https%3A%2F%2Fdomainmerchant.vn%2FReturnUrl
            "vnp_TxnRef" => $vnp_TxnRef, //vnp_TxnRef=5

        );
        // vnp_Amount=1806000
        // vnp_Command=pay
        // vnp_CreateDate=20210801153333
        // vnp_CurrCode=VND
        // vnp_IpAddr=127.0.0.1
        // vnp_Locale=vn
        // vnp_OrderInfo=Thanh+toan+don+hang+%3A5
        // vnp_OrderType=other
        // vnp_ReturnUrl=https%3A%2F%2Fdomainmerchant.vn%2FReturnUrl
        // vnp_TmnCode=DEMOV210
        // vnp_TxnRef=5
        // vnp_Version=2.1.0
        // vnp_SecureHash=3e0d61a0c0534b2e36680b3f7277743e8784cc4e1d68fa7d276e79c23be7d6318d338b477910a27992f5057bb1582bd44bd82ae8009ffaf6d141219218625c42
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret. $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);


    }

    public function return(Request $request)
    {
        $url = session('url_prev','/');

        $goi_id = $request->vnp_OrderInfo;
        $thanhvien_id= Cookie::get('id');
        $goimua_ngaymua=date('Y-m-d');
        $goimua_ngayhethan=date('Y-m-d', strtotime("+30 days"));


        $goi=LoaiGoi::getLoaiGoi($goi_id);
        // DB::table('loaigoi')
        // ->join('chatluong','loaigoi.CHATLUONG_ID','=','chatluong.CHATLUONG_ID')
        // ->select(
        //     'chatluong.CHATLUONG_DIENGIAI',
        // )
        // ->where('loaigoi.LOAIGOI_ID','=', $goi_id)
        // ->get();

        $chatluong="-999";

        foreach($goi as $j){
            $chatluong=$j->CHATLUONG_DIENGIAI;
        }

        if($request->vnp_ResponseCode == "00") {
            //$this->apSer->thanhtoanonline(session('cost_id'));
            DB::beginTransaction();
            try{
                GoiMua::updateGoiMua($thanhvien_id);
                // DB::table('goimua')
                // ->where('THANHVIEN_ID','=',$thanhvien_id)
                // ->where('GOIMUA_TRANGTHAI','=','Đang sử dụng')
                // ->update([
                //     'GOIMUA_TRANGTHAI'=>'Hủy'
                // ]);
                GoiMua::insertGoiMua($goi_id,$thanhvien_id,$goimua_ngaymua,$goimua_ngayhethan);
                // DB::table('goimua')->insert([
                //     'LOAIGOI_ID'=>$goi_id,
                //     'THANHVIEN_ID'=>$thanhvien_id,
                //     'GOIMUA_NGAYMUA'=>$goimua_ngaymua,
                //     'GOIMUA_NGAYHETHAN'=>$goimua_ngayhethan,
                //     'GOIMUA_TRANGTHAI'=>'Đang sử dụng'

                // ]);

                if($chatluong=="480"){
                    #Cookie::queue(Cookie::forever('goixemphim', config('allparameters.goiCoBan')));
                    #Sửa
                    session()->put('goixemphim',1);

                }
                else if($chatluong=="720"){
                    #Cookie::queue(Cookie::forever('goixemphim', config('allparameters.goiPremium')));
                    #Sửa
                    session()->put('goixemphim',2);
                }
                else if($chatluong=="1080"){
                    #Cookie::queue(Cookie::forever('goixemphim', config('allparameters.goiCaoCap')));
                    #Sửa
                    session()->put('goixemphim',3);
                }
                else{
                    #Cookie::queue(Cookie::forever('goixemphim', 0));
                    #Sửa
                    session()->put('goixemphim',0);
                }
                #Cookie::queue(Cookie::forever('ngayhethan', $ngayhethan));
                #Sửa
                session()->put('ngayhethan',$goimua_ngayhethan);
                DB::commit();
                return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ');
            } catch (\Exception $ex) {
                DB::rollback();
                return back();
            }
        }
        else{
            session()->forget('url_prev');
            return redirect($url)->with('unsuccess' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
        }

    }
}
