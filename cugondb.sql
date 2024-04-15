-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2024 at 02:10 PM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `item_quantity`) VALUES
(89, 326, 9, '1'),
(88, 326, 6, '1'),
(77, 302, 6, '1'),
(76, 302, 7, '1'),
(75, 293, 7, '1'),
(74, 178, 6, '2'),
(73, 178, 9, '3');

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

DROP TABLE IF EXISTS `food_orders`;
CREATE TABLE IF NOT EXISTS `food_orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `drinks` varchar(255) NOT NULL,
  `total` int NOT NULL,
  `order_status` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_type`, `i_name`, `i_img`, `i_desc`, `i_price`, `i_quantity`) VALUES
(8, 'Rooms', 'Family Room', 'room4.jpg', 'Nice bed', '2800', '6'),
(9, 'Rooms', 'Kubo Standard', 'room3.jpg', 'nICE RA HAHAH', '2200', '34'),
(7, 'Rooms', 'Barkada Room', 'room4.jpg', 'KNI CHADA GOYS', '2500', '23'),
(6, 'Rooms', 'Kubo Deluxe', 'room1.jpg', 'Wala', '2600', '31'),
(21, 'Cottages', 'Cubicle Table', 'table1.jpg', 'nice', '300', '123'),
(20, 'Cottages', 'Individual Kubo', 'cottage2.jpg', 'Nice', '497', '455'),
(19, 'Cottages', 'Kubo Cement', 'cottage1.jpg', 'nice', '499', '65'),
(26, 'Foods', 'Food 1', 'f1.jpg', 'lorem ipsum', '287', '43'),
(27, 'Foods', 'Food 2', 'f2.jpg', 'Lorem ipsum', '279', '432'),
(28, 'Foods', 'Food 3', 'f3.jpg', 'Lorem ipsum', '245', '1');

-- --------------------------------------------------------

--
-- Table structure for table `item_ratings`
--

