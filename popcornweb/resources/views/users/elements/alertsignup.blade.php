<div class="banner_alert">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="success_alert">Thành công ! bấm vào
                <a href="{{ route('signin') }}">đây</a>
                để đăng nhập !
                </strong>

    </div>
    @endif
    @if ($message = Session::get('unsuccess'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Thất bại ! Số điện thoại hoặc email đã có người đăng ký !</strong>
    </div>
    @endif

</div>
