

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SchoolData`
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
('btech16');

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
  `grade` int(11) NOT NULL DEFAULT '0'
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

--
-- Dumping data for table `cnroll`
--

INSERT INTO `cnroll` (`cid`, `cname`, `tid`, `tname`, `batch`) VALUES
(4, 'AI', 1, 0, 'btech16'),
(6, 'Artificial Intelligence', 1, 0, 'btech16'),
(7, 'Discreet Math', 1, 0, 'btech16'),
(8, 'Algorithms and Data Structures', 1, 0, 'btech16'),
(9, 'abcdef', 1, 0, 'btech16'),
(10, 'Algorithms', 1, 0, 'btech16'),
(11, 'Cryptography', 1, 0, 'btech16');

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

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cname`, `tid`, `tname`, `nclass`) VALUES
(4, 'AI', 1, 'Gilbert	Hanson', '0000-00-00'),
(6, 'Artificial Intelligence', 1, 'Gilbert	Hanson', '2016-10-20'),
(7, 'Discreet Math', 1, 'Gilbert	Hanson', '2016-10-20'),
(9, 'abcdef', 1, 'Gilbert	Hanson', '2017-10-10'),
(10, 'Algorithms', 1, 'Gilbert	Hanson', '2017-01-05'),
(11, 'Cryptography', 1, 'Gilbert	Hanson', '2017-11-10');

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

--
-- Dumping data for table `cwork`
--

INSERT INTO `cwork` (`id`, `cid`, `tid`, `title`, `descr`, `url`) VALUES
(1, 10, 1, 'Intro3', NULL, 'http://youtube.com/');

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

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `date`, `type`, `descr`, `cid`, `tid`) VALUES
(2, '2016-10-02', 2, NULL, NULL, 1),
(3, '2016-10-02', 2, NULL, NULL, 1),
(4, '2016-10-02', 2, NULL, NULL, 1),
(5, '2016-10-03', 1, NULL, 1, 1),
(6, '2016-10-08', 1, NULL, 6, 1),
(7, '2016-10-03', 1, NULL, 1, 1),
(12, '2016-10-08', 3, NULL, 4, 1),
(13, '2016-07-07', 2, NULL, NULL, 1),
(14, '2016-11-03', 1, NULL, 1, 1),
(15, '2016-07-07', 2, NULL, NULL, 1),
(16, '2017-11-01', 2, NULL, NULL, 1),
(17, '2017-11-01', 2, NULL, NULL, 1),
(18, '2016-10-10', 4, NULL, NULL, 1),
(19, '2017-01-10', 4, NULL, NULL, 1);

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

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`tid`, `id`, `tname`, `title`, `exp_date`, `batch`) VALUES
(1, 2, 'Gilbert	Hanson', '2016-07-07 has been declared a holiday!', '2016-07-07', 'all'),
(1, 4, 'Gilbert	Hanson', '2017-11-01 has been declared a holiday!', '2017-11-01', 'all'),
(1, 5, 'Gilbert Hanson', 'You have been added to a new course  by instructor Gilbert Hanson', '0000-00-00', ''),
(1, 6, 'Gilbert Hanson', 'You have been added to a new course Algorithms and Data Structures by instructor Gilbert Hanson', '0000-00-00', 'btech16'),
(1, 7, 'Gilbert Hanson', 'You have been added to a new course  by instructor Gilbert Hanson', '0000-00-00', ''),
(1, 8, 'Gilbert Hanson', 'You have been added to a new course abcdef by instructor Gilbert Hanson', '0000-00-00', 'btech16'),
(1, 9, 'Gilbert Hanson', 'You have been added to a new course  by instructor Gilbert Hanson', '2016-10-03', ''),
(1, 10, 'Gilbert Hanson', 'You have been added to a new course Algorithms by instructor Gilbert Hanson', '2016-10-03', 'btech16'),
(1, 11, 'Gilbert Hanson', 'You have been added to a new course Cryptography by instructor Gilbert Hanson', '2016-10-03', 'btech16'),
(1, 12, 'Gilbert Hanson', 'There is parent teacher meet with Prof. Gilbert Hanson on 2016-10-10 ', '2016-10-10', 'all'),
(1, 13, 'Gilbert	Hanson', '<span class=imp>There is parent teacher meet with Prof. Gilbert	Hanson on 2017-01-10 </span>', '2017-01-10', 'all'),
(1, 14, 'Gilbert	Hanson', '<span id=http://google.com class=impp>Professor Gilbert	Hansonupdated the coursework on AI </span>', '0000-00-00', ''),
(1, 15, 'Gilbert	Hanson', '<a href=http://google.com >Professor Gilbert	Hansonupdated the coursework on AI </a>', '2016-10-06', 'btech16'),
(1, 16, 'Gilbert	Hanson', '<a href=http://youtube.com >Professor Gilbert	Hanson added DM intro to the coursework on Discreet Math </a>', '2016-10-06', 'btech16'),
(1, 17, 'Gilbert	Hanson', '<a href=http://youtube.com/ >Professor Gilbert	Hanson added Intro3 to the coursework on Algorithms </a>', '2016-10-06', 'btech16');

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

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `pname`, `sid`, `sname`, `email`, `pwd`) VALUES
(1, 'Parent1', 1, 'Tameesh Biswas', 'parent1@parent.com', 'pswd'),
(2, 'parent2', 2, 'Shaurya Gupta', 'agadga@sbafg.aha', 'pswd'),
(11, 'tamtam', 3, 'Saraansh Chopra', 'aegadgad@dbadag.adg', 'pswd');

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `id` int(11) NOT NULL,
  `sname` varchar(2000) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `email` varchar(200) DEFAULT NULL,
  `pwd` varchar(2000) NOT NULL,
  `batch` varchar(20) NOT NULL DEFAULT 'btech16'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`id`, `sname`, `points`, `email`, `pwd`, `batch`) VALUES
(1, 'Tameesh Biswas', 0, 'tameeshbiswas1998@gmail.com', 'pswd', 'btech16'),
(2, 'Shaurya Gupta', 0, 'sha@student.org', 'pswd', 'btech16'),
(3, 'Saraansh Chopra', 0, 'saraansh@student.org', 'pswd', 'btech16');

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
(1, 'Gilbert	Hanson', 'teacher@t.com', 'pswd'),
(2, 'teacher2', 'teacher2', 'pswd'),
(3, 'Teacher2 prof', 'Imateacheryo@teacher.yo', 'pswd'),
(4, 'Kalpana Chawla', 'me@me.com', 'pswd'),
(5, 'ABC defghijk', 'Hahahajaj@jsks.com', 'pswd');

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

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`testid`, `name`, `cid`, `date`, `tid`, `maxmarks`, `batch`) VALUES
(1, 'Midsems', 4, '2016-10-08', 1, 100, 'btech16');

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
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cwork`
--
ALTER TABLE `cwork`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachr`
--
ALTER TABLE `teachr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
