/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.1.29-MariaDB : Database - ahp_crips
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ahp_crips` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ahp_crips`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`user`,`pass`) values ('admin','admin');

/*Table structure for table `tb_alternatif` */

DROP TABLE IF EXISTS `tb_alternatif`;

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_alternatif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_alternatif` */

insert  into `tb_alternatif`(`kode_alternatif`,`nama_alternatif`,`keterangan`,`total`,`rank`) values ('A3','RIYONO ALI','',0.30171519266993,4),('A1','ALI MUHTAR','',0.49387400115975,1),('A2','BASUKI','',0.097392230821665,6),('A4','MUHTARONI','',0.43577721464088,2),('A5','SUKINI','',0.34226406290221,3),('A6','PARLAN','',0.10696028701723,5);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`kode_kriteria`,`nama_kriteria`) values ('C4','Status Pernikahan'),('C3','Jml. Penghasilan'),('C2','Kondisi Rumah'),('C1','Pekerjaan'),('C5','Jml Anggota Keluarga');

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(255) DEFAULT NULL,
  `kode_kriteria` varchar(255) DEFAULT NULL,
  `kode_sub` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`ID`,`kode_alternatif`,`kode_kriteria`,`kode_sub`) values (1,'A1','C1','PK1'),(2,'A1','C2','KR2'),(3,'A1','C3','JP1'),(4,'A1','C4','SP3'),(5,'A2','C1','PK3'),(6,'A2','C2','KR3'),(7,'A2','C3','JP3'),(8,'A2','C4','SP3'),(9,'A3','C1','PK2'),(10,'A3','C2','KR3'),(11,'A3','C3','JP1'),(12,'A3','C4','SP2'),(13,'A4','C1','PK1'),(14,'A4','C2','KR3'),(15,'A4','C3','JP1'),(16,'A4','C4','SP3'),(17,'A5','C1','PK2'),(18,'A5','C2','KR2'),(19,'A5','C3','JP1'),(20,'A5','C4','SP2'),(21,'A6','C1','PK3'),(22,'A6','C2','KR3'),(23,'A6','C3','JP2'),(24,'A6','C4','SP3'),(25,'A1','C5','JA1'),(26,'A2','C5','JA2'),(27,'A3','C5','JA1'),(28,'A4','C5','JA2'),(29,'A5','C5','JA1'),(30,'A6','C5','JA3');

/*Table structure for table `tb_rel_kriteria` */

DROP TABLE IF EXISTS `tb_rel_kriteria`;

CREATE TABLE `tb_rel_kriteria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_kriteria` */

insert  into `tb_rel_kriteria`(`ID`,`ID1`,`ID2`,`nilai`) values (106,'C3','C3',1),(114,'C2','C4',3),(109,'C4','C1',0.2),(113,'C1','C4',5),(115,'C3','C4',3),(112,'C4','C4',1),(108,'C2','C3',3),(111,'C4','C3',0.333333333),(110,'C4','C2',0.333333333),(107,'C1','C3',3),(103,'C1','C2',3),(104,'C3','C1',0.333333333),(105,'C3','C2',0.333333333),(100,'C1','C1',1),(101,'C2','C1',0.333333333),(102,'C2','C2',1),(116,'C5','C1',0.142857142),(117,'C5','C2',0.2),(118,'C5','C3',0.333333333),(119,'C5','C4',0.333333333),(120,'C5','C5',1),(121,'C1','C5',7),(122,'C2','C5',5),(123,'C3','C5',3),(124,'C4','C5',3);

/*Table structure for table `tb_rel_sub` */

DROP TABLE IF EXISTS `tb_rel_sub`;

CREATE TABLE `tb_rel_sub` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID1` varchar(255) DEFAULT NULL,
  `ID2` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=696 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_sub` */

insert  into `tb_rel_sub`(`ID`,`ID1`,`ID2`,`nilai`,`bobot`) values (557,'SP1','KR3',1,NULL),(503,'PK3','KR3',1,NULL),(502,'PK2','KR3',1,NULL),(573,'SP2','JP3',1,NULL),(568,'PK1','SP1',1,NULL),(562,'JP1','SP1',1,NULL),(530,'KR2','JP2',1,NULL),(531,'KR3','JP2',1,NULL),(486,'PK3','KR2',1,NULL),(572,'SP2','JP2',1,NULL),(567,'KR3','SP1',1,NULL),(543,'JP3','PK3',1,NULL),(528,'JP1','JP2',5,NULL),(529,'KR1','JP2',1,NULL),(499,'KR1','KR3',7,NULL),(500,'KR2','KR3',5,NULL),(501,'PK1','KR3',1,NULL),(525,'JP2','PK1',1,NULL),(526,'JP2','PK2',1,NULL),(527,'JP2','PK3',1,NULL),(441,'PK1','PK2',3,NULL),(523,'JP2','KR2',1,NULL),(524,'JP2','KR3',1,NULL),(483,'KR1','KR2',5,NULL),(484,'PK1','KR2',1,NULL),(485,'PK2','KR2',1,NULL),(556,'SP1','KR2',1,NULL),(522,'JP2','KR1',1,NULL),(554,'SP1','JP3',1,NULL),(555,'SP1','KR1',1,NULL),(458,'PK2','PK3',3,NULL),(553,'SP1','JP2',1,NULL),(519,'PK3','JP1',1,NULL),(520,'JP2','JP1',0.2,NULL),(521,'JP2','JP2',1,NULL),(495,'KR3','PK3',1,NULL),(566,'KR2','SP1',1,NULL),(561,'SP1','SP1',1,NULL),(552,'SP1','JP1',1,NULL),(478,'KR2','PK2',1,NULL),(479,'KR2','PK3',1,NULL),(541,'JP3','PK1',1,NULL),(542,'JP3','PK2',1,NULL),(539,'JP3','KR2',1,NULL),(540,'JP3','KR3',1,NULL),(494,'KR3','PK2',1,NULL),(517,'PK1','JP1',1,NULL),(518,'PK2','JP1',1,NULL),(457,'PK1','PK3',5,NULL),(477,'KR2','PK1',1,NULL),(516,'KR3','JP1',1,NULL),(420,'PK1','PK1',1,NULL),(560,'SP1','PK3',1,NULL),(538,'JP3','KR1',1,NULL),(475,'KR2','KR1',0.2,NULL),(476,'KR2','KR2',1,NULL),(559,'SP1','PK2',1,NULL),(493,'KR3','PK1',1,NULL),(547,'KR2','JP3',1,NULL),(548,'KR3','JP3',1,NULL),(549,'PK1','JP3',1,NULL),(550,'PK2','JP3',1,NULL),(551,'PK3','JP3',1,NULL),(512,'JP1','PK2',1,NULL),(513,'JP1','PK3',1,NULL),(514,'KR1','JP1',1,NULL),(515,'KR2','JP1',1,NULL),(434,'PK2','PK2',1,NULL),(558,'SP1','PK1',1,NULL),(537,'JP3','JP3',1,NULL),(490,'KR3','KR1',0.142857142,NULL),(491,'KR3','KR2',0.2,NULL),(492,'KR3','KR3',1,NULL),(536,'JP3','JP2',0.333333333,NULL),(469,'PK1','KR1',1,NULL),(470,'PK2','KR1',1,NULL),(471,'PK3','KR1',1,NULL),(511,'JP1','PK1',1,NULL),(450,'PK3','PK3',1,NULL),(449,'PK3','PK2',0.333333333,NULL),(571,'SP2','JP1',1,NULL),(565,'KR1','SP1',1,NULL),(448,'PK3','PK1',0.2,NULL),(465,'KR1','PK3',1,NULL),(546,'KR1','JP3',1,NULL),(509,'JP1','KR2',1,NULL),(510,'JP1','KR3',1,NULL),(464,'KR1','PK2',1,NULL),(570,'PK3','SP1',1,NULL),(564,'JP3','SP1',1,NULL),(508,'JP1','KR1',1,NULL),(433,'PK2','PK1',0.333333333,NULL),(507,'JP1','JP1',1,NULL),(535,'JP3','JP1',0.142857142,NULL),(534,'PK3','JP2',1,NULL),(545,'JP2','JP3',3,NULL),(463,'KR1','PK1',1,NULL),(569,'PK2','SP1',1,NULL),(563,'JP2','SP1',1,NULL),(533,'PK2','JP2',1,NULL),(462,'KR1','KR1',1,NULL),(544,'JP1','JP3',7,NULL),(532,'PK1','JP2',1,NULL),(574,'SP2','KR1',1,NULL),(575,'SP2','KR2',1,NULL),(576,'SP2','KR3',1,NULL),(577,'SP2','PK1',1,NULL),(578,'SP2','PK2',1,NULL),(579,'SP2','PK3',1,NULL),(580,'SP2','SP1',0.333333333,NULL),(581,'SP2','SP2',1,NULL),(582,'JP1','SP2',1,NULL),(583,'JP2','SP2',1,NULL),(584,'JP3','SP2',1,NULL),(585,'KR1','SP2',1,NULL),(586,'KR2','SP2',1,NULL),(587,'KR3','SP2',1,NULL),(588,'PK1','SP2',1,NULL),(589,'PK2','SP2',1,NULL),(590,'PK3','SP2',1,NULL),(591,'SP1','SP2',3,NULL),(592,'SP3','JP1',1,NULL),(593,'SP3','JP2',1,NULL),(594,'SP3','JP3',1,NULL),(595,'SP3','KR1',1,NULL),(596,'SP3','KR2',1,NULL),(597,'SP3','KR3',1,NULL),(598,'SP3','PK1',1,NULL),(599,'SP3','PK2',1,NULL),(600,'SP3','PK3',1,NULL),(601,'SP3','SP1',0.111111111,NULL),(602,'SP3','SP2',0.2,NULL),(603,'SP3','SP3',1,NULL),(604,'JP1','SP3',1,NULL),(605,'JP2','SP3',1,NULL),(606,'JP3','SP3',1,NULL),(607,'KR1','SP3',1,NULL),(608,'KR2','SP3',1,NULL),(609,'KR3','SP3',1,NULL),(610,'PK1','SP3',1,NULL),(611,'PK2','SP3',1,NULL),(612,'PK3','SP3',1,NULL),(613,'SP1','SP3',9,NULL),(614,'SP2','SP3',5,NULL),(615,'JA1','JA1',1,NULL),(616,'JA1','JP1',1,NULL),(617,'JA1','JP2',1,NULL),(618,'JA1','JP3',1,NULL),(619,'JA1','KR1',1,NULL),(620,'JA1','KR2',1,NULL),(621,'JA1','KR3',1,NULL),(622,'JA1','PK1',1,NULL),(623,'JA1','PK2',1,NULL),(624,'JA1','PK3',1,NULL),(625,'JA1','SP1',1,NULL),(626,'JA1','SP2',1,NULL),(627,'JA1','SP3',1,NULL),(628,'JP1','JA1',1,NULL),(629,'JP2','JA1',1,NULL),(630,'JP3','JA1',1,NULL),(631,'KR1','JA1',1,NULL),(632,'KR2','JA1',1,NULL),(633,'KR3','JA1',1,NULL),(634,'PK1','JA1',1,NULL),(635,'PK2','JA1',1,NULL),(636,'PK3','JA1',1,NULL),(637,'SP1','JA1',1,NULL),(638,'SP2','JA1',1,NULL),(639,'SP3','JA1',1,NULL),(640,'JA2','JA1',0.333333333,NULL),(641,'JA2','JA2',1,NULL),(642,'JA2','JP1',1,NULL),(643,'JA2','JP2',1,NULL),(644,'JA2','JP3',1,NULL),(645,'JA2','KR1',1,NULL),(646,'JA2','KR2',1,NULL),(647,'JA2','KR3',1,NULL),(648,'JA2','PK1',1,NULL),(649,'JA2','PK2',1,NULL),(650,'JA2','PK3',1,NULL),(651,'JA2','SP1',1,NULL),(652,'JA2','SP2',1,NULL),(653,'JA2','SP3',1,NULL),(654,'JA1','JA2',3,NULL),(655,'JP1','JA2',1,NULL),(656,'JP2','JA2',1,NULL),(657,'JP3','JA2',1,NULL),(658,'KR1','JA2',1,NULL),(659,'KR2','JA2',1,NULL),(660,'KR3','JA2',1,NULL),(661,'PK1','JA2',1,NULL),(662,'PK2','JA2',1,NULL),(663,'PK3','JA2',1,NULL),(664,'SP1','JA2',1,NULL),(665,'SP2','JA2',1,NULL),(666,'SP3','JA2',1,NULL),(667,'JA3','JA1',0.2,NULL),(668,'JA3','JA2',0.333333333,NULL),(669,'JA3','JA3',1,NULL),(670,'JA3','JP1',1,NULL),(671,'JA3','JP2',1,NULL),(672,'JA3','JP3',1,NULL),(673,'JA3','KR1',1,NULL),(674,'JA3','KR2',1,NULL),(675,'JA3','KR3',1,NULL),(676,'JA3','PK1',1,NULL),(677,'JA3','PK2',1,NULL),(678,'JA3','PK3',1,NULL),(679,'JA3','SP1',1,NULL),(680,'JA3','SP2',1,NULL),(681,'JA3','SP3',1,NULL),(682,'JA1','JA3',5,NULL),(683,'JA2','JA3',3,NULL),(684,'JP1','JA3',1,NULL),(685,'JP2','JA3',1,NULL),(686,'JP3','JA3',1,NULL),(687,'KR1','JA3',1,NULL),(688,'KR2','JA3',1,NULL),(689,'KR3','JA3',1,NULL),(690,'PK1','JA3',1,NULL),(691,'PK2','JA3',1,NULL),(692,'PK3','JA3',1,NULL),(693,'SP1','JA3',1,NULL),(694,'SP2','JA3',1,NULL),(695,'SP3','JA3',1,NULL);

/*Table structure for table `tb_sub` */

DROP TABLE IF EXISTS `tb_sub`;

CREATE TABLE `tb_sub` (
  `kode_sub` varchar(255) NOT NULL,
  `kode_kriteria` varchar(255) DEFAULT NULL,
  `nama_sub` varchar(255) DEFAULT NULL,
  `nilai_sub` double DEFAULT NULL,
  PRIMARY KEY (`kode_sub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_sub` */

insert  into `tb_sub`(`kode_sub`,`kode_kriteria`,`nama_sub`,`nilai_sub`) values ('JA1','C5','<2 orang',0.63334572036725),('JA2','C5','>2-5 orang',0.26049795609934),('JA3','C5','>5 orang',0.10615632353341),('JP1','C3','<500.000/bln',0.72350605738496),('JP2','C3','1jt - 1.500.000/bln',0.19318605996184),('JP3','C3','>1.500.000/bln',0.083307882653203),('KR1','C2','Sangat Tidak Layak Huni',0.69653133430131),('KR2','C2','Tidak Layak Huni',0.23161395916795),('KR3','C2','Layak Huni',0.071854706530739),('PK1','C1','Petani',0.63334572036725),('PK2','C1','Buruh',0.26049795609934),('PK3','C1','Wiraswasta',0.10615632353341),('SP1','C4','Janda',0.66886446893547),('SP2','C4','Duda',0.26739926734601),('SP3','C4','Kawin',0.063736263718512);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
