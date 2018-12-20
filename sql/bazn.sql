-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2018 at 09:54 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazn`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `galleryid` int(11) NOT NULL AUTO_INCREMENT,
  `gallerytitle` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gallerydate` date NOT NULL,
  `gallerytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`galleryid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imgid` int(11) NOT NULL AUTO_INCREMENT,
  `imggallery` int(11) NOT NULL,
  `imglink` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imglink2` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgtitle` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`imgid`),
  KEY `imagegallery` (`imggallery`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `posttitle` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `postcontent` text COLLATE utf8_unicode_ci NOT NULL,
  `postautor` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `postdate` date NOT NULL,
  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `posttitle`, `postcontent`, `postautor`, `postdate`, `posttime`) VALUES
(6, 'Evangelija (Mt 1, 18–24)', ' Jėzaus Kristaus gimimas buvo toksai. \r\n    Jo motina Marija buvo susižadėjusi su Juozapu; dar nepradėjus jiems kartu gyventi, Šventajai Dvasiai veikiant, ji tapo nėščia. Jos vyras  Juozapas, būdamas teisus ir nenorėdamas daryti jai nešlovės, sumanė tylomis ją atleisti. \r\n    Kai jis nusprendė taip padaryti, per sapną pasirodė jam Viešpaties angelas ir tarė: „Juozapai, Dovydo sūnau,  nebijok parsivesti į namus savo žmonos Marijos, nes jos  vaisius yra iš Šventosios Dvasios. Ji pagimdys sūnų, kuriam tu duosi vardą Jėzus, nes jis išgelbės savo tautą iš nuodėmių“. \r\n    Visa tai įvyko, kad išsipildytų Viešpaties žodžiai, pasakyti pranašo lūpomis: „Štai mergelė nešios įsčiose ir pagimdys sūnų, ir jis vadinsis  Emanuelis“, o tai reiškia: „Dievas su mumis“. \r\n    Atsikėlęs Juozapas padarė taip, kaip Viešpaties angelo buvo įsakyta, ir parsivedė žmoną pas save. ', 'Dienos skaitinys', '2018-12-18', '2018-12-18 08:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `videoid` int(11) NOT NULL AUTO_INCREMENT,
  `videotitle` varchar(256) NOT NULL,
  `videolink` varchar(256) NOT NULL,
  `videodate` date NOT NULL,
  `videotime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`videoid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`videoid`, `videotitle`, `videolink`, `videodate`, `videotime`) VALUES
(3, 'Hillsong United - \"Oceans\" (Live show at Caesarea)', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/HVAR85rorvU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2018-12-08', '2018-12-08 16:06:31'),
(16, 'What a Beautiful Name w/ Break Every Chain - Hillsong Worship live @ Colour Conference 2018', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/fEwDx8YJndU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2018-12-18', '2018-12-18 08:14:15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `imagegallery` FOREIGN KEY (`imggallery`) REFERENCES `gallery` (`galleryid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
