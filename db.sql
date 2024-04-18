-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 05:16 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship_201905`
--
CREATE DATABASE IF NOT EXISTS `internship_201905` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `internship_201905`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `address`, `flag`, `created_date`, `updated_date`) VALUES
(3, 'Thura', 'thura@gmail.com', 'Yangon', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Aung Aung', 'aung@gmail.com', 'Mandalay', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Nyein Chan', 'chan@gmail.com', 'Tamwe', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Htet Aung', 'ha@gmail.com', 'Dawei', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Nilar', 'nilar@gmail.com', 'Myeik', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Win Win', 'Win@gmail.com', 'Yangon', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Aung kabar', 'kabar@gmail.com', 'Mandalay', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Nyein Chan', 'chan@gmail.com', 'Tamwe', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Myat', 'myat@gmail.com', 'Dawei', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Hein Min', 'hein@gmail.com', 'Myeik', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
