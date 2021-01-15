-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 03:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `order_number` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `order_number`, `status`, `added_on`, `color`) VALUES
(1, 'Veg', 1, 1, '2020-06-16 12:06:33', 'green'),
(2, 'Non-Veg', 2, 1, '2020-06-16 12:06:41', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `added_on`) VALUES
(1, 'Shebon Lin Shajan', 'shibourne2000@gmail.com', 'I loved the food.', '2021-01-05 08:47:01'),
(8, 'Shebon Lin Shajan', 'shibourne2000@gmail.com', 'Great Food.', '2021-01-05 08:53:25'),
(9, 'Anna', 'anna@gmail.com', 'Loved the atmosphere', '2021-01-05 08:57:42'),
(10, 'Ashwin', 'ashwin@gmail.com', 'Loved the paneer tikka.', '2021-01-05 09:01:34'),
(11, 'Liny', 'liny@gmail.com', 'Food was great', '2021-01-05 03:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_type` enum('P','F') NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `expired_on` date NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(1) NOT NULL,
  `course` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course`, `status`) VALUES
(1, 'Breakfast', 1),
(2, 'Lunch', 1),
(3, 'Dinner', 1),
(4, 'Desserts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `dish` varchar(100) NOT NULL,
  `dish_detail` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `category_id` int(1) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `course_id`, `dish`, `dish_detail`, `image`, `status`, `added_on`, `category_id`, `price`) VALUES
(1, 1, 'Classic English Breakfast', 'A perfect breakfast platter with bread, scrambled eggs, sausages and hash browns. Orange juice complimentary.', '977945963_862169053_gulab-jamun.jpg', 1, '2020-06-17 10:43:59', 2, 300),
(2, 1, 'Breakfast tacos', 'Soft taco shells with your choice of filling (classic scrambled eggs/pulled chicken with spices).', '325195312_raj-kachori.jpeg', 1, '2020-06-17 10:46:06', 2, 270),
(3, 1, 'Mozzarella Sticks', 'Fresh Mozzarella sticks dipped in batter and panko, fried to perfection.\r\n', '836724175_Chowmein.jpg', 1, '2020-06-17 10:47:26', 1, 200),
(6, 1, 'Mediterranean Tomato Salad', 'Flavor-packed tomato salad with feta, loads of fresh herbs, and a light citrus dressing.', '386683969_01.jpg', 1, '2020-12-28 05:46:27', 1, 200),
(7, 2, 'Roast Stuffed Chicken', 'Fresh farm chicken roasted with Italian spices and herbs and served with a side of mashed potatoes.', '250828528_roast.jpg', 1, '2020-12-28 05:49:18', 2, 450),
(8, 2, 'Beef Lasagna', 'Lasagna made with lean ground beef, whole wheat lasagna noodles, prepared sauce, and plenty of mozzarella cheese.', '528260677_lasagna.jpg', 1, '2020-12-28 05:54:58', 2, 470),
(9, 2, 'Chicken Pot Pie', 'Savory pie filled with cooked chicken, onion, carrot, and peas in a creamy sauce. With a flaky, buttery crust, it\'s comfort food at its finest.\r\n', '695427509_PotPie.jpg', 1, '2020-12-28 06:00:23', 2, 320),
(10, 3, 'Quesadilla', 'Soft tortillas with chicken filling served with sour cream', '481639070_quesadilla.jpg', 1, '2020-12-28 06:02:28', 2, 280),
(11, 3, 'Crispy Fried Chicken', 'Fresh farm grown chicken dipped in a spicy batter and fried to crispiness.', '129862901_kfc.jpg', 0, '2020-12-28 06:04:37', 2, 300),
(12, 3, 'Hawaiian Veggie pizza', 'Pizza topped with pineapple, veggies, tomato sauce and cheese.', '598333795_pizza.jpg', 1, '2020-12-28 06:18:14', 1, 350),
(13, 3, 'Thai green curry and white rice', 'Chicken in rich Thai-style green gravy served with boiled veggies and white rice.', '905112933_curry.jpg', 1, '2020-12-28 06:20:11', 2, 250),
(14, 4, 'Chocolate Mud Cake', 'Soft decadent Chocolate cake topped with Chocolate ganache and seasonal berries.\r\n', '947187797_cake.jpg', 1, '2020-12-28 06:22:04', 1, 120),
(15, 4, 'Lemon-Scented Blueberry Cupcakes', 'Studded with plump, juicy fresh berries and light flavor of lemon.', '431264972_Lemon-Blueberry-Cupcakes-FB.jpg', 1, '2020-12-28 06:23:19', 1, 100),
(16, 4, 'Sizzling brownie', 'Hot fudgy brownie served in a skillet topped with chocolate sauce and ice cream.', '152751847_sizzling-brownie.jpg', 1, '2020-12-28 06:27:50', 1, 170),
(17, 4, 'Blueberry Cheesecake', 'Creamy cheesecake topped with real blueberries and syrup.', '917032891_Blueberry-Cheesecake..jpg', 1, '2020-12-28 06:32:09', 1, 150),
(20, 3, 'Paneer Tikka', 'Made from chunks of paneer marinated in spices and grilled in a tandoor.', '960259654_Paneer-Tikka.jpg', 1, '2021-01-05 07:52:39', 1, 0),
(21, 2, 'Mushroom Soup', 'Tasty Mushroom Soup', '679448645_Paneer-Tikka.jpg', 1, '2021-01-05 02:00:49', 1, 0),
(22, 3, 'Butter Chicken', 'Chunks of grilled chicken (tandoori chicken) cooked in a smooth buttery & creamy tomato based gravy served with Naan.', '743263275_butter-chicken.jpg', 1, '2021-01-05 08:16:09', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dish_cart`
--

CREATE TABLE `dish_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dish_detail_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dish_cart`
--

INSERT INTO `dish_cart` (`id`, `user_id`, `dish_detail_id`, `qty`, `added_on`) VALUES
(1, 4, 0, 1, '2021-01-07 12:40:32'),
(2, 5, 0, 1, '2021-01-07 12:57:40'),
(3, 5, 7, 1, '2021-01-07 01:09:54'),
(4, 5, 11, 16, '2021-01-07 01:10:10'),
(5, 5, 10, 4, '2021-01-07 01:29:23'),
(6, 5, 6, 1, '2021-01-07 01:29:23'),
(7, 5, 24, 9, '2021-01-07 01:30:03'),
(8, 5, 1, 1, '2021-01-07 01:30:20'),
(9, 5, 19, 13, '2021-01-07 01:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `dish_details`
--

CREATE TABLE `dish_details` (
  `id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish_details`
--

INSERT INTO `dish_details` (`id`, `dish_id`, `attribute`, `price`, `status`, `added_on`) VALUES
(1, 3, 'Full', 210, 1, '2020-06-19 10:25:47'),
(6, 1, 'Full', 250, 1, '2020-06-20 00:00:00'),
(7, 2, 'Full', 200, 1, '2020-06-20 00:00:00'),
(8, 6, 'Full', 325, 1, '2020-12-28 05:46:27'),
(9, 7, 'Full', 350, 1, '2020-12-28 05:49:18'),
(10, 8, 'Full', 450, 1, '2020-12-28 05:54:58'),
(11, 9, 'Full', 350, 1, '2020-12-28 06:00:23'),
(12, 10, 'Full', 320, 1, '2020-12-28 06:02:28'),
(13, 11, 'Full', 320, 1, '2020-12-28 06:04:37'),
(14, 12, 'Full', 450, 1, '2020-12-28 06:18:14'),
(15, 13, 'Full', 280, 1, '2020-12-28 06:20:11'),
(16, 14, '1 kg', 1000, 1, '2020-12-28 06:22:04'),
(17, 14, 'Per Slice', 210, 1, '2020-12-28 06:22:04'),
(18, 15, 'Per piece', 100, 1, '2020-12-28 06:23:19'),
(19, 16, 'Full', 180, 1, '2020-12-28 06:27:50'),
(20, 17, 'Full', 1000, 1, '2020-12-28 06:32:09'),
(21, 17, 'Per Slice', 150, 1, '2020-12-28 06:32:09'),
(23, 20, 'Full', 350, 1, '2021-01-05 07:52:39'),
(24, 21, 'Full', 250, 1, '2021-01-05 02:00:49'),
(25, 22, 'Full', 320, 1, '2021-01-05 08:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `dish_details_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `gst` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `total_price` float NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `delivery_boy_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `password`, `status`, `added_on`) VALUES
(2, 'Shebon Shajan', 'shebon@gmail.com', '1234567890', 'shebon', 0, '2020-06-16 00:00:00'),
(4, 'Aleena', 'aleena@gmail.com', '1234567890', '1234', 1, '2021-01-07 11:30:07'),
(5, 'demo', 'demo@gmail.com', '1234567890', '123', 1, '2021-01-07 12:56:53');

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
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_cart`
--
ALTER TABLE `dish_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_details`
--
ALTER TABLE `dish_details`
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
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dish_cart`
--
ALTER TABLE `dish_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dish_details`
--
ALTER TABLE `dish_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
