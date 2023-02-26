-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220521.3d3010916e
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2022 at 10:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrogrove`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `b_email` varchar(255) NOT NULL,
  `b_image` varchar(255) DEFAULT NULL,
  `mobile_no` char(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`first_name`, `last_name`, `b_email`, `b_image`, `mobile_no`, `Address`, `password`) VALUES
('Xavi', 'Alonso', 'xavi@gmail.com', NULL, '01612440679', 'Dhaka', 'c20ad4d76fe97759aa27a0c99bff6710');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `f_email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `mobile_no` char(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `f_image` varchar(255) DEFAULT NULL,
  `problem` varchar(2000) DEFAULT NULL,
  `solved` varchar(2000) NOT NULL,
  `solvedstatus` int(1) NOT NULL DEFAULT 0,
  `ins_email` varchar(255) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  `totalsold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_email`, `first_name`, `last_name`, `Address`, `mobile_no`, `password`, `f_image`, `problem`, `solved`, `solvedstatus`, `ins_email`, `p_id`, `totalsold`) VALUES
('Alf@gmail.com', 'Alfred', 'Harris', 'Sirajganj', '01155564956', '97f974881b3726d9a77014b5f3b4d795', NULL, 'Give me some advice, How can i improve my work?', '', 1, NULL, 2, 0),
('Annis@gmail.com', 'Ann', 'Simpson', 'Sirajganj', '01155517448', '97f974881b3726d9a77014b5f3b4d795', NULL, NULL, '', 0, NULL, 3, 0),
('Danolia@gmail.com', 'Dana', 'Hansen', 'Sirajganj', '01855549434', '97f974881b3726d9a77014b5f3b4d795', NULL, NULL, '', 0, NULL, 5, 0),
('Elois@gmail.com', 'Eloise', 'Hampton', 'Sirajganj', '01854444274', '97f974881b3726d9a77014b5f3b4d795', NULL, NULL, '', 0, NULL, 7, 0),
('ford@gmail.com', 'Clifford', 'Patton', 'Sirajganj', '01755503259', '97f974881b3726d9a77014b5f3b4d795', NULL, NULL, '', 0, NULL, 4, 0),
('ic@gmail.com', 'Eric', 'Warner', 'Sirajganj', '01155536481', '97f974881b3726d9a77014b5f3b4d795', NULL, 'Give me the types of insecticides?', '', 1, NULL, 8, 0),
('rin@gmail.com', 'Darin', 'Saunders', 'Sirajganj', '01155531116', '97f974881b3726d9a77014b5f3b4d795', NULL, NULL, '', 0, NULL, 6, 0),
('rokib16x@gmail.com', 'Rokibul', 'Hasan', 'Sirajganj', '01631898367', 'c20ad4d76fe97759aa27a0c99bff6710', NULL, 'insecticides name', 'altitude', 0, NULL, 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile_no` char(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ins_image` varchar(255) DEFAULT NULL,
  `ins_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`first_name`, `last_name`, `mobile_no`, `Address`, `password`, `ins_image`, `ins_email`) VALUES
('Abdur', 'Rahim', '01955547222', 'Dinajpur', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Abdur@gmail.com'),
('Ashek', 'Parvez', '01700715343', 'Brahmanbaria', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'ashek@gmail.com'),
('Abu Zubair', 'Hossain Bablu', '01155556358', 'Rangpur', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Bablu@gmail.com'),
('Kamala Ranjan', 'Das', '01155564565', 'Khulna', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Das@gmail.com'),
('Fayez', 'Ahmed', '01155595092', 'Sylhet', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Fayez@gmail.com'),
('Jamal Uddin', 'Ahammed', '01511898391', 'Comilla', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'jamal@gmail.com'),
('Hasanuzzaman', 'Kallol', '01555537906', 'Tangail', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Kallol@gmail.com'),
('Masihur', 'Rahman', '01955550325', 'Natore', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Masihur@gmail.com'),
('Meherunnesa', 'Begum', '01155580926', 'Rajshahi', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Meherunnesa@gmail.com'),
('Moazzem', 'Hossain', '01831633511', 'Chittagong', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Moazzem@gmail.com'),
('Nafisa', 'Arefin', '01155567584', 'Bagerhat', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Nafisa@gmail.com'),
('Abdur', 'Rauf', '01155588403', 'Mymensingh', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Rauf@gmail.com'),
('Abdur', 'Razzak', '01612440679', 'Dhaka', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Razzak@gmail.com'),
('Rezaul', 'Karim', '01155576439', 'Kushtia', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Rezaul@gmail.com'),
('Ruhul Amin', 'Talukder', '01700712143', 'Noakhali', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'ruhulamin@gmail.com'),
('Saiful', 'Islam', '01955556920', 'Sherpur', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'saifulislam@gmail.com'),
('Abdullah', 'Sajjad', '01855574921', 'Jessore', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Sajjad@gmail.com'),
('Humaira', 'Sultana', '01155541521', 'Sirajganj', '875bb64d3804474e4525824fb4e17110', NULL, 'Sultana@gmail.com'),
('Tajik Khatun', 'Khatun', '01155590740', 'Bhola', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Tajik@gmail.com'),
('Tamiz Uddin', 'Khan', '01700715342', 'Barisal', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'tamiz@gmail.com'),
('Tanmoy', 'Das', '01155550957', 'Bogra', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'Tanmoy@gmail.com'),
('Wahida', 'Akter', '01700715345', 'Narayanganj', 'cdf1e220d89c2dcd2e000c3d105bf93e', NULL, 'wahida@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  `Price` float DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `p_id`, `Price`, `product_image`, `Quantity`) VALUES
(6, 'Apple', 1, 15, NULL, 15),
(7, 'Lichi', 1, 10, NULL, 20),
(8, 'Mango', 1, 10, NULL, 200);

-- --------------------------------------------------------

--
-- Table structure for table `storebuyinformation`
--

CREATE TABLE `storebuyinformation` (
  `f_name` varchar(255) NOT NULL,
  `f_mobile` char(11) NOT NULL,
  `f_address` varchar(255) NOT NULL,
  `f_product` varchar(255) NOT NULL,
  `f_quantity` int(11) NOT NULL,
  `f_price` double NOT NULL,
  `b_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storebuyinformation`
--

INSERT INTO `storebuyinformation` (`f_name`, `f_mobile`, `f_address`, `f_product`, `f_quantity`, `f_price`, `b_email`) VALUES
('Rokibul Hasan', '01631898367', 'Sirajganj', 'Banana', 20, 5, 'xavi@gmail.com'),
('Rokibul Hasan', '01631898367', 'Sirajganj', 'Banana', 10, 5, 'xavi@gmail.com'),
('Rokibul Hasan', '01631898367', 'Sirajganj', 'JackFruit', 5, 50, 'xavi@gmail.com'),
('Rokibul Hasan', '01631898367', 'Sirajganj', 'Mango', 100, 10, 'xavi@gmail.com'),
('Rokibul Hasan', '01631898367', 'Sirajganj', 'Rice', 100, 5, 'Dana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `w_email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile_no` char(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `w_image` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `minsalary` float DEFAULT NULL,
  `f_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`w_email`, `first_name`, `last_name`, `mobile_no`, `Address`, `password`, `w_image`, `status`, `minsalary`, `f_email`) VALUES
