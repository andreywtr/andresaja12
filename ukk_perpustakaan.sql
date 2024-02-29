-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 04:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `id_kategori`) VALUES
(5538, 'boy boy', 'tok abah', 'ANDRE', 2024, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'seebew');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kategoribuku_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `koleksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` enum('dipinjam','dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `user_id`, `buku_id`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(13, 6, 5538, '2024-02-27', '2024-02-27', 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ulasan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`ulasan_id`, `user_id`, `buku_id`, `ulasan`, `rating`) VALUES
(12, 1, 5538, 'bagus dan keren', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `level` enum('petugas','peminjam','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `email`, `alamat`, `no_telepon`, `level`) VALUES
(1, 'petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas@gmail.com', 'terak', '081363367363', 'petugas'),
(6, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'terak', '081313131313', 'admin'),
(7, 'peminjam', 'peminjam', '55f3894bc5fc71fead8412d321c2952c', 'peminjam@gmail.com', 'indonesia', '081232312212', 'peminjam'),
(8, 'andre', 'peminjam', '202cb962ac59075b964b07152d234b70', 'andre@gmail.com', 'indonesia', '081232312212', 'peminjam'),
(9, 'kamu', 'ka', '2c68e1d50809e4ae357bcffe1fc99d2a', 'peminjam@gmail.com', 'indonesia', '081232312212', 'admin'),
(10, 'kamu', 'ka', '2c68e1d50809e4ae357bcffe1fc99d2a', 'peminjam@gmail.com', 'indonesia', '081232312212', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`),
  ADD KEY `tahun_terbit` (`tahun_terbit`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kategoribuku_id`),
  ADD KEY `buku_id` (`buku_id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`koleksi_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `buku` (`buku_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ulasan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5541;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23236;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1213;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD CONSTRAINT `kategori_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `kategori_buku_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`);

--
-- Constraints for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD CONSTRAINT `koleksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `koleksi_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
