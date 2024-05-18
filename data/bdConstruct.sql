
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts`(
    `accountId` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL.
    `password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
    PRIMARY KEY (`accountId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



