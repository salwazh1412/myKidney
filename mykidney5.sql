-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2017 at 05:05 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mykidney5`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `User_ID` int(10) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Blood_Type` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Diabetes` varchar(3) NOT NULL,
  `LowPressure` varchar(3) NOT NULL,
  `HighPressure` varchar(3) NOT NULL,
  `Test` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`User_ID`, `Name`, `Email`, `Phone`, `Blood_Type`, `City`, `Date_of_Birth`, `Diabetes`, `LowPressure`, `HighPressure`, `Test`) VALUES
(5, 'Najwa', 'Najwa@hotmail.com', 0067647897, 'AB', 'Makkah', '2017-12-08', 'No', 'No', 'No', 'Test9'),
(10, 'So', 'So@hotmail.com', 0000034556, 'ab', 'Makkah', '2017-12-12', 'No', 'No', 'No', 'Test2'),
(11, 'Sal', 'Sal@hotmail.com', 0000032455, 'ab', 'Jeddah', '2017-12-12', 'No', 'No', 'No', 'Test3'),
(14, 'Sal3', 'Najwa1@hotmail.com', 0009877776, 'o', 'Makkah', '2017-12-12', 'No', 'No', 'No', 'Test4');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `ID` int(11) NOT NULL,
  `Patient_ID` int(10) NOT NULL,
  `Donor_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `User_ID` int(10) NOT NULL,
  `Name` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Blood_Type` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Diabetes` varchar(3) NOT NULL,
  `LowPressure` varchar(3) NOT NULL,
  `HighPressure` varchar(3) NOT NULL,
  `Test` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`User_ID`, `Name`, `Email`, `Phone`, `Blood_Type`, `City`, `Date_of_Birth`, `Diabetes`, `LowPressure`, `HighPressure`, `Test`) VALUES
(2, 'Rawan', 'rawan@hotmail.com', 0000034556, 'ab', 'Makkah', '2017-12-12', 'No', 'No', 'No', 'Test2'),
(3, 'Maryam', 'mhghamdi@hotmail.com', 0537562948, 'O+', 'Makkah', '1992-11-13', 'No', 'No', 'No', 'test1'),
(8, 'Amal2', 'Amal2@hotmail.com', 0000123345, 'a', 'Abha', '2017-12-12', 'No', 'No', 'No', 'Test5'),
(12, 'maryam_ghamdi', 'maryam_ghamdi@hotmail.com', 0076635657, 'b', 'Makkah', '2017-12-12', 'No', 'No', 'No', 'Test6'),
(13, 'maryam_ghamd', 'maryam_ghamd@hotmail.com', 0008766735, 'b', 'Makkah', '2017-12-12', 'No', 'No', 'No', 'Test7'),
(19, 'Sal2', 'Sal2@hotmail.com', 0043565368, 'o', 'Jeddah', '2017-12-12', 'No', 'No', 'No', 'Test8');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `ID` int(11) NOT NULL,
  `Patients_ID` int(10) NOT NULL,
  `Donor_ID` int(10) NOT NULL,
  `Donor_Approval` tinyint(1) NOT NULL DEFAULT '0',
  `Sender` tinyint(1) NOT NULL DEFAULT '0',
  `Request_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`ID`, `Patients_ID`, `Donor_ID`, `Donor_Approval`, `Sender`, `Request_Date`) VALUES
(1, 2, 5, 0, 1, '2017-12-09 00:00:00'),
(2, 2, 10, 1, 2, '2017-12-04 00:00:00'),
(3, 12, 14, 1, 3, '2017-12-05 00:00:00'),
(4, 19, 14, 1, 1, '2017-12-11 00:00:00'),
(5, 8, 14, 0, 1, '2017-12-22 00:00:00'),
(6, 8, 14, 0, 2, '2017-12-10 00:00:00'),
(7, 3, 14, 0, 0, '2017-12-15 00:00:00'),
(8, 13, 11, 0, 1, '2017-12-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `User_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Name`, `Email`, `User_ID`) VALUES
('Salwa', 'Salwa@hotmail.com', 4),
('Amal', 'Amal@hotmail.com', 6),
('Jo', 'Jo@hotmail.com', 9),
('Sal4', 'Sal4@hotmail.com', 16),
('Najwa2', 'Najwa2@hotmail.com', 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `User_Name` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `User_Name`, `Password`, `Level`) VALUES
(1, 'Admin', '96f0f08c0188ba04898ce8cc465c19c4', 1),
(2, 'Rawan', 'e10adc3949ba59abbe56e057f20f883e', 3),
(3, 'Maryam', 'maryam', 3),
(4, 'Salwa', 'Salwa', 2),
(5, 'Najwa', 'Najwa', 4),
(6, 'Amal', 'Amal', 2),
(7, 'Najwa1', 'Najwa1', 3),
(8, 'Amal2', 'Amal2', 3),
(9, 'Jo', 'Jo', 2),
(10, 'So', 'So', 4),
(11, 'Sal', 'Sal', 4),
(12, 'maryam_ghamdi', 'meme', 3),
(13, 'maryam_ghamdi6', 'meme', 3),
(14, 'Sal3', 'Sal3', 4),
(16, 'Sal4', 'Sal4', 2),
(17, 'Najwa2', 'Najwa2', 2),
(19, 'Sal2', 'Sal2', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Patient_ID` (`Patient_ID`),
  ADD KEY `Donor_ID` (`Donor_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `Patients_ID` (`Patients_ID`),
  ADD KEY `Donor_ID` (`Donor_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`Patient_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`Donor_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`Patients_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`Donor_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
