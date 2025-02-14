-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 06:14 PM
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
-- Database: `preenrollmentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `loginID` int(11) NOT NULL,
  `student_number` varchar(257) NOT NULL,
  `user` varchar(257) NOT NULL,
  `pass` varchar(257) NOT NULL,
  `type` varchar(257) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`loginID`, `student_number`, `user`, `pass`, `type`) VALUES
(1, '21L-8708', 'raxx07', '1234', 'ADMIN'),
(3, '21L-0924', 'shirogane', 'yaiba', 'STUDENT'),
(5, '21L-9999', 'rengoku', 'rengoku', 'STUDENT'),
(6, '21L-99999', 'rengoku', 'rengoku', 'STUDENT'),
(7, '21L-999999', 'lisa', 'lisalisa', 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_number` varchar(257) NOT NULL,
  `student_name` varchar(257) NOT NULL,
  `course_year` varchar(257) NOT NULL,
  `payment` varchar(257) NOT NULL,
  `school_year` varchar(257) NOT NULL,
  `semester` varchar(257) NOT NULL,
  `status` varchar(257) NOT NULL,
  `preenrollment` varchar(257) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_number`, `student_name`, `course_year`, `payment`, `school_year`, `semester`, `status`, `preenrollment`) VALUES
('21L-0416', 'Elena of Avalor', '4TH YEAR', 'PARTIAL', '2023-2024', '1ST SEMESTER', 'Irregular', 'PRE-ENROLLED'),
('21L-0924', 'Demon Slayer', '4TH YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-0953', 'Makima San Katakana', '3RD YEAR', 'PARTIAL', '2022-2023', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-10000', 'Nezuko Kamado', '2ND YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-3596', 'Cleven Javier', '2ND YEAR', 'PARTIAL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-5523', 'Raxx of Infotech', '3RD YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-5922', 'Renson Placino', '2ND YEAR', 'PARTIAL', '2023-2024', '1ST SEMESTER', 'Irregular', 'PRE-ENROLLED'),
('21L-9999', 'Tanjiro Kamado', '2ND YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-99999', 'Rengoku San', '4TH YEAR', 'FULL', '2023-2024', '2ND SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-999999', 'Lisa', '4TH YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED');

-- --------------------------------------------------------

--
-- Table structure for table `subject_info`
--

CREATE TABLE `subject_info` (
  `subjectid` int(255) NOT NULL,
  `subject_code` varchar(257) NOT NULL,
  `student_number` varchar(257) NOT NULL,
  `subject_desc` varchar(257) NOT NULL,
  `units` varchar(257) NOT NULL,
  `section` varchar(257) NOT NULL,
  `day` varchar(257) NOT NULL,
  `time` varchar(257) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`subjectid`, `subject_code`, `student_number`, `subject_desc`, `units`, `section`, `day`, `time`) VALUES
(171, 'GEC 07', '21L-0924', 'Art Appreciation', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(172, 'GEC 13', '21L-0924', 'Literature of the Philippines', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(173, 'PE 004', '21L-0924', 'Team Sports and Games', '2', 'FL (Le)', 'We', '9:30 – 11:30'),
(174, 'ITE 08', '21L-0924', 'Data Structures and Algorithms', '2', 'FL (Le)', 'Mo', '17:00 – 19:00'),
(175, 'ITE 08', '21L-0924', 'Data Structures and Algorithms (LAB)', '1', 'FL (Lab)', 'Tu', '17:00 – 19:00'),
(176, 'ITE 09', '21L-0924', 'Quantitative Methods', '2', 'FL (Le)', 'MoWe', '7:30 – 8:30'),
(177, 'ITE 09', '21L-0924', 'Quantitative Methods (LAB)', '1', 'FL (Lab)', 'Fr', '10:30 – 13:30'),
(178, 'ITE 10', '21L-0924', 'Front-End Development', '2', 'FL (Le)', 'Mo', '13:00 – 16:00'),
(179, 'ITE 10', '21L-0924', 'Front-End Development (LAB)', '1', 'FL (Lab)', 'We', '13:30 – 16:30'),
(180, 'ITE 11', '21L-0924', 'Database Management Systems 2', '2', 'FL (Le)', 'We', '17:00 – 19:00'),
(181, 'ITE 11', '21L-0924', 'Database Management Systems 2 (LAB)', '1', 'FL (Lab)', 'Th', '16:30 – 19:30'),
(211, 'GEC 07', '21L-3596', 'Art Appreciation', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(212, 'GEC 13', '21L-3596', 'Literature of the Philippines', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(213, 'GEC 05', '21L-3596', 'Purposive Communication', '3', 'FL (Le)', 'MoWeFr', '12:30 – 14:30'),
(214, 'GEC 03', '21L-3596', 'Reading in the Philippine History', '3', 'FL (Le)', 'TuTh', '9:00 - 10:30'),
(215, 'GEC 02', '21L-3596', 'Understanding The Self', '3', 'FL (Le)', 'MoWeFr', '10:20 - 11:20'),
(216, 'PE 004', '21L-3596', 'Team Sports and Games', '2', 'FL (Le)', 'We', '9:30 – 11:30'),
(217, 'ITE 09', '21L-3596', 'Quantitative Methods', '2', 'FL (Le)', 'MoWe', '7:30 – 8:30'),
(248, 'GEC 02', '21L-10000', 'Understanding The Self', '3', 'FL (Le)', 'MoWeFr', '10:20 - 11:20'),
(249, 'GEC 03', '21L-10000', 'Reading in the Philippine History', '3', 'FL (Le)', 'TuTh', '9:00 - 10:30'),
(250, 'GEC 05', '21L-10000', 'Purposive Communication', '3', 'FL (Le)', 'MoWeFr', '12:30 – 14:30'),
(251, 'GEC 11', '21L-10000', 'Filipino sa Iba’t Ibang Disiplina', '3', 'FL (Le)', 'TuTh', '10:00 – 12:00'),
(252, 'PE 002', '21L-10000', 'Rhythmic Activities', '2', 'FL (Le)', 'Mo', '7:30 – 9:30'),
(253, 'ITE 02', '21L-10000', 'Computer Programming 1', '2', 'FL (Le)', 'MoWe', '14:30 – 16:30'),
(254, 'ITE 02', '21L-10000', 'Computer Programming 1 (LAB)', '1', 'FL (Lab)', 'TuTh', '14:30 – 16:30'),
(255, 'NST 02', '21L-10000', 'National Service Training Program 2', '3', 'FL (Le)', 'Fr', '13:30 – 16:00'),
(448, 'GEC 02', '21L-0416', 'Understanding The Self', '3', 'FL (Le)', 'MoWeFr', '10:20 - 11:20'),
(449, 'GEC 03', '21L-0416', 'Reading in the Philippine History', '3', 'FL (Le)', 'TuTh', '9:00 - 10:30'),
(450, 'GEC 05', '21L-0416', 'Purposive Communication', '3', 'FL (Le)', 'MoWeFr', '12:30 – 14:30'),
(451, 'GEC 11', '21L-0416', 'Filipino sa Iba’t Ibang Disiplina', '3', 'FL (Le)', 'TuTh', '10:00 – 12:00'),
(452, 'PE 002', '21L-0416', 'Rhythmic Activities', '2', 'FL (Le)', 'Mo', '7:30 – 9:30'),
(453, 'ITE 02', '21L-0416', 'Computer Programming 1', '2', 'FL (Le)', 'MoWe', '14:30 – 16:30'),
(454, 'ITE 02', '21L-0416', 'Computer Programming 1 (LAB)', '1', 'FL (Lab)', 'TuTh', '14:30 – 16:30'),
(455, 'NST 02', '21L-0416', 'National Service Training Program 2', '3', 'FL (Le)', 'Fr', '13:30 – 16:00'),
(456, 'GEC 07', '21L-9999', 'Art Appreciation', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(457, 'GEC 13', '21L-9999', 'Literature of the Philippines', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(458, 'PE 004', '21L-9999', 'Team Sports and Games', '2', 'FL (Le)', 'We', '9:30 – 11:30'),
(459, 'ITE 08', '21L-9999', 'Data Structures and Algorithms', '2', 'FL (Le)', 'Mo', '17:00 – 19:00'),
(460, 'ITE 08', '21L-9999', 'Data Structures and Algorithms (LAB)', '1', 'FL (Lab)', 'Tu', '17:00 – 19:00'),
(461, 'ITE 09', '21L-9999', 'Quantitative Methods', '2', 'FL (Le)', 'MoWe', '7:30 – 8:30'),
(462, 'ITE 09', '21L-9999', 'Quantitative Methods (LAB)', '1', 'FL (Lab)', 'Fr', '10:30 – 13:30'),
(463, 'ITE 10', '21L-9999', 'Front-End Development', '2', 'FL (Le)', 'Mo', '13:00 – 16:00'),
(464, 'ITE 10', '21L-9999', 'Front-End Development (LAB)', '1', 'FL (Lab)', 'We', '13:30 – 16:30'),
(465, 'ITE 11', '21L-9999', 'Database Management Systems 2', '2', 'FL (Le)', 'We', '17:00 – 19:00'),
(466, 'ITE 11', '21L-9999', 'Database Management Systems 2 (LAB)', '1', 'FL (Lab)', 'Th', '16:30 – 19:30'),
(467, 'GEC 07', '21L-99999', 'Art Appreciation', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(468, 'GEC 13', '21L-99999', 'Literature of the Philippines', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(469, 'PE 004', '21L-99999', 'Team Sports and Games', '2', 'FL (Le)', 'We', '9:30 – 11:30'),
(470, 'ITE 08', '21L-99999', 'Data Structures and Algorithms', '2', 'FL (Le)', 'Mo', '17:00 – 19:00'),
(471, 'ITE 08', '21L-99999', 'Data Structures and Algorithms (LAB)', '1', 'FL (Lab)', 'Tu', '17:00 – 19:00'),
(472, 'ITE 09', '21L-99999', 'Quantitative Methods', '2', 'FL (Le)', 'MoWe', '7:30 – 8:30'),
(473, 'ITE 09', '21L-99999', 'Quantitative Methods (LAB)', '1', 'FL (Lab)', 'Fr', '10:30 – 13:30'),
(474, 'ITE 10', '21L-99999', 'Front-End Development', '2', 'FL (Le)', 'Mo', '13:00 – 16:00'),
(475, 'ITE 10', '21L-99999', 'Front-End Development (LAB)', '1', 'FL (Lab)', 'We', '13:30 – 16:30'),
(476, 'ITE 11', '21L-99999', 'Database Management Systems 2', '2', 'FL (Le)', 'We', '17:00 – 19:00'),
(477, 'ITE 11', '21L-99999', 'Database Management Systems 2 (LAB)', '1', 'FL (Lab)', 'Th', '16:30 – 19:30'),
(478, 'GEC 07', '21L-0953', 'Art Appreciation', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(479, 'GEC 13', '21L-0953', 'Literature of the Philippines', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(480, 'PE 004', '21L-0953', 'Team Sports and Games', '2', 'FL (Le)', 'We', '9:30 – 11:30'),
(481, 'ITE 08', '21L-0953', 'Data Structures and Algorithms', '2', 'FL (Le)', 'Mo', '17:00 – 19:00'),
(482, 'ITE 08', '21L-0953', 'Data Structures and Algorithms (LAB)', '1', 'FL (Lab)', 'Tu', '17:00 – 19:00'),
(483, 'ITE 09', '21L-0953', 'Quantitative Methods', '2', 'FL (Le)', 'MoWe', '7:30 – 8:30'),
(484, 'ITE 09', '21L-0953', 'Quantitative Methods (LAB)', '1', 'FL (Lab)', 'Fr', '10:30 – 13:30'),
(485, 'ITE 10', '21L-0953', 'Front-End Development', '2', 'FL (Le)', 'Mo', '13:00 – 16:00'),
(486, 'ITE 10', '21L-0953', 'Front-End Development (LAB)', '1', 'FL (Lab)', 'We', '13:30 – 16:30'),
(487, 'ITE 11', '21L-0953', 'Database Management Systems 2', '2', 'FL (Le)', 'We', '17:00 – 19:00'),
(488, 'ITE 11', '21L-0953', 'Database Management Systems 2 (LAB)', '1', 'FL (Lab)', 'Th', '16:30 – 19:30'),
(489, 'GEC 02', '21L-0953', 'Understanding The Self', '3', 'FL (Le)', 'MoWeFr', '10:20 - 11:20'),
(490, 'GEC 03', '21L-0953', 'Reading in the Philippine History', '3', 'FL (Le)', 'TuTh', '9:00 - 10:30'),
(491, 'GEC 05', '21L-0953', 'Purposive Communication', '3', 'FL (Le)', 'MoWeFr', '12:30 – 14:30'),
(492, 'GEC 11', '21L-0953', 'Filipino sa Iba’t Ibang Disiplina', '3', 'FL (Le)', 'TuTh', '10:00 – 12:00'),
(493, 'PE 002', '21L-0953', 'Rhythmic Activities', '2', 'FL (Le)', 'Mo', '7:30 – 9:30'),
(494, 'ITE 02', '21L-0953', 'Computer Programming 1', '2', 'FL (Le)', 'MoWe', '14:30 – 16:30'),
(495, 'ITE 02', '21L-0953', 'Computer Programming 1 (LAB)', '1', 'FL (Lab)', 'TuTh', '14:30 – 16:30'),
(496, 'NST 02', '21L-0953', 'National Service Training Program 2', '3', 'FL (Le)', 'Fr', '13:30 – 16:00'),
(497, 'GEC 02', '21L-999999', 'Understanding The Self', '3', 'FL (Le)', 'MoWeFr', '10:20 - 11:20'),
(498, 'GEC 03', '21L-999999', 'Reading in the Philippine History', '3', 'FL (Le)', 'TuTh', '9:00 - 10:30'),
(499, 'GEC 05', '21L-999999', 'Purposive Communication', '3', 'FL (Le)', 'MoWeFr', '12:30 – 14:30'),
(500, 'GEC 11', '21L-999999', 'Filipino sa Iba’t Ibang Disiplina', '3', 'FL (Le)', 'TuTh', '10:00 – 12:00'),
(501, 'PE 002', '21L-999999', 'Rhythmic Activities', '2', 'FL (Le)', 'Mo', '7:30 – 9:30'),
(502, 'ITE 02', '21L-999999', 'Computer Programming 1', '2', 'FL (Le)', 'MoWe', '14:30 – 16:30'),
(503, 'ITE 02', '21L-999999', 'Computer Programming 1 (LAB)', '1', 'FL (Lab)', 'TuTh', '14:30 – 16:30'),
(504, 'NST 02', '21L-999999', 'National Service Training Program 2', '3', 'FL (Le)', 'Fr', '13:30 – 16:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD PRIMARY KEY (`subjectid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_info`
--
ALTER TABLE `subject_info`
  MODIFY `subjectid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
