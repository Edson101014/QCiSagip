-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 04:06 AM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u679900105_cap_pas`
--

-- --------------------------------------------------------

--
-- Table structure for table `abuse_report`
--

CREATE TABLE `abuse_report` (
  `id` int(11) NOT NULL,
  `report_id` varchar(255) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type_of_report` varchar(255) NOT NULL,
  `description` varchar(555) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `report_image` varchar(55) NOT NULL,
  `action_taken` varchar(255) NOT NULL,
  `processed_by` varchar(255) NOT NULL,
  `path` varchar(555) NOT NULL,
  `notification_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abuse_report`
--

INSERT INTO `abuse_report` (`id`, `report_id`, `user_id`, `email`, `type_of_report`, `description`, `address`, `latitude`, `longitude`, `datetime`, `report_image`, `action_taken`, `processed_by`, `path`, `notification_status`) VALUES
(1, 'report_645000895FD62A8', 'user_6447b7c3563fb', 'eballesmarlon@gmail.com', 'Wild Animal', 'Might not be able to get it to you for the sake of my mental health.', 'Eulogio Street, Quezon City, 1100 Metro Manila, Philippines', '14.7014479', '121.0820971', '2023-05-02 00:00:00', '645000895fd7d.jpeg', 'nice', 'superadmin001', 'uploads/645000895fd7d.jpeg', 0),
(2, 'report_645083238C1D176', 'user_6447b7c3563fb', 'eballesmarlon@gmail.com', 'Wild Animal', 'Sheesh', 'Eulogio Street, Quezon City, 1100 Metro Manila, Philippines', '14.7014427', '121.082093', '2023-05-02 00:00:00', '645083238c1fd.jpeg', 'reported to city c', '', 'uploads/645083238c1fd.jpeg', 0),
(3, 'report_645083EDD496B3F', 'user_6447b7c3563fb', 'eballesmarlon@gmail.com', 'Wild Animal', 'Test ', 'Eulogio Street, Quezon City, 1100 Metro Manila, Philippines', '14.7014432', '121.0820973', '2023-05-02 11:30:53', '645083edd4997.jpeg', 'reported to city vet 2', '', 'uploads/645083edd4997.jpeg', 0),
(4, 'report_645101683DAD852', 'user_6450f560cf864', 'ricky.jalayajay.soronel@gmail.com', 'Abused Animal', 'pinalo sa ulo', 'Quezon City Polytechnic University Main Campus, 617 Quirino Highway, Novaliches Reservoir, Quezon City, 1100 Metro Manila, Philippines', '14.7000463', '121.0344059', '2023-05-02 20:26:16', '645101683daff.jpeg', 'Update - Test 2', 'superadmin001', 'uploads/645101683daff.jpeg', 0),
(6, 'report_6453487B082A1C2', 'user_6450f560cf864', 'ricky.jalayajay.soronel@gmail.com', 'Abused Animal', 'try', 'CityState Hotel, P. Paterno Street, Quiapo, Manila, 1001 Metro Manila, Philippines', '14.5995124', '120.9842195', '2023-05-04 13:54:03', 'dog2.jfif', 'Update - Rescued', 'superadmin001', 'uploads/6453487b082ac_dog2.jfif', 0),
(7, 'report_6453D4BB8396AEA', 'user_6447b7c3563fb', 'eballesmarlon@gmail.com', 'Wild Animal', '123', '3', '', '', '2023-05-04 23:52:27', '1.4.jpg', '', '', 'uploads/6453d4bb83976_1.4.jpg', 0),
(8, 'report_6454AEFFC4770CD', 'user_6454aec5b741b', 'maquiling.408358190087@depedqc.ph', 'Wild Animal', 'Heyyy', 'Pilot Extension, Quezon City, 1100 Metro Manila, Philippines', '14.6952999', '121.0758503', '2023-05-05 15:23:43', 'received_766159718238936.jpeg', '', '', 'uploads/6454aeffc4789_received_766159718238936.jpeg', 0),
(9, 'report_6454C2040F3E51A', 'user_6454aec5b741b', 'maquiling.408358190087@depedqc.ph', 'Abused Animal', 'So poor', 'Pilot Extension, Quezon City, 1100 Metro Manila, Philippines', '14.6953161', '121.0758541', '2023-05-05 16:44:52', '6454c2040f419.jpeg', '', '', 'uploads/6454c2040f419.jpeg', 0),
(10, 'report_6454CCA8C7C792B', 'user_6454aec5b741b', 'maquiling.408358190087@depedqc.ph', 'Wild Animal', 'Wild snakee', 'Pilot Extension, Quezon City, 1100 Metro Manila, Philippines', '14.6953204', '121.0758461', '2023-05-05 17:30:16', '6454cca8c7c8d.jpeg', 'Rescued by QC Pound', 'superadmin001', 'uploads/6454cca8c7c8d.jpeg', 0),
(11, 'report_645AF0E983E771A', 'user_6454aec5b741b', 'maquiling.408358190087@depedqc.ph', 'Abused Animal', 'witwiwww', 'Quezon City Polytechnic University Main Campus, 617 Quirino Highway, Novaliches Reservoir, Quezon City, 1100 Metro Manila, Philippines', '14.700322', '121.0334748', '2023-05-10 09:18:33', '645af0e983e8e.jpeg', '', '', 'uploads/645af0e983e8e.jpeg', 0),
(12, 'report_645C7976B38D7A7', 'user_6423b4db93fc2', 'jlngcmy21@gmail.com', 'Abused Animal', 'awesome', 'Quezon City Polytechnic University Main Campus, 617 Quirino Highway, Novaliches Reservoir, Quezon City, 1100 Metro Manila, Philippines', '14.7007725', '121.0325564', '2023-05-11 13:13:26', '645c7976b38fc.jpeg', '', '', 'uploads/645c7976b38fc.jpeg', 0),
(13, 'report_645C798C2F2A9B4', 'user_6447b7c3563fb', 'eballesmarlon@gmail.com', 'Wild Animal', 'Test', 'Eulogio ', '', '', '2023-05-11 13:13:48', '645c798c2f2b8.jpeg', '', '', 'uploads/645c798c2f2b8.jpeg', 0),
(14, 'report_645DA4BE0515A8F', 'user_6454aec5b741b', 'maquiling.408358190087@depedqc.ph', 'Abused Animal', 'lakers numbawan', 'Santa Veronica, Quezon City, 1100 Metro Manila, Philippines', '14.703938', '121.0952197', '2023-05-12 10:30:22', 'received_1270270456949433.jpeg', 'kap nakuha na inabuse mo', 'superadmin001', 'uploads/645da4be05185_received_1270270456949433.jpeg', 0),
(15, 'report_645E6A98700A308', 'user_64238a1653700', 'chum.dexter.roderick.rubio@gmail.com', 'Abused Animal', 'Fjfjfufbdbjeuff', '32 yadayad', '', '', '2023-05-13 00:34:32', '645e6a98700c6.jpeg', 'hmmmm water', 'superadmin001', 'uploads/645e6a98700c6.jpeg', 0),
(16, 'report_645E6C2F39F94FE', 'user_64238a1653700', 'chum.dexter.roderick.rubio@gmail.com', 'Abused Animal', 'Fhygt7h', 'Hjgfyh554', '', '', '2023-05-13 00:41:19', '645e6c2f39fcf.jpeg', '', '', 'uploads/645e6c2f39fcf.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `users_id` varchar(20) NOT NULL,
  `user_type` varchar(55) NOT NULL,
  `activity` varchar(55) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `users_id`, `user_type`, `activity`, `date`, `time`) VALUES
