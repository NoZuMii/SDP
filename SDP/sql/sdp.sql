-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2024 at 01:50 PM
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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `AnswerID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `QuestionID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Answer_text` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`AnswerID`),
  KEY `QuestionID` (`QuestionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

DROP TABLE IF EXISTS `badge`;
CREATE TABLE IF NOT EXISTS `badge` (
  `BadgeID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `BadgeName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `BadgePic` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `CourseID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `badgeReq` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`BadgeID`),
  KEY `CourseID` (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `ChapterID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `CourseID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `example` text COLLATE utf8mb4_general_ci NOT NULL,
  `Explanation` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ChapterID`),
  KEY `courseID` (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapter_answer`
--

DROP TABLE IF EXISTS `chapter_answer`;
CREATE TABLE IF NOT EXISTS `chapter_answer` (
  `ChapterAnswerID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ChapterQuestionID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ChapterAnswerID`),
  KEY `ChapterQuestionID` (`ChapterQuestionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapter_question`
--

DROP TABLE IF EXISTS `chapter_question`;
CREATE TABLE IF NOT EXISTS `chapter_question` (
  `ChapterQuestionID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ChapterID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Question_text` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `choice` int NOT NULL,
  `sn` int NOT NULL,
  PRIMARY KEY (`ChapterQuestionID`),
  KEY `ChapterID` (`ChapterID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `CourseID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_Description` text COLLATE utf8mb4_general_ci NOT NULL,
  `Course_Pic` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Course_Create_Date` date NOT NULL,
  PRIMARY KEY (`CourseID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courseprogress`
--

DROP TABLE IF EXISTS `courseprogress`;
CREATE TABLE IF NOT EXISTS `courseprogress` (
  `ProgressID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `CourseID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Progress_Points` int NOT NULL,
  PRIMARY KEY (`ProgressID`),
  KEY `userID` (`userID`),
  KEY `CourseID` (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `earnedbadge`
--

DROP TABLE IF EXISTS `earnedbadge`;
CREATE TABLE IF NOT EXISTS `earnedbadge` (
  `EarnbadgeID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `BadgeID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`EarnbadgeID`),
  KEY `UserID` (`userID`),
  KEY `BadgeID` (`BadgeID`)
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
  `reply` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`feedbackID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

DROP TABLE IF EXISTS `leaderboard`;
CREATE TABLE IF NOT EXISTS `leaderboard` (
  `LeaderboardID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `QuizID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `score` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`LeaderboardID`),
  KEY `userID` (`userID`),
  KEY `QuizID` (`QuizID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `QuestionID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `QuizID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `choice` int NOT NULL,
  `sn` int NOT NULL,
  PRIMARY KEY (`QuestionID`),
  KEY `QuizID` (`QuizID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `QuizName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `QuizID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `QuizCategory` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Quiz_Pic` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Quiz_Desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`QuizID`),
  KEY `userID` (`userID`)
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
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `gender`, `email`, `phone`, `birthday`, `password`, `AccStatus`, `role`) VALUES
('U2024022165d5c729cb922', 'teacher1', 'Female', 'teacher@teacher.com', '00001111222', '2013-12-14', '8d788385431273d11e8b43bb78f3aa41', 'Active', 'teacher'),
('U2024022165d5c74cdd285', 'student1', 'Male', 'student1@student.com', '00001111222', '2013-12-02', '5e5545d38a68148a2d5bd5ec9a89e327', 'Active', 'student'),
('U2024022165d5ff5cba215', 'admin', 'Male', 'admin@admin.com', '00001111222', '2013-12-13', '21232f297a57a5a743894a0e4a801fc3', 'Active', 'admin'),
('U2024022165d5ff927788d', 'student2', 'Male', 'student2@student.com', '00001111222', '2013-12-12', '213ee683360d88249109c2f92789dbc3', 'Active', 'premium');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `question` (`QuestionID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `badge`
--
ALTER TABLE `badge`
  ADD CONSTRAINT `badge_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chapter_answer`
--
ALTER TABLE `chapter_answer`
  ADD CONSTRAINT `chapter_answer_ibfk_1` FOREIGN KEY (`ChapterQuestionID`) REFERENCES `chapter_question` (`ChapterQuestionID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chapter_question`
--
ALTER TABLE `chapter_question`
  ADD CONSTRAINT `chapter_question_ibfk_1` FOREIGN KEY (`ChapterID`) REFERENCES `chapter` (`ChapterID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `courseprogress`
--
ALTER TABLE `courseprogress`
  ADD CONSTRAINT `courseprogress_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `courseprogress_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `earnedbadge`
--
ALTER TABLE `earnedbadge`
  ADD CONSTRAINT `earnedbadge_ibfk_1` FOREIGN KEY (`BadgeID`) REFERENCES `badge` (`BadgeID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `earnedbadge_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`QuizID`) REFERENCES `quiz` (`QuizID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
