-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 06:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acad_services_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2022_06_02_130411_create_user', 1),
(23, '2022_06_02_131100_create_role', 1),
(24, '2022_06_02_131138_create_userrole', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', '0f9acbfc-cc17-4ac8-96dd-1ca74c43cee5', 'auth_token', 'ea024e5f6a2d2de151c69604011afebcc7731200ef6d361f51e00c891bb02d0f', '[\"*\"]', NULL, '2022-06-02 08:06:31', '2022-06-02 08:06:31'),
(2, 'App\\Models\\User', '0f9acbfc-cc17-4ac8-96dd-1ca74c43cee5', 'auth_token', 'ba12a7c4bebf3d9b8c568d45ca9592cca7086a3554238a3997046be00a146322', '[\"*\"]', NULL, '2022-06-02 08:06:49', '2022-06-02 08:06:49'),
(3, 'App\\Models\\User', '0f9acbfc-cc17-4ac8-96dd-1ca74c43cee5', 'auth_token', 'e24a7144cddec6b087347b1200f5ac1da35a8dc7c27ce8ab59ddea3dcc7c025a', '[\"*\"]', NULL, '2022-06-02 08:10:55', '2022-06-02 08:10:55'),
(4, 'App\\Models\\User', '0f9acbfc-cc17-4ac8-96dd-1ca74c43cee5', 'auth_token', '5681ff83f8c65a39bcf1770e98e585f806b728bdd685196c594e0736cdc12333', '[\"*\"]', NULL, '2022-06-02 08:12:20', '2022-06-02 08:12:20'),
(5, 'App\\Models\\User', '0f9acbfc-cc17-4ac8-96dd-1ca74c43cee5', 'auth_token', '18f43a193a5f4e9ad5f47a40b02a953a11439aae0e84e46f3d52183950435da1', '[\"*\"]', NULL, '2022-06-02 08:12:51', '2022-06-02 08:12:51'),
(6, 'App\\Models\\User', '0f9acbfc-cc17-4ac8-96dd-1ca74c43cee5', 'auth_token', '9cd9179a4fb99a6c349d118748095cf53cb6d96df70689592471ccb747dbdf18', '[\"*\"]', NULL, '2022-06-02 08:15:44', '2022-06-02 08:15:44'),
(7, 'App\\Models\\User', '0f9acbfc-cc17-4ac8-96dd-1ca74c43cee5', 'auth_token', '2c0615ff5a19529f824ff1c79f410a5b2085b9d8f2f641817ecf6aff3dab696f', '[\"*\"]', '2022-06-02 08:16:26', '2022-06-02 08:16:16', '2022-06-02 08:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', 'Client', 'N/A', NULL, NULL, '1', '2022-06-02 16:00:00', NULL, NULL),
('9124df97-d15f-4c15-93a0-e95de079c104', 'Cashier', 'N/A', NULL, NULL, '1', '2022-06-02 16:00:00', NULL, NULL),
('99868717-5ddd-4311-af35-09f73da7a826', 'Admin', 'N/A', NULL, NULL, '1', '2022-06-02 16:00:00', NULL, NULL),
('dfca8de3-277b-4733-b694-9b142988b58a', 'Head', 'N/A', NULL, NULL, '1', '2022-06-02 16:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `created_by`, `updated_by`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('66539709-3f78-4628-908c-864d417b2498', 'admin@test.com', NULL, NULL, '1', '$2y$10$vr0lMVXFbkJuVaUUNFjHdeO7y.e9XMAjEVAYTBTgw7BXK8kb17HRe', NULL, '2022-06-02 08:19:16', '2022-06-02 08:19:16', NULL),
('fe4741c9-dcb4-4415-89e3-79e71ab221d1', 'student@test.com', NULL, NULL, '1', '$2y$10$Qm2eBWprh7yr3FIePs3/heEQwlE8OFxyGza58Fkzrmr4426eb03MK', NULL, '2022-06-02 08:18:54', '2022-06-02 08:18:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`, `start_date`, `end_date`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('66539709-3f78-4628-908c-864d417b2498', '99868717-5ddd-4311-af35-09f73da7a826', NULL, NULL, NULL, NULL, '1', '2022-06-02 08:19:16', '2022-06-02 08:19:16', NULL),
('fe4741c9-dcb4-4415-89e3-79e71ab221d1', '8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', NULL, NULL, NULL, NULL, '1', '2022-06-02 08:18:54', '2022-06-02 08:18:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_created_by_foreign` (`created_by`),
  ADD KEY `roles_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`),
  ADD KEY `user_roles_created_by_foreign` (`created_by`),
  ADD KEY `user_roles_updated_by_foreign` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
