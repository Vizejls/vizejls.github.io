-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 03:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marcomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`) VALUES
(1, 'Gaming'),
(2, 'Editing'),
(4, 'School');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text NOT NULL,
  `stok` enum('Habis','Tersedia') DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `kategori_id`, `jenis_id`, `nama`, `harga`, `foto`, `detail`, `stok`) VALUES
(9, 3, 4, 'Infinix Inbook X1', 6500000, 'E9q1k1GmsvvBf5IUCCvQ.png', 'Intel® Core™ i3-1005G1\r\nIntel® UHD Graphics\r\n14&quot; IPS 100% sRGB\r\n8 GB DDR4-3200 MHz\r\n256 GB SSD M.2 NVMe PCIe\r\n55 Whr\r\nWindows 10 Home', 'Tersedia'),
(10, 3, 2, 'Asus Zenbook 14', 16299000, 'zPrTZqZua1dAesDRaEga.png', 'Intel® Core ™ i5-1135G7\r\nIntel® IrisXe 80EU Graphics\r\n8GB LPDDR4X\r\n1TB PCIe SSD\r\n14” Full HD (1920 x 1080), 16:9, IPS-level Panel, Anti-glare display, LED Backlit, 400nits, sRGB: 100%, Screen-to-body ratio: 92 ％\r\nWindows 10 Home + OHS 2019 (Office Home &amp; Student)', 'Tersedia'),
(11, 3, 2, 'Dell XPS 13', 34499000, 'mAFFp1ZZII7u1CzrT9xP.png', 'Intel® Core™ i5-1135G7, 8 MB Cache, 4 Core, up to 4.20 GHz\r\nIntel® Iris® Xe Graphics\r\n13.4-inch UHD+ (3840 x 2400), 60 Hz, anti-reflective, touch, InfinityEdge, 90% DCI-P3 typical, 500 nits, wide-viewing angle\r\n16 GB, LPDDR4x, 4267 MHz, memory onboard\r\n512 GB, M.2 2280, PCIe NVMe Gen3 x4, SSD\r\nWindows 11 Pro 64-bit\r\nOffice Home Student 2021', 'Tersedia'),
(12, 3, 4, 'Realmebook', 9299000, 'Za3rxXXSp8azJdqFnO2g.png', 'Intel® Core™ i3-1115G4 Dual-core quad-thread\r\nIntel® UHD Graphics\r\n14&quot; IPS 100% sRGB 2K Full Vision Display\r\n8GB Dual channel LPDDR4x RAM\r\n256GB PCIe SSD\r\n54Wh\r\nWindows 10 Home Pre-installed\r\nFree The Office (2019) 365 Trial Version home Dan Student ', 'Tersedia'),
(13, 3, 1, 'HP Pavilion Gaming 15', 15999000, 'Gp76Oe1hb9tw0Da4pT5d.png', '10th Gen Intel Core i5-10300H\r\nIntel® UHD Graphics, Nvidia GeForce RTX 2060 6 GB\r\n15.6&quot; diagonal FHD, 144 Hz, IPS, anti-glare, micro-edge, WLED-backlit, 250 nits, 45% NTSC\r\n8 GB DDR4-2933 SDRAM (1 x 8 GB)\r\n512 GB PCIe® NVMe™ M.2 SSD\r\n52.5 Wh Li-ion\r\nWindows 10 Home (64-bit) + Office Home and Student Pre-Installed', 'Tersedia'),
(18, 3, 2, 'Acer Nitro 5', 13999000, 'p452RFAexWlXI92r9RQl.png', 'Intel Core™ i5 11400H\r\nNVIDIA GeForce® RTX™ 3050 4GB of GDDR6\r\n15.6&quot; FHD LED IPS 144Hz\r\n8GB DDR4 \r\n512GB SSD NVMe\r\nDTS® X:Ultra Audio, featuring optimized Bass, Loudness, Speaker Protection with up to 6 custom content modes by smart amplifier\r\nWindows 11 Home + OHS21', 'Tersedia'),
(19, 3, 2, 'Acer Swift 3', 12499000, '6tl2bhD6ua23HzLsJw9J.png', 'Intel® Core™ i5-1135G7\r\nIntel Iris Xe Graphics (80 EU)\r\n16 GB of LPDDR4X Dual Channel\r\n512 GB SSD PCIe Gen4 NVMe\r\n14&quot; IPS, Full HD (1920 x 1080), high-brightness (300nits) Acer ComfyView™ LED-backlit TFT LCD, 100% sRGB\r\nWindows 11 Home', 'Tersedia'),
(20, 3, 1, 'Lenovo Legion 5', 18799000, '6f54bFUti0nVO4LrCQqS.png', 'AMD Ryzen 7 5800H\r\nNVIDIA GeForce RTX 3050 Ti 4GB GDDR6\r\n2x 8GB SO-DIMM DDR4-3200\r\n512GB SSD M.2 2280 PCIe 3.0x4 NVMe\r\n15.6&quot; FHD (1920x1080) IPS 300nits Anti-glare, 165Hz, 100% sRGB, Dolby Vision, Free-Sync, G-Sync, DC dimmer\r\nBattery Integrated 80Wh\r\nWindows 10 Home 64, English\r\nOffice Home and Student 2019', 'Tersedia'),
(21, 4, 1, 'Fantech AC3001', 85000, 'xhieRlJeo4hz4mS0lEUg.jpg', '                    Headset Stand TOWER                     \r\nMaterial : Plastik\r\nAnti Slip Rubber Base\r\nbuild in 88g counter weight                                ', 'Tersedia'),
(22, 4, 1, 'Fantech HG 11', 369000, 'Ue6WnVXzE1tCusudlgCO.png', 'Headset Gaming CAPTAIN 7.1 HG11\r\nVirtual 7.1 Surround Sound dengan software (download di www.fantech.id)\r\n50mm Driver Speaker\r\nMetal Headband\r\nNoise Cancelling Microphone\r\nRemovable Earcup\r\nKabel super tebal 1.8meter\r\nUSB Plug', 'Tersedia'),
(23, 4, 1, 'Logitech G102', 379000, 'aBxNLaXq2di8ZZ8IFnUz.png', '                    Logitech G102 Prodigy Mouse\r\nOnboard memory: 1 profil\r\nLIGHTSYNC RGB: 1 zona\r\nKabel tidak berpilin\r\nSistem Pengencangan Tombol Mekanik\r\nWindows® 7 atau versi terbaru\r\nmacOS® 10.11 atau versi terbaru\r\nChrome OSTM\r\nPort USB\r\nAkses internet untuk Logitech G HUB (opsional)                ', 'Tersedia'),
(24, 4, 1, 'Logitech G213', 949000, '9aXFeXos5rcSrD7v8Aw0.png', '                    Logitech G213 Prodigy Keyboard\r\nWindows® 7 atau versi terbaru\r\nPort USB\r\n(Opsional) Koneksi Internet untuk Logitech G HUB1P\r\nJenis Koneksi: USB 2.0\r\nProtokol USB: USB 2.0\r\nKecepatan USB: Full Speed\r\nLampu Indikator (LED): Ada\r\nCahaya Latar: RGB (5 Zona)\r\nPanjang Kabel (Daya/Pengisian): 1,8 M                ', 'Tersedia'),
(25, 11, 4, 'Lenovo C225', 4800000, '4TqLIfGwL7SL8IduHWZJ.png', 'AMD E350 / 1.65 GHz\r\n2 GB DDR3\r\n500GB HDD\r\n18.5&#039;&#039; WXGA\r\nIntel HD Grapics 2000\r\n', 'Tersedia'),
(26, 11, 4, 'Dell Vostro 3888', 9149000, 'aWtGft0SInWLibGbw2x5.png', 'Dell Monitor E2016HV, 19.5&quot; HD+ Res (1600 x 900) Widescreen LED Monitor\r\nIntel® Core™ i3-10100 Processor (Cache 6 MB, up to 4,30 GHz)\r\nIntel® UHD Graphics 630\r\n4GB DDR4 2666 MHz\r\n1TB HDD SATA 3.5&quot; 7200 rpm\r\nMicrosoft® Windows® 10 SL (English) 64 Bit\r\nMicrosoft® Office® Home and Student 2019', 'Tersedia'),
(27, 11, 1, 'IPASON Desktops PC', 15960000, '9S6bqgsjKvD5A4YxV9uD.jpg', '                                                            AMD RYZEN 5 5600X\r\nColorful GeForce GTX165\r\nCOOLMASTER VTG B240\r\nB550M AORUS ELITE\r\nCORSAIR CMW 16GB 3000 (RGB-PRO)\r\nWD SN750 500GB M2\r\nSEGOTEP (BLACK)\r\nCOOLMASTER BRONZE 750 W\r\nHUNTKEY 12 CM X 6PCS                                                ', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(3, 'Laptop'),
(4, 'Aksesoris'),
(11, 'PC/Desktops');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'MarComp', '$2a$12$A5C8FAA8Fa1Af/MorWljyO2FQ6PGUU9n13woIsPRMj3NMYKGAqLBq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_katalog` (`kategori_id`),
  ADD KEY `jenis_katalog` (`jenis_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `katalog`
--
ALTER TABLE `katalog`
  ADD CONSTRAINT `jenis_katalog` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `kategori_katalog` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
