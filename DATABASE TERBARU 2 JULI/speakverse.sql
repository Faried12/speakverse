-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2026 pada 03.50
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
-- Struktur dari tabel `assessment_answers`
--

CREATE TABLE `assessment_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assessment_submission_id` bigint(20) UNSIGNED NOT NULL,
  `question_type` varchar(255) NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` longtext DEFAULT NULL,
  `details_score` tinyint(4) DEFAULT NULL,
  `fluency_score` tinyint(4) DEFAULT NULL,
  `pronunciation_score` tinyint(4) DEFAULT NULL,
  `vocabulary_score` tinyint(4) DEFAULT NULL,
  `grammar_score` tinyint(4) DEFAULT NULL,
  `selected_option` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `orientation_score` tinyint(4) DEFAULT NULL,
  `complication_score` tinyint(4) DEFAULT NULL,
  `resolution_score` tinyint(4) DEFAULT NULL,
  `organization_score` tinyint(4) DEFAULT NULL,
  `mechanics_score` tinyint(4) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `max_score` int(11) NOT NULL DEFAULT 0,
  `feedback` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `assessment_answers`
--

INSERT INTO `assessment_answers` (`id`, `assessment_submission_id`, `question_type`, `question_id`, `answer`, `details_score`, `fluency_score`, `pronunciation_score`, `vocabulary_score`, `grammar_score`, `selected_option`, `is_correct`, `orientation_score`, `complication_score`, `resolution_score`, `organization_score`, `mechanics_score`, `score`, `max_score`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 'reading', 14, NULL, NULL, NULL, NULL, NULL, NULL, 'B', 0, NULL, NULL, NULL, NULL, NULL, 0, 10, NULL, '2026-06-28 09:08:53', '2026-06-28 09:08:53'),
(2, 2, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'D', 0, NULL, NULL, NULL, NULL, NULL, 0, 10, NULL, '2026-06-28 09:09:37', '2026-06-28 09:09:37'),
(3, 3, 'writing', 4, 'nasgor enak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 100, NULL, '2026-06-28 22:20:01', '2026-06-28 22:20:01'),
(4, 4, 'speaking', 3, 'hw as', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 100, NULL, '2026-06-28 22:20:39', '2026-06-28 22:20:39'),
(5, 5, 'writing', 4, 'nasgor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 100, 'The response is extremely brief and does not address the question adequately. It lacks content relevance, organization, and proper grammar. Vocabulary and mechanics are also insufficient.', '2026-06-28 22:46:24', '2026-06-28 22:46:24'),
(6, 6, 'speaking', 3, 'whooo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 100, 'The response is not relevant to the question, lacks fluency, and does not demonstrate appropriate vocabulary or grammar. Please provide a complete and clear answer to the question.', '2026-06-28 22:47:02', '2026-06-28 22:47:02'),
(7, 7, 'speaking', 3, 'who', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 100, 'The response is not relevant to the question and lacks clarity. Try to provide a complete and meaningful answer.', '2026-06-29 00:24:30', '2026-06-29 00:24:30'),
(8, 8, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-06-29 00:29:57', '2026-06-29 00:29:57'),
(9, 9, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-06-30 02:15:37', '2026-06-30 02:15:37'),
(10, 10, 'reading', 14, NULL, NULL, NULL, NULL, NULL, NULL, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, 10, NULL, '2026-06-30 02:16:28', '2026-06-30 02:16:28'),
(11, 11, 'writing', 4, 'youuu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 100, 'The response is irrelevant to the question, lacks organization, and does not demonstrate proper grammar, vocabulary, or mechanics. Please provide a more detailed and relevant answer.', '2026-06-30 02:16:58', '2026-06-30 02:16:58'),
(12, 12, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-06-30 02:21:53', '2026-06-30 02:21:53'),
(13, 13, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, 10, NULL, '2026-07-01 06:24:35', '2026-07-01 06:24:35'),
(14, 14, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-07-01 06:32:21', '2026-07-01 06:32:21'),
(15, 15, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-07-01 06:33:57', '2026-07-01 06:33:57'),
(16, 16, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, 10, NULL, '2026-07-01 06:38:46', '2026-07-01 06:38:46'),
(17, 17, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-07-01 06:40:05', '2026-07-01 06:40:05'),
(18, 18, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-07-01 06:43:16', '2026-07-01 06:43:16'),
(19, 19, 'reading', 14, NULL, NULL, NULL, NULL, NULL, NULL, 'A', 0, NULL, NULL, NULL, NULL, NULL, 0, 10, NULL, '2026-07-01 06:48:06', '2026-07-01 06:48:06'),
(20, 20, 'writing', 4, 'this picture show fire in forest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 100, 'The response is too brief and lacks detail. The grammar and mechanics need improvement, such as proper capitalization and subject-verb agreement. Expand on the description to provide more relevant content.', '2026-07-01 09:13:04', '2026-07-01 09:13:04'),
(21, 21, 'writing', 4, 'this picture show fire in forest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, 30, 100, 'The response lacks clarity and detail about characters, setting, problem, and resolution. Organization is weak, and there are grammar errors such as incorrect capitalization and sentence structure.', '2026-07-01 10:06:18', '2026-07-01 10:06:18'),
(22, 22, 'listening', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-07-01 10:12:45', '2026-07-01 10:12:45'),
(23, 23, 'speaking', 3, 'hello my name is I did not Halima', 1, 1, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 100, 'The response lacks sufficient detail to address the question, as no characters, setting, problem, or resolution were described. Fluency is very limited, with significant hesitation and a lack of continuity in speech. Pronunciation is somewhat understandable but lacks clarity and effort toward a native accent. The vocabulary is extremely basic and does not match the context of the question. Grammar is weak, with errors even in the simple sentence provided. To improve, the student should focus on constructing complete sentences, expanding their vocabulary, and practicing pronunciation for better clarity. Additionally, they should work on providing more descriptive and relevant details in their responses.', '2026-07-01 18:14:14', '2026-07-01 18:14:14'),
(24, 24, 'speaking', 3, 'Hello, my name is Adi Mahalima. I live in Tianbao, Jaipur, Indonesia.', 1, 2, 3, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 100, 'The student\'s response lacks sufficient detail to address the question \'Who is he?\' as no characters, setting, or context are provided. Fluency is hindered by hesitation and incomplete sentences, making the response feel disjointed. Pronunciation is understandable but lacks effort toward a native accent. The vocabulary is basic and does not match the context of the question, and there are grammatical errors, such as the incorrect use of \'I live in Tianbao, Jaipur, Indonesia,\' which combines unrelated locations. To improve, the student should focus on providing relevant details to fully answer the question, practice speaking more fluidly, and work on expanding their vocabulary and grammatical accuracy.', '2026-07-01 18:46:28', '2026-07-01 18:46:28'),
(25, 25, 'reading', 14, NULL, NULL, NULL, NULL, NULL, NULL, 'E', 1, NULL, NULL, NULL, NULL, NULL, 10, 10, NULL, '2026-07-01 18:47:27', '2026-07-01 18:47:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `assessment_submissions`
--

CREATE TABLE `assessment_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('pretest','posttest') NOT NULL,
  `skill` enum('listening','reading','writing','speaking') NOT NULL,
  `final_score` int(11) DEFAULT NULL,
  `status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `feedback` longtext DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `assessment_submissions`
--

INSERT INTO `assessment_submissions` (`id`, `user_id`, `unit_id`, `lesson_id`, `type`, `skill`, `final_score`, `status`, `feedback`, `submitted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 18, 'pretest', 'reading', 0, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-06-28 09:08:53', '2026-06-28 09:08:53', '2026-06-28 09:08:53'),
(2, 1, 1, 17, 'pretest', 'listening', 0, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-06-28 09:09:37', '2026-06-28 09:09:37', '2026-06-28 09:09:37'),
(3, 1, 1, 19, 'pretest', 'writing', NULL, 'pending', 'Jawaban berhasil disimpan. Penilaian AI belum dijalankan.', '2026-06-28 22:20:01', '2026-06-28 22:20:01', '2026-06-28 22:20:01'),
(4, 1, 1, 20, 'pretest', 'speaking', NULL, 'pending', 'Jawaban berhasil disimpan. Penilaian AI belum dijalankan.', '2026-06-28 22:20:39', '2026-06-28 22:20:39', '2026-06-28 22:20:39'),
(5, 1, 1, 19, 'pretest', 'writing', 10, 'completed', 'Soal 4: The response is extremely brief and does not address the question adequately. It lacks content relevance, organization, and proper grammar. Vocabulary and mechanics are also insufficient.', '2026-06-28 22:46:17', '2026-06-28 22:46:17', '2026-06-28 22:46:24'),
(6, 1, 1, 20, 'pretest', 'speaking', 10, 'completed', 'Soal 3: The response is not relevant to the question, lacks fluency, and does not demonstrate appropriate vocabulary or grammar. Please provide a complete and clear answer to the question.', '2026-06-28 22:46:59', '2026-06-28 22:46:59', '2026-06-28 22:47:02'),
(7, 1, 1, 20, 'pretest', 'speaking', 20, 'completed', 'Soal 3: The response is not relevant to the question and lacks clarity. Try to provide a complete and meaningful answer.', '2026-06-29 00:24:27', '2026-06-29 00:24:27', '2026-06-29 00:24:30'),
(8, 1, 1, 17, 'pretest', 'listening', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-06-29 00:29:57', '2026-06-29 00:29:57', '2026-06-29 00:29:57'),
(9, 3, 1, 17, 'pretest', 'listening', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-06-30 02:15:37', '2026-06-30 02:15:37', '2026-06-30 02:15:37'),
(10, 3, 1, 18, 'pretest', 'reading', 0, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-06-30 02:16:27', '2026-06-30 02:16:28', '2026-06-30 02:16:28'),
(11, 3, 1, 19, 'pretest', 'writing', 10, 'completed', 'Question 4: The response is irrelevant to the question, lacks organization, and does not demonstrate proper grammar, vocabulary, or mechanics. Please provide a more detailed and relevant answer.', '2026-06-30 02:16:54', '2026-06-30 02:16:54', '2026-06-30 02:16:58'),
(12, 3, 1, 17, 'pretest', 'listening', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-06-30 02:21:53', '2026-06-30 02:21:53', '2026-06-30 02:21:53'),
(13, 3, 1, 17, 'pretest', 'listening', 0, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 06:24:35', '2026-07-01 06:24:35', '2026-07-01 06:24:35'),
(14, 3, 1, 17, 'pretest', 'listening', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 06:32:21', '2026-07-01 06:32:21', '2026-07-01 06:32:21'),
(15, 4, 1, 17, 'pretest', 'listening', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 06:33:57', '2026-07-01 06:33:57', '2026-07-01 06:33:57'),
(16, 4, 1, 17, 'pretest', 'listening', 0, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 06:38:46', '2026-07-01 06:38:46', '2026-07-01 06:38:46'),
(17, 4, 1, 17, 'pretest', 'listening', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 06:40:05', '2026-07-01 06:40:05', '2026-07-01 06:40:05'),
(18, 4, 1, 17, 'pretest', 'listening', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 06:43:16', '2026-07-01 06:43:16', '2026-07-01 06:43:16'),
(19, 3, 1, 18, 'pretest', 'reading', 0, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 06:48:06', '2026-07-01 06:48:06', '2026-07-01 06:48:06'),
(20, 4, 1, 19, 'pretest', 'writing', 40, 'completed', 'Question 4: The response is too brief and lacks detail. The grammar and mechanics need improvement, such as proper capitalization and subject-verb agreement. Expand on the description to provide more relevant content.', '2026-07-01 09:12:55', '2026-07-01 09:12:55', '2026-07-01 09:13:04'),
(21, 4, 1, 19, 'pretest', 'writing', 30, 'completed', 'Question 4: The response lacks clarity and detail about characters, setting, problem, and resolution. Organization is weak, and there are grammar errors such as incorrect capitalization and sentence structure.', '2026-07-01 10:06:13', '2026-07-01 10:06:13', '2026-07-01 10:06:18'),
(22, 4, 1, 17, 'pretest', 'listening', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 10:12:45', '2026-07-01 10:12:45', '2026-07-01 10:12:45'),
(23, 3, 1, 20, 'pretest', 'speaking', 30, 'completed', 'Question 3: The response lacks sufficient detail to address the question, as no characters, setting, problem, or resolution were described. Fluency is very limited, with significant hesitation and a lack of continuity in speech. Pronunciation is somewhat understandable but lacks clarity and effort toward a native accent. The vocabulary is extremely basic and does not match the context of the question. Grammar is weak, with errors even in the simple sentence provided. To improve, the student should focus on constructing complete sentences, expanding their vocabulary, and practicing pronunciation for better clarity. Additionally, they should work on providing more descriptive and relevant details in their responses.', '2026-07-01 18:14:05', '2026-07-01 18:14:05', '2026-07-01 18:14:14'),
(24, 4, 1, 20, 'pretest', 'speaking', 50, 'completed', 'Question 3: The student\'s response lacks sufficient detail to address the question \'Who is he?\' as no characters, setting, or context are provided. Fluency is hindered by hesitation and incomplete sentences, making the response feel disjointed. Pronunciation is understandable but lacks effort toward a native accent. The vocabulary is basic and does not match the context of the question, and there are grammatical errors, such as the incorrect use of \'I live in Tianbao, Jaipur, Indonesia,\' which combines unrelated locations. To improve, the student should focus on providing relevant details to fully answer the question, practice speaking more fluidly, and work on expanding their vocabulary and grammatical accuracy.', '2026-07-01 18:46:21', '2026-07-01 18:46:21', '2026-07-01 18:46:28'),
(25, 4, 1, 18, 'pretest', 'reading', 100, 'completed', 'Jawaban berhasil dinilai otomatis oleh sistem.', '2026-07-01 18:47:27', '2026-07-01 18:47:27', '2026-07-01 18:47:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(16, 5, 'speaking', 'Speaking', 'Speaking lesson for UNIT 4', 4, 'active', '2026-06-07 20:45:33', '2026-06-07 20:45:33'),
(17, 1, 'listening', 'Listening', 'Listening Pretest', 1, 'active', '2026-06-26 03:07:47', '2026-06-26 03:07:47'),
(18, 1, 'reading', 'Reading', 'Reading Pretest', 2, 'active', '2026-06-26 03:07:47', '2026-06-26 03:07:47'),
(19, 1, 'writing', 'Writing', 'Writing Pretest', 3, 'active', '2026-06-26 03:07:47', '2026-06-26 03:07:47'),
(20, 1, 'speaking', 'Speaking', 'Speaking Pretest', 4, 'active', '2026-06-26 03:07:47', '2026-06-26 03:07:47'),
(21, 6, 'listening', 'Listening', 'Listening Posttest', 1, 'active', '2026-06-26 03:08:20', '2026-06-26 03:08:20'),
(22, 6, 'reading', 'Reading', 'Reading Posttest', 2, 'active', '2026-06-26 03:08:20', '2026-06-26 03:08:20'),
(23, 6, 'writing', 'Writing', 'Writing Posttest', 3, 'active', '2026-06-26 03:08:20', '2026-06-26 03:08:20'),
(24, 6, 'speaking', 'Speaking', 'Speaking Posttest', 4, 'active', '2026-06-26 03:08:20', '2026-06-26 03:08:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `listening_materials`
--

CREATE TABLE `listening_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `passage` longtext NOT NULL,
  `audio_file` varchar(255) DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `listening_materials`
--

INSERT INTO `listening_materials` (`id`, `lesson_id`, `title`, `passage`, `audio_file`, `instruction`, `created_at`, `updated_at`) VALUES
(1, 1, 'Learning Objective1223', '12Describing People\r\n\r\nTo describe a person, we can talk about:\r\n\r\nPhysical Appearance\r\nShe is tall and slim.\r\nShe has long black hair.\r\nShe has brown eyes.', NULL, '12After completing this activity, students are able to identify specific information from a descriptive text about a person.', '2026-06-11 17:11:52', '2026-06-18 06:50:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `listening_questions`
--

CREATE TABLE `listening_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `listening_material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `question` text NOT NULL,
  `audio_file` varchar(255) DEFAULT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `option_e` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `listening_questions`
--

INSERT INTO `listening_questions` (`id`, `lesson_id`, `listening_material_id`, `instruction`, `question`, `audio_file`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `score`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, NULL, 'Listen carefully and choose the best answer.\r\nHello, everyone. Let me tell you about my best friend. Her name is Sarah. She is sixteen years old and studies at a vocational high school. Sarah is tall and slim. She has long black hair and brown eyes. She is friendly and hardworking.\r\n\r\nHer favorite subject is English because she enjoys learning new vocabulary and practicing conversations. In her free time, Sarah likes reading novels and listening to music. She also enjoys playing badminton after school. Many people like Sarah because she is kind, honest, and easy to talk to. Who is the person described in the text?', NULL, 'Sarah\'s teacher', 'Sarah\'s sister', 'Sarah', 'Sarah\'s classmate', 'Sarah\'s neighbor', 'C', 10, '2026-06-11 17:15:34', '2026-06-11 17:15:34'),
(3, 17, NULL, 'listen to audio', 'The Clever Deer\r\n\r\nOnce upon a time, there was a clever deer living in a large forest. Every day, the deer searched for fresh grass near a beautiful river. One afternoon, while drinking water, the deer saw a hungry tiger hiding behind the bushes.\r\n\r\nThe tiger wanted to catch the deer for dinner. However, the deer quickly thought of a plan. He told the tiger that another stronger tiger was waiting on the other side of the river and wanted to fight him.\r\n\r\nThe tiger became angry and looked into the river. He saw his own reflection in the water and believed it was another tiger. Without thinking, he jumped into the river to attack the reflection. The strong current carried the tiger away, and he could not catch the clever deer.\r\n\r\nThe deer safely returned home and learned that intelligence is often more powerful than strength.', NULL, '1', '2', '3', '56', '999', 'E', 10, '2026-06-28 04:26:02', '2026-06-30 08:05:09');

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
(14, '2026_06_08_035402_create_reading_questions_table', 9),
(15, '2026_06_11_032653_create_speaking_materials_table', 10),
(16, '2026_06_11_032724_create_speaking_submissions_table', 10),
(17, '2026_06_11_065345_add_passage_to_speaking_materials_table', 11),
(18, '2026_06_11_072103_create_speaking_questions_table', 12),
(19, '2026_06_11_080431_add_status_to_speaking_submissions_table', 13),
(20, '2026_06_11_173818_create_writing_materials_table', 14),
(21, '2026_06_11_174035_create_writing_questions_table', 15),
(22, '2026_06_11_174138_create_writing_submissions_table', 15),
(23, '2026_06_11_175357_create_writing_passage_table', 16),
(24, '2026_06_11_183013_add_passage_to_writing_materials_table', 17),
(25, '2026_06_11_224920_create_listening_materials_table', 18),
(26, '2026_06_11_224943_create_listening_questions_table', 18),
(27, '2026_06_11_230322_add_passage_to_listening_materials_table', 19),
(28, '2026_06_11_232112_add_audio_file_to_listening_questions_table', 20),
(29, '2026_06_12_001111_drop_script_text_from_listening_materials_table', 21),
(30, '2026_06_28_150829_create_assessment_submissions_table', 22),
(31, '2026_06_28_150835_create_assessment_answers_table', 22),
(32, '2026_06_30_092735_add_instruction_to_listening_questions_table', 23),
(33, '2026_06_30_150255_drop_audio_file_from_assessment_questions', 24),
(34, '2026_07_01_154718_add_writing_scores_to_assessment_answers_table', 25);

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
(1, 2, 'The Magic Tree', 'Once upon a time, there was a lonely tree in a beautiful forest. The tree wished to have friends and make the forest a happier place. One spring morning, a group of fairies visited the tree. They noticed that the tree looked sad.\r\n\r\nThe fairies decided to help. They added new, broad leaves to the tree and made colorful flowers bloom on its branches. Birds and butterflies soon came to visit the tree because it looked beautiful.\r\n\r\nThe tree was very happy. It thanked the fairies for their kindness. Before leaving, the fairies gave the tree one final gift. They granted the tree the ability to provide shade and shelter for all animals in the forest.\r\n\r\nFrom that day on, the tree was never lonely again. Many animals gathered around it every day, and the forest became a joyful place for everyone.', 'Read the passage carefully and answer the questions that follow.', NULL, '2026-06-08 01:34:18', '2026-06-09 06:48:37'),
(4, 4, 'speaking', 'speakinggg', 'this speaking', NULL, '2026-06-10 23:42:00', '2026-06-10 23:42:00'),
(5, 4, 'speaking', 'speakinggg', 'this speaking', NULL, '2026-06-10 23:42:18', '2026-06-10 23:42:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reading_questions`
--

CREATE TABLE `reading_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reading_material_id` bigint(20) UNSIGNED DEFAULT NULL,
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

INSERT INTO `reading_questions` (`id`, `lesson_id`, `reading_material_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_answer`, `score`, `created_at`, `updated_at`) VALUES
(2, NULL, 1, '1. In an interview yesterday Mr. Wilson was questioned about the\r\nharmful effects of horror movies on teenagers. He argued that such\r\neffects were often exaggerated and claimed that other types of films\r\nwere far more dangerous for young people. When asked to prove this,\r\nhe pointed out that horror films were often set in unreal situations\r\nand were clearly not to be taken seriously. In contrast, he claimed that\r\nfilms showing violent crime were often set in everyday life, and were\r\ntherefore more damaging.\r\n\r\n In Mr. Wilson’s opinion, horror films _____', 'cost more than other kinds of films.', 'are more popular among the elderly than among the young.', 'should be banned altogether.', 'are less damaging to young people that films of violent crime.', 'have recently ceased to appeal to the young.', 'D', 10, '2026-06-08 08:51:37', '2026-06-09 06:33:02'),
(4, NULL, 1, '2. In an interview yesterday Mr. Wilson was questioned about the\r\nharmful effects of horror movies on teenagers. He argued that such\r\neffects were often exaggerated and claimed that other types of films\r\nwere far more dangerous for young people. When asked to prove this,\r\nhe pointed out that horror films were often set in unreal situations\r\nand were clearly not to be taken seriously. In contrast, he claimed that\r\nfilms showing violent crime were often set in everyday life, and were\r\ntherefore more damaging.\r\n\r\n For Mr. Wilson the main difference between a horror film and one\r\nshowing violent crime is that the former _____', 'is mainly concerned with everyday situations.', 'is liked by the young, and the latter by the old.', 'is unrelated to real life, whereas the latter is.', 'is less expensive to produce than the latter.', 'rarely receives any attention from the young.', 'C', 10, '2026-06-09 06:34:43', '2026-06-09 06:34:43'),
(5, NULL, 1, '3. In an interview yesterday Mr. Wilson was questioned about the\r\nharmful effects of horror movies on teenagers. He argued that such\r\neffects were often exaggerated and claimed that other types of films\r\nwere far more dangerous for young people. When asked to prove this,\r\nhe pointed out that horror films were often set in unreal situations\r\nand were clearly not to be taken seriously. In contrast, he claimed that\r\nfilms showing violent crime were often set in everyday life, and were\r\ntherefore more damaging.\r\n\r\nThe interviewer wanted to find out whether _____.', 'young people were being harmed by horror films.', 'Mr. Wilson had himself been affected by horror films.', 'Mr. Wilson preferred horror films to films of violence.', 'people were seriously objecting to horror films.', 'the effects of crime films were being exaggerated.', 'A', 10, '2026-06-09 06:36:15', '2026-06-09 06:36:15'),
(6, NULL, 1, '4. The famous Tower of London was built as a fortress by William\r\nthe Conqueror.  Early in the Middle Ages the kings used it as a palace;\r\nlater on it was turned into a prison, but only distinguished prisoners,\r\nincluding statesmen and princes, were held there.  Today the Tower is\r\na national museum, where, among other things, the jewelry of the\r\nEnglish kings and queens is on display.\r\n\r\nIt is obvious from the passage that the functions of the Tower of\r\nLondon _____', 'were all established by William the Conqueror.', 'have always been controlled by the kings.', 'have varied greatly over the centuries.', 'are all of a military nature.', 'have not changed at all since the Middle Ages.', 'C', 10, '2026-06-09 06:37:53', '2026-06-09 06:37:53'),
(7, NULL, 1, '5. The famous Tower of London was built as a fortress by William\r\nthe Conqueror.  Early in the Middle Ages the kings used it as a palace;\r\nlater on it was turned into a prison, but only distinguished prisoners,\r\nincluding statesmen and princes, were held there.  Today the Tower is\r\na national museum, where, among other things, the jewelry of the\r\nEnglish kings and queens is on display.\r\n\r\n We learn from the passage that the Tower _____', 'was not originally intended to be a fortress.', 'was never a prison for ordinary people.', 'is still a unique example of medieval architecture.', 'was never a residence of English kings.', 'functions today only as a jewelers museum.', 'B', 10, '2026-06-09 06:39:26', '2026-06-09 06:39:26'),
(8, NULL, 1, '6. The famous Tower of London was built as a fortress by William\r\nthe Conqueror.  Early in the Middle Ages the kings used it as a palace;\r\nlater on it was turned into a prison, but only distinguished prisoners,\r\nincluding statesmen and princes, were held there.  Today the Tower is\r\na national museum, where, among other things, the jewelry of the\r\nEnglish kings and queens is on display.\r\n\r\n William the Conqueror’s original purpose in building the Tower\r\nof London _____.', 'was one of defense', 'was to exhibit his valuable jewellery.', 'was strongly criticized later in the Middle Ages', 'remains unknown even now.', 'is still being debated among historians', 'A', 10, '2026-06-09 06:40:35', '2026-06-09 06:40:35'),
(9, NULL, 1, '7. Never before in history have people been so aware of what is going\r\non in the world.  Television, newspapers and radio keep us continually\r\ninformed and stimulate our interest.  The sociologist’s interest in the world\r\naround him is intense, for society is his field of study.  Indeed, he needs to\r\nknow what is happening in society; he wants to know what makes the\r\nsocial world what it is, how it is organized, why it changes in the ways that\r\nit does.  Such knowledge is valuable not only for those who make great\r\ndecisions, but also for you, since this is the world in which you live and\r\nmake your way.\r\n\r\n The passage emphasizes that whatever goes on in the world\r\ntoday _____.', 'is quickly forgotten by the majority.', 'only concerns the sociologist.', 'first makes the headlines in the press.', 'is of great interest to everyone.', 'can easily be ignored by people in power.', 'D', 10, '2026-06-09 06:42:04', '2026-06-09 06:42:04'),
(10, NULL, 1, '8. Never before in history have people been so aware of what is going\r\non in the world.  Television, newspapers and radio keep us continually\r\ninformed and stimulate our interest.  The sociologist’s interest in the world\r\naround him is intense, for society is his field of study.  Indeed, he needs to\r\nknow what is happening in society; he wants to know what makes the\r\nsocial world what it is, how it is organized, why it changes in the ways that\r\nit does.  Such knowledge is valuable not only for those who make great\r\ndecisions, but also for you, since this is the world in which you live and\r\nmake your way.\r\n\r\n It is pointed out in the passage that, among other things,\r\nsociologists are very much interested in _____.', 'our reaction to their studies.', 'the effect of television on education.', 'the reasons for social change.', 'how people make a living in the world.', 'environmental problems.', 'C', 10, '2026-06-09 06:43:11', '2026-06-09 06:45:44'),
(11, NULL, 1, '9. Never before in history have people been so aware of what is going\r\non in the world.  Television, newspapers and radio keep us continually\r\ninformed and stimulate our interest.  The sociologist’s interest in the world\r\naround him is intense, for society is his field of study.  Indeed, he needs to\r\nknow what is happening in society; he wants to know what makes the\r\nsocial world what it is, how it is organized, why it changes in the ways that\r\nit does.  Such knowledge is valuable not only for those who make great\r\ndecisions, but also for you, since this is the world in which you live and\r\nmake your way.\r\n\r\n One may conclude from the passage that the studies made by\r\nsociologists _____.', 'are extremely useful both to decision makers and to ordinary people', 'are of little general interest.', 'receive a lot of attention from the media.', 'are primarily intended for students of sociology.', 'do not adequately reflect real conditions in the world.', 'A', 10, '2026-06-09 06:44:08', '2026-06-09 06:44:08'),
(12, NULL, 1, '10. Every summer many people, girls and women as well as boys and\r\nmen, try to swim from England to France or from France to England.\r\nThe distance at the nearest points is only about twenty miles, but\r\nbecause of the strong currents the distance that must be swum is\r\nusually twice as far.  The first man to succeed in swimming across the\r\nChannel was Captain Webb, an Englishman.  This was in August 1875. He\r\nlanded in France 21 hours 45 minutes after entering the water at Dover.\r\nSince then there have been many successful swims and the time has been\r\nshortened.  One French swimmer crossed in 11 hours and 5 minutes.\r\n\r\n Swimming the Channel is not as easy as it might seem _____', 'as the distance between the two counties is far too much.', 'and it always takes more or less 20 hours.', 'and only two people have managed to do it so far.', 'so few people even try to swim it.', 'for there are very strong currents.', 'E', 10, '2026-06-09 06:45:10', '2026-06-09 06:45:10'),
(14, 18, NULL, 'who', 'ahoe', 'eosjf', 'eohdioha', 'esohioe', 'xeiojo', 'E', 10, '2026-06-26 03:12:15', '2026-06-26 03:12:15');

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
('bNNQ6X3Bg1MBBnJGvpkBexq0GxTfbJGAjqhhUB2W', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'eyJfdG9rZW4iOiJ0Z1BVRDhmZlF0dEJTS3RkMEJUcnlQYktseGZrWlk4ZkxPb0FZek1SIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo5MDAwXC9taXNzaW9ucyIsInJvdXRlIjoibWlzc2lvbnMifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6NH0=', 1782956851),
('VaN6xb7xAiFFU3dUqaebFlzTMd5PJvJ6XDFyxpC9', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI1S2J0V0hVV2k5TkcxWFFlejFKZllnZGh4elcwZ2dvOEk5enpuWlYzIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo5MDAwXC9taXNzaW9uc1wvYXNzZXNzbWVudFwvcmVzdWx0XC8yMyIsInJvdXRlIjoic3R1ZGVudC5hc3Nlc3NtZW50LnJlc3VsdCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjozfQ==', 1782956926);

-- --------------------------------------------------------

--
-- Struktur dari tabel `speaking_materials`
--

CREATE TABLE `speaking_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `instruction` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passage` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `speaking_materials`
--

INSERT INTO `speaking_materials` (`id`, `lesson_id`, `title`, `instruction`, `image`, `created_at`, `updated_at`, `passage`) VALUES
(2, 2, 'speaking', 'spekaing unit 1\r\nlets start', 'speaking/vhGcG0bPJNKUCJnjG18MuI7BZQLFCEvbJWdXmXDx.png', '2026-06-10 23:39:39', '2026-06-10 23:39:39', NULL),
(3, 4, 'speaking3', 'spekaing13', 'speaking/MoAdLoWVk8w8OxcpJz2Ny1iba0mTzIkkE3F1ING2.png', '2026-06-10 23:48:07', '2026-06-18 06:32:25', 'look a this12223');

-- --------------------------------------------------------

--
-- Struktur dari tabel `speaking_questions`
--

CREATE TABLE `speaking_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `speaking_material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `speaking_questions`
--

INSERT INTO `speaking_questions` (`id`, `lesson_id`, `speaking_material_id`, `question`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 'this lets spekaing descrive33', 'speaking-questions/EuQqfbryRfx3jIQFyOqj88D9VPFw9mbahOsWwb2C.png', '2026-06-11 00:57:36', '2026-06-18 06:37:23'),
(3, 20, NULL, 'who is he', 'speaking-questions/JnrmXuiWNpbgUCmKz6abmIUm5j9NUdDgWDPg0KXb.jpg', '2026-06-28 04:58:40', '2026-06-28 04:58:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `speaking_submissions`
--

CREATE TABLE `speaking_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `speaking_material_id` bigint(20) UNSIGNED NOT NULL,
  `audio_file` varchar(255) NOT NULL,
  `transcript` longtext DEFAULT NULL,
  `details_score` int(11) DEFAULT NULL,
  `fluency_score` int(11) DEFAULT NULL,
  `pronunciation_score` int(11) DEFAULT NULL,
  `vocabulary_score` int(11) DEFAULT NULL,
  `grammar_score` int(11) DEFAULT NULL,
  `total_score` int(11) DEFAULT NULL,
  `feedback` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','processing','completed') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `speaking_submissions`
--

INSERT INTO `speaking_submissions` (`id`, `user_id`, `speaking_material_id`, `audio_file`, `transcript`, `details_score`, `fluency_score`, `pronunciation_score`, `vocabulary_score`, `grammar_score`, `total_score`, `feedback`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 3, 'speaking/OYl6QPynDUjJ0x1XVSsfbfkgNzLq4K7xJIU10j0l.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 04:51:26', '2026-06-11 04:51:26', 'processing'),
(2, 1, 3, 'speaking/ks8WuLxIArVXYeiyvgtkLyFO9ez1Yu3V0Gptrx9r.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 04:57:44', '2026-06-11 04:57:44', 'processing'),
(3, 1, 3, 'speaking/FWfpsFhJ91HK1LW5mXct3WOYOfgRJjvpWSyn5Uli.webm', 'This is a test transcript.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 05:00:38', '2026-06-11 05:00:38', 'processing'),
(4, 1, 3, 'speaking/zkjB4bC7uKmyJnMqInWt8WfGyK2gLuatyU4pEANv.webm', 'This is a test transcript.', 4, 3, 4, 3, 4, 90, 'Good speaking performance. Try to improve vocabulary range.', '2026-06-11 05:08:48', '2026-06-11 05:08:48', 'completed'),
(5, 1, 3, 'speaking/RGmVRmJ6r1LXMHDVjHsZk9sdGvRZWSLU7zNQJTZU.webm', 'This is a test transcript.', 4, 3, 4, 3, 4, 90, 'Good speaking performance. Try to improve vocabulary range.', '2026-06-11 05:23:59', '2026-06-11 05:23:59', 'completed'),
(6, 1, 3, 'speaking/NtfMEF6tdXftLgI2NUZ90jL0xgSOBA8xYH22SZky.webm', 'This is a test transcript.', 4, 3, 4, 3, 4, 90, 'Good speaking performance. Try to improve vocabulary range.', '2026-06-11 05:27:17', '2026-06-11 05:27:18', 'completed'),
(7, 1, 3, 'speaking/1wtPVpGZHjM7R5mqDyyzV1e45swH7IvuHgCYw9Wd.webm', 'This is a test transcript.', 4, 3, 4, 3, 4, 90, 'Good speaking performance. Try to improve vocabulary range.', '2026-06-11 05:34:42', '2026-06-11 05:34:42', 'completed'),
(8, 1, 3, 'speaking/BBTLqw08nLbSquVo5re8p453OVut4MRnCYTxXp9V.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 05:39:35', '2026-06-11 05:39:35', 'processing'),
(9, 1, 3, 'speaking/v2p3iIeLj56aQKYjjFsmTiZxTA2fqY6hV5CUPjHa.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 05:39:54', '2026-06-11 05:39:54', 'processing'),
(10, 1, 3, 'speaking/BE1fmhCFyq7tvS251JAAJSxSb41KuM3emHPMLg5I.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:08:21', '2026-06-11 06:08:21', 'processing'),
(11, 1, 3, 'speaking/8dPgZ5IkEbGLa6Hk3Bw1JTCN5Qrvfv1foDGO3eWt.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:11:12', '2026-06-11 06:11:12', 'processing'),
(12, 1, 3, 'speaking/yBAN9I4epK8mHbgZFyL08yaH4rgL1VuNf0npydTv.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:14:48', '2026-06-11 06:14:48', 'processing'),
(13, 1, 3, 'speaking/SNccaqC89kLKTbPRub5Nxq8PmpokCPdDabTLaoa4.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:16:51', '2026-06-11 06:16:51', 'processing'),
(14, 1, 3, 'speaking/8WU3OKJjRfbDdUtMEfei3KofVHe9vP6soIKOspsN.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:19:10', '2026-06-11 06:19:10', 'processing'),
(15, 1, 3, 'speaking/lS8V3Ir2wXxiH6hTxhHOZ0IcJ0Jv6Y2EuZa6IeQH.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:24:22', '2026-06-11 06:24:22', 'processing'),
(16, 1, 3, 'speaking/uMcAxKTXpghYVU3zYcGr6GnxqsvdDwdKE99xgYIo.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:28:21', '2026-06-11 06:28:21', 'processing'),
(17, 1, 3, 'speaking/4pfIQIXAanPXkaQk2z6tE7bM6ADrAI4WSMIfHCOk.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:32:56', '2026-06-11 06:32:56', 'processing'),
(18, 1, 3, 'speaking/BpDECBYJxKi23nQfQvbpdNav03eLpQ0VhFukZAFT.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:40:58', '2026-06-11 06:40:58', 'processing'),
(19, 1, 3, 'speaking/NLHveQNuhNWVcRaL3w28dCWbmzUeyKaIIUviuYsW.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 06:44:58', '2026-06-11 06:44:58', 'processing'),
(20, 1, 3, 'speaking/CbCooUcIqxF4IjnXEUciiJQQ80brZbj4p9QBmUmq.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 07:57:14', '2026-06-11 07:57:14', 'processing'),
(21, 1, 3, 'speaking/StTkvfLZ6CaqG1gBXP1LzKvJvYIxKYUAxk6Q0pMz.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 07:59:52', '2026-06-11 07:59:52', 'processing'),
(22, 1, 3, 'speaking/LuQfogiuKNw8XN3fQ0RCcmp6VcK4ziE6YvZ5CIlY.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:06:15', '2026-06-11 08:06:15', 'processing'),
(23, 1, 3, 'speaking/TzkDmENHlXVxjF7g6QmYYdPNhiP3ItcALWjsmwZj.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:11:54', '2026-06-11 08:11:54', 'processing'),
(24, 1, 3, 'speaking/RYOxj2uoTAczPPGfU3K7aaoovjAIHoozeDlOKvWN.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:12:48', '2026-06-11 08:12:48', 'processing'),
(25, 1, 3, 'speaking/wP4VK1Rwdx9pq3t8CVNaEYtBgCThKu6R3AkGMtN4.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:14:45', '2026-06-11 08:14:45', 'processing'),
(26, 1, 3, 'speaking/IbN00GOsCggWTMmK0iAeXWF0TqJOoC7WFNNLkA6G.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:16:32', '2026-06-11 08:16:32', 'processing'),
(27, 1, 3, 'speaking/hMa8RJzAqGNV1fY5B3MuUFucByLPIVIS9m74jfcS.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:17:36', '2026-06-11 08:17:36', 'processing'),
(28, 1, 3, 'speaking/pAld7aiWaWals1775pCSxpMHcJM5hGJm0wxPHYTR.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:23:50', '2026-06-11 08:23:50', 'processing'),
(29, 1, 3, 'speaking/9LmBLsuzXkD0pY62nlDsvGWuKbQI1DXg0f9Nj4iv.webm', 'This is a test transcript.', 4, 4, 4, 4, 4, 100, 'The speaker demonstrated excellent performance across all areas. The details provided were clear and concise, fluency was smooth and natural, pronunciation was accurate, vocabulary was appropriate and varied, and grammar usage was flawless. Overall, this transcript reflects a high level of proficiency in English speaking.', '2026-06-11 08:30:28', '2026-06-11 08:30:40', 'completed'),
(30, 1, 3, 'speaking/UPKX9IekMTIrdawYsG26YJu3IvIvdTIP3WUY1fvV.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:39:30', '2026-06-11 08:39:30', 'processing'),
(31, 1, 3, 'speaking/ypErcsQXSrsb7n8zaoIdGBd0dk2jXz7kb8NJuMpW.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:41:31', '2026-06-11 08:41:31', 'processing'),
(32, 1, 3, 'speaking/6GESXAor4LZxwQcSuVVGMEapXLbtm6jukwmb5nYa.webm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-11 08:44:08', '2026-06-11 08:44:08', 'processing'),
(33, 3, 3, 'speaking/X6qrcxSOVmYOqbPt306WSI5Yqd24fnEC3Gbra5RR.webm', 'This is a test transcript.', 4, 4, 4, 4, 4, 100, 'The speaker demonstrated excellent performance across all assessed areas. The details provided were clear and precise, fluency was smooth and natural, pronunciation was accurate, vocabulary was varied and appropriate, and grammar usage was flawless. Overall, this was an outstanding transcript.', '2026-06-11 08:49:47', '2026-06-11 08:49:52', 'completed'),
(34, 3, 3, 'speaking/JYYP8QQ3ipOB0r1jmVWKWoZcKK4LspmYIdqhZv3C.webm', 'This is a test transcript.', 1, 1, 1, 1, 1, 25, 'The transcript shows little understanding of the story, with no clear orientation, complication, or resolution. Speech is slow and hesitant, making it difficult to follow. Pronunciation is unclear and hard to understand. Vocabulary is weak and does not fit the context. Grammar errors are frequent and obscure meaning. Improvement is needed in all areas to achieve better communication and comprehension.', '2026-06-11 09:00:34', '2026-06-11 09:00:38', 'completed'),
(35, 3, 3, 'speaking/zrSbZ8jm8SZKHEnPDaKueQLKL5DTvIJFSUEdpmsP.webm', 'This is a test transcript.', 1, 1, 1, 1, 1, 25, 'The student shows little understanding of the story, with no clear orientation, complication, or resolution. Speech is slow, hesitant, and difficult to follow. Pronunciation is hard to understand, vocabulary is weak and does not fit the context, and grammar errors obscure meaning.', '2026-06-11 09:01:57', '2026-06-11 09:02:01', 'completed'),
(36, 3, 3, 'speaking/Xsx7HbGHuTJRDO1KLc8bLHJoJnnZkQCEMZk7bBes.webm', 'This is a test transcript.', 1, 2, 1, 1, 1, 30, 'The speaker showed some effort in answering the question, but there were difficulties with pronunciation, grammar, and vocabulary. Fluency was limited and the response lacked sufficient detail. Continued practice will help improve speaking confidence and communication skills.', '2026-06-11 09:06:29', '2026-06-11 09:06:34', 'completed'),
(37, 3, 3, 'speaking/HFWQQujMMdZOKEMxe45JBhAgoI4oOWfWs38of8KZ.webm', 'This is a test transcript.', 1, 2, 1, 1, 1, 30, 'The speaker showed some effort in answering the question, but there were difficulties with pronunciation, grammar, and vocabulary. Fluency was limited and the response lacked sufficient detail. Continued practice will help improve speaking confidence and communication skills.', '2026-06-11 09:09:00', '2026-06-11 09:09:06', 'completed'),
(38, 3, 3, 'speaking/j2NSWqJr6bWj87qbBIei0YpxkYFs5BtPUHYXdzXg.webm', 'This is a test transcript.', 1, 2, 1, 1, 1, 30, 'The speaker showed some effort in answering the question, but there were difficulties with pronunciation, grammar, and vocabulary. Fluency was limited and the response lacked sufficient detail. Continued practice will help improve speaking confidence and communication skills.', '2026-06-11 09:10:58', '2026-06-11 09:11:02', 'completed'),
(39, 3, 3, 'speaking/WhNMst34MwbFd7YTl8q3wdiwNnEZhERMD30Dnz6P.webm', 'This is a test transcript.', 1, 2, 1, 1, 1, 30, 'The speaker showed some effort in answering the question, but there were difficulties with pronunciation, grammar, and vocabulary. Fluency was limited and the response lacked sufficient detail. Continued practice will help improve speaking confidence and communication skills.', '2026-06-11 18:27:02', '2026-06-11 18:27:09', 'completed'),
(40, 3, 3, 'speaking/kORJDhAvYoMZPkJlk8seZrreQYOcXl6yTABQsxQf.webm', 'This is a test transcript.', 1, 2, 1, 1, 1, 30, 'The speaker showed some effort in answering the question, but there were difficulties with pronunciation, grammar, and vocabulary. Fluency was limited and the response lacked sufficient detail. Continued practice will help improve speaking confidence and communication skills.', '2026-06-11 19:26:35', '2026-06-11 19:26:39', 'completed');

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
(2, 'UNIT 1', 'What Fables Do You Like to Read?', NULL, 2, 'unit', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
(3, 'UNIT 2', 'What Is It?', NULL, 3, 'unit', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
(4, 'UNIT 3', 'Could You Show Me How to Operate It?', NULL, 4, 'unit', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
(5, 'UNIT 4', 'Which Issues Do You Agree with?', NULL, 5, 'unit', 'active', '2026-06-07 20:31:13', '2026-06-07 20:31:13'),
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
(3, 'adik', 'adiknurhalimah@gmail.com', 'student', NULL, '$2y$12$XxDwzHEgXGC9lt0QqWGq4uamBudbpeCCZfm6gO3ZL3oeNzcczSwIi', NULL, '2026-05-20 16:30:40', '2026-05-20 16:30:40'),
(4, 'emo', 'emo@gmail.com', 'student', NULL, '$2y$12$AxtY3hkaQHR3ZnNMnjU/ju7dnIJmUpkQd2UKs9TA2bmWy0kS35dhW', NULL, '2026-07-01 06:33:44', '2026-07-01 06:33:44');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `writing_materials`
--

CREATE TABLE `writing_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `instruction` text DEFAULT NULL,
  `passage` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `writing_materials`
--

INSERT INTO `writing_materials` (`id`, `lesson_id`, `title`, `instruction`, `passage`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'writing 12', 'test start writing5556', 'yooww writing12', 'writing/s4HwTMrjLabCoveuiwC5ca1EZtpodP4Qn3NUeyOJ.jpg', '2026-06-11 11:34:32', '2026-06-18 06:46:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `writing_questions`
--

CREATE TABLE `writing_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `writing_material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sample_answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `writing_questions`
--

INSERT INTO `writing_questions` (`id`, `lesson_id`, `writing_material_id`, `question`, `image`, `sample_answer`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'descrive and writing this picture8999', 'writing-questions/J12vvkiOPSFCC7gHSWvvLn8NPCIBuq3Y6IpCX0qa.jpg', NULL, '2026-06-11 11:43:05', '2026-06-18 06:47:14'),
(4, 19, NULL, 'describe the picture below!', 'writing-questions/r0GULTiExAUmnAHt0MXlhjFGCkfWGB73A987HnN6.png', NULL, '2026-06-28 04:57:41', '2026-07-01 09:11:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `writing_submissions`
--

CREATE TABLE `writing_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `writing_material_id` bigint(20) UNSIGNED NOT NULL,
  `answer` longtext NOT NULL,
  `orientation_score` int(11) DEFAULT NULL,
  `complication_score` int(11) DEFAULT NULL,
  `resolution_score` int(11) DEFAULT NULL,
  `organization_score` int(11) DEFAULT NULL,
  `mechanics_score` int(11) DEFAULT NULL,
  `final_score` int(11) DEFAULT NULL,
  `feedback` longtext DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `writing_submissions`
--

INSERT INTO `writing_submissions` (`id`, `user_id`, `writing_material_id`, `answer`, `orientation_score`, `complication_score`, `resolution_score`, `organization_score`, `mechanics_score`, `final_score`, `feedback`, `submitted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'the picture show fire and fire', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 15:36:18', '2026-06-11 15:36:18'),
(2, 3, 1, 'the picture show fire and fire', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 15:36:25', '2026-06-11 15:36:25'),
(3, 3, 1, 'i can see picture show fire and fire', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 15:38:57', '2026-06-11 15:38:57'),
(4, 3, 1, 'i can see picture show fire and fire', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 15:39:00', '2026-06-11 15:39:00'),
(5, 3, 1, 'i can see picture show fire and fire', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 15:39:01', '2026-06-11 15:39:01'),
(6, 3, 1, 'i can see picture show fire and firee', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 15:40:39', '2026-06-11 15:40:39'),
(7, 3, 1, 'ican see fire and fire in picture', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 15:43:05', '2026-06-11 15:43:05'),
(8, 3, 1, 'the picture show fire and fire', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 18:26:13', '2026-06-11 18:26:13'),
(9, 3, 1, 'this is a picture of a forest fire', 1, 1, 1, 1, 1, 10, 'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.', NULL, '2026-06-11 19:25:30', '2026-06-11 19:25:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `assessment_answers`
--
ALTER TABLE `assessment_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessment_answers_assessment_submission_id_foreign` (`assessment_submission_id`);

--
-- Indeks untuk tabel `assessment_submissions`
--
ALTER TABLE `assessment_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessment_submissions_user_id_foreign` (`user_id`),
  ADD KEY `assessment_submissions_unit_id_foreign` (`unit_id`),
  ADD KEY `assessment_submissions_lesson_id_foreign` (`lesson_id`);

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
-- Indeks untuk tabel `listening_materials`
--
ALTER TABLE `listening_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listening_materials_lesson_id_foreign` (`lesson_id`);

--
-- Indeks untuk tabel `listening_questions`
--
ALTER TABLE `listening_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listening_questions_listening_material_id_foreign` (`listening_material_id`);

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
-- Indeks untuk tabel `speaking_materials`
--
ALTER TABLE `speaking_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speaking_materials_lesson_id_foreign` (`lesson_id`);

--
-- Indeks untuk tabel `speaking_questions`
--
ALTER TABLE `speaking_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speaking_questions_speaking_material_id_foreign` (`speaking_material_id`);

--
-- Indeks untuk tabel `speaking_submissions`
--
ALTER TABLE `speaking_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speaking_submissions_user_id_foreign` (`user_id`),
  ADD KEY `speaking_submissions_speaking_material_id_foreign` (`speaking_material_id`);

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
-- Indeks untuk tabel `writing_materials`
--
ALTER TABLE `writing_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writing_materials_lesson_id_foreign` (`lesson_id`);

--
-- Indeks untuk tabel `writing_questions`
--
ALTER TABLE `writing_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writing_questions_writing_material_id_foreign` (`writing_material_id`);

--
-- Indeks untuk tabel `writing_submissions`
--
ALTER TABLE `writing_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writing_submissions_user_id_foreign` (`user_id`),
  ADD KEY `fk_writing_material` (`writing_material_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `assessment_answers`
--
ALTER TABLE `assessment_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `assessment_submissions`
--
ALTER TABLE `assessment_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `listening_materials`
--
ALTER TABLE `listening_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `listening_questions`
--
ALTER TABLE `listening_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `reading_materials`
--
ALTER TABLE `reading_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `reading_questions`
--
ALTER TABLE `reading_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `speaking_materials`
--
ALTER TABLE `speaking_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `speaking_questions`
--
ALTER TABLE `speaking_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `speaking_submissions`
--
ALTER TABLE `speaking_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT untuk tabel `writing_materials`
--
ALTER TABLE `writing_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `writing_questions`
--
ALTER TABLE `writing_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `writing_submissions`
--
ALTER TABLE `writing_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `assessment_answers`
--
ALTER TABLE `assessment_answers`
  ADD CONSTRAINT `assessment_answers_assessment_submission_id_foreign` FOREIGN KEY (`assessment_submission_id`) REFERENCES `assessment_submissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `assessment_submissions`
--
ALTER TABLE `assessment_submissions`
  ADD CONSTRAINT `assessment_submissions_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assessment_submissions_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assessment_submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `listening_materials`
--
ALTER TABLE `listening_materials`
  ADD CONSTRAINT `listening_materials_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `listening_questions`
--
ALTER TABLE `listening_questions`
  ADD CONSTRAINT `listening_questions_listening_material_id_foreign` FOREIGN KEY (`listening_material_id`) REFERENCES `listening_materials` (`id`) ON DELETE CASCADE;

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
-- Ketidakleluasaan untuk tabel `speaking_materials`
--
ALTER TABLE `speaking_materials`
  ADD CONSTRAINT `speaking_materials_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `speaking_questions`
--
ALTER TABLE `speaking_questions`
  ADD CONSTRAINT `speaking_questions_speaking_material_id_foreign` FOREIGN KEY (`speaking_material_id`) REFERENCES `speaking_materials` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `speaking_submissions`
--
ALTER TABLE `speaking_submissions`
  ADD CONSTRAINT `speaking_submissions_speaking_material_id_foreign` FOREIGN KEY (`speaking_material_id`) REFERENCES `speaking_materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `speaking_submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vocabulary_pretest_results`
--
ALTER TABLE `vocabulary_pretest_results`
  ADD CONSTRAINT `vocabulary_pretest_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `writing_materials`
--
ALTER TABLE `writing_materials`
  ADD CONSTRAINT `writing_materials_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `writing_questions`
--
ALTER TABLE `writing_questions`
  ADD CONSTRAINT `writing_questions_writing_material_id_foreign` FOREIGN KEY (`writing_material_id`) REFERENCES `writing_materials` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `writing_submissions`
--
ALTER TABLE `writing_submissions`
  ADD CONSTRAINT `fk_writing_material` FOREIGN KEY (`writing_material_id`) REFERENCES `writing_materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `writing_submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
