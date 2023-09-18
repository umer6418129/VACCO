-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 07:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
  `query` varchar(2000) DEFAULT NULL,
  `userid` bigint(20) DEFAULT NULL,
  `mark` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactuser`
--

INSERT INTO `contactuser` (`id`, `name`, `email`, `subject`, `query`, `userid`, `mark`) VALUES
(13, 'umer', 'marcrodney2207@gmail.com', 'hospital', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 'read'),
(18, 'Umer', 'admin.aptechorangi@gmail.com', 'umer', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions', 1, 'read'),
(19, 'Umer', 'admin.aptechorangi@gmail.com', 'umer', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions', 1, 'read');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `address`, `country`, `email`, `password`, `isapprove`, `isactive`, `create_at`) VALUES
(1, 'Eureka', '12/abc avenue', 'USA', 'admin@eureka.com', 'admin!eureka.12', 'Accepted', 0, '2023-09-06 01:00:46'),
(2, 'aki', 'abs roard', 'Ind', 'aki@gmail.com', 'aki@gmail.com', 'Accepted', 0, '0000-00-00 00:00:00'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `username`, `password_hash`, `create_at`) VALUES
(1, 'Admin@Sitee', 'Admin@123', '2023-09-06 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `name`, `formula`, `availability`, `hospital_id`) VALUES
(1, 'p-Fizer', 'ABC', 'Available', 1);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactuser`
--
ALTER TABLE `contactuser`
  ADD CONSTRAINT `contactuser_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD CONSTRAINT `vaccines_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
