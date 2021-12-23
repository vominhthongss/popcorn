{{--  <main class="main">
    <div class="container-fluid">
        <div class="row">

            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Thông tin người dùng</h2>
                </div>
            </div>
            <!-- end main title -->
            <!-- profile -->
            <div class="col-12">
                <div class="profile__content">
                    <!-- profile user -->
                    <div class="profile__user">
                        <div class="profile__avatar">
                            <img src="img/user.svg" alt="">
                        </div>
                        <!-- or red -->
                        <div class="profile__meta profile__meta--green">
                            <h3>vominhthong@gmail.com</h3>
                            <div class="profile__meta profile__meta--green">
                                <h3><span>Gói cao cấp</span></h3>
                                <span>Ngày hết hạn: 29/3/2021</span>
                            </div>
                        </div>

                    </div>



                    <!-- end profile user -->

                    <!-- profile tabs nav -->
                    <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Hồ sơ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Lịch sử giao dịch</a>
                        </li>


                    </ul>
                    <!-- end profile tabs nav -->

                    <!-- profile mobile tabs nav -->
                    <div class="profile__mobile-tabs" id="profile__mobile-tabs">
                        <div class="profile__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="button" value="">
                            <span></span>
                        </div>

                        <div class="profile__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a></li>

                                <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Lịch sử giao dịch</a></li>


                            </ul>
                        </div>
                    </div>
                    <!-- end profile mobile tabs nav -->
                </div>
            </div>
            <!-- end profile -->

            <!-- content tabs -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                    <div class="col-12">
                        <div class="row">
                            {{--  <!-- avatar form -->

                            <div class="col-12 col-md-5 form__cover">
                                <div class="row">
                                        <div class="col-12 col-sm-6 col-md-12">

                                            <form action="#avt">
                                                <div class="form__img">
                                                    <!-- Avatar -->
                                                    <label for="form__img-upload">Thay ảnh đại diện</label>
                                                    <input id="form__img-upload" name="avatar" type="file" accept=".png, .jpg, .jpeg" required="required">
                                                    <img id="form__img" src="{{ asset('asset/avatar/no_avatar.png') }}" alt=" " class="avatar">
                                                </div>
                                                <div class="col-12">
                                                    <button id="uploadAvtButton" type="submit()" class="section__btn" style="display: none;">Lưu</button>
                                                </div>
                                            </form>


                                        </div>
                                </div>
                            </div>

                            <!-- end avatar form -->  --}}
                            <!-- details form -->

                            <div class="col-12 col-lg-6">

                                    <button onclick="displayEdit()" style="color: green">
                                        <i class="icon ion-ios-create"></i> Chỉnh sửa thông tin
                                    </button>
                                    <br>
                                    <a href="#modal-changepassword" class=" open-modal" style="color: green">
                                        <i class="icon ion-ios-create"></i> Đổi mật khẩu
                                    </a>
                                    <a href="#modal-changeavatar" class=" open-modal" style="color: green">
                                        <i class="icon ion-ios-create"></i> Đổi ảnh đại diện
                                    </a>
                                    {{--  Cập nhật thông tin  --}}
                                    <form action="#infodetail" class="profile__form">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="profile__title">Chi tiết hồ sơ

                                                </h4>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                                <div class="profile__group">
                                                    <label class="profile__label" for="email">Email</label>
                                                    <input readonly id="email" type="text" name="email" class="profile__input" placeholder="vominhthongss@gmail.com" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                                <div class="profile__group">
                                                    <label class="profile__label" for="sdt">Số điện thoại</label>
                                                    <input readonly id="sdt" type="text" name="sdt" class="profile__input" placeholder="Số điện thoại" required>
                                                </div>
                                            </div>



                                            <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                                                <div class="profile__group">
                                                    <label class="profile__label" for="name">Họ tên</label>
                                                    <input readonly id="name" type="text" name="name" class="profile__input" placeholder="Họ tên" required>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <button id="save-button" type="submit" class="section__btn" type="button" style="display: none">Lưu</button>
                                                <button id="cancel-button" class="section__btn" type="button" style="display: none" onclick="hideEdit()">Hủy</button>
                                            </div>


                                        </div>
                                    </form>
                                    {{-- End cập nhật thông tin  --}}


                            </div>
                            <!-- end details form -->


                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                    <!-- table -->
                    <div class="col-12">
                        <div class="main__table-wrap">
                            <table class="main__table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ITEM</th>
                                        <th>AUTHOR</th>
                                        <th>TEXT</th>
                                        <th>LIKE / DISLIKE</th>
                                        <th>CRAETED DATE</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">23</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">I Dream in Another Language</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">12 / 7</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">24</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Benched</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">67 / 22</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">25</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Whitney</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">44 / 5</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">26</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Blindspotting</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">20 / 6</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">27</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">I Dream in Another Language</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">8 / 132</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">28</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Benched</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">6 / 1</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">29</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Whitney</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">10 / 0</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">30</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Blindspotting</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">13 / 14</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">31</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">I Dream in Another Language</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">12 / 7</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main__table-text">32</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Benched</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">John Doe</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">Lorem Ipsum is simply dummy text...</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">67 / 22</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">24 Oct 2019</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-view" class="main__table-btn main__table-btn--view open-modal">
                                                    <i class="icon ion-ios-eye"></i>
                                                </a>
                                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end table -->

                    <!-- paginator -->
                    <div class="col-12">
                        <div class="paginator-wrap">
                            <span>10 from 23</span>

                            <ul class="paginator">
                                <li class="paginator__item paginator__item--prev">
                                    <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
                                </li>
                                <li class="paginator__item"><a href="#">1</a></li>
                                <li class="paginator__item paginator__item--active"><a href="#">2</a></li>
                                <li class="paginator__item"><a href="#">3</a></li>
                                <li class="paginator__item"><a href="#">4</a></li>
                                <li class="paginator__item paginator__item--next">
                                    <a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end paginator -->
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </div>
    <!-- modal changeavatar -->
	<div id="modal-changeavatar" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Đổi ảnh đại diện</h6>



            <div class="row">
                    <div class="col-12 col-sm-6 col-md-12">
                        {{--  Cập nhật ảnh đại diện  --}}
                        <form action="#avt">
                            <div class="form__img">
                                <!-- Avatar -->
                                <label for="form__img-upload">Thay ảnh đại diện</label>
                                <input id="form__img-upload" name="avatar" type="file" accept=".png, .jpg, .jpeg" required="required">
                                <img id="form__img" src="{{ asset('asset/avatar/no_avatar.png') }}" alt=" " class="avatar">
                            </div>
                            <div class="col-12">
                                <button id="uploadAvtButton" type="submit()" class="section__btn" style="display: none" >Lưu</button>
                            </div>
                            {{--  <div class="modal__btns">
                                <button class="modal__btn modal__btn--apply" type="button">Thay đổi</button>
                                <button class="modal__btn modal__btn--dismiss" type="button">Hủy</button>
                            </div>  --}}
                        </form>
                        {{--  end cập nhật ảnh đại diện  --}}

                    </div>
            </div>



	</div>
	<!-- end modal changeavatar  -->
    <!-- modal changepassword -->
	<div id="modal-changepassword" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Đổi mật khẩu</h6>


            <form action="#" class="profile__form"">
                <div class="row">


                    <div class="col-12">
                        <h4 class="profile__title">Đổi mật khẩu</h4>
                    </div>

                    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                        <div class="profile__group">
                            <label class="profile__label" for="oldpass">Mật khẩu cũ</label>
                            <input id="oldpass" type="password" name="oldpass" class="profile__input">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                        <div class="profile__group">
                            <label class="profile__label" for="newpass">Mật khẩu mới</label>
                            <input id="newpass" type="password" name="newpass" class="profile__input">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                        <div class="profile__group">
                            <label class="profile__label" for="confirmpass">Nhập lại mật khẩu mới</label>
                            <input id="confirmpass" type="password" name="confirmpass" class="profile__input">
                        </div>
                    </div>
                </div>
            </form>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Thay đổi</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Hủy</button>
		</div>
	</div>
	<!-- end modal changepassword -->

</main>--}}
