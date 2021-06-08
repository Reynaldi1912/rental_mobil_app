-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2021 pada 02.35
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan_pribadi`
--

CREATE TABLE `kendaraan_pribadi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `tipe_mobil` varchar(50) NOT NULL,
  `transmisi` varchar(20) NOT NULL,
  `jumlah_kursi` int(5) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan_pribadi`
--

INSERT INTO `kendaraan_pribadi` (`id`, `nama`, `harga`, `tipe_mobil`, `transmisi`, `jumlah_kursi`, `stok`, `foto`, `created_at`, `updated_at`) VALUES
(22, 'Honda Ayla', 150000, 'City Car', 'Otomatis', 6, 7, 'images/mDggZeGCY72U3TvLDk6kTGmmgDRaITudVfDf5mHr.jpg', '2021-05-26 17:55:24', '2021-06-06 21:59:33'),
(25, 'Toyota Avanza', 300000, 'City Car', 'Manual', 6, 5, 'images/xcohoeNaXr3WUiQZan8qSN2qrPyOHdb4G11Xs2tP.jpg', '2021-06-05 04:53:16', '2021-06-06 20:42:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan_umum`
--

CREATE TABLE `kendaraan_umum` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `tipe_mobil` varchar(50) NOT NULL,
  `transmisi` varchar(20) NOT NULL,
  `jumlah_kursi` int(5) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan_umum`
--

INSERT INTO `kendaraan_umum` (`id`, `nama`, `harga`, `tipe_mobil`, `transmisi`, `jumlah_kursi`, `stok`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Bus Asri', 400000, 'Mini Bus', 'Manual', 25, 6, 'images/ONtmBvX5hMJ8mKqUOyXP65bSFZcwBTCKlw5N2NCv.jpg', '2021-05-26 19:13:31', '2021-06-06 05:21:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `nama_kendaraan` varchar(50) NOT NULL,
  `nama_penyewa` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `nama_kendaraan`, `nama_penyewa`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bus Asri', 'Dimasqi Aliffudin', 'setuju', '2021-06-07 00:51:41', '2021-06-07 00:51:41'),
(3, 'Honda Ayla', 'Dimasqi Aliffudin', 'batal', '2021-06-07 00:57:56', '2021-06-07 00:57:56'),
(4, 'Honda Ayla', 'Dicky Juniar', 'batal', '2021-06-07 01:18:21', '2021-06-07 01:18:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_kendaraan_pribadi`
--

