-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 05:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `rectangle`
--

CREATE TABLE `rectangle` (
  `id` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `average` float NOT NULL,
  `area` int(11) NOT NULL,
  `square_area` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rectangle`
--

INSERT INTO `rectangle` (`id`, `width`, `height`, `average`, `area`, `square_area`, `created_at`) VALUES
(1, 8, 5, 6.5, 40, 1600, '2020-10-17 14:21:43'),
(2, 5, 6, 5.5, 30, 900, '2020-10-17 14:23:48'),
(3, 23, 23, 23, 529, 279841, '2020-10-17 14:24:46'),
(4, 8, 9, 8.5, 72, 5184, '2020-10-17 14:37:09'),
(5, 2, 9, 5.5, 18, 324, '2020-10-17 14:40:29'),
(6, 5, 6, 5.5, 30, 900, '2020-10-17 14:56:46'),
(7, 3, 5, 4, 15, 225, '2020-10-17 15:32:47'),
(8, 54, 6, 30, 324, 104976, '2020-10-17 15:33:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rectangle`
--
ALTER TABLE `rectangle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rectangle`
--
ALTER TABLE `rectangle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
