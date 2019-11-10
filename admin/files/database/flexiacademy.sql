-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2019 at 09:30 AM
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

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`category_id`, `category_name`) VALUES
(1, 'category one'),
(2, 'Second category');

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

CREATE TABLE `course_modules` (
  `module_id` int(11) NOT NULL,
  `course_structure_id` int(11) DEFAULT NULL,
  `module_name` varchar(100) DEFAULT NULL,
  `module_description` varchar(500) DEFAULT '',
  `module_order` int(11) DEFAULT NULL,
  `viewable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`module_id`, `course_structure_id`, `module_name`, `module_description`, `module_order`, `viewable`) VALUES
(1, 1, 'This is the first module', '', 1, 1),
(2, 1, 'This is my next module', '', 2, 1),
(3, 1, 'And the thirs shall be like this', '', 3, 1),
(4, 1, 'This shall be implemented', '', 4, 0),
(5, 1, 'This shall be implemented next', '', 5, 0),
(6, 2, 'hhhhhhhhhhhhhh', '', 1, 1),
(7, 2, 'rrrrrrrrrrrrrrr', '', 2, 1),
(8, 2, 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '', 3, 1),
(9, 2, 'nnnnnnnnnnnnnnnnnnnnnnnn', '', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_structure`
--

CREATE TABLE `course_structure` (
  `structure_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `course_name` varchar(200) DEFAULT NULL,
  `course_fee` double DEFAULT NULL,
  `course_description` varchar(6500) DEFAULT NULL,
  `learning_material` varchar(1000) DEFAULT '{}',
  `start_date` bigint(20) DEFAULT NULL,
  `end_date` bigint(20) DEFAULT NULL,
  `course_highlight` varchar(300) DEFAULT NULL,
  `cover_image` varchar(100) DEFAULT '',
  `cover_video` varchar(100) DEFAULT '',
  `rating_average` double DEFAULT '0',
  `rating_people` int(11) DEFAULT '0',
  `what_you_learn` varchar(6500) DEFAULT '',
  `who_is_for` varchar(2000) DEFAULT '',
  `why_unique` varchar(3000) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_structure`
--

INSERT INTO `course_structure` (`structure_id`, `category_id`, `course_name`, `course_fee`, `course_description`, `learning_material`, `start_date`, `end_date`, `course_highlight`, `cover_image`, `cover_video`, `rating_average`, `rating_people`, `what_you_learn`, `who_is_for`, `why_unique`) VALUES
(1, 1, 'Course one', 500000, '<p><strong>If you require IE8-9 support, use Bootstrap 3.</strong> It is the most stable version of Bootstrap, and it is still supported by the team for critical bugfixes and documentation changes. However, new features will NOT be added to it.</p>\n\n<p>We have created a responsive starter template with <strong>Bootstrap 4.</strong> You are free to modify, save, share, and use it in your projects:</p>\n\n<ol start=\"1\">\n	<li>\n	<p>W3.CSS is an excellent alternative to Bootstrap 4.</p>\n	</li>\n	<li>\n	<p>W3.CSS is smaller, faster, and easier to use.</p>\n	</li>\n	<li>\n	<p>If you want to learn W3.CSS, go to our W3.CSS Tutorial.</p>\n	</li>\n</ol>', '{\"video_tutorials\":1,\"document_resources\":1,\"mobile_access\":1,\"course_certificate\":0,\"course_assignments\":0}', 1556236800, 0, 'This is my description that i need to appear on the description part and if its is so long more than 100 characters it shall be automatically truncated', 'img_1556702473.JPG', '', 0, 0, '<p>In this course you shall learn how to;</p>\n\n<ol>\n	<li>Preapare a list</li>\n	<li>Arrange data</li>\n	<li>The third component</li>\n	<li>This shall be awsome</li>\n	<li>Then you shall be superb</li>\n	<li>And this shall be more great</li>\n</ol>\n\n<p>This shall put you ata alevel far more beyound the optimum in the work industry at hand</p>', '<p>This course is for some one who</p>\n\n<ol>\n	<li>Wants to be perfect in this course.</li>\n	<li>Has limitted time to go to class</li>\n	<li>Has no knowlege on this course</li>\n</ol>', '<p>This course is unique because:</p>\n\n<ol>\n	<li>It is unique</li>\n	<li>It is complete</li>\n	<li>It is different from others</li>\n	<li>It is simple to understand</li>\n</ol>'),
(2, 2, 'My second couse', 250000, '<p>Very often, especially on small screens, you want to hide the navigation links and replace them with a button that should reveal them when clicked on.</p>\n\n<p>To create a collapsible navigation bar, use a button with <strong>class=&quot;navbar-toggler&quot;</strong>, <strong>data-toggle=&quot;collapse&quot;</strong> and data-<strong>target=&quot;#<em>thetarget</em>&quot;</strong>. Then wrap the navbar content (links, etc) inside a div element with class=&quot;collapse navbar-collapse&quot;, followed by an id that matches the data-target of the button: &quot;<em>thetarget</em>&quot;.</p>', '{\"video_tutorials\":1,\"document_resources\":0,\"mobile_access\":0,\"course_certificate\":1,\"course_assignments\":1}', 1559347200, 1567209600, 'The height of the progress bar is 16px by default. Use the CSS height property to change it. Note that you must set the same height for the progress container and the progress bar:', 'img_1557663054.jpg', '', 0, 0, '<p>When using the .navbar-brand class on images, Bootstrap 4 will automatically style the image to fit the navbar vertically.</p>\n\n<ol>\n	<li>\n	<p>A sticky navigation bar.</p>\n	</li>\n	<li>\n	<p>Stays fixed at the top of the page when you scroll past it.</p>\n	</li>\n	<li>\n	<p>Scroll this page to see the effect.</p>\n	</li>\n	<li>\n	<p><strong>Note:</strong> sticky-top does not work in IE11 and earlier.</p>\n	</li>\n</ol>', '<ol>\n	<li>\n	<p>Some example text. Some example text. Some example text. Some example text. Some example text.</p>\n	</li>\n	<li>\n	<p>Some example text. Some example text. Some example text. Some example text. Some example text.</p>\n	</li>\n	<li>\n	<p>Some example text. Some example text. Some example text. Some example text. Some example text.</p>\n	</li>\n	<li>\n	<p>Some example text. Some example text. Some example text. Some example text. Some example text.</p>\n	</li>\n</ol>', '<ol>\n	<li>HTML Reference</li>\n	<li>CSS Reference</li>\n	<li>JavaScript Reference</li>\n	<li>SQL Reference</li>\n	<li>Python Reference</li>\n	<li>W3.CSS Reference</li>\n	<li>Bootstrap Reference</li>\n	<li>PHP Reference</li>\n	<li>HTML Colors</li>\n	<li>jQuery Reference</li>\n	<li>Angular Reference</li>\n	<li>Java Reference</li>\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `course_sub_modules`
--

CREATE TABLE `course_sub_modules` (
  `sub_module_id` int(11) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `sub_module_name` varchar(100) DEFAULT NULL,
  `sub_module_description` varchar(500) DEFAULT '',
  `sub_module_order` int(11) DEFAULT NULL,
  `viewable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_sub_modules`
--

INSERT INTO `course_sub_modules` (`sub_module_id`, `module_id`, `sub_module_name`, `sub_module_description`, `sub_module_order`, `viewable`) VALUES
(1, 1, 'ggggggggggggggg', '', 1, 1),
(2, 1, 'mmmmmmmmmmmmm', '', 2, 0),
(3, 1, 'kkkkkkkkkk', '', 3, 1),
(4, 1, 'ddddddddddddddd', '', 4, 1),
(5, 5, 'mmmmmmmmmmmmm', '', 1, 1),
(6, 5, 'tttttttttttttt', '', 2, 1),
(7, 5, 'kkkkkkkkkkkkkkkkkkkkk', '', 3, 1),
(8, 5, '444444444444444444444', '', 4, 1),
(9, 3, 'I love this', '', 1, 0),
(10, 3, 'I love this', '', 1, 0),
(11, 4, 'Nicessst', '', 1, 1),
(12, 4, 'Yeahd', '', 2, 1),
(13, 4, 'Nicessst', '', 1, 1),
(14, 4, 'Yeahd', '', 2, 1),
(15, 6, 'nnnnnnnnnnnnnnnnnnnn', '', 1, 1),
(16, 6, '77777777777777777', '', 2, 1),
(17, 6, '999999999999999999999999999', '', 3, 1),
(18, 6, '0000000000000000000', '', 4, 1),
(19, 7, '333333333333333333333333333', '', 1, 1),
(20, 7, '999999999999oooooooooooooo', '', 2, 1),
(21, 7, '[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[', '', 3, 1),
(22, 7, '55555555555555555555555555', '', 4, 1),
(23, 7, '3333333333333333333333333', '', 5, 1),
(24, 8, '6666666666666666666', '', 1, 1),
(25, 8, '999999999999999999999', '', 2, 1),
(26, 8, 'pppppppppppppppppppppp', '', 3, 1),
(27, 8, '9999999999999999999999999', '', 4, 1),
(28, 8, '777777777777777777777777777', '', 5, 1);

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

INSERT INTO `table_users` (`user_id`, `first_name`, `last_name`, full_name, `date_of_birth`, `email_address`, `mobile_contact`,
                           `user_password`, `password_salt`, `user_account`, `user_roles`, `profile_picture`)
VALUES
(1, 'William', 'Pande', 'WilliamPande', 755038800, 'pandewilliam100@gmail.com', '256703683125', '', '', 'google.com', '{\"student\":1}', 'https://lh5.googleusercontent.com/-HOMEeRxBWrY/AAAAAAAAAAI/AAAAAAAAADk/nU98XKFlJRw/photo.jpg'),
(2, 'William', 'Pande', '', -100000000000, 'pande.william67@gmail.com', '', '', '', 'facebook.com', '{\"student\":1}', 'https://graph.facebook.com/1446470715487783/picture');

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
  ADD PRIMARY KEY (`module_id`),
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
  ADD PRIMARY KEY (`sub_module_id`),
  ADD KEY `course_sub_modules_course_modules_module_id_fk` (`module_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_structure`
--
ALTER TABLE `course_structure`
  MODIFY `structure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_sub_modules`
--
ALTER TABLE `course_sub_modules`
  MODIFY `sub_module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `table_users`
--
ALTER TABLE `table_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Constraints for table `course_sub_modules`
--
ALTER TABLE `course_sub_modules`
  ADD CONSTRAINT `course_sub_modules_course_modules_module_id_fk` FOREIGN KEY (`module_id`) REFERENCES `course_modules` (`module_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
