-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 02:04 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `question` text,
  `poll_date` double DEFAULT NULL,
  `options` varchar(250) DEFAULT NULL,
  `votes` varchar(250) DEFAULT NULL,
  `close` tinyint(1) DEFAULT NULL,
  `number_options` tinyint(3) DEFAULT NULL,
  `poll_timeout` double DEFAULT NULL,
  `voters` int(11) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `last_vote_date` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `question`, `poll_date`, `options`, `votes`, `close`, `number_options`, `poll_timeout`, `voters`, `public`, `last_vote_date`) VALUES
(1, 'Which team will win the 2018 FIFA World Cup?', 1524829888, 'Brazil||||Argentina||||Spen||||France', '1||||3||||1||||1', 0, 4, 0, 6, 0, 1524836731);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
