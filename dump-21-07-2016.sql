/*
SQLyog Ultimate v8.6 Beta2
MySQL - 5.6.21 : Database - ncc-bekerja
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `file` */

DROP TABLE IF EXISTS `file`;

CREATE TABLE `file` (
  `id_file` bigint(20) NOT NULL AUTO_INCREMENT,
  `path_file` varchar(1000) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `file` */

insert  into `file`(`id_file`,`path_file`,`id_item`) values (1,'./assets/file/kbj@if.its.ac.id/31SDN AIRLANGGA I198.pdf',31),(2,'./assets/file/kbj@if.its.ac.id/32/SDN Asemrowo.pdf',32),(3,'./assets/file/kbj@if.its.ac.id/33/Array',33),(4,'./assets/file/kbj@if.its.ac.id/34/Array',34),(5,'./assets/file/kbj@if.its.ac.id/35/SDN Asemrowo II  63.pdf',35),(6,'./assets/file/kbj@if.its.ac.id/36/SDN BABAT JERAWAT I.pdf',36),(7,'./assets/file/kbj@if.its.ac.id/37/Array',37),(8,'./assets/file/kbj@if.its.ac.id/37/Array',37),(9,'./assets/file/kbj@if.its.ac.id/38/',38),(10,'./assets/file/kbj@if.its.ac.id/38/',38),(11,'./assets/file/kbj@if.its.ac.id/39/',39),(12,'./assets/file/kbj@if.its.ac.id/39/',39),(13,'./assets/file/kbj@if.its.ac.id/44/SDN Asemrowo.pdf',44),(14,'./assets/file/kbj@if.its.ac.id/44/SDN BABAT JERAWAT I.pdf',44),(15,'./assets/file/kbj@if.its.ac.id/45/SDN Asemrowo.pdf',45),(16,'./assets/file/kbj@if.its.ac.id/45/SDN BABAT JERAWAT I.pdf',45),(17,'./assets/file/kbj@if.its.ac.id/46/SDN Asemrowo.pdf',46),(18,'./assets/file/kbj@if.its.ac.id/46/SDN BABAT JERAWAT I.pdf',46),(19,'./assets/file/kbj@if.its.ac.id/47/SDN Asemrowo.pdf',47),(20,'./assets/file/kbj@if.its.ac.id/47/SDN BABAT JERAWAT I.pdf',47),(21,'./assets/file/kbj@if.its.ac.id/48/SDN Asemrowo.pdf',48),(22,'./assets/file/kbj@if.its.ac.id/48/SDN BABAT JERAWAT I.pdf',48),(23,'./assets/file/kbj@if.its.ac.id/49/SDN Asemrowo.pdf',49),(24,'./assets/file/kbj@if.its.ac.id/49/SDN BABAT JERAWAT I.pdf',49),(25,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\system\\/assets/file/kbj@if.its.ac.id/50/SDN Asemrowo.pdf',50),(26,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\system\\/assets/file/kbj@if.its.ac.id/50/SDN BABAT JERAWAT I.pdf',50),(27,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\system\\\\assets\\file\\kbj@if.its.ac.id\\51/SDN Asemrowo.pdf',51),(28,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\system\\\\assets\\file\\kbj@if.its.ac.id\\51/SDN BABAT JERAWAT I.pdf',51),(29,'./assets/file/kbj@if.its.ac.id/52/SDN Asemrowo.pdf',52),(30,'./assets/file/kbj@if.its.ac.id/52/SDN BABAT JERAWAT I.pdf',52),(31,'./assets/file/kbj@if.its.ac.id/53/Array',53),(32,'./assets/file/kbj@if.its.ac.id/53/Array',53),(33,'./assets/file/kbj@if.its.ac.id/54/SDN Asemrowo.pdf',54),(34,'./assets/file/kbj@if.its.ac.id/54/SDN BABAT JERAWAT I.pdf',54),(35,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\/assets/file/kbj@if.its.ac.id/55/SDN Asemrowo.pdf',55),(36,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\/assets/file/kbj@if.its.ac.id/55/SDN BABAT JERAWAT I.pdf',55),(37,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\/assets/file/kbj@if.its.ac.id/56/SDN Asemrowo.pdf',56),(38,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\/assets/file/kbj@if.its.ac.id/56/SDN BABAT JERAWAT I.pdf',56),(39,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\57/SDN Asemrowo.pdf',57),(40,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\57/SDN BABAT JERAWAT I.pdf',57),(41,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\58/SDN Asemrowo.pdf',58),(42,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\58/SDN BABAT JERAWAT I.pdf',58),(43,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\59\\/SDN Asemrowo.pdf',59),(44,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\59\\/SDN BABAT JERAWAT I.pdf',59),(45,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\60\\/SDN Asemrowo.pdf',60),(46,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\60\\/SDN BABAT JERAWAT I.pdf',60),(47,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\61\\/SDN Asemrowo.pdf',61),(48,'C:\\xampp\\htdocs\\ncc-bekerja\\web\\application\\assets\\file\\kbj@if.its.ac.id\\61\\/SDN BABAT JERAWAT I.pdf',61),(49,'assets\\file\\kbj@if.its.ac.id\\SDN Asemrowo.pdf',62),(50,'assets\\file\\kbj@if.its.ac.id\\SDN BABAT JERAWAT I.pdf',62),(51,'assets\\file\\kbj@if.its.ac.id\\apsi.txt',2),(52,'assets\\file\\kbj@if.its.ac.id\\soalnpc.txt',2);

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `s_number` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`id`,`nama`,`s_number`,`deskripsi`,`lat`,`lon`,`parent_id`) values (1,'NCC','12345','ini merupakan lab NCC',NULL,NULL,NULL),(2,'Server','12345','ini merupakan server NCC',-7.27937,112.797,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `root_item` int(11) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`email`,`password`,`root_item`,`last_login`,`user_type`) values ('kbj@if.its.ac.id','862adaca9c52f8624e58d835862ab089',1,'2016-06-30 01:57:34',1),('rpl@if.its.ac.id','1f2387391eb12e0ed3ad0ea178321a63',4,'2016-06-30 01:59:18',2);

/* Procedure structure for procedure `sp_changepwd` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_changepwd` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_changepwd`(_email varchar(50),_old varchar(100),_new varchar(100))
BEGIN
	set @state = (SELECT 1 FROM USER WHERE email=_email AND PASSWORD=MD5(_old));
	if(@state) then
		update user set password=md5(_new) where email=_email;
		set @ret = 1;
	else
		set @ret = 0;
	end if;
	select @ret as ret;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_defineroot` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_defineroot` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_defineroot`(_nama varchar(100),_deskripsi varchar(255), _path_gambar varchar(255), _lat varchar(100), _lon varchar(100), _user_own varchar(50))
BEGIN
	insert into item(nama,deskripsi,path_gambar,lat,lon,user_own) values(_nama,_deskripsi,_path_gambar,_lat,_lon,_user_own);
	SET @id = (select id from item where user_own=_user_own);
	update user set root_item=@id where email=_user_own;
	select root_item AS balik from user where email=_user_own; 
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_hapusitem` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_hapusitem` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_hapusitem`(_id int)
BEGIN
	set @parent_id_hapus = (select parent_id from item where id=_id);
	set @parent_name_hapus = (SELECT parent_name FROM item WHERE id=_id);
	update item set parent_id=@parent_id_hapus,parent_name=@parent_name_hapus where parent_id=_id;
	delete from item where id=_id;
	select 1 as balik;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
