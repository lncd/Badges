# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25)
# Database: badges
# Generation Time: 2013-01-18 16:04:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table badge_objectives
# ------------------------------------------------------------

DROP TABLE IF EXISTS `badge_objectives`;

CREATE TABLE `badge_objectives` (
  `badge_id` int(6) unsigned NOT NULL,
  `objective_id` int(6) NOT NULL,
  PRIMARY KEY (`badge_id`,`objective_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `badge_objectives` WRITE;
/*!40000 ALTER TABLE `badge_objectives` DISABLE KEYS */;

INSERT INTO `badge_objectives` (`badge_id`, `objective_id`)
VALUES
	(1,1),
	(2,8);

/*!40000 ALTER TABLE `badge_objectives` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table badge_source
# ------------------------------------------------------------

DROP TABLE IF EXISTS `badge_source`;

CREATE TABLE `badge_source` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `badge_source` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `badge_source` WRITE;
/*!40000 ALTER TABLE `badge_source` DISABLE KEYS */;

INSERT INTO `badge_source` (`id`, `badge_source`)
VALUES
	(1,'University of Lincoln');

/*!40000 ALTER TABLE `badge_source` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table badges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `badges`;

CREATE TABLE `badges` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `badge_name` varchar(255) NOT NULL DEFAULT '',
  `badge_source` int(3) NOT NULL,
  `badge_image` mediumtext,
  `version` varchar(15) DEFAULT NULL,
  `description` mediumtext,
  `criteria_uri` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `badges` WRITE;
/*!40000 ALTER TABLE `badges` DISABLE KEYS */;

INSERT INTO `badges` (`id`, `badge_name`, `badge_source`, `badge_image`, `version`, `description`, `criteria_uri`)
VALUES
	(1,'I Created A Badge!',1,'3dc614a10a59e6e3bf406725804f5878.png','0.1','This badge is a test badge to see if I can award badges!','http://lncd.org'),
	(2,'Partial Badge',1,'3dc614a10a59e6e3bf406725804f5878.png','0.1','This badge is a test badge to see if I can award badges!','http://lncd.org');

/*!40000 ALTER TABLE `badges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table badges_earned
# ------------------------------------------------------------

DROP TABLE IF EXISTS `badges_earned`;

CREATE TABLE `badges_earned` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `badge_id` int(6) NOT NULL,
  `email_address` varchar(255) NOT NULL DEFAULT '',
  `badge_data` mediumtext NOT NULL,
  `assertion_uri` varchar(255) DEFAULT NULL,
  `awarded` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `badges_earned` WRITE;
/*!40000 ALTER TABLE `badges_earned` DISABLE KEYS */;

INSERT INTO `badges_earned` (`id`, `user_id`, `badge_id`, `email_address`, `badge_data`, `assertion_uri`, `awarded`)
VALUES
	(1,1,1,'jmahoney@lincoln.ac.uk','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','002944797bf31.json',0),
	(2,2,1,'joss@josswinn.org','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','jwinnba1acb1.json',0);

/*!40000 ALTER TABLE `badges_earned` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table issuer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `issuer`;

CREATE TABLE `issuer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table objective_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `objective_types`;

CREATE TABLE `objective_types` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `objective_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `objective_types` WRITE;
/*!40000 ALTER TABLE `objective_types` DISABLE KEYS */;

INSERT INTO `objective_types` (`id`, `objective_type`)
VALUES
	(1,'Knowledge and Understanding'),
	(2,'Subject-Specific Intellectual Skills'),
	(3,'Subject-Specific Practical Skills'),
	(4,'Transferrable Skills and Attributes'),
	(5,'Test');

/*!40000 ALTER TABLE `objective_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table objectives
# ------------------------------------------------------------

DROP TABLE IF EXISTS `objectives`;

CREATE TABLE `objectives` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `objective_text` text NOT NULL,
  `objective_type_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `objectives` WRITE;
/*!40000 ALTER TABLE `objectives` DISABLE KEYS */;

INSERT INTO `objectives` (`id`, `objective_text`, `objective_type_id`)
VALUES
	(1,'Create a Badge',3),
	(8,'eggs',1),
	(9,'This is a test',1);

/*!40000 ALTER TABLE `objectives` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table objectives_complete
# ------------------------------------------------------------

DROP TABLE IF EXISTS `objectives_complete`;

CREATE TABLE `objectives_complete` (
  `user_id` int(15) unsigned NOT NULL,
  `objective_id` int(6) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `objective_id` (`objective_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `objectives_complete` WRITE;
/*!40000 ALTER TABLE `objectives_complete` DISABLE KEYS */;

INSERT INTO `objectives_complete` (`user_id`, `objective_id`, `id`)
VALUES
	(1,1,1),
	(1,8,2);

/*!40000 ALTER TABLE `objectives_complete` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` varchar(10) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `oauth_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `person_id`, `fname`, `lname`, `email_address`, `oauth_token`)
VALUES
	(1,'002944','Jamie','Mahoney','jmahoney@lincoln.ac.uk','123456uikgjhcvbjvbfdyrtdfhbc-9v');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
