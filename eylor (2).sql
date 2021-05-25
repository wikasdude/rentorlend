-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 05:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eylor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `u_id`) VALUES
(3, 9, 18),
(4, 9, 18),
(5, 10, 18),
(6, 11, 18);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `FB_ID` int(11) NOT NULL,
  `FB_U_Name` text NOT NULL,
  `FB_U_Email` varchar(100) NOT NULL,
  `FB_U_Mobile` bigint(20) NOT NULL,
  `FB_Message` varchar(200) NOT NULL,
  `FB_Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`FB_ID`, `FB_U_Name`, `FB_U_Email`, `FB_U_Mobile`, `FB_Message`, `FB_Status`) VALUES
(1, ' Nitish Goswami', 'ni30.info@gmail.com', 9205816348, 'Hello This is first msg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `itemrequest`
--

CREATE TABLE `itemrequest` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `Item_Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemrequest`
--

INSERT INTO `itemrequest` (`id`, `u_id`, `item_name`, `no_of_days`, `Item_Description`) VALUES
(1, 17, 'djkka', 12, 'fsdf'),
(2, 17, 'Nitish', 0, ''),
(3, 18, 'Rich Dad Poor dad', 10, 'This is an urgent need.\n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_age` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `product_pic_1` varchar(100) NOT NULL,
  `product_pic_2` varchar(100) NOT NULL,
  `product_pic_3` varchar(100) NOT NULL,
  `product_bill` varchar(100) NOT NULL,
  `product_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat_id`, `user_id`, `product_name`, `product_age`, `product_price`, `product_description`, `product_pic_1`, `product_pic_2`, `product_pic_3`, `product_bill`, `product_status`) VALUES
(9, 2, 18, 'Nike 1500', '1', 100, 'Execellant Condition', 'Upload/771790shoes.jpeg', 'Upload/226329shoes 2.jpeg', 'Upload/552498shoes 3.jpeg', 'Upload/369546receipt-template 2.pdf', 'Avaliable'),
(10, 5, 19, 'Pulse meter', '1', 20, 'this is latest model and negligible used product', 'Upload/415786medical inst.jpg', 'Upload/104052medical inst 2.jpg', 'Upload/84407medical inst 3.jpg', 'Upload/506976receipt-template 3.pdf', 'Avaliable'),
(11, 4, 18, 'Table', '3', 50, 'Execellant Condition.its wide and comfortable', 'Upload/957804table furniture.jpeg', 'Upload/681699table furniture 2.jpeg', 'Upload/300864table furniture 3.jpeg', 'Upload/992054receipt-template 4.pdf', 'Avaliable'),
(12, 1, 17, 'Think and grop rick Book', '1', 10, ' One of the best book to dig dee within yourself. Once you finish this book, you will be able to con', 'Upload/408502book.jpeg', 'Upload/321020book 2.jpeg', 'Upload/301294book 3.jpeg', 'Upload/532984receipt-template 5.pdf', 'Avaliable');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'Books', 'Used to explore information by reading'),
(2, 'Shoes', 'Latest Trending Shoes'),
(3, 'Clothes', 'Trending Clothes\r\n'),
(4, 'Furniture', 'Trending Furniture'),
(5, 'Medical Instruments', 'Latest Updated medical instrument are avaliable here');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` text NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` text NOT NULL,
  `user_adress` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_profile_pic` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_email`, `user_phone`, `user_adress`, `user_password`, `user_profile_pic`, `user_proof`) VALUES
(17, 'Nitish Goswami', 'ni30.info@gmail.com', '9205816348', '474', '9876', 'Upload/15594nitish.jpg', 'Upload/341161nitish pan card.jpg'),
(18, 'Harish Khanger', 'mrkhanger05@gmail.com', '8950578584', 'hno:123,Near Palwal', '9876', 'Upload/800965img_20190623_121005.jpg', 'Upload/45994phonetics.png'),
(19, 'Ritesh Goswami', 'ritesh@gmail.com', '8130769876', 'hno 454,Jeevan nagar-2,Gaunchhi,Faridabad', '4321', 'Upload/143338nikhil-uttam-zbr_trihuh4-unsplash.jpg', 'Upload/5142931595321606055.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`FB_ID`);

--
-- Indexes for table `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat_id` (`product_cat_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `FB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itemrequest`
--
ALTER TABLE `itemrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD CONSTRAINT `itemrequest_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `product_categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
