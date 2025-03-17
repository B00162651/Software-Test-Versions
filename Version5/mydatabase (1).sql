-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 10:24 AM
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
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `OrderID` int(45) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order history`
--

CREATE TABLE `order history` (
  `OrderID` int(45) NOT NULL,
  `Date` date NOT NULL,
  `Total` double NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `tags` tinytext NOT NULL,
  `Rating` int(10) NOT NULL,
  `imagePath` varchar(50) NOT NULL,
  `link` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `Name`, `Description`, `Price`, `Quantity`, `tags`, `Rating`, `imagePath`, `link`) VALUES
(1, 'Air Force 1', 'Very nice!!', 200, 1, 'Trainers', 2, 'images/AFS.png', 'Airforce.php'),
(2, 'Addidas', 'SPORTY!', 300, 1, 'Trainers', 4, 'images/addidas.jpg', 'Yeezy.php'),
(3, 'Asics', 'Great for a run!!', 500, 1, 'Runners', 7, 'images/asics.jpg', 'Asics.php'),
(4, 'Batman Crocs', 'I AM Batman!!', 1000, 1, 'Special', 10, 'images/batman.jpg', 'Crocs.php'),
(5, 'New Balance', 'Great for a Jog!!', 100, 1, 'Runners ', 9, 'images/NB.jpg', 'NB.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `FK_Order` (`OrderID`);

--
-- Indexes for table `order history`
--
ALTER TABLE `order history`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK_Product` (`productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK_Order` FOREIGN KEY (`OrderID`) REFERENCES `order history` (`OrderID`);

--
-- Constraints for table `order history`
--
ALTER TABLE `order history`
  ADD CONSTRAINT `FK_Product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
