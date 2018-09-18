-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2018 at 05:01 PM
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
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstName`, `middleName`, `lastName`, `date_created`, `date_modified`) VALUES
(2, 'admin', '$2y$10$umkamcqTd00tzQHGBcgFVugU7Bjsm28CVRoRUA5ujVtWv6jc7RsEW', 'admin', 'admin', 'admin', '2018-09-12 07:26:00', '2018-09-12 07:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `serviceId` int(11) NOT NULL,
  `vehicleId` int(255) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `serviceType` varchar(255) NOT NULL,
  `vehicleProblem` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `specialOffer` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicleId` (`vehicleId`),
  KEY `serviceId` (`serviceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `plateNumber` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `middleName`, `userEmail`, `password`, `phone`, `plateNumber`, `created`, `modified`) VALUES
(3, 'albie', 'Albert John', 'Lacap Jr.', 'I', 'albert@yahoo.com', '$2y$10$MuRIxIQq6fkwf/82ZQhfAeH2XpjE9dQ4iRYcqFHisRlI866DZdVeq', '09954250116', 'AYZ-3222', '2018-09-10 07:42:35', '2018-09-18 07:00:32'),
(14, 'jellythelegendstar', 'Jellystar', 'Grabgrab', 'Llanlan', 'jellythelegendstar@gmail.com', '$2y$10$viavaUet0ezxmx0NaECW8.dy40O8/5XxYp7i0Ifahbv6c1QFyu6tW', '09171559423', 'FAB-998', '2018-09-17 14:18:02', '2018-09-17 14:21:39'),
(15, 'cornyboy123', 'john corn', 'Sweer', 'irby', 'irbylord@yahoo.com', '$2y$10$1iZczVHnuNKmRRBLuT0Gp.nv4Lsi3Lb2/fipkV0pX12H9Js9T/9ba', '0908123123123', 'GST-123', '2018-09-18 15:27:34', '2018-09-18 15:27:34'),
(16, 'jr420123', 'albert johnny', 'wahaha', 'wadawjh', 'jdahwj@yahoo.com', '$2y$10$0YZZHP9yEE/bpnbQPIuHlOPI.A3z4nfi5sKAcqJdCYT6QEcnKGTSa', '09810298310', 'AYZ-123', '2018-09-18 16:19:52', '2018-09-18 16:19:52'),
(10, 'lacapalbert22', 'Albert', 'Lacap', 'Imua', 'albert22@yahoo.com', 'lacap', '090123123', 'AYZ123', '2018-09-12 18:17:59', '2018-09-12 18:17:59'),
(11, 'admin', 'admines', 'awdawd', 'awdawd', 'ulol@yaho.com', '$2y$10$RFOI2x4cAGpzx9ZzFb0yWOE35ratk/0qzMxT1l5tG/OwiHMSTqpp.', '01023981023', '123AAA', '2018-09-13 13:57:34', '2018-09-13 14:21:52'),
(12, 'johnnycar', 'Johnny', 'Cruz', 'M', 'johhny@gmail.com', '$2y$10$V2nxORotfBUEaTQXFTZ6qe1pb43IAerHn5EYXjM3yx09x/2lpbywu', '09042088123', 'AYZ-3222', '2018-09-13 17:44:23', '2018-09-13 17:44:23'),
(13, 'lodipetmalu', 'pet', 'malu', 'wahahah', 'petmalulodi@yahoo.com', '$2y$10$Uk8fz1g5nvzY8PQ4kO9nf.fkaGGqa2dVvn4SrgwtSsOGbhvgbyXUS', '123123123123123', 'AYZ-420', '2018-09-14 13:57:34', '2018-09-14 13:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `modified` datetime NOT NULL,
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
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
