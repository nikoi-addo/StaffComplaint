-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2019 at 12:04 AM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.1

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
(11, 'I will have to check it out again', '127.0.0.1', 13, 1548364977),
(12, 'ok sure', '::1', 57, 1548674149),
(13, 'okay I get it now', '::1', 69, 1550574688),
(14, 'Anon from Admin division we\'ll get back to you shortly', '::1', 69, 1550574699),
(15, 'hello', '::1', 68, 1550574815),
(16, 'yes sir', '::1', 68, 1550574844),
(17, 'nice gun....Who\'s is it?', '::1', 70, 1550575716),
(18, 'don\'t be stupid', '::1', 78, 1550591801),
(19, 'and so what?', '192.168.43.137', 79, 1550592008),
(20, 'Comments are coming', '127.0.0.1', 86, 1550878972);

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
  `c_date_stop_display` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `c_value`, `c_division`, `c_date_created`, `c_ip_address`, `c_date_stop_display`) VALUES
(1, 'The form which I submitted is not seen properly, could you help me out.', 'Administration Division', 1547719533, 'We are going forward', 1548194733),
(2, 'The form is loading but it takes a very long time.', 'Cybersecurity Division', 1547722495, 'We are going forward', 1548197695),
(3, 'How to load the internet.', 'Engineering Division', 1547722692, 'We are going forward', 1548197892),
(4, 'How is it possible to be connected in a simple method.', 'Legal Division', 1547722835, 'We are going forward', 1548198035),
(5, 'My account is not working poperly', 'Finance Division', 1547722882, 'We are going forward', 1548198082),
(6, 'I need to Delete my Account.', '', 1547723245, '127.0.0.1', 1548198445),
(7, 'I am having problems with my image', 'Finance Division', 1547723266, '127.0.0.1', 1548198466),
(8, 'The image is intensely round.', 'Regulatory Administration Division', 1547723383, '127.0.0.1', 1548198583),
(9, 'We will see about the rest', '', 1547737190, '127.0.0.1', 1548212390),
(10, 'How be it', '', 1547854324, '127.0.0.1', 1548329524),
(11, 'Show forth something interesting', '', 1547855046, '127.0.0.1', 1548330246),
(12, 'Haha, he asks of what to do with me and for me', '', 1547855090, '127.0.0.1', 1548330290),
(15, 'Hope comes alive some place still', 'Cybersecurity Division', 1548025328, '127.0.0.1', 1548500528),
(16, 'Hope comes alive some place still when we persevere', 'Cybersecurity Division', 1548025358, '127.0.0.1', 1548500558),
(17, 'Hello everyone', 'Human Resource Division', 1548330930, '127.0.0.1', 1548806130),
(18, 'Help me then', 'Cybersecurity Division', 1548331107, '127.0.0.1', 1548806307),
(19, 'Seems we had a problem with the folder', 'Engineering Division', 1548331305, '127.0.0.1', 1548806505),
(20, 'Resolved now', 'Human Resource Division', 1548331337, '127.0.0.1', 1548806537),
(21, 'Something scary', 'Engineering Division', 1548331460, '127.0.0.1', 1548806660),
(22, 'I will check once more', 'Cybersecurity Division', 1548331675, '127.0.0.1', 1548806875),
(23, 'Hello everyone', 'Select Division (optional)', 1548332170, '127.0.0.1', 1548807370),
(26, 'Hope', 'Select Division (optional)', 1548372361, '127.0.0.1', 1548847561),
(27, 'lojkll', 'Select Division (optional)', 1548373279, '127.0.0.1', 1548848479),
(28, 'Hola', 'Select Division (optional)', 1548373379, '127.0.0.1', 1548848579),
(29, 'Let us look at something', 'Select Division (optional)', 1548373426, '127.0.0.1', 1548848626),
(30, 'Trials are pretty tumultous', 'Select Division (optional)', 1548373801, '127.0.0.1', 1548849001),
(31, 'lET US SEE NOW', 'Select Division (optional)', 1548373934, '127.0.0.1', 1548849134),
(32, 'fINALY WORK OUT', 'Select Division (optional)', 1548373948, '127.0.0.1', 1548849148),
(33, 'fINAL DRAFT AND DEEALLING', 'Select Division (optional)', 1548373978, '127.0.0.1', 1548849178),
(34, 'lOTA', 'Select Division (optional)', 1548374030, '127.0.0.1', 1548849230),
(35, 'tRY LAST TIME ADN I AM OFF TO BED', 'Select Division (optional)', 1548374441, '127.0.0.1', 1548849641),
(36, 'tRY WITH THE IMAGE', 'Select Division (optional)', 1548374458, '127.0.0.1', 1548849658),
(37, 'lET US SEE', 'Select Division (optional)', 1548374487, '127.0.0.1', 1548849687),
(38, 'LAST ATTEMPT', 'Select Division (optional)', 1548374537, '127.0.0.1', 1548849737),
(39, 'LALST', 'Select Division (optional)', 1548374549, '127.0.0.1', 1548849749),
(40, 'Lota', 'Select Division (optional)', 1548374614, '127.0.0.1', 1548849814),
(41, 'Trials and errors are supper annoying', 'Select Division (optional)', 1548374646, '127.0.0.1', 1548849846),
(42, 'hope some more', 'Select Division (optional)', 1548374709, '127.0.0.1', 1548849909),
(43, 'Last firm', 'Select Division (optional)', 1548374794, '127.0.0.1', 1548849994),
(44, 'rDJALJDK', 'Select Division (optional)', 1548374826, '127.0.0.1', 1548850026),
(45, 'HOPE', 'Select Division (optional)', 1548374870, '127.0.0.1', 1548850070),
(46, 'one', 'Select Division (optional)', 1548374894, '127.0.0.1', 1548850094),
(47, 'One', 'Select Division (optional)', 1548374917, '127.0.0.1', 1548850117),
(48, 'hope', 'Select Division (optional)', 1548374928, '127.0.0.1', 1548850128),
(49, 'akjdljfk', 'Select Division (optional)', 1548374948, '127.0.0.1', 1548850148),
(50, 'ajfkajdl', 'Select Division (optional)', 1548374960, '127.0.0.1', 1548850160),
(51, 'jljkajlfj', 'Select Division (optional)', 1548375775, '127.0.0.1', 1548850975),
(55, 'Hope comes to be yet still', 'Select Division (optional)', 1548631007, '127.0.0.1', 1549106207),
(56, 'Hope with a file', 'Select Division (optional)', 1548631019, '127.0.0.1', 1549106219),
(57, 'dfsjhfdjhoriejgitjhge', 'Select Division (optional)', 1548674006, '::1', 1549149206),
(60, 'Let me see', 'Consumer and Corporate Affairs Division', 1550099448, '127.0.0.1', 1550574648),
(61, 'Let me see again', 'Consumer and Corporate Affairs Division', 1550099555, '127.0.0.1', 1550574755),
(62, 'Let me see again', 'Consumer and Corporate Affairs Division', 1550099699, '127.0.0.1', 1550574899),
(63, '&quot;any ideas', 'Select Division (optional)', 1550520739, '127.0.0.1', 1550995939),
(64, '\'something funny very funny', 'Select Division (optional)', 1550522506, '127.0.0.1', 1550997706),
(65, 'Other thing\'s are "getting on my nerves"', 'Select Division (optional)', 1550522527, '127.0.0.1', 1550997727),
(66, 'Let me know someting thou\'g', 'Select Division (optional)', 1550536392, '127.0.0.1', 1551011592),
(67, 'Let me know someting thou\'g', 'Select Division (optional)', 1550536523, '127.0.0.1', 1551011723),
(68, 'Another one maybe', 'Consumer and Corporate Affairs Division', 1550537389, '127.0.0.1', 1551012589),
(69, 'I think I got it now', 'Select Division (optional)', 1550537668, '127.0.0.1', 1551012868),
(70, 'sile', 'Select Division (optional)', 1550575428, '::1', 1551050628),
(71, 'sile', 'Select Division (optional)', 1550575486, '::1', 1551050686),
(72, 'slow one', 'Engineering Division', 1550575999, '::1', 1551051199),
(73, 'Helper', 'Research and Business Development', 1550576080, '::1', 1551051280),
(76, 'I\'m in love with Jesus ', 'Engineering Division', 1550581432, '192.168.43.137', 1551056632),
(82, 'Love', 'Select Division (optional)', 1550604137, '192.168.43.137', 1551079337),
(86, 'I want freedom', 'Administration Division', 1550878938, '127.0.0.1', 1551354138);

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
  `c_date_stop_display` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `del_complaints`
