-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2020 at 07:48 PM
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

DELIMITER $$
--
-- Procedures
--

CREATE  PROCEDURE `GetTodosEstadosRecientes` ()  BEGIN
	SELECT Z.nombrezombie, E.nombreestado, EZ.horafecha
FROM estadozombie EZ, estados E, zombies Z 
WHERE EZ.idzombie = Z.idzombie AND EZ.idestado = E.idestado 
ORDER BY EZ.horafecha DESC;

END$$

CREATE  PROCEDURE `GetZombiePorEstado` (IN `uestado` INT(11))  BEGIN
	SELECT DISTINCT Z.nombrezombie
	FROM estadozombie EZ, zombies Z
	WHERE EZ.idzombie=Z.idzombie AND EZ.idestado = uestado;
END$$

CREATE  PROCEDURE `GetZombies` ()  BEGIN
	SELECT
		*
	FROM
		zombies
	ORDER BY idzombie;
END$$

CREATE  PROCEDURE `InsertarEstadoAct` (IN `uestadoid` INT(11), IN `uzombieid` INT(11))  BEGIN
	INSERT INTO `estadozombie` (`horafecha`, `idestado`, `idzombie`) VALUES (current_timestamp(), uestadoid, uzombieid);
END$$

CREATE PROCEDURE `InsertarZombie` (IN `uzombie` VARCHAR(50))  BEGIN
	INSERT INTO `zombies` (`idzombie`, `nombrezombie`) VALUES (NULL, uzombie);
END$$

DELIMITER ;

-- --------------------------------------------------------


--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `idestado` int(11) NOT NULL,
  `nombreestado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`idestado`, `nombreestado`) VALUES
(1, 'infección'),
(2, 'desorientación'),
(3, 'violencia'),
(4, 'desmayo'),
(5, 'transformación');

-- --------------------------------------------------------

--
-- Table structure for table `estadozombie`
--

CREATE TABLE `estadozombie` (
  `horafecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `idzombie` int(11) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `estadozombie`
--

INSERT INTO `estadozombie` (`horafecha`, `idzombie`, `idestado`) VALUES
('2020-10-28 16:38:56', 1, 1),
('2020-10-28 17:22:58', 1, 1),
('2020-10-28 18:42:00', 1, 1),
('2020-10-28 18:46:58', 1, 1),
('2020-10-28 16:48:10', 1, 3),
('2020-10-28 17:23:07', 1, 3),
('2020-10-28 16:48:20', 1, 4),
('2020-10-28 16:46:32', 2, 1),
('2020-10-28 17:22:01', 2, 1),
('2020-10-28 16:48:37', 2, 3),
('2020-10-28 16:48:44', 2, 4),
('2020-10-28 17:46:27', 10, 2);

-- --------------------------------------------------------


--
-- Table structure for table `zombies`
--

CREATE TABLE `zombies` (
  `idzombie` int(11) NOT NULL,
  `nombrezombie` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `zombies`
--

INSERT INTO `zombies` (`idzombie`, `nombrezombie`) VALUES
(1, 'Eduardo Juárez'),
(2, 'Ricardo Cortés'),
(3, 'Guillermo Espino'),
(9, 'Karen Espino'),
(10, 'Julio Ramírez'),
(11, 'Vale Guerra');

--
-- Indexes for dumped tables
--


--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idestado`);

--
-- Indexes for table `estadozombie`
--
ALTER TABLE `estadozombie`
  ADD PRIMARY KEY (`horafecha`),
  ADD KEY `nombreestado` (`idzombie`,`idestado`),
  ADD KEY `idestado` (`idestado`);

--
--
--
-- Indexes for table `zombies`
--
ALTER TABLE `zombies`
  ADD PRIMARY KEY (`idzombie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumes`

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--

--
-- AUTO_INCREMENT for table `tipopark`

--
-- AUTO_INCREMENT for table `zombies`
--
ALTER TABLE `zombies`
  MODIFY `idzombie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estadozombie`
--
ALTER TABLE `estadozombie`
  ADD CONSTRAINT `estadozombie_ibfk_1` FOREIGN KEY (`idzombie`) REFERENCES `zombies` (`idzombie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estadozombie_ibfk_2` FOREIGN KEY (`idestado`) REFERENCES `estados` (`idestado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
