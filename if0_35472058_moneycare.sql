-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql212.infinityfree.com
-- Thời gian đã tạo: Th5 25, 2024 lúc 11:20 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `if0_35472058_moneycare`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `pass`) VALUES
(1, 'admin@moneycare.com', 'Nguyễn Đức Thịnh', '28fc2782ea7ef51c1104ccf7b9bea13d');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangmuc`
--

CREATE TABLE `hangmuc` (
  `id` int(10) NOT NULL,
  `tenhangmuc` varchar(100) NOT NULL,
  `loaihangmuc` int(10) NOT NULL,
  `diengiai` varchar(1000) DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `hangmuccha` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hangmuc`
--

INSERT INTO `hangmuc` (`id`, `tenhangmuc`, `loaihangmuc`, `diengiai`, `id_user`, `hangmuccha`) VALUES
(2, 'Con Cái', 1, NULL, 0, 0),
(3, 'Cho Vay', 1, NULL, 0, 0),
(4, 'Trả Nợ', 1, NULL, 0, 0),
(5, 'Dịch Vụ Sinh Hoạt', 1, NULL, 0, 0),
(6, 'Hưởng Thụ', 1, NULL, 0, 0),
(7, 'Đi Lại', 1, NULL, 0, 0),
(8, 'Nhà Cửa', 1, NULL, 0, 0),
(9, 'Sức Khỏe', 1, NULL, 0, 0),
(10, 'Lãi tiết kiệm', 0, NULL, 0, 0),
(11, 'Khác', 0, NULL, 0, 0),
(12, 'Lương', 0, NULL, 0, 0),
(13, 'Thưởng', 0, NULL, 0, 0),
(14, 'Tiền Lãi', 0, NULL, 0, 0),
(15, 'Được cho/tặng', 0, NULL, 0, 0),
(16, 'Hiếu Hỉ', 1, NULL, 0, 0),
(17, 'Ngân Hàng', 1, NULL, 0, 0),
(18, 'Phát Triển Bản Thân', 1, NULL, 0, 0),
(19, 'Trang Phục', 1, NULL, 0, 0),
(20, 'Thu Nợ', 0, NULL, 0, 0),
(21, 'Đi Vay', 0, NULL, 0, 0),
(22, 'Ăn uống', 1, NULL, 0, 0),
(23, 'Nhớ', 1, 'Skk', 13, 18),
(26, 'ddd', 0, 'ddd', 15, 6),
(30, 'mua quần áo', 1, '', 15, 0),
(31, 'mua đồ dùng cá nhân', 1, '', 15, 0),
(33, 'lãi ngân hàng vietinbank', 0, '', 15, 0),
(34, 'mua đồ dùng học tập', 1, '', 15, 0),
(36, 'Toila', 1, 'Snn', 13, 0),
(37, 'Shns', 1, 'Sjjs', 13, 7),
(38, 'du lịch', 1, '', 15, 0),
(39, 'du lịch', 1, '', 15, 0),
(40, 'ăn', 1, '', 15, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanmucchi`
--

CREATE TABLE `hanmucchi` (
  `id` int(10) NOT NULL,
  `id_hangmuc` int(10) NOT NULL,
  `tenhanmuc` varchar(255) NOT NULL,
  `sotiencanhbao` double NOT NULL,
  `sotienhanmuc` double NOT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthuc` date NOT NULL,
  `id_taikhoan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hanmucchi`
--

INSERT INTO `hanmucchi` (`id`, `id_hangmuc`, `tenhanmuc`, `sotiencanhbao`, `sotienhanmuc`, `thoigianbatdau`, `thoigianketthuc`, `id_taikhoan`) VALUES
(11, 5, 'chi tiền', 100000, 200000, '2023-11-22', '2023-11-30', 16),
(13, 22, 'all', 2000000, 3000000, '2023-11-01', '2023-11-30', 15),
(16, 22, 'hạn mức ăn tháng 12', 500000, 1000000, '2023-12-01', '2024-01-05', 29),
(18, 2, 'cảnh báo tài khoản vượt quá hạn mức', 30000000, 40000000, '2023-12-15', '2023-12-31', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoachthuchi`
--

CREATE TABLE `kehoachthuchi` (
  `id` int(10) NOT NULL,
  `id_taikhoan` int(10) NOT NULL,
  `loaikehoach` int(10) NOT NULL,
  `sotien` double NOT NULL,
  `thoigian` date NOT NULL,
  `diengiai` varchar(2550) DEFAULT NULL,
  `trangthai` int(10) NOT NULL,
  `id_hangmuc` int(10) NOT NULL,
  `thutu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `kehoachthuchi`
--

INSERT INTO `kehoachthuchi` (`id`, `id_taikhoan`, `loaikehoach`, `sotien`, `thoigian`, `diengiai`, `trangthai`, `id_hangmuc`, `thutu`) VALUES
(13, 15, 0, 1000000, '2023-11-02', 'nn', 1, 10, 'ang'),
(14, 15, 1, 200000, '2023-11-03', 'mm', 1, 22, ''),
(16, 21, 1, 1235456, '2023-12-09', 'ádfg', 0, 3, ''),
(18, 19, 1, 0, '2023-12-09', '', 0, 2, ''),
(19, 19, 1, 0, '2023-12-08', 'ádfgm', 0, 2, ''),
(21, 16, 0, 100000, '2023-12-13', '', 0, 10, 'Anh'),
(27, 29, 1, 1000000, '2023-12-15', 'đóng tiền học tiếng anh', 1, 18, ''),
(28, 32, 0, 100000, '2023-12-14', 'tiền lãi hàng tháng', 1, 10, 'ngân hàng'),
(29, 19, 1, 120000, '2023-12-15', '', 0, 2, ''),
(30, 19, 1, 1000000, '2023-12-15', '', 0, 2, ''),
(31, 35, 1, 2000000000, '2023-12-16', '', 1, 2, ''),
(32, 29, 1, 2000000000, '2023-12-17', '', 0, 8, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoanthuchi`
--

CREATE TABLE `khoanthuchi` (
  `id` int(10) NOT NULL,
  `id_taikhoan` int(10) NOT NULL,
  `sotien` double NOT NULL,
  `diengiai` varchar(1000) DEFAULT NULL,
  `thoigian` date NOT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `loaigiaodich` int(10) NOT NULL,
  `id_hangmuc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khoanthuchi`
--

INSERT INTO `khoanthuchi` (`id`, `id_taikhoan`, `sotien`, `diengiai`, `thoigian`, `hinhanh`, `loaigiaodich`, `id_hangmuc`) VALUES
(41, 16, -22000, '', '2023-11-22', 'Array', 1, 6),
(42, 16, 50000, '', '2023-11-22', 'Array', 1, 18),
(46, 15, 200000, 'gggg', '2023-11-17', 'Array', 1, 22),
(48, 19, 150000, 'rf', '2023-11-23', '', 1, 2),
(51, 19, 100000, '', '2023-11-23', '', 0, 12),
(52, 19, 545465, '', '2023-11-22', '', 1, 2),
(73, 16, 20000, '', '2023-12-13', '', 1, 8),
(74, 16, 123456, '', '2023-12-13', '', 0, 12),
(77, 19, 12345600, '', '2023-12-13', '', 1, 2),
(79, 19, 12345600, 'ăn cơm', '2023-12-13', 'upload/pexels-irina-iriser-2781760.jpg', 1, 3),
(86, 29, 35000, 'ăn trưa', '2023-12-14', 'upload/anpho.png', 1, 22),
(88, 30, 150000, 'thưởng thêm cho làm tích cực', '2023-12-14', '', 0, 13),
(89, 30, 100000, 'mua khóa học tiếng anh trên mạng', '2023-12-12', '', 1, 18),
(90, 29, 30000, 'ăn tối', '2023-12-14', '', 1, 22),
(91, 31, 888888, '', '2023-12-14', '', 1, 2),
(92, 29, 15000, 'ăn sáng', '2023-12-14', 'upload/anpho.png', 1, 22),
(93, 29, 1000000, 'đóng tiền học tiếng anh', '2023-12-15', '', 1, 18),
(94, 32, 100000, 'tiền lãi hàng tháng', '2023-12-14', NULL, 0, 10),
(98, 19, 0, '', '2023-12-09', '', 1, 2),
(99, 19, 120000, '', '2023-12-15', '', 1, 2),
(100, 19, 12345600, '', '2023-12-15', 'upload/pexels-irina-iriser-1122626.jpg', 1, 2),
(101, 30, 10000, '', '2023-12-15', '', 0, 12),
(102, 32, 200000, '', '2023-12-15', '', 0, 13),
(103, 29, 40000, '', '2023-12-15', '', 0, 20),
(104, 32, 23999, '', '2023-12-15', '', 0, 12),
(105, 29, 10000000, '', '2023-12-15', '', 1, 30),
(106, 35, 2000000000, '', '2023-12-16', '', 1, 2),
(109, 30, 20000000, '', '2023-12-15', '', 1, 2),
(110, 30, 11000000, '', '2023-12-15', '', 1, 2),
(111, 30, 10000000, 'tien cuoi vo', '2023-12-15', '', 1, 2),
(112, 36, 4000, 'ăn', '2024-01-11', '', 1, 8),
(114, 29, 5000, '', '2024-04-24', '', 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sotietkiem`
--

CREATE TABLE `sotietkiem` (
  `id` int(10) NOT NULL,
  `sodubandau` double NOT NULL,
  `tenso` varchar(1000) NOT NULL,
  `ngaygui` date NOT NULL,
  `kyhan` int(11) NOT NULL,
  `laisuat` double NOT NULL,
  `tralai` int(11) NOT NULL,
  `diengiai` varchar(1000) DEFAULT NULL,
  `id_taikhoan` int(10) NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sotietkiem`
--

INSERT INTO `sotietkiem` (`id`, `sodubandau`, `tenso`, `ngaygui`, `kyhan`, `laisuat`, `tralai`, `diengiai`, `id_taikhoan`, `trangthai`) VALUES
(22, 90000000, 'hàng ngày', '2023-12-13', 3, 5, 1, 'snn', 15, 1),
(24, 100000000000, 'con cái', '2023-12-20', 3, 5, 1, 'mua nhà cho con', 19, 0),
(25, 100000, 'so tiet kiem', '2023-12-14', 3, 5, 1, '', 16, 0),
(26, 123456, 'so tiet kiem2', '2023-12-14', 3, 5, 1, '', 16, 1),
(27, 0, 'tiết kiệm 2024', '2023-12-15', 5, 7, 1, 'tiền gửi ngân hàng vietinbank', 30, 1),
(28, 0, 'sổ tiết kiệm cho con cái', '2023-12-15', 5, 6, 1, '', 33, 1),
(30, 0, 'Sổ tiết kiệm cho con cái', '2023-12-14', 5, 5, 1, '', 29, 1),
(31, 11000000, 'Sổ tiết kiệm cho con cái', '2023-12-14', 5, 5, 1, '', 30, 0),
(32, 5000000, 'sdfsa', '2024-01-11', 3, 5, 1, 'fsfsf', 36, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tenTaiKhoan` varchar(100) NOT NULL,
  `loaiTaiKhoan` int(10) NOT NULL,
  `diengiai` varchar(1000) DEFAULT NULL,
  `sotien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `id_user`, `tenTaiKhoan`, `loaiTaiKhoan`, `diengiai`, `sotien`) VALUES
(15, 13, 'Tiền mặt', 0, 'Sjk', 9910000000),
(16, 14, 'ví', 0, '', 999924000),
(19, 16, 'mến', 1, 'ăn uống', 200010406665),
(21, 16, 'Mua sắm vi', 0, '', -2345600),
(25, 16, '', 0, '', 0),
(26, 16, 'mencute', 1, 'kjsaghdb', 3000000),
(29, 15, 'ăn uống', 0, 'chỉ dùng để ăn uống', -7465000),
(30, 15, 'mua sắm và chi tiêu cá nhân', 1, 'để chi tiêu cá nhân và có thể để đầu tư', -64490000),
(31, 17, 'drysey', 1, 'ảehearj', -105105),
(32, 15, 'tài khoản tiết kiệm', 0, 'không dùng để chi tiêu', 1323999),
(33, 12, 'Sinh', 0, '', 10000000),
(34, 19, 'tiền tỉ', 1, 'Ví mumu', 2998000000),
(35, 15, 'tai khoan tiet kiem 1', 1, '', -1990200000),
(36, 21, 'SinhHoat', 0, '', 996000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firtname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `firtname`, `lastname`, `email`, `phone`, `diachi`, `password`) VALUES
(12, 'Thịnh', 'Nguyễn', 'ducthinh140202@gmail.com', '1', '1', '$2y$10$reGQbM0Y.f7ii2SXuUQXhuSRrXzbGdfXurNxO1UCaUOb7e7ZjfIP.'),
(13, 'Phuc', 'Gand', 'phuc@gmail.com', '0745236521', 'Ghj', '$2y$10$/QZC6.ERycsSGDALBaxsiuYc8eX7mp/PRrePlf9AZCKS4HpUjacLy'),
(14, 'van', 'a', 'vana@gmail.com', '123456789', 'nbv', '$2y$10$IGx03GRSNrQy6W1buuCbY.Y.nJ18IkSuQzyGDGSMTDx.E5m0cp8yS'),
(15, 'Hoang', 'Quang Sang', 'hqsh37@gmail.com', '0328435442', 'HCM', '$2y$10$1GmlUP6l2C24CmMQcatfB.x6hzRTKL.DBgG62r5R4KH9CtajMfviq'),
(16, 'Nguyễn Thị', 'Mến', 'ntmen02vvk@gmail.com', '0389264784', '461/10 Phan Văn Trị', '$2y$10$FJTkjWzdGdwf7cZ/McC8kOZdJq1tZJH5W.LOttJE9PC15fcIG9S8m'),
(17, 'Thanh', 'Tuyen', 'tranthanhtuyen15092002@gmail.com', '0123456789', '134 no trang long', '$2y$10$2rNeRbXoFqf6G53cYaYvweDicFRXE34QFuSP3nCaLGcxilSh63lBC'),
(18, 'Hoang', 'Quang Sang', 'hqsh37s@gmail.com', '0328435442', '27 vườn lài, Q12', '$2y$10$nzkZyzzEnbrPMt04yT1U2ee9FMCBfU1P5FwmIvxhyQoGix33e7MqK'),
(19, 'Nguyen', 'Phong', 'hongphongilopfrt@gmail.com', '0702836837', '12 nguyễn văn bảo', '$2y$10$Gd0Tq6zMopSUt/hoOqDQTO9blG74yws5cFrg3dS6RZY59L4bvXZvK'),
(20, 'Hoang', 'Quang Sang', 'hqsh37ss@gmail.com', '0977300004', '281/18 Bình Lợi', '$2y$10$d9uaaFWniPC6uB504qyTB.bBFibqHt4xxHJDIX1bIvLIWYApAD5qa'),
(21, 'Phan', 'Trân', 'phanthibaotran0123@gmail.com', '0708887959', 'sfadf', '$2y$10$/9Wf6A/Q3r.0bYH5ak/AH.y.UtkffXluHNOEPxhOe5gj7cgi3oE4C');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `hangmuc`
--
ALTER TABLE `hangmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hanmucchi`
--
ALTER TABLE `hanmucchi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hangmuc` (`id_hangmuc`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `kehoachthuchi`
--
ALTER TABLE `kehoachthuchi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taikhoan` (`id_taikhoan`),
  ADD KEY `id_hangmuc` (`id_hangmuc`);

--
-- Chỉ mục cho bảng `khoanthuchi`
--
ALTER TABLE `khoanthuchi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taikhoan` (`id_taikhoan`),
  ADD KEY `id_hangmuc` (`id_hangmuc`);

--
-- Chỉ mục cho bảng `sotietkiem`
--
ALTER TABLE `sotietkiem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hangmuc`
--
ALTER TABLE `hangmuc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `hanmucchi`
--
ALTER TABLE `hanmucchi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `kehoachthuchi`
--
ALTER TABLE `kehoachthuchi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `khoanthuchi`
--
ALTER TABLE `khoanthuchi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `sotietkiem`
--
ALTER TABLE `sotietkiem`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hanmucchi`
--
ALTER TABLE `hanmucchi`
  ADD CONSTRAINT `hanmucchi_ibfk_1` FOREIGN KEY (`id_hangmuc`) REFERENCES `hangmuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hanmucchi_ibfk_2` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kehoachthuchi`
--
ALTER TABLE `kehoachthuchi`
  ADD CONSTRAINT `kehoachthuchi_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehoachthuchi_ibfk_2` FOREIGN KEY (`id_hangmuc`) REFERENCES `hangmuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khoanthuchi`
--
ALTER TABLE `khoanthuchi`
  ADD CONSTRAINT `khoanthuchi_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `khoanthuchi_ibfk_2` FOREIGN KEY (`id_hangmuc`) REFERENCES `hangmuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sotietkiem`
--
ALTER TABLE `sotietkiem`
  ADD CONSTRAINT `sotietkiem_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
