-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 04:22 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'superadmin', 'superadmin'),
(3, 'eizen', '123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Corsx'),
(2, 'Colourpop'),
(3, 'Glossier'),
(4, 'Nyx'),
(5, 'BH Cosmetics'),
(6, 'AoA Studio'),
(7, 'ETC');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` varchar(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'K-Beauty'),
(2, 'Food\r\n'),
(3, 'Home'),
(4, 'Makeup'),
(5, 'Skincare'),
(6, 'ETC');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(1, '127.0.0.1', 'Malphite', 'eizen', '123', 'Philippines', 'Paranaque', '12312312321', '12asdsadsadasd223123asdas', 'dogge.jpg'),
(2, '::1', 'Malphite', 'user', 'user', 'Philippines', 'Manila', '093182321321321', 'maksdmnsalkdas', 'dogge.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `damageprod`
--

CREATE TABLE `damageprod` (
  `dmg_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `inputed_by` int(11) NOT NULL,
  `date_inputed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deletelogs`
--

CREATE TABLE `deletelogs` (
  `del_id` int(11) NOT NULL,
  `deletedby` varchar(123) NOT NULL,
  `deletedin` varchar(123) NOT NULL,
  `phaseoutID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletelogs`
--

INSERT INTO `deletelogs` (`del_id`, `deletedby`, `deletedin`, `phaseoutID`) VALUES
(1, 'migs@gmail.com', '2018-04-12 21:40:10', '38');

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

CREATE TABLE `loginlogs` (
  `loginid` int(255) NOT NULL,
  `loginname` varchar(255) NOT NULL,
  `loginrole` varchar(255) NOT NULL,
  `logintime` varchar(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `logouttime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginlogs`
--

INSERT INTO `loginlogs` (`loginid`, `loginname`, `loginrole`, `logintime`, `userid`, `logouttime`) VALUES
(1, 'migs@gmail.com', 'Staff', '2018-04-04 02:02:53', 1, '2018-04-04 11:31:42'),
(2, 'Blaise@gmail.com', 'Admin', '2018-04-04 13:21:47', 3, '2018-04-04 19:22:29'),
(3, 'migs@gmail.com', 'Staff', '2018-04-04 13:22:55', 1, '2018-04-04 19:36:45'),
(4, 'migs@gmail.com', 'Staff', '2018-04-04 13:37:08', 1, '2018-04-05 01:01:33'),
(5, 'migs@gmail.com', 'Staff', '2018-04-04 19:44:31', 1, '2018-04-05 02:24:44'),
(6, 'migs@gmail.com', 'Staff', '2018-04-04 20:51:48', 1, ''),
(7, 'blaise@gmail.com', 'Admin', '2018-04-10 12:29:28', 3, ''),
(8, 'migs@gmail.com', 'Staff', '2018-04-10 12:30:06', 1, ''),
(9, 'powuser@gmail.com', 'Admin', '2018-04-11 05:48:53', 1, ''),
(10, 'migs@gmail.com', 'Staff', '2018-04-11 05:59:49', 1, ''),
(11, 'eizen', 'Admin', '2018-04-12 15:28:12', 3, ''),
(12, 'migs@gmail.com', 'Staff', '2018-04-12 19:46:27', 1, ''),
(13, 'migs@gmail.com', 'Staff', '2018-04-12 20:56:48', 1, ''),
(14, 'migs@gmail.com', 'Staff', '2018-04-12 21:20:16', 1, '2018-04-13 03:27:00'),
(15, 'eizen', 'Admin', '2018-04-12 21:27:52', 3, '2018-04-13 03:38:46'),
(16, 'migs@gmail.com', 'Staff', '2018-04-12 21:39:12', 1, '2018-04-13 03:41:33'),
(17, 'eizen', 'Admin', '2018-04-12 21:41:40', 3, '2018-04-13 03:43:10'),
(18, 'migs@gmail.com', 'Staff', '2018-04-12 21:43:18', 1, '2018-04-13 04:44:14'),
(19, 'migs@gmail.com', 'Staff', '2018-04-20 20:04:18', 1, ''),
(20, 'migs@gmail.com', 'Staff', '2018-04-20 20:14:41', 1, ''),
(21, 'migs@gmail.com', 'Staff', '2018-04-21 13:58:23', 1, ''),
(22, 'migs@gmail.com', 'Staff', '2018-04-24 15:17:13', 1, ''),
(23, 'migs@gmail.com', 'Staff', '2018-04-24 15:39:31', 1, ''),
(24, 'migs@gmail.com', 'Staff', '2018-04-24 17:06:22', 1, ''),
(25, 'migs@gmail.com', 'Staff', '2018-04-25 01:29:49', 1, '2018-04-25 07:59:01'),
(26, 'eizen', 'Admin', '2018-04-25 01:59:39', 3, '2018-04-25 09:17:39'),
(27, 'migs@gmail.com', 'Staff', '2018-04-25 03:17:52', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `recieved_by` varchar(123) NOT NULL,
  `customer_contact` int(11) NOT NULL,
  `customer_address` varchar(256) NOT NULL,
  `date_paid` varchar(213) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `qty`, `receipt_id`, `pro_id`, `order_date`, `status`, `customer`, `recieved_by`, `customer_contact`, `customer_address`, `date_paid`) VALUES
(10113, '1', 5, '12', '2018-04-24', 'Paid', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', '2018-04-25'),
(10114, '2', 5, '13', '2018-04-24', 'Paid', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', '2018-04-25'),
(10115, '1', 6, '22', '2018-04-24', 'Paid', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', '2018-04-25'),
(10116, '1', 6, '23', '2018-04-24', 'Paid', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', '2018-04-25'),
(10117, '1', 7, '28', '2018-04-25', 'Paid', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', '2018-04-25'),
(10118, '1', 7, '33', '2018-04-25', 'Paid', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', '2018-04-25'),
(10119, '1', 7, '36', '2018-04-25', 'Paid', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', '2018-04-25'),
(10120, '1', 8, '6', '2018-04-25', 'Shipped', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', ''),
(10121, '1', 8, '7', '2018-04-25', 'Shipped', 'eizen', 'migs@gmail.com', 0, '12asdsadsadasd223123asdas', ''),
(10122, '1', 10, '17', '2018-04-25', 'Shipped', 'eizen', 'migs@gmail.com', 2147483647, '12asdsadsadasd223123asdas', ''),
(10123, '1', 10, '25', '2018-04-25', 'Shipped', 'eizen', 'migs@gmail.com', 2147483647, '12asdsadsadasd223123asdas', ''),
(10124, '1', 10, '33', '2018-04-25', 'Shipped', 'eizen', 'migs@gmail.com', 2147483647, '12asdsadsadasd223123asdas', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_receipt`
--

CREATE TABLE `order_receipt` (
  `receipt_id` int(11) NOT NULL,
  `cust_email` varchar(256) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `datepurchase` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_receipt`
--

INSERT INTO `order_receipt` (`receipt_id`, `cust_email`, `qty`, `total`, `datepurchase`) VALUES
(1, 'eizen', 0, '1300.00', '2018-04-24 22:42:20'),
(2, 'eizen', 0, '1900.00', '2018-04-24 22:42:20'),
(3, 'eizen', 0, '0.00', '2018-04-24 22:46:45'),
(4, 'eizen', 0, '0.00', '2018-04-24 23:02:20'),
(5, 'eizen', 0, '0.00', '2018-04-24 23:03:51'),
(6, 'eizen', 0, '0.00', '2018-04-24 23:49:58'),
(7, 'eizen', 0, '0.00', '2018-04-25 00:07:24'),
(8, 'eizen', 0, '0.00', '2018-04-25 07:54:45'),
(9, 'eizen', 0, '0.00', '2018-04-25 07:54:57'),
(10, 'eizen', 0, '0.00', '2018-04-25 08:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `phaseout`
--

CREATE TABLE `phaseout` (
  `phaseoutID` int(255) NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `prod_cat` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `deletedin` varchar(255) NOT NULL,
  `deletedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phaseout`
--

INSERT INTO `phaseout` (`phaseoutID`, `prod_title`, `prod_cat`, `prod_image`, `deletedin`, `deletedby`) VALUES
(38, 'Tester1', '4', 'dogge.jpg', '2018-04-12 21:40:10', 'migs@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(100) NOT NULL,
  `prod_title` text NOT NULL,
  `prod_cat` text NOT NULL,
  `prod_brand` int(11) NOT NULL,
  `prod_qty` int(100) NOT NULL,
  `prod_price` decimal(65,2) NOT NULL,
  `prod_image` text NOT NULL,
  `dateentered` varchar(123) NOT NULL,
  `prod_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_title`, `prod_cat`, `prod_brand`, `prod_qty`, `prod_price`, `prod_image`, `dateentered`, `prod_desc`) VALUES
(6, 'Beauty Water', '1', 7, 48, '600.00', 'kbeauty beauty.jpg', '2018-1-5 13:02:00', 'Son & Park'),
(7, 'Low Ph Facial Cleanser', '1', 1, 12, '350.00', 'kbeauty cosrx lowph.jpg', '2018-01-5 12:14:31', 'cosrx cleanser facial lowph'),
(8, 'Cosrx Salicylic Cleanser', '1', 1, 36, '350.00', 'kbeauty cosrx red.jpg', '2018-01-5 12:15:31', 'Cosrx Acid Facial Cleanser'),
(9, 'Cosrx Clear Fit Master Patch', '1', 1, 38, '50.00', 'kbeauty cosrx.jpg', '2018-01-5 12:16:32', 'Cosrx clear patch'),
(10, 'Purederm Deodorant', '1', 7, 47, '100.00', 'kbeauty deo.jpg', '2018-01-5 12:17:55', 'for underarm'),
(11, 'Iope Clinic Set', '1', 7, 47, '3000.00', 'kbeauty iope clinic.jpg', '2018-01-5 12:18:20', 'facial set'),
(12, 'Iope Correcting Patch', '1', 7, 49, '200.00', 'kbeauty iope.jpg', '2018-01-5 12:18:56', 'iope correcting'),
(13, 'Lipstick', '1', 5, 48, '250.00', 'kbeauty lip.jpg', '2018-01-5 12:19:30', 'lipstick'),
(14, 'Calmia Oatmeal Therapy', '1', 7, 49, '2000.00', 'kbeauty oatmel.jpg', '2018-01-5 12:25:10', 'oatmeal cleanser'),
(15, 'Flawless Brow Trio', '4', 5, 48, '1000.00', '001.jpg', '2018-01-5 12:26:06', 'shades for brows'),
(16, 'Nude Blush', '4', 5, 50, '1200.00', '003.jpg', '2018-01-5 12:27:20', '10 colour pallets for cheeks'),
(17, 'Glossier Gloss', '4', 3, 49, '1500.00', '004.jpg', '2018-01-5 12:28:50', 'lip gloss for lips'),
(18, 'Glossier Mint Balm', '4', 3, 50, '1200.00', '005.jpg', '2018-01-5 12:29:30', 'gloss for lips with mint'),
(19, 'Glossier Birthday Balm', '4', 3, 50, '1400.00', '006.jpg', '2018-01-5 12:31:10', 'lip gloss with glitters'),
(20, 'Colourpop Beeper', '4', 2, 45, '1500.00', '007.jpg', '2018-01-5 12:30:09', 'colourpop matte lips'),
(21, 'Colourpop Barely There', '4', 2, 49, '600.00', '008.jpg', '2018-01-5 12:30:50', 'matte lipstick'),
(22, 'AOA STudio Eyeleash Curler', '5', 6, 49, '1000.00', '009.jpg', '2018-01-5 12:31:43', 'curls lashes'),
(23, 'AOA Studio Blender', '5', 6, 49, '3000.00', '010.jpg', '2018-01-5 12:32:55', 'latex free blender'),
(24, 'Nyx Setting Spray', '5', 4, 49, '1600.00', '011.jpg', '2018-01-5 12:34:15', 'Setting spray for last touch'),
(25, 'Nyx Primer Angel Veil', '5', 4, 49, '800.00', '012.jpg', '2018-01-5 12:34:53', 'primer for longer lasting'),
(26, 'Mirror 001', '3', 7, 48, '1300.00', '013.jpg', '2018-01-5 12:36:31', 'mirror'),
(27, 'Vase Bowl', '3', 7, 49, '1900.00', '014.jpg', '2018-01-5 12:39:51', 'vase bowl'),
(28, 'Flower Bowl', '3', 7, 47, '500.00', '017.jpg', '2018-01-5 12:37:16', 'flower bowl'),
(32, 'Mirror 002', '3', 7, 50, '650.00', '018.jpg', '2018-01-5 12:38:29', 'diamond mshaped mirror'),
(33, 'Airheads Stripe 97g', '2', 7, 96, '100.00', '019.jpg', '2018-01-5 12:39:10', 'airheads stripe'),
(34, 'Warheads 27g', '2', 7, 95, '100.00', '020.jpg', '2018-01-5 12:39:59', 'warheads'),
(35, 'Sourpatch Watermelon 113g', '2', 7, 100, '100.00', '021.jpg', '2018-01-5 12:40:25', 'sourpatch watermelon'),
(36, 'Sourpatch KIDS 113g', '2', 7, 99, '100.00', '022.jpg', '2018-01-5 12:41:34', 'sourpatches for kids'),
(37, 'Son Goku', '2', 0, 49, '200.00', 'dogge.jpg', '2018-04-04 02:03:48', 'Masarap');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(123) NOT NULL,
  `sale_date` varchar(123) NOT NULL,
  `sale_product_id` varchar(123) NOT NULL,
  `sale_buyer` varchar(123) NOT NULL,
  `sale_qty` varchar(123) NOT NULL,
  `sale_amount` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_date`, `sale_product_id`, `sale_buyer`, `sale_qty`, `sale_amount`) VALUES
(84, '2018-04-13', '6', 'eizen', '2', '1200'),
(85, '2018-04-13', '7', 'eizen', '3', '1050'),
(86, '2018-04-13', '8', 'eizen', '4', '1400'),
(87, '2018-04-13', '6', 'eizen', '1', '600'),
(88, '2018-04-13', '7', 'eizen', '3', '1050'),
(89, '2018-04-13', '8', 'eizen', '2', '700'),
(90, '2018-04-24', '6', 'eizen', '0', '0'),
(91, '2018-04-24', '7', 'eizen', '0', '0'),
(92, '2018-04-24', '8', 'eizen', '2', '700'),
(93, '2018-04-24', '9', 'eizen', '1', '50'),
(94, '2018-04-24', '11', 'eizen', '1', '3000'),
(95, '2018-04-24', '26', 'eizen', '1', '1300'),
(96, '2018-04-24', '27', 'eizen', '1', '1900'),
(97, '2018-04-24', '24', 'eizen', '1', '1600'),
(98, '2018-04-24', '28', 'eizen', '2', '1000'),
(99, '2018-04-24', '21', 'eizen', '1', '600'),
(100, '2018-04-24', '37', 'eizen', '1', '200'),
(101, '2018-04-24', '12', 'eizen', '1', '200'),
(102, '2018-04-24', '13', 'eizen', '2', '500'),
(103, '2018-04-24', '22', 'eizen', '1', '1000'),
(104, '2018-04-24', '23', 'eizen', '1', '3000'),
(105, '2018-04-25', '28', 'eizen', '1', '500'),
(106, '2018-04-25', '33', 'eizen', '1', '100'),
(107, '2018-04-25', '36', 'eizen', '1', '100'),
(108, '2018-04-25', '6', 'eizen', '1', '600'),
(109, '2018-04-25', '7', 'eizen', '1', '350'),
(110, '2018-04-25', '17', 'eizen', '1', '1500'),
(111, '2018-04-25', '25', 'eizen', '1', '800'),
(112, '2018-04-25', '33', 'eizen', '1', '100');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(120) NOT NULL,
  `staff_email` varchar(120) NOT NULL,
  `staff_pass` varchar(120) NOT NULL,
  `staff_image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_email`, `staff_pass`, `staff_image`) VALUES
(1, 'migs@gmail.com', 'migs', ''),
(4, 'regina@gmail.com', 'regina1', ''),
(5, 'daryl@gmail.com', 'daryl', ''),
(6, 'admin', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `damageprod`
--
ALTER TABLE `damageprod`
  ADD PRIMARY KEY (`dmg_id`);

--
-- Indexes for table `deletelogs`
--
ALTER TABLE `deletelogs`
  ADD PRIMARY KEY (`del_id`);

--
-- Indexes for table `loginlogs`
--
ALTER TABLE `loginlogs`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `order_receipt`
--
ALTER TABLE `order_receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `phaseout`
--
ALTER TABLE `phaseout`
  ADD PRIMARY KEY (`phaseoutID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `damageprod`
--
ALTER TABLE `damageprod`
  MODIFY `dmg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deletelogs`
--
ALTER TABLE `deletelogs`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginlogs`
--
ALTER TABLE `loginlogs`
  MODIFY `loginid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10125;

--
-- AUTO_INCREMENT for table `order_receipt`
--
ALTER TABLE `order_receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phaseout`
--
ALTER TABLE `phaseout`
  MODIFY `phaseoutID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
