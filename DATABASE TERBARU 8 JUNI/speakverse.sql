-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2026 pada 18.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speakverse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@simtas.test|127.0.0.1', 'i:1;', 1780882853),
('laravel-cache-admin@simtas.test|127.0.0.1:timer', 'i:1780882853;', 1780882853);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `skill_type` enum('listening','reading','writing','speaking') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order_number` int(11) NOT NULL DEFAULT 1,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lessons`
--

INSERT INTO `lessons` (`id`, `unit_id`, `skill_type`, `title`, `description`, `order_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'listening', 'Listening', 'Listening lesson for UNIT 1', 1, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(2, 2, 'reading', 'Reading', 'Reading lesson for UNIT 1', 2, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(3, 2, 'writing', 'Writing', 'Writing lesson for UNIT 1', 3, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(4, 2, 'speaking', 'Speaking', 'Speaking lesson for UNIT 1', 4, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(5, 3, 'listening', 'Listening', 'Listening lesson for UNIT 2', 1, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(6, 3, 'reading', 'Reading', 'Reading lesson for UNIT 2', 2, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(7, 3, 'writing', 'Writing', 'Writing lesson for UNIT 2', 3, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(8, 3, 'speaking', 'Speaking', 'Speaking lesson for UNIT 2', 4, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(9, 4, 'listening', 'Listening', 'Listening lesson for UNIT 3', 1, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(10, 4, 'reading', 'Reading', 'Reading lesson for UNIT 3', 2, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(11, 4, 'writing', 'Writing', 'Writing lesson for UNIT 3', 3, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(12, 4, 'speaking', 'Speaking', 'Speaking lesson for UNIT 3', 4, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(13, 5, 'listening', 'Listening', 'Listening lesson for UNIT 4', 1, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(14, 5, 'reading', 'Reading', 'Reading lesson for UNIT 4', 2, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(15, 5, 'writing', 'Writing', 'Writing lesson for UNIT 4', 3, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(16, 5, 'speaking', 'Speaking', 'Speaking lesson for UNIT 4', 4, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_12_083225_add_role_to_users_table', 2),
(5, '2026_05_12_084716_add_role_column_to_users_table', 3),
(6, '2026_05_25_013941_create_vocabulary_pretests_table', 4),
(7, '2026_05_25_014522_create_vocabulary_pretest_results_table', 4),
(8, '2026_05_25_053303_add_category_to_vocabulary_pretests_table', 5),
(9, '2026_05_31_054053_create_missions_table', 6),
(10, '2026_05_31_054851_add_fields_to_missions_table', 7),
(11, '2026_06_08_030142_create_units_table', 8),
(12, '2026_06_08_030901_create_lessons_table', 8),
(13, '2026_06_08_035337_create_reading_materials_table', 9),
(14, '2026_06_08_035402_create_reading_questions_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` enum('speaking','reading','vocabulary') NOT NULL,
  `difficulty` enum('easy','medium','hard') NOT NULL,
  `reward_xp` int(11) NOT NULL,
  `description` text NOT NULL,
  `deadline` date DEFAULT NULL,
  `status` enum('active','draft') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reading_materials`
--

CREATE TABLE `reading_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `passage` longtext NOT NULL,
  `instruction` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reading_materials`
--

INSERT INTO `reading_materials` (`id`, `lesson_id`, `title`, `passage`, `instruction`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Narrative Text', 'Long text...', 'Read the passage carefully', NULL, '2026-06-08 01:34:18', '2026-06-08 01:34:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reading_questions`
--

CREATE TABLE `reading_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reading_material_id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `option_e` varchar(255) DEFAULT NULL,
  `correct_answer` enum('A','B','C','D','E') NOT NULL,
  `score` int(11) NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reading_questions`
--

INSERT INTO `reading_questions` (`id`, `reading_material_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `score`, `created_at`, `updated_at`) VALUES
(2, 1, 'Whats the password', 'Environment', 'Technology', 'Animals', 'Pretty', 'Beauty', 'A', 10, '2026-06-08 08:51:37', '2026-06-08 08:51:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HL246TUOeRlObHZhxBNBQbVG16YhzUJ9ZT5deATE', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJJbWI1dGtyTlBUNDUxY0g5R1oxY2RZMWJYWTN5TzBoQXVzU3BtR2tCIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3NwZWFrdmVyc2UudGVzdFwvYWRtaW5cL3JlYWRpbmctbWF0ZXJpYWxzXC8yIiwicm91dGUiOiJhZG1pbi5yZWFkaW5nLW1hdGVyaWFscy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1780936514);

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order_number` int(11) NOT NULL,
  `type` enum('pretest','unit','posttest') NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id`, `title`, `subtitle`, `description`, `order_number`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRE-TEST', 'Baseline Assessment', NULL, 1, 'pretest', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
(2, 'UNIT 1', 'Are We Connected to Nature?', NULL, 2, 'unit', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
(3, 'UNIT 2', 'Discovering Ourselves', NULL, 3, 'unit', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
(4, 'UNIT 3', 'Why is Water Important?', NULL, 4, 'unit', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
(5, 'UNIT 4', 'Why Should We Live a Healthy Life?', NULL, 5, 'unit', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
(6, 'POST-TEST', 'Final Assessment', NULL, 6, 'posttest', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'M Faried Saputra', 'fariedsputra@gmail.com', 'student', NULL, '$2y$12$aI9OOnaeTi2O9jURXLE4SeX4ie/KdWScCaAq18tImNI3pRuKHZgJ6', NULL, '2026-05-11 23:25:50', '2026-05-11 23:25:50'),
(2, 'Administrator', 'admin@gmail.com', 'admin', NULL, '$2y$12$JWpuW/H28/S8.r3kzjl1jud4x9pTt.oMEzXui0qsbxHj65QxMReJG', NULL, '2026-05-12 01:48:55', '2026-05-12 01:48:55'),
(3, 'adik', 'adiknurhalimah@gmail.com', 'student', NULL, '$2y$12$XxDwzHEgXGC9lt0QqWGq4uamBudbpeCCZfm6gO3ZL3oeNzcczSwIi', NULL, '2026-05-20 16:30:40', '2026-05-20 16:30:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vocabulary_pretests`
--

CREATE TABLE `vocabulary_pretests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `option_e` varchar(255) NOT NULL,
  `correct_answer` enum('A','B','C','D','E') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vocabulary_pretests`
--

INSERT INTO `vocabulary_pretests` (`id`, `question`, `category`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `created_at`, `updated_at`) VALUES
(1, 'apa itu vocab...', 'vocabulary', 'eat', 'eater', 'eating', 'at', 'eated', 'A', '2026-05-25 02:08:38', '2026-05-25 02:08:38'),
(2, 'lagi', 'vocabulary', 'lagi', 'lagi', 'lagi', 'lagi', 'lagi', 'A', '2026-05-25 02:11:13', '2026-05-25 02:11:13'),
(3, 'Question 1 TEST', 'vocabulary', 'Test A', 'Test B', 'Test C', 'Test D', 'Test E', 'C', '2026-06-03 04:02:38', '2026-06-03 04:02:38'),
(4, 'pp', 'reading', 'ppp', 'ppp', 'ppp', 'ppp', 'pp', 'A', '2026-06-04 20:11:21', '2026-06-04 20:11:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vocabulary_pretest_results`
--

CREATE TABLE `vocabulary_pretest_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vocabulary_pretest_results`
--

INSERT INTO `vocabulary_pretest_results` (`id`, `user_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2026-06-04 18:47:43', '2026-06-04 18:47:43'),
(2, 1, 0, '2026-06-04 18:47:47', '2026-06-04 18:47:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_unit_id_foreign` (`unit_id`),
  ADD KEY `lessons_skill_type_index` (`skill_type`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `reading_materials`
--
ALTER TABLE `reading_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reading_materials_lesson_id_foreign` (`lesson_id`);

--
-- Indeks untuk tabel `reading_questions`
--
ALTER TABLE `reading_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reading_questions_reading_material_id_foreign` (`reading_material_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_order_number_index` (`order_number`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vocabulary_pretests`
--
ALTER TABLE `vocabulary_pretests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vocabulary_pretest_results`
--
ALTER TABLE `vocabulary_pretest_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vocabulary_pretest_results_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `reading_materials`
--
ALTER TABLE `reading_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `reading_questions`
--
ALTER TABLE `reading_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `vocabulary_pretests`
--
ALTER TABLE `vocabulary_pretests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `vocabulary_pretest_results`
--
ALTER TABLE `vocabulary_pretest_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reading_materials`
--
ALTER TABLE `reading_materials`
  ADD CONSTRAINT `reading_materials_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reading_questions`
--
ALTER TABLE `reading_questions`
  ADD CONSTRAINT `reading_questions_reading_material_id_foreign` FOREIGN KEY (`reading_material_id`) REFERENCES `reading_materials` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vocabulary_pretest_results`
--
ALTER TABLE `vocabulary_pretest_results`
  ADD CONSTRAINT `vocabulary_pretest_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
