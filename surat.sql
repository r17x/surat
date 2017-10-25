-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2017 at 06:52 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor` varchar(32) NOT NULL,
  `asal` varchar(64) DEFAULT NULL,
  `perihal` text,
  `keterangan` varchar(64) NOT NULL,
  `jenis` enum('masuk','keluar') DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `nomor`, `asal`, `perihal`, `keterangan`, `jenis`, `tanggal`) VALUES
(1, 'XXX-XXX12', 'fajklsdjflkasdjfk', '123', '123', 'masuk', '2017-10-05 17:00:00'),
(2, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(3, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(4, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(5, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(6, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(7, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(8, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(9, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(10, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(11, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(12, '', NULL, NULL, '', NULL, '0000-00-00 00:00:00'),
(13, 'asdfa', 'asdfa', 'asdf', 'asdfasdf', 'keluar', '2017-10-06 17:00:00'),
(14, 'hadfahdsjf', 'jfajsdfhj', '1231123', '123123', 'masuk', '2017-10-03 17:00:00'),
(15, 'hadfahdsjf', 'jfajsdfhj', '1231123', '123123', 'masuk', '2017-10-03 17:00:00'),
(16, 'w32223', '1223234', '2342', '1231231', 'masuk', '2017-12-30 17:00:00'),
(17, 'XX-1', 'SYAHRUL', 'SYAHRUl', '1231', 'masuk', '2017-12-30 17:00:00'),
(18, 'asdfasdfa', 'asdfasdf', '1234', '123', 'masuk', '2017-12-30 17:00:00'),
(19, 'asdfasdfa', 'asdfasdf', '1234', '123', 'masuk', '2017-12-30 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
