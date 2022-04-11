-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 11:45 AM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stagesite`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestanden`
--

CREATE TABLE `bestanden` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `upload_datum` datetime NOT NULL,
  `bestand_path` varchar(200) NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `bestand_omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `bestanden`
--

INSERT INTO `bestanden` (`id`, `naam`, `upload_datum`, `bestand_path`, `uploader_id`, `bestand_omschrijving`) VALUES
(61, '8054-test.docx', '2022-03-29 02:06:29', '/mvc_stagesite/uploads/', 1, 'dsadasd');

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) NOT NULL,
  `wachtwoord_hash` varchar(200) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL,
  `is_schoolmentor` tinyint(4) NOT NULL DEFAULT 0,
  `is_stagebegeleider` tinyint(4) NOT NULL DEFAULT 0,
  `is_praktijkbegeleider` tinyint(4) NOT NULL DEFAULT 0,
  `is_vertrouwenspersoon` tinyint(4) NOT NULL DEFAULT 0,
  `is_ouder` tinyint(4) NOT NULL DEFAULT 0,
  `is_schoolaccount` tinyint(4) NOT NULL DEFAULT 0,
  `schoolnaam` varchar(100) DEFAULT NULL,
  `studie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `wachtwoord_hash`, `email`, `telefoonnummer`, `is_schoolmentor`, `is_stagebegeleider`, `is_praktijkbegeleider`, `is_vertrouwenspersoon`, `is_ouder`, `is_schoolaccount`, `schoolnaam`, `studie`) VALUES
(1, 'admin', NULL, 'admin', '$2y$10$3Xw6VuhBgDtD8viQYa7NvuvBHAR00xS3Ye6cz.jmXK1rNZz5t7hI6', 'admin@admin.com', '06 12345678', 1, 1, 1, 1, 1, 1, 'ICT Campus', NULL),
(7, 'Jouad', NULL, 'Jaba', '$2y$10$GLu.pP8Rzx16sQChucSU..4kSHIUlxny9F1DYeSrYVu8Q0tThPspK', 'jouadjaba3@gmail.com', '06 12335678', 0, 0, 0, 0, 0, 0, 'ICT Campus', 'Applicatie ontwikkeling'),
(8, 'DocentJouad', NULL, 'DocentJouad', '$2y$10$GLu.pP8Rzx16sQChucSU..4kSHIUlxny9F1DYeSrYVu8Q0tThPspK', 'docentjouad@hotmail.com', '06 12345578', 1, 0, 0, 0, 0, 0, 'ICT Campus', NULL),
(9, 'Dennis', NULL, 'Renkema', '$2y$10$GLu.pP8Rzx16sQChucSU..4kSHIUlxny9F1DYeSrYVu8Q0tThPspK', 'stennizmusic@gmail.com', '06 12345687', 0, 1, 0, 0, 0, 0, NULL, NULL),
(10, 'Layla', '', 'Haarbosch', '$2y$10$HN46POieaEriAO.sm8BYG.uwwhcfIqtzucOcJOWucJKLLCv/bByFm', 'foo@layla.nl', '06 123456878', 0, 0, 0, 0, 0, 0, 'ICT Campus', 'Applicatie ontwikkeling');

-- --------------------------------------------------------

--
-- Table structure for table `logboek`
--

