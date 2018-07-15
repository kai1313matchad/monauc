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

-- Dumping data for table monauc.mona_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_admin` ENABLE KEYS */;

-- Dumping data for table monauc.mona_aucgame: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_aucgame` DISABLE KEYS */;
INSERT INTO `mona_aucgame` (`AUCG_ID`, `PROD_ID`, `AUCG_DATE`, `LAST_BID`, `AUCG_DTSTS`) VALUES
	('AUC001', 'BB0618PROBO', '2018-07-06', 190000000, '1');
/*!40000 ALTER TABLE `mona_aucgame` ENABLE KEYS */;

-- Dumping data for table monauc.mona_bidhistory: ~0 rows (approximately)
/*!40000 ALTER TABLE `mona_bidhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `mona_bidhistory` ENABLE KEYS */;

-- Dumping data for table monauc.mona_product: ~2 rows (approximately)
/*!40000 ALTER TABLE `mona_product` DISABLE KEYS */;
INSERT INTO `mona_product` (`PROD_ID`, `PROD_NAME`, `PROD_PRICE`, `PROD_OPENPRICE`, `PROD_BUYOUT`, `PROD_PIC`, `PROD_DTSTS`) VALUES
	('BB0618PROBO', 'Probolinggo', 400000000, '100000000', '300000000', '/assets/img/product/img_1531656005.jpeg', '1'),
	('BB0718ADIT', 'Adityawarmana', 0, '100000000', '300000000', NULL, '0'),
	('BB0718HRMUH', 'HR Muhammad', 0, '100000000', '200000000', '/assets/img/product/img_1531653033.jpeg', '1');
/*!40000 ALTER TABLE `mona_product` ENABLE KEYS */;

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
