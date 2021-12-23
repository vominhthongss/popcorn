@extends('admin.main')
@section('content')

	<!-- main content -->
	<main class="main">

        @include('admin.elements.alertdashboard')
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Dashboard</h2>
                            @if (session('adminvaitro')=='Admin')
                            <span class="main__title-stat">
                                <li class="dropdown sidebar__nav-item">
                                    <a class="dropdown-toggle sidebar__nav-link" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-add"></i> Thêm phim</a>
                                    <ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
                                        <li><a href="{{ route('adminaddmovie') }}">Phim điện ảnh</a></li>
                                        <li><a href="#episode" class="open-modal">Phim truyền hình</a></li>
                                    </ul>
                                </li>
                            </span>
                            @endif
					</div>
				</div>
				<!-- end main title -->

				{{--  <!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Lượt xem tháng này</span>
						<p>5 678</p>
						<i class="icon ion-ios-stats"></i>
					</div>
				</div>
				<!-- end stats -->  --}}

				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-6">
					<div class="stats">
						<span>Phim đã thêm tháng này</span>
						<p>{{$phimDaThemThangNay}}</p>
						<i class="icon ion-ios-film"></i>
					</div>
				</div>
				<!-- end stats -->

				{{--  <!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Bình luận mới</span>
						<p>2 573</p>
						<i class="icon ion-ios-chatbubbles"></i>
					</div>
				</div>
				<!-- end stats -->  --}}

				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-6">
					<div class="stats">
						<span>Đánh giá mới</span>
						<p>{{$danhGiaHomNay}}</p>
						<i class="icon ion-ios-star-half"></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="icon ion-ios-trophy"></i> Top phim</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="{{ route('admindashboard') }}"><i class="icon ion-ios-refresh"></i></a>
								<a class="dashbox__more" href="{{ route('admincatalog') }}">Xem</a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>ID</th>
										<th>TÊN</th>
										<th>PHÂN LOẠI</th>
										<th>ĐIỂM IMDB</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($phimTop as $i)

									<tr>
										<td>
											<div class="main__table-text">{{$i->PHIM_ID}}</div>
										</td>
										<td>
											<div class="main__table-text">{{$i->PHIM_TEN}}</div>
										</td>
										<td>
											<div class="main__table-text">{{$i->PHANLOAI_TEN}}</div>
										</td>
										<td>
											<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> {{$i->PHIM_DIEMIMDB}}</div>
										</td>
									</tr>

                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->

				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="icon ion-ios-film"></i> Phim gần đây</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="{{ route('admindashboard') }}"><i class="icon ion-ios-refresh"></i></a>
								<a class="dashbox__more" href="{{ route('admincatalog') }}">Xem</a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>ID</th>
										<th>TÊN</th>
										<th>PHÂN LOẠI</th>
										<th>TRẠNG THÁI</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($phimGanDay as $i)

									<tr>
										<td>
											<div class="main__table-text">{{$i->PHIM_ID}}</div>
										</td>
										<td>
											<div class="main__table-text">{{$i->PHIM_TEN}}</div>
										</td>
										<td>
											<div class="main__table-text">{{$i->PHANLOAI_TEN}}</div>
										</td>
										<td>
											<div class="main__table-text main__table-text--green">{{$i->PHIM_TRANGTHAI}}</div>
										</td>
									</tr>

                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->

				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="icon ion-ios-contacts"></i> Người dùng gần đây</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="{{ route('admindashboard') }}"><i class="icon ion-ios-refresh"></i></a>
								<a class="dashbox__more" href="{{ route('adminuseraccount') }}">Xem</a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>ID</th>
										<th>HỌ TÊN</th>
										<th>EMAIL</th>
										<th>Số điện thoại</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($thanhVienGanDay  as $i )


									<tr>
										<td>
											<div class="main__table-text">{{$i->THANHVIEN_ID}}</div>
										</td>
										<td>
											<div class="main__table-text">{{$i->THANHVIEN_HOTEN}}</div>
										</td>
										<td>
											<div class="main__table-text main__table-text--grey">{{$i->THANHVIEN_EMAIL}}</div>
										</td>
										<td>
											<div class="main__table-text">{{$i->THANHVIEN_SODIENTHOAI}}</div>
										</td>
									</tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->

				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="icon ion-ios-star-half"></i> Đánh giá gần đây</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="{{ route('admindashboard') }}"><i class="icon ion-ios-refresh"></i></a>
								<a class="dashbox__more" href="{{ route('adminreviews') }}">Xem</a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
										<th>SỐ SAO</th>
										<th>NỘI DUNG</th>
                                        <th>NGÀY GIỜ</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($danhGiaGanDay as $i)

									<tr>
                                        <td>
                                        <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> {{$i->DANHGIA_SOSAO}}</div>
                                        </td>

										<td>
											<div class="main__table-text">{{$i->DANHGIA_NOIDUNG}}</div>
										</td>
                                        <td>
											<div class="main__table-text">{{date('d/m/Y H:i:s', strtotime($i->DANHGIA_NGAYGIO))}}</div>
										</td>


									</tr>

                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->
			</div>
		</div>
	</main>
	<!-- end main content -->
@endsection
