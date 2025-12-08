-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 08, 2025 at 03:36 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

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
  `id_staf` int NOT NULL,
  `staf_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `staf_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `staf_number` int NOT NULL,
  `staf_unit` enum('dosen_informatika','dosen_manajemen','dosen_elektro','dosen_mesin') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`id_staf`, `staf_name`, `staf_email`, `staf_number`, `staf_unit`) VALUES
(1, 'Adhitomo Wirawan, S.ST., M.BA', '', 0, 'dosen_manajemen'),
(2, 'Aditya Wirangga Pratama, M.AB', '', 0, 'dosen_manajemen'),
(3, 'Afriyanti Hasanah, S.S.T., M.Sc', '', 0, 'dosen_manajemen'),
(4, 'Alfonsa Dian Sumarna, S.E., M.Si', '', 0, 'dosen_manajemen'),
(5, 'Andi Erna Mulyana, S.T., M.Sc', '', 0, 'dosen_manajemen'),
(6, 'Dwi Ely Kurniawan, S.Pd., M.Kom', '', 0, 'dosen_informatika'),
(7, 'Evaliata Br. Sembiring, S.Kom., M.Cs', '', 0, 'dosen_informatika'),
(8, 'Nur Zahrati Janah, S.Kom, M.Sc', '', 0, 'dosen_informatika'),
(9, 'Swono Sibagariang, S.Kom., M.Kom', '', 0, 'dosen_informatika'),
(10, 'Yeni Rokhayati, S.Si., M.Sc', '', 0, 'dosen_informatika'),
(11, 'Abdullah Sani, S.ST, M.Sc', '', 0, 'dosen_mesin'),
(12, 'Aditya Gautama Darmoyono, S.T., M.T.', '', 0, 'dosen_elektro'),
(13, 'Adlian Jefiza, S.Pd., M.T.', '', 0, 'dosen_elektro'),
(14, 'Ahmad Riyad Firdaus, S.Si., M.T., Ph.D', '', 0, 'dosen_elektro'),
(15, 'Arif Febriansyah Juwito, S.T., M.Eng', '', 0, 'dosen_elektro'),
(16, 'Adhe Aryswan, S.Pd., M.Si.', '', 0, 'dosen_mesin'),
(17, 'Agustinus Herwien Gunawan', '', 0, 'dosen_mesin'),
(18, 'Ananta Setiadi, S.T.', '', 0, 'dosen_mesin'),
(19, 'Andrew W P Mantik, S.T', '', 0, 'dosen_mesin'),
(20, 'Annisa Fyona, S.K.M., M.K.K.K', '', 0, 'dosen_mesin');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `unit_number` int NOT NULL,
  `unit_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `unit_name`, `unit_number`, `unit_email`) VALUES
(1, 'Pusat Penjaminan Mutu (P4M)', 0, ''),
(2, 'Penelitian & Pengabdian Masyarakat (P3M)', 0, ''),
(3, 'Satuan Pengawas Internal (SPI)', 0, ''),
(4, 'UPA Perpustakaan', 0, ''),
(5, 'UPA Perbaikan & Perawatan', 0, ''),
(6, 'UPA Teknologi Infomasi & Komunikasi', 0, ''),
(7, 'Pengembangan Karir & Kewirausahaan', 0, ''),
(8, 'Sub Bagian Akademik', 0, ''),
(9, 'Kemahasiswaan', 0, ''),
(10, 'Sub Bagian Umum', 0, ''),
(11, 'Humas & Kerjasama', 0, ''),
(12, 'BMN & Pengadaan', 0, ''),
(13, 'Organisasi & SDM', 0, ''),
(14, 'Keuangan', 0, ''),
(15, 'Perencanaan', 0, ''),
(16, 'Shilau', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, '21232f297a57a5a743894a0e4a801fc3', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `visit_data`
--

CREATE TABLE `visit_data` (
  `id` int NOT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `visit_regards` enum('Urusan_surat','Urusan_keuangan','Urusan_umum','Urusan_sarana','Janji_temu_unit','Janji_temu_staf') COLLATE utf8mb4_general_ci NOT NULL,
  `visit_desc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_unit` int DEFAULT NULL,
  `id_staf` int DEFAULT NULL,
  `visit_date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `appointment` enum('Ya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Pending','Done','Upcoming') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visit_data`
--

INSERT INTO `visit_data` (`id`, `guest_name`, `email`, `phone_number`, `company_name`, `visit_regards`, `visit_desc`, `id_unit`, `id_staf`, `visit_date`, `time_in`, `time_out`, `appointment`, `status`) VALUES
(1, 'Dwi Agung Willy Anto', 'dwiagung0515@gmail.com', '0895337342838', 'Black Market', 'Urusan_surat', 'Mengurus Surat', NULL, NULL, '2025-11-22', '09:43:59', '09:49:17', 'Tidak', 'Done'),
(2, 'Samuel Simorangkir', 'samuel@gmail.com', '08954612172', 'Visilog', 'Janji_temu_unit', 'Mengurus Kerja sama', 11, NULL, '2025-11-22', '12:49:11', '13:49:11', 'Tidak', 'Upcoming'),
(3, 'Nayla Azkyah Azra', 'Nayla@gmail.com', '08654321564', 'Visilog', 'Janji_temu_staf', 'Konsultasi dengan Waldos aagahfpahfawhaohgaphwfaphwgahpfdhaspfhapshapgsh-awhgpwahfgpaihsgoahgawhawfhahfaphg0qw9tghq9ht-16etoifbabpaqwr1yt0ehfoHBOGR0111rfasgtqhSFAfgGs', NULL, 8, '2025-11-22', '09:38:57', '10:50:57', 'Ya', 'Pending');

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
  MODIFY `id_staf` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visit_data`
--
ALTER TABLE `visit_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
