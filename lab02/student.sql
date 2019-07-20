-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 12:27 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `FreindlyName` varchar(50) NOT NULL,
  `Linkaddress` varchar(50) NOT NULL,
  `HTML` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `FreindlyName`, `Linkaddress`, `HTML`) VALUES
(1, 'Control User Types', 'Control_UTypes.php', ''),
(2, 'Control Users', 'Control_Users.php', ''),
(3, 'Add Course', 'AddCourse.php', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(10) NOT NULL,
  `UserType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`ID`, `FullName`, `Email`, `DOB`, `Password`, `UserType_id`) VALUES
(1, 'Nada', 'nada', '2018-02-01', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`ID`, `Name`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_pages`
--

CREATE TABLE `usertype_pages` (
  `ID` int(11) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL,
  `ordervalue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype_pages`
--

INSERT INTO `usertype_pages` (`ID`, `UserTypeID`, `PageID`, `ordervalue`) VALUES
(8, 1, 3, 1),
(9, 2, 1, 1),
(10, 2, 2, 2),
(11, 2, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserType_id` (`UserType_id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserTypeID` (`UserTypeID`),
  ADD KEY `PageID` (`PageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`UserType_id`) REFERENCES `usertypes` (`ID`);

--
-- Constraints for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD CONSTRAINT `usertype_pages_ibfk_1` FOREIGN KEY (`PageID`) REFERENCES `pages` (`ID`),
  ADD CONSTRAINT `usertype_pages_ibfk_2` FOREIGN KEY (`UserTypeID`) REFERENCES `usertypes` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
