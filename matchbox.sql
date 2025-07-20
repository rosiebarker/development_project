-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 11:33 AM
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
-- Database: `matchbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `account_type` varchar(20) DEFAULT NULL,
  `account_address` varchar(50) NOT NULL,
  `account_postcode` varchar(9) NOT NULL,
  `account_town` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `user_id`, `account_type`, `account_address`, `account_postcode`, `account_town`) VALUES
(15, 26, 'Administrator', 'v', 'v', 'v'),
(16, 27, 'Administrator', 'sssssssss', 'sssssss', 'sssssssss'),
(21, 32, 'User', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `basket_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(5, 'Accessories'),
(10, 'Baby Grow'),
(6, 'Coats'),
(4, 'Hoodie'),
(11, 'Jumper'),
(2, 'Pyjamas'),
(8, 'Rompers'),
(9, 'Sets'),
(3, 'Shoes'),
(7, 'Swimwear'),
(1, 'T-Shirts');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` decimal(5,0) NOT NULL,
  `product_quantity` int(3) DEFAULT NULL,
  `product_image` blob NOT NULL,
  `size_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_description`, `product_price`, `product_quantity`, `product_image`, `size_id`) VALUES
(13, 2, 'M&CO 2 Piece Set', 'M&CO 2 Piece Pink & White Dungaree Set', 15, 10, 0x696d616765732f3433383036353331305f3436313537303231363337333238375f333239363038343436313430333333343830305f6e2e6a7067, 3),
(15, 8, 'M&CO Safari Romper', 'M&CO Safari Romper Discounted Price', 7, 9, 0x696d616765732f3433383036303537335f3437313138313439383636343839375f373731373630343437323831373533363631335f6e2e6a7067, 4),
(16, 2, 'Baby Star 3 Piece Set', 'Quality Pyjamas', 10, 9, 0x696d616765732f3433383132343935375f3937383033353531303634303037395f3331333537383733343234323936313636375f6e2e6a7067, 6),
(17, 9, '2 Piece Gingham Set', 'Pink and White 2 Piece Set', 15, 5, 0x696d616765732f3433383038333535305f3937343334323838303739393337315f343538303538363638303834353235373830375f6e2e6a7067, 6),
(18, 9, 'M&S Bow Set', 'M&S Pink and white bow set', 17, 3, 0x696d616765732f3433383036303437375f3734333433313839373935313735355f3639353436353131393630353438303935375f6e2e6a7067, 1),
(19, 7, 'Girls Swimwear', '4 Pack', 7, 3, 0x696d616765732f3433383035313637395f3830393132343639313136343131335f373734323531383938393530333730353938395f6e2e6a7067, 7),
(20, 9, 'Baby Bunny Set', '7 Piece Set', 8, 1, 0x696d616765732f3433383035313630325f3937353633343937303538333438385f343534363135343935383330313132363738375f6e2e6a7067, 3),
(21, 11, 'M-Care Jumper', 'Baby boys jumper', 5, 1, 0x696d616765732f3433383035313535325f3436343635343636323637323335355f373339313336333031373535323439333439355f6e2e6a7067, 5),
(22, 11, 'M-Care Cardigan', 'Girls M-Care Cardigan', 5, 1, 0x696d616765732f3433383132353137315f373634363333393634383737363937395f343432303836343234363736373737363334365f6e2e6a7067, 6),
(23, 8, 'Mummy & Daddy\'s Little Cub Romper', 'M&S Romper', 5, 1, 0x696d616765732f3433383036393835325f3731363036343539303530363832385f383835373735393637383134353733333336365f6e2e6a7067, 3),
(24, 9, '5 Piece Baby Bunny Set ', '5 Piece Baby Bunny Set With Matching Gift Bag', 13, 2, 0x696d616765732f3433383036343938385f3336323831393735303133373338365f3534303835393835353531373134393734305f6e2e6a7067, 3),
(25, 8, 'Cheesecloth Romper', 'Cheesecloth Romper With Matching Hat', 7, 1, 0x696d616765732f3433383035313532305f3938383235383238363239373737325f323334383130373334343836313138323634345f6e2e6a7067, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

CREATE TABLE `product_sale` (
  `product_sale_id` int(10) NOT NULL,
  `sale_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `rating` enum('0','1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(10) NOT NULL,
  `size_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, '0-3 Months'),
(2, '3-6 Months'),
(3, '6-9 Months'),
(4, '12 Months'),
(5, '18 Months'),
(6, '2 Years'),
(7, '3 - 4 Years'),
(8, '4 - 6 Years'),
(9, '6 - 8 Years'),
(10, '8 - 9 Years');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_fname` varchar(50) DEFAULT NULL,
  `user_lname` varchar(50) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_dob`, `user_email`, `user_password`) VALUES
(26, 'rose', 'barker', '2024-05-01', 'rosietbarker@outlook.com', 'password123'),
(27, 'admin', 'matchbox', '2023-12-01', 'admin@matchbox.com', 'password123'),
(28, 'test', 'test', '2024-01-02', 'test@123@hotmail.com', 'password123'),
(29, 'test again', 'test again', '2024-01-04', 'anothertest@hotmail.com', 'password123'),
(30, 'sd', 'sd', '2024-05-01', 'fffffff@hotmail.com', 'password123'),
(31, 'jane', 'doe', '2016-01-07', 'janedoe@hotmail.com', 'password123'),
(32, 'JOHN', 'DOE', '2024-05-02', 'johndoe@hotmail.com', 'password123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_name` (`category_name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`product_sale_id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `product_sale_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD CONSTRAINT `product_sale_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`sale_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
