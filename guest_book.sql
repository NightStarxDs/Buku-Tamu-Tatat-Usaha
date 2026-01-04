-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2026 at 11:11 AM
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
-- Database: `guest_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `id_staf` int(11) NOT NULL,
  `staf_name` varchar(255) NOT NULL,
  `staf_email` varchar(255) NOT NULL,
  `staf_number` varchar(255) NOT NULL,
  `staf_unit` enum('dosen_informatika','dosen_manajemen','dosen_elektro','dosen_mesin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`id_staf`, `staf_name`, `staf_email`, `staf_number`, `staf_unit`) VALUES
(1, 'Adhitomo Wirawan, S.ST., M.BA', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_manajemen'),
(2, 'Aditya Wirangga Pratama, M.AB', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_manajemen'),
(3, 'Afriyanti Hasanah, S.S.T., M.Sc', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_manajemen'),
(4, 'Alfonsa Dian Sumarna, S.E., M.Si', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_manajemen'),
(5, 'Andi Erna Mulyana, S.T., M.Sc', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_manajemen'),
(6, 'Dwi Ely Kurniawan, S.Pd., M.Kom', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_informatika'),
(7, 'Evaliata Br. Sembiring, S.Kom., M.Cs', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_informatika'),
(8, 'Nur Zahrati Janah, S.Kom, M.Sc', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_informatika'),
(9, 'Swono Sibagariang, S.Kom., M.Kom', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_informatika'),
(10, 'Yeni Rokhayati, S.Si., M.Sc', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_informatika'),
(11, 'Abdullah Sani, S.ST, M.Sc', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_mesin'),
(12, 'Aditya Gautama Darmoyono, S.T., M.T.', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_elektro'),
(13, 'Adlian Jefiza, S.Pd., M.T.', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_elektro'),
(14, 'Ahmad Riyad Firdaus, S.Si., M.T., Ph.D', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_elektro'),
(15, 'Arif Febriansyah Juwito, S.T., M.Eng', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_elektro'),
(16, 'Adhe Aryswan, S.Pd., M.Si.', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_mesin'),
(17, 'Agustinus Herwien Gunawan', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_mesin'),
(18, 'Ananta Setiadi, S.T.', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_mesin'),
(19, 'Andrew W P Mantik, S.T', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_mesin'),
(20, 'Annisa Fyona, S.K.M., M.K.K.K', 'dwiagung0515@gmail.com', '+62895337342838', 'dosen_mesin');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_number` varchar(255) NOT NULL,
  `unit_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `unit_name`, `unit_number`, `unit_email`) VALUES
(1, 'Pusat Penjaminan Mutu (P4M)', '+62895337342838', 'dwiagung0515@gmail.com'),
(2, 'Penelitian & Pengabdian Masyarakat (P3M)', '+62895337342838', 'dwiagung0515@gmail.com'),
(3, 'Satuan Pengawas Internal (SPI)', '+62895337342838', 'dwiagung0515@gmail.com'),
(4, 'UPA Perpustakaan', '+62895337342838', 'dwiagung0515@gmail.com'),
(5, 'UPA Perbaikan & Perawatan', '+62895337342838', 'dwiagung0515@gmail.com'),
(6, 'UPA Teknologi Infomasi & Komunikasi', '+62895337342838', 'dwiagung0515@gmail.com'),
(7, 'Pengembangan Karir & Kewirausahaan', '+62895337342838', 'dwiagung0515@gmail.com'),
(8, 'Sub Bagian Akademik', '+62895337342838', 'dwiagung0515@gmail.com'),
(9, 'Kemahasiswaan', '+62895337342838', 'dwiagung0515@gmail.com'),
(10, 'Sub Bagian Umum', '+62895337342838', 'dwiagung0515@gmail.com'),
(11, 'Humas & Kerjasama', '+62895337342838', 'dwiagung0515@gmail.com'),
(12, 'BMN & Pengadaan', '+62895337342838', 'dwiagung0515@gmail.com'),
(13, 'Organisasi & SDM', '+62895337342838', 'dwiagung0515@gmail.com'),
(14, 'Keuangan', '+62895337342838', 'dwiagung0515@gmail.com'),
(15, 'Perencanaan', '+62895337342838', 'dwiagung0515@gmail.com'),
(16, 'Shilau', '+62895337342838', 'dwiagung0515@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `visit_data`
--

CREATE TABLE `visit_data` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `visit_regards` enum('Urusan_surat','Urusan_keuangan','Urusan_umum','Urusan_sarana','Janji_temu_unit','Janji_temu_staf') NOT NULL,
  `visit_desc` varchar(255) NOT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_staf` int(11) DEFAULT NULL,
  `visit_date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `status` enum('Pending','Done','Upcoming','Close','Now','Rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visit_data`
