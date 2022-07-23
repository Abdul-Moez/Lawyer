-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 08:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Start Time` varchar(255) NOT NULL,
  `End Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Id`, `Name`, `Email`, `Category`, `PhoneNo`, `Date`, `Start Time`, `End Time`) VALUES
(1, 'test', 'test@gmail.com', 'Civil Lawyer', '03000000000', '2022/May/Fri', '18:1:thPM', ''),
(2, 'test', 'test@gmail.com', 'Divorce Lawyer', '03000000000', '2022/May/Tue', '18:1:th', ''),
(3, 'test', 'test@gmail.com', 'Divorce Lawyer', '03000000000', '2022/May/Tue', '18:1:th', ''),
(4, 'test', 'test@gmail.com', 'Divorce Lawyer', '03000000000', '2022/May/Tue', '18:1:thPM', ''),
(5, 'test', 'test@gmail.com', 'Divorce Lawyer', '03000000000', '2022-06-21', '19:17', '20:17');

-- --------------------------------------------------------

--
-- Table structure for table `client_query`
--

CREATE TABLE `client_query` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Lawyer_id` int(11) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_query`
--

INSERT INTO `client_query` (`id`, `User_id`, `Lawyer_id`, `Message`) VALUES
(1, 1, 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `client_review`
--

CREATE TABLE `client_review` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Profession` varchar(255) NOT NULL,
  `Review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_review`
--

INSERT INTO `client_review` (`Id`, `Name`, `Profession`, `Review`) VALUES
(1, 'test1', 'test1', 'best1'),
(2, 'test2', 'test2', 'best2'),
(3, 'test3', 'test3', 'best3'),
(4, 'test4', 'test4', 'best4'),
(5, 'test5', 'test5', 'best5'),
(6, 'test6', 'test6', 'best6');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`Id`, `Email`) VALUES
(1, 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `Degree` varchar(255) NOT NULL,
  `Experience` varchar(255) NOT NULL,
  `SucessStories` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Profile` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`Id`, `Name`, `Title`, `Email`, `PhoneNo`, `Education`, `Degree`, `Experience`, `SucessStories`, `Description`, `Profile`, `Password`, `Role`) VALUES
(1, 'Lawyer', 'Divorce Lawyer', 'lawyer@gmail.com', '03000000000', 'Lawyer Education', 'Lawyer Degree', 'Lawyers Experience', 'Lawyers Success Stories', 'Lawyers Description', 'user.jpeg', 'f51b5bcabe00df1d2b199321c8890c55', '2'),
(2, 'lawyer2', 'Divorce Lawyer', 'lawyer2@gmail.com', '03000000000', 'Lawyer Ki Parhai', 'Lawyer Ki Degree', 'Lawyer Ka Experience', 'Lawyer Ki Kahani', 'Lawyer Hun Yaar', 'user.jpeg', 'f51b5bcabe00df1d2b199321c8890c55', '2'),
(3, 'lawyer3', 'Divorce Lawyer', 'lawyer3@gmail.com', '03000000000', 'Lawyer Ki Parhai', 'Lawyer Ki Degree', 'Lawyer Ka Experience', 'Lawyer Ki Kahani', 'Lawyer Hun Yaar', 'user.jpeg', 'f51b5bcabe00df1d2b199321c8890c55', '2'),
(4, 'lawyer4', 'Divorce Lawyer', 'lawyer4@gmail.com', '03000000000', 'Lawyer Ki Parhai', 'Lawyer Ki Degree', 'Lawyer Ka Experience', 'Lawyer Ki Kahani', 'Lawyer Hun Yaar', 'user.jpeg', 'f51b5bcabe00df1d2b199321c8890c55', '2'),
(5, 'lawyer5', 'Divorce Lawyer', 'lawyer5@gmail.com', '03000000000', 'Lawyer Ki Parhai', 'Lawyer Ki Degree', 'Lawyer Ka Experience', 'Lawyer Ki Kahani', 'Lawyer Hun Yaar', 'user.jpeg', 'f51b5bcabe00df1d2b199321c8890c55', '2'),
(6, 'lawyer6', 'Divorce Lawyer', 'lawyer6@gmail.com', '03000000000', 'Lawyer Ki Parhai', 'Lawyer Ki Degree', 'Lawyer Ka Experience', 'Lawyer Ki Kahani', 'Lawyer Hun Yaar', 'user.jpeg', 'f51b5bcabe00df1d2b199321c8890c55', '2'),
(7, 'lawyer7', 'Divorce Lawyer', 'lawyer7@gmail.com', '03000000000', 'Lawyer Ki Parhai', 'Lawyer Ki Degree', 'Lawyer Ka Experience', 'Lawyer Ki Kahani', 'Lawyer Hun Yaar', 'user.jpeg', 'f51b5bcabe00df1d2b199321c8890c55', '2'),
(8, 'lawyer8', 'Civil Lawyer', 'lawyer8@gmail.com', '03000000000', 'Lawyer Ki Parhai', 'Lawyer Ki Degree', 'Lawyer Ka Experience', 'Lawyer Ki Kahani', 'Lawyer Hun Yaar', 'user.jpeg', 'f51b5bcabe00df1d2b199321c8890c55', '2');

-- --------------------------------------------------------

--
-- Table structure for table `success_clients`
--

CREATE TABLE `success_clients` (
  `Id` int(11) NOT NULL,
  `Lawyer_id` int(11) NOT NULL,
  `Client_id` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `success_clients`
--

INSERT INTO `success_clients` (`Id`, `Lawyer_id`, `Client_id`, `Status`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL DEFAULT '1',
  `Status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Email`, `Password`, `Role`, `Status`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '0', '1'),
(2, 'User', 'user@gmail.com', '5a30c9609b52fe348fb6925896e061de', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `client_query`
--
ALTER TABLE `client_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_review`
--
ALTER TABLE `client_review`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `success_clients`
--
ALTER TABLE `success_clients`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_query`
--
ALTER TABLE `client_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_review`
--
ALTER TABLE `client_review`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `success_clients`
--
ALTER TABLE `success_clients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
