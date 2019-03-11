-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2019 at 07:41 PM
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
  `cm_date` int(16) NOT NULL,
  `cm_type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cm_id`, `cm_value`, `cm_ip_address`, `c_id`, `cm_date`, `cm_type`) VALUES
(2, 'How are we going about today', '127.0.0.1', 4, 1547730000, 0),
(3, 'How are we going about when we end', '127.0.0.1', 4, 1547730223, 0),
(4, 'How are we going about in the very end when all begins', '127.0.0.1', 4, 1547730328, 0),
(5, 'Hope comes to be still', '127.0.0.1', 16, 1548030635, 0),
(6, 'I like this program', '127.0.0.1', 13, 1548341130, 0),
(7, 'I think there should be more on this sometime soon', '127.0.0.1', 14, 1548341368, 0),
(8, 'We would gladly support you guys on this', '127.0.0.1', 24, 1548341409, 0),
(9, 'I want to check something here', '127.0.0.1', 25, 1548364928, 0),
(10, 'Let us see about this side too if hope doth indeed come alive', '127.0.0.1', 13, 1548364953, 0),
(11, 'I will have to check it out again', '127.0.0.1', 13, 1548364977, 0),
(12, 'ok sure', '::1', 57, 1548674149, 0),
(13, 'okay I get it now', '::1', 69, 1550574688, 0),
(14, 'Anon from Admin division we\'ll get back to you shortly', '::1', 69, 1550574699, 0),
(15, 'hello', '::1', 68, 1550574815, 0),
(16, 'yes sir', '::1', 68, 1550574844, 0),
(17, 'nice gun....Who\'s is it?', '::1', 70, 1550575716, 0),
(18, 'don\'t be stupid', '::1', 78, 1550591801, 0),
(19, 'and so what?', '192.168.43.137', 79, 1550592008, 0),
(20, 'Comments are coming', '127.0.0.1', 86, 1550878972, 0),
(21, 'I am coming out now', '127.0.0.1', 151, 1552322240, 1),
(22, 'Let\'s check the final option then', '127.0.0.1', 151, 1552322534, 1),
(23, 'I am trying hard', '127.0.0.1', 151, 1552322873, 1),
(24, 'Let us see finally', '127.0.0.1', 91, 1552323178, 0),
(25, 'Really laidat you are', '127.0.0.1', 91, 1552323186, 0),
(26, 'Is you still working goodly?', '127.0.0.1', 151, 1552323197, 1),
(27, 'I want to acknowledge you for this post', '127.0.0.1', 152, 1552323719, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `c_id` int(32) NOT NULL,
  `c_value` varchar(2048) NOT NULL,
  `c_division` varchar(64) NOT NULL,
  `date_created` double NOT NULL,
  `c_ip_address` varchar(64) NOT NULL,
  `date_stop_display` double NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `table_type` varchar(16) NOT NULL DEFAULT 'complaint'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`c_id`, `c_value`, `c_division`, `date_created`, `c_ip_address`, `date_stop_display`, `u_fname`, `u_id`, `table_type`) VALUES
