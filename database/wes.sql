-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2020 at 08:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wes`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `ansID` int(10) NOT NULL AUTO_INCREMENT,
  `ansDate` datetime NOT NULL,
  `ansText` longtext NOT NULL,
  `qID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`ansID`),
  KEY `userID_2` (`userID`),
  KEY `answers_ibfk_1` (`qID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ansID`, `ansDate`, `ansText`, `qID`, `userID`) VALUES
(4, '2020-09-03 00:00:00', 'Hi Aristotle, I find the elliptical bike to work best for me.', 2, 2),
(5, '2020-09-06 00:00:00', 'You can get really nice ones at Nairobi sports house', 4, 2),
(7, '2020-09-07 00:52:53', 'in my opinion smart gyms is the best in Kenya', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qID` int(10) NOT NULL AUTO_INCREMENT,
  `qDate` datetime NOT NULL,
  `qText` longtext NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`qID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qID`, `qDate`, `qText`, `userID`) VALUES
(2, '2020-09-02 00:00:00', 'what is the best type of cardio?', 3),
(4, '2020-09-06 00:00:00', 'Where can I get good dumbbells in Nairobi', 3),
(6, '2020-09-07 00:47:37', 'what is the best gym in Nairobi', 3),
(7, '2020-09-09 23:42:09', 'What is the besthome exercise routine?', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `userPassword` longtext NOT NULL,
  `userType` varchar(6) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `userEmail`, `userPassword`, `userType`) VALUES
(2, 'Swole Gym Bro', 'noel@gmail.com', '$2y$10$m24nU4peAZPLvz2uAsVZH.i8uY6zjuPCj.6OrbFLBtI.yL5Th81xa', 'Expert'),
(3, 'Aristotle', 'aodhiambo@gmail.com', '$2y$10$m.KeeqjpEmzRkacPYfbYtOcusH53pnO5Um3Bf7AcFB45RZ9WzaPay', 'User'),
(4, 'Hardman Dave', 'dave@gmail.com', '$2y$10$XmX19OTz2pUqkZrojrUtjuOJdaEneemZ9323Ixp8PPUMAUgh4woFC', 'Expert');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`qID`) REFERENCES `questions` (`qID`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
