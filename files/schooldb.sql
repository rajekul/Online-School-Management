-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 11:37 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissionfee`
--

CREATE TABLE `admissionfee` (
  `serial` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admissionfee`
--

INSERT INTO `admissionfee` (`serial`, `title`, `type`, `amount`) VALUES
(1, 'Devlopement', 'all', 2000),
(2, 'Maintanance', 'all', 1000),
(3, 'Admission', 'new', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `sid` varchar(20) NOT NULL,
  `classid` int(11) NOT NULL,
  `secid` int(11) NOT NULL,
  `attendance` varchar(5) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`serial`, `date`, `sid`, `classid`, `secid`, `attendance`, `session`) VALUES
(1, '2017-08-16', '17-00001', 1, 1, 'P', '1'),
(2, '2017-08-16', '17-00002', 1, 1, 'P', '1'),
(3, '2017-08-17', '17-00001', 1, 1, 'P', '1'),
(4, '2017-08-17', '17-00002', 1, 1, 'A', '1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classid` int(11) NOT NULL,
  `classname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classid`, `classname`) VALUES
(1, 'One'),
(2, 'Two'),
(3, 'Three'),
(4, 'Four'),
(5, 'Five');

-- --------------------------------------------------------

--
-- Table structure for table `classperiod`
--

