Hello <i>{{ $reset->receiver }}</i>,

<p><u>Đặt lại mật khẩu:</u></p>
<form action="{{ route('confirmtoken') }}" method="GET">

    <input type="hidden" name="thanhvien_email" value="{{ $reset->thanhvien_email }}">
    <input type="hidden" name="thanhvien_token" value="{{ $reset->thanhvien_token }}">

    <button type="submit()">Đổi lại mật khẩu mới</button>
</form>


{{--  route: resetpassword/thanhvien_id/thanhvien_token  --}}


Cảm ơn,
<br/>
<i>{{ $reset->sender }}</i>
