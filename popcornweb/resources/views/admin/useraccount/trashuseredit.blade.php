@extends('admin.main')
@section('content')

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Edit user</h2>
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
								<h3>Username <span>(Approved)</span></h3>
								<span>FlixGo ID: 23562</span>
							</div>
						</div>
						<!-- end profile user -->

						<!-- profile tabs nav -->
						<ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Comments</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews</a>
							</li>
						</ul>
						<!-- end profile tabs nav -->

						<!-- profile mobile tabs nav -->
						<div class="profile__mobile-tabs" id="profile__mobile-tabs">
							<div class="profile__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Profile">
								<span></span>
							</div>

							<div class="profile__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Profile</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Comments</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews</a></li>
								</ul>
							</div>
						</div>
						<!-- end profile mobile tabs nav -->

						<!-- profile btns -->
						<div class="profile__actions">
							<a href="#modal-status3" class="profile__action profile__action--banned open-modal"><i class="icon ion-ios-lock"></i></a>
							<a href="#modal-delete3" class="profile__action profile__action--delete open-modal"><i class="icon ion-ios-trash"></i></a>
						</div>
						<!-- end profile btns -->
					</div>
				</div>
				<!-- end profile -->

				<!-- content tabs -->
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
						<div class="col-12">
							<div class="row">
								<!-- details form -->
								<div class="col-12 col-lg-6">
									<form action="#" class="profile__form">
										<div class="row">
											<div class="col-12">
												<h4 class="profile__title">Profile details</h4>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="username">Username</label>
													<input id="username" type="text" name="username" class="profile__input" placeholder="User 123">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="email">Email</label>
													<input id="email" type="text" name="email" class="profile__input" placeholder="email@email.com">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="firstname">First Name</label>
													<input id="firstname" type="text" name="firstname" class="profile__input" placeholder="John">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="lastname">Last Name</label>
													<input id="lastname" type="text" name="lastname" class="profile__input" placeholder="Doe">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="subscription">Subscription</label>
													<select class="js-example-basic-single" id="subscription">
														<option value="Basic">Basic</option>
														<option value="Premium">Premium</option>
														<option value="Cinematic">Cinematic</option>
													</select>
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="rights">Rights</label>
													<select class="js-example-basic-single" id="rights">
														<option value="User">User</option>
														<option value="Moderator">Moderator</option>
														<option value="Admin">Admin</option>
													</select>
												</div>
											</div>

											<div class="col-12">
												<button class="profile__btn" type="button">Save</button>
											</div>
										</div>
									</form>
								</div>
								<!-- end details form -->

								<!-- password form -->
								<div class="col-12 col-lg-6">
									<form action="#" class="profile__form">
										<div class="row">
											<div class="col-12">
												<h4 class="profile__title">Change password</h4>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="oldpass">Old Password</label>
													<input id="oldpass" type="password" name="oldpass" class="profile__input">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="newpass">New Password</label>
													<input id="newpass" type="password" name="newpass" class="profile__input">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="confirmpass">Confirm New Password</label>
													<input id="confirmpass" type="password" name="confirmpass" class="profile__input">
												</div>
											</div>

											<div class="col-12">
												<button class="profile__btn" type="button">Change</button>
											</div>
										</div>
									</form>
								</div>
								<!-- end password form -->
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

					<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
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
											<th>RATING</th>
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 7.9</div>
											</td>
											<td>
												<div class="main__table-text">12 / 7</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 8.6</div>
											</td>
											<td>
												<div class="main__table-text">67 / 22</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 6.0</div>
											</td>
											<td>
												<div class="main__table-text">44 / 5</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 9.1</div>
											</td>
											<td>
												<div class="main__table-text">20 / 6</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 5.5</div>
											</td>
											<td>
												<div class="main__table-text">8 / 132</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 7.0</div>
											</td>
											<td>
												<div class="main__table-text">6 / 1</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 9.0</div>
											</td>
											<td>
												<div class="main__table-text">10 / 0</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 6.2</div>
											</td>
											<td>
												<div class="main__table-text">13 / 14</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 7.9</div>
											</td>
											<td>
												<div class="main__table-text">12 / 7</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
												<div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> 8.6</div>
											</td>
											<td>
												<div class="main__table-text">67 / 22</div>
											</td>
											<td>
												<div class="main__table-text">24 Oct 2019</div>
											</td>
											<td>
												<div class="main__table-btns">
													<a href="#modal-view2" class="main__table-btn main__table-btn--view open-modal">
														<i class="icon ion-ios-eye"></i>
													</a>
													<a href="#modal-delete2" class="main__table-btn main__table-btn--delete open-modal">
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
								<span>10 from 32</span>

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
	</main>
	<!-- end main content -->

	<!-- modal view -->
	<div id="modal-view" class="zoom-anim-dialog mfp-hide modal modal--view">
		<div class="comments__autor">
			<img class="comments__avatar" src="img/user.svg" alt="">
			<span class="comments__name">John Doe</span>
			<span class="comments__time">30.08.2018, 17:53</span>
		</div>
		<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
		<div class="comments__actions">
			<div class="comments__rate">
				<span><i class="icon ion-md-thumbs-up"></i>12</span>

				<span>7<i class="icon ion-md-thumbs-down"></i></span>
			</div>
		</div>
	</div>
	<!-- end modal view -->

	<!-- modal delete -->
	<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Comment delete</h6>

		<p class="modal__text">Are you sure to permanently delete this comment?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Delete</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->

	<!-- modal view -->
	<div id="modal-view2" class="zoom-anim-dialog mfp-hide modal modal--view">
		<div class="reviews__autor">
			<img class="reviews__avatar" src="img/user.svg" alt="">
			<span class="reviews__name">Best Marvel movie in my opinion</span>
			<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

			<span class="reviews__rating"><i class="icon ion-ios-star"></i>8.4</span>
		</div>
		<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
	</div>
	<!-- end modal view -->

	<!-- modal delete -->
	<div id="modal-delete2" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Review delete</h6>

		<p class="modal__text">Are you sure to permanently delete this review?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Delete</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->

	<!-- modal status -->
	<div id="modal-status3" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Status change</h6>

		<p class="modal__text">Are you sure about immediately change status?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Apply</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal status -->

	<!-- modal delete -->
	<div id="modal-delete3" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">User delete</h6>

		<p class="modal__text">Are you sure to permanently delete this user?</p>

		<div class="modal__btns">
			<button class="modal__btn modal__btn--apply" type="button">Delete</button>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->
@endsection
