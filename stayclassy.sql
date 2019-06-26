-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2018 at 03:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stayclassy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `name`, `phone`, `email`, `password`) VALUES
(1, 'admin', 'jalal uddin', '01924241969', 'jalaluddin_csse14@yahoo.com', 'eyJpdiI6IisrRmw4aEpKak9xcVpKbVBTdnNDdVE9PSIsInZhbHVlIjoiTElLVURTb1wvZWNpOEt0enhMU29xTGc9PSIsIm1hYyI6IjNlODUzYzA3OGU2NDA5ZjEzYjQxZmQyNzkyMjI4YjJjM2ZkNjU0MDY4MjBlOGNiMzRkNjI1OTY4MGE2YzVjODAifQ==');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(2, 'Duffel'),
(3, 'Office'),
(5, 'Other bags'),
(4, 'Regular'),
(1, 'Traveling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `quality` text,
  `return_policy` text,
  `shipping` text,
  `service` text,
  `contact` text,
  `policy` text,
  `about` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `quality`, `return_policy`, `shipping`, `service`, `contact`, `policy`, `about`) VALUES
(1, '{"heading":"THis is Quality head","title":"Quality title goes here, you can use maximum 50","description":null}', '{"heading":"Return Heading","title":"Return title","description":"Return ashoshgoasgf\\r\\naighaohig\\r\\nasdijgasdjgaf"}', '{"heading":"shipping","title":"Confortable home delivery in Dhaka.","description":"Advance paying for\\r\\nshipping charges are applicable\\r\\nfor other locations."}', '{"heading":"Service Heading","title":"service title","description":"service ashoshgoasgf\\r\\naighaohig\\r\\nasdijgasdjgaf"}', '{"heading":"Contuct us","number":"01454545645","email":"ajuyguyg@iaugf.com"}', '{"heading":"Policy Heading","title":"Policy title","description":"Policy ashoshgoasgf\\r\\naighaohig\\r\\nasdijgasdjgaf"}', '{"heading":"About Heading","title":"About title","description":"About ashoshgoasgf\\r\\naighaohig\\r\\nasdijgasdjgaf"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layout`
--

CREATE TABLE `tbl_layout` (
  `id` int(11) NOT NULL,
  `slider1` varchar(50) NOT NULL,
  `slider2` varchar(50) NOT NULL,
  `slider3` varchar(50) NOT NULL,
  `left_title` text NOT NULL,
  `left_image` varchar(50) NOT NULL,
  `right_title` text NOT NULL,
  `right_image` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_layout`
--

INSERT INTO `tbl_layout` (`id`, `slider1`, `slider2`, `slider3`, `left_title`, `left_image`, `right_title`, `right_image`, `icon`) VALUES
(1, 'banner-1.jpg', 'banner-2.jpg', 'banner-3.jpg', 'Stay Classy is an online store for the shopaholics', 'left-image.jpg', 'Suitable for Regular Use or Traveling', 'right-image.jpg', 'icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_price` double NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile1` varchar(20) NOT NULL,
  `mobile2` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `order_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `selling_price`, `name`, `mobile1`, `mobile2`, `email`, `address`, `order_date`, `status`) VALUES
(1, 1, 3150, 'asdfasdf', 'asdfasdf', 'adgaga', 'asdfasdfasdf', 'adsfasdgasdgf', '2018-10-02', 4),
(2, 1, 3150, 'jalal uddin', '01924241969', NULL, 'jalaluddin_csse14@yahoo.com', 'Dhaka', '2018-10-06', 3),
(3, 4, 1023, 'Mushfiqur', '01676167636', NULL, NULL, 'Nikunja-2', '2018-10-06', 3),
(4, 2, 700, 'Eather', '1654641654', NULL, NULL, 'Mogbajar gajapotti', '2018-10-06', 6),
(5, 2, 700, 'Rifat suvro', '1795', '01795155900', 'suvrocr7@gmail.com', '02, nikunja-2', '2018-10-07', 3),
(6, 1, 3150, 'jalal uddin', '1924', '01924241969', 'jalaluddin_csse14@yahoo.com', 'Dhaka', '2018-10-07', 6),
(7, 4, 1023, 'jalal uddin', '1924', '01924241969', 'jalaluddin_csse14@yahoo.com', 'Dhaka', '2018-10-07', 5),
(8, 4, 1023, 'jalal uddin', '1924', '01924241969', 'jalaluddin_csse14@yahoo.com', 'Dhaka', '2018-10-07', 3),
(9, 4, 1023, 'jalal uddin', '1924', '01924241969', 'jalaluddin_csse14@yahoo.com', 'Dhaka', '2018-10-07', 3),
(10, 4, 1023, 'jalal uddin', '1924', '01924241969', 'jalaluddin_csse14@yahoo.com', 'Dhaka', '2018-10-07', 3),
(11, 4, 1023, 'jalal uddin', '1924', '01924241969', 'jalaluddin_csse14@yahoo.com', 'Dhaka', '2018-10-07', 3),
(12, 4, 1023, 'jalal uddin', '1924', '01924241969', 'jalaluddin_csse14@yahoo.com', 'Dhaka', '2018-10-07', 3),
(13, 1, 3150, 'jalal uddin', '1924', '01924241969', NULL, 'Dhaka', '2018-10-07', 3),
(14, 4, 1023, 'Rifat suvro', '1795', '01795155900', 'suvrocr7@gmail.com', 'Dhaka', '2018-10-11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_token`
--

CREATE TABLE `tbl_password_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_password_token`
--

INSERT INTO `tbl_password_token` (`id`, `email`, `token`, `verified`) VALUES
(7, 'jalaluddin_csse14@yahoo.com', '86ca163c1dfda83508d9c8557fea959d79bc9250', 1),
(8, 'jalaluddin_csse14@yahoo.com', 'e770ae7c24dd62b8cecc573796587bdffecef9ac', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `buy_price` double NOT NULL,
  `price` double NOT NULL,
  `discount` float NOT NULL,
  `discount_price` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `category` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL,
  `specification` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `code`, `name`, `buy_price`, `price`, `discount`, `discount_price`, `quantity`, `sold`, `new`, `category`, `type`, `image1`, `image2`, `image3`, `specification`, `status`) VALUES
(1, 'back1', 'Backpack fastrack', 3000, 3500, 10, 3150, 17, 3, 0, 4, 2, 'products/back1-1.jpg', NULL, 'products/back1-3.jpg', '["Water pfoor","Heavy service"]', 1),
(2, 'ybag', 'Yellow bag', 500, 700, 0, 700, 48, 2, 1, 4, 2, 'products/ybag-1.jpg', 'products/ybag-2.jpg', NULL, '["Nice color","Light weight","Gorgeous outlook"]', 1),
(3, 'rbag', 'Red bag', 700, 1000, 0, 1000, 20, 0, 0, 1, 2, 'products/rbag-1.jpg', NULL, 'products/rbag-3.jpg', '["Specification-1","Specification-2","Specification-3"]', 1),
(4, 'obag', 'Office bag', 850, 1100, 7, 1023, 7, 8, 1, 3, 2, 'products/obag-1.jpg', 'products/obag-2.jpg', NULL, '["Specification-1","Specification-3","Specification-2"]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `facebook`, `instagram`, `twitter`, `youtube`) VALUES
(1, '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`) VALUES
(1, 'Active'),
(6, 'Cancelled'),
(2, 'Deactive'),
(4, 'Delivered'),
(3, 'Pending'),
(5, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `activity_date` date NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`id`, `name`) VALUES
(2, 'Gents'),
(1, 'Ladies'),
(3, 'SugerBox');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order`
--
CREATE TABLE `view_order` (
`id` int(11)
,`product_id` int(11)
,`name` varchar(200)
,`mobile1` varchar(20)
,`mobile2` varchar(200)
,`email` varchar(100)
,`address` text
,`order_date` date
,`status` int(11)
,`code` varchar(100)
,`product_name` varchar(250)
,`price` double
,`selling_price` double
,`discount` float
,`discount_price` double
,`image1` varchar(100)
,`status_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_product`
--
CREATE TABLE `view_product` (
`id` int(11)
,`code` varchar(100)
,`name` varchar(250)
,`buy_price` double
,`price` double
,`discount` float
,`discount_price` double
,`quantity` int(11)
,`sold` int(11)
,`new` tinyint(1)
,`category` int(11)
,`type` int(11)
,`image1` varchar(100)
,`image2` varchar(100)
,`image3` varchar(100)
,`specification` text
,`status` int(11)
,`category_name` varchar(50)
,`type_name` varchar(50)
,`status_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `view_order`
--
DROP TABLE IF EXISTS `view_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order`  AS  select `tbl_order`.`id` AS `id`,`tbl_order`.`product_id` AS `product_id`,`tbl_order`.`name` AS `name`,`tbl_order`.`mobile1` AS `mobile1`,`tbl_order`.`mobile2` AS `mobile2`,`tbl_order`.`email` AS `email`,`tbl_order`.`address` AS `address`,`tbl_order`.`order_date` AS `order_date`,`tbl_order`.`status` AS `status`,`tbl_product`.`code` AS `code`,`tbl_product`.`name` AS `product_name`,`tbl_product`.`price` AS `price`,`tbl_order`.`selling_price` AS `selling_price`,`tbl_product`.`discount` AS `discount`,`tbl_product`.`discount_price` AS `discount_price`,`tbl_product`.`image1` AS `image1`,`tbl_status`.`name` AS `status_name` from ((`tbl_order` join `tbl_product`) join `tbl_status`) where ((`tbl_order`.`product_id` = `tbl_product`.`id`) and (`tbl_order`.`status` = `tbl_status`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_product`
--
DROP TABLE IF EXISTS `view_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_product`  AS  select `tbl_product`.`id` AS `id`,`tbl_product`.`code` AS `code`,`tbl_product`.`name` AS `name`,`tbl_product`.`buy_price` AS `buy_price`,`tbl_product`.`price` AS `price`,`tbl_product`.`discount` AS `discount`,`tbl_product`.`discount_price` AS `discount_price`,`tbl_product`.`quantity` AS `quantity`,`tbl_product`.`sold` AS `sold`,`tbl_product`.`new` AS `new`,`tbl_product`.`category` AS `category`,`tbl_product`.`type` AS `type`,`tbl_product`.`image1` AS `image1`,`tbl_product`.`image2` AS `image2`,`tbl_product`.`image3` AS `image3`,`tbl_product`.`specification` AS `specification`,`tbl_product`.`status` AS `status`,`tbl_category`.`name` AS `category_name`,`tbl_type`.`name` AS `type_name`,`tbl_status`.`name` AS `status_name` from (((`tbl_product` join `tbl_category`) join `tbl_type`) join `tbl_status`) where ((`tbl_product`.`category` = `tbl_category`.`id`) and (`tbl_product`.`type` = `tbl_type`.`id`) and (`tbl_product`.`status` = `tbl_status`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_layout`
--
ALTER TABLE `tbl_layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_password_token`
--
ALTER TABLE `tbl_password_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_layout`
--
ALTER TABLE `tbl_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_password_token`
--
ALTER TABLE `tbl_password_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
