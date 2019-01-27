-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2019 at 11:21 PM
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
(5, 'Hope comes to be still', '127.0.0.1', 16, 1548030635),
(6, 'I like this program', '127.0.0.1', 13, 1548341130),
(7, 'I think there should be more on this sometime soon', '127.0.0.1', 14, 1548341368),
(8, 'We would gladly support you guys on this', '127.0.0.1', 24, 1548341409),
(9, 'I want to check something here', '127.0.0.1', 25, 1548364928),
(10, 'Let us see about this side too if hope doth indeed come alive', '127.0.0.1', 13, 1548364953),
(11, 'I will have to check it out again', '127.0.0.1', 13, 1548364977);

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
(15, 'Hope comes alive some place still', 'Cybersecurity Division', 1548025328, '127.0.0.1', 1548500528, ''),
(16, 'Hope comes alive some place still when we persevere', 'Cybersecurity Division', 1548025358, '127.0.0.1', 1548500558, ''),
(17, 'Hello everyone', 'Human Resource Division', 1548330930, '127.0.0.1', 1548806130, ''),
(18, 'Help me then', 'Cybersecurity Division', 1548331107, '127.0.0.1', 1548806307, ''),
(19, 'Seems we had a problem with the folder', 'Engineering Division', 1548331305, '127.0.0.1', 1548806505, ''),
(20, 'Resolved now', 'Human Resource Division', 1548331337, '127.0.0.1', 1548806537, ''),
(21, 'Something scary', 'Engineering Division', 1548331460, '127.0.0.1', 1548806660, ''),
(22, 'I will check once more', 'Cybersecurity Division', 1548331675, '127.0.0.1', 1548806875, ''),
(23, 'Hello everyone', 'Select Division (optional)', 1548332170, '127.0.0.1', 1548807370, ''),
(26, 'Hope', 'Select Division (optional)', 1548372361, '127.0.0.1', 1548847561, '1548372361_dakd.jpg'),
(27, 'lojkll', 'Select Division (optional)', 1548373279, '127.0.0.1', 1548848479, '1548373279_'),
(28, 'Hola', 'Select Division (optional)', 1548373379, '127.0.0.1', 1548848579, '1548373379_'),
(29, 'Let us look at something', 'Select Division (optional)', 1548373426, '127.0.0.1', 1548848626, ''),
(30, 'Trials are pretty tumultous', 'Select Division (optional)', 1548373801, '127.0.0.1', 1548849001, ''),
(31, 'lET US SEE NOW', 'Select Division (optional)', 1548373934, '127.0.0.1', 1548849134, ''),
(32, 'fINALY WORK OUT', 'Select Division (optional)', 1548373948, '127.0.0.1', 1548849148, ''),
(33, 'fINAL DRAFT AND DEEALLING', 'Select Division (optional)', 1548373978, '127.0.0.1', 1548849178, ''),
(34, 'lOTA', 'Select Division (optional)', 1548374030, '127.0.0.1', 1548849230, ''),
(35, 'tRY LAST TIME ADN I AM OFF TO BED', 'Select Division (optional)', 1548374441, '127.0.0.1', 1548849641, ''),
(36, 'tRY WITH THE IMAGE', 'Select Division (optional)', 1548374458, '127.0.0.1', 1548849658, ''),
(37, 'lET US SEE', 'Select Division (optional)', 1548374487, '127.0.0.1', 1548849687, ''),
(38, 'LAST ATTEMPT', 'Select Division (optional)', 1548374537, '127.0.0.1', 1548849737, ''),
(39, 'LALST', 'Select Division (optional)', 1548374549, '127.0.0.1', 1548849749, ''),
(40, 'Lota', 'Select Division (optional)', 1548374614, '127.0.0.1', 1548849814, ''),
(41, 'Trials and errors are supper annoying', 'Select Division (optional)', 1548374646, '127.0.0.1', 1548849846, ''),
(42, 'hope some more', 'Select Division (optional)', 1548374709, '127.0.0.1', 1548849909, '1548374709_'),
(43, 'Last firm', 'Select Division (optional)', 1548374794, '127.0.0.1', 1548849994, ''),
(44, 'rDJALJDK', 'Select Division (optional)', 1548374826, '127.0.0.1', 1548850026, '1548374826_'),
(45, 'HOPE', 'Select Division (optional)', 1548374870, '127.0.0.1', 1548850070, '1548374870_'),
(46, 'one', 'Select Division (optional)', 1548374894, '127.0.0.1', 1548850094, '1548374894_'),
(47, 'One', 'Select Division (optional)', 1548374917, '127.0.0.1', 1548850117, ''),
(48, 'hope', 'Select Division (optional)', 1548374928, '127.0.0.1', 1548850128, ''),
(49, 'akjdljfk', 'Select Division (optional)', 1548374948, '127.0.0.1', 1548850148, ''),
(50, 'ajfkajdl', 'Select Division (optional)', 1548374960, '127.0.0.1', 1548850160, ''),
(51, 'jljkajlfj', 'Select Division (optional)', 1548375775, '127.0.0.1', 1548850975, '1548375775_dakd.jpg'),
(55, 'Hope comes to be yet still', 'Select Division (optional)', 1548631007, '127.0.0.1', 1549106207, ''),
(56, 'Hope with a file', 'Select Division (optional)', 1548631019, '127.0.0.1', 1549106219, '1548631019_dakd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `del_complaints`
--

CREATE TABLE `del_complaints` (
  `del_c_id` int(32) NOT NULL,
  `c_id` int(32) NOT NULL,
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

INSERT INTO `del_complaints` (`del_c_id`, `c_id`, `c_value`, `c_division`, `c_date_created`, `c_ip_address`, `c_date_stop_display`, `c_image_name1`) VALUES
(7, 13, ' Hope comes alive some place still when we persevere yet some more ', ' Cybersecurity Division ', 1548025396, '127.0.0.1', 1548500596, ' 1548025396_dakd.jpg '),
(8, 14, ' Finally we are on to something ', ' Engineering Division ', 1548340513, '127.0.0.1', 1548815713, ' 1548340513_42510328_1937291789905358_5376408871080296448_n.jpg '),
(9, 24, ' Hope comes alive ', ' Cybersecurity Division ', 1548025150, '127.0.0.1', 1548500350, '  '),
(10, 25, ' Something ought to give now ', ' Select Division (optional) ', 1548332233, '172.17.3.5', 1548807433, '  '),
(15, 54, ' with ', ' Select Division (optional) ', 1548376699, '', 1548851899, ' 1548376699_dakd.jpg '),
(16, 53, ' without ', ' Select Division (optional) ', 1548376686, '', 1548851886, '  '),
(17, 52, ' Without file ', ' Select Division (optional) ', 1548375785, ' 127.0.0.1 ', 1548850985, '  ');

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
  MODIFY `cm_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `del_complaints`
--
ALTER TABLE `del_complaints`
  MODIFY `del_c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
