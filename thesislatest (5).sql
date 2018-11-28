-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2018 at 02:31 PM
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
-- Database: `thesislatest`
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
  PRIMARY KEY (`id`),
  KEY `personalId3` (`personalId`),
  KEY `serviceId` (`serviceId`),
  KEY `vehicleId` (`vehicleId`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `serviceId`, `vehicleId`, `personalId`, `otherService`, `additionalMessage`, `status`, `date`, `adminDate`, `created`, `modified`, `notification`) VALUES
(89, 'Change Oil,Check fuel filter', 8, 36, '420', 'umasa ka boy', 'Accepted', '2018-12-01', NULL, '2018-11-28 13:53:48', NULL, '1'),
(90, 'Change Oil,Check Cabin Filter', 8, 36, 'Wahaha', NULL, 'Overdue', '2018-11-28', NULL, '2018-11-28 13:30:24', NULL, '1'),
(93, 'Change Oil', 24, 36, 'Pakyu', 'asdfghj', 'Accepted', '2018-11-29', '2018-12-01', '2018-11-28 13:53:06', NULL, '1'),
(94, '', 9, 36, 'Please Check My wheels', NULL, 'Pending', '2018-11-29', NULL, '2018-11-28 22:11:30', NULL, '1'),
(95, 'Check headlights,Check tail lights', 8, 36, 'Hahaha', NULL, 'Pending', '2018-11-29', NULL, '2018-11-28 22:12:09', NULL, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chargeinvoice`
--

INSERT INTO `chargeinvoice` (`id`, `vehicleId`, `personalId`, `scopeId`, `sparePartsId`, `date`, `TotalPrice`, `created`, `modified`) VALUES
(2, 9, 36, '6', '1', '2018-11-22', 2000, '2018-11-24 18:02:43', NULL),
(6, 8, 36, NULL, '1', '2018-08-07', 1500, '2018-11-28 11:07:23', NULL),
(7, 8, 36, NULL, '1', '2018-08-07', 1500, '2018-11-28 11:07:55', NULL),
(8, 8, 36, NULL, '1', '2018-08-07', 1500, '2018-11-28 11:08:28', NULL),
(9, 8, 36, NULL, '1', '2018-02-02', 1000, '2018-11-28 11:16:59', NULL),
(10, 8, 36, 'Panel Beat - Right Sliding Door', '1', '2018-10-20', 2000, '2018-11-28 11:18:11', NULL),
(11, 8, 36, 'Recondition Brake System - Replace Brake Master Repair Kit,Recondition Brake System - Replace Brake Shoe', '1', '2018-03-03', 2000, '2018-11-28 11:18:46', NULL),
(12, 8, 36, 'Replace Tail Light(Right)', '1', '2018-03-03', 2000, '2018-11-28 11:41:48', NULL),
(13, 8, 36, 'Replace Tail Light(Right),Install dashboard lights, speedo meter ', '1,2', '2018-03-03', 2000, '2018-11-28 11:46:05', NULL),
(14, 8, 36, 'Recondition Brake System - Replace Brake Master Repair Kit,Recondition Brake System - Replace Brake Shoe', 'Exhaust', '2018-03-03', 2000, '2018-11-28 11:47:28', NULL),
(15, 8, 36, 'Panel Beat - Right Sliding Door,Panel Beat - Right Quarter Panel', 'Exhaust,Exhausted', '2018-06-06', 2000, '2018-11-28 11:49:28', NULL);

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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`, `created`, `status`) VALUES
(1, 'This is a special events about web development', '', '2018-02-12 00:00:00', '2018-02-16 00:00:00', '2018-02-10 00:00:00', 1),
(2, 'PHP Seminar 2018', '', '2018-02-11 00:00:00', '2018-02-17 00:00:00', '2018-02-10 00:00:00', 1),
(3, 'Bootstrap events 2018', '', '2018-02-4 00:00:00', '2018-02-4 00:00:00', '2018-02-01 00:00:00', 1),
(4, 'Developers events', '', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '2018-02-01 00:00:00', 1),
(5, 'Annual Conference 2018', '', '2018-02-05 00:00:00', '2018-02-05 00:00:00', '2018-02-01 00:00:00', 1),
(6, 'Bootstrap Annual events 2018', '', '2018-02-05 00:00:00', '2018-02-05 00:00:00', '2018-02-01 00:00:00', 1),
(7, 'HTML5 events', '', '2018-02-05 00:00:00', '2018-02-05 00:00:00', '2018-02-01 00:00:00', 1),
(8, 'PHP conference events 2018', '', '2018-02-08 00:00:00', '2018-02-08 00:00:00', '2018-02-02 00:00:00', 1),
(9, 'Web World events', '', '2018-02-08 00:00:00', '2018-02-08 00:00:00', '2018-02-01 00:00:00', 1),
(10, 'Wave PHP 2018', '', '2018-02-08 00:00:00', '2018-02-08 00:00:00', '2018-02-02 00:00:00', 1),
(11, 'Dev PHP 2018', '', '2018-02-08 00:00:00', '2018-02-08 00:00:00', '2018-02-01 00:00:00', 1),
(12, 'Seminar ', '', '2018-11-13 00:00:00', '2018-11-13 00:00:00', '2018-11-13 00:00:00', 1),
(13, 'fieldtrip', '', '2018-11-14 00:00:00', '2018-11-14 00:00:00', '2018-11-13 00:00:00', 0),
(15, 'Divisoria', '', '2018-11-16 00:00:00', '2018-11-16 00:00:00', '2018-11-13 00:00:00', 1),
(16, 'Byahe', '', '2018-11-14 00:00:00', '2018-11-15 00:00:00', '2018-11-14 00:00:00', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phoneNumber`, `message`, `date`) VALUES
(1, 'Albert Lacap Jr.', 'lacapalbert22@gmail.com', '09872345678', 'PAWER!', '2018-11-28 00:58:21'),
(2, '', '', '', 'hello', '2018-11-28 01:11:14'),
(3, '', '', '', 'try', '2018-11-28 01:11:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`personalId`, `user_id`, `firstName`, `lastName`, `middleName`, `suffix`, `address`, `mobileNumber`, `telephoneNumber`, `email`, `created`, `modified`) VALUES
(1, NULL, 'Weng', 'Palpallatoc', 'Ignacio', NULL, '#4 St.Ruth Petersville Subdivision Camp 7 Baguio', '09260023544', NULL, 'weng.great@gmail.com', '2018-09-24 00:14:00', '2018-09-24 00:00:00'),
(2, NULL, 'Jelly', 'Grabanzor', 'Llanes', NULL, 'New Lucban Baguio', '09123456789', NULL, 'jellygrabanzor@gmail.com', '2018-09-24 00:14:00', '2018-09-24 00:00:00'),
(3, 17, 'jeli', 'llanes', 'g', '', 'Seoul, south korea', '09177771390', '', 'jellyllanes@yahoo.com', '2018-09-24 03:44:08', '2018-11-19 02:25:17'),
(7, NULL, 'flower', 'flower', 'flower', NULL, 'garden', '09999999999', NULL, 'flower@gmail.com', '2018-09-26 14:49:12', NULL),
(8, NULL, 'tutubi', 'tutubi', 'tutubi', NULL, 'Tutubi, La Union', '09000000000', NULL, 'tutubi@yahoo.com', '2018-09-26 14:55:33', NULL),
(9, NULL, 'aybee', 'aybeee', 'aybee', NULL, 'aybe', '09177770001', NULL, 'aybe@gmail.com', '2018-09-26 15:37:56', NULL),
(10, NULL, 'aybee', 'aybeee', 'aybee', NULL, 'aybe', '09177770001', NULL, 'aybe@gmail.com', '2018-09-26 15:40:29', NULL),
(11, NULL, 'bobo', 'bobo', 'bobo', NULL, 'Texas, La Union', '09177771397', NULL, 'bobo@gmail.com', '2018-09-26 15:48:05', NULL),
(12, NULL, 'kurtz', 'kurtz', 'k', NULL, 'Texas, La Union', '09177770003', NULL, 'kurtz@gmail.com', '2018-09-26 15:53:01', NULL),
(13, 43, 'hayts', 'hayts', 'hayts', NULL, 'san nicolas', '09177771378', NULL, 'hayts@yahoo.com', '2018-09-26 21:10:54', NULL),
(14, 44, 'sawakas', 'sawakas', 'sawakas', NULL, 'Seoul, south korea', '09999999988', NULL, 'sawakas@gmail.com', '2018-09-26 21:19:19', NULL),
(15, 45, 'joshua', 'abubo', 'lacap', NULL, 'New orleans, pangasinan', '09177771256', NULL, 'joshua@yahoo.com', '2018-09-26 21:40:10', NULL),
(16, 46, 'albert', 'lacap', 'imuan', NULL, 'New orleans, pangasinan', '09000000024', NULL, 'albert@yahoo.com', '2018-09-26 21:56:57', NULL),
(17, 47, 'windee', 'palpallatoc', 'ignacio', NULL, 'Texas, La Union', '09177770088', NULL, 'windee@gmail.com', '2018-09-27 13:36:59', NULL),
(19, 48, 'windee', 'palpallatoc', 'ignacio', NULL, 'garden', '09000000044', NULL, 'windee@yahoo.com', '2018-09-27 13:38:50', NULL),
(20, 49, 'Angelica', 'Grabanzor', 'Llanes', NULL, 'Seoul, Ilocos sur', '09171550423', NULL, 'jellybee@yahoo.com', '2018-09-27 13:53:13', NULL),
(29, 54, 'Janella', 'hoya', 'ignacio', NULL, 'san nicolas', 'aaaaaa', NULL, 'jellygrabaor8@gmail.com', '2018-10-02 00:55:44', NULL),
(30, 55, 'jeli', 'Agpaoa', 'ignacio', NULL, 'New orleans, pangasinan', '0917', NULL, 'jellygracsdfbanzor@yahoo.com', '2018-10-02 00:56:55', NULL),
(31, 56, 'jeli', 'llanes', 'Middleton', NULL, 'Seoul, south korea', '09177771322', NULL, 'jellygrabanzor@tanga.com', '2018-10-02 00:59:25', NULL),
(32, 57, 'a', 'a', 'a', NULL, 'garden', '09177771390', NULL, 'jellygrabanzor@yahoo.com', '2018-10-02 01:00:21', NULL),
(33, 58, 'Kate', 'Middleton', 'Lacap', NULL, 'Texas, La Union', '09177771311', NULL, 'katemiddleton@gmail.com', '2018-10-03 12:44:00', NULL),
(34, 59, 'Angelica', 'Grabanzor', 'Llanes', NULL, 'Texas, La Union', '09177771390', NULL, 'angelica@yahoo.com', '2018-10-03 15:01:19', NULL),
(35, 60, 'ivy', 'palma', 'mae', NULL, 'san nicolas', '0919419860', NULL, 'ivymaepalma14@gmail.com', '2018-10-03 15:48:37', NULL),
(36, 61, 'albert', 'lacap', 'imaun', '', 'gibraltar', '09012334123', '0743334444', 'lacapalbert22@gmail.com', '2018-10-03 16:34:25', '2018-11-28 13:06:53'),
(41, 63, ' ivy mae', ' palma', ' johnson', NULL, '  Tuding, Itogon, benguet', ' 09268148276', NULL, ' ivymaepalma1234@gmail.com', '2018-10-05 12:22:13', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

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
(63, 'aybiaybi', '$2y$10$SRC4dYoPKgEEP8oUlIyHBeFEIy1.PMXCLInYTvl53C1AY1M1bOiEq', '2018-10-05 12:22:13', NULL),
(64, 'albert22', '$2y$10$5lXxj4vkgRXJwpBEB77qfuyjZ5LXTcX2vu/QlH6rPjhUZaR7tpWQC', '2018-11-11 18:23:48', NULL),
(65, 'jellybeebee', '$2y$10$URXiZpC8qvM9hDfsMIEqN.3p9C.RMWvAKRcviRU0oY05j4O62I4c.', '2018-11-12 16:17:27', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `personalId`, `plateNumber`, `bodyType`, `yearModel`, `chasisNumber`, `engineClassification`, `numberOfCylinders`, `typeOfDriveTrain`, `make`, `series`, `color`, `engineNumber`, `typeOfEngine`, `engineDisplacement`, `status`, `created`, `modified`) VALUES
(8, 36, 'ALB-234', NULL, '2010', NULL, NULL, NULL, NULL, 'Mitsubishi', '2010', 'Black', NULL, NULL, NULL, 'Active', '2018-11-23 00:47:44', NULL),
(9, 36, 'ARR-333', NULL, '2007', NULL, NULL, NULL, NULL, 'Subaru', 'Impreza', 'Black', NULL, NULL, NULL, 'Active', '2018-11-24 00:50:58', NULL),
(24, 36, 'XEG-123', NULL, '2012', NULL, NULL, NULL, NULL, 'Honda', 'Civic', 'Red', NULL, NULL, NULL, 'Active', '2018-11-28 13:13:03', NULL);

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
