<div class="banner_alert">
    <br>
    @if ($message = Session::get('success'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="success_alert">Thanh toán thành công !</strong>
    </div>

    @endif
    @if ($message = Session::get('unsuccess'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">KHÔNG thành công ! Đã xảy ra lỗi ! </strong>
    </div>
    @endif
</div>

