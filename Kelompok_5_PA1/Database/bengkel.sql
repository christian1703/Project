-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 05:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sparepart` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_sparepart`, `jumlah`, `status`) VALUES
(34, 11, 4, 5, 'not_ver');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id` int(11) NOT NULL,
  `nama_sparepart` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `img_sparepart` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id`, `nama_sparepart`, `deskripsi`, `harga`, `img_sparepart`, `stok`) VALUES
(3, 'Air Radiator', 'Mendinginkan mesin agar temperaturnya tetap stabil.', 11000, 'air_radiator.jpg', 5),
(4, 'Ban Dalam', 'Pengembang agar ban luar dapat berfungsi.', 30000, 'ban_dalam.jpg', 5),
(5, 'Ban Luar', 'Melindungi ban dalam agar tidak mudah pecah.', 50000, 'ban_luar.jpg', 5),
(6, 'Dinamo STT GNS', 'Pemutar gigi flywheel untuk menggerakan atau menyalakan mesin.', 40000, 'dinamo_sttgns.jpg', 5),
(7, 'Speedometer RC110', 'Mengukur kecepatan motor.', 75000, 'speedometer_rc110.jpg', 5),
(8, 'Carbu Cleaner', 'Pembersih Karbu.', 25000, 'carbu_cleaner.jpg', 5),
(9, 'Piston RX King', 'Menekan material pembakaran yang sudah terhisap agar lebih mudah terbakar.', 150000, 'piston_rxking.jpg', 5),
(16, 'Apung Tangki', 'Menunjukan seberapa penuh tangki bahan bakar', 35000, '60b92e962ea22.jpg', 5),
(17, 'Karbu', 'Mengumpulkan dan mencampurkan udara serta bahan bakar.', 100000, '60b92f7478aa3.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `img`, `alamat`, `no_hp`, `role`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin.jpg', 'Tarutung', 1234, 'admin'),
(11, 'Christian Tobing', 'christian', 'christian', 'user.jpg', 'Tarutung', 12345678, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
