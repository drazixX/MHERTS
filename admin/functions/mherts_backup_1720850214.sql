# MHERTS : MySQL database backup
#
# Generated: Saturday 13. July 2024
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO appointments VALUES("1","Mrs.","Dianne ","Yang","2024-04-18","02:00:00","03:00:00","Brgy. Ada Tanauan, Leyte ","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","Delulu","0");
INSERT INTO appointments VALUES("4","Mrs.","Elizabeth","Para-ase","2024-04-11","10:20:00","11:00:00","Brgy. Ada Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","elizabethpar@gmail.com","Headache","None","0");
INSERT INTO appointments VALUES("5","Mrs.","Caroline","Magayones","2024-04-09","08:30:00","09:00:00","Bgry. Kiling Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","caroline@gmail.com","Cold","None","0");
INSERT INTO appointments VALUES("6","Mrs.","Sherie","Cuangco","2024-04-15","11:20:00","12:00:00","Brgy. Canramos Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","sheriecuangco@gmail.com","Light Cough","None","0");
INSERT INTO appointments VALUES("7","Mrs.","Monique","Lastemosa","2024-04-19","09:20:00","10:10:00","Brgy. San Roque Tanauan,Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","moniquelastem@gmail.com","Cold","None","0");
INSERT INTO appointments VALUES("8","Miss","Quieniee","Valer","2024-04-11","09:40:00","10:30:00","Brgy. Pago Tanauan, Leyte","09153368892","Dra. Narissa Cumpio - OBGYNE","quieen2gmail.com","Not Feeling Well","None","0");
INSERT INTO appointments VALUES("17","Mrs.","Clarita","Falcon","2024-04-21","01:00:00","02:00:00","Canbalisara","09153368892","Dra. Tina Cumpio","claritafalcon70@gmail.com","Bleeding","Spots","2");
INSERT INTO appointments VALUES("18","","Dianne ","Yang","2024-04-18","00:00:00","00:00:00","","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","","0");
INSERT INTO appointments VALUES("19","","Dianne ","Yang","2024-04-18","13:07:00","14:06:00","","09273122446","Dra. Narissa Cumpio - OBGYNE","jdeighne@gmail.com","Not Feeling Well","","2");
INSERT INTO appointments VALUES("20","Miss","Daniella","Jeser","2024-04-23","03:00:00","04:00:00","Picas","091521441522","Dra. Tina Cumpio","daniella@gmail.com","Not Feeling Well","None","0");
INSERT INTO appointments VALUES("21","","Daniella","Jeser","2024-04-23","03:00:00","04:00:00","","091521441522","Dra. Tina Cumpio","daniella@gmail.com","Not Feeling Well","","2");
INSERT INTO appointments VALUES("22","","Caroline","Magayones","2024-04-09","08:30:00","09:00:00","","09153368892","Dra. Narissa Cumpio - OBGYNE","caroline@gmail.com","Cold","","2");
INSERT INTO appointments VALUES("23","","Monique","Lastemosa","2024-04-19","09:20:00","10:10:00","","09153368892","Dra. Narissa Cumpio - OBGYNE","moniquelastem@gmail.com","Cold","","2");
INSERT INTO appointments VALUES("24","","Quieniee","Valer","2024-04-11","09:40:00","10:30:00","","09153368892","Dra. Narissa Cumpio - OBGYNE","quieen2gmail.com","Not Feeling Well","","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO archive_app VALUES("4","4","Mrs.","Elizabeth","Para-ase","2024-04-11","10:20:00","11:00:00","Brgy. Ada Tanauan, Leyte","09153368892","elizabethpar@gmail.com","Dra. Narissa Cumpio - OBGYNE","Headache","None","High Blood
","2024-04-17 11:06:14");
INSERT INTO archive_app VALUES("9","6","Mrs.","Sherie","Cuangco","2024-04-15","11:20:00","12:00:00","Brgy. Canramos Tanauan, Leyte","09153368892","sheriecuangco@gmail.com","Dra. Narissa Cumpio - OBGYNE","Light Cough","None","","2024-05-13 19:44:30");



#
# Delete any existing table `archive_mh`
#

DROP TABLE IF EXISTS `archive_mh`;


#
# Table structure of table `archive_mh`
#



CREATE TABLE `archive_mh` (
  `arc_mh_Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MH_Id` int(11) DEFAULT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `Conditions` varchar(255) DEFAULT NULL,
  `DiagnosisDate` date DEFAULT NULL,
  `Treatment` varchar(255) DEFAULT NULL,
  `Medications` varchar(255) DEFAULT NULL,
  `Surgeries` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`arc_mh_Id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  CONSTRAINT `archive_mh_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




#
# Delete any existing table `archive_oh`
#

DROP TABLE IF EXISTS `archive_oh`;


#
# Table structure of table `archive_oh`
#



CREATE TABLE `archive_oh` (
  `arc_oh_Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Obs_Id` int(11) DEFAULT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `F` int(11) DEFAULT NULL,
  `PregNo` int(11) DEFAULT NULL,
  `LMP` date DEFAULT NULL,
  `EDC` date DEFAULT NULL,
  `EDD` date DEFAULT NULL,
  `BloodType` varchar(3) DEFAULT NULL,
  `PhilHNo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`arc_oh_Id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  CONSTRAINT `archive_oh_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




#
# Delete any existing table `archive_patient`
#

DROP TABLE IF EXISTS `archive_patient`;


#
# Table structure of table `archive_patient`
#



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
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Educ_level` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Date_CheckIn` date DEFAULT NULL,
  `Doc_Assigned` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`arc_pm_id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  CONSTRAINT `archive_patient_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




#
# Delete any existing table `archive_pdrels`
#

DROP TABLE IF EXISTS `archive_pdrels`;


#
# Table structure of table `archive_pdrels`
#



CREATE TABLE `archive_pdrels` (
  `arc_pdrels_Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rel_Id` int(11) DEFAULT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  PRIMARY KEY (`arc_pdrels_Id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  CONSTRAINT `archive_pdrels_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`)
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
# Delete any existing table `archive_sinfo`
#

DROP TABLE IF EXISTS `archive_sinfo`;


#
# Table structure of table `archive_sinfo`
#



CREATE TABLE `archive_sinfo` (
  `arc_sinfo_Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Spouse_Id` int(11) DEFAULT NULL,
  `FamilyRec_Id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodType` varchar(3) DEFAULT NULL,
  `Src_Income` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`arc_sinfo_Id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`),
  CONSTRAINT `archive_sinfo_ibfk_1` FOREIGN KEY (`FamilyRec_Id`) REFERENCES `patients_mother` (`FamilyRec_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO clinic_staff VALUES("1","1","Alexander","None","Cumpio","0000-00-00","0","Male","@gmail.com","Brgy. St. Nino Tanauan, Leyte","College Graduate","0000-00-00","[value-13]","09153368892");



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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO events VALUES("1","Jay's Birthday","info");
INSERT INTO events VALUES("2","Jungwon's Birthday","success");
INSERT INTO events VALUES("4","Sunoo's Birthday","warning");
INSERT INTO events VALUES("5","Jake's Birthday","danger");
INSERT INTO events VALUES("6","Heesung's Birthday","info");
INSERT INTO events VALUES("7","Ni-ki's Birthday","success");
INSERT INTO events VALUES("8","Sunghoon's Birthday","warning");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO medicalhistory VALUES("1","16","High Blood & Thyroid","2024-02-14","None","A lot","None");
INSERT INTO medicalhistory VALUES("2","19","PSTD","2021-06-18","None","None","None");



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
  PRIMARY KEY (`Obs_Id`),
  KEY `FamilyRec_Id` (`FamilyRec_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO obs_history VALUES("13","15","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","B-","64564564564564646");
INSERT INTO obs_history VALUES("14","16","0","0","0","2","0000-00-00","0000-00-00","0000-00-00","O-","64564564564564646");
INSERT INTO obs_history VALUES("16","19","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","O+","64564564564564646");
INSERT INTO obs_history VALUES("17","20","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","","");
INSERT INTO obs_history VALUES("18","21","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","O+","");
INSERT INTO obs_history VALUES("20","23","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","B+","");
INSERT INTO obs_history VALUES("21","24","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","O+","");
INSERT INTO obs_history VALUES("22","25","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","","");
INSERT INTO obs_history VALUES("23","26","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A+","");
INSERT INTO obs_history VALUES("24","27","0","0","0","2","0000-00-00","0000-00-00","0000-00-00","A-","");
INSERT INTO obs_history VALUES("25","28","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","B-","");
INSERT INTO obs_history VALUES("26","29","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","O+","");
INSERT INTO obs_history VALUES("27","30","0","0","0","2","0000-00-00","0000-00-00","0000-00-00","O-","");
INSERT INTO obs_history VALUES("28","31","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A+","");
INSERT INTO obs_history VALUES("29","32","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A-","");
INSERT INTO obs_history VALUES("32","35","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","B+","");
INSERT INTO obs_history VALUES("34","37","0","0","0","1","0000-00-00","0000-00-00","0000-00-00","AB+","");
INSERT INTO obs_history VALUES("37","40","0","0","0","3","0000-00-00","0000-00-00","0000-00-00","AB+","64564564564564646");
INSERT INTO obs_history VALUES("38","41","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","A+","");
INSERT INTO obs_history VALUES("39","42","0","0","0","2","0000-00-00","0000-00-00","0000-00-00","O+","64564564564564646");
INSERT INTO obs_history VALUES("40","43","0","0","0","0","0000-00-00","0000-00-00","0000-00-00","","");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO patient_status VALUES("1","15","New Patient","#FFB800");
INSERT INTO patient_status VALUES("2","16","On Labor","#FFB800");
INSERT INTO patient_status VALUES("3","19","New Patient","#FFB800");
INSERT INTO patient_status VALUES("4","40","New Patient","");
INSERT INTO patient_status VALUES("5","41","New Patient","");
INSERT INTO patient_status VALUES("6","42","New Patient","");
INSERT INTO patient_status VALUES("7","43","New Patient","");



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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO patients VALUES("42","2024-040042","Mrs.","Twinkle","Celis","Parado","2000-04-30","23","Female","Married","First Trimester","Cavite East Palo","09127373474744","jdeighne@gmail.com","","","None","2024-04-22 06:44:27","Dra. Narissa Cumpio");



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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

INSERT INTO patients_mother VALUES("15","2024-040015","Mrs.","Franca","Fortalejo","Delafuente","0000-00-00","23","Female","Married","Ada","09127373474744","College Level","Student","Roman Catholic","2024-04-27 12:22:54","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("16","2024-040016","Mrs.","Elizabeth","Balmes","Para-ase","0000-00-00","46","Female","Married","Ada","09153368892","High School Graduate","Housewife","Roman Catholic","2024-04-28 04:02:36","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("19","2024-040019","Miss","Aira","Villamor","Espada","0000-00-00","26","Female","Cohabitation","Ada","09153368892","College Graduate","Sales Person","Roman Catholic","2024-04-28 04:25:32","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("20","2024-040020","Miss","Mary Divine","Parado","Ortega","0000-00-00","21","Female","Married","Brgy. San Roque Tanauan, Leyte","09152144158","College","Teacher","Catholic ","2024-04-29 04:58:20","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("21","2024-040021","Mrs.","Annamae","Celis","Alarro","0000-00-00","27","Female","Married","Cavite East Palo, Leyte","09692589458","College","Doctor","Roman Catholic ","2024-04-29 05:17:59","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("23","2024-040023","Mrs.","Darlyn","Cañete","Margallo","0000-00-00","25","Female","Married","Malaguicay Tanauan, Leyte","","College","House wife","","2024-04-29 05:40:36","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("24","2024-040024","Mrs.","Nrirca Mae","Alarro","Parado","0000-00-00","23","Female","Married","Brgy. Cavite East Palo, Leyte","09974012053","College","","Roman Catholic ","2024-04-29 05:45:30","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("25","2024-040025","Miss","Nicole Joy","Mangayao ","Alarro","0000-00-00","25","Female","Single","","","High School","Business women","Catholic ","2024-04-29 05:51:19","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("26","2024-040026","Mrs.","Jessa","Centino","Pateño","0000-00-00","24","Female","Married","Sto. Niño Tanauan, Leyte","","College","","","2024-04-29 06:01:52","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("27","2024-040027","Miss","Ashley Daye","Pacheco","Indic","0000-00-00","27","Female","Married","San Miguel Tanauan, Leyte ","","High School","Sales lady","","2024-04-29 06:07:43","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("28","2024-040028","Mrs.","Hyacinth ","Armada","Copino","0000-00-00","25","Female","Widowed","Cabuynan Tanauan, Leyte ","","","","","2024-04-29 06:16:39","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("29","2024-040029","Mrs.","Norie Mae","","Operio","0000-00-00","0","Female","Divorced","","","","","","2024-04-29 06:22:38","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("30","2024-040030","Miss","Shane Althea","","Acero","0000-00-00","0","Female","Single","","","","","","2024-04-29 06:27:01","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("31","2024-040031","Mrs.","Cristel","Cayanon","Avela","0000-00-00","0","Female","Widowed","","","","","Roman Catholic ","2024-04-29 06:29:41","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("32","2024-040032","Miss","Jhustine Nicole","","Silvano","0000-00-00","0","Female","Single","","","","","","2024-04-29 06:32:56","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("35","2024-040035","Miss","Carena Grace","","Salazar","0000-00-00","0","Female","Single","Cogon Palo, Leyte ","","","","","2024-04-29 06:57:53","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("37","2024-040036","Mrs.","Elaine Jace","Noveda","Villaruel","0000-00-00","0","Female","Married","Canramos Tanauan, Leyte ","","","","Catholic ","2024-04-29 07:07:52","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("40","2024-040038","Mrs.","Darylle","Sabalza","Ampo","0000-00-00","21","Female","Married","Malaguicay","09153368892","College Level","Housewife","Roman Catholic","2024-04-29 08:15:36","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("41","2024-040041","Miss","Shayne Roxie","Lagartos","Bernal","0000-00-00","0","Female","Single","Sta. Cruz Tanauan, Leyte ","","High School","Call Center","Catholic ","2024-04-29 08:21:50","Dra. Tina Cumpio");
INSERT INTO patients_mother VALUES("42","2024-070042","Mrs.","Sherelyn","Montero","Lazada","0000-00-00","24","Female","Single","Tacloban City","09127373474744","College Level","Student","Roman Catholic","2024-07-03 11:57:24","Dra. Narissa Cumpio");
INSERT INTO patients_mother VALUES("43","2024-070043","Miss","jonard","n/","jayag","0000-00-00","21","Female","Cohabitation","osmena marabut samar","","hidh school","president","roman catholic","2024-07-13 05:49:42","Dra. Narissa Cumpio");



#
# Delete any existing table `pdrel`
#

DROP TABLE IF EXISTS `pdrel`;


#
# Table structure of table `pdrel`
#



CREATE TABLE `pdrel` (
  `rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `PatientID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rel_id`),
  KEY `PatientID` (`PatientID`),
  KEY `DoctorID` (`DoctorID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO pdrel VALUES("1","42","3","");
INSERT INTO pdrel VALUES("2","1","10","");
INSERT INTO pdrel VALUES("6","19","3","");
INSERT INTO pdrel VALUES("7","20","3","");
INSERT INTO pdrel VALUES("8","21","10","");
INSERT INTO pdrel VALUES("9","22","3","");
INSERT INTO pdrel VALUES("10","23","3","");
INSERT INTO pdrel VALUES("11","25","3","");
INSERT INTO pdrel VALUES("12","26","10","");
INSERT INTO pdrel VALUES("13","27","10","");
INSERT INTO pdrel VALUES("14","30","3","");
INSERT INTO pdrel VALUES("15","31","3","");
INSERT INTO pdrel VALUES("16","32","10","");
INSERT INTO pdrel VALUES("17","36","3","");
INSERT INTO pdrel VALUES("18","37","3","");
INSERT INTO pdrel VALUES("19","40","10","");
INSERT INTO pdrel VALUES("20","41","10","");
INSERT INTO pdrel VALUES("21","42","3","Cough");



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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_users VALUES("11","Admin","admin","","Administrator","ace.png","2021-05-03 10:33:03");
INSERT INTO tbl_users VALUES("13","Captain","admin","","Administrator","02112023152727ada_logo-removebg-preview.png","2023-11-15 23:47:24");
INSERT INTO tbl_users VALUES("24","Treasurer","treasure","","Staff","07042022120148scv20220407_175858.png","2023-11-16 13:40:48");
INSERT INTO tbl_users VALUES("28","BHW","luna","","Staff","6554eea1ca185.jpg","2023-11-22 23:36:49");

