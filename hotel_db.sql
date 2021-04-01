-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2021 at 01:05 PM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `hms_booking`
--

CREATE TABLE `hms_booking` (
  `bookid` int(11) NOT NULL,
  `customer_no` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `id_card` varchar(50) NOT NULL,
  `id_card_type` varchar(50) NOT NULL,
  `country` varchar(25) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `pack_id` int(150) NOT NULL,
  `no_of_guests` int(10) NOT NULL,
  `check_in` varchar(100) NOT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_payment` varchar(50) NOT NULL,
  `paid` varchar(50) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hms_customers`
--

CREATE TABLE `hms_customers` (
  `cid` int(11) NOT NULL,
  `customer_no` varchar(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `id_card` varchar(50) DEFAULT NULL,
  `id_card_type` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hms_customers`
--

INSERT INTO `hms_customers` (`cid`, `customer_no`, `first_name`, `last_name`, `address`, `email`, `phone_no`, `id_card`, `id_card_type`, `country`, `created_at`, `updated_at`) VALUES
(1, 'aeb44fa4384c', 'mUHAMMD', 'DHFDDS', 'sdfsfdsfdsaf', 'sds@dfd.com', '03082533134', '3315457454', 'admin', 'pakis', '2021-03-31 18:07:34', '2021-03-31 18:07:34'),
(2, '495eba8a', 'Muhammad', 'Saif', 'Mian Channu', 'm.saifmumtaz@gmail.com', '03082355748', '3520478963542', 'admin', 'Pakistan', '2021-03-31 18:12:38', '2021-03-31 18:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `hms_packages`
--

CREATE TABLE `hms_packages` (
  `pack_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `package_description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hms_packages`
--

INSERT INTO `hms_packages` (`pack_id`, `package_name`, `package_description`) VALUES
(1, '5 Star Lab 1', '5 Star Lab'),
(2, '5 Star Lab 1', 'asdsdsad');

-- --------------------------------------------------------

--
-- Table structure for table `hms_rooms`
--

CREATE TABLE `hms_rooms` (
  `rid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hms_rooms`
--

INSERT INTO `hms_rooms` (`rid`, `category_id`, `subcategory_id`, `created_at`) VALUES
(1, 1, 1, '2021-04-01 18:01:19'),
(2, 1, 1, '2021-04-01 18:01:39'),
(3, 1, 1, '2021-04-01 18:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `hms_rooms_categories`
--

CREATE TABLE `hms_rooms_categories` (
  `rcid` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `room_image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hms_rooms_categories`
--

INSERT INTO `hms_rooms_categories` (`rcid`, `category_name`, `price`, `room_image`, `created_at`) VALUES
(1, 'Room 5 sTAR', '400', 'rooms/372116418b540f1c22626f7b45a7a7c3.jpg', '2021-04-01 11:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `hms_rooms_subcategories`
--

CREATE TABLE `hms_rooms_subcategories` (
  `subcatid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hms_rooms_subcategories`
--

INSERT INTO `hms_rooms_subcategories` (`subcatid`, `name`, `created_at`) VALUES
(1, 'Room 5 sTAR', '2021-04-01 11:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `hms_rooms_subrooms`
--

CREATE TABLE `hms_rooms_subrooms` (
  `subroom_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `bedding_type` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hms_rooms_subrooms`
--

INSERT INTO `hms_rooms_subrooms` (`subroom_id`, `room_id`, `room_no`, `bedding_type`, `status`, `created_at`) VALUES
(1, 3, 520, 'single', 'available', '2021-04-01 18:03:46'),
(2, 3, 440, 'Quad', 'available', '2021-04-01 18:03:46');

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
(1, 'saifcodes', 'ch.saif109@gmail.com', 'Muhammad Saif', '+923082355746', 'profile/344989dccc9d42de59e3aece66db92d3.png', 'Admin', '$2y$10$UiejKj.fukGP7SrLVPAKS.mwCgQic6MoJHP/YipJJeA3IXPEToT4a', '2021-04-01 11:26:39', '2021-03-30 17:09:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hms_booking`
--
ALTER TABLE `hms_booking`
  ADD PRIMARY KEY (`bookid`),
  ADD KEY `pack_id` (`pack_id`);

--
-- Indexes for table `hms_customers`
--
ALTER TABLE `hms_customers`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `hms_packages`
--
ALTER TABLE `hms_packages`
  ADD PRIMARY KEY (`pack_id`),
  ADD KEY `pack_id` (`pack_id`);

--
-- Indexes for table `hms_rooms`
--
ALTER TABLE `hms_rooms`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `category_id` (`category_id`,`subcategory_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `hms_rooms_categories`
--
ALTER TABLE `hms_rooms_categories`
  ADD PRIMARY KEY (`rcid`),
  ADD KEY `rcid` (`rcid`);

--
-- Indexes for table `hms_rooms_subcategories`
--
ALTER TABLE `hms_rooms_subcategories`
  ADD PRIMARY KEY (`subcatid`),
  ADD KEY `subcatid` (`subcatid`);

--
-- Indexes for table `hms_rooms_subrooms`
--
ALTER TABLE `hms_rooms_subrooms`
  ADD PRIMARY KEY (`subroom_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `hms_users`
--
ALTER TABLE `hms_users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hms_booking`
--
ALTER TABLE `hms_booking`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_customers`
--
ALTER TABLE `hms_customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hms_packages`
--
ALTER TABLE `hms_packages`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hms_rooms`
--
ALTER TABLE `hms_rooms`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hms_rooms_categories`
--
ALTER TABLE `hms_rooms_categories`
  MODIFY `rcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hms_rooms_subcategories`
--
ALTER TABLE `hms_rooms_subcategories`
  MODIFY `subcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hms_rooms_subrooms`
--
ALTER TABLE `hms_rooms_subrooms`
  MODIFY `subroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hms_users`
--
ALTER TABLE `hms_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hms_booking`
--
ALTER TABLE `hms_booking`
  ADD CONSTRAINT `hms_booking_ibfk_2` FOREIGN KEY (`pack_id`) REFERENCES `hms_packages` (`pack_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hms_rooms`
--
ALTER TABLE `hms_rooms`
  ADD CONSTRAINT `hms_rooms_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `hms_rooms_categories` (`rcid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hms_rooms_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `hms_rooms_subcategories` (`subcatid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hms_rooms_subrooms`
--
ALTER TABLE `hms_rooms_subrooms`
  ADD CONSTRAINT `hms_rooms_subrooms_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `hms_rooms` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;