(1, 'The form which I submitted is not seen properly, could you help me out.', 'Administration Division', 1547719533, 'We are going forward', 1548194733, '', 0, 'complaint'),
(2, 'The form is loading but it takes a very long time.', 'Cybersecurity Division', 1547722495, 'We are going forward', 1548197695, '', 0, 'complaint'),
(3, 'How to load the internet.', 'Engineering Division', 1547722692, 'We are going forward', 1548197892, '', 0, 'complaint'),
(4, 'How is it possible to be connected in a simple method.', 'Legal Division', 1547722835, 'We are going forward', 1548198035, '', 0, 'complaint'),
(5, 'My account is not working poperly', 'Finance Division', 1547722882, 'We are going forward', 1548198082, '', 0, 'complaint'),
(6, 'I need to Delete my Account.', '', 1547723245, '127.0.0.1', 1548198445, '', 0, 'complaint'),
(7, 'I am having problems with my image', 'Finance Division', 1547723266, '127.0.0.1', 1548198466, '', 0, 'complaint'),
(8, 'The image is intensely round.', 'Regulatory Administration Division', 1547723383, '127.0.0.1', 1548198583, '', 0, 'complaint'),
(9, 'We will see about the rest', '', 1547737190, '127.0.0.1', 1548212390, '', 0, 'complaint'),
(10, 'How be it', '', 1547854324, '127.0.0.1', 1548329524, '', 0, 'complaint'),
(11, 'Show forth something interesting', '', 1547855046, '127.0.0.1', 1548330246, '', 0, 'complaint'),
(12, 'Haha, he asks of what to do with me and for me', '', 1547855090, '127.0.0.1', 1548330290, '', 0, 'complaint'),
(15, 'Hope comes alive some place still', 'Cybersecurity Division', 1548025328, '127.0.0.1', 1548500528, '', 0, 'complaint'),
(16, 'Hope comes alive some place still when we persevere', 'Cybersecurity Division', 1548025358, '127.0.0.1', 1548500558, '', 0, 'complaint'),
(17, 'Hello everyone', 'Human Resource Division', 1548330930, '127.0.0.1', 1548806130, '', 0, 'complaint'),
(18, 'Help me then', 'Cybersecurity Division', 1548331107, '127.0.0.1', 1548806307, '', 0, 'complaint'),
(19, 'Seems we had a problem with the folder', 'Engineering Division', 1548331305, '127.0.0.1', 1548806505, '', 0, 'complaint'),
(20, 'Resolved now', 'Human Resource Division', 1548331337, '127.0.0.1', 1548806537, '', 0, 'complaint'),
(21, 'Something scary', 'Engineering Division', 1548331460, '127.0.0.1', 1548806660, '', 0, 'complaint'),
(22, 'I will check once more', 'Cybersecurity Division', 1548331675, '127.0.0.1', 1548806875, '', 0, 'complaint'),
(23, 'Hello everyone', 'Select Division (optional)', 1548332170, '127.0.0.1', 1548807370, '', 0, 'complaint'),
(26, 'Hope', 'Select Division (optional)', 1548372361, '127.0.0.1', 1548847561, '', 0, 'complaint'),
(27, 'lojkll', 'Select Division (optional)', 1548373279, '127.0.0.1', 1548848479, '', 0, 'complaint'),
(28, 'Hola', 'Select Division (optional)', 1548373379, '127.0.0.1', 1548848579, '', 0, 'complaint'),
(29, 'Let us look at something', 'Select Division (optional)', 1548373426, '127.0.0.1', 1548848626, '', 0, 'complaint'),
(30, 'Trials are pretty tumultous', 'Select Division (optional)', 1548373801, '127.0.0.1', 1548849001, '', 0, 'complaint'),
(31, 'lET US SEE NOW', 'Select Division (optional)', 1548373934, '127.0.0.1', 1548849134, '', 0, 'complaint'),
(32, 'fINALY WORK OUT', 'Select Division (optional)', 1548373948, '127.0.0.1', 1548849148, '', 0, 'complaint'),
(33, 'fINAL DRAFT AND DEEALLING', 'Select Division (optional)', 1548373978, '127.0.0.1', 1548849178, '', 0, 'complaint'),
(34, 'lOTA', 'Select Division (optional)', 1548374030, '127.0.0.1', 1548849230, '', 0, 'complaint'),
(35, 'tRY LAST TIME ADN I AM OFF TO BED', 'Select Division (optional)', 1548374441, '127.0.0.1', 1548849641, '', 0, 'complaint'),
(36, 'tRY WITH THE IMAGE', 'Select Division (optional)', 1548374458, '127.0.0.1', 1548849658, '', 0, 'complaint'),
(37, 'lET US SEE', 'Select Division (optional)', 1548374487, '127.0.0.1', 1548849687, '', 0, 'complaint'),
(38, 'LAST ATTEMPT', 'Select Division (optional)', 1548374537, '127.0.0.1', 1548849737, '', 0, 'complaint'),
(39, 'LALST', 'Select Division (optional)', 1548374549, '127.0.0.1', 1548849749, '', 0, 'complaint'),
(40, 'Lota', 'Select Division (optional)', 1548374614, '127.0.0.1', 1548849814, '', 0, 'complaint'),
(41, 'Trials and errors are supper annoying', 'Select Division (optional)', 1548374646, '127.0.0.1', 1548849846, '', 0, 'complaint'),
(42, 'hope some more', 'Select Division (optional)', 1548374709, '127.0.0.1', 1548849909, '', 0, 'complaint'),
(43, 'Last firm', 'Select Division (optional)', 1548374794, '127.0.0.1', 1548849994, '', 0, 'complaint'),
(44, 'rDJALJDK', 'Select Division (optional)', 1548374826, '127.0.0.1', 1548850026, '', 0, 'complaint'),
(45, 'HOPE', 'Select Division (optional)', 1548374870, '127.0.0.1', 1548850070, '', 0, 'complaint'),
(46, 'one', 'Select Division (optional)', 1548374894, '127.0.0.1', 1548850094, '', 0, 'complaint'),
(47, 'One', 'Select Division (optional)', 1548374917, '127.0.0.1', 1548850117, '', 0, 'complaint'),
(48, 'hope', 'Select Division (optional)', 1548374928, '127.0.0.1', 1548850128, '', 0, 'complaint'),
(49, 'akjdljfk', 'Select Division (optional)', 1548374948, '127.0.0.1', 1548850148, '', 0, 'complaint'),
(50, 'ajfkajdl', 'Select Division (optional)', 1548374960, '127.0.0.1', 1548850160, '', 0, 'complaint'),
(51, 'jljkajlfj', 'Select Division (optional)', 1548375775, '127.0.0.1', 1548850975, '', 0, 'complaint'),
(55, 'Hope comes to be yet still', 'Select Division (optional)', 1548631007, '127.0.0.1', 1549106207, '', 0, 'complaint'),
(56, 'Hope with a file', 'Select Division (optional)', 1548631019, '127.0.0.1', 1549106219, '', 0, 'complaint'),
(57, 'dfsjhfdjhoriejgitjhge', 'Select Division (optional)', 1548674006, '::1', 1549149206, '', 0, 'complaint'),
(60, 'Let me see', 'Consumer and Corporate Affairs Division', 1550099448, '127.0.0.1', 1550574648, '', 0, 'complaint'),
(61, 'Let me see again', 'Consumer and Corporate Affairs Division', 1550099555, '127.0.0.1', 1550574755, '', 0, 'complaint'),
(62, 'Let me see again', 'Consumer and Corporate Affairs Division', 1550099699, '127.0.0.1', 1550574899, '', 0, 'complaint'),
(63, '&quot;any ideas', 'Select Division (optional)', 1550520739, '127.0.0.1', 1550995939, '', 0, 'complaint'),
(64, '\'something funny very funny', 'Select Division (optional)', 1550522506, '127.0.0.1', 1550997706, '', 0, 'complaint'),
(65, 'Other thing\'s are "getting on my nerves"', 'Select Division (optional)', 1550522527, '127.0.0.1', 1550997727, '', 0, 'complaint'),
(66, 'Let me know someting thou\'g', 'Select Division (optional)', 1550536392, '127.0.0.1', 1551011592, '', 0, 'complaint'),
(67, 'Let me know someting thou\'g', 'Select Division (optional)', 1550536523, '127.0.0.1', 1551011723, '', 0, 'complaint'),
(68, 'Another one maybe', 'Consumer and Corporate Affairs Division', 1550537389, '127.0.0.1', 1551012589, '', 0, 'complaint'),
(69, 'I think I got it now', 'Select Division (optional)', 1550537668, '127.0.0.1', 1551012868, '', 0, 'complaint'),
(70, 'sile', 'Select Division (optional)', 1550575428, '::1', 1551050628, '', 0, 'complaint'),
(71, 'sile', 'Select Division (optional)', 1550575486, '::1', 1551050686, '', 0, 'complaint'),
(72, 'slow one', 'Engineering Division', 1550575999, '::1', 1551051199, '', 0, 'complaint'),
(73, 'Helper', 'Research and Business Development', 1550576080, '::1', 1551051280, '', 0, 'complaint'),
(76, 'I\'m in love with Jesus ', 'Engineering Division', 1550581432, '192.168.43.137', 1551056632, '', 0, 'complaint'),
(82, 'Love', 'Select Division (optional)', 1550604137, '192.168.43.137', 1551079337, '', 26, 'complaint'),
(86, 'I want freedom', 'Administration Division', 1550878938, '127.0.0.1', 1551354138, 'NAZIR', 26, 'complaint'),
(87, 'Hello it\'s me again', 'Policy, Strategy and Innovation Division', 1551133063, '::1', 1551608263, 'RAHAINATU', 85, 'complaint'),
(88, 'hello people of God', 'Select Division (optional)', 1551178451, '::1', 1551653651, 'AARON', 24, 'complaint'),
(89, 'I want fufu Maybe', 'Administration Division', 1551220077, '127.0.0.1', 1551695277, 'AARON', 24, 'complaint'),
(90, 'Load', 'Select Division (optional)', 1551366377, '127.0.0.1', 1551841577, 'AARON', 24, 'complaint'),
(91, 'I want Fufu', 'Administration Division', 1552040265, '127.0.0.1', 1552515465, 'AARON', 24, 'complaint');

