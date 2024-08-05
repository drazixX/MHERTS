# MHERTS : MySQL database backup
#
# Generated: Monday 22. April 2024
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
  `Accepted` int(11) DEFAULT 2,
  PRIMARY KEY (`A_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO appointments VALUES("1","Mrs.","Dianne ","Yang","2024-04-18","02:00:00","03:00:00","Brgy. Ada Tanauan, Leyte ","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","Delulu","0");
INSERT INTO appointments VALUES("4","Mrs.","Elizabeth","Para-ase","2024-04-11","10:20:00","11:00:00","Brgy. Ada Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","elizabethpar@gmail.com","Headache","None","0");
INSERT INTO appointments VALUES("5","Mrs.","Caroline","Magayones","2024-04-09","08:30:00","09:00:00","Bgry. Kiling Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","caroline@gmail.com","Cold","None","2");
INSERT INTO appointments VALUES("6","Mrs.","Sherie","Cuangco","2024-04-15","11:20:00","12:00:00","Brgy. Canramos Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","sheriecuangco@gmail.com","Light Cough","None","2");
INSERT INTO appointments VALUES("7","Mrs.","Monique","Lastemosa","2024-04-19","09:20:00","10:10:00","Brgy. San Roque Tanauan,Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","moniquelastem@gmail.com","Cold","None","2");
INSERT INTO appointments VALUES("8","Miss","Quieniee","Valer","2024-04-11","09:40:00","10:30:00","Brgy. Pago Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","quieen2gmail.com","Not Feeling Well","None","2");
INSERT INTO appointments VALUES("17","Mrs.","Clarita","Falcon","2024-04-21","01:00:00","02:00:00","Canbalisara","09153368892","Dra. Tina Cumpio","claritafalcon70@gmail.com","Bleeding","Spots","2");
INSERT INTO appointments VALUES("18","","Dianne ","Yang","2024-04-18","00:00:00","00:00:00","","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","","0");
INSERT INTO appointments VALUES("19","","Dianne ","Yang","2024-04-18","13:07:00","14:06:00","","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","","2");
INSERT INTO appointments VALUES("20","Miss","Daniella","Jeser","2024-04-23","03:00:00","04:00:00","Picas","091521441522","Dra. Tina Cumpio","daniella@gmail.com","Not Feeling Well","None","0");
INSERT INTO appointments VALUES("21","","Daniella","Jeser","2024-04-23","03:00:00","04:00:00","","091521441522","Dra. Tina Cumpio","daniella@gmail.com","Not Feeling Well","","2");



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
  `declineDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Arc_Id`),
  KEY `A_Id` (`A_Id`),
  CONSTRAINT `archive_app_ibfk_1` FOREIGN KEY (`A_Id`) REFERENCES `appointments` (`A_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO archive_app VALUES("4","4","Mrs.","Elizabeth","Para-ase","2024-04-11","10:20:00","11:00:00","Brgy. Ada Tanauan, Leyte","09153368892","elizabethpar@gmail.com","Dra. Narissa Cumpio - OBGYNE","Headache","None","High Blood
","2024-04-17 11:06:14");



#
# Delete any existing table `calendar`
#

DROP TABLE IF EXISTS `calendar`;


#
# Table structure of table `calendar`
#



CREATE TABLE `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




#
# Delete any existing table `clinic_staff`
#

DROP TABLE IF EXISTS `clinic_staff`;


#
# Table structure of table `clinic_staff`
#



CREATE TABLE `clinic_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`staff_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `clinic_staff_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO clinic_staff VALUES("1","1","Alexander","None","Cumpio","0000-00-00","0","Male","@gmail.com","Brgy. St. Nino Tanauan, Leyte","College Graduate","0000-00-00","[value-13]","09153368892");



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
  `instagram` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `rating` varchar(11) NOT NULL,
  PRIMARY KEY (`DoctorID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO doctors VALUES("3","Dra.","Narissa","R","Cumpio","1989-02-07","35","Female","Brgy. St. NIno Tanauan, Leyte","09154467782","jdeighne@gmail.com","Obstetrician/Gynecologist","Available","2024-03-31","./public/assets/images/uploads/4.jpg","","","","");
INSERT INTO doctors VALUES("7","Nurse","Marife","B","Rotilles","2018-07-12","5","Female","Unknown","09154467782","jdeighne@gmail.com","Nurse Midwife","Unavailable","2024-03-31","./public/assets/images/uploads/5.jpg","","","","");
INSERT INTO doctors VALUES("8","Nurse","Beberly","P","Pimentel","1987-06-18","36","Female","Unknown","09154467782","jdeighne@gmail.com","Nurse Midwife","Available","2024-03-31","./public/assets/images/uploads/3.jpg","","","","");
INSERT INTO doctors VALUES("9","Nurse","Rina","B","Miller","1996-06-06","27","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Available","2024-03-31","./public/assets/images/uploads/2.jpg","","","","");
INSERT INTO doctors VALUES("10","Dra.","Tina","R","Cumpio","1991-02-06","33","Female","Brgy. St. Nino Tanauan, Leyte","09154467782","jdeighne@gmail.com","Obstetrician/Gynecologist","Available","2024-03-31","./public/assets/images/uploads/4.jpg","","","","");
INSERT INTO doctors VALUES("11","Nurse","Aiza","J","Jabonilla","1995-07-31","28","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Available","2024-03-31","./public/assets/images/uploads/2.jpg","","","","");
INSERT INTO doctors VALUES("12","Nurse","Maria Irene","Angeles","Escarda","1997-03-05","27","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Unavailable","2024-03-31","./public/assets/images/uploads/5.jpg","","","","");
INSERT INTO doctors VALUES("13","Dra.","Diane","U","Para-ase","2001-05-19","22","Female","Brgy. Ada Tanauan, Leyte","09154467782","jdeighne@gmail.com","Perinatal Nurse","Unavailable","2024-04-13","./public/assets/images/uploads/5.jpg","","","","");
INSERT INTO doctors VALUES("14","Dr.","Cressyyy","O","Guazil","1999-06-09","24","Male","Brgy. Talolora Tanauan, Leyte","09154467782","jdeighne@gmail.com","Ultrasound Technician","Available","2024-04-15","./public/assets/images/uploads/12.png","","","","");



#
# Delete any existing table `employee`
#

DROP TABLE IF EXISTS `employee`;


#
# Table structure of table `employee`
#



CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO employee VALUES("1","Admin");
INSERT INTO employee VALUES("2","Midwife");
INSERT INTO employee VALUES("3","Nurse");
INSERT INTO employee VALUES("4","Staff");
INSERT INTO employee VALUES("5","Utility");



#
# Delete any existing table `events`
#

DROP TABLE IF EXISTS `events`;


#
# Table structure of table `events`
#



CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  `event_color` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO events VALUES("1","Jay's Birthday","info");
INSERT INTO events VALUES("2","Jungwon's Birthday","success");
INSERT INTO events VALUES("4","Sunoo's Birthday","warning");
INSERT INTO events VALUES("5","Jake's Birthday","danger");
INSERT INTO events VALUES("6","Heesung's Birthday","info");
INSERT INTO events VALUES("7","Ni-ki's Birthday","success");
INSERT INTO events VALUES("8","Sunghoon's Birthday","warning");



#
# Delete any existing table `exp`
#

DROP TABLE IF EXISTS `exp`;


#
# Table structure of table `exp`
#



CREATE TABLE `exp` (
  `staff_id` int(11) NOT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  CONSTRAINT `exp_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `clinic_staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




#
# Delete any existing table `medicalhistory`
#

DROP TABLE IF EXISTS `medicalhistory`;


#
# Table structure of table `medicalhistory`
#



CREATE TABLE `medicalhistory` (
  `MH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PatientID` int(11) NOT NULL,
  `Conditions` varchar(100) NOT NULL,
  `DiagnosisDate` date NOT NULL,
  `Treatment` text NOT NULL,
  `Medications` text NOT NULL,
  `Surgeries` text NOT NULL,
  PRIMARY KEY (`MH_ID`),
  KEY `PatientID` (`PatientID`),
  CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO medicalhistory VALUES("3","1","Not Feeling Wheel","2024-04-10","Sleep","None","None");
INSERT INTO medicalhistory VALUES("4","36","Not Feeling Wheel","2024-04-15","Sleep","None","None");
INSERT INTO medicalhistory VALUES("5","37","Not Feeling Wheel","2024-04-11","Sleep","None","None");
INSERT INTO medicalhistory VALUES("8","40","Not Feeling Wheel","2024-04-26","Water and Vegetable","N","None");
INSERT INTO medicalhistory VALUES("9","41","High Blood","2024-05-02","None","None","None");



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
  `Health_Con` varchar(255) NOT NULL,
  `MedicalHistory` text NOT NULL,
  `ObstetricHistory` text NOT NULL,
  `DateCheckIn` datetime NOT NULL,
  `DoctorAssigned` varchar(100) NOT NULL,
  PRIMARY KEY (`PatientID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO patients VALUES("1","2024-030001","Mrs.","Angelica","Menisis","Balmes","1996-07-17","27","Female","Married","Second Trimester","Mayorga","09127373474744","angelbalmes@gmail.com","Normal","yes","None","2024-04-17 01:31:27","Dra. Tina Cumpio");
INSERT INTO patients VALUES("19","2024-030019","Miss","Brielle","Fortalejo","Montemayor","1985-02-03","39","Female","Married","Second Trimester","Makati","09127373474744","jdeighne@gmail.com","Normal","no","None","2024-03-30 06:18:23","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("20","2024-030020","Mrs.","Franca","Buenaventura","Delafuente","1998-05-05","25","Female","Married","First Trimester","Davao","09127373474744","jdeighne@gmail.com","Overweight","no","None","2024-03-30 06:25:46","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("21","2024-030021","Mrs.","Dianne","Para-ase","Yang","2000-02-09","24","Female","Married","Third Trimester","Seoul, South Korea","09127373474744","jdeighne@gmail.com","Normal","no","None","2024-03-30 06:29:20","Dra. Tina Cumpio");
INSERT INTO patients VALUES("22","2024-030022","Mrs.","Caren","Ignacio","Villas","1995-11-08","28","Female","Married","Second Trimester","Cebu","09127373474744","jdeighne@gmail.com","Overweight","no","None","2024-03-30 06:41:01","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("23","2024-030023","Miss","Irah","Buenaventura","Delafuente","2000-01-07","24","Female","Married","First Trimester","Davao","09127373474744","jdeighne@gmail.com","Normal","no","None","2024-03-31 03:09:16","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("25","2024-030025","Mrs.","Nana","Delafuente","Buenaventura","2001-10-03","22","Female","Married","Second Trimester","Makati","09127373474744","jdeighne@gmail.com","Normal","no","None","2024-03-31 09:05:36","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("26","2024-030026","Mrs.","Kate","Javeir","Mendoza","1989-02-07","35","Female","Married","Third Trimester","Unknown","09127373474744","jdeighne@gmail.com","Overweight","no","None","2024-03-31 09:30:13","Dra. Tina Cumpio");
INSERT INTO patients VALUES("27","2024-040027","Miss","Francisca","Estabillo","Magayones","2002-03-21","22","Female","Single","First Trimester","Tanauan","09127373474744","jdeighne@gmail.com","Normal","no","None","2024-04-08 02:11:03","Dra. Tina Cumpio");
INSERT INTO patients VALUES("30","2024-040030","Mrs.","Daryl","Ampo","Park-Jeon","1998-06-10","25","Female","Married","Second Trimester","Malaguicay","09127373474744","darylsablza@gmail.com","Normal","no","None","2024-04-15 09:07:00","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("31","2024-040031","Mrs.","Lolits","Canmud","Leon","1995-01-31","29","Female","Married","Third Trimester","Dagami","09127373474744","lolits@gmai;l.com","Overweight","no","None","2024-04-15 13:06:41","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("32","2024-040032","Mrs.","Alexandra","Masalihit","Lopez","1990-12-31","33","Female","Married","First Trimester","Burauen","09127373474744","jdeighne@gmail.com","Overweight","no","None","2024-04-15 13:43:26","Dra. Tina Cumpio");
INSERT INTO patients VALUES("36","2024-040036","Miss","Lovely","Park","Yang","2001-10-10","22","Female","Single","First Trimester","Santa Fe","09127373474744","jdeighne@gmail.com","Normal","","None","2024-04-17 01:52:04","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("37","2024-040037","Mrs.","Elizabeth","Balmes","Para-ase","1977-07-04","46","Female","Married","Second Trimester","Tanauan","09127373474744","elizabethparaase@gmail.com","Normal","","None","2024-04-17 01:55:42","Dra. Narissa Cumpio");
INSERT INTO patients VALUES("40","2024-040040","Mrs.","Rebecca","Yemen","Ursula","1998-06-17","25","Female","Married","Second Trimester","Tanauan","09127373474744","rebecca@gmail.com","Normal","","None","2024-04-17 03:09:17","Dra. Tina Cumpio");
INSERT INTO patients VALUES("41","2024-040041","Mrs.","Christine","Logasa","Parado","1999-09-15","24","Female","Single","First Trimester","Palo","09127373474744","christinelogasa@gmail.com","Normal","","None","2024-04-17 03:16:50","Dra. Tina Cumpio");



#
# Delete any existing table `schedules`
#

DROP TABLE IF EXISTS `schedules`;


#
# Table structure of table `schedules`
#



CREATE TABLE `schedules` (
  `S_Id` int(11) NOT NULL AUTO_INCREMENT,
  `A_Id` int(11) DEFAULT NULL,
  `appointment_name` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `dateOfAppointment` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `colors` varchar(20) NOT NULL,
  PRIMARY KEY (`S_Id`),
  KEY `A_Id` (`A_Id`),
  CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`A_Id`) REFERENCES `appointments` (`A_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




#
# Delete any existing table `tbl_users`
#

DROP TABLE IF EXISTS `tbl_users`;


#
# Table structure of table `tbl_users`
#



CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_users VALUES("11","Admin","admin","","Administrator","ace.png","2021-05-03 10:33:03");
INSERT INTO tbl_users VALUES("13","Captain","admin","","Administrator","02112023152727ada_logo-removebg-preview.png","2023-11-15 23:47:24");
INSERT INTO tbl_users VALUES("24","Treasurer","treasure","","Staff","07042022120148scv20220407_175858.png","2023-11-16 13:40:48");
INSERT INTO tbl_users VALUES("28","BHW","luna","","Staff","6554eea1ca185.jpg","2023-11-22 23:36:49");

