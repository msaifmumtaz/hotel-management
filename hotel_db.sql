-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 05:33 PM
-- Server version: 10.5.9-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hms_customers`
--

CREATE TABLE `hms_customers` (
  `cid` int(11) NOT NULL,
  `customer_no` varchar(8) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `no_of_guest` int(11) NOT NULL,
  `check_in` varchar(100) NOT NULL,
  `check_out` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hms_rooms`
--

CREATE TABLE `hms_rooms` (
  `rid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `package_type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_rooms` int(11) NOT NULL,
  `available_rooms` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hms_rooms_categories`
--

CREATE TABLE `hms_rooms_categories` (
  `rcid` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `room_image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hms_rooms_subcategories`
--

CREATE TABLE `hms_rooms_subcategories` (
  `subcatid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hms_rooms_subrooms`
--

CREATE TABLE `hms_rooms_subrooms` (
  `subroom_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hms_users`
--

CREATE TABLE `hms_users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `role_id` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hms_users`
--

INSERT INTO `hms_users` (`uid`, `username`, `email`, `full_name`, `phone_no`, `profile_pic`, `role_id`, `password`, `updated_at`, `created_at`) VALUES
(1, 'saifcodes', 'ch.saif109@gmail.com', 'Muhammad Saif', '+923082355746', '/srv/www/vhosts/hotel.pk/uploads/profile/344989dccc9d42de59e3aece66db92d3.png', '', '$2y$10$UiejKj.fukGP7SrLVPAKS.mwCgQic6MoJHP/YipJJeA3IXPEToT4a', '2021-03-30 17:09:17', '2021-03-30 17:09:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hms_customers`
--
ALTER TABLE `hms_customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `hms_rooms`
--
ALTER TABLE `hms_rooms`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `hms_users`
--
ALTER TABLE `hms_users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hms_customers`
--
ALTER TABLE `hms_customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_rooms`
--
ALTER TABLE `hms_rooms`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_users`
--
ALTER TABLE `hms_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
