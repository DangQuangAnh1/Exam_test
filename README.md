-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2021 lúc 05:23 AM
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
-- Cơ sở dữ liệu: `exam_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `id` int(11) NOT NULL,
  `made` varchar(100) NOT NULL,
  `cauhoi` varchar(1000) NOT NULL,
  `a` varchar(1000) NOT NULL,
  `b` varchar(1000) NOT NULL,
  `c` varchar(1000) NOT NULL,
  `d` varchar(1000) NOT NULL,
  `ketqua` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`id`, `made`, `cauhoi`, `a`, `b`, `c`, `d`, `ketqua`) VALUES
(1, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(2, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(3, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(4, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(5, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(6, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(7, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(8, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(9, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(10, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(11, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(12, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(13, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(14, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(15, '1', 'Chọn đáp án đúng.', 'sai', 'đúng', 'sai', 'sai', 'b'),
(16, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(17, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(18, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(19, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(20, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(21, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(22, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(23, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(24, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(25, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(26, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(27, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(28, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(29, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(30, '2', 'Chọn đáp án sai.', 'sai', 'đúng', 'đúng', 'đúng', 'a'),
(38, '3', 'Phim mới, Show đỉnh độc quyền, truyền hình. Phim Hàn, Phim Trung, Phim Mỹ, Mới Nhất. Kho Phim Xem 24/7 Mọi Lúc Mọi Nơi: Chọc tức vợ yêu, Phim Penthouse, ...', 'Đúng', 'Sai', 'Đúng', 'Đúng', 'b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dethi`
--

CREATE TABLE `dethi` (
  `made` varchar(100) NOT NULL,
  `thoigian` varchar(100) NOT NULL,
  `socau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dethi`
--

INSERT INTO `dethi` (`made`, `thoigian`, `socau`) VALUES
('1', '60', '10'),
('2', '45', '5'),
('3', '10', '5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphan`
--

CREATE TABLE `hocphan` (
  `mahp` varchar(100) NOT NULL,
  `tenhp` varchar(100) NOT NULL,
  `mavien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocphan`
--

INSERT INTO `hocphan` (`mahp`, `tenhp`, `mavien`) VALUES
('IT1234', 'Test', 'CNTT'),
('IT3190', 'Nhập môn Học máy và khai phá dữ liệu', 'CNTT'),
('IT4409', 'Công nghệ WEB', 'CNTT'),
('IT4735', 'IOT và ứng dụng', 'CNTT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `user_name` varchar(100) NOT NULL,
  `malop` varchar(100) NOT NULL,
  `diem` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ketqua`
--

INSERT INTO `ketqua` (`user_name`, `malop`, `diem`) VALUES
('20183692', '120503', 60),
('20183693', '120502', 90);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lopthi`
--

CREATE TABLE `lopthi` (
  `malop` varchar(100) NOT NULL,
  `mahp` varchar(100) NOT NULL,
  `gv` varchar(100) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `made` int(100) NOT NULL,
  `ky` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lopthi`
--

INSERT INTO `lopthi` (`malop`, `mahp`, `gv`, `start`, `end`, `made`, `ky`) VALUES
('120502', 'IT4735', 'Phạm Ngọc Hưng', '2021-12-01 20:53:17', '2021-12-31 21:40:17', 1, 2),
('120503', 'IT3190', 'Trần Quang Khoát', '2021-12-24 00:00:00', '2022-01-02 00:00:00', 3, 1),
('120504', 'IT4409', 'Đỗ Bá Lâm', '2021-12-16 20:53:17', '2021-12-31 21:40:17', 2, 2),
('120505', 'IT4409', 'Đỗ Bá Lâm', '2021-12-17 20:53:17', '2021-12-24 21:40:17', 1, 1),
('123113', 'IT1234', 'Không phải Đặng Quang Ánh', '2021-12-24 11:14:32', '2021-12-31 11:14:32', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_name`, `password`, `email`, `role`) VALUES
('20183692', 'anh', 'anh.dq183692@sis.hust.edu.vn', 'student\r\n'),
('20183693', 'anh', 'missyou3710@gmail.com', 'student'),
('admin', 'admin', 'admin01@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vien`
--

CREATE TABLE `vien` (
  `mavien` varchar(100) NOT NULL,
  `tenvien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vien`
--

INSERT INTO `vien` (`mavien`, `tenvien`) VALUES
('CNTT', 'Viện Công nghệ thông tin và Truyền thông'),
('NN', 'Viện Ngoại ngữ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dethi`
--
ALTER TABLE `dethi`
  ADD PRIMARY KEY (`made`);

--
-- Chỉ mục cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`mahp`);

--
-- Chỉ mục cho bảng `lopthi`
--
ALTER TABLE `lopthi`
  ADD PRIMARY KEY (`malop`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
