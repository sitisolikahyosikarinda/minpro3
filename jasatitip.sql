-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 07:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasatitip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Karin', 'admin', 'karin', '082256791990', 'yosikarinda77@gmail.com', 'Jl.Pramuka gg.19 Blok B kos daisy');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(9, 'Beauty'),
(10, 'Hat'),
(11, 'Clothes'),
(12, 'Phone Accesories'),
(13, 'Accesoris');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `product_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `product_created`) VALUES
(11, 10, '[15 OFF] CATS ARE MY IDOL CAP worn by JAEMIN', 635000, 'Harga sudah bersih cargo tax\r\nETA 5-10 days arrived ID (terhitu dari close order batch ini)', 'produk1712204881.jpeg', 1, '2024-04-04 04:28:01'),
(12, 10, 'COPE KNIT BUCKET HAT worn by JISUNG ', 540000, 'Harga sudah bersih cargo tax\r\nETA 5-10 days arrived ID (terhitu dari close order batch ini)\r\n\r\n!!! ONE SIZE !!!\r\nlength 30-32cm, depth 22-24cm\r\n', 'produk1712205014.jpeg', 1, '2024-04-04 04:30:14'),
(13, 11, '[30% OFF] LOVE PUNK PIGMENT SWEATSHIRT worn by KIMING', 980000, 'Harga sudah bersih cargo tax\r\nETA 5-10 days arrived ID (terhitu dari close order batch ini)\r\n\r\nsize: S(sold) / M / L(sold) / XL', 'produk1712205157.jpeg', 1, '2024-04-04 04:32:37'),
(14, 11, '[20% OFF] WOOLTAN CHECK SHIRTS CREAM worn by DOYOUNG', 620000, 'Harga sudah bersih cargo tax\r\nETA 5-10 days arrived ID (terhitu dari close order batch ini)\r\nHarap chat wa admin lagi juka chat kamu belum dibalas selama 1x 24 jam \r\n\r\ndilarang spam, harga baeang yang tertera belum termasunk ongkir\r\n\r\nsize: 48(95) / 50(100) * size 48 udah besar banget!!', 'produk1712205309.png', 1, '2024-04-04 04:35:09'),
(15, 11, '[CAUPON SALE] LOVE CRYING CAT LS worn by JAEMIN', 835000, 'Harga sudah bersih cargo tax\r\nETA 5-10 days arrived ID (terhitu dari close order batch ini)\r\n\r\nSize: M / L', 'produk1712205401.jpeg', 1, '2024-04-04 04:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `uname_ig` varchar(50) DEFAULT 'None',
  `alamat` varchar(255) DEFAULT 'None',
  `no_telp` varchar(20) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
