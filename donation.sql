-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 05:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(120) NOT NULL,
  `pass` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `pass`) VALUES
(1, 'islamic_center@nyu.com', 'Islamic Center', '123'),
(2, 'xyz_center@nyu.com', 'Xyz Center', '123'),
(3, 'donation_center@nyu.com', 'Donation Center', '123');

-- --------------------------------------------------------

--
-- Table structure for table `donatedmeals`
--

CREATE TABLE `donatedmeals` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `center` varchar(100) NOT NULL,
  `mealtype` varchar(50) NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donatedmeals`
--

INSERT INTO `donatedmeals` (`id`, `sid`, `center`, `mealtype`, `date`, `time`, `status`) VALUES
(99, 1, 'Islamic Center', 'meal', '2021-05-01', '11:02:40', 0),
(100, 1, 'Islamic Center', 'meal', '2021-05-01', '11:02:45', 0),
(101, 1, 'Xyz Center', 'meal', '2021-05-01', '11:02:45', 0),
(102, 2, 'Xyz Center', 'meal', '2021-05-01', '11:02:45', 1),
(103, 1, 'Islamic Center', 'meal', '2021-05-02', '12:48:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ahmeda', 'ahmed@nyu.com', '123'),
(2, 'Ismail', 'ismail@nyu.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donatedmeals`
--
ALTER TABLE `donatedmeals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donatedmeals`
--
ALTER TABLE `donatedmeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
