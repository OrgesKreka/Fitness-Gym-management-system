-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2017 at 06:50 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ditet`
--

CREATE TABLE `ditet` (
  `dita_id` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fjale_kerkimi`
--

CREATE TABLE `fjale_kerkimi` (
  `id` int(11) NOT NULL,
  `fjala` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fjale_kerkimi`
--

INSERT INTO `fjale_kerkimi` (`id`, `fjala`, `link`) VALUES
(1, 'vegla', 'http:/localhost/palestra');

-- --------------------------------------------------------

--
-- Table structure for table `kurse`
--

CREATE TABLE `kurse` (
  `kurs_id` int(10) UNSIGNED NOT NULL,
  `lloji_kursit` varchar(255) NOT NULL,
  `nr_personave` int(11) NOT NULL,
  `data_fillimit` date NOT NULL,
  `data_mbarimit` date NOT NULL,
  `cmimi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurse`
--

INSERT INTO `kurse` (`kurs_id`, `lloji_kursit`, `nr_personave`, `data_fillimit`, `data_mbarimit`, `cmimi`) VALUES
(2, 'joga', 5, '2017-01-18', '2017-01-28', 5800),
(3, 'aerobi', 12, '2017-01-01', '2017-02-28', 2500),
(4, 'fitnes', 25, '2016-11-01', '2017-05-31', 2800),
(5, 'Kurs_Shembull', 5, '2017-01-31', '2017-05-31', 200);

-- --------------------------------------------------------

--
-- Table structure for table `lloj_perdoruesi`
--

CREATE TABLE `lloj_perdoruesi` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Pershkrimi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lloj_perdoruesi`
--

INSERT INTO `lloj_perdoruesi` (`ID`, `Pershkrimi`) VALUES
(1, 'Admin1'),
(2, 'Instruktor i Fitness'),
(3, 'Perdorues');

-- --------------------------------------------------------

--
-- Table structure for table `menaxhon`
--

CREATE TABLE `menaxhon` (
  `id` int(11) NOT NULL,
  `instruktor_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menaxhon`
--

INSERT INTO `menaxhon` (`id`, `instruktor_id`, `kurs_id`) VALUES
(1, 8, 2),
(4, 8, 3),
(5, 9, 4),
(6, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ndjek_kurse`
--

CREATE TABLE `ndjek_kurse` (
  `id` int(11) NOT NULL,
  `antar_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ndjek_kurse`
--

INSERT INTO `ndjek_kurse` (`id`, `antar_id`, `kurs_id`) VALUES
(1, 11, 1),
(2, 13, 1),
(3, 11, 5),
(4, 12, 5),
(5, 13, 5),
(6, 14, 5),
(7, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `oraret`
--

CREATE TABLE `oraret` (
  `orar_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `dita_id` int(11) NOT NULL,
  `ora_fillimit` time NOT NULL,
  `ora_perfundimit` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pagesat`
--

CREATE TABLE `pagesat` (
  `pagesa_id` int(11) NOT NULL,
  `shuma` float NOT NULL,
  `anetar_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `data_pageses` date NOT NULL,
  `pagesa_fundit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perdorues`
--

CREATE TABLE `perdorues` (
  `lloji_perdoruesit` int(11) UNSIGNED NOT NULL,
  `perdorues_id` bigint(11) UNSIGNED NOT NULL,
  `emri` varchar(50) NOT NULL,
  `mbiemri` varchar(50) NOT NULL,
  `gjinia` enum('F','M') NOT NULL,
  `nr_telefoni` int(15) NOT NULL,
  `ndertimi_trupit` varchar(12) DEFAULT NULL,
  `adresa` varchar(50) DEFAULT NULL,
  `profesioni` varchar(50) DEFAULT NULL,
  `foto_profili` text,
  `email` varchar(50) NOT NULL,
  `fjalekalim` varchar(50) NOT NULL,
  `pesha` float DEFAULT NULL,
  `gjatesia` int(11) DEFAULT NULL,
  `imt` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perdorues`
--

INSERT INTO `perdorues` (`lloji_perdoruesit`, `perdorues_id`, `emri`, `mbiemri`, `gjinia`, `nr_telefoni`, `ndertimi_trupit`, `adresa`, `profesioni`, `foto_profili`, `email`, `fjalekalim`, `pesha`, `gjatesia`, `imt`) VALUES
(1, 1, 'Nderim', 'Kurti', 'M', 686485341, 'Ectomorph', 'Rr Vilson Blloshmi', 'student', '', 'nderimikurti@gmail.com', 'nderim1', 60, 170, 2.00),
(1, 2, 'Amarildo', 'Kondi', 'M', 686999321, 'Mesomorph', 'Kinostudio', 'student', '', 'AKondi@gmail.com', 'milan', 75, 180, 3.00),
(1, 3, 'Bora', 'Bejleri', 'F', 687483647, '', '', 'studente', 'https://raw.githubusercontent.com/OrgesKreka/Fitness-Gym-management-system/master/PalestraX/admin/te_tjera/imazhe_profili/leavit.png', 'BBejleri@gmail.com', 'gangsta', 60, 170, 2.00),
(1, 4, 'Nerjada', 'Mucaj', 'F', 687177711, '', '', 'studente', '', 'NMucaj@gmail.com', 'nerjada1', 65, 175, 3.00),
(1, 5, 'Orges', 'Kreka', 'M', 0, '', '', 'student', 'https://raw.githubusercontent.com/OrgesKreka/Fitness-Gym-management-system/master/PalestraX/admin/te_tjera/imazhe_profili/faraday.jpg', 'OKreka@gmail.com', 'Orges1', 0, 0, 2.00),
(1, 6, 'Redisa', 'Shehaj', 'F', 0, '', '', 'studente', '', 'RShehaj@gmail.com', 'Redisa1', 0, 0, 2.00),
(2, 8, 'Behxhet', 'Pacolli', 'M', 681122333, 'Mesomorph', 'Prizren', 'guru', '', 'BehxhetPacolli@gmail.com', 'danoc', 80, 173, 3.00),
(2, 9, 'Xhanfize', 'Keko', 'F', 689999969, 'Endomorph', 'Rr Sadik Petrela', 'balerine', '', 'xhanfizekeka@gmail.com', 'xhanexhane', 100, 160, 3.00),
(3, 11, 'Andi', 'Caku', 'M', 0, '', '', 'financier', '', 'ACaku@gmail.com', 'Andi1', 0, 0, 3.00),
(3, 12, 'Linda', 'Gjoni', 'F', 0, '', '', 'aktore', '', 'LGjoni@gmail.com', 'Linda1', 0, 0, 2.00),
(3, 13, 'Mondi', 'Lusha', 'M', 0, '', '', 'skifter', '', 'MLusha@gmail.com', 'Mondi1', 0, 0, 3.00),
(3, 14, 'Poni', 'Cipa', 'F', 0, '', '', 'kengetare', '', 'PCipa@gmail.com', 'Poni1', 0, 0, 2.00),
(3, 16, 'Prove', 'Kot', 'M', 123456789, '1', NULL, NULL, '', 'prove@kot.com', '1234', 85, 175, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programet`
--

CREATE TABLE `programet` (
  `program_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `programi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ditet`
--
ALTER TABLE `ditet`
  ADD PRIMARY KEY (`dita_id`);

--
-- Indexes for table `fjale_kerkimi`
--
ALTER TABLE `fjale_kerkimi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurse`
--
ALTER TABLE `kurse`
  ADD PRIMARY KEY (`kurs_id`);

--
-- Indexes for table `lloj_perdoruesi`
--
ALTER TABLE `lloj_perdoruesi`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `menaxhon`
--
ALTER TABLE `menaxhon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ndjek_kurse`
--
ALTER TABLE `ndjek_kurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oraret`
--
ALTER TABLE `oraret`
  ADD PRIMARY KEY (`orar_id`);

--
-- Indexes for table `pagesat`
--
ALTER TABLE `pagesat`
  ADD PRIMARY KEY (`pagesa_id`);

--
-- Indexes for table `perdorues`
--
ALTER TABLE `perdorues`
  ADD PRIMARY KEY (`perdorues_id`);

--
-- Indexes for table `programet`
--
ALTER TABLE `programet`
  ADD PRIMARY KEY (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ditet`
--
ALTER TABLE `ditet`
  MODIFY `dita_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fjale_kerkimi`
--
ALTER TABLE `fjale_kerkimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kurse`
--
ALTER TABLE `kurse`
  MODIFY `kurs_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lloj_perdoruesi`
--
ALTER TABLE `lloj_perdoruesi`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menaxhon`
--
ALTER TABLE `menaxhon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ndjek_kurse`
--
ALTER TABLE `ndjek_kurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `oraret`
--
ALTER TABLE `oraret`
  MODIFY `orar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagesat`
--
ALTER TABLE `pagesat`
  MODIFY `pagesa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perdorues`
--
ALTER TABLE `perdorues`
  MODIFY `perdorues_id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `programet`
--
ALTER TABLE `programet`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
