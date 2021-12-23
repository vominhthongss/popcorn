@extends('users.main')
@section('content')
<!-- main content -->

<section class="info">

    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="infodetail">
                    <div class="col-12 col-lg-12">
                        @include('users.elements.alertinfo');
                        <div class="infocontainer">
                            <button class="infobutton" onclick="displayEdit()" >
                                <i class="icon ion-ios-create"></i> Chỉnh sửa thông tin
                            </button>
                            <a href="#modal-changepassword" class="infobutton open-modal" >
                                <i class="icon ion-ios-lock"></i> Đổi mật khẩu
                            </a>
                            <a href="#modal-changeavatar" class="infobutton open-modal" >
                                <i class="icon ion-ios-image"></i> Đổi ảnh đại diện
                            </a>
                        </div>

                        <form action="{{ route('changeinfo') }}" class="profile__form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="profile__title">THÔNG TIN CỦA BẠN
                                        <div class="profile__meta profile__meta--green">
                                            @if ($soGoi>0)
                                                @foreach ($goiDaMua as $item)
                                                <h3>Gói đang sử dụng: <span>{{$item->LOAIGOI_TEN}}</span></h3>

                                                <h3>Hôm nay ngày: <span>{{date('d/m/Y')}}</span></h3>
                                                <span>Ngày hết hạn: {{date('d/m/Y', strtotime($item->GOIMUA_NGAYHETHAN))}}</span>
                                                @endforeach
                                            @else
                                                <h3>Gói đang sử dụng: <span>Chưa có gói nào !</span></h3>
                                            @endif



                                        </div>
                                    </h4>

                                </div>
                                <input type="hidden" name="thanhvien_id" value="{{Cookie::get('id')}}">
                                @foreach ($thongTinCaNhan as $item)

                                <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                    <div class="profile__group">
                                        <label class="profile__label" for="email">Email</label>
                                        <input readonly id="email" type="text" name="email" class="profile__input" placeholder="{{$item->THANHVIEN_EMAIL}}"
                                        value="{{$item->THANHVIEN_EMAIL}}"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        title="Email không hợp lệ !"
                                        required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                    <div class="profile__group">
                                        <label class="profile__label" for="sdt">Số điện thoại</label>
                                        <input readonly id="sdt" type="number" name="sodienthoai" class="profile__input" placeholder="{{$item->THANHVIEN_SODIENTHOAI}}"
                                        value="{{$item->THANHVIEN_SODIENTHOAI}}"
                                        required>
                                    </div>
                                </div>



                                <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                    <div class="profile__group">
                                        <label class="profile__label" for="name">Họ tên</label>
                                        <input readonly id="name" type="text" name="hoten" class="profile__input" placeholder="{{$item->THANHVIEN_HOTEN}}"
                                        value="{{$item->THANHVIEN_HOTEN}}"
                                        required>
                                    </div>
                                </div>

                                @endforeach



                                <div class="col-12" id="save-button" style="display: none">
                                    <div class="infosection__btns">
                                    <button type="submit()" class="infosection__btn" type="button" >Lưu</button>
                                    <button class="infosection2__btn" type="button" onclick="hideEdit()" >Hủy</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                        <a href="#modal-deleteaccount" class="infodelete open-modal"><i class="icon ion-ios-trash"> </i> Xóa tài khoản</a>

                    </div>
                </div>
            {{-- </a> --}}
            </div>
        </div>
    </div>
    <!-- modal changeavatar -->
	<div id="modal-changeavatar" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Đổi ảnh đại diện</h6>
            <div class="row">
                    <div class="col-12 col-sm-6 col-md-12">
                        {{--  Cập nhật ảnh đại diện  --}}
                        <form action="{{ route('changeavt') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="form__img">
                                <!-- Avatar -->
                                <label for="form__img-upload">Thay ảnh đại diện</label>
                                <input id="form__img-upload" name="avatar" type="file" accept=".png, .jpg, .jpeg" required="required">
                                @foreach ($thongTinCaNhan as $item)

                                <img id="form__img" src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt=" " class="avatar">

                                @endforeach
                            </div>
                            <div class="col-12">
                                <button id="uploadAvtButton" type="submit()" class="section__btn" style="display: none" >Lưu</button>
                            </div>
                            {{--  <div class="modal__btns">
                                <button class="modal__btn modal__btn--apply" type="button">Thay đổi</button>
                                <button class="modal__btn modal__btn--dismiss" type="button">Hủy</button>
                            </div>  --}}
                        </form>
                        @foreach ($thongTinCaNhan as $item)
                        @if ($item->THANHVIEN_ANHDAIDIEN!='asset/avatar/no_avatar.png')
                        <form action="{{ route('deleteavt') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <button id="deleteAvtButton" type="submit()" class="section__btn">Gỡ bỏ</button>
                            </div>
                        </form>

                        @endif

                        @endforeach
                        {{--  end cập nhật ảnh đại diện  --}}
                    </div>
            </div>
	</div>
	<!-- end modal changeavatar  -->
    <!-- modal changepassword -->
	<div id="modal-changepassword" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Đổi mật khẩu</h6>


            <form action="{{ route('changepass') }}" class="profile__form" method="POST">
                @csrf
                <div class="row">

                    <input type="hidden" name="thanhvien_id" value="{{Cookie::get('id')}}">
                    <div class="col-12">
                        <h4 class="profile__title">Đổi mật khẩu</h4>
                    </div>

                    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                        <div class="profile__group">
                            <label class="profile__label" for="oldpass">Mật khẩu cũ</label>
                            <input id="oldpass" type="password" name="oldpass" class="profile__input"
                            minlength="8" maxlength="100"
                            required="required"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Bao gồm ít nhất 1 chữ số, 1 chữ thường và 1 chữ in hoa, ít nhất 8 ký tự"
                            >
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                        <div class="profile__group">
                            <label class="profile__label" for="newpass">Mật khẩu mới</label>
                            <input id="newpass" type="password" name="newpass" class="profile__input"
                            minlength="8" maxlength="100"
                            required="required"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Bao gồm ít nhất 1 chữ số, 1 chữ thường và 1 chữ in hoa, ít nhất 8 ký tự"
                            >
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                        <div class="profile__group">
                            <label class="profile__label" for="confirmpass">Nhập lại mật khẩu mới</label>
                            <input id="confirmpass" type="password" name="confirmpass" class="profile__input"
                            minlength="8" maxlength="100"
                            required="required"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Bao gồm ít nhất 1 chữ số, 1 chữ thường và 1 chữ in hoa, ít nhất 8 ký tự"
                            >
                        </div>
                    </div>
                </div>
                <div class="modal__btns">
                    <button class="modal__btn modal__btn--apply" type="submit()">Thay đổi</button>
                    <button class="modal__btn modal__btn--dismiss" type="button">Hủy</button>
                </div>
            </form>


	</div>
	<!-- end modal changepassword -->

	<!-- modal delete -->
	<div id="modal-deleteaccount" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Xóa tài khoản</h6>

		<p class="modal__text">Bạn chắc chứ?</p>
        <form action="{{ route('deleteaccount') }}" class="profile__form" method="POST">
            @csrf
            <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                <div class="profile__group">
                    <label class="profile__label" for="thanhvien_matkhau">Nhập mật khẩu để xác minh đó là bạn !</label>

                    <input type="password" name="thanhvien_matkhau" class="profile__input" required>
                </div>
            </div>
            <div class="modal__btns">
                <button type="submit()" class="modal__btn modal__btn--apply">Xóa</button>
                <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
            </div>
        </form>
	</div>
	<!-- end modal delete -->
</section>
<!-- end main content -->

@endsection
