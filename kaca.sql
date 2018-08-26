-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 01:52 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaca`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori_barang`, `gambar`, `keterangan`, `jumlah`, `harga`) VALUES
(1, 'KC005', 'Kaca Dogong', 'kaca dogong', '15s1xlqisfq8ok0.jpg', 'Kaca Kuat Untuk dogong', 20, 20000),
(2, 'KC002', 'Kaca Elep', 'Kaca Elep', '17p90fi8cr1cko4.jpg', '', 10, 0),
(3, 'KC003', 'Kaca L300', 'Kaca L300', '97dqyqja78sowgc.jpg', '', 15, 0),
(4, 'KC004', 'Kaca Angkot', 'Kaca Angkot', '87uaxjzlvoso048.jpg', '', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `id_costumer` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `nama`, `telp`, `email`, `alamat`) VALUES
(8, 'Ikhsan', '08513546548', 'ikhsan@gmail.com', 'asd'),
(10, 'Ikhsan', '08513546548', 'info@nusaputra.ac.id', 'Cibolang'),
(11, 'Eizan', '08513546548', 'eizan38@gmail.com', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_costumer` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_costumer`, `id_barang`, `jumlah`, `tanggal`) VALUES
(8, '8', '1', 1, '2018-08-21 12:54:07'),
(10, '10', '1', 2, '2018-07-01 12:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_website`, `logo`, `alamat`, `deskripsi`, `theme`) VALUES
(0, 'Penjualan Kaca', 'Logo NSP-1.png', 'Jl Raya Ciboalang No 21', 'skripsi 2018 @yanti aryani', 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `akses_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `telp`, `username`, `password`, `foto`, `akses_level`) VALUES
(1, 'Yanti Aryani', '085217965569', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'bek3zb8yb3ksk48.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_costumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
