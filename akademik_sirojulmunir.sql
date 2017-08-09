-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Agu 2017 pada 17.32
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik_sirojulmunir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `siswas_id` int(10) UNSIGNED DEFAULT NULL,
  `thn_ajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id`, `kelas`, `tanggal`, `siswas_id`, `thn_ajaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(9, '1', ' Monday, 07 August 2017', 1, '2018-2019', 'Hadir', '2017-08-06 20:21:58', '2017-08-06 20:21:58'),
(10, '1', ' Monday, 07 August 2017', 4, '2018-2019', 'Izin', '2017-08-06 20:21:59', '2017-08-06 20:21:59'),
(11, '2', ' Monday, 07 August 2017', 2, '2018-2019', 'Sakit', '2017-08-06 20:22:15', '2017-08-06 20:22:15'),
(12, '1', ' Monday, 07 August 2017', 1, '2018-2019', 'Absen', '2017-08-06 20:35:43', '2017-08-06 20:35:43'),
(13, '1', ' Monday, 07 August 2017', 4, '2018-2019', 'Absen', '2017-08-06 20:35:43', '2017-08-06 20:35:43'),
(14, '2', ' Monday, 07 August 2017', 2, '2018-2019', 'Hadir', '2017-08-06 20:46:41', '2017-08-06 20:46:41'),
(15, '3', ' Monday, 07 August 2017', 3, '2018-2019', 'Izin', '2017-08-07 00:10:37', '2017-08-07 00:10:37'),
(16, '1', ' Wednesday, 09 August 2017', 1, '2018-2019', 'Hadir', '2017-08-09 02:08:17', '2017-08-09 02:08:17'),
(17, '1', ' Wednesday, 09 August 2017', 4, '2018-2019', 'Absen', '2017-08-09 02:08:17', '2017-08-09 02:08:17'),
(18, '1', ' Wednesday, 09 August 2017', 13, '2018-2019', 'Hadir', '2017-08-09 02:08:18', '2017-08-09 02:08:18'),
(19, '1', ' Wednesday, 09 August 2017', 1, '2018-2019', 'Sakit', '2017-08-09 02:08:44', '2017-08-09 02:08:44'),
(20, '1', ' Wednesday, 09 August 2017', 4, '2018-2019', 'Sakit', '2017-08-09 02:08:44', '2017-08-09 02:08:44'),
(21, '1', ' Wednesday, 09 August 2017', 13, '2018-2019', 'Sakit', '2017-08-09 02:08:44', '2017-08-09 02:08:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nuptk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `nip`, `nuptk`, `nama_guru`, `jenis_kelamin`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '22222222', '9282817', 'Sarim, S.Pd.I', 'Laki-Laki', 'Guru Sekolah', '2017-08-07 05:14:09', '2017-08-07 05:14:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelass_id` int(10) UNSIGNED DEFAULT NULL,
  `hari` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pelajarans_id` int(10) UNSIGNED DEFAULT NULL,
  `gurus_id` int(10) UNSIGNED DEFAULT NULL,
  `siswas_id` int(10) UNSIGNED DEFAULT NULL,
  `gedung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ruangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_mapel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `kelass_id`, `hari`, `jam`, `pelajarans_id`, `gurus_id`, `siswas_id`, `gedung`, `ruangan`, `tahun_ajaran`, `status_mapel`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin', '08.00-09.00 WIB', 1, 1, 1, 'Al-Azhar', '35 A', '2018-2019', 'Izin', '2017-08-07 05:13:17', '2017-08-07 05:13:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelass`
--

CREATE TABLE `kelass` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kelass`
--

