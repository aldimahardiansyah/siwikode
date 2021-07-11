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
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;

/*Data for the table `gambar` */

insert  into `gambar`(`id`,`nama`,`wisata_id`) values (145,'wiladatika2.jpg',4),(146,'wiladatika3.jpg',4),(147,'wiladatika4.jpg',4),(148,'wiladatika5.jpg',4),(149,'wiladatika6.jpg',4),(150,'saa.jpg',4),(151,'saung_talaga.jpg',5),(152,'saung_talaga2.jpg',5),(153,'saung_talaga3.jpg',5),(154,'saung_talaga4.jpg',5),(155,'saung_talaga5.jpg',5),(156,'saung_talaga6.jpg',5),(162,'aladin21.jpg',7),(163,'aladin31.jpg',7),(164,'aladin41.jpg',7),(165,'aladin51.jpg',7),(166,'aladin61.jpg',7),(167,'sadw.jpg',7),(216,'baks1.jpeg',8),(217,'bakso2.jpeg',8),(218,'bakso3.jpeg',8),(219,'bakso4.jpeg',8),(220,'bakso5.jpeg',8),(221,'bakso6.jpeg',8),(222,'ayam2.jpg',9),(223,'ayam3.jpg',9),(224,'ayam4.jpg',9),(225,'ayam5.jpg',9),(226,'ayam6.jpg',9),(227,'ayam41.jpg',9),(258,'pasirputih7.jpg',10),(259,'pasirputih21.jpg',10),(260,'pasirputih31.jpg',10),(261,'pasirputih41.jpg',10),(262,'pasirputih51.jpg',10),(263,'pasirputih61.jpg',10),(264,'kubah_emas21.jpg',1),(265,'kubah_emas3.jpg',1),(266,'kubah_emas4.jpg',1),(267,'kubah_emas41.jpg',1),(268,'kubah_emas5.jpg',1),(269,'kubah_emas6.jpg',1);

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
  `foto` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_testimoni_wisata1_idx` (`wisata_id`),
  KEY `fk_testimoni_profesi1_idx` (`profesi_id`),
  CONSTRAINT `fk_testimoni_profesi1` FOREIGN KEY (`profesi_id`) REFERENCES `profesi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_testimoni_wisata1` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `testimoni` */

insert  into `testimoni`(`id`,`nama`,`email`,`wisata_id`,`profesi_id`,`rating`,`komentar`,`foto`) values (2,'Rafi Ahmad','rans23@gmail.com',4,1,4,'recommend banget','https://pidjar.com/wp-content/uploads/2018/09/foto_by_google_20180702110354.jpg'),(6,'Joko',NULL,4,2,5,'Recommend banget tempatnya','https://www.spruson.com/app/uploads/2020/02/JokoSuwardy.jpg'),(7,'Andi',NULL,7,5,2,'Not well maintained despite the great view and scenery in town','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRDzbIUsVXCUEbItJbcH0LNXECWcPNKwz-Og&usqp=CAU'),(8,'Ammar andiko',NULL,1,5,5,'Destinasi populer di Depok bagi para peziarah Muslim. Tempat parkirnya luas. Lagi pula, kami harus berjalan sedikit untuk mencapai tempat utama.','https://cdn-2.tstatic.net/jambi/foto/bank/images2/16122015_amar-lelo_indosat_20151216_221447.jpg'),(9,'Riza Boris',NULL,1,5,5,'Masjid yang indah dengan halaman yang luas. Terapkan protokol kesehatan selama pandemi.','https://pbs.twimg.com/profile_images/1267428824020471810/nD1YkbOT.jpg'),(10,'Pidie Zainal',NULL,1,2,5,'Masjid fenomenal, besar dan bergaya artistik, kita bisa berdoa, menikmati bangunan dan taman di sini','https://waspada.id/wp-content/uploads/2020/02/ACEH-155.jpg'),(11,'M Umar',NULL,5,4,5,'Tempat terbaik untuk hang out dengan teman n keluarga.. makan malam makan siang n orang lain.. live music.. dan sangat nyaman bahkan ketika panas..','https://media-exp1.licdn.com/dms/image/C4D03AQHZ3P0nBG8kdw/profile-displayphoto-shrink_200_200/0/1623165856814?e=1630540800&v=beta&t=Oz_Cxa3_6ROhS2f4vfWbT3RK3CAdyOjedngQjoH9Av0'),(12,'Tubagus Ihsan',NULL,5,5,4,'Pemandangan indah, makanan enak, karaoke, dan ada juga tempat bermain untuk anak-anak','https://risetcdn.jatimtimes.com/images/2021/02/23/Ihsan-24-saat-ditemui-pewarta-di-Mapolresta-Malang-Kota-Selasa-2322021.-Foto-Tubagus-AchmadMalangTIMES25acab664932a6cc.md.jpg');

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

insert  into `wisata`(`id`,`nama`,`deskripsi`,`jenis_wisata_id`,`fasilitas`,`bintang`,`kontak`,`alamat`,`latitude`,`longitude`,`email`,`web`,`jenis_kuliner_id`) values (1,'Masjid Kubah Emas','Masjid Jami\' Dian Al-Mahri dikenal juga dengan nama Masjid Kubah Emas adalah sebuah masjid yang dibangun di tepi Jalan Raya Meruyung, Kecamatan Limo, Kota Depok, Jawa Barat. masjid ini mulai dibangun pada tahun 2001 sampai dengan 2006 dan yang mendesain masjid ini adalah pendirinya sendiri. Masjid ini yang membuat menariknya hingga di kunjungi banyak turis adalah emas yang berada di kubahnya yang merupakan emas murni 25 karat yang terdiri dari 5 kubahnya. pengunjung yang datang biasanya sekitar 10.000 orang pada akhir pekan, jumlahnya kian lebih banyak saat hari raya atau peringatan hari besar islam.',6,NULL,5,'085787878988','Jalan Raya Meruyung, Kecamatan Limo, Kota Depok','-6.384053683072773','106.77191734313965','admin@masjidkubahemas.com','kubahemas.com',NULL),(4,'Taman Rekreasi Wiladatika','Sejak diresmikan oleh Presiden Soeharto pada 29 Juni 1980, Taman Rekreasi Wiladatika menjadi salah satu referensi wisata warga Depok dan sekitarnya. Nama taman ini merupakan singkatan dari Widya Mandala Krida Bakti Pramuka. Awalnya dibangun sebagai sarana dan sumber pendanaan aktivitas Pramuka. Meski begitu, tempatnya yang asri dan fasilitasnya yang lengkap membuat taman ini diminati oleh wisatawan umum sebagai tujuan rekreasi. Sekedar bersantai atau mengajak anak bermain di taman ini juga cukup menyenangkan.',6,NULL,4.5,'08977986553','Cimanggis, Depok, Jawa Barat.','-6.383419269127462','106.7479615190427','wiladatika.taman@gmail.com','wiladatika.com',NULL),(5,'RM Saung Talaga','Rumah makan yang menawarkan wisata makan dengan nuasa alam dikelilingi kolam yang berisi ikan-ikan dan juga memiliki penyewaan kapal untuk sekedar meneglilingi kolam letaknya berada di Jl. Raya Sawangan No.1, Rangkapan Jaya, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16435.',2,NULL,4.5,'089779865987','Jl. Raya Sawangan No.1, Rangkapan Jaya, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16435.','-6.400161334615723','106.78489788411066','saungtalaga17@gmail.com','saungtalaga.com',NULL),(7,'Depok Fantasy Waterpark - Aladdin','Taman bermain air luas ini bertema Arab dan memiliki beragam seluncur, kolam renang & penyewaan pelampung letaknya di Jl. Boulevard Grand Depok City, Tirtajaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16412',6,NULL,2,'0897798659872','Jl. Boulevard Grand Depok City, Tirtajaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16412','-6.412699657013433','106.79654336510107','aladdin12@gmail.com','aladdin.com',NULL),(8,'Bakso Hitam Pak Bewok','Bakso Pak Bewok sudah mulai beroperasi sejak tahun 1995 yang lalu. letaknya di perempatan antara jl. Walet dan jl. Lengkeng. dekat poltek negeri Jakarta, Jl. Ridwan Rais, Beji Tim., Kecamatan Beji, Kota Depok, Jawa Barat 16422 Tapi, baru tahun 2000 yang lalu menggunakan keluak sebagai kuahnya. Sehingga, bakso yang sebelumnya tampil biasa di sini menjadi memiliki kuah hitam. Satu hal lagi, isiannya juga tidak seperti yang lainnnya. Isiannya mulai dari tulang ayam, kerongkongan, ceker, sayap dan masih banyak lagi yang lainnya. Ditambah lagi dengan bawang goreng yang melimpah serta irisan seledri, membuat penampilannya makin meriah.',2,NULL,4.2,'0897798659823','Jl. Ridwan Rais, Beji Tim., Kecamatan Beji, Kota Depok, Jawa Barat 16422','-6.396749492913158','106.78240879414484','baksobewok@live.com','baksobewok.com',NULL),(9,'Ayam Bakar Christina','Rumah makan Ayam Bakar Christina berada tepat di pinggir Jalan Margonda Raya No.420, Pondok Cina, Beji, Kota Depok. Katanya, rumah makan ini sudah ada sejak 1989 dan yang pertama menyajikan ayam bakar kecap.. Secara tampilan, rumah makan Ayam Bakar Christina sebenarnya biasa saja laiknya tempat makan pada umumnya. Rumah makan tersebut dapat menampung sekira 30 orang pengunjung dalam waktu yang sama.',2,NULL,NULL,'089779865321','Jalan Margonda Raya No.420, Pondok Cina, Beji, Kota Depok.','-6.395981825390639','106.83064899382994','ayamchristina@gmail.com','',NULL),(10,'Taman wisata pasir putih','Taman Wisata Pasir Putih Depok bisa menjadi pilihan liburan keluarga yang menyenangkan. Terutama untuk warga Ibu Kota, pilihan wisata satu ini tentunya sangat menarik, karena selain cocok untuk keluarga, lokasinya juga tidak begitu jauh.\r\n\r\nTaman Wisata Pasir Putih ini berlokasi di Sawangan, Depok, Jawa Barat. Tempat rekreasi ini menawarkan berbagai pengalaman bermain dan liburan bagi anak-anak maupun dewasa. Dengan harga tiket yang juga murah kamu bisa menikmati segala permainan yang disediakan.',6,NULL,NULL,'0867778768734','Sawangan, depok','-6.395981825390639','106.80100656090185','pasirputih@gmail.com','pasirputih.com',NULL);

/* Trigger structure for table `testimoni` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_bintang_after_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_bintang_after_insert` AFTER INSERT ON `testimoni` FOR EACH ROW update wisata set bintang =(select round(avg(rating), 1) from testimoni where wisata_id = new.wisata_id) where id = new.wisata_id */$$


DELIMITER ;

/* Trigger structure for table `testimoni` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_bintang_after_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_bintang_after_update` AFTER UPDATE ON `testimoni` FOR EACH ROW update wisata set bintang =(select round(avg(rating), 1) from testimoni where wisata_id = new.wisata_id) where id = new.wisata_id */$$


DELIMITER ;

/* Trigger structure for table `testimoni` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_bintang_after_delete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_bintang_after_delete` AFTER DELETE ON `testimoni` FOR EACH ROW update wisata set bintang =(select round(avg(rating), 1) from testimoni where wisata_id = old.wisata_id) where id = old.wisata_id */$$


DELIMITER ;

/* Trigger structure for table `wisata` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_gambar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_gambar` BEFORE DELETE ON `wisata` FOR EACH ROW delete from gambar where wisata_id=old.id */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
