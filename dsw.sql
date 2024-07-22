-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2024 at 09:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsw`
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
  `cand_mh_nm` varchar(70) NOT NULL,
  `cand_community` varchar(5) NOT NULL,
  `cand_sex` varchar(1) NOT NULL,
  `cand_dob` date NOT NULL,
  `cand_age` int NOT NULL,
  `ck_ex_serv` varchar(2) NOT NULL,
  `ex_serv_yr` int NOT NULL,
  `ck_citizen` varchar(2) NOT NULL,
  `cand_ec` varchar(2) NOT NULL,
  `ck_pwd` varchar(2) NOT NULL,
  `ck_ret_per` varchar(2) NOT NULL,
  `ck_msp` varchar(2) NOT NULL,
  `cand_phone` varchar(13) DEFAULT NULL,
  `cand_mail` varchar(50) NOT NULL,
  `cand_aadhar` varchar(12) NOT NULL,
  `cand_religion` varchar(50) NOT NULL,
  `cand_p_add` varchar(100) NOT NULL,
  `cand_p_block` varchar(50) NOT NULL,
  `cand_p_po` varchar(50) NOT NULL,
  `cand_p_ps` varchar(50) NOT NULL,
  `cand_p_dis` varchar(50) NOT NULL,
  `cand_p_st` varchar(255) NOT NULL,
  `cand_p_pin` int NOT NULL,
  `cand_c_add` varchar(100) NOT NULL,
  `cand_c_block` varchar(50) NOT NULL,
  `cand_c_po` varchar(50) NOT NULL,
  `cand_c_ps` varchar(50) NOT NULL,
  `cand_c_dis` varchar(50) NOT NULL,
  `cand_c_st` varchar(255) NOT NULL,
  `cand_c_pin` int NOT NULL,
  `ee1_1` text NOT NULL,
  `ee1_2` text NOT NULL,
  `ee1_3` float NOT NULL,
  `ee1_4` int NOT NULL,
  `ee1_5` int NOT NULL,
  `ee1_6` int NOT NULL,
  `ee2_1` text NOT NULL,
  `ee2_2` text NOT NULL,
  `ee2_3` float NOT NULL,
  `ee2_4` int NOT NULL,
  `ee2_5` int NOT NULL,
  `ee2_6` int NOT NULL,
  `ee3_1` text NOT NULL,
  `ee3_2` text NOT NULL,
  `ee3_3` int NOT NULL,
  `ee3_4` tinytext NOT NULL,
  `ee3_5` int NOT NULL,
  `ee4_1` text NOT NULL,
  `ee4_2` text NOT NULL,
  `ee4_3` float NOT NULL,
  `ee4_4` int NOT NULL,
  `ee4_5` int NOT NULL,
  `ee4_6` int NOT NULL,
  `ee5_1` text NOT NULL,
  `ee5_2` text NOT NULL,
  `ee5_3` float NOT NULL,
  `ee5_4` int NOT NULL,
  `ee5_5` int NOT NULL,
  `ee5_6` int NOT NULL,
  `ee6_1` text NOT NULL,
  `ee6_2` text NOT NULL,
  `ee6_3` float NOT NULL,
  `ee6_4` int NOT NULL,
  `ee6_5` int NOT NULL,
  `ee6_6` int NOT NULL,
  `post1_0` text NOT NULL,
  `post1_1` text NOT NULL,
  `post1_2` text NOT NULL,
  `post1_3` text NOT NULL,
  `post1_4` text NOT NULL,
  `post1_5` int NOT NULL,
  `exch_1` text NOT NULL,
  `exch_2` text NOT NULL,
  `exch_3` text NOT NULL,
  `cand_dclr` varchar(2) NOT NULL,
  `cand_p_pic` varchar(255) NOT NULL,
  `cand_p_sig` varchar(255) NOT NULL,
  `cand_p_age_proof` varchar(255) NOT NULL,
  `cand_p_hs_proof` varchar(255) NOT NULL,
  `cand_p_cert_proof` varchar(255) NOT NULL,
  `app_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `roll_rand` int NOT NULL,
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
-- Indexes for dumped tables
--

--
-- Indexes for table `online_app_zp_ttb`
--
ALTER TABLE `online_app_zp_ttb`
  ADD PRIMARY KEY (`cand_app_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
