-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2019 at 06:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flexiacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_users`
--

CREATE TABLE `table_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `date_of_birth` bigint(20) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `mobile_contact` varchar(25) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `password_salt` varchar(200) DEFAULT NULL,
  `user_account` varchar(25) DEFAULT NULL,
  `user_roles` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_users`
--

INSERT INTO `table_users` (`user_id`, `first_name`, `last_name`, `user_name`, `date_of_birth`, `email_address`, `mobile_contact`, `user_password`, `password_salt`, `user_account`, `user_roles`) VALUES
(1, 'William', 'Pande', 'WilliamPande', 755038800, 'pandewilliam100@gmail.com', '256703683125', '38c7b7edc5b60dc682db806dddcd16530764743a91dc4fa8ac53f09b6c8c68e40b1e9e54ce3231594cb6c0eb13c444fead010a6be7b72443c9302ed6aed6cfc8', 'c40050c8f8323ecb6256de6089444c4c79dd778d84c35dec469592031075395d43920693456968b1e61493cca1402f0c61d78257cb39402a9779aebfe45260a2', 'flexi_account', '{\"student\":1}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_users`
--
ALTER TABLE `table_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
