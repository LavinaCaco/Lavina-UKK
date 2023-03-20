-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 05:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavina_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(3, 'Kejahatan'),
(4, 'Kebersihan'),
(5, 'Lalu Lintas'),
(6, 'Kenakalan Remaja'),
(7, 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `active` enum('active','suspend') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `telepon`, `active`) VALUES
(4, 234862, 'Heri', 'herimau', '$2y$10$4q0zV0xIxWTm1dhcVC9gBu46C', '89023482', 'suspend'),
(5, 25823, 'IKA', 'TOON', '$2y$10$qB68JwzkoSn0zyThCejiKuKiF', '3542324323', 'active'),
(6, 234234234, 'caco', 'caco', '$2y$10$ezzQlQOE6fACTYLTzuTiUumqx', '25463454', 'suspend'),
(7, 234728934, 'haris', 'harisbalap', '$2y$10$5XIZ7HTooGgaWxuDKPF8oeC.EDFbApt/3z9.cxLrLL0vIvt.AAiKG', '9023743', 'active'),
(8, 2147483647, 'test 1', 'test1', '$2y$10$HD./OI0cOrRGUJLNoDyhaOSnz.SZrWnqtyqY9LyOayTzwqZxKFKiC', '12312313', 'active'),
(9, 98012332, 'dimas', 'dimas', '$2y$10$00nDxryK9xCBacxXasxoSe1BPpx6.Dcc9IaIf0bqkH3ylC4L9GJdO', '089266123', 'active'),
(10, 112732123, 'anang', 'anang', '$2y$10$RxZLMoSdalpCqbE2ZsIJbu40Xs9Xwew9k6uKII/xbbLsiP3mycrTG', '097857234', 'active'),
(11, 123, 'asd', 'asd', '$2y$10$ID2.2FDv2gAtBCoKPFi7r.MD1bACeyBgM0nyTzDpSARE00M9yi2OG', '123', 'active'),
(12, 82734234, 'ajis', 'ajiss', '$2y$10$WoHgvgKGUavSk4h.aPJer.npuXbQ/0Mr7yZBOmvjLtZTG/6VHBIvq', '082347923', 'active'),
(13, 234234123, 'bagus', 'bagus banget', '$2y$10$N9eXFGnHHd0yIXegKDaz6./LQM3wl1nOoj1prnxjiRNs6.qsa9.TG', '0892342123', 'suspend'),
(14, 123123123, 'daxa', 'daxa', '$2y$10$GaDEz8RNxvr3NlWuA42HDuFdcjbNiCUKEPOCLpJUD4bmDyyVbAcki', '123234234', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tanggal_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `subkategori` varchar(128) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tanggal_pengaduan`, `nik`, `kategori`, `subkategori`, `isi_laporan`, `foto`, `status`) VALUES
(13, '2023-03-15', '82734234', ' 3', '6', 'Maling motor didaerah berbah ', '96989_6202.jpg', 'selesai'),
(14, '2023-03-15', '82734234', ' 4', '7', 'Terdapat sampah menumpuk di depan pasar kulon', 'tegu.jpeg', '0'),
(15, '2023-03-15', '82734234', ' 4', '8', 'asdq123', '70cf376f3b91115065fbbc0bb2fbf937e696c543-1280x720.png', '0'),
(16, '2023-03-15', '82734234', ' 3', '14', 'copet omm', 'images.jpg', '0'),
(17, '2023-03-15', '82734234', ' 4', '8', '21311', '1024px-Dream_icon_svg.png', '0'),
(18, '2023-03-16', '82734234', ' 5', '10', 'asdqw312', '52.png', '0'),
(19, '2023-03-19', '82734234', ' 4', '8', '1', 'lululu.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `active` enum('active','suspend') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `active`) VALUES
(11, 'admin', 'admin', '$2y$10$iLX74czhlV53iW5wJ6lcEeUx9LFrzpII4OSa6Gqj001lfwVWbAqIu', '08953459234', 'admin', 'active'),
(12, 'haris', 'haris', '$2y$10$R8ymOYyLlaFHY3HoB3xaJuiaQRhGMTaSs7HO6vNIBE5wxldQ66fGa', '09832341', 'petugas', 'active'),
(13, 'nanik', 'nanik', '$2y$10$iH8KGZ3tnONEpxoUQWkPQODYLK3dYOVT6/PLhJ8Rm1v7T6uC7X2Jq', '082934212', 'petugas', 'active'),
(14, 'mahesa', 'mahesa', '$2y$10$1mHastw1pEKL2e0T3llaa.TkVcyyQhuuApJaA7aMJcuXJw18OaBMK', '0298347234', 'petugas', 'suspend'),
(18, 'caco', 'caco', '$2y$10$2Zi55ljBgGLCKdUH5RcHcOZd4N9IbP.FQwgqOmqkK5V8dEvItXNFy', '0893742345', 'petugas', 'active'),
(19, 'petugas', 'petugas', '$2y$10$aDTgizyKgaRC52BAgZPkwu4okTqUhvlSgXWieiqSGptsmwCPbSWG6', '082349234', 'admin', 'active'),
(20, 'antokk', 'antok', '$2y$10$FveJnKZHlVV2BmEPsYfkDeZXEfS1wfCD7MGcGiiekl/.Ac/uzecBC', '082342342', 'admin', 'active'),
(21, 'ahmat', 'ahmat', '$2y$10$oF6VzSX1dZdUb6.ZHChwneubzLjo8LHA5IAxGQ/Q0533LMr7/5c3W', '088234234', 'petugas', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subkategori` int(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `id_kategori`, `sub_kategori`) VALUES
(1, 1, 'asdasdads'),
(2, 1, 'asdasd'),
(3, 2, 'dsasdasdasdasd'),
(4, 2, '213123213'),
(5, 3, 'Jambret'),
(6, 3, 'Maling'),
(7, 4, 'Sampah Sembarangan'),
(8, 4, 'Sampah Menumpuk'),
(9, 5, 'Kemacetan'),
(10, 5, 'Kejelakaan'),
(11, 6, 'Klitih'),
(12, 6, 'Mabuk-mabukan'),
(13, 7, 'Penyakit Menular'),
(14, 3, 'Copet'),
(16, 6, 'Tawuran ');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(14, 7, '2023-02-20', 'kasian dek', 11),
(15, 9, '2023-02-20', 'aisodjoiwwoasd', 11),
(16, 11, '2023-02-21', 'asd2w13sdfsd', 11),
(17, 10, '2023-02-21', 'd213as123', 14),
(18, 10, '2023-02-21', 'sdfsdfse', 11),
(19, 13, '2023-03-15', 'siap akan kita selidiki', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subkategori` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
