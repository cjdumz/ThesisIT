-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 03, 2018 at 06:28 AM
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
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `serviceId` int(11) NOT NULL,
  `vehicleId` int(255) NOT NULL,
  `personalId` int(11) NOT NULL,
  `otherService` varchar(255) DEFAULT NULL,
  `additionalMessage` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personalId3` (`personalId`),
  KEY `serviceId` (`serviceId`),
  KEY `vehicleId` (`vehicleId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `serviceId`, `vehicleId`, `personalId`, `otherService`, `additionalMessage`, `status`, `date`, `time`, `created`, `modified`) VALUES
(1, 1, 1, 1, NULL, NULL, 'Pending', '2018-09-26', '01:00:00', '2018-09-24 00:33:35', NULL),
(2, 8, 2, 2, NULL, NULL, 'Pending', '2018-09-28', '06:00:00', '2018-09-24 00:33:35', NULL),
(3, 1, 1, 3, NULL, NULL, 'pending', '2018-09-05', '01:00:00', '2018-09-24 15:51:21', NULL),
(4, 17, 2, 3, NULL, NULL, 'pending', '2018-09-22', '13:00:00', '2018-09-24 15:53:26', NULL),
(5, 1, 1, 3, NULL, NULL, 'pending', '2018-09-27', '15:59:00', '2018-09-24 16:44:33', NULL),
(6, 1, 1, 3, NULL, NULL, 'pending', '2018-09-27', '15:59:00', '2018-09-24 16:44:57', NULL),
(7, 5, 1, 3, NULL, NULL, 'pending', '2018-10-05', '17:00:00', '2018-10-03 02:34:14', NULL),
(8, 1, 1, 3, NULL, NULL, 'pending', '2018-10-17', '22:59:00', '2018-10-03 14:16:03', NULL),
(9, 1, 1, 3, NULL, NULL, 'pending', '2018-10-17', '22:59:00', '2018-10-03 14:16:28', NULL),
(10, 3, 1, 3, '', '', 'pending', '2018-10-11', '14:07:00', '2018-10-03 14:25:15', NULL),
(11, 3, 1, 3, 'Please check my wiper as well', '', 'pending', '2018-10-11', '14:07:00', '2018-10-03 14:27:36', NULL),
(12, 3, 1, 3, 'Please check my wiper as well', 'Hello', 'pending', '2018-10-11', '14:07:00', '2018-10-03 14:28:00', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `personalId3` FOREIGN KEY (`personalId`) REFERENCES `personalinfo` (`personalId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serviceId` FOREIGN KEY (`serviceId`) REFERENCES `services` (`serviceId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicleId` FOREIGN KEY (`vehicleId`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
