-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2024 at 09:52 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cugondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `item_quantity` varchar(255) NOT NULL,
  `meal_inc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `item_quantity`, `meal_inc`) VALUES
(46, 81, 19, '1', ''),
(47, 81, 9, '2', ''),
(45, 81, 6, '2', ''),
(44, 81, 8, '1', ''),
(22, 102, 21, '4', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `i_id` int NOT NULL AUTO_INCREMENT,
  `i_type` varchar(255) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `i_img` varchar(255) NOT NULL,
  `i_desc` varchar(255) NOT NULL,
  `i_price` varchar(255) NOT NULL,
  `i_quantity` varchar(255) NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_type`, `i_name`, `i_img`, `i_desc`, `i_price`, `i_quantity`) VALUES
(8, 'Rooms', 'Family Room', 'room4.jpg', 'Inclusions:\r\n\r\nBed: 7ft height 3m wide\r\nCr : 4x3', '2800', '6'),
(9, 'Rooms', 'Kubo Standard', 'room3.jpg', 'nICE RA HAHAH', '2300', '6'),
(7, 'Rooms', 'Barkada Room', 'room2.jpg', 'KNI CHADA GOYS', '2400', '2'),
(6, 'Rooms', 'Kubo Deluxe', 'room1.jpg', 'Wala', '2500', '5'),
(21, 'Cottages', 'Cubicle Table ', 'table1.jpg', 'nice', '300', '7'),
(20, 'Cottages', 'Individual Kubo', 'cottage2.jpg', 'Nice', '497', '3'),
(19, 'Cottages', 'Kubo Cement', 'cottage1.jpg', 'nice', '499', '4');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int NOT NULL AUTO_INCREMENT,
  `payment` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment`) VALUES
(1, 'Gcash'),
(2, 'Paymaya');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `id` int NOT NULL AUTO_INCREMENT,
  `res1` varchar(255) NOT NULL,
  `res2` varchar(255) NOT NULL,
  `res3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resto_products`
--

DROP TABLE IF EXISTS `resto_products`;
CREATE TABLE IF NOT EXISTS `resto_products` (
  `id` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `res_tb`
--

DROP TABLE IF EXISTS `res_tb`;
CREATE TABLE IF NOT EXISTS `res_tb` (
  `res_id` int NOT NULL AUTO_INCREMENT,
  `res_number` int NOT NULL,
  `item_id` int NOT NULL,
  `user_id` int NOT NULL,
  `regular_date` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `meal` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `res_tb`
--

INSERT INTO `res_tb` (`res_id`, `res_number`, `item_id`, `user_id`, `regular_date`, `start`, `end`, `quantity`, `meal`, `total`, `payment`, `status`) VALUES
(79, 857559815, 9, 81, '0', '02/05/2024', '02/09/2024', 1, 'Dinner', '6,900', 'Paymaya', 'Pending'),
(80, 101215185, 19, 94, '0', '02/06/2024', '02/07/2024', 2, 'None', '998', 'Over the counter', 'Approved'),
(81, 387467253, 19, 81, '02/02/2024', '', '0', 1, 'None', '499', 'Over the counter', 'Cancelled'),
(82, 159883012, 6, 81, '02/01/2024', '', '0', 2, 'None', '5,000', 'Over the counter', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `region` int NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone`, `region`, `city`, `province`, `password`) VALUES
(26, 'fds@gmail.com', 'admin@gmail.com', 4643, 0, '', '', 'admin'),
(80, '123', 'asdsd@gmail.com', 123, 7, 'bais', 'negros', '23213'),
(81, 'ewq', 'junzfundador142@gmail.com', 2342, 0, '', '', '123'),
(94, '45fdgdfg', 'dsfsdf@gmail.com', 34324, 0, '', '', 'fundador142'),
(87, 'sdasd', 'junzfundador142@gmail.com', 4543543, 0, '', '', '123'),
(100, '324324', 'sadjkjh@gmail.com', 324, 0, '', '', '22345674'),
(99, '324', 'junz@gmail.com', 234324, 0, '', '', '45561234'),
(98, 'ew', 'jkjksf@gmail.com', 2147483647, 0, '', '', '123'),
(101, 'wqewq', 'hjhjhjhj@gmail.com', 2147483647, 0, '', '', '324234234'),
(102, 'wqeqweqwe', 'kolddd@gmail.com', 2147483647, 0, '', '', '21321321321');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
