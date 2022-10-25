-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Okt 25. 18:34
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `pizzazo`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `feltetek`
--

CREATE TABLE `feltetek` (
  `id` int(11) NOT NULL,
  `nev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `feltetek`
--

INSERT INTO `feltetek` (`id`, `nev`) VALUES
(7, 'Bacon'),
(4, 'Feta'),
(2, 'Gomba'),
(5, 'Kukorica'),
(3, 'Pepperoni'),
(1, 'Sonka'),
(6, 'Szalámi');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pizzak`
--

CREATE TABLE `pizzak` (
  `id` int(11) NOT NULL,
  `nev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `leiras` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `alap_id` int(11) NOT NULL,
  `kep` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pizza_alapok`
--

CREATE TABLE `pizza_alapok` (
  `id` int(11) NOT NULL,
  `nev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `pizza_alapok`
--

INSERT INTO `pizza_alapok` (`id`, `nev`) VALUES
(1, 'Paradicsomos'),
(2, 'Tejfölös');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pizza_feltetei`
--

CREATE TABLE `pizza_feltetei` (
  `id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `feltet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalonev` (`felhasznalonev`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `feltetek`
--
ALTER TABLE `feltetek`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nev` (`nev`);

--
-- A tábla indexei `pizzak`
--
ALTER TABLE `pizzak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nev` (`nev`),
  ADD KEY `alap_id` (`alap_id`);

--
-- A tábla indexei `pizza_alapok`
--
ALTER TABLE `pizza_alapok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nev` (`nev`);

--
-- A tábla indexei `pizza_feltetei`
--
ALTER TABLE `pizza_feltetei`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pizza_id__feltet_id` (`pizza_id`,`feltet_id`) USING BTREE,
  ADD KEY `feltet_id` (`feltet_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `feltetek`
--
ALTER TABLE `feltetek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `pizzak`
--
ALTER TABLE `pizzak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pizza_alapok`
--
ALTER TABLE `pizza_alapok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `pizza_feltetei`
--
ALTER TABLE `pizza_feltetei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `pizzak`
--
ALTER TABLE `pizzak`
  ADD CONSTRAINT `pizzak_ibfk_1` FOREIGN KEY (`alap_id`) REFERENCES `pizza_alapok` (`id`);

--
-- Megkötések a táblához `pizza_feltetei`
--
ALTER TABLE `pizza_feltetei`
  ADD CONSTRAINT `pizza_feltetei_ibfk_1` FOREIGN KEY (`feltet_id`) REFERENCES `feltetek` (`id`),
  ADD CONSTRAINT `pizza_feltetei_ibfk_2` FOREIGN KEY (`pizza_id`) REFERENCES `pizzak` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
