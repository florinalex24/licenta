-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Gazda: localhost
-- Timp de generare: 22 Feb 2013 la 16:53
-- Versiune server: 5.1.41
-- Versiune PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza de date: `lic_db`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hash_validation` varchar(255) NOT NULL,
  `type` enum('0','10') NOT NULL DEFAULT '0',
  `activ` enum('0','1') NOT NULL,
  `ip` varchar(100) NOT NULL,
  `data_insert` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `hash_validation`, `type`, `activ`, `ip`, `data_insert`) VALUES
(1, 'user1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user1@localhost', '', '0', '0', '127.0.0.1', '0000-00-00 00:00:00'),
(2, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@localhost.co', '', '10', '0', '127.0.0.1', '0000-00-00 00:00:00'),
(32, 'flori', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', 'flori@flor.com', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', '10', '1', '{"ip":"127.0.0.1","pcname":"localhost"}', '2013-02-22 16:47:22'),
(31, 'qaz', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', 'qazzaq@ysda.com', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', '10', '1', '{"ip":"127.0.0.1","pcname":"localhost"}', '2013-02-22 16:05:24'),
(30, 'zazaz', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', 'zaza@uds.com', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', '', '0', '{"ip":"127.0.0.1","pcname":"localhost"}', '2013-02-22 16:02:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
