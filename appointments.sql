-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2018 at 05:29 AM
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
  `serviceId` varchar(255) NOT NULL,
  `vehicleId` int(255) NOT NULL,
  `personalId` int(11) NOT NULL,
  `otherService` varchar(255) DEFAULT NULL,
  `additionalMessage` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `notification` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `personalId3` (`personalId`),
  KEY `serviceId` (`serviceId`),
  KEY `vehicleId` (`vehicleId`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `serviceId`, `vehicleId`, `personalId`, `otherService`, `additionalMessage`, `status`, `date`, `created`, `modified`, `notification`) VALUES
(1, '1', 1, 1, NULL, NULL, 'declined', '2018-09-26', '2018-09-24 00:33:35', NULL, 1),
(3, '1', 1, 3, NULL, NULL, 'Overdue', '2018-09-05', '2018-09-24 15:51:21', NULL, 1),
(5, '1', 1, 3, NULL, NULL, 'Rescheduled', '2018-09-27', '2018-09-24 16:44:33', NULL, 1),
(6, '1', 1, 3, NULL, NULL, 'Declined', '2018-09-27', '2018-09-24 16:44:57', NULL, 1),
(7, '5', 1, 3, NULL, NULL, 'Declined', '2018-10-05', '2018-10-03 02:34:14', NULL, 1),
(8, '1', 1, 3, NULL, NULL, 'Declined', '2018-10-17', '2018-10-03 14:16:03', NULL, 1),
(9, '1', 1, 3, NULL, NULL, 'Declined', '2018-10-17', '2018-10-03 14:16:28', NULL, 1),
(10, '3', 1, 3, '', '', 'Declined', '2018-10-11', '2018-10-03 14:25:15', NULL, 1),
(11, '3', 1, 3, 'Please check my wiper as well', '', 'Declined', '2018-10-11', '2018-10-03 14:27:36', NULL, 1),
(12, '3', 1, 3, 'Please check my wiper as well', 'Hello', 'Declined', '2018-10-11', '2018-10-03 14:28:00', NULL, 1),
(13, '8', 1, 3, 'Hello', 'hehe', 'Declined', '2018-10-10', '2018-10-03 15:42:56', NULL, 1),
(14, '6', 1, 3, '', '', 'Declined', '2018-10-17', '2018-10-03 16:00:21', NULL, 1),
(15, '4', 1, 3, '', '', 'Pending', '2018-11-08', '2018-10-03 16:01:20', NULL, 1),
(16, '2', 1, 3, '', '', 'Overdue', '2018-10-11', '2018-10-03 17:02:16', NULL, 1),
(18, '10', 1, 34, 'sadas', 'asdsad', 'asdasd', '2018-10-31', '2018-10-16 13:58:21', NULL, 1),
(19, '10', 1, 34, 'sadas', 'Pending', 'asdasd', '2018-10-31', '2018-10-16 13:59:10', NULL, 1),
(20, '1', 2, 36, 'asdafgfawgawg', NULL, 'active', '2018-11-09', '2018-11-05 15:24:22', NULL, 1),
(21, '2', 2, 36, 'awdawgawg', NULL, 'active', '2018-09-09', '2018-11-05 15:25:09', NULL, 1),
(22, '1', 2, 36, 'asdasdasd', NULL, 'active', '2018-09-09', '2018-11-05 15:32:37', NULL, 1),
(23, '2', 2, 36, 'asdasfasg', NULL, 'active', '2018-09-09', '2018-11-05 15:34:11', NULL, 1),
(24, '3', 2, 36, 'asdasdas', NULL, 'Accepted', '2081-02-01', '2018-11-05 15:35:24', NULL, 1),
(25, '8', 2, 36, 'asdasdf', 'asfasdas', 'active', '2018-11-15', '2018-11-05 15:36:57', NULL, 1),
(26, '2', 2, 36, 'asdasfasf', NULL, 'Accepted', '2018-02-01', '2018-11-05 15:37:54', NULL, 1),
(27, '1', 2, 36, 'asdasdsad', NULL, 'Accepted', '2018-25-11', '2018-11-05 16:00:37', NULL, 1),
(28, '1', 2, 36, 'asdasgasgasg', NULL, 'Reschedule', '2018-02-02', '2018-11-05 16:11:11', NULL, 1),
(29, '1', 2, 36, 'asdasd', NULL, 'active', '2018-02-02', '2018-11-05 16:19:28', NULL, 1),
(30, '6', 2, 36, 'awedawd', NULL, 'Pending', '2018-02-07', '2018-11-05 23:57:35', NULL, 1),
(31, '1', 2, 36, 'asdasd', NULL, 'Pending', '2018-02-02', '2018-11-06 01:54:28', NULL, 1),
(32, '6', 2, 36, 'asdasfgasg', NULL, 'Pending', '2018-11-20', '2018-11-06 15:49:22', NULL, 1),
(33, '1', 2, 36, 'Testing', NULL, 'Pending', '2018-11-06', '2018-11-06 15:51:34', NULL, 1),
(34, '1', 2, 36, 'Testing', NULL, 'Active', '2018-11-11', '2018-11-06 15:53:32', NULL, 1),
(35, '1', 2, 36, 'Kewl', NULL, 'Pending', '2018-02-02', '2018-11-11 00:55:43', NULL, 1),
(36, '1', 2, 36, 'Kewl\r\n', NULL, 'Pending', '2018-02-02', '2018-11-11 00:56:20', NULL, 1),
(37, '1', 2, 36, 'Kewl Very Nice', NULL, 'Pending', '2018-02-02', '2018-11-11 01:37:00', NULL, 1),
(38, '2', 2, 36, 'asdasd', NULL, 'Pending', '2018-02-02', '2018-11-11 02:00:34', NULL, 1),
(39, '1', 2, 36, 'Ha', NULL, 'Pending', '2018-03-03', '2018-11-11 02:14:48', NULL, 1),
(40, '1', 2, 36, 'Wut eto ren?\r\n', NULL, 'Pending', '2002-02-18', '2018-11-11 02:21:53', NULL, 1),
(41, '1', 2, 36, 'oww', NULL, 'Pending', '2002-02-18', '2018-11-11 02:29:05', NULL, 1),
(42, '1', 2, 36, 'Wehehehehehe', NULL, 'Pending', '2018-03-03', '2018-11-11 13:27:06', NULL, 1),
(43, '1', 2, 36, 'Wuttttt', NULL, 'Pending', '03/03/2018', '2018-11-11 13:30:11', NULL, 1),
(44, '1', 2, 36, 'Wut mayte', NULL, 'Pending', '02/02/2018', '2018-11-11 14:02:59', NULL, 1),
(45, '4', 2, 36, 'testing for this car', NULL, 'Pending', '03/03/2018', '2018-11-12 01:38:14', NULL, 1),
(46, '1', 2, 36, 'Kewl', NULL, 'Pending', '03/03/2018', '2018-11-12 03:19:19', NULL, 1),
(47, '1', 2, 36, 'askmdnaskjhd', NULL, 'Pending', '2018-03-03', '2018-11-12 12:49:47', NULL, 1),
(48, '1', 2, 36, 'asdafg', NULL, 'Pending', '2018-02-02', '2018-11-12 13:36:45', NULL, 1),
(49, '1', 2, 36, 'Hahahaha', NULL, 'Pending', '2018-02-02', '2018-11-12 13:38:18', NULL, 1),
(50, '1', 2, 36, 'Very Nice', NULL, 'Pending', '2018-11-14', '2018-11-12 23:44:49', NULL, 1),
(51, '1', 2, 36, 'A', NULL, 'Pending', '2018-11-14', '2018-11-13 00:07:02', NULL, 1),
(52, '1', 2, 36, 'Di ka balik', NULL, 'Pending', '2018-11-27', '2018-11-13 00:16:40', NULL, 1),
(53, '1', 2, 36, 'Ikaw hanggang ngayon', NULL, 'Pending', '2018-11-14', '2018-11-13 00:18:53', NULL, 1),
(54, '4', 2, 36, 'hanggang ang pusony', NULL, 'Pending', '2018-11-14', '2018-11-13 00:19:19', NULL, 1),
(55, '1', 2, 36, 'Bababalik', NULL, 'Pending', '2018-11-21', '2018-11-13 00:21:40', NULL, 1),
(56, '1', 2, 36, 'Kahit', NULL, 'Pending', '2018-11-19', '2018-11-13 00:24:45', NULL, 1),
(57, '1', 2, 36, 'DI mo alam', NULL, 'Pending', '2018-11-21', '2018-11-13 00:25:12', NULL, 1),
(58, '1', 2, 36, 'Aawit', NULL, 'Pending', '2018-11-14', '2018-11-13 00:30:31', NULL, 1),
(59, '4', 2, 36, 'Pangalan', NULL, 'Pending', '2018-11-21', '2018-11-13 00:30:54', NULL, 1),
(60, '1,4', 2, 36, 'Wahahahaha', NULL, 'Pending', '2018-11-14', '2018-11-13 00:42:32', NULL, 1),
(61, '1,2', 2, 36, 'Pay rent', NULL, 'Pending', '2018-11-21', '2018-11-13 23:30:44', NULL, 1),
(62, '4,5', 4, 36, 'Additional Message Here', NULL, 'Pending', '2018-11-22', '2018-11-13 23:47:02', NULL, 1),
(63, '1,4', 4, 36, 'Omamay', NULL, 'Pending', '2018-11-15', '2018-11-13 23:47:23', NULL, 1),
(64, '1', 3, 36, 'Wehehee', NULL, 'Pending', '2018-11-21', '2018-11-13 23:54:21', NULL, 1),
(65, '1', 3, 36, 'HAHAH', NULL, 'Pending', '2018-11-21', '2018-11-13 23:54:41', NULL, 1),
(66, '', 3, 36, 'Deep is your love\r\n', NULL, 'Pending', '2018-11-15', '2018-11-14 00:25:55', NULL, 1),
(67, '1,4', 2, 36, 'wahahah', NULL, 'Pending', '2018-11-21', '2018-11-18 21:29:54', NULL, 1),
(68, '1,2,4', 2, 36, 'ang dalangin ng pusoy iakw', NULL, 'Pending', '2018-11-29', '2018-11-18 21:57:00', NULL, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `personalId3` FOREIGN KEY (`personalId`) REFERENCES `personalinfo` (`personalId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicleId` FOREIGN KEY (`vehicleId`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
