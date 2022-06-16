-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 12:25 AM
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
-- Table structure for table `ace_requests`
--

CREATE TABLE `ace_requests` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ace_total_units_on_regi` int(11) DEFAULT NULL,
  `ace_academic_year_from` year(4) DEFAULT NULL,
  `ace_academic_year_to` year(4) DEFAULT NULL,
  `ace_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_request_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acknowledgments`
--

CREATE TABLE `acknowledgments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) DEFAULT NULL,
  `program_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `last_name`, `first_name`, `middle_name`, `extension_name`, `student_number`, `section`, `user_id`, `year`, `program_id`, `semester_id`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1dd73fb5-991d-412f-9876-ce7f4c303be3', 'Student', 'Student', NULL, NULL, '2045-CM-32', NULL, 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, NULL, NULL, 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', '2', '2022-06-09 04:29:20', '2022-06-16 14:21:48', NULL),
('3064804e-b4bf-4fb3-88f5-6e72b275cacd', 'Admin', 'Admin', NULL, NULL, NULL, NULL, 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, NULL, NULL, 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '2', '2022-06-09 04:28:31', '2022-06-09 04:28:31', NULL);

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
(2, '2022_06_02_130411_create_user', 2),
(3, '2022_06_02_131100_create_role', 2),
(4, '2022_06_02_131138_create_userrole', 2),
(8, '2022_06_07_112021_create_client', 2),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(13, '2022_06_03_123217_create_request', 3),
(14, '2022_06_04_061559_create_requirement', 3),
(15, '2022_06_04_120722_create_step', 3),
(16, '2022_06_08_053445_create_submitted_request', 3),
(17, '2022_06_08_110517_create_submitted_requirement', 3),
(18, '2022_06_09_074956_create_receipt', 3),
(19, '2022_06_13_044309_create_ace_request', 4),
(20, '2022_06_13_144508_create_acknowledgment', 5),
(21, '2022_06_14_125324_create_tagged_subject', 6);

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

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_request_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double(8,2) NOT NULL DEFAULT 0.00,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certified_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signed_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `paid_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request_type`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0afbae0a-c871-4fc8-9578-c162cd9dda3d', 'Certification Request', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:54:30', '2022-06-16 00:54:30', NULL),
('3f62f4f9-d33f-4266-b7b8-3c7509a61dcd', 'Subject Tutorial Request', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:54:17', '2022-06-16 00:54:17', NULL),
('592783dc-e4ba-4bf4-b428-0c490be6a840', 'Subject Petition', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:53:49', '2022-06-16 00:53:49', NULL),
('6e8c76d9-85d3-4218-98d4-d8b6f7914ea2', 'Adding of Subject', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:52:34', '2022-06-16 00:52:34', NULL),
('958c1671-353b-472f-bead-2dcfd11ed1a8', 'Shifting', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:53:25', '2022-06-16 00:53:25', NULL),
('b3d5680f-c0b5-455e-8521-bfb10f5f2353', 'Manual Enrolment', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:53:38', '2022-06-16 00:53:38', NULL),
('b6668f3e-1fcf-421f-9de9-aa838203ef91', 'Cross-enrolment', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:53:14', '2022-06-16 00:53:14', NULL),
('d17f98a3-5cef-4867-acec-f6375899fa7d', 'Change of Subject or Schedule', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:52:51', '2022-06-16 00:52:51', NULL),
('db952c25-de00-40a6-8833-6fe151de6c78', 'Overload', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:52:16', '2022-06-16 00:52:16', NULL),
('f4aade9a-4e04-447f-b025-883dd90d1638', 'Grade Correction and Reporting', 'f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', NULL, '1', '2022-06-16 00:53:04', '2022-06-16 00:53:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirement_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', 'Client', 'N/A', NULL, NULL, '1', '2022-06-08 16:00:00', NULL, NULL),
('9124df97-d15f-4c15-93a0-e95de079c104', 'Cashier', 'N/A', NULL, NULL, '1', '2022-06-08 16:00:00', NULL, NULL),
('99868717-5ddd-4311-af35-09f73da7a826', 'Admin', 'N/A', NULL, NULL, '1', '2022-06-08 16:00:00', NULL, NULL),
('dfca8de3-277b-4733-b694-9b142988b58a', 'Head', 'N/A', NULL, NULL, '1', '2022-06-08 16:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_number` int(11) NOT NULL,
  `step_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submitted_requests`
