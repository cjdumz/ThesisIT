-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2018 at 07:31 AM
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
-- Database: `thesis2`
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `serviceId`, `vehicleId`, `personalId`, `otherService`, `additionalMessage`, `status`, `date`, `time`, `created`, `modified`) VALUES
(1, 1, 1, 1, NULL, NULL, 'declined', '2018-09-26', '01:00:00', '2018-09-24 00:33:35', NULL),
(3, 1, 1, 3, NULL, NULL, 'Pending', '2018-09-05', '01:00:00', '2018-09-24 15:51:21', NULL),
(5, 1, 1, 3, NULL, NULL, 'Rescheduled', '2018-09-27', '15:59:00', '2018-09-24 16:44:33', NULL),
(6, 1, 1, 3, NULL, NULL, 'Declined', '2018-09-27', '15:59:00', '2018-09-24 16:44:57', NULL),
(7, 5, 1, 3, NULL, NULL, 'Declined', '2018-10-05', '17:00:00', '2018-10-03 02:34:14', NULL),
(8, 1, 1, 3, NULL, NULL, 'Declined', '2018-10-17', '22:59:00', '2018-10-03 14:16:03', NULL),
(9, 1, 1, 3, NULL, NULL, 'Declined', '2018-10-17', '22:59:00', '2018-10-03 14:16:28', NULL),
(10, 3, 1, 3, '', '', 'Declined', '2018-10-11', '14:07:00', '2018-10-03 14:25:15', NULL),
(11, 3, 1, 3, 'Please check my wiper as well', '', 'Declined', '2018-10-11', '14:07:00', '2018-10-03 14:27:36', NULL),
(12, 3, 1, 3, 'Please check my wiper as well', 'Hello', 'Declined', '2018-10-11', '14:07:00', '2018-10-03 14:28:00', NULL),
(13, 8, 1, 3, 'Hello', 'hehe', 'Declined', '2018-10-10', '04:05:00', '2018-10-03 15:42:56', NULL),
(14, 6, 1, 3, '', '', 'Declined', '2018-10-17', '00:33:00', '2018-10-03 16:00:21', NULL),
(15, 4, 1, 3, '', '', 'Accepted', '2018-10-20', '00:33:00', '2018-10-03 16:01:20', NULL),
(16, 2, 1, 3, '', '', 'pending', '2018-10-11', '07:00:00', '2018-10-03 17:02:16', NULL);

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
  `mobileNumber` varchar(250) NOT NULL,
  `telephoneNumber` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`personalId`),
  KEY `userId` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`personalId`, `user_id`, `firstName`, `lastName`, `middleName`, `address`, `mobileNumber`, `telephoneNumber`, `email`, `created`, `modified`) VALUES
