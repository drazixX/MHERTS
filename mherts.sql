-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 10:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mherts`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `A_Id` int(11) NOT NULL,
  `Title` varchar(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DateOfAppointment` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Consult_Doc` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Conditions` text NOT NULL,
  `Note` text NOT NULL,
  `Accepted` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`A_Id`, `Title`, `FirstName`, `LastName`, `DateOfAppointment`, `StartTime`, `EndTime`, `Address`, `Mobile`, `Consult_Doc`, `Email`, `Conditions`, `Note`, `Accepted`) VALUES
(1, 'Mrs.', 'Dianne ', 'Yang', '2024-04-18', '02:00:00', '03:00:00', 'Brgy. Ada Tanauan, Leyte ', '09273122446', 'Dra. Narissa Cumpio - OBGYNE', 'jdeighne@gmail.com', 'Not Feeling Well', 'Delulu', 0),
(4, 'Mrs.', 'Elizabeth', 'Para-ase', '2024-04-11', '10:20:00', '11:00:00', 'Brgy. Ada Tanauan, Leyte', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'elizabethpar@gmail.com', 'Headache', 'None', 0),
(5, 'Mrs.', 'Caroline', 'Magayones', '2024-04-09', '08:30:00', '09:00:00', 'Bgry. Kiling Tanauan, Leyte', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'caroline@gmail.com', 'Cold', 'None', 0),
(6, 'Mrs.', 'Sherie', 'Cuangco', '2024-04-15', '11:20:00', '12:00:00', 'Brgy. Canramos Tanauan, Leyte', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'sheriecuangco@gmail.com', 'Light Cough', 'None', 0),
(7, 'Mrs.', 'Monique', 'Lastemosa', '2024-04-19', '09:20:00', '10:10:00', 'Brgy. San Roque Tanauan,Leyte', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'moniquelastem@gmail.com', 'Cold', 'None', 0),
(8, 'Miss', 'Quieniee', 'Valer', '2024-04-11', '09:40:00', '10:30:00', 'Brgy. Pago Tanauan, Leyte', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'quieen2gmail.com', 'Not Feeling Well', 'None', 0),
(17, 'Mrs.', 'Clarita', 'Falcon', '2024-04-21', '01:00:00', '02:00:00', 'Canbalisara', '09153368892', 'Dra. Tina Cumpio', 'claritafalcon70@gmail.com', 'Bleeding', 'Spots', 0),
(18, '', 'Dianne ', 'Yang', '2024-04-18', '00:00:00', '00:00:00', '', '09273122446', 'Dra. Narissa Cumpio - OBGYNE', 'jdeighne@gmail.com', 'Not Feeling Well', '', 0),
(19, '', 'Dianne ', 'Yang', '2024-04-18', '13:07:00', '14:06:00', '', '09273122446', 'Dra. Narissa Cumpio - OBGYNE', 'jdeighne@gmail.com', 'Not Feeling Well', '', 0),
(20, 'Miss', 'Daniella', 'Jeser', '2024-04-23', '03:00:00', '04:00:00', 'Picas', '091521441522', 'Dra. Tina Cumpio', 'daniella@gmail.com', 'Not Feeling Well', 'None', 0),
(21, '', 'Daniella', 'Jeser', '2024-04-23', '03:00:00', '04:00:00', '', '091521441522', 'Dra. Tina Cumpio', 'daniella@gmail.com', 'Not Feeling Well', '', 0),
(22, '', 'Caroline', 'Magayones', '2024-04-09', '08:30:00', '09:00:00', '', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'caroline@gmail.com', 'Cold', '', 0),
(23, '', 'Monique', 'Lastemosa', '2024-04-19', '09:20:00', '10:10:00', '', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'moniquelastem@gmail.com', 'Cold', '', 0),
(24, '', 'Quieniee', 'Valer', '2024-04-11', '09:40:00', '10:30:00', '', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'quieen2gmail.com', 'Not Feeling Well', '', 2),
(26, '', 'Elizabeth', 'Para-ase', '2024-04-11', '10:20:00', '11:00:00', '', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'elizabethpar@gmail.com', 'Headache', '', 2),
(27, '', 'Caroline', 'Magayones', '2024-04-09', '08:30:00', '09:00:00', '', '09153368892', 'Dra. Narissa Cumpio - OBGYNE', 'caroline@gmail.com', 'Cold', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `archive_app`
--

CREATE TABLE `archive_app` (
  `Arc_Id` int(11) NOT NULL,
  `A_Id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `DateOfAppointment` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Consult_doc` varchar(255) DEFAULT NULL,
  `conditions` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `declineReason` text DEFAULT NULL,
  `declineDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive_app`
--

INSERT INTO `archive_app` (`Arc_Id`, `A_Id`, `title`, `firstName`, `lastName`, `DateOfAppointment`, `startTime`, `endTime`, `address`, `mobile`, `email`, `Consult_doc`, `conditions`, `note`, `declineReason`, `declineDate`) VALUES
(9, 6, 'Mrs.', 'Sherie', 'Cuangco', '2024-04-15', '11:20:00', '12:00:00', 'Brgy. Canramos Tanauan, Leyte', '09153368892', 'sheriecuangco@gmail.com', 'Dra. Narissa Cumpio - OBGYNE', 'Light Cough', 'None', '', '2024-05-13 19:44:30'),
(12, 17, 'Mrs.', 'Clarita', 'Falcon', '2024-04-21', '01:00:00', '02:00:00', 'Canbalisara', '09153368892', 'claritafalcon70@gmail.com', 'Dra. Tina Cumpio', 'Bleeding', 'Spots', 'sd', '2024-07-30 22:37:02'),
(14, 19, '', 'Dianne ', 'Yang', '2024-04-18', '13:07:00', '14:06:00', '', '09273122446', 'jdeighne@gmail.com', 'Dra. Narissa Cumpio - OBGYNE', 'Not Feeling Well', '', 'haha', '2024-07-31 00:32:11'),
(15, 21, '', 'Daniella', 'Jeser', '2024-04-23', '03:00:00', '04:00:00', '', '091521441522', 'daniella@gmail.com', 'Dra. Tina Cumpio', 'Not Feeling Well', '', '', '2024-07-31 13:25:11'),
(17, 23, '', 'Monique', 'Lastemosa', '2024-04-19', '09:20:00', '10:10:00', '', '09153368892', 'moniquelastem@gmail.com', 'Dra. Narissa Cumpio - OBGYNE', 'Cold', '', '', '2024-07-31 22:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `archive_doctor`
--

CREATE TABLE `archive_doctor` (
  `DoctorID` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Specialization` varchar(100) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `JoinDate` date DEFAULT NULL,
  `File` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archive_patient`
--

CREATE TABLE `archive_patient` (
  `arc_pm_id` int(11) NOT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `Title` varchar(10) DEFAULT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Middle_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Civil_Status` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Educ_level` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Date_CheckIn` datetime DEFAULT NULL,
  `Doc_Assigned` varchar(255) DEFAULT NULL,
  `DeclineReason` text DEFAULT NULL,
  `Archived_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archive_pfiles`
--

CREATE TABLE `archive_pfiles` (
  `arc_pfile_id` bigint(20) UNSIGNED NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `date_of_insertion` date DEFAULT NULL,
  `save_path` varchar(255) DEFAULT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `history_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive_pfiles`
--

INSERT INTO `archive_pfiles` (`arc_pfile_id`, `file_id`, `file_name`, `file_type`, `file_size`, `date_of_insertion`, `save_path`, `FamilyRec_Id`, `history_id`) VALUES
(3, 74, 'Robisa Palamos .pdf', 'pdf', 4, '2024-07-04', './public/assets/documents/Robisa Palamos .pdf', 21, 17),
(4, 76, 'COMPANY PROFILE.pdf', 'pdf', 119, '2024-07-04', './public/assets/documents/COMPANY PROFILE.pdf', 21, 17);

-- --------------------------------------------------------

--
-- Table structure for table `archive_staff`
--

CREATE TABLE `archive_staff` (
  `staff_id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `educ_attainment` varchar(255) DEFAULT NULL,
  `joinDate` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive_staff`
--

INSERT INTO `archive_staff` (`staff_id`, `employee_id`, `firstName`, `middleName`, `lastName`, `birthDate`, `age`, `gender`, `email`, `address`, `educ_attainment`, `joinDate`, `image`, `mobile`) VALUES
(2, '0', 'dsa', 'dasd', 'zix', '2024-08-07', NULL, 'Male', 'dra@gamil.com', 'asd', 'elem', '2024-08-21', 'public/assets/images/uploads/Screenshot 2024-06-02 132701.png', '09674124545'),
(5, '0', 'dsa', 'sad', 'asd', '2024-08-15', NULL, 'Male', 'drazixmain0122@gmail.com', 'dasd', 'elem', '2024-08-28', 'public/assets/images/uploads/250px-Ph_locator_samar_marabut.png', '09674124545');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_staff`
--

CREATE TABLE `clinic_staff` (
  `staff_id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `educ_attainment` varchar(100) DEFAULT NULL,
  `joinDate` date DEFAULT NULL,
  `image` blob DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_staff`
--

INSERT INTO `clinic_staff` (`staff_id`, `firstName`, `middleName`, `lastName`, `birthDate`, `age`, `gender`, `email`, `address`, `educ_attainment`, `joinDate`, `image`, `mobile`, `employee_id`) VALUES
(1, 'Joanrd', 'N/', 'Jayag', NULL, NULL, NULL, 'dra@gmail.com', 'Osmene tanauan leyte', 'Elem', '2024-08-15', NULL, '0674124545', 0),
(3, 'dsa', 'dasd', 'zix', NULL, NULL, NULL, 'dra@gamil.com', 'asd', 'elem', '2024-08-21', 0x7075626c69632f6173736574732f696d616765732f75706c6f6164732f53637265656e73686f7420323032342d30362d3032203133323730312e706e67, '09674124545', 0),
(4, 'dsa', 'dasd', 'zix', '2024-08-07', NULL, 'Male', 'dra@gamil.com', 'asd', 'elem', '2024-08-21', 0x7075626c69632f6173736574732f696d616765732f75706c6f6164732f53637265656e73686f7420323032342d30362d3032203133323730312e706e67, '09674124545', 0),
(6, 'Jomer', 'macion', 'ocena', '2024-08-14', NULL, 'Female', 'drazixmain0122@gmail.com', 'dsa tanaua', 'elem', '2024-08-22', 0x7075626c69632f6173736574732f696d616765732f75706c6f6164732f53637265656e73686f7420323032342d30362d3032203133323730312e706e67, '213213213', 0),
(7, 'dsa', 'asd', 'asd', '2024-08-14', NULL, 'Female', 'drazixmain0122@gmail.com', 'dasd', '', '2024-08-21', '', '09674124545', 0),
(8, 'asd', 'asd', 'asd', '2024-08-15', NULL, 'Male', 'drazixmain0122@gmail.com', 'sad', 'dasd', '2024-08-29', 0x7075626c69632f6173736574732f696d616765732f75706c6f6164732f53637265656e73686f7420323032342d30362d3032203133323730312e706e67, '09674124545', 0);

-- --------------------------------------------------------

--
-- Table structure for table `colabel_status`
--

CREATE TABLE `colabel_status` (
  `stat_id` int(11) NOT NULL,
  `lab_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colabel_status`
--

INSERT INTO `colabel_status` (`stat_id`, `lab_status`) VALUES
(1, 'New Patient'),
(2, 'Recovered'),
(3, 'On Labor'),
(4, 'First Prenatal'),
(5, 'Second Prenatal'),
(6, 'Third Prenatal');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL,
  `Title` varchar(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Address` text NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Specialization` varchar(100) NOT NULL,
  `Status` enum('Available','Unavailable') NOT NULL,
  `JoinDate` date NOT NULL,
  `File` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `rating` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `Title`, `FirstName`, `MiddleName`, `LastName`, `DateOfBirth`, `Age`, `Gender`, `Address`, `Mobile`, `Email`, `Specialization`, `Status`, `JoinDate`, `File`, `instagram`, `facebook`, `twitter`, `rating`) VALUES
(3, 'Dra.', 'Narissa', 'R', 'Cumpio', '1989-02-07', 35, 'Female', 'Brgy. St. NIno Tanauan, Leyte', '09154467782', 'jdeighne@gmail.com', 'Obstetrician/Gynecologist', 'Available', '2024-03-31', './public/assets/images/uploads/4.jpg', '', '', '', ''),
(7, 'Nurse', 'Marife', 'B', 'Rotilles', '2018-07-12', 5, 'Female', 'Unknown', '09154467782', 'jdeighne@gmail.com', 'Nurse Midwife', 'Unavailable', '2024-03-31', './public/assets/images/uploads/5.jpg', '', '', '', ''),
(8, 'Nurse', 'Beberly', 'P', 'Pimentel', '1987-06-18', 36, 'Female', 'Unknown', '09154467782', 'jdeighne@gmail.com', 'Nurse Midwife', 'Available', '2024-03-31', './public/assets/images/uploads/3.jpg', '', '', '', ''),
(9, 'Nurse', 'Rina', 'B', 'Miller', '1996-06-06', 27, 'Female', 'Unknown', '09154467782', 'jdeighne@gmail.com', 'Patient-Care Liaison', 'Available', '2024-03-31', './public/assets/images/uploads/2.jpg', '', '', '', ''),
(11, 'Nurse', 'Aiza', 'J', 'Jabonilla', '1995-07-31', 28, 'Female', 'Unknown', '09154467782', 'jdeighne@gmail.com', 'Patient-Care Liaison', 'Available', '2024-03-31', './public/assets/images/uploads/2.jpg', '', '', '', ''),
(12, 'Nurse', 'Maria Irene', 'Angeles', 'Escarda', '1997-03-05', 27, 'Female', 'Unknown', '09154467782', 'jdeighne@gmail.com', 'Patient-Care Liaison', 'Unavailable', '2024-03-31', './public/assets/images/uploads/5.jpg', '', '', '', ''),
(13, 'Dra.', 'Diane', 'U', 'Para-ase', '2001-05-19', 22, 'Female', 'Brgy. Ada Tanauan, Leyte', '09154467782', 'jdeighne@gmail.com', 'Perinatal Nurse', 'Unavailable', '2024-04-13', './public/assets/images/uploads/5.jpg', '', '', '', ''),
(14, 'Dr.', 'Cressyyy', 'O', 'Guazil', '1999-06-09', 24, 'Male', 'Brgy. Talolora Tanauan, Leyte', '09154467782', 'jdeighne@gmail.com', 'Ultrasound Technician', 'Available', '2024-04-15', './public/assets/images/uploads/12.png', '', '', '', ''),
(15, 'Dr.', 'jonard', 'N/', 'jayag', '2002-08-09', 21, 'Male', 'Osmena Marabut Samar', '09674124545', '0', 'Perinatal Nurse', 'Unavailable', '2024-07-17', './public/assets/images/uploads/020231006_102532_🍎iPhone XR .jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_type`) VALUES
(1, 'Admin'),
(2, 'Midwife'),
(3, 'Nurse'),
(4, 'Staff'),
(5, 'Utility');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_color` varchar(20) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_color`, `start`, `end`) VALUES
(1, 'Jay\'s Birthday', 'info', '2024-07-18 23:08:30', NULL),
(2, 'Jungwon\'s Birthday', 'success', '2024-07-18 23:08:30', NULL),
(4, 'Sunoo\'s Birthday', 'warning', '2024-07-18 23:08:30', NULL),
(5, 'Jake\'s Birthday', 'danger', '2024-07-18 23:08:30', NULL),
(6, 'Heesung\'s Birthday', 'info', '2024-07-18 23:08:30', NULL),
(7, 'Ni-ki\'s Birthday', 'success', '2024-07-18 23:08:30', NULL),
(8, 'Sunghoon\'s Birthday', 'warning', '2024-07-18 23:08:30', NULL),
(9, 'dra', 'success', '2024-07-18 23:08:30', NULL),
(10, 'asd', 'info', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `MH_Id` int(11) NOT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `Conditions` varchar(255) DEFAULT NULL,
  `DiagnosisDate` date DEFAULT NULL,
  `Treatment` varchar(255) DEFAULT NULL,
  `Medications` varchar(255) DEFAULT NULL,
  `Surgeries` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`MH_Id`, `FamilyRec_Id`, `Conditions`, `DiagnosisDate`, `Treatment`, `Medications`, `Surgeries`) VALUES
(1, 16, 'High Blood & Thyroid', '2024-02-14', 'None', 'A lot', 'None'),
(2, 19, 'PSTD', '2021-06-18', 'None', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `obs_history`
--

CREATE TABLE `obs_history` (
  `Obs_Id` int(11) NOT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `G` tinyint(1) DEFAULT NULL,
  `P` tinyint(1) DEFAULT NULL,
  `F` tinyint(1) DEFAULT NULL,
  `PregNo` int(11) DEFAULT NULL,
  `LMP` date DEFAULT NULL,
  `EDC` date DEFAULT NULL,
  `EDD` date DEFAULT NULL,
  `BloodType` varchar(5) DEFAULT NULL,
  `PhilHNo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obs_history`
--

INSERT INTO `obs_history` (`Obs_Id`, `FamilyRec_Id`, `G`, `P`, `F`, `PregNo`, `LMP`, `EDC`, `EDD`, `BloodType`, `PhilHNo`) VALUES
(13, 15, 0, 0, 0, 1, '0000-00-00', '0000-00-00', '0000-00-00', 'B-', '64564564564564646'),
(14, 16, 0, 0, 0, 2, '0000-00-00', '0000-00-00', '0000-00-00', 'O-', '64564564564564646'),
(16, 19, 0, 0, 0, 1, '0000-00-00', '0000-00-00', '0000-00-00', 'O+', '64564564564564646'),
(17, 20, 0, 0, 0, 1, '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(18, 21, 0, 0, 0, 1, '0000-00-00', '0000-00-00', '0000-00-00', 'O+', ''),
(20, 23, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'B+', ''),
(21, 24, 0, 0, 0, 1, '0000-00-00', '0000-00-00', '0000-00-00', 'O+', ''),
(22, 25, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(23, 26, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'A+', ''),
(24, 27, 0, 0, 0, 2, '0000-00-00', '0000-00-00', '0000-00-00', 'A-', ''),
(25, 28, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'B-', ''),
(26, 29, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'O+', ''),
(27, 30, 0, 0, 0, 2, '0000-00-00', '0000-00-00', '0000-00-00', 'O-', ''),
(28, 31, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'A+', ''),
(29, 32, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'A-', ''),
(32, 35, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'B+', ''),
(34, 37, 0, 0, 0, 1, '0000-00-00', '0000-00-00', '0000-00-00', 'AB+', ''),
(37, 40, 0, 0, 0, 3, '0000-00-00', '0000-00-00', '0000-00-00', 'AB+', '64564564564564646'),
(38, 41, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 'A+', ''),
(39, 42, 0, 0, 0, 2, '0000-00-00', '0000-00-00', '0000-00-00', 'O+', '64564564564564646'),
(40, 43, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(41, 44, 0, 0, 0, 1, '0000-00-00', '0000-00-00', '0000-00-00', 'A-', '12312312312'),
(42, 45, 0, 0, 0, 123, '0000-00-00', '0000-00-00', '0000-00-00', 'AB-', '12321'),
(43, 46, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(44, 47, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', ''),
(45, 48, 0, 0, 0, 123, '0000-00-00', '0000-00-00', '0000-00-00', 'AB+', ''),
(46, 49, 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patients_mother`
--

CREATE TABLE `patients_mother` (
  `FamilyRec_Id` int(11) NOT NULL,
  `FormattedFR_ID` varchar(255) DEFAULT NULL,
  `Title` varchar(10) DEFAULT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Middle_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Civil_Status` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Educ_level` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Date_CheckIn` datetime DEFAULT NULL,
  `Doc_Assigned` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients_mother`
--

INSERT INTO `patients_mother` (`FamilyRec_Id`, `FormattedFR_ID`, `Title`, `First_Name`, `Middle_Name`, `Last_Name`, `DateOfBirth`, `Age`, `Gender`, `Civil_Status`, `Address`, `Phone`, `Educ_level`, `Occupation`, `Religion`, `Date_CheckIn`, `Doc_Assigned`) VALUES
(20, '2024-040020', 'Miss', 'Mary Divine', 'Parado', 'Ortega', '0000-00-00', 21, 'Female', 'Married', 'Brgy. San Roque Tanauan, Leyte', '09152144158', 'College', 'Teacher', 'Catholic ', '2024-04-29 04:58:20', 'Dra. Narissa Cumpio'),
(21, '2024-040021', 'Mrs.', 'Annamae', 'Celis', 'Alarro', '0000-00-00', 27, 'Female', 'Married', 'Cavite East Palo, Leyte', '09692589458', 'College', 'Doctor', 'Roman Catholic ', '2024-04-29 05:17:59', 'Dra. Narissa Cumpio'),
(32, '2024-040032', 'Miss', 'Jhustine Nicole', '', 'Silvano', '0000-00-00', 0, 'Female', 'Single', '', '', '', '', '', '2024-04-29 06:32:56', 'Dra. Narissa Cumpio'),
(44, '2024-070044', 'Miss', 'dra', 'dsad', 'sad', '0000-00-00', 0, 'Female', 'Single', 'drazixmain@gmail.com', '09674124545', 'elementary ', 'noisy', 'born again', '2024-07-18 08:59:23', 'Dra. Narissa Cumpio'),
(45, '2024-070045', 'Mrs.', 'hiako', 'dasd', 'asd', '0000-00-00', 0, 'Female', 'Married', 'dasd', 'sad', '', 'sda', 'asd', '2024-07-31 20:01:37', 'Dra. Narissa Cumpio'),
(46, '2024-070046', 'Miss', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '2024-07-31 20:04:20', ''),
(47, '2024-070047', 'Miss', '', '', '', '0000-00-00', 0, '', '', '', '12333333333333333333', '', '', '', '2024-07-31 20:15:37', ''),
(48, '2024-070048', 'Miss', '', 'zxc', 'zxc', '0000-00-00', 0, 'Female', 'Cohabitation', 'dasd', '12333333333333333333', '', 'sda', 'asd', '2024-07-31 20:16:22', 'Dra. Narissa Cumpio'),
(49, '2024-070049', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '2024-07-31 20:27:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_status`
--

CREATE TABLE `patient_status` (
  `id` int(11) NOT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_status`
--

INSERT INTO `patient_status` (`id`, `FamilyRec_Id`, `status`, `color`) VALUES
(1, 15, 'New Patient', '#FFB800'),
(2, 16, 'On Labor', '#FFB800'),
(3, 19, 'New Patient', '#FFB800'),
(4, 40, 'New Patient', ''),
(5, 41, 'New Patient', ''),
(6, 42, 'New Patient', ''),
(7, 43, 'New Patient', ''),
(8, 44, 'New Patient', NULL),
(9, 45, 'New Patient', NULL),
(10, 46, 'New Patient', NULL),
(11, 47, 'New Patient', NULL),
(12, 48, 'New Patient', NULL),
(13, 49, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pdrels`
--

CREATE TABLE `pdrels` (
  `rel_ID` int(11) NOT NULL,
  `FamilyRec_Id` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdrels`
--

INSERT INTO `pdrels` (`rel_ID`, `FamilyRec_Id`, `DoctorID`, `note`) VALUES
(3, 15, 10, ''),
(4, 16, 10, ''),
(6, 19, 10, ''),
(7, 20, 3, ''),
(8, 21, 3, ''),
(10, 23, 10, ''),
(11, 24, 10, ''),
(12, 25, 3, ''),
(13, 26, 3, ''),
(14, 27, 10, ''),
(15, 28, 3, ''),
(16, 29, 10, ''),
(17, 30, 3, ''),
(18, 31, 10, ''),
(19, 32, 3, ''),
(22, 35, 10, ''),
(24, 37, 10, ''),
(27, 40, 3, ''),
(28, 41, 10, ''),
(29, 42, 3, ''),
(30, 43, 3, ''),
(31, 44, 3, NULL),
(32, 45, 3, NULL),
(33, 48, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `preg_files`
--

CREATE TABLE `preg_files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_size` varchar(11) NOT NULL,
  `date_of_insertion` timestamp NOT NULL DEFAULT current_timestamp(),
  `save_path` varchar(255) NOT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `history_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preg_files`
--

INSERT INTO `preg_files` (`file_id`, `file_name`, `file_type`, `file_size`, `date_of_insertion`, `save_path`, `FamilyRec_Id`, `history_id`) VALUES
(49, 'Module 1 - Lecture 2.pdf', 'pdf', '102.86 KB', '2024-05-01 03:03:33', './public/assets/documents/Module 1 - Lecture 2.pdf', 15, 3),
(50, 'Module 1 - Lecture 3.pdf', 'pdf', '162', '2024-07-12 16:00:00', './public/assets/documents/Module 1 - Lecture 3.pdf', 15, 3),
(60, 'enterprise_architecture_for_integration_rapid_delivery_methods_and_technologiesenterprise_architecture_for_integration_rapid_delivery_methods_and_technologies.pdf', 'pdf', '29.22 MB', '2024-05-01 05:28:18', './public/assets/documents/enterprise_architecture_for_integration_rapid_delivery_methods_and_technologiesenterprise_architecture_for_integration_rapid_delivery_methods_and_technologies.pdf', 40, 16),
(61, 'CERTIFICATE-OF-GRADES.pdf', 'pdf', '2.82 MB', '2024-05-01 05:28:48', './public/assets/documents/CERTIFICATE-OF-GRADES.pdf', 40, 16),
(62, 'Green and White Minimalist 2024 Calendar.pdf', 'pdf', '361.04 KB', '2024-05-01 05:30:29', './public/assets/documents/Green and White Minimalist 2024 Calendar.pdf', 40, 16),
(63, 'L I T T L E M I S S A D A 2 0 2 4 (2).pdf', 'pdf', '17.24 KB', '2024-05-01 05:31:16', './public/assets/documents/L I T T L E M I S S A D A 2 0 2 4 (2).pdf', 40, 16),
(64, 'Eng.-Dept.-parents-permit.pdf', 'pdf', '67.62 KB', '2024-05-01 05:31:16', './public/assets/documents/Eng.-Dept.-parents-permit.pdf', 40, 16),
(72, 'CYBERSECURITY REPORT.pdf', 'pdf', '2.68 MB', '2024-05-01 06:51:00', './public/assets/documents/CYBERSECURITY REPORT.pdf', 19, 8),
(73, 'COMPLETE NARRATIVE_103827 (2).pdf', 'pdf', '335', '2024-07-03 16:00:00', './public/assets/documents/COMPLETE NARRATIVE_103827 (2).pdf', 21, 17),
(75, 'VERONA(JOURNAL).pdf', 'pdf', '537', '2024-07-03 16:00:00', './public/assets/documents/VERONA(JOURNAL).pdf', 21, 17),
(77, 's41598-023-30998-x.pdf', 'pdf', '799.85 KB', '2024-07-03 17:03:04', './public/assets/documents/s41598-023-30998-x.pdf', 20, 5),
(79, 'Development_of_a_Maternity_Clinic_Inform.pdf', 'pdf', '279.67 KB', '2024-07-03 17:04:00', './public/assets/documents/Development_of_a_Maternity_Clinic_Inform.pdf', 20, 5),
(80, 'salcedo.pdf', 'pdf', '6', '2024-07-03 16:00:00', './public/assets/documents/salcedo.pdf', 20, 5),
(81, 'Development_of_a_Maternity_Clinic_Inform.pdf', 'pdf', '279.67 KB', '2024-07-03 17:15:37', './public/assets/documents/Development_of_a_Maternity_Clinic_Inform.pdf', 42, 19);

-- --------------------------------------------------------

--
-- Table structure for table `preg_history`
--

CREATE TABLE `preg_history` (
  `history_id` int(11) NOT NULL,
  `FamilyRec_Id` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preg_history`
--

INSERT INTO `preg_history` (`history_id`, `FamilyRec_Id`, `folder_name`, `created_date`, `date_modified`) VALUES
(3, 15, '1st Pregnancy', '2024-04-28 10:50:27', '2024-04-30 04:27:14'),
(4, 15, '2nd Pregnancy', '2024-04-29 04:39:03', '2024-04-30 04:27:14'),
(5, 20, '1st Pregnancy', '2024-04-29 05:17:05', '2024-04-30 04:27:14'),
(8, 19, '1st Pregnancy', '2024-04-30 04:09:04', '2024-04-30 04:27:14'),
(13, 16, '1st Pregnancy', '2024-04-30 09:23:20', '2024-04-30 09:23:20'),
(16, 40, '1st Pregnancy', '2024-05-01 05:27:32', '2024-05-01 05:27:32'),
(17, 21, '1st Pregnancy', '2024-07-03 16:21:56', '2024-07-03 16:21:56'),
(18, 20, '2nd Pregnancy', '2024-07-03 17:02:22', '2024-07-03 17:02:22'),
(19, 42, 'First Pregnancy ', '2024-07-03 17:14:53', '2024-07-03 17:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `prenatal`
--

CREATE TABLE `prenatal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date_of_gen` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prenatal`
--

INSERT INTO `prenatal` (`id`, `FamilyRec_Id`, `full_name`, `status`, `date_of_gen`) VALUES
(1, 20, 'sdfsdf', 'fsdfs', '2024-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `S_Id` int(11) NOT NULL,
  `A_Id` int(11) DEFAULT NULL,
  `appointment_name` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `dateOfAppointment` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `colors` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `spouseinformation`
--

CREATE TABLE `spouseinformation` (
  `Spouse_Id` int(11) NOT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodType` varchar(5) DEFAULT NULL,
  `Src_Income` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spouseinformation`
--

INSERT INTO `spouseinformation` (`Spouse_Id`, `FamilyRec_Id`, `Name`, `Age`, `BloodType`, `Src_Income`) VALUES
(13, 15, 'Dennis Aguipo', 33, 'AB+', 'Construction'),
(14, 16, 'Francis M. Para-ase', 49, 'AB+', 'Farm'),
(17, 19, '', 0, '', ''),
(18, 20, 'Brent Ortega', 28, 'A+', '3000 to 5000'),
(19, 21, 'Nirick Mike M. Alarro', 30, 'O+', '5000 above'),
(21, 23, 'Jhaiven Corales', 27, 'B+', ''),
(22, 24, 'Axrill Jkae Parado', 26, 'O+', '5000 above'),
(23, 25, '', 0, '', ''),
(24, 26, '', 0, '', ''),
(25, 27, '', 0, '', ''),
(26, 28, 'Patrick Adrian', 0, 'B-', ''),
(27, 29, 'Jan cris', 0, 'AB+', '3000 to 5000'),
(28, 30, 'Gian Lester', 0, 'AB-', '5000 above'),
(29, 31, 'Mark Verneil', 0, 'A+', ''),
(30, 32, '', 0, '', ''),
(33, 35, '', 0, '', ''),
(35, 37, 'Clarque Lemmuel Villaruel', 0, 'AB-', '5000 above'),
(38, 40, 'Jay Wonwoo Park-Jeon', 28, 'AB+', 'K-pop Entertainment'),
(39, 41, '', 0, '', ''),
(40, 42, 'Dennis Aguipo', 20, 'B-', 'Work'),
(41, 43, '', 0, '', ''),
(42, 44, 'JOnard', 21, 'A+', 'army'),
(43, 45, 'dsa', 0, 'A-', ''),
(44, 46, '', 0, '', ''),
(45, 47, '', 0, '', ''),
(46, 48, 'dsa', 0, 'AB-', ''),
(47, 49, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `user_type`, `avatar`, `created_at`) VALUES
(11, 'Admin', 'admin', '', 'Administrator', 'ace.png', '2021-05-03 02:33:03'),
(13, 'Captain', 'admin', '', 'Administrator', '02112023152727ada_logo-removebg-preview.png', '2023-11-15 15:47:24'),
(24, 'Treasurer', 'treasure', '', 'Staff', '07042022120148scv20220407_175858.png', '2023-11-16 05:40:48'),
(28, 'BHW', 'luna', '', 'Staff', '6554eea1ca185.jpg', '2023-11-22 15:36:49'),
(39, 'Jonards', '123456', 'drazixmain0122@gmail.com', 'Administrator', '../public/assets/images/uploads/engelogo.jfif', '2024-07-18 07:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `vitals`
--

CREATE TABLE `vitals` (
  `v_id` int(11) NOT NULL,
  `FamilyRec_Id` int(11) NOT NULL,
  `BP` varchar(10) DEFAULT NULL,
  `PR` varchar(10) DEFAULT NULL,
  `RR` varchar(10) DEFAULT NULL,
  `FH` varchar(10) DEFAULT NULL,
  `FHT` varchar(10) DEFAULT NULL,
  `AOG` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vitals`
--

INSERT INTO `vitals` (`v_id`, `FamilyRec_Id`, `BP`, `PR`, `RR`, `FH`, `FHT`, `AOG`) VALUES
(1, 44, '132', '12', '21', '21', '21', '21'),
(2, 45, '123', '123', '123', '231', '231', '213'),
(3, 46, '', '', '', '', '', ''),
(4, 47, '', '', '', '', '', ''),
(5, 48, '123', '123', '123', '231', '231', '213'),
(6, 49, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`A_Id`);

--
-- Indexes for table `archive_app`
--
ALTER TABLE `archive_app`
  ADD PRIMARY KEY (`Arc_Id`),
  ADD KEY `A_Id` (`A_Id`);

--
-- Indexes for table `archive_doctor`
--
ALTER TABLE `archive_doctor`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `archive_patient`
--
ALTER TABLE `archive_patient`
  ADD PRIMARY KEY (`arc_pm_id`);

--
-- Indexes for table `archive_pfiles`
--
ALTER TABLE `archive_pfiles`
  ADD PRIMARY KEY (`arc_pfile_id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`),
  ADD KEY `history_id` (`history_id`);

--
-- Indexes for table `archive_staff`
--
ALTER TABLE `archive_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `clinic_staff`
--
ALTER TABLE `clinic_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `colabel_status`
--
ALTER TABLE `colabel_status`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`MH_Id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`);

--
-- Indexes for table `obs_history`
--
ALTER TABLE `obs_history`
  ADD PRIMARY KEY (`Obs_Id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`);

--
-- Indexes for table `patients_mother`
--
ALTER TABLE `patients_mother`
  ADD PRIMARY KEY (`FamilyRec_Id`);

--
-- Indexes for table `patient_status`
--
ALTER TABLE `patient_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`);

--
-- Indexes for table `pdrels`
--
ALTER TABLE `pdrels`
  ADD PRIMARY KEY (`rel_ID`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `preg_files`
--
ALTER TABLE `preg_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`),
  ADD KEY `history_id` (`history_id`);

--
-- Indexes for table `preg_history`
--
ALTER TABLE `preg_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`);

--
-- Indexes for table `prenatal`
--
ALTER TABLE `prenatal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`S_Id`),
  ADD KEY `A_Id` (`A_Id`);

--
-- Indexes for table `spouseinformation`
--
ALTER TABLE `spouseinformation`
  ADD PRIMARY KEY (`Spouse_Id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vitals`
--
ALTER TABLE `vitals`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `FamilyRec_Id` (`FamilyRec_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `A_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `archive_app`
--
ALTER TABLE `archive_app`
  MODIFY `Arc_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `archive_patient`
--
ALTER TABLE `archive_patient`
  MODIFY `arc_pm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_pfiles`
--
ALTER TABLE `archive_pfiles`
  MODIFY `arc_pfile_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic_staff`
--
ALTER TABLE `clinic_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colabel_status`
--
ALTER TABLE `colabel_status`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `MH_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obs_history`
--
ALTER TABLE `obs_history`
  MODIFY `Obs_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `patients_mother`
--
ALTER TABLE `patients_mother`
  MODIFY `FamilyRec_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `patient_status`
--
ALTER TABLE `patient_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pdrels`
--
ALTER TABLE `pdrels`
  MODIFY `rel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `preg_files`
--
ALTER TABLE `preg_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `preg_history`
--
ALTER TABLE `preg_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prenatal`
--
ALTER TABLE `prenatal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spouseinformation`
--
ALTER TABLE `spouseinformation`
  MODIFY `Spouse_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `vitals`
--
ALTER TABLE `vitals`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archive_app`
--
ALTER TABLE `archive_app`
  ADD CONSTRAINT `archive_app_ibfk_1` FOREIGN KEY (`A_Id`) REFERENCES `appointments` (`A_Id`) ON DELETE CASCADE;

--
-- Constraints for table `prenatal`
--
ALTER TABLE `prenatal`
  ADD CONSTRAINT `prenatal_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`);

--
-- Constraints for table `vitals`
--
ALTER TABLE `vitals`
  ADD CONSTRAINT `vitals_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
