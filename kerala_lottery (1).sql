-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 11:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerala_lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(25) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `lots_per_year` int(30) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `lots_per_year`, `price`) VALUES
(3, 'Weekly', 52, 40),
(4, 'Bumper', 5, 200);

-- --------------------------------------------------------

--
-- Table structure for table `draw`
--

CREATE TABLE `draw` (
  `draw_id` int(25) NOT NULL,
  `lottery_id` int(30) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `draw`
--

INSERT INTO `draw` (`draw_id`, `lottery_id`, `date`) VALUES
(2, 3, 'Array'),
(3, 3, 'Array'),
(4, 3, 'Array'),
(5, 3, 'Array'),
(6, 3, ''),
(7, 3, ''),
(8, 3, ''),
(9, 3, '26th June 2022 '),
(10, 3, '26th June 2022 '),
(11, 3, '26th June 2022 '),
(12, 3, '26th June 2022 '),
(13, 3, '26th June 2022 '),
(14, 3, '26th June 2022 '),
(15, 3, '26th June 2022 '),
(16, 3, '26th June 2022 '),
(17, 3, '26th June 2022 '),
(18, 3, '26th June 2022 '),
(19, 3, '26th June 2022 '),
(20, 3, '26th June 2022 '),
(21, 3, '26th June 2022 '),
(22, 3, '26th June 2022 '),
(23, 3, '26th June 2022 '),
(24, 3, '26th June 2022 '),
(25, 3, '26th June 2022 '),
(26, 3, '26th June 2022 '),
(27, 3, '26th June 2022 '),
(28, 3, '26th June 2022 '),
(29, 3, '2022-06-26'),
(30, 3, '2022 06 26'),
(31, 3, '26th June 2022'),
(32, 3, '26th June 2022'),
(33, 3, 'Sunday 26th of June 2022 '),
(34, 3, '2022-06-26'),
(35, 3, '2022-06-27'),
(41, 3, '2022-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `lottery`
--

CREATE TABLE `lottery` (
  `lottery_id` int(25) NOT NULL,
  `category_id` int(20) NOT NULL,
  `lottery_name` varchar(30) NOT NULL,
  `day` int(11) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lottery`
--

INSERT INTO `lottery` (`lottery_id`, `category_id`, `lottery_name`, `day`, `date`) VALUES
(3, 3, 'Karunya', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `lottery_booking`
--

CREATE TABLE `lottery_booking` (
  `booking_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `lottery_id` int(10) NOT NULL,
  `number` int(10) NOT NULL,
  `series` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(30) NOT NULL,
  `user_id` int(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `amount` text NOT NULL,
  `card_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prize`
--

CREATE TABLE `prize` (
  `prize_id` int(30) NOT NULL,
  `category_id` int(25) NOT NULL,
  `prize_no` int(35) NOT NULL,
  `prize_amount` varchar(25) NOT NULL,
  `prize_count` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prize`
--

INSERT INTO `prize` (`prize_id`, `category_id`, `prize_no`, `prize_amount`, `prize_count`) VALUES
(1, 4, 1, '10000000', 1),
(2, 3, 1, '10000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(3) NOT NULL,
  `lottery_id` int(25) NOT NULL,
  `booking` int(25) NOT NULL,
  `prize_id` int(30) NOT NULL,
  `draw_id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `lottery_id`, `booking`, `prize_id`, `draw_id`, `username`) VALUES
(1, 3, 1, 2, 9, ''),
(2, 3, 1, 2, 9, ''),
(3, 3, 1, 2, 9, ''),
(4, 3, 1, 2, 9, ''),
(5, 3, 1537, 2, 29, ''),
(6, 3, 1234, 2, 35, ''),
(10, 3, 1234, 10000, 41, 'Jensy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `password`, `email`, `mobile`, `address`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin', '123456789', 'admin'),
(2, 'Jensy', 'S', 'jensy', 'jensy@gmail.com', '1234578888', 'Kuttikkanam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `draw`
--
ALTER TABLE `draw`
  ADD PRIMARY KEY (`draw_id`);

--
-- Indexes for table `lottery`
--
ALTER TABLE `lottery`
  ADD PRIMARY KEY (`lottery_id`);

--
-- Indexes for table `lottery_booking`
--
ALTER TABLE `lottery_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `prize`
--
ALTER TABLE `prize`
  ADD PRIMARY KEY (`prize_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `draw`
--
ALTER TABLE `draw`
  MODIFY `draw_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `lottery`
--
ALTER TABLE `lottery`
  MODIFY `lottery_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lottery_booking`
--
ALTER TABLE `lottery_booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prize`
--
ALTER TABLE `prize`
  MODIFY `prize_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
