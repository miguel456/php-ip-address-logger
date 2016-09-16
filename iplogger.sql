-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';

DROP DATABASE IF EXISTS `iplogger`;
CREATE DATABASE `iplogger` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `iplogger`;

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `addresses` varchar(255) NOT NULL,
  `httpreferer` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `whitelist`;
CREATE TABLE `whitelist` (
  `id` mediumint(20) NOT NULL AUTO_INCREMENT,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2016-09-16 22:58:45
