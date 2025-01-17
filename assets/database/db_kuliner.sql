-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 05:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kuliner`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_makanan`
--

CREATE TABLE `tbl_makanan` (
  `id_makanan` int(2) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL,
  `daerah_makanan` varchar(100) NOT NULL,
  `foto_makanan` blob NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_makanan`
--

INSERT INTO `tbl_makanan` (`id_makanan`, `nama_makanan`, `daerah_makanan`, `foto_makanan`, `Keterangan`) VALUES
(1, 'Gudeg', 'Yogyakarta', 0x363738393265386232383865662e6a7067, 'Makanan khas Yogyakarta yang terbuat dari nangka muda yang dimasak dengan santan '),
(2, 'Bika Ambon', 'Medan', 0x363738393265393665643737662e6a7067, 'Kue khas Medan yang berwarna kuning, bertekstur lembut, dan berlubang-lubang'),
(20, 'Rawon', 'Jawa Timur', 0x363738393265613138336533382e6a7067, 'Sup khas Jawa Timur yang berisi daging sapi dan kuah cokelat pekat'),
(21, 'Kerak Telor', 'DKI Jakarta', 0x363738393265623032373737372e6a7067, 'makanan khas Betawi yang terbuat dari beras ketan, telur, dan bumbu-bumbu halus'),
(22, 'Soto Kudus', 'Jawa Tengah', 0x363738393265626339363239302e6a7067, 'Soto berkuah bening dengan rasa gurih yang terbuat dari kaldu ayam atau sapi.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_minuman`
--

CREATE TABLE `tbl_minuman` (
  `id_minuman` int(2) NOT NULL,
  `nama_minuman` varchar(100) NOT NULL,
  `daerah_minuman` varchar(100) NOT NULL,
  `foto_minuman` blob NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_minuman`
--

INSERT INTO `tbl_minuman` (`id_minuman`, `nama_minuman`, `daerah_minuman`, `foto_minuman`, `Keterangan`) VALUES
(1, 'Dawet Ayu', 'Banjarnegara', 0x363738393265326234393164362e6a7067, 'Dawet dibuat dari rebusan tepung beras. Warna hijaunya diperoleh secara alami dari perasan daun pandan. Pemanisnya menggunakan gula kelapa, dan santannya alami dari perasan buah kelapa segar'),
(3, 'Wedang Uwuh', 'Bantul, Yogyakarta', 0x363738393265336230393531362e6a7067, 'Wedang uwuh berarti minuman sampah. Tapi jangan merasa risih terlebih dahulu, sebab ‘sampah’ di sini diartikan sebagai bahan-bahan seadanya yang bisa digunakan untuk membuat minuman penghangat ini'),
(4, 'Bajigur', 'Jawa Barat', 0x363738393265346664366138312e6a7067, 'Minuman khas Jawa Barat yang terbuat dari santan, gula aren, jahe, serai, daun pandan, kayu manis, dan kopi bubuk instan. '),
(5, 'Sarabba', 'Makassar', 0x363738393266303065373962342e6a7067, 'Minuman khas Makassar, Sulawesi Selatan, yang terbuat dari jahe, gula merah, santan, dan kuning telur. '),
(6, 'Teh Talua', 'Sumatera Barat', 0x363738393265363539383630642e6a706567, 'Minuman khas Sumatera Barat yang terbuat dari kuning telur, teh celup, susu kental, jeruk nipis, dan kayu manis bubuk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `tbl_minuman`
--
ALTER TABLE `tbl_minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  MODIFY `id_makanan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_minuman`
--
ALTER TABLE `tbl_minuman`
  MODIFY `id_minuman` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
