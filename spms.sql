-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 07:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(12) NOT NULL,
  `admin_pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`) VALUES
('ad123', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(30) NOT NULL,
  `customer_name` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `password`) VALUES
('', '', 'Sb@270702'),
('12', 'sanj', '343'),
('34', 'yoyo', '2433'),
('343', 'octaneboy', '12345'),
('56', 'uu', '111'),
('aa@1', 'murali', 'Mb@270702'),
('d@gmail.c', 'scem2', 'Sb@270702'),
('karthik@gmail.com', 'karthik', 'Kb@270836'),
('ma123', 'uiyi', '123'),
('shanesh@123', 'marla', 'Mb@090909'),
('yes@123', 'yoyo', 'Sb@270703'),
('yoyo@123', 'ssss', '123');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(10) NOT NULL,
  `dept_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('d1', 'plumber'),
('d2', 'electrician'),
('d3', 'painter'),
('d4', 'carpenter'),
('d5', 'gadget_repair');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `sp_id` varchar(20) NOT NULL,
  `service_id` varchar(10) NOT NULL,
  `servicing_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`sp_id`, `service_id`, `servicing_date`) VALUES
('sp1', 'Plumber', '2023-01-11'),
('sp2', 'electrcian', '2022-12-08'),
('sp2', 'Painter', '2023-01-05'),
('sp5', 'Painter', '2023-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `customer_id` varchar(10) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `phone_num` int(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`customer_id`, `service_id`, `phone_num`, `address`, `date`) VALUES
('12', 'Painter', 1234567890, ' kjkj', 'Approved'),
('yes@123', 'electrcian', 1234567890, ' cgchg', '2023-01-28');

--
-- Triggers `request`
--
DELIMITER $$
CREATE TRIGGER `phone_check` BEFORE INSERT ON `request` FOR EACH ROW BEGIN
     IF LENGTH(NEW.phone_num) != 10 THEN
        SET NEW.phone_num = NULL;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid phone number: phone number must be 10 digits';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` varchar(20) NOT NULL,
  `problem` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `problem`) VALUES
('electrcian', 'any faults in electrical appliences like fuse burn etc'),
('gadget_repair', 'any household gadgets like wahing machine,phone faults tc'),
('Painter', 'It includes painting your house walls,wood etc'),
('Plumber', 'Any plumber works'),
('purohita', 'ganahoma');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `sp_id` varchar(10) NOT NULL,
  `sp_name` varchar(10) NOT NULL,
  `sp_phone` int(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`sp_id`, `sp_name`, `sp_phone`, `dept_id`) VALUES
('sp1', 'lokesh', 25677384, 'd1'),
('sp2', 'chethan', 789098765, 'd3'),
('sp3', 'manvith', 987678654, 'd1'),
('sp4', 'sahil', 987678650, 'd2'),
('sp5', 'mukesh', 987656457, 'd4'),
('sp6', 'deepak', 987656456, 'd1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`sp_id`,`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`customer_id`,`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`sp_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `provider_ibfk_2` FOREIGN KEY (`sp_id`) REFERENCES `service_provider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD CONSTRAINT `service_provider_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
