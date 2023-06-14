-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6680
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ornekdb
DROP DATABASE IF EXISTS `ornekdb`;
CREATE DATABASE IF NOT EXISTS `ornekdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ornekdb`;

-- Dumping structure for table ornekdb.hastalar
DROP TABLE IF EXISTS `hastalar`;
CREATE TABLE IF NOT EXISTS `hastalar` (
  `hastaid` int(11) unsigned NOT NULL,
  `adi` varchar(50) DEFAULT NULL,
  `soyadi` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tlf` varchar(50) DEFAULT NULL,
  `tcno` varchar(50) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL,
  `cinsiyet` char(1) DEFAULT 'E',
  UNIQUE KEY `Index 1` (`hastaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ornekdb.hastalar: ~2 rows (approximately)
INSERT INTO `hastalar` (`hastaid`, `adi`, `soyadi`, `email`, `tlf`, `tcno`, `adres`, `cinsiyet`) VALUES
	(1, 'sdfsadf', NULL, NULL, NULL, NULL, NULL, 'E'),
	(2, 'asdfsdf', NULL, NULL, NULL, NULL, NULL, 'E');

-- Dumping structure for table ornekdb.resimler
DROP TABLE IF EXISTS `resimler`;
CREATE TABLE IF NOT EXISTS `resimler` (
  `hastaid` int(11) unsigned DEFAULT NULL,
  `resimbilgisi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ornekdb.resimler: ~4 rows (approximately)
INSERT INTO `resimler` (`hastaid`, `resimbilgisi`) VALUES
	(1, '241234'),
	(1, '23452345'),
	(1, 'dfgsdg'),
	(2, 'sdfgsdfg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
