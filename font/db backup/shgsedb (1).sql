-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 03:12 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shgsedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `online_app_zp_ttb`
--

CREATE TABLE `online_app_zp_ttb` (
  `cand_app_no` varchar(12) NOT NULL DEFAULT '',
  `cand_app_dt` date NOT NULL,
  `cand_post` varchar(5) NOT NULL,
  `cand_nm` varchar(70) NOT NULL,
  `cand_fh_nm` varchar(70) NOT NULL,
  `cand_community` varchar(5) NOT NULL,
  `cand_sex` varchar(1) NOT NULL,
  `cand_dob` date NOT NULL,
  `cand_age` int(2) NOT NULL,
  `ck_ex_serv` varchar(2) NOT NULL,
  `ex_serv_yr` int(4) NOT NULL,
  `ck_citizen` varchar(2) NOT NULL,
  `cand_ec` varchar(2) NOT NULL,
  `ck_msp` varchar(2) NOT NULL,
  `cand_phone` varchar(13) DEFAULT NULL,
  `cand_mail` varchar(50) NOT NULL,
  `cand_p_add` varchar(100) NOT NULL,
  `cand_p_block` varchar(50) NOT NULL,
  `cand_p_po` varchar(50) NOT NULL,
  `cand_p_ps` varchar(50) NOT NULL,
  `cand_p_dis` varchar(50) NOT NULL,
  `cand_p_pin` int(6) NOT NULL,
  `cand_c_add` varchar(100) NOT NULL,
  `cand_c_block` varchar(50) NOT NULL,
  `cand_c_po` varchar(50) NOT NULL,
  `cand_c_ps` varchar(50) NOT NULL,
  `cand_c_dis` varchar(50) NOT NULL,
  `cand_c_pin` int(6) NOT NULL,
  `ee1_1` text NOT NULL,
  `ee1_2` text NOT NULL,
  `ee1_3` float NOT NULL,
  `ee1_4` int(4) NOT NULL,
  `ee2_1` text NOT NULL,
  `ee2_2` text NOT NULL,
  `ee2_3` float NOT NULL,
  `ee2_4` int(4) NOT NULL,
  `ee3_1` text NOT NULL,
  `ee3_2` text NOT NULL,
  `ee3_3` int(2) NOT NULL,
  `ee3_4` float NOT NULL,
  `ee3_5` int(4) NOT NULL,
  `ee4_1` text NOT NULL,
  `ee4_2` text NOT NULL,
  `ee4_3` float NOT NULL,
  `ee4_4` int(4) NOT NULL,
  `ee5_1` text NOT NULL,
  `ee5_2` text NOT NULL,
  `ee5_3` float NOT NULL,
  `ee5_4` int(4) NOT NULL,
  `post1_0` text NOT NULL,
  `post1_1` text NOT NULL,
  `post1_2` text NOT NULL,
  `post1_3` int(4) NOT NULL,
  `cand_dclr` varchar(2) NOT NULL,
  `cand_p_pic` varchar(255) NOT NULL,
  `cand_p_sig` varchar(255) NOT NULL,
  `app_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `roll_rand` int(11) NOT NULL,
  `exm_roll` varchar(15) NOT NULL,
  `exm_date` varchar(20) NOT NULL,
  `exm_time` varchar(10) NOT NULL,
  `exm_venue` varchar(255) NOT NULL,
  `exm_venue_code` varchar(2) NOT NULL,
  `exm_duration` varchar(10) NOT NULL,
  `print_chk` varchar(4) NOT NULL,
  `print_dt` date NOT NULL,
  `print_time` time NOT NULL,
  `print_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_app_zp_ttb`
--

INSERT INTO `online_app_zp_ttb` (`cand_app_no`, `cand_app_dt`, `cand_post`, `cand_nm`, `cand_fh_nm`, `cand_community`, `cand_sex`, `cand_dob`, `cand_age`, `ck_ex_serv`, `ex_serv_yr`, `ck_citizen`, `cand_ec`, `ck_msp`, `cand_phone`, `cand_mail`, `cand_p_add`, `cand_p_block`, `cand_p_po`, `cand_p_ps`, `cand_p_dis`, `cand_p_pin`, `cand_c_add`, `cand_c_block`, `cand_c_po`, `cand_c_ps`, `cand_c_dis`, `cand_c_pin`, `ee1_1`, `ee1_2`, `ee1_3`, `ee1_4`, `ee2_1`, `ee2_2`, `ee2_3`, `ee2_4`, `ee3_1`, `ee3_2`, `ee3_3`, `ee3_4`, `ee3_5`, `ee4_1`, `ee4_2`, `ee4_3`, `ee4_4`, `ee5_1`, `ee5_2`, `ee5_3`, `ee5_4`, `post1_0`, `post1_1`, `post1_2`, `post1_3`, `cand_dclr`, `cand_p_pic`, `cand_p_sig`, `app_time`, `roll_rand`, `exm_roll`, `exm_date`, `exm_time`, `exm_venue`, `exm_venue_code`, `exm_duration`, `print_chk`, `print_dt`, `print_time`, `print_ip`) VALUES
('post1/000001', '2018-06-21', 'post1', 'JOYDEB DAS', 'BP DAS', 'GEN', 'M', '1987-01-01', 31, 'on', 1, 'on', '', 'on', '98745632', 'joy@gmailc.om', 'ABCD', 'XYZ', 'NBP', 'GHOLA', 'NORTH 24 PARHANAS', 700110, 'P ABCD', 'PXYZ', 'PDGFH', 'PKFJEUB', 'NOTH 24 PARGANAS', 700010, 'WBSE', 'ENG BNG', 25, 1985, 'WBSHE', 'GHN', 30, 1983, 'WEBEL', 'COMP', 8, 56, 1999, 'CCU', 'UTJ', 20, 2000, '', '', 0, 0, 'EXPERIENCE IN DATA ENTRY', '', '', 0, 'on', 'uploads/pic-1007220874-post1_000001.jpg', 'uploads/sig-1007220874-post1_000001.jpg', '2018-06-21 11:37:42', 0, '', '', '', '', '', '', 'y', '2018-06-21', '05:07:42', '::1'),
('post1/000002', '2018-06-21', 'post1', 'JOYDEB DAS', 'BP DAS', 'GEN', 'M', '1987-01-01', 31, 'on', 5, 'on', '', 'on', '98745632', 'joy@gmailc.om', 'ABCD', 'XYZ', 'NBP', 'GHOLA', 'NORTH 24 PARHANAS', 700110, 'P ABCD', 'PXYZ', 'PDGFH', 'PKFJEUB', 'NOTH 24 PARGANAS', 700010, 'WBSE', 'ENG BNG', 25, 1985, 'WBSHE', 'GHN', 30, 1983, 'WEBEL', 'COMP', 8, 56, 1999, 'CCU', 'UTJ', 20, 2000, '', '', 0, 0, 'EXPERIENCE IN DATA ENTRY', '', '', 0, 'on', 'uploads/pic-1270244297-post1_000002.jpg', 'uploads/sig-1270244297-post1_000002.jpg', '2018-06-21 11:37:42', 0, '', '', '', '', '', '', 'y', '2018-06-21', '05:07:42', '::1'),
('post1/000003', '2018-06-21', 'post1', 'JOYDEB DAS', 'BP DAS', 'OBC-A', 'M', '1985-01-01', 33, '', 0, 'on', '', 'on', '98745632', 'joy@gmailc.om', 'ABCD', 'XYZ', 'NBP', 'GHOLA', 'NORTH 24 PARHANAS P', 700110, 'P ABCD', 'PXYZ', 'PDGFH', 'PKFJEUB', 'NOTH 24 PARGANAS', 700010, 'WBSE', 'ENG BNG', 25, 1985, 'WBSHE', 'GHN', 30, 1983, 'WEBEL', 'COMP', 8, 56, 1999, 'CCU', 'UTJ', 20, 2000, '', '', 0, 0, 'EXPERIENCE IN DATA ENTRY', '', '', 0, 'on', 'uploads/pic-1377192989-post1_000003.jpg', 'uploads/sig-1377192989-post1_000003.jpg', '2018-06-21 11:37:42', 0, '', '', '', '', '', '', 'y', '2018-06-21', '05:07:42', '::1'),
('post1/000004', '2018-06-21', 'post1', 'JOYDEB DAS', 'BP DAS', 'GEN', 'M', '1989-01-01', 29, '', 0, 'on', '', '', '98745632', 'joy@gmailc.om', 'ABCD', 'XYZ', 'NBP', 'GHOLA', 'NORTH 24 PARHANAS', 700110, 'P ABCD', 'PXYZ', 'PDGFH', 'PKFJEUB', 'NOTH 24 PARGANAS', 700010, 'WBSE', 'ENG BNG', 25, 1985, 'WBSHE', 'GHN', 30, 1983, 'WEBEL', 'COMP', 8, 56, 1999, 'CCU', 'UTJ', 20, 2000, '', '', 0, 0, 'EXPERIENCE IN DATA ENTRY', '', '', 0, 'on', 'uploads/pic-1346840042-post1_000004.jpg', 'uploads/sig-1346840042-post1_000004.jpg', '2018-06-21 11:37:42', 0, '', '', '', '', '', '', 'y', '2018-06-21', '05:07:42', '::1'),
('post1/000005', '2018-06-21', 'post1', 'JOYDEB DAS', 'BP DAS', 'ST', 'M', '1989-01-01', 29, 'on', 5, 'on', '', 'on', '98745632', 'joy@gmailc.om', 'ABCD', 'XYZ', 'NBP', 'GHOLA', 'NORTH 24 PARHANAS CC', 700110, 'P ABCD', 'PXYZ', 'PDGFH', 'PKFJEUB', 'NOTH 24 PARGANAS', 700010, 'ASDASD', 'ADSADSAD', 58, 1986, 'ASDSAD', 'ASDSAD', 78, 1985, 'SDFDSF', 'SDFSDF', 8, 2, 1985, 'ASDASDSA', 'ASDSADSA', 78, 1985, '', '', 0, 0, 'EXPERIENCE IN DATA ENTRY', '', '', 0, 'on', 'uploads/pic-1159700731-post1_000005.jpg', 'uploads/sig-1159700731-post1_000005.jpg', '2018-06-21 11:37:42', 0, '', '', '', '', '', '', 'y', '2018-06-21', '05:07:42', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `online_app_zp_ttb_venue`
--

CREATE TABLE `online_app_zp_ttb_venue` (
  `venuecd` int(2) NOT NULL,
  `venue` varchar(200) NOT NULL,
  `post` varchar(6) NOT NULL,
  `roll_from` int(11) NOT NULL,
  `roll_to` int(11) NOT NULL,
  `venuecode` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_app_zp_ttb_venue`
--

INSERT INTO `online_app_zp_ttb_venue` (`venuecd`, `venue`, `post`, `roll_from`, `roll_to`, `venuecode`) VALUES
(1, 'BARASAT MAHATMA GANDHI MEMORIAL HIGH SCHOOL, NABAPALLY,BARASAT, NORTH 24 PARGANAS, KOLKATA- 700126.', 'post1', 100021, 100647, '03'),
(2, 'BANAMALIPUR S.B.M. HIGH SCHOOL, BANAMALIPUR, BARASAT, NORTH 24 PARGANAS , KOLKATA- 700124 (NEAR BARASAT CANCER HOSPITAL)', 'post1', 101200, 101847, '02'),
(3, 'BARASAT KALIKRISHNA GIRLS HIGH SCHOOL, R.B.C. ROAD, BARASAT, NORTH 24 PARGANAS, KOLKATA- 700124', 'post1', 100648, 101199, '01');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `id` int(4) NOT NULL,
  `ps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`id`, `ps`) VALUES
(1, 'AIRPORT'),
(2, 'NS CBI '),
(3, 'NEW TOWN'),
(4, 'RAJARHAT'),
(5, 'BAGUIATI'),
(6, 'ELECTRONIC COMPLEX'),
(7, 'LAKE TOWN'),
(8, 'BIDHANNAGAR NORTH'),
(9, 'BIDHANNAGAR SOUTH'),
(10, 'BIDHANNAGAR EAST'),
(11, 'BIJPUR'),
(12, 'NAIHATI'),
(13, 'JAGADDAL'),
(14, 'NOAPARA'),
(15, 'BARRACKPORE'),
(16, 'TITAGARH'),
(17, 'KHARDAHA'),
(18, 'GHOLA'),
(19, 'NEW BARRACKPORE'),
(20, 'NIMTA'),
(21, 'DUM DUM'),
(22, 'BELGHORIA'),
(23, 'BARANAGAR'),
(24, 'BARASAT'),
(25, 'MADHYAMGRAM'),
(26, 'SHASAN'),
(27, 'DUTTAPUKUR'),
(28, 'AMDANGA'),
(29, 'DEGANGA'),
(30, 'ASHOKNAGAR'),
(31, 'HABRA'),
(32, 'GAIGHATA'),
(33, 'BONGAON'),
(34, 'BAGDAH'),
(35, 'GOPALNAGAR'),
(36, 'BASIRHAT'),
(37, 'HAROA'),
(38, 'BADURIA'),
(39, 'SWARUPNAGAR'),
(40, 'HASNABAD'),
(41, 'HINGALGANJ'),
(42, 'MINAKHAN'),
(43, 'SANDESHKHALI'),
(44, 'HEMNAGAR COASTAL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `online_app_zp_ttb`
--
ALTER TABLE `online_app_zp_ttb`
  ADD PRIMARY KEY (`cand_app_no`);

--
-- Indexes for table `online_app_zp_ttb_venue`
--
ALTER TABLE `online_app_zp_ttb_venue`
  ADD PRIMARY KEY (`venuecd`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `online_app_zp_ttb_venue`
--
ALTER TABLE `online_app_zp_ttb_venue`
  MODIFY `venuecd` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
