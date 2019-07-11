/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.6.20 : Database - sibk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `absensi` */

DROP TABLE IF EXISTS `absensi`;

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `izin` int(10) NOT NULL,
  `sakit` int(10) NOT NULL,
  `tanpa_ket` int(10) NOT NULL,
  `tanggal_absensi` date NOT NULL,
  `id_tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_absensi`),
  KEY `nis` (`id_siswa`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `absensi` */

insert  into `absensi`(`id_absensi`,`id_siswa`,`izin`,`sakit`,`tanpa_ket`,`tanggal_absensi`,`id_tahun`) values 
(1,2,2,0,0,'2019-01-26',1);

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nbm` varchar(30) NOT NULL,
  `nama_guru` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `jenkel_guru` char(1) NOT NULL,
  `hp_guru` varchar(13) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_guru`),
  KEY `id_jabatan` (`id_jabatan`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guru_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`id_guru`,`nbm`,`nama_guru`,`alamat`,`jenkel_guru`,`hp_guru`,`id_jabatan`,`id_tahun`,`status`) values 
(1,'1400016045','Anggi Surya Permana','yogyakarta','L','081327671411',1,1,0);

/*Table structure for table `hak_akses` */

DROP TABLE IF EXISTS `hak_akses`;

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hak_akses` varchar(200) NOT NULL,
  PRIMARY KEY (`id_hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hak_akses` */

insert  into `hak_akses`(`id_hak_akses`,`nama_hak_akses`) values 
(1,'Administrator'),
(2,'Operator'),
(3,'Guest');

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id_jabatan`,`nama_jabatan`) values 
(1,'Kepala Sekolah');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(100) NOT NULL,
  `akronin_jurusan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jurusan`,`nama_jurusan`,`akronin_jurusan`) values 
(2,'Unggulan','KU'),
(3,'Multilingual','KM'),
(4,'Matematika dan Ilmu Alam','MIA'),
(5,'Ilmu-Ilmu Sosial','ISS'),
(6,'Ilmu-Ilmu Keagamaan','IIK');

/*Table structure for table `kat_panggilan` */

DROP TABLE IF EXISTS `kat_panggilan`;

