-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 05:16 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghawaddi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookcar`
--

CREATE TABLE `bookcar` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `daddress` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcar`
--

INSERT INTO `bookcar` (`id`, `cname`, `name`, `mobile`, `email`, `paddress`, `daddress`, `pdate`, `ddate`) VALUES
(33, 'Renault Duster', 'df', 4536, 'hffd@gmail.com', 'fwdf', 'dfd', '2017-07-01', '2017-07-04'),
(34, 'Mercedez Benz', 'ff', 9307, 'fefrf@gmail.com', 'dscdf', 'dfd', '2017-07-18', '2017-07-26'),
(35, 'Nissan Micra', 'Harman', 9592546326, 'harmanghawaddi8@gmail.com', 'V.p.o-Ghawaddi,LDH', 'V.p.o-Ghawaddi,LDH', '2017-07-04', '2017-07-08'),
(37, 'Renault Duster', 'Harman', 9592546326, 'harman@gmail.com', 'V.p.o-Ghawaddi,LDH', 'V.p.o-Ghawaddi,LDH', '2017-07-04', '2017-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cnumber` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `seats` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `cname`, `cnumber`, `company`, `city`, `type`, `seats`, `price`, `image`, `description`) VALUES
(1, 'Mercedez Benz', 'PB03-1582', 'Nissan', 'Punjab', 'h', 5, 800, 'Mercedez.jpg', 'Mercedez first significant aircraft engine,and commercial product of any sort,was the Mercedez inline-six liquid-cooled engine of 1918,known for good fuel economy and high attitude performance.With German rearmoment in the 1930.'),
(2, 'Nissan Micra', 'PB04-2345', 'Nissan', 'Punjab', 'h', 4, 1000, 'Nissan-Micra.jpg', 'The first car which Nissan Micra successfully produced and the car which launched Nissan on the road to automobile production was based on the Austin 7 and licensed from the Austin Motor Company in Birmingham,England.'),
(5, 'Renault Duster', 'PB03-2682', 'Toyata', 'Punjab', 'h', 4, 1200, 'Renault-Duster.jpg', 'Renault Duster was established as a business entity following a restructing of the Rapp Motor aircraft manufacturing firm in 1917.After the end of World War in 1918 ,Renault Duster was forced to cease aircraft-engine production by the terms of the Versatile Armist.'),
(6, 'BMW S20', 'PB64-3763', 'Nissan', 'Punjab', 'h', 5, 800, 'BMW.jpg', 'The Factory in Munich made ample use o forced labor:foreign civilians,prisoners of war and inmates of the concentration camp Dachau.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `company`, `email`, `phone`, `message`) VALUES
(35, 'Harman', 'ghawaddi', 'harman@gmail.com', 9592546326, 'Hi'),
(36, 'mm', 'jj', 'harman@gmail.com', 555, '574guyg hb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`) VALUES
(3, 'Harman', 'harmansingh@gmail.com', '$2y$10$Kc3CuoX7e2dGmD3L2a/gk.aD61FyQJs0ZSzG/hxpL817l9p5sImVW');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `dob`, `address`, `city`, `state`, `country`) VALUES
(5, 'Harman', 'harmansingh@gmail.com', '$2y$10$93TOUANujfENg.9m1w4EieFql3RzU.eW1GJX77FKsqm5XnDdwynYC', 9592546326, '1997-11-15', 'V.p.o-Ghawaddi', 'Ludhiana', 'Punjab', 'India'),
(7, 'jfijds', 'harman@gmail.com', '$2y$10$97ZjbgAskkh/hHJlAd9zFugOpjpXdcqVaoz3uWr7BJoBfUWEwahF6', 546547, '1997-03-12', 'er', 'ef', 'dfed', 'tg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookcar`
--
ALTER TABLE `bookcar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookcar`
--
ALTER TABLE `bookcar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
