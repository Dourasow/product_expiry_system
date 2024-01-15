-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 09:51 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) DEFAULT NULL,
  `STATUS` varchar(40) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`, `STATUS`) VALUES
(0, 'Keyboard', '0'),
(1, 'Mouse', '0'),
(2, 'Monitor', '0'),
(3, 'Motherboard', '0'),
(4, 'Processor', '0'),
(5, 'Power Supply', '0'),
(6, 'Headset', '0'),
(7, 'CPU', '0'),
(10, 'Milk', '1'),
(11, 'fg', '0'),
(12, 'Fish', '1'),
(13, 'gh', '1');

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `comp_id` int(10) NOT NULL,
  `comp_name` varchar(150) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `tag` varchar(500) NOT NULL,
  `report1` varchar(200) NOT NULL,
  `report2` varchar(200) NOT NULL,
  `report3` varchar(200) NOT NULL,
  `report4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`comp_id`, `comp_name`, `address`, `phone`, `email`, `website`, `city`, `state`, `tag`, `report1`, `report2`, `report3`, `report4`) VALUES
(1, 'Shoprite', 'Accra', ' ', 'info@shorite.com', ' ', 'Accra', 'Accra', '...redefine your business', 'test@gmail.com', 'test@gmail.com', 'test@gmail.com', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`, `EMAIL`, `STATUS`) VALUES
(9, 'Walk-in', 'Customer', 'nill', '', '1'),
(10, 'Fair Customer', 'Fair Customer', '4455', 'ff@gmail.com', '1'),
(11, 'Black Customer', 'Black Customer', '234', 'bb@gmail.com', '1'),
(12, 'dofu', 'dofu', '56', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `GENDER` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`, `STATUS`) VALUES
(1, 'Chidi', 'Rafael', 'Male', 'princelycesar23@gmail.com', '09124033805', 1, '2021-01-22', 113, '1'),
(2, 'Josuey', 'Mag-asos', 'Male', 'jmagaso@yahoo.com', '09091245761', 2, '2019-01-28', 156, '0'),
(4, 'Monica', 'Empinado', 'Female', 'monicapadernal@gmail.com', '09123357105', 1, '2019-03-06', 158, '1'),
(5, 'Grace', 'O', 'Female', 'dfg@gmail.com', '45555', 2, '2022-09-05', 159, '1'),
(6, 'Moni', 'drt', 'Male', 'dfg@gmail.com', '4555', 2, '2022-10-04', 160, '1'),
(7, 'test', 'tesr', 'Male', 'test@gmail.com', '875544', 2, '', 161, '1');

-- --------------------------------------------------------

--
-- Table structure for table `expense_tbl`
--

CREATE TABLE `expense_tbl` (
  `ex_id` int(10) NOT NULL,
  `account` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `exdesc` varchar(350) NOT NULL,
  `date` varchar(100) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_tbl`
--

INSERT INTO `expense_tbl` (`ex_id`, `account`, `amount`, `exdesc`, `date`, `employee`, `status`) VALUES
(2, 'Cash', '500', 'fg', '2021-09-01', 'admin', '1'),
(4, 'Cash', '2000', 'food', '2021-09-01', 'admin', '1'),
(5, 'Cash', '3000', 'Fuel', '2021-09-01', 'admin', '1'),
(6, 'Bank', '200', 'food', '2022-01-25', 'admin', '1'),
(7, 'Cash', '10000', 'Fuel', '2023-05-02', 'admin', '1'),
(8, 'Cash', '100', 'food', '2023-05-25', 'admin', '1'),
(9, 'Cash', '34', 'drr', '2023-06-01', '<br />\r\n<b>Notice</b>:  Undefined variable: usr in <b>C:\\xampp\\htdocs\\pos\\pages\\expenses.php</b> on ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `held_tbl`
--

CREATE TABLE `held_tbl` (
  `id` int(10) NOT NULL,
  `products` varchar(500) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `cost` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`) VALUES
