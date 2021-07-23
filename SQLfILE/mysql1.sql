-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 02:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `billtotal_avg` ()  BEGIN
SELECT avg(med_fee+(room_fee*days)) as average_billamount from bill ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BILL_SUM` ()  BEGIN
SELECT SUM(med_fee+(room_fee*days)) AS TOTAL_AMOUNT FROM bill;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DOCTOR_ATTENDED` ()  BEGIN
SELECT D.doctor_id ,D.doctor_name from doctor D
INNER JOIN in_patient P ON D.doctor_id= P.Doc_ID WHERE D.doctor_id in (SELECT doctor.doctor_id  FROM doctor  INNER JOIN out_patient ON doctor.doctor_id=out_patient.doc_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DOCTOR_NOTATTENDED_INPATIENT` ()  BEGIN
select doctor_name from doctor 
where doctor_name not in
(select D.doctor_name from doctor D,in_patient P
where D.doctor_id=P.Doc_ID);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DOCTOR_NOTATTENDED_OUTPATIENT` ()  BEGIN
	select doctor_name from doctor 
	where doctor_name not in
	(select D.doctor_name from doctor D,out_patient P where D.doctor_id=P.doc_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lab_inpatient` ()  BEGIN
SELECT in_patient.P_ID,in_patient.Name,lab.lab_no from in_patient  INNER JOIN  lab ON in_patient.P_ID=lab.P_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lab_outpatient` ()  BEGIN
SELECT out_patient.P_ID,out_patient.Name,lab.lab_no from out_patient  INNER JOIN  lab ON out_patient.P_ID=lab.P_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `notattended` ()  begin
DECLARE no1 integer ;DECLARE stat TEXT;
DECLARE exit_loop boolean DEFAULT false;
declare doc CURSOR FOR SELECT room_no,room_type  FROM room;
OPEN doc;
room_loop:LOOP
fetch FROM doc into no1,stat;
if exit_loop THEN
LEAVE room_loop;
end if;
if stat='AC' THEN
SELECT no1;
end if;
end loop room_loop;
CLOSE doc;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_no` int(11) NOT NULL,
  `P_id` varchar(50) NOT NULL,
  `med_fee` int(11) NOT NULL,
  `room_fee` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_no`, `P_id`, `med_fee`, `room_fee`, `days`) VALUES
(12, 'P11', 5000, 2000, 4),
(32, 'P12', 5900, 5000, 3),
(34, 'P16', 2000, 1800, 2),
(41, 'P17', 6900, 2000, 6),
(45, 'P13', 3400, 3000, 2),
(87, 'P15', 6000, 5900, 2),
(122, 'P14', 1200, 1000, 2),
(344, 'P111', 2000, 0, 0),
(544, 'P222', 3400, 0, 0),
(4332, 'P333', 2300, 0, 0),
(10002, 'P18', 4500, 1000, 3),
(12345, 'P444', 4900, 0, 0),
(17789, 'P555', 200, 0, 0),
(36677, 'P999', 5699, 0, 0),
(45678, 'P777', 300, 0, 0),
(65443, 'P1000', 765, 0, 0),
(67785, 'P888', 450, 0, 0),
(123345, 'P666', 3400, 0, 0),
(123346, 'P1003', 2300, 0, 0),
(1233448, 'P19', 1000, 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `a_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`Username`, `Password`, `a_id`) VALUES
('poojasri', '2001', 'a1'),
('haripriya', '2002', 'a3'),
('hemavarshini', 'hema', 'a2');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` varchar(50) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `dept`) VALUES
('D1', 'KARAN', 'CARDIOLOGIST'),
('D10', 'PRIYA', 'SURGEON'),
('D11', 'RAMYA S', 'CARDIOLOGIST'),
('D2', 'SANDIYA', 'DERMATALOGIST'),
('D3', 'DHANU', 'DENTIST'),
('D4', 'DIVYA', 'GYNECOLOGIST'),
('D5', 'SUBHI', 'ENT'),
('D6', 'SHANTHANU', 'PHYSICIAN'),
('D7', 'POOJA', 'DENTIST'),
('D8', 'HEMA', 'ENT'),
('D9', 'VARSHINI', 'CARDIOLOGIST');

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_view`
-- (See below for the actual view)
--
CREATE TABLE `doctor_view` (
`doctor_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `in_patient`
--

CREATE TABLE `in_patient` (
  `P_ID` varchar(20) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `R_NUMBER` int(11) NOT NULL,
  `DOA` date NOT NULL,
  `DOD` date NOT NULL,
  `Doc_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `in_patient`
--

INSERT INTO `in_patient` (`P_ID`, `Name`, `gender`, `Address`, `R_NUMBER`, `DOA`, `DOD`, `Doc_ID`) VALUES
('P11', 'HARI R', 'MALE', 'ANNA-NAGAR', 10, '2021-05-01', '2021-05-05', 'D1'),
('P12', 'KANAGA H', 'FEMALE', 'OMR-ROAD', 20, '2021-04-13', '2021-04-16', 'D2'),
('P13', 'VINCY K', 'FEMALE', 'BESANT-NAGAR', 30, '2021-04-28', '2021-04-30', 'D3'),
('P14', 'KRISHNA M', 'MALE', 'MADHAVARAM', 40, '2021-04-20', '2021-04-22', 'D4'),
('P15', 'AASIQ M', 'MALE', 'VELACHERRY', 50, '2021-04-15', '2021-04-17', 'D4'),
('P16', 'ABIRAMI P', 'FEMALE', 'ADYAR', 60, '2021-05-04', '2021-05-06', 'D6'),
('P17', 'SUPRAJA K', 'FEMALE', 'MYLAPOOR', 70, '2021-04-26', '2021-05-01', 'D7'),
('P18', 'HARSHAT T', 'MALE', 'CHINDAMBARAM', 10, '2021-05-19', '2021-05-22', 'D1'),
('P19', 'HARISHRAJ G', 'MALE', 'BAIPASS-ROAD 2', 1, '2021-05-23', '2021-05-24', 'D2');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_no` int(11) NOT NULL,
  `P_id` varchar(20) NOT NULL,
  `Doc_ID` varchar(20) NOT NULL,
  `l_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_no`, `P_id`, `Doc_ID`, `l_date`) VALUES
(11, 'P11', 'D1', '2021-05-12'),
(12, 'P12', 'D2', '2020-05-11'),
(13, 'P13', 'D3', '2021-04-12'),
(14, 'P14', 'D4', '2021-04-15'),
(15, 'P111', 'D1', '2021-05-03'),
(16, 'P999', 'D9', '2021-05-07'),
(11, 'P18', 'D1', '2021-05-19'),
(12, 'P1003', 'D1', '2021-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `out_patient`
--

CREATE TABLE `out_patient` (
  `P_ID` varchar(20) NOT NULL,
  `DATE` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `doc_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `out_patient`
--

INSERT INTO `out_patient` (`P_ID`, `DATE`, `name`, `doc_id`) VALUES
('P1000', '2021-04-25', 'RAJU S', 'D1'),
('P1001', '2021-05-17', 'AISHWARYA K', 'D4'),
('P1002', '2021-05-24', 'MALIGA H', 'D4'),
('P1003', '2021-05-23', 'KARTHICK D', 'D1'),
('P111', '2021-05-03', 'VAANATHI G', 'D4'),
('P1200', '2021-05-19', 'ADITYA D', 'D2'),
('P222', '2021-05-05', 'MITHUN K', 'D2'),
('P333', '2021-04-21', 'BHARATHI A', 'D9'),
('P444', '2021-04-19', 'ARUN T', 'D9'),
('P555', '2021-05-09', 'KISHORE J', 'D1'),
('P666', '2021-04-14', 'VICKY J', 'D3'),
('P777', '2021-04-28', 'ARJUN P', 'D3'),
('P888', '2021-05-11', 'ROJA  A', 'D4'),
('P999', '2021-05-07', 'PREETHI  G', 'D4');

--
-- Triggers `out_patient`
--
DELIMITER $$
CREATE TRIGGER `delete_lab` AFTER DELETE ON `out_patient` FOR EACH ROW DELETE FROM lab where P_id=old.P_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_no` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `patient_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `room_type`, `status`, `patient_id`) VALUES
(1, 'NON-AC', 'NON-AVAILABLE', 'P19'),
(2, 'AC', 'AVAILABLE', ''),
(3, 'NON-AC', 'AVAILABLE', ''),
(4, 'NON-AC', 'AVAILABLE', ''),
(5, 'AC', 'AVAILABLE', ''),
(6, 'NON-AC', 'AVAILABLE', ''),
(7, 'AC', 'AVAILABLE', ''),
(8, 'AC', 'AVAILABLE', ''),
(9, 'NON-AC', 'AVAILABLE', ''),
(10, 'AC', 'NON-AVAILABLE', 'P18'),
(20, 'AC', 'NON-AVAILABLE', 'P12'),
(30, 'NON-AC', 'NON-AVAILABLE', 'P13'),
(40, 'AC', 'NON-AVAILABLE', 'P14'),
(50, 'NON-AC', 'NON-AVAILABLE', 'P15'),
(60, 'NON-AC', 'NON-AVAILABLE', 'P16'),
(70, 'AC', 'AVAILABLE', ''),
(80, 'NON-AC', 'AVAILABLE', ''),
(90, 'NON-AC', 'AVAILABLE', ''),
(100, 'AC', 'AVAILABLE', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `room_view`
-- (See below for the actual view)
--
CREATE TABLE `room_view` (
`room_no` int(11)
,`room_type` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` varchar(50) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `s_name`, `salary`) VALUES
('S1', 'SATHIYA', 23000),
('S10', 'KRITHI', 20000),
('S2', 'HARSHA', 10000),
('S3', 'SUGANA', 18000),
('S4', 'YAAZHINI', 27000),
('S5', 'GAYATHRI', 17000),
('S6', 'VENUGOPAL', 22000),
('S7', 'NIVI', 11000),
('S8', 'KAVIN', 16000),
('S9', 'MANISHA', 24000);

-- --------------------------------------------------------

--
-- Structure for view `doctor_view`
--
DROP TABLE IF EXISTS `doctor_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_view`  AS SELECT `doctor`.`doctor_name` AS `doctor_name` FROM `doctor` WHERE `doctor`.`doctor_name` like 'D%' ;

-- --------------------------------------------------------

--
-- Structure for view `room_view`
--
DROP TABLE IF EXISTS `room_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `room_view`  AS SELECT `room`.`room_no` AS `room_no`, `room`.`room_type` AS `room_type` FROM `room` WHERE `room`.`status` = 'AVAILABLE' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`Password`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `in_patient`
--
ALTER TABLE `in_patient`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `Doc_ID` (`Doc_ID`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD KEY `Doc_ID` (`Doc_ID`);

--
-- Indexes for table `out_patient`
--
ALTER TABLE `out_patient`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `in_patient`
--
ALTER TABLE `in_patient`
  ADD CONSTRAINT `in_patient_ibfk_1` FOREIGN KEY (`Doc_ID`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`Doc_ID`) REFERENCES `doctor` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
