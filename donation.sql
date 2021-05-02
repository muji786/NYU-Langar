-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 02, 2021 at 01:24 PM
-- Server version: 5.7.32
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `langar`
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
(92345681, 'islamic_center@nyu.edu', 'Islamic Center', '123'),
(92345682, 'xyz_center@nyu.edu', 'Xyz Center', '123'),
(92345683, 'donation_center@nyu.edu', 'Donation Center', '123');

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
(103, 1, 'Islamic Center', 'meal', '2021-05-02', '12:48:22', 0),
(104, 1, 'Islamic Center', 'meal', '2021-05-02', '01:04:36', 1),
(105, 1, 'Islamic Center', 'meal', '2021-05-02', '01:06:27', 1);

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
(12345679, 'Ahmad Arshad', 'asa200@nyu.edu', '123'),
(12345680, 'Dan O Sullivan', 'dbo3@nyu.edu', '123');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92345678;

--
-- AUTO_INCREMENT for table `donatedmeals`
--
ALTER TABLE `donatedmeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345678;