(111, 'Negros Occidental', 'Bacolod City'),
(112, 'Negros Occidental', 'Bacolod City'),
(113, 'Uyo', 'Uyo'),
(114, 'Negros Occidental', 'Himamaylan'),
(115, 'Negros Oriental', 'Dumaguette City'),
(116, 'Negros Occidental', 'Isabella'),
(126, 'Negros Occidental', 'Binalbagan'),
(130, 'Cebu', 'Bogo City'),
(131, 'Negros Occidental', 'Himamaylan'),
(132, 'Negros', 'Jupiter'),
(133, 'Aincrad', 'Floor 91'),
(134, 'negros', 'binalbagan'),
(135, 'hehe', 'tehee'),
(136, 'PLANET YEKOK', 'KOKEY'),
(137, 'Camiguin', 'Catarman'),
(138, 'Camiguin', 'Catarman'),
(139, 'Negros Occidental', 'Binalbagan'),
(140, 'Batangas', 'Lemery'),
(141, 'Capiz', 'Panay'),
(142, 'Camarines Norte', 'Labo'),
(143, 'Camarines Norte', 'Labo'),
(144, 'Camarines Norte', 'Labo'),
(145, 'Camarines Norte', 'Labo'),
(146, 'Capiz', 'Pilar'),
(147, 'Negros Occidental', 'Moises Padilla'),
(148, 'a', 'a'),
(149, '1', '1'),
(150, 'Negros Occidental', 'Himamaylan'),
(151, 'Masbate', 'Mandaon'),
(152, 'Aklanas', 'Madalagsasa'),
(153, 'Batangas', 'Mabini'),
(154, 'Bataan', 'Morong'),
(155, 'Capiz', 'Pillar'),
(156, 'Negros Occidental', 'Bacolod'),
(157, 'Camarines Norte', 'Labo'),
(158, 'Negros Occidental', 'Binalbagan'),
(159, 'Benguet', 'Sablan'),
(160, '0', '0'),
(161, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`FIRST_NAME`, `LAST_NAME`, `LOCATION_ID`, `EMAIL`, `PHONE_NUMBER`) VALUES
('Prince Ly', 'Cesar', 113, 'PC@00', '09124033805'),
('Emman', 'Adventures', 116, 'emman@', '09123346576'),
('Bruce', 'Willis', 113, 'bruce@', NULL),
('Regine', 'Santos', 111, 'regine@', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `payments_tbl`
--

CREATE TABLE `payments_tbl` (
  `id` int(10) NOT NULL,
  `trans_id` varchar(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `cash` varchar(10) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `pos` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_tbl`
--

INSERT INTO `payments_tbl` (`id`, `trans_id`, `date`, `cash`, `bank`, `pos`, `name`) VALUES
(1, '1', '2023-05-23', '70', '', '', 'Asus ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(20) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `QTY_STOCK` varchar(50) DEFAULT NULL,
  `PRICE` varchar(50) DEFAULT NULL,
  `COST` varchar(5000) NOT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `SUPPLIER_ID` int(11) DEFAULT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL,
  `EXPIRY` varchar(50) NOT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT '1',
  `TRANS_D_ID` varchar(10) NOT NULL,
  `BAR_CODE` varchar(300) NOT NULL,
  `NATURE` varchar(500) NOT NULL,
  `tdate` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT '1',
  `operator` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_CODE`, `NAME`, `DESCRIPTION`, `QTY_STOCK`, `PRICE`, `COST`, `CATEGORY_ID`, `SUPPLIER_ID`, `DATE_STOCK_IN`, `EXPIRY`, `STATUS`, `TRANS_D_ID`, `BAR_CODE`, `NATURE`, `tdate`, `type`, `operator`) VALUES
(1, '31701', 'Pepsi Cola 60cl', '', '10', '0', '0', 7, 16, '', '2023-07-12', '1', '', '', 'Opening', '2023-07-06', '1', ''),
(2, '732', 'Coca Cola Zero Sugar', '', '20', '0', '0', 7, NULL, '', '2023-09-29', '1', '', '', 'Opening', '2023-07-06', '1', ''),
(3, '8570', 'Maltina 50cl', '', '50', '0', '0', 7, NULL, '', '', '1', '', '', 'Opening', '2023-07-06', '1', ''),
(4, '84', 'Fruit Juice 350', '', '50', '0', '0', 7, NULL, '', '', '1', '', '', 'Opening', '2023-07-06', '1', ''),
(5, '84', 'Fruit Juice 350', '', '', NULL, '', NULL, NULL, '', '2023-07-27', '1', '', '', 'Adjustment', '2023-07-06', '1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `p_id` int(10) NOT NULL,
  `pcode` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pdesc` varchar(300) NOT NULL,
  `price` varchar(50) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `cat` varchar(20) NOT NULL,
  `bcode` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT '1',
  `pqty` varchar(10) NOT NULL DEFAULT '0',
  `exp1` varchar(300) NOT NULL,
  `exp2` varchar(300) NOT NULL,
  `exp3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`p_id`, `pcode`, `name`, `pdesc`, `price`, `cost`, `cat`, `bcode`, `status`, `type`, `pqty`, `exp1`, `exp2`, `exp3`) VALUES
(1, '31701', 'Pepsi Cola 60cl', '', '0', '0', '7', '', '1', '1', '0', '2023-07-12', '', ''),
(2, '732', 'Coca Cola Zero Sugar', '', '0', '0', '7', '', '1', '1', '20', '2023-09-04', '', ''),
(3, '8570', 'Maltina 50cl', '', '0', '0', '7', '', '1', '1', '50', '', '', '2023-08-24'),
(4, '84', 'Fruit Juice 350', '', '0', '0', '7', '', '1', '1', '50', '2023-07-27', '', '2023-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `receipts_tbl`
--

CREATE TABLE `receipts_tbl` (
  `rec_id` int(10) NOT NULL,
  `trans_id` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `cash` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipts_tbl`
--

INSERT INTO `receipts_tbl` (`rec_id`, `trans_id`, `date`, `cash`, `bank`, `name`, `pos`) VALUES
(1, '1214100231', '2020-12-15', '10', '10', 'Ime Emmanuel', ''),
(2, '082701517', '2022-10-04', '', '5', 'Black Customer Black Customer', ''),
(3, '082735843', '2023-06-20', '6000', '', 'Black Customer Black Customer', ''),
(4, '061105036', '2023-06-20', '70', '', 'Walk-in Customer', ''),
(5, '0620233141', '2023-06-20', '3000', '', 'dofu dofu', ''),
(6, '0620233141', '2023-06-20', '5000', '', 'dofu dofu', ''),
(7, '0620233141', '2023-06-20', '0', '', 'dofu dofu', '1000'),
(8, '0621215716', '2023-06-21', '50', '', 'dofu dofu', ''),
(9, '0621215716', '2023-06-21', '0', '', 'dofu dofu', '50'),
(10, '0621215716', '2023-06-21', '0', '50', 'dofu dofu', ''),
(11, '0621221830', '2023-06-21', '100', '0', 'dofu dofu', '0'),
(12, '0621221830', '2023-06-21', '100', '0', 'dofu dofu', '300'),
(13, '0621221830', '2023-06-21', '0', '50', 'dofu dofu', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUPPLIER_ID`, `COMPANY_NAME`, `LOCATION_ID`, `PHONE_NUMBER`, `STATUS`) VALUES
(11, 'InGame Tech', 114, '09457488521', '1'),
(12, 'Asus', 115, '09635877412', '1'),
(13, 'Razer Co.', 111, '09587855685', '1'),
(15, 'Strategic Technology Co.', 116, '09124033805', '1'),
(16, 'A4tech', 155, '09775673257', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `COSTTO` varchar(100) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `BANK` varchar(200) NOT NULL DEFAULT '0',
  `POS` varchar(50) NOT NULL,
  `CREDIT` varchar(200) NOT NULL DEFAULT '0',
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT '1',
  `pcode` varchar(50) NOT NULL,
  `emp` varchar(10) NOT NULL,
  `ven_id` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT '1',
  `SO` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `COST` varchar(300) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT '1',
  `pcode` varchar(50) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `rem` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfers_tbl`
--

CREATE TABLE `transfers_tbl` (
  `id` int(10) NOT NULL,
  `froms` varchar(50) NOT NULL,
  `tos` varchar(50) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `tdate` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `descc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers_tbl`
--

INSERT INTO `transfers_tbl` (`id`, `froms`, `tos`, `amount`, `tdate`, `status`, `descc`) VALUES
(2, '1', '2', '1000', '2023-05-24', '1', 'Being Deposits'),
(3, '1', '1', '45', '2023-05-24', '0', 'ftyy'),
(4, '2', '1', '60000', '2023-05-24', '1', 'teller'),
(5, '2', '1', '648', '2023-05-24', '1', 'dfrt'),
(6, '1', '2', '47201', '2023-05-24', '1', 'reversal'),
(7, '2', '1', '1', '2023-05-24', '1', 'dert'),
(8, '1', '2', '940000', '2023-05-24', '1', 'send');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`) VALUES
(1, 1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(7, 2, 'test', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(9, 4, 'mncpdrnl', '8cb2237d0679ca88db6464eac60da96345513964', 2),
(10, 5, 'Grace', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(12, 6, 'Moni', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `company_tbl`
--
ALTER TABLE `company_tbl`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indexes for table `expense_tbl`
--
ALTER TABLE `expense_tbl`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `held_tbl`
--
ALTER TABLE `held_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `SUPPLIER_ID` (`SUPPLIER_ID`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `receipts_tbl`
--
ALTER TABLE `receipts_tbl`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`),
  ADD KEY `TRANS_DETAIL_ID` (`TRANS_D_ID`),
  ADD KEY `CUST_ID` (`CUST_ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`) USING BTREE;

--
-- Indexes for table `transfers_tbl`
--
ALTER TABLE `transfers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`),
  ADD KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `comp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expense_tbl`
--
ALTER TABLE `expense_tbl`
  MODIFY `ex_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `held_tbl`
--
ALTER TABLE `held_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `payments_tbl`
--
ALTER TABLE `payments_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipts_tbl`
--
ALTER TABLE `receipts_tbl`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers_tbl`
--
ALTER TABLE `transfers_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`JOB_ID`) REFERENCES `job` (`JOB_ID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
