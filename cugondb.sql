-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2024 at 11:28 AM
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
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `rid` int NOT NULL AUTO_INCREMENT,
  `prov_id` int NOT NULL DEFAULT '0',
  `city_name` varchar(100) NOT NULL,
  `sort` int NOT NULL DEFAULT '0',
  `psa_code` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`rid`, `prov_id`, `city_name`, `sort`, `psa_code`) VALUES
(1, 11, 'CITY OF BATAC', 1, '012805000'),
(2, 11, 'CITY OF LAOAG', 2, '012812000'),
(3, 12, 'CITY OF CANDON', 3, '012906000'),
(4, 12, 'CITY OF VIGAN', 4, '012934000'),
(5, 13, 'CITY OF SAN FERNANDO', 5, '013314000'),
(6, 14, 'CITY OF ALAMINOS', 6, '015503000'),
(7, 14, 'CITY OF DAGUPAN', 7, '015518000'),
(8, 14, 'CITY OF SAN CARLOS', 8, '015532000'),
(9, 14, 'CITY OF URDANETA', 9, '015546000'),
(10, 16, 'TUGUEGARAO CITY', 10, '021529000'),
(11, 17, 'CITY OF CAUAYAN', 11, '023108000'),
(12, 17, 'CITY OF ILAGAN', 12, '023114000'),
(13, 17, 'CITY OF SANTIAGO', 13, '023135000'),
(14, 20, 'CITY OF BALANGA', 14, '030803000'),
(15, 21, 'CITY OF MALOLOS', 15, '031410000'),
(16, 21, 'CITY OF MEYCAUAYAN', 16, '031412000'),
(17, 21, 'CITY OF SAN JOSE DEL MONTE', 17, '031420000'),
(18, 22, 'CITY OF CABANATUAN', 18, '034903000'),
(19, 22, 'CITY OF GAPAN', 19, '034908000'),
(20, 22, 'SCIENCE CITY OF MUÑOZ', 20, '034917000'),
(21, 22, 'CITY OF PALAYAN', 21, '034919000'),
(22, 22, 'SAN JOSE CITY', 22, '034926000'),
(23, 23, 'CITY OF ANGELES', 23, '035401000'),
(24, 23, 'MABALACAT CITY', 24, '035409000'),
(25, 23, 'CITY OF SAN FERNANDO', 25, '035416000'),
(26, 24, 'CITY OF TARLAC', 26, '036916000'),
(27, 25, 'CITY OF OLONGAPO', 27, '037107000'),
(28, 27, 'BATANGAS CITY', 28, '041005000'),
(29, 27, 'CITY OF LIPA', 29, '041014000'),
(30, 27, 'CITY OF STO. TOMAS', 30, '041028000'),
(31, 27, 'CITY OF TANAUAN', 31, '041031000'),
(32, 28, 'CITY OF BACOOR', 32, '042103000'),
(33, 28, 'CITY OF CAVITE', 33, '042105000'),
(34, 28, 'CITY OF DASMARIÑAS', 34, '042106000'),
(35, 28, 'CITY OF GENERAL TRIAS', 35, '042108000'),
(36, 28, 'CITY OF IMUS', 36, '042109000'),
(37, 28, 'CITY OF TAGAYTAY', 37, '042119000'),
(38, 28, 'CITY OF TRECE MARTIRES', 38, '042122000'),
(39, 29, 'CITY OF BIÑAN', 39, '043403000'),
(40, 29, 'CITY OF CABUYAO', 40, '043404000'),
(41, 29, 'CITY OF CALAMBA', 41, '043405000'),
(42, 29, 'CITY OF SAN PABLO', 42, '043424000'),
(43, 29, 'CITY OF SAN PEDRO', 43, '043425000'),
(44, 29, 'CITY OF SANTA ROSA', 44, '043428000'),
(45, 30, 'CITY OF LUCENA', 45, '045624000'),
(46, 30, 'CITY OF TAYABAS', 46, '045647000'),
(47, 31, 'CITY OF ANTIPOLO', 47, '045802000'),
(48, 37, 'CITY OF LEGAZPI', 48, '050506000'),
(49, 37, 'CITY OF LIGAO', 49, '050508000'),
(50, 37, 'CITY OF TABACO', 50, '050517000'),
(51, 39, 'CITY OF IRIGA', 51, '051716000'),
(52, 39, 'CITY OF NAGA', 52, '051724000'),
(53, 41, 'CITY OF MASBATE', 53, '054111000'),
(54, 42, 'CITY OF SORSOGON', 54, '056216000'),
(55, 45, 'CITY OF ROXAS', 55, '061914000'),
(56, 46, 'CITY OF ILOILO', 56, '063022000'),
(57, 46, 'CITY OF PASSI', 57, '063035000'),
(58, 47, 'CITY OF BACOLOD', 58, '064501000'),
(59, 47, 'CITY OF BAGO', 59, '064502000'),
(60, 47, 'CITY OF CADIZ', 60, '064504000'),
(61, 47, 'CITY OF ESCALANTE', 61, '064509000'),
(62, 47, 'CITY OF HIMAMAYLAN', 62, '064510000'),
(63, 47, 'CITY OF KABANKALAN', 63, '064515000'),
(64, 47, 'CITY OF LA CARLOTA', 64, '064516000'),
(65, 47, 'CITY OF SAGAY', 65, '064523000'),
(66, 47, 'CITY OF SAN CARLOS', 66, '064524000'),
(67, 47, 'CITY OF SILAY', 67, '064526000'),
(68, 47, 'CITY OF SIPALAY', 68, '064527000'),
(69, 47, 'CITY OF TALISAY', 69, '064528000'),
(70, 47, 'CITY OF VICTORIAS', 70, '064531000'),
(71, 49, 'CITY OF TAGBILARAN', 71, '071242000'),
(72, 50, 'CITY OF BOGO', 72, '072211000'),
(73, 50, 'CITY OF CARCAR', 73, '072214000'),
(74, 50, 'CITY OF CEBU', 74, '072217000'),
(75, 50, 'DANAO CITY', 75, '072223000'),
(76, 50, 'CITY OF LAPU-LAPU (OPON)', 76, '072226000'),
(77, 50, 'CITY OF MANDAUE', 77, '072230000'),
(78, 50, 'CITY OF NAGA', 78, '072234000'),
(79, 50, 'CITY OF TALISAY', 79, '072250000'),
(80, 50, 'CITY OF TOLEDO', 80, '072251000'),
(81, 51, 'CITY OF BAIS', 81, '074604000'),
(82, 51, 'CITY OF BAYAWAN (TULONG)', 82, '074606000'),
(83, 51, 'CITY OF CANLAON', 83, '074608000'),
(84, 51, 'CITY OF DUMAGUETE', 84, '074610000'),
(85, 51, 'CITY OF GUIHULNGAN', 85, '074611000'),
(86, 51, 'CITY OF TANJAY', 86, '074621000'),
(87, 53, 'CITY OF BORONGAN', 87, '082604000'),
(88, 54, 'CITY OF BAYBAY', 88, '083708000'),
(89, 54, 'ORMOC CITY', 89, '083738000'),
(90, 54, 'CITY OF TACLOBAN', 90, '083747000'),
(91, 56, 'CITY OF CALBAYOG', 91, '086003000'),
(92, 56, 'CITY OF CATBALOGAN', 92, '086005000'),
(93, 57, 'CITY OF MAASIN', 93, '086407000'),
(94, 59, 'CITY OF DAPITAN', 94, '097201000'),
(95, 59, 'CITY OF DIPOLOG', 95, '097202000'),
(96, 60, 'CITY OF PAGADIAN', 96, '097322000'),
(97, 60, 'CITY OF ZAMBOANGA', 97, '097332000'),
(98, 87, 'CITY OF ISABELA', 98, '099701000'),
(99, 62, 'CITY OF MALAYBALAY', 99, '101312000'),
(100, 62, 'CITY OF VALENCIA', 100, '101321000'),
(101, 64, 'CITY OF ILIGAN', 101, '103504000'),
(102, 65, 'CITY OF OROQUIETA', 102, '104209000'),
(103, 65, 'CITY OF OZAMIZ', 103, '104210000'),
(104, 65, 'CITY OF TANGUB', 104, '104215000'),
(105, 66, 'CITY OF CAGAYAN DE ORO', 105, '104305000'),
(106, 66, 'CITY OF EL SALVADOR', 106, '104307000'),
(107, 66, 'CITY OF GINGOOG', 107, '104308000'),
(108, 67, 'CITY OF PANABO', 108, '112315000'),
(109, 67, 'ISLAND GARDEN CITY OF SAMAL', 109, '112317000'),
(110, 67, 'CITY OF TAGUM', 110, '112319000'),
(111, 68, 'CITY OF DAVAO', 111, '112402000'),
(112, 68, 'CITY OF DIGOS', 112, '112403000'),
(113, 69, 'CITY OF MATI', 113, '112509000'),
(114, 72, 'CITY OF KIDAPAWAN', 114, '124704000'),
(115, 73, 'CITY OF GENERAL SANTOS (DADIANGAS)', 115, '126303000'),
(116, 73, 'CITY OF KORONADAL', 116, '126306000'),
(117, 74, 'CITY OF TACURONG', 117, '126511000'),
(118, 86, 'CITY OF COTABATO', 118, '129804000'),
(119, 1, 'CITY OF MANILA', 119, '133900000'),
(120, 2, 'CITY OF MANDALUYONG', 120, '137401000'),
(121, 2, 'CITY OF MARIKINA', 121, '137402000'),
(122, 2, 'CITY OF PASIG', 122, '137403000'),
(123, 2, 'QUEZON CITY', 123, '137404000'),
(124, 2, 'CITY OF SAN JUAN', 124, '137405000'),
(125, 3, 'CITY OF CALOOCAN', 125, '137501000'),
(126, 3, 'CITY OF MALABON', 126, '137502000'),
(127, 3, 'CITY OF NAVOTAS', 127, '137503000'),
(128, 3, 'CITY OF VALENZUELA', 128, '137504000'),
(129, 4, 'CITY OF LAS PIÑAS', 129, '137601000'),
(130, 4, 'CITY OF MAKATI', 130, '137602000'),
(131, 4, 'CITY OF MUNTINLUPA', 131, '137603000'),
(132, 4, 'CITY OF PARAÑAQUE', 132, '137604000'),
(133, 4, 'PASAY CITY', 133, '137605000'),
(134, 4, 'CITY OF TAGUIG', 134, '137607000'),
(135, 6, 'CITY OF BAGUIO', 135, '141102000'),
(136, 8, 'CITY OF TABUK', 136, '143213000'),
(137, 81, 'CITY OF LAMITAN', 137, '150702000'),
(138, 82, 'CITY OF MARAWI', 138, '153617000'),
(139, 76, 'CITY OF BUTUAN', 139, '160202000'),
(140, 76, 'CITY OF CABADBARAN', 140, '160203000'),
(141, 77, 'CITY OF BAYUGAN', 141, '160301000'),
(142, 78, 'CITY OF SURIGAO', 142, '166724000'),
(143, 79, 'CITY OF BISLIG', 143, '166803000'),
(144, 79, 'CITY OF TANDAG', 144, '166819000'),
(145, 34, 'CITY OF CALAPAN', 145, '175205000'),
(146, 35, 'CITY OF PUERTO PRINCESA', 146, '175316000');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_type`, `i_name`, `i_img`, `i_desc`, `i_price`, `i_quantity`) VALUES
(8, 'Rooms', 'FAMILY ROOM', 'room3.jpg', 'PANG PAMILYA', '2900', '2'),
(9, 'Rooms', 'KUBO STANDARD', 'room5.jpg', 'NICE PD NI', '2300', '1'),
(7, 'Rooms', 'BARKADA ROOM', 'room2.jpg', 'KNI CHADA GOYS', '2400', '2'),
(6, 'Rooms', 'KUBO DELUXE', 'room1.jpg', 'NICE NI CYA GOYS', '2500', '3');

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
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `region_id` int NOT NULL DEFAULT '0',
  `province_name` varchar(50) NOT NULL,
  `sort` int NOT NULL DEFAULT '0',
  `psa_code` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`pid`, `region_id`, `province_name`, `sort`, `psa_code`) VALUES
(1, 1, 'FIRST DISTRICT', 1, '133900000'),
(2, 1, 'SECOND DISTRICT', 2, '137400000'),
(3, 1, 'THIRD DISTRICT', 3, '137500000'),
(4, 1, 'FOURTH DISTRICT', 4, '137600000'),
(5, 2, 'ABRA', 1, '140100000'),
(6, 2, 'BENGUET', 2, '141100000'),
(7, 2, 'IFUGAO', 3, '142700000'),
(8, 2, 'KALINGA', 4, '143200000'),
(9, 2, 'MOUNTAIN PROVINCE', 5, '144400000'),
(10, 2, 'APAYAO', 6, '148100000'),
(11, 3, 'ILOCOS NORTE', 1, '012800000'),
(12, 3, 'ILOCOS SUR', 2, '012900000'),
(13, 3, 'LA UNION', 3, '013300000'),
(14, 3, 'PANGASINAN', 4, '015500000'),
(15, 4, 'BATANES', 1, '020900000'),
(16, 4, 'CAGAYAN', 2, '021500000'),
(17, 4, 'ISABELA', 3, '023100000'),
(18, 4, 'NUEVA VIZCAYA', 4, '025000000'),
(19, 4, 'QUIRINO', 5, '025700000'),
(20, 5, 'BATAAN', 1, '030800000'),
(21, 5, 'BULACAN', 2, '031400000'),
(22, 5, 'NUEVA ECIJA', 3, '034900000'),
(23, 5, 'PAMPANGA', 4, '035400000'),
(24, 5, 'TARLAC', 5, '036900000'),
(25, 5, 'ZAMBALES', 6, '037100000'),
(26, 5, 'AURORA', 7, '037700000'),
(27, 6, 'BATANGAS', 1, '041000000'),
(28, 6, 'CAVITE', 2, '042100000'),
(29, 6, 'LAGUNA', 3, '043400000'),
(30, 6, 'QUEZON', 4, '045600000'),
(31, 6, 'RIZAL', 5, '045800000'),
(32, 7, 'MARINDUQUE', 1, '174000000'),
(33, 7, 'OCCIDENTAL MINDORO', 2, '175100000'),
(34, 7, 'ORIENTAL MINDORO', 3, '175200000'),
(35, 7, 'PALAWAN', 4, '175300000'),
(36, 7, 'ROMBLON', 5, '175900000'),
(37, 8, 'ALBAY', 1, '050500000'),
(38, 8, 'CAMARINES NORTE', 2, '051600000'),
(39, 8, 'CAMARINES SUR', 3, '051700000'),
(40, 8, 'CATANDUANES', 4, '052000000'),
(41, 8, 'MASBATE', 5, '054100000'),
(42, 8, 'SORSOGON', 6, '056200000'),
(43, 9, 'AKLAN', 1, '060400000'),
(44, 9, 'ANTIQUE', 2, '060600000'),
(45, 9, 'CAPIZ', 3, '061900000'),
(46, 9, 'ILOILO', 4, '063000000'),
(47, 9, 'NEGROS OCCIDENTAL', 5, '064500000'),
(48, 9, 'GUIMARAS', 6, '067900000'),
(49, 10, 'BOHOL', 1, '071200000'),
(50, 10, 'CEBU', 2, '072200000'),
(51, 10, 'NEGROS ORIENTAL', 3, '074600000'),
(52, 10, 'SIQUIJOR', 4, '076100000'),
(53, 11, 'EASTERN SAMAR', 1, '082600000'),
(54, 11, 'LEYTE', 2, '083700000'),
(55, 11, 'NORTHERN SAMAR', 3, '084800000'),
(56, 11, 'SAMAR (WESTERN SAMAR)', 4, '086000000'),
(57, 11, 'SOUTHERN LEYTE', 5, '086400000'),
(58, 11, 'BILIRAN', 6, '087800000'),
(59, 12, 'ZAMBOANGA DEL NORTE', 1, '097200000'),
(60, 12, 'ZAMBOANGA DEL SUR', 2, '097300000'),
(61, 12, 'ZAMBOANGA SIBUGAY', 3, '098300000'),
(62, 13, 'BUKIDNON', 1, '101300000'),
(63, 13, 'CAMIGUIN', 2, '101800000'),
(64, 13, 'LANAO DEL NORTE', 3, '103500000'),
(65, 13, 'MISAMIS OCCIDENTAL', 4, '104200000'),
(66, 13, 'MISAMIS ORIENTAL', 5, '104300000'),
(67, 14, 'DAVAO DEL NORTE', 1, '112300000'),
(68, 14, 'DAVAO DEL SUR', 2, '112400000'),
(69, 14, 'DAVAO ORIENTAL', 3, '112500000'),
(70, 14, 'COMPOSTELA VALLEY', 4, '118200000'),
(71, 14, 'DAVAO OCCIDENTAL', 5, '118600000'),
(72, 15, 'COTABATO (NORTH COTABATO)', 1, '124700000'),
(73, 15, 'SOUTH COTABATO', 2, '126300000'),
(74, 15, 'SULTAN KUDARAT', 3, '126500000'),
(75, 15, 'SARANGANI', 4, '128000000'),
(76, 16, 'AGUSAN DEL NORTE', 1, '160200000'),
(77, 16, 'AGUSAN DEL SUR', 2, '160300000'),
(78, 16, 'SURIGAO DEL NORTE', 3, '166700000'),
(79, 16, 'SURIGAO DEL SUR', 4, '166800000'),
(80, 16, 'DINAGAT ISLANDS', 5, '168500000'),
(81, 17, 'BASILAN', 1, '150700000'),
(82, 17, 'LANAO DEL SUR', 2, '153600000'),
(83, 17, 'MAGUINDANAO', 3, '153800000'),
(84, 17, 'SULU', 4, '156600000'),
(85, 17, 'TAWI-TAWI', 5, '157000000'),
(86, 15, 'COTABATO CITY', 5, '129800000'),
(87, 12, 'CITY OF ISABELA', 4, '099700000');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `rid` int NOT NULL AUTO_INCREMENT,
  `region_name` varchar(50) NOT NULL,
  `sort` int NOT NULL DEFAULT '0',
  `psa_code` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`rid`, `region_name`, `sort`, `psa_code`) VALUES
(1, 'NATIONAL CAPITAL REGION (NCR)', 1, '130000000'),
(2, 'CORDILLERA ADMINISTRATIVE REGION (CAR)', 2, '140000000'),
(3, 'REGION I (ILOCOS REGION)', 3, '010000000'),
(4, 'REGION II (CAGAYAN VALLEY)', 4, '020000000'),
(5, 'REGION III (CENTRAL LUZON)', 5, '030000000'),
(6, 'REGION IV-A (CALABARZON)', 6, '040000000'),
(7, 'MIMAROPA REGION', 7, '170000000'),
(8, 'REGION V (BICOL REGION)', 8, '050000000'),
(9, 'REGION VI (WESTERN VISAYAS)', 9, '060000000'),
(10, 'REGION VII (CENTRAL VISAYAS)', 10, '070000000'),
(11, 'REGION VIII (EASTERN VISAYAS)', 11, '080000000'),
(12, 'REGION IX (ZAMBOANGA PENINSULA)', 12, '090000000'),
(13, 'REGION X (NORTHERN MINDANAO)', 13, '100000000'),
(14, 'REGION XI (DAVAO REGION)', 14, '110000000'),
(15, 'REGION XII (SOCCSKSARGEN)', 15, '120000000'),
(16, 'REGION XIII (Caraga)', 16, '160000000'),
(17, 'AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)', 17, '150000000');

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
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `meal` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `res_tb`
--

INSERT INTO `res_tb` (`res_id`, `res_number`, `item_id`, `user_id`, `start`, `end`, `meal`, `total`, `payment`, `status`) VALUES
(58, 885864049, 6, 81, '01/04/2024', '01/06/2024', '0', '10,000', 'Over the counter', 'Approved'),
(63, 620396364, 6, 81, '01/03/2024', '01/05/2024', '0', '10,000', 'Paypal', 'Pending'),
(62, 946812418, 7, 81, '01/03/2024', '01/06/2024', '0', '14,400', 'Paymaya', 'Pending'),
(61, 601195482, 6, 80, '01/04/2024', '01/06/2024', '0', '5,000', 'Paymaya', 'Pending');

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
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone`, `region`, `city`, `province`, `password`) VALUES
(26, 'fds@gmail.com', 'admin@gmail.com', 4643, 0, '', '', 'admin'),
(80, '123', 'asdsd@gmail.com', 123, 7, 'bais', 'negros', '23213'),
(81, 'ewq', 'junzfundador142@gmail.com', 2342, 0, '', '', '123'),
(82, 'junzfundador142@gmail.com', 'junzfundador142@gmail.com', 123, 0, '', '', '213'),
(86, 'sd', 'junzfundador142@gmail.com', 213, 0, '', '', '23'),
(87, 'sdasd', 'junzfundador142@gmail.com', 4543543, 0, '', '', '123'),
(92, '123dfdsfds', 'ki@gmail.com', 123, 0, '', '', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