--

INSERT INTO `visit_data` (`id`, `guest_name`, `email`, `phone_number`, `company_name`, `visit_regards`, `visit_desc`, `id_unit`, `id_staf`, `visit_date`, `time_in`, `time_out`, `status`) VALUES
(1, 'Dwi Agung Willy Anto', 'dwiagung0515@gmail.com', '+62895337342838', 'Black Market', 'Urusan_surat', 'Mengurus Surat', NULL, NULL, '2026-11-22', '09:43:59', '09:49:17', 'Done'),
(2, 'Samuel Simorangkir', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_unit', 'Mengurus Kerja sama', 11, NULL, '2026-11-22', '12:49:11', '13:49:11', 'Done'),
(3, 'Nayla Azkyah Azra', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_staf', 'Konsultasi dengan Waldos aagahfpahfawhaohgaphwfaphwgahpfdhaspfhapshapgsh-awhgpwahfgpaihsgoahgawhawfhahfaphg0qw9tghq9ht-16etoifbabpaqwr1yt0ehfoHBOGR0111rfasgtqhSFAfgGs', NULL, 8, '2026-11-22', '09:38:57', '10:50:57', 'Done'),
(4, 'Fauzan Najib Ali', 'dwiagung0515@gmail.com', '+62895337342838', 'Polibatam', 'Janji_temu_unit', 'Menemui UPA Perpustakaan', 4, NULL, '2026-11-27', '12:24:40', '14:24:40', 'Done'),
(9, 'Berly Aditya Alfarizi', 'dwiagung0515@gmail.com', '+62895337342838', 'Polibatam', 'Janji_temu_staf', 'Bertemu Dosen Teknik Mesin', NULL, 14, '2026-12-05', '12:05:53', '00:00:00', ''),
(10, 'Arys Apriatna Ananda', 'dwiagung0515@gmail.com', '+62895337342838', 'Polibatam', 'Janji_temu_unit', 'Mengurus Surat PKM', 6, NULL, '2026-12-02', '10:34:17', '10:34:17', 'Done'),
(14, 'Zaky Fajar Permana', 'dwiagung0515@gmail.com', '+62895337342838', 'Polibatam', 'Janji_temu_unit', 'Mengurus Surat PKM', 6, NULL, '2026-12-08', '06:13:00', '06:15:00', 'Done'),
(15, 'Muhammad Safamal Jovanda', 'dwiagung0515@gmail.com', '+62895337342838', 'ITEBA', 'Urusan_surat', 'Mengurus Surat', NULL, NULL, '2026-02-08', '06:17:05', '06:21:05', 'Done'),
(16, 'Arief Han ZK', 'dwiagung0515@gmail.com', '+62895337342838', 'ITEBA', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-04-08', '06:18:01', '06:23:01', 'Done'),
(17, 'Rizky Ramadhani', 'dwiagung0515@gmail.com', '+62895337342838', 'ITEBA', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-04-08', '06:21:56', '06:24:56', 'Done'),
(18, 'Firman Kholiq', 'dwiagung0515@gmail.com', '+62895337342838', 'ITEBA', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-10-08', '06:21:56', '06:24:56', 'Done'),
(19, 'Dedeng Puji Atmoko', 'dwiagung0515@gmail.com', '+62895337342838', 'ITEBA', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-10-08', '06:21:56', '06:24:56', 'Done'),
(20, 'Muhammad Melvin Vernandez', 'dwiagung0515@gmail.com', '+62895337342838', 'Polibatam', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-09-08', '06:21:56', '06:24:56', 'Done'),
(21, 'Alfat Khomara', 'dwiagung0515@gmail.com', '+62895337342838', 'Unknow', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-08-08', '06:21:56', '06:24:56', 'Done'),
(22, 'Christh Valdo Aritonang', 'dwiagung0515@gmail.com', '+62895337342838', 'Polibatam', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-08-08', '06:21:56', '06:24:56', 'Done'),
(23, 'Arif Ifansyah', 'dwiagung0515@gmail.com', '+62895337342838', 'Unknow', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-08-08', '06:21:56', '06:24:56', 'Done'),
(24, 'Dimas Putra Pratama', 'dwiagung0515@gmail.com', '+62895337342838', 'Polibatam', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-07-10', '06:21:56', '06:24:56', 'Done'),
(25, 'M Davawin Cahyono', 'dwiagung0515@gmail.com', '+62895337342838', 'Polibatam', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-06-11', '06:21:56', '06:24:56', 'Done'),
(26, 'Kevin Febriano', 'dwiagung0515@gmail.com', '+62895337342838', 'Unknow', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-05-07', '06:21:56', '06:24:56', 'Done'),
(27, 'Muhammad Riswan', 'dwiagung0515@gmail.com', '+62895337342838', 'Uknow', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-03-11', '06:21:56', '06:24:56', 'Done'),
(28, 'Muhammad Febriyadi', 'dwiagung0515@gmail.com', '+62895337342838', 'Unknow', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-03-14', '06:21:56', '06:24:56', 'Done'),
(29, 'Taufiq Qurrohman', 'dwiagung0515@gmail.com', '+62895337342838', 'Unknow', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-02-05', '06:21:56', '06:24:56', 'Done'),
(30, 'Johan Fanizar', 'dwiagung0515@gmail.com', '+62895337342838', 'Uknow', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-01-01', '06:21:56', '06:24:56', 'Done'),
(31, 'Ilham Pramana', 'dwiagung0515@gmail.com', '+62895337342838', 'Unknow', 'Urusan_umum', 'Mengurus apa saja', NULL, NULL, '2026-01-09', '06:21:56', '06:24:56', 'Done'),
(38, 'Zaid', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_unit', 'Bertemu Unit Penjamin Mutu', 1, NULL, '2026-01-17', '10:36:08', '10:38:08', 'Done'),
(39, 'Adit', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_unit', 'Bertemu Unit Penjamin Mutu', 1, NULL, '2026-01-18', '10:36:08', '10:38:08', 'Done'),
(40, 'Zaky', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_unit', 'Bertemu Unit Penjamin Mutu', 1, NULL, '2026-01-19', '10:36:08', '10:38:08', 'Done'),
(41, 'Fauzan', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_unit', 'Bertemu Unit Penjamin Mutu', 1, NULL, '2026-01-20', '10:36:08', '10:38:08', 'Done'),
(42, 'Agung', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_unit', 'Bertemu Unit Penjamin Mutu', 1, NULL, '2026-01-21', '10:36:08', '10:38:08', 'Done'),
(65, 'Dwi Agung Willy Anto', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Urusan_umum', 'Mengurus Hal Umum', NULL, NULL, '2026-12-24', '19:59:00', '21:59:00', 'Upcoming'),
(66, 'Virgiawan Aziz Listianto', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Urusan_umum', 'Mengurus Hal Umum', NULL, NULL, '2026-12-24', '19:59:00', '21:59:00', 'Upcoming'),
(67, 'Arys Apriatna Ananda', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Urusan_umum', 'Mengurus Hal Umum', NULL, NULL, '2026-12-24', '19:59:00', '21:59:00', 'Upcoming'),
(68, 'Kevin Febriano', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_staf', 'Mengurus Hal Umum', NULL, 8, '2026-12-24', '19:59:00', '21:59:00', 'Pending'),
(69, 'Dimas Pratama Putra', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_staf', 'Mengurus Hal Umum', NULL, 8, '2026-12-24', '19:59:00', '21:59:00', 'Pending'),
(70, 'M Davawin Cahyono', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_staf', 'Mengurus Hal Umum', NULL, 8, '2026-12-24', '19:59:00', '21:59:00', 'Pending'),
(71, 'M Safamal Jovanda', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_staf', 'Mengurus Hal Umum', NULL, 8, '2026-12-24', '19:59:00', '00:00:00', 'Rejected'),
(72, 'Rizky Ramadhani', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_staf', 'Mengurus Hal Umum', NULL, 8, '2026-12-24', '19:59:00', '00:00:00', 'Rejected'),
(73, 'Zaid Hasbiya Abrar', 'dwiagung0515@gmail.com', '+62895337342838', 'Visilog', 'Janji_temu_staf', 'Mengurus Hal Umum', NULL, 8, '2026-12-24', '19:59:00', '00:00:00', 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_data`
--
ALTER TABLE `visit_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit` (`id_unit`,`id_staf`),
  ADD KEY `id_staf` (`id_staf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staf`
--
ALTER TABLE `staf`
  MODIFY `id_staf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visit_data`
--
ALTER TABLE `visit_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visit_data`
--
ALTER TABLE `visit_data`
  ADD CONSTRAINT `visit_data_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`),
  ADD CONSTRAINT `visit_data_ibfk_2` FOREIGN KEY (`id_staf`) REFERENCES `staf` (`id_staf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
