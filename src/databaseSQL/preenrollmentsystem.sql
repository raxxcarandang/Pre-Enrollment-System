-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 09:57 AM
-- Server version: 8.0.31
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
  `loginID` int NOT NULL,
  `student_number` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(257) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`loginID`, `student_number`, `user`, `pass`, `type`) VALUES
(1, '21L-8708', 'raxx07', '1234', 'ADMIN'),
(39, '21L-2345', 'angelo', '1234', 'STUDENT'),
(40, '21l-12345', 'angela', '1234', 'STUDENT'),
(41, '21L-0001', 'mariel', '1234', 'STUDENT'),
(42, '21L-0002', 'rvebreo', '123', 'STUDENT'),
(43, '21L - 9210', 'clev', '1234', 'STUDENT'),
(44, '21L-0002', 'Ericson', '123', 'STUDENT'),
(46, '21L-8708', 'raxx109', '123456', 'STUDENT'),
(47, '21L-1378', 'dallen', '111', 'STUDENT'),
(48, '12345', 'Vince', 'vince123', 'STUDENT'),
(49, '21L-0009', 'rey', 'pogi', 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_number` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `student_name` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `course_year` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `payment` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `school_year` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `semester` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `preenrollment` varchar(257) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_number`, `student_name`, `course_year`, `payment`, `school_year`, `semester`, `status`, `preenrollment`) VALUES
('12345', 'Vince Ebreo', '1ST YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L - 9210', 'Jonn Cleven R. Javier', '1ST YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-0001', 'Mariel Palma', '2ND YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-0002', 'Rv Ebreo', '2ND YEAR', 'FULL', '2024-2025', '1ST SEMESTER', 'Irregular', 'PRE-ENROLLED'),
('21L-0009', 'Reynaldo Pogi', '1ST YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21l-12345', 'gela', '2ND YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-1378', 'Danielle Lyn J. Abadilla', '2ND YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Irregular', 'PRE-ENROLLED'),
('21L-2345', 'gelo', '2ND YEAR', 'FULL', '2023-2024', '1ST SEMESTER', 'Regular', 'PRE-ENROLLED'),
('21L-8708', 'Raxx Morenz R. Carandang', '2ND YEAR', 'FULL', '2023-2024', '2ND SEMESTER', 'Regular', 'PRE-ENROLLED');

-- --------------------------------------------------------

--
-- Table structure for table `subject_info`
--

CREATE TABLE `subject_info` (
  `subjectid` int NOT NULL,
  `subject_code` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `student_number` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `subject_desc` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `units` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `section` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `day` varchar(257) COLLATE utf8mb4_general_ci NOT NULL,
  `time` varchar(257) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`subjectid`, `subject_code`, `student_number`, `subject_desc`, `units`, `section`, `day`, `time`) VALUES
