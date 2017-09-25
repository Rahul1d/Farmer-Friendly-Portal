--
-- Database: `farmers`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`Category_id`, `Category_name`) VALUES
(1, 'Tools'),
(2, 'Farm Produce'),
(3, 'Fertilizers'),
(4, 'Aromatic Plants');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `Customer_id` int(11) NOT NULL,
  `Customer_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_phoneno` bigint(10) NOT NULL,
  `Customer_password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`Customer_id`, `Customer_name`, `Customer_email`, `Customer_phoneno`, `Customer_password`, `Customer_Address`) VALUES
(1, 'Rahul', 'c@gmail.com', 8898690751, '12345', ' A/204,Dinesh Terrrace,Mira rdd'),
(2, 'Shashi', 's@gmail.com', 8898690751, '123456', 'A/204,Dinesh Terrace , Mira rd'),
(3, 'Winston', 'w@gmail.com', 7507050685, '123456', 'virar'),
(4, 'jovina', 'jovina@gmail.com', 9920743661, 'qwerty', 'a/202');

-- --------------------------------------------------------

--
-- Table structure for table `image_tb`
--

CREATE TABLE `image_tb` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image_tb`
--

INSERT INTO `image_tb` (`image_id`, `image_name`, `product_id`, `created_time`) VALUES
(9, '946156_1475370383.jpeg', 16, '2016-10-02 01:06:23'),
(10, '163334_1475370383.jpeg', 16, '2016-10-02 01:06:23'),
(11, '692962_1475370383.jpeg', 16, '2016-10-02 01:06:23'),
(12, '684857_1475371210.jpeg', 18, '2016-10-02 01:20:10'),
(13, '974509_1475371210.jpeg', 18, '2016-10-02 01:20:10'),
(14, '987458_1475371210.jpeg', 18, '2016-10-02 01:20:10'),
(15, '787169_1475371594.jpeg', 19, '2016-10-02 01:26:34'),
(16, '45021_1475371594.jpeg', 19, '2016-10-02 01:26:34'),
(17, '843096_1475371594.jpeg', 19, '2016-10-02 01:26:34'),
(18, '324714_1475373030.jpeg', 20, '2016-10-02 01:50:30'),
(19, '827066_1475373030.jpeg', 20, '2016-10-02 01:50:30'),
(20, '381836_1475373030.jpeg', 20, '2016-10-02 01:50:30'),
(21, '101576_1475373485.jpeg', 21, '2016-10-02 01:58:05'),
(22, '469106_1475373485.jpeg', 21, '2016-10-02 01:58:05'),
(23, '947054_1475373485.jpeg', 21, '2016-10-02 01:58:05'),
(24, '818781_1475374135.jpeg', 22, '2016-10-02 02:08:55'),
(25, '657910_1475374135.jpeg', 22, '2016-10-02 02:08:55'),
(26, '931412_1475374135.jpeg', 22, '2016-10-02 02:08:55'),
(33, '143924_1477283941.jpeg', 24, '2016-10-24 04:39:01'),
(34, '62606_1477283941.jpeg', 24, '2016-10-24 04:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_tb`
--

CREATE TABLE `merchant_tb` (
  `Merchant_id` int(11) NOT NULL,
  `Merchant_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Merchant_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Merchant_password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Merchant_phoneno` bigint(15) NOT NULL,
  `Merchant_loc` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `merchant_tb`
--

INSERT INTO `merchant_tb` (`Merchant_id`, `Merchant_name`, `Merchant_email`, `Merchant_password`, `Merchant_phoneno`, `Merchant_loc`) VALUES
(1, 'Rahul', 'abc@gmail.com', '123456789', 8898690751, 'Mumbai'),
(4, 'Winston', 'w@gmail.com', '123456', 7507050685, 'virar');

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `Order_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Order_deliveryDate` date DEFAULT NULL,
  `Order_Status` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Order_Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_tb`
--

INSERT INTO `order_tb` (`Order_id`, `Customer_id`, `Product_id`, `Order_date`, `Order_deliveryDate`, `Order_Status`, `Order_Quantity`) VALUES
(44, 1, 21, '2016-10-04 12:14:33', '2016-10-11', 'Delivered', 1),
(45, 1, 18, '2016-10-04 12:20:01', '2016-10-11', 'Delivered', 1),
(46, 1, 18, '2016-10-04 12:21:01', '2016-10-11', 'Delivered', 1),
(47, 1, 18, '2016-10-04 12:22:27', '2016-10-11', 'Delivered', 1),
(48, 1, 18, '2016-10-04 12:22:40', '2016-10-11', 'Delivered', 1),
(49, 1, 19, '2016-10-04 12:26:35', '2016-10-11', 'Delivered', 1),
(50, 1, 19, '2016-10-04 12:28:00', '2016-10-11', 'Delivered', 1),
(51, 1, 19, '2016-10-04 12:29:18', '2016-10-11', 'Delivered', 1),
(52, 1, 21, '2016-10-05 07:25:33', '2016-10-12', 'Delivered', 1),
(53, 1, 21, '2016-10-05 07:28:11', '2016-10-12', 'Delivered', 1),
(54, 1, 21, '2016-10-05 07:29:31', '2016-10-12', 'Delivered', 1),
(55, 1, 21, '2016-10-05 07:30:00', '2016-10-12', 'Delivered', 1),
(56, 1, 21, '2016-10-05 07:31:30', '2016-10-12', 'Delivered', 1),
(57, 1, 21, '2016-10-05 07:32:10', '2016-10-12', 'Delivered', 1),
(58, 1, 21, '2016-10-05 07:33:21', '2016-10-12', 'Delivered', 1),
(59, 1, 22, '2016-10-05 07:34:46', '2016-10-12', 'Delivered', 1),
(60, 1, 22, '2016-10-05 07:38:58', '2016-10-12', 'Delivered', 1),
(61, 1, 16, '2016-10-05 07:44:12', '2016-10-12', 'Delivered', 1),
(62, 1, 16, '2016-10-05 07:44:23', '2016-10-12', 'Delivered', 1),
(63, 1, 18, '2016-10-05 07:50:18', '2016-10-12', 'Delivered', 1),
(64, 1, 18, '2016-10-05 07:50:58', '2016-10-12', 'Delivered', 1),
(65, 1, 18, '2016-10-05 07:52:10', '2016-10-12', 'Delivered', 1),
(66, 1, 18, '2016-10-05 07:57:26', '2016-10-12', 'Delivered', 1),
(67, 1, 18, '2016-10-05 07:57:45', '2016-10-12', 'Delivered', 1),
(68, 1, 18, '2016-10-05 07:58:05', '2016-10-12', 'Delivered', 1),
(69, 1, 18, '2016-10-05 07:59:43', '2016-10-12', 'Delivered', 1),
(70, 1, 18, '2016-10-05 08:00:47', '2016-10-12', 'Delivered', 1),
(71, 1, 18, '2016-10-05 08:01:42', '2016-10-12', 'Delivered', 1),
(72, 1, 18, '2016-10-05 08:01:59', '2016-10-12', 'Delivered', 1),
(73, 1, 18, '2016-10-05 08:04:17', '2016-10-12', 'Delivered', 1),
(74, 1, 18, '2016-10-05 08:05:56', '2016-10-12', 'Delivered', 1),
(75, 1, 18, '2016-10-05 08:06:50', '2016-10-12', 'Delivered', 1),
(76, 1, 18, '2016-10-05 08:07:17', '2016-10-12', 'Delivered', 1),
(77, 1, 21, '2016-10-05 13:01:17', '2016-10-12', 'Delivered', 1),
(78, 1, 22, '2016-10-05 13:02:06', '2016-10-12', 'Delivered', 1),
(79, 1, 22, '2016-10-05 13:03:41', '2016-10-12', 'Delivered', 1),
(80, 1, 21, '2016-10-05 13:15:38', '2016-10-12', 'Delivered', 1),
(81, 1, 19, '2016-10-05 13:16:25', '2016-10-12', 'Delivered', 1),
(82, 1, 18, '2016-10-08 06:23:00', '2016-10-15', 'Delivered', 1),
(83, 1, 18, '2016-10-08 06:24:18', '2016-10-15', 'Delivered', 1),
(84, 1, 18, '2016-10-12 13:01:00', '2016-10-19', 'Delivered', 1),
(85, 1, 21, '2016-10-22 12:06:35', '2016-10-29', 'Delivered', 1),
(86, 1, 18, '2016-10-23 11:57:06', '2016-10-30', 'Confirmed', 1),
(87, 1, 18, '2016-10-23 11:57:54', '2016-10-30', 'Confirmed', 1),
(88, 1, 21, '2016-10-23 21:43:04', '2016-10-30', 'Confirmed', 3),
(89, 3, 21, '2016-10-23 23:13:06', '2016-10-30', 'Confirmed', 4),
(90, 1, 18, '2016-10-24 00:25:16', '2016-10-31', 'Confirmed', 1),
(91, 1, 22, '2016-10-24 01:25:48', '2016-10-31', 'Confirmed', 1),
(92, 1, 19, '2016-10-24 02:43:07', '2016-10-31', 'Confirmed', 1),
(93, 1, 21, '2016-10-29 08:11:11', '2016-11-05', 'Confirmed', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `Product_id` int(11) NOT NULL,
  `Product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `Merchant_id` int(11) NOT NULL,
  `Product_desc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Product_cp` int(10) NOT NULL,
  `Product_sp` int(10) NOT NULL,
  `Product_Quantity` int(5) NOT NULL,
  `Product_MaxQuant` int(5) NOT NULL,
  `Items_Sold` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`Product_id`, `Product_name`, `Category_id`, `sub_category_id`, `Merchant_id`, `Product_desc`, `Product_cp`, `Product_sp`, `Product_Quantity`, `Product_MaxQuant`, `Items_Sold`) VALUES
(16, 'Mantis 16 inch X-tra Wide 4 cycle ( gas only ) Mantis tiller ', 1, 1, 1, '•  Powerful Honda 4-cycle (gas only, no fuel mix required) 35cc engine spins the tines twice as fast as other tillers \r\n•  Weighs just 34 pounds \r\n•  Finger-controlled throttle for infinite speed control and ease of operation \r\n', 55000, 49999, 6, 1, 3),
(18, 'Trowel', 1, 3, 1, '•  Material: Steel, Color: Black \r\n•  Package Contents: 1-Piece Cultivator \r\n•  Easy to use \r\n•  Light weight \r\n•  Fixed plastic handle\r\n', 200, 180, 73, 2, 21),
(19, 'Irrigation Tool kit', 1, 2, 1, '•	High quality polyethylene drip irrigation pipe\r\n•	16 mm size and best suits for greenage products\r\n•	Long lasting materal\r\n•	10 meters length\r\n', 5000, 4500, 40, 1, 4),
(20, 'Cocogarden Enriched Vermicompost ', 3, 8, 1, '•	Enriched with animal dung, agricultural wastes, JEEVAMRUTHA, PANCHAGAVYA, AZOLLA, VERMI COMPOST, SLURRY and NEEM\r\n•	Useful for all kinds of lawn, floriculture, horticultural crops like fruit crops & vegetable crops resulting in lush green lawn, enhances flowering, greener glossy leaves and improves self life of flowers remaining fresh for longer hours\r\n\r\n', 250, 225, 93, 3, 1),
(21, 'Raddish seeds', 2, 5, 1, 'Grow vegetables at your home\nBest quality seeds\nUsed for horticultural and agricultural applications', 50, 45, 171, 5, 23),
(22, 'Brocolli Seeds', 2, 5, 1, 'Grow vegetables at your home\r\nBest quality seeds\r\nUsed for horticultural and agricultural applications', 50, 46, 138, 3, 6),
(24, 'Tractor Ux', 1, 1, 4, 'Mahindra Yuvraj 215 NXT is a 15HP compact tractor with solid style and solid performance. Ease of operation and fuel efficiency makes the Yuvraj 215NXT the ideal tractor for small landholdings and inter-culture operations.', 500000, 476999, 50, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_tb`
--

CREATE TABLE `sub_category_tb` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_category_tb`
--

INSERT INTO `sub_category_tb` (`sub_category_id`, `sub_category_name`, `category_id`) VALUES
(1, 'Machinery', 1),
(2, 'Irrigation tools', 1),
(3, 'Hand tools', 1),
(4, 'Sprayers', 1),
(5, 'Seeds', 2),
(6, 'Fruits/veggies', 2),
(7, 'Crops', 2),
(8, 'Organic', 3),
(9, 'InOrganic', 3),
(10, 'Insectides/Pesticides', 3),
(11, 'Fragrant Plants', 4),
(12, 'Fragrant Plants', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `image_tb`
--
ALTER TABLE `image_tb`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `merchant_tb`
--
ALTER TABLE `merchant_tb`
  ADD PRIMARY KEY (`Merchant_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `sub_category_tb`
--
ALTER TABLE `sub_category_tb`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `image_tb`
--
ALTER TABLE `image_tb`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `merchant_tb`
--
ALTER TABLE `merchant_tb`
  MODIFY `Merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sub_category_tb`
--
ALTER TABLE `sub_category_tb`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
