-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 07:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldata`
--

-- --------------------------------------------------------

--
-- Table structure for table `abatches`
--

CREATE TABLE `abatches` (
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abatches`
--

INSERT INTO `abatches` (`name`) VALUES
('btech16'),
('btech17'),
('btech18');

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `cid` int(11) NOT NULL,
  `date` date NOT NULL,
  `sid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cenroll`
--

CREATE TABLE `cenroll` (
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `grade` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classid` int(11) NOT NULL,
  `cno` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `tname` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cnroll`
--

CREATE TABLE `cnroll` (
  `cid` int(11) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `tid` int(11) NOT NULL,
  `tname` int(200) NOT NULL,
  `batch` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `cname` varchar(200) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `tname` varchar(2000) DEFAULT NULL,
  `nclass` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cwork`
--

CREATE TABLE `cwork` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `descr` varchar(2000) DEFAULT NULL,
  `url` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  `descr` varchar(2000) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `tid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tname` varchar(200) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `exp_date` date NOT NULL,
  `batch` varchar(200) NOT NULL DEFAULT 'all'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formkeys`
--

CREATE TABLE `formkeys` (
  `teacher_key` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formkeys`
--

INSERT INTO `formkeys` (`teacher_key`) VALUES
('p@ssword');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `hid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `cname` varchar(2000) NOT NULL,
  `tid` int(11) NOT NULL,
  `tname` varchar(2000) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(2000) NOT NULL,
  `descr` varchar(2000) DEFAULT NULL,
  `url` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `pname` varchar(2000) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `sname` varchar(2000) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pwd` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `id` int(11) NOT NULL,
  `sname` varchar(2000) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `email` varchar(200) DEFAULT NULL,
  `pwd` varchar(2000) NOT NULL,
  `batch` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`id`, `sname`, `points`, `email`, `pwd`, `batch`) VALUES
(1, 'Tameesh Biswas', 0, 'tameeshbiswas1998@gmail.com', 'pswd', 'btech16'),
(2, 'Shaurya Gupta', 0, 'sha@student.org', 'pswd', 'btech16'),
(3, 'Saraansh Chopra', 0, 'saraansh@student.org', 'pswd', 'btech16'),
(4, 'Deepanshu Goyal', 0, 'goyaldeepanshu0098@gmail.com', 'pswd', 'btech16'),
(5, 'Deepanshu', 0, 'deepanshu05@gmail.com', 'psswd', 'btech16'),
(6, 'Mukund', 0, 'mukund05@gmail.com', 'pswd', 'btech16'),
(7, 'Deepanshu Goyal', 0, 'goyaldeepanshu0098@gmail.com', 'pswd', 'btech18');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `fld_msg_id` int(10) NOT NULL,
  `fld_name` varchar(50) NOT NULL,
  `fld_email` varchar(50) NOT NULL,
  `fld_phone` bigint(10) DEFAULT NULL,
  `fld_msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`fld_msg_id`, `fld_name`, `fld_email`, `fld_phone`, `fld_msg`) VALUES
(1, 'Parth', 'parth23@gmail.com', 7894561234, 'Hi, I have Doubt regarding the course.');

-- --------------------------------------------------------

--
-- Table structure for table `teachr`
--

CREATE TABLE `teachr` (
  `id` int(11) NOT NULL,
  `tname` varchar(2000) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pwd` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachr`
--

INSERT INTO `teachr` (`id`, `tname`, `email`, `pwd`) VALUES
(1, 'Gilbert	Hanson', 'gilbert01@techademics.com', 'pswd'),
(2, 'Doris Wilson', 'doris01@techademics.com', 'pswd'),
(3, 'Edna Francis', 'edna05@techademics.com', 'pswd'),
(4, 'Irene Bell', 'irenebell@techademics.com', 'pswd'),
(5, 'Ruth Emmons', 'ruthemmons1@techademics.com', 'pswd'),
(6, 'Argus Filch', 'argusfilch@gmail.com', 'pswd');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `testid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cid` int(11) NOT NULL,
  `date` date NOT NULL,
  `tid` int(11) NOT NULL,
  `maxmarks` int(11) NOT NULL,
  `batch` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tscores`
--

CREATE TABLE `tscores` (
  `testid` int(11) NOT NULL,
  `cname` varchar(2000) NOT NULL,
  `cid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `tname` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abatches`
--
ALTER TABLE `abatches`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `cnroll`
--
ALTER TABLE `cnroll`
  ADD UNIQUE KEY `cid` (`cid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cwork`
--
ALTER TABLE `cwork`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`fld_msg_id`);

--
-- Indexes for table `teachr`
--
ALTER TABLE `teachr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`testid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cwork`
--
ALTER TABLE `cwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stud`
--
ALTER TABLE `stud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `fld_msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachr`
--
ALTER TABLE `teachr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
