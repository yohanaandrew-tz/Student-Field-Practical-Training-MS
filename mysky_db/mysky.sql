-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 10:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysky`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `approve_id` int(11) NOT NULL,
  `approve_print_status` enum('approved','notapproved') DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `approved_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approve`
--

INSERT INTO `approve` (`approve_id`, `approve_print_status`, `student_id`, `staff_id`, `approved_by`) VALUES
(1, 'approved', 1, 1, 'Tangwa'),
(2, 'approved', 13, 1, 'Tangwa');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attend_date` date DEFAULT NULL,
  `attend_time` time DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  `approve_time` time DEFAULT NULL,
  `approve_status` enum('approved','notapproved') DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `permission_status` varchar(10) NOT NULL DEFAULT 'dft',
  `perm_reason` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attend_date`, `attend_time`, `approve_date`, `approve_time`, `approve_status`, `student_id`, `permission_status`, `perm_reason`) VALUES
(1, '2023-08-03', '13:46:13', '2023-08-28', '13:51:14', 'approved', 1, 'attended', ''),
(2, '2023-08-03', '13:51:07', '2023-08-30', '13:54:05', 'approved', 13, 'attended', ''),
(3, '2023-08-04', '08:48:37', '2023-08-28', '13:51:14', 'approved', 1, 'attended', ''),
(4, '2023-08-04', '09:38:59', '2023-08-30', '13:54:05', 'approved', 13, 'attended', ''),
(5, '2023-08-07', '09:30:56', '2023-08-28', '13:51:14', 'approved', 1, 'attended', ''),
(6, '2023-08-07', '14:13:00', '2023-08-30', '13:54:05', 'approved', 13, 'attended', ''),
(7, '2023-08-10', '09:54:09', '2023-08-28', '13:51:14', 'approved', 1, 'attended', ''),
(8, '2023-08-14', '19:50:03', '2023-08-28', '13:51:14', 'approved', 1, 'attended', ''),
(9, '2023-08-15', '14:20:53', '2023-08-28', '13:51:14', 'approved', 1, 'attended', ''),
(10, '2023-08-21', '12:21:48', '2023-08-28', '13:51:14', 'approved', 1, 'attended', ''),
(11, '2023-08-23', '08:54:28', '2023-08-28', '13:51:14', 'approved', 1, 'attended', ''),
(12, '2023-08-23', '08:56:22', '2023-08-23', '08:57:39', 'approved', 15, 'attended', ''),
(13, '2023-08-24', '08:41:07', '2023-08-30', '13:54:05', 'approved', 13, 'attended', NULL),
(14, '2023-08-24', '23:07:20', '2023-08-28', '13:51:14', 'approved', 1, 'attended', NULL),
(15, '2023-08-25', '09:18:22', '2023-08-30', '13:54:05', 'approved', 13, 'attended', NULL),
(19, '2023-08-25', '14:45:39', '2023-08-28', '13:51:14', 'approved', 1, 'permission', 'Emergerncy'),
(21, '2023-08-26', '22:21:58', '2023-08-28', '13:51:14', 'approved', 1, 'attended', 'no'),
(23, '2023-08-27', '20:09:44', '2023-08-28', '13:51:14', 'approved', 1, 'permission', 'Emergerncy'),
(24, '2023-08-27', '21:00:41', '2023-08-30', '13:54:05', 'approved', 13, 'attended', 'no'),
(26, '2023-08-28', '13:50:51', '2023-08-28', '13:51:14', 'approved', 1, 'attended', 'no'),
(27, '2023-08-28', '14:23:44', '2023-08-30', '13:54:05', 'approved', 13, 'permission', 'Sick'),
(28, '2023-08-29', '09:48:16', NULL, NULL, 'notapproved', 15, 'attended', 'no'),
(29, '2023-08-30', '13:53:29', '2023-08-30', '13:54:05', 'approved', 13, 'attended', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `field_intake`
--

CREATE TABLE `field_intake` (
  `intake_id` int(11) NOT NULL,
  `intake_name` varchar(255) NOT NULL,
  `intake_year` year(4) NOT NULL,
  `intake_month` enum('January','February','March','April','May','June','July','August','September','October','November','December') NOT NULL,
  `intake_status` enum('open','closed','','') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `field_intake`
--

INSERT INTO `field_intake` (`intake_id`, `intake_name`, `intake_year`, `intake_month`, `intake_status`) VALUES
(1, 'Field/2023/7', 2023, 'July', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `log_id` int(11) NOT NULL,
  `log_task` varchar(255) DEFAULT NULL,
  `log_skills` varchar(500) DEFAULT NULL,
  `log_date` date DEFAULT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`log_id`, `log_task`, `log_skills`, `log_date`, `student_id`) VALUES
(2, 'Database designing.', 'How to construct database from the given scenario\r\nDrawing ER diagram from Dezing for Database', '2023-07-28', 1),
(3, 'CCTV Camera Installation', 'How to Install cameras and running cables\r\n', '2023-07-31', 1),
(4, 'Networking', 'To Draw network topology using Cisco Package Tracer....', '2023-08-03', 1),
(9, 'Intercom installations', 'Running cable, fixing faceplate and patching RJ 45 pins, phone identification and labeling.', '2023-08-01', 1),
(10, 'Database designing.', 'How to draw ER diagram using Dezing for Database', '2023-08-03', 13);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'student'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_reg_number` varchar(255) NOT NULL,
  `staff_fname` varchar(255) NOT NULL,
  `staff_lname` varchar(255) NOT NULL,
  `staff_gender` varchar(6) NOT NULL,
  `staff_email` varchar(255) DEFAULT NULL,
  `staff_phone` varchar(255) DEFAULT NULL,
  `staff_position` varchar(255) DEFAULT NULL,
  `staff_photo` varchar(255) DEFAULT NULL,
  `staff_signature` varchar(255) DEFAULT NULL,
  `staff_reg_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_reg_number`, `staff_fname`, `staff_lname`, `staff_gender`, `staff_email`, `staff_phone`, `staff_position`, `staff_photo`, `staff_signature`, `staff_reg_date`) VALUES