--

CREATE TABLE `submitted_requests` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `completed_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `release_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `signed_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `signed_student_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `request_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_deadline` date NOT NULL,
  `school_year` year(4) NOT NULL,
  `control_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forward_to` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submitted_requirements`
--

CREATE TABLE `submitted_requirements` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirement_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirement_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `signed_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `rejection_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_request_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagged_subjects`
--

CREATE TABLE `tagged_subjects` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ace_request_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acad_head` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagged_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acknowledged_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `no_of_units` int(11) NOT NULL,
  `room_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('a62a2519-dfde-4620-acb1-6b31a322893a', 'admin@test.com', NULL, NULL, '1', '$2y$10$802s0f0JDpeVIWP4bW89nubkXKuDWphq1rniUUvUY7mibES30.VTK', NULL, '2022-06-09 02:02:03', '2022-06-09 02:02:03', NULL),
('aa900242-8836-471a-8a3f-8a2b200e47a0', 'testo@test.com', NULL, NULL, '1', '$2y$10$8umVnS4vLkCpYANBpZoNXOYa0gLQJG7coqas7Dvj4UjeOfiv77naW', NULL, '2022-06-11 03:26:13', '2022-06-11 03:26:13', NULL),
('c0624411-7d62-4061-ac63-839c159a207c', 'testo@testo.com117=aaae4aaaa1221', NULL, NULL, '1', '$2y$10$qpWHDWVaDcXqsCuKAe2KquUG3Td382sH7wW1KZ89xbL1uYHhc8t3u', NULL, '2022-06-11 03:26:02', '2022-06-11 03:26:02', NULL),
('f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', 'student@test.com', NULL, NULL, '1', '$2y$10$z4Fe2.7x/.bg/Dmu2B0AKeWJO.tJNBrQSgzbdE8/fH5QApBLK7tPG', NULL, '2022-06-09 02:03:24', '2022-06-09 02:03:24', NULL);

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
('a62a2519-dfde-4620-acb1-6b31a322893a', '99868717-5ddd-4311-af35-09f73da7a826', NULL, NULL, NULL, NULL, '1', '2022-06-09 02:02:03', '2022-06-09 02:02:03', NULL),
('aa900242-8836-471a-8a3f-8a2b200e47a0', '8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', NULL, NULL, NULL, NULL, '1', '2022-06-11 03:26:13', '2022-06-11 03:26:13', NULL),
('c0624411-7d62-4061-ac63-839c159a207c', '8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', NULL, NULL, NULL, NULL, '1', '2022-06-11 03:26:02', '2022-06-11 03:26:02', NULL),
('f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', '8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', NULL, NULL, NULL, NULL, '1', '2022-06-09 02:03:24', '2022-06-09 02:03:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ace_requests`
--
ALTER TABLE `ace_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ace_requests_submitted_request_id_foreign` (`submitted_request_id`),
  ADD KEY `ace_requests_created_by_foreign` (`created_by`),
  ADD KEY `ace_requests_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `acknowledgments`
--
ALTER TABLE `acknowledgments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acknowledgments_user_id_foreign` (`user_id`),
  ADD KEY `acknowledgments_receipt_id_foreign` (`receipt_id`),
  ADD KEY `acknowledgments_created_by_foreign` (`created_by`),
  ADD KEY `acknowledgments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`),
  ADD KEY `clients_created_by_foreign` (`created_by`),
  ADD KEY `clients_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_submitted_request_id_foreign` (`submitted_request_id`),
  ADD KEY `receipts_certified_by_foreign` (`certified_by`),
  ADD KEY `receipts_created_by_foreign` (`created_by`),
  ADD KEY `receipts_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `requests_request_type_unique` (`request_type`),
  ADD KEY `requests_created_by_foreign` (`created_by`),
  ADD KEY `requests_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirements_request_id_foreign` (`request_id`),
  ADD KEY `requirements_created_by_foreign` (`created_by`),
  ADD KEY `requirements_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_created_by_foreign` (`created_by`),
  ADD KEY `roles_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `steps_request_id_foreign` (`request_id`),
  ADD KEY `steps_created_by_foreign` (`created_by`),
  ADD KEY `steps_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `submitted_requests`
--
ALTER TABLE `submitted_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submitted_requests_approved_by_foreign` (`approved_by`),
  ADD KEY `submitted_requests_forward_to_foreign` (`forward_to`),
  ADD KEY `submitted_requests_client_foreign` (`client`),
  ADD KEY `submitted_requests_received_by_foreign` (`received_by`),
  ADD KEY `submitted_requests_request_id_foreign` (`request_id`),
  ADD KEY `submitted_requests_created_by_foreign` (`created_by`),
  ADD KEY `submitted_requests_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `submitted_requirements`
--
ALTER TABLE `submitted_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submitted_requirements_requirement_id_foreign` (`requirement_id`),
  ADD KEY `submitted_requirements_submitted_by_foreign` (`submitted_by`),
  ADD KEY `submitted_requirements_approved_by_foreign` (`approved_by`),
  ADD KEY `submitted_requirements_submitted_request_id_foreign` (`submitted_request_id`),
  ADD KEY `submitted_requirements_created_by_foreign` (`created_by`),
  ADD KEY `submitted_requirements_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tagged_subjects`
--
ALTER TABLE `tagged_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagged_subjects_ace_request_id_foreign` (`ace_request_id`),
  ADD KEY `tagged_subjects_acad_head_foreign` (`acad_head`),
  ADD KEY `tagged_subjects_tagged_by_foreign` (`tagged_by`),
  ADD KEY `tagged_subjects_acknowledged_id_foreign` (`acknowledged_id`),
  ADD KEY `tagged_subjects_created_by_foreign` (`created_by`),
  ADD KEY `tagged_subjects_updated_by_foreign` (`updated_by`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ace_requests`
--
ALTER TABLE `ace_requests`
  ADD CONSTRAINT `ace_requests_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ace_requests_submitted_request_id_foreign` FOREIGN KEY (`submitted_request_id`) REFERENCES `submitted_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ace_requests_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `acknowledgments`
--
ALTER TABLE `acknowledgments`
  ADD CONSTRAINT `acknowledgments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acknowledgments_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acknowledgments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acknowledgments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_certified_by_foreign` FOREIGN KEY (`certified_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receipts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receipts_submitted_request_id_foreign` FOREIGN KEY (`submitted_request_id`) REFERENCES `submitted_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receipts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requirements_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requirements_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `steps_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `steps_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `steps_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submitted_requests`
--
ALTER TABLE `submitted_requests`
  ADD CONSTRAINT `submitted_requests_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requests_client_foreign` FOREIGN KEY (`client`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requests_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requests_forward_to_foreign` FOREIGN KEY (`forward_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requests_received_by_foreign` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requests_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requests_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submitted_requirements`
--
ALTER TABLE `submitted_requirements`
  ADD CONSTRAINT `submitted_requirements_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requirements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requirements_requirement_id_foreign` FOREIGN KEY (`requirement_id`) REFERENCES `requirements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requirements_submitted_by_foreign` FOREIGN KEY (`submitted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requirements_submitted_request_id_foreign` FOREIGN KEY (`submitted_request_id`) REFERENCES `submitted_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_requirements_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagged_subjects`
--
ALTER TABLE `tagged_subjects`
  ADD CONSTRAINT `tagged_subjects_acad_head_foreign` FOREIGN KEY (`acad_head`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagged_subjects_ace_request_id_foreign` FOREIGN KEY (`ace_request_id`) REFERENCES `ace_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagged_subjects_acknowledged_id_foreign` FOREIGN KEY (`acknowledged_id`) REFERENCES `acknowledgments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagged_subjects_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagged_subjects_tagged_by_foreign` FOREIGN KEY (`tagged_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagged_subjects_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
