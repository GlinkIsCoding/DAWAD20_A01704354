-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2020 at 08:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discos`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumes`
--

CREATE TABLE `albumes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `artista` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `unidades` int(11) NOT NULL,
  `precio` float NOT NULL,
  `idioma` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `albumes`
--

INSERT INTO `albumes` (`id`, `nombre`, `artista`, `unidades`, `precio`, `idioma`) VALUES
(1, 'Younger Now', 'Miley Cyrus', 20, 150, 'Inglés'),
(2, 'Can\'t Be Tamed', 'Miley Cyrus', 67, 140, 'Inglés'),
(3, 'In a Dream', 'Troye Sivan', 14, 200, 'Inglés'),
(4, 'folklore', 'Taylor Swift', 2, 310, 'Inglés'),
(5, 'Chromatica', 'Lady Gaga', 32, 250, 'Inglés'),
(6, 'Lover', 'Taylor Swift', 25, 180, 'Inglés'),
(7, 'Musas', 'Natalia Lafourcade', 40, 210, 'Español'),
(8, 'reputation', 'Taylor Swift', 5, 110, 'Inglés'),
(9, 'A passi piccoli', 'Michele Bravi', 3, 140, 'Italiano'),
(10, 'thank u, next', 'Ariana Grande', 6, 110, 'Inglés'),
(11, 'Sweetener', 'Ariana Grande', 0, 180, 'Inglés');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumes`
--
ALTER TABLE `albumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
