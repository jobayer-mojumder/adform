-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 03:40 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `password`, `group`, `fullname`, `email`, `image`, `thumb`, `status`) VALUES
(7, 'OhG8S2W7hphOurMSBTNjFrhEl9ATKvhvgUfRBYW82bk6+Cims6UL4cBSxpDH1LsJuf394i3eFl8wd+oOTf174w==', 'super_admin', 'Jobayer Mojumder', 'jobayer.pro@gmail.com', 'rick_kelly.jpg', 'thumb_rick_kelly.jpg', 1),
(18, 'SQaFvZ3lz5FEzo9HRbNYTaODVxaND5+qLk66gr9X41B7+fxNUnDGlehwdvwq4/YdcMZGPMPoea8SEunc+sHD2Q==', 'admin', 'Abul Hasnat Nayeem', 'shakil@gmail.com', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_image_thumb` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_activation_key` varchar(255) DEFAULT NULL,
  `user_activation_key_time` datetime DEFAULT NULL,
  `user_level` int(11) NOT NULL DEFAULT '2',
  `user_registration_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_forgot_password_code` varchar(255) DEFAULT NULL,
  `user_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `user_email`, `user_image`, `user_image_thumb`, `user_password`, `user_activation_key`, `user_activation_key_time`, `user_level`, `user_registration_time`, `user_forgot_password_code`, `user_status`) VALUES
(10, 'Jobayer Mojumder', 'jobayer.pro@gmail.com', 'rick_kelly.jpg', 'thumb_rick_kelly.jpg', 'Agu6mbWHbVD5tASb9G5jggawVgiwu0rteeIZI4C05DZcCBtq2vLYcF193gtLLf0WPmvDtHpP6FGzUYeShe4hUg==', '1521288300bf4db73c0d678e86eca0b9bdd6c0b8ff', '2018-03-17 18:05:00', 2, '2018-03-17 12:05:00', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
