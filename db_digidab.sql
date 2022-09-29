-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 06:08 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_digidab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `stock_product` int(11) DEFAULT NULL,
  `cost_price` int(11) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `notes_product` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `id_user`, `name_product`, `stock_product`, `cost_price`, `selling_price`, `notes_product`) VALUES
(11, 6, 'Acer Aspire 12', 29, 8000000, 8350000, 'Best seller'),
(14, 4, 'Creambath Shampoo', 15, 35000, 50000, 'Highend product'),
(15, 4, 'Hair Dryer', 2, 300000, 340000, 'New packaging'),
(16, 4, 'Hair Polish - Red', 8, 35000, 40000, 'Not too red, but magenta'),
(24, 6, 'Charger Type C', 0, 22000, 25000, 'Dont now when the new stock'),
(25, 6, 'Roboto Power Bank', 1, 35000, 50000, 'New stock at 23 Feb 2022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `company_user` varchar(255) DEFAULT NULL,
  `location_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name_user`, `email_user`, `password_user`, `company_user`, `location_user`) VALUES
(1, 'Lia Widirti', 'auu.wdrti@gmail.com', '2b4499ed39042ca1e6b7f13fb3ee32da', 'Digi Store', 'Indonesia'),
(2, 'Ashqila', 'ashqila@gmail.com', '2b4499ed39042ca1e6b7f13fb3ee32da', 'Ashqila store', 'Indonesia'),
(3, 'Amelda', 'amelda@gmail.com', '2b4499ed39042ca1e6b7f13fb3ee32da', 'Amelda Boutique', 'Indonesia'),
(4, 'Cinta Sabila', 'cintasabila@gmail.com', 'd00e3f20e45afe273b209c0566736074', 'Salon Sabila', 'Indonesia'),
(5, 'Sandra Bahasyim', 'sbhasyim@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Toko Bahasyim', 'Indonesia'),
(6, 'Anas', 'nanas@gmail.com', 'a869c600c9fc943e1b79dd9594a02e76', 'Nanda Store', 'Indonesia'),
(7, 'lia', 'alia@gmail.com', '202cb962ac59075b964b07152d234b70', 'Amore', 'Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_PU` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `FK_PU` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
