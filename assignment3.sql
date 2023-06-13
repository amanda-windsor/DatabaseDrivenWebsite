-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 02:38 AM
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
-- Database: `assignment3`
--

-- --------------------------------------------------------

--
-- Table structure for table `drones`
--

CREATE TABLE `drones` (
  `drone_id` mediumint(8) UNSIGNED NOT NULL,
  `manufacturer_id` smallint(5) UNSIGNED NOT NULL,
  `drone_name` varchar(50) NOT NULL,
  `drone_mp` smallint(5) UNSIGNED NOT NULL,
  `drone_mins` smallint(5) UNSIGNED NOT NULL,
  `drone_od` varchar(3) NOT NULL,
  `drone_price` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drones`
--

INSERT INTO `drones` (`drone_id`, `manufacturer_id`, `drone_name`, `drone_mp`, `drone_mins`, `drone_od`, `drone_price`) VALUES
(1, 1, 'Avata', 48, 18, 'No', '1990.00'),
(2, 1, 'Mini 3 Pro', 48, 47, 'Yes', '1120.00'),
(3, 2, 'EVO Nano+', 48, 28, 'Yes', '950.00'),
(4, 1, 'Air 2S', 20, 31, 'Yes', '1700.00'),
(5, 3, 'Skydio 2+', 12, 27, 'Yes', '1100.00'),
(6, 1, 'Mini 2', 12, 31, 'No', '750.00'),
(7, 2, 'EVO Lite+', 20, 40, 'Yes', '1550.00'),
(8, 1, 'Mavic 3', 20, 46, 'Yes', '2900.00'),
(9, 1, 'Mavic Air 2', 48, 34, 'Yes', '2900.00'),
(10, 4, 'Tello', 5, 13, 'No', '170.00'),
(11, 1, 'Mini 3', 12, 38, 'No', '830.00');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` smallint(5) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(50) NOT NULL,
  `manufacturer_web` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_name`, `manufacturer_web`) VALUES
(1, 'DJI', 'dji.com'),
(2, 'Autel Robotics', 'autelrobotics.com'),
(3, 'Skydio', 'skydio.com'),
(4, 'Ryze Tech', 'ryzerobotics.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drones`
--
ALTER TABLE `drones`
  ADD PRIMARY KEY (`drone_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drones`
--
ALTER TABLE `drones`
  MODIFY `drone_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
