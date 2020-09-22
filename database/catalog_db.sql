-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.23 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for catalog_db
CREATE DATABASE IF NOT EXISTS `catalog_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `catalog_db`;

-- Dumping structure for table catalog_db.author
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table catalog_db.author: ~10 rows (approximately)
DELETE FROM `author`;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` (`id`, `name`, `surname`, `avatar`) VALUES
	(1, 'Kate', 'Drozdova', '6838_1234567.png'),
	(2, 'Michail', 'Drozdov', '6838_1234567.png'),
	(10, 'Ivan', 'Ivanov', '6838_1234567.png'),
	(11, 'Petr', 'Petrov', '6838_1234567.png'),
	(12, 'Olga', 'Semenova', '6838_1234567.png'),
	(13, 'Valentina', 'Sidorova', '6838_1234567.png'),
	(14, 'Igor', 'Smirnov', '6838_1234567.png'),
	(15, 'Pavel', 'Pavlov', '6838_1234567.png'),
	(16, 'Irina', 'Pavlova', '6838_1234567.png'),
	(17, 'Lubov', 'Sorokina', '6838_1234567.png');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;

-- Dumping structure for table catalog_db.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) DEFAULT '0',
  `page_count` int(10) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_books_author` (`author`),
  KEY `FK_books_type` (`type`),
  CONSTRAINT `FK_books_author` FOREIGN KEY (`author`) REFERENCES `author` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_books_type` FOREIGN KEY (`type`) REFERENCES `type` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table catalog_db.books: ~11 rows (approximately)
DELETE FROM `books`;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `title`, `price`, `page_count`, `author`, `type`) VALUES
	(1, 'test title', 105, 60, 1, 1),
	(2, 'Title 2', 150, 208, 2, 2),
	(3, 'Title 3', 100, 48, 2, 1),
	(4, 'Title 4', 200, 67, 1, 2),
	(6, 'Title 6', 567, 87, 1, 1),
	(7, 'Title 769', 345, 56, 2, 1),
	(8, 'Title 8', 76, 86, 1, 2),
	(9, 'Title 9', 134, 23, 2, 2),
	(10, 'Title 10', 747, 95, 1, 1),
	(11, 'Title 10', 747, 95, 1, 1),
	(12, 'Title 11', 66, 567, 1, 2),
	(17, 'Venechka', 100, 20, 1, 1),
	(18, 'Venechka2', 100, 48, 2, 1),
	(19, 'Title 76956', 100, 20, 1, 1);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Dumping structure for table catalog_db.type
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table catalog_db.type: ~2 rows (approximately)
DELETE FROM `type`;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` (`id`, `title`) VALUES
	(1, 'detective244'),
	(2, 'roman');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
