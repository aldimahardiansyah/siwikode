/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.1.36-MariaDB : Database - db_siwikode
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_siwikode` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_siwikode`;

/*Table structure for table `gambar` */

DROP TABLE IF EXISTS `gambar`;

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_gambar` (`wisata_id`),
  CONSTRAINT `FK_gambar` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

/*Data for the table `gambar` */

insert  into `gambar`(`id`,`nama`,`wisata_id`) values (133,'sd.jpg',1),(134,'kubah_emas2.jpg',1),(135,'kubah_emas3.jpg',1),(136,'kubah_emas4.jpg',1),(137,'kubah_emas5.jpg',1),(138,'kubah_emas6.jpg',1),(139,'3.png',3),(140,'31.png',3),(141,'32.png',3),(142,'33.png',3),(143,'34.png',3),(144,'axis-telecom.png',3);

/*Table structure for table `jenis_kuliner` */

DROP TABLE IF EXISTS `jenis_kuliner`;

CREATE TABLE `jenis_kuliner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `jenis_kuliner` */

insert  into `jenis_kuliner`(`id`,`nama`) values (1,'Kedai/Cafe'),(2,'Restaurant'),(3,'Pasar Kaget');

/*Table structure for table `jenis_wisata` */

DROP TABLE IF EXISTS `jenis_wisata`;

CREATE TABLE `jenis_wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `jenis_wisata` */

insert  into `jenis_wisata`(`id`,`nama`) values (1,'Argo Wisata'),(2,'Kuliner'),(3,'Taman Wisata'),(4,'Museum'),(5,'Water Park / Kolam Renang'),(6,'Rekreasi');

/*Table structure for table `profesi` */

DROP TABLE IF EXISTS `profesi`;

CREATE TABLE `profesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `profesi` */

insert  into `profesi`(`id`,`nama`) values (1,'Artist'),(2,'Pejabat'),(3,'Mahasiswa'),(4,'Pegawai Swasta'),(5,'Umum');

/*Table structure for table `testimoni` */

DROP TABLE IF EXISTS `testimoni`;

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `wisata_id` int(11) NOT NULL,
  `profesi_id` int(11) NOT NULL,
  `rating` smallint(6) DEFAULT NULL,
  `komentar` text,
  PRIMARY KEY (`id`),
  KEY `fk_testimoni_wisata1_idx` (`wisata_id`),
  KEY `fk_testimoni_profesi1_idx` (`profesi_id`),
  CONSTRAINT `fk_testimoni_profesi1` FOREIGN KEY (`profesi_id`) REFERENCES `profesi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_testimoni_wisata1` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `testimoni` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`username`,`password`) values (1,'Admin Siwikode','admin','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `wisata` */

DROP TABLE IF EXISTS `wisata`;

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `jenis_wisata_id` int(11) NOT NULL,
  `fasilitas` text,
  `bintang` float DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `web` varchar(45) DEFAULT NULL,
  `jenis_kuliner_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wisata_jenis_wisata_idx` (`jenis_wisata_id`),
  KEY `fk_wisata_jenis_kuliner1_idx` (`jenis_kuliner_id`),
  CONSTRAINT `fk_wisata_jenis_kuliner1` FOREIGN KEY (`jenis_kuliner_id`) REFERENCES `jenis_kuliner` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_wisata_jenis_wisata` FOREIGN KEY (`jenis_wisata_id`) REFERENCES `jenis_wisata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `wisata` */

insert  into `wisata`(`id`,`nama`,`deskripsi`,`jenis_wisata_id`,`fasilitas`,`bintang`,`kontak`,`alamat`,`latitude`,`longitude`,`email`,`web`,`jenis_kuliner_id`) values (1,'Masjid Kubah Emas','Masjid Jami\' Dian Al-Mahri dikenal juga dengan nama Masjid Kubah Emas adalah sebuah masjid yang dibangun di tepi Jalan Raya Meruyung, Kecamatan Limo, Kota Depok, Jawa Barat. masjid ini mulai dibangun pada tahun 2001 sampai dengan 2006 dan yang mendesain masjid ini adalah pendirinya sendiri. Masjid ini yang membuat menariknya hingga di kunjungi banyak turis adalah emas yang berada di kubahnya yang merupakan emas murni 25 karat yang terdiri dari 5 kubahnya. pengunjung yang datang biasanya sekitar 10.000 orang pada akhir pekan, jumlahnya kian lebih banyak saat hari raya atau peringatan hari besar islam.',6,NULL,NULL,'0857878786','Jalan Raya Meruyung, Kecamatan Limo, Kota Depok','-6.384053683072773','106.77191734313965','admin@masjidkubahemas.com','',NULL),(2,'Bakso Hitam Pak Bewok','Bakso Pak Bewok sudah mulai beroperasi sejak tahun 1995 yang lalu. letaknya di perempatan antara jl. Walet dan jl. Lengkeng. dekat poltek negeri Jakarta, Jl. Ridwan Rais, Beji Tim., Kecamatan Beji, Kota Depok, Jawa Barat 16422 Tapi, baru tahun 2000 yang lalu menggunakan keluak sebagai kuahnya. Sehingga, bakso yang sebelumnya tampil biasa di sini menjadi memiliki kuah hitam. Satu hal lagi, isiannya juga tidak seperti yang lainnnya. Isiannya mulai dari tulang ayam, kerongkongan, ceker, sayap dan masih banyak lagi yang lainnya. Ditambah lagi dengan bawang goreng yang melimpah serta irisan seledri, membuat penampilannya makin meriah.',2,NULL,NULL,'087657658','Jl. Ridwan Rais, Beji Tim., Kecamatan Beji, Kota Depok, Jawa Barat 16422','-6.399589852979436','106.79890147342344','pakbewok@gmail.com','',NULL),(3,'Dufan','lkdfh',3,NULL,NULL,'dfadsfa','Kp. Babakan empang rt.01/01, Ds. Purasari, Kec. Leuwiliang','-6.404852579743565','106.81475422320769','aldimdiansyah@gmail.com','Kp. Babakan empang rt.01/01, Ds. Purasari, Ke',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