--

INSERT INTO `del_complaints` (`del_c_id`, `c_id`, `c_value`, `c_division`, `c_date_created`, `c_ip_address`, `c_date_stop_display`) VALUES
(7, 13, ' Hope comes alive some place still when we persevere yet some more ', ' Cybersecurity Division ', 1548025396, '127.0.0.1', 1548500596),
(8, 14, ' Finally we are on to something ', ' Engineering Division ', 1548340513, '127.0.0.1', 1548815713),
(9, 24, ' Hope comes alive ', ' Cybersecurity Division ', 1548025150, '127.0.0.1', 1548500350),
(10, 25, ' Something ought to give now ', ' Select Division (optional) ', 1548332233, '172.17.3.5', 1548807433),
(15, 54, ' with ', ' Select Division (optional) ', 1548376699, '', 1548851899),
(16, 53, ' without ', ' Select Division (optional) ', 1548376686, '', 1548851886),
(17, 52, ' Without file ', ' Select Division (optional) ', 1548375785, ' 127.0.0.1 ', 1548850985),
(18, 58, ' I love you ', ' Select Division (optional) ', 1549378477, ' ::1 ', 1549853677),
(19, 58, ' fdhnghbrtgdsrtghb ', ' Select Division (optional) ', 1550053013, ' ::1 ', 1550528213),
(20, 74, ' helpers ', ' Select Division (optional) ', 1550576149, ' ::1 ', 1551051349),
(21, 75, ' Laughter is healthy  ', ' Information Technology (IT) Division ', 1550577038, ' 192.168.43.137 ', 1551052238),
(22, 81, ' Index me ', ' Policy, Strategy and Innovation Division ', 1550599720, ' ::1 ', 1551074920),
(23, 78, ' Three ', ' Finance Division ', 1550591483, ' 192.168.43.137 ', 1551066683),
(24, 80, '', ' Regulatory Administration Division ', 1550594793, ' 192.168.43.137 ', 1551069993),
(25, 79, '', ' Select Division (optional) ', 1550591968, ' 192.168.43.137 ', 1551067168),
(26, 85, '', ' Select Division (optional) ', 1550604219, ' 192.168.43.137 ', 1551079419),
(27, 84, '', ' Select Division (optional) ', 1550604175, ' ::1 ', 1551079375),
(28, 83, '', ' Select Division (optional) ', 1550604164, ' 192.168.43.137 ', 1551079364),
(29, 77, '', ' Cybersecurity Division ', 1550581588, ' 192.168.43.137 ', 1551056788);

