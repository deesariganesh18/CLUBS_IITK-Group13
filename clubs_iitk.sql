-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 21, 2022 at 05:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clubs_iitk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'udaykiran', 'uday', 'uday'),
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'admin', 'admin1', 'c84258e9c39059a89ab77d846ddab909');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clubs`
--

CREATE TABLE `tbl_clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_clubs`
--

INSERT INTO `tbl_clubs` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'P-CLUB', 'Club_950.jpg', 'Yes', 'Yes'),
(19, 'Dance Club', 'Club_791.png', 'Yes', 'Yes'),
(21, 'Aeromodelling Club', 'Club_319.jpg', 'Yes', 'Yes'),
(22, 'Book Club', 'Club_285.jpg', 'Yes', 'Yes'),
(23, 'Design and Animation', 'Club_511.png', 'Yes', 'Yes'),
(24, 'Astronomy Club', 'Club_922.jpg', 'Yes', 'Yes'),
(26, 'Dramatics', 'Club_340.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `club_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `description`, `image_name`, `club_id`, `featured`, `active`) VALUES
(34, 'Tangled', 'The competition is primarily to do with putting your imagination to play, but with books and better, writing. May we call it - fanfiction with a twist?\r\n', 'Event-Name-9020.jpg', 22, 'Yes', 'Yes'),
(35, 'Aero Takneek', 'It is an annual inter hall competition where problem statement is given for different events in the club. Participants come up with different solutions and the best one would win the event.\r\n', 'Event-Name-1310.jpg', 21, 'Yes', 'Yes'),
(36, 'Aeroweek', 'It will give you an opportunity to explore the humongous field of Aeromodelling. Participants will be making different types of RC aircraft including Acrobats, gliders, pushers etc.', 'Event-Name-459.jpg', 21, 'Yes', 'Yes'),
(37, 'Dramatics At Antaragni', 'Where we create and perform club’s annual street play, stage play and mime production for the intercollegiate event “ANTARAGNI”.\r\n', 'Event-Name-7736.jpg', 26, 'Yes', 'Yes'),
(38, 'Dramatics Orientation', 'AThrilling and informative street play performed for freshers every year.\r\n', 'Event-Name-5890.jpg', 26, 'Yes', 'Yes'),
(39, 'Dance Extravaganza', 'This is the annual showcase event of the club where about 50 performance are performed in auditorium and any member of the campus is welcomed to learn and perform as many performances as they wish.', 'Event-Name-7854.png', 19, 'Yes', 'Yes'),
(40, 'HipHop Workshop', 'Conducted for 8 days teaching basics of different hip hop styles and introducing them to\r\neveryone\r\n', 'Event-Name-5936.jpg', 19, 'Yes', 'Yes'),
(41, '3-D modelling Workshop', 'A workshop conducted by dna team to make people get an idea of what 3d modelling is and they also teach how to achieve it.\r\n', 'Event-Name-696.jpg', 23, 'Yes', 'Yes'),
(42, 'Esthetique', 'Starting with Installation fest, Edition 1 covered the basics of Photoshop and creating composites and Edition 2 covered the basics of Illustrator to Flat illustrations, leaving the participants with enough confidence to explore on their own.\r\n', 'Event-Name-85.jpg', 23, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regs`
--

CREATE TABLE `tbl_regs` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` varchar(150) NOT NULL,
  `reg_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_regs`
--

INSERT INTO `tbl_regs` (`id`, `event`, `reg_date`, `status`, `name`, `contact`, `email`) VALUES
(14, 'Halloween -19', '2022-03-19 09:34:19', 'Cancelled', 'rrr', '98454879494', 'upendrakuruva87@gmail.com'),
(48, 'Tangled', '2022-03-20 07:06:23', 'Accepted', 'rrr', '2344244343', 'kindinti@iitk.ac.in'),
(49, 'Dramatics Orientation', '2022-03-21 12:02:00', 'Accepted', 'cap1', '98454879494', 'cap@gmail.com'),
(50, 'Dance Extravaganza', '2022-03-21 12:05:27', 'Requested', 'rrr', '1111111112', 'hi@gmail.com'),
(51, 'Dramatics At Antaragni', '2022-03-21 12:06:54', 'Accepted', 'cap', '1111111111', 'cap@gmail.com'),
(52, 'Aero Takneek', '2022-03-21 02:30:42', 'Requested', 'rrr', '1010110101', 'kindinti@iitk.ac.in'),
(53, 'Dance Extravaganza', '2022-03-21 02:46:02', 'Accepted', 'rrr', '1111111111', 'upendrakuruva87@gmail.com'),
(54, 'Tangled', '2022-03-21 03:29:21', 'Requested', 'rrr', '1234554321', 'asin@gmail.com'),
(55, 'HipHop Workshop', '2022-03-21 04:46:50', 'Requested', 'rrr', '1234554321', 'cap@gmail.com'),
(56, 'Dramatics At Antaragni', '2022-03-21 04:47:06', 'Accepted', 'rrr', '1010110101', 'kindinti@iitk.ac.in'),
(57, 'Tangled', '2022-03-21 04:55:27', 'Requested', 'hello', '1234554321', 'cap@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `NAME`, `emailid`, `username`, `password`) VALUES
(3, 'ganesh', 'hi@gmail.com', 'ganesh', '1234'),
(36, 'rrr', 'hi@gmail.com', 'rrr', 'rrr'),
(37, 'thor1', 'hi@gmail.com', 'thor1', 'thor1'),
(38, 'ganesh', 'hi@gmail.com', 'ggg', 'ggg'),
(39, 'cap', 'cap@gmail.com', 'cap1', 'cap1'),
(40, 'hello', 'he@gmail.com', 'hello1', 'hello1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_clubs`
--
ALTER TABLE `tbl_clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `tbl_regs`
--
ALTER TABLE `tbl_regs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_clubs`
--
ALTER TABLE `tbl_clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_regs`
--
ALTER TABLE `tbl_regs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
