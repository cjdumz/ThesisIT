-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2018 at 02:55 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `initial`
--

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20180909161741, 'Initial', '2018-09-09 08:17:46', '2018-09-09 08:17:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `created`, `modified`) VALUES
(3, 'albert@yahoo.com', '$2y$10$MuRIxIQq6fkwf/82ZQhfAeH2XpjE9dQ4iRYcqFHisRlI866DZdVeq', '09123123412', '2018-09-10 07:42:35', '2018-09-12 08:10:10'),
(4, 'jellygrab@gmail.com', '$2y$10$JKuKK8QppK35vorTEi8EhOByDmqynu00nPZixuGadad2iy8kaUDzK', 'sddsfs', '2018-09-11 06:17:10', '2018-09-11 06:17:10'),
(5, 'alber@yahoo.com', '$2y$10$tii94tskwGQrGpjoyAUZfOMRd7ZU.zEoo6wE0qYyDM8NjzV3g7KfW', '0917', '2018-09-11 06:20:16', '2018-09-11 06:20:16'),
(6, 'mamamo@gago.com', '$2y$10$K9utUb6XQ/LWJAyWVIVK6.ipyZ1U5PkwTKJwcN651bAHTRyukL7au', '123123123', '2018-09-11 06:22:35', '2018-09-11 06:22:35'),
(7, 'lacapal22@gmail.com', '$2y$10$d1GOIeZv5oMyvzoBkcju5upwqiBEIAV9EEE2d7fSzV1rw9i1cq5be', '09154250116', '2018-09-11 06:24:32', '2018-09-11 06:24:32'),
(8, 'jey@yahoo.com', '$2y$10$/rn9jjcsxJGYHeICR5PpL.sXsymKvmmQ9SWiK3PLoiwQNhyU9HEdS', '09177771390', '2018-09-11 06:25:34', '2018-09-11 06:25:34'),
(9, 'jeyli@g.com', '$2y$10$nb6zlyy.p6bwGddNM6AxZusjts1oZnFckRUSmEyAADKc7rhjfWZF6', '097', '2018-09-11 06:26:50', '2018-09-11 06:26:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
