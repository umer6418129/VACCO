-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 10:24 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'p-Fizer', 'ABC', 'Available', 1);

--
-- Indexes for dumped tables
--

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
-- Constraints for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD CONSTRAINT `vaccines_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