DROP TABLE IF EXISTS `item_ratings`;
CREATE TABLE IF NOT EXISTS `item_ratings` (
  `rating_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `client_username` varchar(255) NOT NULL,
  `rating_data` int NOT NULL,
  `quality` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `r_id` int NOT NULL AUTO_INCREMENT,
  `rating_data` varchar(20) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `caption` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `posted_at` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`r_id`, `rating_data`, `email`, `caption`, `img`, `posted_at`, `status`) VALUES
(43, '1', 'fundadordiongie@gmail.com', 'sdaasd', '[\"..\\/uploads\\/f2.jpg\"]', '2024:04:06 18:30:37', 'Pending'),
(42, '2', 'fundadordiongie@gmail.com', 'sadasd', '[\"..\\/uploads\\/f1.jpg\"]', '2024:04:06 18:30:25', 'Pending'),
(41, '0', 'fundadordiongie@gmail.com', 'kjashkSGKU', '[\"..\\/uploads\\/f2.jpg\"]', '2024:04:01 12:05:47', 'Pending'),
(40, '5', 'fundadordiongie@gmail.com', 'jhgdhfjfdh', '[\"..\\/uploads\\/f3.jpg\"]', '2024:03:31 17:35:57', 'Pending'),
(39, '3', 'junzfundador142@gmail.com', '1fdgfgdfgdgfdgf', '[\"..\\/uploads\\/1.png\",\"..\\/uploads\\/1200eac77add4c1da0ca8845ea6529e1.png\",\"..\\/uploads\\/2000px-Whitehead-link-alternative-sexuality-symbol.svg.png\"]', '2024:03:22 17:46:28', 'Pending'),
(38, '5', 'junzfundador142@gmail.com', 'fsdfsdfdf', '[\"..\\/uploads\\/WIN_20220427_13_23_05_Pro.jpg\",\"..\\/uploads\\/WIN_20220429_13_54_45_Pro.jpg\",\"..\\/uploads\\/WIN_20220504_14_54_02_Pro.jpg\",\"..\\/uploads\\/WIN_20220513_14_58_55_Pro.jpg\"]', '2024:03:22 17:45:45', 'Pending');

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
  `item_name` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  `reg_date` date NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` datetime NOT NULL,
  `price` int NOT NULL,
  `total` int NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=MyISAM AUTO_INCREMENT=686 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `res_tb`
--

INSERT INTO `res_tb` (`res_id`, `res_number`, `item_id`, `item_name`, `user_id`, `quantity`, `reg_date`, `start`, `end`, `created_at`, `price`, `total`, `payment`, `status`, `message`) VALUES
(685, 322116723, 9, 'Kubo Standard', 326, 1, '2024-04-26', '0000-00-00', '0000-00-00', '2024-04-15 13:16:37', 2300, 2300, 'counter', 'Approved', ''),
(684, 387570881, 9, 'Kubo Standard', 326, 1, '2024-04-27', '0000-00-00', '0000-00-00', '2024-04-15 12:20:17', 2300, 2300, 'counter', 'Approved', ''),
(683, 818293302, 8, 'Family Room', 326, 1, '2024-04-13', '0000-00-00', '0000-00-00', '2024-04-15 00:10:25', 2800, 2800, 'counter', 'Approved', ''),
(682, 836501861, 7, 'Barkada Room', 326, 1, '0000-00-00', '2024-04-15', '2024-04-19', '2024-04-15 00:09:30', 2500, 5000, 'counter', 'Approved', ''),
(681, 435720705, 9, 'Kubo Standard', 326, 1, '0000-00-00', '2024-05-02', '2024-04-15', '2024-04-14 23:36:42', 2300, 4600, 'counter', 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transaction_number` int NOT NULL,
  `reservation_number` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `date_booked` varchar(255) NOT NULL,
  `date_approved` datetime NOT NULL,
  `total` varchar(255) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `activity` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_number`, `reservation_number`, `user_id`, `item_id`, `item_name`, `date_booked`, `date_approved`, `total`, `time_in`, `time_out`, `status`, `activity`) VALUES
(109, 31899, 836501861, 326, 7, 'Barkada Room', 'Apr 15-17 2024', '2024-04-15 00:13:42', '5000', '2024-04-15 12:27:37', '2024-04-15 11:48:55', 'Paid', 'In progress'),
(108, 89750, 818293302, 326, 8, 'Family Room', 'Apr 17, 2024', '2024-04-15 00:11:59', '2800', '2024-04-15 12:28:53', '0000-00-00 00:00:00', 'Paid', 'In progress'),
(111, 88024, 322116723, 326, 9, 'Kubo Standard', 'Apr 26, 2024', '2024-04-15 13:17:00', '2300', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paid', 'No show'),
(107, 27801, 435720705, 326, 9, 'Kubo Standard', 'May 02-04 2024', '2024-04-14 23:38:47', '4600', '2024-04-15 12:28:59', '2024-04-15 12:29:05', 'Paid', 'Completed'),
(110, 70278, 387570881, 326, 9, 'Kubo Standard', 'Apr 27, 2024', '2024-04-15 12:21:01', '2300', '2024-04-15 12:27:25', '0000-00-00 00:00:00', 'Paid', 'In progress');

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
  `full_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `zip_code` int NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verified` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=328 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone`, `full_name`, `city`, `brgy`, `zip_code`, `message`, `password`, `otp`, `created_at`, `token`, `verified`) VALUES
(323, '', 'dfdf@gmail.com', 0, '', 'sdfdsf', '', 0, NULL, '', 0, '', '', ''),
(321, 'admin', 'junzfundador142@gmail.com', 2147483647, '', '', '', 0, NULL, '$2y$10$glLPU7vvFZng.gnoUHonB.bqQtiFKURcLQNMXG46/1pbDBb2VE/Ou', 4401, '2024:03:23 09:07:56', 'c774f51e327289946b4bf5f2bdaec3605235a96ab26cbdb2924e0fcbc3cca50d', 'yes'),
(326, 'huuhduhfd', 'fundadordiongie@gmail.com', 2147483647, 'fundador cute', 'jhgjgjjgj', 'hjggjhjhg', 673476, '', '$2y$10$AfqOiAYZVq97y63.78wi8eIGdlIY5H1gurZbznaqtu7p4HuHmkcYm', 5080, '2024-04-01 04:02:27', 'd5d600fcce0408ed810c50627ce81e1ccbf19b8156ba849e1201bd055144c369', 'yes'),
(327, 'pentest840@gmail.com', 'pentest840@gmail.com', 768678678, 'test pengfhfg', 'dfgdfgdf', 'dfgsdfgsfdg', 4354343, '', '', 0, '2024-04-09 06:30:27', 'ya29.a0Ad52N3-aY7RY-wtvWi-VdQj3w6uMyk8C2sKLy1gS2AoNomB6uCaReV5eZn7G1y2rH0LICHBq_wGh0sygQ8Tj9bC0lm5EF_7jQtZ0FnoKXa467rgQbYd6vw2UkokNHOfGAB6XpQ9-av_59aec9Ue4XRyDwQZDDWQQCSVWaCgYKAaASARMSFQHGX2Mi0eqZVKt2lawOPtIjz25VTQ0171', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