CREATE TABLE `kat_panggilan` (
  `id_kat_panggilan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kat_panggilan` varchar(200) NOT NULL,
  `keterangan_kat_panggilan` text NOT NULL,
  PRIMARY KEY (`id_kat_panggilan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kat_panggilan` */

insert  into `kat_panggilan`(`id_kat_panggilan`,`nama_kat_panggilan`,`keterangan_kat_panggilan`) values 
(2,'Nasihat','Poin 1 - 15'),
(3,'SP1','Poin 16 - 30'),
(4,'Pengantar SP2 ( Panggilan )','Poin 31 - 60'),
(5,'SP2','Poin 61 - 80'),
(6,'SP3','Poi 81 - 89'),
(7,'Pembinaan Wadir 3','Poin 90 - 99'),
(8,'Konfrensi Kasus','Poin 100+');

/*Table structure for table `kat_pelanggaran` */

DROP TABLE IF EXISTS `kat_pelanggaran`;

CREATE TABLE `kat_pelanggaran` (
  `id_kat_pelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kat_pelanggaran` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kat_pelanggaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kat_pelanggaran` */

insert  into `kat_pelanggaran`(`id_kat_pelanggaran`,`nama_kat_pelanggaran`) values 
(1,'Rokok'),
(2,'Pacaran');

/*Table structure for table `kat_prestasi` */

DROP TABLE IF EXISTS `kat_prestasi`;

CREATE TABLE `kat_prestasi` (
  `id_kat_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kat_prestasi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kat_prestasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kat_prestasi` */

insert  into `kat_prestasi`(`id_kat_prestasi`,`nama_kat_prestasi`) values 
(1,'Hafalan'),
(2,'Juara Lomba');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(10) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`tingkat`,`nama_kelas`) values 
(5,'I','Satu'),
(6,'II','Dua'),
(7,'III','Tiga'),
(8,'IV','Empat'),
(9,'V','Lima'),
(10,'VI','Enam');

/*Table structure for table `kelas_jurusan` */

DROP TABLE IF EXISTS `kelas_jurusan`;

CREATE TABLE `kelas_jurusan` (
  `id_kelas_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `daya_tampung` int(10) NOT NULL,
  `urutan_kelas_jurusan` char(1) NOT NULL,
  `id_wali_kelas` int(20) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas_jurusan`),
  KEY `id_tahun` (`id_tahun`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_wali_kelas` (`id_wali_kelas`),
  CONSTRAINT `kelas_jurusan_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kelas_jurusan_ibfk_5` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kelas_jurusan_ibfk_6` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kelas_jurusan_ibfk_7` FOREIGN KEY (`id_wali_kelas`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kelas_jurusan` */

insert  into `kelas_jurusan`(`id_kelas_jurusan`,`id_kelas`,`id_jurusan`,`daya_tampung`,`urutan_kelas_jurusan`,`id_wali_kelas`,`id_tahun`) values 
(1,5,2,35,'A',1,1);

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `id_hak_akses` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_hak_akses` (`id_hak_akses`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_hak_akses`) REFERENCES `hak_akses` (`id_hak_akses`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id_user`,`username`,`password`,`id_hak_akses`,`status`) values 
(1,'385516','21232f297a57a5a743894a0e4a801fc3',1,0),
(2,'2325566','bbff3c8efdc34c2c0f26c2acd86b1c08',3,1),
(3,'267733','ff37d37c15a796c75a504dbefdc1af34',3,1);

/*Table structure for table `ortu` */

DROP TABLE IF EXISTS `ortu`;

CREATE TABLE `ortu` (
  `id_ortu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ortu` varchar(200) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `jenkel_ortu` varchar(1) NOT NULL,
  `hp_ortu` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ortu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ortu` */

insert  into `ortu`(`id_ortu`,`nama_ortu`,`alamat_ortu`,`jenkel_ortu`,`hp_ortu`) values 
(2,'Anggi Surya Permana','Yogyakarta','L','0813272671411');

/*Table structure for table `pelanggaran` */

DROP TABLE IF EXISTS `pelanggaran`;

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggaran` varchar(200) NOT NULL,
  `point_pelanggaran` int(10) NOT NULL,
  `id_kat_pelanggaran` int(11) NOT NULL,
  PRIMARY KEY (`id_pelanggaran`),
  KEY `id_kat_pelanggaran` (`id_kat_pelanggaran`),
  CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`id_kat_pelanggaran`) REFERENCES `kat_pelanggaran` (`id_kat_pelanggaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggaran` */

insert  into `pelanggaran`(`id_pelanggaran`,`nama_pelanggaran`,`point_pelanggaran`,`id_kat_pelanggaran`) values 
(1,'Merokok',10,1),
(2,'Pacaran',75,2);

/*Table structure for table `pelanggaran_siswa` */

DROP TABLE IF EXISTS `pelanggaran_siswa`;

CREATE TABLE `pelanggaran_siswa` (
  `id_pelanggaran_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_pelanggaran` int(11) NOT NULL,
  `id_penginput` int(20) NOT NULL,
  `waktu_melanggar` date NOT NULL,
  `waktu_input` text NOT NULL,
  `tempat_pelanggaran` varchar(200) NOT NULL,
  `tindak_lanjut` text NOT NULL,
  `id_tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_pelanggaran_siswa`),
  KEY `nis` (`id_siswa`),
  KEY `id_pelanggaran` (`id_pelanggaran`),
  KEY `id_penginput` (`id_penginput`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `pelanggaran_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pelanggaran_siswa_ibfk_2` FOREIGN KEY (`id_pelanggaran`) REFERENCES `pelanggaran` (`id_pelanggaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pelanggaran_siswa_ibfk_4` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggaran_siswa` */

insert  into `pelanggaran_siswa`(`id_pelanggaran_siswa`,`id_siswa`,`id_pelanggaran`,`id_penginput`,`waktu_melanggar`,`waktu_input`,`tempat_pelanggaran`,`tindak_lanjut`,`id_tahun`) values 
(1,2,1,1,'2019-01-25','2019-28-01 09:36:26','Kantin','Bareng temen',1);

/*Table structure for table `penilaian_siswa` */

DROP TABLE IF EXISTS `penilaian_siswa`;

CREATE TABLE `penilaian_siswa` (
  `id_penilaian_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(10) NOT NULL,
  `sholat_wajib` int(1) NOT NULL,
  `membaca_kitab` int(1) NOT NULL,
  `sholat_sunnah` int(1) NOT NULL,
  `kerajinan` int(1) NOT NULL,
  `kedisiplinan` int(1) NOT NULL,
  `kerapihan` int(1) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_penilaian_siswa`),
  KEY `nis` (`id_siswa`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `penilaian_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penilaian_siswa_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penilaian_siswa` */

/*Table structure for table `prestasi` */

DROP TABLE IF EXISTS `prestasi`;

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prestasi` varchar(200) NOT NULL,
  `point_prestasi` int(10) NOT NULL,
  `id_kat_prestasi` int(11) NOT NULL,
  PRIMARY KEY (`id_prestasi`),
  KEY `id_kat_prestasi` (`id_kat_prestasi`),
  CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_kat_prestasi`) REFERENCES `kat_prestasi` (`id_kat_prestasi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prestasi` */

insert  into `prestasi`(`id_prestasi`,`nama_prestasi`,`point_prestasi`,`id_kat_prestasi`) values 
(1,'Hafalan 5 Juz Al-Qur\'an',75,1);

/*Table structure for table `prestasi_siswa` */

DROP TABLE IF EXISTS `prestasi_siswa`;

CREATE TABLE `prestasi_siswa` (
  `id_prestasi_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_prestasi` int(11) NOT NULL,
  `id_penginput` int(20) NOT NULL,
  `waktu_input` datetime NOT NULL,
  `keterangan_prestasi` text NOT NULL,
  `id_tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_prestasi_siswa`),
  KEY `nis` (`id_siswa`),
  KEY `id_prestasi` (`id_prestasi`),
  KEY `id_penginput` (`id_penginput`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `prestasi_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prestasi_siswa_ibfk_2` FOREIGN KEY (`id_prestasi`) REFERENCES `prestasi` (`id_prestasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prestasi_siswa_ibfk_3` FOREIGN KEY (`id_penginput`) REFERENCES `login` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prestasi_siswa_ibfk_4` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prestasi_siswa` */

insert  into `prestasi_siswa`(`id_prestasi_siswa`,`id_siswa`,`id_prestasi`,`id_penginput`,`waktu_input`,`keterangan_prestasi`,`id_tahun`) values 
(1,2,1,1,'0000-00-00 00:00:00','5 Juz terakhir ',1);

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `jenkel_siswa` varchar(1) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `hp_siswa` varchar(20) NOT NULL,
  `photo_siswa` text,
  `id_ortu` int(11) DEFAULT NULL,
  `id_kelas_jurusan` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `account` int(1) NOT NULL,
  PRIMARY KEY (`id_siswa`,`nis`),
  KEY `id_kelas_jurusan` (`id_kelas_jurusan`),
  KEY `id_ortu` (`id_ortu`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas_jurusan`) REFERENCES `kelas_jurusan` (`id_kelas_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_ibfk_4` FOREIGN KEY (`id_ortu`) REFERENCES `ortu` (`id_ortu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_ibfk_5` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`id_siswa`,`nis`,`nama_siswa`,`jenkel_siswa`,`alamat_siswa`,`hp_siswa`,`photo_siswa`,`id_ortu`,`id_kelas_jurusan`,`id_tahun`,`status`,`account`) values 
(2,'267733','Muhammad Anshar Sara','L','Yogyakarta','082327768945','uploads/848da860b5d39ab88e0cf3b3aa9dda47.png',2,1,1,0,1);

/*Table structure for table `tahun` */

DROP TABLE IF EXISTS `tahun`;

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `awal_tahun` date NOT NULL,
  `akhir_tahun` date NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tahun` */

insert  into `tahun`(`id_tahun`,`awal_tahun`,`akhir_tahun`,`tahun_ajaran`) values 
(1,'2018-01-01','2018-12-28','Tahun Ajaran 2018/2019');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
