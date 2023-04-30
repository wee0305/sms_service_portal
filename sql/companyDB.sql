-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 06:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_ic` varchar(14) NOT NULL,
  `cust_gender` varchar(1) NOT NULL,
  `cust_phone` varchar(13) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_pswd` varchar(16) NOT NULL,
  `comp_name` varchar(50) NOT NULL,
  `comp_phone` varchar(13) NOT NULL,
  `comp_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_ic`, `cust_gender`, `cust_phone`, `cust_email`, `cust_pswd`, `comp_name`, `comp_phone`, `comp_address`) VALUES
(1, 'Sulaiman Bin Ali', '881212-10-4121', 'M', '013-3524857', 'Sulaiman@supremetrade.com', 'sulaiman12345', 'Supreme Trade Enterprise', '03-34857968', 'B-12-01, Bangunan World Trading, Jalan Estate 5, Taman Orchid,45700 KL'),
(2, 'Tan Ying Ying', '001214-14-7412', 'F', '019-7548536', 'tyy@furioustrading.com', 'tyy12345', 'Furious Corp Trading (M) Sdn Bhd', '03-34464646', 'A-15-32, Wisma Ferox, Jalan Tun Razak 5, 42700 KL City Center, KL'),
(3, 'Khasina A/P Kumar', '950805-14-9266', 'F', '011-75482300', 'khasina@xerox.com', 'khasina12345', 'Xerox Printing Sdn Bhd', '03-35812043', 'No 52-53, Jalan Perniaga 9/5, Taman Melati 2, 43000 Kajang, Selangor'),
(4, 'Catherine Sim', '870104-14-6826', 'F', '012-7564821', 'catherine@prestigehouse.com', 'catherine12345', 'Prestige House Sdn Bhd ', '03-34868951', 'C-08-126, G Tower, Jalan Kuching 48, Taman Sentosa, 54630 Titiwangsa, KL'),
(5, 'Lim Hui Hui', '930404-10-4188', 'F', '011-75864965', 'limhh@webx.com', 'lhh12345', 'Web X Consulting Pte Ltd', '03-63585452', '05-10, Wisma Lexis, Jalan Pahang 3, Taman Setia, 43600 KL City, KL'),
(6, 'Brandon Wang Wei Jun', '961205-14-7541', 'M', '017-75489638', 'bwang@skynet.com', 'bwwj12345', 'Skynet Sdn Bhd', '03-83653547', 'B-852-01, Sky Trading Tower, 56350 KL City, KL');

-- --------------------------------------------------------

--
-- Table structure for table `msg_trans`
--

CREATE TABLE `msg_trans` (
  `trans_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `sender_phone` varchar(14) NOT NULL,
  `receipient_phone` varchar(14) NOT NULL,
  `msg_content` varchar(200) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg_trans`
--

INSERT INTO `msg_trans` (`trans_id`, `created_date`, `created_time`, `sender_phone`, `receipient_phone`, `msg_content`, `cust_id`) VALUES
(1, '2023-04-30', '12:23:27', '013-3524857', '019-73468519', 'Don&#039;t let the rain ruin your day! Shop our rain gear sale and stay dry.', 1),
(2, '2023-04-30', '12:23:49', '013-3524857', '011-86495324', 'Get fit for less with our fitness sale! Save up to 30% off select items.', 1),
(3, '2023-04-30', '12:24:35', '019-7548536', '017-8564944', 'Treat your skin to luxury with our beauty products. Use code GLOW20 for 20% off.', 2),
(4, '2023-04-30', '12:25:07', '019-7548536', '016-78495368', 'Need a last-minute gift? Shop our gift cards and give the gift of choice.', 2),
(5, '2023-04-30', '12:27:01', '011-75482300', '011-74854628', 'Spring into savings with our latest sale! Enjoy up to 50% off select items.', 3),
(6, '2023-04-30', '12:27:26', '011-75482300', '019-78546228', 'Don&#039;t miss out on our exclusive deals! Sign up for our newsletter and save.', 3),
(7, '2023-04-30', '12:28:47', '012-7564821', '012-8457632', 'Treat your skin to luxury with our beauty products. Use code GLOW20 for 20% off.', 4),
(8, '2023-04-30', '12:29:25', '012-7564821', '016-74152368', 'Treat your furry friend to something special today! Use code SKINLOVE for 15% off skin care products.', 4),
(9, '2023-04-30', '12:30:57', '011-75864965', '012-73846158', 'Need help growing your business? Our consulting services can help. Schedule a free consultation today!', 5),
(10, '2023-04-30', '12:31:18', '011-75864965', '017-7845155', 'Want to optimize your digital marketing strategy? Let our experts help you. Get 20% off your first consultation.', 5),
(11, '2023-04-30', '12:32:29', '017-75489638', '016-78641528', 'Upgrade your tech game! Save up to 30% off on our latest IT products.', 6),
(12, '2023-04-30', '12:32:52', '017-75489638', '011-84376158', 'Don&#039;t let slow internet speeds hold you back. Upgrade your router today!', 6);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `stf_id` varchar(11) NOT NULL,
  `stf_name` varchar(50) NOT NULL,
  `stf_ic` varchar(14) NOT NULL,
  `stf_gender` varchar(1) NOT NULL,
  `stf_phone` varchar(13) NOT NULL,
  `stf_email` varchar(50) NOT NULL,
  `stf_position` varchar(30) NOT NULL,
  `stf_address` varchar(100) NOT NULL,
  `stf_pswd` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`stf_id`, `stf_name`, `stf_ic`, `stf_gender`, `stf_phone`, `stf_email`, `stf_position`, `stf_address`, `stf_pswd`) VALUES
('AD001', 'Max Low Jia Ee', '010514-14-8321', 'M', '016-75421583', 'maxlow@360Interactive.com', 'Software Engineer', 'C-23-05, Sky Residences, Taman Setapak, 53300 Setapak, KL', 'admin12345'),
('AD002', 'Chew Zhi Yan', '990817-14-6358', 'F', '013-78673443', 'czy@360Interactive.com', 'Software Engineer', 'C-23-05, Sky Residences, Taman Setapak, 53300 Setapak, KL', 'admin12345'),
('AD003', 'Serena Lee Yi Wen', '950306-14-3478', 'F', '016-85432618', 'serenalyw@360Interactive.com', 'Software Engineer', 'C-23-05, Sky Residences, Taman Setapak, 53300 Setapak, KL', 'admin12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `msg_trans`
--
ALTER TABLE `msg_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `msg_trans`
--
ALTER TABLE `msg_trans`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msg_trans`
--
ALTER TABLE `msg_trans`
  ADD CONSTRAINT `cust_id` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
