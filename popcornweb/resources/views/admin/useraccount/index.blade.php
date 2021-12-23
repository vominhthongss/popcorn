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
						<h2>Tài khoản thành viên</h2>
						<span class="main__title-stat">Có {{$danhSachThanhVien->total()}} tài khoản</span>
						<div class="main__title-wrap">
							<!-- filter sort -->
							<div class="filter" id="filter__sort">
								<span class="filter__item-label">Sắp xếp:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="{{$sapXep}}">
									<span></span>
								</div>
								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
                                    <a href="{{ route('adminuseridsort') }}"><li>ID</li></a>
									<a href="{{ route('adminusernamesort') }}"><li>Họ tên</li></a>
									<a href="{{ route('adminuserstatussort') }}"><li>Trạng thái</li></a>
								</ul>
							</div>
							<!-- end filter sort -->

							<!-- search -->
							<form action="{{ route('adminuserfind') }}" class="main__title-form" method="GET">
								<input type="text" name="keyword" placeholder="Tên thành viên..">
								<button type="submit()">
									<i class="icon ion-ios-search"></i>
								</button>
							</form>
							<!-- end search -->
						</div>
					</div>
				</div>
				<!-- end main title -->
				<!-- users -->
				<div class="col-12">
					<div class="main__table-wrap">
						<table class="main__table">
							<thead>
								<tr>
									<th>ID</th>
									<th>EMAIL</th>
									<th>HỌ TÊN</th>
									<th>SỐ ĐIỆN THOẠI</th>
                                    <th>TRẠNG THÁI</th>
									<th>HÀNH ĐỘNG</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($danhSachThanhVien as $item)
                                    <tr>
                                        <td>
                                            {{--  ID  --}}
                                            <div class="main__table-text">{{$item->THANHVIEN_ID}}</div>
                                        </td>
                                        <td>
                                            <div class="main__user">
                                                <div class="main__avatar">
                                                    {{--  ảnh đại diện  --}}
                                                    <img src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt="">
                                                </div>
                                                <div class="main__meta">
                                                    {{--  email  --}}
                                                    <h3>{{$item->THANHVIEN_EMAIL}}</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{--  họ tên  --}}
                                            <div class="main__table-text">{{$item->THANHVIEN_HOTEN}}</div>
                                        </td>

                                        <td>
                                            {{--  số điện thoại  --}}
                                            <div class="main__table-text">{{$item->THANHVIEN_SODIENTHOAI}}</div>
                                        </td>
                                        <td>
                                            {{--  trạng thái  --}}
                                            @if ($item->THANHVIEN_TRANGTHAI=='Kích hoạt')
                                                <div class="main__table-text main__table-text--green">{{$item->THANHVIEN_TRANGTHAI}}</div>
                                            @else
                                                <div class="main__table-text main__table-text--red">{{$item->THANHVIEN_TRANGTHAI}}</div>
                                            @endif


                                        </td>
                                        <td>
                                            <div class="main__table-btns">

                                                @if ($item->THANHVIEN_TRANGTHAI=='Kích hoạt')
                                                    <a href="#modal-lock{{$item->THANHVIEN_ID}}" class="main__table-btn main__table-btn--delete open-modal">
                                                        <i class="icon ion-ios-lock"></i>
                                                    </a>
                                                    <!-- modal lock -->
                                                    <div id="modal-lock{{$item->THANHVIEN_ID}}" class="zoom-anim-dialog mfp-hide modal">
                                                        <h6 class="modal__title">Khóa tài khoản này</h6>
                                                        <p class="modal__text">Bạn chắc chứ ?</p>
                                                        <form action="{{ route('adminuserlock') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="thanhvien_id" value="{{$item->THANHVIEN_ID}}">
                                                            <div class="modal__btns">
                                                                <button class="modal__btn modal__btn--apply" type="submit()">Khóa</button>
                                                                <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- end modal lock -->
                                                @else
                                                    <a href="#modal-unlock{{$item->THANHVIEN_ID}}" class="main__table-btn main__table-btn--banned open-modal">
                                                        <i class="icon ion-ios-key"></i>
                                                    </a>
                                                    <!-- modal unlock -->
                                                    <div id="modal-unlock{{$item->THANHVIEN_ID}}" class="zoom-anim-dialog mfp-hide modal">
                                                        <h6 class="modal__title">Mở khóa tài khoản này</h6>

                                                        <p class="modal__text">Bạn chắc chứ ?</p>
                                                        <form action="{{ route('adminuserunlock') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="thanhvien_id" value="{{$item->THANHVIEN_ID}}">
                                                            <div class="modal__btns">
                                                                <button class="modal__btn modal__btn--apply" type="submit()">Mở khóa</button>
                                                                <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- end modal unlock -->
                                                @endif
                                            </div>


                                        </td>
                                    </tr>
                                    </tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- end users -->
                @if ($danhSachThanhVien->total()>$soPhanTuTrongTrang)
                <!-- paginator -->
                <div class="col-12">
                    <div class="paginator-wrap">
						<span>Tối đa {{$soPhanTuTrongTrang}} trong {{$danhSachThanhVien->total()}}</span>
                    </div>
                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            @if ($danhSachThanhVien->currentPage()==1)
                            <a><i class="icon ion-ios-arrow-back"></i></a>

                            @else
                            <a href="{{$danhSachThanhVien->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                            @endif

                        </li>
                        @for ($i=0;$i<ceil($danhSachThanhVien->total()/$soPhanTuTrongTrang);$i++)
                            @if ($danhSachThanhVien->currentPage()==$i+1)
                            <li class="paginator__item paginator__item--active"">
                                <a href="#">{{$i+1}}</a>
                            </li>
                            @else
                            <li class="paginator__item">
                                <a href="{{$danhSachThanhVien->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                            </li>
                            @endif
                        @endfor
                        <li class="paginator__item paginator__item--next">
                            @if ($danhSachThanhVien->currentPage()==ceil($danhSachThanhVien->total()/$soPhanTuTrongTrang))
                            <a><i class="icon ion-ios-arrow-forward"></i></a>

                            @else
                            <a href="{{$danhSachThanhVien->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                            @endif
                        </li>
                    </ul>
                </div>
                <!-- end paginator -->
                @endif
			</div>
		</div>
	</main>
	<!-- end main content -->



@endsection
