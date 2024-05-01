-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2024 at 03:44 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `item_quantity`) VALUES
(98, 328, 6, '-2'),
(97, 328, 9, '1'),
(143, 326, 6, '1'),
(77, 302, 6, '-2'),
(76, 302, 7, '1'),
(75, 293, 7, '1'),
(74, 178, 6, '-1'),
(73, 178, 9, '2');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`e_id`, `email`, `subject`, `message`) VALUES
(1, '0', 'sdasda', 'asdsad'),
(2, '0', 'sdasdas', 'dasd'),
(3, '0', 'sdasdas', 'dasd'),
(4, 'fundadordiongie@gmail.com', 'sdasdas', 'dasd'),
(5, 'fundadordiongie@gmail.com', 'asdasd', 'asdasd'),
(6, 'fundadordiongie@gmail.com', 'hi', 'jhhoiuhuerer'),
(7, 'fundadordiongie@gmail.com', 'hi', 'jhhoiuhuerer'),
(8, 'fundadordiongie@gmail.com', 'hi', 'jhhoiuhuerer'),
(9, 'fundadordiongie@gmail.com', 'asdasd', 'asdasd'),
(10, 'fundadordiongie@gmail.com', 'sadasd', 'asdas'),
(11, 'fundadordiongie@gmail.com', 'sadasd', 'asdasd'),
(12, 'fundadordiongie@gmail.com', 'asdasd', 'dfsdf'),
(13, 'pentest840@gmail.com', 'dfdsf', 'dsfdsf');

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
  `promo` int NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_type`, `i_name`, `i_img`, `i_desc`, `i_price`, `i_quantity`, `promo`) VALUES
(32, 'Rooms', 'Kubo Deluxe', 'room1.jpg', 'NIce room accomodates 4-5 person', '1300', '1', 0),
(21, 'Cottages', 'Cubicle Table', 'table1.jpg', 'nice', '300', '123', 0),
(20, 'Cottages', 'Individual Kubo', 'cottage2.jpg', 'Nice', '497', '454', 0),
(31, 'Foods', 'Chicken', 'food1.jpg', 'Yummy and delicious ', '145', '23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_ratings`
--

DROP TABLE IF EXISTS `item_ratings`;
CREATE TABLE IF NOT EXISTS `item_ratings` (
  `rating_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `client_id` int NOT NULL,
  `client_username` varchar(255) NOT NULL,
  `rating_data` int NOT NULL,
  `quality` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date_posted` datetime NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item_ratings`
--

INSERT INTO `item_ratings` (`rating_id`, `item_id`, `client_id`, `client_username`, `rating_data`, `quality`, `service`, `comments`, `date_posted`) VALUES
(23, 9, 326, 'huuhduhfd', 5, 'dsfsdf', 'fssdf', 'sdfsd', '2024-04-23 19:11:59'),
(22, 9, 326, 'huuhduhfd', 0, '', '', '', '2024-04-23 19:10:49'),
(20, 9, 326, 'huuhduhfd', 5, 'vbcvb', 'dsfsdf', 'sdfsd', '2024-04-23 19:02:09'),
(18, 9, 326, 'huuhduhfd', 4, 'dsfsd', 'dsfdsf', 'sdfsd', '2024-04-23 18:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `n_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `updates` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` int NOT NULL,
  `date_posted` datetime NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`n_id`, `user_id`, `updates`, `message`, `is_read`, `date_posted`) VALUES
(85, 321, 'Paid', '', 0, '2024-05-01 11:08:40'),
(84, 321, 'Paid', '', 0, '2024-05-01 11:08:34'),
(83, 321, 'Paid', '', 0, '2024-05-01 11:08:31'),
(82, 321, 'Request Pending', '', 0, '2024-05-01 11:07:58'),
(81, 321, 'Request Pending', '', 0, '2024-05-01 11:07:58'),
(80, 321, 'Request Pending', '', 0, '2024-05-01 10:13:55'),
(79, 326, 'Delivered', '', 0, '2024-05-01 01:42:47'),
(78, 326, 'Declined', 'Request Already Processed', 0, '2024-04-30 23:45:01'),
(77, 326, 'Request Pending', '', 0, '2024-04-30 22:22:41'),
(76, 326, 'Request Pending', '', 0, '2024-04-30 22:13:04'),
(75, 326, 'Request Pending', '', 0, '2024-04-30 22:12:26'),
(74, 326, 'Paid', '', 0, '2024-04-30 20:10:03'),
(73, 326, 'Request Pending', '', 0, '2024-04-30 20:09:41'),
(70, 326, 'Declined', 'Not Applicable', 0, '2024-04-30 18:15:25'),
(71, 326, 'Declined', 'Request Does Not Meet Requirements', 0, '2024-04-30 18:20:47'),
(72, 326, 'Declined', 'Insufficient Information Provided', 0, '2024-04-30 18:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_number` varchar(20) NOT NULL,
  `serves` int NOT NULL,
  `room` varchar(50) NOT NULL,
  `msg` text,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `price`, `food_name`, `user_name`, `user_number`, `serves`, `room`, `msg`, `order_date`, `status`) VALUES
