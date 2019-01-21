-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 12:31 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncastaffcomplaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cm_id` int(32) NOT NULL,
  `cm_value` varchar(1024) NOT NULL,
  `cm_ip_address` varchar(64) NOT NULL,
  `c_id` int(32) NOT NULL,
  `cm_date` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cm_id`, `cm_value`, `cm_ip_address`, `c_id`, `cm_date`) VALUES
(2, 'How are we going about today', '127.0.0.1', 4, 1547730000),
(3, 'How are we going about when we end', '127.0.0.1', 4, 1547730223),
(4, 'How are we going about in the very end when all begins', '127.0.0.1', 4, 1547730328),
(5, 'Hope comes to be still', '127.0.0.1', 16, 1548030635);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `c_id` int(32) NOT NULL,
  `c_value` varchar(2048) NOT NULL,
  `c_division` varchar(64) NOT NULL,
  `c_date_created` int(16) NOT NULL,
  `c_ip_address` varchar(64) NOT NULL,
  `c_date_stop_display` int(16) NOT NULL,
  `c_image_name1` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `c_value`, `c_division`, `c_date_created`, `c_ip_address`, `c_date_stop_display`, `c_image_name1`) VALUES
(1, 'The form which I submitted is not seen properly, could you help me out.', 'Administration Division', 1547719533, 'We are going forward', 1548194733, '1547719533_Database_Structure.jpg'),
(2, 'The form is loading but it takes a very long time.', 'Cybersecurity Division', 1547722495, 'We are going forward', 1548197695, '1547722495_Database_Structure.jpg'),
(3, 'How to load the internet.', 'Engineering Division', 1547722692, 'We are going forward', 1548197892, '1547722692_photo_2018-11-11_18-36-33.jpg'),
(4, 'How is it possible to be connected in a simple method.', 'Legal Division', 1547722835, 'We are going forward', 1548198035, '1547722835_photo_2018-11-11_18-36-33.jpg'),
(5, 'My account is not working poperly', 'Finance Division', 1547722882, 'We are going forward', 1548198082, '1547722882_photo_2018-11-11_18-36-33.jpg'),
(6, 'I need to Delete my Account.', '', 1547723245, '127.0.0.1', 1548198445, '1547723245_photo_2018-11-11_18-36-33.jpg'),
(7, 'I am having problems with my image', 'Finance Division', 1547723266, '127.0.0.1', 1548198466, '1547723266_photo_2018-11-11_18-36-33.jpg'),
(8, 'The image is intensely round.', 'Regulatory Administration Division', 1547723383, '127.0.0.1', 1548198583, '1547723383_Screenshot from 2018-12-14 15-20-02.png'),
(9, 'We will see about the rest', '', 1547737190, '127.0.0.1', 1548212390, '1547737190_IMG-20180303-WA0000.jpg'),
(10, 'How be it', '', 1547854324, '127.0.0.1', 1548329524, ''),
(11, 'Show forth something interesting', '', 1547855046, '127.0.0.1', 1548330246, ''),
(12, 'Haha, he asks of what to do with me and for me', '', 1547855090, '127.0.0.1', 1548330290, '1547855090_photo_2018-11-11_18-36-33.jpg'),
(13, 'Hope comes alive', 'Cybersecurity Division', 1548025150, '127.0.0.1', 1548500350, ''),
(14, 'Hope comes alive some place', 'Cybersecurity Division', 1548025224, '127.0.0.1', 1548500424, ''),
(15, 'Hope comes alive some place still', 'Cybersecurity Division', 1548025328, '127.0.0.1', 1548500528, ''),
(16, 'Hope comes alive some place still when we persevere', 'Cybersecurity Division', 1548025358, '127.0.0.1', 1548500558, '');

-- --------------------------------------------------------

--
-- Table structure for table `del_complaints`
--

CREATE TABLE `del_complaints` (
  `del_c_id` int(32) NOT NULL,
  `c_value` varchar(2048) NOT NULL,
  `c_division` varchar(64) NOT NULL,
  `c_date_created` int(16) NOT NULL,
  `c_ip_address` varchar(64) NOT NULL,
  `c_date_stop_display` int(16) NOT NULL,
  `c_image_name1` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `del_complaints`
--

INSERT INTO `del_complaints` (`del_c_id`, `c_value`, `c_division`, `c_date_created`, `c_ip_address`, `c_date_stop_display`, `c_image_name1`) VALUES
(7, ' Hope comes alive some place still when we persevere yet some more ', ' Cybersecurity Division ', 1548025396, '', 1548500596, ' 1548025396_dakd.jpg ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `del_complaints`
--
ALTER TABLE `del_complaints`
  ADD PRIMARY KEY (`del_c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cm_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `del_complaints`
--
ALTER TABLE `del_complaints`
  MODIFY `del_c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
