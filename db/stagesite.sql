-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 mrt 2022 om 14:11
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.1

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
-- Tabelstructuur voor tabel `bestanden`
--

CREATE TABLE `bestanden` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `upload_datum` datetime NOT NULL,
  `bestand_path` varchar(200) NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `bestand_omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `bestanden`
--

INSERT INTO `bestanden` (`id`, `naam`, `upload_datum`, `bestand_path`, `uploader_id`, `bestand_omschrijving`) VALUES
(61, '8054-test.docx', '2022-03-29 02:06:29', '/mvc_stagesite/uploads/', 1, 'dsadasd');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) NOT NULL,
  `wachtwoord_hash` varchar(200) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL,
  `is_docent` tinyint(4) NOT NULL DEFAULT 0,
  `is_persoon_stage` tinyint(4) NOT NULL DEFAULT 0,
  `schoolnaam` varchar(100) DEFAULT NULL,
  `studie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `wachtwoord_hash`, `email`, `telefoonnummer`, `is_docent`, `is_persoon_stage`, `schoolnaam`, `studie`) VALUES
(1, 'admin', NULL, 'admin', '$2y$10$3Xw6VuhBgDtD8viQYa7NvuvBHAR00xS3Ye6cz.jmXK1rNZz5t7hI6', 'admin@admin.com', '06 12345678', 1, 1, '', NULL),
(7, 'Jouad', NULL, 'Jaba', '$2y$10$GLu.pP8Rzx16sQChucSU..4kSHIUlxny9F1DYeSrYVu8Q0tThPspK', 'jouadjaba3@gmail.com', '06 12335678', 0, 0, 'ICT Campus', 'Applicatie ontwikkeling'),
(8, 'DocentJouad', NULL, 'DocentJouad', '$2y$10$GLu.pP8Rzx16sQChucSU..4kSHIUlxny9F1DYeSrYVu8Q0tThPspK', 'docentjouad@hotmail.com', '06 12345578', 1, 0, 'ICT Campus', NULL),
(9, 'Dennis', NULL, 'Renkema', '$2y$10$GLu.pP8Rzx16sQChucSU..4kSHIUlxny9F1DYeSrYVu8Q0tThPspK', 'stennizmusic@gmail.com', '06 12345687', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `logboek`
--

CREATE TABLE `logboek` (
  `id` int(11) NOT NULL,
  `aantal_uren` int(11) NOT NULL DEFAULT 0,
  `aantal_uren_ingediend` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `logboek_dagen`
--

CREATE TABLE `logboek_dagen` (
  `id` int(11) NOT NULL,
  `logboek_id` int(11) NOT NULL,
  `dag` datetime NOT NULL,
  `beschrijving_werkzaamheden` varchar(45) NOT NULL,
  `uur_gewerkt` varchar(45) NOT NULL,
  `ingediend` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stages`
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
  `contactpersoon_stage_id` int(11) NOT NULL,
  `praktijkbegeleider_stage_id` int(11) NOT NULL,
  `logboek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stage_bedrijven`
--

CREATE TABLE `stage_bedrijven` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `locatie` varchar(45) NOT NULL,
  `url_website` varchar(200) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestanden`
--
ALTER TABLE `bestanden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bestanden_gebruikers1_idx` (`uploader_id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexen voor tabel `logboek`
--
ALTER TABLE `logboek`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `logboek_dagen`
--
ALTER TABLE `logboek_dagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logboek_dagen_logboek1_idx` (`logboek_id`);

--
-- Indexen voor tabel `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gebruikers_has_stage_bedrijven_stage_bedrijven1_idx` (`stage_bedrijven_id`),
  ADD KEY `fk_gebruikers_has_stage_bedrijven_gebruikers_idx` (`stagiair_id`),
  ADD KEY `fk_stages_gebruikers1_idx` (`stagebegeleider_id`),
  ADD KEY `fk_stages_gebruikers2_idx` (`contactpersoon_stage_id`),
  ADD KEY `fk_stages_gebruikers3_idx` (`praktijkbegeleider_stage_id`),
  ADD KEY `fk_stages_logboek1_idx` (`logboek_id`);

--
-- Indexen voor tabel `stage_bedrijven`
--
ALTER TABLE `stage_bedrijven`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestanden`
--
ALTER TABLE `bestanden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `logboek`
--
ALTER TABLE `logboek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `logboek_dagen`
--
ALTER TABLE `logboek_dagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `stage_bedrijven`
--
ALTER TABLE `stage_bedrijven`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestanden`
--
ALTER TABLE `bestanden`
  ADD CONSTRAINT `fk_bestanden_gebruikers1` FOREIGN KEY (`uploader_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `logboek_dagen`
--
ALTER TABLE `logboek_dagen`
  ADD CONSTRAINT `fk_logboek_dagen_logboek1` FOREIGN KEY (`logboek_id`) REFERENCES `logboek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `fk_gebruikers_has_stage_bedrijven_gebruikers` FOREIGN KEY (`stagiair_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gebruikers_has_stage_bedrijven_stage_bedrijven1` FOREIGN KEY (`stage_bedrijven_id`) REFERENCES `stage_bedrijven` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_gebruikers1` FOREIGN KEY (`stagebegeleider_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_gebruikers2` FOREIGN KEY (`contactpersoon_stage_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_gebruikers3` FOREIGN KEY (`praktijkbegeleider_stage_id`) REFERENCES `gebruikers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stages_logboek1` FOREIGN KEY (`logboek_id`) REFERENCES `logboek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
