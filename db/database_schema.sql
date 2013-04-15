-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Generato il: Set 17, 2012 alle 22:54
-- Versione del server: 5.5.24
-- Versione PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Struttura della tabella `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `resource_id` int(10) unsigned NOT NULL,
  `requested_at` datetime NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sent_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_sent` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `custom_template_html` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mime_type` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `newsletter_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '1',
  `has_received_mail` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_seen_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `list_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- migrations

ALTER TABLE `users` 
ADD `fails` TINYINT NOT NULL DEFAULT '0';


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
