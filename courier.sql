-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 09:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_01` varchar(11) NOT NULL,
  `phone_02` varchar(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `courier_charge` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed_orders`
--

INSERT INTO `completed_orders` (`id`, `customer_name`, `address`, `phone_01`, `phone_02`, `product_name`, `quantity`, `total_amount`, `weight`, `courier_charge`, `created_at`) VALUES
(2, 'Ruwan', 'Kurunegala, Sri Lanka', '123416789', '123154789', 'xyz', 1, 2400, '250g', 350, '2023-10-03 00:00:00'),
(6, 'Kushan Bandara', 'Bakamuna, Sri Lanka.', '0711234567', '0364567891', 'p3', 2, 1200, '100g', 350, '2023-10-09 19:37:48'),
(11, 'Nimal', 'No.10, Kandy Rd, Kurunegala', '0123456789', '0321654987', 'J2', 5, 15000, '750g', 500, '2023-11-01 13:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_orders`
--

CREATE TABLE `failed_orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_01` varchar(11) NOT NULL,
  `phone_02` varchar(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `courier_charge` int(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `failed_orders`
--

INSERT INTO `failed_orders` (`id`, `customer_name`, `address`, `phone_01`, `phone_02`, `product_name`, `quantity`, `total_amount`, `weight`, `courier_charge`, `created_at`) VALUES
(1, 'Kamal', 'Galgamuwa, Sri Lanka', '123456789', '123654789', 'abc', 4, 2500, '500g', 375, '2023-10-03 01:32:12'),
(7, 'Ravindu Gimhan', 'No. 15, Galle rd, Colombo 07', '0215874536', '0325478945', 'p8', 2, 2500, '750g', 350, '2023-10-15 22:55:57'),
(12, 'Amal Bandara', 'No.15, Colombo 06', '0326549873', '0123458796', 'P8', 7, 3500, '450g', 400, '2024-08-26 12:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(30) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bdate` varchar(15) NOT NULL,
  `idnumber` varchar(25) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `cnumber` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `fname`, `address`, `bdate`, `idnumber`, `pcode`, `cnumber`, `email`, `password`) VALUES
(1, 'Ananda', 'Galle Rd, Colombo 02', '11/02/2001', '1254879', '36510', '023145698', 'shueruhg@gmail.com', '12345+'),
(2, 'Amila Kumara', 'No. 63, Pinnawala, Kegalle', '25/12/1998', '9845879562v', '65201', '0758498652', 'amila@gmail.com', 'Amila123'),
(3, 'Kavinda Gayashan', 'No.20, Kandy road, Kurunegala.', '04/11/1998', '199830910608', '60700', '073507708', 'kavinda@gmail.com', 'Kavinda@123'),
(4, 'Kavinda', 'No.85, Galgamuwa', '1998.11.20', '123456789', '62104', '0123456789', 'Kavindag@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_01` varchar(10) DEFAULT NULL,
  `phone_02` varchar(10) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `total_amount` int(255) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `courier_charge` int(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `address`, `phone_01`, `phone_02`, `product_name`, `quantity`, `total_amount`, `weight`, `courier_charge`, `created_at`) VALUES
(1, 'Kamal', 'Galgamuwa, Sri Lanka', '123456789', '123654789', 'bjrjrn', '6', 2500, '500g', 375, '2023-10-03 01:32:12'),
(3, 'Samitha', 'Matale, Sri Lanka', '123256789', '123254789', 'wrx', '4', 2000, '1000g', 275, '2023-10-03 01:32:12'),
(6, 'Kushan Bandara', 'Bakamuna, Sri Lanka.', '0711234567', '0364567891', 'p3', '2', 1200, '100g', 350, '2023-10-09 19:37:48'),
(7, 'Ravindu Gimhan', 'No. 15, Galle rd, Colombo 07', '0215874536', '0325478945', 'p8', '2', 2500, '750g', 350, '2023-10-15 22:55:57'),
(12, 'Amal Bandara', 'No.15, Colombo 06', '0326549873', '0123458796', 'P8', '7', 3500, '450g', 400, '2024-08-26 12:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `processing_orders`
--

CREATE TABLE `processing_orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_01` varchar(12) NOT NULL,
  `phone_02` varchar(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(25) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `courier_charge` int(25) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `processing_orders`
--

INSERT INTO `processing_orders` (`id`, `customer_name`, `address`, `phone_01`, `phone_02`, `product_name`, `quantity`, `total_amount`, `weight`, `courier_charge`, `created_at`) VALUES
(1, 'Kamal', 'Galgamuwa, Sri Lanka', '123456789', '123654789', 'abc', 4, 2500, '500g', 375, '2023-10-03 01:32:12'),
(11, 'Nimal', 'No.10, Kandy Rd, Kurunegala', '0123456789', '0321654987', 'J2', 5, 15000, '750g', 500, '2023-11-01 13:30:25'),
(12, 'Amal Bandara', 'No.15, Colombo 06', '0326549873', '0123458796', 'P8', 7, 3500, '450g', 400, '2024-08-26 12:21:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_orders`
--
ALTER TABLE `failed_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processing_orders`
--
ALTER TABLE `processing_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_orders`
--
ALTER TABLE `failed_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `processing_orders`
--
ALTER TABLE `processing_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
