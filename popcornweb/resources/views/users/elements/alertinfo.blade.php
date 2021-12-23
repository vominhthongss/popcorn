<div class="banner_alert">

    @if ($message = Session::get('success1'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="success_alert">Đổi mật khẩu thành công !</strong>
    </div>
    @endif
    @if ($message = Session::get('unsuccess1'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Đổi mật khẩu KHÔNG thành công ! <br> Hai mật khẩu không khớp nhau ! </strong>
    </div>
    @endif
    @if ($message = Session::get('unsuccess2'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Đổi mật khẩu KHÔNG thành công ! <br> Đã nhập sai mật khẩu cũ </strong>
    </div>
    @endif
    @if ($message = Session::get('unsuccess3'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Đổi mật khẩu KHÔNG thành công ! <br> Đã xảy ra lỗi ngoài ý muốn ! </strong>
    </div>
    @endif

    @if ($message = Session::get('success2'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="success_alert">Chỉnh sửa thông tin thành công !</strong>
    </div>
    @endif
    @if ($message = Session::get('unsuccess4'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Chỉnh sửa thông tin KHÔNG thành công! <br> Đã xảy ra lỗi ngoài ý muốn ! </strong>
    </div>
    @endif

    @if ($message = Session::get('success3'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="success_alert">Đổi ảnh đại diện thành công !</strong>
    </div>
    @endif
    @if ($message = Session::get('unsuccess5'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Đổi ảnh đại diện KHÔNG thành công! <br> Đã xảy ra lỗi ngoài ý muốn ! </strong>
    </div>
    @endif

    @if ($message = Session::get('success4'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="success_alert">Xóa ảnh đại diện thành công !</strong>
    </div>
    @endif
    @if ($message = Session::get('unsuccess6'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Xóa ảnh đại diện KHÔNG thành công! <br> Đã xảy ra lỗi ngoài ý muốn ! </strong>
    </div>
    @endif


    @if ($message = Session::get('unsuccess7'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="failed_alert">Xóa tài khoản KHÔNG thành công ! <br> Mật khẩu xác nhận sai ! </strong>
    </div>
    @endif

</div>
