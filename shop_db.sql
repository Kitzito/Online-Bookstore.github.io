-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 05:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `number`, `email`, `message`) VALUES
(3, 4, 'admin01', '1234567890', 'admin01@gmail.com', 'alpha testing'),
(4, 4, 'admin02', '0987654321', 'admin02@gmail.com', 'beta testing...'),
(5, 4, 'User01 ', '567982', 'user01@gmail.com', 'I write to ask which is better,  Flashpoint or Kingdom come? '),
(6, 4, 'User01 ', '852795', 'user01@gmail.com', 'Pls add Doom patrol to your store. '),
(7, 8, 'user02', '3564892', 'user02@gmail.com', 'Hello, I am user02'),
(8, 8, 'User02', '6978543554', 'user02@gmail.com', 'Hello there admin, I\'m user02🙏🤗😁');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(255) NOT NULL,
  `placed_on` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(14, 4, 'user02', '1234567890', 'user02@gmail.com', 'orange money', 'happicam cite,\r\n    45, buea, southwest,\r\n    cameroon, 1234', ', WATCHMEN (1), SWAMP THING (2)', 135, '07-05-23', 'completed'),
(15, 4, 'User01', '123456', 'user01@gmail.com', 'paypal', 'Molyko,\r\n    55, Buea, Southwest ,\r\n    Cameroon, 1234', ', THE RED MAGICIAN (6), ARKHAM ASYLUM (6), A MONSTER CALLS (2)', 490, '07-05-23', 'pending'),
(16, 4, 'User01', '99854367', 'user01@gmail.com', 'crypto currency', 'Eta palace,\r\n    69, Buea, Southwest,\r\n    Cameroon, +237', ', A MONSTER CALLS (3)', 150, '07-05-23', 'completed'),
(17, 4, 'User01', '999222444', 'user01@gmail.com', 'credit card', 'Eta palace,\r\n    58, Buea, Southwest ,\r\n    Cameroon, +237', ', WATCHMEN (2), SWAMP THING (4)', 270, '07-05-23', 'pending'),
(18, 8, 'user02', '549372', 'user02@gmail.com', 'paypal', 'El Palacio ,\r\n    44, Buea, Southwest,\r\n    Cameroon , +237', ', ARKHAM ASYLUM (1), WATCHMEN (3), THE ALCHEMIST (2)', 220, '08-05-23', 'pending'),
(19, 4, 'User01', '57697879', 'user01@gmail.com', 'mobile money', 'El Palacio ,\r\n    55, Buea, Southwest ,\r\n    Cameroon , +237', ', DARK 🌑 APOKOLIPS (5), NARUTO SHIPPUDEN (4), BORUTO NEXT GENERATIONS (3)', 575, '08-05-23', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(13, 'A MONSTER CALLS', 50, 'A Monster Calls.jpg'),
(14, 'THE RED MAGICIAN', 30, 'The Red Magician.jpg'),
(22, 'ARKHAM ASYLUM', 35, 'Arkham Asylum.jpeg'),
(23, 'FLASHPOINT', 75, 'FLASHPOINT.png'),
(24, 'SWAMP THING', 45, 'Swamp Thing.jpeg'),
(27, 'WATCHMEN', 45, 'Watchmen.jpeg'),
(28, 'THE ALCHEMIST', 25, 'The Alchemist.jpeg'),
(29, 'THE DA VINCI CODE', 90, 'The Da Vinci Code.jpeg'),
(30, 'THE ART OF WAR', 35, 'The Art of War.jpeg'),
(31, 'A TALE OF TWO CITIES', 20, 'A Tale of Two Cities.jpeg'),
(32, 'BURN', 15, 'Burn.jpg'),
(33, 'TIGERHEART', 10, 'Tigerheart.jpg'),
(35, 'NARUTO SHIPPUDEN', 45, '1680529714962.jpg'),
(36, 'BORUTO NEXT GENERATIONS', 40, '1683471517333.jpg'),
(37, 'DARK 🌑 APOKOLIPS', 55, '1682841500661.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(4, 'user01', 'user01@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(5, 'admin01', 'admin01@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(7, 'Hakeem', 'psalmist@gmail.com', '3e4e244173eda2fe5e08190118bbad15', 'user'),
(8, 'user02', 'user02@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(10, 'user03', 'user03@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
