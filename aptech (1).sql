-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 08:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptech`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_show` ()   BEGIN
    SELECT * FROM emp;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Category_name` varchar(255) NOT NULL,
  `Category_description` varchar(255) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Category_name`, `Category_description`, `Image`) VALUES
(2, 'watch', 'royal', 'watch.jpg'),
(4, 'laptop', 'hp', 'hplaptop.jpg'),
(5, 'mobile', 'Iphone', 'iphoneimage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `email` varchar(10) DEFAULT NULL,
  `PASSWORD` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `City` varchar(25) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `name`, `email`, `PASSWORD`, `gender`, `City`, `Age`) VALUES
(1, 'saim', '123@gmqil.', 'bwkslwsjxn', 'male', 'karachi', 20),
(2, 'alina', 'gweji@gmai', '19w8276', 'female', 'lahore', 25),
(3, 'aisha', 'bsk@gmail.', '8weqytfs', 'female', 'islamabad', 30),
(4, 'moiz', 'qjwdwg@gma', '23987rty6f', 'male', 'karachi', 32),
(5, 'fatima', '2123@gmail', 'iksajxhcgd', 'female', 'karachi', 23),
(6, 'rahim', '54367@gmai', 'zusbnbxd', 'male', 'lahore', 28),
(7, 'tahir', '`123@gmail', 'jsjzvxcv', 'male', 'peshawar', 28),
(8, 'haris', '123@gmqil.', NULL, 'male', 'peshawar', 30);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `name`, `quantity`, `price`, `image`, `cat_id`) VALUES
(2, 'Iphone12promax', 23, 40000, 'iphoneimage.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `Id` int(11) NOT NULL,
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`Id`, `First_name`, `Last_name`, `email`, `password`) VALUES
(1, 'ahmed', 'raza', '123@gmail.com', '12345'),
(2, 'muhammad', 'saad', '345@gmail.com', '67890'),
(3, 'moiz', 'Arsalan', '234@gmail.com', '12345'),
(4, 'moiz', 'mujeeb', 'moiz@gmail.com', '3456789'),
(5, 'moiz', 'mujeeb', 'moiz@gmail.com', '3456789'),
(6, 'tahir', 'Arsalan', 'tag@gmail.com', '4567890'),
(7, 'tahir', 'Arsalan', 'tag@gmail.com', '4567890'),
(9, 'amna', 'raza', 'a@gmail.com', '34567');

-- --------------------------------------------------------

--
-- Stand-in structure for view `showdata`
-- (See below for the actual view)
--
CREATE TABLE `showdata` (
`id` int(11)
,`name` varchar(10)
,`email` varchar(10)
,`PASSWORD` varchar(10)
,`gender` varchar(10)
,`City` varchar(25)
,`Age` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `showdata`
--
DROP TABLE IF EXISTS `showdata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `showdata`  AS SELECT `emp`.`id` AS `id`, `emp`.`name` AS `name`, `emp`.`email` AS `email`, `emp`.`PASSWORD` AS `PASSWORD`, `emp`.`gender` AS `gender`, `emp`.`City` AS `City`, `emp`.`Age` AS `Age` FROM `emp` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