CREATE TABLE `sewa_kendaraan_pribadi` (
  `id` int(11) NOT NULL,
  `kendaraan_pribadi_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa_kendaraan_pribadi`
--

INSERT INTO `sewa_kendaraan_pribadi` (`id`, `kendaraan_pribadi_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 25, 3, 'pending', '2021-06-03 13:39:43', '2021-06-03 13:39:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_kendaraan_umum`
--

CREATE TABLE `sewa_kendaraan_umum` (
  `id` int(11) NOT NULL,
  `kendaraan_umum_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa_kendaraan_umum`
--

INSERT INTO `sewa_kendaraan_umum` (`id`, `kendaraan_umum_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'pending', '2021-06-03 09:06:49', '2021-06-06 04:21:07'),
(4, 2, 3, 'setuju', '2021-06-07 07:57:36', '2021-06-07 07:57:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `foto`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Reynaldi Ramadhani', 'reynaldi19@gmail.com', 'images/APdiW5rhKrqGgyqare2UYiL19M5rxTt2hxmQ98jN.png', 'admin', NULL, '$2y$10$j8eQk/DSD4obSbd4N8il/O8ip3rNVMhwWa3163s/QCWgBSzLbmxjm', NULL, '2021-05-22 06:48:03', '2021-06-07 01:24:58'),
(2, 'Dimasqi Aliffudin', 'mdhimasqi@gmail.com', 'images/nN9E1lft0PeCldeHumyePOvCvoACn70CRcdcJSjq.png', 'user', NULL, '$2y$10$1I7j.3VgxD9/Qk3xEAcljulrgACmz.gnL8RN9XtEm9Q4U1.bU4fHa', NULL, '2021-05-25 03:19:19', '2021-06-06 18:49:51'),
(3, 'Dicky Juniar', 'dicky@gmail.com', 'images/WpMb9GtDNAnx2skf2ghRu2xSZ0MA2t2qqYC000cS.png', 'user', NULL, '$2y$10$5GGKss0oAyoR.SRJ3DBpcenTUI1eLZ7zHFqROlw2d.IHPYY5IvKQK', NULL, '2021-05-26 23:20:30', '2021-05-26 23:20:41'),
(4, 'Genadi Dharma', 'Genadi@gmail.com', NULL, 'user', NULL, '$2y$10$iLZrE7P5SB24sD/1igPJNursVfN4qUBYNvMutd5LNnlqSR79h6Y9i', NULL, '2021-06-06 19:36:16', '2021-06-06 19:36:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `ktp` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`id`, `nama_lengkap`, `nik`, `jenis_kelamin`, `alamat_lengkap`, `no_hp`, `ktp`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Mochammad Dimasqi Aliffudin Faiz', '3508161906090003', 'Laki-Laki', 'Jalan Pahlawan Gang kenonogo No 119 Rt 4 Rw 14 Kecamatan Kanigaran Kelurahan Kebonsari Kulon', '+6281235399458', 'images/wclM1wkbwu6s8QIaZadUpBOLQNUmKOynr5KeEUze.jpg', 2, '2021-06-06 18:40:48', '2021-06-06 20:40:56'),
(3, 'Dicky Juniar Wipi', '4632467367373453367', 'Laki-Laki', 'Jalan Pahlawan Gang kenonogo No 119 Rt 4 Rw 14 Kecamatan Kanigaran Kelurahan Kebonsari Kulon', '0812353994586', 'images/EOhb9xEpjsGupsny7zBQ1q9Vsahv4DwM9xuyBDnc.png', 3, '2021-06-06 19:02:41', '2021-06-06 20:16:48'),
(4, 'Dicky Juniar Wipi', '34738265367586578345', 'Laki-Laki', 'Jalan Pahlawan Gang kenonogo No 119 Rt 4 Rw 14 Kecamatan Kanigaran Kelurahan Kebonsari Kulon', '+6281235399458', 'images/BPqN9KgY1pzzstAZnbGD5SV5nxgMTQLBWGZdjvK2.png', 1, '2021-06-06 21:47:38', '2021-06-06 21:47:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kendaraan_pribadi`
--
ALTER TABLE `kendaraan_pribadi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan_umum`
--
ALTER TABLE `kendaraan_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sewa_kendaraan_pribadi`
--
ALTER TABLE `sewa_kendaraan_pribadi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kendaraan_pribadi_id` (`kendaraan_pribadi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `sewa_kendaraan_umum`
--
ALTER TABLE `sewa_kendaraan_umum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kendaraan_umum_id` (`kendaraan_umum_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_pribadi`
--
ALTER TABLE `kendaraan_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_umum`
--
ALTER TABLE `kendaraan_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sewa_kendaraan_pribadi`
--
ALTER TABLE `sewa_kendaraan_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sewa_kendaraan_umum`
--
ALTER TABLE `sewa_kendaraan_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sewa_kendaraan_pribadi`
--
ALTER TABLE `sewa_kendaraan_pribadi`
  ADD CONSTRAINT `sewa_kendaraan_pribadi_ibfk_1` FOREIGN KEY (`kendaraan_pribadi_id`) REFERENCES `kendaraan_pribadi` (`id`),
  ADD CONSTRAINT `sewa_kendaraan_pribadi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `sewa_kendaraan_umum`
--
ALTER TABLE `sewa_kendaraan_umum`
  ADD CONSTRAINT `sewa_kendaraan_umum_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sewa_kendaraan_umum_ibfk_2` FOREIGN KEY (`kendaraan_umum_id`) REFERENCES `kendaraan_umum` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
