-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2018 at 07:46 PM
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
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstName`, `middleName`, `lastName`, `date_created`, `date_modified`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '', '', '2018-09-12 07:26:00', '2018-09-12 07:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `serviceId` varchar(255) NOT NULL,
  `vehicleId` int(255) NOT NULL,
  `personalId` int(11) NOT NULL,
  `otherService` varchar(255) DEFAULT NULL,
  `additionalMessage` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `adminDate` date DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `notification` varchar(255) DEFAULT NULL,
  `targetEndDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personalId3` (`personalId`),
  KEY `serviceId` (`serviceId`),
  KEY `vehicleId` (`vehicleId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `serviceId`, `vehicleId`, `personalId`, `otherService`, `additionalMessage`, `status`, `date`, `adminDate`, `created`, `modified`, `notification`, `targetEndDate`) VALUES
(1, 'Change Oil,Check fuel filter', 1, 1, 'Please Also See My Tire', NULL, 'Pending', '2018-11-30', NULL, '2018-11-29 00:24:28', NULL, '1', NULL),
(2, 'simple retouch,Body Repair', 3, 2, 'Please Make My Vehicle Beautiful', NULL, 'Accepted', '2018-12-05', NULL, '2018-11-29 00:33:02', NULL, '1', NULL),
(3, 'check battery', 4, 3, 'Can\'t start the engine too', NULL, 'Done', '2018-12-24', NULL, '2018-11-29 00:37:46', NULL, '1', NULL),
(4, 'Check brakes', 7, 6, 'How much will it cost me ? ', NULL, 'In-progress', '2019-01-26', NULL, '2018-11-29 00:52:40', NULL, '1', NULL),
(5, 'Body Repair,Customize', 6, 5, 'Make it vintage', NULL, 'Declined', '2018-12-15', NULL, '2018-11-29 00:55:04', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chargeinvoice`
--

DROP TABLE IF EXISTS `chargeinvoice`;
CREATE TABLE IF NOT EXISTS `chargeinvoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicleId` int(11) NOT NULL,
  `personalId` int(11) NOT NULL,
  `scopeId` varchar(255) DEFAULT NULL,
  `sparePartsId` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal` (`vehicleId`),
  KEY `personal2` (`personalId`),
  KEY `sparepart` (`sparePartsId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chargeinvoice`
--

INSERT INTO `chargeinvoice` (`id`, `vehicleId`, `personalId`, `scopeId`, `sparePartsId`, `date`, `TotalPrice`, `created`, `modified`) VALUES
(1, 6, 5, 'Recondition accelerator mechanism - Replace Assorted Bushings,Replace Stud Bolts,Replace Fan Belt', 'Exhaust', '2018-11-30', 10000, '2018-11-29 01:02:04', NULL),
(2, 1, 1, 'Repaint whole vehicle,Buff the whole vehicle', NULL, '2018-11-29', 15000, '2018-11-29 01:03:25', NULL),
(3, 7, 6, 'Check Seat belts', NULL, '2018-11-30', 850, '2018-11-29 01:07:43', NULL),
(4, 4, 3, 'Replace Tail Light(Right),Install Antenna', 'Exhaust', '2018-11-29', 20000, '2018-11-29 01:08:22', NULL),
(5, 1, 1, 'Recondition Brake System - Replace Brake Master Repair Kit,Repaint whole vehicle', NULL, '2018-11-29', 20000, '2018-11-29 01:14:43', NULL),
(6, 8, 7, 'New upholstery, new chair upholstery, new inside carpet', NULL, '2018-12-07', 10000, '2018-11-29 01:15:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daterestricted`
--

DROP TABLE IF EXISTS `daterestricted`;
CREATE TABLE IF NOT EXISTS `daterestricted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daterestricted`
--

INSERT INTO `daterestricted` (`id`, `date`, `status`, `modified`, `created`) VALUES
(1, '2018-12-12', 'Accepted', NULL, '2018-11-25 00:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `message` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `make_series`
--

DROP TABLE IF EXISTS `make_series`;
CREATE TABLE IF NOT EXISTS `make_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(255) DEFAULT NULL,
  `series` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make_series`
--

INSERT INTO `make_series` (`id`, `make`, `series`) VALUES
(1, 'Mitsubishi', 'Lancer'),
(2, 'Honda', 'Civic'),
(3, 'Toyota', 'Fortuner'),
(4, 'Hyundai', 'Grand Starex'),
(5, 'Toyota', 'Hiace'),
(6, 'Toyota', 'Innova'),
(7, 'Toyota', '`Land Cruiser'),
(8, 'Mitsubishi', 'Adventure'),
(9, 'Mitsubishi', 'Mirage'),
(10, 'Ford', 'Ecosport');

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
  `middleName` varchar(250) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `mobileNumber` varchar(250) NOT NULL,
  `telephoneNumber` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`personalId`),
  KEY `userId` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`personalId`, `user_id`, `firstName`, `lastName`, `middleName`, `suffix`, `address`, `mobileNumber`, `telephoneNumber`, `email`, `created`, `modified`) VALUES
(1, 1, 'Juan', 'Dela Cruz', 'Carlos', NULL, 'new', '09260023544', NULL, 'juandelacruz@gmail.com', '2018-11-29 00:21:37', NULL),
(2, 2, 'Maria', 'Makiling', 'Gretta', NULL, 'Petersville, Subdivision, Camp7', '09560669020', NULL, 'mariamakiling@gmail.com', '2018-11-29 00:31:11', NULL),
(3, 3, 'Fernando', 'Delfino', 'Carpio', NULL, 'Tuding, Itogon', '09123456789', NULL, 'fernando@gmail.com', '2018-11-29 00:35:49', NULL),
(4, 4, 'Sarah', 'Cruz', 'Reyes', NULL, 'La Trinindad, Benguet', '09789456123', NULL, 'sarahcruz@gmail.com', '2018-11-29 00:45:21', NULL),
(5, 5, 'John', 'Bautista', 'Ocampo', NULL, 'Binalonan, Pangasinan', '09147258369', NULL, 'johnbautista@gmail.com', '2018-11-29 00:48:02', NULL),
(6, 6, 'Mary Joy', 'Torres', 'Mendoza', NULL, 'Aurora Hill, Baguio City', '09369258147', NULL, 'maryjoy@gmail.com', '2018-11-29 00:50:41', NULL),
(7, NULL, 'Nicole', 'Villanueva', 'Andrada', '', 'Petersville Subdivision, Camp7, Baguio', '09268415397', '0743334444', 'itsmenicole@gmail.com', '2018-11-29 01:12:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scope`
--

DROP TABLE IF EXISTS `scope`;
CREATE TABLE IF NOT EXISTS `scope` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scopeWork` varchar(255) NOT NULL,
  `subScope` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scope`
--

INSERT INTO `scope` (`id`, `scopeWork`, `subScope`, `price`, `created`, `modified`) VALUES
(1, 'Mechanical Job', 'Recondition Brake System - Replace Brake Master Repair Kit', NULL, '2018-11-24 16:39:20', NULL),
(2, 'Mechanical Job', 'Recondition Brake System - Flush Down and Bleed Fluid System', NULL, '2018-11-24 16:43:31', NULL),
(3, 'Mechanical Job', 'Recondition Brake System - Clean Drum Brakes and Calipers', NULL, '2018-11-24 16:43:31', NULL),
(4, 'Mechanical Job', 'Recondition Brake System - Replace Brake Shoe', NULL, '2018-11-24 16:46:47', NULL),
(5, 'Mechanical Job', 'Recondition Brake System - Replace Brake Pads', NULL, '2018-11-24 16:46:47', NULL),
(6, 'Mechanical Job', 'Recondition accelerator mechanism - Replace Assorted Bushings', NULL, '2018-11-24 16:48:38', NULL),
(115, 'Mechanical job', 'Replace all bulbs', NULL, '2018-11-24 17:14:08', NULL),
(116, 'Mechanical job', 'Wiper Blades', NULL, '2018-11-24 17:14:08', NULL),
(117, 'Mechanical job', 'Overhaul - Change Nozzle Tips', NULL, '2018-11-24 17:14:08', NULL),
(118, 'Mechanical job', 'Overhaul - Change oil', NULL, '2018-11-24 17:14:08', NULL),
(119, 'Mechanical job', 'Overhaul - Change Oil Filter', NULL, '2018-11-24 17:14:08', NULL),
(120, 'Mechanical job', 'Overhaul - Change Transmission Oil', NULL, '2018-11-24 17:14:08', NULL),
(121, 'Mechanical job', 'Overhaul - Change Air Filter', NULL, '2018-11-24 17:14:08', NULL),
(122, 'Mechanical job', 'Wheel balance', NULL, '2018-11-24 17:14:08', NULL),
(123, 'Mechanical job', 'Replace Stud Bolts', NULL, '2018-11-24 17:14:08', NULL),
(124, 'Mechanical job', 'Replace Side Mirror', NULL, '2018-11-24 17:14:08', NULL),
(125, 'Mechanical job', 'Replace Engine fan blade', NULL, '2018-11-24 17:14:08', NULL),
(126, 'Mechanical job', 'Replace Fan Belt', NULL, '2018-11-24 17:14:08', NULL),
(127, 'Mechanical job', 'Replace brake, accelerator, clutch pads', NULL, '2018-11-24 17:14:08', NULL),
(128, 'Mechanical job', 'Replace battery', NULL, '2018-11-24 17:14:08', NULL),
(129, 'Mechanical job', 'Replace radiator', NULL, '2018-11-24 17:14:08', NULL),
(130, 'Painting and Body Repair Job', 'Panel Beat - Right Sliding Door', NULL, '2018-11-24 17:14:08', NULL),
(131, 'Painting and Body Repair Job', 'Panel Beat - Right Quarter Panel', NULL, '2018-11-24 17:14:08', NULL),
(132, 'Painting and Body Repair Job', 'Panel Beat - Front Bumper', NULL, '2018-11-24 17:14:08', NULL),
(133, 'Painting and Body Repair Job', 'Panel Beat - Right Front Door', NULL, '2018-11-24 17:14:08', NULL),
(134, 'Painting and Body Repair Job', 'Panel Beat - Front Facia', NULL, '2018-11-24 17:14:08', NULL),
(135, 'Painting and Body Repair Job', 'Panel Beat - Rear Bumper', NULL, '2018-11-24 17:14:08', NULL),
(136, 'Painting and Body Repair Job', 'Fix sliding Door mechanism', NULL, '2018-11-24 17:14:08', NULL),
(137, 'Painting and Body Repair Job', 'Repaint whole vehicle', NULL, '2018-11-24 17:14:08', NULL),
(138, 'Painting and Body Repair Job', 'Buff the whole vehicle', NULL, '2018-11-24 17:14:08', NULL),
(139, 'Painting and Body Repair Job', 'Buff the rear bumper', NULL, '2018-11-24 17:14:08', NULL),
(140, 'Painting and Body Repair Job', 'Paint the grill with black', NULL, '2018-11-24 17:14:08', NULL),
(141, 'Painting and Body Repair Job', 'Paint the rims with black', NULL, '2018-11-24 17:14:08', NULL),
(142, 'Painting and Body Repair Job', 'Wax and polish the whole vehicle', NULL, '2018-11-24 17:14:08', NULL),
(143, 'Electrical Job', 'Replace Tail Light(Right)', NULL, '2018-11-24 17:14:08', NULL),
(144, 'Electrical Job', 'Install new stereo/radio', NULL, '2018-11-24 17:14:08', NULL),
(145, 'Electrical Job', 'Install dashboard lights, speedo meter ', NULL, '2018-11-24 17:14:08', NULL),
(146, 'Electrical Job', 'Install Antenna', NULL, '2018-11-24 17:14:08', NULL),
(147, 'Others', 'Refill Aircon Freon', NULL, '2018-11-24 17:14:08', NULL),
(148, 'Others', 'New upholstery, new chair upholstery, new inside carpet', 17000, '2018-11-24 17:14:08', NULL),
(149, 'Others', 'Replace Tint', 3500, '2018-11-24 17:14:08', NULL),
(150, 'Others', 'Check Seat belts', NULL, '2018-11-24 17:14:08', NULL);

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
-- Table structure for table `spareparts`
--

DROP TABLE IF EXISTS `spareparts`;
CREATE TABLE IF NOT EXISTS `spareparts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spareparts`
--

INSERT INTO `spareparts` (`id`, `name`, `price`, `created`, `modified`) VALUES
(1, 'Exhaust', 200, '2018-11-24 17:35:15', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`) VALUES
(1, 'juandelacruz', '$2y$10$/Ro0.1TnKBS50Mj/j52Yo.zcKtRHvwGfHyFjEHHpv9R/Hg8YvGI0K', '2018-11-29 00:21:37', NULL),
(2, 'mariamakiling', '$2y$10$/RwNwB4XPuJ4dwEWNbANYu/VQQOhf6nar94X4ehknb.aaBp99vQ7u', '2018-11-29 00:31:11', NULL),
(3, 'fernando', '$2y$10$g0WKURBYU4K2bMW3Wq5jF.SbbxT2JkHLgqlOaG9jpMJ7HWAV2Ok9e', '2018-11-29 00:35:49', NULL),
(4, 'sarahcruz', '$2y$10$pDStHl/lUnEWGMQUO7RBHuuuCydhJ.k1ZJcu9s5GHPsl6or3ocee.', '2018-11-29 00:45:21', NULL),
(5, 'johnbautista', '$2y$10$/0gl9XdzJ9PYrdMGUqMjy.p3mLB4ZLpOC6sNw.oBkbaZj0gzASb7.', '2018-11-29 00:48:02', NULL),
(6, 'maryjoy', '$2y$10$5Q01.XMpOXQHiS7OmhcHXe9uJh/HDORIW50riZJFuMtuZ7qrS4hga', '2018-11-29 00:50:41', NULL);

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
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personalId2` (`personalId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `personalId`, `plateNumber`, `bodyType`, `yearModel`, `chasisNumber`, `engineClassification`, `numberOfCylinders`, `typeOfDriveTrain`, `make`, `series`, `color`, `engineNumber`, `typeOfEngine`, `engineDisplacement`, `status`, `created`, `modified`) VALUES
(1, 1, 'ABC-123', NULL, '2010', NULL, NULL, NULL, NULL, 'Honda', 'Civic', 'Yellow', NULL, NULL, NULL, 'Active', '2018-11-29 00:21:37', NULL),
(2, 1, 'EFG-456', NULL, '2012', NULL, NULL, NULL, NULL, 'Toyota', 'Inova', 'Blue', NULL, NULL, NULL, 'Active', '2018-11-29 00:26:12', '2018-11-29 00:26:33'),
(3, 2, 'HIJ-789', NULL, '2001', NULL, NULL, NULL, NULL, 'Toyota', 'Corolla', 'Red', NULL, NULL, NULL, 'Active', '2018-11-29 00:31:11', NULL),
(4, 3, 'KLM-012', NULL, '2008', NULL, NULL, NULL, NULL, 'Mitsubishi ', 'Lancer', 'Black', NULL, NULL, NULL, 'Active', '2018-11-29 00:35:49', NULL),
(5, 4, 'NOP-345', NULL, '2017', NULL, NULL, NULL, NULL, 'Ford', 'Ranger', 'Orange', NULL, NULL, NULL, 'Active', '2018-11-29 00:45:21', NULL),
(6, 5, 'JOB-666', NULL, '2017', NULL, NULL, NULL, NULL, 'Toyota', 'Wigo', 'Yellow', NULL, NULL, NULL, 'Active', '2018-11-29 00:48:02', NULL),
(7, 6, 'MJT-098', NULL, '2016', NULL, NULL, NULL, NULL, 'Hyundai', 'Eon', 'Pink', NULL, NULL, NULL, 'Active', '2018-11-29 00:50:41', NULL),
(8, 7, 'TER-567', '', '2010', '', '', '', '', 'Ford', 'Muztang', 'White/Blue', '', '', '', 'Active', '2018-11-29 01:13:35', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`personalId`) REFERENCES `personalinfo` (`personalId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`vehicleId`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `chargeinvoice`
--
ALTER TABLE `chargeinvoice`
  ADD CONSTRAINT `chargeinvoice_ibfk_1` FOREIGN KEY (`personalId`) REFERENCES `personalinfo` (`personalId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chargeinvoice_ibfk_2` FOREIGN KEY (`vehicleId`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