(1065, 'GEC 01', '21L-2345', 'The Life and the Works of Rizal', '3', 'FL (Le)', 'MoWeFr', '14:30 – 16:30'),
(1066, 'GEC 09', '21L-2345', 'Ethics', '3', 'FL (Le)', 'WeFr', '9:00 – 10:30'),
(1067, 'ITE 03', '21L-2345', 'Human Computer Interaction', '3', 'FL (Le)', 'MoWeFr', '8:00 – 9:00'),
(1068, 'ITE 04', '21L-2345', 'Discrete Mathematics', '3', 'FL (Le)', 'TuTh', '15:00 – 16:30'),
(1069, 'PE 03', '21L-2345', 'Individual/Dual Sports', '2', 'FL (Le)', 'We', '16:30 – 17:30'),
(1070, 'ITE 05', '21L-2345', 'Computer Programming 2', '2', 'FL (Le)', 'Th', '11:30 – 13:30'),
(1071, 'ITE 05', '21L-2345', 'Computer Programming 2 (LAB)', '1', 'FL (Lab)', 'Tu', '10:30 – 13:30'),
(1072, 'ITE 06', '21L-2345', 'Visual Graphic Design', '2', 'FL (Le)', 'Tu', '8:00 – 10:00'),
(1073, 'ITE 06', '21L-2345', 'Visual Graphic Design (LAB)', '1', 'FL (Lab)', 'Th', '10:30 – 13:30'),
(1074, 'ITE 07', '21L-2345', 'Database Management Systems 1', '2', 'FL (Le)', 'MoFr', '17:30 – 18:30'),
(1075, 'ITE 11', '21L-2345', 'Database Management Systems 1 (LAB)', '1', 'FL (Lab)', 'TuTh', '17:00 – 18:30'),
(1076, 'GEC 01', '21l-12345', 'The Life and the Works of Rizal', '3', 'FL (Le)', 'MoWeFr', '14:30 – 16:30'),
(1077, 'GEC 09', '21l-12345', 'Ethics', '3', 'FL (Le)', 'WeFr', '9:00 – 10:30'),
(1078, 'ITE 03', '21l-12345', 'Human Computer Interaction', '3', 'FL (Le)', 'MoWeFr', '8:00 – 9:00'),
(1079, 'ITE 04', '21l-12345', 'Discrete Mathematics', '3', 'FL (Le)', 'TuTh', '15:00 – 16:30'),
(1080, 'PE 03', '21l-12345', 'Individual/Dual Sports', '2', 'FL (Le)', 'We', '16:30 – 17:30'),
(1081, 'ITE 05', '21l-12345', 'Computer Programming 2', '2', 'FL (Le)', 'Th', '11:30 – 13:30'),
(1082, 'ITE 05', '21l-12345', 'Computer Programming 2 (LAB)', '1', 'FL (Lab)', 'Tu', '10:30 – 13:30'),
(1083, 'ITE 06', '21l-12345', 'Visual Graphic Design', '2', 'FL (Le)', 'Tu', '8:00 – 10:00'),
(1084, 'ITE 06', '21l-12345', 'Visual Graphic Design (LAB)', '1', 'FL (Lab)', 'Th', '10:30 – 13:30'),
(1085, 'ITE 07', '21l-12345', 'Database Management Systems 1', '2', 'FL (Le)', 'MoFr', '17:30 – 18:30'),
(1086, 'ITE 11', '21l-12345', 'Database Management Systems 1 (LAB)', '1', 'FL (Lab)', 'TuTh', '17:00 – 18:30'),
(1087, 'GEC 01', '21L-0001', 'The Life and the Works of Rizal', '3', 'FL (Le)', 'MoWeFr', '14:30 – 16:30'),
(1088, 'GEC 09', '21L-0001', 'Ethics', '3', 'FL (Le)', 'WeFr', '9:00 – 10:30'),
(1089, 'ITE 03', '21L-0001', 'Human Computer Interaction', '3', 'FL (Le)', 'MoWeFr', '8:00 – 9:00'),
(1090, 'ITE 04', '21L-0001', 'Discrete Mathematics', '3', 'FL (Le)', 'TuTh', '15:00 – 16:30'),
(1091, 'PE 03', '21L-0001', 'Individual/Dual Sports', '2', 'FL (Le)', 'We', '16:30 – 17:30'),
(1092, 'ITE 05', '21L-0001', 'Computer Programming 2', '2', 'FL (Le)', 'Th', '11:30 – 13:30'),
(1093, 'ITE 05', '21L-0001', 'Computer Programming 2 (LAB)', '1', 'FL (Lab)', 'Tu', '10:30 – 13:30'),
(1094, 'ITE 06', '21L-0001', 'Visual Graphic Design', '2', 'FL (Le)', 'Tu', '8:00 – 10:00'),
(1095, 'ITE 06', '21L-0001', 'Visual Graphic Design (LAB)', '1', 'FL (Lab)', 'Th', '10:30 – 13:30'),
(1096, 'ITE 07', '21L-0001', 'Database Management Systems 1', '2', 'FL (Le)', 'MoFr', '17:30 – 18:30'),
(1097, 'ITE 11', '21L-0001', 'Database Management Systems 1 (LAB)', '1', 'FL (Lab)', 'TuTh', '17:00 – 18:30'),
(1098, 'GEC 04', '21L - 9210', 'The Contemporary World', '3', 'FL (Le)', 'MoWeFr', '15:30 - 18:30'),
(1099, 'GEC 06', '21L - 9210', 'Mathematics in the Modern World', '3', 'FL (Le)', 'MoWeFr', '7:30 - 8:30'),
(1100, 'GEC 08', '21L - 9210', 'Science, Technology and Society', '3', 'FL (Le)', 'TuTh', '15:00 – 16:30'),
(1101, 'GEC 10', '21L - 9210', 'Kontekswalisadong Komunikasyon sa Filipino', '3', 'FL (Le)', 'MoWeFr', '8:30 – 9:30'),
(1102, 'PE 001', '21L - 9210', 'Physical Fitness', '2', 'FL (Le)', 'Mo', '11:30 – 13:30'),
(1103, 'ITE 01', '21L - 9210', 'Introduction To Computing', '2', 'FL (Le)', 'MoWe', '14:30 – 16:30'),
(1104, 'ITE 02', '21L - 9210', 'Introduction To Computing (LAB)', '1', 'FL (Lab)', 'TuTh', '13:30 – 16:00'),
(1105, 'NST 01', '21L - 9210', 'National Service Training Program 1', '3', 'FL (Le)', 'TuTh', '16:30 – 18:00'),
(1106, 'GEC 07', '21L-8708', 'Art Appreciation', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(1107, 'GEC 13', '21L-8708', 'Literature of the Philippines', '3', 'FL (Le)', 'TuTh', '13:30 – 16:00'),
(1108, 'PE 004', '21L-8708', 'Team Sports and Games', '2', 'FL (Le)', 'We', '9:30 – 11:30'),
(1109, 'ITE 08', '21L-8708', 'Data Structures and Algorithms', '2', 'FL (Le)', 'Mo', '17:00 – 19:00'),
(1110, 'ITE 08', '21L-8708', 'Data Structures and Algorithms (LAB)', '1', 'FL (Lab)', 'Tu', '17:00 – 19:00'),
(1111, 'ITE 09', '21L-8708', 'Quantitative Methods', '2', 'FL (Le)', 'MoWe', '7:30 – 8:30'),
(1112, 'ITE 09', '21L-8708', 'Quantitative Methods (LAB)', '1', 'FL (Lab)', 'Fr', '10:30 – 13:30'),
(1113, 'ITE 10', '21L-8708', 'Front-End Development', '2', 'FL (Le)', 'Mo', '13:00 – 16:00'),
(1114, 'ITE 10', '21L-8708', 'Front-End Development (LAB)', '1', 'FL (Lab)', 'We', '13:30 – 16:30'),
(1115, 'ITE 11', '21L-8708', 'Database Management Systems 2', '2', 'FL (Le)', 'We', '17:00 – 19:00'),
(1116, 'ITE 11', '21L-8708', 'Database Management Systems 2 (LAB)', '1', 'FL (Lab)', 'Th', '16:30 – 19:30'),
(1117, 'GEC 04', '21L-1378', 'The Contemporary World', '3', 'FL (Le)', 'MoWeFr', '15:30 - 18:30'),
(1118, 'GEC 06', '21L-1378', 'Mathematics in the Modern World', '3', 'FL (Le)', 'MoWeFr', '7:30 - 8:30'),
(1119, 'GEC 08', '21L-1378', 'Science, Technology and Society', '3', 'FL (Le)', 'TuTh', '15:00 – 16:30'),
(1120, 'GEC 10', '21L-1378', 'Kontekswalisadong Komunikasyon sa Filipino', '3', 'FL (Le)', 'MoWeFr', '8:30 – 9:30'),
(1121, 'PE 001', '21L-1378', 'Physical Fitness', '2', 'FL (Le)', 'Mo', '11:30 – 13:30'),
(1122, 'ITE 01', '21L-1378', 'Introduction To Computing', '2', 'FL (Le)', 'MoWe', '14:30 – 16:30'),
(1123, 'ITE 02', '21L-1378', 'Introduction To Computing (LAB)', '1', 'FL (Lab)', 'TuTh', '13:30 – 16:00'),
(1124, 'NST 01', '21L-1378', 'National Service Training Program 1', '3', 'FL (Le)', 'TuTh', '16:30 – 18:00'),
(1142, 'GEC 04', '12345', 'The Contemporary World', '3', 'FL (Le)', 'MoWeFr', '15:30 - 18:30'),
(1143, 'GEC 06', '12345', 'Mathematics in the Modern World', '3', 'FL (Le)', 'MoWeFr', '7:30 - 8:30'),
(1144, 'GEC 08', '12345', 'Science, Technology and Society', '3', 'FL (Le)', 'TuTh', '15:00 – 16:30'),
(1145, 'GEC 10', '12345', 'Kontekswalisadong Komunikasyon sa Filipino', '3', 'FL (Le)', 'MoWeFr', '8:30 – 9:30'),
(1146, 'PE 001', '12345', 'Physical Fitness', '2', 'FL (Le)', 'Mo', '11:30 – 13:30'),
(1147, 'ITE 01', '12345', 'Introduction To Computing', '2', 'FL (Le)', 'MoWe', '14:30 – 16:30'),
(1148, 'ITE 02', '12345', 'Introduction To Computing (LAB)', '1', 'FL (Lab)', 'TuTh', '13:30 – 16:00'),
(1149, 'NST 01', '12345', 'National Service Training Program 1', '3', 'FL (Le)', 'TuTh', '16:30 – 18:00'),
(1150, 'GEC 04', '21L-0009', 'The Contemporary World', '3', 'FL (Le)', 'MoWeFr', '15:30 - 18:30'),
(1151, 'GEC 06', '21L-0009', 'Mathematics in the Modern World', '3', 'FL (Le)', 'MoWeFr', '7:30 - 8:30'),
(1152, 'GEC 08', '21L-0009', 'Science, Technology and Society', '3', 'FL (Le)', 'TuTh', '15:00 – 16:30'),
(1153, 'GEC 10', '21L-0009', 'Kontekswalisadong Komunikasyon sa Filipino', '3', 'FL (Le)', 'MoWeFr', '8:30 – 9:30'),
(1154, 'PE 001', '21L-0009', 'Physical Fitness', '2', 'FL (Le)', 'Mo', '11:30 – 13:30'),
(1155, 'ITE 01', '21L-0009', 'Introduction To Computing', '2', 'FL (Le)', 'MoWe', '14:30 – 16:30'),
(1156, 'ITE 02', '21L-0009', 'Introduction To Computing (LAB)', '1', 'FL (Lab)', 'TuTh', '13:30 – 16:00'),
(1157, 'NST 01', '21L-0009', 'National Service Training Program 1', '3', 'FL (Le)', 'TuTh', '16:30 – 18:00');

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
  MODIFY `loginID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `subject_info`
--
ALTER TABLE `subject_info`
  MODIFY `subjectid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1158;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
