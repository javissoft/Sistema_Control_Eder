/*
SQLyog Ultimate v8.61 
MySQL - 5.5.16 : Database - phpstormusuario
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phpstormusuario` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `phpstormusuario`;

/*Table structure for table `alumno_grupo` */

DROP TABLE IF EXISTS `alumno_grupo`;

CREATE TABLE `alumno_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `alumno_grupo` */

insert  into `alumno_grupo`(`id`,`id_alumno`,`id_grupo`) values (15,30,3),(32,3,3),(33,3,3);

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `orden` varchar(200) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

insert  into `grupo`(`id_grupo`,`nombre`,`avatar`,`orden`,`estatus`) values (1,'TIC-71',NULL,NULL,1),(2,'TIC-72',NULL,NULL,1),(3,'TIC-73',NULL,NULL,1);

/*Table structure for table `maestro` */

DROP TABLE IF EXISTS `maestro`;

CREATE TABLE `maestro` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  `Avatar` varchar(200) DEFAULT NULL,
  `Orden` varchar(200) DEFAULT NULL,
  `Estatus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `maestro` */

insert  into `maestro`(`Id`,`Nombre`,`Avatar`,`Orden`,`Estatus`) values (1,'eder','hggh','gg','1');

/*Table structure for table `maestro_materia` */

DROP TABLE IF EXISTS `maestro_materia`;

CREATE TABLE `maestro_materia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Maestro` int(11) DEFAULT NULL,
  `Id_Materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `maestro_materia` */

insert  into `maestro_materia`(`Id`,`Id_Maestro`,`Id_Materia`) values (4,28,2),(6,27,2),(7,28,3),(8,1,3),(9,2,3),(10,4,3),(11,4,1),(12,4,2),(13,2,2);

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  `Avatar` varchar(200) DEFAULT NULL,
  `Orden` varchar(200) DEFAULT NULL,
  `Estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

insert  into `materia`(`id`,`Nombre`,`Avatar`,`Orden`,`Estatus`) values (1,'Matematicas',NULL,NULL,1),(2,'Quimica',NULL,NULL,1),(3,'Programacion',NULL,NULL,1);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) DEFAULT NULL,
  `ApellidoPaterno` varchar(250) DEFAULT NULL,
  `ApellidoMaterno` varchar(250) DEFAULT NULL,
  `Teléfono` varchar(250) DEFAULT NULL,
  `Calle` varchar(250) DEFAULT NULL,
  `NumeroExterior` int(11) DEFAULT NULL,
  `NumeroInterior` int(11) DEFAULT NULL,
  `Colonia` varchar(250) DEFAULT NULL,
  `Municipio` varchar(250) DEFAULT NULL,
  `Estado` varchar(250) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `Correo` varchar(250) DEFAULT NULL,
  `Usuario` varchar(250) DEFAULT NULL,
  `Contrasena` varchar(250) DEFAULT NULL,
  `Nivel` varchar(250) DEFAULT NULL,
  `Estatus` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Teléfono`,`Calle`,`NumeroExterior`,`NumeroInterior`,`Colonia`,`Municipio`,`Estado`,`CP`,`Correo`,`Usuario`,`Contrasena`,`Nivel`,`Estatus`) values (1,'Eder','Martinez','Sara',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'eder','eder','1','1'),(3,'Tomas','Sanchez','Toronto',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','123','2','1'),(4,'Karla','Carcamo','Jimenez',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'karla','karla','1','1'),(5,'Oliver','Flores','Flores',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'oli','oli','3','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
