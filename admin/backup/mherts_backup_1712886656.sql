# MHERTS : MySQL database backup
#
# Generated: Friday 12. April 2024
# Hostname: localhost
# Database: mherts
# --------------------------------------------------------
USE mherts;



#
# Delete any existing table `appointments`
#

DROP TABLE IF EXISTS `appointments`;


#
# Table structure of table `appointments`
#



CREATE TABLE `appointments` (
  `A_Id` int(11) NOT NULL AUTO_INCREMENT,
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
  `Accepted` int(11) DEFAULT 0,
  PRIMARY KEY (`A_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO appointments VALUES("1","Mrs.","Dianne ","Yang","2024-04-18","02:00:00","03:00:00","Brgy. Ada Tanauan, Leyte ","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","Delulu","0");
INSERT INTO appointments VALUES("4","Mrs.","Elizabeth","Para-ase","2024-04-11","10:20:00","11:00:00","Brgy. Ada Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","elizabethpar@gmail.com","Headache","None","0");
INSERT INTO appointments VALUES("5","Mrs.","Caroline","Magayones","2024-04-09","08:30:00","09:00:00","Bgry. Kiling Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","caroline@gmail.com","Cold","None","0");
INSERT INTO appointments VALUES("6","Mrs.","Sherie","Cuangco","2024-04-15","11:20:00","12:00:00","Brgy. Canramos Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","sheriecuangco@gmail.com","Light Cough","None","0");
INSERT INTO appointments VALUES("7","Mrs.","Monique","Lastemosa","2024-04-19","09:20:00","10:10:00","Brgy. San Roque Tanauan,Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","moniquelastem@gmail.com","Cold","None","0");
INSERT INTO appointments VALUES("8","Miss","Quieniee","Valer","2024-04-11","09:40:00","10:30:00","Brgy. Pago Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","quieen2gmail.com","Not Feeling Well","None","0");



#
# Delete any existing table `archive_app`
#

DROP TABLE IF EXISTS `archive_app`;


#
# Table structure of table `archive_app`
#



CREATE TABLE `archive_app` (
  `Arc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `A_Id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `doctor` varchar(255) DEFAULT NULL,
  `conditions` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `declineReason` text DEFAULT NULL,
  `declineDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Arc_Id`),
  KEY `A_Id` (`A_Id`),
  CONSTRAINT `archive_app_ibfk_1` FOREIGN KEY (`A_Id`) REFERENCES `appointments` (`A_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




#
# Delete any existing table `doctors`
#

DROP TABLE IF EXISTS `doctors`;


#
# Table structure of table `doctors`
#



CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`DoctorID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO doctors VALUES("3","Dra.","Narissa","R","Cumpio","1989-02-07","35","Female","Brgy. St. NIno Tanauan, Leyte","09154467782","jdeighne@gmail.com","Obstetrician/Gynecologist","Available","2024-03-31","./public/assets/images/uploads/4.jpg");
INSERT INTO doctors VALUES("7","Nurse","Marife","B","Rotilles","2018-07-12","5","Female","Unknown","09154467782","jdeighne@gmail.com","Nurse Midwife","Unavailable","2024-03-31","./public/assets/images/uploads/5.jpg");
INSERT INTO doctors VALUES("8","Nurse","Beberly","P","Pimentel","1987-06-18","36","Female","Unknown","09154467782","jdeighne@gmail.com","Nurse Midwife","Available","2024-03-31","./public/assets/images/uploads/3.jpg");
INSERT INTO doctors VALUES("9","Nurse","Rina","B","Miller","1996-06-06","27","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Available","2024-03-31","./public/assets/images/uploads/2.jpg");
INSERT INTO doctors VALUES("10","Dra.","Tina","R","Cumpio","1991-02-06","33","Female","Brgy. St. Nino Tanauan, Leyte","09154467782","jdeighne@gmail.com","Obstetrician/Gynecologist","Available","2024-03-31","./public/assets/images/uploads/4.jpg");
INSERT INTO doctors VALUES("11","Nurse","Aiza","J","Jabonilla","1995-07-31","28","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Available","2024-03-31","./public/assets/images/uploads/2.jpg");
INSERT INTO doctors VALUES("12","Nurse","Maria Irene Angeles","S","Escarda","1997-03-05","27","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Unavailable","2024-03-31","./public/assets/images/uploads/5.jpg");



#
# Delete any existing table `medicalhistory`
#

DROP TABLE IF EXISTS `medicalhistory`;


#
# Table structure of table `medicalhistory`
#



CREATE TABLE `medicalhistory` (
  `MH_ID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Conditions` varchar(100) NOT NULL,
  `DiagnosisDate` date NOT NULL,
  `Treatment` text NOT NULL,
  `Medications` text NOT NULL,
  `Surgeries` text NOT NULL,
  PRIMARY KEY (`MH_ID`),
  KEY `PatientID` (`PatientID`),
  CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




#
# Delete any existing table `patients`
#

DROP TABLE IF EXISTS `patients`;


#
# Table structure of table `patients`
#



CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL AUTO_INCREMENT,
  `FormattedPatientID` varchar(20) DEFAULT NULL,
  `Title` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `CivilStatus` varchar(50) NOT NULL,
  `Trimester` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MedicalHistory` text NOT NULL,
  `ObstetricHistory` text NOT NULL,
  `DateCheckIn` datetime NOT NULL,
  `DoctorAssigned` varchar(100) NOT NULL,
  PRIMARY KEY (`PatientID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO patients VALUES("19","2024-030019","Miss","Brielle","Fortalejo","Montemayor","1985-02-03","39","Female","Married","Second Trimester","Makati","09127373474744","jdeighne@gmail.com","","None","2024-03-30 06:18:23","Dra. Gomez");
INSERT INTO patients VALUES("20","2024-030020","Mrs.","Franca","Buenaventura","Delafuente","1998-05-05","25","Female","Married","First Trimester","Davao","09127373474744","jdeighne@gmail.com","","None","2024-03-30 06:25:46","Dra. Gomez");
INSERT INTO patients VALUES("21","2024-030021","Mrs.","Dianne","Para-ase","Yang","2000-02-09","24","Female","Married","Third Trimester","Seoul, South Korea","09127373474744","jdeighne@gmail.com","","None","2024-03-30 06:29:20","Dra. Gomez");
INSERT INTO patients VALUES("22","2024-030022","Mrs.","Caren","Ignacio","Villas","1995-11-08","28","Female","Married","Second Trimester","Cebu","09127373474744","jdeighne@gmail.com","","None","2024-03-30 06:41:01","Dra. Gomez");
INSERT INTO patients VALUES("23","2024-030023","Miss","Irah","Buenaventura","Delafuente","2000-01-07","24","Female","Married","First Trimester","Davao","09127373474744","jdeighne@gmail.com","","None","2024-03-31 03:09:16","Dra. Gomez");
INSERT INTO patients VALUES("25","2024-030025","Mrs.","Nana","Delafuente","Buenaventura","2001-10-03","22","Female","Married","Second Trimester","Makati","09127373474744","jdeighne@gmail.com","","None","2024-03-31 09:05:36","Dra. Gomez");
INSERT INTO patients VALUES("26","2024-030026","Mrs.","Kate","Javeir","Mendoza","1989-02-07","35","Female","Married","Third Trimester","Unknown","09127373474744","jdeighne@gmail.com","","None","2024-03-31 09:30:13","Dra. Gomez");
INSERT INTO patients VALUES("27","2024-040027","Miss","Francisca","Estabillo","Magayones","2002-03-21","22","Female","Single","First Trimester","Tanauan","09127373474744","jdeighne@gmail.com","","None","2024-04-08 02:11:03","Dra. Gomez");

