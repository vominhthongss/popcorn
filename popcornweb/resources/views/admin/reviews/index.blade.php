@extends('admin.main')
@section('content')
@php
$soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2')
@endphp
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Bình luận và đánh giá</h2>

						<span class="main__title-stat">Có {{$danhGiaTatCa->total()}} đánh giá</span>

						<div class="main__title-wrap">
							<!-- filter sort -->
							<div class="filter" id="filter__sort">
								<span class="filter__item-label">Sắp xếp:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="{{$sapXep}}">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
									<a href="{{ route('admindatereview') }}"><li>Ngày giờ</li></a>
									<a href="{{ route('adminratereview') }}"><li>Số sao</li></a>
								</ul>
							</div>
							<!-- end filter sort -->

							<!-- search -->
							<form action="{{ route('adminfindreview') }}" class="main__title-form" method="GET">
								<input type="text" name="keyword" placeholder="Tên phim, tên thành viên">
								<button type="submit()">
									<i class="icon ion-ios-search"></i>
								</button>
							</form>
							<!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->

				<!-- reviews -->
				<div class="col-12">
					<div class="main__table-wrap">
						<table class="main__table">
							<thead>
								<tr>
                                    <th>NGÀY TẠO</th>
									<th>TÊN PHIM</th>
									<th>THÀNH VIÊN</th>
									<th>NỘI DUNG</th>
									<th>ĐÁNH GIÁ</th>

									<th>HẠNH ĐỘNG</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($danhGiaTatCa as $item)

								<tr>
                                    <td>
										<div class="main__table-text">{{date('d/m/Y H:i:s', strtotime($item->DANHGIA_NGAYGIO))}}</div>
									</td>
									<td>
										<div class="main__table-text">{{$item->PHIM_TEN}}</div>
									</td>
									<td>
										<div class="main__table-text">{{$item->THANHVIEN_HOTEN}}</div>
									</td>
									<td>
										<div class="main__table-text">
                                            {{$item->DANHGIA_NOIDUNG}}
                                        </div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i>
                                        {{$item->DANHGIA_SOSAO}}
                                        </div>
									</td>


									<td>
										<div class="main__table-btns">


											<a href="#modal-view{{$item->THANHVIEN_ID}}-{{$item->PHIM_ID}}" class="main__table-btn main__table-btn--view open-modal">
												<i class="icon ion-ios-eye"></i>
											</a>

											<a href="#modal-delete{{$item->THANHVIEN_ID}}-{{$item->PHIM_ID}}" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
                                            @php
                                                $count=0
                                            @endphp
                                            @foreach ($cacBaoCao as $j)
                                            @if ($j->THANHVIEN_ID==$item->THANHVIEN_ID && $j->PHIM_ID==$item->PHIM_ID)
                                            @php
                                                $count=$count+1
                                            @endphp
                                            @php
                                                $thotuc=0;
                                                $phanbiet=0;
                                            @endphp
                                            @endif
                                            @endforeach

                                            @foreach ($cacBaoCao as $j)
                                            @if ($j->THANHVIEN_ID==$item->THANHVIEN_ID && $j->PHIM_ID==$item->PHIM_ID)
                                            <a href="#modal-report{{$item->THANHVIEN_ID}}-{{$item->PHIM_ID}}" class="main__table-btn main__table-btn--warning open-modal">
												<i class="icon ion-ios-flag"></i>
                                                {{$count}}
											</a>
                                            @break
                                            @endif

                                            @endforeach
                                            @php
                                            $count=0
                                            @endphp

                                            {{--  @foreach ($cacBaoCao as $j)
                                            @if ($j->THANHVIEN_ID==$item->THANHVIEN_ID && $j->PHIM_ID==$item->PHIM_ID)

                                                @if($j->KHIEUNAI=="Thô tục")
                                                    @php
                                                    $thotuc=$thotuc+1;
                                                    @endphp
                                                @endif
                                                @if($j->KHIEUNAI=="Phân biệt")
                                                    @php
                                                    $phanbiet=$phanbiet+1;
                                                    @endphp
                                                @endif

                                            @endif
                                            @endforeach  --}}


										</div>
                                        <!-- modal report -->
                                        <div id="modal-report{{$item->THANHVIEN_ID}}-{{$item->PHIM_ID}}" class="zoom-anim-dialog mfp-hide modal modal--view">
                                            @php
                                            $thotuc=0;
                                            $phanbiet=0;
                                            $xuyentac=0;
                                            @endphp
                                            @foreach ($cacBaoCao as $j)
                                            @if ($j->THANHVIEN_ID==$item->THANHVIEN_ID && $j->PHIM_ID==$item->PHIM_ID)

                                                @if($j->LOAIKHIEUNAI_ID==1)
                                                    @php
                                                    $thotuc=$thotuc+1;
                                                    @endphp
                                                @endif
                                                @if($j->LOAIKHIEUNAI_ID==2)
                                                    @php
                                                    $phanbiet=$phanbiet+1;
                                                    @endphp
                                                @endif
                                                @if($j->LOAIKHIEUNAI_ID==3)
                                                    @php
                                                    $xuyentac=$xuyentac+1;
                                                    @endphp
                                                @endif

                                            @endif
                                            @endforeach
                                            <h6 class="modal__title">Đếm số các báo cáo</h6>
                                            <span class="reviews__text" style="text-align: center">
                                                Phân biệt chủng tộc +{{$phanbiet}} |
                                                Thô tục, thiếu văn minh +{{$thotuc}} |
                                                Xuyên tạc, lăng mạ và phỉ báng +{{$xuyentac}}

                                            </span>

                                        </div>

                                        <!-- end modal report -->
                                        <!-- modal view -->
                                        <div id="modal-view{{$item->THANHVIEN_ID}}-{{$item->PHIM_ID}}" class="zoom-anim-dialog mfp-hide modal modal--view">
                                            <div class="reviews__autor">
                                                <img class="reviews__avatar" src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt="">
                                                <span class="reviews__name">{{$item->THANHVIEN_HOTEN}}</span>
                                                <span class="reviews__time">
                                                Được đánh giá vào ngày {{date('d/m/Y H:i:s', strtotime($item->DANHGIA_NGAYGIO))}}
                                            </span>
                                                <span class="reviews__rating"><i class="icon ion-ios-star"></i>{{$item->DANHGIA_SOSAO}}</span>
                                            </div>
                                            <p class="reviews__text">{{$item->DANHGIA_NOIDUNG}}</p>
                                        </div>
                                        <!-- end modal view -->

                                        <!-- modal delete -->
                                        <div id="modal-delete{{$item->THANHVIEN_ID}}-{{$item->PHIM_ID}}" class="zoom-anim-dialog mfp-hide modal">
                                            <h6 class="modal__title">Xóa đánh giá</h6>

                                            <p class="modal__text">Bạn chắc chứ ?</p>
                                            <form action="{{ route('admindeletereview') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="thanhvien_id" value="{{$item->THANHVIEN_ID}}">
                                                <input type="hidden" name="phim_id" value="{{$item->PHIM_ID}}">
                                                <div class="modal__btns">
                                                    <button class="modal__btn modal__btn--apply" type="submit()">Xóa</button>
                                                    <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end modal delete -->
									</td>
								</tr>

                                @endforeach

							</tbody>
						</table>
					</div>
				</div>
				<!-- end reviews -->

                @if ($danhGiaTatCa->total()>$soPhanTuTrongTrang)
                <!-- paginator -->
                <div class="col-12">
                    <div class="paginator-wrap">
						<span>Tối đa {{$soPhanTuTrongTrang}} trong {{$danhGiaTatCa->total()}}</span>
                    </div>
                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            @if ($danhGiaTatCa->currentPage()==1)
                            <a><i class="icon ion-ios-arrow-back"></i></a>

                            @else
                            <a href="{{$danhGiaTatCa->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                            @endif

                        </li>
                        @for ($i=0;$i<ceil($danhGiaTatCa->total()/$soPhanTuTrongTrang);$i++)
                            @if ($danhGiaTatCa->currentPage()==$i+1)
                            <li class="paginator__item paginator__item--active"">
                                <a href="#">{{$i+1}}</a>
                            </li>
                            @else
                            <li class="paginator__item">
                                <a href="{{$danhGiaTatCa->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                            </li>
                            @endif
                        @endfor
                        <li class="paginator__item paginator__item--next">
                            @if ($danhGiaTatCa->currentPage()==ceil($danhGiaTatCa->total()/$soPhanTuTrongTrang))
                            <a><i class="icon ion-ios-arrow-forward"></i></a>

                            @else
                            <a href="{{$danhGiaTatCa->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                            @endif
                        </li>
                    </ul>
                </div>
                <!-- end paginator -->
                 {{-- end phân trang gridview  --}}
                @endif
			</div>
		</div>
	</main>
	<!-- end main content -->



@endsection
