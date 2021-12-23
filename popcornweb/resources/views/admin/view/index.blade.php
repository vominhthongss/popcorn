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
                    <form action="{{ route('adminviewfilter') }}" method="GET">
					<div class="main__title">

						<h2>Thống kê lượt xem theo thể loại </h2>

						<div class="main__title-wrap">

							<!-- filter sort -->
                            <input id="sapXep" name="sapXep" type="hidden" value="{{$sapXep}}">
                            <input id="nam" name="nam" type="hidden" value="{{$nam}}">
							<div class="filter" id="filter__sort">
								<span class="filter__item-label">Sắp xếp:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input id="sapXep" name="sapXep" type="button" value="{{$sapXep}}">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
									<li onclick="document.getElementById('sapXep').value='Tuần' ">Tuần</li>
                                    <li onclick="document.getElementById('sapXep').value='Tháng' ">Tháng</li>
									<li onclick="document.getElementById('sapXep').value='Quý' ">Quý</li>
                                    <li onclick="document.getElementById('sapXep').value='Năm' ">Năm</li>
								</ul>
							</div>
                            <div class="filter" id="filter__sort2">
								<span class="filter__item-label">Năm:</span>
								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input id="nam" name="nam" type="button" value="{{$nam}}">
									<span></span>
								</div>
								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
                                    @foreach ($cacNam as $y)
                                    <li onclick="document.getElementById('nam').value='{{$y->NAM}}' ">{{$y->NAM}}</li>
                                    @endforeach
								</ul>
							</div>
							<!-- end filter sort -->

                            <button type="submit()" class="section__btn"  >Lọc</button>

						</div>

					</div>
                    </form>
				</div>
                @php
                    $tongSoView=0
                @endphp
                @foreach ($thongKe as $i)
                <!-- THỐNG KÊ -->
                <div class="col-12">

                    <div class="col-12 col-sm-6 col-xl-12">
                        <div class="stats">
                            <p>{{$sapXep}} {{$i->THONGKE}}</p>
                            <i class="icon ion-ios-stats"></i>
                            @php
                            $tongSoView=0
                            @endphp
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-12">
                        <br>
                    <script src="{{ asset('asset/js/chart.min.js') }}"></script>
                    <canvas id="myChartDT{{$i->THONGKE}}" class="chart2" style="background-color: white"></canvas>
                    @php
                    $chinhkich=0
                    @endphp
                    @php
                    $gaycan=0
                    @endphp
                    @php
                    $giadinh=0
                    @endphp
                    @php
                    $hai=0
                    @endphp
                    @php
                    $hanhdong=0
                    @endphp
                    @php
                    $kinhdi=0
                    @endphp
                    @php
                    $sieuanhhung=0
                    @endphp
                    @php
                    $tinhcam=0
                    @endphp
                    @php
                    $trinhtham=0
                    @endphp
                    @php
                    $vientuong=0
                    @endphp
                    @foreach ($thongKeSoLuong as $j)
                        @if ($j->THONGKE==$i->THONGKE)
                            @if ($j->THELOAI_TEN=="Chính kịch")
                                @php
                                $chinhkich=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Gây cấn")
                                @php
                                $gaycan=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Gia đình")
                                @php
                                $giadinh=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Hài")
                                @php
                                $hai=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Hành động")
                                @php
                                $hanhdong=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Kinh dị")
                                @php
                                $kinhdi=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Siêu anh hùng")
                                @php
                                $sieuanhhung=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Tình cảm")
                                @php
                                $tinhcam=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Trinh thám")
                                @php
                                $trinhtham=$j->LUOT
                                @endphp
                            @endif
                            @if ($j->THELOAI_TEN=="Viễn tưởng")
                                @php
                                $vientuong=$j->LUOT
                                @endphp
                            @endif
                        @endif
                    @endforeach
                    <script>
                        var xValues = ["Chính kịch", "Gây cấn", "Gia đình","Hài","Hành động","Kinh dị","Siêu anh hùng","Tình cảm","Trinh thám","Viễn tưởng"];
                        var yValues = [
                            {{$chinhkich}},
                            {{$gaycan}},
                            {{$giadinh}},
                            {{$hai}},
                            {{$hanhdong}},
                            {{$kinhdi}},
                            {{$sieuanhhung}},
                            {{$tinhcam}},
                            {{$trinhtham}},
                            {{$vientuong}}
                        ];
                        var barColors = ["red", "green","blue","yellow","brown","green","orange","purple","red", "green"];

                        new Chart("myChartDT{{$i->THONGKE}}", {
                          type: "bar",
                          data: {
                            labels: xValues,
                            datasets: [{
                              backgroundColor: barColors,
                              data: yValues
                            }]
                          },
                          options: {
                            legend: {display: false},
                            title: {
                              display: true,
                              text: "Thống kê lượt xem theo thể loại"
                            }
                          }
                        });
                    </script>


                </div>

                @endforeach
                <!-- END THỐNG KÊ -->

			</div>
		</div>
	</main>
	<!-- end main content -->



@endsection
