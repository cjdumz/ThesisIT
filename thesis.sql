-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2018 at 06:41 AM
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
  `vehicleId` int(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `serviceName`, `serviceType`, `created`, `modified`) VALUES
(1, 'Mechanical', 'Repair', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(2, 'Mechanical', 'Replacement', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(3, 'Electrical', 'Repair', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(4, 'Electrical', 'Replacement', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(5, 'Customize', 'Repair', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(6, 'Customize', 'Replacement', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(7, 'Body Repair', 'Repair', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(8, 'Body Repair', 'Replacement', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(9, 'Body Paint', 'Repair', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(10, 'Body Paint', 'Replacement', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(11, 'Maintenance', 'Repair', '2018-09-10 00:00:00', '2018-09-10 00:00:00'),
(12, 'Maintenance', 'Replacement', '2018-09-10 00:00:00', '2018-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `middleName`, `lastName`, `type`, `status`, `date_created`, `date_modified`) VALUES
(4, 'admin', '$2y$10$fj.Nu5fnFsaubJ3.J63zAeejs0PqJDsoWZslqsNZNnQkIpzNGX556', 'admin', 'admin', 'admin', 'admin', 'active', '2018-09-12 06:35:00', '2018-09-12 06:35:00'),
(5, 'admin2', '$2y$10$c0IcNYdDviMHorF.fHvwxe2qPVF6BFoZPVYp/EfN5C0owr0jnthNq', 'admin2', 'admin2', 'admin2', 'admin', 'active', '2018-09-12 06:38:00', '2018-09-12 06:38:00');

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `serviceId` FOREIGN KEY (`serviceId`) REFERENCES `services` (`serviceId`),
  ADD CONSTRAINT `vehicleId` FOREIGN KEY (`vehicleId`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
