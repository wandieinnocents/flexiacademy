-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2019 at 11:13 PM
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
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

CREATE TABLE `course_modules` (
  `title_id` int(11) NOT NULL,
  `course_structure_id` int(11) DEFAULT NULL,
  `module_name` varchar(100) DEFAULT NULL,
  `module_description` varchar(500) DEFAULT NULL,
  `module_time` bigint(20) DEFAULT NULL,
  `module_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_structure`
--

CREATE TABLE `course_structure` (
  `structure_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `course_name` varchar(200) DEFAULT NULL,
  `course_description` text,
  `learning_materal` text,
  `course_duration` varchar(20) DEFAULT NULL,
  `course_fee` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_sub_modules`
--

CREATE TABLE `course_sub_modules` (
  `sub_module_id` int(11) NOT NULL,
  `sub_module_name` varchar(100) DEFAULT NULL,
  `sub_module_description` varchar(500) DEFAULT NULL,
  `time_allocation` bigint(20) DEFAULT NULL,
  `sub_module_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `user_roles` varchar(3000) DEFAULT NULL,
  `profile_picture` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_users`
--

INSERT INTO `table_users` (`user_id`, `first_name`, `last_name`, `user_name`, `date_of_birth`, `email_address`, `mobile_contact`, `user_password`, `password_salt`, `user_account`, `user_roles`, `profile_picture`) VALUES
(1, 'William', 'Pande', 'WilliamPande', 755038800, 'pandewilliam100@gmail.com', '256703683125', '38c7b7edc5b60dc682db806dddcd16530764743a91dc4fa8ac53f09b6c8c68e40b1e9e54ce3231594cb6c0eb13c444fead010a6be7b72443c9302ed6aed6cfc8', 'c40050c8f8323ecb6256de6089444c4c79dd778d84c35dec469592031075395d43920693456968b1e61493cca1402f0c61d78257cb39402a9779aebfe45260a2', 'flexi_account', '{\"student\":1}', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `session_id` int(11) NOT NULL,
  `session` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `browser_data` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD PRIMARY KEY (module_id),
  ADD KEY `course_modules_course_structure_structure_id_fk` (`course_structure_id`);

--
-- Indexes for table `course_structure`
--
ALTER TABLE `course_structure`
  ADD PRIMARY KEY (`structure_id`),
  ADD KEY `course_structure_course_categories_category_id_fk` (`category_id`);

--
-- Indexes for table `course_sub_modules`
--
ALTER TABLE `course_sub_modules`
  ADD PRIMARY KEY (`sub_module_id`);

--
-- Indexes for table `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY module_id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_structure`
--
ALTER TABLE `course_structure`
  MODIFY `structure_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_sub_modules`
--
ALTER TABLE `course_sub_modules`
  MODIFY `sub_module_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_users`
--
ALTER TABLE `table_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD CONSTRAINT `course_modules_course_structure_structure_id_fk` FOREIGN KEY (`course_structure_id`) REFERENCES `course_structure` (`structure_id`);

--
-- Constraints for table `course_structure`
--
ALTER TABLE `course_structure`
  ADD CONSTRAINT `course_structure_course_categories_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
