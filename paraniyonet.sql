-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 11:01 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paraniyonet`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Id` int(11) NOT NULL,
  `Owner` int(11) NOT NULL,
  `Name` varchar(140) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Balance` decimal(15,2) NOT NULL,
  `Currency` varchar(10) NOT NULL,
  `Type` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Id`, `Owner`, `Name`, `Balance`, `Currency`, `Type`) VALUES
(2, 1, 'Pırasam', 1000, 'TL', 'Nakit'),
(16, 2, 'Deneme hesabı', 1200, 'TL', 'Kart'),
(17, 1, 'üro hesabım', 1162, 'EURO', 'Nakit'),
(21, 1, 'Kredi kartı', 16916, 'TL', 'Kart'),
(25, 4, 'Hesap', 1500, 'TL', 'Nakit'),
(26, 4, 'Hesap 2', 2950, 'TL', 'Kart'),
(28, 5, 'Hesap', 1000, 'TL', 'Nakit'),
(29, 5, 'Hesap 1', 2000, 'TL', 'Kart'),
(30, 5, 'Hesap 2', 2000, 'EURO', 'Nakit'),
(31, 6, 'Maaş', 1450, 'TL', 'Nakit'),
(32, 6, 'Birikim', 2950, 'TL', 'Kart'),
(33, 6, 'Hesap 3', 4900, 'EURO', 'Nakit'),
(35, 7, 'Birikim', 3450, 'TL', 'Kart'),
(36, 7, 'Döviz', 5000, 'EURO', 'Nakit'),
(37, 7, 'Maaş', 1000, 'TL', 'Nakit');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES
(1, 'Akaryakıt'),
(2, 'Sağlık'),
(3, 'Market'),
(4, 'Ulaşım'),
(5, 'Hediye'),
(6, 'Restoran');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `Id` int(11) NOT NULL,
  `Account` int(11) NOT NULL,
  `Amount` decimal(15,2) NOT NULL,
  `PreviousBalance` decimal(15,2) NOT NULL,
  `NextBalance` decimal(15,2) NOT NULL,
  `IncomeDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`Id`, `Account`, `Amount`, `PreviousBalance`, `NextBalance`, `IncomeDate`) VALUES
(1, 2, 2, 360, 362, '2020-12-23'),
(2, 2, 3, 362, 365, '2020-12-23'),
(3, 2, 4660, 340, 5000, '2020-12-24'),
(4, 2, 5, 4995, 5000, '2020-12-24'),
(5, 2, 100, 5000, 5100, '2020-12-24'),
(6, 2, 150, 6000, 6150, '0000-00-00'),
(7, 2, 150, 6150, 6300, '2020-12-26'),
(8, 16, 98, 1202, 1300, '2020-12-26'),
(9, 17, 100, 1112, 1212, '2020-12-29'),
(10, 2, 6300, -300, 6000, '2021-01-03'),
(12, 26, 2000, 950, 2950, '2021-01-03'),
(13, 25, 400, 1100, 1500, '2021-01-03'),
(14, 28, 500, 1000, 1500, '2021-01-03'),
(15, 31, 500, 1500, 2000, '2021-01-03'),
(16, 31, 500, 950, 1450, '2021-01-03'),
(17, 36, 650, 4350, 5000, '2021-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `spendings`
--

CREATE TABLE `spendings` (
  `Id` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `Amount` decimal(15,2) NOT NULL,
  `Account` int(11) NOT NULL,
  `AvailableBalance` decimal(15,2) NOT NULL,
  `OldBalance` decimal(15,2) NOT NULL,
  `SpendingDate` date NOT NULL,
  `Business` varchar(140) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spendings`
--

INSERT INTO `spendings` (`Id`, `Category`, `Amount`, `Account`, `AvailableBalance`, `OldBalance`, `SpendingDate`, `Business`) VALUES
(21, 1, 22, 2, 648, 670, '2020-12-21', 'sasa'),
(22, 1, 222, 2, 426, 648, '2020-12-21', 'kfc'),
(23, 1, -5, 2, 431, 426, '2020-12-22', 'sasa'),
(24, 1, 1, 2, 430, 431, '2020-12-22', 'sasa'),
(25, 1, 50, 2, 380, 430, '2020-12-23', 'sasa'),
(26, 1, 22, 2, 358, 380, '2020-12-23', 'sasa'),
(27, 3, 25, 2, 340, 365, '2020-12-24', 'Migros'),
(28, 4, 5, 2, 4995, 5000, '2020-12-24', 'İETT'),
(29, 5, 100, 2, 6200, 6300, '2020-12-26', 'YESODE'),
(30, 1, 100, 16, 1200, 1300, '2020-12-26', 'sasa'),
(31, 1, 50, 17, 1162, 1212, '2020-12-29', 'sasa'),
(32, 1, 250, 25, 1250, 1500, '2021-01-03', 'Shell'),
(33, 6, 50, 26, 950, 1000, '2021-01-03', 'Burger King'),
(34, 3, 100, 25, 1150, 1250, '2021-01-03', 'Migros'),
(35, 3, 50, 25, 1100, 1150, '2021-01-03', 'bim'),
(36, 1, 50, 32, 2950, 3000, '2021-01-03', 'BP'),
(37, 4, 100, 33, 4900, 5000, '2021-01-03', 'THY'),
(38, 1, 50, 31, 950, 1000, '2021-01-03', 'sasa'),
(39, 1, 50, 35, 3450, 3500, '2021-01-03', 'Shell'),
(40, 4, 150, 36, 4350, 4500, '2021-01-03', 'THY');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Email` varchar(140) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `GSM` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `GSM`) VALUES
(1, 'Yunus', 'Cebe', 'yunusemrecebe@gmail.com', '123', 5554717400),
(2, 'Deneme', 'Test', 'test@deneme.net', '123', 6549871229),
(4, 'Mahmut Ahmet', 'Tuncer', 'mahmut@tuncer.net', '123', 9876543210),
(5, 'Erkin', 'Koray', 'koray@erkin.net', '123', 4567891230),
(6, 'Ahmet Mehmet', 'Çakar', 'ahmet@cakar.net', '123', 1234567890),
(7, 'Fatih Deniz', 'Karaca', 'fatih@karaca.net', '123', 3692581470);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Owner` (`Owner`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Account` (`Account`);

--
-- Indexes for table `spendings`
--
ALTER TABLE `spendings`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Account` (`Account`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `spendings`
--
ALTER TABLE `spendings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`Owner`) REFERENCES `users` (`Id`);

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_ibfk_1` FOREIGN KEY (`Account`) REFERENCES `accounts` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `spendings`
--
ALTER TABLE `spendings`
  ADD CONSTRAINT `spendings_ibfk_1` FOREIGN KEY (`Account`) REFERENCES `accounts` (`Id`),
  ADD CONSTRAINT `spendings_ibfk_2` FOREIGN KEY (`Category`) REFERENCES `categories` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
