-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 07:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melzar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `profile` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `user_name`, `password`, `role`, `profile`, `date`) VALUES
(24, 'roblo', '4752d51bd71f704beec34b798c76ca9e', 'Manager', 'admin_19419.png', '2024-04-06 00:09:26'),
(30, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Manager', 'admin_13022.png', '2024-04-06 03:07:09'),
(35, 'emel', '62506be34d574da4a0d158a67253ea99', 'Restaurant - Prep', 'admin_27301.png', '2024-10-03 16:37:48'),
(36, 'food', '62506be34d574da4a0d158a67253ea99', 'Restaurant - POS', 'admin_2339.png', '2024-10-03 16:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_fullname` text NOT NULL,
  `user_number` text NOT NULL,
  `user_email` text NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_name` text NOT NULL,
  `price_per_night` int(11) NOT NULL,
  `check_in_date` text NOT NULL,
  `check_out_date` text NOT NULL,
  `days_night` text NOT NULL,
  `total` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'Pending',
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `gcash_receipt` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `booked_date` datetime DEFAULT current_timestamp(),
  `approved_date` datetime DEFAULT NULL,
  `occupied_date` datetime DEFAULT NULL,
  `success_date` datetime DEFAULT NULL,
  `approved_status` text NOT NULL DEFAULT 'Pending',
  `occupied_status` text NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `user_fullname`, `user_number`, `user_email`, `room_id`, `room_name`, `price_per_night`, `check_in_date`, `check_out_date`, `days_night`, `total`, `status`, `image1`, `image2`, `image3`, `gcash_receipt`, `date`, `booked_date`, `approved_date`, `occupied_date`, `success_date`, `approved_status`, `occupied_status`) VALUES
(243, 61, 'admin', '09566320135', 'datarioarc@gmail.com', 111, 'Sapphires', 3500, '2024-05-16', '2024-05-17', '2 days, 1 night', 3500, '0', '../room_img/room_images_14411_1.jpg', '../room_img/room_images_39060_2.jpg', '../room_img/room_images_45281_3.jpg', 'g-cash_receipt_26216.PNG', '2024-05-16 00:47:57', '2024-05-16 00:47:57', NULL, NULL, NULL, 'Pending', 'Pending'),
(244, 61, 'admin', '09566320135', 'datarioarc@gmail.com', 113, 'Amethyst', 2147, '2024-05-17', '2024-05-17', '1 day', 2147, '0', '../room_img/room_images_34291_1.jpg', '../room_img/room_images_31226_2.jpg', '../room_img/room_images_5137_3.jpg', 'g-cash_receipt_9349.PNG', '2024-05-16 00:48:11', '2024-05-16 00:48:11', NULL, NULL, NULL, 'Pending', 'Pending'),
(245, 61, 'admin', '09566320135', 'datarioarc@gmail.com', 117, 'asdsssssgdf', 12334, '2024-05-16', '2024-05-17', '2 days, 1 night', 12334, '0', '../room_img/room_images_33740_1.jpg', '../room_img/room_images_10074_2.jpg', '../room_img/room_images_41021_3.jpg', 'g-cash_receipt_15096.png', '2024-05-15 00:49:38', '2024-05-16 00:48:30', '2024-05-16 00:49:38', '2024-05-15 00:50:21', NULL, 'Approved', 'Occupied'),
(246, 61, 'admin', '09566320135', 'datarioarc@gmail.com', 115, 'asdsssssgdf', 3241, '2024-05-16', '2024-05-17', '2 days, 1 night', 3241, 'Done', '../room_img/room_images_14411_1.jpg', '../room_img/room_images_6210_2.jpg', '../room_img/room_images_30340_3.jpg', 'g-cash_receipt_13113.png', '2024-05-16 00:50:58', '2024-05-16 00:48:47', '2024-05-16 00:49:50', '2024-05-16 00:50:34', NULL, 'Approved', 'Occupied'),
(247, 61, 'admin', '09566320135', 'datarioarc@gmail.com', 115, 'asdsssssgdf', 3241, '2024-05-18', '2024-05-19', '2 days, 1 night', 3241, 'Done', '../room_img/room_images_14411_1.jpg', '../room_img/room_images_6210_2.jpg', '../room_img/room_images_30340_3.jpg', 'g-cash_receipt_32590.png', '2024-05-16 00:50:54', '2024-05-16 00:49:01', '2024-05-16 00:50:01', '2024-05-16 00:50:47', NULL, 'Approved', 'Occupied'),
(248, 61, 'admin', '09566320135', 'datarioarc@gmail.com', 117, 'asdsssssgdf', 12334, '2024-05-18', '2024-05-19', '2 days, 1 night', 12334, '0', '../room_img/room_images_33740_1.jpg', '../room_img/room_images_10074_2.jpg', '../room_img/room_images_41021_3.jpg', 'g-cash_receipt_28270.png', '2024-05-16 00:52:04', '2024-05-16 00:49:20', '2024-05-16 00:52:04', '2024-05-16 00:53:06', NULL, 'Approved', 'Occupied'),
(249, 61, 'admin', '09566320135', 'datarioarc@gmail.com', 118, 'Modern Room', 2353, '2024-05-16', '2024-05-17', '2 days, 1 night', 2353, 'Done', '../room_img/room_images_16743_1.jpg', '../room_img/room_images_854_2.jpg', '../room_img/room_images_24793_3.jpg', 'g-cash_receipt_40325.png', '2024-06-04 16:39:50', '2024-05-16 00:51:43', '2024-05-16 00:53:03', '2024-05-18 02:23:59', NULL, 'Approved', 'Occupied'),
(250, 61, 'admin', '09566320135', 'datarioarc@gmail.com', 116, 'Aquamarine', 2341, '2024-05-16', '2024-05-17', '2 days, 1 night', 2341, 'Done', '../room_img/room_images_38488_1.jpg', '../room_img/room_images_19824_2.jpg', '../room_img/room_images_8303_3.jpg', 'g-cash_receipt_31923.png', '2024-05-18 02:27:38', '2024-05-16 00:52:42', '2024-05-18 02:22:10', '2024-05-18 02:24:44', NULL, 'Approved', 'Occupied'),
(251, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 145, 'Emerald', 2000, '2024-06-19', '2024-06-20', '2 days, 1 night', 2000, 'Done', 'room_img/room_image_970_1.jpg', 'room_img/room_image_830_2.jpg', 'room_img/room_image_490_image3.jpg', 'g-cash_receipt_22579.jpg', '2024-06-04 16:39:46', '2024-06-04 15:15:10', '2024-06-04 15:17:11', '2024-06-04 16:32:33', NULL, 'Approved', 'Occupied'),
(252, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 146, 'Amethyst', 5000, '2024-06-04', '2024-06-05', '2 days, 1 night', 5000, '0', 'room_img/room_image_284_1.jpg', 'room_img/room_image_393_2.jpg', 'room_img/room_image_160_image3.jpg', 'g-cash_receipt_20721.jpg', '2024-06-04 16:34:44', '2024-06-04 15:18:47', '2024-06-04 15:19:06', NULL, NULL, 'Approved', 'Pending'),
(253, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 145, 'Emerald', 2000, '2024-06-04', '2024-06-05', '2 days, 1 night', 2000, '0', 'room_img/room_image_970_1.jpg', 'room_img/room_image_830_2.jpg', 'room_img/room_image_490_image3.jpg', 'g-cash_receipt_23505.jpg', '2024-06-04 15:24:04', '2024-06-04 15:23:13', '2024-06-04 15:24:04', NULL, NULL, 'Approved', 'Pending'),
(254, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 145, 'Emerald', 2000, '2024-06-06', '2024-06-07', '2 days, 1 night', 2000, '0', 'room_img/room_image_970_1.jpg', 'room_img/room_image_830_2.jpg', 'room_img/room_image_490_image3.jpg', 'g-cash_receipt_1096.jpg', '2024-06-04 15:42:59', '2024-06-04 15:38:31', '2024-06-04 15:42:59', NULL, NULL, 'Approved', 'Pending'),
(255, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 146, 'Amethyst', 5000, '2024-06-06', '2024-06-07', '2 days, 1 night', 5000, '0', 'room_img/room_image_284_1.jpg', 'room_img/room_image_393_2.jpg', 'room_img/room_image_160_image3.jpg', 'g-cash_receipt_46860.jpg', '2024-06-04 15:43:47', '2024-06-04 15:43:35', '2024-06-04 15:43:47', NULL, NULL, 'Approved', 'Pending'),
(256, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 147, 'Sapphire', 3500, '2024-06-04', '2024-06-05', '2 days, 1 night', 3500, '0', 'room_img/room_image_942_1.jpg', 'room_img/room_image_1288_2.jpg', 'room_img/room_image_1774_3.jpg', 'g-cash_receipt_28803.jpg', '2024-06-04 15:45:15', '2024-06-04 15:45:08', '2024-06-04 15:45:15', NULL, NULL, 'Approved', 'Pending'),
(257, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 146, 'Amethyst', 5000, '2024-06-08', '2024-06-09', '2 days, 1 night', 5000, '0', 'room_img/room_image_284_1.jpg', 'room_img/room_image_393_2.jpg', 'room_img/room_image_160_image3.jpg', 'g-cash_receipt_21899.jpg', '2024-06-04 15:46:26', '2024-06-04 15:46:10', '2024-06-04 15:46:26', NULL, NULL, 'Approved', 'Pending'),
(258, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 147, 'Sapphire', 3500, '2024-06-06', '2024-06-07', '2 days, 1 night', 3500, '0', 'room_img/room_image_942_1.jpg', 'room_img/room_image_1288_2.jpg', 'room_img/room_image_1774_3.jpg', 'g-cash_receipt_37396.jpg', '2024-06-04 15:47:44', '2024-06-04 15:46:51', '2024-06-04 15:47:44', NULL, NULL, 'Approved', 'Pending'),
(259, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 145, 'Emerald', 2000, '2024-06-08', '2024-06-09', '2 days, 1 night', 2000, '0', 'room_img/room_image_970_1.jpg', 'room_img/room_image_830_2.jpg', 'room_img/room_image_490_image3.jpg', 'g-cash_receipt_12948.jpg', '2024-06-04 16:32:06', '2024-06-04 15:47:37', '2024-06-04 16:32:06', NULL, NULL, 'Approved', 'Pending'),
(260, 64, 'emel JANE ROBLO', '09389506544', 'robloemeljane0@gmail.com', 145, 'Emerald', 2000, '2024-06-12', '2024-06-13', '2 days, 1 night', 2000, 'Done', 'room_img/room_image_970_1.jpg', 'room_img/room_image_830_2.jpg', 'room_img/room_image_490_image3.jpg', 'g-cash_receipt_6681.jpg', '2024-06-04 16:40:18', '2024-06-04 16:37:11', '2024-06-04 16:37:26', '2024-06-04 16:40:08', NULL, 'Approved', 'Occupied'),
(261, 65, 'Emel jane', '09095533979', 'enajlememendezroblo10@gmail.com', 145, 'Emerald', 2000, '2024-09-11', '2024-09-14', '4 days, 3 nights', 6000, 'Approved', 'room_img/room_image_970_1.jpg', 'room_img/room_image_830_2.jpg', 'room_img/room_image_490_image3.jpg', 'g-cash_receipt_12741.jfif', '2024-09-11 22:38:15', '2024-09-11 22:36:58', '2024-09-11 22:38:15', NULL, NULL, 'Approved', 'Pending'),
(262, 65, 'Emel jane', '09095533979', 'enajlememendezroblo10@gmail.com', 146, 'Amethyst', 5000, '2024-09-11', '2024-09-14', '4 days, 3 nights', 15000, 'Approved', 'room_img/room_image_284_1.jpg', 'room_img/room_image_393_2.jpg', 'room_img/room_image_160_image3.jpg', 'g-cash_receipt_8064.jfif', '2024-09-11 22:48:40', '2024-09-11 22:47:11', '2024-09-11 22:48:40', NULL, NULL, 'Approved', 'Pending'),
(263, 65, 'Emel jane', '09095533979', 'enajlememendezroblo10@gmail.com', 147, 'Sapphire', 3500, '2024-09-11', '2024-09-14', '4 days, 3 nights', 10500, 'Approved', 'room_img/room_image_942_1.jpg', 'room_img/room_image_1288_2.jpg', 'room_img/room_image_1774_3.jpg', 'g-cash_receipt_47353.jfif', '2024-09-11 22:51:00', '2024-09-11 22:50:24', '2024-09-11 22:51:00', NULL, NULL, 'Approved', 'Pending'),
(264, 65, 'Emel jane', '09095533979', 'enajlememendezroblo10@gmail.com', 147, 'Sapphire', 3500, '2024-09-15', '2024-09-18', '4 days, 3 nights', 10500, 'Approved', 'room_img/room_image_942_1.jpg', 'room_img/room_image_1288_2.jpg', 'room_img/room_image_1774_3.jpg', 'g-cash_receipt_42618.jpg', '2024-09-11 22:54:08', '2024-09-11 22:54:02', '2024-09-11 22:54:08', NULL, NULL, 'Approved', 'Pending'),
(265, 65, 'Emel jane', '09095533979', 'enajlememendezroblo10@gmail.com', 145, 'Emerald', 2000, '2024-09-15', '2024-09-17', '3 days, 2 nights', 4000, 'Approved', 'room_img/room_image_970_1.jpg', 'room_img/room_image_830_2.jpg', 'room_img/room_image_490_image3.jpg', 'g-cash_receipt_18691.jfif', '2024-09-11 23:01:25', '2024-09-11 23:00:22', '2024-09-11 23:01:25', NULL, NULL, 'Approved', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_image` text NOT NULL,
  `user_fullname` text NOT NULL,
  `stars` int(11) NOT NULL,
  `comments` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods_tbl`
--

CREATE TABLE `foods_tbl` (
  `id` int(11) NOT NULL,
  `food_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `status` text NOT NULL,
  `category` text NOT NULL,
  `stocks` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods_tbl`
--

INSERT INTO `foods_tbl` (`id`, `food_name`, `price`, `status`, `category`, `stocks`, `image`) VALUES
(36, 'Fried Rice', 150, 'display', 'Rice', 0, 'food_img_816.jpg'),
(37, 'Plain Rice', 150, 'display', 'Rice', 0, 'food_img_15345.jpg'),
(38, 'Brown Rice', 150, 'display', 'Rice', 0, 'food_img_21665.jpg'),
(40, 'Roasted chiCKEN', 450, 'display', 'Dish', 4, 'food_img_17709.webp'),
(41, 'Salmon', 250, 'display', 'Dish', 40, 'food_img_17579.webp'),
(42, 'Fruit Shake', 150, 'display', 'Beverages', 13, 'food_img_8903.jpg'),
(43, 'Nestea', 123, 'display', 'Beverages', 50, 'food_img_27863.jpg'),
(44, 'Tanduay', 123, 'display', 'Bar&Drinks', 49, 'food_img_49679.jpg'),
(45, 'Lambanog', 62, 'display', 'Bar&Drinks', 18, 'food_img_32466.jpg'),
(46, 'Tequila', 2134, 'display', 'Bar&Drinks', 13, 'food_img_21487.jpg'),
(47, 'Rice', 234, 'display', 'Rice', 0, 'food_img_24440.jpg'),
(50, 'Sweet Bread', 234, 'display', 'Dessert', 0, 'food_img_37106.webp'),
(51, 'Fruits', 1234, 'display', 'Dessert', 20, 'food_img_7847.webp'),
(52, 'Halu-halo', 99, 'display', 'Dessert', 133, 'food_img_27480.jpg'),
(53, 'Mango Dessert in a Cup', 50, 'display', 'Dessert', 474, 'food_img_5170.jpg'),
(54, 'Maja Blanca with kiwi and mango on top', 100, 'display', 'Dessert', 82, 'food_img_14236.jpg'),
(55, 'Sizzling Pork Sisig', 189, 'display', 'Dish', 200, 'food_img_20172.jpg'),
(56, 'Relyenong Pusit', 500, 'display', 'Dish', 399, 'food_img_18747.jpg'),
(57, 'Beef Bulalo', 500, 'display', 'Dish', 285, 'food_img_21953.jpg'),
(58, 'Pork Sinigang', 300, 'display', 'Dish', 177, 'food_img_17625.jpg'),
(59, 'Pork Bagnet', 300, 'display', 'Dish', 168, 'food_img_27766.jpg'),
(60, 'Sinigang na Bangus', 300, 'display', 'Dish', 170, 'food_img_301.jpg'),
(61, 'Drink Daikiri', 129, 'display', 'Beverages', 85, 'food_img_26367.jpg'),
(62, 'Iced Green Tea', 79, 'display', 'Beverages', 182, 'food_img_29945.jpg'),
(63, 'Blueberry Soda', 79, 'display', 'Beverages', 187, 'food_img_12216.jpg'),
(64, 'Clitoria Ternatea', 150, 'display', 'Beverages', 179, 'food_img_10787.jpg'),
(66, 'Lemonade', 79, 'display', 'Beverages', 183, 'food_img_9484.jpg'),
(67, 'Cabo Wabo Cocktail', 109, 'display', 'Bar&Drinks', 189, 'food_img_44183.jpg'),
(68, 'Hawaiian Li Hing Mui Margaritas', 109, 'display', 'Beverages', 186, 'food_img_24343.jpg'),
(69, 'Cinderella Mocktail', 109, 'display', 'Bar&Drinks', 195, 'food_img_28563.jpg'),
(70, 'Blue Lagoon Mocktail', 139, 'display', 'Bar&Drinks', 191, 'food_img_6756.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `overall_total` int(11) NOT NULL,
  `recieve` int(11) NOT NULL,
  `customers_change` int(11) NOT NULL,
  `badge_number` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'Pending',
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `food_id`, `food_name`, `quantity`, `price`, `total`, `overall_total`, `recieve`, `customers_change`, `badge_number`, `status`, `order_date`) VALUES
(695, 2, 25, 'Pizza', 1, 250, 250, 1700, 1800, 100, 16, 'success', '2024-05-16 00:00:00'),
(696, 2, 29, 'Ramen', 1, 250, 250, 1700, 1800, 100, 16, 'success', '2024-05-16 00:00:00'),
(700, 3, 29, 'Ramen', 1, 250, 250, 1300, 1500, 200, 18, 'success', '2024-05-16 00:00:00'),
(708, 1, 28, 'Roasted Chicken', 1, 450, 450, 1300, 1400, 100, 14, 'success', '2024-05-16 00:00:00'),
(721, 4, 28, 'Roasted Chicken', 2, 450, 900, 2950, 3000, 50, 28, 'success', '2024-05-16 00:00:00'),
(725, 2, 29, 'Ramen', 1, 250, 250, 1750, 2000, 250, 26, 'success', '2024-05-16 00:00:00'),
(729, 3, 27, 'Burger', 1, 150, 150, 1450, 1500, 50, 23, 'success', '2024-05-16 00:00:00'),
(737, 2, 28, 'Roasted Chicken', 1, 450, 450, 1050, 1500, 450, 67, 'success', '2024-05-16 00:00:00'),
(741, 3, 28, 'Roasted Chicken', 1, 450, 450, 2150, 2200, 50, 123, 'success', '2024-05-16 00:00:00'),
(749, 5, 28, 'Roasted Chicken', 1, 450, 450, 1050, 1200, 150, 12, 'success', '2024-05-16 00:00:00'),
(753, 6, 28, 'Roasted Chicken', 1, 450, 450, 1300, 1500, 200, 14, 'success', '2024-05-16 00:00:00'),
(757, 7, 28, 'Roasted Chicken', 1, 450, 450, 1300, 1500, 200, 13, 'success', '2024-05-16 00:00:00'),
(761, 8, 28, 'Roasted Chicken', 1, 450, 450, 1300, 1500, 200, 12, 'success', '2024-05-16 00:00:00'),
(762, 9, 28, 'Roasted Chicken', 3, 450, 1350, 1950, 2000, 50, 45, 'success', '2024-05-16 00:00:00'),
(763, 9, 27, 'Burger', 4, 150, 600, 1950, 2000, 50, 45, 'success', '2024-05-16 00:00:00'),
(764, 10, 27, 'Burger', 1, 150, 150, 600, 1000, 400, 13, 'success', '2024-05-16 00:00:00'),
(765, 10, 28, 'Roasted Chicken', 1, 450, 450, 600, 1000, 400, 13, 'success', '2024-05-16 00:00:00'),
(766, 11, 28, 'Roasted Chicken', 3, 450, 1350, 1800, 2000, 200, 12, 'success', '2024-05-16 00:00:00'),
(767, 11, 27, 'Burger', 3, 150, 450, 1800, 2000, 200, 12, 'success', '2024-05-16 00:00:00'),
(768, 12, 28, 'Roasted Chicken', 2, 450, 900, 1200, 1500, 300, 12, 'success', '2024-05-16 00:00:00'),
(769, 12, 27, 'Burger', 2, 150, 300, 1200, 1500, 300, 12, 'success', '2024-05-16 00:00:00'),
(770, 13, 28, 'Roasted Chicken', 2, 450, 900, 1200, 1500, 300, 25, 'success', '2024-05-16 00:00:00'),
(771, 13, 27, 'Burger', 2, 150, 300, 1200, 1500, 300, 25, 'success', '2024-05-16 00:00:00'),
(772, 14, 28, 'Roasted Chicken', 3, 450, 1350, 1650, 2000, 350, 16, 'success', '2024-05-16 00:00:00'),
(773, 14, 27, 'Burger', 2, 150, 300, 1650, 2000, 350, 16, 'success', '2024-05-16 00:00:00'),
(774, 15, 28, 'Roasted Chicken', 2, 450, 900, 1350, 1500, 150, 12, 'success', '2024-05-16 00:00:00'),
(775, 15, 27, 'Burger', 1, 150, 150, 1350, 1500, 150, 12, 'success', '2024-05-16 00:00:00'),
(776, 15, 26, 'Pancit', 1, 300, 300, 1350, 1500, 150, 12, 'success', '2024-05-16 00:00:00'),
(777, 16, 28, 'Roasted Chicken', 1, 450, 450, 750, 1000, 250, 12, 'success', '2024-05-16 00:00:00'),
(778, 16, 27, 'Burger', 2, 150, 300, 750, 1000, 250, 12, 'success', '2024-05-16 00:00:00'),
(779, 17, 28, 'Roasted Chicken', 2, 450, 900, 1800, 2000, 200, 12, 'success', '2024-05-16 00:00:00'),
(780, 17, 27, 'Burger', 2, 150, 300, 1800, 2000, 200, 12, 'success', '2024-05-16 00:00:00'),
(781, 17, 26, 'Pancit', 2, 300, 600, 1800, 2000, 200, 12, 'success', '2024-05-16 00:00:00'),
(782, 18, 27, 'Burger', 4, 150, 600, 4350, 5000, 650, 12, 'success', '2024-05-16 00:00:00'),
(783, 18, 26, 'Pancit', 5, 300, 1500, 4350, 5000, 650, 12, 'success', '2024-05-16 00:00:00'),
(784, 18, 28, 'Roasted Chicken', 5, 450, 2250, 4350, 5000, 650, 12, 'success', '2024-05-16 00:00:00'),
(797, 19, 26, 'Pancit', 4, 300, 1200, 3100, 3500, 400, 16, 'success', '2024-05-16 00:00:00'),
(798, 19, 25, 'Pizza', 3, 250, 750, 3100, 3500, 400, 16, 'success', '2024-05-16 00:00:00'),
(799, 19, 27, 'Burger', 3, 150, 450, 3100, 3500, 400, 16, 'success', '2024-05-16 00:00:00'),
(800, 19, 28, 'Roasted Chicken', 1, 450, 450, 3100, 3500, 400, 16, 'success', '2024-05-16 00:00:00'),
(801, 19, 29, 'Ramen', 1, 250, 250, 3100, 3500, 400, 16, 'success', '2024-05-16 00:00:00'),
(802, 20, 26, 'Pancit', 1, 300, 300, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(803, 20, 25, 'Pizza', 1, 250, 250, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(804, 20, 29, 'Ramen', 1, 250, 250, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(805, 20, 27, 'Burger', 1, 150, 150, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(806, 20, 28, 'Roasted Chicken', 1, 450, 450, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(807, 21, 27, 'Burger', 1, 150, 150, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(808, 21, 26, 'Pancit', 1, 300, 300, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(809, 21, 29, 'Ramen', 1, 250, 250, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(810, 21, 25, 'Pizza', 1, 250, 250, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(811, 21, 28, 'Roasted Chicken', 1, 450, 450, 1400, 1500, 100, 16, 'success', '2024-05-16 00:00:00'),
(812, 22, 28, 'Roasted Chicken', 1, 450, 450, 1150, 1200, 50, 17, 'success', '2024-05-16 00:00:00'),
(813, 22, 27, 'Burger', 1, 150, 150, 1150, 1200, 50, 17, 'success', '2024-05-16 00:00:00'),
(814, 22, 26, 'Pancit', 1, 300, 300, 1150, 1200, 50, 17, 'success', '2024-05-16 00:00:00'),
(815, 22, 29, 'Ramen', 1, 250, 250, 1150, 1200, 50, 17, 'success', '2024-05-16 00:00:00'),
(816, 23, 25, 'Pizza', 1, 250, 250, 1700, 1800, 100, 12, 'success', '2024-05-16 00:00:00'),
(817, 23, 26, 'Pancit', 2, 300, 600, 1700, 1800, 100, 12, 'success', '2024-05-16 00:00:00'),
(818, 23, 29, 'Ramen', 1, 250, 250, 1700, 1800, 100, 12, 'success', '2024-05-16 00:00:00'),
(819, 23, 27, 'Burger', 1, 150, 150, 1700, 1800, 100, 12, 'success', '2024-05-16 00:00:00'),
(820, 23, 28, 'Roasted Chicken', 1, 450, 450, 1700, 1800, 100, 12, 'success', '2024-05-16 00:00:00'),
(821, 24, 25, 'Pizza', 2, 250, 500, 1950, 2000, 50, 16, 'success', '2024-05-16 00:00:00'),
(822, 24, 26, 'Pancit', 2, 300, 600, 1950, 2000, 50, 16, 'success', '2024-05-16 00:00:00'),
(823, 24, 27, 'Burger', 1, 150, 150, 1950, 2000, 50, 16, 'success', '2024-05-16 00:00:00'),
(824, 24, 29, 'Ramen', 1, 250, 250, 1950, 2000, 50, 16, 'success', '2024-05-16 00:00:00'),
(825, 24, 28, 'Roasted Chicken', 1, 450, 450, 1950, 2000, 50, 16, 'success', '2024-05-16 00:00:00'),
(826, 25, 25, 'Pizza', 1, 250, 250, 1200, 1500, 300, 15, 'success', '2024-05-16 00:00:00'),
(827, 25, 29, 'Ramen', 2, 250, 500, 1200, 1500, 300, 15, 'success', '2024-05-16 00:00:00'),
(828, 25, 27, 'Burger', 1, 150, 150, 1200, 1500, 300, 15, 'success', '2024-05-16 00:00:00'),
(829, 25, 26, 'Pancit', 1, 300, 300, 1200, 1500, 300, 15, 'success', '2024-05-16 00:00:00'),
(830, 26, 25, 'Pizza', 1, 250, 250, 1700, 1800, 100, 16, 'success', '2024-05-16 00:00:00'),
(831, 26, 28, 'Roasted Chicken', 1, 450, 450, 1700, 1800, 100, 16, 'success', '2024-05-16 00:00:00'),
(832, 26, 26, 'Pancit', 2, 300, 600, 1700, 1800, 100, 16, 'success', '2024-05-16 00:00:00'),
(833, 26, 27, 'Burger', 1, 150, 150, 1700, 1800, 100, 16, 'success', '2024-05-16 00:00:00'),
(834, 26, 29, 'Ramen', 1, 250, 250, 1700, 1800, 100, 16, 'success', '2024-05-16 00:00:00'),
(835, 27, 26, 'Pancit', 1, 300, 300, 1150, 1200, 50, 17, 'success', '2024-05-16 00:00:00'),
(836, 27, 28, 'Roasted Chicken', 1, 450, 450, 1150, 1200, 50, 17, 'success', '2024-05-16 00:00:00'),
(837, 27, 25, 'Pizza', 1, 250, 250, 1150, 1200, 50, 17, 'success', '2024-05-16 00:00:00'),
(854, 28, 26, 'Pancit', 6, 300, 1800, 6550, 7000, 450, 17, 'success', '2024-05-16 00:00:00'),
(855, 28, 25, 'Pizza', 4, 250, 1000, 6550, 7000, 450, 17, 'success', '2024-05-16 00:00:00'),
(856, 28, 28, 'Roasted Chicken', 3, 450, 1350, 6550, 7000, 450, 17, 'success', '2024-05-16 00:00:00'),
(857, 28, 27, 'Burger', 6, 150, 900, 6550, 7000, 450, 17, 'success', '2024-05-16 00:00:00'),
(858, 28, 29, 'Ramen', 6, 250, 1500, 6550, 7000, 450, 17, 'success', '2024-05-16 00:00:00'),
(859, 29, 25, 'Pizza', 3, 250, 750, 4500, 5000, 500, 16, 'success', '2024-05-16 00:00:00'),
(860, 29, 26, 'Pancit', 4, 300, 1200, 4500, 5000, 500, 16, 'success', '2024-05-16 00:00:00'),
(861, 29, 29, 'Ramen', 3, 250, 750, 4500, 5000, 500, 16, 'success', '2024-05-16 00:00:00'),
(862, 29, 28, 'Roasted Chicken', 3, 450, 1350, 4500, 5000, 500, 16, 'success', '2024-05-16 00:00:00'),
(863, 29, 27, 'Burger', 3, 150, 450, 4500, 5000, 500, 16, 'success', '2024-05-16 00:00:00'),
(864, 30, 27, 'Burger', 2, 150, 300, 1650, 1800, 150, 18, 'success', '2024-05-16 00:00:00'),
(865, 30, 26, 'Pancit', 2, 300, 600, 1650, 1800, 150, 18, 'success', '2024-05-16 00:00:00'),
(866, 30, 29, 'Ramen', 2, 250, 500, 1650, 1800, 150, 18, 'success', '2024-05-16 00:00:00'),
(867, 30, 25, 'Pizza', 1, 250, 250, 1650, 1800, 150, 18, 'success', '2024-05-16 00:00:00'),
(868, 31, 26, 'Pancit', 1, 300, 300, 950, 1000, 50, 16, 'success', '2024-05-16 00:00:00'),
(869, 31, 29, 'Ramen', 2, 250, 500, 950, 1000, 50, 16, 'success', '2024-05-16 00:00:00'),
(870, 31, 27, 'Burger', 1, 150, 150, 950, 1000, 50, 16, 'success', '2024-05-16 00:00:00'),
(871, 32, 25, 'Pizza', 1, 250, 250, 1400, 1500, 100, 19, 'success', '2024-05-16 00:00:00'),
(872, 32, 28, 'Roasted Chicken', 1, 450, 450, 1400, 1500, 100, 19, 'success', '2024-05-16 00:00:00'),
(873, 32, 29, 'Ramen', 1, 250, 250, 1400, 1500, 100, 19, 'success', '2024-05-16 00:00:00'),
(874, 32, 26, 'Pancit', 1, 300, 300, 1400, 1500, 100, 19, 'success', '2024-05-16 00:00:00'),
(875, 32, 27, 'Burger', 1, 150, 150, 1400, 1500, 100, 19, 'success', '2024-05-16 00:00:00'),
(876, 33, 29, 'Ramen', 1, 250, 250, 800, 1000, 200, 18, 'success', '2024-05-16 00:00:00'),
(877, 33, 26, 'Pancit', 1, 300, 300, 800, 1000, 200, 18, 'success', '2024-05-16 00:00:00'),
(878, 33, 25, 'Pizza', 1, 250, 250, 800, 1000, 200, 18, 'success', '2024-05-16 00:00:00'),
(879, 34, 25, 'Pizza', 1, 250, 250, 1400, 1500, 100, 18, 'success', '2024-05-16 00:00:00'),
(880, 34, 29, 'Ramen', 1, 250, 250, 1400, 1500, 100, 18, 'success', '2024-05-16 00:00:00'),
(881, 34, 26, 'Pancit', 1, 300, 300, 1400, 1500, 100, 18, 'success', '2024-05-16 00:00:00'),
(882, 34, 27, 'Burger', 1, 150, 150, 1400, 1500, 100, 18, 'success', '2024-05-16 00:00:00'),
(883, 34, 28, 'Roasted Chicken', 1, 450, 450, 1400, 1500, 100, 18, 'success', '2024-05-16 00:00:00'),
(884, 35, 25, 'Pizza', 2, 250, 500, 500, 600, 100, 34, 'success', '2024-05-16 00:00:00'),
(885, 36, 36, 'Fried Rice', 1, 150, 150, 450, 500, 50, 10, 'success', '2024-06-11 04:25:45'),
(886, 36, 37, 'Plain Rice', 1, 150, 150, 450, 500, 50, 10, 'success', '2024-06-11 04:25:45'),
(887, 36, 38, 'Brown Rice', 1, 150, 150, 450, 500, 50, 10, 'success', '2024-06-11 04:25:45'),
(888, 37, 45, 'Lambanog', 1, 62, 62, 296, 500, 204, 76, 'success', '2024-08-22 00:03:02'),
(889, 37, 50, 'Sweet Bread', 1, 234, 234, 296, 500, 204, 76, 'success', '2024-08-22 00:03:02'),
(890, 38, 36, 'Fried Rice', 1, 150, 150, 1173, 1200, 27, 23, 'success', '2024-09-09 06:26:35'),
(891, 38, 40, 'Roasted chiCKEN', 2, 450, 900, 1173, 1200, 27, 23, 'success', '2024-09-09 06:26:35'),
(892, 38, 43, 'Nestea', 1, 123, 123, 1173, 1200, 27, 23, 'success', '2024-09-09 06:26:35'),
(893, 39, 41, 'Salmon', 1, 250, 250, 1200, 1500, 300, 23, 'success', '2024-09-09 06:27:01'),
(894, 39, 40, 'Roasted chiCKEN', 1, 450, 450, 1200, 1500, 300, 23, 'success', '2024-09-09 06:27:01'),
(895, 39, 39, 'Steak', 1, 500, 500, 1200, 1500, 300, 23, 'success', '2024-09-09 06:27:01'),
(896, 40, 41, 'Salmon', 1, 250, 250, 439, 500, 61, 15, 'success', '2024-10-05 23:42:12'),
(897, 40, 55, 'Sizzling Pork Sisig', 1, 189, 189, 439, 500, 61, 15, 'success', '2024-10-05 23:42:12'),
(898, 41, 56, 'Relyenong Pusit', 1, 500, 500, 1100, 1500, 400, 13, 'success', '2024-10-05 23:47:57'),
(899, 41, 59, 'Pork Bagnet', 1, 300, 300, 1100, 1500, 400, 13, 'success', '2024-10-05 23:47:57'),
(900, 41, 60, 'Sinigang na Bangus', 1, 300, 300, 1100, 1500, 400, 13, 'success', '2024-10-05 23:47:57'),
(901, 42, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 17, 'success', '2024-10-05 23:53:37'),
(902, 42, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 17, 'success', '2024-10-05 23:53:37'),
(903, 43, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 16, 'success', '2024-10-05 23:55:02'),
(904, 43, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 16, 'success', '2024-10-05 23:55:02'),
(905, 44, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-05 23:56:38'),
(906, 44, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-05 23:56:38'),
(907, 45, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 17, 'success', '2024-10-06 00:01:00'),
(908, 45, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 17, 'success', '2024-10-06 00:01:00'),
(909, 46, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 13, 'success', '2024-10-06 00:01:25'),
(910, 46, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 13, 'success', '2024-10-06 00:01:25'),
(911, 47, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:02:23'),
(912, 47, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:02:23'),
(913, 48, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 2000, 1311, 18, 'success', '2024-10-06 00:02:43'),
(914, 48, 56, 'Relyenong Pusit', 1, 500, 500, 689, 2000, 1311, 18, 'success', '2024-10-06 00:02:43'),
(915, 49, 55, 'Sizzling Pork Sisig', 1, 189, 189, 989, 1000, 11, 14, 'success', '2024-10-06 00:03:12'),
(916, 49, 56, 'Relyenong Pusit', 1, 500, 500, 989, 1000, 11, 14, 'success', '2024-10-06 00:03:12'),
(917, 49, 59, 'Pork Bagnet', 1, 300, 300, 989, 1000, 11, 14, 'success', '2024-10-06 00:03:12'),
(918, 50, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:06:49'),
(919, 50, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:06:49'),
(920, 51, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:09:23'),
(921, 51, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:09:23'),
(922, 52, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:11:57'),
(923, 52, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:11:57'),
(924, 53, 55, 'Sizzling Pork Sisig', 1, 189, 189, 989, 1000, 11, 11, 'success', '2024-10-06 00:15:28'),
(925, 53, 56, 'Relyenong Pusit', 1, 500, 500, 989, 1000, 11, 11, 'success', '2024-10-06 00:15:28'),
(926, 53, 59, 'Pork Bagnet', 1, 300, 300, 989, 1000, 11, 11, 'success', '2024-10-06 00:15:28'),
(927, 54, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:16:28'),
(928, 54, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:16:28'),
(929, 55, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 16, 'success', '2024-10-06 00:17:55'),
(930, 55, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 16, 'success', '2024-10-06 00:17:55'),
(931, 56, 55, 'Sizzling Pork Sisig', 1, 189, 189, 1189, 1500, 311, 14, 'success', '2024-10-06 00:24:05'),
(932, 56, 56, 'Relyenong Pusit', 2, 500, 1000, 1189, 1500, 311, 14, 'success', '2024-10-06 00:24:05'),
(933, 57, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:25:51'),
(934, 57, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:25:51'),
(935, 58, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 13, 'success', '2024-10-06 00:26:28'),
(936, 58, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 13, 'success', '2024-10-06 00:26:28'),
(937, 59, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:32:40'),
(938, 59, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:32:40'),
(939, 60, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:34:59'),
(940, 60, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:34:59'),
(941, 61, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 16, 'success', '2024-10-06 00:37:31'),
(942, 61, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 16, 'success', '2024-10-06 00:37:31'),
(943, 62, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 11, 'success', '2024-10-06 00:39:54'),
(944, 62, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 11, 'success', '2024-10-06 00:39:54'),
(945, 63, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 13, 'success', '2024-10-06 00:41:58'),
(946, 63, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 13, 'success', '2024-10-06 00:41:58'),
(947, 64, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:43:44'),
(948, 64, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:43:44'),
(949, 65, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:45:53'),
(950, 65, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:45:53'),
(951, 66, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 16, 'success', '2024-10-06 00:50:46'),
(952, 66, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 16, 'success', '2024-10-06 00:50:46'),
(953, 67, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'success', '2024-10-06 00:52:25'),
(954, 67, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'success', '2024-10-06 00:52:25'),
(955, 68, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 15, 'success', '2024-10-06 01:02:39'),
(956, 68, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 15, 'success', '2024-10-06 01:02:39'),
(957, 69, 41, 'Salmon', 1, 250, 250, 939, 1000, 61, 16, 'success', '2024-10-06 01:05:04'),
(958, 69, 55, 'Sizzling Pork Sisig', 1, 189, 189, 939, 1000, 61, 16, 'success', '2024-10-06 01:05:04'),
(959, 69, 56, 'Relyenong Pusit', 1, 500, 500, 939, 1000, 61, 16, 'success', '2024-10-06 01:05:04'),
(960, 70, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 16, 'success', '2024-10-06 09:33:59'),
(961, 70, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 16, 'success', '2024-10-06 09:33:59'),
(962, 71, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 15, 'success', '2024-10-06 09:38:20'),
(963, 71, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 15, 'success', '2024-10-06 09:38:20'),
(964, 72, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 11, 'success', '2024-10-06 09:41:40'),
(965, 72, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 11, 'success', '2024-10-06 09:41:40'),
(970, 73, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 15, 'Success', '2024-10-06 09:49:22'),
(971, 73, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 15, 'Success', '2024-10-06 09:49:22'),
(972, 74, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 09:50:11'),
(973, 74, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 09:50:11'),
(976, 75, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 09:52:15'),
(977, 75, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 09:52:15'),
(978, 76, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 09:53:54'),
(979, 76, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 09:53:54'),
(980, 77, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 09:55:36'),
(981, 77, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 09:55:36'),
(982, 78, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 11, 'Success', '2024-10-06 21:04:10'),
(983, 78, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 11, 'Success', '2024-10-06 21:04:10'),
(984, 79, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 21:05:21'),
(985, 79, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 21:05:21'),
(986, 80, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 21:19:06'),
(987, 80, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 21:19:06'),
(988, 81, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 21:21:37'),
(989, 81, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 21:21:37'),
(990, 82, 55, 'Sizzling Pork Sisig', 1, 189, 189, 1189, 1500, 311, 11, 'Success', '2024-10-06 21:25:48'),
(991, 82, 56, 'Relyenong Pusit', 2, 500, 1000, 1189, 1500, 311, 11, 'Success', '2024-10-06 21:25:48'),
(992, 83, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 21:26:01'),
(993, 83, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 21:26:01'),
(994, 84, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 21:28:25'),
(995, 84, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 21:28:25'),
(996, 85, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 21:31:46'),
(997, 85, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 21:31:46'),
(998, 86, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 13, 'Success', '2024-10-06 21:32:10'),
(999, 86, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 13, 'Success', '2024-10-06 21:32:10'),
(1000, 87, 55, 'Sizzling Pork Sisig', 1, 189, 189, 1689, 2000, 311, 13, 'Success', '2024-10-06 21:40:05'),
(1001, 87, 56, 'Relyenong Pusit', 3, 500, 1500, 1689, 2000, 311, 13, 'Success', '2024-10-06 21:40:05'),
(1002, 88, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 21:43:05'),
(1003, 88, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 21:43:05'),
(1004, 89, 55, 'Sizzling Pork Sisig', 1, 189, 189, 689, 1000, 311, 14, 'Success', '2024-10-06 21:45:28'),
(1005, 89, 56, 'Relyenong Pusit', 1, 500, 500, 689, 1000, 311, 14, 'Success', '2024-10-06 21:45:28'),
(1006, 90, 55, 'Sizzling Pork Sisig', 1, 189, 189, 439, 1000, 561, 14, 'Success', '2024-10-06 21:47:35'),
(1007, 90, 41, 'Salmon', 1, 250, 250, 439, 1000, 561, 14, 'Success', '2024-10-06 21:47:35'),
(1008, 91, 41, 'Salmon', 1, 250, 250, 439, 1000, 561, 16, 'Success', '2024-10-06 21:49:03'),
(1009, 91, 55, 'Sizzling Pork Sisig', 1, 189, 189, 439, 1000, 561, 16, 'Success', '2024-10-06 21:49:03'),
(1010, 92, 56, 'Relyenong Pusit', 2, 500, 1000, 2389, 2500, 111, 14, 'Success', '2024-10-06 21:50:38'),
(1011, 92, 59, 'Pork Bagnet', 1, 300, 300, 2389, 2500, 111, 14, 'Success', '2024-10-06 21:50:38'),
(1012, 92, 55, 'Sizzling Pork Sisig', 1, 189, 189, 2389, 2500, 111, 14, 'Success', '2024-10-06 21:50:38'),
(1013, 92, 60, 'Sinigang na Bangus', 1, 300, 300, 2389, 2500, 111, 14, 'Success', '2024-10-06 21:50:38'),
(1014, 92, 58, 'Pork Sinigang', 2, 300, 600, 2389, 2500, 111, 14, 'Success', '2024-10-06 21:50:38'),
(1015, 93, 55, 'Sizzling Pork Sisig', 1, 189, 189, 789, 1000, 211, 17, 'Success', '2024-10-06 21:52:09'),
(1016, 93, 59, 'Pork Bagnet', 1, 300, 300, 789, 1000, 211, 17, 'Success', '2024-10-06 21:52:09'),
(1017, 93, 60, 'Sinigang na Bangus', 1, 300, 300, 789, 1000, 211, 17, 'Success', '2024-10-06 21:52:09'),
(1018, 94, 55, 'Sizzling Pork Sisig', 1, 189, 189, 2689, 3000, 311, 12, 'Success', '2024-10-06 21:55:51'),
(1019, 94, 41, 'Salmon', 1, 250, 250, 2689, 3000, 311, 12, 'Success', '2024-10-06 21:55:51'),
(1020, 94, 58, 'Pork Sinigang', 1, 300, 300, 2689, 3000, 311, 12, 'Success', '2024-10-06 21:55:51'),
(1021, 94, 57, 'Beef Bulalo', 1, 500, 500, 2689, 3000, 311, 12, 'Success', '2024-10-06 21:55:51'),
(1022, 94, 40, 'Roasted chiCKEN', 1, 450, 450, 2689, 3000, 311, 12, 'Success', '2024-10-06 21:55:51'),
(1023, 94, 56, 'Relyenong Pusit', 2, 500, 1000, 2689, 3000, 311, 12, 'Success', '2024-10-06 21:55:51'),
(1024, 95, 55, 'Sizzling Pork Sisig', 2, 189, 378, 878, 1000, 122, 17, 'Success', '2024-10-06 21:56:54'),
(1025, 95, 56, 'Relyenong Pusit', 1, 500, 500, 878, 1000, 122, 17, 'Success', '2024-10-06 21:56:54'),
(1026, 96, 59, 'Pork Bagnet', 1, 300, 300, 600, 1000, 400, 12, 'Success', '2024-10-06 21:57:36'),
(1027, 96, 60, 'Sinigang na Bangus', 1, 300, 300, 600, 1000, 400, 12, 'Success', '2024-10-06 21:57:36'),
(1028, 97, 55, 'Sizzling Pork Sisig', 1, 189, 189, 989, 1000, 11, 15, 'Success', '2024-10-06 21:58:55'),
(1029, 97, 58, 'Pork Sinigang', 1, 300, 300, 989, 1000, 11, 15, 'Success', '2024-10-06 21:58:55'),
(1030, 97, 56, 'Relyenong Pusit', 1, 500, 500, 989, 1000, 11, 15, 'Success', '2024-10-06 21:58:55'),
(1031, 98, 59, 'Pork Bagnet', 1, 300, 300, 1100, 1200, 100, 14, 'Success', '2024-10-06 22:00:52'),
(1032, 98, 58, 'Pork Sinigang', 1, 300, 300, 1100, 1200, 100, 14, 'Success', '2024-10-06 22:00:52'),
(1033, 98, 56, 'Relyenong Pusit', 1, 500, 500, 1100, 1200, 100, 14, 'Success', '2024-10-06 22:00:52'),
(1034, 99, 59, 'Pork Bagnet', 1, 300, 300, 600, 1000, 400, 12, 'Success', '2024-10-06 22:02:14'),
(1035, 99, 60, 'Sinigang na Bangus', 1, 300, 300, 600, 1000, 400, 12, 'Success', '2024-10-06 22:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `room_rates` int(11) NOT NULL,
  `services_rates` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms_tbl`
--

CREATE TABLE `rooms_tbl` (
  `id` int(11) NOT NULL,
  `room_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` text NOT NULL,
  `bed` text NOT NULL,
  `services` text NOT NULL,
  `description` text DEFAULT NULL,
  `status` text DEFAULT 'Vacant',
  `category` text NOT NULL,
  `image1` text DEFAULT NULL,
  `image2` text DEFAULT NULL,
  `image3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_tbl`
--

INSERT INTO `rooms_tbl` (`id`, `room_name`, `price`, `capacity`, `bed`, `services`, `description`, `status`, `category`, `image1`, `image2`, `image3`) VALUES
(145, 'Emerald', 2000, '2 Pax', '1 Bedroom', 'Free tour and Free Breakfast', 'Neat and Clean Room with awesome view outside', 'Vacant', 'Classic Room', 'room_img/room_image_970_1.jpg', 'room_img/room_image_830_2.jpg', 'room_img/room_image_490_image3.jpg'),
(146, 'Amethyst', 5000, '4 Pax', '2 Bedrooms', 'Free Breakfast for 4', 'Near the infinity pool with a nice view outside', 'Vacant', 'Classic Room', 'room_img/room_image_284_1.jpg', 'room_img/room_image_393_2.jpg', 'room_img/room_image_160_image3.jpg'),
(147, 'Sapphire', 3500, '2 Pax', '1 Bedroom', 'Free Breakfast for 2 , Free Tour', 'High Class Bed Rooms', 'Vacant', 'Premium Room', 'room_img/room_image_942_1.jpg', 'room_img/room_image_1288_2.jpg', 'room_img/room_image_1774_3.jpg'),
(148, 'Aquamarine', 4000, '3 Pax', '2 Bedrooms', 'Free Breakfast for 2 , Free Tour', 'Near the Pool Area', 'Vacant', 'Classic Room', 'room_img/room_image_1132_1.jpg', 'room_img/room_image_894_2.jpg', 'room_img/room_image_162_3.jpg'),
(149, 'Diamond', 5000, '5 Pax', '2 Bedrooms', 'Free Breakfast for 5 , Free Tour', 'Nice View and near the infinity pool', 'Vacant', 'Family Room', 'room_img/room_image_981_1.jpg', 'room_img/room_image_720_2.jpg', 'room_img/room_image_31_3.jpg'),
(150, 'Ruby', 4000, '3 Pax', '2 Bedrooms', 'Free Breakfast for 3 , Free Tour', 'Nice View and High Class Bedrooms', 'Vacant', 'Premium Room', 'room_img/room_image_65_1.jpg', 'room_img/room_image_426_2.jpg', 'room_img/room_image_1070_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_acc`
--

CREATE TABLE `users_acc` (
  `id` int(11) NOT NULL,
  `number` text NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_acc`
--

INSERT INTO `users_acc` (`id`, `number`, `fullname`, `email`, `password`, `image`) VALUES
(16, '09466409969', 'dulce datario', 'dulce@gmail.com', '27239c4b6b91cfe2788c8f2606b6997e', ''),
(61, '09566320135', 'admin', 'datarioarc@gmail.com', '909ba4ad2bda46b10aac3c5b7f01abd5', 'user_45065.jpg'),
(65, '09095533979', 'Emel jane', 'enajlememendezroblo10@gmail.com', '1c1bb60d19e27941ada7edcebfac96e4', 'user_6896.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods_tbl`
--
ALTER TABLE `foods_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_tbl`
--
ALTER TABLE `rooms_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_acc`
--
ALTER TABLE `users_acc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `foods_tbl`
--
ALTER TABLE `foods_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms_tbl`
--
ALTER TABLE `rooms_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `users_acc`
--
ALTER TABLE `users_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
