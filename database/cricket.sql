-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 02:40 AM
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
-- Database: `cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `admin_name`, `admin_pass`) VALUES
(1, 'Murtaza', '111');

-- --------------------------------------------------------

--
-- Table structure for table `batsman_career`
--

CREATE TABLE `batsman_career` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `matches_played` int(255) NOT NULL,
  `innings_batted` int(255) NOT NULL,
  `runs_scored` int(255) NOT NULL,
  `highest_score` int(11) NOT NULL,
  `average` int(255) NOT NULL,
  `strike_rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batsman_career`
--

INSERT INTO `batsman_career` (`id`, `name`, `matches_played`, `innings_batted`, `runs_scored`, `highest_score`, `average`, `strike_rate`) VALUES
(32, 'Ahmed', 0, 0, 0, 0, 0, 'asd'),
(33, '', 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `batting_ranks`
--

CREATE TABLE `batting_ranks` (
  `Id` int(255) NOT NULL,
  `Ranks` int(255) NOT NULL,
  `batsman_photo` varchar(255) NOT NULL,
  `Batsman_name` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batting_ranks`
--

INSERT INTO `batting_ranks` (`Id`, `Ranks`, `batsman_photo`, `Batsman_name`, `rating`) VALUES
(31, 23, 'images/newbanner.png', 'khans', 123),
(32, 3, 'images/newbanner.png', 'khans', 113);

-- --------------------------------------------------------

--
-- Table structure for table `bowler_career`
--

CREATE TABLE `bowler_career` (
  `id` int(255) NOT NULL,
  `NAMES` varchar(255) NOT NULL,
  `M` int(255) NOT NULL,
  `INN` int(255) NOT NULL,
  `RUNS` int(255) NOT NULL,
  `WICKETS` int(255) NOT NULL,
  `ECO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bowler_career`
--

INSERT INTO `bowler_career` (`id`, `NAMES`, `M`, `INN`, `RUNS`, `WICKETS`, `ECO`) VALUES
(21, 'Muhammad Jawwad', 2333, 12, 2400, 24, '29.99');

-- --------------------------------------------------------

--
-- Table structure for table `bowler_ranks`
--

CREATE TABLE `bowler_ranks` (
  `Id` int(255) NOT NULL,
  `Ranks` int(255) NOT NULL,
  `bowler_image` varchar(255) NOT NULL,
  `Bowler_Name` varchar(255) NOT NULL,
  `Rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bowler_ranks`
--

INSERT INTO `bowler_ranks` (`Id`, `Ranks`, `bowler_image`, `Bowler_Name`, `Rating`) VALUES
(9, 1, 'images/batsman2.png', 'jawwad', 12);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `team1` varchar(255) NOT NULL,
  `team2` varchar(255) NOT NULL,
  `result` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `team1`, `team2`, `result`, `status`) VALUES
(28, '2024-02-28', 'Royal Blaster', 'blaster', '', 0),
(32, '2024-03-01', 'Royal Blast', 'blaster', 'royal won the match', 1),
(33, '2024-02-28', '1dfds', 'blaster', 'royal won the match', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(255) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `playing_role` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `sex` varchar(300) NOT NULL,
  `country` varchar(500) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `matches` int(11) NOT NULL,
  `Innings` int(11) NOT NULL,
  `runs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `highest_wickets` varchar(255) NOT NULL,
  `average` int(11) NOT NULL,
  `strike_rate` int(11) NOT NULL,
  `economy` int(11) NOT NULL,
  `highest_score` int(11) NOT NULL,
  `batting` varchar(300) NOT NULL,
  `balling` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `agree_terms` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `Name`, `playing_role`, `age`, `sex`, `country`, `phone`, `password`, `matches`, `Innings`, `runs`, `wickets`, `highest_wickets`, `average`, `strike_rate`, `economy`, `highest_score`, `batting`, `balling`, `address`, `agree_terms`) VALUES
(17, 'Ahmed', 'All Rounder', 24, 'Female', 'pakistan', '923400028803', '111', 0, 0, 245, 0, '0', 0, 0, 0, 0, 'Right hand', 'Fast Bowling', 'wew', 1),
(19, 'mooro', 'Bowler', 14, 'Female', 'asdsa', '06669856666', '1', 0, 123, 0, 0, '0', 0, 0, 0, 0, 'Right hand', 'Spin Bowling', 'sdasad', 1),
(20, 'ali', 'all Rounder', 12, 'male', 'pakistan', '0987654321', '12', 123, 345, 466, 78, '56/7', 7777, 324, 777, 0, 'right', 'right arm', 'new campus', 1),
(22, 'malik', 'batsman', 24, 'Male', 'Pakistan', '732187489', '1', 123, 23, 245, 200, '2/30', 23, 245, 13, 3, 'Right Hand', 'Left Hans', 'MT khan road near new haji camp, Sultanabad, Karachi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `batsman_career`
--
ALTER TABLE `batsman_career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batting_ranks`
--
ALTER TABLE `batting_ranks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bowler_career`
--
ALTER TABLE `bowler_career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bowler_ranks`
--
ALTER TABLE `bowler_ranks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batsman_career`
--
ALTER TABLE `batsman_career`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `batting_ranks`
--
ALTER TABLE `batting_ranks`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bowler_career`
--
ALTER TABLE `bowler_career`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bowler_ranks`
--
ALTER TABLE `bowler_ranks`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
