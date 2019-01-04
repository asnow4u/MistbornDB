-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Nov 27, 2018 at 12:08 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_snowan`
--

-- --------------------------------------------------------

--
-- Table structure for table `Character`
--

CREATE TABLE `Character` (
  `cName` varchar(30) NOT NULL,
  `jName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Character`
--

INSERT INTO `Character` (`cName`, `jName`) VALUES
('Kar', 'Inquisitor'),
('Marsh', 'Inquisitor'),
('OreSeur', 'Kandra'),
('Tensoon', 'Kandra'),
('Sazed', 'Keeper'),
('Tindwyl', 'Keeper'),
('Rashek', 'Lord Ruler'),
('Elend', 'Mistborn'),
('Kelser', 'Mistborn'),
('Vin', 'Mistborn'),
('Zane', 'Mistborn'),
('Allrianne', 'Rioter'),
('Yomen', 'Seer'),
('Clubs', 'Smoker'),
('Breeze', 'Soother'),
('Ham', 'Thug'),
('Spook', 'Tineye'),
('Straff', 'Tineye');

-- --------------------------------------------------------

--
-- Table structure for table `Job`
--

CREATE TABLE `Job` (
  `jName` varchar(30) NOT NULL,
  `mName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Job`
--

INSERT INTO `Job` (`jName`, `mName`) VALUES
('Mistborn', 'All'),
('Seer', 'Atium'),
('Slider', 'Bendalloy'),
('Soother', 'Brass'),
('Seeker', 'Bronze'),
('Pulser', 'Cadmium'),
('Leecher', 'Chromium'),
('Smoker', 'Copper'),
('Oracle', 'Electrum'),
('Augur', 'Gold'),
('Lurcher', 'Iron'),
('Nicroburst', 'Nicrosil'),
('Kandra', 'None'),
('Thug', 'Pewter'),
('Coinshot', 'Steel'),
('Tineye', 'Tin'),
('Rioter', 'Zinc');

-- --------------------------------------------------------

--
-- Table structure for table `Metals`
--

CREATE TABLE `Metals` (
  `mName` varchar(30) NOT NULL,
  `Group` varchar(30) NOT NULL,
  `Effect` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Metals`
--

INSERT INTO `Metals` (`mName`, `Group`, `Effect`) VALUES
('All', 'All', 'Both'),
('Aluminum', 'Enhancement', 'Internal'),
('Atium', 'God', 'Internal'),
('Bendalloy', 'Temporal', 'External'),
('Brass', 'Mental', 'External'),
('Bronze', 'Mental', 'Internal'),
('Cadmium', 'Tempral', 'External'),
('Chromium', 'Enhancement', 'External'),
('Copper', 'Mental', 'Internal'),
('Duralumin', 'Enhancement', 'Internal'),
('Electrum', 'Temproral', 'Internal'),
('Gold', 'Tempral', 'Internal'),
('Iron', 'Physical', 'External'),
('Nicrosil', 'Enhancement', 'External'),
('Pewter', 'Physical', 'Internal'),
('Steel', 'Physical', 'External'),
('Tin', 'Physical', 'Internal'),
('Zinc', 'Mental', 'External');

-- --------------------------------------------------------

--
-- Table structure for table `Power`
--

CREATE TABLE `Power` (
  `pName` varchar(30) NOT NULL,
  `Discription` varchar(100) NOT NULL,
  `mName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Power`
--

INSERT INTO `Power` (`pName`, `Discription`, `mName`) VALUES
('Allomancy', 'Can Hear Allomantic Pulses', 'Bronze'),
('Allomancy', 'Dampens Emotions', 'Brass'),
('Allomancy', 'Enflames Emotions', 'Zinc'),
('Allomancy', 'Enhances Current Metal Burned', 'Duralumin'),
('Allomancy', 'Enhanses Allomantic Burn of Target', 'Nicrosil'),
('Allomancy', 'Hide Allomantic Pulses', 'Copper'),
('Allomancy', 'Increases Phsical Abilities', 'Pewter'),
('Allomancy', 'Increases Senses', 'Tin'),
('Allomancy', 'Pulls on Nearby Metals', 'Iron'),
('Allomancy', 'Pushes on Nearby Metals', 'Steel'),
('Allomancy', 'Reveals Your Future', 'Electrum'),
('Allomancy', 'Reveals Your Past Self', 'Gold'),
('Allomancy', 'Slows Down Time', 'Cadmium'),
('Allomancy', 'Speeds Up Time', 'Bendalloy'),
('Allomancy', 'Wipes Allomantic Reserves of Target', 'Chromium'),
('Allomancy', 'Wipes Internal Allomantic Reserves', 'Aluminum');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `username` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`username`, `firstName`, `lastName`, `email`, `password_hash`, `age`) VALUES
('johndoe', 'John', 'Doe', 'john@example.com', '', NULL),
('johndoes', 'John', 'Doe', 'john@example.com', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Character`
--
ALTER TABLE `Character`
  ADD PRIMARY KEY (`cName`),
  ADD KEY `jName` (`jName`) USING BTREE;

--
-- Indexes for table `Job`
--
ALTER TABLE `Job`
  ADD PRIMARY KEY (`jName`) USING BTREE,
  ADD KEY `mName` (`mName`);

--
-- Indexes for table `Metals`
--
ALTER TABLE `Metals`
  ADD PRIMARY KEY (`mName`);

--
-- Indexes for table `Power`
--
ALTER TABLE `Power`
  ADD PRIMARY KEY (`Discription`) USING BTREE,
  ADD KEY `mName` (`mName`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Power`
--
ALTER TABLE `Power`
  ADD CONSTRAINT `Power_ibfk_1` FOREIGN KEY (`mName`) REFERENCES `Metals` (`mName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
