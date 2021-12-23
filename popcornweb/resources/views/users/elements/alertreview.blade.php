<div class="alert-review">
    {{--  <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong class="success_alert">Đánh giá thành công, bấm vào <a href="#review2" class=" open-modal">đây</a> để xem đánh giá của bạn :)
        </strong>
    </div>  --}}

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong class="success_alert">Đánh giá thành công 😋</br> Bấm vào <a href="#review2" class=" open-modal">đây</a> để xem đánh giá của bạn !
        </strong>
    </div>
    @endif
    @if ($message = Session::get('unsuccess'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong class="failed_alert">Đánh giá không thành công !</strong>
    </div>
    @endif
    @if ($message = Session::get('sentiment'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong class="failed_alert">Bình luận và đánh giá không hợp lệ 😩</br> Xin bạn thực hiện lại :( !</strong>
    </div>
    @endif
</div>
