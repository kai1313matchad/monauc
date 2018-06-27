-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table mon_auction.mona_admin
DROP TABLE IF EXISTS `mona_admin`;
CREATE TABLE IF NOT EXISTS `mona_admin` (
  `ADM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ADM_USERNAME` char(10) DEFAULT NULL,
  `ADM_PASSWORD` char(10) DEFAULT NULL,
  PRIMARY KEY (`ADM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mon_auction.mona_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_admin` ENABLE KEYS */;

-- Dumping structure for table mon_auction.mona_aucgame
DROP TABLE IF EXISTS `mona_aucgame`;
CREATE TABLE IF NOT EXISTS `mona_aucgame` (
  `AUCG_ID` char(20) NOT NULL,
  `PROD_ID` char(10) DEFAULT NULL,
  `AUCG_DATE` date DEFAULT NULL,
  `LAST_BID` bigint(20) DEFAULT NULL,
  `AUCG_DTSTS` char(1) DEFAULT '0',
  PRIMARY KEY (`AUCG_ID`),
  KEY `FK_AUCG1` (`PROD_ID`),
  CONSTRAINT `FK_AUCG1` FOREIGN KEY (`PROD_ID`) REFERENCES `mona_product` (`PROD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mon_auction.mona_aucgame: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_aucgame` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_aucgame` ENABLE KEYS */;

-- Dumping structure for table mon_auction.mona_bidhistory
DROP TABLE IF EXISTS `mona_bidhistory`;
CREATE TABLE IF NOT EXISTS `mona_bidhistory` (
  `BIDH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` char(10) DEFAULT NULL,
  `BIDH_NOM` bigint(20) NOT NULL,
  PRIMARY KEY (`BIDH_ID`),
  KEY `FK_BIDH1` (`USER_ID`),
  CONSTRAINT `FK_BIDH1` FOREIGN KEY (`USER_ID`) REFERENCES `mona_user` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mon_auction.mona_bidhistory: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_bidhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_bidhistory` ENABLE KEYS */;

-- Dumping structure for table mon_auction.mona_product
DROP TABLE IF EXISTS `mona_product`;
CREATE TABLE IF NOT EXISTS `mona_product` (
  `PROD_ID` char(20) NOT NULL,
  `PROD_NAME` char(20) NOT NULL,
  `PROD_OPENPRICE` char(20) NOT NULL,
  `PROD_BUYOUT` char(20) NOT NULL,
  `PROD_PIC` char(20) DEFAULT NULL,
  `PROD_DTSTS` char(1) DEFAULT '0',
  PRIMARY KEY (`PROD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mon_auction.mona_product: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_product` ENABLE KEYS */;

-- Dumping structure for table mon_auction.mona_user
DROP TABLE IF EXISTS `mona_user`;
CREATE TABLE IF NOT EXISTS `mona_user` (
  `USER_ID` char(10) NOT NULL,
  `USER_NAME` char(10) NOT NULL,
  `USER_PASS` char(10) NOT NULL,
  `USER_COMPANY` char(200) DEFAULT NULL,
  `USER_ADDRESS` varchar(2048) DEFAULT NULL,
  `USER_DTSTS` char(1) DEFAULT '0',
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mon_auction.mona_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
