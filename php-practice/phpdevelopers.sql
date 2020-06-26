-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 07:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdevelopers`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_avater` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_email`, `user_phone`, `user_address`, `user_avater`) VALUES
(1, 'juitanjina', '60149a289a3623cd214943af2892e103f4bddafb', 'juitanjina3@gmail.com', '01916142503', 'Narayanganj, Dhaka', 'tanjina.png'),
(2, 'homayra', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'homayra@gmail.com', '01916142503', 'Sonargaon', ''),
(3, 'juthy', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'juthy@yahoo.com', '01916142588', 'Mirpur, Dhaka', ''),
(4, 'sathi', 'c09035fd9e4febba0b786b75f953d1d97453a05a', 'sathi@gmail.com', '01614250332', 'Bandar', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_avater` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_email`, `user_phone`, `user_address`, `user_avater`) VALUES
(1, 'tanjinajui', '60149a289a3623cd214943af2892e103f4bddafb', 'tanjinajui@gmail.com', '01521261268', 'Narayanganj', ''),
(30, 'jui', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jui@gmail.com', '01612525138', 'Dhaka', ''),
(31, 'homayra', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'homayra@gmail.com', '01916142503', 'Sonargaon', ''),
(32, 'homayra', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'homayra@gmail.com', '01916142503', 'Sonargaon', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
