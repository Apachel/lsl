-- CREATE DATABASE `web` CHARACTER SET cp1251 COLLATE cp1251_general_ci;

use web; -- now using database `web`
CREATE TABLE `host` (
	`id` INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(128) NULL DEFAULT NULL,
	`datetime` DATETIME NULL DEFAULT '2000-01-01 00:00:00',
	`ip` VARCHAR(15) NULL DEFAULT '192.168.000.001',
	`port` INT(5) UNSIGNED NULL DEFAULT '0',
	`protocol` VARCHAR(50) NULL DEFAULT 'http',
	`OnLine` INT(1) NULL DEFAULT '1',
	`server_name` VARCHAR(50) NULL DEFAULT 'server',
	`cgi` VARCHAR(50) NULL DEFAULT 'cgi.exe',
	`php` VARCHAR(50) NULL DEFAULT 'index.php',
	`mysql` VARCHAR(50) NULL DEFAULT 'apachel',
	`user` VARCHAR(50) NULL DEFAULT 'apachel',
	PRIMARY KEY (`id`),
	UNIQUE INDEX (`description`)
)
COLLATE='cp1251_general_ci'
ENGINE=InnoDB
ROW_FORMAT=COMPACT
AUTO_INCREMENT=2
;
-- --------------------------------------------------------
-- Хост:                         APACHEL
--- Версия сервера:               5.7.5-m15 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Дамп данных таблицы web.host: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `host` DISABLE KEYS */;
INSERT INTO `host` (`id`, `description`, `datetime`, `ip`, `port`, `protocol`, `OnLine`, `server_name`, `cgi`, `php`, `mysql`, `user`) VALUES
	(1, 'template', '2000-01-01 00:00:00', '192.168.0.1', 12046, 'http', 0, 'cloud9', 'cgi.exe', 'index.php', 'database', 'apachel');
/*!40000 ALTER TABLE `host` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
show tables;