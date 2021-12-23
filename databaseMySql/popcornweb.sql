-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2021 lúc 12:34 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `popcornweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatluong`
--

CREATE TABLE `chatluong` (
  `CHATLUONG_ID` int(11) NOT NULL,
  `CHATLUONG_DIENGIAI` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chatluong`
--

INSERT INTO `chatluong` (`CHATLUONG_ID`, `CHATLUONG_DIENGIAI`) VALUES
(1, '480'),
(2, '720'),
(3, '1080');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `THANHVIEN_ID` int(11) NOT NULL,
  `PHIM_ID` int(11) NOT NULL,
  `DANHGIA_NOIDUNG` varchar(500) DEFAULT NULL,
  `DANHGIA_SOSAO` decimal(5,1) DEFAULT NULL,
  `DANHGIA_NGAYGIO` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`THANHVIEN_ID`, `PHIM_ID`, `DANHGIA_NOIDUNG`, `DANHGIA_SOSAO`, `DANHGIA_NGAYGIO`) VALUES
(1, 1, 'Phim hay diễn viên diễn rất đạt', '4.0', '2021-12-08 15:02:27'),
(1, 5, 'Phim gì chán chết chả có một tí hay ho gì, diễn viên chán ngắt không có cảm xúc', '2.0', '2021-12-12 10:03:27'),
(1, 6, 'Thật là tuyệt vời, lâu rồi mới được xem một phim tuyệt như vậy', '5.0', '2021-12-12 10:04:54'),
(1, 7, 'Hay cực rất đáng xem', '5.0', '2021-12-12 09:56:34'),
(1, 9, 'Phim lãng mạn rất hay luôn', '4.0', '2021-12-12 09:53:56'),
(1, 14, 'Bà già đáng ra phải chết mới đúng, đúng là phim không công bằng cho nhân vật chính :(', '2.0', '2021-12-19 04:31:37'),
(2, 2, 'Phim hay xuất sắc tuyệt vời', '5.0', '2021-12-15 14:52:17'),
(2, 3, 'Phim thật thảm hại', '2.0', '2021-12-15 15:08:37'),
(2, 5, 'Phim tệ', '1.0', '2021-12-15 15:07:04'),
(2, 6, 'Phim tệ', '1.0', '2021-12-15 15:07:20'),
(2, 8, 'Phim cực kỳ chán', '2.0', '2021-12-15 15:08:54'),
(2, 9, 'Không hay', '2.0', '2021-12-15 15:08:24'),
(3, 13, 'Thật là tuyệt vời, lâu rồi mới được xem một phim tuyệt như vậy', '5.0', '2021-12-21 02:10:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daodien`
--

CREATE TABLE `daodien` (
  `DAODIEN_ID` int(11) NOT NULL,
  `DAODIEN_TEN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `daodien`
--

INSERT INTO `daodien` (`DAODIEN_ID`, `DAODIEN_TEN`) VALUES
(1, 'Alan Taylor'),
(2, 'Alex Graves'),
(3, 'Alfred Hitcock'),
(4, 'Andy Serkis'),
(5, 'Anthony Russo'),
(6, 'Chuck Russell'),
(7, 'Clint Eastwood Jr.'),
(8, 'Frank Capra'),
(9, 'Gabriele Muccino'),
(10, 'Guy Ritchie'),
(11, 'James Cameron'),
(12, 'Jeremy Podeswa'),
(13, 'Joe Russo'),
(14, 'John Ford'),
(15, 'John Krasinski'),
(16, 'Jon Favreau'),
(17, 'Jon Watts'),
(18, 'Jonathan Nolan'),
(19, 'Joss Whedon'),
(20, 'Louis Leterrier'),
(21, 'Mark Mylod'),
(22, 'Michael Chaves'),
(23, 'Michael Waldron'),
(24, 'Quentin Tarantino'),
(25, 'Ruben Fleischer'),
(26, 'Stanley Kubrick'),
(27, 'Steven Spielberg'),
(28, 'Thea Sharrock'),
(29, 'Trung Lùn'),
(30, 'Woody Allen'),
(31, 'Todd Phillips'),
(32, 'Brad Bird'),
(33, 'Jan Pinkava'),
(34, ' Nora Fingscheidt'),
(35, 'James Gunn'),
(36, 'Yeon Sang-ho'),
(37, 'Miyazaki Hayao'),
(38, 'Jo Ui Seok'),
(39, 'Kim Byung Seo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienvien`
--

CREATE TABLE `dienvien` (
  `DIENVIEN_ID` int(11) NOT NULL,
  `DIENVIEN_TEN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dienvien`
--

INSERT INTO `dienvien` (`DIENVIEN_ID`, `DIENVIEN_TEN`) VALUES
(1, ''),
(2, 'Amber Sienna'),
(3, 'Angelina Jolie'),
(4, 'Anthony Hopkins'),
(5, 'Arnold Schwarzenegger'),
(6, 'Ben Affleck'),
(7, 'Benedict Cumberbatch'),
(8, 'Bình Minh'),
(9, 'Brad Pitt'),
(10, 'Bradley Cooper'),
(11, 'Cameron Diaz'),
(12, 'Charlize Theron'),
(13, 'Chris Evans'),
(14, 'Chris Hemsworth'),
(15, 'Daniel Craig'),
(16, 'Dave Franco'),
(17, 'Diễm My 9x'),
(18, 'Duy Khánh'),
(19, 'Emilia Clarke'),
(20, 'Emily Blunt'),
(21, 'Emma Stone'),
(22, 'Emma Watson'),
(23, 'Evan Rachel Wood'),
(24, 'Gerard Butler'),
(25, 'Hoài Linh'),
(26, 'Hoàng Yến Chibi'),
(27, 'Hứa Vĩ Văn'),
(28, 'Hugh Jackman'),
(29, 'Hữu Châu'),
(30, 'Huỳnh Đông'),
(31, 'Jaden Smith'),
(32, 'James Marsden'),
(33, 'Jeffrey Wright'),
(34, 'Jeremy Renner'),
(35, 'Jesse Eisenberg'),
(36, 'Jessica Alba'),
(37, 'Jim Carrey'),
(38, 'John Krasinski'),
(39, 'Johnny Depp'),
(40, 'Jude Law'),
(41, 'Jun Phạm'),
(42, 'Kiều Minh Tuấn'),
(43, 'Kit Harington'),
(44, 'Leonardo DiCaprio'),
(45, 'Lương Thế Thành'),
(46, 'Maisie Williams'),
(47, 'Marion Cotillard'),
(48, 'Mark Ruffalo'),
(49, 'Mark Strong'),
(50, 'Mélanie Laurent'),
(51, 'Midu'),
(52, 'Mila Kunis'),
(53, 'Millicent Simmonds'),
(54, 'Miu Lê'),
(55, 'Morgan Freeman'),
(56, 'Natalie Portman'),
(57, 'Nhã Phương'),
(58, 'Ninh Dương Lan Ngọc'),
(59, 'Noah Jupe'),
(60, 'Ốc Thanh Vân'),
(61, 'Olivia Wilde'),
(62, 'Orlando Bloom'),
(63, 'Owen Wilson'),
(64, 'Patrick Wilson'),
(65, 'Quyền Linh'),
(66, 'Rachel McAdams'),
(67, 'Robert Downey Jr.'),
(68, 'Ryan Reynolds'),
(69, 'Sam Clafin'),
(70, 'Samuel L. Jackson'),
(71, 'Scarlett Johansson'),
(72, 'Sophia Di Martino'),
(73, 'Sophie Turner'),
(74, 'Sterling Jerins'),
(75, 'Thái Hòa'),
(76, 'Thu Trang'),
(77, 'Tom Cruise'),
(78, 'Tom Hanks'),
(79, 'Tom Hardy'),
(80, 'Tom Hiddleston'),
(81, 'Tom Holland'),
(82, 'Trấn Thành'),
(83, 'Trường Giang'),
(84, 'Tuấn Trần'),
(85, 'Vera Farmiga'),
(86, 'Việt Hương'),
(87, 'Will Smith'),
(88, 'Woody Harrelson'),
(89, 'Đại Nghĩa'),
(90, 'Đức Thịnh'),
(91, 'Nguyễn Thúc Thùy Tiên (sinh ngày 12 tháng 8 năm 19'),
(92, 'fsdfdsgd'),
(93, 'Joaquin Phoenix'),
(94, 'Glenn Fleshler'),
(95, 'Brad Garrett'),
(96, 'Lou Romano'),
(97, 'Sandra Bullock'),
(98, 'Viola Davis'),
(99, 'Margot Robbie'),
(100, 'Idris Elba'),
(101, 'John Cena'),
(102, 'Margot Robbie'),
(103, 'Idris  Elba'),
(104, 'John Cena'),
(105, 'Gong Yoo'),
(106, 'Jung Yu Mi'),
(107, 'Hiiragi Rumi'),
(108, 'Gashuin Tatsuya'),
(109, 'Sol Kyung-gu'),
(110, 'Jung Woo Sung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dotuoi`
--

CREATE TABLE `dotuoi` (
  `DOTUOI_ID` int(11) NOT NULL,
  `DOTUOI_TEN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dotuoi`
--

INSERT INTO `dotuoi` (`DOTUOI_ID`, `DOTUOI_TEN`) VALUES
(1, '16+'),
(2, '18+'),
(3, 'Mọi lứa tuổi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giagoi`
--

CREATE TABLE `giagoi` (
  `SOTHANG_ID` int(11) NOT NULL,
  `CHATLUONG_ID` int(11) NOT NULL,
  `GIAGOI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giagoi`
--

INSERT INTO `giagoi` (`SOTHANG_ID`, `CHATLUONG_ID`, `GIAGOI`) VALUES
(1, 1, 50000),
(1, 2, 90000),
(1, 3, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goimua`
--

CREATE TABLE `goimua` (
  `GOIMUA_ID` int(11) NOT NULL,
  `LOAIGOI_ID` int(11) NOT NULL,
  `THANHVIEN_ID` int(11) NOT NULL,
  `GOIMUA_NGAYMUA` date DEFAULT NULL,
  `GOIMUA_NGAYHETHAN` date DEFAULT NULL,
  `GOIMUA_TRANGTHAI` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `goimua`
--

INSERT INTO `goimua` (`GOIMUA_ID`, `LOAIGOI_ID`, `THANHVIEN_ID`, `GOIMUA_NGAYMUA`, `GOIMUA_NGAYHETHAN`, `GOIMUA_TRANGTHAI`) VALUES
(1, 2, 1, '2021-11-21', '2021-12-21', 'Hủy'),
(2, 3, 2, '2021-12-14', '2022-01-13', 'Đang sử dụng'),
(3, 3, 1, '2021-12-19', '2022-01-18', 'Đang sử dụng'),
(4, 2, 3, '2021-12-21', '2022-01-20', 'Hủy'),
(5, 3, 3, '2021-12-21', '2022-01-20', 'Đang sử dụng'),
(6, 1, 4, '2021-12-21', '2022-01-20', 'Hủy'),
(7, 2, 4, '2021-12-21', '2022-01-20', 'Hủy'),
(8, 3, 4, '2021-12-21', '2022-01-20', 'Đang sử dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khieunaidanhgia`
--

CREATE TABLE `khieunaidanhgia` (
  `KHIEUNAIDANHGIA_ID` int(11) NOT NULL,
  `LOAIKHIEUNAI_ID` int(11) NOT NULL,
  `THANHVIEN_ID` int(11) NOT NULL,
  `PHIM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khieunaidanhgia`
--

INSERT INTO `khieunaidanhgia` (`KHIEUNAIDANHGIA_ID`, `LOAIKHIEUNAI_ID`, `THANHVIEN_ID`, `PHIM_ID`) VALUES
(1, 2, 1, 3),
(2, 3, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaigoi`
--

CREATE TABLE `loaigoi` (
  `LOAIGOI_ID` int(11) NOT NULL,
  `CHATLUONG_ID` int(11) NOT NULL,
  `SOTHANG_ID` int(11) NOT NULL,
  `LOAIGOI_TEN` varchar(20) DEFAULT NULL,
  `LOAIGOI_THONGTIN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaigoi`
--

INSERT INTO `loaigoi` (`LOAIGOI_ID`, `CHATLUONG_ID`, `SOTHANG_ID`, `LOAIGOI_TEN`, `LOAIGOI_THONGTIN`) VALUES
(1, 1, 1, 'Gói cơ bản', 'Gói cơ bản dành người dùng thử, giúp bạn có một trải nghiệm làm quen.'),
(2, 2, 1, 'Gói premium', 'Gói premium dành cho người muốn thêm trải nghiệm'),
(3, 3, 1, 'Gói cao cấp', 'Gói cao cấp dành cho người dùng xem phim muốn có trải nghiệm tối ưu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhieunai`
--

CREATE TABLE `loaikhieunai` (
  `LOAIKHIEUNAI_ID` int(11) NOT NULL,
  `LOAIKHIEUNAI_TEN` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaikhieunai`
--

INSERT INTO `loaikhieunai` (`LOAIKHIEUNAI_ID`, `LOAIKHIEUNAI_TEN`) VALUES
(1, 'Phân biệt chủng tộc'),
(2, 'Thô tục, thiếu văn minh'),
(3, 'Xuyên tạc, lăng mạ và phỉ báng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luotxem`
--

CREATE TABLE `luotxem` (
  `LUOTXEM_ID` int(11) NOT NULL,
  `THELOAI_ID` int(11) NOT NULL,
  `PHIM_ID` int(11) NOT NULL,
  `LUOTXEM_THOIGIAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luotxem`
--

INSERT INTO `luotxem` (`LUOTXEM_ID`, `THELOAI_ID`, `PHIM_ID`, `LUOTXEM_THOIGIAN`) VALUES
(1, 2, 1, '2021-11-21 08:50:06'),
(2, 6, 1, '2021-11-21 08:50:06'),
(3, 2, 1, '2021-12-04 16:16:24'),
(4, 6, 1, '2021-12-04 16:16:24'),
(5, 2, 1, '2021-12-04 16:16:26'),
(6, 6, 1, '2021-12-04 16:16:26'),
(7, 2, 1, '2021-12-04 16:23:21'),
(8, 6, 1, '2021-12-04 16:23:21'),
(9, 2, 1, '2021-12-06 15:59:38'),
(10, 6, 1, '2021-12-06 15:59:38'),
(11, 2, 5, '2021-12-07 14:45:24'),
(12, 7, 5, '2021-12-07 14:45:24'),
(13, 10, 5, '2021-12-07 14:45:24'),
(14, 2, 7, '2021-12-07 14:59:26'),
(15, 5, 7, '2021-12-07 14:59:26'),
(16, 8, 9, '2021-12-08 10:30:38'),
(17, 2, 1, '2021-12-08 14:46:12'),
(18, 6, 1, '2021-12-08 14:46:12'),
(19, 2, 1, '2021-12-08 15:01:38'),
(20, 6, 1, '2021-12-08 15:01:38'),
(21, 2, 1, '2021-12-08 15:02:09'),
(22, 6, 1, '2021-12-08 15:02:09'),
(23, 2, 1, '2021-12-08 15:02:27'),
(24, 6, 1, '2021-12-08 15:02:27'),
(25, 2, 1, '2021-12-08 15:03:26'),
(26, 6, 1, '2021-12-08 15:03:26'),
(27, 2, 5, '2021-12-08 15:03:35'),
(28, 7, 5, '2021-12-08 15:03:35'),
(29, 10, 5, '2021-12-08 15:03:35'),
(30, 2, 5, '2021-12-08 15:03:51'),
(31, 7, 5, '2021-12-08 15:03:51'),
(32, 10, 5, '2021-12-08 15:03:51'),
(33, 7, 2, '2021-12-08 15:08:16'),
(34, 10, 2, '2021-12-08 15:08:16'),
(35, 7, 2, '2021-12-08 15:08:25'),
(36, 10, 2, '2021-12-08 15:08:25'),
(37, 2, 7, '2021-12-12 06:36:04'),
(38, 5, 7, '2021-12-12 06:36:04'),
(39, 4, 6, '2021-12-12 06:36:56'),
(40, 10, 6, '2021-12-12 06:36:56'),
(41, 7, 2, '2021-12-12 06:56:31'),
(42, 10, 2, '2021-12-12 06:56:31'),
(43, 2, 1, '2021-12-12 07:00:05'),
(44, 6, 1, '2021-12-12 07:00:05'),
(45, 8, 9, '2021-12-12 08:15:16'),
(46, 1, 3, '2021-12-12 09:43:20'),
(47, 3, 3, '2021-12-12 09:43:20'),
(48, 1, 3, '2021-12-12 09:44:28'),
(49, 3, 3, '2021-12-12 09:44:28'),
(50, 1, 3, '2021-12-12 09:45:29'),
(51, 3, 3, '2021-12-12 09:45:29'),
(52, 1, 3, '2021-12-12 09:45:36'),
(53, 3, 3, '2021-12-12 09:45:36'),
(54, 1, 3, '2021-12-12 09:45:51'),
(55, 3, 3, '2021-12-12 09:45:51'),
(56, 1, 3, '2021-12-12 09:46:14'),
(57, 3, 3, '2021-12-12 09:46:14'),
(58, 1, 3, '2021-12-12 09:47:02'),
(59, 3, 3, '2021-12-12 09:47:02'),
(60, 2, 5, '2021-12-12 09:48:49'),
(61, 7, 5, '2021-12-12 09:48:49'),
(62, 10, 5, '2021-12-12 09:48:49'),
(63, 7, 2, '2021-12-12 09:48:58'),
(64, 10, 2, '2021-12-12 09:48:58'),
(65, 8, 9, '2021-12-12 09:49:11'),
(66, 8, 9, '2021-12-12 09:49:25'),
(67, 8, 9, '2021-12-12 09:49:47'),
(68, 8, 9, '2021-12-12 09:50:20'),
(69, 8, 9, '2021-12-12 09:53:40'),
(70, 8, 9, '2021-12-12 09:53:56'),
(71, 1, 3, '2021-12-12 09:54:11'),
(72, 3, 3, '2021-12-12 09:54:11'),
(73, 1, 3, '2021-12-12 09:54:36'),
(74, 3, 3, '2021-12-12 09:54:36'),
(75, 2, 7, '2021-12-12 09:54:48'),
(76, 5, 7, '2021-12-12 09:54:48'),
(77, 2, 7, '2021-12-12 09:55:24'),
(78, 5, 7, '2021-12-12 09:55:24'),
(79, 2, 7, '2021-12-12 09:55:44'),
(80, 5, 7, '2021-12-12 09:55:44'),
(81, 2, 7, '2021-12-12 09:55:55'),
(82, 5, 7, '2021-12-12 09:55:55'),
(83, 2, 7, '2021-12-12 09:56:06'),
(84, 5, 7, '2021-12-12 09:56:06'),
(85, 2, 7, '2021-12-12 09:56:17'),
(86, 5, 7, '2021-12-12 09:56:17'),
(87, 7, 2, '2021-12-12 09:56:22'),
(88, 10, 2, '2021-12-12 09:56:22'),
(89, 2, 7, '2021-12-12 09:56:29'),
(90, 5, 7, '2021-12-12 09:56:29'),
(91, 2, 7, '2021-12-12 09:56:34'),
(92, 5, 7, '2021-12-12 09:56:34'),
(93, 7, 2, '2021-12-12 09:56:45'),
(94, 10, 2, '2021-12-12 09:56:45'),
(95, 7, 2, '2021-12-12 10:00:26'),
(96, 10, 2, '2021-12-12 10:00:26'),
(97, 7, 2, '2021-12-12 10:02:19'),
(98, 10, 2, '2021-12-12 10:02:19'),
(99, 7, 2, '2021-12-12 10:02:21'),
(100, 10, 2, '2021-12-12 10:02:21'),
(101, 2, 5, '2021-12-12 10:03:12'),
(102, 7, 5, '2021-12-12 10:03:12'),
(103, 10, 5, '2021-12-12 10:03:12'),
(104, 2, 5, '2021-12-12 10:03:18'),
(105, 7, 5, '2021-12-12 10:03:18'),
(106, 10, 5, '2021-12-12 10:03:18'),
(107, 2, 5, '2021-12-12 10:03:27'),
(108, 7, 5, '2021-12-12 10:03:27'),
(109, 10, 5, '2021-12-12 10:03:27'),
(110, 2, 5, '2021-12-12 10:03:38'),
(111, 7, 5, '2021-12-12 10:03:38'),
(112, 10, 5, '2021-12-12 10:03:38'),
(113, 2, 5, '2021-12-12 10:03:40'),
(114, 7, 5, '2021-12-12 10:03:40'),
(115, 10, 5, '2021-12-12 10:03:40'),
(116, 2, 5, '2021-12-12 10:03:49'),
(117, 7, 5, '2021-12-12 10:03:49'),
(118, 10, 5, '2021-12-12 10:03:49'),
(119, 2, 5, '2021-12-12 10:03:52'),
(120, 7, 5, '2021-12-12 10:03:52'),
(121, 10, 5, '2021-12-12 10:03:52'),
(122, 2, 5, '2021-12-12 10:03:54'),
(123, 7, 5, '2021-12-12 10:03:54'),
(124, 10, 5, '2021-12-12 10:03:54'),
(125, 2, 5, '2021-12-12 10:03:56'),
(126, 7, 5, '2021-12-12 10:03:56'),
(127, 10, 5, '2021-12-12 10:03:56'),
(128, 2, 5, '2021-12-12 10:03:58'),
(129, 7, 5, '2021-12-12 10:03:58'),
(130, 10, 5, '2021-12-12 10:03:58'),
(131, 2, 5, '2021-12-12 10:04:04'),
(132, 7, 5, '2021-12-12 10:04:04'),
(133, 10, 5, '2021-12-12 10:04:04'),
(134, 2, 5, '2021-12-12 10:04:07'),
(135, 7, 5, '2021-12-12 10:04:07'),
(136, 10, 5, '2021-12-12 10:04:07'),
(137, 2, 5, '2021-12-12 10:04:09'),
(138, 7, 5, '2021-12-12 10:04:09'),
(139, 10, 5, '2021-12-12 10:04:09'),
(140, 4, 6, '2021-12-12 10:04:49'),
(141, 10, 6, '2021-12-12 10:04:49'),
(142, 4, 6, '2021-12-12 10:04:55'),
(143, 10, 6, '2021-12-12 10:04:55'),
(144, 1, 3, '2021-12-14 03:03:51'),
(145, 3, 3, '2021-12-14 03:03:51'),
(146, 1, 3, '2021-12-14 03:03:58'),
(147, 3, 3, '2021-12-14 03:03:58'),
(148, 2, 5, '2021-12-14 03:05:09'),
(149, 7, 5, '2021-12-14 03:05:09'),
(150, 10, 5, '2021-12-14 03:05:09'),
(151, 2, 5, '2021-12-14 03:05:11'),
(152, 7, 5, '2021-12-14 03:05:11'),
(153, 10, 5, '2021-12-14 03:05:11'),
(154, 2, 5, '2021-12-14 03:05:15'),
(155, 7, 5, '2021-12-14 03:05:15'),
(156, 10, 5, '2021-12-14 03:05:15'),
(157, 1, 3, '2021-12-14 03:06:06'),
(158, 3, 3, '2021-12-14 03:06:06'),
(159, 2, 5, '2021-12-14 03:06:13'),
(160, 7, 5, '2021-12-14 03:06:13'),
(161, 10, 5, '2021-12-14 03:06:13'),
(162, 2, 5, '2021-12-14 03:13:37'),
(163, 7, 5, '2021-12-14 03:13:37'),
(164, 10, 5, '2021-12-14 03:13:37'),
(165, 2, 5, '2021-12-14 03:13:40'),
(166, 7, 5, '2021-12-14 03:13:40'),
(167, 10, 5, '2021-12-14 03:13:40'),
(168, 2, 5, '2021-12-14 03:13:42'),
(169, 7, 5, '2021-12-14 03:13:42'),
(170, 10, 5, '2021-12-14 03:13:42'),
(171, 2, 5, '2021-12-14 03:13:44'),
(172, 7, 5, '2021-12-14 03:13:44'),
(173, 10, 5, '2021-12-14 03:13:44'),
(174, 2, 5, '2021-12-14 03:13:47'),
(175, 7, 5, '2021-12-14 03:13:47'),
(176, 10, 5, '2021-12-14 03:13:47'),
(177, 2, 5, '2021-12-14 03:13:49'),
(178, 7, 5, '2021-12-14 03:13:49'),
(179, 10, 5, '2021-12-14 03:13:49'),
(180, 2, 5, '2021-12-14 03:14:20'),
(181, 7, 5, '2021-12-14 03:14:20'),
(182, 10, 5, '2021-12-14 03:14:20'),
(183, 1, 3, '2021-12-14 03:21:01'),
(184, 3, 3, '2021-12-14 03:21:01'),
(185, 2, 1, '2021-12-14 03:21:17'),
(186, 6, 1, '2021-12-14 03:21:17'),
(187, 2, 5, '2021-12-14 03:24:36'),
(188, 7, 5, '2021-12-14 03:24:36'),
(189, 10, 5, '2021-12-14 03:24:36'),
(190, 2, 5, '2021-12-14 03:25:09'),
(191, 7, 5, '2021-12-14 03:25:09'),
(192, 10, 5, '2021-12-14 03:25:09'),
(193, 2, 5, '2021-12-14 03:25:28'),
(194, 7, 5, '2021-12-14 03:25:28'),
(195, 10, 5, '2021-12-14 03:25:28'),
(196, 2, 5, '2021-12-14 03:25:30'),
(197, 7, 5, '2021-12-14 03:25:30'),
(198, 10, 5, '2021-12-14 03:25:30'),
(199, 2, 5, '2021-12-14 03:25:33'),
(200, 7, 5, '2021-12-14 03:25:33'),
(201, 10, 5, '2021-12-14 03:25:33'),
(202, 2, 5, '2021-12-14 03:25:39'),
(203, 7, 5, '2021-12-14 03:25:39'),
(204, 10, 5, '2021-12-14 03:25:39'),
(205, 7, 2, '2021-12-15 14:51:10'),
(206, 10, 2, '2021-12-15 14:51:10'),
(207, 7, 2, '2021-12-15 14:52:17'),
(208, 10, 2, '2021-12-15 14:52:17'),
(209, 2, 5, '2021-12-15 15:06:56'),
(210, 7, 5, '2021-12-15 15:06:56'),
(211, 10, 5, '2021-12-15 15:06:56'),
(212, 2, 5, '2021-12-15 15:07:04'),
(213, 7, 5, '2021-12-15 15:07:04'),
(214, 10, 5, '2021-12-15 15:07:04'),
(215, 4, 6, '2021-12-15 15:07:13'),
(216, 10, 6, '2021-12-15 15:07:13'),
(217, 4, 6, '2021-12-15 15:07:20'),
(218, 10, 6, '2021-12-15 15:07:20'),
(219, 8, 9, '2021-12-15 15:08:18'),
(220, 8, 9, '2021-12-15 15:08:24'),
(221, 1, 3, '2021-12-15 15:08:29'),
(222, 3, 3, '2021-12-15 15:08:29'),
(223, 1, 3, '2021-12-15 15:08:38'),
(224, 3, 3, '2021-12-15 15:08:38'),
(225, 7, 8, '2021-12-15 15:08:43'),
(226, 10, 8, '2021-12-15 15:08:43'),
(227, 7, 8, '2021-12-15 15:08:54'),
(228, 10, 8, '2021-12-15 15:08:54'),
(229, 2, 1, '2021-12-15 15:18:54'),
(230, 6, 1, '2021-12-15 15:18:54'),
(231, 1, 3, '2021-12-15 15:36:32'),
(232, 3, 3, '2021-12-15 15:36:32'),
(233, 7, 8, '2021-12-16 15:43:17'),
(234, 10, 8, '2021-12-16 15:43:17'),
(235, 4, 6, '2021-12-16 15:48:47'),
(236, 10, 6, '2021-12-16 15:48:47'),
(237, 2, 5, '2021-12-16 16:16:37'),
(238, 7, 5, '2021-12-16 16:16:37'),
(239, 10, 5, '2021-12-16 16:16:37'),
(240, 2, 5, '2021-12-16 16:16:39'),
(241, 7, 5, '2021-12-16 16:16:39'),
(242, 10, 5, '2021-12-16 16:16:39'),
(243, 2, 5, '2021-12-16 16:16:41'),
(244, 7, 5, '2021-12-16 16:16:41'),
(245, 10, 5, '2021-12-16 16:16:41'),
(246, 2, 5, '2021-12-16 16:17:17'),
(247, 7, 5, '2021-12-16 16:17:17'),
(248, 10, 5, '2021-12-16 16:17:17'),
(249, 2, 5, '2021-12-16 16:23:33'),
(250, 7, 5, '2021-12-16 16:23:33'),
(251, 10, 5, '2021-12-16 16:23:33'),
(252, 2, 5, '2021-12-16 16:23:37'),
(253, 7, 5, '2021-12-16 16:23:37'),
(254, 10, 5, '2021-12-16 16:23:37'),
(255, 2, 5, '2021-12-16 16:23:41'),
(256, 7, 5, '2021-12-16 16:23:41'),
(257, 10, 5, '2021-12-16 16:23:41'),
(258, 2, 5, '2021-12-16 16:25:16'),
(259, 7, 5, '2021-12-16 16:25:16'),
(260, 10, 5, '2021-12-16 16:25:16'),
(261, 2, 5, '2021-12-16 16:27:18'),
(262, 7, 5, '2021-12-16 16:27:18'),
(263, 10, 5, '2021-12-16 16:27:18'),
(264, 2, 5, '2021-12-16 16:27:42'),
(265, 7, 5, '2021-12-16 16:27:42'),
(266, 10, 5, '2021-12-16 16:27:42'),
(267, 2, 5, '2021-12-16 16:31:58'),
(268, 7, 5, '2021-12-16 16:31:58'),
(269, 10, 5, '2021-12-16 16:31:58'),
(270, 7, 2, '2021-12-18 13:54:49'),
(271, 10, 2, '2021-12-18 13:54:49'),
(272, 7, 2, '2021-12-18 13:55:32'),
(273, 10, 2, '2021-12-18 13:55:32'),
(274, 1, 3, '2021-12-18 13:56:44'),
(275, 3, 3, '2021-12-18 13:56:44'),
(276, 1, 3, '2021-12-18 13:56:47'),
(277, 3, 3, '2021-12-18 13:56:47'),
(278, 1, 3, '2021-12-18 13:57:10'),
(279, 3, 3, '2021-12-18 13:57:10'),
(280, 1, 3, '2021-12-18 13:58:21'),
(281, 3, 3, '2021-12-18 13:58:21'),
(282, 1, 3, '2021-12-18 13:58:29'),
(283, 3, 3, '2021-12-18 13:58:29'),
(284, 1, 3, '2021-12-18 13:58:42'),
(285, 3, 3, '2021-12-18 13:58:42'),
(286, 1, 3, '2021-12-18 13:59:01'),
(287, 3, 3, '2021-12-18 13:59:01'),
(288, 1, 3, '2021-12-18 13:59:54'),
(289, 3, 3, '2021-12-18 13:59:54'),
(290, 1, 3, '2021-12-18 14:00:14'),
(291, 3, 3, '2021-12-18 14:00:14'),
(292, 1, 3, '2021-12-18 14:00:33'),
(293, 3, 3, '2021-12-18 14:00:33'),
(294, 1, 3, '2021-12-18 14:00:51'),
(295, 3, 3, '2021-12-18 14:00:51'),
(296, 1, 3, '2021-12-18 14:11:41'),
(297, 3, 3, '2021-12-18 14:11:41'),
(298, 1, 3, '2021-12-18 14:11:48'),
(299, 3, 3, '2021-12-18 14:11:48'),
(300, 2, 7, '2021-12-18 14:15:41'),
(301, 5, 7, '2021-12-18 14:15:41'),
(302, 1, 10, '2021-12-19 02:55:32'),
(303, 1, 10, '2021-12-19 03:00:46'),
(304, 4, 11, '2021-12-19 03:08:03'),
(305, 8, 11, '2021-12-19 03:08:03'),
(306, 1, 12, '2021-12-19 03:43:28'),
(307, 1, 10, '2021-12-19 03:46:10'),
(308, 2, 14, '2021-12-19 03:46:17'),
(309, 6, 14, '2021-12-19 03:46:17'),
(310, 4, 11, '2021-12-19 03:54:03'),
(311, 8, 11, '2021-12-19 03:54:03'),
(312, 4, 11, '2021-12-19 03:55:54'),
(313, 8, 11, '2021-12-19 03:55:54'),
(314, 4, 11, '2021-12-19 04:19:40'),
(315, 8, 11, '2021-12-19 04:19:40'),
(316, 3, 16, '2021-12-19 04:27:58'),
(317, 8, 16, '2021-12-19 04:27:58'),
(318, 2, 14, '2021-12-19 04:30:59'),
(319, 6, 14, '2021-12-19 04:30:59'),
(320, 2, 14, '2021-12-19 04:31:37'),
(321, 6, 14, '2021-12-19 04:31:37'),
(322, 1, 10, '2021-12-19 04:31:52'),
(323, 5, 17, '2021-12-19 04:31:57'),
(324, 9, 17, '2021-12-19 04:31:57'),
(325, 5, 17, '2021-12-19 04:32:05'),
(326, 9, 17, '2021-12-19 04:32:05'),
(327, 2, 14, '2021-12-19 06:58:21'),
(328, 6, 14, '2021-12-19 06:58:21'),
(329, 1, 10, '2021-12-19 06:58:51'),
(330, 4, 11, '2021-12-19 06:59:09'),
(331, 8, 11, '2021-12-19 06:59:09'),
(332, 4, 13, '2021-12-19 06:59:24'),
(333, 7, 13, '2021-12-19 06:59:24'),
(334, 4, 13, '2021-12-19 06:59:51'),
(335, 7, 13, '2021-12-19 06:59:51'),
(336, 4, 11, '2021-12-19 08:28:09'),
(337, 8, 11, '2021-12-19 08:28:09'),
(338, 1, 12, '2021-12-19 08:29:01'),
(339, 4, 11, '2021-12-19 08:30:21'),
(340, 8, 11, '2021-12-19 08:30:21'),
(341, 4, 13, '2021-12-19 09:15:44'),
(342, 7, 13, '2021-12-19 09:15:44'),
(343, 4, 11, '2021-12-19 17:43:24'),
(344, 8, 11, '2021-12-19 17:43:24'),
(345, 4, 11, '2021-12-19 17:57:02'),
(346, 8, 11, '2021-12-19 17:57:02'),
(347, 4, 11, '2021-12-20 00:27:43'),
(348, 8, 11, '2021-12-20 00:27:43'),
(349, 4, 11, '2021-12-20 00:58:32'),
(350, 8, 11, '2021-12-20 00:58:32'),
(351, 4, 11, '2021-12-20 03:08:33'),
(352, 8, 11, '2021-12-20 03:08:33'),
(353, 4, 11, '2021-12-20 03:08:50'),
(354, 8, 11, '2021-12-20 03:08:50'),
(355, 4, 11, '2021-12-20 03:09:11'),
(356, 8, 11, '2021-12-20 03:09:11'),
(357, 4, 11, '2021-12-20 03:09:22'),
(358, 8, 11, '2021-12-20 03:09:22'),
(359, 4, 11, '2021-12-20 03:09:53'),
(360, 8, 11, '2021-12-20 03:09:53'),
(361, 4, 11, '2021-12-20 03:10:13'),
(362, 8, 11, '2021-12-20 03:10:13'),
(363, 4, 13, '2021-12-21 02:06:20'),
(364, 7, 13, '2021-12-21 02:06:20'),
(365, 4, 13, '2021-12-21 02:07:31'),
(366, 7, 13, '2021-12-21 02:07:31'),
(367, 4, 13, '2021-12-21 02:08:15'),
(368, 7, 13, '2021-12-21 02:08:15'),
(369, 4, 13, '2021-12-21 02:08:40'),
(370, 7, 13, '2021-12-21 02:08:40'),
(371, 4, 13, '2021-12-21 02:08:50'),
(372, 7, 13, '2021-12-21 02:08:50'),
(373, 4, 13, '2021-12-21 02:10:11'),
(374, 7, 13, '2021-12-21 02:10:11'),
(375, 4, 13, '2021-12-21 02:10:17'),
(376, 7, 13, '2021-12-21 02:10:17'),
(377, 4, 13, '2021-12-21 02:10:26'),
(378, 7, 13, '2021-12-21 02:10:26'),
(379, 1, 12, '2021-12-21 02:13:59'),
(380, 4, 11, '2021-12-21 05:40:43'),
(381, 8, 11, '2021-12-21 05:40:43'),
(382, 4, 11, '2021-12-21 05:40:59'),
(383, 8, 11, '2021-12-21 05:40:59'),
(384, 4, 11, '2021-12-21 05:41:12'),
(385, 8, 11, '2021-12-21 05:41:12'),
(386, 4, 11, '2021-12-21 05:41:17'),
(387, 8, 11, '2021-12-21 05:41:17'),
(388, 4, 11, '2021-12-21 05:41:22'),
(389, 8, 11, '2021-12-21 05:41:22'),
(390, 4, 11, '2021-12-21 05:41:37'),
(391, 8, 11, '2021-12-21 05:41:37'),
(392, 4, 11, '2021-12-21 05:41:49'),
(393, 8, 11, '2021-12-21 05:41:49'),
(394, 4, 11, '2021-12-21 05:42:01'),
(395, 8, 11, '2021-12-21 05:42:01'),
(396, 4, 11, '2021-12-21 05:42:22'),
(397, 8, 11, '2021-12-21 05:42:23'),
(398, 4, 11, '2021-12-21 05:43:09'),
(399, 8, 11, '2021-12-21 05:43:09'),
(400, 4, 11, '2021-12-21 05:43:19'),
(401, 8, 11, '2021-12-21 05:43:19'),
(402, 4, 11, '2021-12-21 05:43:29'),
(403, 8, 11, '2021-12-21 05:43:29'),
(404, 4, 11, '2021-12-21 05:43:32'),
(405, 8, 11, '2021-12-21 05:43:32'),
(406, 4, 11, '2021-12-21 05:43:37'),
(407, 8, 11, '2021-12-21 05:43:37'),
(408, 4, 11, '2021-12-21 05:44:51'),
(409, 8, 11, '2021-12-21 05:44:51'),
(410, 4, 11, '2021-12-21 05:45:05'),
(411, 8, 11, '2021-12-21 05:45:05'),
(412, 4, 11, '2021-12-21 05:56:37'),
(413, 8, 11, '2021-12-21 05:56:37'),
(414, 4, 11, '2021-12-21 05:56:52'),
(415, 8, 11, '2021-12-21 05:56:52'),
(416, 4, 11, '2021-12-21 05:57:49'),
(417, 8, 11, '2021-12-21 05:57:49'),
(418, 4, 11, '2021-12-21 05:58:03'),
(419, 8, 11, '2021-12-21 05:58:03'),
(420, 4, 11, '2021-12-21 13:46:02'),
(421, 8, 11, '2021-12-21 13:46:02'),
(422, 4, 11, '2021-12-21 13:46:07'),
(423, 8, 11, '2021-12-21 13:46:07'),
(424, 4, 11, '2021-12-21 13:46:17'),
(425, 8, 11, '2021-12-21 13:46:17'),
(426, 4, 11, '2021-12-21 13:46:21'),
(427, 8, 11, '2021-12-21 13:46:21'),
(428, 4, 11, '2021-12-21 13:46:38'),
(429, 8, 11, '2021-12-21 13:46:38'),
(430, 4, 11, '2021-12-21 13:46:59'),
(431, 8, 11, '2021-12-21 13:46:59'),
(432, 4, 11, '2021-12-21 13:47:22'),
(433, 8, 11, '2021-12-21 13:47:22'),
(434, 2, 14, '2021-12-21 16:51:04'),
(435, 6, 14, '2021-12-21 16:51:04'),
(436, 4, 11, '2021-12-21 17:49:24'),
(437, 8, 11, '2021-12-21 17:49:24'),
(438, 3, 16, '2021-12-21 17:49:40'),
(439, 8, 16, '2021-12-21 17:49:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nam`
--

CREATE TABLE `nam` (
  `NAM_ID` int(11) NOT NULL,
  `NAM_TEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nam`
--

INSERT INTO `nam` (`NAM_ID`, `NAM_TEN`) VALUES
(1, 1980),
(2, 1981),
(3, 1982),
(4, 1983),
(5, 1984),
(6, 1985),
(7, 1986),
(8, 1987),
(9, 1988),
(10, 1989),
(11, 1990),
(12, 1991),
(13, 1992),
(14, 1993),
(15, 1994),
(16, 1995),
(17, 1996),
(18, 1997),
(19, 1998),
(20, 1999),
(21, 2000),
(22, 2001),
(23, 2002),
(24, 2003),
(25, 2004),
(26, 2005),
(27, 2006),
(28, 2007),
(29, 2008),
(30, 2009),
(31, 2010),
(32, 2011),
(33, 2012),
(34, 2013),
(35, 2014),
(36, 2015),
(37, 2016),
(38, 2017),
(39, 2018),
(40, 2019),
(41, 2020),
(42, 2021),
(43, 2022),
(44, 2023),
(45, 2024),
(46, 2025),
(47, 2026),
(48, 2027),
(49, 2028),
(50, 2029),
(51, 2030),
(52, 2031),
(53, 2032),
(54, 2033),
(55, 2034),
(56, 2035),
(57, 2036),
(58, 2037),
(59, 2038),
(60, 2039),
(61, 2040),
(62, 2041),
(63, 2042),
(64, 2043),
(65, 2044),
(66, 2045),
(67, 2046),
(68, 2047),
(69, 2048),
(70, 2049),
(71, 2050),
(72, 2051);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloai`
--

CREATE TABLE `phanloai` (
  `PHANLOAI_ID` int(11) NOT NULL,
  `PHANLOAI_TEN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phanloai`
--

INSERT INTO `phanloai` (`PHANLOAI_ID`, `PHANLOAI_TEN`) VALUES
(1, 'Phim truyền hình'),
(2, 'Phim điện ảnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `PHIM_ID` int(11) NOT NULL,
  `DOTUOI_ID` int(11) NOT NULL,
  `QUOCGIA_ID` int(11) NOT NULL,
  `NAM_ID` int(11) NOT NULL,
  `PHANLOAI_ID` int(11) NOT NULL,
  `PHIM_TEN` varchar(200) DEFAULT NULL,
  `PHIM_THOILUONG` varchar(20) DEFAULT NULL,
  `PHIM_TOMTAT` varchar(500) DEFAULT NULL,
  `PHIM_DIEMIMDB` decimal(5,1) DEFAULT NULL,
  `PHIM_URLPOSTER` varchar(500) DEFAULT NULL,
  `PHIM_NGAYTHEM` date DEFAULT NULL,
  `PHIM_TRANGTHAI` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`PHIM_ID`, `DOTUOI_ID`, `QUOCGIA_ID`, `NAM_ID`, `PHANLOAI_ID`, `PHIM_TEN`, `PHIM_THOILUONG`, `PHIM_TOMTAT`, `PHIM_DIEMIMDB`, `PHIM_URLPOSTER`, `PHIM_NGAYTHEM`, `PHIM_TRANGTHAI`) VALUES
(1, 1, 2, 39, 2, 'Vùng đất câm lặng', '201 phút', 'Vào năm 2020, hầu hết người và động vật trên Trái Đất đã bị xóa sổ bởi một chủng loại sinh vật ngoài hành tinh. Những sinh vật này tuy bị mù nhưng sở hữu thính giác cực kỳ nhạy bén và có làn da bọc thép không thể phá hủy. Gia đình Abbott – bao gồm vợ chồng Lee và Evelyn, cô con gái khiếm thính Regan cùng hai cậu con trai là Marcus và Beau – âm thầm nhặt những đồ dùng tiếp tế trong một thị trấn bị bỏ hoang. Để tránh tạo ra tiếng động, họ giao tiếp với nhau bằng ngôn ngữ ký hiệu Mỹ và đi chân trần', '7.0', 'asset/posters/Vùng đất câm lặng.jpg', '2021-11-21', 'Đã ra mắt'),
(2, 3, 2, 29, 2, 'Người sắt', '133 phút', 'Tony Stark vừa là chủ tập đoàn công nghệ, vừa là một tay chơi kỳ dị. Trong chuyến thị sát Afghanistan, ông bị nhóm khủng bố bắt cóc. Chúng đòi Tony chế tạo thứ vũ khí hủy diệt để tấn công nước Mỹ. Nhận ra sự thật phũ phàng rằng, những vũ khí do mình chế tạo đang quay ngược lại tấn công chính mình, Tony bắt tay chế tạo bộ giáp công nghệ cao. Tẩu thoát khỏi nơi giam cầm, Tony trở thành đại diện công lý dưới biệt danh Người sắt.', '7.9', 'asset/posters/Người sắt.jpg', '2021-12-07', 'Đã ra mắt'),
(3, 3, 2, 27, 2, 'Mưu cầu hạnh phúc', '123 phút', 'Một câu chuyện có thật do cha con tài tử Will Smith thủ vai. The Pursuit of Happiness là một câu chuyện có thật xoay quanh nhân vật Chris Gardner(Will Smith)- một người bán hàng thất bại trong kinh doanh, nợ nần chồng chất, vợ bỏ đi, 2 cha con bị đuổi khỏi nhà do không trả được tiền thuê, tất cả mọi cánh cửa dường như đã đóng sập lại với Chris. Nhưng với ý chí quyết không gục ngã quyết tâm vượt lên mọi khó khăn, đặc biệt có sự cổ vũ của cậu con trai Christopher đã trở thành động lực thôi thúc.', '8.2', 'asset/posters/Mưu cầu hạnh phúc.png', '2021-12-07', 'Đã ra mắt'),
(5, 3, 2, 42, 1, 'Loki', '45 phút/tập', 'Loki là sê-ri phim truyền hình Mỹ ra mắt năm 2021, phát độc quyền trên nền tảng trực tuyến Disney+ của đạo diễn Michael Waldron. Phim dựa trên nhân vật cùng tên từ truyện tranh Marvel Comics. Lấy bối cảnh trong vũ trụ Điện ảnh Marvel, phim phát triển nội dung sau các sự kiện xảy ra sự kiện trong Avengers', '8.3', 'asset/posters/Loki.jpg', '2021-12-07', 'Đã ra mắt'),
(6, 3, 2, 15, 2, 'Chiếc mặt nạ', '121 phút', 'The Mask là một bộ phim hài đề tài siêu anh hùng của Mỹ năm 1994 do Chuck Russell đạo diễn và Mike Werb chắp bút phần kịch bản, chủ yếu dựa trên nhân vật truyện tranh cùng tên của Dark Horse Comics. Tác phẩm là sự hợp tác sản xuất giữa New Line Cinema và Dark Horse Entertainment và chính thức được công chiếu vào 29 tháng 7 năm 1994. Jim Carrey thủ vai chính Stanley Ipkiss, một người vô tình nhặt được chiếc mặt nạ của Loki và nó đã biến anh trở thành một tên găng-xtơ ngổ ngáo với điệu cười quá gở', '6.9', 'asset/posters/Chiếc mặt nạ.jpg', '2021-12-07', 'Đã ra mắt'),
(7, 3, 2, 34, 2, 'Phi vụ thế kỷ', '123 phút', 'Phi Vụ Thế Kỷ - Now You See Me xoay quanh câu chuyện về Atlas một nhà ảo thuật tài ba, anh cũng là chỉ huy của một biệt đội ảo thuật đầy tài năng còn được gọi là Four Horsemen. Atlas cùng với đội của mình bắt đầu chuẩn bị một kế hoạch màn ảo thuật hút sạch số tiền trong tài khoảng ngân hàng của tên tham nhũng giàu có chia cho khán giả. Không những vậy, bọn họ còn phải đối mặt với sự truy bất của đặc vụ liên bang và một vị thám tử Interpol.', '8.6', 'asset/posters/Phi vụ thế kỷ.jpg', '2021-12-07', 'Đã ra mắt'),
(8, 3, 2, 39, 2, 'Venom', '123 phút', 'Quái Vật Venom là một kẻ thù nguy hiểm và nặng ký của Người nhện trong loạt series của Marvel. Chàng phóng viên Eddie Brock (do Tom Hardy thủ vai) bí mật theo dõi âm mưu xấu xa của một tổ chức và đã không may mắn khi nhiễm phải loại cộng sinh trùng ngoài hành tinh (Symbiote) và từ đó đã không còn làm chủ bản thân về thể chất lẫn tinh thần. Điều này đã dần biến anh thành quái vật đen tối và nguy hiểm nhất chống lại người Nhện – Venom.', '6.7', 'asset/posters/Venom.jpg', '2021-12-07', 'Đã ra mắt'),
(9, 3, 2, 37, 2, 'Trước ngày em đến', '110 phút', 'Louisa - một cô nàng lạc quan yêu đời đột ngột trở thành người thất nghiệp trong khi cả nhà đang sống dựa vào đồng lương của cô. Tình cảm với anh bạn trai Patrick thì ngày càng phai nhạt. Mọi chuyện có vẻ đều không như ý muốn của Louise. Will - chàng trai thành đạt bỗng chốc mất tất cả sau một vụ tai nạn khiến anh bị liệt gần như toàn bộ cơ thể. Với anh, niềm vui là một điều xa xỉ. Anh tuyệt vọng đến mức không còn muốn sống trên đời nữa.', '7.4', 'asset/posters/Trước ngày em đến.jpg', '2021-12-07', 'Đã ra mắt'),
(11, 3, 2, 28, 2, 'Chú chuột đầu bếp', '151 phút', 'Remy là một chú chuột nhân cách hóa có năng khiếu thiên bẩm, khứu giác và vị giác phát triển cực nhạy. Được truyền cảm hứng bởi thần tượng, bếp trưởng vừa qua đời Auguste Gusteau, Remy mơ trở thành một đầu bếp. Khi đàn của cậu bị buộc phải rời khỏi chỗ trú ẩn do bị bà chủ nhà phát hiện, Remy bị tách khỏi bầy, cuối cùng lưu lạc đến đường cống của thành phố Paris. Cậu gặp ảo giác linh hồn của Gusteau và nghe lời khuyên của ông ra ngoài quan sát xung quanh, cuối cùng dừng lại ở cửa sổ trên nhà bếp', '8.0', 'asset/posters/Chú chuột đầu bếp.jpg', '2021-12-19', 'Đã ra mắt'),
(12, 3, 2, 42, 2, 'Không thể tha thứ', '112 phút', 'Người dân Seattle đang phải vật lộn với những tổn thương kéo dài hàng thập kỷ gây ra bởi việc giết chết một cảnh sát trong cuộc trục xuất thảm khốc. Sau khi bị kết án về tội ác đó, Ruth (Sandra Bullock) đã phải ngồi tù 20 năm.\r\nBây giờ cô được tạm tha, cô nói về cơn giận của mình với đôi mắt trũng sâu và đôi môi nứt nẻ, ánh sáng màu vàng ốm yếu của bộ phim cũng diễn tả điều đó, nó cũng giống như hợp đồng biểu diễn làm đầu cá hồi của nhà máy làm ca đêm của Ruth.', '8.6', 'asset/posters/Không thể tha thứ.jpg', '2021-12-19', 'Đã ra mắt'),
(13, 3, 2, 37, 2, 'Biệt đội cảm tử', '132 phút', 'Trong phim, tất cả các thành viên trong biệt đội cảm tử đều bị cấy một quả bom vào cổ, loại bom này có thể phát nổ bất cứ lúc nào nếu họ chạy trốn hay chống lại lệnh của chỉ huy. Biệt đội được thành lập bởi một người phụ nữ mạnh mẽ và có quyền lực trong chính phủ là bà Amanda Waller và đặt dưới sự chỉ huy của đại tá Rick Flag.\r\nNhiệm vụ này rất khó khăn với họ khi đối thủ là những người mang sức mạnh phi thường, gồm cả những sinh vật đến từ thế giới khác.', '7.3', 'asset/posters/Biệt đội cảm tử.jpg', '2021-12-19', 'Đã ra mắt'),
(14, 2, 1, 37, 2, 'Chuyến tàu sinh tử', '117 phút', 'Một người đàn ông cùng con gái và nhiều hành khách khác bị kẹt trên một con tàu chạy tốc độ cao khi đất nước Hàn Quốc đang phải hứng chịu một đại dịch zombie đang hoành hành tại Hàn Quốc. Bộ phim xoay quanh những người sống sót trên chuyến tàu từ Seoul đến Busan phải trải qua bao vất vả, chật vật để tới được thành phố an toàn cuối cùng sau khi Hàn Quốc bị lây nhiễm bởi một loại virus chưa được xác định.', '7.6', 'asset/posters/Chuyến tàu sinh tử.png', '2021-12-19', 'Đã ra mắt'),
(15, 3, 2, 31, 2, 'Người sắt 2', '126 phút', 'Sau khi tiết lộ danh tính “Iron Man” trước giới truyền thông, nhà phát minh tỉ phú Tony Stark hiện phải đối mặt với sức ép từ nhiều phía trong việc chia sẻ công nghệ, đặc biệt là từ phía quân đội chính phủ. Nhưng, Stark vẫn từ chối tiết lộ bí mật của bộ giáp vì không muốn công nghệ bị lợi dụng vào những mục đích không chính thống. Cùng với sự hỗ trợ của Pepper Potts và “Rhodey” Rhodes, Tony cũng có cho mình những “đồng minh” mới để đối mặt với đối thủ mới.', '7.9', 'asset/posters/Người sắt 2.jpg', '2021-12-19', 'Đã ra mắt'),
(16, 3, 3, 22, 2, 'Vùng đất linh hồn', '125 phút', 'Bộ phim kể về một cô bé Chihiro theo cha mẹ chuyển về vùng quê để thay đổi cuộc sống. Nhưng trên đường đi, họ vô tình gặp con đường lã dẫn đến vùng đất linh hồn. Với quyết định khám phá tham quan bí ẩn đằng sau cánh cổng, họ được dẫn vào một ngôi làng chứa đầy thức ăn mà không có bóng người. Ở đó, ba mẹ của Chihiro bị biến thành heo vì ăn phải thức ăn của các vị thần mà chưa được phép. Kể từ đó, hành trình giải cứu gia đình của Chihiro bắt đầu.', '8.6', 'asset/posters/Vùng đất linh hồn.jpg', '2021-12-19', 'Đã ra mắt'),
(17, 2, 1, 34, 2, 'Truy lùng siêu trộm', '121 phút', 'Xoay quanh Ha Yoon-ju là thành viên mới nhất gia nhập vào Ủy Ban Chống Tội Phạm Đặc Biệt của Hàn Quốc, nơi chuyên xử lý các đối tượng tội phạm tinh vi và xảo quyệt nhất. Cô được cử vào đội của Hwang Sang-Jun  - người đội trưởng kỳ cựu của tổ chức. Nhiệm vụ đầu tiên của cô là cùng đội truy tìm băng nhóm đã đột nhập nhà băng mà không để lại vết tích. Quá trình điều tra đã đưa họ tới thế đối đầu và phải truy bắt bằng được James, đối tượng nguy hiểm cầm đầu của một băng.', '7.1', 'asset/posters/Truy lùng siêu trộm.jpg', '2021-12-19', 'Đã ra mắt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phimyeuthich`
--

CREATE TABLE `phimyeuthich` (
  `PHIM_ID` int(11) NOT NULL,
  `THANHVIEN_ID` int(11) NOT NULL,
  `PHIMYEUTHICH_NGAYGIO` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phimyeuthich`
--

INSERT INTO `phimyeuthich` (`PHIM_ID`, `THANHVIEN_ID`, `PHIMYEUTHICH_NGAYGIO`) VALUES
(1, 1, '2021-12-04 16:16:26'),
(2, 1, '2021-12-12 10:02:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `QUANTRI_ID` int(11) NOT NULL,
  `QUANTRI_HOTEN` varchar(50) DEFAULT NULL,
  `QUANTRI_SODIENTHOAI` int(11) DEFAULT NULL,
  `QUANTRI_EMAIL` varchar(100) DEFAULT NULL,
  `QUANTRI_MATKHAU` varchar(500) DEFAULT NULL,
  `QUANTRI_TRANGTHAI` varchar(20) DEFAULT NULL,
  `QUANTRI_VAITRO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`QUANTRI_ID`, `QUANTRI_HOTEN`, `QUANTRI_SODIENTHOAI`, `QUANTRI_EMAIL`, `QUANTRI_MATKHAU`, `QUANTRI_TRANGTHAI`, `QUANTRI_VAITRO`) VALUES
(1, 'Popcorn Admin', 376347325, 'popcornadmin@gmail.com', '$2y$10$R39TVCAUJOtAfsdlQ9ME5ev2e2ycJxjGTr/Ma164kfODVfs./dcNi', 'Kích hoạt', 'Admin'),
(3, 'Nguyễn Văn Anh', 364860000, 'nhanvien1@gmail.com', '$2y$10$TTrvBMx.t3QekOXvIJpuZ./yHZhA023DhQIwdecNTwFH4MyGR1m4y', 'Kích hoạt', 'Nhân viên'),
(5, 'Nguyễn Văn B', 364189482, 'nhanvien2@gmail.com', '$2y$10$fJfbOmZNKtqe.0bL9AX2Z.3q.sGj3.RZdSIcp/Km5lonf9K25GWjO', 'Kích hoạt', 'Nhân viên'),
(6, 'Nguyễn Văn C', 364854153, 'nhanvien3@gmail.com', '$2y$10$G6quIWH4l.li36M1wVc/lerjz7ZQKc7edfsjEIP.byA6yrYT5X0cq', 'Kích hoạt', 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quocgia`
--

CREATE TABLE `quocgia` (
  `QUOCGIA_ID` int(11) NOT NULL,
  `QUOCGIA_TEN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quocgia`
--

INSERT INTO `quocgia` (`QUOCGIA_ID`, `QUOCGIA_TEN`) VALUES
(1, 'Hàn Quốc'),
(2, 'Mỹ'),
(3, 'Nhật Bản'),
(4, 'Thái Lan'),
(5, 'Trung Quốc'),
(6, 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sothang`
--

CREATE TABLE `sothang` (
  `SOTHANG_ID` int(11) NOT NULL,
  `SOTHANG_DIENGIAI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sothang`
--

INSERT INTO `sothang` (`SOTHANG_ID`, `SOTHANG_DIENGIAI`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tap`
--

CREATE TABLE `tap` (
  `TAP_ID` int(11) NOT NULL,
  `PHIM_ID` int(11) NOT NULL,
  `CHATLUONG_ID` int(11) NOT NULL,
  `TAP_STT` int(11) DEFAULT NULL,
  `TAP_URL` varchar(500) DEFAULT NULL,
  `TAP_PHUDE` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tap`
--

INSERT INTO `tap` (`TAP_ID`, `PHIM_ID`, `CHATLUONG_ID`, `TAP_STT`, `TAP_URL`, `TAP_PHUDE`) VALUES
(1, 1, 1, 1, 'asset/videos/Vùng đất câm lặng-1.mp4', 'asset/captions/Vùng đất câm lặng.vtt'),
(2, 1, 2, 1, 'asset/videos/Vùng đất câm lặng-2.mp4', 'asset/captions/Vùng đất câm lặng.vtt'),
(3, 1, 3, 1, 'asset/videos/Vùng đất câm lặng-3.mp4', 'asset/captions/Vùng đất câm lặng.vtt'),
(4, 2, 1, 1, 'asset/videos/Người sắt-1.mp4', 'asset/captions/Người sắt.vtt'),
(5, 2, 2, 1, 'asset/videos/Người sắt-2.mp4', 'asset/captions/Người sắt.vtt'),
(6, 2, 3, 1, 'asset/videos/Người sắt-3.mp4', 'asset/captions/Người sắt.vtt'),
(7, 3, 1, 1, 'asset/videos/Mưu cầu hạnh phúc-1.mp4', 'asset/captions/Mưu cầu hạnh phúc.vtt'),
(8, 3, 2, 1, 'asset/videos/Mưu cầu hạnh phúc-2.mp4', 'asset/captions/Mưu cầu hạnh phúc.vtt'),
(9, 3, 3, 1, 'asset/videos/Mưu cầu hạnh phúc-3.mp4', 'asset/captions/Mưu cầu hạnh phúc.vtt'),
(25, 5, 1, 1, 'asset/videos/Loki_ep_1-1.mp4', 'asset/captions/Loki_ep_1.vtt'),
(26, 5, 2, 1, 'asset/videos/Loki_ep_1-2.mp4', 'asset/captions/Loki_ep_1.vtt'),
(27, 5, 3, 1, 'asset/videos/Loki_ep_1-3.mp4', 'asset/captions/Loki_ep_1.vtt'),
(28, 5, 1, 2, 'asset/videos/Loki_ep_2-1.mp4', 'asset/captions/Loki_ep_2.vtt'),
(29, 5, 2, 2, 'asset/videos/Loki_ep_2-2.mp4', 'asset/captions/Loki_ep_2.vtt'),
(30, 5, 3, 2, 'asset/videos/Loki_ep_2-3.mp4', 'asset/captions/Loki_ep_2.vtt'),
(31, 5, 1, 3, 'asset/videos/Loki_ep_3-1.mp4', 'asset/captions/Loki_ep_3.vtt'),
(32, 5, 2, 3, 'asset/videos/Loki_ep_3-2.mp4', 'asset/captions/Loki_ep_3.vtt'),
(33, 5, 3, 3, 'asset/videos/Loki_ep_3-3.mp4', 'asset/captions/Loki_ep_3.vtt'),
(34, 5, 1, 4, 'asset/videos/Loki_ep_4-1.mp4', 'asset/captions/Loki_ep_4.vtt'),
(35, 5, 2, 4, 'asset/videos/Loki_ep_4-2.mp4', 'asset/captions/Loki_ep_4.vtt'),
(36, 5, 3, 4, 'asset/videos/Loki_ep_4-3.mp4', 'asset/captions/Loki_ep_4.vtt'),
(37, 5, 1, 5, 'asset/videos/Loki_ep_5-1.mp4', 'asset/captions/Loki_ep_5.vtt'),
(38, 5, 2, 5, 'asset/videos/Loki_ep_5-2.mp4', 'asset/captions/Loki_ep_5.vtt'),
(39, 5, 3, 5, 'asset/videos/Loki_ep_5-3.mp4', 'asset/captions/Loki_ep_5.vtt'),
(40, 6, 1, 1, 'asset/videos/Chiếc mặt nạ-1.mp4', 'asset/captions/Chiếc mặt nạ.vtt'),
(41, 6, 2, 1, 'asset/videos/Chiếc mặt nạ-2.mp4', 'asset/captions/Chiếc mặt nạ.vtt'),
(42, 6, 3, 1, 'asset/videos/Chiếc mặt nạ-3.mp4', 'asset/captions/Chiếc mặt nạ.vtt'),
(43, 7, 1, 1, 'asset/videos/Phi vụ thế kỷ-1.mp4', 'asset/captions/Phi vụ thế kỷ.vtt'),
(44, 7, 2, 1, 'asset/videos/Phi vụ thế kỷ-2.mp4', 'asset/captions/Phi vụ thế kỷ.vtt'),
(45, 7, 3, 1, 'asset/videos/Phi vụ thế kỷ-3.mp4', 'asset/captions/Phi vụ thế kỷ.vtt'),
(46, 8, 1, 1, 'asset/videos/Venom-1.mp4', 'asset/captions/Venom.vtt'),
(47, 8, 2, 1, 'asset/videos/Venom-2.mp4', 'asset/captions/Venom.vtt'),
(48, 8, 3, 1, 'asset/videos/Venom-3.mp4', 'asset/captions/Venom.vtt'),
(49, 9, 1, 1, 'asset/videos/Trước ngày em đến-1.mp4', 'asset/captions/Trước ngày em đến.vtt'),
(50, 9, 2, 1, 'asset/videos/Trước ngày em đến-2.mp4', 'asset/captions/Trước ngày em đến.vtt'),
(51, 9, 3, 1, 'asset/videos/Trước ngày em đến-3.mp4', 'asset/captions/Trước ngày em đến.vtt'),
(55, 11, 1, 1, 'asset/videos/Chú chuột đầu bếp-1.mp4', 'asset/captions/Chú chuột đầu bếp.vtt'),
(56, 11, 2, 1, 'asset/videos/Chú chuột đầu bếp-2.mp4', 'asset/captions/Chú chuột đầu bếp.vtt'),
(57, 11, 3, 1, 'asset/videos/Chú chuột đầu bếp-3.mp4', 'asset/captions/Chú chuột đầu bếp.vtt'),
(58, 12, 1, 1, 'asset/videos/Không thể tha thứ-1.mp4', 'asset/captions/Không thể tha thứ.vtt'),
(59, 12, 2, 1, 'asset/videos/Không thể tha thứ-2.mp4', 'asset/captions/Không thể tha thứ.vtt'),
(60, 12, 3, 1, 'asset/videos/Không thể tha thứ-3.mp4', 'asset/captions/Không thể tha thứ.vtt'),
(61, 13, 1, 1, 'asset/videos/Biệt đội cảm tử-1.mp4', 'asset/captions/Biệt đội cảm tử.vtt'),
(62, 13, 2, 1, 'asset/videos/Biệt đội cảm tử-2.mp4', 'asset/captions/Biệt đội cảm tử.vtt'),
(63, 13, 3, 1, 'asset/videos/Biệt đội cảm tử-3.mp4', 'asset/captions/Biệt đội cảm tử.vtt'),
(64, 14, 1, 1, 'asset/videos/Chuyến tàu sinh tử-1.mp4', 'asset/captions/Chuyến tàu sinh tử.vtt'),
(65, 14, 2, 1, 'asset/videos/Chuyến tàu sinh tử-2.mp4', 'asset/captions/Chuyến tàu sinh tử.vtt'),
(66, 14, 3, 1, 'asset/videos/Chuyến tàu sinh tử-3.mp4', 'asset/captions/Chuyến tàu sinh tử.vtt'),
(67, 15, 1, 1, 'asset/videos/Người sắt 2-1.mp4', 'asset/captions/Người sắt 2.vtt'),
(68, 15, 2, 1, 'asset/videos/Người sắt 2-2.mp4', 'asset/captions/Người sắt 2.vtt'),
(69, 15, 3, 1, 'asset/videos/Người sắt 2-3.mp4', 'asset/captions/Người sắt 2.vtt'),
(70, 16, 1, 1, 'asset/videos/Vùng đất linh hồn-1.mp4', 'asset/captions/Vùng đất linh hồn.vtt'),
(71, 16, 2, 1, 'asset/videos/Vùng đất linh hồn-2.mp4', 'asset/captions/Vùng đất linh hồn.vtt'),
(72, 16, 3, 1, 'asset/videos/Vùng đất linh hồn-3.mp4', 'asset/captions/Vùng đất linh hồn.vtt'),
(73, 17, 1, 1, 'asset/videos/Truy lùng siêu trộm-1.mp4', 'asset/captions/Truy lùng siêu trộm.vtt'),
(74, 17, 2, 1, 'asset/videos/Truy lùng siêu trộm-2.mp4', 'asset/captions/Truy lùng siêu trộm.vtt'),
(75, 17, 3, 1, 'asset/videos/Truy lùng siêu trộm-3.mp4', 'asset/captions/Truy lùng siêu trộm.vtt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thamgia`
--

CREATE TABLE `thamgia` (
  `PHIM_ID` int(11) NOT NULL,
  `DIENVIEN_ID` int(11) NOT NULL,
  `DAODIEN_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thamgia`
--

INSERT INTO `thamgia` (`PHIM_ID`, `DIENVIEN_ID`, `DAODIEN_ID`) VALUES
(1, 20, 15),
(1, 38, 15),
(1, 53, 15),
(1, 59, 15),
(2, 67, 16),
(3, 31, 9),
(3, 87, 9),
(4, 72, 23),
(4, 80, 23),
(5, 72, 3),
(5, 80, 3),
(6, 37, 6),
(7, 16, 20),
(7, 35, 20),
(7, 48, 20),
(7, 88, 20),
(8, 79, 4),
(9, 19, 28),
(9, 69, 28),
(10, 24, 31),
(10, 94, 31),
(11, 95, 32),
(11, 95, 33),
(11, 96, 32),
(11, 96, 33),
(12, 97, 34),
(12, 98, 34),
(13, 99, 35),
(13, 100, 35),
(13, 101, 35),
(14, 105, 36),
(14, 106, 36),
(15, 67, 16),
(15, 71, 16),
(16, 107, 37),
(16, 108, 37),
(17, 109, 38),
(17, 109, 39),
(17, 110, 38),
(17, 110, 39),
(18, 93, 31),
(18, 94, 31),
(19, 93, 31),
(19, 94, 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `THANHVIEN_ID` int(11) NOT NULL,
  `QUANTRI_ID` int(11) NOT NULL,
  `THANHVIEN_HOTEN` varchar(50) DEFAULT NULL,
  `THANHVIEN_SODIENTHOAI` int(11) DEFAULT NULL,
  `THANHVIEN_EMAIL` varchar(100) DEFAULT NULL,
  `THANHVIEN_MATKHAU` varchar(500) DEFAULT NULL,
  `THANHVIEN_TRANGTHAI` varchar(20) DEFAULT NULL,
  `THANHVIEN_ANHDAIDIEN` varchar(500) DEFAULT NULL,
  `THANHVIEN_TOKEN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`THANHVIEN_ID`, `QUANTRI_ID`, `THANHVIEN_HOTEN`, `THANHVIEN_SODIENTHOAI`, `THANHVIEN_EMAIL`, `THANHVIEN_MATKHAU`, `THANHVIEN_TRANGTHAI`, `THANHVIEN_ANHDAIDIEN`, `THANHVIEN_TOKEN`) VALUES
(1, 1, 'Võ Minh Thông', 376347325, 'vominhthongss@gmail.com', '$2y$10$UmWx5g7sxHq/Bwut.GHTGOOFmOIAbLNyRqEvbW5OT0SmDOrk2IFjC', 'Kích hoạt', 'asset/avatar/no_avatar.png', ''),
(2, 1, 'Võ Minh Thông 2', 376347326, 'vominhthongss2@gmail.com', '$2y$10$JIK1oZoMZLgOb24VtRXgieT3izJxUnuXsxswNHslrBdQs.b9YHDj6', 'Kích hoạt', 'asset/avatar/no_avatar.png', NULL),
(3, 1, 'Võ Minh Thông 3', 376347327, 'vominhthongss3@gmail.com', '$2y$10$U58fu8USCXgB.UQefOaB.u7NqYAzTyiLZMEZHJIHQmZLzEPKUt8v6', 'Kích hoạt', 'asset/avatar/no_avatar.png', NULL),
(4, 1, 'Võ Minh Thông 4', 376347328, 'vominhthongss4@gmail.com', '$2y$10$msZxPF2ricgsTTnRYnTd5em2C3L7Z5.VyK2HdiMN13vss7BDGot5u', 'Kích hoạt', 'asset/avatar/no_avatar.png', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `THELOAI_ID` int(11) NOT NULL,
  `THELOAI_TEN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`THELOAI_ID`, `THELOAI_TEN`) VALUES
(1, 'Chính kịch'),
(2, 'Gây cấn'),
(3, 'Gia đình'),
(4, 'Hài'),
(5, 'Hành động'),
(6, 'Kinh dị'),
(7, 'Siêu anh hùng'),
(8, 'Tình cảm'),
(9, 'Trinh thám'),
(10, 'Viễn tưởng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloaiphim`
--

CREATE TABLE `theloaiphim` (
  `PHIM_ID` int(11) NOT NULL,
  `THELOAI_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloaiphim`
--

INSERT INTO `theloaiphim` (`PHIM_ID`, `THELOAI_ID`) VALUES
(1, 2),
(1, 6),
(2, 7),
(2, 10),
(3, 1),
(3, 3),
(4, 2),
(4, 7),
(4, 10),
(5, 2),
(5, 7),
(5, 10),
(6, 4),
(6, 10),
(7, 2),
(7, 5),
(8, 7),
(8, 10),
(9, 8),
(10, 1),
(11, 4),
(11, 8),
(12, 1),
(13, 4),
(13, 7),
(14, 2),
(14, 6),
(15, 7),
(15, 10),
(16, 3),
(16, 8),
(17, 5),
(17, 9),
(18, 1),
(19, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chatluong`
--
ALTER TABLE `chatluong`
  ADD PRIMARY KEY (`CHATLUONG_ID`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`THANHVIEN_ID`,`PHIM_ID`),
  ADD KEY `FK_RELATIONSHIP_21` (`PHIM_ID`);

--
-- Chỉ mục cho bảng `daodien`
--
ALTER TABLE `daodien`
  ADD PRIMARY KEY (`DAODIEN_ID`);

--
-- Chỉ mục cho bảng `dienvien`
--
ALTER TABLE `dienvien`
  ADD PRIMARY KEY (`DIENVIEN_ID`);

--
-- Chỉ mục cho bảng `dotuoi`
--
ALTER TABLE `dotuoi`
  ADD PRIMARY KEY (`DOTUOI_ID`);

--
-- Chỉ mục cho bảng `giagoi`
--
ALTER TABLE `giagoi`
  ADD PRIMARY KEY (`SOTHANG_ID`,`CHATLUONG_ID`),
  ADD KEY `FK_RELATIONSHIP_6` (`CHATLUONG_ID`);

--
-- Chỉ mục cho bảng `goimua`
--
ALTER TABLE `goimua`
  ADD PRIMARY KEY (`GOIMUA_ID`),
  ADD KEY `FK_RELATIONSHIP_10` (`LOAIGOI_ID`);

--
-- Chỉ mục cho bảng `khieunaidanhgia`
--
ALTER TABLE `khieunaidanhgia`
  ADD PRIMARY KEY (`KHIEUNAIDANHGIA_ID`);

--
-- Chỉ mục cho bảng `loaigoi`
--
ALTER TABLE `loaigoi`
  ADD PRIMARY KEY (`LOAIGOI_ID`);

--
-- Chỉ mục cho bảng `loaikhieunai`
--
ALTER TABLE `loaikhieunai`
  ADD PRIMARY KEY (`LOAIKHIEUNAI_ID`);

--
-- Chỉ mục cho bảng `luotxem`
--
ALTER TABLE `luotxem`
  ADD PRIMARY KEY (`LUOTXEM_ID`);

--
-- Chỉ mục cho bảng `nam`
--
ALTER TABLE `nam`
  ADD PRIMARY KEY (`NAM_ID`);

--
-- Chỉ mục cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`PHANLOAI_ID`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`PHIM_ID`);

--
-- Chỉ mục cho bảng `phimyeuthich`
--
ALTER TABLE `phimyeuthich`
  ADD PRIMARY KEY (`PHIM_ID`,`THANHVIEN_ID`);

--
-- Chỉ mục cho bảng `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`QUANTRI_ID`);

--
-- Chỉ mục cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`QUOCGIA_ID`);

--
-- Chỉ mục cho bảng `sothang`
--
ALTER TABLE `sothang`
  ADD PRIMARY KEY (`SOTHANG_ID`);

--
-- Chỉ mục cho bảng `tap`
--
ALTER TABLE `tap`
  ADD PRIMARY KEY (`TAP_ID`),
  ADD KEY `FK_RELATIONSHIP_26` (`PHIM_ID`),
  ADD KEY `FK_RELATIONSHIP_27` (`CHATLUONG_ID`);

--
-- Chỉ mục cho bảng `thamgia`
--
ALTER TABLE `thamgia`
  ADD PRIMARY KEY (`PHIM_ID`,`DIENVIEN_ID`,`DAODIEN_ID`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`THANHVIEN_ID`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`THELOAI_ID`);

--
-- Chỉ mục cho bảng `theloaiphim`
--
ALTER TABLE `theloaiphim`
  ADD PRIMARY KEY (`PHIM_ID`,`THELOAI_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chatluong`
--
ALTER TABLE `chatluong`
  MODIFY `CHATLUONG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `daodien`
--
ALTER TABLE `daodien`
  MODIFY `DAODIEN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `dienvien`
--
ALTER TABLE `dienvien`
  MODIFY `DIENVIEN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `dotuoi`
--
ALTER TABLE `dotuoi`
  MODIFY `DOTUOI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giagoi`
--
ALTER TABLE `giagoi`
  MODIFY `SOTHANG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `goimua`
--
ALTER TABLE `goimua`
  MODIFY `GOIMUA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `khieunaidanhgia`
--
ALTER TABLE `khieunaidanhgia`
  MODIFY `KHIEUNAIDANHGIA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaigoi`
--
ALTER TABLE `loaigoi`
  MODIFY `LOAIGOI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaikhieunai`
--
ALTER TABLE `loaikhieunai`
  MODIFY `LOAIKHIEUNAI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `luotxem`
--
ALTER TABLE `luotxem`
  MODIFY `LUOTXEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;

--
-- AUTO_INCREMENT cho bảng `nam`
--
ALTER TABLE `nam`
  MODIFY `NAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `PHANLOAI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `PHIM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `quantri`
--
ALTER TABLE `quantri`
  MODIFY `QUANTRI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  MODIFY `QUOCGIA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sothang`
--
ALTER TABLE `sothang`
  MODIFY `SOTHANG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tap`
--
ALTER TABLE `tap`
  MODIFY `TAP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `THANHVIEN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `THELOAI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`THANHVIEN_ID`) REFERENCES `thanhvien` (`THANHVIEN_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`PHIM_ID`) REFERENCES `phim` (`PHIM_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giagoi`
--
ALTER TABLE `giagoi`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`SOTHANG_ID`) REFERENCES `sothang` (`SOTHANG_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`CHATLUONG_ID`) REFERENCES `chatluong` (`CHATLUONG_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `goimua`
--
ALTER TABLE `goimua`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`LOAIGOI_ID`) REFERENCES `loaigoi` (`LOAIGOI_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tap`
--
ALTER TABLE `tap`
  ADD CONSTRAINT `FK_RELATIONSHIP_26` FOREIGN KEY (`PHIM_ID`) REFERENCES `phim` (`PHIM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_27` FOREIGN KEY (`CHATLUONG_ID`) REFERENCES `chatluong` (`CHATLUONG_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
