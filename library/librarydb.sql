-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 02:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `publishedyear` year(4) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Availability` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `title`, `author`, `isbn`, `publishedyear`, `genre`, `reg_date`, `Availability`) VALUES
(1, 'The Maltese Falcon', 'Dashiell Hammett', '9780679722649', '1929', 'Crime', '2024-03-17 04:46:27', 'Available'),
(2, 'The Big Sleep', 'Raymond Chandler', '9780394758282', '1939', 'Crime', '2024-03-17 05:04:25', 'Available'),
(3, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', '9780307949486', '2005', 'Crime', '2024-03-17 07:14:35', 'Available'),
(4, 'Gone Girl', 'Gillian Flynn', '‎9780307588371 ', '2012', 'Crime', '2024-04-14 00:59:45', 'Available'),
(6, 'The Godfather', 'Mario Puzo', '9780451167712 ', '1969', 'Crime', '2024-04-14 01:14:59', 'Available'),
(7, 'In Cold Blood', 'Truman Capote', '9780679745587 ', '1965', 'Crime', '2024-04-14 01:17:41', 'Available'),
(9, 'The Silence of the Lambs', 'Thomas Harris', '0312022824 ', '1988', 'Crime', '2024-04-14 01:18:56', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `BookID` int(11) NOT NULL,
  `ISBN` int(20) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `PublicationYear` int(20) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Availability` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`BookID`, `ISBN`, `Title`, `Author`, `PublicationYear`, `Genre`, `Availability`) VALUES
(1, 2147483647, 'Career water project pretty rock.', 'Patricia\r\nRomero', 1989, 'Mystery', 'Borrowed'),
(2, 2147483647, 'Order activity hold especially.', 'Travis Jones', 1963, 'Fiction', 'Borrowed'),
(3, 2147483647, 'Money responsibility protect imagine on.', 'Nathan\r\nThompson', 1927, 'Biography', 'Borrowed'),
(4, 2147483647, 'Begin join partner stage.', 'Kimberly Buck', 1966, 'Fiction', 'Borrowed'),
(5, 2147483647, 'Ground name cell fund store player.', 'Steven\r\nLewis', 1925, 'Science Fiction', 'Borrowed'),
(6, 2147483647, 'Across cell drug.', 'Dan Clark', 2022, 'Fiction', 'Borrowed'),
(7, 2147483647, 'Property once growth born that.', 'Frederick Smith', 1959, 'Fiction', 'Borrowed'),
(8, 2147483647, 'From term foreign.', 'Kelsey Diaz', 1904, 'Fiction', 'Borrowed'),
(9, 2147483647, 'Red voice decision professor voice.', 'Marisa\r\nGonzalez', 1948, 'Science Fiction', 'Borrowed'),
(10, 2147483647, 'Put draw star.', 'Maria Frank', 2014, 'Non-Fiction', 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `tblborrowtransact`
--

CREATE TABLE `tblborrowtransact` (
  `TransactionID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `BorrowDate` date NOT NULL,
  `DueDate` date NOT NULL,
  `ReturnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblborrowtransact`
--

INSERT INTO `tblborrowtransact` (`TransactionID`, `BookID`, `StudentID`, `BorrowDate`, `DueDate`, `ReturnDate`) VALUES
(1, 1, 1, '2024-04-12', '2024-04-26', '2024-04-12'),
(2, 1, 1, '2024-04-12', '2024-04-26', '2024-04-12'),
(3, 1, 11, '2024-04-16', '2024-04-30', '2024-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Contactinfo` int(24) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentID`, `Username`, `Contactinfo`, `email`, `password`) VALUES
(1, 'Mr. Charles Lee', 2147483647, '', ''),
(11, 'Kenken', 2147483647, 'rashidsoriano@trimexcolleges.edu.ph', '$2y$10$AqIs4.Dey8HLtvlJoKO9lOPCulMhvwp98FryfQ4bbM481kxdNHASG'),
(12, 'Trixie ', 2147483647, 'trixie@gmail.com', '$2y$10$gc7kupEetZ9Ylc8gGdXa/.WzGZ4oqu1ibd5MZ4yS3vpYChlHnGagO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `tblborrowtransact`
--
ALTER TABLE `tblborrowtransact`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `BookID` (`BookID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblborrowtransact`
--
ALTER TABLE `tblborrowtransact`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblborrowtransact`
--
ALTER TABLE `tblborrowtransact`
  ADD CONSTRAINT `tblborrowtransact_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`),
  ADD CONSTRAINT `tblborrowtransact_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `tblstudents` (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
