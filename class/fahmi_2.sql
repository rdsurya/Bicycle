# Host: localhost  (Version 5.5.5-10.1.26-MariaDB)
# Date: 2017-12-08 07:37:55
# Generator: MySQL-Front 5.3  (Build 5.21)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "bicycle"
#

DROP TABLE IF EXISTS `bicycle`;
CREATE TABLE `bicycle` (
  `type` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `bicycleID` varchar(30) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`bicycleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "bicycle"
#

INSERT INTO `bicycle` VALUES ('Mountain Bikes','Black Widow','BW1','Available'),('Single Speed-Bikes','Hamilton','H1','Available'),('Road Bikes','Kane','K1','Available'),('Road Bikes','Lukaku','L1','Available'),('Single Speed-Bikes','Marquez','M1','Available'),('Road Bikes','Persie','P1','Available'),('Single Speed-Bikes','Rossi','R1','Available'),('Mountain Bikes','Shrek','S1','Available'),('Mountain Bikes','Smurf','SF1','Available'),('Mountain Bikes','Snow White','SW1','Available'),('Single Speed-Bikes','Torretto','T1','Available'),('Road Bikes','Zlatan','Z1','Available');

#
# Structure for table "booking"
#

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `booking_no` varchar(20) NOT NULL DEFAULT '',
  `bicycle_no` varchar(30) DEFAULT NULL,
  `customer_no` varchar(30) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `fine` decimal(6,0) DEFAULT '0',
  `fine_reason` varchar(255) DEFAULT '',
  PRIMARY KEY (`booking_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "booking"
#

INSERT INTO `booking` VALUES ('2017120723075767','BW1','22','2017-12-08 06:05:00','2017-12-09 06:10:00',2.00,'Completed',0,''),('2017120800230663','R1','B031410418','2017-12-08 07:22:00','2017-12-10 07:20:00',4.00,'New',0,''),('2017120800244534','S1','HondaRepso','2017-12-08 07:24:00','2017-12-09 05:10:00',2.00,'New',0,'');

#
# Structure for table "customer"
#

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `name` varchar(60) NOT NULL DEFAULT '',
  `matric` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  UNIQUE KEY `unique` (`matric`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "customer"
#

INSERT INTO `customer` VALUES ('Dennis Wise','22','Denmark','777','wise@chelsea.com'),('Muhammed Ahmed II','B031403987','BBU, Belakang Rumah Awak','01868089712','ahmed@yah.com'),('Shammugam Rama','B031410418','Johor Baru Selatan Malaysia','+6017-141314','rama@yah.com'),('Marc Marquez','HondaRepso','Valencia','0177116994','marcmarquez@gmail.com');

#
# Structure for table "package"
#

DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `pack_cd` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  PRIMARY KEY (`pack_cd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "package"
#

INSERT INTO `package` VALUES ('DY1','Daily Package',2.00,'Active',1),('MN1','Monthly Package',30.00,'Active',30),('WK1','Weekly Package',10.00,'Active',7);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_level` int(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Fahmi Haziq ','fahmihaziqazhari@gmail.com','202cb962ac59075b964b07152d234b70',0,'active'),(2,'Ain Atirah','aienatirah97@gmail.com','202cb962ac59075b964b07152d234b70',0,'active'),(9,'a b','admin@mydomain.com','202cb962ac59075b964b07152d234b70',0,'not active'),(10,'Jose Mourinho','special1@cfc.com','c4f161fdf606a4914b2ebc54a4698e97',0,'active');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
