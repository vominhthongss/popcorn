@extends('users.main')
@section('content')
	<!-- page title -->
	<section class="section section--first section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Trợ giúp</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item breadcrumb__item--active"><a href="{{ route('home') }}">Trở về trang chủ</a></li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- faq -->
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="faq">
						<h3 class="faq__title">Tại sao Video không tải?</h3>
						<p class="faq__text">Tất cả các trình tạo video trên Internet đều có xu hướng lặp lại các phần được xác định trước khi cần thiết, khiến đây trở thành trình tạo thực sự đầu tiên trên Internet.</p>
						<p class="faq__text">Nhiều phiên bản khác nhau đã phát triển qua nhiều năm, đôi khi là do tình cờ, đôi khi là có chủ đích (tiêm chất hài hước và những thứ tương tự).</p>
					</div>

					<div class="faq">
						<h3 class="faq__title">Tại sao không có phiên bản HD của video này?</h3>
						<p class="faq__text">
                            Nhiều gói xuất bản trên máy tính để bàn và trình chỉnh sửa trang web hiện sử dụng video làm văn bản mô hình mặc định của họ và tìm kiếm 'video' sẽ phát hiện ra nhiều trang web vẫn còn sơ khai.
                        </p>
					</div>

					<div class="faq">
						<h3 class="faq__title">Tại sao âm thanh bị hư?</h3>
						<p class="faq__text">Nhiều phiên bản khác nhau đã phát triển qua nhiều năm, đôi khi là do tình cờ, đôi khi là có chủ đích (tiêm chất hài hước và những thứ tương tự).</p>
					</div>

					<div class="faq">
						<h3 class="faq__title">Tại sao Video bị gián đoạn, tải vào bộ đệm hoặc dừng ngẫu nhiên?</h3>
						<p class="faq__text">
                            Có rất nhiều biến thể của các đoạn văn của video có sẵn, nhưng phần lớn đã bị thay đổi dưới một số hình thức, bởi sự hài hước được đưa vào hoặc các từ ngẫu nhiên trông thậm chí không đáng tin một chút.
                        </p>
					</div>

					<div class="faq">
						<h3 class="faq__title">Khi tôi thay đổi chất lượng của video, không có gì xảy ra.</h3>
						<p class="faq__text">
                            Nếu bạn định sử dụng một đoạn văn của video, bạn cần chắc chắn rằng không có bất kỳ điều gì đáng xấu hổ ẩn ở giữa văn bản.
                        </p>
					</div>
				</div>

				<div class="col-12 col-md-6">
					<div class="faq">
						<h3 class="faq__title">Tại sao video không bắt đầu từ đầu?</h3>
						<p class="faq__text">
                            Điểm đáng chú ý của việc sử dụng video là nó có sự phân bố các chữ cái bình thường ít nhiều, trái ngược với việc sử dụng 'Nội dung ở đây, nội dung ở đây', khiến nó trông giống như tiếng Anh có thể đọc được.
                        </p>
					</div>

					<div class="faq">
						<h3 class="faq__title">Làm cách nào để đặt Video ở chế độ toàn màn hình?</h3>
						<p class="faq__text">
                            Nó sử dụng một từ điển hơn 200 từ Latinh, kết hợp với một số cấu trúc câu mô hình, để tạo ra video trông hợp lý. Do đó, video được tạo ra luôn không bị lặp lại, sự hài hước bị chèn hoặc các từ không đặc trưng, ​​v.v.
                        </p>
					</div>

					<div class="faq">
						<h3 class="faq__title">Những trình duyệt nào được hỗ trợ?</h3>
						<p class="faq__text">
                            Nó được phổ biến vào những năm 1960 với việc phát hành các tờ Letraset chứa các đoạn video, và gần đây là phần mềm xuất bản trên máy tính để bàn như Aldus PageMaker bao gồm các phiên bản của video.
                        </p>
					</div>

					<div class="faq">
						<h3 class="faq__title">Làm thế nào để bạn xử lý sự riêng tư của tôi?</h3>
						<p class="faq__text">
                            Nhiều phiên bản khác nhau đã phát triển qua nhiều năm, đôi khi là do tình cờ, đôi khi là có chủ đích (hài hước và tương tự).
                        </p>
					</div>

					<div class="faq">
						<h3 class="faq__title">Tôi có thể liên hệ với bạn bằng cách nào?</h3>
						<p class="faq__text">
                            Điểm đáng chú ý của việc sử dụng video là nó có sự phân bố các chữ cái bình thường ít nhiều, trái ngược với việc sử dụng 'Nội dung ở đây, nội dung ở đây', khiến nó trông giống như tiếng Anh có thể đọc được.
                        </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end faq -->
@endsection
