-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 20, 2019 at 01:59 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aktivbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey_respondents`
--

CREATE TABLE `survey_respondents` (
  `RespondentID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `E-mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `survey_respondents`
--

TRUNCATE TABLE `survey_respondents`;
--
-- Dumping data for table `survey_respondents`
--

INSERT INTO `survey_respondents` (`RespondentID`, `FirstName`, `LastName`, `Address`, `E-mail`) VALUES
(1, 'John', 'Doe', 'Street 123, City', 'john.doe@example.se');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey_respondents`
--
ALTER TABLE `survey_respondents`
  ADD PRIMARY KEY (`RespondentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey_respondents`
--
ALTER TABLE `survey_respondents`
  MODIFY `RespondentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
