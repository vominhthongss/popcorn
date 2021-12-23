<span class="reviews__name">
    @if (Cookie::get('hoten'))
    <a href="#report{{$item->THANHVIEN_ID}}" class=" open-modal"><i class="icon ion-ios-flag"></i> Báo cáo</a>
    @endif
</span>
<div id="report{{$item->THANHVIEN_ID}}" class="zoom-anim-dialog mfp-hide modal">


    <h6 class="modal__title">Chọn báo cáo</h6>
        <form action="{{ route('report') }}" class="form" method="POST">
            @csrf
            <div class="col-12 col-lg-12">
                <select class="form__input" name="report"  id="report" placeholder="Chọn báo cáo" required="required">
                    <option value="" disabled selected>Chọn báo cáo</option>
                    @foreach ($cacBaoCao as $item2)
                    <option value="{{$item2->LOAIKHIEUNAI_ID}}">{{$item2->LOAIKHIEUNAI_TEN}}</option>
                    @endforeach
                </select>
                @foreach ($thongTinPhim as $item3)
                    <input type="hidden" name="phim_id" value="{{$item3->PHIM_ID}}">
                @endforeach
                <input type="hidden" name="thanhvien_id" value="{{$item->THANHVIEN_ID}}">
            </div>
            <div class="modal__btns">
                <button class="modal__btn modal__btn--apply" type="submit()" >Xác nhận</button>
                <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
            </div>
        </form>
</div>
