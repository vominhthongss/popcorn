<div class="sidebar">
    <!-- sidebar logo -->
    <a href="{{ route('admindashboard') }}" class="sidebar__logo">
        <img src="{{ asset('asset/img/logo.svg') }}" alt="">
    </a>
    <!-- end sidebar logo -->

    <!-- sidebar user -->
    <div class="sidebar__user">
        {{-- <div class="sidebar__user-img">
            <img src="{{ asset('asset/img/user.svg') }}" alt="">
        </div> --}}

        <div class="sidebar__user-title">
            <span>{{session('adminvaitro')}}</span>
            @if (Cookie::get('adminhoten'))
            <p>{{Cookie::get('adminhoten')}}</p>

            @endif

        </div>

        <a class="sidebar__user-btn" href="{{ route('adminlogout') }}">
            <i class="icon ion-ios-log-out"></i>
        </a>
    </div>
    <!-- end sidebar user -->

    <!-- sidebar nav -->

    <ul class="sidebar__nav">

        <li class="sidebar__nav-item">
            <a href="{{ route('admindashboard') }}" class="sidebar__nav-link"><i class="icon ion-ios-keypad"></i> Dashboard</a>
        </li>

        <li class="sidebar__nav-item">
            <a href="{{ route('adminreviews') }}" class="sidebar__nav-link"><i class="icon ion-ios-star-half"></i> Đánh giá</a>
        </li>
        <li class="sidebar__nav-item">
            <a href="{{ route('adminuseraccount') }}" class="sidebar__nav-link"><i class="icon ion-ios-contacts"></i> Thành viên</a>
        </li>
        <li class="sidebar__nav-item">
            <a href="{{ route('adminstatistical') }}" class="sidebar__nav-link"><i class="icon ion-ios-pulse"></i> Thống kê doanh thu doanh số</a>
        </li>
        <li class="sidebar__nav-item">
            <a href="{{ route('adminview') }}" class="sidebar__nav-link"><i class="icon ion-ios-pulse"></i> Thống kê lượt xem theo thể loại</a>
        </li>
        {{-- <li class="sidebar__nav-item">
            <a href="{{ route('adminstaffaccount') }}" class="sidebar__nav-link"><i class="icon ion-ios-contacts"></i> Nhân viên</a>
        </li> --}}

        {{--  <li class="sidebar__nav-item">
            <a href="{{ route('admincomments') }}" class="sidebar__nav-link"><i class="icon ion-ios-chatbubbles"></i> Bình luận</a>
        </li>  --}}
        @if (session('adminvaitro')=='Admin')
        <li class="sidebar__nav-item">
            <a href="{{ route('admincatalog') }}" class="sidebar__nav-link"><i class="icon ion-ios-film"></i> Danh mục phim</a>
        </li>

        <!-- dropdown -->
        <li class="dropdown sidebar__nav-item">
            <a class="dropdown-toggle sidebar__nav-link" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-add"></i>
                 Thêm phim
                </a>

            <ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
                <li><a href="{{ route('adminaddmovie') }}">Phim điện ảnh</a></li>
                <li><a href="#episode" class="open-modal">Phim truyền hình</a></li>
            </ul>
        </li>
        <!-- end dropdown -->

        <!-- dropdown -->
        <li class="dropdown sidebar__nav-item">
            <a class="dropdown-toggle sidebar__nav-link" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-copy"></i>
                Nhân viên
            </a>

            <ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">

                {{-- <li><a href="{{ route('adminuseredit') }}">Chỉnh sửa người dùng</a></li> --}}
                 <li><a href="{{ route('adminstaffaccount') }}">Danh sách nhân viên</a></li>
                <li><a href="{{ route('adminsignup') }}">Tạo tài khoản nhân viên</a></li>
                {{-- <li><a href="{{ route('adminforgot') }}">Quên mật khẩu</a></li>
                <li><a href="{{ route('admin404') }}">404 Page</a></li> --}}
            </ul>
        </li>
        <!-- end dropdown -->

        @endif
        <!-- modal episode -->
        <div id="episode" class="zoom-anim-dialog mfp-hide modal">
            <h6 class="modal__title">Nhập số tập</h6>
            <form action="{{ route('adminaddtvshow') }}" method="POST" >
                @csrf
                <input type="number" min="2" name="episode" class="form__input" placeholder="Số tập">

                <div class="modal__btns">
                    <button class="modal__btn modal__btn--apply" type="submit()" >Xác nhận</button>
                    <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
                </div>
            </form>
        </div>
        <!-- end modal episode -->
    </ul>
    <!-- end sidebar nav -->



    {{--  <!-- sidebar copyright -->
    <div class="sidebar__copyright">© 2020 FlixGo. <br>Create by <a href="https://themeforest.net/user/dmitryvolkov/portfolio" target="_blank">Dmitry Volkov</a></div>
    <!-- end sidebar copyright -->  --}}
</div>
