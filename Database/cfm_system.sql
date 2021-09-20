-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 10:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cfm_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(40) DEFAULT NULL,
  `admin_email` varchar(30) DEFAULT NULL,
  `admin_pass` varchar(8) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `created_at`) VALUES
(1, 'admin1', 'admin1@gmail.com', 'admin1', '2021-09-20 02:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_name` varchar(30) DEFAULT NULL,
  `item_code` int(6) NOT NULL,
  `item_type` varchar(15) DEFAULT NULL,
  `item_stock` int(8) DEFAULT NULL,
  `item_price` int(4) NOT NULL,
  `item_description` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_name`, `item_code`, `item_type`, `item_stock`, `item_price`, `item_description`, `created_at`) VALUES
('Dessert', 123, NULL, NULL, 200, 'p-1.jpg', '2021-09-20 03:13:53'),
('Cake', 124, NULL, NULL, 500, 'p-2.jpg', '2021-09-20 03:14:33'),
('Coffee', 125, NULL, 50, 200, 'p-3.jpg', '2021-09-20 03:16:00'),
('Muffin', 126, NULL, 50, 150, 'p-4.jpg', '2021-09-20 03:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_addss` varchar(45) DEFAULT NULL,
  `user_phn_no` varchar(11) DEFAULT NULL,
  `item_code` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `user_id`, `user_addss`, `user_phn_no`, `item_code`, `created_at`) VALUES
(1, 1, 'mirpur, 1', '01316387822', 125, '2021-09-20 03:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(30) DEFAULT NULL,
  `user_id` int(6) NOT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_pass` varchar(8) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `user_id`, `user_email`, `user_pass`, `created_at`) VALUES
('user1', 1, 'user1@gmail.com', 'user1', '2021-09-20 03:17:25'),
('user4', 4, 'user4@gmail.com', 'user4', '2021-09-20 07:20:08'),
('user5', 5, 'user5@gmail.com', 'user5', '2021-09-20 07:20:37'),
('user6', 6, 'user6@gmail.com', 'user6', '2021-09-20 07:20:59');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_users_delete` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
INSERT INTO users_archive(user_id,user_name, user_email,valid_from)
VALUES(OLD.user_id,OLD.user_name,OLD.user_email,old.created_at);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_archive`
--

CREATE TABLE `users_archive` (
  `serial_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(40) DEFAULT NULL,
  `user_email` varchar(40) DEFAULT NULL,
  `valid_from` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_archive`
--

INSERT INTO `users_archive` (`serial_no`, `user_id`, `user_name`, `user_email`, `valid_from`, `created_at`) VALUES
(1, 3, 'user3', 'user3@gmail.com', '0000-00-00 00:00:00', '2021-09-20 03:30:58'),
(2, 2, 'user2', 'user2@gmail.com', '2021-09-20 03:18:54', '2021-09-20 03:35:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_archive`
--
ALTER TABLE `users_archive`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_code` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_archive`
--
ALTER TABLE `users_archive`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
