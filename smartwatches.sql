-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2022 lúc 10:00 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `smartwatches`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) UNSIGNED NOT NULL,
  `MaDH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TongTien` double NOT NULL,
  `GhiChu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` int(1) NOT NULL DEFAULT 1,
  `PhuongThuc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `MaDH`, `MaKH`, `TongTien`, `GhiChu`, `TrangThai`, `PhuongThuc`) VALUES
(20, 'HD61776', 'vuthanhtuyen@gmail.com', 1495000, '', 4, 'Chuyển Khoản'),
(21, 'HD62445', 'vuthanhtuyen@gmail.com', 1495000, '', 4, 'Chuyển Khoản'),
(22, 'HD28708', 'vuthanhtuyen@gmail.com', 4786000, '', 4, 'Tiền Mặt'),
(24, 'HD91352', 'vuthanhtuyen@gmail.com', 3590000, '', 4, 'Chuyển Khoản'),
(25, 'HD12753', 'vuthanhtuyen@gmail.com', 3590000, '', 4, 'Chuyển Khoản'),
(26, 'HD64869', 'vuthanhtuyen@gmail.com', 3590000, '', 4, 'Tiền Mặt'),
(27, 'HD37707', 'ly.25112001@gmail.com', 22990000, '', 1, 'Tiền Mặt'),
(28, 'HD17829', 'ly.25112001@gmail.com', 22990000, '', 1, 'Chuyển Khoản'),
(29, 'HD15188', 'ly.25112001@gmail.com', 22990000, '', 3, 'Chuyển Khoản'),
(30, 'HD80709', 'ly.25112001@gmail.com', 22990000, '', 1, 'Chuyển Khoản'),
(31, 'HD64096', 'ly.25112001@gmail.com', 22990000, '', 1, 'Chuyển Khoản'),
(32, 'HD27203', '', 0, '', 1, 'Chuyển Khoản'),
(33, 'HD34373', 'ly.25112001@gmail.com', 22990000, '', 1, 'Tiền Mặt'),
(34, 'HD77232', 'ly.25112001@gmail.com', 0, '', 1, 'Chuyển Khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetail`
--