-- --------------------------------------------------------

--
-- Table structure for table `imagine`
--

CREATE TABLE `imagine` (
  `im_id` int(255) NOT NULL,
  `im_name` varchar(128) NOT NULL,
  `ref_id` int(255) NOT NULL,
  `ref_name` varchar(16) NOT NULL,
  `ref_status` varchar(16) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagine`
--

INSERT INTO `imagine` (`im_id`, `im_name`, `ref_id`, `ref_name`, `ref_status`) VALUES
(20, '1550537668_cm_maestro.png', 69, 'complaint', 'active'),
(21, '1550537668_cm_maestro2.png', 69, 'complaint', 'active'),
(22, '1550575428_cm_DlyKySNW4AA36KO.jpg', 70, 'complaint', 'active'),
(23, '1550575486_cm_DeiWhjZW0AAWpn6.jpg', 71, 'complaint', 'active'),
(24, '1550575486_cm_DeTZYhpWkAE6K70.jpg', 71, 'complaint', 'active'),
(25, '1550575999_cm_barcelona-16-17-home-kit-7.jpg', 72, 'complaint', 'active'),
(26, '1550575999_cm_Black-ish - S04E04 - Advance to Go (Collect $200) SDTV.mkv_000327200.jpg', 72, 'complaint', 'active'),
(27, '1550577038_cm_IMG_20190217_204329.jpg', 75, 'complaint', 'active'),
(28, '1550577038_cm_IMG_20190217_202328.jpg', 75, 'complaint', 'active'),
(29, '1550581588_cm_IMG_20190211_233122.jpg', 77, 'complaint', 'deleted'),
(30, '1550591483_cm_IMG_20190218_235302.jpg', 78, 'complaint', 'active'),
(31, '1550591483_cm_IMG_20190218_235018.jpg', 78, 'complaint', 'active'),
(32, '1550591483_cm_IMG_20190218_235013.jpg', 78, 'complaint', 'active'),
(33, '1550591968_cm_IMG-20190219-WA0036.jpg', 79, 'complaint', 'active'),
(34, '1550598796_hr_190cdcx43uqgmjpg.jpg', 50, 'hrmessage', 'active'),
(35, '1550598796_hr_500_F_95992405_I3gKQKglkE2TOF5C5b8UhxVYB7wRYflg.jpg', 50, 'hrmessage', 'active'),
(36, '1550598796_hr_1559_D500_front.png', 50, 'hrmessage', 'active'),
(37, '1550599119_hr_IMG-20160218-WA0004.jpg', 51, 'hrmessage', 'active'),
(38, '1550599720_cm_IMG-20160218-WA0004.jpg', 81, 'complaint', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `messagehr`
--

CREATE TABLE `messagehr` (
  `m_id` int(32) NOT NULL,
  `m_message` varchar(2048) NOT NULL,
  `m_subject` varchar(50) NOT NULL,
  `m_ip_address` varchar(50) NOT NULL,
  `m_division` varchar(64) NOT NULL,
  `m_date_created` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messagehr`
--

INSERT INTO `messagehr` (`m_id`, `m_message`, `m_subject`, `m_ip_address`, `m_division`, `m_date_created`) VALUES
(11, 'Something gotta give it gets pretty hard to go from here with the many accounts that have been given but we will get by in due course and time I believe so and it will be all that I have to see from the time we start even to the time it ain\'t good to stay', 'Lets see', '127.0.0.1', 'All Divisions (optional)', 1550077269),
(12, 'I will tell you in a bit', 'Another one', '127.0.0.1', 'Administration Division', 1550078567),
(13, 'I will tell you soon', 'something for the other guys', '127.0.0.1', 'Legal Division', 1550078787),
(15, 'We are going on', 'Something to go on with', '127.0.0.1', 'All Divisions (optional)', 1550099239),
(16, 'This will do', 'I want to believe', '127.0.0.1', 'All Divisions', 1550099962),
(17, 'I t is pretty much important', 'Let\'s check this', '127.0.0.1', 'All Divisions', 1550523074),
(18, 'Something great', 'HOpe', '127.0.0.1', 'All Divisions', 1550529709),
(19, 'Somewhat', 'HOpe', '127.0.0.1', 'All Divisions', 1550530351),
(20, 'Somewhat', 'Loads', '127.0.0.1', 'All Divisions', 1550530444),
(21, 'Checker', 'Load', '127.0.0.1', 'All Divisions', 1550530553),
(22, 'Folded', 'Loadeer', '127.0.0.1', 'All Divisions', 1550530574),
(23, 'I don\'t know', 'Load on something else', '127.0.0.1', 'All Divisions', 1550530680),
(24, 'I don\'t know saf', 'Loaderd', '127.0.0.1', 'All Divisions', 1550530778),
(25, 'Something onmin', 'Loaded', '127.0.0.1', 'All Divisions', 1550530795),
(26, 'daldjlkajf', 'Loata', '127.0.0.1', 'All Divisions', 1550531281),
(27, 'Load', 'Something to give', '127.0.0.1', 'All Divisions', 1550531440),
(28, 'Someting to behold', 'Loads are here', '127.0.0.1', 'All Divisions', 1550531560),
(29, 'sdamfdn', 'Lead', '127.0.0.1', 'All Divisions', 1550531664),
(30, 'ajkdjakljlk', 'kJLJSLKJDLKj', '127.0.0.1', 'All Divisions', 1550531706),
(31, 'djaljdlkjf', 'dajkdlj', '127.0.0.1', 'All Divisions', 1550531983),
(32, 'ajldjalkjdklj', 'Hoph', '127.0.0.1', 'All Divisions', 1550532065),
(33, 'ajldjlkfjk', 'dakjdljlq', '127.0.0.1', 'All Divisions', 1550532352),
(34, 'ajdkjalkjf', 'adjakjdlk', '127.0.0.1', 'All Divisions', 1550532623),
(35, 'lllllll', 'Llllll', '127.0.0.1', 'All Divisions', 1550532679),
(36, 'ajldjakljdkljlkfjalkjdfklajlkfjakljfdlajkdjf', 'ajkdjlajfdlkj;;;;;;;;;;;;;;;;;;;', '127.0.0.1', 'All Divisions', 1550532805),
(37, 'DAKLJFLDKJFKL', 'AJDLAJFKL', '127.0.0.1', 'All Divisions', 1550532983),
(38, 'Loaded', 'Something I hope works', '127.0.0.1', 'All Divisions', 1550534021),
(39, 'Look at it', 'It works perfectly', '127.0.0.1', 'All Divisions', 1550534138),
(40, 'Open now', 'Lots', '127.0.0.1', 'All Divisions', 1550534231),
(41, 'Open now and let us see', 'Lots', '127.0.0.1', 'All Divisions', 1550534263),
(42, 'Open now and let us see', 'Lots', '127.0.0.1', 'All Divisions', 1550534330),
(43, 'Open now and let us see', 'Lots', '127.0.0.1', 'All Divisions', 1550534382),
(44, 'jldajlkdjlakfjldkajfklajfkl', 'alkjdkljalk', '127.0.0.1', 'All Divisions', 1550534453),
(45, 'jldajlkdjlakfjldkajfklajfkl', 'alkjdkljalk', '127.0.0.1', 'All Divisions', 1550534553),
(46, 'jldajlkdjlakfjldkajfklajfkl', 'alkjdkljalk', '127.0.0.1', 'All Divisions', 1550534641),
(47, 'jldajlkdjlakfjldkajfklajfkl', 'alkjdkljalk', '127.0.0.1', 'All Divisions', 1550534780),
(48, 'jldajlkdjlakfjldkajfklajfkl', 'alkjdkljalk', '127.0.0.1', 'All Divisions', 1550535215),
(49, 'jldajlkdjlakfjldkajfklajfkl', 'alkjdkljalk', '127.0.0.1', 'All Divisions', 1550535290),
(50, 'Love is good', 'Love', '::1', 'All Divisions', 1550598796),
(51, 'Live is good', 'Love 2', '::1', 'All Divisions', 1550599119),
(52, 'Someone call 911', 'Loads', '127.0.0.1', 'All Divisions', 1550878983);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `poll_date` double NOT NULL,
  `options` varchar(250) NOT NULL,
  `votes` varchar(250) DEFAULT '0',
  `number_options` tinyint(3) NOT NULL,
  `poll_timeout` double DEFAULT NULL,
  `voters` int(11) DEFAULT '0',
  `last_vote_date` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `question`, `poll_date`, `options`, `votes`, `number_options`, `poll_timeout`, `voters`, `last_vote_date`) VALUES
(56, 'Who are you', 1550879748, 'I am me|I am myself', '0|0', 2, NULL, NULL, NULL),
(57, 'What\'s your color', 1550879978, 'I want to|Kno\'|Find\'|Load\'s', '0|0|0|0', 4, NULL, NULL, NULL);

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
-- Indexes for table `imagine`
--
ALTER TABLE `imagine`
  ADD PRIMARY KEY (`im_id`);

--
-- Indexes for table `messagehr`
--
ALTER TABLE `messagehr`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cm_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `del_complaints`
--
ALTER TABLE `del_complaints`
  MODIFY `del_c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `imagine`
--
ALTER TABLE `imagine`
  MODIFY `im_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `messagehr`
--
ALTER TABLE `messagehr`
  MODIFY `m_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
