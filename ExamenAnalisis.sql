/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.10-MariaDB : Database - analisis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`analisis` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `analisis`;

/*Table structure for table `notas` */

DROP TABLE IF EXISTS `notas`;

CREATE TABLE `notas` (
  `usuario` varchar(25) DEFAULT NULL,
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `notas` decimal(10,0) DEFAULT NULL,
  `credito` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `notas` */

insert  into `notas`(`usuario`,`idcurso`,`name`,`notas`,`credito`) values 
('DSERRANO',1,'ARQUITECTURA',60,5),
('DSERRANO',2,'BASE DE DATOS 2',81,5),
('DSERRANO',3,'REDES',75,5),
('DSERRANO',4,'ETICA PROFESIONAL',61,4),
('DSERRANO',5,'ANALISIS DE SISTEMA II',61,5),
('ZGARCIA',6,'ETICA PROFESIONAL',85,4),
('ZGARCIA',7,'BASE DE DATOS0',45,5),
('ZGARCIA',8,'ELECTRONICA ANALOGICA',75,5),
('ZGARCIA',9,'PROGRAMACION 3',61,5),
('ZGARCIA',10,'METODOS NUMERICOS',61,4),
('MMONT',11,'METODOS NUMERICOS',75,5),
('MMONT',12,'BASE DE DATOS',61,5),
('MMONT',13,'ARQUITECTURA',84,5),
('MMONT',14,'ELECTRONICA DIGITAL',43,5),
('MMONT',15,'DESARROLLO WEB',50,5);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usuario` varchar(25) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `seccion` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`usuario`,`name`,`password`,`seccion`) values 
('DSERRANO','David Serrano','e10adc3949ba59abbe56e057f20f883e','A'),
('MMONT','Mario Mont','e10adc3949ba59abbe56e057f20f883e','B'),
('ZGARCIA','Zaida Garcia','e10adc3949ba59abbe56e057f20f883e','C');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
