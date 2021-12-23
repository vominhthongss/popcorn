<div class="filter">
<form action="{{ route('filter') }}" method="GET">
    {{--  @csrf  --}}
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="filter__content">

                    <div class="filter__items">
                        <!-- filter item -->
                        <div class="filter__item" id="filter__genre">
                            <span class="filter__item-label">THỂ LOẠI:</span>

                            <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (isset($theloai))

                                    @foreach ($theloai as $i)
                                        @if ($i!="")
                                        <input type="button" value="{{$i}}">
                                        <input type="hidden" name="genre" id="genre" value="{{$i}}">
                                        @else
                                        <input type="button" value="Tất cả">
                                        <input type="hidden" name="genre" id="genre" >
                                        @endif

                                    @endforeach


                                @else
                                    <input type="button" value="Tất cả">
                                    <input type="hidden" name="genre" id="genre" >
                                @endif
                                <span></span>
                            </div>

                            <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
                                {{--  <li onclick="setGenre('Gây cấn');">Gây cấn</li>
                                <li onclick="setGenre('Viễn tưởng');">Viễn tưởng</li>  --}}
                                @foreach ($filterTheLoai as $item)
                                <li onclick="setGenre({{$item->THELOAI_TEN}});">{{$item->THELOAI_TEN}}</li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- end filter item -->

                        <!-- filter item -->
                        <div class="filter__item" id="filter__quality">
                            <span class="filter__item-label">QUỐC GIA:</span>

                            <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-country" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (isset($quocgia))
                                    @foreach ($quocgia as $i)
                                        @if($i!="")
                                            <input type="button" value="{{$i}}">
                                            <input type="hidden" name="country" id="country" value="{{$i}}">

                                        @else
                                            <input type="button" value="Tất cả">
                                            <input type="hidden" name="country" id="country" >
                                        @endif
                                    @endforeach
                                @else
                                    <input type="button" value="Tất cả">
                                    <input type="hidden" name="country" id="country" >
                                @endif

                                <span></span>
                            </div>

                            <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-country">
                                {{--  <li onclick="setCountry('Mỹ')">Mỹ</li>
                                <li onclick="setCountry('Hàn Quốc')">Hàn Quốc</li>
                                <li onclick="setCountry('Việt Nam')">Việt Nam</li>  --}}
                                @foreach ($filterQuocGia as $item)
                                <li onclick="setCountry({{$item->QUOCGIA_TEN}})">{{$item->QUOCGIA_TEN}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end filter item -->
                        <!-- filter item -->
                        <div class="filter__item" id="filter__year">
                            <span class="filter__item-label">NĂM:</span>

                            <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-year" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (isset($nam))
                                    @foreach ($nam as $i)
                                        @if($i!="")
                                            <input type="button" value="{{$i}}">
                                            <input type="hidden" name="year" id="year" value="{{$i}}">

                                        @else
                                            <input type="button" value="Tất cả">
                                            <input type="hidden" name="year" id="year" >
                                        @endif
                                    @endforeach

                                @else
                                    <input type="button" value="Tất cả">
                                    <input type="hidden" name="year" id="year" >
                                @endif
                                <span></span>
                            </div>

                            <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-year">

                                {{--  <li onclick="setYear('2018')">2018</li>
                                <li onclick="setYear('2021')">2021</li>  --}}
                                @foreach ($filterNam as $item)
                                <li onclick="setYear({{$item->NAM_TEN}})">{{$item->NAM_TEN}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end filter item -->
                        <!-- filter item -->
                        <div class="filter__item" id="filter__view">
                            <span class="filter__item-label">DẠNG XEM:</span>

                            <div class="filter__item-btn dropdown-toggle" role="navigation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (isset($dangxem))
                                @foreach ($dangxem as $i)
                                    @if($i!="")
                                        <input type="button" value="{{$i}}">
                                        <input type="hidden" name="view" id="view" value="{{$i}}">

                                    @else
                                        <input type="button" value="Lưới">
                                        <input type="hidden" name="view" id="view" >
                                    @endif
                                @endforeach

                            @else
                                <input type="button" value="Lưới">
                                <input type="hidden" name="view" id="view" >
                            @endif
                                <span></span>
                            </div>

                            <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-year">

                                <li onclick="setGridView()">Lưới</li>
                                <li onclick="setListView()">Danh sách</li>
                            </ul>
                        </div>
                        <!-- end filter item -->



                    </div>

                    <!-- filter btn -->
                    <button class="filter__btn" type="submit()" onclick="callFilter()" ">LỌC</button>
                    <!-- end filter btn -->


                </div>
            </div>

        </div>
    </div>
</form>
</div>
