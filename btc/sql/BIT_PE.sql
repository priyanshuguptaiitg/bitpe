CREATE DATABASE `BIT_PE`;
USE `BIT_PE`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET GLOBAL time_zone = '+5:30';

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(11) NOT NULL,
  `email` varchar(21) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` real NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `transaction` (
  `sno` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `sender` varchar(11) NOT NULL,
  `receiver` varchar(11) NOT NULL,
  `balance` real NOT NULL,
  `purpose` varchar(11),
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `prodname` varchar(11) NOT NULL,
  `price` real NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`username`, `email`, `password`,`balance`) VALUES ('admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3','2100'), ('user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee','0');

INSERT INTO `products` (`prodname`, `price`) VALUES ('BitPe Note 10 Pro','75000'), ('Bitpe Ultra Watch','95000'),('Bitpe Artwork','100000'),('Bitpe Super Bike','120000');

COMMIT;