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
                    <form action="{{ route('adminstatisticalfilter') }}" method="GET">
					<div class="main__title">

						<h2>Thống kê doanh thu doanh số </h2>

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
                    $tongDoanhThu=0
                @endphp
                @php
                    $tongSoGoi=0
                @endphp

                @foreach ($thongKe as $i)
                <!-- THỐNG KÊ -->
                <div class="col-12">

                    <div class="col-12 col-sm-6 col-xl-12">
                        <div class="stats">
                            <p>{{$sapXep}} {{$i->THONGKE}}</p>
                            <i class="icon ion-ios-stats"></i>
                            @php
                            $tongDoanhThu=0
                            @endphp
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-12">
                        <br>
                    <script src="{{ asset('asset/js/chart.min.js') }}"></script>
                    <canvas id="myChartDT{{$i->THONGKE}}" class="chart" style="background-color: white"></canvas>
                    @php
                    $goicoban=0
                    @endphp
                    @php
                        $goipremium=0
                    @endphp
                    @php
                        $goicaocap=0
                    @endphp
                    @foreach ($thongKeSoLuong as $j)
                        @if ($j->THONGKE==$i->THONGKE)
                            @if ($j->LOAIGOI_TEN=="Gói cơ bản")
                                @php
                                    $goicoban=$j->SOLUONG*$giaCoBan

                                @endphp
                                @php
                                    $tongDoanhThu+=$goicoban
                                @endphp
                            @endif
                            @if ($j->LOAIGOI_TEN=="Gói premium")
                                @php
                                    $goipremium=$j->SOLUONG*$giaPremium
                                @endphp
                                @php
                                    $tongDoanhThu+=$goipremium
                                @endphp
                            @endif
                            @if ($j->LOAIGOI_TEN=="Gói cao cấp")
                                @php
                                    $goicaocap=$j->SOLUONG*$giaCaoCap
                                @endphp
                                @php
                                    $tongDoanhThu+=$goicaocap
                                @endphp
                            @endif

                        @endif
                    @endforeach
                    <script>
                        var xValues = ["Gói cơ bản", "Gói premium", "Gói cao cấp"];
                        var yValues = [
                            {{$goicoban}},
                            {{$goipremium}},
                            {{$goicaocap}},
                            0
                        ];
                        var barColors = ["red", "green","blue"];

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
                              text: "Thống kê doanh thu gói bán được (Đơn vị: VNĐ)"
                            }
                          }
                        });
                    </script>
                    <canvas id="myChartSL{{$i->THONGKE}}" class="chart" style="background-color: white"></canvas>
                    <script>
                    @php
                        $goicoban=0
                    @endphp
                    @php
                        $goipremium=0
                    @endphp
                    @php
                        $goicaocap=0
                    @endphp
                    @foreach ($thongKeSoLuong as $j)
                        @if ($j->THONGKE==$i->THONGKE)
                            @if ($j->LOAIGOI_TEN=="Gói cơ bản")
                                @php
                                    $goicoban=$j->SOLUONG
                                @endphp
                                @php
                                    $tongSoGoi+=$goicoban
                                @endphp
                            @endif
                            @if ($j->LOAIGOI_TEN=="Gói premium")
                                @php
                                    $goipremium=$j->SOLUONG
                                @endphp
                                @php
                                    $tongSoGoi+=$goipremium
                                @endphp
                            @endif
                            @if ($j->LOAIGOI_TEN=="Gói cao cấp")
                                @php
                                    $goicaocap=$j->SOLUONG
                                @endphp
                                @php
                                    $tongSoGoi+=$goicaocap
                                @endphp
                            @endif

                        @endif
                    @endforeach
                    var xValues = ["Gói cơ bản", "Gói premium", "Gói cao cấp"];
                    var yValues = [
                        {{$goicoban}},
                        {{$goipremium}},
                        {{$goicaocap}},
                        0

                    ];
                    var barColors = ["red", "green","blue"];

                    new Chart("myChartSL{{$i->THONGKE}}", {
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
                          text: "Thống kê số sản phẩm bán được (Đơn vị: Số gói)"
                        }
                      }
                    });
                    </script>
                    </div>
                </div>
                <div class="col-12">
                    <br>
                    <br><br>
                    <div class="col-12 col-sm-6 col-xl-12">
                        <div class="stats">

                            <span>Tổng doanh thu:
                                <div class="main__table-text main__table-text--green">
                                    <h2>
                                        {{number_format($tongDoanhThu, 0, '', ',')}} VNĐ
                                    </h2>
                                </div>
                            </span>
                            <span>Tổng số gói được bán: {{$tongSoGoi}} GÓI [ {{$goicoban}} gói cơ bản | {{$goipremium}} gói premium | {{$goicaocap}} gói cao cấp ]</span>
                            @php
                            $tongDoanhThu=0
                            @endphp
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- END THỐNG KÊ -->

			</div>
		</div>
	</main>
	<!-- end main content -->



@endsection