CREATE TABLE `logboek` (
  `id` int(11) NOT NULL,
  `aantal_uren` int(11) NOT NULL DEFAULT 0,
  `aantal_uren_ingediend` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `logboek`
--

INSERT INTO `logboek` (`id`, `aantal_uren`, `aantal_uren_ingediend`) VALUES
(1, 0, 0),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(6, 0, 0),
(7, 0, 0),
(8, 0, 0),
(9, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logboek_dagen`
--

CREATE TABLE `logboek_dagen` (
  `id` int(11) NOT NULL,
  `logboek_id` int(11) NOT NULL,
  `dag` datetime NOT NULL,
  `beschrijving_werkzaamheden` varchar(45) NOT NULL,
  `uur_gewerkt` varchar(45) NOT NULL,
  `ingediend` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `stagiair_id` int(11) NOT NULL,
  `stage_bedrijven_id` int(11) NOT NULL,
  `aantal_uren_nodig` int(11) NOT NULL,
  `aantal_uren_goedgekeurd` int(11) NOT NULL,
  `start_datum` date NOT NULL,
  `eind_datum` date NOT NULL,
  `is_afgerond` tinyint(4) NOT NULL DEFAULT 0,
  `stagebegeleider_id` int(11) NOT NULL,
  `schoolmentor_id` int(11) NOT NULL,
  `praktijkbegeleider_stage_id` int(11) NOT NULL,
  `ouder_id` int(11) NOT NULL,
  `vertrouwenspersoon_id` int(11) DEFAULT NULL,
  `schoolaccount_id` int(11) NOT NULL,
  `logboek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `stagiair_id`, `stage_bedrijven_id`, `aantal_uren_nodig`, `aantal_uren_goedgekeurd`, `start_datum`, `eind_datum`, `is_afgerond`, `stagebegeleider_id`, `schoolmentor_id`, `praktijkbegeleider_stage_id`, `ouder_id`, `vertrouwenspersoon_id`, `schoolaccount_id`, `logboek_id`) VALUES
(6, 7, 1, 680, 0, '2022-04-06', '2022-04-08', 0, 1, 1, 1, 1, 1, 1, 1),
(12, 7, 1, 0, 0, '0000-00-00', '0000-00-00', 0, 1, 1, 1, 1, 1, 1, 7),
(13, 7, 1, 0, 0, '0000-00-00', '0000-00-00', 0, 1, 1, 1, 1, 1, 1, 8),
(14, 10, 1, 0, 0, '0000-00-00', '0000-00-00', 0, 1, 1, 1, 1, 1, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `stage_bedrijven`
--

CREATE TABLE `stage_bedrijven` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `locatie` varchar(45) NOT NULL,
  `url_website` varchar(200) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `stage_bedrijven`
--

INSERT INTO `stage_bedrijven` (`id`, `naam`, `locatie`, `url_website`, `email`, `telefoonnummer`) VALUES
(1, 'Stenniz Music', 'Utrecht', 'stenniz.nl', 'stennizmusic@gmail.com', '0612345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestanden`
--
ALTER TABLE `bestanden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bestanden_gebruikers1_idx` (`uploader_id`);

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `logboek`
--
ALTER TABLE `logboek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logboek_dagen`
--
ALTER TABLE `logboek_dagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logboek_dagen_logboek1_idx` (`logboek_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gebruikers_has_stage_bedrijven_stage_bedrijven1_idx` (`stage_bedrijven_id`),
  ADD KEY `fk_gebruikers_has_stage_bedrijven_gebruikers_idx` (`stagiair_id`),
  ADD KEY `fk_stages_gebruikers1_idx` (`stagebegeleider_id`),
  ADD KEY `fk_stages_gebruikers3_idx` (`praktijkbegeleider_stage_id`),
  ADD KEY `fk_stages_logboek1_idx` (`logboek_id`),
  ADD KEY `fk_stages_gebruikers4` (`schoolaccount_id`) USING BTREE,
  ADD KEY `fk_stages_gebruikers2_idx` (`schoolmentor_id`) USING BTREE,
  ADD KEY `fk_stages_ouder` (`ouder_id`),
  ADD KEY `fk_stages_vertrouwenspersoon` (`vertrouwenspersoon_id`);

--
-- Indexes for table `stage_bedrijven`
--
ALTER TABLE `stage_bedrijven`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestanden`
--
ALTER TABLE `bestanden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logboek`
--
ALTER TABLE `logboek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logboek_dagen`
--
ALTER TABLE `logboek_dagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stage_bedrijven`
--
ALTER TABLE `stage_bedrijven`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestanden`
--
ALTER TABLE `bestanden`
  ADD CONSTRAINT `fk_bestanden_gebruikers1` FOREIGN KEY (`uploader_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logboek_dagen`
--
ALTER TABLE `logboek_dagen`
  ADD CONSTRAINT `fk_logboek_dagen_logboek1` FOREIGN KEY (`logboek_id`) REFERENCES `logboek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `fk_gebruikers_has_stage_bedrijven_gebruikers` FOREIGN KEY (`stagiair_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gebruikers_has_stage_bedrijven_stage_bedrijven1` FOREIGN KEY (`stage_bedrijven_id`) REFERENCES `stage_bedrijven` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_gebruikers1` FOREIGN KEY (`stagebegeleider_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_gebruikers2` FOREIGN KEY (`schoolmentor_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_gebruikers3` FOREIGN KEY (`praktijkbegeleider_stage_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_gebruikers4` FOREIGN KEY (`schoolaccount_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_logboek1` FOREIGN KEY (`logboek_id`) REFERENCES `logboek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_ouder` FOREIGN KEY (`ouder_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_vertrouwenspersoon` FOREIGN KEY (`vertrouwenspersoon_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
