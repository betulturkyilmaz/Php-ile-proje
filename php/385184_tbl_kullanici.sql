-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Tem 2022, 11:32:41
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

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
-- Tablo için tablo yapısı `385184_tbl_kullanici`
--

CREATE TABLE `385184_tbl_kullanici` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `eposta` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `aktif_mi` int(11) NOT NULL DEFAULT 0,
  `aktivasyon` varchar(1000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `foto` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `385184_tbl_kullanici`
--

INSERT INTO `385184_tbl_kullanici` (`id`, `ad_soyad`, `eposta`, `sifre`, `aktif_mi`, `aktivasyon`, `foto`) VALUES
(63, 'betül türkyılmaz', 'Dersodev53@gmail.com', '123456', 1, '59be16bf0f74b09676096393b3791b683efd3bb5f083fd88c9912ef8c017cab8', 'yuklenenler/televizyon3.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `385184_tbl_kullanici`
--
ALTER TABLE `385184_tbl_kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `385184_tbl_kullanici`
--
ALTER TABLE `385184_tbl_kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
