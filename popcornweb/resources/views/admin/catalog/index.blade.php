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
						<h2>Danh mục phim</h2>

						<span class="main__title-stat">Có tất cả {{$tongPhim}} phim</span>

						<div class="main__title-wrap">
							<!-- filter sort -->
							<div class="filter" id="filter__sort">
								<span class="filter__item-label">Sắp xếp:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="{{$sapXep}}">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">

									<a href="{{ route('adminfilmnamesort') }}"><li>Tên</li></a>
                                    <a href="{{ route('adminfilmdatesort') }}"><li>Ngày thêm</li></a>
                                    <a href="{{ route('adminfilmstatussort') }}"><li>Trạng thái</li></a>
                                    <a href="{{ route('adminfilmimdbsort') }}"><li>Điểm IMDB</li></a>
								</ul>
							</div>
							<!-- end filter sort -->

							<!-- search -->
							<form action="{{ route('adminfilmfind') }}" class="main__title-form" method="GET">
								<input type="text" name="keyword" placeholder="Tên phim..">
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
									<th>TÊN PHIM</th>
									<th>ĐIÊM IMDB</th>
                                    <th>ĐÁNH GIÁ</th>
									<th>PHÂN LOẠI</th>
									<th>TRẠNG THÁI</th>
									<th>NGÀY THÊM</th>
                                    <th>LƯỢT XEM</th>
									<th>HÀNH ĐỘNG</th>
								</tr>
							</thead>

							<tbody>
                                @foreach ($danhMucPhim as $item)

								<tr>
									<td>
										<div class="main__table-text">{{$item->PHIM_ID}}</div>
									</td>
									<td>
										<div class="main__table-text">{{$item->PHIM_TEN}}</div>
									</td>
									<td>
										<div class="main__table-text main__table-text--rate">
                                            {{--  <i class="icon ion-ios-star"></i>   --}}
                                            <i></i>
                                            {{$item->PHIM_DIEMIMDB}}

                                        </div>
									</td>
                                    <td>
										<div class="main__table-text">
                                            <i class="icon ion-ios-star"></i>
                                            @php
                                                $tbsao=0
                                            @endphp
                                            @foreach ($tbSao as $x)
                                            @if ($x->PHIM_ID==$item->PHIM_ID)
                                                @php
                                                $tbsao=$x->TBSAO
                                                @endphp
                                                @break
                                            @endif
                                            @endforeach
                                            {{round($tbsao,3)}}
                                        </div>
									</td>
									<td>
										<div class="main__table-text">{{$item->PHANLOAI_TEN}}</div>
									</td>

									<td>
                                        @if ($item->PHIM_TRANGTHAI=='Đã ra mắt')
                                            <div class="main__table-text main__table-text--green">{{$item->PHIM_TRANGTHAI}}</div>
                                        @else
                                            <div class="main__table-text main__table-text--red">{{$item->PHIM_TRANGTHAI}} / khóa</div>
                                        @endif

									</td>
									<td>
										<div class="main__table-text">
                                            {{date('d/m/Y', strtotime($item->PHIM_NGAYTHEM))}}
                                        </div>
									</td>
                                    <td>
                                        @php
                                            $soLuot=0
                                        @endphp
                                        @foreach ($luotXem as $m)
                                                @if ($m->PHIM_ID==$item->PHIM_ID)
                                                @php
                                                $soLuot=$m->LUOT
                                                @endphp
                                                @endif
                                        @endforeach
                                        <div class="main__table-text">

                                            {{$soLuot}}

                                        </div>
                                    </td>
									<td>
										<div class="main__table-btns">

											<a href="{{ route('admincatalogedit', ['phim_id'=>$item->PHIM_ID]) }}" class="main__table-btn main__table-btn--edit">
												<i class="icon ion-ios-create"></i>
											</a>
                                            @if ($item->PHIM_TRANGTHAI=='Đã ra mắt')
                                                <a href="#modal-lock{{$item->PHIM_ID}}" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-lock"></i>
                                                </a>
                                                <!-- modal lock -->
                                                <div id="modal-lock{{$item->PHIM_ID}}" class="zoom-anim-dialog mfp-hide modal">
                                                    <h6 class="modal__title">Khóa phim này</h6>
                                                    <p class="modal__text">Bạn chắc chứ ?</p>
                                                        {{--  khóa phim  --}}
                                                    <form action="{{ route('adminfilmlock') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="phim_id" value="{{$item->PHIM_ID}}">
                                                        <div class="modal__btns">
                                                            <button class="modal__btn modal__btn--apply" type="submit()">Khóa</button>
                                                            <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- end modal lock -->
                                            @else
                                                <a href="#modal-unlock{{$item->PHIM_ID}}" class="main__table-btn main__table-btn--banned open-modal">
                                                    <i class="icon ion-ios-key"></i>
                                                </a>
                                                <!-- modal unlock -->
                                                <div id="modal-unlock{{$item->PHIM_ID}}" class="zoom-anim-dialog mfp-hide modal">
                                                    <h6 class="modal__title">Mở khóa phim này</h6>

                                                    <p class="modal__text">Bạn chắc chứ ?</p>
                                                        {{-- mở  khóa phim  --}}
                                                    <form action="{{ route('adminfilmunlock') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="phim_id" value="{{$item->PHIM_ID}}">
                                                        <div class="modal__btns">
                                                            <button class="modal__btn modal__btn--apply" type="submit()">Mở khóa</button>
                                                            <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- end modal unlock -->

                                            @endif
											<a href="#modal-delete{{$item->PHIM_ID}}" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i>
											</a>
                                            <!-- modal delete -->
                                            <div id="modal-delete{{$item->PHIM_ID}}" class="zoom-anim-dialog mfp-hide modal">
                                                <h6 class="modal__title">Xóa phim</h6>
                                                <p class="modal__text">Bạn có chắc muốn xóa phim này không?</p>
                                                {{--  xóa phim --}}
                                                <form action="{{ route('admindeletefilm') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="phim_id" value="{{$item->PHIM_ID}}">
                                                    <div class="modal__btns">
                                                        <button class="modal__btn modal__btn--apply" type="submit()" >Xóa</button>
                                                        <button class="modal__btn modal__btn--dismiss" type="button">Không</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end modal delete -->
										</div>



									</td>
								</tr>

                                @endforeach

                            </tbody>
						</table>
					</div>
				</div>
				<!-- end users -->


                @if ($danhMucPhim->total()>$soPhanTuTrongTrang)
                <!-- paginator -->
                <div class="col-12">
                    <div class="paginator-wrap">
						<span>Tối đa {{$soPhanTuTrongTrang}} trong {{$danhMucPhim->total()}}</span>
                    </div>
                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            @if ($danhMucPhim->currentPage()==1)
                            <a><i class="icon ion-ios-arrow-back"></i></a>

                            @else
                            <a href="{{$danhMucPhim->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                            @endif

                        </li>
                        @for ($i=0;$i<ceil($danhMucPhim->total()/$soPhanTuTrongTrang);$i++)
                            @if ($danhMucPhim->currentPage()==$i+1)
                            <li class="paginator__item paginator__item--active"">
                                <a href="#">{{$i+1}}</a>
                            </li>
                            @else
                            <li class="paginator__item">
                                <a href="{{$danhMucPhim->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                            </li>
                            @endif
                        @endfor
                        <li class="paginator__item paginator__item--next">
                            @if ($danhMucPhim->currentPage()==ceil($danhMucPhim->total()/$soPhanTuTrongTrang))
                            <a><i class="icon ion-ios-arrow-forward"></i></a>

                            @else
                            <a href="{{$danhMucPhim->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

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