CREATE TABLE `billdetail` (
  `id` int(11) UNSIGNED NOT NULL,
  `MaHD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SL` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `billdetail`
--

INSERT INTO `billdetail` (`id`, `MaHD`, `MaSP`, `SL`) VALUES
(25, 'HD61776', 'SP45712', 5),
(26, 'HD62445', 'SP45712', 5),
(27, 'HD28708', 'SP14308', 10),
(28, 'HD28708', 'SP30568', 4),
(29, 'HD91352', 'SP14308', 10),
(30, 'HD12753', 'SP14308', 10),
(31, 'HD64869', 'SP14308', 10),
(32, 'HD37707', 'ultra_cao_su', 1),
(33, 'HD37707', '', 1),
(34, 'HD17829', 'ultra_cao_su', 1),
(35, 'HD15188', 'ultra_cao_su', 1),
(36, 'HD80709', 'ultra_cao_su', 1),
(37, 'HD80709', '', 1),
(38, 'HD64096', 'ultra_cao_su', 1),
(39, 'HD64096', '', 1),
(40, 'HD34373', 'ultra_cao_su', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) UNSIGNED NOT NULL,
  `MaDanhMuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenDanhMuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `MaDanhMuc`, `TenDanhMuc`, `MoTa`) VALUES
(17, 'w', 'smartwatch', ''),
(18, 'w8', 'Apple Watch Series 8', ''),
(19, 'w_ultra', 'Apple Watch Ultra', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NamSinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `CMND_CCCD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `QuocGia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TinhThanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `QuanHuyen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PhuongXa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `HoTen`, `NamSinh`, `CMND_CCCD`, `GioiTinh`, `QuocGia`, `TinhThanh`, `QuanHuyen`, `PhuongXa`, `DiaChi`, `SDT`, `Email`, `Hinh`) VALUES
('KH2235', 'Vũ Thành Trường Tuyên', '2001', '272754434', 'Nam', 'Việt Nam', 'Hồ Chí Minh', 'Gò Vấp', 'Phường 5', '0908379355', '0908379355', 'vuthanhtuyen@gmail.com', '1666844259_user.jpg'),
('KH8635', 'Nguyễn Hoàng Lý', '2001', '079201011343', 'Nam', 'Việt Nam', 'Hồ Chí Minh', 'Củ Chi', 'Tân Thạnh Đông', '0868517644', '0868517644', 'ly.25112001@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1388817072, 301990289, 'hi'),
(2, 301990289, 1082574540, 'hi'),
(3, 986319119, 1082574540, 'chào'),
(4, 1082574540, 986319119, 'cháo cái quần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo`
--

CREATE TABLE `momo` (
  `id` int(10) UNSIGNED NOT NULL,
  `partnerCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderId` int(20) NOT NULL,
  `amount` double NOT NULL,
  `trans_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `momo`
--

INSERT INTO `momo` (`id`, `partnerCode`, `orderId`, `amount`, `trans_Id`) VALUES
(1, 'MOMOBKUN20180529', 1666753561, 10000, 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvientuvan`
--

CREATE TABLE `nhanvientuvan` (
  `MaNV` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `TaiKhoan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(10) NOT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhanvientuvan`
--

INSERT INTO `nhanvientuvan` (`MaNV`, `TaiKhoan`, `HoTen`, `SDT`, `DiaChi`, `Hinh`) VALUES
('NV498089', 'nguyentrongphu143@gmail.com', 'Nguyễn Trọng Phú', 908379355, '156/9 Trần Bá Giao Gò Vấp', '1666608535_download.png'),
('NV741931', 'dangduykhang@gmail.com', 'Đặng Duy Khang', 123456789, 'Đại Học Công Nghiêp HCM', '1666608535_download.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvienvandon`
--

CREATE TABLE `nhanvienvandon` (
  `MaNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TaiKhoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(10) NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvienvandon`
--

INSERT INTO `nhanvienvandon` (`MaNV`, `TaiKhoan`, `HoTen`, `SDT`, `DiaChi`, `Hinh`) VALUES
('NV162019', 'phamhuuphuoc@gmail.com', 'Phạm Hữu Phước', 908379355, 'Đại Học Công Thương HCM', '1666761455_download.png'),
('NV194949', 'vuvanpho@gmail.com', 'Vũ Văn Phố', 908379355, '156/9 Trần Bá Giao Gò Vấp', '1666607846_download.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaQuyen` int(10) NOT NULL,
  `TenQuyen` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`MaQuyen`, `TenQuyen`) VALUES
(1, 'Quản Trị Hệ Thống'),
(2, 'Nhân Viên Vận Đơn'),
(3, 'Nhân Viên Tư Vấn'),
(4, 'Người Dùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) UNSIGNED NOT NULL,
  `MaSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` double NOT NULL,
  `GiaKM` double NOT NULL,
  `MaDanhMuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `MaSanPham`, `TenSanPham`, `Gia`, `GiaKM`, `MaDanhMuc`, `MoTa`, `Hinh`) VALUES
(16, '41mm_1', 'Apple Watch Series 8 41mm 4G viền nhôm dây cao su | Chính hãng VN/A', 14990000, 12990000, 'w8', '', '41mm_1_apple_watch_series8.png'),
(17, 'gold_4_2', 'Apple Watch Series 8 41mm GPS viền nhôm | Chính hãng VN/A', 11990000, 9990000, 'w8', '', 'gold_4_2_apple_watch_series8.png'),
(18, '45mm_3', 'Apple Watch Series 8 45mm GPS viền nhôm | Chính hãng VN/A', 12990000, 10790000, 'w8', '', '45mm_3_apple_watch_series8.png'),
(19, 'ultra_cao_su', 'Apple Watch Ultra 49mm Viền Titan - Dây cao su | Chính hãng VN/A', 23990000, 22990000, 'w_ultra', '', 'ultra-cao-su.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) UNSIGNED NOT NULL,
  `TaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PhanQuyen` int(1) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `TrangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lock` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `TaiKhoan`, `MatKhau`, `PhanQuyen`, `unique_id`, `TrangThai`, `Lock`) VALUES
(1, 'QUANTRI', '202cb962ac59075b964b07152d234b70', 1, 0, 'Offline', 1),
(29, 'A@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 1388817072, 'Online', 1),
(105, 'vuvanpho@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, 905952750, 'Online', 1),
(106, 'nguyentrongphu143@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 3, 301990289, 'Offline', 1),
(107, 'dangduykhang@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 3, 986319119, 'Offline', 1),
(108, 'vuthanhtuyen@gmail.com', '202cb962ac59075b964b07152d234b70', 4, 1082574540, 'Online', 1),
(109, 'phamhuuphuoc@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, 267683583, 'Offline', 1),
(110, 'ly.25112001@gmail.com', 'f004357feeec65b3b32fbae5921a6429', 4, 1628698991, 'Online', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaidonhang`
--

CREATE TABLE `trangthaidonhang` (
  `id` int(10) NOT NULL,
  `TenTrangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaidonhang`
--

INSERT INTO `trangthaidonhang` (`id`, `TenTrangThai`) VALUES
(1, 'Chuẩn Bị Hàng'),
(2, 'Giao Hàng'),
(3, 'Đã Thanh Toán'),
(4, 'Đã Hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Chỉ mục cho bảng `momo`
--
ALTER TABLE `momo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvientuvan`
--
ALTER TABLE `nhanvientuvan`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `nhanvienvandon`
--
ALTER TABLE `nhanvienvandon`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaSanPham_2` (`MaSanPham`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TaiKhoan` (`TaiKhoan`);

--
-- Chỉ mục cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `momo`
--
ALTER TABLE `momo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
