@extends('users.main')
@section('content')
<!-- main content -->
@php
$soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2')
@endphp
<section class="lovingfilm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="lovingfilmdetail">
                    <div class="col-12 col-lg-12">
                        @if ($goiDaMua->total()==0)
                        <h4 class="profile__title">BẠN CHƯA CÓ GIAO DỊCH NÀO
                        </h4>
                        @else
                        <h4 class="profile__title">LỊCH SỬ GIAO DỊCH

                        </h4>
                        <h4 class="profile__title">
                            <div class="profile__meta profile__meta--green">
                                <h3>Hôm nay ngày: <span>{{date('d/m/Y')}}</span></h3>

                            </div>
                        </h4>
                        @endif
                        <table class="lovingfilmtable" border="1">
                            <tr>
                                <th>Mã giao dịch</th>
                                <th>Tên gói</th>
                                <th>Chất lượng</th>
                                <th>Ngày mua</th>
                                <th>Ngày hết hạn</th>
                                <th>Giá</th>
                            </tr>
                            @foreach ($goiDaMua as $item)

                            <tr>
                                <td>
                                    {{$item->GOIMUA_ID}}
                                </td>
                                <td>
                                    {{$item->LOAIGOI_TEN}}
                                </td>
                                <td>
                                    {{--  {{$item->CHATLUONG_ID}}  --}}
                                    @if ($item->CHATLUONG_ID==1)
                                        480
                                    @endif
                                    @if ($item->CHATLUONG_ID==2)
                                        720
                                    @endif
                                    @if ($item->CHATLUONG_ID==3)
                                        1080
                                    @endif
                                </td>
                                <td>


                                    {{date('d/m/Y', strtotime($item->GOIMUA_NGAYMUA))}}
                                </td>
                                <td>
                                    {{date('d/m/Y', strtotime($item->GOIMUA_NGAYHETHAN))}}
                                </td>
                                <td>
                                    @foreach ($giaGoi as $item2)
                                        @if ($item2->SOTHANG_ID==$item->SOTHANG_ID && $item->CHATLUONG_ID==$item2->CHATLUONG_ID)
                                        {{number_format($item2->GIAGOI, 0, '', ',')}} VNĐ
                                        @endif
                                    @endforeach

                                </td>

                            </tr>

                            @endforeach

                        </table>


                    </div>

                </div>
                @if ($goiDaMua->total()>$soPhanTuTrongTrang)
                {{-- phân trang gridview  --}}
                <!-- paginator -->
                <div class="col-12">

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            @if ($goiDaMua->currentPage()==1)
                            <a><i class="icon ion-ios-arrow-back"></i></a>

                            @else
                            <a href="{{$goiDaMua->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                            @endif

                        </li>
                        @for ($i=0;$i<ceil($goiDaMua->total()/$soPhanTuTrongTrang);$i++)
                            @if ($goiDaMua->currentPage()==$i+1)
                            <li class="paginator__item paginator__item--active"">
                                <a href="#">{{$i+1}}</a>
                            </li>
                            @else
                            <li class="paginator__item">
                                <a href="{{$goiDaMua->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                            </li>
                            @endif
                        @endfor
                        <li class="paginator__item paginator__item--next">
                            @if ($goiDaMua->currentPage()==ceil($goiDaMua->total()/$soPhanTuTrongTrang))
                            <a><i class="icon ion-ios-arrow-forward"></i></a>

                            @else
                            <a href="{{$goiDaMua->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                            @endif
                        </li>
                    </ul>
                </div>
                <!-- end paginator -->
                 {{-- end phân trang gridview  --}}
                @endif

            </div>
        </div>
    </div>


</section>
<!-- end main content -->

@endsection