CREATE TABLE `classperiod` (
  `serial` int(11) NOT NULL,
  `starttime` varchar(10) NOT NULL,
  `ampm` varchar(5) NOT NULL,
  `classduration` int(11) NOT NULL,
  `assembly` int(11) NOT NULL,
  `tiffin` int(11) NOT NULL,
  `beforetiffin` int(11) NOT NULL,
  `aftertiffin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classperiod`
--

INSERT INTO `classperiod` (`serial`, `starttime`, `ampm`, `classduration`, `assembly`, `tiffin`, `beforetiffin`, `aftertiffin`) VALUES
(1, '9.00', 'am', 35, 15, 20, 4, 3),
(2, '9.00', 'am', 35, 15, 20, 4, 3),
(3, '9.00', 'am', 35, 15, 20, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `classroutine`
--

CREATE TABLE `classroutine` (
  `serial` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `period` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `secid` varchar(20) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `eid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroutine`
--

INSERT INTO `classroutine` (`serial`, `day`, `period`, `classid`, `secid`, `subjectcode`, `eid`) VALUES
(1, 'Thursday', '1', '1', '1', '00001', '170815-0002'),
(5, 'Wednesday', '2', '1', '1', '00003', '170815-0002'),
(6, 'Wednesday', '1', '1', '1', '00001', '170816-0004');

-- --------------------------------------------------------

--
-- Table structure for table `classsubject`
--

CREATE TABLE `classsubject` (
  `serial` int(11) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classsubject`
--

INSERT INTO `classsubject` (`serial`, `subjectcode`, `classid`) VALUES
(1, '00001', '1'),
(2, '00002', '1'),
(3, '00003', '1');

-- --------------------------------------------------------

--
-- Table structure for table `classteacher`
--

CREATE TABLE `classteacher` (
  `secid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `eid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classteacher`
--

INSERT INTO `classteacher` (`secid`, `classid`, `eid`) VALUES
('1', '1', '170815-0002');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designationid` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designationid`, `designation`) VALUES
(1, 'Register'),
(2, 'Teacher'),
(3, 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `appointdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `designation`, `gender`, `dob`, `email`, `phone`, `nid`, `qualification`, `photo`, `appointdate`) VALUES
('170815-0001', 'XRegister', 'Register', 'Male', '2000-02-01', 'rajekulislamb@gmail.com', '01254875478', '01254785478547', 'MA', '170815-0001.jpg', '2017-08-15'),
('170815-0002', 'xTeacher', 'Teacher', 'Male', '2000-02-01', 'rajekulislamb@gmail.con', '01254875470', '01254785478540', 'MS', '170815-0002.jpg', '2017-08-15'),
('170815-0003', 'xAccountant', 'Accountant', 'Male', '2000-02-01', 'rajekulislamb@gmail.coc', '01254875471', '01254785478541', 'MBA', '170815-0003.jpg', '2017-08-15'),
('170816-0004', 'yTeacher', 'Teacher', 'Male', '2000-02-01', 'rajekulislamb@gmail.cob', '01254875476', '01254785478545', 'MS', '170816-0004.jpg', '2017-08-16');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `add_emp` AFTER INSERT ON `employee` FOR EACH ROW begin INSERT INTO user VALUES ('170816-0004','86940717','Teacher','Active');end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `exammark`
--

CREATE TABLE `exammark` (
  `serial` int(11) NOT NULL,
  `secid` varchar(20) NOT NULL,
  `classid` int(11) NOT NULL,
  `sessions` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `examid` varchar(20) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exammark`
--

INSERT INTO `exammark` (`serial`, `secid`, `classid`, `sessions`, `sid`, `subjectcode`, `examid`, `mark`) VALUES
(1, '1', 1, 1, '17-00001', '00001', '1', 25),
(2, '1', 1, 1, '17-00002', '00001', '1', 20),
(3, '1', 1, 1, '17-00001', '00001', '2', 80),
(4, '1', 1, 1, '17-00002', '00001', '2', 85),
(5, '1', 1, 1, '17-00001', '00002', '1', 28),
(6, '1', 1, 1, '17-00002', '00002', '1', 27),
(7, '1', 1, 1, '17-00001', '00002', '2', 76),
(8, '1', 1, 1, '17-00002', '00002', '2', 85),
(9, '1', 1, 1, '17-00001', '00003', '1', 10),
(10, '1', 1, 1, '17-00002', '00003', '1', 25),
(11, '1', 1, 1, '17-00001', '00003', '2', 90),
(12, '1', 1, 1, '17-00002', '00003', '2', 90);

-- --------------------------------------------------------

--
-- Table structure for table `examroutine`
--

CREATE TABLE `examroutine` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `examid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `subjectcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examroutine`
--

INSERT INTO `examroutine` (`serial`, `date`, `time`, `examid`, `classid`, `subjectcode`) VALUES
(1, '2017-08-17', '09:00 am', '1', '1', '00001'),
(2, '2017-08-19', '09:00 am', '1', '1', '00002'),
(3, '2017-08-20', '09:00 am', '1', '1', '00003');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `examid` int(11) NOT NULL,
  `examname` varchar(20) NOT NULL,
  `exammark` int(11) NOT NULL,
  `contribution` int(11) NOT NULL,
  `termid` varchar(20) NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`examid`, `examname`, `exammark`, `contribution`, `termid`, `session`) VALUES
(1, 'Monthly', 30, 40, '1', 1),
(2, 'Term', 100, 60, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(20) NOT NULL,
  `details` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `feeid` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `classid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`feeid`, `date`, `title`, `type`, `amount`, `classid`) VALUES
(1, '2017-08-15', 'Monthly Fee Of August', 'MonthlyFee', 500, '1'),
(2, '2017-08-16', '1st Term Monthly Exam Fee', 'examfee', 500, '1'),
(3, '2017-08-16', '1st Term Monthly Exam Fee', 'examfee', 500, '2'),
(4, '2017-08-16', '1st Term Monthly Exam Fee', 'examfee', 500, '3'),
(5, '2017-08-16', '1st Term Monthly Exam Fee', 'examfee', 500, '4'),
(6, '2017-08-16', '1st Term Monthly Exam Fee', 'examfee', 500, '5');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `serial` int(11) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `gradepoint` varchar(5) NOT NULL,
  `gradepointto` varchar(5) NOT NULL,
  `marksfrom` int(11) NOT NULL,
  `marksto` int(11) NOT NULL,
  `comment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`serial`, `grade`, `gradepoint`, `gradepointto`, `marksfrom`, `marksto`, `comment`) VALUES
(1, 'A+', '5.00', '5.00', 80, 100, 'Excelent'),
(2, 'A', '4.00', '4.99', 60, 79, 'Better'),
(3, 'B', '3.50', '3.99', 50, 59, 'Good'),
(4, 'C', '3.00', '3.49', 40, 49, 'Pass'),
(5, 'F', '0.00', '2.99', 0, 39, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `monthlyfees`
--

CREATE TABLE `monthlyfees` (
  `classid` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `month` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthlyfees`
--

INSERT INTO `monthlyfees` (`classid`, `amount`, `month`) VALUES
('1', 500, '9');

-- --------------------------------------------------------

--
-- Table structure for table `myschool`
--

CREATE TABLE `myschool` (
  `serial` int(11) NOT NULL,
  `schoolname` varchar(100) NOT NULL,
  `shortname` varchar(20) NOT NULL,
  `since` varchar(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myschool`
--

INSERT INTO `myschool` (`serial`, `schoolname`, `shortname`, `since`, `title`, `contact`, `email`, `logo`, `address`) VALUES
(1, 'Online School Management System', 'OSMS', '1995', 'school title', '01762506794', 'abc@gmail.com', 'logo.png', 'Nikunja-2,Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `viewer` varchar(20) NOT NULL,
  `notice` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`serial`, `date`, `title`, `viewer`, `notice`) VALUES
(1, '2017-08-16', 'School Remain Closed', 'homepage', 'School remain closed from 31 aug to 8 sep for Eid-ul-Adha'),
(2, '2017-08-16', 'Exam Routine Published', 'all', '1st Term Monthly Exam Routine Published'),
(3, '2017-08-16', 'Bring Exam Permit', 'all', 'Note! Please Bring Your Exam Permit.'),
(4, '2017-08-16', 'Meeting On Sunday', 'staff', 'Teacher''s Meeting Will held on Sunday 20 aug. Please Don''t miss the meeting'),
(5, '2017-08-16', 'Exam Fees', 'all', 'Please Pay Your Exam fee before 17 aug');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `serial` int(11) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `parentname` varchar(20) NOT NULL,
  `parentemail` varchar(30) NOT NULL,
  `parentphone` varchar(20) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `income` int(11) NOT NULL,
  `relation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`serial`, `pid`, `parentname`, `parentemail`, `parentphone`, `nid`, `profession`, `income`, `relation`) VALUES
(1, '2017-00001', 'Father', '', '01725414521', '2154789654214', 'Businessman', 1000000, 'father'),
(2, '2017-00001', 'Mother', '', '01725414521', '2154789654214', 'Housewife', 0, 'mother'),
(3, '2017-00001', 'Guardian', 'abc@gm.com', '01725414521', '2154789654214', 'Businessman', 0, 'guardian');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `period` varchar(20) NOT NULL,
  `periodname` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`period`, `periodname`, `time`) VALUES
('0', 'Assembly', '9.00am-9.15am'),
('1', '1stperiod', '9.15am-9.50am'),
('2', '2ndperiod', '9.50am-10.25am'),
('3', '3rdperiod', '10.25am-11.0am'),
('4', '4thperiod', '11.0am-11.35am'),
('5', 'Tiffin', '11.35am-11.55am'),
('6', '5th period', '11.55am-12.30pm'),
('7', '6th period', '12.30pm-1.5pm'),
('8', '7th period', '1.5pm-1.40pm');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `secid` int(11) NOT NULL,
  `alphaname` varchar(2) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `limit` int(11) NOT NULL,
  `classid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`secid`, `alphaname`, `nickname`, `limit`, `classid`) VALUES
(1, 'A', '', 10, '1'),
(2, 'B', '', 10, '1'),
(3, 'C', 'X', 10, '1'),
(4, 'A', 'X', 10, '2'),
(5, 'B', 'X', 10, '2'),
(6, 'A', 'X', 10, '3');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionid` int(11) NOT NULL,
  `sessions` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionid`, `sessions`, `year`, `status`) VALUES
(1, '2017-2018', '2017', 'current'),
(2, '2018-2019', '2018', 'Upcoming'),
(3, '2019-2020', '2019', 'Upcoming'),
(4, '2020-2021', '2020', 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `singlefee`
--

CREATE TABLE `singlefee` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `sid` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `fee` int(11) NOT NULL,
  `sessionid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentaddress`
--

CREATE TABLE `studentaddress` (
  `pid` varchar(20) NOT NULL,
  `present` varchar(20) NOT NULL,
  `permanent` varchar(20) NOT NULL,
  `guardian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentaddress`
--

INSERT INTO `studentaddress` (`pid`, `present`, `permanent`, `guardian`) VALUES
('2017-00001', 'Dhaka', 'Dhaka', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `serial` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `secid` varchar(20) NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`serial`, `sid`, `classid`, `secid`, `session`) VALUES
(1, '17-00001', '1', '1', 1),
(2, '17-00002', '1', '1', 1),
(3, '17-00003', '2', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentfees`
--

CREATE TABLE `studentfees` (
  `serial` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `feeid` varchar(20) NOT NULL,
  `sessionid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentfees`
--

INSERT INTO `studentfees` (`serial`, `sid`, `feeid`, `sessionid`) VALUES
(1, '17-00001', '1', '1'),
(2, '17-00002', '1', '1'),
(3, '17-00001', '2', '1'),
(4, '17-00002', '2', '1'),
(5, '17-00003', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `sid` varchar(20) NOT NULL,
  `studentname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `studentemail` varchar(30) NOT NULL,
  `studentphone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`sid`, `studentname`, `dob`, `studentemail`, `studentphone`, `gender`, `blood`, `religion`, `nationality`, `photo`) VALUES
('17-00001', 'Mr.Student', '2000-02-01', '', '', 'Male', 'O+', 'Islam', 'Bangladeshi', '17-00001.jfif'),
('17-00002', 'Mr.Studentx', '2000-02-01', '', '', 'Male', 'A+', 'Islam', 'Bangladeshi', '17-00002.jpg'),
('17-00003', 'Mr.Studenty', '2000-02-01', '', '', 'Male', 'O+', 'Islam', 'Bangladeshi', '17-00003.jpg');

--
-- Triggers `studentinfo`
--
DELIMITER $$
CREATE TRIGGER `add_stu` AFTER INSERT ON `studentinfo` FOR EACH ROW begin INSERT INTO user VALUES ('17-00003','58474545','Student','Active');end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `studentparent`
--

CREATE TABLE `studentparent` (
  `serial` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `pid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentparent`
--

INSERT INTO `studentparent` (`serial`, `sid`, `pid`) VALUES
(1, '17-00001', '2017-00001'),
(2, '17-00002', '2017-00001');

-- --------------------------------------------------------

--
-- Table structure for table `studentpayment`
--

CREATE TABLE `studentpayment` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `sid` varchar(20) NOT NULL,
  `details` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(20) NOT NULL,
  `sessionid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectcode` varchar(20) NOT NULL,
  `subjectname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectcode`, `subjectname`) VALUES
('00001', 'Bangla'),
('00002', 'English'),
('00003', 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `syllebus`
--

CREATE TABLE `syllebus` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(20) NOT NULL,
  `syllebus` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syllebus`
--

INSERT INTO `syllebus` (`serial`, `date`, `title`, `syllebus`, `classid`, `session`) VALUES
(1, '2017-08-16', 'Class One', '1(1).pdf', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `termid` int(11) NOT NULL,
  `term` varchar(20) NOT NULL,
  `con` int(11) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`termid`, `term`, `con`, `session`) VALUES
(1, '1st Term', 100, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `type`, `status`) VALUES
('17-00001', '45523564', 'Student', 'Active'),
('17-00002', '10228867', 'Student', 'Active'),
('17-00003', '58474545', 'Student', 'Active'),
('170815-0001', '48794729', 'Register', 'Active'),
('170815-0002', '99996005', 'Teacher', 'Active'),
('170815-0003', '44679184', 'Accountant', 'Active'),
('170816-0004', '86940717', 'Teacher', 'Active'),
('2017-00001', '46449813', 'parent', 'active'),
('admin', 'admin', 'Admin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissionfee`
--
ALTER TABLE `admissionfee`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `classperiod`
--
ALTER TABLE `classperiod`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `classroutine`
--
ALTER TABLE `classroutine`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `classsubject`
--
ALTER TABLE `classsubject`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `classteacher`
--
ALTER TABLE `classteacher`
  ADD PRIMARY KEY (`secid`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designationid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `exammark`
--
ALTER TABLE `exammark`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `examroutine`
--
ALTER TABLE `examroutine`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`examid`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`feeid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `monthlyfees`
--
ALTER TABLE `monthlyfees`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `myschool`
--
ALTER TABLE `myschool`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`period`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`secid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionid`);

--
-- Indexes for table `singlefee`
--
ALTER TABLE `singlefee`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `studentaddress`
--
ALTER TABLE `studentaddress`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `studentparent`
--
ALTER TABLE `studentparent`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `studentpayment`
--
ALTER TABLE `studentpayment`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectcode`);

--
-- Indexes for table `syllebus`
--
ALTER TABLE `syllebus`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`termid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissionfee`
--
ALTER TABLE `admissionfee`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `classperiod`
--
ALTER TABLE `classperiod`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `classroutine`
--
ALTER TABLE `classroutine`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `classsubject`
--
ALTER TABLE `classsubject`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exammark`
--
ALTER TABLE `exammark`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `examroutine`
--
ALTER TABLE `examroutine`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `examid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `feeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `myschool`
--
ALTER TABLE `myschool`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `secid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `singlefee`
--
ALTER TABLE `singlefee`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentclass`
--
ALTER TABLE `studentclass`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `studentfees`
--
ALTER TABLE `studentfees`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `studentparent`
--
ALTER TABLE `studentparent`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `studentpayment`
--
ALTER TABLE `studentpayment`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `syllebus`
--
ALTER TABLE `syllebus`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `termid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
