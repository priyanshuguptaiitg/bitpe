CREATE DATABASE `BIT_PE`;
USE `BIT_PE`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(11) NOT NULL PRIMARY KEY,
  `email` varchar(51) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `wallet` (
  `username` varchar(11) NOT NULL PRIMARY KEY,
  `coin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`username`, `email`, `password`) VALUES ('admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'), ('user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee');
INSERT INTO `wallet` (`username`, `coin`) VALUES ('admin','2100'),('user','0');

COMMIT;