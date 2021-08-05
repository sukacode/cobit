-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 11:53 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcobit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_domain`
--

CREATE TABLE `tbl_domain` (
  `id_domain` int(11) NOT NULL,
  `nama_domain` varchar(100) NOT NULL,
  `level` int(100) NOT NULL,
  `total_pertanyaan` int(11) NOT NULL,
  `jumlah_responden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_domain`
--

INSERT INTO `tbl_domain` (`id_domain`, `nama_domain`, `level`, `total_pertanyaan`, `jumlah_responden`) VALUES
(1, 'ME1', 1, 5, 10),
(2, 'ME1', 2, 4, 10),
(3, 'ME1', 3, 7, 10),
(4, 'ME1', 4, 4, 10),
(5, 'ME1', 5, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_domain` varchar(100) NOT NULL,
  `hasil_skor` int(11) NOT NULL,
  `hasil_index` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id_hasil`, `id_domain`, `hasil_skor`, `hasil_index`) VALUES
(236, '1', 183, 3.66),
(237, '2', 144, 3.6),
(238, '3', 249, 3.56),
(239, '4', 141, 3.53),
(240, '5', 149, 3.73);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `kode_responden` varchar(10) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `kode_responden`, `id_domain`, `nilai`) VALUES
(1, 'N11', 1, 4),
(2, 'N11', 1, 4),
(3, 'N11', 1, 4),
(4, 'N11', 1, 4),
(5, 'N11', 1, 4),
(6, 'N12', 1, 3),
(7, 'N12', 1, 3),
(8, 'N12', 1, 3),
(9, 'N12', 1, 2),
(10, 'N12', 1, 3),
(11, 'N13', 1, 4),
(12, 'N13', 1, 4),
(13, 'N13', 1, 4),
(14, 'N13', 1, 4),
(15, 'N13', 1, 4),
(21, 'N14', 1, 4),
(22, 'N14', 1, 4),
(23, 'N14', 1, 4),
(24, 'N14', 1, 4),
(25, 'N14', 1, 4),
(26, 'N15', 1, 4),
(27, 'N15', 1, 3),
(28, 'N15', 1, 3),
(29, 'N15', 1, 4),
(30, 'N15', 1, 4),
(31, 'N16', 1, 4),
(32, 'N16', 1, 4),
(33, 'N16', 1, 3),
(34, 'N16', 1, 3),
(35, 'N16', 1, 4),
(36, 'N17', 1, 4),
(37, 'N17', 1, 4),
(38, 'N17', 1, 4),
(39, 'N17', 1, 3),
(40, 'N17', 1, 4),
(41, 'N18', 1, 4),
(42, 'N18', 1, 4),
(43, 'N18', 1, 3),
(44, 'N18', 1, 4),
(45, 'N18', 1, 3),
(46, 'N19', 1, 4),
(47, 'N19', 1, 4),
(48, 'N19', 1, 3),
(49, 'N19', 1, 3),
(50, 'N19', 1, 4),
(51, 'N110', 1, 4),
(52, 'N110', 1, 3),
(53, 'N110', 1, 3),
(54, 'N110', 1, 4),
(55, 'N110', 1, 4),
(56, 'N21', 2, 4),
(57, 'N21', 2, 4),
(58, 'N21', 2, 4),
(59, 'N21', 2, 4),
(60, 'N22', 2, 3),
(61, 'N22', 2, 3),
(62, 'N22', 2, 2),
(63, 'N22', 2, 3),
(64, 'N23', 2, 4),
(65, 'N23', 2, 4),
(66, 'N23', 2, 4),
(67, 'N23', 2, 4),
(68, 'N24', 2, 4),
(69, 'N24', 2, 4),
(70, 'N24', 2, 4),
(71, 'N24', 2, 4),
(72, 'N25', 2, 4),
(73, 'N25', 2, 4),
(74, 'N25', 2, 3),
(75, 'N25', 2, 3),
(76, 'N26', 2, 4),
(77, 'N26', 2, 4),
(78, 'N26', 2, 4),
(79, 'N26', 2, 3),
(80, 'N27', 2, 4),
(81, 'N27', 2, 3),
(82, 'N27', 2, 4),
(83, 'N27', 2, 3),
(84, 'N28', 2, 3),
(85, 'N28', 2, 4),
(86, 'N28', 2, 3),
(87, 'N28', 2, 3),
(88, 'N29', 2, 4),
(89, 'N29', 2, 4),
(90, 'N29', 2, 4),
(91, 'N29', 2, 3),
(92, 'N210', 2, 3),
(93, 'N210', 2, 4),
(94, 'N210', 2, 4),
(95, 'N210', 2, 3),
(96, 'N31', 3, 4),
(97, 'N31', 3, 4),
(98, 'N31', 3, 4),
(99, 'N31', 3, 4),
(100, 'N31', 3, 4),
(101, 'N31', 3, 4),
(102, 'N31', 3, 4),
(103, 'N32', 3, 3),
(104, 'N32', 3, 3),
(105, 'N32', 3, 3),
(106, 'N32', 3, 3),
(107, 'N32', 3, 2),
(108, 'N32', 3, 3),
(109, 'N32', 3, 3),
(110, 'N33', 3, 4),
(111, 'N33', 3, 4),
(112, 'N33', 3, 4),
(113, 'N33', 3, 4),
(114, 'N33', 3, 4),
(115, 'N33', 3, 4),
(116, 'N33', 3, 4),
(117, 'N34', 3, 4),
(118, 'N34', 3, 4),
(119, 'N34', 3, 4),
(120, 'N34', 3, 4),
(121, 'N34', 3, 4),
(122, 'N34', 3, 4),
(123, 'N34', 3, 4),
(124, 'N35', 3, 4),
(125, 'N35', 3, 3),
(126, 'N35', 3, 3),
(127, 'N35', 3, 4),
(128, 'N35', 3, 2),
(129, 'N35', 3, 4),
(130, 'N35', 3, 2),
(131, 'N36', 3, 4),
(132, 'N36', 3, 3),
(133, 'N36', 3, 4),
(134, 'N36', 3, 4),
(135, 'N36', 3, 3),
(136, 'N36', 3, 4),
(137, 'N36', 3, 3),
(138, 'N37', 3, 4),
(139, 'N37', 3, 4),
(140, 'N37', 3, 4),
(141, 'N37', 3, 4),
(142, 'N37', 3, 3),
(143, 'N37', 3, 3),
(144, 'N37', 3, 4),
(145, 'N38', 3, 4),
(146, 'N38', 3, 3),
(147, 'N38', 3, 3),
(148, 'N38', 3, 4),
(149, 'N38', 3, 4),
(150, 'N38', 3, 4),
(151, 'N38', 3, 4),
(152, 'N39', 3, 4),
(153, 'N39', 3, 3),
(154, 'N39', 3, 4),
(155, 'N39', 3, 2),
(156, 'N39', 3, 4),
(157, 'N39', 3, 3),
(158, 'N39', 3, 4),
(159, 'N310', 3, 3),
(160, 'N310', 3, 3),
(161, 'N310', 3, 4),
(162, 'N310', 3, 3),
(163, 'N310', 3, 4),
(164, 'N310', 3, 2),
(165, 'N310', 3, 3),
(166, 'N41', 4, 4),
(167, 'N41', 4, 4),
(168, 'N41', 4, 4),
(169, 'N41', 4, 4),
(170, 'N42', 4, 4),
(171, 'N42', 4, 4),
(172, 'N42', 4, 3),
(173, 'N42', 4, 3),
(174, 'N43', 4, 4),
(175, 'N43', 4, 4),
(176, 'N43', 4, 4),
(177, 'N43', 4, 3),
(178, 'N44', 4, 4),
(179, 'N44', 4, 4),
(180, 'N44', 4, 4),
(181, 'N44', 4, 3),
(182, 'N45', 4, 3),
(183, 'N45', 4, 4),
(184, 'N45', 4, 4),
(185, 'N45', 4, 2),
(186, 'N46', 4, 3),
(187, 'N46', 4, 4),
(188, 'N46', 4, 4),
(189, 'N46', 4, 3),
(190, 'N47', 4, 4),
(191, 'N47', 4, 3),
(192, 'N47', 4, 3),
(193, 'N47', 4, 2),
(194, 'N48', 4, 4),
(195, 'N48', 4, 3),
(196, 'N48', 4, 4),
(197, 'N48', 4, 3),
(198, 'N49', 4, 4),
(199, 'N49', 4, 4),
(200, 'N49', 4, 3),
(201, 'N49', 4, 3),
(202, 'N410', 4, 4),
(203, 'N410', 4, 4),
(204, 'N410', 4, 3),
(205, 'N410', 4, 3),
(206, 'N51', 5, 4),
(207, 'N51', 5, 4),
(208, 'N51', 5, 4),
(209, 'N51', 5, 4),
(210, 'N52', 5, 3),
(211, 'N52', 5, 4),
(212, 'N52', 5, 3),
(213, 'N52', 5, 3),
(214, 'N53', 5, 4),
(215, 'N53', 5, 4),
(216, 'N53', 5, 4),
(217, 'N53', 5, 4),
(218, 'N54', 5, 4),
(219, 'N54', 5, 4),
(220, 'N54', 5, 4),
(221, 'N54', 5, 4),
(222, 'N55', 5, 3),
(223, 'N55', 5, 3),
(224, 'N55', 5, 4),
(225, 'N55', 5, 4),
(226, 'N56', 5, 3),
(227, 'N56', 5, 4),
(228, 'N56', 5, 4),
(229, 'N56', 5, 4),
(230, 'N57', 5, 3),
(231, 'N57', 5, 3),
(232, 'N57', 5, 4),
(233, 'N57', 5, 4),
(234, 'N58', 5, 3),
(235, 'N58', 5, 4),
(236, 'N58', 5, 4),
(237, 'N58', 5, 4),
(238, 'N59', 5, 3),
(239, 'N59', 5, 4),
(240, 'N59', 5, 4),
(241, 'N59', 5, 4),
(242, 'N510', 5, 3),
(243, 'N510', 5, 4),
(244, 'N510', 5, 4),
(245, 'N510', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `pswd_origin` varchar(30) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `crea_dt_user` date NOT NULL,
  `crea_tm_user` time NOT NULL,
  `mod_dt_user` date NOT NULL,
  `mod_tm_user` time NOT NULL,
  `status_user` enum('Admin','User') NOT NULL DEFAULT 'User',
  `foto_user` varchar(100) NOT NULL,
  `token_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nm_user`, `pswd`, `pswd_origin`, `email_user`, `crea_dt_user`, `crea_tm_user`, `mod_dt_user`, `mod_tm_user`, `status_user`, `foto_user`, `token_user`) VALUES
('admin', 'Administrator4', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'jhon@gmail.com', '2017-05-10', '09:52:00', '2020-04-03', '16:15:54', 'Admin', 'file_1532186813.jpg', '86502859dccf8520648890b6fb0338ec4a8050aa'),
('Budi', 'Budiman', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'bud@gmail.com', '2018-07-03', '20:25:35', '2020-06-02', '15:13:32', 'User', '', '034b8b97abbb308b864513de4700efad7a665ebc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_domain`
--
ALTER TABLE `tbl_domain`
  ADD PRIMARY KEY (`id_domain`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_domain`
--
ALTER TABLE `tbl_domain`
  MODIFY `id_domain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