(1, '429492', 'William', 'Tangwa', 'M', 'williamtangwa95@gmail.com', '0621462229', 'Developer', '', 'tangwa.png', '2023-08-02'),
(5, '436070', 'Alex', 'Kasele', 'M', 'alexkasele@gmail.com', '0718917408', 'CEO', '', '', '2023-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_reg` varchar(255) NOT NULL,
  `student_fname` varchar(255) DEFAULT NULL,
  `student_lname` varchar(255) DEFAULT NULL,
  `student_college` varchar(255) DEFAULT NULL,
  `student_program` varchar(255) DEFAULT NULL,
  `study_level` varchar(11) NOT NULL,
  `student_phone` varchar(255) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_compitence` varchar(255) DEFAULT NULL,
  `student_letter` varchar(255) DEFAULT NULL,
  `student_start_date` date DEFAULT NULL,
  `student_end_date` date DEFAULT NULL,
  `student_reg_date` date DEFAULT NULL,
  `student_gender` varchar(6) NOT NULL,
  `student_field_duration` int(11) DEFAULT NULL,
  `student_dob` date DEFAULT NULL,
  `student_marital_status` varchar(10) NOT NULL,
  `status` enum('pending','rejected','accepted') NOT NULL DEFAULT 'pending',
  `intake_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_reg`, `student_fname`, `student_lname`, `student_college`, `student_program`, `study_level`, `student_phone`, `student_email`, `student_compitence`, `student_letter`, `student_start_date`, `student_end_date`, `student_reg_date`, `student_gender`, `student_field_duration`, `student_dob`, `student_marital_status`, `status`, `intake_id`) VALUES
(1, 'BSCCS/0038/2021', 'Yohana', 'Andrew', 'Jordan University College', 'Computer Science', 'Bachelor', '0753940450', 'yohanaandrew129@gmail.com', 'Web development', '', '2023-07-24', '2023-09-01', '2023-07-28', 'M', 6, '1999-04-02', 'Single', 'accepted', 1),
(13, 'BSCCS/0072/2021', 'Clever', 'Mwakamela', 'Jordan University College', 'Computer science', 'Bachelor', '0766148248', 'cmwakamela@gmail.com', 'Web development', '', '2023-07-24', '2023-09-01', '2023-08-03', 'M', 6, '1950-02-01', 'Married', 'accepted', 1),
(14, 'DCICT/0030/2022', 'Elia', 'Chuma', 'Jordan University College', 'ICT', 'Diploma', '0758454585', 'elie@yahoo.com', 'Networking', '', '2023-07-24', '2023-09-01', '2023-08-01', 'M', 6, '2010-03-05', 'Married', 'accepted', 1),
(15, 'BSCCS/0020/2021', 'Janeth', 'Fulgence', 'Jordan University College', 'Computer science', 'Bachelor', '0753888555', 'janeth@gmail.com', 'Maintainance', '', '2023-07-24', '2023-09-01', '2023-08-01', 'F', 6, '2015-06-05', 'Married', 'accepted', 1),
(16, 'DCICT/0032/2022', 'Dully', 'Assa', 'Jordan University College', 'ICT', 'Diploma', '0755544777', 'assa@gmail.com', 'Graphics', '', '2023-07-24', '2023-09-01', '2023-08-01', 'M', 6, '2010-09-01', 'Married', 'accepted', 1),
(17, 'BSCCS/0011/2021', 'Getruda', 'Abbasi', 'Jordan University College', 'Computer science', 'Bachelor', '0758656214', 'get@yahoo.com', 'Graphics', '', '2023-07-24', '2023-09-01', '2023-08-01', 'F', 6, '2015-05-20', 'Married', 'accepted', 1),
(18, 'BSCCS/0100/2021', 'John', 'Andrew', 'Jordan University College', 'ICT', '', '0743000000', 'yohanaandrew129@gmail.com', 'Graphics', 'C & Pascal.pdf', '2023-08-14', '2023-09-01', '2023-08-07', 'M', 5, '2020-12-01', 'Single', 'pending', 1),
(19, 'BSCCS/0200/2021', 'Neema', 'James', 'Mzumbe University', 'ICT', 'Bachelor', '0754200200', 'neema@gmail.com', 'Graphics', 'Field_Letter.pdf', '2023-08-16', '2023-09-01', '2023-08-14', 'F', 5, '2009-10-14', 'Single', 'pending', 1),
(21, 'BSCCS/0400/2021', 'Siaba', 'David', 'Mzumbe University', 'ICT', 'Bachelor', '0754300500', 'siaba@gmail.com', 'Graphics', 'Field_Letter.pdf', '2023-08-01', '2023-09-01', '2023-08-15', 'M', 6, '2005-04-02', 'Single', 'pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `task_description` varchar(255) DEFAULT NULL,
  `task_duration` int(11) DEFAULT NULL,
  `task_posted_date` date DEFAULT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_description`, `task_duration`, `task_posted_date`, `staff_id`) VALUES
