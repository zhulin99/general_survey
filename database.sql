/*
SQLyog v10.2 
MySQL - 5.7.20 : Database - image_repository
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`image_repository` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `image_repository`;

/*Table structure for table `img_click_history` */

DROP TABLE IF EXISTS `img_click_history`;

CREATE TABLE `img_click_history` (
  `user_id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `class_1` varchar(100) DEFAULT NULL,
  `class_2` varchar(100) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`img_name`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `img_click_history` */

insert  into `img_click_history`(`user_id`,`img_name`,`class_1`,`class_2`,`time_stamp`) values (0,'2342342','53dsgs','sgsdg','2018-01-03 03:54:04'),(1,'2342342','artificial_surfaces','urban_fabric','2018-01-03 03:59:57');

/*Table structure for table `img_repos` */

DROP TABLE IF EXISTS `img_repos`;

CREATE TABLE `img_repos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(100) DEFAULT NULL,
  `json_class` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `img_repos` */

insert  into `img_repos`(`id`,`img_name`,`json_class`) values (1,'0',NULL),(2,'1',NULL),(3,'2',NULL),(4,'3',NULL),(5,'4',NULL),(6,'5',NULL),(7,'6',NULL),(8,'7',NULL),(9,'8',NULL),(10,'9',NULL),(11,'10',NULL),(12,'11',NULL),(13,'12',NULL),(14,'13',NULL),(15,'14',NULL),(16,'15',NULL),(17,'16',NULL),(18,'17',NULL),(19,'18',NULL),(20,'19',NULL),(21,'20',NULL),(22,'21',NULL),(23,'22',NULL),(24,'23',NULL),(25,'24',NULL),(26,'25',NULL),(27,'26',NULL),(28,'27',NULL),(29,'28',NULL),(30,'29',NULL);

/*Table structure for table `img_users` */

DROP TABLE IF EXISTS `img_users`;

CREATE TABLE `img_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_passwd` varchar(100) DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `img_users` */

insert  into `img_users`(`user_id`,`user_name`,`user_passwd`) values (1,'zhupc','123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
