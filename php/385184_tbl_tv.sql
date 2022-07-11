-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Şub 2021, 11:41:52
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
-- Tablo için tablo yapısı `385184_tbl_tv`
--

CREATE TABLE `385184_tbl_tv` (
  `Id` int(11) NOT NULL,
  `TV_Marka` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TV_Model` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TV_Fiyat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `385184_tbl_tv`
--

INSERT INTO `385184_tbl_tv` (`Id`, `TV_Marka`, `TV_Model`, `TV_Fiyat`) VALUES
(18, 'Telefunken', 'R0315', 5000),
(19, 'Regal', '39R653H', 368100),
(20, 'Samsung', '40T5300 ', 300000);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `385184_tbl_tv`
--
ALTER TABLE `385184_tbl_tv`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `385184_tbl_tv`
--
ALTER TABLE `385184_tbl_tv`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
