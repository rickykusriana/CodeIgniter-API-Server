-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "profile" --------------------------------------
CREATE TABLE `profile` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`address` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`email` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`phone` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`image` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`created_at` Timestamp NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`updated_at` Timestamp NULL DEFAULT '0000-00-00 00:00:00',
	`updated_by` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = MyISAM
AUTO_INCREMENT = 10;
-- -------------------------------------------------------------


-- Dump data of "profile" ----------------------------------
INSERT INTO `profile`(`id`,`name`,`address`,`email`,`phone`,`image`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES 
( '2', 'Ricky', 'Jakarta', 'ricky@gmail.com', '08976767', 'cf044d33ae98f7a3a9b0f7c680ad596d.jpg', '2018-09-01 11:46:32', 'Ricky', '2018-09-01 13:48:30', 'Ricky' ),
( '12', 'aaaaaaaaaa', 'Kuningan', 'rickykusriana@gmail.com', '82240676507', 'd984ba456fce441fc382341c71ee7c59.jpg', '2018-09-01 14:03:45', 'Ricky', '0000-00-00 00:00:00', NULL ),
( '11', 'bbbbbbbbbbbb', 'Kahuhxuah', 'ricky.subagja@ibstower.com', '82240676507', '4d3da36e1b5f7478523d26d219d80acc.jpg', '2018-09-01 13:53:52', 'Ricky', '2018-09-01 14:03:59', 'Ricky' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


