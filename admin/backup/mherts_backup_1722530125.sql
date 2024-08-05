# MHERTS : MySQL database backup
#
# Generated: Thursday 1. August 2024
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

INSERT INTO appointments VALUES("1","Mrs.","Dianne ","Yang","2024-04-18","02:00:00","03:00:00","Brgy. Ada Tanauan, Leyte ","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","Delulu","0");
INSERT INTO appointments VALUES("4","Mrs.","Elizabeth","Para-ase","2024-04-11","10:20:00","11:00:00","Brgy. Ada Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","elizabethpar@gmail.com","Headache","None","0");
INSERT INTO appointments VALUES("5","Mrs.","Caroline","Magayones","2024-04-09","08:30:00","09:00:00","Bgry. Kiling Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","caroline@gmail.com","Cold","None","0");
INSERT INTO appointments VALUES("7","Mrs.","Monique","Lastemosa","2024-04-19","09:20:00","10:10:00","Brgy. San Roque Tanauan,Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","moniquelastem@gmail.com","Cold","None","0");
INSERT INTO appointments VALUES("8","Miss","Quieniee","Valer","2024-04-11","09:40:00","10:30:00","Brgy. Pago Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","quieen2gmail.com","Not Feeling Well","None","0");
INSERT INTO appointments VALUES("17","Mrs.","Clarita","Falcon","2024-04-21","01:00:00","02:00:00","Canbalisara","09153368892","Dra. Tina Cumpio","claritafalcon70@gmail.com","Bleeding","Spots","0");
INSERT INTO appointments VALUES("18","","Dianne ","Yang","2024-04-18","00:00:00","00:00:00","","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","","0");
INSERT INTO appointments VALUES("19","","Dianne ","Yang","2024-04-18","13:07:00","14:06:00","","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","","0");
INSERT INTO appointments VALUES("20","Miss","Daniella","Jeser","2024-04-23","03:00:00","04:00:00","Picas","091521441522","Dra. Tina Cumpio","daniella@gmail.com","Not Feeling Well","None","0");
INSERT INTO appointments VALUES("21","","Daniella","Jeser","2024-04-23","03:00:00","04:00:00","","091521441522","Dra. Tina Cumpio","daniella@gmail.com","Not Feeling Well","","0");
INSERT INTO appointments VALUES("22","","Caroline","Magayones","2024-04-09","08:30:00","09:00:00","","09153368892","Dra. Narissa Cumpio - OBGYNE","caroline@gmail.com","Cold","","0");
INSERT INTO appointments VALUES("23","","Monique","Lastemosa","2024-04-19","09:20:00","10:10:00","","09153368892","Dra. Narissa Cumpio - OBGYNE","moniquelastem@gmail.com","Cold","","0");
INSERT INTO appointments VALUES("24","","Quieniee","Valer","2024-04-11","09:40:00","10:30:00","","09153368892","Dra. Narissa Cumpio - OBGYNE","quieen2gmail.com","Not Feeling Well","","2");
INSERT INTO appointments VALUES("26","","Elizabeth","Para-ase","2024-04-11","10:20:00","11:00:00","","09153368892","Dra. Narissa Cumpio - OBGYNE","elizabethpar@gmail.com","Headache","","2");
INSERT INTO appointments VALUES("27","","Caroline","Magayones","2024-04-09","08:30:00","09:00:00","","09153368892","Dra. Narissa Cumpio - OBGYNE","caroline@gmail.com","Cold","","0");



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
  CONSTRAINT `archive_app_ibfk_1` FOREIGN KEY (`A_Id`) REFERENCES `appointments` (`A_Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO archive_app VALUES("12","17","Mrs.","Clarita","Falcon","2024-04-21","01:00:00","02:00:00","Canbalisara","09153368892","claritafalcon70@gmail.com","Dra. Tina Cumpio","Bleeding","Spots","sd","2024-07-30 22:37:02");
INSERT INTO archive_app VALUES("14","19","","Dianne ","Yang","2024-04-18","13:07:00","14:06:00","","09273122446","jdeighne@gmail.com","Dra. Narissa Cumpio - OBGYNE","Not Feeling Well","","haha","2024-07-31 00:32:11");
INSERT INTO archive_app VALUES("15","21","","Daniella","Jeser","2024-04-23","03:00:00","04:00:00","","091521441522","daniella@gmail.com","Dra. Tina Cumpio","Not Feeling Well","","","2024-07-31 13:25:11");
INSERT INTO archive_app VALUES("17","23","","Monique","Lastemosa","2024-04-19","09:20:00","10:10:00","","09153368892","moniquelastem@gmail.com","Dra. Narissa Cumpio - OBGYNE","Cold","","","2024-07-31 22:13:50");
INSERT INTO archive_app VALUES("18","27","","Caroline","Magayones","2024-04-09","08:30:00","09:00:00","","09153368892","caroline@gmail.com","Dra. Narissa Cumpio - OBGYNE","Cold","","","2024-08-01 16:09:00");



#
# Delete any existing table `archive_doctor`
#

DROP TABLE IF EXISTS `archive_doctor`;


#
# Table structure of table `archive_doctor`
#



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
  `File` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`DoctorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO archive_doctor VALUES("8","Nurse","Beberly","P","Pimentel","1987-06-18","36","Female","Unknown","09154467782","0","Nurse Midwife","Available","2024-03-31","./public/assets/images/uploads/3.jpg");
INSERT INTO archive_doctor VALUES("14","Dr.","Cressyyy","O","Guazil","1999-06-09","24","Male","Brgy. Talolora Tanauan, Leyte","09154467782","jdeighne@gmail.com","Ultrasound Technician","Available","2024-04-15","./public/assets/images/uploads/12.png");
INSERT INTO archive_doctor VALUES("15","Dr.","jonard","N/","jayag","2002-08-09","21","Male","Osmena Marabut Samar","09674124545","0","Perinatal Nurse","Unavailable","2024-07-17","./public/assets/images/uploads/020231006_102532_?iPhone XR .jpg");



#
# Delete any existing table `archive_patient`
#

DROP TABLE IF EXISTS `archive_patient`;


#
# Table structure of table `archive_patient`
#



CREATE TABLE `archive_patient` (
  `FamilyRec_Id` int(11) NOT NULL,
  `FormattedFR_ID` varchar(255) DEFAULT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `First_Name` varchar(100) DEFAULT NULL,
  `Middle_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Civil_Status` varchar(20) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Educ_level` varchar(100) DEFAULT NULL,
  `Occupation` varchar(100) DEFAULT NULL,
  `Religion` varchar(100) DEFAULT NULL,
  `Date_CheckIn` date DEFAULT NULL,
  `Doc_Assigned` varchar(100) DEFAULT NULL,
  `Obs_Id` int(11) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `P` int(11) DEFAULT NULL,
  `F` int(11) DEFAULT NULL,
  `PregNo` int(11) DEFAULT NULL,
  `LMP` date DEFAULT NULL,
  `EDC` date DEFAULT NULL,
  `EDD` date DEFAULT NULL,
  `BloodType` varchar(5) DEFAULT NULL,
  `PhilHNo` varchar(50) DEFAULT NULL,
  `MH_Id` int(11) DEFAULT NULL,
  `Conditions` text DEFAULT NULL,
  `DiagnosisDate` date DEFAULT NULL,
  `Treatment` text DEFAULT NULL,
  `Medications` text DEFAULT NULL,
  `Surgeries` text DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `history_id` int(11) DEFAULT NULL,
  `folder_name` varchar(255) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `Spouse_Id` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `spouse_Age` int(11) DEFAULT NULL,
  `spouse_BloodType` varchar(5) DEFAULT NULL,
  `Src_Income` varchar(100) DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL,
  `BP` varchar(10) DEFAULT NULL,
  `PR` varchar(10) DEFAULT NULL,
  `RR` varchar(10) DEFAULT NULL,
  `FH` varchar(10) DEFAULT NULL,
  `FHT` varchar(10) DEFAULT NULL,
  `AOG` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`FamilyRec_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




#
# Delete any existing table `archive_pfiles`
#

DROP TABLE IF EXISTS `archive_pfiles`;


#
# Table structure of table `archive_pfiles`
#



CREATE TABLE `archive_pfiles` (
  `arc_pfile_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `date_of_insertion` date DEFAULT NULL,
  `save_path` varchar(255) DEFAULT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `history_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`arc_pfile_id`),
  KEY `file_id` (`file_id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  KEY `history_id` (`history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO archive_pfiles VALUES("3","74","Robisa Palamos .pdf","pdf","4","2024-07-04","./public/assets/documents/Robisa Palamos .pdf","21","17");
INSERT INTO archive_pfiles VALUES("4","76","COMPANY PROFILE.pdf","pdf","119","2024-07-04","./public/assets/documents/COMPANY PROFILE.pdf","21","17");



#
# Delete any existing table `archive_staff`
#

DROP TABLE IF EXISTS `archive_staff`;


#
# Table structure of table `archive_staff`
#



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
  `mobile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO archive_staff VALUES("2","0","dsa","dasd","zix","2024-08-07","","Male","dra@gamil.com","asd","elem","2024-08-21","public/assets/images/uploads/Screenshot 2024-06-02 132701.png","09674124545");
INSERT INTO archive_staff VALUES("3","0","dsa","dasd","zix","","","","dra@gamil.com","asd","elem","2024-08-21","public/assets/images/uploads/Screenshot 2024-06-02 132701.png","09674124545");
INSERT INTO archive_staff VALUES("5","0","dsa","sad","asd","2024-08-15","","Male","drazixmain0122@gmail.com","dasd","elem","2024-08-28","public/assets/images/uploads/250px-Ph_locator_samar_marabut.png","09674124545");
INSERT INTO archive_staff VALUES("6","0","Jomer","macion","ocena","2024-08-14","","Female","drazixmain0122@gmail.com","dsa tanaua","elem","2024-08-22","public/assets/images/uploads/Screenshot 2024-06-02 132701.png","213213213");



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
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




#
# Delete any existing table `clinic_staff`
#

DROP TABLE IF EXISTS `clinic_staff`;


#
# Table structure of table `clinic_staff`
#



CREATE TABLE `clinic_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO clinic_staff VALUES("1","Joanrd","N/","Jayag","","","","dra@gmail.com","Osmene tanauan leyte","Elem","2024-08-15","","0674124545","0");
INSERT INTO clinic_staff VALUES("4","dsa","dasd","zix","2024-08-07","","Male","dra@gamil.com","asd","elem","2024-08-21","public/assets/images/uploads/Screenshot 2024-06-02 132701.png","09674124545","0");
INSERT INTO clinic_staff VALUES("7","dsa","asd","asd","2024-08-14","","Female","drazixmain0122@gmail.com","dasd","","2024-08-21","","09674124545","0");



#
# Delete any existing table `colabel_status`
#

DROP TABLE IF EXISTS `colabel_status`;


#
# Table structure of table `colabel_status`
#



CREATE TABLE `colabel_status` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_status` varchar(50) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO colabel_status VALUES("1","New Patient");
INSERT INTO colabel_status VALUES("2","Recovered");
INSERT INTO colabel_status VALUES("3","On Labor");
INSERT INTO colabel_status VALUES("4","First Prenatal");
INSERT INTO colabel_status VALUES("5","Second Prenatal");
INSERT INTO colabel_status VALUES("6","Third Prenatal");



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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO doctors VALUES("3","Dra.","Narissa","R","Cumpio","1989-02-07","35","Female","Brgy. St. NIno Tanauan, Leyte","09154467782","jdeighne@gmail.com","Obstetrician/Gynecologist","Available","2024-03-31","./public/assets/images/uploads/4.jpg","","","","");
INSERT INTO doctors VALUES("7","Nurse","Marife","B","Rotilles","2018-07-12","5","Female","Unknown","09154467782","jdeighne@gmail.com","Nurse Midwife","Unavailable","2024-03-31","./public/assets/images/uploads/5.jpg","","","","");
INSERT INTO doctors VALUES("9","Nurse","Rina","B","Miller","1996-06-06","27","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Available","2024-03-31","./public/assets/images/uploads/2.jpg","","","","");
INSERT INTO doctors VALUES("11","Nurse","Aiza","J","Jabonilla","1995-07-31","28","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Available","2024-03-31","./public/assets/images/uploads/2.jpg","","","","");
INSERT INTO doctors VALUES("12","Nurse","Maria Irene","Angeles","Escarda","1997-03-05","27","Female","Unknown","09154467782","jdeighne@gmail.com","Patient-Care Liaison","Unavailable","2024-03-31","./public/assets/images/uploads/5.jpg","","","","");
INSERT INTO doctors VALUES("13","Dra.","Diane","U","Para-ase","2001-05-19","22","Female","Brgy. Ada Tanauan, Leyte","09154467782","jdeighne@gmail.com","Perinatal Nurse","Unavailable","2024-04-13","./public/assets/images/uploads/5.jpg","","","","");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO events VALUES("1","Jay's Birthday","info","2024-07-18 23:08:30","");
INSERT INTO events VALUES("2","Jungwon's Birthday","success","2024-07-18 23:08:30","");
INSERT INTO events VALUES("4","Sunoo's Birthday","warning","2024-07-18 23:08:30","");
INSERT INTO events VALUES("5","Jake's Birthday","danger","2024-07-18 23:08:30","");
INSERT INTO events VALUES("6","Heesung's Birthday","info","2024-07-18 23:08:30","");
INSERT INTO events VALUES("7","Ni-ki's Birthday","success","2024-07-18 23:08:30","");
INSERT INTO events VALUES("8","Sunghoon's Birthday","warning","2024-07-18 23:08:30","");
INSERT INTO events VALUES("9","dra","success","2024-07-18 23:08:30","");
INSERT INTO events VALUES("10","asd","info","0000-00-00 00:00:00","");



#
# Delete any existing table `medicalhistory`
#

DROP TABLE IF EXISTS `medicalhistory`;


#
# Table structure of table `medicalhistory`
#



CREATE TABLE `medicalhistory` (
  `MH_Id` int(11) NOT NULL AUTO_INCREMENT,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `Conditions` varchar(255) DEFAULT NULL,
  `DiagnosisDate` date DEFAULT NULL,
  `Treatment` varchar(255) DEFAULT NULL,
  `Medications` varchar(255) DEFAULT NULL,
  `Surgeries` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MH_Id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO medicalhistory VALUES("1","16","High Blood & Thyroid","2024-02-14","None","A lot","None");
INSERT INTO medicalhistory VALUES("2","19","PSTD","2021-06-18","None","None","None");
INSERT INTO medicalhistory VALUES("3","67","axas","2019-07-20","asdas","dsad","asdas");
INSERT INTO medicalhistory VALUES("4","78","123","2024-08-23","asdas","dsad","asdas");
INSERT INTO medicalhistory VALUES("5","79","permanenlty","2024-08-29","shabu","sigarilyo","asdas");
INSERT INTO medicalhistory VALUES("6","80","malala","2024-08-14","sigar","shabs","kidney");
INSERT INTO medicalhistory VALUES("7","84","malala","2024-07-31","shabu","sigarilyo","asdas");



#
# Delete any existing table `obs_history`
#

DROP TABLE IF EXISTS `obs_history`;


#
# Table structure of table `obs_history`
#



CREATE TABLE `obs_history` (
  `Obs_Id` int(11) NOT NULL AUTO_INCREMENT,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `G` tinyint(1) DEFAULT NULL,
  `P` tinyint(1) DEFAULT NULL,
  `F` tinyint(1) DEFAULT NULL,
  `PregNo` int(11) DEFAULT NULL,
  `LMP` date DEFAULT NULL,
  `EDC` date DEFAULT NULL,
  `EDD` date DEFAULT NULL,
  `BloodType` varchar(5) DEFAULT NULL,
  `PhilHNo` varchar(20) DEFAULT NULL,
  `BP` varchar(10) DEFAULT NULL,
  `PR` varchar(10) DEFAULT NULL,
  `RR` varchar(10) DEFAULT NULL,
  `FH` varchar(10) DEFAULT NULL,
  `FHT` varchar(10) DEFAULT NULL,
  `AOG` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Obs_Id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

INSERT INTO obs_history VALUES("13","15","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","B-","64564564564564646","","","","","","");
INSERT INTO obs_history VALUES("14","16","0","0","0","2","0000-00-00","0000-00-00","0000-00-00","O-","64564564564564646","","","","","","");
INSERT INTO obs_history VALUES("16","19","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","O+","64564564564564646","","","","","","");
INSERT INTO obs_history VALUES("17","20","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","","","","","","","","");
INSERT INTO obs_history VALUES("18","21","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","O+","","","","","","","");
INSERT INTO obs_history VALUES("20","23","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","B+","","","","","","","");
INSERT INTO obs_history VALUES("21","24","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","O+","","","","","","","");
INSERT INTO obs_history VALUES("22","25","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","","","","","","","","");
INSERT INTO obs_history VALUES("23","26","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A+","","","","","","","");
INSERT INTO obs_history VALUES("24","27","0","0","0","2","0000-00-00","0000-00-00","0000-00-00","A-","","","","","","","");
INSERT INTO obs_history VALUES("25","28","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","B-","","","","","","","");
INSERT INTO obs_history VALUES("26","29","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","O+","","","","","","","");
INSERT INTO obs_history VALUES("27","30","0","0","0","2","0000-00-00","0000-00-00","0000-00-00","O-","","","","","","","");
INSERT INTO obs_history VALUES("28","31","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A+","","","","","","","");
INSERT INTO obs_history VALUES("29","32","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A-","","","","","","","");
INSERT INTO obs_history VALUES("32","35","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","B+","","","","","","","");
INSERT INTO obs_history VALUES("34","37","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","AB+","","","","","","","");
INSERT INTO obs_history VALUES("37","40","0","0","0","3","0000-00-00","0000-00-00","0000-00-00","AB+","64564564564564646","","","","","","");
INSERT INTO obs_history VALUES("38","41","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A+","","","","","","","");
INSERT INTO obs_history VALUES("39","42","0","0","0","2","0000-00-00","0000-00-00","0000-00-00","O+","64564564564564646","","","","","","");
INSERT INTO obs_history VALUES("40","43","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","","","","","","","","");
INSERT INTO obs_history VALUES("41","44","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","A-","12312312312","","","","","","");
INSERT INTO obs_history VALUES("42","45","0","0","0","123","0000-00-00","0000-00-00","0000-00-00","AB-","12321","","","","","","");
INSERT INTO obs_history VALUES("43","46","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","","","","","","","","");
INSERT INTO obs_history VALUES("44","47","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","","","","","","","","");
INSERT INTO obs_history VALUES("45","48","0","0","0","123","0000-00-00","0000-00-00","0000-00-00","AB+","","","","","","","");
INSERT INTO obs_history VALUES("46","49","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","","","","","","","","");
INSERT INTO obs_history VALUES("47","67","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A-","21312423","","","","","","");
INSERT INTO obs_history VALUES("48","68","0","0","0","1","0000-00-00","2024-08-01","0000-00-00","A-","3213","","","","","","");
INSERT INTO obs_history VALUES("49","","","","","1231","0000-00-00","0000-00-00","0000-00-00","A-","535435","","","","","","");
INSERT INTO obs_history VALUES("50","0","","","","0","2024-09-12","2024-09-06","2024-10-19","AB+","12321","","","","","","");
INSERT INTO obs_history VALUES("52","72","0","0","0","11","2024-09-14","2024-09-13","2024-09-15","B+","14323","","","","","","");
INSERT INTO obs_history VALUES("53","73","0","0","0","123","2024-08-30","2024-08-22","2024-08-09","AB-","123312","","","","","","");
INSERT INTO obs_history VALUES("54","78","0","0","0","1","2024-08-22","2024-08-28","2024-08-02","AB+","123","32","12","12","1212","12","12");
INSERT INTO obs_history VALUES("55","79","0","0","0","1","2024-08-08","2024-08-20","2024-08-14","AB-","123123","12","32","123","123","123","123");
INSERT INTO obs_history VALUES("56","80","0","0","0","12","2024-08-08","2024-08-07","2024-08-31","AB+","12321312","56","78","78","7878","78","78");
INSERT INTO obs_history VALUES("57","82","0","0","0","123","2024-08-29","2024-08-21","2024-08-15","AB+","123123123123","123123","123","123","123","123","123");
INSERT INTO obs_history VALUES("58","83","0","0","0","123","2024-08-20","2024-08-12","2024-08-01","B+","123123123123","123","123","123123","123","123","123");
INSERT INTO obs_history VALUES("59","84","0","0","0","1231","2024-08-20","2024-08-21","2024-08-29","AB+","123123123","123123","123","123","123","123","123");



#
# Delete any existing table `patient_status`
#

DROP TABLE IF EXISTS `patient_status`;


#
# Table structure of table `patient_status`
#



CREATE TABLE `patient_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

INSERT INTO patient_status VALUES("1","15","New Patient","#FFB800");
INSERT INTO patient_status VALUES("2","16","On Labor","#FFB800");
INSERT INTO patient_status VALUES("3","19","New Patient","#FFB800");
INSERT INTO patient_status VALUES("4","40","New Patient","");
INSERT INTO patient_status VALUES("5","41","New Patient","");
INSERT INTO patient_status VALUES("6","42","New Patient","");
INSERT INTO patient_status VALUES("7","43","New Patient","");
INSERT INTO patient_status VALUES("8","44","New Patient","");
INSERT INTO patient_status VALUES("9","45","New Patient","");
INSERT INTO patient_status VALUES("10","46","New Patient","");
INSERT INTO patient_status VALUES("11","47","New Patient","");
INSERT INTO patient_status VALUES("12","48","New Patient","");
INSERT INTO patient_status VALUES("13","49","","");
INSERT INTO patient_status VALUES("14","67","New Patient","");
INSERT INTO patient_status VALUES("15","68","New Patient","");
INSERT INTO patient_status VALUES("16","69","New Patient","");
INSERT INTO patient_status VALUES("17","70","New Patient","");
INSERT INTO patient_status VALUES("18","71","New Patient","");
INSERT INTO patient_status VALUES("19","72","New Patient","");
INSERT INTO patient_status VALUES("20","73","New Patient","");
INSERT INTO patient_status VALUES("21","74","New Patient","");
INSERT INTO patient_status VALUES("22","75","New Patient","");
INSERT INTO patient_status VALUES("23","76","New Patient","");
INSERT INTO patient_status VALUES("24","77","New Patient","");
INSERT INTO patient_status VALUES("25","78","New Patient","");
INSERT INTO patient_status VALUES("26","79","New Patient","");
INSERT INTO patient_status VALUES("27","80","New Patient","");
INSERT INTO patient_status VALUES("28","81","New Patient","");
INSERT INTO patient_status VALUES("29","82","New Patient","");
INSERT INTO patient_status VALUES("30","83","New Patient","");
INSERT INTO patient_status VALUES("31","84","New Patient","");



#
# Delete any existing table `patients_mother`
#

DROP TABLE IF EXISTS `patients_mother`;


#
# Table structure of table `patients_mother`
#



CREATE TABLE `patients_mother` (
  `FamilyRec_Id` int(11) NOT NULL AUTO_INCREMENT,
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
  `Doc_Assigned` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

INSERT INTO patients_mother VALUES("20","2024-040020","Miss","Mary Divine","Parado","Ortega","0000-00-00","21","Female","Married","Brgy. San Roque Tanauan, Leyte","09152144158","College","Teacher","Catholic ","2024-04-29 04:58:20","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("21","2024-040021","Mrs.","Annamae","Celis","Alarro","0000-00-00","27","Female","Married","Cavite East Palo, Leyte","09692589458","College","Doctor","Roman Catholic ","2024-04-29 05:17:59","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("32","2024-040032","Miss","Jhustine Nicole","","Silvano","0000-00-00","0","Female","Single","","","","","","2024-04-29 06:32:56","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("44","2024-070044","Miss","dra","dsad","sad","0000-00-00","0","Female","Single","drazixmain@gmail.com","09674124545","elementary ","noisy","born again","2024-07-18 08:59:23","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("45","2024-070045","Mrs.","hiako","dasd","asd","0000-00-00","0","Female","Married","dasd","sad","","sda","asd","2024-07-31 20:01:37","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("46","2024-070046","Miss","","","","0000-00-00","0","","","","","","","","2024-07-31 20:04:20","");
INSERT INTO patients_mother VALUES("47","2024-070047","Miss","","","","0000-00-00","0","","","","12333333333333333333","","","","2024-07-31 20:15:37","");
INSERT INTO patients_mother VALUES("48","2024-070048","Miss","","zxc","zxc","0000-00-00","0","Female","Cohabitation","dasd","12333333333333333333","","sda","asd","2024-07-31 20:16:22","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("49","2024-070049","","","","","0000-00-00","0","","","","","","","","2024-07-31 20:27:33","");
INSERT INTO patients_mother VALUES("66","","Miss","","","","0000-00-00","0","","","","","","","","2024-08-01 10:34:38","");
INSERT INTO patients_mother VALUES("67","2024-080067","Miss","cheee","asdasd","zxc","0000-00-00","11","Female","Married","dasdasd","21313","sec","sda","123","2024-08-01 12:59:32","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("68","2024-080068","Mrs.","www","ee","rr","0000-00-00","0","Female","Single","sadad","21313","sec","sda","asd","2024-08-01 13:08:34","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("69","2024-080069","Mrs.","asdas c","hjvbsjhdsb","jkdhfgkjd","0000-00-00","3","Female","Cohabitation","asdfasdfd","12333333333333333333","e","reg","ertger","2024-08-01 13:27:21","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("70","2024-080070","Miss","qwad","dasd","das","0000-00-00","1","Female","Married","dasdasd","123","sec","da","dasd","2024-08-01 13:37:06","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("71","2024-080071","Miss","qwad","dasd","das","0000-00-00","1","Female","Married","dasdasd","123","sec","da","dasd","2024-08-01 13:40:56","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("72","2024-080072","Miss","sdfsd","sfsf","sdfs","0000-00-00","0","Female","Single","asdasd","12333333333333333333","sec","123","dasd","2024-08-01 13:46:51","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("73","2024-080073","Miss","jayagzkie","dasd","das","0000-00-00","0","Female","Divorced","asdfasdfd","12333333333333333333","sec","sda","asd","2024-08-01 14:01:41","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("74","2024-080074","Miss","qwerty","s","123","0000-00-00","0","Female","Cohabitation","dasdasd","12333333333333333333","sec","sda","asd","2024-08-01 14:08:27","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("75","2024-080075","Miss","qwerty","s","123","0000-00-00","0","Female","Cohabitation","dasdasd","12333333333333333333","sec","sda","asd","2024-08-01 14:08:27","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("76","2024-080076","Miss","qwerty","s","123","0000-00-00","0","Female","Cohabitation","dasdasd","12333333333333333333","sec","sda","asd","2024-08-01 14:11:01","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("77","2024-080077","Miss","qwerty","s","123","0000-00-00","0","Female","Cohabitation","dasdasd","12333333333333333333","sec","sda","asd","2024-08-01 14:11:01","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("78","2024-080078","Miss","qwerty","s","123","0000-00-00","0","Female","Cohabitation","dasdasd","12333333333333333333","sec","sda","asd","2024-08-01 14:11:01","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("79","2024-080079","Miss","jayvie","s","corales","0000-00-00","0","Female","Married","dasd","12333333333333333333","sec","123","asd","2024-08-01 14:15:13","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("80","2024-080080","Mrs.","aldwin","s ","sombilon","0000-00-00","0","Female","Cohabitation","sad","21313","sec","sda","asd","2024-08-01 15:20:52","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("81","2024-080081","Miss","trytry","s","qe","0000-00-00","0","Female","Cohabitation","asdfasdfd","123","elem","asdas","asd","2024-08-01 15:26:07","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("82","2024-080082","Miss","trytry","s","qe","0000-00-00","0","Female","Cohabitation","asdfasdfd","123","elem","asdas","asd","2024-08-01 15:26:07","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("83","2024-080083","Miss","tyrtry","s","qweqwe","0000-00-00","0","Female","Single","qweqweqwe","90123","sec","da","asd","2024-08-01 15:30:02","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("84","2024-080084","Mrs.","Johnmark","m","molina","0000-00-00","0","Female","Cohabitation","asdfasdfd","12312","sec","sda","asd","2024-08-01 16:09:11","Dra. Narissa Cumpio");



#
# Delete any existing table `pdrels`
#

DROP TABLE IF EXISTS `pdrels`;


#
# Table structure of table `pdrels`
#



CREATE TABLE `pdrels` (
  `rel_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FamilyRec_Id` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rel_ID`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  KEY `DoctorID` (`DoctorID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

INSERT INTO pdrels VALUES("3","15","10","");
INSERT INTO pdrels VALUES("4","16","10","");
INSERT INTO pdrels VALUES("6","19","10","");
INSERT INTO pdrels VALUES("7","20","3","");
INSERT INTO pdrels VALUES("8","21","3","");
INSERT INTO pdrels VALUES("10","23","10","");
INSERT INTO pdrels VALUES("11","24","10","");
INSERT INTO pdrels VALUES("12","25","3","");
INSERT INTO pdrels VALUES("13","26","3","");
INSERT INTO pdrels VALUES("14","27","10","");
INSERT INTO pdrels VALUES("15","28","3","");
INSERT INTO pdrels VALUES("16","29","10","");
INSERT INTO pdrels VALUES("17","30","3","");
INSERT INTO pdrels VALUES("18","31","10","");
INSERT INTO pdrels VALUES("19","32","3","");
INSERT INTO pdrels VALUES("22","35","10","");
INSERT INTO pdrels VALUES("24","37","10","");
INSERT INTO pdrels VALUES("27","40","3","");
INSERT INTO pdrels VALUES("28","41","10","");
INSERT INTO pdrels VALUES("29","42","3","");
INSERT INTO pdrels VALUES("30","43","3","");
INSERT INTO pdrels VALUES("31","44","3","");
INSERT INTO pdrels VALUES("32","45","3","");
INSERT INTO pdrels VALUES("33","48","3","");
INSERT INTO pdrels VALUES("34","67","3","");
INSERT INTO pdrels VALUES("35","68","3","");
INSERT INTO pdrels VALUES("36","71","3","");
INSERT INTO pdrels VALUES("37","72","3","");
INSERT INTO pdrels VALUES("38","73","3","");
INSERT INTO pdrels VALUES("39","78","3","");
INSERT INTO pdrels VALUES("40","79","3","");
INSERT INTO pdrels VALUES("41","80","3","");
INSERT INTO pdrels VALUES("42","82","3","");
INSERT INTO pdrels VALUES("43","83","3","");
INSERT INTO pdrels VALUES("44","84","3","");



#
# Delete any existing table `preg_files`
#

DROP TABLE IF EXISTS `preg_files`;


#
# Table structure of table `preg_files`
#



CREATE TABLE `preg_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_size` varchar(11) NOT NULL,
  `date_of_insertion` timestamp NOT NULL DEFAULT current_timestamp(),
  `save_path` varchar(255) NOT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `history_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`file_id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  KEY `history_id` (`history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

INSERT INTO preg_files VALUES("49","Module 1 - Lecture 2.pdf","pdf","102.86 KB","2024-05-01 11:03:33","./public/assets/documents/Module 1 - Lecture 2.pdf","15","3");
INSERT INTO preg_files VALUES("50","Module 1 - Lecture 3.pdf","pdf","162","2024-07-13 00:00:00","./public/assets/documents/Module 1 - Lecture 3.pdf","15","3");
INSERT INTO preg_files VALUES("60","enterprise_architecture_for_integration_rapid_delivery_methods_and_technologiesenterprise_architecture_for_integration_rapid_delivery_methods_and_technologies.pdf","pdf","29.22 MB","2024-05-01 13:28:18","./public/assets/documents/enterprise_architecture_for_integration_rapid_delivery_methods_and_technologiesenterprise_architecture_for_integration_rapid_delivery_methods_and_technologies.pdf","40","16");
INSERT INTO preg_files VALUES("61","CERTIFICATE-OF-GRADES.pdf","pdf","2.82 MB","2024-05-01 13:28:48","./public/assets/documents/CERTIFICATE-OF-GRADES.pdf","40","16");
INSERT INTO preg_files VALUES("62","Green and White Minimalist 2024 Calendar.pdf","pdf","361.04 KB","2024-05-01 13:30:29","./public/assets/documents/Green and White Minimalist 2024 Calendar.pdf","40","16");
INSERT INTO preg_files VALUES("63","L I T T L E M I S S A D A 2 0 2 4 (2).pdf","pdf","17.24 KB","2024-05-01 13:31:16","./public/assets/documents/L I T T L E M I S S A D A 2 0 2 4 (2).pdf","40","16");
INSERT INTO preg_files VALUES("64","Eng.-Dept.-parents-permit.pdf","pdf","67.62 KB","2024-05-01 13:31:16","./public/assets/documents/Eng.-Dept.-parents-permit.pdf","40","16");
INSERT INTO preg_files VALUES("72","CYBERSECURITY REPORT.pdf","pdf","2.68 MB","2024-05-01 14:51:00","./public/assets/documents/CYBERSECURITY REPORT.pdf","19","8");
INSERT INTO preg_files VALUES("73","COMPLETE NARRATIVE_103827 (2).pdf","pdf","335","2024-07-04 00:00:00","./public/assets/documents/COMPLETE NARRATIVE_103827 (2).pdf","21","17");
INSERT INTO preg_files VALUES("75","VERONA(JOURNAL).pdf","pdf","537","2024-07-04 00:00:00","./public/assets/documents/VERONA(JOURNAL).pdf","21","17");
INSERT INTO preg_files VALUES("77","s41598-023-30998-x.pdf","pdf","799.85 KB","2024-07-04 01:03:04","./public/assets/documents/s41598-023-30998-x.pdf","20","5");
INSERT INTO preg_files VALUES("79","Development_of_a_Maternity_Clinic_Inform.pdf","pdf","279.67 KB","2024-07-04 01:04:00","./public/assets/documents/Development_of_a_Maternity_Clinic_Inform.pdf","20","5");
INSERT INTO preg_files VALUES("80","salcedo.pdf","pdf","6","2024-07-04 00:00:00","./public/assets/documents/salcedo.pdf","20","5");
INSERT INTO preg_files VALUES("81","Development_of_a_Maternity_Clinic_Inform.pdf","pdf","279.67 KB","2024-07-04 01:15:37","./public/assets/documents/Development_of_a_Maternity_Clinic_Inform.pdf","42","19");



#
# Delete any existing table `preg_history`
#

DROP TABLE IF EXISTS `preg_history`;


#
# Table structure of table `preg_history`
#



CREATE TABLE `preg_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `FamilyRec_Id` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`history_id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO preg_history VALUES("3","15","1st Pregnancy","2024-04-28 18:50:27","2024-04-30 12:27:14");
INSERT INTO preg_history VALUES("4","15","2nd Pregnancy","2024-04-29 12:39:03","2024-04-30 12:27:14");
INSERT INTO preg_history VALUES("5","20","1st Pregnancy","2024-04-29 13:17:05","2024-04-30 12:27:14");
INSERT INTO preg_history VALUES("8","19","1st Pregnancy","2024-04-30 12:09:04","2024-04-30 12:27:14");
INSERT INTO preg_history VALUES("13","16","1st Pregnancy","2024-04-30 17:23:20","2024-04-30 17:23:20");
INSERT INTO preg_history VALUES("16","40","1st Pregnancy","2024-05-01 13:27:32","2024-05-01 13:27:32");
INSERT INTO preg_history VALUES("17","21","1st Pregnancy","2024-07-04 00:21:56","2024-07-04 00:21:56");
INSERT INTO preg_history VALUES("18","20","2nd Pregnancy","2024-07-04 01:02:22","2024-07-04 01:02:22");
INSERT INTO preg_history VALUES("19","42","First Pregnancy ","2024-07-04 01:14:53","2024-07-04 01:14:53");



#
# Delete any existing table `prenatal`
#

DROP TABLE IF EXISTS `prenatal`;


#
# Table structure of table `prenatal`
#



CREATE TABLE `prenatal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date_of_gen` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  CONSTRAINT `prenatal_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO prenatal VALUES("1","20","sdfsdf","fsdfs","2024-07-02");



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
  KEY `A_Id` (`A_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




#
# Delete any existing table `spouseinformation`
#

DROP TABLE IF EXISTS `spouseinformation`;


#
# Table structure of table `spouseinformation`
#



CREATE TABLE `spouseinformation` (
  `Spouse_Id` int(11) NOT NULL AUTO_INCREMENT,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodType` varchar(5) DEFAULT NULL,
  `Src_Income` varchar(255) NOT NULL,
  PRIMARY KEY (`Spouse_Id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

INSERT INTO spouseinformation VALUES("13","15","Dennis Aguipo","33","AB+","Construction");
INSERT INTO spouseinformation VALUES("14","16","Francis M. Para-ase","49","AB+","Farm");
INSERT INTO spouseinformation VALUES("17","19","","0","","");
INSERT INTO spouseinformation VALUES("18","20","Brent Ortega","28","A+","3000 to 5000");
INSERT INTO spouseinformation VALUES("19","21","Nirick Mike M. Alarro","30","O+","5000 above");
INSERT INTO spouseinformation VALUES("21","23","Jhaiven Corales","27","B+","");
INSERT INTO spouseinformation VALUES("22","24","Axrill Jkae Parado","26","O+","5000 above");
INSERT INTO spouseinformation VALUES("23","25","","0","","");
INSERT INTO spouseinformation VALUES("24","26","","0","","");
INSERT INTO spouseinformation VALUES("25","27","","0","","");
INSERT INTO spouseinformation VALUES("26","28","Patrick Adrian","0","B-","");
INSERT INTO spouseinformation VALUES("27","29","Jan cris","0","AB+","3000 to 5000");
INSERT INTO spouseinformation VALUES("28","30","Gian Lester","0","AB-","5000 above");
INSERT INTO spouseinformation VALUES("29","31","Mark Verneil","0","A+","");
INSERT INTO spouseinformation VALUES("30","32","","0","","");
INSERT INTO spouseinformation VALUES("33","35","","0","","");
INSERT INTO spouseinformation VALUES("35","37","Clarque Lemmuel Villaruel","0","AB-","5000 above");
INSERT INTO spouseinformation VALUES("38","40","Jay Wonwoo Park-Jeon","28","AB+","K-pop Entertainment");
INSERT INTO spouseinformation VALUES("39","41","","0","","");
INSERT INTO spouseinformation VALUES("40","42","Dennis Aguipo","20","B-","Work");
INSERT INTO spouseinformation VALUES("41","43","","0","","");
INSERT INTO spouseinformation VALUES("42","44","JOnard","21","A+","army");
INSERT INTO spouseinformation VALUES("43","45","dsa","0","A-","");
INSERT INTO spouseinformation VALUES("44","46","","0","","");
INSERT INTO spouseinformation VALUES("45","47","","0","","");
INSERT INTO spouseinformation VALUES("46","48","dsa","0","AB-","");
INSERT INTO spouseinformation VALUES("47","49","","0","","");
INSERT INTO spouseinformation VALUES("48","67","fasd","12","A-","asas");
INSERT INTO spouseinformation VALUES("49","68","fasd","233","A-","sd");
INSERT INTO spouseinformation VALUES("50","69","erge","23","B-","wefwe");
INSERT INTO spouseinformation VALUES("51","70","asd","12","A-","1000");
INSERT INTO spouseinformation VALUES("52","71","asd","12","A-","1000");
INSERT INTO spouseinformation VALUES("53","72","fasd","12","A+","aszda");
INSERT INTO spouseinformation VALUES("54","73","dsa","12","A-","112030");
INSERT INTO spouseinformation VALUES("55","74","fasd","12","A+","1000");
INSERT INTO spouseinformation VALUES("56","75","fasd","12","A+","1000");
INSERT INTO spouseinformation VALUES("57","76","fasd","12","A+","1000");
INSERT INTO spouseinformation VALUES("58","77","fasd","12","A+","1000");
INSERT INTO spouseinformation VALUES("59","78","fasd","12","A+","1000");
INSERT INTO spouseinformation VALUES("60","79","Pedo","12","B+","sd");
INSERT INTO spouseinformation VALUES("61","80","erge","0","B+","1000");
INSERT INTO spouseinformation VALUES("62","82","jonardskie","0","","112030");
INSERT INTO spouseinformation VALUES("63","83","trytryrt","0","","112030");
INSERT INTO spouseinformation VALUES("64","84","fasd","0","","100000");



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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_users VALUES("11","Admin","admin","","Administrator","ace.png","2021-05-03 10:33:03");
INSERT INTO tbl_users VALUES("13","Captain","admin","","Administrator","02112023152727ada_logo-removebg-preview.png","2023-11-15 23:47:24");
INSERT INTO tbl_users VALUES("24","Treasurer","treasure","","Staff","07042022120148scv20220407_175858.png","2023-11-16 13:40:48");
INSERT INTO tbl_users VALUES("28","BHW","luna","","Staff","6554eea1ca185.jpg","2023-11-22 23:36:49");
INSERT INTO tbl_users VALUES("40","Jayvie","$2y$10$X9IDWHHd2xiyARIhsqTnUOdlD6HdhcCGEEQ5g0wG4KK9/JqWD9DRC","das@gmail.com","Administrator","../public/assets/images/uploads/Database Design.png","2024-08-02 00:16:03");



#
# Delete any existing table `vitals`
#

DROP TABLE IF EXISTS `vitals`;


#
# Table structure of table `vitals`
#



CREATE TABLE `vitals` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `FamilyRec_Id` int(11) NOT NULL,
  `BP` varchar(10) DEFAULT NULL,
  `PR` varchar(10) DEFAULT NULL,
  `RR` varchar(10) DEFAULT NULL,
  `FH` varchar(10) DEFAULT NULL,
  `FHT` varchar(10) DEFAULT NULL,
  `AOG` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`v_id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  CONSTRAINT `vitals_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO vitals VALUES("1","44","132","12","21","21","21","21");
INSERT INTO vitals VALUES("2","45","123","123","123","231","231","213");
INSERT INTO vitals VALUES("3","46","","","","","","");
INSERT INTO vitals VALUES("4","47","","","","","","");
INSERT INTO vitals VALUES("5","48","123","123","123","231","231","213");
INSERT INTO vitals VALUES("6","49","","","","","","");

