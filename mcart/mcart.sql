-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 07:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_category` varchar(30) NOT NULL,
  `product_id_category` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_category`, `product_id_category`) VALUES
(1, 'Mobile', '87d17f4624a514e81dc7c8e016a7405c'),
(2, 'Laptop', '146bdebb324a64d327b1dde22a07d0bd'),
(5, 'SmartPhone', '80f17919c49e182f49032d9f876ce064'),
(6, 'Utensil', '6d9d4edc0931ac8c35672f25a8f441f0'),
(13, 'test', '098f6bcd4621d373cade4e832627b4f6'),
(14, 'testaasss', '3982db1ed3dfdd6ebb013b86544e5ccd');

-- --------------------------------------------------------

--
-- Table structure for table `produts`
--

CREATE TABLE `produts` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_meta` text NOT NULL,
  `product_image` text NOT NULL,
  `product_description` text NOT NULL,
  `product_qty` int(3) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `product_h_id` varchar(255) NOT NULL,
  `seller_id` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vh` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSeller` varchar(5) NOT NULL DEFAULT 'false',
  `mobile` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `vh`, `created_at`, `isSeller`, `mobile`) VALUES
(2, 'SAILAZA', '', 'PRASAD', 'sailazaprasad123@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '5b1585b0fc9727347198658a0187e21a', '2019-08-12 15:27:52', 'false', 8018162756),
(3, 'SAILAZA', '', 'PRASAD', 'sailazaprasad@outlook.com', 'e807f1fcf82d132f9bb018ca6738a19f', '531f0fbde2d58b93838cbd7b61e65de1', '2019-08-12 15:35:10', 'false', 8018162757);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_category`);

--
-- Indexes for table `produts`
--
ALTER TABLE `produts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produts`
--
ALTER TABLE `produts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
