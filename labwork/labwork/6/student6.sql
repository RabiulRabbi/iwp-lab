-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 11:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `student6`
--

CREATE TABLE `student6` (
  `id` int(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `s_id` int(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `birthday` varchar(30) NOT NULL,
  `p_address` varchar(30) NOT NULL,
  `per_address` varchar(30) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `blood` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `c_password` varchar(30) NOT NULL,
  `fav_language` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student6`
--

INSERT INTO `student6` (`id`, `fname`, `lname`, `email`, `s_id`, `department`, `phone`, `birthday`, `p_address`, `per_address`, `religion`, `gender`, `blood`, `password`, `c_password`, `fav_language`) VALUES
(29, 'Delowar Hossin', 'islam', 'rabiulislam12362@gmail.com', 4, 'cse', 1784014307, '2022-05-04', 'trishal', 'bogura', 'Islam', 'male', 'A+', '2222', '2222', 'HTML PHP ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student6`
--
ALTER TABLE `student6`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student6`
--
ALTER TABLE `student6`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
