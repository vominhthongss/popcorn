<div id="review" class="zoom-anim-dialog mfp-hide modal">


    <h6 class="modal__title">Nhập đánh giá</h6>
        {{--===========================================QUAN TRỌNG===================================--}}
        <form action="{{ route('writingreview') }}" class="form" method="POST">
        {{--===========================================QUAN TRỌNG===================================--}}
            @csrf
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5">
                <label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4">
                <label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3">
                <label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2">
                <label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1" required>
                <label for="1">☆</label>
            </div>
            <textarea class="form__textarea" name="review" placeholder="Hãy cho PopCorn biết ý kiến của bạn về phim này :D" required></textarea>
            @if (Cookie::get('id'))
            <input type="hidden" name="userid" value="{{Cookie::get('id')}}">
            @endif
            @foreach ($thongTinPhim as $item)
            <input type="hidden" name="filmid" value="{{$item->PHIM_ID}}">
            @endforeach
            <div class="modal__btns">
                <button class="modal__btn modal__btn--apply" type="submit()" >Đánh giá</button>
                <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
            </div>
        </form>
        {{--===========================================QUAN TRỌNG===================================--}}
</div>
