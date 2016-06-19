-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 02:47 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerID` int(255) NOT NULL,
  `answer` longtext NOT NULL,
  `upvotes` int(11) NOT NULL,
  `downvotes` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `replierID` varchar(255) NOT NULL,
  `questionID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerID`, `answer`, `upvotes`, `downvotes`, `date`, `replierID`, `questionID`) VALUES
(1, 'Java is a programming language', 0, 0, '2016-05-19T15:02:03+01:00', '1', '1'),
(2, 'Java is a high level programming language.', 0, 0, '2016-05-19T15:04:20+01:00', '1234567890', '1'),
(4, 'These are methods that end with a return statement', 0, 0, '2016-05-19T21:42:57+01:00', '1', '227671919-1717'),
(5, 'Return methods are simply what their names imply- methods that return something.', 0, 0, '2016-05-20T08:40:55+01:00', '1234567890', '227671919-1717');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `commenterName` varchar(255) NOT NULL,
  `questionID` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `title` varchar(255) NOT NULL,
  `question` longtext NOT NULL,
  `status` text NOT NULL,
  `asker` varchar(255) NOT NULL,
  `questionID` varchar(255) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `downvotes` int(11) NOT NULL DEFAULT '0',
  `date` varchar(255) NOT NULL,
  `answers` int(11) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`title`, `question`, `status`, `asker`, `questionID`, `upvotes`, `downvotes`, `date`, `answers`, `tags`) VALUES
('What is java?', 'I was wondering what java is. A programming language or an operating system or what?', 'unanswered', 'Michael Ozoemena', '1', 0, 0, '2016-05-18T15:35:48+01:00', 0, 'Java'),
('what are return methods?', '', 'unanswered', 'Michael Ozoemena', '227671919-1717', 0, 0, '2016-05-19T13:04:33+01:00', 0, 'java, methods'),
('How to be a good programmer', '', 'unanswered', 'Michael Ozoemena', '257141818-5656', 0, 0, '2016-05-18T18:17:54+01:00', 0, 'programming, learning, self-development'),
('How do you get methods in java? ', '', 'unanswered', 'Obinna Chimezie Neville', '290081919-1010', 0, 0, '2016-05-19T12:57:33+01:00', 0, 'java, methods'),
('How to be a great programmer?', 'I am a young programming enthusiast and I really do love programming. I would love if anyone can give me advice on how to be a good programmer. What are the steps I need to take, are there special foods to eat? Special Music? Special Movies? Special Books? Special walking steps? I may sound a bit funny but really, that''s how detailed I would love the instructions to be.', 'unanswered', 'Michael Ozoemena', '315692424-0303', 0, 0, '2016-05-23T23:43:55+01:00', 0, 'programming, learning, self-development');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` varchar(255) NOT NULL,
  `randnum` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `randnum`, `name`) VALUES
('1', '7', 'Michael Ozoemena'),
('1234567890', 'SN1234', 'Obinna Chimezie Neville'),
('777', '7', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `FK_REPLIERID` (`replierID`),
  ADD KEY `FK_QUESTIONID` (`questionID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `FK_QUESTIONID` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`),
  ADD CONSTRAINT `FK_REPLIERID` FOREIGN KEY (`replierID`) REFERENCES `students` (`studentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