('Alfred@gmail.com', 'Alfred', 'Harris', '01155564956', 'Rajshahi', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Ann@gmail.com', 'Ann', 'Simpson', '01155517448', 'Tangail', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Clifford@gmail.com', 'Clifford', 'Patton', '01755503259', 'Sirajganj', 'b61822e8357dcaff77eaaccf348d9134', NULL, 1, 500, 'rokib16x@gmail.com'),
('Dana@gmail.com', 'Dana', 'Hansen', '01855549434', 'Sirajganj', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Darin@gmail.com', 'Darin', 'Saunders', '01155531116', 'Sylet', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Eloise@gmail.com', 'Eloise', 'Hampton', '01854444274', 'Rangpur', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Eric@gmail.com', 'Eric', 'Warner', '01155536481', 'Rajshahi', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Faith@gmail.com', 'Faith', 'Sanchez', '01155567719', 'Cumilla', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('George@gmail.com', 'George', 'Gonzalez', '01155534230', 'Dhaka', 'b61822e8357dcaff77eaaccf348d9134', NULL, 1, 500, 'mushi@gmail.com'),
('Irving@gmail.com', 'Irving', 'Nunez', '01858644274', 'Pabna', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Justin@gmail.com', 'Justin', 'Peters', '01555585423', 'Cumilla', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Kenny@gmail.com', 'Kenny', 'Mason', '01855554274', 'Dhaka', 'b61822e8357dcaff77eaaccf348d9134', NULL, 1, 500, 'mushi@gmail.com'),
('Kim@gmail.com', 'Kim', 'Roberson', '01855554274', 'Bogra', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Maurice@gmail.com', 'Maurice', 'Obrien', '01955580430', 'Rangpur', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Rickey@gmail.com', 'Rickey', 'Lindsey', '01155586046', 'Barishal', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Roland@gmail.com', 'Roland', 'Fernandez', '01155577227', 'Barishal', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Rufus@gmail.com', 'Rufus', 'Burns', '01155568241', 'Cumilla', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Shelia@gmail.com', 'Shelia', 'Young', '01755554019', 'Rangamati', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Sue@gmail.com', 'Sue', 'Gibson', '01155591576', 'Dhaka', 'b61822e8357dcaff77eaaccf348d9134', NULL, 1, 500, 'mushi@gmail.com'),
('Tabitha@gmail.com', 'Tabitha', 'Horton', '01155536481', 'Bogra', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('tomiz@gmail.com', 'Tomiz', 'Uddin', '01612440119', 'Sirajganj', 'c20ad4d76fe97759aa27a0c99bff6710', NULL, 1, 500, 'rokib16x@gmail.com'),
('Tyrone@gmail.com', 'Tyrone', 'Frazier', '01955599769', 'Chadpur', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL),
('Wendell@gmail.com', 'Wendell', 'Douglas', '01155580355', 'Faridpur', 'b61822e8357dcaff77eaaccf348d9134', NULL, 0, 500, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`b_email`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`f_email`),
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD KEY `ins_email` (`ins_email`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ins_email`),
  ADD UNIQUE KEY `Address` (`Address`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`w_email`),
  ADD KEY `f_email` (`f_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmer`
--
ALTER TABLE `farmer`
  ADD CONSTRAINT `farmer_ibfk_1` FOREIGN KEY (`ins_email`) REFERENCES `instructor` (`ins_email`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `farmer` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



