-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 07:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(250) NOT NULL,
  `creat_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `name`, `user_id`, `creat_at`) VALUES
(136, 'vmvvn ', 56, '2023-01-29 14:08:08'),
(138, 'xssx', 56, '2023-01-29 14:09:35'),
(139, 'sxsxs', 56, '2023-01-29 14:09:37'),
(140, 'xsxsx', 56, '2023-01-29 14:09:39'),
(141, 'xsxsx', 56, '2023-01-29 14:09:41'),
(143, 'ffdfdff', 58, '2023-01-29 20:35:21'),
(144, 'dsdsds', 58, '2023-01-29 20:35:23'),
(145, 'sddsdd', 58, '2023-01-29 20:35:24'),
(146, 'sddd', 58, '2023-01-29 20:35:26'),
(147, 'ddd', 58, '2023-01-29 20:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(100) NOT NULL,
  `folder_id` int(100) NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `user_id`, `folder_id`, `is_done`, `created_at`, `status`) VALUES
(75, 'cccc', 52, 126, 0, '2023-01-29 13:47:02', 0),
(78, 'fhgfffg', 55, 128, 0, '2023-01-29 14:01:18', 0),
(79, 'fgfgfgfg', 55, 128, 0, '2023-01-29 14:01:21', 0),
(80, 'ffdfdff', 55, 130, 0, '2023-01-29 14:01:24', 0),
(87, 'cscsccsc', 56, 132, 0, '2023-01-29 14:05:43', 0),
(88, 'xsxsxsx', 56, 133, 0, '2023-01-29 14:05:46', 0),
(89, 'dcdcd', 56, 133, 0, '2023-01-29 14:05:48', 0),
(90, 'dcdcddc', 56, 135, 0, '2023-01-29 14:05:52', 0),
(96, 'dsdsdsd', 56, 141, 0, '2023-01-29 14:12:17', 0),
(98, 'dfffff', 56, 141, 0, '2023-01-29 14:12:22', 0),
(100, 'dsdsdsd', 58, 143, 0, '2023-01-29 20:35:38', 0),
(102, 'sdddsdsd', 58, 144, 0, '2023-01-29 20:35:44', 0),
(103, 'asasasas', 58, 146, 0, '2023-01-29 20:35:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) UNSIGNED NOT NULL,
  `username` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_admins` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `is_admins`) VALUES
(48, 'admin', 'admin@email.com', '$2y$10$nEu72M4f8uIcDQ16mmfpf.Qg8jlMj7oJE4HiVahbQfZdmooy8qr4S', '2023-01-29 13:13:45', 1),
(56, 'reza', 'reza@gmail.com', '$2y$10$dkxfSRwTFQr4.NVfXqnOte/vWS5xiuQ0k4qEma34mjhhUzH.rd1XS', '2023-01-29 14:04:54', 0),
(57, 'reza', 'reaalizadeh3036@email.com', '$2y$10$//LRJW5SuJZatTne709Qr.E3j7stLDzLjnrF1iG90hxzA.r8vwuRu', '2023-01-29 20:33:07', 0),
(58, 'reza', 'rezaalizadeh@email.com', '$2y$10$e/m9MJY12nWjvWm2AvAVEOFpXLjDrv5H59xKoq39NP8rRqzILMp36', '2023-01-29 20:35:09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
