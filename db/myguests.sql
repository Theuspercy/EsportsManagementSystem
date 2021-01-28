-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 04:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esports_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `myguests`
--

CREATE TABLE `myguests` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myguests`
--

INSERT INTO `myguests` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(4, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(5, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(6, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(8, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(10, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(11, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(12, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(13, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(14, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(15, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(16, 'Randy', 'Cuizon', 'Randy23', '2021-01-26 07:00:40'),
(18, 'Tim', 'Cuizon', 'timon@gmail.com', '2021-01-26 08:26:55'),
(19, 'Walters', 'Cuizon', 'Walters0128', '2021-01-26 08:37:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
