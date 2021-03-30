-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 01:05 PM
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
(1, 'saifcodes', 'ch.saif109@gmail.com', 'Muhammad Saif', '+923082355746', '/srv/www/vhosts/hotel.pk/uploads/profile/344989dccc9d42de59e3aece66db92d3.png', '', '$2y$10$UiejKj.fukGP7SrLVPAKS.mwCgQic6MoJHP/YipJJeA3IXPEToT4a', '2021-03-30 17:09:17', '2021-03-30 17:09:17'),
(3, 'admin', 'ch.saif109@gmail.com', 'Muhammad Saif', '+923082355746', '/srv/www/vhosts/hotel.pk/uploads/profile/21232f297a57a5a743894a0e4a801fc3.jpg', '', '$2y$10$rjDj6LSf9wJAtimWsLqfteCyPafaXMBYPdXqvV4bRyuUul65hx2L.', '2021-03-30 17:57:06', '2021-03-30 17:57:06'),
(4, 'gagado6650@naymeo.com', 'gagado6650@naymeoo.com', 'Muhammad Saif', '+923082355746', '/srv/www/vhosts/hotel.pk/uploads/profile/294e122cb2aa012e416cf73da09c9441.jpg', '', '$2y$10$Hw637ZilVbZafgPwrijZEexVYr1KNjyqtg8Jl/vcln80HmsgSlSkS', '2021-03-30 17:57:55', '2021-03-30 17:57:55'),
(5, 'admin', 'MuhammadSaif', 'Muhammad Saif', '+923082355746', '/srv/www/vhosts/hotel.pk/uploads/profile/21232f297a57a5a743894a0e4a801fc3.jpg', '', '$2y$10$ivFqp6SnZF5/QXWLRwSJku6Qb3n5DcKIsu9U5LnWzqDelzzWs17ni', '2021-03-30 17:58:53', '2021-03-30 17:58:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hms_users`
--
ALTER TABLE `hms_users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hms_users`
--
ALTER TABLE `hms_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
