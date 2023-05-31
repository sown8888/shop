-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 12, 2022 lúc 07:34 PM
-- Phiên bản máy phục vụ: 10.3.34-MariaDB-cll-lve
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tungduon_binhtools_binh06`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `seri` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `pin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `loaithe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `menhgia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `thucnhan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `key_log`
--

CREATE TABLE `key_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `nguoi_mua` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngay_mua` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngay_het_han` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `key_log`
--

INSERT INTO `key_log` (`id`, `username`, `nguoi_mua`, `key`, `ngay_mua`, `ngay_het_han`, `ip`) VALUES
(1, 'binhvui06', 'Lê Văn Bình', 'binhvui06', '07:28:31 30-03-2022', '07:28:31 31-03-2022', '171.236.4.210'),
(2, 'binhvui06', 'trantungduong1232008', 'jsdackldwoldwa', '07:50:53 30-03-2022', '07:50:53 08-07-2022', '171.236.4.210'),
(3, 'binhvui06', 'Tùng Dương', 'dung123', '07:53:12 30-03-2022', '07:53:12 31-07-2022', '171.236.4.210'),
(4, 'Bìnhvui06', 'Trần Tùng Dương ', '12345678998', '06:55:28 01-04-2022', '06:55:28 06-04-2022', '171.236.4.3'),
(5, 'binhvui06', 'Trần Đức Đại', 'daivip123', '10:06:04 02-04-2022', '10:06:04 19-10-2022', '171.236.4.3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_su_mua`
--

CREATE TABLE `lich_su_mua` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngay` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngay_mua` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngay_het_han` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `lich_su_mua`
--

INSERT INTO `lich_su_mua` (`id`, `username`, `key`, `ngay`, `ngay_mua`, `ngay_het_han`, `time`) VALUES
(1, 'binhvui06', 'binhvui06', '1', '07:28:31 30-03-2022', '07:28:31 31-03-2022', '19-28-31 30-03-2022'),
(2, 'binhvui06', 'jsdackldwoldwa', '100', '07:50:53 30-03-2022', '07:50:53 08-07-2022', '19-50-53 30-03-2022'),
(3, 'binhvui06', 'dung123', '123', '07:53:12 30-03-2022', '07:53:12 31-07-2022', '19-53-12 30-03-2022'),
(4, 'Bìnhvui06', '12345678998', '5', '06:55:28 01-04-2022', '06:55:28 06-04-2022', '18-55-28 01-04-2022'),
(5, 'binhvui06', 'daivip123', '200', '10:06:04 02-04-2022', '10:06:04 19-10-2022', '10-06-04 02-04-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muafbcmt`
--

CREATE TABLE `muafbcmt` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `nd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muafollow`
--

CREATE TABLE `muafollow` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `muafollow`
--

INSERT INTO `muafollow` (`id`, `idtang`, `sl`, `username`, `time`) VALUES
(1, '100079235629801', '50', 'tungduongvip', '08:08 27-03-2022'),
(2, '100079235629801', '50', 'tungduongvip', '08:08 27-03-2022'),
(3, '100079235629801', '50', 'tungduongvip', '08:09 27-03-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muagroup`
--

CREATE TABLE `muagroup` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mualikefb`
--

CREATE TABLE `mualikefb` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mualikepage`
--

CREATE TABLE `mualikepage` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `mualikepage`
--

INSERT INTO `mualikepage` (`id`, `idtang`, `sl`, `username`, `time`) VALUES
(0, '111695194839451', '20', 'hacker2.8', '08:39 08-04-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muareaction`
--

CREATE TABLE `muareaction` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `cx` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muareactioncmt`
--

CREATE TABLE `muareactioncmt` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `cx` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muashare`
--

CREATE TABLE `muashare` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muatiktokcmt`
--

CREATE TABLE `muatiktokcmt` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `nd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muatiktokfollow`
--

CREATE TABLE `muatiktokfollow` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muatiktoklike`
--

CREATE TABLE `muatiktoklike` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muayoutubecmt`
--

CREATE TABLE `muayoutubecmt` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `nd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muayoutubefollow`
--

CREATE TABLE `muayoutubefollow` (
  `id` int(11) NOT NULL,
  `idtang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tong_nap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tong_tru` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `level` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `bannd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `tong_nap`, `money`, `tong_tru`, `level`, `bannd`, `time`) VALUES
(12, 'aaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaa@gmail.com', '0', '0', '0', '0', '0', '07:28 12-04-2022'),
(11, 'Hoang207', 'Hoang20007', 'lunmatu002@gmail.com', '0', '0', '0', '0', '0', '03:20 12-04-2022'),
(10, 'test', '123123123', 'kientatoaa28@gmail.com', '0', '0', '0', '0', '0', '09:34 07-04-2022'),
(7, 'hacker2.8', '@@@123', 'tdng394@yahoo.com', '100000', '99800', '200', '0', '0', '08:40 26-03-2022'),
(9, 'Nguyentuan', '21062007', 'tuannguyen210007@gamil.com', '0', '0', '0', '0', '0', '08:05 05-04-2022');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `key_log`
--
ALTER TABLE `key_log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lich_su_mua`
--
ALTER TABLE `lich_su_mua`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muafbcmt`
--
ALTER TABLE `muafbcmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muafollow`
--
ALTER TABLE `muafollow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muagroup`
--
ALTER TABLE `muagroup`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mualikefb`
--
ALTER TABLE `mualikefb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muareaction`
--
ALTER TABLE `muareaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muareactioncmt`
--
ALTER TABLE `muareactioncmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muashare`
--
ALTER TABLE `muashare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muatiktokcmt`
--
ALTER TABLE `muatiktokcmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muatiktokfollow`
--
ALTER TABLE `muatiktokfollow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muatiktoklike`
--
ALTER TABLE `muatiktoklike`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muayoutubecmt`
--
ALTER TABLE `muayoutubecmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muayoutubefollow`
--
ALTER TABLE `muayoutubefollow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `key_log`
--
ALTER TABLE `key_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lich_su_mua`
--
ALTER TABLE `lich_su_mua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `muafbcmt`
--
ALTER TABLE `muafbcmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muafollow`
--
ALTER TABLE `muafollow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `muagroup`
--
ALTER TABLE `muagroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mualikefb`
--
ALTER TABLE `mualikefb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muareaction`
--
ALTER TABLE `muareaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muareactioncmt`
--
ALTER TABLE `muareactioncmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muashare`
--
ALTER TABLE `muashare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muatiktokcmt`
--
ALTER TABLE `muatiktokcmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muatiktokfollow`
--
ALTER TABLE `muatiktokfollow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muatiktoklike`
--
ALTER TABLE `muatiktoklike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muayoutubecmt`
--
ALTER TABLE `muayoutubecmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muayoutubefollow`
--
ALTER TABLE `muayoutubefollow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
