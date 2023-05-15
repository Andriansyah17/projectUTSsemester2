-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 12:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alat_tulis`
--

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id` int(11) NOT NULL,
  `nama_merk` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id`, `nama_merk`) VALUES
(1, 'Sinar Dunia'),
(2, 'Joyko'),
(3, 'Stabilo'),
(4, 'Jotter');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `produk_id` int(45) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `produk_id`, `quantity`) VALUES
(1, '2023-05-01', 1, 2),
(2, '2023-05-02', 3, 1),
(3, '2023-05-03', 5, 3),
(4, '2023-05-05', 2, 1),
(5, '2023-05-07', 6, 2),
(6, '2023-05-08', 9, 1),
(7, '2023-05-09', 4, 4),
(8, '2023-05-12', 7, 3),
(9, '2023-05-13', 10, 2),
(10, '2023-05-14', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(45) NOT NULL,
  `merk_id` int(45) NOT NULL,
  `deskripsi` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `stok`, `harga`, `merk_id`, `deskripsi`, `img`) VALUES
(1, 'Buku Catatan', 50, 15000, 1, 'Buku catatan dari Sinar Dunia dengan kualitas yang baik dan ukuran yang pas untuk kebutuhan sehari-hari', 'buku-catatan.jpg'),
(2, 'Pensil 2B', 100, 5000, 1, 'Pensil 2B dengan kualitas terbaik dari Sinar Dunia. Cocok untuk kegiatan menulis sehari-hari atau untuk keperluan sekolah', 'pensil-2b.jpg'),
(3, 'Sticky Notes', 200, 10000, 1, 'Sticky notes dari Sinar Dunia yang praktis dan cocok digunakan untuk membuat catatan kecil atau menandai hal-hal penting pada dokumen atau buku', 'sticky-notes.jpg'),
(4, 'Penggaris 30cm', 75, 8000, 1, 'Penggaris 30cm dengan kualitas terbaik dari Sinar Dunia. Cocok digunakan untuk mengukur atau membuat garis pada kertas atau kain', 'penggaris-30cm.jpg'),
(5, 'Penghapus Karet', 150, 3000, 1, 'Penghapus karet dari Sinar Dunia yang lembut dan tidak merusak kertas saat digunakan. Cocok digunakan untuk menghapus kesalahan menulis', 'penghapus-karet.jpg'),
(6, 'Highlighter', 50, 8000, 2, 'Highlighter Joyko yang memberikan warna yang cerah dan tahan lama. Cocok digunakan untuk menyoroti bagian penting pada dokumen atau buku', 'highlighter.jpg'),
(7, 'Stapler Mini', 100, 12000, 2, 'Stapler mini dari Joyko yang praktis dan mudah digunakan. Cocok untuk keperluan kantor atau sekolah', 'stapler-mini.jpg'),
(8, 'Pensil Mekanik', 150, 15000, 2, 'Pensil mekanik Joyko dengan kualitas terbaik dan dilengkapi dengan penghapus. Cocok digunakan untuk keperluan menulis atau menggambar', 'pensil-mekanik.jpg'),
(9, 'Paper Clip', 200, 5000, 2, 'Paper clip dari Joyko yang praktis digunakan untuk menyatukan dokumen atau kertas. Tersedia dalam berbagai warna yang menarik', 'paper-clip.jpg'),
(10, 'Ruler Set', 75, 25000, 2, 'Set penggaris Joyko dengan berbagai ukuran yang cocok untuk keperluan menggambar atau membuat desain. Terbuat dari bahan yang kokoh dan tahan lama', 'ruler-set.jpg'),
(11, 'Highlighter Pastel', 100, 20000, 3, 'Highlighter dari Stabilo dengan warna pastel yang lembut dan menarik. Cocok digunakan untuk menyoroti bagian penting pada dokumen atau buku', 'highlighter-pastel.jpg'),
(12, 'Pensil Warna', 200, 30000, 3, 'Pensil warna dari Stabilo dengan berbagai pilihan warna yang cerah dan tahan lama. Cocok digunakan untuk keperluan menggambar atau mewarnai', 'pensil-warna.jpg'),
(13, 'Marker Pen', 150, 15000, 3, 'Marker pen dari Stabilo dengan tinta yang tahan lama dan tidak mudah luntur. Cocok digunakan untuk membuat garis atau menulis pada kertas atau kain', 'marker-pen.jpg'),
(14, 'Penghapus Pensil', 75, 5000, 3, 'Penghapus pensil dari Stabilo yang lembut dan tidak merusak kertas saat digunakan. Cocok digunakan untuk menghapus kesalahan menulis atau menggambar', 'penghapus-pensil.jpg'),
(15, 'Ballpoint Pen 828', 50, 15000, 3, 'Ballpoint pen dari Stabilo dengan tinta yang lancar dan memberikan garis yang tajam. Cocok digunakan untuk keperluan menulis sehari-hari atau untuk keperluan sekolah', 'ballpoint-pen-828.jpg'),
(16, 'Buku Tulis Hardcover', 100, 35000, 4, 'Buku tulis dengan cover yang keras dari Jotter. Dilengkapi dengan kertas yang berkualitas dan cocok digunakan untuk catatan atau sketsa', 'buku-tulis-hardcover.jpg'),
(17, 'Pensil Teknik', 150, 10000, 4, 'Pensil teknik dari Jotter dengan kualitas yang baik dan dilengkapi dengan penghapus. Cocok digunakan untuk keperluan menggambar teknis atau desain', 'pensil-teknik.jpg'),
(18, 'Stapler Jumbo', 75, 25000, 4, 'Stapler jumbo dari Jotter yang cocok untuk keperluan kantor atau sekolah. Dilengkapi dengan kapasitas yang besar sehingga tidak perlu sering-sering diisi ulang', 'stapler-jumbo.jpg'),
(19, 'Pen Marker', 200, 12000, 4, 'Pen marker dari Jotter dengan tinta yang tahan lama dan menghasilkan garis yang tajam. Cocok digunakan untuk menulis atau membuat garis pada kertas atau kain', 'pen-marker.jpg'),
(20, 'Binder Clip', 50, 8000, 4, 'Binder clip dari Jotter yang praktis dan mudah digunakan untuk menyatukan dokumen atau kertas. Tersedia dalam berbagai ukuran yang dapat disesuaikan dengan kebutuhan', 'binder-clip.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesanan_1` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk1` (`merk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk1` FOREIGN KEY (`merk_id`) REFERENCES `merk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
