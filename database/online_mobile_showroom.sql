-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 08:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_mobile_showroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Jameela', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `description`, `image`) VALUES
(1, 'Mobiles', 'Explore our diverse mobile categories to find the perfect phone that meets your style and needs.', 'mobile.png'),
(2, 'Power Bank', 'Stay powered up on the go with our selection of reliable, high-capacity power banks. Whether you need a quick charge or long-lasting.', 'power bank.jpg'),
(3, 'Tablet', 'Discover a range of versatile tablets perfect for work, entertainment, and creativity. From high-performance models to budget-friendly options.', 'tablet.png');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Infinix'),
(4, 'Vivo'),
(5, 'Tecno');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `datetime`) VALUES
(1, 'Mudassir Iqbal', 'mudassir8281@gmail.com', 'hello', '2025-08-25 21:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `phone`, `city`, `address`) VALUES
(1, 'Mudassir Iqbal', 'mudassir8281@gmail.com', '1234', '03021324567', 'Karachi', 'House no. 108, Block A1, Gulberg III, Karachi, Sindh');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `pro_id`, `rating`, `time`, `date`, `review`) VALUES
(1, 1, 2, 4, '04:58:47', '2024-10-03', 'This product is amazing! I am very satisfied with the quality.'),
(2, 2, 3, 5, '01:28:24', '2025-01-02', 'Original seal packed PTA approved phone with good price, what else do you want !!'),
(3, 4, 5, 4, '06:43:39', '2025-08-25', 'Good.');

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `operating_system` varchar(80) NOT NULL,
  `screen_size` varchar(80) NOT NULL,
  `internal_memory` varchar(80) NOT NULL,
  `ram` varchar(80) NOT NULL,
  `battery` varchar(80) NOT NULL,
  `front_camera` varchar(80) NOT NULL,
  `back_camera` varchar(80) NOT NULL,
  `sale` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `actual_stock` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `visitor` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`id`, `company_id`, `cat_id`, `pro_name`, `operating_system`, `screen_size`, `internal_memory`, `ram`, `battery`, `front_camera`, `back_camera`, `sale`, `price`, `discount`, `actual_stock`, `available`, `date`, `image`, `visitor`, `description`) VALUES
