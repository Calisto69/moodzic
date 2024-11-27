-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2024 at 07:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moodzics`
--

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

CREATE TABLE `musics` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `singer` varchar(200) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `create_dt` datetime NOT NULL,
  `filename` varchar(200) NOT NULL,
  `original_filename` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `fav` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`id`, `name`, `singer`, `category`, `create_dt`, `filename`, `original_filename`, `path`, `duration`, `fav`, `user_id`) VALUES
(5, 'Nobody Gets Me', 'SZA', 1, '2024-11-21 15:11:40', 'd5f14f2fe0c19c7a144e.mp3', 'Nobody Gets Me - SZA.mp3', './uploads/musics', '00:02:58', 0, 2),
(6, 'Dreams', 'Bazzi', 2, '2024-11-26 06:33:29', '8fb0e67604f8b4b32f07.mp3', 'Dreams - Bazzi.mp3', './uploads/musics', '00:02:27', 0, 4),
(8, 'Dreams', 'Bazzi', 2, '2024-11-27 05:58:32', '27e2a0b06818b15ff529.mp3', 'Dreams - Bazzi.mp3', './uploads/musics', '00:02:27', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `create_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `role`, `create_dt`) VALUES
(2, 'ken', 'ken', 'ken@gmail.com', 'c3e14c011f85baed8a89c19013e01243', 1, '2024-11-21 15:00:40'),
(3, 'admin', 'admin', 'admin@gmail.com', '7488e331b8b64e5794da3fa4eb10ad5d', 2, '2024-11-22 02:05:20'),
(4, 'dann', 'dann', 'dann@gmail.com', 'f1784dbfc297c085a3136c37eaea977c', 1, '2024-11-26 06:31:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `musics`
--
ALTER TABLE `musics`
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
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
