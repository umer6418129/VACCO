-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 05:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccination`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactuser`
--

CREATE TABLE `contactuser` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `query` varchar(500) DEFAULT NULL,
  `userid` bigint(20) DEFAULT NULL,
  `mark` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactuser`
--

INSERT INTO `contactuser` (`id`, `name`, `email`, `subject`, `query`, `userid`, `mark`) VALUES
(13, 'umer', 'marcrodney2207@gmail.com', 'hospital', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 'read'),
(15, 'Umer farooq', 'marcrodney2207@gmail.com', 'hospital', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `isapprove` varchar(50) DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `address`, `country`, `email`, `password`, `isapprove`, `isactive`, `create_at`) VALUES
(1, 'Eureka', '12/abc avenue', 'USA', 'admin@eureka.com', 'admin!eureka.12', 'Accepted', 0, '2023-09-06 01:00:46'),
(2, 'aki8', 'abs roard', 'Ind', 'aki@gmail.com', 'aki@gmail.com123A', 'Accepted', 0, '0000-00-00 00:00:00'),
(3, 'ASa', 'abcd', 'Anguilla', 'user22@gmail.com', 'user22@gmail.com', 'Rejected', 0, '0000-00-00 00:00:00'),
(4, 'qatar', 'Orangi town ', 'Albania', 'r0dney.m+003@yandex.com', 'r0dney.m+003@yandex.com', 'Rejected', 0, '0000-00-00 00:00:00'),
(6, 'santum', 'Orangi town ', 'Australia', 'marcrodney2207@gmail.com', 'marcrodney2207@gmail.com', 'Rejected', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` bigint(20) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password_hash` varchar(200) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `username`, `password_hash`, `create_at`) VALUES
(1, 'Admin@Sitee', 'Admin@123', '2023-09-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_request`
--

CREATE TABLE `test_request` (
  `id` bigint(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `home_address` varchar(100) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `vaccine` varchar(50) DEFAULT '',
  `availabity_from` date DEFAULT NULL,
  `availabity_to` date DEFAULT NULL,
  `isapprove` varchar(50) NOT NULL,
  `message` varchar(400) NOT NULL,
  `type` varchar(20) NOT NULL,
  `hospital_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_request`
--

INSERT INTO `test_request` (`id`, `name`, `email`, `age`, `home_address`, `blood_group`, `vaccine`, `availabity_from`, `availabity_to`, `isapprove`, `message`, `type`, `hospital_id`, `user_id`) VALUES
(17, 'ASa', 'marcrodney2207@gmail.com', '23 years', 'Orangi town ', 'O Negative', 'p-fizer', '2023-09-27', '2023-10-06', 'accepted', '', 'vaccine', 2, 2),
(24, 'umer', 'marcrodney2207@gmail.com', '23 years', 'Orangi town ', 'O Negative', '', '2023-09-25', '2023-09-27', 'accepted', '', 'test', 2, 2),
(25, 'umer', 'marcrodney2207@gmail.com', '23 years', 'Orangi town ', 'O Negative', '', '2023-09-25', '2023-09-27', 'pending', '', 'test', 2, 2),
(26, 'ASa', 'r0dney.m+003@yandex.com', '23 years', 'Orangi town ', 'O Negative', 'p-fizer', '2023-09-26', '2023-09-26', 'accepted', '', 'vaccine', 2, 2),
(27, 'ASa', 'r0dney.m+003@yandex.com', '23 years', 'Orangi town ', 'O Negative', 'p-fizer', '2023-09-26', '2023-09-26', 'rejected', '', 'vaccine', 2, 2),
(28, 'ASa', 'r0dney.m+003@yandex.com', '23 years', 'Orangi town ', 'O Negative', 'p-fizer', '2023-09-26', '2023-09-26', 'rejected', 'this is fake', 'vaccine', 2, 2),
(29, 'ASa', 'r0dney.m+003@yandex.com', '23 years', 'Orangi town ', 'O Negative', 'p-fizer', '2023-09-26', '2023-09-26', 'pending', '', 'vaccine', 2, 2),
(30, 'ASa', 'marcrodney2207@gmail.com', '23 years', 'Orangi town ', 'O', 'p-Fizer', '2023-09-26', '2023-09-28', 'accepted', 'congrats your appointment has been submited', 'vaccine', 1, 1),
(31, 'umer', 'marcrodney2207@gmail.com', '23 years', 'Orangi town ', 'O Negative', '', '2023-09-26', '2023-09-12', 'accepted', 'your request has been accepted', 'test', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `f_name` varchar(200) DEFAULT NULL,
  `l_name` varchar(200) DEFAULT NULL,
  `email_phone` varchar(300) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `isapprove` varchar(30) DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email_phone`, `gender`, `password`, `isapprove`, `isactive`, `create_at`) VALUES
(1, 'first', 'User', 'user12@gmail.com', 'male', 'User@vaccineEE', 'Accepted', 1, '2023-09-10 12:38:21'),
(2, 'Second', 'User', 'marcrodney2207@gmail.com', 'male', 'marcrodney2207@', 'Accepted', 0, '0000-00-00 00:00:00'),
(3, 'luis', 'alex', '03202016607', 'female', '03202016607', 'Rejected', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `formula` varchar(100) DEFAULT NULL,
  `availability` varchar(50) DEFAULT NULL,
  `hospital_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `name`, `formula`, `availability`, `hospital_id`) VALUES
(1, 'p-Fizer', 'ABC', 'Available', 1),
(2, 'p-fizer', 'ABC', 'Available', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactuser`
--
ALTER TABLE `contactuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_request`
--
ALTER TABLE `test_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactuser`
--
ALTER TABLE `contactuser`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_request`
--
ALTER TABLE `test_request`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactuser`
--
ALTER TABLE `contactuser`
  ADD CONSTRAINT `contactuser_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `test_request`
--
ALTER TABLE `test_request`
  ADD CONSTRAINT `test_request_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`),
  ADD CONSTRAINT `test_request_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD CONSTRAINT `vaccines_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
