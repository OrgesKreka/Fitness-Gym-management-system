-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Pritësi (host): 127.0.0.1
-- Koha e gjenerimit: Jan 06, 2017 në 10:45 PD
-- Versioni i serverit: 10.1.16-MariaDB
-- PHP Versioni: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databaza: `palestrax`
--

-- --------------------------------------------------------

--
-- Struktura e tabelës për tabelën `lloj_perdoruesi`
--

CREATE TABLE `lloj_perdoruesi` (
  `id` int(11) NOT NULL,
  `pershkrimi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zbraz të dhënat për tabelën `lloj_perdoruesi`
--

INSERT INTO `lloj_perdoruesi` (`id`, `pershkrimi`) VALUES
(1, 'Administratori eshte personi me me shume privilegje ne sistem...'),
(2, 'Instruktori ka te drejte te krijoje kurse dhe te shtoje anetare ne to...'),
(3, 'Anetari ka vetem te drejte te shohe kurset dhe oraret....');

-- --------------------------------------------------------

--
-- Struktura e tabelës për tabelën `perdorues`
--

CREATE TABLE `perdorues` (
  `perdorues_id` int(11) NOT NULL,
  `lloji_perdoruesit` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `gjinia` enum('F','M') NOT NULL,
  `nr_telefoni` varchar(15) DEFAULT NULL,
  `ndertimi_trupit` varchar(50) DEFAULT NULL,
  `adresa` varchar(255) DEFAULT NULL,
  `profesioni` varchar(50) DEFAULT NULL,
  `foto_profili` varchar(255) DEFAULT NULL,
  `pesha` float(5,2) DEFAULT NULL,
  `gjatesia` int(11) DEFAULT NULL,
  `imt` float(5,2) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fjalekalim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zbraz të dhënat për tabelën `perdorues`
--

INSERT INTO `perdorues` (`perdorues_id`, `lloji_perdoruesit`, `emri`, `mbiemri`, `gjinia`, `nr_telefoni`, `ndertimi_trupit`, `adresa`, `profesioni`, `foto_profili`, `pesha`, `gjatesia`, `imt`, `email`, `fjalekalim`) VALUES
(1, 1, 'Bora', 'Bejleri', 'F', '123456789', NULL, NULL, NULL, '_permbajtja/admin/te_tjera/imazhe_profili/leavit.png', NULL, NULL, NULL, 'bora_admin@palestrax.com', '1234'),
(2, 1, 'Redisa', 'Shehaj', 'F', '123456789', NULL, NULL, NULL, 'admin/te_tjera/imazhe_profili/rubin.jpg', NULL, NULL, NULL, 'redisa_admin@palestrax.com', '1234'),
(3, 1, 'Nerjada', 'Muçaj', 'F', '123456789', NULL, NULL, NULL, '_permbajtja/admin/te_tjera/imazhe_profili/tharp.jpg', NULL, NULL, NULL, 'nerjada_admin@palestrax.com', '1234'),
(4, 1, 'Amarildo', 'Kondi', 'M', '123456789', NULL, NULL, NULL, '_permbajtja/admin/te_tjera/imazhe_profili/njuton.jpg', NULL, NULL, NULL, 'amarildo_admin@palestrax.com', '1234'),
(5, 1, 'Nderim', 'Kurti', 'M', '123456789', NULL, NULL, NULL, '_permbajtja/admin/te_tjera/imazhe_profili/bruno.jpg', NULL, NULL, NULL, 'nderim_admin@palestrax.com', '1234'),
(6, 1, 'Orges', 'Kreka', 'M', '123456789', NULL, NULL, NULL, '_permbajtja/admin/te_tjera/imazhe_profili/farady.jpg', NULL, NULL, NULL, 'orges_admin@palestrax.com', '1234');

--
-- Indekset për tabelat e hedhura
--

--
-- Indekset për tabelë `lloj_perdoruesi`
--
ALTER TABLE `lloj_perdoruesi`
  ADD PRIMARY KEY (`id`);

--
-- Indekset për tabelë `perdorues`
--
ALTER TABLE `perdorues`
  ADD PRIMARY KEY (`perdorues_id`),
  ADD KEY `lloji_perdoruesit` (`lloji_perdoruesit`);

--
-- AUTO_INCREMENT për tabelat e hedhura
--

--
-- AUTO_INCREMENT për tabelë `lloj_perdoruesi`
--
ALTER TABLE `lloj_perdoruesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT për tabelë `perdorues`
--
ALTER TABLE `perdorues`
  MODIFY `perdorues_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Detyrimet për tabelat e hedhura
--

--
-- Detyrimet për tabelën `perdorues`
--
ALTER TABLE `perdorues`
  ADD CONSTRAINT `perdorues_ibfk_1` FOREIGN KEY (`lloji_perdoruesit`) REFERENCES `lloj_perdoruesi` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