(1, 'superadmin001', 'super admin', 'Logout', '2023-04-20 00:00:00', '00:00:00'),
(2, 'superadmin001', 'super admin', 'Login', '2023-04-20 00:00:00', '00:00:00'),
(3, 'superadmin001', 'super admin', 'Update service information', '2023-04-20 00:00:00', '00:00:00'),
(4, 'superadmin001', 'super admin', 'Update pet', '2023-04-20 00:00:00', '00:00:00'),
(5, 'superadmin001', 'super admin', 'Deactivate admin', '2023-04-20 00:00:00', '00:00:00'),
(6, 'superadmin001', 'super admin', 'Re-activate Admin', '2023-04-20 00:00:00', '00:00:00'),
(7, 'superadmin001', 'super admin', 'Update service information', '2023-04-20 00:00:00', '00:00:00'),
(8, 'superadmin001', 'super admin', 'Update service information', '2023-04-20 00:00:00', '00:00:00'),
(9, 'superadmin001', 'super admin', 'Update service information', '2023-04-20 00:00:00', '00:00:00'),
(10, 'superadmin001', 'super admin', 'Update service information', '2023-04-20 00:00:00', '00:00:00'),
(11, 'superadmin001', 'super admin', 'Update service information', '2023-04-20 00:00:00', '00:00:00'),
(12, 'superadmin001', 'super admin', 'Update service information', '2023-04-20 00:00:00', '00:00:00'),
(13, 'superadmin001', 'super admin', 'Login', '2023-04-20 00:00:00', '00:00:00'),
(14, 'superadmin001', 'super admin', 'Login', '2023-04-21 00:00:00', '00:00:00'),
(15, 'superadmin001', 'super admin', 'Login', '2023-04-21 00:00:00', '00:00:00'),
(16, 'superadmin001', 'super admin', 'Update service information', '2023-04-21 00:00:00', '00:00:00'),
(17, 'superadmin001', 'super admin', 'Update service information', '2023-04-21 00:00:00', '00:00:00'),
(18, 'superadmin001', 'super admin', 'Login', '2023-04-23 00:00:00', '00:00:00'),
(19, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-23 00:00:00', '00:00:00'),
(20, 'superadmin001', 'super admin', 'Login', '2023-04-23 00:00:00', '00:00:00'),
(21, 'superadmin001', 'super admin', 'Logout', '2023-04-23 00:00:00', '00:00:00'),
(22, 'superadmin001', 'super admin', 'Login', '2023-04-23 00:00:00', '00:00:00'),
(23, '', '', 'Add admin', '2023-04-23 00:00:00', '00:00:00'),
(24, '', '', 'Add admin', '2023-04-23 00:00:00', '00:00:00'),
(25, 'admin_6445361968025', 'super admin', 'Login', '2023-04-23 00:00:00', '00:00:00'),
(26, 'admin_6445361968025', 'super admin', 'Update pet', '2023-04-23 00:00:00', '00:00:00'),
(27, '', '', 'Add Service', '2023-04-23 00:00:00', '00:00:00'),
(28, 'superadmin001', 'super admin', 'Login', '2023-04-23 00:00:00', '00:00:00'),
(29, 'superadmin001', 'super admin', 'Update service information', '2023-04-23 00:00:00', '00:00:00'),
(30, 'superadmin001', 'super admin', 'Update service information', '2023-04-23 00:00:00', '00:00:00'),
(31, 'superadmin001', 'super admin', 'Update pet', '2023-04-23 00:00:00', '00:00:00'),
(32, 'admin_6445361968025', 'super admin', 'Added new pet', '2023-04-23 00:00:00', '00:00:00'),
(33, 'admin_6445361968025', 'super admin', 'Update pet', '2023-04-23 00:00:00', '00:00:00'),
(34, 'superadmin001', 'super admin', 'Added new pet', '2023-04-23 00:00:00', '00:00:00'),
(35, 'superadmin001', 'super admin', 'Added new pet', '2023-04-23 00:00:00', '00:00:00'),
(36, 'superadmin001', 'super admin', 'Re-activate Admin', '2023-04-23 00:00:00', '00:00:00'),
(37, 'superadmin001', 'super admin', 'Logout', '2023-04-23 00:00:00', '00:00:00'),
(38, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-23 00:00:00', '00:00:00'),
(39, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(40, 'superadmin001', 'super admin', 'Logout', '2023-04-24 00:00:00', '00:00:00'),
(41, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(42, 'superadmin001', 'super admin', 'Update service information', '2023-04-24 00:00:00', '00:00:00'),
(43, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(44, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(45, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(46, 'admin_644535dc1b6ee', 'super admin', 'Update pet', '2023-04-24 00:00:00', '00:00:00'),
(47, 'admin_644535dc1b6ee', 'super admin', 'Update pet', '2023-04-24 00:00:00', '00:00:00'),
(48, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(49, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(50, 'admin_6445361968025', 'super admin', 'Logout', '2023-04-24 00:00:00', '00:00:00'),
(51, 'admin_6445361968025', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(52, 'superadmin001', 'super admin', 'Logout', '2023-04-24 00:00:00', '00:00:00'),
(53, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(54, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(55, '', '', 'Add admin', '2023-04-24 00:00:00', '00:00:00'),
(56, 'superadmin001', 'super admin', 'Logout', '2023-04-24 00:00:00', '00:00:00'),
(57, 'admin_6446429fe0121', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(58, 'admin_6446429fe0121', 'super admin', 'Update service information', '2023-04-24 00:00:00', '00:00:00'),
(59, 'admin_6446429fe0121', 'super admin', 'Logout', '2023-04-24 00:00:00', '00:00:00'),
(60, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(61, 'superadmin001', 'super admin', 'Re-activate Admin', '2023-04-24 00:00:00', '00:00:00'),
(62, 'superadmin001', 'super admin', 'Re-activate Admin', '2023-04-24 00:00:00', '00:00:00'),
(63, 'superadmin001', 'super admin', 'Deactivate admin', '2023-04-24 00:00:00', '00:00:00'),
(64, 'superadmin001', 'super admin', 'Deactivate admin', '2023-04-24 00:00:00', '00:00:00'),
(65, 'superadmin001', 'super admin', 'Deactivate admin', '2023-04-24 00:00:00', '00:00:00'),
(66, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(67, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(68, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(69, '', '', 'Update service information', '2023-04-24 00:00:00', '00:00:00'),
(70, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(71, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(72, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(73, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(74, 'superadmin001', 'super admin', 'Update service information', '2023-04-24 00:00:00', '00:00:00'),
(75, 'superadmin001', 'super admin', 'Update service information', '2023-04-24 00:00:00', '00:00:00'),
(76, 'superadmin001', 'super admin', 'Add Service', '2023-04-24 00:00:00', '00:00:00'),
(77, 'superadmin001', 'super admin', 'Update service information', '2023-04-24 00:00:00', '00:00:00'),
(78, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(79, 'superadmin001', 'super admin', 'Added new pet', '2023-04-24 00:00:00', '00:00:00'),
(80, 'superadmin001', 'super admin', 'Added new pet', '2023-04-24 00:00:00', '00:00:00'),
(81, 'superadmin001', 'super admin', 'Update pet', '2023-04-24 00:00:00', '00:00:00'),
(82, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(83, '', '', 'Add admin', '2023-04-24 00:00:00', '00:00:00'),
(84, 'admin_640c3cc86b944', 'super admin', 'Logout', '2023-04-24 00:00:00', '00:00:00'),
(85, 'admin_644690f925dce', 'admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(86, 'admin_644690f925dce', 'admin', 'Update service information', '2023-04-24 00:00:00', '00:00:00'),
(87, 'admin_644690f925dce', 'admin', 'Update pet', '2023-04-24 00:00:00', '00:00:00'),
(88, 'superadmin001', 'super admin', 'Logout', '2023-04-24 00:00:00', '00:00:00'),
(89, 'superadmin001', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(90, 'admin_644690f925dce', 'admin', 'Update avatar', '2023-04-24 00:00:00', '00:00:00'),
(91, 'admin_644690f925dce', 'admin', 'Logout', '2023-04-24 00:00:00', '00:00:00'),
(92, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-24 00:00:00', '00:00:00'),
(93, 'superadmin001', 'super admin', 'Update pet', '2023-04-25 00:00:00', '00:00:00'),
(94, 'superadmin001', 'super admin', 'Login', '2023-04-25 00:00:00', '00:00:00'),
(95, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-25 00:00:00', '00:00:00'),
(96, 'admin_640c3cc86b944', 'super admin', 'Update avatar', '2023-04-25 00:00:00', '00:00:00'),
(97, 'admin_640c3cc86b944', 'super admin', 'Update avatar', '2023-04-25 00:00:00', '00:00:00'),
(98, 'admin_640c3cc86b944', 'super admin', 'Update avatar', '2023-04-25 12:26:47', '00:00:00'),
(99, 'admin_640c3cc86b944', 'super admin', 'Update avatar', '2023-04-25 12:29:28', '00:00:00'),
(100, 'admin_640c3cc86b944', 'super admin', 'Logout', '2023-04-25 12:29:48', '00:00:00'),
(101, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-25 12:29:54', '00:00:00'),
(102, 'admin_640c3cc86b944', 'super admin', 'Re-activate Admin', '2023-04-25 12:30:51', '00:00:00'),
(103, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 12:50:05', '00:00:00'),
(104, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 12:52:15', '00:00:00'),
(105, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 12:52:16', '00:00:00'),
(106, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 12:52:16', '00:00:00'),
(107, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 12:55:41', '00:00:00'),
(108, '', '', 'Add admin', '2023-04-25 12:56:51', '00:00:00'),
(109, 'admin_644535dc1b6ee', 'super admin', 'Deactivate admin', '2023-04-25 12:57:23', '00:00:00'),
(110, 'admin_644535dc1b6ee', 'super admin', 'Re-activate Admin', '2023-04-25 12:57:58', '00:00:00'),
(111, 'admin_644535dc1b6ee', 'super admin', 'Update pet', '2023-04-25 13:04:13', '00:00:00'),
(112, 'admin_644535dc1b6ee', 'super admin', 'Update pet', '2023-04-25 13:04:29', '00:00:00'),
(113, '', '', 'Logout', '2023-04-25 13:17:19', '00:00:00'),
(114, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 13:17:27', '00:00:00'),
(115, 'admin_644535dc1b6ee', 'super admin', 'Logout', '2023-04-25 13:18:04', '00:00:00'),
(116, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 13:18:15', '00:00:00'),
(117, 'admin_644535dc1b6ee', 'super admin', 'Logout', '2023-04-25 13:19:26', '00:00:00'),
(118, 'admin_64475d937cdb9', 'admin', 'Login', '2023-04-25 13:19:45', '00:00:00'),
(119, 'admin_64475d937cdb9', 'admin', 'Login', '2023-04-25 13:19:46', '00:00:00'),
(120, 'admin_64475d937cdb9', 'admin', 'Update avatar', '2023-04-25 13:20:45', '00:00:00'),
(121, 'admin_64475d937cdb9', 'admin', 'Update personal information', '2023-04-25 13:20:53', '00:00:00'),
(122, 'admin_64475d937cdb9', 'admin', 'Logout', '2023-04-25 13:20:55', '00:00:00'),
(123, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 13:21:05', '00:00:00'),
(124, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-04-25 13:21:07', '00:00:00'),
(125, 'admin_644535dc1b6ee', 'super admin', 'Added new pet', '2023-04-25 13:24:45', '00:00:00'),
(126, 'admin_644535dc1b6ee', 'super admin', 'Added new pet', '2023-04-25 13:24:45', '00:00:00'),
(127, 'admin_644535dc1b6ee', 'super admin', 'Update pet', '2023-04-25 13:25:16', '00:00:00'),
(128, 'admin_644535dc1b6ee', 'super admin', 'Logout', '2023-04-25 15:27:59', '00:00:00'),
(129, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-25 15:28:28', '00:00:00'),
(130, 'superadmin001', 'super admin', 'Login', '2023-04-25 16:18:39', '00:00:00'),
(131, 'admin_640c3cc86b944', 'super admin', 'Login', '2023-04-25 17:03:24', '00:00:00'),
(132, 'admin_640c3cc86b944', 'super admin', 'Logout', '2023-04-25 18:06:11', '00:00:00'),
(133, 'superadmin001', 'super admin', 'Login', '2023-04-25 19:38:30', '00:00:00'),
(134, 'superadmin001', 'super admin', 'Login', '2023-04-26 12:46:41', '00:00:00'),
(135, 'superadmin001', 'super admin', 'Login', '2023-04-26 13:19:30', '00:00:00'),
(136, 'superadmin001', 'super admin', 'Login', '2023-04-26 13:19:30', '00:00:00'),
(137, 'superadmin001', 'super admin', 'Login', '2023-04-26 13:19:31', '00:00:00'),
(138, 'superadmin001', 'super admin', 'Login', '2023-04-26 13:46:55', '00:00:00'),
(139, 'superadmin001', 'super admin', 'Logout', '2023-04-26 16:38:37', '00:00:00'),
(140, 'superadmin001', 'super admin', 'Login', '2023-04-26 18:32:25', '00:00:00'),
(141, 'superadmin001', 'super admin', 'Login', '2023-04-26 18:48:06', '00:00:00'),
(142, 'superadmin001', 'super admin', 'Login', '2023-04-26 20:22:08', '00:00:00'),
(143, 'superadmin001', 'super admin', 'Login', '2023-04-26 21:01:58', '00:00:00'),
(144, 'superadmin001', 'super admin', 'Login', '2023-04-27 11:02:29', '00:00:00'),
(145, 'superadmin001', 'super admin', 'Login', '2023-04-27 11:06:45', '00:00:00'),
(146, 'superadmin001', 'super admin', 'Login', '2023-04-27 14:27:21', '00:00:00'),
(147, 'superadmin001', 'super admin', 'Login', '2023-04-27 15:22:29', '00:00:00'),
(148, 'superadmin001', 'super admin', 'Login', '2023-04-29 09:45:00', '00:00:00'),
(149, 'superadmin001', 'super admin', 'Login', '2023-04-29 11:42:22', '00:00:00'),
(150, 'superadmin001', 'super admin', 'Login', '2023-04-29 13:21:03', '00:00:00'),
(151, 'superadmin001', 'super admin', 'Login', '2023-04-29 23:58:30', '00:00:00'),
(152, 'superadmin001', 'super admin', 'Login', '2023-04-30 11:38:29', '00:00:00'),
(153, 'superadmin001', 'super admin', 'Login', '2023-04-30 12:03:36', '00:00:00'),
(154, 'superadmin001', 'super admin', 'Login', '2023-04-30 15:03:45', '00:00:00'),
(155, 'superadmin001', 'super admin', 'Login', '2023-04-30 20:33:42', '00:00:00'),
(156, 'superadmin001', 'super admin', 'Login', '2023-04-30 20:36:59', '00:00:00'),
(157, 'superadmin001', 'super admin', 'Login', '2023-04-30 20:45:21', '00:00:00'),
(158, 'superadmin001', 'super admin', 'Login', '2023-04-30 23:15:53', '00:00:00'),
(159, 'superadmin001', 'super admin', 'Login', '2023-04-30 23:24:41', '00:00:00'),
(160, 'superadmin001', 'super admin', 'Login', '2023-05-01 13:49:47', '00:00:00'),
(161, 'superadmin001', 'super admin', 'Login', '2023-05-01 13:53:43', '00:00:00'),
(162, 'superadmin001', 'super admin', 'Login', '2023-05-01 17:57:33', '00:00:00'),
(163, 'superadmin001', 'super admin', 'Login', '2023-05-01 17:57:48', '00:00:00'),
(164, 'superadmin001', 'super admin', 'Login', '2023-05-01 18:30:47', '00:00:00'),
(165, 'superadmin001', 'super admin', 'Login', '2023-05-01 18:31:31', '00:00:00'),
(166, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-01 22:57:52', '00:00:00'),
(167, 'superadmin001', 'super admin', 'Login', '2023-05-01 23:56:39', '00:00:00'),
(168, 'superadmin001', 'super admin', 'Login', '2023-05-01 23:59:19', '00:00:00'),
(169, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 00:01:18', '00:00:00'),
(170, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 00:06:40', '00:00:00'),
(171, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 00:08:32', '00:00:00'),
(172, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 00:09:34', '00:00:00'),
(173, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 00:10:36', '00:00:00'),
(174, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 00:11:43', '00:00:00'),
(175, 'superadmin001', 'super admin', 'Login', '2023-05-02 01:19:28', '00:00:00'),
(176, 'superadmin001', 'super admin', 'Login', '2023-05-02 02:11:17', '00:00:00'),
(177, 'superadmin001', 'super admin', 'Logout', '2023-05-02 02:11:41', '00:00:00'),
(178, 'superadmin001', 'super admin', 'Login', '2023-05-02 07:59:42', '00:00:00'),
(179, 'superadmin001', 'super admin', 'Login', '2023-05-02 09:17:12', '00:00:00'),
(180, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:18:58', '00:00:00'),
(181, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:38:24', '00:00:00'),
(182, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:39:58', '00:00:00'),
(183, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:41:17', '00:00:00'),
(184, 'superadmin001', 'super admin', 'Login', '2023-05-02 09:41:33', '00:00:00'),
(185, 'superadmin001', 'super admin', 'Update service information', '2023-05-02 09:42:00', '00:00:00'),
(186, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:44:54', '00:00:00'),
(187, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:46:05', '00:00:00'),
(188, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:47:14', '00:00:00'),
(189, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:49:01', '00:00:00'),
(190, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:50:38', '00:00:00'),
(191, 'superadmin001', 'super admin', 'Added new pet', '2023-05-02 09:52:21', '00:00:00'),
(192, 'superadmin001', 'super admin', 'Login', '2023-05-02 11:09:53', '00:00:00'),
(193, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-02 12:33:23', '00:00:00'),
(194, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-02 12:45:34', '00:00:00'),
(195, 'superadmin001', 'super admin', 'Login', '2023-05-02 12:48:08', '00:00:00'),
(196, 'superadmin001', 'super admin', 'Add Service', '2023-05-02 13:00:23', '00:00:00'),
(197, 'superadmin001', 'super admin', 'Login', '2023-05-02 13:16:40', '00:00:00'),
(198, 'superadmin001', 'super admin', 'Login', '2023-05-02 13:42:50', '00:00:00'),
(199, 'superadmin001', 'super admin', 'Login', '2023-05-02 13:56:25', '00:00:00'),
(200, 'superadmin001', 'super admin', 'Login', '2023-05-02 14:34:39', '00:00:00'),
(201, 'superadmin001', 'super admin', 'Login', '2023-05-02 14:34:47', '00:00:00'),
(202, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-02 15:05:14', '00:00:00'),
(203, 'admin_644535dc1b6ee', 'super admin', 'Change password', '2023-05-02 15:13:25', '00:00:00'),
(204, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-02 15:16:35', '00:00:00'),
(205, 'superadmin001', 'super admin', 'Login', '2023-05-02 17:02:25', '00:00:00'),
(206, 'superadmin001', 'super admin', 'Login', '2023-05-02 18:59:45', '00:00:00'),
(207, 'superadmin001', 'super admin', 'Login', '2023-05-02 19:48:52', '00:00:00'),
(208, 'superadmin001', 'super admin', 'Login', '2023-05-03 00:21:21', '00:00:00'),
(209, 'superadmin001', 'super admin', 'Logout', '2023-05-03 00:21:55', '00:00:00'),
(210, 'superadmin001', 'super admin', 'Login', '2023-05-03 09:20:33', '00:00:00'),
(211, 'superadmin001', 'super admin', 'Login', '2023-05-03 10:22:58', '00:00:00'),
(212, 'superadmin001', 'super admin', 'Login', '2023-05-03 11:20:57', '00:00:00'),
(213, 'superadmin001', 'super admin', 'Login', '2023-05-03 11:36:58', '00:00:00'),
(214, 'superadmin001', 'super admin', 'Login', '2023-05-03 14:05:44', '00:00:00'),
(215, 'superadmin001', 'super admin', 'Login', '2023-05-03 14:20:10', '00:00:00'),
(216, 'superadmin001', 'super admin', 'Login', '2023-05-03 16:05:37', '00:00:00'),
(217, 'superadmin001', 'super admin', 'Login', '2023-05-03 16:23:43', '00:00:00'),
(218, 'superadmin001', 'super admin', 'Login', '2023-05-03 23:18:41', '00:00:00'),
(219, 'superadmin001', 'super admin', 'Login', '2023-05-04 01:16:15', '00:00:00'),
(220, 'superadmin001', 'super admin', 'Login', '2023-05-04 01:21:13', '00:00:00'),
(221, 'superadmin001', 'super admin', 'Login', '2023-05-04 01:23:27', '00:00:00'),
(222, '', '', 'Add admin', '2023-05-04 01:44:18', '00:00:00'),
(223, 'superadmin001', 'super admin', 'Login', '2023-05-04 02:33:35', '00:00:00'),
(224, 'superadmin001', 'super admin', 'Login', '2023-05-04 11:12:18', '00:00:00'),
(225, 'superadmin001', 'super admin', 'Login', '2023-05-04 11:45:58', '00:00:00'),
(226, 'superadmin001', 'super admin', 'Login', '2023-05-04 13:37:16', '00:00:00'),
(227, 'superadmin001', 'super admin', 'Login', '2023-05-04 13:53:16', '00:00:00'),
(228, 'superadmin001', 'super admin', 'Login', '2023-05-04 13:54:17', '00:00:00'),
(229, 'superadmin001', 'super admin', 'Login', '2023-05-04 13:56:59', '00:00:00'),
(230, 'superadmin001', 'super admin', 'Logout', '2023-05-04 14:06:16', '00:00:00'),
(231, 'admin_642b92f9d070f', 'admin', 'Login', '2023-05-04 14:06:25', '00:00:00'),
(232, 'superadmin001', 'super admin', 'Login', '2023-05-04 14:19:45', '00:00:00'),
(233, 'superadmin001', 'super admin', 'Login', '2023-05-04 14:25:48', '00:00:00'),
(234, 'superadmin001', 'super admin', 'Login', '2023-05-04 14:29:46', '00:00:00'),
(235, 'superadmin001', 'super admin', 'Login', '2023-05-04 15:09:49', '00:00:00'),
(236, 'superadmin001', 'super admin', 'Login', '2023-05-04 15:12:42', '00:00:00'),
(237, 'superadmin001', 'super admin', 'Login', '2023-05-04 16:55:33', '00:00:00'),
(238, 'superadmin001', 'super admin', 'Login', '2023-05-04 17:02:04', '00:00:00'),
(239, 'superadmin001', 'super admin', 'Login', '2023-05-04 19:03:55', '00:00:00'),
(240, 'superadmin001', 'super admin', 'Login', '2023-05-04 19:06:12', '00:00:00'),
(241, 'superadmin001', 'super admin', 'Login', '2023-05-04 20:22:10', '00:00:00'),
(242, 'superadmin001', 'super admin', 'Login', '2023-05-04 21:52:06', '00:00:00'),
(243, 'superadmin001', 'super admin', 'Login', '2023-05-04 22:02:59', '00:00:00'),
(244, 'superadmin001', 'super admin', 'Login', '2023-05-04 22:09:37', '00:00:00'),
(245, 'superadmin001', 'super admin', 'Login', '2023-05-04 22:49:24', '00:00:00'),
(246, 'superadmin001', 'super admin', 'Login', '2023-05-04 23:45:22', '00:00:00'),
(247, 'superadmin001', 'super admin', 'Login', '2023-05-04 23:57:33', '00:00:00'),
(248, 'superadmin001', 'super admin', 'Login', '2023-05-05 12:16:17', '00:00:00'),
(249, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:27:32', '00:00:00'),
(250, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-05 14:40:19', '00:00:00'),
(251, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-05 14:40:19', '00:00:00'),
(252, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:40:21', '00:00:00'),
(253, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:40:28', '00:00:00'),
(254, 'superadmin001', 'super admin', 'Logout', '2023-05-05 14:41:46', '00:00:00'),
(255, '', '', 'Logout', '2023-05-05 14:41:47', '00:00:00'),
(256, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:42:11', '00:00:00'),
(257, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:44:29', '00:00:00'),
(258, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:46:30', '00:00:00'),
(259, 'admin_644535dc1b6ee', 'super admin', 'Logout', '2023-05-05 14:48:30', '00:00:00'),
(260, 'admin_64475d937cdb9', 'admin', 'Login', '2023-05-05 14:49:20', '00:00:00'),
(261, 'admin_64475d937cdb9', 'admin', 'Logout', '2023-05-05 14:50:30', '00:00:00'),
(262, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:51:09', '00:00:00'),
(263, 'superadmin001', 'super admin', 'Logout', '2023-05-05 14:52:02', '00:00:00'),
(264, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-05 14:52:21', '00:00:00'),
(265, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-05 14:52:33', '00:00:00'),
(266, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:52:38', '00:00:00'),
(267, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:52:45', '00:00:00'),
(268, 'superadmin001', 'super admin', 'Logout', '2023-05-05 14:53:04', '00:00:00'),
(269, 'admin_64475d937cdb9', 'admin', 'Login', '2023-05-05 14:53:50', '00:00:00'),
(270, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:55:10', '00:00:00'),
(271, 'superadmin001', 'super admin', 'Login', '2023-05-05 14:56:35', '00:00:00'),
(272, 'superadmin001', 'super admin', 'Logout', '2023-05-05 14:58:56', '00:00:00'),
(273, 'admin_64475d937cdb9', 'admin', 'Login', '2023-05-05 14:59:35', '00:00:00'),
(274, 'admin_64475d937cdb9', 'admin', 'Login', '2023-05-05 15:00:18', '00:00:00'),
(275, 'superadmin001', 'super admin', 'Logout', '2023-05-05 15:00:43', '00:00:00'),
(276, 'admin_642b92f9d070f', 'admin', 'Login', '2023-05-05 15:00:51', '00:00:00'),
(277, 'superadmin001', 'super admin', 'Logout', '2023-05-05 15:01:07', '00:00:00'),
(278, 'admin_642b92f9d070f', 'admin', 'Logout', '2023-05-05 15:02:36', '00:00:00'),
(279, 'superadmin001', 'super admin', 'Login', '2023-05-05 15:02:44', '00:00:00'),
(280, 'superadmin001', 'super admin', 'Login', '2023-05-05 15:04:48', '00:00:00'),
(281, '', '', 'Add admin', '2023-05-05 15:06:39', '00:00:00'),
(282, 'superadmin001', 'super admin', 'Login', '2023-05-05 15:08:21', '00:00:00'),
(283, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-05 15:13:05', '00:00:00'),
(284, '', '', 'Add admin', '2023-05-05 15:13:56', '00:00:00'),
(285, 'superadmin001', 'super admin', 'Login', '2023-05-05 15:14:26', '00:00:00'),
(286, 'superadmin001', 'super admin', 'Login', '2023-05-05 15:35:21', '00:00:00'),
(287, 'superadmin001', 'super admin', 'Login', '2023-05-05 15:38:15', '00:00:00'),
(288, 'superadmin001', 'super admin', 'Logout', '2023-05-05 15:39:02', '00:00:00'),
(289, 'superadmin001', 'super admin', 'Login', '2023-05-05 15:39:12', '00:00:00'),
(290, 'superadmin001', 'super admin', 'Login', '2023-05-05 15:43:16', '00:00:00'),
(291, 'admin_644535dc1b6ee', 'super admin', 'Logout', '2023-05-05 15:47:32', '00:00:00'),
(292, 'admin_644535dc1b6ee', 'super admin', 'Login', '2023-05-05 15:47:43', '00:00:00'),
(293, 'admin_644535dc1b6ee', 'super admin', 'Logout', '2023-05-05 15:48:44', '00:00:00'),
(294, 'admin_64475d937cdb9', 'admin', 'Login', '2023-05-05 15:48:51', '00:00:00'),
(295, 'superadmin001', 'super admin', 'Login', '2023-05-05 16:10:37', '00:00:00'),
(296, 'admin_64475d937cdb9', 'admin', 'Update personal information', '2023-05-05 16:11:01', '00:00:00'),
(297, 'superadmin001', 'super admin', 'Login', '2023-05-05 16:11:10', '00:00:00'),
(298, 'superadmin001', 'super admin', 'Logout', '2023-05-05 16:33:06', '00:00:00'),
(299, 'superadmin001', 'super admin', 'Login', '2023-05-05 16:50:29', '00:00:00'),
(300, 'superadmin001', 'super admin', 'Logout', '2023-05-05 16:56:25', '00:00:00'),
(301, 'superadmin001', 'super admin', 'Login', '2023-05-05 17:15:32', '00:00:00'),
(302, 'superadmin001', 'super admin', 'Login', '2023-05-05 17:44:35', '00:00:00'),
(303, 'superadmin001', 'super admin', 'Login', '2023-05-05 18:13:41', '00:00:00'),
(304, 'superadmin001', 'super admin', 'Login', '2023-05-05 18:14:20', '00:00:00'),
(305, 'superadmin001', 'super admin', 'Added new pet', '2023-05-05 18:19:14', '00:00:00'),
(306, 'superadmin001', 'super admin', 'Added new pet', '2023-05-05 18:19:17', '00:00:00'),
(307, 'superadmin001', 'super admin', 'Login', '2023-05-09 19:21:21', '00:00:00'),
(308, 'superadmin001', 'super admin', 'Login', '2023-05-09 19:59:37', '00:00:00'),
(309, 'superadmin001', 'super admin', 'Login', '2023-05-09 19:59:37', '00:00:00'),
(310, 'superadmin001', 'super admin', 'Login', '2023-05-10 00:49:46', '00:00:00'),
(311, 'superadmin001', 'super admin', 'Login', '2023-05-10 01:03:38', '00:00:00'),
(312, 'superadmin001', 'super admin', 'Login', '2023-05-10 09:15:34', '00:00:00'),
(313, 'superadmin001', 'super admin', 'Login', '2023-05-10 09:40:30', '00:00:00'),
(314, 'superadmin001', 'super admin', 'Login', '2023-05-10 11:00:49', '00:00:00'),
(315, 'superadmin001', 'super admin', 'Login', '2023-05-11 10:58:10', '00:00:00'),
(316, 'superadmin001', 'super admin', 'Login', '2023-05-11 11:20:53', '00:00:00'),
(317, 'superadmin001', 'super admin', 'Login', '2023-05-11 11:20:53', '00:00:00'),
(318, 'superadmin001', 'super admin', 'Login', '2023-05-11 11:44:27', '00:00:00'),
(319, 'superadmin001', 'super admin', 'Login', '2023-05-11 11:47:47', '00:00:00'),
(320, 'superadmin001', 'super admin', 'Login', '2023-05-11 12:25:37', '00:00:00'),
(321, 'superadmin001', 'super admin', 'Login', '2023-05-11 12:59:22', '00:00:00'),
(322, 'superadmin001', 'super admin', 'Added new pet', '2023-05-11 13:29:07', '00:00:00'),
(323, 'superadmin001', 'super admin', 'Added new pet', '2023-05-11 13:30:10', '00:00:00'),
(324, 'superadmin001', 'super admin', 'Added new pet', '2023-05-11 13:31:34', '00:00:00'),
(325, 'superadmin001', 'super admin', 'Added new pet', '2023-05-11 13:33:00', '00:00:00'),
(326, 'superadmin001', 'super admin', 'Added new pet', '2023-05-11 13:34:50', '00:00:00'),
(327, 'superadmin001', 'super admin', 'Login', '2023-05-12 09:31:51', '00:00:00'),
(328, 'superadmin001', 'super admin', 'Login', '2023-05-12 09:43:18', '00:00:00'),
(329, 'superadmin001', 'super admin', 'Login', '2023-05-12 09:52:58', '00:00:00'),
(330, 'superadmin001', 'super admin', 'Login', '2023-05-12 09:58:07', '00:00:00'),
(331, 'superadmin001', 'super admin', 'Login', '2023-05-12 10:51:59', '00:00:00'),
(332, 'superadmin001', 'super admin', 'Login', '2023-05-12 12:10:01', '00:00:00'),
(333, 'superadmin001', 'super admin', 'Login', '2023-05-12 12:10:33', '00:00:00'),
(334, 'superadmin001', 'super admin', 'Login', '2023-05-12 12:15:12', '00:00:00'),
(335, 'superadmin001', 'super admin', 'Login', '2023-05-12 20:06:08', '00:00:00'),
(336, 'superadmin001', 'super admin', 'Logout', '2023-05-12 20:20:40', '00:00:00'),
(337, 'superadmin001', 'super admin', 'Login', '2023-05-12 20:21:02', '00:00:00'),
(338, 'superadmin001', 'super admin', 'Login', '2023-05-12 22:25:30', '00:00:00'),
(339, 'admin_64475d937cdb9', 'admin', 'Login', '2023-05-12 22:36:29', '00:00:00'),
(340, 'admin_64475d937cdb9', 'admin', 'Login', '2023-05-12 22:37:45', '00:00:00'),
(341, 'admin_64475d937cdb9', 'admin', 'Logout', '2023-05-12 22:38:30', '00:00:00'),
(342, 'superadmin001', 'super admin', 'Login', '2023-05-12 22:39:22', '00:00:00'),
(343, 'superadmin001', 'super admin', 'Login', '2023-05-12 22:46:52', '00:00:00'),
(344, 'admin_64475d937cdb9', 'admin', 'Login', '2023-05-13 18:41:27', '00:00:00'),
(345, 'superadmin001', 'super admin', 'Login', '2023-05-14 21:20:01', '00:00:00'),
(346, 'superadmin001', 'super admin', 'Login', '2023-05-15 11:12:27', '00:00:00'),
(347, 'superadmin001', 'super admin', 'Login', '2023-05-15 15:10:26', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `contact` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_id`, `firstname`, `lastname`, `email`, `contact`, `address`, `avatar`, `date_created`) VALUES
(1, 'superadmin001', 'recti', 'bytes', 'isagip.rectibytes@gmail.com\n', '09123456789', 'Quezon City University', '', '2023-03-10'),
(21, 'admin_640c3cf65fc05', '', '', 'melvinbacabis19@gmail.com', '', '', '', '2023-03-11'),
(22, 'admin_640c3d8f60d0d', '', '', 'bacabismelvin@gmail.com', '', '', '', '2023-03-11'),
(23, 'admin_640c3dbf911a1', 'Jessica', 'Bulleque', 'jessica.ombao.bulleque@gmail.com', '09123456789', 'commonwealth, ninada', 'admin_img-640c3e429d79a.jpg', '2023-03-11'),
(24, 'admin_64158f98a39e5', 'Ricky', 'Jalayajay', 'ricky.soronel.jalayajay@gmail.com', '09123456789', 'Luzon', 'admin_img-64159047dc745.jpg', '2023-03-18'),
(25, 'admin_6416c37787df6', '', '', 'marlon.union.eballes@gmail.com', '', '', '', '2023-03-19'),
(26, 'admin_64213b0599bc1', '', '', 'h.gaming.0125@gmail.com', '', '', '', '2023-03-27'),
(27, 'admin_6423141e242f5', '', '', 'edson98@gmail.com', '', '', '', '2023-03-29'),
(28, 'admin_642b92f9d070f', 'Charles Daniel', 'Habay', 'charles.daniel.habay@gmail.com', '09953310799', 'Sta. Veronica St. Brgy Payatas A Q.C', 'admin_img-642b938217a7f.png', '2023-04-04'),
(29, 'admin_644535dc1b6ee', 'Mark Anthony', 'Ampo', 'markampo30@gmail.com', '09275616645', 'Sa puso ni iya sheeeeesh', 'admin_img-64453ee1a714e.jpg', '2023-04-23'),
(30, 'admin_6445361968025', 'james', 'albani', 'james.albania110819@gmail.com', '09457735278', '1609 sampaguita st unit v brgy comm.wealth QC', 'admin_img-6445376ff0a45.jpg', '2023-04-23'),
(31, 'admin_6446429fe0121', 'Chum', 'Rubio', 'chumdexterrubio@gmail.com', '09221314324', 'Commonwealth', 'admin_img-64464391cfc70.jpg', '2023-04-24'),
(32, 'admin_644690f925dce', 'Jessica', 'Bulleque', 'jessicabulleque0121@gmail.com', '09821312432', '0123 Ninada Street', 'admin_img-64469762ca03b.jpg', '2023-04-24'),
(33, 'admin_64475d937cdb9', 'Mark', 'Anthony', 'mistugan1447@gmail.com', '09999999999', 'Sa puso ni liya SHEEEEEEEEEEEEESH', 'admin_img-6447632dbf2f6.png', '2023-04-25'),
(34, 'admin_64529d72e20a9', '', '', 'random@gmail.com', '', '', '', '2023-05-04'),
(35, 'admin_6454aafff0c69', '', '', 'rixieapolehabay@gmail.com', '', '', '', '2023-05-05'),
(36, 'admin_6454acb42e0e2', '', '', 'romeliehabay@gmail.com', '', '', '', '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `admin_status`
--

CREATE TABLE `admin_status` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `status` varchar(55) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_status`
--

INSERT INTO `admin_status` (`id`, `admin_id`, `status`, `datetime`) VALUES
(1, 'superadmin001', 'active', '2023-03-10 13:56:40'),
(21, 'admin_640c3cf65fc05', 'inactive', '2023-03-11 16:33:58'),
(22, 'admin_640c3d8f60d0d', 'inactive', '2023-03-11 16:36:31'),
(23, 'admin_640c3dbf911a1', 'active', '2023-03-11 16:37:19'),
(24, 'admin_64158f98a39e5', 'active', '2023-03-18 18:16:56'),
(25, 'admin_6416c37787df6', 'active', '2023-03-19 16:10:31'),
(26, 'admin_64213b0599bc1', 'active', '2023-03-27 14:43:17'),
(27, 'admin_6423141e242f5', 'active', '2023-03-29 00:21:50'),
(28, 'admin_642b92f9d070f', 'active', '2023-04-04 11:01:13'),
(29, 'admin_644535dc1b6ee', 'active', '2023-04-23 21:42:52'),
(30, 'admin_6445361968025', 'active', '2023-04-23 21:43:53'),
(31, 'admin_6446429fe0121', 'active', '2023-04-24 16:49:35'),
(32, 'admin_644690f925dce', 'active', '2023-04-24 22:23:53'),
(33, 'admin_64475d937cdb9', 'active', '2023-04-25 12:56:51'),
(34, 'admin_64529d72e20a9', 'active', '2023-05-04 01:44:18'),
(35, 'admin_6454aafff0c69', 'active', '2023-05-05 15:06:39'),
(36, 'admin_6454acb42e0e2', 'active', '2023-05-05 15:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `admin_temporary_account`
--

CREATE TABLE `admin_temporary_account` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `temp_pass` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_temporary_account`
--

INSERT INTO `admin_temporary_account` (`id`, `admin_id`, `email`, `temp_pass`, `status`) VALUES
(1, 'superadmin001', 'isagip.rectibytes@gmail.com\n', 'isagip.rectibytes@gmail.com\n', 'verified'),
(21, 'admin_640c3cf65fc05', 'melvinbacabis19@gmail.com', 'zUCEU3FC648NfY89', 'not verified'),
(22, 'admin_640c3d8f60d0d', 'bacabismelvin@gmail.com', 'wQAzTzSC8OlHrmyO', 'not verified'),
(23, 'admin_640c3dbf911a1', 'jessica.ombao.bulleque@gmail.com', 'samplepass', 'verified'),
(24, 'admin_64158f98a39e5', 'ricky.soronel.jalayajay@gmail.com', 'rickysample', 'verified'),
(25, 'admin_6416c37787df6', 'marlon.union.eballes@gmail.com', 'zbj7Rs6AQlRF2CXt', 'not verified'),
(26, 'admin_64213b0599bc1', 'h.gaming.0125@gmail.com', 'zZIutbekrNKStha2', 'not verified'),
(27, 'admin_6423141e242f5', 'edson98@gmail.com', 'hQfFsFUCPaPSCH9F', 'not verified'),
(28, 'admin_642b92f9d070f', 'charles.daniel.habay@gmail.com', 'habay1317', 'verified'),
(29, 'admin_644535dc1b6ee', 'markampo30@gmail.com', 'markampo', 'verified'),
(30, 'admin_6445361968025', 'james.albania110819@gmail.com', 'james12345', 'verified'),
(31, 'admin_6446429fe0121', 'chumdexterrubio@gmail.com', 'rubiochum', 'verified'),
(32, 'admin_644690f925dce', 'jessicabulleque0121@gmail.com', 'jessicabulleque', 'verified'),
(33, 'admin_64475d937cdb9', 'mistugan1447@gmail.com', 'markampo', 'verified'),
(34, 'admin_64529d72e20a9', 'random@gmail.com', 'UopBGqUkzqfy2Es6', 'not verified'),
(35, 'admin_6454aafff0c69', 'rixieapolehabay@gmail.com', 'DXLAALNDqnuu3gC4', 'not verified'),
(36, 'admin_6454acb42e0e2', 'romeliehabay@gmail.com', 'Sbqk63uluBBwVh0I', 'not verified');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_house`
--

CREATE TABLE `adoption_house` (
  `id` int(11) NOT NULL,
  `adoption_id` varchar(20) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_house`
--

INSERT INTO `adoption_house` (`id`, `adoption_id`, `user_id`, `images`) VALUES
(1, 'adopt_644ff7caaca25', 'user_6447b7c3563fb', 'uploads/adopt_644ff7caaca25_homeImage_0.jpg'),
(2, 'adopt_644ff8b8b0fa1', 'user_6447b7c3563fb', 'uploads/adopt_644ff8b8b0fa1_homeImage_0.jpg'),
(3, 'adopt_6450661e1c8e3', '108335001093346207746', 'uploads/adopt_6450661e1c8e3_homeImage_0.png'),
(4, 'adopt_64509bf4dcb94', '110097824208142333641', 'uploads/adopt_64509bf4dcb94_homeImage_0.jpg'),
(5, 'adopt_64509f0c793e7', '108124351070195328757', 'uploads/adopt_64509f0c793e7_homeImage_0.jpg'),
(6, 'adopt_6450a29bcb068', 'user_6447b7c3563fb', 'uploads/adopt_6450a29bcb068_homeImage_0.jpg'),
(7, 'adopt_6450b345095a4', '108335001093346207746', 'uploads/adopt_6450b345095a4_homeImage_0.jpg'),
(8, 'adopt_6450b612cf41d', '108335001093346207746', 'uploads/adopt_6450b612cf41d_homeImage_0.jpg'),
(9, 'adopt_6450c657606a2', '108335001093346207746', 'uploads/adopt_6450c657606a2_homeImage_0.jpg'),
(10, 'adopt_6450c6b720fb1', '108335001093346207746', 'uploads/adopt_6450c6b720fb1_homeImage_0.jpg'),
(11, 'adopt_6450c70813c41', '108335001093346207746', 'uploads/adopt_6450c70813c41_homeImage_0.jpg'),
(12, 'adopt_6450c8c47b3be', '108335001093346207746', 'uploads/adopt_6450c8c47b3be_homeImage_0.jpg'),
(13, 'adopt_6450c99a51c4b', '108335001093346207746', 'uploads/adopt_6450c99a51c4b_homeImage_0.jpg'),
(14, 'adopt_6450d31918a20', 'user_6423b0ccdeb06', 'uploads/adopt_6450d31918a20_homeImage_0.jpg'),
(15, 'adopt_6450f76787851', 'user_6450f560cf864', 'uploads/adopt_6450f76787851_homeImage_0.jpg'),
(16, 'adopt_6451d306ccebf', 'user_6447b7c3563fb', 'uploads/adopt_6451d306ccebf_homeImage_0.jpg'),
(17, 'adopt_6451f510c1e72', 'user_6447b7c3563fb', 'uploads/adopt_6451f510c1e72_homeImage_0.jpg'),
(18, 'adopt_6451f53d5e5fa', 'user_6447b7c3563fb', 'uploads/adopt_6451f53d5e5fa_homeImage_0.jpg'),
(19, 'adopt_6451f54797d79', 'user_6447b7c3563fb', 'uploads/adopt_6451f54797d79_homeImage_0.jpg'),
(20, 'adopt_6451f6e31fc55', 'user_6447b7c3563fb', 'uploads/adopt_6451f6e31fc55_homeImage_0.jpg'),
(21, 'adopt_6452722c6302e', 'user_6447b7c3563fb', 'uploads/adopt_6452722c6302e_homeImage_0.jpg'),
(22, 'adopt_6452a8f365335', 'user_6447b7c3563fb', 'uploads/adopt_6452a8f365335_homeImage_0.jpg'),
(23, 'adopt_6453224b282d0', 'user_6447b7c3563fb', 'uploads/adopt_6453224b282d0_homeImage_0.jpg'),
(24, 'adopt_6453bb09ddffa', 'user_6447b7c3563fb', 'uploads/adopt_6453bb09ddffa_homeImage_0.jpg'),
(25, 'adopt_6454a662ae175', 'user_6450f560cf864', 'uploads/adopt_6454a662ae175_homeImage_0.jpg'),
(26, 'adopt_6454ab15c3160', 'user_6454aa6a8ecab', 'uploads/adopt_6454ab15c3160_homeImage_0.jpg'),
(27, 'adopt_6454ac6b75ef3', '109314027644136413984', 'uploads/adopt_6454ac6b75ef3_homeImage_0.png'),
(28, 'adopt_6454ac6b75ef3', '109314027644136413984', 'uploads/adopt_6454ac6b75ef3_homeImage_1.jpg'),
(29, 'adopt_6454af5146d20', 'user_6447b7c3563fb', 'uploads/adopt_6454af5146d20_homeImage_0.jpg'),
(30, 'adopt_6454afae105e2', '109314027644136413984', 'uploads/adopt_6454afae105e2_homeImage_0.jpg'),
(31, 'adopt_6454afae105e2', '109314027644136413984', 'uploads/adopt_6454afae105e2_homeImage_1.jpg'),
(32, 'adopt_6454b3271ea6d', 'user_6447b7c3563fb', 'uploads/adopt_6454b3271ea6d_homeImage_0.jpg'),
(33, 'adopt_6454b68b6b295', '109314027644136413984', 'uploads/adopt_6454b68b6b295_homeImage_0.jpg'),
(34, 'adopt_6454b68b6b295', '109314027644136413984', 'uploads/adopt_6454b68b6b295_homeImage_1.jpg'),
(35, 'adopt_6454b762f290b', 'user_6454b5cb09a53', 'uploads/adopt_6454b762f290b_homeImage_0.jpg'),
(36, 'adopt_6454c89d26c7c', 'user_6454c7ca2c63f', 'uploads/adopt_6454c89d26c7c_homeImage_0.png'),
(37, 'adopt_6454ce7ed525b', 'user_640aed2572fc8', 'uploads/adopt_6454ce7ed525b_homeImage_0.png'),
(38, 'adopt_6454d126c506c', '109314027644136413984', 'uploads/adopt_6454d126c506c_homeImage_0.jpg'),
(39, 'adopt_645a2ca6ec07a', 'admin_642b92f9d070f', 'uploads/adopt_645a2ca6ec07a_homeImage_0.jpg'),
(40, 'adopt_645a7c8205b0a', 'user_6447b7c3563fb', 'uploads/adopt_645a7c8205b0a_homeImage_0.jpg'),
(41, 'adopt_645af5dc757a8', 'user_645af5367b084', 'uploads/adopt_645af5dc757a8_homeImage_0.jpg'),
(42, 'adopt_645c5db0caf2f', 'user_645c5ca60437d', 'uploads/adopt_645c5db0caf2f_homeImage_0.jpg'),
(43, 'adopt_645c5edb6c4f0', 'user_645c5af066bfa', 'uploads/adopt_645c5edb6c4f0_homeImage_0.jpg'),
(44, 'adopt_645c80e338b2c', 'user_645c805698837', 'uploads/adopt_645c80e338b2c_homeImage_0.jpg'),
(45, 'adopt_645d980159953', 'user_6450f560cf864', 'uploads/adopt_645d980159953_homeImage_0.jpg'),
(46, 'adopt_645d9cb18bb22', 'user_645d9c21cf789', 'uploads/adopt_645d9cb18bb22_homeImage_0.jpg'),
(47, 'adopt_645da9276ef85', 'user_645da8ab86dbc', 'uploads/adopt_645da9276ef85_homeImage_0.jpg'),
(48, 'adopt_645dae812b50c', 'user_645d9c21cf789', 'uploads/adopt_645dae812b50c_homeImage_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_reschedule`
--

CREATE TABLE `adoption_reschedule` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `old_schedule` date NOT NULL,
  `new_schedule` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `remark_resched` varchar(55) DEFAULT NULL,
  `mail_sent` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_reschedule`
--

INSERT INTO `adoption_reschedule` (`id`, `reference_no`, `old_schedule`, `new_schedule`, `reason`, `remark_resched`, `mail_sent`) VALUES
(13, '6454A662AE17AE9', '2023-05-05', '2023-05-08', 'I have Doctor\'s  Appointment that day.', 'decline', NULL),
(14, '6454CE7ED526149', '2023-05-05', '2023-05-15', 'Emergency', 'approve', 'sent'),
(15, '645D9CB18BB29AE', '2023-05-12', '2023-05-12', 'sample', 'decline', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adoption_schedule`
--

CREATE TABLE `adoption_schedule` (
  `id` int(11) NOT NULL,
  `adoption_id` varchar(20) NOT NULL,
  `date_of_schedule` date NOT NULL,
  `time` time NOT NULL,
  `mail_sent` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_schedule`
--

INSERT INTO `adoption_schedule` (`id`, `adoption_id`, `date_of_schedule`, `time`, `mail_sent`) VALUES
(1, 'adopt_644ff7caaca25', '2023-05-02', '01:32:58', 'sent'),
(2, 'adopt_644ff8b8b0fa1', '2023-05-02', '01:36:56', 'sent'),
(3, 'adopt_6450661e1c8e3', '2023-05-02', '09:23:42', 'sent'),
(4, 'adopt_64509bf4dcb94', '2023-05-03', '13:13:24', 'sent'),
(5, 'adopt_64509f0c793e7', '2023-05-02', '13:26:36', 'sent'),
(6, 'adopt_6450a29bcb068', '2023-05-02', '13:41:47', 'sent'),
(7, 'adopt_6450b345095a4', '2023-05-02', '14:52:53', 'sent'),
(8, 'adopt_6450b612cf41d', '2023-05-02', '15:04:50', 'sent'),
(9, 'adopt_6450c70813c41', '2023-05-02', '16:17:12', 'sent'),
(10, 'adopt_6450c8c47b3be', '2023-05-02', '16:24:36', 'sent'),
(11, 'adopt_6450c99a51c4b', '2023-05-02', '16:28:10', 'sent'),
(12, 'adopt_6450d31918a20', '2023-05-03', '17:08:41', 'sent'),
(13, 'adopt_6450f76787851', '2023-05-03', '19:43:35', 'sent'),
(14, 'adopt_6451d306ccebf', '2023-05-03', '11:20:38', NULL),
(15, 'adopt_6451f54797d79', '2023-05-03', '13:46:47', NULL),
(16, 'adopt_6451f6e31fc55', '2023-05-03', '13:53:39', NULL),
(17, 'adopt_6452722c6302e', '2023-05-03', '22:39:40', NULL),
(18, 'adopt_6452a8f365335', '2023-05-04', '02:33:23', NULL),
(19, 'adopt_6453224b282d0', '2023-05-04', '11:11:07', NULL),
(20, 'adopt_6453bb09ddffa', '2023-05-05', '22:02:49', 'sent'),
(21, 'adopt_6454a662ae175', '2023-05-05', '14:46:58', 'sent'),
(22, 'adopt_6454ab15c3160', '2023-05-05', '15:07:01', 'sent'),
(23, 'adopt_6454ac6b75ef3', '2023-05-05', '15:12:43', 'sent'),
(24, 'adopt_6454af5146d20', '2023-05-05', '15:25:05', 'sent'),
(25, 'adopt_6454afae105e2', '2023-05-05', '15:26:38', 'sent'),
(26, 'adopt_6454b3271ea6d', '2023-05-05', '15:41:27', 'sent'),
(27, 'adopt_6454b68b6b295', '2023-05-05', '15:55:55', 'sent'),
(28, 'adopt_6454b762f290b', '2023-05-05', '15:59:31', 'sent'),
(29, 'adopt_6454c89d26c7c', '2023-05-05', '17:13:01', 'sent'),
(30, 'adopt_6454ce7ed525b', '2023-05-15', '17:38:06', 'sent'),
(31, 'adopt_6454d126c506c', '2023-05-05', '17:49:26', 'sent'),
(32, 'adopt_645a2ca6ec07a', '2023-05-09', '19:21:10', 'sent'),
(33, 'adopt_645a7c8205b0a', '2023-05-10', '01:01:54', 'sent'),
(34, 'adopt_645af5dc757a8', '2023-05-10', '09:39:40', 'sent'),
(35, 'adopt_645c5db0caf2f', '2023-05-11', '11:14:57', 'sent'),
(36, 'adopt_645c5edb6c4f0', '2023-05-11', '11:19:55', 'sent'),
(37, 'adopt_645c80e338b2c', '2023-05-11', '13:45:07', 'sent'),
(38, 'adopt_645d980159953', '2023-05-12', '09:36:01', 'sent'),
(39, 'adopt_645d9cb18bb22', '2023-05-12', '09:56:01', 'sent'),
(40, 'adopt_645da9276ef85', '2023-05-12', '10:49:11', 'sent'),
(41, 'adopt_645dae812b50c', '2023-05-12', '11:12:01', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_slot`
--

CREATE TABLE `adoption_slot` (
  `id` int(11) NOT NULL,
  `date_of_schedule` date NOT NULL,
  `date_slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_slot`
--

INSERT INTO `adoption_slot` (`id`, `date_of_schedule`, `date_slot`) VALUES
(1, '2023-05-02', 0),
(2, '2023-05-03', 5),
(3, '2023-05-04', 8),
(4, '2023-05-05', 0),
(5, '2023-05-09', 10),
(6, '2023-05-10', 9),
(7, '2023-05-11', 8),
(8, '2023-05-12', 7);

-- --------------------------------------------------------

--
-- Table structure for table `adoption_status`
--

CREATE TABLE `adoption_status` (
  `id` int(11) NOT NULL,
  `adoption_id` varchar(20) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date_update` datetime NOT NULL,
  `mail` varchar(55) DEFAULT NULL,
  `status_pending` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_status`
--

INSERT INTO `adoption_status` (`id`, `adoption_id`, `status`, `date_update`, `mail`, `status_pending`) VALUES
(1, 'adopt_644ff7caaca25', 'declined', '2023-05-02 00:00:00', 'sent', 'approved'),
(2, 'adopt_644ff8b8b0fa1', 'declined', '2023-05-02 00:00:00', 'sent', 'declined'),
(3, 'adopt_6450661e1c8e3', 'success', '2023-05-02 00:00:00', 'sent', 'approved'),
(4, 'adopt_64509bf4dcb94', 'success', '2023-05-03 17:06:40', 'sent', 'approved'),
(5, 'adopt_64509f0c793e7', 'success', '2023-05-02 13:37:38', NULL, 'Pending'),
(6, 'adopt_6450a29bcb068', 'success', '2023-05-02 13:43:25', NULL, 'Pending'),
(7, 'adopt_6450b345095a4', 'success', '2023-05-02 14:53:22', NULL, 'Pending'),
(8, 'adopt_6450b612cf41d', 'success', '2023-05-02 19:59:11', 'sent', 'approved'),
(9, 'adopt_6450c70813c41', 'declined', '2023-05-02 16:17:12', 'sent', 'declined'),
(10, 'adopt_6450c8c47b3be', 'declined', '2023-05-02 16:24:36', 'sent', 'declined'),
(11, 'adopt_6450c99a51c4b', 'declined', '2023-05-02 16:28:10', 'sent', 'declined'),
(12, 'adopt_6450d31918a20', 'not attended', '2023-05-03 17:05:21', 'sent', 'approved'),
(13, 'adopt_6450f76787851', 'success', '2023-05-03 17:35:05', 'sent', 'approved'),
(14, 'adopt_6451d306ccebf', 'declined', '2023-05-03 11:20:38', NULL, 'Pending'),
(15, 'adopt_6451f54797d79', 'not attended', '2023-05-03 17:24:51', NULL, 'Pending'),
(16, 'adopt_6451f6e31fc55', 'not attended', '2023-05-03 17:25:34', NULL, 'Pending'),
(17, 'adopt_6452722c6302e', 'success', '2023-05-03 23:38:28', NULL, 'Pending'),
(18, 'adopt_6452a8f365335', 'success', '2023-05-04 15:13:00', NULL, 'Pending'),
(19, 'adopt_6453224b282d0', 'success', '2023-05-04 14:00:14', NULL, 'Pending'),
(20, 'adopt_6453bb09ddffa', 'success', '2023-05-05 01:36:31', NULL, 'Pending'),
(21, 'adopt_6454a662ae175', 'not attended', '2023-05-05 14:46:58', 'sent', 'approved'),
(22, 'adopt_6454ab15c3160', 'approved', '2023-05-05 15:07:01', 'sent', 'approved'),
(23, 'adopt_6454ac6b75ef3', 'declined', '2023-05-05 15:12:43', 'sent', 'approved'),
(24, 'adopt_6454af5146d20', 'not attended', '2023-05-05 15:25:05', 'sent', 'approved'),
(25, 'adopt_6454afae105e2', 'declined', '2023-05-05 15:26:38', 'sent', 'approved'),
(26, 'adopt_6454b3271ea6d', 'not attended', '2023-05-05 15:41:27', 'sent', 'approved'),
(27, 'adopt_6454b68b6b295', 'success', '2023-05-05 15:58:48', 'sent', 'approved'),
(28, 'adopt_6454b762f290b', 'success', '2023-05-05 16:11:45', 'sent', 'approved'),
(29, 'adopt_6454c89d26c7c', 'success', '2023-05-05 17:16:56', 'sent', 'approved'),
(30, 'adopt_6454ce7ed525b', 'not attended', '2023-05-05 17:38:06', 'sent', 'approved'),
(31, 'adopt_6454d126c506c', 'not attended', '2023-05-05 17:49:26', 'sent', 'approved'),
(32, 'adopt_645a2ca6ec07a', 'success', '2023-05-09 19:24:39', 'sent', 'approved'),
(33, 'adopt_645a7c8205b0a', 'success', '2023-05-10 01:04:08', 'sent', 'approved'),
(34, 'adopt_645af5dc757a8', 'success', '2023-05-10 09:44:26', 'sent', 'approved'),
(35, 'adopt_645c5db0caf2f', 'approved', '2023-05-11 11:14:56', 'sent', 'approved'),
(36, 'adopt_645c5edb6c4f0', 'success', '2023-05-11 11:22:35', 'sent', 'approved'),
(37, 'adopt_645c80e338b2c', 'not attended', '2023-05-11 13:45:07', 'sent', 'approved'),
(38, 'adopt_645d980159953', 'success', '2023-05-12 09:40:01', 'sent', 'approved'),
(39, 'adopt_645d9cb18bb22', 'not attended', '2023-05-12 09:56:01', 'sent', 'approved'),
(40, 'adopt_645da9276ef85', 'success', '2023-05-12 10:54:41', 'sent', 'approved'),
(41, 'adopt_645dae812b50c', 'not attended', '2023-05-12 11:12:01', 'sent', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_transaction`
--

CREATE TABLE `adoption_transaction` (
  `id` int(11) NOT NULL,
  `adoption_id` varchar(20) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `1by1_id` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_transaction`
--

INSERT INTO `adoption_transaction` (`id`, `adoption_id`, `user_id`, `pet_id`, `reference_no`, `email`, `fullname`, `address`, `contact`, `valid_id`, `1by1_id`, `datetime`) VALUES
(3, 'adopt_6450661e1c8e3', '108335001093346207746', 'pet_64506502aa3f9', '6450661E1C8E592', 'edsonpaul98@gmail.com', 'Edson Paul olimberio', '3 Petronia St, Buenamar Subd., Brgy. Novaliches Proper, Quezon City, Metro Manila', '09672973070', 'uploads/adopt_6450661e1c8e3_validID.png', 'uploads/adopt_6450661e1c8e3_1by1.png', '2023-05-02 09:23:42'),
(7, 'adopt_6450a29bcb068', 'user_6447b7c3563fb', 'pet_64506ba21537d', '6450A29BCB070E7', 'eballesmarlon@gmail.com', 'Marlon Eballes', '043 Eulogio St. Don Fabian, Brgy. Alicia, Quezon City, Metro Manila', '09128371839', 'uploads/adopt_6450a29bcb068_validID.jpeg', 'uploads/adopt_6450a29bcb068_1by1.jpg', '2023-05-02 13:41:47'),
(8, 'adopt_6450b345095a4', '108335001093346207746', 'pet_64506c0d87c9c', '6450B345095AAE2', 'edsonpaul98@gmail.com', 'Edson Paul olimberio', '3 Petronia St, Buenamar Subd., Brgy. Novaliches Proper, Quezon City, Metro Manila', '09672973070', 'uploads/adopt_6450b345095a4_validID.jpg', 'uploads/adopt_6450b345095a4_1by1.jpg', '2023-05-02 14:52:53'),
(15, 'adopt_6450d31918a20', 'user_6423b0ccdeb06', 'pet_64506b16732c1', '6450D31918A26B9', 'galuporicamae@gmail.com', 'Rica Galupo', 'Kapatiran St., Brgy. Commonwealth, Quezon City, Metro Manila', '09099573850', 'uploads/adopt_6450d31918a20_validID.jpg', 'uploads/adopt_6450d31918a20_1by1.jpg', '2023-05-02 17:08:41'),
(18, 'adopt_6451f54797d79', 'user_6447b7c3563fb', 'pet_64506a3da3199', '6451F54797D7A61', 'eballesmarlon@gmail.com', 'Marlon Eballes', '043 Eulogio St. Don Fabian, Brgy. Alicia, Quezon City, Metro Manila', '09128371839', 'uploads/adopt_6451f54797d79_validID.jpg', 'uploads/adopt_6451f54797d79_1by1.jpg', '2023-05-03 13:46:47'),
(19, 'adopt_6451f6e31fc55', 'user_6447b7c3563fb', 'pet_644fe43e77844', '6451F6E31FC57A6', 'eballesmarlon@gmail.com', 'Marlon Eballes', '043 Eulogio St. Don Fabian, Brgy. Alicia, Quezon City, Metro Manila', '09128371839', 'uploads/adopt_6451f6e31fc55_validID.jpg', 'uploads/adopt_6451f6e31fc55_1by1.jpg', '2023-05-03 13:53:39'),
(22, 'adopt_6453224b282d0', 'user_6447b7c3563fb', 'pet_644fe24ea24c5', '6453224B282D140', 'eballesmarlon@gmail.com', 'Marlon Eballes', '043 Eulogio St. Don Fabian, Brgy. Alicia, Quezon City, Metro Manila', '09128371839', 'uploads/adopt_6453224b282d0_validID.jpg', 'uploads/adopt_6453224b282d0_1by1.jpg', '2023-05-04 11:11:07'),
(28, 'adopt_6454afae105e2', '109314027644136413984', 'pet_644fe400e5ebc', '6454AFAE105E9A5', 'charles.daniel.habay@gmail.com', 'Charles Daniel Habay', 'Sta. Veronica, Brgy. Payatas, Quezon City, Metro Manila', '09953310799', 'uploads/adopt_6454afae105e2_validID.jpg', 'uploads/adopt_6454afae105e2_1by1.jpg', '2023-05-05 15:26:38'),
(31, 'adopt_6454b762f290b', 'user_6454b5cb09a53', 'pet_644fe390da4da', '6454B762F291473', 'compilationintern@gmail.com', 'Daryl San', '74 Kaligtsan St., Brgy. Alicia, Quezon City, Metro Manila', '09298760835', 'uploads/adopt_6454b762f290b_validID.jpg', 'uploads/adopt_6454b762f290b_1by1.png', '2023-05-05 15:59:30'),
(33, 'adopt_6454ce7ed525b', 'user_640aed2572fc8', 'pet_644fe43e77844', '6454CE7ED526149', 'jessica.ombao.bulleque@gmail.com', 'jessica bulleque', 'Ninada, Brgy. Payatas, Quezon City, Metro Manila', '09212323232', 'uploads/adopt_6454ce7ed525b_validID.JPG', 'uploads/adopt_6454ce7ed525b_1by1.jpg', '2023-05-05 17:38:06'),
(35, 'adopt_645a2ca6ec07a', 'admin_642b92f9d070f', 'pet_644fe47cde6bd', '645A2CA6EC07E00', 'eballesmarlon@gmail.com', 'Marlon Eballes', '043 Eulogio St. Don Fabian, Brgy. Alicia, Quezon City, Metro Manila', '09128371839', 'uploads/adopt_645a2ca6ec07a_validID.jpg', 'uploads/adopt_645a2ca6ec07a_1by1.jpg', '2023-05-09 19:21:10'),
(37, 'adopt_645af5dc757a8', 'user_645af5367b084', 'pet_6454d822c4187', '645AF5DC757AFF8', 'ritchiepaulsoroneljalayajay@gmail.com', 'Ritchie Jalayajay', '74 Kaligtasan, Brgy. Alicia, Quezon City, Metro Manila', '09297608354', 'uploads/adopt_645af5dc757a8_validID.jpg', 'uploads/adopt_645af5dc757a8_1by1.jpg', '2023-05-10 09:39:40'),
(39, 'adopt_645c5edb6c4f0', 'user_645c5af066bfa', 'pet_64506990a8367', '645C5EDB6C4F2C7', 'joshua.ledesma.dacuyan@gmail.com', 'Joshua Dacuyan', 'Tulip, Brgy. Fairview, Quezon City, Metro Manila', '09519275437', 'uploads/adopt_645c5edb6c4f0_validID.jpg', 'uploads/adopt_645c5edb6c4f0_1by1.jpg', '2023-05-11 11:19:55'),
(40, 'adopt_645c80e338b2c', 'user_645c805698837', 'pet_645c7e0c2f1f6', '645C80E338B340A', 'erica.rosal09012000@gmail.com', 'Erica Rosal', '21 Bai Compound, Brgy. Vasra, QC, Brgy. Vasra, Quezon City, Metro Manila', '09100487940', 'uploads/adopt_645c80e338b2c_validID.jpg', 'uploads/adopt_645c80e338b2c_1by1.jpg', '2023-05-11 13:45:07'),
(41, 'adopt_645d980159953', 'user_6450f560cf864', 'pet_645c7d62119f4', '645D98015995A72', 'ricky.jalayajay.soronel@gmail.com', 'Ricky Jalayajay', '74 Kaligtasan, Brgy. Holy Spirit, Quezon City, Metro Manila', '09229517563', 'uploads/adopt_645d980159953_validID.jpg', 'uploads/adopt_645d980159953_1by1.jpg', '2023-05-12 09:36:01'),
(42, 'adopt_645d9cb18bb22', 'user_645d9c21cf789', 'pet_645c7e7aabbe2', '645D9CB18BB29AE', 'bacabismelvin@gmail.com', 'melvin bacabis', 'Gen. Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', '09321323232', 'uploads/adopt_645d9cb18bb22_validID.jpg', 'uploads/adopt_645d9cb18bb22_1by1.jpg', '2023-05-12 09:56:01'),
(43, 'adopt_645da9276ef85', 'user_645da8ab86dbc', 'pet_64506c6e60b55', '645DA9276EF8C23', 'mark.melvin.bacabis@gmail.com', 'mark bacabis', 'Gen Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', '09134323234', 'uploads/adopt_645da9276ef85_validID.jpg', 'uploads/adopt_645da9276ef85_1by1.jpg', '2023-05-12 10:49:11'),
(44, 'adopt_645dae812b50c', 'user_645d9c21cf789', 'pet_645c7db60b182', '645DAE812B51251', 'bacabismelvin@gmail.com', 'melvin bacabis', 'Gen. Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', '09321323232', 'uploads/adopt_645dae812b50c_validID.jpg', 'uploads/adopt_645dae812b50c_1by1.jpg', '2023-05-12 11:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `archive_id` int(11) NOT NULL,
  `archive_type` varchar(55) NOT NULL,
  `archive_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL,
  `characteristic` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characteristics`
--

INSERT INTO `characteristics` (`id`, `characteristic`) VALUES
(23001, 'Playful'),
(23002, 'Dog Compatible'),
(23003, 'Cuddler'),
(23004, 'Trained'),
(23005, 'Cat Compatible'),
(23006, 'Kid Compatible');

-- --------------------------------------------------------

--
-- Table structure for table `ci`
--

CREATE TABLE `ci` (
  `id` int(11) NOT NULL,
  `ci_validator` varchar(55) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `ci_status` varchar(55) NOT NULL,
  `eval1` varchar(3) NOT NULL,
  `eval2` varchar(3) NOT NULL,
  `eval3` varchar(3) NOT NULL,
  `eval4` varchar(3) NOT NULL,
  `eval5` varchar(3) NOT NULL,
  `comments` text NOT NULL,
  `remarks` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `schedule` date NOT NULL,
  `datetime` datetime NOT NULL,
  `ci_image` varchar(55) NOT NULL,
  `path` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci`
--

INSERT INTO `ci` (`id`, `ci_validator`, `reference_no`, `fullname`, `ci_status`, `eval1`, `eval2`, `eval3`, `eval4`, `eval5`, `comments`, `remarks`, `address`, `schedule`, `datetime`, `ci_image`, `path`) VALUES
(85, 'Charles Daniel', '645A7C8205B11FD', 'Marlon Eballes', 'done', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Test Home Visit Hostinger 1', 'warning', '', '2023-05-10', '0000-00-00 00:00:00', '645a7dadd9e11.jpeg', 'uploads/645a7dadd9e11.jpeg'),
(86, 'Charles Daniel', '645AF5DC757AFF8', 'Ritchie Jalayajay', 'done', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Testing host', 'warning', '', '2023-05-10', '0000-00-00 00:00:00', '645afb73d66a1.jpeg', 'uploads/645afb73d66a1.jpeg'),
(87, 'Charles Daniel', '645C5EDB6C4F2C7', 'Joshua Dacuyan', 'done', 'Yes', 'Yes', 'No', 'No', 'No', 'Test warning ', 'warning', '', '2023-05-11', '0000-00-00 00:00:00', '645c760f5342d.jpeg', 'uploads/645c760f5342d.jpeg'),
(88, 'Charles Daniel', '645D98015995A72', 'Ricky Jalayajay', 'done', 'No', 'Yes', 'No', 'No', 'Yes', 'yes', 'passed', 'CityState Hotel, P. Paterno Street, Quiapo, Manila, 1001 Metro Manila, Philippines', '2023-05-12', '2023-05-12 12:15:04', 'cute-dog-headshot.jpg', 'uploads/645D98015995A72_cute-dog-headshot.jpg'),
(89, 'Charles Daniel', '645DA9276EF8C23', 'mark bacabis', 'done', 'No', 'Yes', 'Yes', 'Yes', 'No', 'test', 'warning', 'CityState Hotel, P. Paterno Street, Quiapo, Manila, 1001 Metro Manila, Philippines', '2023-05-12', '2023-05-12 12:07:40', 'cute-dog-headshot.jpg', 'uploads/645DA9276EF8C23_cute-dog-headshot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ci_revisit`
--

CREATE TABLE `ci_revisit` (
  `id` int(11) NOT NULL,
  `ci_validator` varchar(55) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `ci_rev_status` varchar(55) NOT NULL,
  `eval1` varchar(3) NOT NULL,
  `eval2` varchar(3) NOT NULL,
  `eval3` varchar(3) NOT NULL,
  `eval4` varchar(3) NOT NULL,
  `eval5` varchar(3) NOT NULL,
  `comments` text NOT NULL,
  `remarks` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `schedule` date NOT NULL,
  `ci_image` varchar(55) NOT NULL,
  `path` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_revisit`
--

INSERT INTO `ci_revisit` (`id`, `ci_validator`, `reference_no`, `fullname`, `ci_rev_status`, `eval1`, `eval2`, `eval3`, `eval4`, `eval5`, `comments`, `remarks`, `address`, `datetime`, `schedule`, `ci_image`, `path`) VALUES
(2, 'Charles Daniel', '645A7C8205B11FD', 'Marlon Eballes', 'done', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Test Revisit Hostinger 1 ', 'passed', '', '0000-00-00 00:00:00', '2023-05-10', '645a7de9af633.jpeg', 'uploads/645a7de9af633.jpeg'),
(3, 'Charles Daniel', '645AF5DC757AFF8', 'Ritchie Jalayajay', 'done', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'test', 'banned', '', '0000-00-00 00:00:00', '2023-05-10', 'cute-dog-headshot.jpg', 'uploads/645AF5DC757AFF8_cute-dog-headshot.jpg'),
(4, 'Charles Daniel', '645C5EDB6C4F2C7', 'Joshua Dacuyan', 'done', 'Yes', 'No', 'Yes', 'No', 'Yes', 'Ban ulit hahaah', 'banned', '', '0000-00-00 00:00:00', '2023-05-11', '645c78299d6ce.jpeg', 'uploads/645c78299d6ce.jpeg'),
(5, 'Charles Daniel', '645D98015995A72', 'Ricky Jalayajay', 'done', 'No', 'Yes', 'No', 'Yes', 'Yes', 'Test', 'passed', 'CityState Hotel, P. Paterno Street, Quiapo, Manila, 1001 Metro Manila, Philippines', '2023-05-12 12:07:03', '2023-05-12', 'cute-dog-headshot.jpg', 'uploads/645D98015995A72_cute-dog-headshot.jpg'),
(6, 'Charles Daniel', '645DA9276EF8C23', 'mark bacabis', 'done', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Test', 'passed', 'Eulogio Street, Quezon City, 1100 Metro Manila, Philippines', '2023-05-12 12:37:25', '2023-05-12', '645dc2854714b.jpeg', 'uploads/645dc2854714b.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cms_announcement`
--

CREATE TABLE `cms_announcement` (
  `id` int(11) NOT NULL,
  `content_id` varchar(20) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_announcement`
--

INSERT INTO `cms_announcement` (`id`, `content_id`, `img_name`, `date_added`) VALUES
(17, '64548A82463D438', '1.jpg64548a82463f1.jpg', '2023-05-05'),
(18, '64548A825EE010B', '2.jpg64548a825ee27.jpg', '2023-05-05'),
(19, '64548A826D3EADC', '3.jpg64548a826d480.jpg', '2023-05-05'),
(20, '64548A8277C90BE', '4.jpg64548a8277ca8.jpg', '2023-05-05'),
(21, '64548AC5CD5F15C', '64548AC5CD5F15C64548ac5cd608.jpg', '2023-05-05'),
(22, '64548AC5E1C7F24', '64548AC5E1C7F2464548ac5e1c97.jpg', '2023-05-05'),
(23, '64548AC5EE66413', '64548AC5EE6641364548ac5ee67f.jpg', '2023-05-05'),
(24, '64548AC6081D34A', '64548AC6081D34A64548ac6081eb.jpg', '2023-05-05'),
(25, '6454D06A0C5191C', '6454D06A0C5191C6454d06a0c563.jpg', '2023-05-05'),
(26, '6454D06A0CD4362', '6454D06A0CD43626454d06a0cd56.jpg', '2023-05-05'),
(27, '6454D06A0D1BF80', '6454D06A0D1BF806454d06a0d1cc.jpg', '2023-05-05'),
(28, '6454D06A0DD8797', '6454D06A0DD87976454d06a0dd9a.jpg', '2023-05-05'),
(29, '6454D16119CFB2B', '6454D16119CFB2B6454d16119d23.jpg', '2023-05-05'),
(30, '6454D1611A34616', '6454D1611A346166454d1611a353.jpg', '2023-05-05'),
(31, '6454D1611A90EB2', '6454D1611A90EB26454d1611a91a.jpg', '2023-05-05'),
(32, '6454D1611AF0609', '6454D1611AF06096454d1611af13.jpg', '2023-05-05'),
(33, '6454D1EE3C32D09', '6454D1EE3C32D096454d1ee3c33d.jpg', '2023-05-05'),
(34, '6454D1EE3C74273', '6454D1EE3C742736454d1ee3c74e.jpg', '2023-05-05'),
(35, '6454D1EE3CB1754', '6454D1EE3CB17546454d1ee3cb23.jpg', '2023-05-05'),
(36, '6454D1EE3CE6EA5', '6454D1EE3CE6EA56454d1ee3ce7e.jpg', '2023-05-05'),
(37, '6460ECA6299410C', '6460ECA6299410C6460eca629966.png', '2023-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `cms_content`
--

CREATE TABLE `cms_content` (
  `id` int(11) NOT NULL,
  `content_id` varchar(255) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_content`
--

INSERT INTO `cms_content` (`id`, `content_id`, `video_title`, `video_content`) VALUES
(1, '6453F88226404B2', 'Sample', '6453F88226404B2.mp4'),
(4, '6453FB7DDBC5A3F', 'Sample 2', '6453FB7DDBC5A3F.mp4'),
(5, '6453FD1C2F55B13', 'Sample 3', './contents/6453FD1C2F55B13.mp4'),
(6, '6453FEAB7072AAC', 'Sample 4', './contents/6453FEAB7072AAC.mp4'),
(7, '6453FEF4D7259C7', 'Sample 4', './contents/6453FEF4D7259C7.mp4'),
(8, '6453FFB77F5505B', 'Sample 6', './contents/6453FFB77F5505B.mp4'),
(9, '6454A8118E530FF', 'Successful Adoption', './contents/6454A8118E530FF.mp4'),
(10, '6454D0FC91F0B52', 'thank you', './contents/6454D0FC91F0B52.mp4'),
(11, '6454D1CD3F38369', 'Announcement', './contents/6454D1CD3F38369.mp4'),
(12, '645C5A75BF7F1DB', 'Successful Adoption', './contents/645C5A75BF7F1DB.mp4'),
(13, '645DAB6F55AADEC', 'Sample', './contents/645DAB6F55AADEC.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `id` int(11) NOT NULL,
  `medical` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`id`, `medical`) VALUES
(2301, 'Neuter/Spay'),
(2302, 'Anti Rabies'),
(2303, 'Deworm'),
(2304, 'Flea and Tick');

-- --------------------------------------------------------

--
-- Table structure for table `missing_pets`
--

CREATE TABLE `missing_pets` (
  `id` int(11) NOT NULL,
  `missing_pet_id` varchar(20) NOT NULL,
  `missing_pet_status` varchar(55) NOT NULL,
  `missing_pet_species` varchar(55) NOT NULL,
  `missing_pet_name` varchar(55) NOT NULL,
  `missing_pet_breed` varchar(55) NOT NULL,
  `missing_pet_gender` varchar(6) NOT NULL,
  `missing_pet_description` varchar(255) NOT NULL,
  `missing_pet_contact_details` varchar(255) NOT NULL,
  `missing_pet_image` varchar(255) NOT NULL,
  `missing_date` date NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `payment_reference_no` varchar(55) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `date_paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `reference_no`, `fullname`, `payment_reference_no`, `payment_status`, `payment_amount`, `date_paid`) VALUES
(1, 'user_6447b7c3563fb', '6451F54797D7A61', 'Marlon Eballes', '6451F54797D7E20', 'Paid', 500, '0000-00-00 00:00:00'),
(2, 'user_6447b7c3563fb', '6451F6E31FC57A6', 'Marlon Eballes', '6451F6E31FC5C9A', 'Paid', 500, '0000-00-00 00:00:00'),
(3, 'user_6447b7c3563fb', '6452722C63030BF', 'Marlon Eballes', '6452722C63036D2', 'Paid', 500, '0000-00-00 00:00:00'),
(4, 'user_6447b7c3563fb', '6452A8F365337BB', 'Marlon Eballes', '6452A8F36533B38', 'Paid', 500, '0000-00-00 00:00:00'),
(5, 'user_6447b7c3563fb', '6453224B282D140', 'Marlon Eballes', '6453224B282D932', 'Paid', 500, '0000-00-00 00:00:00'),
(6, 'user_6447b7c3563fb', '6453BB09DDFFC6A', 'Marlon Eballes', '6453BB09DE00074', 'Paid', 500, '0000-00-00 00:00:00'),
(7, 'user_6450f560cf864', '6454A662AE17AE9', 'Ricky Jalayajay', '6454A662AE1851F', 'To Pay', 0, '0000-00-00 00:00:00'),
(8, 'user_6454aa6a8ecab', '6454AB15C3162D6', 'Ricardo Jalayajay', '6454AB15C3168CE', 'To Pay', 0, '0000-00-00 00:00:00'),
(9, '109314027644136413984', '6454AC6B75EFAA2', 'Charles Daniel Habay', '6454AC6B75F0972', 'None', 0, '0000-00-00 00:00:00'),
(10, 'user_6447b7c3563fb', '6454AF5146D2215', 'Marlon Eballes', '6454AF5146D27A9', 'To Pay', 0, '0000-00-00 00:00:00'),
(11, '109314027644136413984', '6454AFAE105E9A5', 'Charles Daniel Habay', '6454AFAE105F5D2', 'None', 0, '0000-00-00 00:00:00'),
(12, 'user_6447b7c3563fb', '6454B3271EA701F', 'Marlon Eballes', '6454B3271EA8271', 'To Pay', 0, '0000-00-00 00:00:00'),
(13, '109314027644136413984', '6454B68B6B29895', 'Charles Daniel Habay', '6454B68B6B2A095', 'Paid', 500, '0000-00-00 00:00:00'),
(14, 'user_6454b5cb09a53', '6454B762F291473', 'Daryl San', '6454B762F29246C', 'Paid', 500, '0000-00-00 00:00:00'),
(15, 'user_6454c7ca2c63f', '6454C89D26C8301', 'Mark Bacabis', '6454C89D26C8E7C', 'Paid', 500, '0000-00-00 00:00:00'),
(16, 'user_640aed2572fc8', '6454CE7ED526149', 'jessica bulleque', '6454CE7ED526F63', 'To Pay', 0, '0000-00-00 00:00:00'),
(17, '109314027644136413984', '6454D126C5074F5', 'Charles Daniel Habay', '6454D126C50854B', 'To Pay', 0, '0000-00-00 00:00:00'),
(18, 'admin_642b92f9d070f', '645A2CA6EC07E00', 'Marlon Eballes', '645A2CA6EC08976', 'Paid', 500, '0000-00-00 00:00:00'),
(19, 'user_6447b7c3563fb', '645A7C8205B11FD', 'Marlon Eballes', '645A7C8205B209B', 'Paid', 500, '0000-00-00 00:00:00'),
(20, 'user_645af5367b084', '645AF5DC757AFF8', 'Ritchie Jalayajay', '645AF5DC757BD21', 'Paid', 500, '0000-00-00 00:00:00'),
(21, 'user_645c5ca60437d', '645C5DB0CAF3636', 'Rock Bautista', '645C5DB0CAF453D', 'To Pay', 0, '0000-00-00 00:00:00'),
(22, 'user_645c5af066bfa', '645C5EDB6C4F2C7', 'Joshua Dacuyan', '645C5EDB6C4FF06', 'Paid', 500, '0000-00-00 00:00:00'),
(23, 'user_645c805698837', '645C80E338B340A', 'Erica Rosal', '645C80E338B4388', 'To Pay', 0, '0000-00-00 00:00:00'),
(24, 'user_6450f560cf864', '645D98015995A72', 'Ricky Jalayajay', '645D980159967D4', 'Paid', 500, '0000-00-00 00:00:00'),
(25, 'user_645d9c21cf789', '645D9CB18BB29AE', 'melvin bacabis', '645D9CB18BB37B4', 'To Pay', 0, '0000-00-00 00:00:00'),
(26, 'user_645da8ab86dbc', '645DA9276EF8C23', 'mark bacabis', '645DA9276EF9C72', 'Paid', 500, '0000-00-00 00:00:00'),
(27, 'user_645d9c21cf789', '645DAE812B51251', 'melvin bacabis', '645DAE812B51DA3', 'To Pay', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet_characteristics`
--

CREATE TABLE `pet_characteristics` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `pet_char` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_characteristics`
--

INSERT INTO `pet_characteristics` (`id`, `pet_id`, `pet_char`) VALUES
(1, 'pet_644fe24ea24c5', 23001),
(2, 'pet_644fe24ea24c5', 23003),
(3, 'pet_644fe390da4da', 23001),
(4, 'pet_644fe390da4da', 23005),
(5, 'pet_644fe400e5ebc', 23001),
(6, 'pet_644fe400e5ebc', 23004),
(7, 'pet_644fe400e5ebc', 23005),
(8, 'pet_644fe43e77844', 23002),
(9, 'pet_644fe43e77844', 23004),
(10, 'pet_644fe43e77844', 23006),
(11, 'pet_644fe47cde6bd', 23001),
(12, 'pet_644fe47cde6bd', 23004),
(13, 'pet_644fe47cde6bd', 23005),
(14, 'pet_644fe4bf314db', 23001),
(15, 'pet_644fe4bf314db', 23002),
(16, 'pet_644fe4bf314db', 23006),
(17, 'pet_64506502aa3f9', 23001),
(18, 'pet_64506502aa3f9', 23004),
(19, 'pet_64506990a8367', 23001),
(20, 'pet_64506990a8367', 23002),
(21, 'pet_64506990a8367', 23006),
(22, 'pet_645069ee221fa', 23001),
(23, 'pet_645069ee221fa', 23003),
(24, 'pet_64506a3da3199', 23003),
(25, 'pet_64506a3da3199', 23006),
(26, 'pet_64506b16732c1', 23003),
(27, 'pet_64506b16732c1', 23005),
(28, 'pet_64506b16732c1', 23006),
(29, 'pet_64506b5db76d8', 23002),
(30, 'pet_64506b5db76d8', 23003),
(31, 'pet_64506b5db76d8', 23006),
(32, 'pet_64506ba21537d', 23002),
(33, 'pet_64506ba21537d', 23003),
(34, 'pet_64506ba21537d', 23005),
(35, 'pet_64506c0d87c9c', 23005),
(36, 'pet_64506c0d87c9c', 23006),
(37, 'pet_64506c6e60b55', 23002),
(38, 'pet_64506c6e60b55', 23003),
(39, 'pet_64506c6e60b55', 23005),
(40, 'pet_64506cd567de2', 23002),
(41, 'pet_64506cd567de2', 23003),
(42, 'pet_64506cd567de2', 23005),
(43, 'pet_6454d822c4187', 23001),
(44, 'pet_6454d822c4187', 23002),
(45, 'pet_6454d822c4187', 23003),
(46, 'pet_6454d822c4187', 23004),
(47, 'pet_6454d822c4187', 23005),
(48, 'pet_6454d822c4187', 23006),
(49, 'pet_6454d82512a21', 23001),
(50, 'pet_6454d82512a21', 23002),
(51, 'pet_6454d82512a21', 23003),
(52, 'pet_6454d82512a21', 23004),
(53, 'pet_6454d82512a21', 23005),
(54, 'pet_6454d82512a21', 23006),
(55, 'pet_645c7d2389367', 23001),
(56, 'pet_645c7d2389367', 23002),
(57, 'pet_645c7d2389367', 23003),
(58, 'pet_645c7d2389367', 23004),
(59, 'pet_645c7d2389367', 23005),
(60, 'pet_645c7d2389367', 23006),
(61, 'pet_645c7d62119f4', 23001),
(62, 'pet_645c7d62119f4', 23003),
(63, 'pet_645c7d62119f4', 23004),
(64, 'pet_645c7d62119f4', 23005),
(65, 'pet_645c7d62119f4', 23006),
(66, 'pet_645c7db60b182', 23001),
(67, 'pet_645c7db60b182', 23002),
(68, 'pet_645c7db60b182', 23003),
(69, 'pet_645c7db60b182', 23004),
(70, 'pet_645c7db60b182', 23005),
(71, 'pet_645c7db60b182', 23006),
(72, 'pet_645c7e0c2f1f6', 23001),
(73, 'pet_645c7e0c2f1f6', 23002),
(74, 'pet_645c7e0c2f1f6', 23003),
(75, 'pet_645c7e0c2f1f6', 23004),
(76, 'pet_645c7e0c2f1f6', 23005),
(77, 'pet_645c7e0c2f1f6', 23006),
(78, 'pet_645c7e7aabbe2', 23001),
(79, 'pet_645c7e7aabbe2', 23002),
(80, 'pet_645c7e7aabbe2', 23003),
(81, 'pet_645c7e7aabbe2', 23004),
(82, 'pet_645c7e7aabbe2', 23005),
(83, 'pet_645c7e7aabbe2', 23006);

-- --------------------------------------------------------

--
-- Table structure for table `pet_details`
--

CREATE TABLE `pet_details` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `pet_name` varchar(55) NOT NULL,
  `pet_bdate` date NOT NULL,
  `pet_gender` varchar(6) NOT NULL,
  `pet_species` varchar(55) NOT NULL,
  `pet_breed` varchar(55) NOT NULL,
  `pet_color` varchar(55) NOT NULL,
  `blood_type` varchar(55) NOT NULL,
  `pet_image` varchar(255) NOT NULL,
  `pet_image_path` varchar(55) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_details`
--

INSERT INTO `pet_details` (`id`, `pet_id`, `pet_name`, `pet_bdate`, `pet_gender`, `pet_species`, `pet_breed`, `pet_color`, `blood_type`, `pet_image`, `pet_image_path`, `date_added`) VALUES
(1, 'pet_644fe24ea24c5', 'Test 1', '2023-04-05', 'male', 'dog', 'Aspin', 'white', 'DEA 1.1', 'pet_img-644fe24ea1b4b.jpg', '../../pets_image/pet_img-644fe24ea1b4b.jpg', '2023-05-02 00:01:18'),
(2, 'pet_644fe390da4da', 'Hazel', '2023-03-30', 'female', 'cat', 'Persian Cat', 'white', 'A', 'pet_img-644fe390d9c26.jpg', '../../pets_image/pet_img-644fe390d9c26.jpg', '2023-05-02 00:06:40'),
(3, 'pet_644fe400e5ebc', 'Alpha', '2023-03-03', 'male', 'cat', 'America Curl', 'white', 'B', 'pet_img-644fe400e50ed.jpg', '../../pets_image/pet_img-644fe400e50ed.jpg', '2023-05-02 00:08:32'),
(4, 'pet_644fe43e77844', 'Cherry', '2023-03-31', 'male', 'dog', 'Aspin', 'brown', 'DEA 1.2', 'pet_img-644fe43e76e69.jpg', '../../pets_image/pet_img-644fe43e76e69.jpg', '2023-05-02 00:09:34'),
(5, 'pet_644fe47cde6bd', 'Katya', '2023-04-05', 'female', 'cat', 'Himalayan Cat', 'white', 'MIC', 'pet_img-644fe47cdde11.jpg', '../../pets_image/pet_img-644fe47cdde11.jpg', '2023-05-02 00:10:36'),
(6, 'pet_644fe4bf314db', 'Phanter', '2023-04-12', 'male', 'dog', 'Aspin', 'white', 'DEA 1.2', 'pet_img-644fe4bf30b23.jpg', '../../pets_image/pet_img-644fe4bf30b23.jpg', '2023-05-02 00:11:43'),
(7, 'pet_64506502aa3f9', 'Mimi', '2020-06-02', 'female', 'cat', 'Puspins', 'brown', 'A', 'pet_img-64506502a9a94.png', '../../pets_image/pet_img-64506502a9a94.png', '2023-05-02 09:18:58'),
(8, 'pet_64506990a8367', 'Rio', '2022-11-02', 'male', 'dog', 'Aspin', 'brown', 'DEA 1.2', 'pet_img-64506990a7a35.png', '../../pets_image/pet_img-64506990a7a35.png', '2023-05-02 09:38:24'),
(9, 'pet_645069ee221fa', 'Vash', '2022-08-02', 'male', 'cat', 'Puspins', 'brown', 'AB', 'pet_img-645069ee21381.png', '../../pets_image/pet_img-645069ee21381.png', '2023-05-02 09:39:58'),
(10, 'pet_64506a3da3199', 'Rex', '2023-02-02', 'female', 'cat', 'Puspins', 'brown', 'B', 'pet_img-64506a3da2924.png', '../../pets_image/pet_img-64506a3da2924.png', '2023-05-02 09:41:17'),
(11, 'pet_64506b16732c1', 'Chimi', '2023-01-02', 'male', 'cat', 'Puspins', 'brown', 'A', 'pet_img-64506b1672962.png', '../../pets_image/pet_img-64506b1672962.png', '2023-05-02 09:44:54'),
(12, 'pet_64506b5db76d8', 'Sky', '2022-05-02', 'male', 'dog', 'Aspin', 'white', 'DEA 1.2', 'pet_img-64506b5db6964.png', '../../pets_image/pet_img-64506b5db6964.png', '2023-05-02 09:46:05'),
(13, 'pet_64506ba21537d', 'Cloud', '2021-11-02', 'female', 'dog', 'Aspin', 'white', 'DEA 1.2', 'pet_img-64506ba214969.png', '../../pets_image/pet_img-64506ba214969.png', '2023-05-02 09:47:14'),
(14, 'pet_64506c0d87c9c', 'Jakjak', '2022-10-02', 'female', 'cat', 'Puspins', 'black', 'B', 'pet_img-64506c0d87157.png', '../../pets_image/pet_img-64506c0d87157.png', '2023-05-02 09:49:01'),
(15, 'pet_64506c6e60b55', 'Bambi', '2022-03-02', 'male', 'dog', 'Pomeranian', 'brown', 'DEA 1.2', 'pet_img-64506c6e60056.png', '../../pets_image/pet_img-64506c6e60056.png', '2023-05-02 09:50:38'),
(16, 'pet_64506cd567de2', 'Migs', '2022-06-02', 'female', 'dog', 'Aspin', 'brown', 'DEA 1.1', 'pet_img-64506cd5671a5.png', '../../pets_image/pet_img-64506cd5671a5.png', '2023-05-02 09:52:21'),
(17, 'pet_6454d822c4187', 'Gwen', '2023-03-03', 'female', 'cat', 'Puspins', 'white', 'A', 'pet_img-6454d822c2f98.png', '../../pets_image/pet_img-6454d822c2f98.png', '2023-05-05 18:19:14'),
(18, 'pet_6454d82512a21', 'Gwen', '2023-03-03', 'female', 'cat', 'Puspins', 'white', 'A', 'pet_img-6454d82511bad.png', '../../pets_image/pet_img-6454d82511bad.png', '2023-05-05 18:19:17'),
(19, 'pet_645c7d2389367', 'Sash', '2023-04-05', 'female', 'cat', 'Puspins', 'black', 'A', 'pet_img-645c7d23888b7.png', '../../pets_image/pet_img-645c7d23888b7.png', '2023-05-11 13:29:07'),
(20, 'pet_645c7d62119f4', 'Eliz', '2023-04-01', 'female', 'cat', 'Puspins', 'black', 'A', 'pet_img-645c7d6211076.png', '../../pets_image/pet_img-645c7d6211076.png', '2023-05-11 13:30:10'),
(21, 'pet_645c7db60b182', 'Chuchay', '2023-02-01', 'male', 'dog', 'Aspin', 'brown', 'DEA 1.1', 'pet_img-645c7db60a38b.png', '../../pets_image/pet_img-645c7db60a38b.png', '2023-05-11 13:31:34'),
(22, 'pet_645c7e0c2f1f6', 'Chichi', '2022-12-02', 'female', 'cat', 'Puspins', 'brown', 'A', 'pet_img-645c7e0c2e58d.png', '../../pets_image/pet_img-645c7e0c2e58d.png', '2023-05-11 13:33:00'),
(23, 'pet_645c7e7aabbe2', 'BenJ', '2022-09-09', 'male', 'dog', 'Aspin', 'white', 'DEA 1.1', 'pet_img-645c7e7aab22a.png', '../../pets_image/pet_img-645c7e7aab22a.png', '2023-05-11 13:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `pet_medical_history`
--

CREATE TABLE `pet_medical_history` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `medical` varchar(255) NOT NULL,
  `med_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_medical_history`
--

INSERT INTO `pet_medical_history` (`id`, `pet_id`, `medical`, `med_date`) VALUES
(1, 'pet_644fe24ea24c5', '2301', '2023-04-12'),
(2, 'pet_644fe24ea24c5', '2303', '2023-04-06'),
(3, 'pet_644fe390da4da', '2302', '2023-04-05'),
(4, 'pet_644fe390da4da', '2303', '2023-04-07'),
(5, 'pet_644fe400e5ebc', '2302', '2023-04-13'),
(6, 'pet_644fe400e5ebc', '2303', '2023-03-30'),
(7, 'pet_644fe43e77844', '2301', '2023-03-29'),
(8, 'pet_644fe43e77844', '2302', '2023-05-04'),
(9, 'pet_644fe43e77844', '2303', '2023-05-04'),
(10, 'pet_644fe43e77844', '2304', '2023-04-05'),
(11, 'pet_644fe47cde6bd', '2301', '2023-03-30'),
(12, 'pet_644fe4bf314db', '2301', '2023-04-06'),
(13, 'pet_64506502aa3f9', '2302', '2022-09-17'),
(14, 'pet_64506990a8367', '2303', '2023-02-14'),
(15, 'pet_645069ee221fa', '2302', '2023-04-18'),
(16, 'pet_645069ee221fa', '2303', '2023-04-13'),
(17, 'pet_64506a3da3199', '2302', '2023-04-19'),
(18, 'pet_64506b16732c1', '2302', '2023-04-05'),
(19, 'pet_64506b16732c1', '2303', '2023-04-01'),
(20, 'pet_64506b5db76d8', '2302', '2023-01-25'),
(21, 'pet_64506b5db76d8', '2303', '2023-04-14'),
(22, 'pet_64506ba21537d', '2301', '2022-05-10'),
(23, 'pet_64506ba21537d', '2303', '2023-04-27'),
(24, 'pet_64506c0d87c9c', '2302', '2023-04-07'),
(25, 'pet_64506c0d87c9c', '2303', '2023-04-12'),
(26, 'pet_64506c6e60b55', '2302', '2023-03-02'),
(27, 'pet_64506c6e60b55', '2303', '2023-04-27'),
(28, 'pet_64506cd567de2', '2301', '2023-03-09'),
(29, 'pet_64506cd567de2', '2302', '2023-04-13'),
(30, 'pet_6454d822c4187', '2302', '2023-03-01'),
(31, 'pet_6454d822c4187', '2303', '2023-03-01'),
(32, 'pet_6454d82512a21', '2302', '2023-03-01'),
(33, 'pet_6454d82512a21', '2303', '2023-03-01'),
(34, 'pet_645c7db60b182', '2303', '2023-04-01'),
(35, 'pet_645c7e0c2f1f6', '2303', '2023-05-01'),
(36, 'pet_645c7e7aabbe2', '2302', '2023-05-06'),
(37, 'pet_645c7e7aabbe2', '2303', '2023-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `pet_status`
--

CREATE TABLE `pet_status` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_status`
--

INSERT INTO `pet_status` (`id`, `pet_id`, `status`) VALUES
(1, 'pet_644fe24ea24c5', 'pending'),
(2, 'pet_644fe390da4da', 'adopted'),
(3, 'pet_644fe400e5ebc', 'adopted'),
(4, 'pet_644fe43e77844', 'pending'),
(5, 'pet_644fe47cde6bd', 'adopted'),
(6, 'pet_644fe4bf314db', 'pending'),
(7, 'pet_64506502aa3f9', 'adopted'),
(8, 'pet_64506990a8367', 'adopted'),
(9, 'pet_645069ee221fa', 'available'),
(10, 'pet_64506a3da3199', 'adopted'),
(11, 'pet_64506b16732c1', 'adopted'),
(12, 'pet_64506b5db76d8', 'available'),
(13, 'pet_64506ba21537d', 'adopted'),
(14, 'pet_64506c0d87c9c', 'adopted'),
(15, 'pet_64506c6e60b55', 'adopted'),
(16, 'pet_64506cd567de2', 'available'),
(17, 'pet_6454d822c4187', 'adopted'),
(19, 'pet_645c7d2389367', 'available'),
(20, 'pet_645c7d62119f4', 'adopted'),
(21, 'pet_645c7db60b182', 'pending'),
(22, 'pet_645c7e0c2f1f6', 'pending'),
(23, 'pet_645c7e7aabbe2', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pet_story`
--

CREATE TABLE `pet_story` (
  `id` int(11) NOT NULL,
  `pet_id` varchar(20) NOT NULL,
  `story` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_story`
--

INSERT INTO `pet_story` (`id`, `pet_id`, `story`) VALUES
(1, 'pet_644fe24ea24c5', 'Test '),
(2, 'pet_644fe390da4da', 'Hazel kun'),
(3, 'pet_644fe400e5ebc', 'Alphaku'),
(4, 'pet_644fe43e77844', 'Cherry Mobile'),
(5, 'pet_644fe47cde6bd', 'Katyaaaaaaaaaah'),
(6, 'pet_644fe4bf314db', 'Phantom'),
(7, 'pet_64506502aa3f9', 'Mimi'),
(8, 'pet_64506990a8367', 'Rio'),
(9, 'pet_645069ee221fa', 'Vash'),
(10, 'pet_64506a3da3199', 'Rex'),
(11, 'pet_64506b16732c1', 'Chimi'),
(12, 'pet_64506b5db76d8', 'Sky'),
(13, 'pet_64506ba21537d', 'Cloud'),
(14, 'pet_64506c0d87c9c', 'Jakjak'),
(15, 'pet_64506c6e60b55', 'Bambi'),
(16, 'pet_64506cd567de2', 'Migs'),
(17, 'pet_6454d822c4187', 'Gwen is a very playful cat.'),
(18, 'pet_6454d82512a21', 'Gwen is a very playful cat.'),
(19, 'pet_645c7d2389367', 'Sash is a playful cat'),
(20, 'pet_645c7d62119f4', 'Eliz is a playful cat'),
(21, 'pet_645c7db60b182', 'Chuchay is a playful dog'),
(22, 'pet_645c7e0c2f1f6', 'Chichi is a Playful Cat'),
(23, 'pet_645c7e7aabbe2', 'BenJ is a playful Dog');

-- --------------------------------------------------------

--
-- Table structure for table `pre_eval_user_answer`
--

CREATE TABLE `pre_eval_user_answer` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `existing_pet` varchar(255) NOT NULL,
  `vet_assistance` varchar(255) NOT NULL,
  `space_req` varchar(255) NOT NULL,
  `sleepingarea` varchar(255) NOT NULL,
  `living_arrangement` varchar(7) NOT NULL,
  `cage` varchar(3) NOT NULL,
  `leash` varchar(3) NOT NULL,
  `pens` varchar(3) NOT NULL,
  `feederer` varchar(3) NOT NULL,
  `properwaste` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_eval_user_answer`
--

INSERT INTO `pre_eval_user_answer` (`id`, `reference_no`, `user_id`, `existing_pet`, `vet_assistance`, `space_req`, `sleepingarea`, `living_arrangement`, `cage`, `leash`, `pens`, `feederer`, `properwaste`) VALUES
(1, '644FF7CAACA2DCA', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Rent', 'Yes', 'No', 'No', 'Yes', 'Yes'),
(2, '644FF8B8B0FA4F8', 'user_6447b7c3563fb', 'No', 'No', 'Yes', 'No', 'Rent', 'No', 'No', 'No', 'No', 'Yes'),
(3, '6450661E1C8E592', '108335001093346207746', 'Yes', 'Yes', 'Yes', 'Yes', 'Rent', 'Yes', 'Yes', 'Yes', 'No', 'Yes'),
(4, '64509BF4DCB9BFB', '110097824208142333641', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(5, '64509F0C793EFDA', '108124351070195328757', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(6, '6450A29BCB070E7', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Rent', 'Yes', 'No', 'Yes', 'Yes', 'Yes'),
(7, '6450B345095AAE2', '108335001093346207746', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'No', 'Yes', 'Yes'),
(8, '6450B612CF4223E', '108335001093346207746', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'No', 'Yes', 'Yes'),
(9, '6450C657606A4CA', '108335001093346207746', 'No', 'No', 'No', 'No', 'Rent', 'No', 'No', 'No', 'No', 'No'),
(10, '6450C6B720FB5DD', '108335001093346207746', 'No', 'No', 'No', 'No', 'Rent', 'No', 'No', 'No', 'No', 'No'),
(11, '6450C70813C49CB', '108335001093346207746', 'No', 'No', 'No', 'No', 'Rent', 'No', 'No', 'No', 'No', 'No'),
(12, '6450C8C47B3C603', '108335001093346207746', 'No', 'No', 'No', 'No', 'Rent', 'No', 'No', 'No', 'No', 'No'),
(13, '6450C99A51C51C4', '108335001093346207746', 'No', 'No', 'No', 'No', 'Rent', 'No', 'No', 'No', 'No', 'No'),
(14, '6450D31918A26B9', 'user_6423b0ccdeb06', 'No', 'Yes', 'Yes', 'Yes', 'Own', 'No', 'Yes', 'No', 'Yes', 'Yes'),
(15, '6450F767878560A', 'user_6450f560cf864', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(16, '6451D306CCEC06E', 'user_6447b7c3563fb', 'No', 'No', 'No', 'No', 'Rent', 'No', 'Yes', 'Yes', 'Yes', 'No'),
(17, '6451F54797D7A61', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Rent', 'Yes', 'Yes', 'No', 'Yes', 'Yes'),
(18, '6451F6E31FC57A6', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'No', 'Yes', 'Yes', 'Yes'),
(19, '6452722C63030BF', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'No', 'Yes', 'Yes', 'Yes'),
(20, '6452A8F365337BB', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'No', 'Yes', 'No', 'Yes', 'Yes'),
(21, '6453224B282D140', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'No', 'No', 'No', 'Yes'),
(22, '6453BB09DDFFC6A', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'No', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(23, '6454A662AE17AE9', 'user_6450f560cf864', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(24, '6454AB15C3162D6', 'user_6454aa6a8ecab', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(25, '6454AC6B75EFAA2', '109314027644136413984', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'No', 'Yes', 'Yes', 'Yes', 'No'),
(26, '6454AF5146D2215', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(27, '6454AFAE105E9A5', '109314027644136413984', 'No', 'Yes', 'Yes', 'Yes', 'Own', 'No', 'Yes', 'Yes', 'Yes', 'Yes'),
(28, '6454B3271EA701F', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'No', 'Rent', 'Yes', 'Yes', 'No', 'Yes', 'Yes'),
(29, '6454B68B6B29895', '109314027644136413984', 'Yes', 'No', 'Yes', 'Yes', 'Own', 'Yes', 'No', 'Yes', 'No', 'No'),
(30, '6454B762F291473', 'user_6454b5cb09a53', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(31, '6454C89D26C8301', 'user_6454c7ca2c63f', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(32, '6454CE7ED526149', 'user_640aed2572fc8', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(33, '6454D126C5074F5', '109314027644136413984', 'No', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'No', 'Yes', 'Yes', 'Yes'),
(34, '645A2CA6EC07E00', 'admin_642b92f9d070f', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'No', 'Yes', 'Yes', 'No', 'Yes'),
(35, '645A7C8205B11FD', 'user_6447b7c3563fb', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'No', 'Yes', 'No', 'Yes'),
(36, '645AF5DC757AFF8', 'user_645af5367b084', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(37, '645C5DB0CAF3636', 'user_645c5ca60437d', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(38, '645C5EDB6C4F2C7', 'user_645c5af066bfa', 'No', 'Yes', 'Yes', 'Yes', 'Own', 'No', 'Yes', 'Yes', 'Yes', 'Yes'),
(39, '645C80E338B340A', 'user_645c805698837', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(40, '645D98015995A72', 'user_6450f560cf864', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(41, '645D9CB18BB29AE', 'user_645d9c21cf789', 'No', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(42, '645DA9276EF8C23', 'user_645da8ab86dbc', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(43, '645DAE812B51251', 'user_645d9c21cf789', 'Yes', 'Yes', 'Yes', 'Yes', 'Own', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `services_id` varchar(20) NOT NULL,
  `type_of_service` varchar(255) NOT NULL,
  `info_service` varchar(255) NOT NULL,
  `image` varchar(55) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services_id`, `type_of_service`, `info_service`, `image`, `date_added`, `status`) VALUES
(1, 'Deworming', 'Deworming', 'Deworming (also known as worming, drenching, or dehelmintization) is the administration of an anthelmintic medicine (a wormer, dewormer, or drench) to humans or animals in order to rid them of helminth parasites such as roundworm, flukes, and tapeworm. ', 'service-640af75cd50ea.jpg', '2023-03-10 17:24:44', 'on'),
(2, 'Spay and Neuter', 'Spay and Neuter', '“Spaying” and “neutering” are surgical procedures used to prevent pets from reproducing. In a female animal, “spaying” consists of removing the ovaries or uterus. The technical term is ovariectomy or ovariohysterectomy.', 'service-64187ccc33183.jpg', '2023-03-20 23:33:32', 'on'),
(3, 'Consultation', 'Consultation', 'A consultation is your chance to discuss any questions or problems you have with your pet. And it is our opportunity to give your pet a thorough examination from head to tail. Any issues or problems we find need to be discussed and a treatment plan worked', 'service-64187d114824a.jpg', '2023-03-20 23:34:41', 'on'),
(7, 'Vaccination', 'Vaccination', 'Vaccinations prevent diseases that can be passed between animals and also from animals to people. Diseases prevalent in wildlife, such as rabies and distemper, can infect unvaccinated pets. In many areas, local or state ordinances require certain vaccinat', 'service-645098e79140f.jpg', '2023-05-02 13:00:23', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `services_schedule`
--

CREATE TABLE `services_schedule` (
  `id` int(11) NOT NULL,
  `services_id` varchar(20) NOT NULL,
  `schedule` date NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_schedule`
--

INSERT INTO `services_schedule` (`id`, `services_id`, `schedule`, `slot`) VALUES
(262, 'Consultation', '2023-05-18', 10),
(263, 'Consultation', '2023-05-19', 10),
(264, 'Consultation', '2023-05-22', 10),
(265, 'Consultation', '2023-05-23', 10),
(266, 'Consultation', '2023-05-24', 10),
(267, 'Consultation', '2023-05-25', 10),
(268, 'Consultation', '2023-05-26', 10),
(269, 'Consultation', '2023-05-29', 10),
(270, 'Consultation', '2023-05-30', 10),
(271, 'Consultation', '2023-05-31', 10),
(292, 'Spay and Neuter', '2023-05-18', 9),
(293, 'Spay and Nueter', '2023-05-25', 25);

-- --------------------------------------------------------

--
-- Table structure for table `services_transaction`
--

CREATE TABLE `services_transaction` (
  `id` int(11) NOT NULL,
  `services_application_id` varchar(55) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `type_of_service` varchar(55) NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `onebyone` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `schedule` date NOT NULL,
  `date_apply` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_transaction`
--

INSERT INTO `services_transaction` (`id`, `services_application_id`, `user_id`, `reference_no`, `status`, `type_of_service`, `valid_id`, `onebyone`, `image_path`, `schedule`, `date_apply`) VALUES
(1, 'services_644ff721ea2d1', 'user_6447b7c3563fb', '644FF721EAADA89', 'attended', 'Deworming', 'services_644ff721ea2d1_validID.jpg', 'services_644ff721ea2d1_1by1.jpg', '../service_upload/', '2023-04-29', '2023-05-02 01:30:09'),
(2, 'services_6450766b9a4a6', '108335001093346207746', '6450766B9AB563D', 'attended', 'Deworming', 'services_6450766b9a4a6_validID.png', 'services_6450766b9a4a6_1by1.png', '../service_upload/', '2023-04-25', '2023-05-02 10:33:15'),
(3, 'services_6450767ca573e', '108335001093346207746', '6450767CA5CDA0B', 'attended', 'Deworming', 'services_6450767ca573e_validID.png', 'services_6450767ca573e_1by1.png', '../service_upload/', '2023-04-26', '2023-05-02 10:33:32'),
(4, 'services_6450850dbecd3', '108335001093346207746', '6450850DBF244A7', 'attended', 'Deworming', 'services_6450850dbecd3_validID.png', 'services_6450850dbecd3_1by1.png', '../service_upload/', '2023-04-29', '2023-05-02 11:35:41'),
(5, 'services_6454d662dd251', 'user_6447b7c3563fb', '6454D662DD9FB1B', 'attended', 'Deworming', 'services_6454d662dd251_validID.jpg', 'services_6454d662dd251_1by1.jpg', '../service_upload/', '2023-04-26', '2023-05-05 18:11:46'),
(7, 'services_6454d6b093dd5', 'user_6450f560cf864', '6454D6B09444693', 'unattended', 'Deworming', 'services_6454d6b093dd5_validID.png', 'services_6454d6b093dd5_1by1.png', '../service_upload/', '2023-05-08', '2023-05-05 18:13:04'),
(8, 'services_645e4b495dfd0', 'user_64238a1653700', '645E4B495E83BEF', 'attended', 'Spay and Neuter', 'services_645e4b495dfd0_validID.png', 'services_645e4b495dfd0_1by1.jpg', '../service_upload/', '2023-05-18', '2023-05-12 22:20:57'),
(9, 'services_645e53216da4d', 'user_64238a1653700', '645E53216E18C03', 'Pending', 'Spay and Neuter', 'services_645e53216da4d_validID.png', 'services_645e53216da4d_1by1.jpg', '../service_upload/', '2023-05-18', '2023-05-12 22:54:25'),
(10, 'services_645e62c6234b8', 'user_64238a1653700', '645E62C623E8D8B', 'Pending', 'Spay and Neuter', 'services_645e62c6234b8_validID.png', 'services_645e62c6234b8_1by1.png', '../service_upload/', '2023-05-18', '2023-05-13 00:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `account_id` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_type` varchar(55) NOT NULL,
  `keyencrypt` varchar(255) NOT NULL,
  `isBanned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `account_id`, `email`, `password`, `user_type`, `keyencrypt`, `isBanned`) VALUES
(1, 'superadmin001', 'isagip.rectibytes@gmail.com', 'isagip.rectibytes@gmail.com', 'super admin', 'superadmin', 0),
(3, 'user_640aed2572fc8', 'jessica.ombao.bulleque@gmail.com', 'DtUVA2JtCrRrMA6qV8jQSZpnPg2KYhMFdRVWkSRzOVcj6QklgsiK2P9KGABiiRJk', 'user', 'boldpls', 0),
(26, 'admin_640c3dbf911a1', 'jessica.ombao.bulleque@gmail.com', 'DtUVA2JtCrRrMA6qV8jQSZpnPg2KYhMFdRVWkSRzOVcj6QklgsiK2P9KGABiiRJk', 'admin', 'boldpls', 0),
(27, 'admin_64158f98a39e5', 'ricky.soronel.jalayajay@gmail.com', 'rickysample', 'admin', '', 0),
(33, 'admin_6423141e242f5', 'edson98@gmail.com', '', 'admin', '', 0),
(34, 'user_64238a1653700', 'chum.dexter.roderick.rubio@gmail.com', 'W09UGuskcgB/r5InScrCA8brXYxSsi/3MeqcL6jDNsM=', 'user', 'QCIsagip', 0),
(35, 'user_6423b0ccdeb06', 'galuporicamae@gmail.com', 'LRK19UCiUniRTMbkNISt1NHioQ7me3Wn8RLKvKAb2rc=', 'user', 'boldpls', 0),
(36, 'user_6423b4db93fc2', 'jlngcmy21@gmail.com', 'VCv6kMxaoycGnhf63K+zGuiT5lcomjaEdC8hg+ULcZI=', 'user', 'boldpls', 0),
(38, 'user_64269a69163ba', 'albaniajames1@gmail.com', 'y38VUb8EskfAS2XYobuPQET4M0SawgvSi/S0/GHHzFSUciTU+li6mvb2M9W8H1PB', 'user', 'boldpls', 0),
(39, 'user_64269a88ede78', 'jessicabulleque0121@gmail.com', 'PMK2dhHHuFQqwdBELdKEK+tst7ylsGUfvj2inPr/W2o=', 'user', 'boldpls', 0),
(40, 'user_64269e229eaae', 'sumbaregetzu@gmail.com', 'x3jyGbTkumnRRw5Mnk8RqutaEYTTTohwSR/SkA+KSJQ=', 'user', 'boldpls', 0),
(41, 'user_6426f9405cb1a', 'jayhan.gabriel.abeleda@gmail.com', 'u2dYuYxVi6h7yw4Wwy37r36mbRsXIH4SQiVjfRNJAKY=', 'user', 'boldpls', 0),
(42, 'user_642796e0b6d3f', 'lalamaecondes@gmail.com', 'WHbtQMiVgMs2tWDfWqeWs7a9TUSE0eRZqdWuRiEF9vE=', 'user', 'boldpls', 0),
(43, 'user_642796e3f1763', 'lalamaecondes@gmail.com', 'WHbtQMiVgMs2tWDfWqeWs7a9TUSE0eRZqdWuRiEF9vE=', 'user', 'boldpls', 0),
(44, 'user_642915512bf3f', 'rixieapolehabay@gmail.com', '99YDsFV3dsG7t5DctBxAL3EJgYphSBJmIETCu6qpYx24EeaLfdHyqf35WYUdeE7v', 'user', 'boldpls', 0),
(45, 'admin_642b92f9d070f', 'charles.daniel.habay@gmail.com', 'habay1317', 'admin', '', 0),
(46, 'user_642d07f16bce5', 'edsonpaul98@gmail.com', 'PvoTa8QTV89h5GJE20HsCxCPcI+eq7KcyU/Ck2OCiFc=', 'user', 'boldpls', 0),
(47, 'user_642fe84150221', 'belen.jalayajay@gmail.com', '7LKBzYcGvryEx6d4W9bWWJLuI2r8OK1vhxJyn9+USCU=', 'user', 'boldpls', 0),
(48, 'user_64312df28db02', 'juvyanitomaquiling@gmail.com', 'Tfz5FsytyyxENJM08W4EobSARTKe91FTg2PLeDlE7RY=', 'user', 'boldpls', 0),
(49, 'user_64313ad56f7fa', 'habayc.qcydoqcu@gmail.com', '+B+OFEb1L6F1G3PIaYUilL/738Q3jbfQDoROok2YuvI=', 'user', 'QCIsagip', 0),
(50, 'user_6431448688b85', 'charles.habay23@gmail.com', 'JrPQxpA1qTrSM/+P7Aq4Dg3u2hwSgul3COXsl95dkI8=', 'user', 'QCIsagip', 0),
(51, 'user_64314c2621c5b', 'habay820@gmail.com', '6RLCFToIWQdaUtqXwTkR4sgJaV726YRN69ZPYM8/G9c=', 'user', 'boldpls', 0),
(52, 'user_6433aefe2bf99', 'Jhone@gmail.com', '6n1ZcZnH9kNgIFpIePThILXJwgCxws5FPsLOcmQAJGw=', 'user', 'boldpls', 0),
(53, 'user_6433afd9e44e0', 'rochelleannenicodemus@gmail.com', 'Rn6GgYIbwqEpt1W9/kwjQRjxTQ/LBvnN3h7bhJJGpls=', 'user', 'QCIsagip', 0),
(54, 'user_6433b19685d0c', 'duper1826@gmail.com', 'bBVI6orjZVeFZsolz2cSiBE/yb9qXXwXExWSRwY7xYs=', 'user', 'boldpls', 0),
(133, 'user_6436eec209c58', 'namhunter547@gmail.com', 'r/hYhYiJ3dAswznCENjDihUTJv4HUmIA3GNdvdn8Q/0=', 'user', 'boldpls', 0),
(134, 'user_6437f967453dd', 'james.albania110819@gmail.com', 'ecrKqDgXpMr0icJhAaujJ69wrTm4YVBfdlvu8i+PAwo=', 'user', 'boldpls', 0),
(135, 'admin_644535dc1b6ee', 'markampo30@gmail.com', 'markampo30', 'super admin', '', 0),
(136, 'admin_6445361968025', 'james.albania110819@gmail.com', 'ecrKqDgXpMr0icJhAaujJ69wrTm4YVBfdlvu8i+PAwo=', 'super admin', 'boldpls', 0),
(137, 'admin_6446429fe0121', 'chumdexterrubio@gmail.com', 'rubiochum', 'super admin', '', 0),
(138, 'admin_644690f925dce', 'jessicabulleque0121@gmail.com', 'jessicabulleque', 'admin', '', 0),
(139, 'admin_64475d937cdb9', 'mistugan1447@gmail.com', 'markampo', 'admin', '', 0),
(140, 'user_6447b786c0592', 'habay820@gmail.com', 'OlOGIDNJ6Y2jlYc6mlARKrKeBf+6wMzYdc4IbYLU2qk=', 'user', 'QCIsagip', 0),
(141, 'user_6447b7c3563fb', 'eballesmarlon@gmail.com', 'jtuYLCeNN3NJvOcUpgc3SXltXEYZyEqBVvhPwzNlb4g=', 'user', 'boldpls', 0),
(152, 'user_644f8b802e5c2', 'Eehyaah@gmail.com', 'U4AwnDz0IySjeuJdAsFxTXDFPl679xWOSYBAUsw44wE=', 'user', 'QCIsagip', 0),
(153, 'user_644f8c8653b11', 'hydraph0@gmail.com', 'hiOvTRF1FpvD0hIhoRcqsCfNLAxOmEowKcpLYfU2VcE=', 'user', 'QCIsagip', 0),
(154, 'user_64509ea92d02b', 'charlietzy23@gmail.com', 'kZsy1NB6FHkS5yYxXDw8j4CmnwsVOuAkroKIHZVXy9Q=', 'user', 'boldpls', 0),
(155, 'user_6450f560cf864', 'ricky.jalayajay.soronel@gmail.com', '/4mmVGnBq6AVB4iTC5lkCh0IENBWRIJEm1V1pUwEDBzOIbQ/3c0YmWSjBLoxgjo+', 'user', 'QCIsagip', 1),
(156, 'admin_64529d72e20a9', 'random@gmail.com', '', 'admin', '', 0),
(157, 'user_6454aa6a8ecab', 'jalayajayricardo@gmail.com', 'TOH9ORUdwI8BOv/6Bh7yr7agPJ/8+ATDSgz/Y67P6+E6DgjG/4ejzQI87J/rv1Gj', 'user', 'QCIsagip', 0),
(158, 'admin_6454aafff0c69', 'rixieapolehabay@gmail.com', '', 'super admin', '', 0),
(159, 'admin_6454acb42e0e2', 'romeliehabay@gmail.com', '', 'super admin', '', 0),
(160, 'user_6454ae6819e09', 'Johnryhafalla@gmail.com', '1F6vI0Z+fuyBukjOGNzXl8u+j+MJLugPkK5qv7CHGKU=', 'user', 'boldpls', 0),
(161, 'user_6454ae78b9dd9', 'imissyoubumalikkanapls@gmail.com', 'pi5ztFbREq6GvHbORwNToS2Cqsfh5s4vnXWpGZonuJg=', 'user', 'boldpls', 0),
(162, 'user_6454aec5b741b', 'maquiling.408358190087@depedqc.ph', '2ogCq/f3xUJy98A3/eI5eLCXoAS64cmtYRBiwY/p2tA=', 'user', 'boldpls', 0),
(163, 'user_6454b5cb09a53', 'compilationintern@gmail.com', 'OBatl+U4S2WrtQxryZSAofbcJEK7z3aZHNfHWBv3QQoqnM4XvQw0eczESgMRFb4t', 'user', 'QCIsagip', 0),
(164, 'user_6454b71fb00ee', 'lvcondes2268qc@student.fatima.edu.ph', 'NNrDw1ymmN1KfIJ2kMZ5AuMAS3XPTV4cQ8GQ4CfBfI8=', 'user', 'QCIsagip', 0),
(165, 'user_6454b9ed6b50d', 'edsonpaymaya@gmail.com', 'lQrzk/4o90lMZv6YfwiPjqYz2Nkm90t4jNuSt5VxvOM=', 'user', 'QCIsagip', 0),
(166, 'user_6454bce2e228a', 'lhuckycondes20@gmail.com', 'D3MeLzWdeXfC8w+eAHb161O40EoYgajbYZwYDqvAd5Q=', 'user', 'QCIsagip', 0),
(167, 'user_6454c7ca2c63f', 'melvinbacabis19@gmail.com', 'w2LLgX3D8rCJdjTgrWLt5iAVjEQzdH6ad8prv56/WI4=', 'user', 'QCIsagip', 0),
(168, 'user_645af5367b084', 'ritchiepaulsoroneljalayajay@gmail.com', '5dX3JIfeZiXFWzMpjS0jE0bWt58pfgKFfc8a1H7srWttW0yK9ikK3Ib3egQefKl+', 'user', 'QCIsagip', 1),
(169, 'user_645c5af066bfa', 'joshua.ledesma.dacuyan@gmail.com', 'U9i6cLRI+Wy0RxvtkTsmCh77h0gtZfvKmtKpGd7VVDI=', 'user', 'QCIsagip', 1),
(170, 'user_645c5ca60437d', 'jalayajayr.qcydoqcu@gmail.com', '0reFXjH/u69TbqZFCEvRG/0rGc2GTY+Ld+wStBal31j3MJ9/JBU5/eTVbF2Bp/Dw', 'user', 'QCIsagip', 0),
(171, 'user_645c805698837', 'erica.rosal09012000@gmail.com', 'DbAiOzrdP3F7EBH9rfTjxqq+d+1vcufXOtePb7wUpms=', 'user', 'QCIsagip', 0),
(172, 'user_645d9c21cf789', 'bacabismelvin@gmail.com', 'mqM8VQAV9lqOxZdlJc2++ch7mFE/NOZwNAYbpTRIMUs=', 'user', 'QCIsagip', 0),
(173, 'user_645da8ab86dbc', 'mark.melvin.bacabis@gmail.com', 'CFK87wzvfekYddraDZ9IdZgws3FHPgUThSmmKLBZzac=', 'user', 'QCIsagip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailStatus` varchar(55) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `contactStatus` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(55) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `ban_days` int(55) DEFAULT NULL,
  `isBanned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `firstname`, `lastname`, `email`, `emailStatus`, `contact`, `contactStatus`, `address`, `avatar`, `date_created`, `ban_days`, `isBanned`) VALUES
(1, 'user_640aed2572fc8', 'jessica', 'bulleque', 'jessica.ombao.bulleque@gmail.com', 'Verified', '09212323232', 'Not Verified', 'Ninada, Brgy. Payatas, Quezon City, Metro Manila', NULL, '2023-03-10 16:41:09', NULL, 0),
(2, 'user_640b028fbd5b8', 'mark', 'bacabis', 'melvinbacabis19@gmail.com', 'Verified', '09935188939', 'Not Verified', 'General Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', NULL, '2023-03-10 18:12:31', NULL, 0),
(3, 'user_640c1c09dceaf', 'mark', 'bacabis', 'mark.melvin.bacabis@gmail.com', 'Not Verified', '09935188939', 'Not Verified', 'Gen. Malvar, Brgy. Matandang Balara, Quezon City, Metro Manila', NULL, '2023-03-11 14:13:29', NULL, 0),
(4, 'user_641590ec391f0', 'mark', 'bacabis', 'melvinbacabis19@gmail.com', 'Verified', '09123123123', 'Not Verified', 'Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', NULL, '2023-03-18 18:22:36', NULL, 0),
(5, 'user_64187b4938733', 'Melvin', 'Bacabis', 'melvinbacabis19@gmail.com', 'Verified', '09935188939', 'Not Verified', 'Gen. Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', NULL, '2023-03-20 23:27:05', NULL, 0),
(7, 'user_64238a1653700', 'Chum', 'Dexter', 'chum.dexter.roderick.rubio@gmail.com', 'Verified', '09457690485', 'Verified', '#32 San Simon St, Brgy. Holy Spirit, Quezon City, Metro Manila', NULL, '2023-03-29 08:45:10', NULL, 0),
(8, '118179433103654496459', 'Ricky', 'Jalayajay', 'rickyjalayajay@gmail.com', 'Verified', '09913790829', 'Not Verified', '74 Kaligtsan St., Brgy. Holy Spirit, Quezon City, Metro Manila', NULL, '2023-03-29 11:24:23', NULL, 0),
(9, 'user_6423b0ccdeb06', 'Rica', 'Galupo', 'galuporicamae@gmail.com', 'Verified', '09099573850', 'Verified', 'Kapatiran St., Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-03-29 11:30:20', NULL, 0),
(10, 'user_6423b4db93fc2', 'Jovilyn', 'Camaya', 'jlngcmy21@gmail.com', 'Verified', '+6392295175', 'Not Verified', 'Daisy St., Brgy. Bagbag, Quezon City, Metro Manila', NULL, '2023-03-29 11:47:39', NULL, 0),
(11, '109314027644136413984', 'Charles Daniel', 'Habay', 'charles.daniel.habay@gmail.com', 'Verified', '09953310799', 'Verified', 'Sta. Veronica, Brgy. Payatas, Quezon City, Metro Manila', NULL, '2023-03-29 15:40:16', NULL, 0),
(12, '108335001093346207746', 'Edson Paul', 'olimberio', 'edsonpaul98@gmail.com', 'Verified', '09672973070', 'Not Verified', '3 Petronia St, Buenamar Subd., Brgy. Novaliches Proper, Quezon City, Metro Manila', NULL, '2023-03-29 15:48:23', 15, 0),
(14, 'user_64269a69163ba', 'James', 'Albania', 'albaniajames1@gmail.com', 'Verified', '09457735278', 'Not Verified', '14 hshshsgx, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-03-31 16:31:37', NULL, 0),
(15, 'user_64269a88ede78', 'Jessica', 'Bulleque', 'jessicabulleque0121@gmail.com', 'Not Verified', '09295668731', 'Not Verified', 'Ninada, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-03-31 16:32:08', NULL, 0),
(16, 'user_64269e229eaae', 'Tanggol', 'Tonggol', 'sumbaregetzu@gmail.com', 'Not Verified', '09123456789', 'Not Verified', 'hulaan mo, Brgy. Batasan Hills, Quezon City, Metro Manila', NULL, '2023-03-31 16:47:30', NULL, 0),
(17, '109170216362023848601', 'Charles Daniel', 'Habay', 'charles.habay017@gmail.com', 'Verified', '09976608544', 'Not Verified', 'Sta. Veronica, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-03-31 17:06:31', NULL, 0),
(18, 'user_6426f9405cb1a', 'Jayhan', 'Abeleda', 'jayhan.gabriel.abeleda@gmail.com', 'Verified', '09297312288', 'Verified', 'Dama De Noche St, Brgy. Payatas, Quezon City, Metro Manila', NULL, '2023-03-31 23:16:16', NULL, 0),
(19, '108060743667179777225', 'Charlieee', 'Tzy', 'charlietzy23@gmail.com', 'Verified', '09971276880', 'Not Verified', 'Sta. Veronica, Brgy. Payatas, Quezon City, Metro Manila', NULL, '2023-04-01 09:56:15', NULL, 0),
(20, 'user_642796e0b6d3f', 'Lara mae', 'Condes', 'lalamaecondes@gmail.com', 'Not Verified', '09060857601', 'Not Verified', 'Santos compound dona rosario, Brgy. Novaliches Proper, Quezon City, Metro Manila', NULL, '2023-04-01 10:28:48', NULL, 0),
(22, '114502636368834317386', 'Romelie', 'Habay', 'romeliehabay@gmail.com', 'Verified', '09448844544', 'Not Verified', 'asdasdasdsad, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-02 13:36:50', NULL, 0),
(23, 'user_642915512bf3f', 'Charles Daniel', 'Habay', 'rixieapolehabay@gmail.com', 'Verified', '09971275457', 'Not Verified', 'Sta, Veronica, Brgy. Payatas, Quezon City, Metro Manila', NULL, '2023-04-02 13:40:33', NULL, 0),
(24, 'user_642d07f16bce5', 'edson', 'olimberio', 'edsonpaul98@gmail.com', 'Not Verified', '09672973071', 'Not Verified', '3 Petronia St, Buenamar Subd., Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-05 13:32:33', NULL, 0),
(25, 'user_642fe84150221', 'Belen', 'Jalayajay', 'belen.jalayajay@gmail.com', 'Not Verified', '09074707687', 'Not Verified', '74 Kaligtasan, Brgy. Holy Spirit, Quezon City, Metro Manila', NULL, '2023-04-07 17:54:09', NULL, 0),
(26, '110908463419455070047', 'Christian David', 'Habay', 'habay820@gmail.com', 'Verified', '09177722419', 'Not Verified', 'Sta.Veronica St., Brgy. Payatas, Quezon City, Metro Manila', NULL, '2023-04-08 15:11:17', NULL, 0),
(27, 'user_64312df28db02', 'Jiego', 'Maquiling', 'juvyanitomaquiling@gmail.com', 'Not Verified', '09917383918', 'Not Verified', 'MRB, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-04-08 17:03:46', NULL, 0),
(28, 'user_64313ad56f7fa', 'Charles Daniel', 'Habay', 'habayc.qcydoqcu@gmail.com', 'Not Verified', '09863526134', 'Not Verified', 'Sta, Veronica, Brgy. Payatas, Quezon City, Metro Manila', NULL, '2023-04-08 17:58:45', NULL, 0),
(29, 'user_6431448688b85', 'C', 'Habay', 'charles.habay23@gmail.com', 'Verified', '09542526914', 'Not Verified', 'Dakila, Brgy. Batasan Hills, Quezon City, Metro Manila', NULL, '2023-04-08 18:40:06', NULL, 0),
(30, 'user_64314c2621c5b', 'Christian', 'Habay', 'habay820@gmail.com', 'Verified', '09261856393', 'Not Verified', 'Dakila, Brgy. Batasan Hills, Quezon City, Metro Manila', NULL, '2023-04-08 19:12:38', NULL, 0),
(31, 'user_6433aefe2bf99', 'Jhone', 'Aguidan', 'Jhone@gmail.com', 'Not Verified', '09692315611', 'Not Verified', 'Katarungan, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-04-10 14:38:54', NULL, 0),
(32, 'user_6433afd9e44e0', 'Rochelle Anne', 'Nicodemus', 'rochelleannenicodemus@gmail.com', 'Not Verified', '09567034900', 'Not Verified', 'Maya Street, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-04-10 14:42:33', NULL, 0),
(33, 'user_6433b19685d0c', 'Aiko', 'Summi', 'duper1826@gmail.com', 'Not Verified', '09389928728', 'Not Verified', '11 Street North Carolina, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-10 14:49:58', NULL, 0),
(115, '110886909087416402731', 'Mercado,', 'Glenn Lainard D.', 'glennlainardmercado@gmail.com', 'Verified', '99999999999', 'Not Verified', 'tc g b, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-10 15:17:21', NULL, 0),
(117, '104664707127982891396', 'John Rick', 'Escalona', 'johnrick.escalona09@gmail.com', 'Verified', '09776018582', 'Not Verified', '307 Litex Road, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-11 05:33:53', NULL, 0),
(118, '110595652598450525118', 'Jen', 'Ampo', 'dyeniperampo@gmail.com', 'Verified', '09129719285', 'Not Verified', 'Saint Anthony Street Republic Ave., Brgy. Holy Spirit, Quezon City, Metro Manila', NULL, '2023-04-11 08:15:20', NULL, 0),
(119, '106978394582784362996', 'Candelaria, Anjelo', 'Roestin M.', 'anjelo.roestin.candelaria@gmail.com', 'Verified', '09464564564', 'Not Verified', 'sadsafasdasdasdasdsadas, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-11 08:47:26', NULL, 0),
(120, 'user_6436eec209c58', 'Grace', 'Dagupan', 'namhunter547@gmail.com', 'Not Verified', '09563593346', 'Not Verified', 'Road 4 Extension, Brgy. Bagong Silangan, Quezon City, Metro Manila', NULL, '2023-04-13 01:47:46', NULL, 0),
(121, 'user_6437f967453dd', 'james', 'albania', 'james.albania110819@gmail.com', 'Verified', '09606321599', 'Not Verified', '123 adfadafgaf, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-04-13 20:45:27', NULL, 0),
(122, '113637109010930951311', 'Mark Anthony Mejos', 'Ampo', 'mistugan1447@gmail.com', 'Verified', '09275616645', 'Not Verified', 'Saint Anthony, Brgy. Holy Spirit, Quezon City, Metro Manila', NULL, '2023-04-21 20:34:29', NULL, 0),
(123, '110419897531703516391', 'Albania', 'James', 'james.albania110819@gmail.com', 'Verified', '09457725279', 'Not Verified', '1609 sampaguita st, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-04-23 21:39:25', NULL, 0),
(124, '106029196983802618806', 'James', 'Albania', 'nejma.ecalbania@gmail.com', 'Verified', '09999999999', 'Not Verified', 'street, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-25 13:12:21', NULL, 0),
(125, 'user_6447b786c0592', 'Marlon', 'Eballes', 'habay820@gmail.com', 'Not Verified', '09283718321', 'Verified', '043 Eulogio St. Don Fabian, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-04-25 19:20:38', NULL, 0),
(126, 'user_6447b7c3563fb', 'Marlon', 'Eballes', 'eballesmarlon@gmail.com', 'Verified', '09128371839', 'Not Verified', '043 Eulogio St. Don Fabian, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-25 19:21:39', NULL, 0),
(127, '116974033974546044899', 'Rosal,', 'Erica L.', 'erica.rosal09012000@gmail.com', 'Verified', '09283748189', 'Not Verified', '043 Eulogio St. Don Fabian, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-04-25 19:25:50', NULL, 0),
(138, 'user_644f8b802e5c2', 'Aya', 'Lisbo', 'Eehyaah@gmail.com', 'Not Verified', '09616171335', 'Not Verified', 'Bago Bantay, Brgy. Santo Cristo, Quezon City, Metro Manila', NULL, '2023-05-01 17:50:56', NULL, 0),
(139, 'user_644f8c8653b11', 'Winter Truncheon', 'Montefalco', 'hydraph0@gmail.com', 'Not Verified', '09392397735', 'Not Verified', '69 Dama de Noche, Brgy. Payatas, Quezon City, Metro Manila', NULL, '2023-05-01 17:55:18', NULL, 0),
(140, '108124351070195328757', 'Jalayajay,', 'Ricky S.', 'ricky.soronel.jalayajay@gmail.com', 'Verified', '09297608352', 'Not Verified', '74 Kaligtasan, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-05-02 11:40:34', NULL, 0),
(141, '110097824208142333641', 'iSagip', 'albania', 'isagip.rectibytes@gmail.com', 'Verified', '09297608353', 'Not Verified', '74 Kaligtasan, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-05-02 13:09:35', NULL, 0),
(142, 'user_64509ea92d02b', 'Charles Daniel', 'Habay', 'charlietzy23@gmail.com', 'Not Verified', '09962947104', 'Not Verified', 'Ewan, Brgy. Bagong Pag-asa, Quezon City, Metro Manila', NULL, '2023-05-02 13:24:57', NULL, 0),
(143, 'user_6450f560cf864', 'Ricky', 'Jalayajay', 'ricky.jalayajay.soronel@gmail.com', 'Verified', '09229517563', 'Not Verified', '74 Kaligtasan, Brgy. Holy Spirit, Quezon City, Metro Manila', NULL, '2023-05-02 19:34:56', NULL, 1),
(144, 'user_6454aa6a8ecab', 'Ricardo', 'Jalayajay', 'jalayajayricardo@gmail.com', 'Verified', '09297608358', 'Not Verified', '89 Kalayaan, Brgy. Bahay Toro, Quezon City, Metro Manila', NULL, '2023-05-05 15:04:10', NULL, 0),
(145, 'user_6454ae6819e09', 'Johnry', 'Hafalla', 'Johnryhafalla@gmail.com', 'Not Verified', '09193415679', 'Not Verified', '11 ALTON ST. BATASAN HILLS QC, Brgy. Batasan Hills, Quezon City, Metro Manila', NULL, '2023-05-05 15:21:12', NULL, 0),
(146, 'user_6454ae78b9dd9', 'Lumpiang', 'Shanghai', 'imissyoubumalikkanapls@gmail.com', 'Not Verified', '09560340406', 'Not Verified', 'Katuparan, Brgy. Commonwealth, Quezon City, Metro Manila', NULL, '2023-05-05 15:21:28', NULL, 0),
(147, 'user_6454aec5b741b', 'Christian', 'Habay', 'maquiling.408358190087@depedqc.ph', 'Not Verified', '09606326821', 'Not Verified', 'Hey, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-05-05 15:22:45', NULL, 0),
(148, '117062351099961068849', 'Ricky', 'Jalayajay', 'sugarcoating03@gmail.com', 'Not Verified', '09913790822', 'Not Verified', '74 Kaligtastan, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-05-05 15:50:36', NULL, 0),
(149, 'user_6454b5cb09a53', 'Daryl', 'San', 'compilationintern@gmail.com', 'Verified', '09298760835', 'Not Verified', '74 Kaligtsan St., Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-05-05 15:52:43', NULL, 0),
(150, 'user_6454b71fb00ee', 'Lara', 'Olimberio', 'lvcondes2268qc@student.fatima.edu.ph', 'Verified', '09293230112', 'Not Verified', 'Santos compound, Brgy. Novaliches Proper, Quezon City, Metro Manila', NULL, '2023-05-05 15:58:23', NULL, 0),
(151, 'user_6454b9ed6b50d', 'edson', 'olimberio', 'edsonpaymaya@gmail.com', 'Verified', '09672973079', 'Not Verified', '3 Petronia St, Buenamar Subd., Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-05-05 16:10:21', NULL, 0),
(152, 'user_6454bce2e228a', 'Mae', 'Olimberio', 'lhuckycondes20@gmail.com', 'Verified', '09179205033', 'Not Verified', 'Santos Compound, Brgy. Novaliches Proper, Quezon City, Metro Manila', NULL, '2023-05-05 16:22:58', NULL, 0),
(153, 'user_6454c7ca2c63f', 'Mark', 'Bacabis', 'melvinbacabis19@gmail.com', 'Verified', '09396323087', 'Not Verified', 'Gen. Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', NULL, '2023-05-05 17:09:30', NULL, 0),
(154, 'user_645af5367b084', 'Ritchie', 'Jalayajay', 'ritchiepaulsoroneljalayajay@gmail.com', 'Verified', '09297608354', 'Not Verified', '74 Kaligtasan, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-05-10 09:36:54', NULL, 1),
(155, 'user_645c5af066bfa', 'Joshua', 'Dacuyan', 'joshua.ledesma.dacuyan@gmail.com', 'Verified', '09519275437', 'Not Verified', 'Tulip, Brgy. Fairview, Quezon City, Metro Manila', NULL, '2023-05-11 11:03:12', NULL, 1),
(156, 'user_645c5ca60437d', 'Rock', 'Bautista', 'jalayajayr.qcydoqcu@gmail.com', 'Verified', '09297608359', 'Not Verified', '74 Kaligtasan, Brgy. Alicia, Quezon City, Metro Manila', NULL, '2023-05-11 11:10:30', NULL, 0),
(157, 'user_645c805698837', 'Erica', 'Rosal', 'erica.rosal09012000@gmail.com', 'Verified', '09100487940', 'Not Verified', '21 Bai Compound, Brgy. Vasra, QC, Brgy. Vasra, Quezon City, Metro Manila', NULL, '2023-05-11 13:42:46', NULL, 0),
(158, 'user_645d9c21cf789', 'melvin', 'bacabis', 'bacabismelvin@gmail.com', 'Verified', '09321323232', 'Not Verified', 'Gen. Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', NULL, '2023-05-12 09:53:37', NULL, 0),
(159, 'user_645da8ab86dbc', 'mark', 'bacabis', 'mark.melvin.bacabis@gmail.com', 'Verified', '09134323234', 'Not Verified', 'Gen Malvar, Brgy. Bagong Silangan, Quezon City, Metro Manila', NULL, '2023-05-12 10:47:07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int(11) NOT NULL,
  `adoptee_id` varchar(20) NOT NULL,
  `verify_acc` varchar(255) NOT NULL,
  `verify_type` varchar(20) NOT NULL,
  `verify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `adoptee_id`, `verify_acc`, `verify_type`, `verify_date`) VALUES
(1, 'user_64187b4938733', 'melvinbacabis19@gmail.com', 'Email', '2023-03-20'),
(3, '10833500109334620774', '09672973070', 'Phone', '2023-03-30'),
(4, 'user_64269a69163ba', 'albaniajames1@gmail.com', 'Email', '2023-03-31'),
(5, 'user_6426f9405cb1a', '09297312288', 'Phone', '2023-04-01'),
(6, 'user_6423b0ccdeb06', 'galuporicamae@gmail.com', 'Email', '2023-04-01'),
(7, 'user_6423b0ccdeb06', '09099573850', 'Phone', '2023-04-01'),
(8, 'user_6426f9405cb1a', 'jayhan.gabriel.abeleda@gmail.com', 'Email', '2023-04-01'),
(9, 'user_642915512bf3f', 'rixieapolehabay@gmail.com', 'Email', '2023-04-02'),
(10, 'user_642d07f16bce5', 'edsonpaul98@gmail.com', 'Email', '2023-04-05'),
(11, 'user_6431448688b85', 'charles.habay23@gmail.com', 'Email', '2023-04-08'),
(12, '10931402764413641398', '09953310799', 'Phone', '2023-04-10'),
(13, 'user_6433b7635b1df', 'stevenclarkpenedilaa@gmail.com', 'Email', '2023-04-10'),
(14, 'user_6433b7635b1df', '09556354024', 'Phone', '2023-04-10'),
(15, 'user_64238a1653700', 'chum.dexter.roderick.rubio@gmail.com', 'Email', '2023-04-12'),
(16, 'user_64238a1653700', '09457690485', 'Phone', '2023-04-12'),
(17, 'user_640aed2572fc8', 'jessica.ombao.bulleque@gmail.com', 'Email', '2023-04-13'),
(18, 'user_6437f967453dd', 'james.albania110819@gmail.com', 'Email', '2023-04-13'),
(19, 'user_6423b4db93fc2', 'jlngcmy21@gmail.com', 'Email', '2023-04-24'),
(20, 'user_64314c2621c5b', 'habay820@gmail.com', 'Email', '2023-04-24'),
(21, 'user_6447b7c3563fb', 'eballesmarlon@gmail.com', 'Email', '2023-04-25'),
(54, 'user_6450f560cf864', 'ricky.jalayajay.soronel@gmail.com', 'Email', '2023-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `verify_email`
--

CREATE TABLE `verify_email` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verify_email`
--

INSERT INTO `verify_email` (`id`, `email`, `code`, `expiry`) VALUES
(75, 'ricky.soronel.jalayajay@gmail.com', '8FQI2G', '2023-04-25 03:37:37'),
(125, 'hydraph0@gmail.com', 'S0FKC3', '2023-05-01 11:27:18'),
(128, 'ricky.jalayajay.soronel@gmail.com', 'U006VT', '2023-05-02 11:43:01'),
(129, 'belen.jalayajay@gmail.com', 'NX4J2J', '2023-05-05 07:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `verify_phone`
--

CREATE TABLE `verify_phone` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verify_phone`
--

INSERT INTO `verify_phone` (`id`, `phone`, `code`, `expiry`) VALUES
(1, '09935188939', '6cchcI', '2023-03-20 23:32:39'),
(13, '09457735278', '1YT4CU', '2023-04-13 12:48:38'),
(14, '', 'N6FUYF', '2023-04-24 12:32:01'),
(16, '09297312288', 'ADUBEW', '2023-04-24 12:46:04'),
(19, '09229517563', 'BY9NJS', '2023-05-09 14:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abuse_report`
--
ALTER TABLE `abuse_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_status`
--
ALTER TABLE `admin_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_temporary_account`
--
ALTER TABLE `admin_temporary_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_house`
--
ALTER TABLE `adoption_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_reschedule`
--
ALTER TABLE `adoption_reschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_schedule`
--
ALTER TABLE `adoption_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_slot`
--
ALTER TABLE `adoption_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_status`
--
ALTER TABLE `adoption_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_transaction`
--
ALTER TABLE `adoption_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci`
--
ALTER TABLE `ci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_revisit`
--
ALTER TABLE `ci_revisit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_announcement`
--
ALTER TABLE `cms_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_content`
--
ALTER TABLE `cms_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_pets`
--
ALTER TABLE `missing_pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_characteristics`
--
ALTER TABLE `pet_characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_details`
--
ALTER TABLE `pet_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_medical_history`
--
ALTER TABLE `pet_medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_status`
--
ALTER TABLE `pet_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_story`
--
ALTER TABLE `pet_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_eval_user_answer`
--
ALTER TABLE `pre_eval_user_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_schedule`
--
ALTER TABLE `services_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_transaction`
--
ALTER TABLE `services_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_email`
--
ALTER TABLE `verify_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_phone`
--
ALTER TABLE `verify_phone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abuse_report`
--
ALTER TABLE `abuse_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `admin_status`
--
ALTER TABLE `admin_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `admin_temporary_account`
--
ALTER TABLE `admin_temporary_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `adoption_house`
--
ALTER TABLE `adoption_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `adoption_reschedule`
--
ALTER TABLE `adoption_reschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `adoption_schedule`
--
ALTER TABLE `adoption_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `adoption_slot`
--
ALTER TABLE `adoption_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `adoption_status`
--
ALTER TABLE `adoption_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `adoption_transaction`
--
ALTER TABLE `adoption_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23007;

--
-- AUTO_INCREMENT for table `ci`
--
ALTER TABLE `ci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `ci_revisit`
--
ALTER TABLE `ci_revisit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms_announcement`
--
ALTER TABLE `cms_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cms_content`
--
ALTER TABLE `cms_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2305;

--
-- AUTO_INCREMENT for table `missing_pets`
--
ALTER TABLE `missing_pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pet_characteristics`
--
ALTER TABLE `pet_characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `pet_details`
--
ALTER TABLE `pet_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pet_medical_history`
--
ALTER TABLE `pet_medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pet_status`
--
ALTER TABLE `pet_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pet_story`
--
ALTER TABLE `pet_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pre_eval_user_answer`
--
ALTER TABLE `pre_eval_user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services_schedule`
--
ALTER TABLE `services_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `services_transaction`
--
ALTER TABLE `services_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `verify_email`
--
ALTER TABLE `verify_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `verify_phone`
--
ALTER TABLE `verify_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
