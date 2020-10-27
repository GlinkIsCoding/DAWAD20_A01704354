-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2020 at 04:13 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetIncidentesRecientes` ()  BEGIN
	SELECT I.horafecha, L.nombre AS nombrelugar, T.nombre AS nombretipo
    FROM incidentepark I, lugarpark L, tipopark T
    WHERE I.idlugar = L.id AND T.id = I.idtipo
    ORDER BY horafecha DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetLugares` ()  BEGIN
	SELECT
		*
	FROM
		lugarpark
	ORDER BY id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetTipos` ()  BEGIN
	SELECT
		*
	FROM
		tipopark
	ORDER BY id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RemoveIncidente` (IN `fecha` TIMESTAMP)  BEGIN
	DELETE FROM `incidentepark` WHERE `incidentepark`.`horafecha` = fecha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateLugares` (IN `uid` INT(11), IN `unombre` VARCHAR(100))  BEGIN
	UPDATE `lugarpark` SET `nombre` = unombre WHERE `lugarpark`.`id` = uid;
END$$

DELIMITER ;

-- --------------------------------------------------------


--
-- Table structure for table `incidentepark`
--

CREATE TABLE `incidentepark` (
  `horafecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `idlugar` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `incidentepark`
--

INSERT INTO `incidentepark` (`horafecha`, `idlugar`, `idtipo`) VALUES
('2020-10-25 22:10:01', 1, 3),
('2020-10-25 08:31:16', 2, 5),
('2020-10-25 09:37:16', 2, 6),
('2020-10-25 09:35:34', 3, 1),
('2020-10-25 00:05:10', 4, 5),
('2020-10-25 22:18:26', 4, 6),
('2020-10-25 08:45:37', 6, 1),
('2020-10-25 22:09:50', 8, 2),
('2020-10-25 09:14:11', 9, 3),
('2020-10-25 22:09:54', 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `lugarpark`
--

CREATE TABLE `lugarpark` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `lugarpark`
--

INSERT INTO `lugarpark` (`id`, `nombre`) VALUES
(1, 'Centro turístico'),
(2, 'Laboratorios'),
(3, 'Restaurante'),
(4, 'Centro operativo'),
(5, 'Triceratops'),
(6, 'Dilofosaurios'),
(7, 'Velociraptors'),
(8, 'TRex'),
(9, 'Planicie de los herbívoros'),
(10, 'Llanura de los carnívoros');

-- --------------------------------------------------------

--
-- Table structure for table `tipopark`
--

CREATE TABLE `tipopark` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `tipopark`
--

INSERT INTO `tipopark` (`id`, `nombre`) VALUES
(1, 'Falla eléctrica'),
(2, 'Fuga de herbívoro'),
(3, 'Fuga de Velociraptors'),
(4, 'Fuga de TRex'),
(5, 'Robo de ADN'),
(6, 'Auto descompuesto'),
(7, 'Visitantes en zona no autorizada');

--
-- Indexes for dumped tables
--

--

-- Indexes for table `incidentepark`
--
ALTER TABLE `incidentepark`
  ADD PRIMARY KEY (`horafecha`),
  ADD KEY `incidente_index` (`idlugar`,`idtipo`),
  ADD KEY `idtipo` (`idtipo`);

--
-- Indexes for table `lugarpark`
--
ALTER TABLE `lugarpark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipopark`
--
ALTER TABLE `tipopark`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `lugarpark`
--
ALTER TABLE `lugarpark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tipopark`
--
ALTER TABLE `tipopark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incidentepark`
--
ALTER TABLE `incidentepark`
  ADD CONSTRAINT `incidentepark_ibfk_1` FOREIGN KEY (`idlugar`) REFERENCES `lugarpark` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incidentepark_ibfk_2` FOREIGN KEY (`idtipo`) REFERENCES `tipopark` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