INSERT INTO `kelass` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'Kelas 1', '2017-08-06 01:35:59', '2017-08-06 01:35:59'),
(2, 'Kelas 2', '2017-08-06 01:36:07', '2017-08-06 01:36:07'),
(3, 'Kelas 3', '2017-08-06 01:36:18', '2017-08-06 01:36:18'),
(4, 'Kelas 4', '2017-08-06 01:36:38', '2017-08-06 01:36:38'),
(5, 'Kelas 5', '2017-08-06 01:36:46', '2017-08-06 01:36:46'),
(6, 'Kelas 6', '2017-08-06 01:36:58', '2017-08-06 01:36:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_10_12_123552_create_password_resets_table', 1),
('2015_10_12_123652_create_users_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaiakademiks`
--

CREATE TABLE `nilaiakademiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswas_id` int(10) UNSIGNED DEFAULT NULL,
  `pelajarans_id` int(10) UNSIGNED DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_tugas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_ulangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_nilai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `nilaiakademiks`
--

INSERT INTO `nilaiakademiks` (`id`, `siswas_id`, `pelajarans_id`, `kelas`, `nilai_tugas`, `nilai_ulangan`, `jumlah_nilai`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '1', '80', '65', '72.5', '2017-08-08 02:50:11', '2017-08-08 02:50:11'),
(6, 2, 1, '2', '85', '75', '80', '2017-08-08 05:20:01', '2017-08-08 05:20:01'),
(7, 8, 1, '2', '70', '90', '80', '2017-08-08 05:20:01', '2017-08-08 05:20:01'),
(8, 3, 1, '3', '76', '50', '63', '2017-08-08 05:34:08', '2017-08-08 05:34:08'),
(15, 12, 1, '6', '80', '60', '70', '2017-08-08 05:59:02', '2017-08-08 05:59:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilainonakademiks`
--

CREATE TABLE `nilainonakademiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswas_id` int(10) UNSIGNED DEFAULT NULL,
  `pelajarans_id` int(10) UNSIGNED DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_tugas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_ulangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_nilai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `nilainonakademiks`
--

INSERT INTO `nilainonakademiks` (`id`, `siswas_id`, `pelajarans_id`, `kelas`, `nilai_tugas`, `nilai_ulangan`, `jumlah_nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '1', '89', '78', '83.5', '2017-08-08 09:58:11', '2017-08-08 09:58:11'),
(2, 8, 1, '2', '60', '60', '60', '2017-08-08 10:16:15', '2017-08-08 10:16:15'),
(3, 3, 1, '3', '34', '43', '38.5', '2017-08-08 10:32:01', '2017-08-08 10:32:01'),
(4, 12, 1, '6', '41', '32', '36.5', '2017-08-08 10:34:37', '2017-08-08 10:34:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajarans`
--

CREATE TABLE `pelajarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pelajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `durasi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pelajarans`
--

INSERT INTO `pelajarans` (`id`, `nama_pelajaran`, `durasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '60 Menit', 'Pelajaran Akademik', '2017-08-06 01:37:15', '2017-08-06 01:37:15'),
(2, 'Nahwu Wadih', '45 Menit', 'Pelajaran Non Akademik', '2017-08-06 01:37:47', '2017-08-06 01:37:47'),
(3, 'Shorof', '45 Menit', 'Pelajaran Non Akademik', '2017-08-06 01:38:41', '2017-08-06 01:38:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswas_id` int(10) UNSIGNED DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_pembayaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_pembayaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `siswas_id`, `kelas`, `tahun_ajaran`, `jenis_pembayaran`, `jumlah_pembayaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 1, 'Kelas 1', '2019-2020', 'Daftar Ulang', 'Rp. 1.250.000,-', 'Lunas', '2017-08-08 11:26:50', '2017-08-09 02:21:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaRule` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `namaRule`) VALUES
(1, 'Administrator'),
(2, 'Pimpinan'),
(3, 'Guru'),
(4, 'Wali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kelass_id` int(10) UNSIGNED DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nis`, `nik`, `nama_siswa`, `kelass_id`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tlp`, `tahun_ajaran`, `nama_wali`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '001', '', 'Aldi Reza Sastrawan', 1, 'Laki-Laki', 'Jakarta', '2000-01-01', 'Jl H Jebot Cluster Madani no C 16', '081318401554', '2019-2020', 'Djati Kusumo S.H', 'Santri', '2017-08-06 01:39:55', '2017-08-06 01:39:55'),
(2, '002', '123321', 'Nisa Ramadhani', 2, 'Perempuan', 'Bogor', '2007-02-02', 'Margonda Raya no 21 Depok', '02188945712', '2018-2019', '', 'Siswa', '2017-08-06 01:42:15', '2017-08-06 01:42:15'),
(3, '003', '', 'Fadli Romadon', 3, 'Laki-Laki', 'Bengkulu', '2009-02-21', 'Pancoran Mas Depok no 33', '09822819202', '2018-2019', '', 'Santri', '2017-08-06 01:43:53', '2017-08-06 01:43:53'),
(4, '004', '456', 'Rani Ramadhani', 1, 'Perempuan', 'Jakarta', '2000-09-02', ' Jl Pasar Minggu Raya No 12 G ', '082911283719', '2018-2019', '', 'Siswa', '2017-08-06 08:41:29', '2017-08-06 08:41:55'),
(5, '005', '10231', 'Adinda Nur Rohmah', 4, 'Perempuan', 'Bekasi', '2000-09-02', 'Jalan Kalimalang Raya No 21 A', '08967773718', '2018-2019', 'Ahmad Suseno', 'Siswa', '2017-08-07 00:19:59', '2017-08-07 00:19:59'),
(6, '006', '', 'Desma Nur Fahri', 5, 'Laki-Laki', 'Jakarta', '2000-12-31', 'Jl Narogong Raya Kp Kramat No 32 ', '0814774563', '2018-2019', 'Ahmad Dinejad', 'Santri', '2017-08-07 00:25:09', '2017-08-07 00:25:09'),
(7, '007', '09873', 'Ahmad Fadli Alfarizi', 6, 'Laki-Laki', 'Bekasi', '2000-01-01', 'Kramat Djati Raya No 13-14', '844751556', '2018-2019', 'Darmawan Aji', 'Siswa', '2017-08-07 00:27:06', '2017-08-07 00:27:06'),
(8, '008', '', 'Zainuri Ahmad', 2, 'Laki-Laki', 'Bekasi', '2008-02-06', 'Jl Swatantra raya no 45B', '081477756432', '2018-2019', 'Sunaryono S.Pdi', 'Santri', '2017-08-08 05:19:11', '2017-08-08 05:19:11'),
(9, '009', '14789', 'Atika Jaya Rani', 3, 'Perempuan', 'Padang', '2008-01-09', 'Bukit Tinggi Raya No 43 N', '08544474641', '2018-2019', 'Hendra Riansyah', 'Siswa', '2017-08-08 05:30:34', '2017-08-08 05:30:34'),
(10, '010', '78456', 'Dio Iqbal Pradana', 4, 'Laki-Laki', 'Bekasi', '2010-12-15', 'KH Noor Ali blok 32 No 43 Jaka Permai', '844494949', '2018-2019', 'Temi Anggita', 'Santri', '2017-08-08 05:39:30', '2017-08-08 05:39:30'),
(11, '011', '197645', 'Ibnu Haryo Suseno', 5, 'Laki-Laki', 'Jakarta', '2004-06-01', 'Bintara Raya No 4 Kav Cigantung', '0856975413', '2018-2019', 'Reza Akbar', 'Siswa', '2017-08-08 05:52:44', '2017-08-08 05:52:44'),
(12, '012', '324441', 'Alfiza Burfji', 6, 'Perempuan', 'Jakarta', '2000-11-14', 'Qatar Doha', '4451293411', '2018-2019', 'Setio Budi Aedi', 'Santri', '2017-08-08 05:55:49', '2017-08-08 05:55:49'),
(13, '999', '1234', 'ddd', 1, 'Perempuan', 'Depok', '1990-10-23', 'depok', '08980842636', '2018-2019', 'emi', 'Siswa', '2017-08-09 02:07:20', '2017-08-09 02:07:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `roles_id` int(10) UNSIGNED DEFAULT NULL,
  `gurus_id` int(10) UNSIGNED DEFAULT NULL,
  `siswas_id` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `roles_id`, `gurus_id`, `siswas_id`, `username`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'admin', NULL, NULL, '$2y$10$xAGuXmbVwS7fRlq02LzXyudOo3eRdxcbQKnLE1YJqbNrVd39sU0ue', 'xK2F4nI1oLmEU3id3OSzlWDwbJMDHkJAUA2U1Z3uo3UheYfirhQ4ljWydcrP', '2017-08-06 01:34:24', '2017-08-09 02:28:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_siswas_id_foreign` (`siswas_id`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_kelass_id_foreign` (`kelass_id`),
  ADD KEY `jadwals_pelajarans_id_foreign` (`pelajarans_id`),
  ADD KEY `jadwals_gurus_id_foreign` (`gurus_id`),
  ADD KEY `jadwals_siswas_id_foreign` (`siswas_id`);

--
-- Indexes for table `kelass`
--
ALTER TABLE `kelass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaiakademiks`
--
ALTER TABLE `nilaiakademiks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilaiakademiks_siswas_id_foreign` (`siswas_id`),
  ADD KEY `nilaiakademiks_pelajarans_id_foreign` (`pelajarans_id`);

--
-- Indexes for table `nilainonakademiks`
--
ALTER TABLE `nilainonakademiks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilainonakademiks_siswas_id_foreign` (`siswas_id`),
  ADD KEY `nilainonakademiks_pelajarans_id_foreign` (`pelajarans_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pelajarans`
--
ALTER TABLE `pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_siswas_id_foreign` (`siswas_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_kelass_id_foreign` (`kelass_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_roles_id_foreign` (`roles_id`),
  ADD KEY `users_gurus_id_foreign` (`gurus_id`),
  ADD KEY `users_siswas_id_foreign` (`siswas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kelass`
--
ALTER TABLE `kelass`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nilaiakademiks`
--
ALTER TABLE `nilaiakademiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `nilainonakademiks`
--
ALTER TABLE `nilainonakademiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pelajarans`
--
ALTER TABLE `pelajarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_siswas_id_foreign` FOREIGN KEY (`siswas_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_gurus_id_foreign` FOREIGN KEY (`gurus_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_kelass_id_foreign` FOREIGN KEY (`kelass_id`) REFERENCES `kelass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_pelajarans_id_foreign` FOREIGN KEY (`pelajarans_id`) REFERENCES `pelajarans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_siswas_id_foreign` FOREIGN KEY (`siswas_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilaiakademiks`
--
ALTER TABLE `nilaiakademiks`
  ADD CONSTRAINT `nilaiakademiks_pelajarans_id_foreign` FOREIGN KEY (`pelajarans_id`) REFERENCES `pelajarans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilaiakademiks_siswas_id_foreign` FOREIGN KEY (`siswas_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilainonakademiks`
--
ALTER TABLE `nilainonakademiks`
  ADD CONSTRAINT `nilainonakademiks_pelajarans_id_foreign` FOREIGN KEY (`pelajarans_id`) REFERENCES `pelajarans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilainonakademiks_siswas_id_foreign` FOREIGN KEY (`siswas_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_siswas_id_foreign` FOREIGN KEY (`siswas_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelass_id_foreign` FOREIGN KEY (`kelass_id`) REFERENCES `kelass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_gurus_id_foreign` FOREIGN KEY (`gurus_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_siswas_id_foreign` FOREIGN KEY (`siswas_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
