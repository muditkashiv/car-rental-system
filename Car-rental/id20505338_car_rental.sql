-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2023 at 07:19 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20505338_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `company`, `name`, `email_id`, `password`, `mobile`, `gst`) VALUES
(4, 'Code OS', 'Sajeed', 'saj@gmail.com', '12345', '1234567', 'GST123'),
(5, 'Test', 'Testing', 'test@gmail.com', '12345', '9867543', 'test123'),
(6, 'test', 'test', 'test@gmail.com', '12345', '09999999999', '43214321');

-- --------------------------------------------------------

--
-- Table structure for table `booked_car`
--

CREATE TABLE `booked_car` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `pickup` varchar(255) NOT NULL,
  `dropl` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `no_of_days` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_car`
--

INSERT INTO `booked_car` (`id`, `customer_id`, `car_id`, `pickup`, `dropl`, `date`, `no_of_days`) VALUES
(3, 4, 6, 'Koparkharine', 'Vashi', '2023-03-26', '2'),
(4, 6, 7, 'Navi mumbai', 'Kurla', '2023-04-09', '4'),
(5, 8, 8, 'sd', 'asd', '2023-03-30', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `car_number` varchar(255) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `agent_id`, `image`, `model`, `car_number`, `seats`, `rent`) VALUES
(5, 4, 'hundai1.avif', 'Hundai ', 'MH 43 BF 6786', '7', '4000'),
(6, 4, 'maruti2.jpg', 'Maruti', 'MH 43 BF 0786', '6', '4500'),
(7, 5, 'hundai2.avif', 'Hundai', 'MH 43 TE 8769', '5', '2000'),
(8, 5, 'cardummy.jpeg', 'test', '1234', '3', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email_id`, `password`, `mobile`) VALUES
(1, 'abc', 'abc@gmail.com', 'abc', '123456789'),
(4, 'Sajeed Ansari', 'Sajeedans.333@gmail.com', '123456', '9172716786'),
(5, 'Harry', 'harry@gmail.com', 'harry', '876543442'),
(6, 'test', 'testing@gmail.com', '12345', '8674532'),
(7, 'Kalim khan', 'kalim@gmail.com', 'kalim@1234', '87654457879'),
(8, 'rest', 'rest@gmail.com', '12345', '8765432190');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_car`
--
ALTER TABLE `booked_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booked_car`
--
ALTER TABLE `booked_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
