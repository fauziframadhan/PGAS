-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 06:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgas`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentid` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentid`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', '2023-09-20 21:15:43', '2023-09-20 21:15:43'),
(2, 'Human Capital', '2023-09-20 21:16:23', '2023-09-20 21:16:23'),
(3, 'Finance & Accounting', '2023-09-20 21:16:45', '2023-09-20 21:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeid` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departmentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeid`, `name`, `created_at`, `updated_at`, `departmentid`) VALUES
(1, 'Budi', '2023-09-20 21:18:46', '2023-09-20 21:21:10', 1),
(2, 'Iwan', '2023-09-20 21:21:23', '2023-09-20 21:21:23', 2),
(3, 'Susi', '2023-09-20 21:21:37', '2023-09-20 21:21:37', 3),
(4, 'Amir', '2023-09-20 21:21:49', '2023-09-20 21:21:49', 1),
(5, 'Primus', '2023-09-20 21:21:58', '2023-09-20 21:21:58', 1),
(6, 'Tuti', '2023-09-20 21:22:08', '2023-09-20 21:22:08', 2),
(7, 'Sinta', '2023-09-20 21:22:17', '2023-09-20 21:22:17', 2),
(8, 'Santi', '2023-09-20 21:22:31', '2023-09-20 21:22:31', 3),
(9, 'Badu', '2023-09-20 21:22:44', '2023-09-20 21:22:44', 3),
(10, 'Marfu\'ah', '2023-09-20 21:22:56', '2023-09-20 21:22:56', 3);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_20_103414_create_employees_table', 1),
(6, '2023_09_20_104749_create_departments_table', 1),
(7, '2023_09_20_104812_create_spendings_table', 1),
(8, '2023_09_21_033816_add_departmentid_to_employees_table', 1),
(9, '2023_09_21_033906_add_employeeid_to_spendings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spendings`
--

CREATE TABLE `spendings` (
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spendings`
--

INSERT INTO `spendings` (`date`, `value`, `created_at`, `updated_at`, `employeeid`) VALUES
('2020-03-04', 3000000, '2023-09-20 21:25:15', '2023-09-20 21:25:15', 1),
('2020-04-06', 9826000, '2023-09-20 21:25:47', '2023-09-20 21:25:47', 4),
('2020-04-06', 43879200, '2023-09-20 21:26:28', '2023-09-20 21:26:28', 5),
('2020-09-08', 8983400, '2023-09-20 21:27:01', '2023-09-20 21:27:01', 4),
('2020-12-06', 2425600, '2023-09-20 21:27:25', '2023-09-20 21:27:25', 6),
('2021-04-02', 879200, '2023-09-20 21:27:49', '2023-09-20 21:27:49', 7),
('2021-04-02', 68892340, '2023-09-20 21:28:13', '2023-09-20 21:28:13', 2),
('2021-05-01', 3500000, '2023-09-20 21:28:43', '2023-09-20 21:28:43', 3),
('2021-07-03', 576800, '2023-09-20 21:29:03', '2023-09-20 21:29:03', 3),
('2021-07-03', 6786730, '2023-09-20 21:29:29', '2023-09-20 21:29:29', 4),
('2021-08-02', 7893400, '2023-09-20 21:29:59', '2023-09-20 21:29:59', 8),
('2021-10-03', 8200450, '2023-09-20 21:30:25', '2023-09-20 21:30:25', 3),
('2021-12-23', 8982300, '2023-09-20 21:30:56', '2023-09-20 21:30:56', 1),
('2022-03-02', 334890, '2023-09-20 21:32:49', '2023-09-20 21:32:49', 2),
('2022-04-06', 2342460, '2023-09-20 21:33:15', '2023-09-20 21:33:15', 5),
('2022-04-11', 78923400, '2023-09-20 21:33:37', '2023-09-20 21:33:37', 2),
('2022-11-05', 23244600, '2023-09-20 21:34:02', '2023-09-20 21:34:02', 6),
('2022-11-05', 32324900, '2023-09-20 21:34:22', '2023-09-20 21:34:22', 3),
('2023-01-03', 5500100, '2023-09-20 21:34:47', '2023-09-20 21:34:47', 6),
('2023-03-27', 2342350, '2023-09-20 21:35:06', '2023-09-20 21:35:06', 5),
('2023-04-02', 2423400, '2023-09-20 21:35:30', '2023-09-20 21:35:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fauzi Fadlul Ramadhan', 'fauzifadlulramadhan1@gmail.com', NULL, '$2y$10$ZCQrUTo3NWlQSwFzj01kg.hS4mGA.r/EBrmHjfEBDuPjFCpbKPlAm', NULL, '2023-09-20 21:11:21', '2023-09-20 21:11:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
