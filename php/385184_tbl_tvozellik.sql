-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Şub 2021, 11:42:11
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php_final`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `385184_tbl_tvozellik`
--

CREATE TABLE `385184_tbl_tvozellik` (
  `Id` int(11) NOT NULL,
  `TV_isletim_sistemi` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TV_Ekran_Boyutu` int(11) NOT NULL COMMENT 'cm',
  `TV_Cozunurluk_standardi` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TV_Ekran_Tipi` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `385184_tbl_tvozellik`
--

INSERT INTO `385184_tbl_tvozellik` (`Id`, `TV_isletim_sistemi`, `TV_Ekran_Boyutu`, `TV_Cozunurluk_standardi`, `TV_Ekran_Tipi`) VALUES
(6, 'Android', 160, 'Full HD (FHD)', 'Düz (Flat)'),
(7, 'Android', 99, 'HD Ready (HD)', 'Düz (Flat)'),
(8, 'Tizen', 102, 'Full HD (FHD)', 'Düz (Flat)');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `385184_tbl_tvozellik`
--
ALTER TABLE `385184_tbl_tvozellik`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `385184_tbl_tvozellik`
--
ALTER TABLE `385184_tbl_tvozellik`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
