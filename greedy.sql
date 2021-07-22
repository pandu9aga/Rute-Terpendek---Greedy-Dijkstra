-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 01:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greedy`
--

-- --------------------------------------------------------

--
-- Table structure for table `jarak`
--

CREATE TABLE `jarak` (
  `kode_jarak` int(25) NOT NULL,
  `kec_awal` varchar(100) DEFAULT NULL,
  `kec_tujuan` varchar(100) DEFAULT NULL,
  `jarak` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jarak`
--

INSERT INTO `jarak` (`kode_jarak`, `kec_awal`, `kec_tujuan`, `jarak`) VALUES
(1, 'Bondowoso', 'Tegalampel', 1680),
(2, 'Bondowoso', 'Tenggarang', 2870),
(3, 'Bondowoso', 'Tamanan', 11970),
(4, 'Bondowoso', 'Grujugan', 7840),
(5, 'Bondowoso', 'Curahdami', 3430),
(6, 'Bondowoso', 'Binakal', 5740),
(7, 'Bondowoso', 'Wringin', 12110),
(8, 'Tegalampel', 'Tenggarang', 2800),
(9, 'Tegalampel', 'Taman Krocok', 6720),
(10, 'Tegalampel', 'Wringin', 11480),
(11, 'Tenggarang', 'Taman Krocok', 5950),
(12, 'Tenggarang', 'Wonosari', 5600),
(13, 'Tenggarang', 'Pujer', 7840),
(14, 'Tenggarang', 'Jambesari', 7560),
(15, 'Taman Krocok', 'Wonosari', 1960),
(16, 'Taman Krocok', 'Tapen', 5820),
(17, 'Wonosari', 'Tapen', 6020),
(18, 'Wonosari', 'Sukosari', 10290),
(19, 'Tapen', 'Klabang', 3430),
(20, 'Tapen', 'Sukosari', 11130),
(21, 'Klabang', 'Botolinggo', 3710),
(22, 'Klabang', 'Prajekan', 5320),
(23, 'Botolinggo', 'Prajekan', 3010),
(24, 'Botolinggo', 'Cermee', 8400),
(25, 'Botolinggo', 'Sukosari', 14420),
(26, 'Botolinggo', 'Sempol', 26250),
(27, 'Prajekan', 'Cermee', 7630),
(28, 'Cermee', 'Sempol', 27230),
(29, 'Sukosari', 'Sumber Wringin', 5110),
(30, 'Sukosari', 'Pujer', 9660),
(31, 'Sumber Wringin', 'Sempol', 14560),
(32, 'Sumber Wringin', 'Tlogosari', 6790),
(33, 'Sempol', 'Tlogosari', 20440),
(34, 'Tlogosari', 'Pujer', 6720),
(35, 'Tlogosari', 'Tamanan', 12040),
(36, 'Pujer', 'Jambesari', 3990),
(37, 'Pujer', 'Tamanan', 7140),
(38, 'Jambesari', 'Tamanan', 4830),
(39, 'Tamanan', 'Grujugan', 5390),
(40, 'Maesan', 'Grujugan', 6020),
(41, 'Maesan', 'Binakal', 14280),
(42, 'Grujugan', 'Curahdami', 7210),
(43, 'Binakal', 'Pakem', 4410),
(44, 'Pakem', 'Wringin', 6090);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) DEFAULT NULL,
  `nomor_kecamatan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `nomor_kecamatan`) VALUES
(1, 'Bondowoso', 1),
(2, 'Tegalampel', 2),
(3, 'Tenggarang', 3),
(4, 'Taman Krocok', 4),
(5, 'Wonosari', 5),
(6, 'Tapen', 6),
(7, 'Klabang', 7),
(8, 'Botolinggo', 8),
(9, 'Prajekan', 9),
(10, 'Cermee', 10),
(11, 'Sukosari', 11),
(12, 'Sumber Wringin', 12),
(13, 'Sempol', 13),
(14, 'Tlogosari', 14),
(15, 'Pujer', 15),
(16, 'Jambesari', 16),
(17, 'Tamanan', 17),
(18, 'Maesan', 18),
(19, 'Grujugan', 19),
(20, 'Curahdami', 20),
(21, 'Binakal', 21),
(22, 'Pakem', 22),
(23, 'Wringin', 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `username`, `password`) VALUES
(1, 'makoto', 'makoto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jarak`
--
ALTER TABLE `jarak`
  ADD PRIMARY KEY (`kode_jarak`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jarak`
--
ALTER TABLE `jarak`
  MODIFY `kode_jarak` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kd_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
