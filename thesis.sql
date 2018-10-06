-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2018 at 11:01 PM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date_created`, `date_modified`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2018-09-12 07:26:00', '2018-09-12 07:26:00');

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
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personalId3` (`personalId`),
  KEY `serviceId` (`serviceId`),
  KEY `vehicleId` (`vehicleId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `serviceId`, `vehicleId`, `personalId`, `status`, `date`, `time`, `created`, `modified`) VALUES
(1, 1, 1, 1, 'Pending', '2018-09-26', '01:00:00', '2018-09-24 00:33:35', NULL),
(2, 8, 2, 2, 'Pending', '2018-09-28', '06:00:00', '2018-09-24 00:33:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

DROP TABLE IF EXISTS `personalinfo`;
CREATE TABLE IF NOT EXISTS `personalinfo` (
  `personalId` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `middleName` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contactNumber` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`personalId`),
  KEY `userId` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`personalId`, `user_id`, `firstName`, `lastName`, `middleName`, `address`, `contactNumber`, `email`, `created`, `modified`) VALUES
(1, NULL, 'Weng', 'Palpallatoc', 'Ignacio', '#4 St.Ruth Petersville Subdivision Camp 7 Baguio', '09260023544', 'weng.great@gmail.com', '2018-09-24 00:14:00', '2018-09-24 00:00:00'),
(2, NULL, 'Jelly', 'Grabanzor', 'Llanes', 'New Lucban Baguio', '09123456789', 'jellygrabanzor@gmail.com', '2018-09-24 00:14:00', '2018-09-24 00:00:00'),
(3, NULL, 'jeli', 'llanes', 'g', 'Seoul, south korea', '09177771390', 'jellyllanes@yahoo.com', '2018-09-24 03:44:08', NULL),
(5, NULL, 'be', 'be', 'y', 'New orleans, pangasinan', '09177771234', 'beybe@yahoo.com', '2018-09-24 04:28:46', NULL),
(6, NULL, 'key', 'key', 'k', 'Manila, California', '09177770000', 'key@yahoo.com', '2018-09-24 05:20:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(420) NOT NULL,
  `serviceType` varchar(420) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `serviceName`, `serviceType`, `created`, `modified`) VALUES
(1, 'Change Oil', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(2, 'Check brakes', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(3, 'Check Air filter', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(4, 'Check fuel filter', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(5, 'Check Cabin Filter', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(6, 'Check Suspensions', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(7, 'Change Brake Pads', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(8, 'Change Air Filter', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(9, 'Change Fuel Filter', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(10, 'Change Cabin Filter', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(11, 'Change wiper blades', 'Mechanical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(12, 'Check headlights', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(13, 'Check Front and rear signal lights', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(14, 'Check tail lights', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(15, 'Check park lights', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(16, 'Check Brake lights', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(17, 'Check reverse light', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(18, 'Check plate light', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(19, 'Check dome light', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(20, 'check horn', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(21, 'check battery', 'Electrical', '2018-09-18 00:00:00', '2018-09-18 00:00:00'),
(22, 'simple retouch', 'Painting', '2018-09-18 00:00:00', '2018-09-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`) VALUES
(1, 'wengweng03', 'wengweng', '2018-09-24 00:21:11', NULL),
(2, 'jelly', 'jelly', '2018-09-24 00:21:11', NULL),
(17, 'jeli', '$2y$10$WygNZITR4WU/KYP./CX3iOG2dts33j4Hbi1YXJvQ8IAzuTz./z4Oy', '2018-09-24 03:44:08', NULL),
(18, 'beybe', '$2y$10$7OJ.GPy4LxJ979AWSMPUG.KXmMMfb8p0FpuKuFkSOrJFoPSDumYk.', '2018-09-24 04:28:46', NULL),
(19, 'key', '$2y$10$TzOL8v8OOqXrdUQSLABm6eC3B7a5Ln5kOem0do1wfcfjUjYeTGwQK', '2018-09-24 05:20:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personalId` int(11) NOT NULL,
  `plateNumber` varchar(255) NOT NULL,
  `bodyType` varchar(255) DEFAULT NULL,
  `yearModel` varchar(255) NOT NULL,
  `chasisNumber` varchar(255) DEFAULT NULL,
  `engineClassification` varchar(255) DEFAULT NULL,
  `numberOfCylinders` varchar(255) DEFAULT NULL,
  `typeOfDriveTrain` varchar(255) DEFAULT NULL,
  `make` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `engineNumber` varchar(255) DEFAULT NULL,
  `typeOfEngine` varchar(255) DEFAULT NULL,
  `engineDisplacement` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personalId2` (`personalId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `personalId`, `plateNumber`, `bodyType`, `yearModel`, `chasisNumber`, `engineClassification`, `numberOfCylinders`, `typeOfDriveTrain`, `make`, `series`, `color`, `engineNumber`, `typeOfEngine`, `engineDisplacement`, `created`, `modified`) VALUES
(1, 1, 'ABC-123', 'Cedan', '1997', NULL, NULL, NULL, NULL, 'Honda', 'Civic', 'Red', NULL, NULL, NULL, '2018-09-24 00:24:57', NULL),
(2, 2, 'ABR-123', 'Compact', '2000', NULL, NULL, NULL, NULL, 'Ford', 'Echo Sport', 'blue', NULL, NULL, NULL, '2018-09-24 00:26:13', NULL);

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

--
-- Constraints for table `personalinfo`
--
ALTER TABLE `personalinfo`
  ADD CONSTRAINT `userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `personalId2` FOREIGN KEY (`personalId`) REFERENCES `personalinfo` (`personalId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