(1, 326, 145.00, 'Chicken', 'ewrewr', '324234', 34, 'dsfsdfd', 'sfsdfsdf', '2024-04-30 16:50:03', 'Delivered'),
(2, 326, 145.00, 'Chicken', 'asdas', '546456', 56, 'dfsdf', 'sdfdsfsdaf', '2024-04-30 16:55:56', 'Delivered');

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
  `caption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `posted_at` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`r_id`, `rating_data`, `email`, `caption`, `img`, `posted_at`, `status`) VALUES
(68, '5', 'fundadordiongie@gmail.com', 'Very nice', '[\"..\\/uploads\\/room5.jpg\",\"..\\/uploads\\/table1.jpg\"]', '2024:04:30 21:19:29', 'Pending'),
(69, '4', 'fundadordiongie@gmail.com', 'Very nice place and very accommodating resort ', '[\"..\\/uploads\\/room1.jpg\"]', '2024:04:30 21:29:31', 'Pending');

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
) ENGINE=MyISAM AUTO_INCREMENT=760 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `res_tb`
--

INSERT INTO `res_tb` (`res_id`, `res_number`, `item_id`, `item_name`, `user_id`, `quantity`, `reg_date`, `start`, `end`, `created_at`, `price`, `total`, `payment`, `status`, `message`) VALUES
(753, 895216462, 6, 'Kubo Deluxe', 326, 1, '0000-00-00', '2024-04-24', '2024-04-27', '2024-04-30 20:09:41', 2600, 7800, 'Gcash', 'Approved', ''),
(754, 724877840, 6, 'Kubo Deluxe', 326, 1, '2024-04-29', '0000-00-00', '0000-00-00', '2024-04-30 22:12:26', 2600, 2600, 'counter', 'Pending', ''),
(755, 539188897, 6, 'Kubo Deluxe', 326, 1, '2024-04-29', '0000-00-00', '0000-00-00', '2024-04-30 22:13:04', 2600, 2600, 'counter', 'Declined', ''),
(756, 996085983, 6, 'Kubo Deluxe', 326, 1, '2024-04-24', '0000-00-00', '0000-00-00', '2024-04-30 22:22:41', 2600, 2600, 'counter', 'Pending', ''),
(757, 993455083, 32, 'Kubo Deluxe', 321, 1, '0000-00-00', '2024-05-02', '2024-05-04', '2024-05-01 10:13:55', 1300, 2600, 'counter', 'Approved', ''),
(758, 211576160, 20, 'Individual Kubo', 321, 1, '0000-00-00', '2024-05-02', '2024-05-04', '2024-05-01 11:07:58', 497, 3594, 'counter', 'Approved', ''),
(759, 463012560, 32, 'Kubo Deluxe', 321, 1, '0000-00-00', '2024-05-02', '2024-05-04', '2024-05-01 11:07:58', 1300, 3594, 'counter', 'Approved', ''),
(745, 129696240, 9, 'Kubo Standard', 326, 1, '0000-00-00', '2024-04-25', '2024-04-27', '2024-04-25 11:38:40', 2200, 10000, 'counter', 'Declined', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_type`
--

