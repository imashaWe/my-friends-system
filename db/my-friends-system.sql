/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.20-MariaDB : Database - my-friends-system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`my-friends-system` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `my-friends-system`;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`password`) values 
(1,'test','test@gmail.com','202cb962ac59075b964b07152d234b70'),
(2,'Nawodya Imasha','i@gamil.com','202cb962ac59075b964b07152d234b70'),
(3,'Imasha Kularathne','imasha98.we@gmail.com','202cb962ac59075b964b07152d234b70'),
(4,'Dasun Shanaka','nethminiD@gmail.com','202cb962ac59075b964b07152d234b70'),
(5,'Dasith Upamada','dasith@gamil.com','202cb962ac59075b964b07152d234b70'),
(6,'Chamath Geethanjana','chamath@gmail.com','202cb962ac59075b964b07152d234b70'),
(7,'Kamal Dilshan','kamal@gamil.com','202cb962ac59075b964b07152d234b70'),
(8,'Nadun Perera','nadun@gmail.com','202cb962ac59075b964b07152d234b70'),
(9,'Saman Gamage','saman@gmail.com','202cb962ac59075b964b07152d234b70'),
(10,'Nimal Perera','nirmal@gmail.com','202cb962ac59075b964b07152d234b70'),
(11,'Jagath Akalanka','jagath@gmail.com','202cb962ac59075b964b07152d234b70'),
(12,'Tharaka Gurusinhe','tharaka@gmail.com','202cb962ac59075b964b07152d234b70');

/*Table structure for table `user_friend` */

DROP TABLE IF EXISTS `user_friend`;

CREATE TABLE `user_friend` (
  `uid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_friend` */

insert  into `user_friend`(`uid`,`id`) values 
(1,3),
(3,1),
(1,4),
(4,1),
(5,4),
(4,5),
(3,5),
(5,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
