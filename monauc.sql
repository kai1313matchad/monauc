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

-- Dumping structure for table monauc.mona_aucgame
DROP TABLE IF EXISTS `mona_aucgame`;
CREATE TABLE IF NOT EXISTS `mona_aucgame` (
  `AUCG_ID` char(20) NOT NULL,
  `PROD_ID` char(20) DEFAULT NULL,
  `AUCG_DATE` date DEFAULT NULL,
  `AUCG_OPENPRICE` bigint(20) DEFAULT NULL,
  `AUCG_BUYOUT` bigint(20) DEFAULT NULL,
  `AUCG_BID` bigint(20) DEFAULT NULL,
  `AUCG_LASTBID` bigint(20) DEFAULT NULL,
  `AUCG_DTSTS` char(1) DEFAULT '0',
  PRIMARY KEY (`AUCG_ID`),
  KEY `FK_AUCG1` (`PROD_ID`),
  CONSTRAINT `FK_AUC_1` FOREIGN KEY (`PROD_ID`) REFERENCES `mona_product` (`PROD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table monauc.mona_aucgame: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_aucgame` DISABLE KEYS */;
INSERT INTO `mona_aucgame` (`AUCG_ID`, `PROD_ID`, `AUCG_DATE`, `AUCG_OPENPRICE`, `AUCG_BUYOUT`, `AUCG_BID`, `AUCG_LASTBID`, `AUCG_DTSTS`) VALUES
	('AUC-00001', 'BB0618PROBO', '2018-07-16', 100000000, 200000000, 10000000, 100000000, '0'),
	('AUC-00002', 'BB0618PROBO', '2018-07-16', 150000000, 350000000, 10000000, 0, '1');
/*!40000 ALTER TABLE `mona_aucgame` ENABLE KEYS */;

-- Dumping structure for table monauc.mona_bidhistory
DROP TABLE IF EXISTS `mona_bidhistory`;
CREATE TABLE IF NOT EXISTS `mona_bidhistory` (
  `BIDH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` char(10) DEFAULT NULL,
  `AUCG_ID` char(20) DEFAULT NULL,
  `BIDH_NOM` bigint(20) NOT NULL,
  `BIDH_TIME` time NOT NULL,
  `BIDH_STS` char(1) NOT NULL,
  PRIMARY KEY (`BIDH_ID`),
  KEY `FK_BIDH1` (`USER_ID`),
  KEY `FK_BIDH2` (`AUCG_ID`),
  CONSTRAINT `FK_BIDH1` FOREIGN KEY (`USER_ID`) REFERENCES `mona_user` (`USER_ID`),
  CONSTRAINT `FK_BIDH2` FOREIGN KEY (`AUCG_ID`) REFERENCES `mona_aucgame` (`AUCG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table monauc.mona_bidhistory: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_bidhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_bidhistory` ENABLE KEYS */;

-- Dumping structure for table monauc.mona_product
DROP TABLE IF EXISTS `mona_product`;
CREATE TABLE IF NOT EXISTS `mona_product` (
  `PROD_ID` char(20) NOT NULL,
  `PROD_NAME` char(20) NOT NULL,
  `PROD_PRICE` bigint(20) NOT NULL,
  `PROD_OPENPRICE` char(20) NOT NULL,
  `PROD_BUYOUT` char(20) NOT NULL,
  `PROD_PIC` varchar(1024) DEFAULT NULL,
  `PROD_DTSTS` char(1) DEFAULT '0',
  PRIMARY KEY (`PROD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table monauc.mona_product: ~3 rows (approximately)
/*!40000 ALTER TABLE `mona_product` DISABLE KEYS */;
INSERT INTO `mona_product` (`PROD_ID`, `PROD_NAME`, `PROD_PRICE`, `PROD_OPENPRICE`, `PROD_BUYOUT`, `PROD_PIC`, `PROD_DTSTS`) VALUES
	('BB0618PROBO', 'Probolinggo', 400000000, '100000000', '300000000', '/assets/img/product/img_1531656005.jpeg', '1'),
	('BB0718ADIT', 'Adityawarmana', 0, '100000000', '300000000', NULL, '0'),
	('BB0718HRMUH', 'HR Muhammad', 250000000, '100000000', '200000000', '/assets/img/product/img_1531653033.jpeg', '1');
/*!40000 ALTER TABLE `mona_product` ENABLE KEYS */;

-- Dumping structure for table monauc.mona_user
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

-- Dumping data for table monauc.mona_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `mona_user` DISABLE KEYS */;
INSERT INTO `mona_user` (`USER_ID`, `USER_NAME`, `USER_PASS`, `USER_COMPANY`, `USER_ADDRESS`, `USER_DTSTS`) VALUES
	('USR-00001', 'Kaisha', '12345', 'Match Ad', 'Lesti 42A', '1'),
	('USR-00002', 'Indra', '12345', 'KCT', 'Raya Taman', '1'),
	('USR-00003', 'Dini', '12345', 'WPI', 'HR Muhammad', '1'),
	('USR-00004', 'Zamroni', '12345', 'WIKLAN', 'Lesti 42B', '1');
/*!40000 ALTER TABLE `mona_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