DROP TABLE IF EXISTS `tbl_item_type`;
CREATE TABLE IF NOT EXISTS `tbl_item_type` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_item_type`
--

INSERT INTO `tbl_item_type` (`type_id`, `type`) VALUES
(2, 'Drinks'),
(3, 'Foods'),
(12, 'Rooms');

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
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_number`, `reservation_number`, `user_id`, `item_id`, `item_name`, `date_booked`, `date_approved`, `total`, `time_in`, `time_out`, `status`, `activity`) VALUES
(138, 79972, 463012560, 321, 32, 'Kubo Deluxe', 'May 02-04 2024', '2024-05-01 11:08:40', '3594', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paid', 'No show'),
(137, 17270, 993455083, 321, 32, 'Kubo Deluxe', 'May 02-04 2024', '2024-05-01 11:08:34', '2600', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paid', 'No show'),
(136, 90406, 211576160, 321, 20, 'Individual Kubo', 'May 02-04 2024', '2024-05-01 11:08:31', '3594', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paid', 'No show'),
(132, 36101, 129696240, 326, 9, 'Kubo Standard', 'Apr 25-27 2024', '2024-04-29 23:15:25', '10000', '2024-04-30 15:31:23', '2024-04-30 15:32:00', 'Paid', 'Completed'),
(133, 79871, 216770919, 326, 8, 'Family Room', 'Apr 24, 2024', '2024-04-29 23:15:30', '2800', '2024-04-29 23:32:37', '0000-00-00 00:00:00', 'Paid', 'In progress'),
(134, 22447, 969518608, 326, 9, 'Kubo Standard', 'May 08, 2024', '2024-04-30 13:19:39', '4700', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paid', 'No show'),
(135, 80294, 895216462, 326, 6, 'Kubo Deluxe', 'Apr 24-27 2024', '2024-04-30 20:10:03', '7800', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Paid', 'No show');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=329 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone`, `full_name`, `city`, `brgy`, `zip_code`, `message`, `password`, `otp`, `created_at`, `token`, `verified`) VALUES
(321, 'admin', 'junzfundador142@gmail.com', 2147483647, 'dasdasdasdas', 'asdasd', 'asdasd', 0, '', '$2y$10$fUxuFKOvK6GZgi5.1HJfw.g3q7rBkej9u9obsGXBCEGPIaML7NR/m', 4401, '2024-04-18 14:11:56', 'c774f51e327289946b4bf5f2bdaec3605235a96ab26cbdb2924e0fcbc3cca50d', 'yes'),
(326, 'Junzdsd', 'fundadordiongie@gmail.com', 2147483647, 'fundador cute', 'jhgjgjjgj6666', 'sadasdas', 56756767, '', '$2y$10$KfYcCL80svKMPRUmEKKSQubQ/ENw5r4zBq9V53TcUu3adTtZzLoea', 5080, '2024-04-25 02:52:23', 'd5d600fcce0408ed810c50627ce81e1ccbf19b8156ba849e1201bd055144c369', 'yes'),
(327, '', 'pentest840@gmail.com', 768678678, 'test pengfhfg', 'dfgdfgdf', 'dfgsdfgsfdg', 4354343, '', '', 0, '2024-04-09 06:30:27', 'ya29.a0Ad52N3-aY7RY-wtvWi-VdQj3w6uMyk8C2sKLy1gS2AoNomB6uCaReV5eZn7G1y2rH0LICHBq_wGh0sygQ8Tj9bC0lm5EF_7jQtZ0FnoKXa467rgQbYd6vw2UkokNHOfGAB6XpQ9-av_59aec9Ue4XRyDwQZDDWQQCSVWaCgYKAaASARMSFQHGX2Mi0eqZVKt2lawOPtIjz25VTQ0171', 'Deactivate'),
(328, '', 'sanshinejoybajarmanolong@gmail.com', 64564, 'Manolong Sanshine Joy B.', 'asd', 'asd', 5645, '', '', 0, '2024-04-18 14:15:03', 'ya29.a0Ad52N3-fUnkk1oWBh2icdmeJcvVCUmeTaCNiBfsD-dVj7jNCsMi1S3HajfW6BwfsGiKk3SISE9Vt40z44KcOFNxLomGuHWNCAp1v_L0Oi6ISUJfj-sn8XqntEqihAAwrkFgPyTyZ9Hyyomxe0V5nwXI31DPArNhtmgN1aCgYKAaQSARESFQHGX2Mie7LOXgblkF1W6RTv4lqr8w0171', 'no');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
