<li>
    <a class="loginoption" href="#">
        <i class="icon ion-ios-paper"></i>

    @if (session('goixemphim')==1)
        Gói cơ bản
    @elseif (session('goixemphim')==2)
        Gói premium
    @elseif (session('goixemphim')==3)
        Gói cao cấp
    @else
        Chưa có gói nào
    @endif
    </a>
</li>
<li>

    <a class="loginoption" href="#">
        <i class="icon ion-ios-paper"></i>
    {{--  @if (Cookie::get('ngayhethan')>=date('Y-m-d'))  --}}



        @if (session('ngayhethan')>=date('Y-m-d'))
            Ngày hết hạn:

            {{date('d/m/Y', strtotime(session('ngayhethan')))}}
        @elseif (session('ngayhethan')<date('Y-m-d'))
            Đã hết hạn

            {{session()->put('goixemphim',0)}}
            @php
                DB::table('goimua')
                ->where('GOIMUA_TRANGTHAI','=','Đang sử dụng')
                ->where('THANHVIEN_ID','=',Cookie::get('id'))
                ->update([
                    'GOIMUA_TRANGTHAI'=>'Hết hạn'
                ])
            @endphp
            {{session()->forget('ngayhethan')}}
                {{--  @if(Cookie::get('ghinho')==1)
                {{session()->put('goixemphim',0)}}
                    @php
                        Cookie::queue(Cookie::forever('goixemphim', 0))

                    @endphp
                @else
                {{session()->put('goixemphim',0)}}
                    @php
                        Cookie::queue('goixemphim', 0, 0)

                    @endphp
                @endif  --}}
        @endif

    </a>
</li>
