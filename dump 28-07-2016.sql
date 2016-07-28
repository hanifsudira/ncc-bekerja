/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.5-10.1.10-MariaDB : Database - ncc-bekerja
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`ncc-bekerja` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ncc-bekerja`;

/*Table structure for table `file` */

DROP TABLE IF EXISTS `file`;

CREATE TABLE `file` (
  `id_file` bigint(20) NOT NULL AUTO_INCREMENT,
  `path_file` varchar(1000) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

/*Data for the table `file` */

insert  into `file`(id_file,path_file,id_item) values (71,'assets\\file\\kbj@if.its.ac.id\\80\\barbara.bmp',80),(72,'assets\\file\\kbj@if.its.ac.id\\80\\girl2.bmp',80),(73,'assets\\file\\kbj@if.its.ac.id\\3\\',3);

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
  `id_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(id,nama,s_number,deskripsi,lat,lon,parent_id,id_type) values (1,'NCC','12345','ini merupakan lab NCC',NULL,NULL,NULL,3),(2,'Server','12345','ini merupakan server NCC',-7.27937,112.797,1,4),(3,'coba 2','1212','1212',0,0,1,2);

/*Table structure for table `type` */

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nama_type` varchar(1000) NOT NULL DEFAULT ' ',
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `type` */

insert  into `type`(id_type,nama_type) values (2,'Lemari3'),(3,'Lab'),(4,'Server');

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

insert  into `user`(email,password,root_item,last_login,user_type) values ('kbj@if.its.ac.id','202cb962ac59075b964b07152d234b70',1,'2016-06-30 01:57:34',1),('rpl@if.its.ac.id','1f2387391eb12e0ed3ad0ea178321a63',4,'2016-06-30 01:59:18',2);

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
#	set @parent_name_hapus = (SELECT parent_name FROM item WHERE id=_id);
	update item set parent_id=@parent_id_hapus where parent_id=_id;
	delete from item where id=_id;
	select 1 as balik;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
