-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 11:23 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bihar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brandName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cartdetails`
--

INSERT INTO `cartdetails` (`id`, `userID`, `productID`) VALUES
(31, 12, 111),
(32, 12, 114);

-- --------------------------------------------------------

--
-- Table structure for table `contactdetails`
--

CREATE TABLE `contactdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `NID` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  `shippingAddressId` int(11) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactdetails`
--

INSERT INTO `contactdetails` (`id`, `name`, `email`, `DOB`, `NID`, `religion`, `addressId`, `shippingAddressId`, `gender`, `nationality`) VALUES
(1, 'Surid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Jobaer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Surid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Wadud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'mahmud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Wadud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Wadud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `couponCode` varchar(20) DEFAULT NULL,
  `validity` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `validity` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `discountedPrice` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imagepaths`
--

CREATE TABLE `imagepaths` (
  `id` int(11) NOT NULL,
  `path1` varchar(100) DEFAULT NULL,
  `path2` varchar(100) DEFAULT NULL,
  `path3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagepaths`
--

INSERT INTO `imagepaths` (`id`, `path1`, `path2`, `path3`) VALUES
(13, '614201714427PM_635_j7pro-db.jpeg', NULL, NULL),
(14, 'Nokia.jpg', NULL, NULL),
(15, 'poco-f1-review-10.jpg', NULL, NULL),
(16, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(17, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(18, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(19, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(20, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(21, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(22, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(23, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(24, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(25, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(26, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(27, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(28, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(29, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(30, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(31, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(32, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(33, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(34, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(35, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(36, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(37, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(38, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(39, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(40, '1 qJnPOGdtk1q7dq17tx1aYg.gif', NULL, NULL),
(41, '71lyBaN-vAL._SL1500_.jpg', NULL, NULL),
(42, '201801AM250000002_15168463250834730007297.jpg', NULL, NULL),
(43, 'images.jpg', NULL, NULL),
(44, 'Q10_Varsity_Hero_Gold_spo_1800x.jpg', NULL, NULL),
(45, 'cricket-kit-500x500.jpg', NULL, NULL),
(46, 'details-mens-essential-wardrobe-jean-jacket.jpg', NULL, NULL),
(47, 'ladies-designer-anarkali-suits-500x500.jpg', NULL, NULL),
(48, '611NXg-u0DL._UX385_.jpg', NULL, NULL),
(49, '2018-Big-Dial-Watches-For-Men-Hour-Mens-Watches-Top-Brand-Luxury-Quartz-Watch-Man-Leather-3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `totalPrice` decimal(10,0) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `paymentID` int(11) DEFAULT NULL,
  `invoiceCode` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lineproducts`
--

CREATE TABLE `lineproducts` (
  `id` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_comission`
--

CREATE TABLE `merchant_comission` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) DEFAULT NULL,
  `percentage` decimal(10,2) DEFAULT NULL,
  `default_rate` int(11) DEFAULT '25'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merchant_comission`
--

INSERT INTO `merchant_comission` (`id`, `merchant_id`, `percentage`, `default_rate`) VALUES
(1, 12, '25.00', 10),
(2, 14, '10.00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `redeemCodeID` int(11) DEFAULT NULL,
  `orderCode` text,
  `price` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `status`, `redeemCodeID`, `orderCode`, `price`) VALUES
(28, 12, 107, 3, 0, NULL, '1213', '78000.00'),
(29, 12, 109, 2, 0, NULL, '1213', '60000.00'),
(30, 12, 108, 5, 0, NULL, '1214', '65000.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `methodID` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `trxId` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) DEFAULT NULL,
  `parentCategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `categoryName`, `parentCategoryID`) VALUES
(3, 'Mobile', NULL),
(4, 'Laptop', NULL),
(6, 'Sports', NULL),
(7, 'Wardrobe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(100) DEFAULT NULL,
  `brandID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `imagePathsID` int(11) DEFAULT NULL,
  `availabilityStatus` tinyint(1) DEFAULT NULL,
  `description` mediumtext,
  `createdBy` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `isDiscountAvailable` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `inStockQuantity` int(11) DEFAULT NULL,
  `totalSoldQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `brandID`, `categoryID`, `price`, `imagePathsID`, `availabilityStatus`, `description`, `createdBy`, `createdDate`, `isDiscountAvailable`, `status`, `inStockQuantity`, `totalSoldQuantity`) VALUES
(107, 'Samsung J7', NULL, 3, '26000.00', 13, NULL, 'Samsung new mobile', 14, '2018-09-10 04:04:05', 0, 1, 20, 12),
(108, 'Nokia 5', NULL, 3, '13000.00', 14, NULL, 'Nokia Mobile', 12, '2018-09-10 04:04:43', 0, 1, 30, 12),
(109, 'Poco F1', NULL, 3, '30000.00', 15, NULL, 'Xiaomi SUb brand Poco', 12, '2018-09-10 04:05:19', 0, 1, 26, 14),
(110, 'Dell Laptop', NULL, 4, '56000.00', 41, NULL, 'New Dell', 12, '2018-11-13 03:27:02', 0, 1, 500, 0),
(111, 'Asus Laptop', NULL, 4, '69000.00', 42, NULL, 'New Asus', 12, '2018-11-13 03:33:18', 0, 1, 569, 0),
(112, 'Football Boot', NULL, 6, '2500.00', 43, NULL, 'CR7 Boots', 12, '2018-11-13 03:37:52', 0, 1, 50, 0),
(113, 'American Football Helmet', NULL, 6, '750.00', 44, NULL, 'Strong and cool', 12, '2018-11-13 03:39:12', 0, 1, 56, 0),
(114, 'SS Cricket Set', NULL, 6, '1450.00', 45, NULL, 'New Cricket Set', 12, '2018-11-13 03:40:25', 0, 1, 96, 0),
(115, 'Denim Jacket', NULL, 7, '1300.00', 46, NULL, 'Jeans', 12, '2018-11-13 03:44:31', 0, 1, 580, 0),
(116, 'Ladies Anarkoli', NULL, 7, '800.00', 47, NULL, 'Ladies dress', 12, '2018-11-13 03:46:04', 0, 1, 60, 0),
(117, 'Party Gown', NULL, 7, '7000.00', 48, NULL, 'Party', 12, '2018-11-13 03:46:44', 0, 1, 800, 0),
(118, 'Stylish Watch', NULL, 7, '2000.00', 49, NULL, 'New ', 12, '2018-11-13 03:47:34', 0, 1, 560, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddress`
--

CREATE TABLE `shippingaddress` (
  `id` int(11) NOT NULL,
  `contactDetailsID` int(11) DEFAULT NULL,
  `addressID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `id` int(11) NOT NULL,
  `userRole` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `userRole`) VALUES
(1, 'Merchant'),
(2, 'Buyer'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `userRoleID` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contactDetailsID` int(11) DEFAULT NULL,
  `joiningdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phoneNumber`, `userRoleID`, `password`, `contactDetailsID`, `joiningdate`) VALUES
(12, '01688420942', 1, '123456', 2, '2018-09-10 03:58:26'),
(13, '01521100581', 3, '123456', 3, '2018-09-10 03:58:41'),
(14, '01752721841', 1, '123456', 4, '2018-09-10 03:59:23'),
(15, '01717821571', 1, '123456', 5, '2018-09-17 11:07:17'),
(16, '01234567890', 1, 'qwerty', 6, '2018-09-17 11:13:27'),
(17, '98765432101', 1, 'qwerty', 7, '2018-09-17 11:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `productID`, `userID`) VALUES
(7, 107, 12),
(8, 109, 12),
(9, 111, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactdetails`
--
ALTER TABLE `contactdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addressId` (`addressId`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagepaths`
--
ALTER TABLE `imagepaths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lineproducts`
--
ALTER TABLE `lineproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_comission`
--
ALTER TABLE `merchant_comission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchant_id` (`merchant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentCategoryID` (`parentCategoryID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brandID` (`brandID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `imagePathsID` (`imagePathsID`),
  ADD KEY `createdBy` (`createdBy`);

--
-- Indexes for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactDetailsID` (`contactDetailsID`),
  ADD KEY `addressID` (`addressID`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userRoleID` (`userRoleID`),
  ADD KEY `contactDetailsID` (`contactDetailsID`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contactdetails`
--
ALTER TABLE `contactdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagepaths`
--
ALTER TABLE `imagepaths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lineproducts`
--
ALTER TABLE `lineproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchant_comission`
--
ALTER TABLE `merchant_comission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactdetails`
--
ALTER TABLE `contactdetails`
  ADD CONSTRAINT `contactDetails_ibfk_1` FOREIGN KEY (`addressId`) REFERENCES `address` (`id`);

--
-- Constraints for table `merchant_comission`
--
ALTER TABLE `merchant_comission`
  ADD CONSTRAINT `merchant_comission_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Constraints for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD CONSTRAINT `productCategory_ibfk_1` FOREIGN KEY (`parentCategoryID`) REFERENCES `productcategory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
