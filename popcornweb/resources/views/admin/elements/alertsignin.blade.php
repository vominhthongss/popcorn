<div class="banner_alert">

    @if ($message = Session::get('unsuccess1'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Sai tài khoản email !</strong>
    </div>
    @endif
    @if ($message = Session::get('unsuccess2'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Sai mật khẩu !</strong>
    </div>
    @endif

</div>
