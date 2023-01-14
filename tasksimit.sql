-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2023 at 12:53 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasksimit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `username`, `password`, `salt`) VALUES
(1, 'admin', 'adminpassword', 'nosalt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `role`, `subject`) VALUES
(19, 'dsmetin@mail.ru', 'mypass', 'nosalt', 'Учитель', 'Информатика'),
(20, 'teacher@mail.ru', 'hispass', 'nosalt', 'Учитель', 'Биология'),
(21, 'another@mail.ru', 'anotherpass', 'nosalt', 'Ученик', ''),
(22, 'else@mail.ru', 'elsepass', 'nosalt', 'Ученик', '');

-- --------------------------------------------------------

--
-- Table structure for table `биология/0`
--

CREATE TABLE `биология/0` (
  `id` int(6) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `mark` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `биология/0`
--

INSERT INTO `биология/0` (`id`, `user`, `subject`, `task`, `description`, `file`, `comment`, `mark`) VALUES
(1, 'teacher@mail.ru', 'биология', 'Аоаоаоао', 'мммм', NULL, NULL, NULL),
(2, 'another@mail.ru', 'биология', NULL, NULL, NULL, NULL, NULL),
(3, 'else@mail.ru', 'биология', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `информатика/0`
--

CREATE TABLE `информатика/0` (
  `id` int(6) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `mark` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `информатика/0`
--

INSERT INTO `информатика/0` (`id`, `user`, `subject`, `task`, `description`, `file`, `comment`, `mark`) VALUES
(1, 'dsmetin@mail.ru', 'информатика', 'Some info', 'Text', NULL, NULL, NULL),
(2, 'another@mail.ru', 'информатика', NULL, NULL, NULL, NULL, NULL),
(3, 'else@mail.ru', 'информатика', NULL, NULL, NULL, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `информатика/1`
--

CREATE TABLE `информатика/1` (
  `id` int(6) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `mark` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `информатика/1`
--

INSERT INTO `информатика/1` (`id`, `user`, `subject`, `task`, `description`, `file`, `comment`, `mark`) VALUES
(1, 'dsmetin@mail.ru', 'информатика', 'Второе задание', 'Описание', 'firstone.pdf', NULL, NULL),
(2, 'another@mail.ru', 'информатика', NULL, NULL, NULL, NULL, NULL),
(3, 'else@mail.ru', 'информатика', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `биология/0`
--
ALTER TABLE `биология/0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `информатика/0`
--
ALTER TABLE `информатика/0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `информатика/1`
--
ALTER TABLE `информатика/1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `биология/0`
--
ALTER TABLE `биология/0`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `информатика/0`
--
ALTER TABLE `информатика/0`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `информатика/1`
--
ALTER TABLE `информатика/1`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
