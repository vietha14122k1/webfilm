-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 02:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-film`
--

-- --------------------------------------------------------

--
-- Table structure for table `datve`
--

CREATE TABLE `datve` (
  `mave` int(11) NOT NULL,
  `hoten` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `ngaydat` text DEFAULT NULL,
  `maghe` text NOT NULL,
  `tenghe` text DEFAULT NULL,
  `sove` int(11) DEFAULT NULL,
  `gioxem` text DEFAULT NULL,
  `tenphim` text NOT NULL,
  `tenphong` text NOT NULL,
  `ngaychieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datve`
--

INSERT INTO `datve` (`mave`, `hoten`, `email`, `sdt`, `ngaydat`, `maghe`, `tenghe`, `sove`, `gioxem`, `tenphim`, `tenphong`, `ngaychieu`) VALUES
(0, '1', '1@q', 1, '', 'A', 'A1', 0, '18:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 1', '2023-03-25'),
(0, 'u', '1@q', 1, '2023-03-31', 'A', 'A1', 0, '18:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 1', '2023-03-25'),
(1, '1', '1@q', 1, '', 'A', 'A1', 0, '18:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 1', '2023-03-24'),
(1, 'ga', '1@q', 1, '2023-03-31', 'A', 'A11', 2, '18:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 1', '2023-03-24'),
(1, 'admin', 'admin@gmail.com', 1, '', 'A', 'A1', 0, '19:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 2', '2023-03-23'),
(1, 'admin', 'admin@gmail.com', 1, '', 'A', 'A1', 0, '18:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 1', '2023-03-23'),
(1, 'admin', 'admin@gmail.com', 1, '', 'A', 'A1', 0, '18:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 1', '2023-03-24'),
(1, '1', '1@q', 1, '2023-04-28', 'A', 'A1', 1, '18:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 1', '2023-03-23'),
(1, '1', '1@q', 1, '2023-04-28', 'A', 'A1', 1, '18:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 1', '2023-03-23'),
(1, '1', '1@q', 1, '', 'A', 'A1', 0, '19:00', '13 NGHI THỨC TRỪ TÀ', 'Rạp 2', '2023-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `ghexem`
--

CREATE TABLE `ghexem` (
  `maghe` text NOT NULL,
  `tenghe` text DEFAULT NULL,
  `maphong` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ghexem`
--

INSERT INTO `ghexem` (`maghe`, `tenghe`, `maphong`) VALUES
('A', 'A1', '1'),
('A', 'A2', '1'),
('A', 'A3', '1'),
('A', 'A4', '1'),
('A', 'A5', '1'),
('A', 'A6', '1'),
('A', 'A7', '1'),
('A', 'A8', '1'),
('A', 'A9', '1'),
('A', 'A10', '1'),
('A', 'A11', '1'),
('A', 'A12', '1'),
('A', 'A13', '1'),
('A', 'A14', '1'),
('B', 'B1', '2'),
('B', 'B2', '2'),
('B', 'B3', '2'),
('B', 'B4', '2'),
('B', 'B5', '2'),
('B', 'B6', '2'),
('B', 'B7', '2'),
('B', 'B8', '2'),
('B', 'B9', '2'),
('B', 'B10', '2'),
('B', 'B11', '2'),
('B', 'B12', '2'),
('B', 'B13', '2'),
('B', 'B14', '2');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `hoten` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` text DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `matkhau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`hoten`, `username`, `email`, `sdt`, `ngaysinh`, `gioitinh`, `diachi`, `matkhau`) VALUES
('admin', 'admin', 'admin@gmail.com', 1, '0000-00-00', '', '', '1'),
('1', '1', '1@q', 1, '0000-00-00', '', '', '1'),
('tHÀH', 'THANH', 'thanh@gmail.com', 123456789, '0000-00-00', '', '', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `phim`
--

CREATE TABLE `phim` (
  `maphim` int(11) NOT NULL,
  `tenphim` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `phut` int(11) DEFAULT NULL,
  `gioxem` text DEFAULT NULL,
  `ngaychieu` date DEFAULT NULL,
  `giave` int(11) DEFAULT NULL,
  `img` text NOT NULL,
  `maphong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phim`
--

INSERT INTO `phim` (`maphim`, `tenphim`, `title`, `phut`, `gioxem`, `ngaychieu`, `giave`, `img`, `maphong`) VALUES
(1, '13 NGHI THỨC TRỪ TÀ', 'Kinh Dị, PHIM CẤM KHÁN GIẢ DƯỚI 13 TUỔI', 102, '18:00', '2023-03-23', 50000, '13_nghi_thuc_tru_ta.png', '1'),
(1, '13 NGHI THỨC TRỪ TÀ', 'Kinh Dị, PHIM CẤM KHÁN GIẢ DƯỚI 13 TUỔI', 102, '18:00', '2023-03-24', 50000, '13_nghi_thuc_tru_ta.png', '1'),
(1, '13 NGHI THỨC TRỪ TÀ', 'Kinh Dị, PHIM CẤM KHÁN GIẢ DƯỚI 13 TUỔI', 102, '18:00', '2023-03-25', 50000, '13_nghi_thuc_tru_ta.png', '1'),
(1, '13 NGHI THỨC TRỪ TÀ', 'Kinh Dị, PHIM CẤM KHÁN GIẢ DƯỚI 13 TUỔI', 102, '19:00', '2023-03-23', 50000, '13_nghi_thuc_tru_ta.png', '2'),
(0, '', '<p>Dành Cho Mọi Lứa Tuổi</p>', 0, '', '0000-00-00', 0, '', ''),
(0, '', '<p>Phim Dành Cho Mọi Lứa Tuổi</p>', 0, '', '0000-00-00', 0, '', ''),
(0, '', '<br />\r\n<b>Warning</b>:  Undefined variable $content in <b>E:xampphtdocsweb_filmadminphimadd.php</b> on line <b>211</b><br />\r\n', 0, '', '0000-00-00', 0, '', ''),
(0, '', 'ăd', 0, '', '0000-00-00', 0, '', ''),
(0, '', '5r', 0, '', '0000-00-00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `phongxem`
--

CREATE TABLE `phongxem` (
  `maphong` int(11) NOT NULL,
  `tenphong` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phongxem`
--

INSERT INTO `phongxem` (`maphong`, `tenphong`) VALUES
(1, 'Rạp 1'),
(2, 'Rạp 2'),
(3, 'Rạp 3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
