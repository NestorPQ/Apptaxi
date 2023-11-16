/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - taxi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`taxi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `taxi`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `admin` */

insert  into `admin`(`id`,`UserName`,`Password`,`updationDate`) values 
(1,'admin','5c428d8875d2948607f3e3fe134d71b4','2017-06-18 07:22:38');

/*Table structure for table `alquileres` */

DROP TABLE IF EXISTS `alquileres`;

CREATE TABLE `alquileres` (
  `idalquiler` int(11) NOT NULL AUTO_INCREMENT,
  `idtipopago` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `precioalquiler` decimal(5,2) DEFAULT NULL,
  `estadovehiculo` varchar(50) DEFAULT NULL,
  `kilometrajeini` int(11) NOT NULL,
  `kilometrajefin` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idalquiler`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `alquileres` */

/*Table structure for table `formapagos` */

DROP TABLE IF EXISTS `formapagos`;

CREATE TABLE `formapagos` (
  `idformapago` int(11) NOT NULL AUTO_INCREMENT,
  `formapago` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idformapago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `formapagos` */

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `marcas` */

/*Table structure for table `tblbooking` */

DROP TABLE IF EXISTS `tblbooking`;

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblbooking` */

insert  into `tblbooking`(`id`,`BookingNumber`,`userEmail`,`VehicleId`,`FromDate`,`ToDate`,`message`,`Status`,`PostingDate`,`LastUpdationDate`) values 
(1,123456789,'test@gmail.com',1,'2020-07-07','2020-07-09','What  is the cost?',1,'2020-07-07 09:03:09',NULL),
(2,987456321,'test@gmail.com',4,'2020-07-19','2020-07-24','hfghg',1,'2020-07-09 12:49:21','2020-07-11 07:20:57');

/*Table structure for table `tblbrands` */

DROP TABLE IF EXISTS `tblbrands`;

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblbrands` */

insert  into `tblbrands`(`id`,`BrandName`,`CreationDate`,`UpdationDate`) values 
(1,'Maruti','2017-06-18 11:24:34','2017-06-19 01:42:23'),
(2,'BMW','2017-06-18 11:24:50',NULL),
(3,'Audi','2017-06-18 11:25:03',NULL),
(4,'Nissan','2017-06-18 11:25:13',NULL),
(5,'Toyota','2017-06-18 11:25:24',NULL),
(7,'Volkswagon','2017-06-19 01:22:13','2020-07-07 09:14:09');

/*Table structure for table `tblcontactusinfo` */

DROP TABLE IF EXISTS `tblcontactusinfo`;

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblcontactusinfo` */

insert  into `tblcontactusinfo`(`id`,`Address`,`EmailId`,`ContactNo`) values 
(1,'J&K Block, Laxmi Nagar','info@gmail.com','8974561236');

/*Table structure for table `tblcontactusquery` */

DROP TABLE IF EXISTS `tblcontactusquery`;

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblcontactusquery` */

insert  into `tblcontactusquery`(`id`,`name`,`EmailId`,`ContactNumber`,`Message`,`PostingDate`,`status`) values 
(1,'Kunal ','kunal@gmail.com','7977779798','I want to know you brach in Chandigarh?','2020-07-07 04:34:51',1);

/*Table structure for table `tblpages` */

DROP TABLE IF EXISTS `tblpages`;

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblpages` */

insert  into `tblpages`(`id`,`PageName`,`type`,`detail`) values 
(1,'Terms and Conditions','terms','<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <A href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</A>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>'),
(2,'Privacy Policy','privacy','<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3,'About Us ','aboutus','<span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.3333px;\">We offer a varied fleet of cars, ranging from the compact. All our vehicles have air conditioning, &nbsp;power steering, electric windows. All our vehicles are bought and maintained at official dealerships only. Automatic transmission cars are available in every booking class.&nbsp;</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\">As we are not affiliated with any specific automaker, we are able to provide a variety of vehicle makes and models for customers to rent.</span><div><span style=\"color: rgb(62, 62, 62); font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif; font-size: 11px;\">ur mission is to be recognised as the global leader in Car Rental for companies and the public and private sector by partnering with our clients to provide the best and most efficient Cab Rental solutions and to achieve service excellence.</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\"><br></span></div>'),
(11,'FAQs','faqs','																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test &nbsp; &nbsp;dsfdsfds</span>');

/*Table structure for table `tblsubscribers` */

DROP TABLE IF EXISTS `tblsubscribers`;

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblsubscribers` */

insert  into `tblsubscribers`(`id`,`SubscriberEmail`,`PostingDate`) values 
(4,'harish@gmail.com','2020-07-07 04:26:21'),
(5,'kunal@gmail.com','2020-07-07 04:35:07');

/*Table structure for table `tbltestimonial` */

DROP TABLE IF EXISTS `tbltestimonial`;

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tbltestimonial` */

insert  into `tbltestimonial`(`id`,`UserEmail`,`Testimonial`,`PostingDate`,`status`) values 
(1,'test@gmail.com','I am satisfied with their service great job','2020-07-07 09:30:12',1);

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `EmailId` (`EmailId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblusers` */

insert  into `tblusers`(`id`,`FullName`,`EmailId`,`Password`,`ContactNo`,`dob`,`Address`,`City`,`Country`,`RegDate`,`UpdationDate`) values 
(1,'Test','test@gmail.com','f925916e2754e5e03f75dd58a5733251','6465465465','','L-890, Gaur City Ghaziabad','Ghaziabad','India','2020-07-07 09:00:49','2020-07-12 00:44:29');

/*Table structure for table `tblvehicles` */

DROP TABLE IF EXISTS `tblvehicles`;

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tblvehicles` */

insert  into `tblvehicles`(`id`,`VehiclesTitle`,`VehiclesBrand`,`VehiclesOverview`,`PricePerDay`,`FuelType`,`ModelYear`,`SeatingCapacity`,`Vimage1`,`Vimage2`,`Vimage3`,`Vimage4`,`Vimage5`,`AirConditioner`,`PowerDoorLocks`,`AntiLockBrakingSystem`,`BrakeAssist`,`PowerSteering`,`DriverAirbag`,`PassengerAirbag`,`PowerWindows`,`CDPlayer`,`CentralLocking`,`CrashSensor`,`LeatherSeats`,`RegDate`,`UpdationDate`) values 
(1,'Maruti Suzuki Wagon R',1,'Maruti Wagon R Latest Updates\r\n\r\nMaruti Suzuki has launched the BS6 Wagon R S-CNG in India. The LXI CNG and LXI (O) CNG variants now cost Rs 5.25 lakh and Rs 5.32 lakh respectively, up by Rs 19,000. Maruti claims a fuel economy of 32.52km per kg. The CNG Wagon R’s continuation in the BS6 era is part of the carmaker’s ‘Mission Green Million’ initiative announced at Auto Expo 2020.\r\n\r\nPreviously, the carmaker had updated the 1.0-litre powertrain to meet BS6 emission norms. It develops 68PS of power and 90Nm of torque, same as the BS4 unit. However, the updated motor now returns 21.79 kmpl, which is a little less than the BS4 unit’s 22.5kmpl claimed figure. Barring the CNG variants, the prices of the Wagon R 1.0-litre have been hiked by Rs 8,000.',500,'Petrol',2019,5,'rear-3-4-left-589823254_930x620.jpg','tail-lamp-1666712219_930x620.jpg','rear-3-4-right-520328200_930x620.jpg','steering-close-up-1288209207_930x620.jpg','boot-with-standard-luggage-202327489_930x620.jpg',1,1,1,1,1,1,1,1,1,1,1,1,'2020-07-07 02:04:35','2020-07-07 02:27:08'),
(2,'BMW 5 Series',2,'BMW 5 Series price starts at ? 55.4 Lakh and goes upto ? 68.39 Lakh. The price of Petrol version for 5 Series ranges between ? 55.4 Lakh - ? 60.89 Lakh and the price of Diesel version for 5 Series ranges between ? 60.89 Lakh - ? 68.39 Lakh.',1000,'Petrol',2018,5,'BMW-5-Series-Exterior-102005.jpg','BMW-5-Series-New-Exterior-89729.jpg','BMW-5-Series-Exterior-102006.jpg','BMW-5-Series-Interior-102021.jpg','BMW-5-Series-Interior-102022.jpg',1,1,1,1,1,1,1,1,NULL,1,1,1,'2020-07-07 02:12:02','2020-07-07 02:27:44'),
(3,'Audi Q8',3,'As per ARAI, the mileage of Q8 is 0 kmpl. Real mileage of the vehicle varies depending upon the driving habits. City and highway mileage figures also vary depending upon the road conditions.',3000,'Petrol',2017,5,'audi-q8-front-view4.jpg','1920x1080_MTC_XL_framed_Audi-Odessa-Armaturen_Spiegelung_CC_v05.jpg','audi1.jpg','1audiq8.jpg','audi-q8-front-view4.jpeg',1,1,1,1,1,1,1,1,1,1,1,1,'2020-07-07 02:19:21','2020-07-07 02:28:02'),
(4,'Nissan Kicks',4,'Latest Update: Nissan has launched the Kicks 2020 with a new turbocharged petrol engine. You can read more about it here.\r\n\r\nNissan Kicks Price and Variants: The Kicks is available in four variants: XL, XV, XV Premium, and XV Premium(O).',800,'Petrol',2020,5,'front-left-side-47.jpg','kicksmodelimage.jpg','download.jpg','kicksmodelimage.jpg','',1,NULL,NULL,1,NULL,NULL,1,1,NULL,NULL,NULL,1,'2020-07-07 02:25:28',NULL),
(5,'Nissan GT-R',4,' The GT-R packs a 3.8-litre V6 twin-turbocharged petrol, which puts out 570PS of max power at 6800rpm and 637Nm of peak torque. The engine is mated to a 6-speed dual-clutch transmission in an all-wheel-drive setup. The 2+2 seater GT-R sprints from 0-100kmph in less than 3',2000,'Petrol',2019,5,'Nissan-GTR-Right-Front-Three-Quarter-84895.jpg','Best-Nissan-Cars-in-India-New-and-Used-1.jpg','2bb3bc938e734f462e45ed83be05165d.jpg','2020-nissan-gtr-rakuda-tan-semi-aniline-leather-interior.jpg','images.jpg',1,1,1,1,1,1,1,1,1,1,1,1,'2020-07-07 02:34:17',NULL),
(6,'Nissan Sunny 2020',4,'Value for money product and it was so good It is more spacious than other sedans It looks like a luxurious car.',400,'CNG',2018,5,'Nissan-Sunny-Right-Front-Three-Quarter-48975_ol.jpg','images (1).jpg','Nissan-Sunny-Interior-114977.jpg','nissan-sunny-8a29f53-500x375.jpg','new-nissan-sunny-photo.jpg',1,1,NULL,1,1,1,1,1,1,1,1,1,'2020-07-07 04:12:49',NULL),
(7,'Toyota Fortuner',5,'Toyota Fortuner Features: It is a premium seven-seater SUV loaded with features such as LED projector headlamps with LED DRLs, LED fog lamp, and power-adjustable and foldable ORVMs. Inside, the Fortuner offers features such as power-adjustable driver seat, automatic climate control, push-button stop/start, and cruise control.\r\n\r\nToyota Fortuner Safety Features: The Toyota Fortuner gets seven airbags, hill assist control, vehicle stability control with brake assist, and ABS with EBD.',3000,'Petrol',2020,5,'2015_Toyota_Fortuner_(New_Zealand).jpg','toyota-fortuner-legender-rear-quarters-6e57.jpg','zw-toyota-fortuner-2020-2.jpg','download (1).jpg','',NULL,NULL,NULL,NULL,NULL,1,NULL,1,NULL,1,1,1,'2020-07-07 04:17:46',NULL),
(8,'Maruti Suzuki Vitara Brezza',1,'The new Vitara Brezza is a well-rounded package that is feature-loaded and offers good drivability. And it is backed by Maruti’s vast service network, which ensures a peace of mind to customers. The petrol motor could have been more refined and offered more pep.',600,'Petrol',2018,5,'marutisuzuki-vitara-brezza-right-front-three-quarter3.jpg','marutisuzuki-vitara-brezza-rear-view37.jpg','marutisuzuki-vitara-brezza-dashboard10.jpg','marutisuzuki-vitara-brezza-boot-space59.jpg','marutisuzuki-vitara-brezza-boot-space28.jpg',NULL,1,1,1,NULL,NULL,1,NULL,NULL,NULL,1,NULL,'2020-07-07 04:23:11',NULL);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(100) DEFAULT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` char(9) DEFAULT NULL,
  `claveacceso` varchar(100) NOT NULL,
  `clavegenerada` char(6) DEFAULT NULL,
  `nivelacceso` char(4) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `uk_email_user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idusuario`,`avatar`,`apellidos`,`nombres`,`email`,`telefono`,`claveacceso`,`clavegenerada`,`nivelacceso`,`estado`,`create_at`,`update_at`,`inactive_at`) values 
(4,'','Pérez','Juan','juan.perez@example.com','123456789','$2y$10$PIG7P89flyWdS4tSGhEkeOABGBusbc/KSZgfBFmbl9EHADOPP6qSi','123456','USER','1','2023-11-09 12:44:30',NULL,NULL);

/*Table structure for table `vehiculos` */

DROP TABLE IF EXISTS `vehiculos`;

CREATE TABLE `vehiculos` (
  `idvehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `idmarca` int(11) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `placa` char(7) NOT NULL,
  `color` varchar(30) NOT NULL,
  `costo_alquiler` decimal(5,2) NOT NULL,
  `tipocombustible` char(9) NOT NULL,
  `año` date NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idvehiculo`),
  UNIQUE KEY `uk_placa_veh` (`placa`),
  KEY `fk_idmarca_veh` (`idmarca`),
  CONSTRAINT `fk_idmarca_veh` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vehiculos` */

/* Procedure structure for procedure `spu_buscar_email` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_buscar_email` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_buscar_email`(IN _email VARCHAR(50))
BEGIN
    SELECT 
    idusuario,
    apellidos, 
    nombres,
    email,
    telefono,
    clavegenerada
    FROM usuarios
    WHERE email = _email OR telefono = _email;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_actualizar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_actualizar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_actualizar`(
	IN _idusuario			INT,
    IN _claveacceso			VARCHAR(100)
)
BEGIN
	UPDATE usuarios SET 
		claveacceso = _claveacceso,
        update_at = NOW()
    WHERE idusuario = _idusuario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_clavegenerada_registrar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_clavegenerada_registrar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_clavegenerada_registrar`(
	IN _idusuario				INT,
    IN _email					VARCHAR(50),
    IN _clavegenerada			CHAR(6)
)
BEGIN
	UPDATE usuarios
    SET 
		clavegenerada =  _clavegenerada,
        estado = '0'
    WHERE idusuario = _idusuario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_clavegenerada_validar` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_clavegenerada_validar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_clavegenerada_validar`(
	IN _idusuario INT, 
    IN _clavegenerada CHAR(6)
)
BEGIN
    -- Verificar si el estado es '0' y si la clave generada coincide
    IF EXISTS (
		SELECT 1 FROM usuarios 
        WHERE idusuario = _idusuario 
        AND estado = '0' 
        AND clavegenerada = _clavegenerada
        ) 
        THEN
        -- Actualizar el estado a '1' sin cambiar la clavegenerada
        UPDATE usuarios
			SET estado = '1'
        WHERE idusuario = _idusuario;
			SELECT 'PERMITIDO' AS 'status';
    ELSE
        SELECT 'DENEGADO' AS 'status';
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_login`(IN _email VARCHAR(50))
BEGIN
	SELECT
		idusuario,
        USU.apellidos,
        USU.nombres,
        USU.email,
        USU.claveacceso,
        USU.nivelacceso
        FROM usuarios USU
        WHERE 	email = _email AND
		inactive_at IS NULL;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
