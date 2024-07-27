-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 01:40 PM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `airplane`
--

CREATE TABLE `airplane` (
  `name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `arrivaltime` date NOT NULL,
  `departuretime` date NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `passengerleft` int(11) NOT NULL,
  `baggage` varchar(10) NOT NULL,
  `terminal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airplane`
--

INSERT INTO `airplane` (`name`, `id`, `arrivaltime`, `departuretime`, `origin`, `destination`, `passengerleft`, `baggage`, `terminal`) VALUES
('abc', 1, '2023-06-01', '2023-06-03', 'mashad', 'terhran', 9, '10', '12'),
('amir', 2, '2023-06-22', '2023-06-30', 'mashad', 'tehran', 1, '2', '3'),
('amir1', 3, '2023-06-07', '2023-06-24', 'tehran', 'mashad', 123, '12', '1'),
('mahan', 4, '2023-07-01', '2023-07-11', 'zahedan', 'sari', 100, '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `airplane_reservation`
--

CREATE TABLE `airplane_reservation` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nationalcode` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `id` int(11) NOT NULL,
  `airplaneid` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airplane_reservation`
--

INSERT INTO `airplane_reservation` (`firstname`, `lastname`, `nationalcode`, `birthdate`, `id`, `airplaneid`, `gender`) VALUES
('am', 'dvi', '1111111111', '2023-06-20', 1, '1', 'male'),
('am', 'a', '1111111111', '2023-06-28', 2, '1', 'male'),
('1', '1', '1111111111', '2023-06-23', 3, '1', 'male'),
('1', '1', '1111111111', '2023-06-23', 4, '1', 'male'),
('1', '1', '1111111111', '2023-06-29', 5, '1', 'male'),
('1', '1', '1111111111', '2023-06-28', 6, '1', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `company_registration`
--

CREATE TABLE `company_registration` (
  `phoneNumber` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `companyname` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_registration`
--

INSERT INTO `company_registration` (`phoneNumber`, `email`, `password`, `companyname`, `city`, `state`, `id`) VALUES
('11111111111', 'amirmahdidamavandi@gmail.com', '11', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `name` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `roomtype` varchar(60) NOT NULL,
  `arrivaltime` date NOT NULL,
  `departuretime` date NOT NULL,
  `guestnumber` varchar(2) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`name`, `id`, `roomtype`, `arrivaltime`, `departuretime`, `guestnumber`, `city`) VALUES
('amirmahdidamavandi', 3, 'lux', '2023-06-09', '2023-06-03', '5', 'mashad');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_reservation`
--

CREATE TABLE `hotel_reservation` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `nationalcode` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hotelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_reservation`
--

INSERT INTO `hotel_reservation` (`id`, `firstname`, `lastname`, `phonenumber`, `nationalcode`, `gender`, `hotelid`) VALUES
(1, 'aa', 'aa', '11111111116', '1111111111', 'male', 1),
(2, 'a', 'aa', '11111111119', '1111111111', 'male', 2),
(3, 'aa', 'a', '11111111119', '1111111111', 'male', 4);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `name` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `arrivaltime` date NOT NULL,
  `departuretime` date NOT NULL,
  `origin` varchar(60) NOT NULL,
  `destination` varchar(60) NOT NULL,
  `passengerleft` int(11) NOT NULL,
  `capacity` varchar(10) NOT NULL,
  `coupenumber` varchar(10) NOT NULL,
  `coupecapacity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`name`, `id`, `arrivaltime`, `departuretime`, `origin`, `destination`, `passengerleft`, `capacity`, `coupenumber`, `coupecapacity`) VALUES
('abcde', 2, '2023-06-01', '2023-06-03', 'mashad', 'terhran', 20, '2000', '1', '20'),
('behrouz', 3, '2023-06-09', '2023-06-23', 'mashad', 'gorgan', 9, '1000', '1', '20');

-- --------------------------------------------------------

--
-- Table structure for table `train_reservation`
--

CREATE TABLE `train_reservation` (
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `nationalcode` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `id` int(11) NOT NULL,
  `trainid` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train_reservation`
--

INSERT INTO `train_reservation` (`firstname`, `lastname`, `nationalcode`, `birthdate`, `id`, `trainid`, `gender`) VALUES
('amir', 'damavandi', '111111111', '2023-06-29', 1, 2, 'male'),
('a', 'a', '1111111111', '0011-11-11', 2, 1, 'female'),
('amirmahdi', 'damavandi', '1111111111', '2023-06-17', 3, 2, 'male'),
('a', 'a', '1111111111', '1111-11-11', 4, 2, 'male'),
('a', 'a', '1111111111', '2023-07-03', 5, 1, 'male'),
('a', 'a', '1111111111', '2023-07-11', 6, 3, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `phoneNumber` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`phoneNumber`, `email`, `password`, `firstname`, `lastname`, `address`, `city`, `state`, `zipcode`, `dob`, `id`) VALUES
('11111111111', 'amirmahdidamavandi@gmail.com', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('11111111112', 'amirmahdidamavandi1000@gmail.com', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airplane`
--
ALTER TABLE `airplane`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airplane_reservation`
--
ALTER TABLE `airplane_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_registration`
--
ALTER TABLE `company_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_reservation`
--
ALTER TABLE `hotel_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_reservation`
--
ALTER TABLE `train_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`phoneNumber`,`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
