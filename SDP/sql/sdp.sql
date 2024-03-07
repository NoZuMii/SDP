-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2024 at 04:05 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `CourseID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `course_category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_Pic` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Badge` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Badge1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Badge2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `completed_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `example1` text COLLATE utf8mb4_general_ci NOT NULL,
  `example2` text COLLATE utf8mb4_general_ci NOT NULL,
  `example3` text COLLATE utf8mb4_general_ci NOT NULL,
  `example4` text COLLATE utf8mb4_general_ci NOT NULL,
  `example5` text COLLATE utf8mb4_general_ci NOT NULL,
  `explanation1` text COLLATE utf8mb4_general_ci NOT NULL,
  `explanation2` text COLLATE utf8mb4_general_ci NOT NULL,
  `explanation3` text COLLATE utf8mb4_general_ci NOT NULL,
  `explanation4` text COLLATE utf8mb4_general_ci NOT NULL,
  `explanation5` text COLLATE utf8mb4_general_ci NOT NULL,
  `question1` text COLLATE utf8mb4_general_ci NOT NULL,
  `question2` text COLLATE utf8mb4_general_ci NOT NULL,
  `question3` text COLLATE utf8mb4_general_ci NOT NULL,
  `question4` text COLLATE utf8mb4_general_ci NOT NULL,
  `question5` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer1` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer2` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer3` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer4` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer5` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`CourseID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Feedback_Text` text COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` date NOT NULL,
  `reply` varchar(9999) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`feedbackID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `userID`, `Feedback_Text`, `subject`, `date_created`, `reply`) VALUES
('F2024022965e09c255c003', 'U2024022165d5c74cdd285', 'student1', 'this is student 1', '2024-02-29', 'hi student1'),
('F2024030565e6de88551c5', 'U2024022665dc99349f0b6', 'I have a problem', 'teacher:Help ', '2024-03-05', ''),
('F2024030565e6def9bebf1', 'U2024022165d5c729cb922', 'there\'s has been a problem when adding quiz, can you fix it?', 'error for quiz', '2024-03-05', ''),
('F2024030565e6e7217e35b', 'U2024022165d5c74cdd285', 'the contents are wrong for php', 'Teacher: the contents are wrong', '2024-03-05', 'Thank you for your feedback, we will be working on it as soon as possible.');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

DROP TABLE IF EXISTS `leaderboard`;
CREATE TABLE IF NOT EXISTS `leaderboard` (
  `LeaderboardID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `QuizID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`LeaderboardID`),
  KEY `userID` (`userID`),
  KEY `QuizID` (`QuizID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `QuizID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quiz_category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `answer_option` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`QuizID`),
  KEY `CourseID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `AccStatus` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Profile_Pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `gender`, `email`, `phone`, `birthday`, `password`, `AccStatus`, `role`, `Profile_Pic`) VALUES
('U2024022165d5c729cb922', 'teacher1', 'Female', 'teacher@teacher.com', '00001111222', '2013-12-14', '8d788385431273d11e8b43bb78f3aa41', 'Active', 'teacher', ''),
('U2024022165d5c74cdd285', 'student1', 'Male', 'student1@student.com', '00001111222', '2013-12-02', '5e5545d38a68148a2d5bd5ec9a89e327', 'Active', 'student', ''),
('U2024022165d5ff5cba215', 'admin', 'Male', 'admin@admin.com', '00001112222', '2013-12-13', '21232f297a57a5a743894a0e4a801fc3', 'Active', 'admin', ''),
('U2024022165d5ff927788d', 'student2', 'Male', 'student2@student.com', '00001111222', '2013-12-12', '213ee683360d88249109c2f92789dbc3', 'Active', 'premium', ''),
('U2024022665dc99349f0b6', 'testing', 'Male', 'testing@testing.com', '01232021655', '2013-12-17', '827ccb0eea8a706c4c34a16891f84e7b', 'active', 'student', ''),
('U2024030165e2138cd5bfd', 'lim yang', 'Male', 'lim.heng.yan@gmail.com', '01232021655', '2013-12-12', 'e10adc3949ba59abbe56e057f20f883e', 'Active', 'student', ''),
('U2024030565e6e2dbe9789', 'student3', 'Male', 'student3@student.com', '12341234123', '2013-12-04', '8e4947690532bc44a8e41e9fb365b76a', 'active', 'student', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_ibfk_1` FOREIGN KEY (`QuizID`) REFERENCES `quiz` (`QuizID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `leaderboard_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
