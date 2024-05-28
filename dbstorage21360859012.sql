-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2024 at 05:19 PM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbstorage21360859012`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `diet` varchar(255) DEFAULT NULL,
  `habitat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `species`, `age`, `diet`, `habitat`) VALUES
(3, 'Leo', 'Lion', 5, 'Carnivore', 'Savannah'),
(4, 'Bella', 'Elephant', 12, 'Herbivore', 'Forest'),
(6, 'Kiki', 'Kangaroo', 3, 'Herbivore', 'Grassland'),
(7, 'Oscar', 'Owl', 4, 'Carnivore', 'Forest'),
(8, 'Milo', 'Penguin', 7, 'Carnivore', 'Antarctica'),
(9, 'Lola', 'Panda', 6, 'Herbivore', 'Bamboo Forest'),
(10, 'Rocky', 'Raccoon', 2, 'Omnivore', 'Forest'),
(11, 'Zara', 'Zebra', 5, 'Herbivore', 'Savannah'),
(12, 'Nemo', 'Clownfish', 2, 'Omnivore', 'Coral Reef'),
(13, 'Dumbo', 'Elephant', 7, 'Herbivore', 'Savannah'),
(14, 'Ella', 'Elephant', 15, 'Herbivore', 'Forest'),
(15, 'şimşek', 'at', 3, 'tahıl', 'çiftlik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'baykuş', '$2y$10$izNXvARhG.rgSX07YRhBkOW5CpCvisMA7l.H8GxqU85V2LXcQwjJe'),
(2, 'kenan', '$2y$10$Sbw4HPQ9B3R6i9aHBpr1xuXq1hUc4bxvZmQMbib3bELDmGB69Br2K'),
(3, 'q1', '$2y$10$whVx06JFoHlZVv5eQnXGu.dbek7zj9aM.Xqb4MNt61cugvdGBU5Xu'),
(4, 'fatma', '$2y$10$biUAmvAOgmhfYmi91reBcujOZSBn/6s0qwKo/TcvRMNQkKpvYGGyO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
