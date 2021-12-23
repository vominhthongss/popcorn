<div class="login_name">
    <li class="header__nav-item">
        <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Cookie::get('hoten')}}
        </a>

        <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">


            @include('users.elements.planinfo')
            <li>
                <a class="loginoption" href="{{ route('info') }}" >
                    <i class="icon ion-ios-person"></i>
                Thông tin tài khoản
                </a>
            </li>

            <li>
                <a  class="loginoption" href="{{ route('lovingfilm') }}">
                    <i class="icon ion-ios-heart"></i>
                    Phim yêu thích
                </a>
            </li>
            <li>
                <a  class="loginoption" href="{{ route('transaction') }}">
                    <i class="icon ion-ios-paper"></i>
                    Lịch sử giao dịch
                </a >

            </li>
            <li>
                <a class="loginoption" href="{{ route('logout') }}" >
                    <i class="icon ion-ios-log-out"></i>
                Đăng xuất
                </a>
            </li>

        </ul>
    </li>
</div>
