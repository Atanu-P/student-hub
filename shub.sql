-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:12 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `pass`, `status`) VALUES
(10, 'administrator', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(11, 'Atanu', 'Pal', 'atanupal', '8d788385431273d11e8b43bb78f3aa41', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `c_id` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `upload_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `type`, `title`, `c_id`, `date`, `upload_by`) VALUES
(26, 'Demo Book (1).pdf', 'application/pdf', 'Book for B.com  student', 'B.Com', '2021-06-12 01:09:21', 'admin'),
(27, 'Demo Book (2).pdf', 'application/pdf', 'Mathmatics study material for B.e student', 'B.E', '2021-06-12 01:10:50', 'admin'),
(28, 'Demo Book (3).pdf', 'application/pdf', 'Study material for B.sc  student', 'B.Sc', '2021-06-13 10:17:18', 'atanupal'),
(29, 'Demo Book (4).pdf', 'application/pdf', 'Study material for B.ca  student.', 'B.Ca', '2021-06-13 10:17:37', 'atanupal');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `f_id` int(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `s_id` int(10) NOT NULL,
  `s_name` varchar(64) NOT NULL,
  `c_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`f_id`, `filename`, `type`, `date`, `s_id`, `s_name`, `c_id`) VALUES
(61, 'Demo Assignment  (1).pdf', 'application/pdf', '2021-06-07 05:54:13', 1101, 'Akash Patel', 'B.Sc'),
(62, 'Demo Assignment  (2).pdf', 'application/pdf', '2021-06-07 05:56:21', 1101, 'Akash Patel', 'B.Sc'),
(63, 'Demo Assignment  (3).pdf', 'application/pdf', '2021-06-07 05:56:47', 1101, 'Akash Patel', 'B.Sc'),
(72, 'Demo Assignment  (1).pdf', 'application/pdf', '2021-06-07 06:01:23', 1102, 'Nandani Parmar', 'B.Sc'),
(73, 'Demo Assignment  (2).pdf', 'application/pdf', '2021-06-07 06:01:30', 1102, 'Nandani Parmar', 'B.Sc'),
(74, 'Demo Assignment  (3).pdf', 'application/pdf', '2021-06-07 06:01:36', 1102, 'Nandani Parmar', 'B.Sc'),
(82, 'Demo Assignment  (1).pdf', 'application/pdf', '2021-06-07 06:05:20', 1103, 'Neel Dave', 'B.Sc'),
(83, 'Demo Assignment  (2).pdf', 'application/pdf', '2021-06-07 06:05:27', 1103, 'Neel Dave', 'B.Sc'),
(84, 'Demo Assignment  (3).pdf', 'application/pdf', '2021-06-07 06:05:33', 1103, 'Neel Dave', 'B.Sc');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `b_date` date NOT NULL,
  `c_id` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `j_date` datetime NOT NULL DEFAULT current_timestamp(),
  `teacher` varchar(20) NOT NULL
) ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `gender`, `b_date`, `c_id`, `year`, `pass`, `j_date`, `teacher`) VALUES
(1101, 'Akash', 'Patel', 'm', '1992-03-21', 'B.Sc', '1', 'fe4ccfd1a360bfdbf0952116f858bfea', '2021-06-07 10:38:46', 'admin'),
(1102, 'Nandani', 'Parmar', 'f', '1996-03-24', 'B.Sc', '1', 'd4027680f936725c3012cadad5633a68', '2021-06-07 10:43:42', 'admin'),
(1103, 'Neel', 'Dave', 'm', '1992-01-14', 'B.Sc', '3', '898e2f6af7ae7af8add20e37a19a44e1', '2021-06-07 10:45:01', 'admin'),
(1104, 'Rohan', 'Bansode', 'm', '1995-04-05', 'B.Sc', '2', '744bb030c149debe3f0dc14a7de5eff5', '2021-06-07 10:46:33', 'admin'),
(1105, 'Ankit', 'Patel', 'm', '1992-05-31', 'B.Sc', '3', 'd9a724d54f394c8cce16c5d38d4210ee', '2021-06-07 10:47:29', 'admin'),
(1201, 'Pritesh', 'Patel', 'm', '1992-03-23', 'B.Ca', '1', '67a55952c39ba613e4e93b5986f5c78a', '2021-06-07 10:48:22', 'admin'),
(1202, 'Urvesh', 'Suthar', 'm', '1992-05-23', 'B.Ca', '2', '9c35e7f145422f78914457c238a42fd1', '2021-06-07 10:50:13', 'admin'),
(1203, 'Parth', 'Bhatt', 'm', '1995-05-06', 'B.Ca', '3', '693acc5854bff60798c282fb7386f54b', '2021-06-07 10:51:23', 'admin'),
(1204, 'Jay', 'Patel', 'm', '1992-04-03', 'B.Ca', '2', 'adb88d8b27eeed30bb53b2e943df53e2', '2021-06-07 10:52:24', 'admin'),
(1205, 'Harsh', 'Patel', 'm', '1991-02-01', 'B.Ca', '3', '113e2effbe2cd48d3e10d5feb745ed34', '2021-06-07 10:53:32', 'admin'),
(1301, 'Khusbu', 'Patel', 'f', '1992-04-24', 'B.Com', '2', '3c06208bb2d0cef19831f16a613e019c', '2021-06-07 10:54:45', 'admin'),
(1302, 'Shailesh', 'Vasawa', 'm', '1992-05-02', 'B.Com', '3', 'c88ba80f15fe5bc17c755c57a361a00b', '2021-06-07 10:56:14', 'admin'),
(1303, 'Sumit', 'Patel', 'm', '1994-02-03', 'B.Com', '2', '7394f381fd03eccf5dacd3a514794e31', '2021-06-07 10:58:05', 'admin'),
(1304, 'Parth', 'Patel', 'm', '1992-08-07', 'B.Com', '2', 'bf7df67b4810e8d17bc6653f223f4c18', '2021-06-07 10:59:34', 'admin'),
(1305, 'Priya', 'Mehta', 'f', '1992-03-23', 'B.Com', '2', 'a1869d3f1940500b70d90397a4c1e6b9', '2021-06-07 11:02:00', 'admin'),
(1401, 'Krishna', 'Bhatt', 'm', '1991-06-04', 'B.E', '4', '4aa2e1fc1c87fce466d0ad1e6c7e82ce', '2021-06-11 10:54:31', 'atanupal'),
(1402, 'Niraj', 'Suthar', 'm', '1993-12-26', 'B.E', '3', '20a9e51e14cb0cd2e6a038f5db81d777', '2021-06-11 10:55:28', 'atanupal'),
(1403, 'Bhumi', 'Patel', 'f', '1996-06-04', 'B.E', '1', '479a408b153cd8b548e89c27a4f27072', '2021-06-11 10:56:34', 'atanupal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
