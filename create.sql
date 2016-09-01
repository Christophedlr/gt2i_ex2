-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.1.13-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.3.0.5104
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la table test. hf_document
CREATE TABLE IF NOT EXISTS `hf_document` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `produit_pocleunik` int(10) unsigned NOT NULL,
  `refciale_arcleunik` int(10) unsigned NOT NULL,
  `refciale_ctva` int(10) unsigned NOT NULL,
  `refciale_ficheina` int(10) unsigned NOT NULL,
  `article_poids` float unsigned NOT NULL,
  `article_hnormel` int(10) unsigned NOT NULL,
  `article_categ` int(10) unsigned NOT NULL,
  `refciale_modte` char(8) NOT NULL,
  `produit_modte` char(8) NOT NULL,
  `produit_ref` varchar(50) NOT NULL,
  `refciale_refcat` varchar(50) NOT NULL,
  `potrad_desi` varchar(255) NOT NULL,
  `produit_marque` varchar(50) NOT NULL,
  `produit_clep01` varchar(50) DEFAULT NULL,
  `produit_clep02` varchar(50) DEFAULT NULL,
  `produit_clep03` varchar(50) DEFAULT NULL,
  `produit_clep04` varchar(50) DEFAULT NULL,
  `produit_clep06` varchar(50) DEFAULT NULL,
  `produit_clep07` varchar(50) DEFAULT NULL,
  `produit_gcoloris` varchar(50) DEFAULT NULL,
  `produit_gtaille` varchar(50) DEFAULT NULL,
  `produit_clep12` varchar(50) DEFAULT NULL,
  `fictech_memocat` text NOT NULL,
  `fictech_memonet` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='SQL Table for exercise 2 of GT2I Tests';

-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
