-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2020 lúc 04:08 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `MaBoMon` varchar(10) NOT NULL,
  `MaK` varchar(10) NOT NULL,
  `TenBoMon` varchar(50) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`MaBoMon`, `MaK`, `TenBoMon`) VALUES
('BM0001', 'MK001', 'Phần Mềm'),
('BM0002', 'MK001', 'Khoa học máy tính'),
('BM0003', 'MK001', 'Học Máy'),
('BM0006', 'MK002', 'Công Trình Đường Sắt'),
('BM004', 'MK002', 'Công Trình Thủy'),
('BM005', 'MK002', 'Công Trình Cầu Đường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyennganh`
--

CREATE TABLE `chuyennganh` (
  `MaCN` varchar(10) NOT NULL,
  `TenCN` varchar(50) CHARACTER SET utf16 NOT NULL,
  `MaK` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chuyennganh`
--

INSERT INTO `chuyennganh` (`MaCN`, `TenCN`, `MaK`) VALUES
('CN0001', 'Hệ thống thông tin', 'MK001'),
('CN0002', 'Công nghệ phần mềm', 'MK001'),
('CN0003', 'Đường bộ', 'MK002'),
('CN0004', 'Đường thủy', 'MK002');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `IdDoAn` int(11) NOT NULL,
  `Diem_GVHD` float NOT NULL,
  `Diem_GVHD1` float NOT NULL,
  `Diem_GVHD2` float NOT NULL,
  `Diem_GVHD3` float NOT NULL,
  `Diem_PB` float NOT NULL,
  `DiemTB` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`IdDoAn`, `Diem_GVHD`, `Diem_GVHD1`, `Diem_GVHD2`, `Diem_GVHD3`, `Diem_PB`, `DiemTB`) VALUES
(1, 10, 10, 10, 10, 10, 10),
(5, 10, 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doan`
--

CREATE TABLE `doan` (
  `Id` int(11) NOT NULL,
  `IdUser_SV` int(11) NOT NULL,
  `IdUser_GV` int(11) NOT NULL,
  `DeTai` varchar(300) CHARACTER SET utf8 NOT NULL,
  `TrangThaiLamViec` varchar(50) CHARACTER SET utf16 NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `NgayBaoVe` date NOT NULL,
  `DiaDiemBaoVe` varchar(50) CHARACTER SET utf16 NOT NULL,
  `MaHD` varchar(10) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `ThoiGianTao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `doan`
--

INSERT INTO `doan` (`Id`, `IdUser_SV`, `IdUser_GV`, `DeTai`, `TrangThaiLamViec`, `NgayBatDau`, `NgayKetThuc`, `NgayBaoVe`, `DiaDiemBaoVe`, `MaHD`, `Status`, `ThoiGianTao`) VALUES
(1, 83, 93, 'xây dựng trang web xem phim trực tuyến', 'Đã hoàn thành', '2020-06-27', '2020-06-25', '2020-06-19', 'Hội trường T45', 'HD0004', 1, '2020-06-18 12:32:23'),
(4, 88, 93, 'đè tài 2', 'Giảng viên đã chấp nhận', '0000-00-00', '0000-00-00', '0000-00-00', 'Hội trường T46', 'HD0001', 0, '2020-06-18 12:50:37'),
(5, 91, 93, 'đề tài 4554', 'Đã hoàn thành', '2020-06-19', '2020-06-19', '2020-06-19', 'Hội trường T45', 'HD0002', 0, '2020-06-18 12:35:28'),
(6, 84, 93, 'sanbcmsvdjd  ckcbnhdsv', 'Đang gửi yêu cầu', '0000-00-00', '0000-00-00', '0000-00-00', '', NULL, 0, '2020-06-18 12:21:30'),
(7, 85, 93, ' zvxbvascfasdad', 'Báo cáo lần 1', '0000-00-00', '0000-00-00', '0000-00-00', '', 'HD0001', 0, '2020-06-18 13:53:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `TenGV` varchar(100) CHARACTER SET utf8 NOT NULL,
  `IdUser` int(11) NOT NULL,
  `MaBoMon` varchar(10) NOT NULL,
  `Trinhdohocvan` varchar(50) CHARACTER SET utf16 NOT NULL,
  `SDT` int(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `HuongNghienCuu` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`TenGV`, `IdUser`, `MaBoMon`, `Trinhdohocvan`, `SDT`, `Email`, `HuongNghienCuu`) VALUES
('CÙ Việt Dũng', 93, 'BM0001', 'Phó giáo sư ,Tiến Sĩ', 373252216, 'dungcv@wru.vn', 'Nghiên cứu ứng dụng android'),
('Nguyễn Huy Đạt', 94, 'BM0001', 'Tiến Sĩ', 373252216, 'datnh621@wru.vn', 'phát triển các ứng dụng trên nền tảng IOS'),
('Nguyễn Minh Ánh', 95, 'BM0001', 'Thạc Sĩ', 373252216, 'anhnm@wru.vn', 'Phát triển game đồ họa 5D'),
('Nguyễn Công Phượng', 96, 'BM0001', 'Tiến Sĩ', 373252216, 'phuong621@wru.vn', 'phát triển các ứng dụng trên nền tảng IOS'),
('Nguyễn Quang Hải', 97, 'BM0001', 'Thạc Sĩ', 373252216, 'hainq@wru.vn', 'Phát triển game đồ họa 5D'),
('Nguyễn Văn Toàn', 98, 'BM0002', 'Tiến Sĩ', 373252216, 'datnh621@wru.vn', 'phát triển các ứng dụng trên nền tảng IOS'),
('Đỗ Hùng Dũng', 99, 'BM0002', 'Thạc Sĩ', 373252216, 'anhnm@wru.vn', 'Phát triển game đồ họa 5D'),
('Lương Xuân Trường', 100, 'BM0002', 'Tiến Sĩ', 373252216, 'phuong621@wru.vn', 'phát triển các ứng dụng trên nền tảng IOS'),
('Vũ Văn Hội', 101, 'BM0002', 'Thạc Sĩ', 373252216, 'hainq@wru.vn', 'Phát triển game đồ họa 5D'),
('Quế Ngọc Hải', 102, 'BM0002', 'Thạc Sĩ', 373252216, 'hainq@wru.vn', 'Phát triển game đồ họa 5D'),
('Nguyễn Huy Dùng', 103, 'BM0003', 'Tiến Sĩ', 373252216, 'datnh621@wru.vn', 'phát triển các ứng dụng trên nền tảng IOS'),
('Đàm Văn Bình', 104, 'BM0003', 'Thạc Sĩ', 373252216, 'anhnm@wru.vn', 'Phát triển game đồ họa 5D'),
('Lê Thị Thảo', 105, 'BM0003', 'Tiến Sĩ', 373252216, 'phuong621@wru.vn', 'phát triển các ứng dụng trên nền tảng IOS'),
('Nguyễn Danh Dũng', 106, 'BM0003', 'Thạc Sĩ', 373252216, 'hainq@wru.vn', 'Phát triển game đồ họa 5D'),
('Phạm Quang Nghĩa', 107, 'BM0003', 'Thạc Sĩ', 373252216, 'hainq@wru.vn', 'Phát triển game đồ họa 5D');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoidong`
--

CREATE TABLE `hoidong` (
  `MaHD` varchar(10) NOT NULL,
  `MaK` varchar(10) NOT NULL,
  `IdUser_GV1` int(11) NOT NULL,
  `IdUser_GV2` int(11) NOT NULL,
  `IdUser_GV3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoidong`
--

INSERT INTO `hoidong` (`MaHD`, `MaK`, `IdUser_GV1`, `IdUser_GV2`, `IdUser_GV3`) VALUES
('HD0001', 'MK001', 93, 94, 95),
('HD0002', 'MK001', 93, 96, 95),
('HD0003', 'MK002', 96, 102, 99),
('HD0004', 'MK002', 106, 97, 107);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `MaK` varchar(10) NOT NULL,
  `TenK` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`MaK`, `TenK`) VALUES
('MK001', 'Công Nghệ Thông Tin'),
('MK002', 'Công Trình'),
('MK003', 'Nước');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaL` varchar(10) NOT NULL,
  `MaCN` varchar(10) NOT NULL,
  `MaNienKhoa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MaL`, `MaCN`, `MaNienKhoa`) VALUES
('57TH1', 'CN0001', 57),
('57TH2', 'CN0001', 57),
('57TH3', 'CN0001', 57),
('58PM1', 'CN0001', 58),
('58PM2', 'CN0001', 58),
('58TH1', 'CN0001', 58),
('58TH2', 'CN0001', 58),
('58TH3', 'CN0001', 58),
('59CT1', 'CN0003', 59);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nienkhoa`
--

CREATE TABLE `nienkhoa` (
  `MaNienKhoa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nienkhoa`
--

INSERT INTO `nienkhoa` (`MaNienKhoa`) VALUES
(54),
(55),
(56),
(57),
(58),
(59);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `TenSV` varchar(100) CHARACTER SET utf32 NOT NULL,
  `IdUser` int(11) NOT NULL,
  `MaL` varchar(10) NOT NULL,
  `DiemTB` float NOT NULL,
  `NamSinh` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`TenSV`, `IdUser`, `MaL`, `DiemTB`, `NamSinh`, `Email`) VALUES
('Nguyễn Huy Đạt', 83, '58TH3', 3.5, '1998-05-29', 'datnh621@wru.vn'),
('Trần Đức Quảng', 84, '58TH3', 3.5, '1998-05-29', 'datnh621@wru.vn'),
('Phạm Quang Nghĩa', 85, '58TH3', 3.5, '1998-05-29', 'nghia621@wru.vn'),
('Nguyễn Minh Ánh', 86, '58TH2', 3.5, '1998-05-29', 'danh621@wru.vn'),
('Nguyễn Văn Duy', 87, '58TH1', 3.5, '1998-05-29', 'dadsa621@wru.vn'),
('Nguyễn Bá Cường', 88, '58PM1', 3.5, '1998-05-29', 'datnh6sda21@wru.vn'),
('Nguyễn Huy Dũng', 89, '58PM2', 3.5, '1998-05-29', 'datnh621@wru.vn'),
('Lê Bá Hải', 90, '57TH3', 3.5, '1998-05-29', 'datnh621@wru.vn'),
('Nguyễn Tiến Đạt', 91, '57TH2', 3.5, '1998-05-29', 'datnh621@wru.vn'),
('Lê Ngọc Dần', 92, '57TH1', 3.5, '1998-05-29', 'datnh621@wru.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuctap`
--

CREATE TABLE `thuctap` (
  `IdUser_SV` int(11) NOT NULL,
  `ThoiGianBatDau` date NOT NULL,
  `ThoiGianKetThuc` date NOT NULL,
  `CongTy` varchar(100) CHARACTER SET utf8 NOT NULL,
  `DanhGia` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `thuctap`
--

INSERT INTO `thuctap` (`IdUser_SV`, `ThoiGianBatDau`, `ThoiGianKetThuc`, `CongTy`, `DanhGia`) VALUES
(83, '2020-06-17', '2020-06-30', 'TechLead', 'Xuất Sắc'),
(84, '2020-06-10', '2020-06-30', '2NF', 'Tốt'),
(86, '2020-06-09', '2020-06-09', 'SamSung', 'Tốt'),
(92, '2020-06-10', '2020-06-23', 'VNnext', 'Khá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Quyen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`IdUser`, `Username`, `Password`, `Quyen`) VALUES
(83, '1651060000', '12345', 0),
(84, '1651060001', '123456', 0),
(85, '1651060003', '123456', 0),
(86, '1651060004', '123456', 0),
(87, '1651060005', '123456', 0),
(88, '1651060006', '123456', 0),
(89, '1651060007', '123456', 0),
(90, '1651060008', '123456', 0),
(91, '1651060009', '123456', 0),
(92, '1651060010', '123456', 0),
(93, 'MGV0000', '12345', 1),
(94, 'MGV0001', '123456', 1),
(95, 'MGV0003', '123456', 1),
(96, 'MGV0004', '123456', 1),
(97, 'MGV0005', '123456', 1),
(98, 'MGV0006', '123456', 1),
(99, 'MGV0007', '123456', 1),
(100, 'MGV0008', '123456', 1),
(101, 'MGV0009', '123456', 1),
(102, 'MGV0010', '123456', 2),
(103, 'MGV0011', '123456', 1),
(104, 'MGV0012', '12456', 1),
(105, 'MGV0013', '123456', 1),
(106, 'MGV0014', '123456', 1),
(107, 'MGV0015', '123456', 1),
(252, '1651060732', '1651060732', 0),
(253, '1651060733', '1651060733', 0),
(254, '1651060734', '1651060734', 0),
(255, '1651060735', '1651060735', 0),
(256, '1651060736', '1651060736', 0),
(257, '1651060737', '1651060737', 0),
(258, '1651060713', '1651060713', 0),
(259, '1651060723', '1651060723', 0),
(260, '1651060794', '1651060794', 0),
(261, '1651060755', '1651060755', 0),
(262, '1651060786', '1651060786', 0),
(263, '1651060747', '1651060747', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`MaBoMon`),
  ADD KEY `MaK` (`MaK`);

--
-- Chỉ mục cho bảng `chuyennganh`
--
ALTER TABLE `chuyennganh`
  ADD PRIMARY KEY (`MaCN`),
  ADD KEY `MaK` (`MaK`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`IdDoAn`);

--
-- Chỉ mục cho bảng `doan`
--
ALTER TABLE `doan`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `doan_ibfk_1` (`IdUser_SV`),
  ADD KEY `doan_ibfk_2` (`IdUser_GV`),
  ADD KEY `doan_ibfk_3` (`MaHD`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `MaBoMon` (`MaBoMon`);

--
-- Chỉ mục cho bảng `hoidong`
--
ALTER TABLE `hoidong`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `IdUser_GV1` (`IdUser_GV1`),
  ADD KEY `IdUser_GV2` (`IdUser_GV2`),
  ADD KEY `IdUser_GV3` (`IdUser_GV3`),
  ADD KEY `MaK` (`MaK`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaK`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaL`),
  ADD KEY `MaCN` (`MaCN`),
  ADD KEY `MaNienKhoa` (`MaNienKhoa`);

--
-- Chỉ mục cho bảng `nienkhoa`
--
ALTER TABLE `nienkhoa`
  ADD PRIMARY KEY (`MaNienKhoa`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `MaL` (`MaL`);

--
-- Chỉ mục cho bảng `thuctap`
--
ALTER TABLE `thuctap`
  ADD PRIMARY KEY (`IdUser_SV`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `Username` (`Username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `doan`
--
ALTER TABLE `doan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD CONSTRAINT `bomon_ibfk_1` FOREIGN KEY (`MaK`) REFERENCES `khoa` (`MaK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chuyennganh`
--
ALTER TABLE `chuyennganh`
  ADD CONSTRAINT `chuyennganh_ibfk_1` FOREIGN KEY (`MaK`) REFERENCES `khoa` (`MaK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`IdDoAn`) REFERENCES `doan` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `doan`
--
ALTER TABLE `doan`
  ADD CONSTRAINT `doan_ibfk_1` FOREIGN KEY (`IdUser_SV`) REFERENCES `sinhvien` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doan_ibfk_2` FOREIGN KEY (`IdUser_GV`) REFERENCES `giangvien` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doan_ibfk_3` FOREIGN KEY (`MaHD`) REFERENCES `hoidong` (`MaHD`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giangvien_ibfk_3` FOREIGN KEY (`MaBoMon`) REFERENCES `bomon` (`MaBoMon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoidong`
--
ALTER TABLE `hoidong`
  ADD CONSTRAINT `hoidong_ibfk_1` FOREIGN KEY (`IdUser_GV1`) REFERENCES `giangvien` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoidong_ibfk_2` FOREIGN KEY (`IdUser_GV2`) REFERENCES `giangvien` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoidong_ibfk_3` FOREIGN KEY (`IdUser_GV3`) REFERENCES `giangvien` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoidong_ibfk_4` FOREIGN KEY (`MaK`) REFERENCES `khoa` (`MaK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MaCN`) REFERENCES `chuyennganh` (`MaCN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lop_ibfk_2` FOREIGN KEY (`MaNienKhoa`) REFERENCES `nienkhoa` (`MaNienKhoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_3` FOREIGN KEY (`MaL`) REFERENCES `lop` (`MaL`);

--
-- Các ràng buộc cho bảng `thuctap`
--
ALTER TABLE `thuctap`
  ADD CONSTRAINT `thuctap_ibfk_1` FOREIGN KEY (`IdUser_SV`) REFERENCES `sinhvien` (`IdUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