(2, 'Graphics', 'Design a flyer', 1, '2023-08-02', 1),
(3, 'Website', 'Create a simple login page', 1, '2023-08-02', 1),
(4, 'Maintainace', 'Troubleshooting......', 2, '2023-08-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Reg_time` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `Reg_time`, `role_id`) VALUES
(1, '123456', '', 1),
(2, '12345', NULL, 2),
(3, 'Mwakamela', '13_2023/08/03_10:52:14', 1),
(4, 'Chuma', '14_2023/08/03_21:45:25', 1),
(5, 'Fulgence', '15_2023/08/03_21:47:19', 1),
(6, 'Assa', '16_2023/08/03_21:49:12', 1),
(7, 'Abbasi', '17_2023/08/03_21:51:16', 1),
(8, 'Kasele', '10_2023/08/04_10:34:52', 2),
(10, 'Andrew', '18_2023/08/14_00:02:20', 1),
(11, 'James', '19_2023/08/14_01:40:48', 1),
(13, 'David', '21_2023/08/15_14:13:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_staff`
--

CREATE TABLE `user_has_staff` (
  `user_has_staff_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_staff`
--

INSERT INTO `user_has_staff` (`user_has_staff_id`, `staff_id`, `user_id`) VALUES
(1, 1, 2),
(2, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_student`
--

CREATE TABLE `user_has_student` (
  `user_has_student_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_student`
--

INSERT INTO `user_has_student` (`user_has_student_id`, `student_id`, `user_id`) VALUES
(1, 1, 1),
(2, 13, 3),
(3, 14, 4),
(4, 15, 5),
(5, 16, 6),
(6, 17, 7),
(8, 18, 10),
(9, 19, 11),
(11, 21, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD PRIMARY KEY (`approve_id`),
  ADD KEY `student_approve` (`student_id`),
  ADD KEY `staff_approve` (`staff_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_attendance` (`student_id`);

--
-- Indexes for table `field_intake`
--
ALTER TABLE `field_intake`
  ADD PRIMARY KEY (`intake_id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `student_logbook` (`student_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `intake_id` (`intake_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `staff_task` (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_user` (`role_id`);

--
-- Indexes for table `user_has_staff`
--
ALTER TABLE `user_has_staff`
  ADD PRIMARY KEY (`user_has_staff_id`),
  ADD KEY `staff_user_has_staff` (`staff_id`),
  ADD KEY `user_user_has_staff` (`user_id`);

--
-- Indexes for table `user_has_student`
--
ALTER TABLE `user_has_student`
  ADD PRIMARY KEY (`user_has_student_id`),
  ADD KEY `student_user_has_student` (`student_id`),
  ADD KEY `user_user_has_student` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve`
--
ALTER TABLE `approve`
  MODIFY `approve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `field_intake`
--
ALTER TABLE `field_intake`
  MODIFY `intake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_has_staff`
--
ALTER TABLE `user_has_staff`
  MODIFY `user_has_staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_has_student`
--
ALTER TABLE `user_has_student`
  MODIFY `user_has_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approve`
--
ALTER TABLE `approve`
  ADD CONSTRAINT `staff_approve` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `student_approve` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `student_attendance` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `student_logbook` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`intake_id`) REFERENCES `field_intake` (`intake_id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `staff_task` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_user` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `user_has_staff`
--
ALTER TABLE `user_has_staff`
  ADD CONSTRAINT `staff_user_has_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `user_user_has_staff` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_has_student`
--
ALTER TABLE `user_has_student`
  ADD CONSTRAINT `student_user_has_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `user_user_has_student` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