(1, NULL, 'Weng', 'Palpallatoc', 'Ignacio', '#4 St.Ruth Petersville Subdivision Camp 7 Baguio', '09260023544', NULL, 'weng.great@gmail.com', '2018-09-24 00:14:00', '2018-09-24 00:00:00'),
(2, NULL, 'Jelly', 'Grabanzor', 'Llanes', 'New Lucban Baguio', '09123456789', NULL, 'jellygrabanzor@gmail.com', '2018-09-24 00:14:00', '2018-09-24 00:00:00'),
(3, 17, 'jeli', 'llanes', 'g', 'Seoul, south korea', '09177771390', NULL, 'jellyllanes@yahoo.com', '2018-09-24 03:44:08', NULL),
(7, NULL, 'flower', 'flower', 'flower', 'garden', '09999999999', NULL, 'flower@gmail.com', '2018-09-26 14:49:12', NULL),
(8, NULL, 'tutubi', 'tutubi', 'tutubi', 'Tutubi, La Union', '09000000000', NULL, 'tutubi@yahoo.com', '2018-09-26 14:55:33', NULL),
(9, NULL, 'aybee', 'aybeee', 'aybee', 'aybe', '09177770001', NULL, 'aybe@gmail.com', '2018-09-26 15:37:56', NULL),
(10, NULL, 'aybee', 'aybeee', 'aybee', 'aybe', '09177770001', NULL, 'aybe@gmail.com', '2018-09-26 15:40:29', NULL),
(11, NULL, 'bobo', 'bobo', 'bobo', 'Texas, La Union', '09177771397', NULL, 'bobo@gmail.com', '2018-09-26 15:48:05', NULL),
(12, NULL, 'kurtz', 'kurtz', 'k', 'Texas, La Union', '09177770003', NULL, 'kurtz@gmail.com', '2018-09-26 15:53:01', NULL),
(13, 43, 'hayts', 'hayts', 'hayts', 'san nicolas', '09177771378', NULL, 'hayts@yahoo.com', '2018-09-26 21:10:54', NULL),
(14, 44, 'sawakas', 'sawakas', 'sawakas', 'Seoul, south korea', '09999999988', NULL, 'sawakas@gmail.com', '2018-09-26 21:19:19', NULL),
(15, 45, 'joshua', 'abubo', 'lacap', 'New orleans, pangasinan', '09177771256', NULL, 'joshua@yahoo.com', '2018-09-26 21:40:10', NULL),
(16, 46, 'albert', 'lacap', 'imuan', 'New orleans, pangasinan', '09000000024', NULL, 'albert@yahoo.com', '2018-09-26 21:56:57', NULL),
(17, 47, 'windee', 'palpallatoc', 'ignacio', 'Texas, La Union', '09177770088', NULL, 'windee@gmail.com', '2018-09-27 13:36:59', NULL),
(19, 48, 'windee', 'palpallatoc', 'ignacio', 'garden', '09000000044', NULL, 'windee@yahoo.com', '2018-09-27 13:38:50', NULL),
(20, 49, 'Angelica', 'Grabanzor', 'Llanes', 'Seoul, Ilocos sur', '09171550423', NULL, 'jellybee@yahoo.com', '2018-09-27 13:53:13', NULL),
(29, 54, 'Janella', 'hoya', 'ignacio', 'san nicolas', 'aaaaaa', NULL, 'jellygrabaor8@gmail.com', '2018-10-02 00:55:44', NULL),
(30, 55, 'jeli', 'Agpaoa', 'ignacio', 'New orleans, pangasinan', '0917', NULL, 'jellygracsdfbanzor@yahoo.com', '2018-10-02 00:56:55', NULL),
(31, 56, 'jeli', 'llanes', 'Middleton', 'Seoul, south korea', '09177771322', NULL, 'jellygrabanzor@tanga.com', '2018-10-02 00:59:25', NULL),
(32, 57, 'a', 'a', 'a', 'garden', '09177771390', NULL, 'jellygrabanzor@yahoo.com', '2018-10-02 01:00:21', NULL),
(33, 58, 'Kate', 'Middleton', 'Lacap', 'Texas, La Union', '09177771311', NULL, 'katemiddleton@gmail.com', '2018-10-03 12:44:00', NULL),
(34, 59, 'Angelica', 'Grabanzor', 'Llanes', 'Texas, La Union', '09177771390', NULL, 'angelica@yahoo.com', '2018-10-03 15:01:19', NULL),
(35, 60, 'ivy', 'palma', 'mae', 'san nicolas', '0919419860', NULL, 'ivymaepalma14@gmail.com', '2018-10-03 15:48:37', NULL),
(36, 61, 'albert', 'lacap', 'imaun', 'gibraltar', '09012334123', NULL, 'lacapalbert22@gmail.com', '2018-10-03 16:34:25', NULL),
(41, 63, ' ivy mae', ' palma', ' johnson', '  Tuding, Itogon, benguet', ' 09268148276', NULL, ' ivymaepalma1234@gmail.com', '2018-10-05 12:22:13', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`) VALUES
(1, 'wengweng03', 'wengweng', '2018-09-24 00:21:11', NULL),
(2, 'jelly', 'jelly', '2018-09-24 00:21:11', NULL),
(17, 'jeli', '$2y$10$WygNZITR4WU/KYP./CX3iOG2dts33j4Hbi1YXJvQ8IAzuTz./z4Oy', '2018-09-24 03:44:08', NULL),
(20, 'flower', '$2y$10$Nfm4KbkvdFYjc5A8LQKvO.Vkc8db44C2Fw19RswxQ2tvWkWGrod2K', '2018-09-26 14:49:12', NULL),
(21, 'tutubi', '$2y$10$mu7jSfX6JUDvL83pfbf8uefRkHm5UfWloedRVrbpfXwdMq.dJbMTW', '2018-09-26 14:55:33', NULL),
(23, 'bumblebee', '$2y$10$WOjuyho7B7xa3MJWB6SKOub.v8CTYss/YxxJvuD1/EKeXM3gs65Ie', '2018-09-26 15:26:35', NULL),
(24, 'hehe', '$2y$10$Rd4Qa2U0Ka0gRQ0jm.Ohwu3IU54a9gGHz/FqIjINKumi/eHMpmCwi', '2018-09-26 15:41:54', NULL),
(43, 'hayts', '$2y$10$JcGM9gyaHgqTCSL7elM97e9RQRTR6mqQqQc//DVmE8230iqEJwl.K', '2018-09-26 21:10:54', NULL),
(44, 'sawakas', '$2y$10$4vvjaN3UC1jUIR29qP.cXeuHVsk5aXa.hfsO1lR8bjGO1dVFrQb36', '2018-09-26 21:19:19', NULL),
(45, 'joshua', '$2y$10$8hovWWv2g0PmWeRHwA.a7OKD/GVtHwebPfa4MeZPJVlmYlGMM/HM2', '2018-09-26 21:40:10', NULL),
(46, 'albert', '$2y$10$auWbjxhv57Tq8Vzy0GtdUul1VgXkm/WnkEnxqA.7pnQbs.WPUFtuK', '2018-09-26 21:56:57', NULL),
(47, 'wengz', '$2y$10$B6IzcdMUrjI4KAncSrein.sPtuU6EMvI8w3BjGcuvWgOZvfsQT1j.', '2018-09-27 13:36:59', NULL),
(48, 'windee', '$2y$10$J1Kif.866jSGY5o7YElkvOHlVk5h8vecm20kMFK0PBGHqK7CGR3bS', '2018-09-27 13:38:50', NULL),
(49, 'jellybee', '$2y$10$rd1P/i5IL5T0cageTuYBz.G8vm0ik1syeFZGJLpZ6wLQ9OtjQlLv.', '2018-09-27 13:53:13', NULL),
(54, '123', '$2y$10$5LVdIgpZwaP8x2.Ut4YM5OW0qClq0VIlg4KlXmTGmTvjv/lGvqgBi', '2018-10-02 00:55:44', NULL),
(55, 'jellybeef', '$2y$10$a3EWcg1FwEiGw8d5bq08YOzSGcSHOzm0Stc8yOd39QfKuJftQVazO', '2018-10-02 00:56:55', NULL),
(56, 'aa222', '$2y$10$ejPNP9aHzL8GIdv1RnAcpeKpWEGGA75og7xWCUe6utVdRsysfr2Yy', '2018-10-02 00:59:25', NULL),
(57, 'ddddd', '$2y$10$gp7WZnkp.mKjJoQv2l1C6.xMQSGrdvNXUDR4Z7jA7xBntdH7/JqUS', '2018-10-02 01:00:21', NULL),
(58, 'queen', 'f9677754bc6f99407c8b87f4150229a2', '2018-10-03 12:44:00', NULL),
(59, 'angelica', '$2y$10$mGimxaQ7zuMFrdLUr1iESuRp.fOD6vExmZKK2EK6.KlxWICNGADb6', '2018-10-03 15:01:19', NULL),
(60, 'ivy1998', '$2y$10$H7Y/RRe5uQoq4A1k.m7owesbUbl3DVPaomYuXArLPDdB/u5W86VK6', '2018-10-03 15:48:37', NULL),
(61, 'lacap22', '$2y$10$DPLFNks35QMc8lmppfmDOOW9uYXP63Tlwv1SsljtsMUXL5nswpqI6', '2018-10-03 16:34:25', NULL),
(63, 'aybiaybi', '$2y$10$SRC4dYoPKgEEP8oUlIyHBeFEIy1.PMXCLInYTvl53C1AY1M1bOiEq', '2018-10-05 12:22:13', NULL);

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
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personalId2` (`personalId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `personalId`, `plateNumber`, `bodyType`, `yearModel`, `chasisNumber`, `engineClassification`, `numberOfCylinders`, `typeOfDriveTrain`, `make`, `series`, `color`, `engineNumber`, `typeOfEngine`, `engineDisplacement`, `status`, `created`, `modified`) VALUES
(1, 3, 'ABC-123', 'Cedan', '1997', NULL, NULL, NULL, NULL, 'Honda', 'Civic', 'Red', NULL, NULL, NULL, 'active', '2018-09-24 00:24:57', NULL);

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