-- --------------------------------------------------------

--
-- Table structure for table `del_complaints`
--

CREATE TABLE `del_complaints` (
  `del_c_id` int(32) NOT NULL,
  `c_id` int(32) NOT NULL,
  `c_value` varchar(2048) NOT NULL,
  `c_division` varchar(64) NOT NULL,
  `date_created` double NOT NULL,
  `c_ip_address` varchar(64) NOT NULL,
  `date_stop_display` int(16) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `del_complaints`
--

INSERT INTO `del_complaints` (`del_c_id`, `c_id`, `c_value`, `c_division`, `date_created`, `c_ip_address`, `date_stop_display`, `u_fname`, `u_id`) VALUES
(7, 13, ' Hope comes alive some place still when we persevere yet some more ', ' Cybersecurity Division ', 1548025396, '127.0.0.1', 1548500596, 'HUMAN RESOURCE DIVISION', 0),
(8, 14, ' Finally we are on to something ', ' Engineering Division ', 1548340513, '127.0.0.1', 1548815713, 'HUMAN RESOURCE DIVISION', 0),
(9, 24, ' Hope comes alive ', ' Cybersecurity Division ', 1548025150, '127.0.0.1', 1548500350, 'HUMAN RESOURCE DIVISION', 0),
(10, 25, ' Something ought to give now ', ' Select Division (optional) ', 1548332233, '172.17.3.5', 1548807433, 'HUMAN RESOURCE DIVISION', 0),
(15, 54, ' with ', ' Select Division (optional) ', 1548376699, '', 1548851899, 'HUMAN RESOURCE DIVISION', 0),
(16, 53, ' without ', ' Select Division (optional) ', 1548376686, '', 1548851886, 'HUMAN RESOURCE DIVISION', 0),
(17, 52, ' Without file ', ' Select Division (optional) ', 1548375785, ' 127.0.0.1 ', 1548850985, 'HUMAN RESOURCE DIVISION', 0),
(18, 58, ' I love you ', ' Select Division (optional) ', 1549378477, ' ::1 ', 1549853677, 'HUMAN RESOURCE DIVISION', 0),
(19, 58, ' fdhnghbrtgdsrtghb ', ' Select Division (optional) ', 1550053013, ' ::1 ', 1550528213, 'HUMAN RESOURCE DIVISION', 0),
(20, 74, ' helpers ', ' Select Division (optional) ', 1550576149, ' ::1 ', 1551051349, 'HUMAN RESOURCE DIVISION', 0),
(21, 75, ' Laughter is healthy  ', ' Information Technology (IT) Division ', 1550577038, ' 192.168.43.137 ', 1551052238, 'HUMAN RESOURCE DIVISION', 0),
(22, 81, ' Index me ', ' Policy, Strategy and Innovation Division ', 1550599720, ' ::1 ', 1551074920, 'HUMAN RESOURCE DIVISION', 0),
(23, 78, ' Three ', ' Finance Division ', 1550591483, ' 192.168.43.137 ', 1551066683, 'HUMAN RESOURCE DIVISION', 0),
(24, 80, '', ' Regulatory Administration Division ', 1550594793, ' 192.168.43.137 ', 1551069993, 'HUMAN RESOURCE DIVISION', 0),
(25, 79, '', ' Select Division (optional) ', 1550591968, ' 192.168.43.137 ', 1551067168, 'HUMAN RESOURCE DIVISION', 0),
(26, 85, '', ' Select Division (optional) ', 1550604219, ' 192.168.43.137 ', 1551079419, 'HUMAN RESOURCE DIVISION', 0),
(27, 84, '', ' Select Division (optional) ', 1550604175, ' ::1 ', 1551079375, 'HUMAN RESOURCE DIVISION', 0),
(28, 83, '', ' Select Division (optional) ', 1550604164, ' 192.168.43.137 ', 1551079364, 'HUMAN RESOURCE DIVISION', 0),
(29, 77, '', ' Cybersecurity Division ', 1550581588, ' 192.168.43.137 ', 1551056788, 'HUMAN RESOURCE DIVISION', 0);

-- --------------------------------------------------------

--
-- Table structure for table `del_poll`
--

CREATE TABLE `del_poll` (
  `del_p_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_question` text NOT NULL,
  `date_created` double NOT NULL,
  `p_options` varchar(250) NOT NULL,
  `p_votes` varchar(250) NOT NULL,
  `p_number_options` tinyint(4) NOT NULL,
  `date_stop_display` double NOT NULL,
  `p_voters` int(11) NOT NULL,
  `p_last_vote_date` double NOT NULL,
  `u_id` int(11) NOT NULL DEFAULT '0',
  `u_fname` varchar(128) NOT NULL DEFAULT 'HUMAN RESOURCE DIVISION'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `del_poll`
--

INSERT INTO `del_poll` (`del_p_id`, `p_id`, `p_question`, `date_created`, `p_options`, `p_votes`, `p_number_options`, `date_stop_display`, `p_voters`, `p_last_vote_date`, `u_id`, `u_fname`) VALUES
(18, 68, 'Time and time again', 1551130091, 'Let us see|Let us know ', '0|0 ', 2, 1551216491, 0, 0, 0, 'HUMAN RESOURCE DIVISION'),
(19, 69, 'Last time', 1551130222, 'Time is running |Debugging is not even star ', '0|0 ', 2, 1551216622, 0, 0, 0, 'HUMAN RESOURCE DIVISION'),
(20, 70, 'I love you .....Reply as boyfriend.', 1551132081, 'I love you too|Hell no ', '1|0 ', 2, 1551304881, 1, 1551133212, 0, 'HUMAN RESOURCE DIVISION'),
(21, 149, 'What is Fufu', 1552040309, 'Don\'t know|Will find out later ', '0|0 ', 2, 1552126709, 0, 0, 0, 'HUMAN RESOURCE DIVISION');

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
(38, '1550599720_cm_IMG-20160218-WA0004.jpg', 81, 'complaint', 'active'),
(39, '1551366378_cm_1550792550_cm_1219599.jpg', 90, 'complaint', 'active'),
(40, '1551819623_pl_1550599119_hr_IMG-20160218-WA0004.jpg', 139, 'poll', 'active'),
(41, '1551819623_pl_1551366378_cm_1550792550_cm_1219599.jpg', 139, 'poll', 'active'),
(42, '1551819768_pl_1550599119_hr_IMG-20160218-WA0004.jpg', 141, 'poll1', 'active'),
(43, '1551819768_pl_1551366378_cm_1550792550_cm_1219599.jpg', 141, 'poll2', 'active'),
(44, '1551819935_pl_1550792550_cm_1219599.jpg', 142, 'poll0', 'active'),
(45, '1551819935_pl_1550575486_cm_DeTZYhpWkAE6K70.jpg', 142, 'poll3', 'active'),
(46, '1551820025_pl_1551819935_pl_1550792550_cm_1219599.jpg', 143, 'poll0', 'active'),
(47, '1551820025_pl_1550598796_hr_1559_D500_front.png', 143, 'poll3', 'active'),
(48, '1552040265_cm_tt.png', 91, 'complaint', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `no` int(10) NOT NULL,
  `u_fname` varchar(30) NOT NULL,
  `u_lname` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` blob NOT NULL,
  `u_signup_date` double NOT NULL,
  `u_status` varchar(16) NOT NULL DEFAULT 'unactivated'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`no`, `u_fname`, `u_lname`, `u_email`, `u_password`, `u_signup_date`, `u_status`) VALUES
(24, 'AARON', 'APPIAH-NUAMAH', 'aaron.appiah-nuamah@nca.org.gh', 0x3862656261386131616434343737363466633761303162366338383135313062, 1551200508, 'activated'),
(85, 'RAHAINATU', 'ABDUL RAHMAN', 'abdul-rahman.ruhainatu@nca.org', 0x6632393831393830616231346237323831303463616630626265643463393830, 1551209905, 'activated'),
(26, 'NAZIR', 'ABDUL-KARIM', 'abdul.nazir@nca.org.gh', 0x6632393831393830616231346237323831303463616630626265643463393830, 1551213289, 'activated'),
(88, 'RASHID', 'ABDULAI-ABDUL', 'abdulai.abduli-rashid@nca.org.', '', 0, 'unactivated'),
(72, 'RASHIDA', 'BADIWE ABDULLAI', 'abdulai.rashida@nca.org.gh', '', 0, 'unactivated'),
(83, 'ADAM', 'FUSEINI', 'adam.fuseini@nca.org.gh', '', 0, 'unactivated'),
(84, 'SALAHUDEEN', 'ADAM MOHAMMED', 'adam.salahudeen@nca.org.gh', '', 0, 'unactivated'),
(13, 'AFUA', 'MENSAH-AGYAPONG', 'afua.mensah-agyapong@nca.org.gh', '', 0, 'unactivated'),
(6, 'AKOSUA', 'AMPAW ASANTE', 'akosua.asante@nca.org.gh', '', 0, 'unactivated'),
(40, 'MAAME AKUA', 'TWUM-BAAH ', 'akua.twum-baah@nca.org.gh', '', 0, 'unactivated'),
(35, 'ALBERTA', 'ASARE', 'alberta.asare@nca.org.gh', '', 0, 'unactivated'),
(62, 'ALICE', 'PECKU OTUKO', 'alice.pecku@nca.org.gh', '', 0, 'unactivated'),
(90, 'ALIMATU', 'SHIRAZU SADIA', 'alimatu.shirazu@nca.org.gh', '', 0, 'unactivated'),
(4, 'ALVIN', 'ANUM ADJEI', 'alvin.anum@nca.org.gh', '', 0, 'unactivated'),
(10, 'AMANDA', 'OFORI NAKIE', 'amanda.ofori@nca.org.gh', '', 0, 'unactivated'),
(116, 'AMANDA', 'VIDZA EMEFA', 'amanda.vidza@nca.org.gh', '', 0, 'unactivated'),
(45, 'SALIM', 'AMINU AHMED', 'aminu.salim@nca.org.gh', '', 0, 'unactivated'),
(53, 'NANA AMOAKO', 'SARPONG', 'amoako.sarpong@nca.org.gh', '', 0, 'unactivated'),
(16, 'GAMEL', 'AWUDU', 'awudu.gamel@nca.org.gh', '', 0, 'unactivated'),
(50, 'BASSIT', 'AYITA MOHAMMED', 'ayita.bassit@nca.org.gh', '', 0, 'unactivated'),
(37, 'BARNABAS MIZPAH', 'OKANTAH NII OTOO', 'barnabas.okantah@nca.org.gh', '', 0, 'unactivated'),
(74, 'BENJAMIN', 'SARPONG', 'benjamin.sarpong@nca.org.gh', '', 0, 'unactivated'),
(96, 'BRIDGET', 'AYEKPA', 'bridget.ayekpa@nca.org.gh', '', 0, 'unactivated'),
(107, 'CASTIN', 'BOAKYE', 'castin.boakye@nca.org.gh', '', 0, 'unactivated'),
(77, 'CHRISTOPHER', 'MENSAH AMOAKO', 'christopher.amoako@nca.org.gh', '', 0, 'unactivated'),
(20, 'COURAGE', 'TSIKUDO', 'courage.tsikudo@nca.org.gh', '', 0, 'unactivated'),
(55, 'DANIEL', 'DUODU', 'daniel.duodu@nca.org.gh', '', 0, 'unactivated'),
(47, 'DANIEL', 'OMARI', 'daniel.omari@nca.org.gh', '', 0, 'unactivated'),
(110, 'DANIEL', 'ONYANSANI WIAFE', 'daniel.onyansani@nca.org.gh', '', 0, 'unactivated'),
(25, 'DAVID', 'ASIAMAH BEDU', 'david.asiamah@nca.org.gh', '', 0, 'unactivated'),
(17, 'DAVID', 'ATTIAH KUMAH', 'david.attiah@nca.org.gh', '', 0, 'unactivated'),
(7, 'DONALD', 'ADDAI ODEHE', 'donald.addai@nca.org.gh', '', 0, 'unactivated'),
(100, 'DONNE ELVIS', 'YEVUGAH', 'donne.yevugah@nca.org.gh', '', 0, 'unactivated'),
(18, 'DRAMANI', 'YAHAYA', 'dramani.yahaya@nca.org.gh', '', 0, 'unactivated'),
(28, 'ELIZABETH-SOFIA', 'SARFO', 'elizabeth.sarfo@nca.org.gh', '', 0, 'unactivated'),
(30, 'EMMANUEL', 'APPIAH', 'emmanuel.appiah@nca.org.gh', '', 0, 'unactivated'),
(91, 'EMMANUEL', 'ASANTE KOFI', 'emmanuel.asante@nca.org.gh', '', 0, 'unactivated'),
(33, 'EMMANUEL', 'BOTCHEY', 'emmanuel.botchey@nca.org.gh', '', 0, 'unactivated'),
(38, 'EMMANUEL', 'DANSO', 'emmanuel.danso@nca.org.gh', '', 0, 'unactivated'),
(23, 'ENOCH', 'ACKOMEAH', 'enoch.ackomeah@nca.org.gh', '', 0, 'unactivated'),
(81, 'FAWZIA', 'JIBRILL', 'fawzia.jibrill@nca.org.gh', '', 0, 'unactivated'),
(51, 'FERUZA', 'YEHUZA', 'feruza.yehuza@nca.org.gh', '', 0, 'unactivated'),
(112, 'GEORGE', 'DANSO', 'george.danso@nca.org.gh', '', 0, 'unactivated'),
(29, 'GIFTY', 'BAAFI ADOMAKOA', 'gifty.baafi@nca.org.gh', '', 0, 'unactivated'),
(44, 'GLORIA', 'ACHEAMPONG AMA BOATEMAA', 'gloria.acheampong@nca.org.gh', '', 0, 'unactivated'),
(103, 'GRACE', 'AMOAH', 'grace.amoah@nca.org.gh', '', 0, 'unactivated'),
(102, 'HAJARATU', 'ASIEDU ANIMWAA', 'hajaratu.asiedu@nca.org.gh', '', 0, 'unactivated'),
(73, 'HILLARY', 'BINDER MAUD', 'hillary.binder@nca.org.gh', '', 0, 'unactivated'),
(15, 'IBRAHIM', 'ABASS MUSAH NAN', 'ibrahim.abass@nca.org.gh', '', 0, 'unactivated'),
(118, 'ABDUL', 'HAFIZ IBRAHIM ADAM', 'ibrahim.abdul-hafiz@nca.org.gh', '', 0, 'unactivated'),
(76, 'KELLI', 'IDDRISU JIMAH', 'iddrisu.kelli@nca.org.gh', '', 0, 'unactivated'),
(3, 'IMAN', 'MOHAMMED', 'iman.mohammed@nca.org.gh', '', 0, 'unactivated'),
(78, 'HAMIDATU', 'ISSAH', 'issah.hamidatu@nca.org.gh', '', 0, 'unactivated'),
(66, 'IVY', 'ASAFU-ADJEI', 'ivy.asafu-adjei@nca.org.gh', '', 0, 'unactivated'),
(64, 'JACQUELINE', 'KUSI', 'jacqueline.kusi@nca.org.gh', '', 0, 'unactivated'),
(87, 'JEFFERY', 'ADDA STANLEY', 'jeffrey.adda@nca.org.gh', '', 0, 'unactivated'),
(48, 'JEFFERY', 'MENSAH', 'jeffrey.mensah@nca.org.gh', '', 0, 'unactivated'),
(39, 'JEFFERY', 'ODOOM', 'jeffrey.odoom@nca.org.gh', '', 0, 'unactivated'),
(94, 'JONAS', 'DARIKPOLO NA-ELE', 'jonas.darikpolo@nca.org.gh', '', 0, 'unactivated'),
(41, 'JOSEPH', 'BOATENG JERMAINE', 'joseph.boateng@nca.org.gh', '', 0, 'unactivated'),
(21, 'JOSEPH', 'LARBI', 'joseph.larbi@nca.org.gh', '', 0, 'unactivated'),
(54, 'JOSEPH', 'OSEI-TUTU', 'joseph.osei-tutu@nca.org.gh', '', 0, 'unactivated'),
(52, 'JOYCE', 'AMOAH', 'joyce.amoah@nca.org.gh', '', 0, 'unactivated'),
(111, 'JOYCE', 'MENSAH-SARPONG', 'joyce.mensah-sarpong@nca.org.gh', '', 0, 'unactivated'),
(2, 'JOYCE', 'KORKOR TACHIE', 'joyce.tachie@nca.org.gh', '', 0, 'unactivated'),
(114, 'JULIANA', 'OBENG ADWOA', 'juliana.obeng@nca.org.gh', '', 0, 'unactivated'),
(104, 'JUSTIN', 'NKRUMAH YAW', 'justice.nkrumah@nca.org.gh', '', 0, 'unactivated'),
(58, 'JUSTICE', 'OPOKU', 'justice.opoku@nca.org.gh', '', 0, 'unactivated'),
(79, 'JAKUUR', 'KONLAN KANFITIB', 'kanfitib.jakuur@nca.org.gh', '', 0, 'unactivated'),
(82, 'KISURA', 'HAROON MMATOGMAH', 'kisura.haroon@nca.org.gh', '', 0, 'unactivated'),
(93, 'NANA KWABENA', 'ACHEAMPONG', 'kwabena.acheampong@nca.org.gh', '', 0, 'unactivated'),
(71, 'KWEINUA', 'GODMAN', 'kweniua.godman@nca.org.gh', '', 0, 'unactivated'),
(14, 'LAUD', 'AMMAH', 'laud.ammah@nca.org.gh', '', 0, 'unactivated'),
(31, 'LAWRENCE', 'AMLADO KOFI', 'lawrence.amlado@nca.org.gh', '', 0, 'unactivated'),
(59, 'LAWRENCE', 'ANKOMAH', 'lawrence.ankomah@nca.org.gh', '', 0, 'unactivated'),
(86, 'MAHDI', 'ABDUL-MUMIN', 'mahdi.abdul-mumin@nca.org.gh', '', 0, 'unactivated'),
(80, 'MARIAM', 'MOHAMMED', 'mariam.mohammed@nca.org.gh', '', 0, 'unactivated'),
(63, 'MARVELLOUS', 'MENSAH', 'marvellous.mensah@nca.org.gh', '', 0, 'unactivated'),
(109, 'MARY', 'DORNYAH MENSAH', 'mary.mensah@nca.org.gh', '', 0, 'unactivated'),
(12, 'MICHAEL', 'PHILEMON BROWN', 'michael.brown@nca.org.gh', '', 0, 'unactivated'),
(113, 'MOHAMMED', 'TUNKARA', 'mohammed.tunkara@nca.org.gh', '', 0, 'unactivated'),
(92, 'OSMAN', 'MUFIDA KONO-KUNBAA', 'mufida.osman@nca.org.gh', '', 0, 'unactivated'),
(89, 'RAFIAH', 'MUSAH', 'musah.rafia@nca.org.gh', '', 0, 'unactivated'),
(57, 'NANA SERWAA', 'AKOTO AFRIYIE', 'nana.afriyie@nca.org.gh', '', 0, 'unactivated'),
(117, 'NANA YAW', 'ESSILFIE AMOANYI', 'nana.essilfie@nca.org.gh', '', 0, 'unactivated'),
(68, 'RUDY', 'ADDO NIKOI', 'nikoi.addo@nca.org.gh', 0x3566346463633362356161373635643631643833323764656238383263663939, 1551222992, 'activated'),
(115, 'OLIVIA', 'OPOKU-ASUMADU', 'olivia.opoku-asumadu@nca.org.gh', '', 0, 'unactivated'),
(34, ' OPHELIA', 'WEMEGAH AKU', 'ophelia.wemegah@nca.org.gh', '', 0, 'unactivated'),
(43, 'OSWIN', 'ADDOQUAYE TAGOE', 'oswin.tagoe@nca.org.gh', '', 0, 'unactivated'),
(22, 'PAMELA', 'ADABLAH DELALI', 'pamela.adablah@nca.org.gh', '', 0, 'unactivated'),
(99, 'PEARL', 'MOTTEY SEFAKOR', 'pearl.sefakor@nca.org.gh', '', 0, 'unactivated'),
(32, 'PHILIP', 'ACKOM', 'philip.ackom@nca.org.gh', '', 0, 'unactivated'),
(98, 'PRAISE', 'KATAPU EDZORDZI', 'praise.katapu@nca.org.gh', '', 0, 'unactivated'),
(5, 'RAYMOND', 'TUFFOUR', 'raymond.tuffour@nca.org.gh', '', 0, 'unactivated'),
(67, 'REJOICE', 'OLERKUOR TETTEH-NARH', 'rejoice.tetteh-narh@nca.org.gh', '', 0, 'unactivated'),
(56, 'RICHMOND', 'DOMPREH RAPHAEL', 'richmond.dompreh@nca.org.gh', '', 0, 'unactivated'),
(69, 'RICHMOND', 'KUTIN', 'richmond.kutin@nca.org.gh', '', 0, 'unactivated'),
(70, 'RUBY', 'KORTEY', 'ruby.kortey@nca.org.gh', '', 0, 'unactivated'),
(65, 'SAMIR', 'OSUMAN', 'samir.osuman@nca.org.gh', '', 0, 'unactivated'),
(46, 'SANDRA', 'OPPONG', 'sandra.oppong@nca.org.gh', '', 0, 'unactivated'),
(49, 'SARAH', 'SARFO OFORIWAA', 'sarah.sarfo@nca.org.gh', '', 0, 'unactivated'),
(75, 'YVONNE', 'HEVI SELASIE', 'selasie.hevi@nca.org.gh', '', 0, 'unactivated'),
(8, 'SHARON', 'MARTINSON ODEIBEA', 'sharon.martinson@nca.org.gh', '', 0, 'unactivated'),
(19, 'SOLOMON', 'ASHIA', 'solomon.ashia@nca.org.gh', '', 0, 'unactivated'),
(11, 'STEPHEN', 'AGYEI KUSI', 'stephen.agyei@nca.org.gh', '', 0, 'unactivated'),
(9, 'STEPHEN', 'GBENA', 'stephen.gbena@nca.org.gh', '', 0, 'unactivated'),
(27, 'SUSANA', 'OKYERE AYEBEA', 'susana.ayebea@nca.org.gh', '', 0, 'unactivated'),
(108, 'THEODORA', 'PARKER-DADSON', 'theodora.parker-dadson@nca.org.gh', '', 0, 'unactivated'),
(105, 'THEOPHILUS', 'AMOAH-ARTHUR', 'theophilus.amoah-arthur@nca.org.gh', '', 0, 'unactivated'),
(1, 'THEOPHILUS', 'NII OKAI OKAI', 'theophilus.okai@nca.org.gh', '', 0, 'unactivated'),
(36, 'PROSPER', 'VIBER', 'viber.prosper@nca.org.gh', '', 0, 'unactivated'),
(60, 'VICTORIA', 'ANSAH', 'victoria.ansah@nca.org.gh', '', 0, 'unactivated'),
(61, 'VICTORIA', 'DOE', 'victoria.doe@nca.org.gh', '', 0, 'unactivated'),
(106, 'WILLIAM', 'ORHIN PANYIN NKWEFI', 'william.orhin@nca.org.gh', '', 0, 'unactivated'),
(97, 'SAMUEL', 'AMEWU WORLANYO', 'worlanyo.amewu@nca.org.gh', '', 0, 'unactivated'),
(101, 'YAW', 'OFOSU ASARE', 'yaw.asare@nca.org.gh', '', 0, 'unactivated'),
(95, 'BABA YUNUS', 'SAMIHA SIMLI', 'yunus.samiha@nca.org.gh', '', 0, 'unactivated'),
(42, 'YVONNE', 'AHIABLE ELIKPLIM', 'yvonne.ahiable@nca.org.gh', '', 0, 'unactivated');

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
  `p_id` int(32) NOT NULL,
  `p_question` text NOT NULL,
  `date_created` double NOT NULL,
  `p_options` varchar(250) NOT NULL,
  `p_votes` varchar(250) NOT NULL DEFAULT '0',
  `p_number_options` tinyint(3) NOT NULL,
  `date_stop_display` double DEFAULT NULL,
  `p_voters` int(11) DEFAULT '0',
  `p_last_vote_date` double DEFAULT '0',
  `u_id` int(11) NOT NULL DEFAULT '0',
  `u_fname` varchar(64) NOT NULL DEFAULT 'HR',
  `table_type` varchar(16) NOT NULL DEFAULT 'poll'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`p_id`, `p_question`, `date_created`, `p_options`, `p_votes`, `p_number_options`, `date_stop_display`, `p_voters`, `p_last_vote_date`, `u_id`, `u_fname`, `table_type`) VALUES
(56, 'Who are you', 1550879748, 'I am me|I am myself', '7|4', 2, 1551127323, 11, 1551176143, 0, 'HUMAN RESOURCE DIVISION', 'poll'),
(57, 'What\'s your color', 1550879978, 'I want to|Kno\'|Find\'|Load\'s', '2|1|1|2', 4, 1551213723, 6, 1551176109, 0, 'HUMAN RESOURCE DIVISION', 'poll'),
(71, 'Which Phone would you prefer?', 1551133646, 'Samsung Galaxy s10|iPhone Xs Max|Huawei Mate 20 pro|One plus 7T', '1|0|0|1', 4, 1551220046, 2, 1551176102, 0, 'HUMAN RESOURCE DIVISION', 'poll'),
(72, 'Everything Goes to be alright', 1551193051, 'Ket |dajdkf', '1|1', 2, 1551279451, 2, 1551220712, 0, 'HUMAN RESOURCE DIVISION', 'poll'),
(137, 'Load', 1551394351, 'Timely|Zip', '0|0', 2, 1551480751, 0, 0, 24, 'AARON', 'poll'),
(138, 'Let me ask', 1551396817, 'Will you come along|come around', '0|0', 2, 1551483217, 0, 0, 85, 'RAHAINATU', 'poll'),
(139, 'Which is most encouraging', 1551819623, 'Life|Nothing', '0|0', 2, 1551906023, 0, 0, 24, 'AARON', 'poll'),
(140, 'Which is most encouraging', 1551819678, 'Life|Nothing', '0|1', 2, 1551906078, 1, 1551825505, 24, 'AARON', 'poll'),
(141, 'Which is most encouraging', 1551819768, 'Life|Nothing', '0|0', 2, 1551906168, 0, 0, 24, 'AARON', 'poll'),
(142, 'Let\'s get a bit closer', 1551819934, 'Now Let\'s see|TEsted|Tried|Loaddding', '0|0|0|0', 4, 1551906334, 0, 0, 24, 'AARON', 'poll'),
(143, 'With disorganized images', 1551820025, 'Fomd|Last|Firstly?|Lastly', '0|0|0|0', 4, 1551906425, 0, 0, 24, 'AARON', 'poll'),
(144, 'Last', 1551820503, 'One|With', '0|0', 2, 1551906903, 0, 0, 24, 'AARON', 'poll'),
(145, 'One', 1551826100, 'Two|Three', '0|0', 2, 1551912500, 0, 0, 85, 'RAHAINATU', 'poll'),
(146, 'Four', 1551826140, 'Five|Six', '0|0', 2, 1551912540, 0, 0, 0, 'HUMAN RESOURCE DIVISION', 'poll'),
(147, 'Seven', 1551826182, 'Eight|Nine', '0|0', 2, 1551912582, 0, 0, 24, 'AARON', 'poll'),
(148, 'Ten', 1551826352, 'Eleven|Twelve', '1|0', 2, 1551912752, 1, 1551829992, 24, 'AARON', 'poll'),
(150, 'Who is asking', 1552040943, 'I don\'t know|Let me know', '0|1', 2, 1552127343, 1, 1552040954, 24, 'AARON', 'poll'),
(151, 'What is ongoing?', 1552253253, 'Load|Loader|Loaderi|Loadering', '0|1|0|0', 4, 1552339653, 1, 1552253264, 24, 'AARON', 'poll'),
(152, 'Check on something', 1552323691, 'Wil you play|Are you sure', '0|0', 2, 1552410091, 0, 0, 24, 'AARON', 'poll');

-- --------------------------------------------------------

--
-- Table structure for table `poll_imagine`
--

CREATE TABLE `poll_imagine` (
  `pl_im_id` int(255) NOT NULL,
  `pl_im_name` varchar(128) NOT NULL,
  `pl_ref_id` int(255) NOT NULL,
  `pl_ref_status` varchar(16) NOT NULL DEFAULT 'active',
  `pl_ref_option` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll_imagine`
--

INSERT INTO `poll_imagine` (`pl_im_id`, `pl_im_name`, `pl_ref_id`, `pl_ref_status`, `pl_ref_option`) VALUES
(1, '1551820503_pl_1548407548_picture014.jpg', 144, 'active', 0),
(2, '1551820503_pl_1548376941_MRV_20171106_22_36_17.jpg', 144, 'active', 1),
(3, '1551826353_pl_GIT.jpeg', 148, 'active', 0),
(4, '1551826353_pl_Untitled 1.jpg', 148, 'active', 1),
(5, '1552040943_pl_GIT.jpeg', 150, 'active', 0),
(6, '1552040943_pl_lion-image_01582298_22.jpg', 150, 'active', 1),
(7, '1552253253_pl_comments.png', 151, 'active', 0),
(8, '1552253253_pl_Screenshot from 2018-12-17 22-19-10.png', 151, 'active', 1),
(9, '1552253253_pl_Screenshot from 2018-12-14 15-20-02.png', 151, 'active', 2),
(10, '1552253253_pl_Complaints.png', 151, 'active', 3);

-- --------------------------------------------------------

--
-- Table structure for table `poll_voters`
--

CREATE TABLE `poll_voters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `vote_date` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll_voters`
--

INSERT INTO `poll_voters` (`id`, `user_id`, `poll_id`, `username`, `vote_date`) VALUES
(14, 23, 71, '', 0),
(15, 23, 57, '', 0),
(16, 23, 56, '', 0),
(17, 23, 72, '', 1551220400),
(19, 24, 72, 'Aaron', 1551220712),
(20, 24, 140, 'AARON', 1551825505),
(21, 24, 148, 'AARON', 1551829992),
(22, 24, 150, 'AARON', 1552040954),
(23, 24, 151, 'AARON', 1552253264);

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
-- Indexes for table `del_poll`
--
ALTER TABLE `del_poll`
  ADD PRIMARY KEY (`del_p_id`);

--
-- Indexes for table `imagine`
--
ALTER TABLE `imagine`
  ADD PRIMARY KEY (`im_id`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`u_email`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `messagehr`
--
ALTER TABLE `messagehr`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `poll_imagine`
--
ALTER TABLE `poll_imagine`
  ADD PRIMARY KEY (`pl_im_id`);

--
-- Indexes for table `poll_voters`
--
ALTER TABLE `poll_voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cm_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `del_complaints`
--
ALTER TABLE `del_complaints`
  MODIFY `del_c_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `del_poll`
--
ALTER TABLE `del_poll`
  MODIFY `del_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `imagine`
--
ALTER TABLE `imagine`
  MODIFY `im_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `messagehr`
--
ALTER TABLE `messagehr`
  MODIFY `m_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `p_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `poll_imagine`
--
ALTER TABLE `poll_imagine`
  MODIFY `pl_im_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `poll_voters`
--
ALTER TABLE `poll_voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