(2, 2, 1, 'Samsung Galaxy A35 5G', 'Android', '6.6 Inches', '256 GB', '12GB', '5000 mAh', '13 MP', '50 MP + 8 MP + 5 MP', 1, 98999, 22000, 8, 8, '2025-01-02', 'img-03.jpg', 28, '<p><strong>General Features</strong></p><p>Release Date: <strong>15 May 2024</strong>&nbsp;</p><p>SIM Support: &nbsp;<strong>Dual Nano-SIM</strong></p><p>Phone Dimensions: <strong>161.7 x 78.0 x 8.2 mm</strong></p><p>Phone Weight: <strong>209 g</strong></p><p>Screen Resolution: <strong>1080 x 2340 (FHD+)</strong>&nbsp;</p><p>Screen Type: <strong>FHD+ sAMOLED</strong> <strong>Infinity-O Immersive display</strong></p><p>Screen Protection: <strong>N/A Connectivity</strong></p><p>Bluetooth: <strong>Yes</strong>&nbsp;</p><p>3G: <strong>Yes</strong>&nbsp;</p><p>4G/LTE: <strong>Yes</strong></p><p>5G: <strong>Yes</strong></p><p>Radio: <strong>N/A</strong></p><p>WiFi: <strong>Yes</strong></p><p>NFC: <strong>Yes</strong></p>'),
(3, 5, 1, 'Tecno Camon 30 Pro 5G', 'Android', '6.78 Inches', '512 GB', '12GB', '5000mAh', '50MP AF', '50MP + 50MP + 2MP', 1, 93499, 6000, 4, 4, '2025-01-02', 'img-04.jpg', 38, '<figure class=\"table\"><table><thead><tr><th colspan=\"2\">General Features</th></tr></thead><tbody><tr><th><strong>Release Date</strong></th><td><strong>23 Apr 2024</strong></td></tr><tr><th><strong>SIM Support</strong></th><td><strong>Dual sim</strong></td></tr><tr><th><strong>Phone Dimensions</strong></th><td><strong>164 x 74.53 x 7.68mm</strong></td></tr><tr><th><strong>Phone Weight</strong></th><td><strong>N/A</strong></td></tr><tr><th><strong>Operating System</strong></th><td><strong>Android 14</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\">Display</th></tr></thead><tbody><tr><th><strong>Screen Size</strong></th><td><strong>6.78 Inches</strong></td></tr><tr><th><strong>Screen Resolution</strong></th><td><strong>1080 x 2436</strong></td></tr><tr><th><strong>Screen Type</strong></th><td><strong>AMOLED 144Hz</strong></td></tr><tr><th><strong>Screen Protection</strong></th><td><strong>N/A</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><thead><tr><th colspan=\"2\">Camera</th></tr></thead><tbody><tr><th><strong>Front Camera</strong></th><td><strong>50MP AF</strong></td></tr><tr><th><strong>Front Flash Light</strong></th><td><strong>Yes</strong></td></tr><tr><th><strong>Front Video Recording</strong></th><td><strong>Yes</strong></td></tr><tr><th><strong>Back Flash Light</strong></th><td><strong>Yes</strong></td></tr><tr><th><strong>Back Camera</strong></th><td><strong>50MP + 50MP + 2MP</strong></td></tr><tr><th><strong>Back Video Recording</strong></th><td><strong>Yes</strong></td></tr></tbody></table></figure>'),
(4, 2, 1, 'Samsung Galaxy A34', 'Android 12 OS', '6.6 Inches', '256GB', '8GB', '5000mAh', '13 MP', '48 MP + 8 MP + 5 MP', 1, 83499, 15000, 1, 0, '2025-01-02', 'img-06.jpg', 4, '<ul><li><strong>General Features</strong><br><strong>Release Date&nbsp;</strong>&nbsp;&nbsp;&nbsp;30 May 2023<br><strong>SIM Support&nbsp;</strong>&nbsp;&nbsp;&nbsp;Dual Sim, Dual Standby (Nano-SIM)<br><strong>Phone Dimensions</strong>&nbsp;&nbsp;&nbsp;&nbsp;161.3 X 78.1 X 8.2mm<br><strong>Phone Weight&nbsp;</strong>&nbsp;&nbsp;&nbsp;199g<br><strong>Operating System</strong>&nbsp;&nbsp;&nbsp;&nbsp;Android 12 OS</li><li><strong>Display</strong><br><strong>Screen Size</strong>&nbsp;&nbsp;&nbsp;&nbsp;6.6 Inches<br><strong>Screen Resolution</strong>&nbsp;&nbsp;&nbsp;&nbsp;1080 x 2340 Pixels<br><strong>Screen Type</strong>&nbsp;&nbsp;&nbsp;&nbsp;Super AMOLED Capacitive Touchscreen, Multitouch<br><strong>Screen Protection&nbsp;</strong>&nbsp;&nbsp;&nbsp;Corning Gorilla Glass 5</li><li><strong>Memory</strong><br><strong>Internal Memory</strong>&nbsp;&nbsp;&nbsp;&nbsp;128/256 GB<br><strong>RAM</strong>&nbsp;&nbsp;&nbsp;&nbsp;6/8 GB<br><strong>Card Slot</strong>&nbsp;&nbsp;&nbsp;&nbsp;MicroSD (Up to 1TB)</li><li><strong>Performance</strong><br><strong>Processor</strong>&nbsp;&nbsp;&nbsp;&nbsp;Octa-core (2 x 2.6 GHz Cortex-A78 + 6 x 2.0 GHz Cortex-A55)<br><strong>GPU&nbsp;</strong>&nbsp;&nbsp;&nbsp;Mali-G68 MC4</li></ul>'),
(5, 4, 1, 'Vivo X200 FE', 'Android 15', '6.31 Inches', '', '12GB', '6500 mAh', '50MP (ZEISS)', '50 MP + 8 MP + 50 MP', 0, 213999, 0, 4, 3, '2025-07-20', 'vivo-x200.webp', 6, '<figure class=\"table\"><table><tbody><tr><th><strong>Release Date</strong></th><td><strong>30 Jun 2025</strong></td></tr><tr><th><strong>SIM Support</strong></th><td><strong>Dual-Sims</strong></td></tr><tr><th><strong>Phone Dimensions</strong></th><td><strong>150.83 × 71.76 × 7.99 mm</strong></td></tr><tr><th><strong>Phone Weight</strong></th><td><strong>186g</strong></td></tr><tr><th><strong>Operating System</strong></th><td><strong>Android 15</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th><strong>Screen Size</strong></th><td><strong>6.31 Inches</strong></td></tr><tr><th><strong>Screen Resolution</strong></th><td><strong>1216 x 2640 Pixels</strong></td></tr><tr><th><strong>Screen Type</strong></th><td><strong>AMOLED (120HZ)</strong></td></tr><tr><th><strong>Screen Protection</strong></th><td><strong>N/A</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><th><strong>Front Camera</strong></th><td><strong>50MP (ZEISS)</strong></td></tr><tr><th><strong>Front Flash Light</strong></th><td><strong>N/A</strong></td></tr><tr><th><strong>Front Video Recording</strong></th><td><strong>Yes</strong></td></tr><tr><th><strong>Back Flash Light</strong></th><td><strong>Yes</strong></td></tr><tr><th><strong>Back Camera</strong></th><td><strong>50 MP + 8 MP + 50 MP</strong></td></tr><tr><th><strong>Back Video Recording</strong></th><td><strong>Yes</strong></td></tr></tbody></table></figure>');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_images`
--

CREATE TABLE `mobile_images` (
  `id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobile_images`
--

INSERT INTO `mobile_images` (`id`, `mobile_id`, `image`) VALUES
(1, 2, 'img-01.jpg'),
(2, 2, 'img-02.jpg'),
(3, 3, 'img-05.jpg'),
(4, 4, 'img-07.jpg'),
(5, 4, 'img-08.jpg'),
(6, 4, 'img-09.jpg'),
(7, 5, 'vivo-x200-1.webp'),
(8, 5, 'vivo-x200-3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `pro_id`, `pro_name`, `price`, `qty`) VALUES
(1, 1, 3, 'Tecno Camon 30 Pro 5G', 87499, 1),
(2, 2, 4, 'Samsung Galaxy A34', 68499, 1),
(4, 4, 5, 'Vivo X200 FE', 213999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `payment_method` varchar(80) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `user_id`, `name`, `email`, `contact`, `address`, `payment_method`, `time`, `date`, `status`) VALUES
(1, 2, 'Shakeel Ahmad', 'shakeel13471@gmail.com', '03435161347', 'Johar Town Lahore', 'cod', '04:47:32', '2025-01-02', 'On the Way'),
(2, 2, 'Shakeel Ahmad', 'shakeel13471@gmail.com', '03435161347', 'Johar Town Lahore', 'credit', '04:49:50', '2025-01-02', 'Delivered'),
(4, 4, 'Mudassir Iqbal', 'shakeelvu9100@gmail.com', '03018734989', 'House no. 108, Block A1, Gulberg III, Karachi, Sindh', 'debit', '06:48:00', '2025-08-25', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `keyword`, `datetime`) VALUES
(1, 'Samsung Galaxy a35', '2025-07-20 11:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `image` varchar(80) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `username`, `password`, `city`, `address`, `image`, `status`) VALUES
(1, 'Noor ul Ain', 'noor1342@gmail.com', '03018734989', 'noor123', 'Noor123@', 'Lahore', 'Suite No. 3 Cantt Board Plaza Adjacent To The Mall Of Lahore Tufail Road, Afshan', 'female 2.png', 1),
(2, 'Shakeel Ahmad', 'shakeel13471@gmail.com', '03435161347', 'shakeel123', 'Shakeel123@', 'Lahore', 'Johar Town Lahore', 'hello.jpg', 1),
(4, 'Mudassir Iqbal', 'shakeelvu9100@gmail.com', '03018734989', 'mudasir123', 'Mudassir@123', 'Karachi', 'House no. 108, Block A1, Gulberg III, Karachi, Sindh', 'male user icon.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `mobile_id`) VALUES
(2, 1, 2),
(3, 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_images`
--
ALTER TABLE `mobile_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mobile`
--
ALTER TABLE `mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobile_images`
--
ALTER TABLE `mobile_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
