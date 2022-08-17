-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 10:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_user_name` varchar(100) NOT NULL,
  `customer_DOB` date NOT NULL,
  `current_password` mediumtext NOT NULL,
  `customer_bg` varchar(100) NOT NULL,
  `customer_gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_user_name`, `customer_DOB`, `current_password`, `customer_bg`, `customer_gender`) VALUES
(1, 'Israfil Digant', 'israfilDiganta123@gmail.com', '01681590321', 'Diganta', '1998-11-24', 'Diganta#', 'AB+', 'male'),
(2, 'Rawaha Anik', 'rawaha123@gmail.com', '0156482015', 'Rawaha', '1998-09-15', 'Diganta#', 'B+', 'male'),
(3, 'amdbasdsm hhh', 'abduh@gmail.com', '01564820152020', 'Diganta123', '1998-11-24', 'Diganta#', 'AB+', 'male'),
(4, 'Naznin Nahar', 'naznin@gmail.com', '01681590321', 'Sristy', '1998-11-03', 'Diganta#', 'B+', 'female'),
(5, 'mr stak', 'sta@gamil.com', '01681590321', 'stak', '1998-12-12', 'Diganta#', 'AB+', 'male'),
(6, 'sakib hasan', 'sakib@gamil.com', '01681590321', 'sakib', '1998-11-11', 'Diganta#', 'AB+', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_name` varchar(200) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `about` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_name`, `product_cost`, `about`, `company_name`, `product_id`) VALUES
('laptop', 300000, 'xyz', 'HP', 1),
('laptop', 24000, 'abc', 'Dell', 3),
('laptop', 24000, 'abc', 'HP', 4),
('monitor', 24000, 'abc', 'Dell', 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `customer_id` int(11) NOT NULL,
  `comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`customer_id`, `comments`) VALUES
(1, '            \r\n            asdas'),
(1, 'dsadasda'),
(1, 'sadasdad');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` varchar(200) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `product_cost` varchar(11) NOT NULL,
  `total_cost` varchar(11) NOT NULL,
  `time` date NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `product_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`customer_name`, `customer_phone`, `customer_address`, `quantity`, `product_cost`, `total_cost`, `time`, `customer_id`, `product_name`) VALUES
('Israfil Diganta', '01681590321', 'asdasd', '20', '300000', '6000000', '2008-08-22', '1', 'laptop'),
('Israfil Diganta', '01681590321', 'asdasd', '5', '300000', '1500000', '2008-08-22', '1', 'laptop'),
('Israfil Diganta', '01681590321', 'asdasd', '5', '300000', '1500000', '2008-08-22', '1', 'laptop'),
('Israfil Diganta', '0125', 'jnnj', '4', '300000', '1200000', '2008-08-22', '1', 'laptop');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
