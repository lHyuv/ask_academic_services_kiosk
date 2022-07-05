INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES ('99868717-5ddd-4311-af35-09f73da7a826', 'Admin', 1, CURRENT_DATE, NULL);
INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES ('dfca8de3-277b-4733-b694-9b142988b58a', 'Head', 1, CURRENT_DATE, NULL);
INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES ('8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', 'Client', 1, CURRENT_DATE, NULL);
INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES ('9124df97-d15f-4c15-93a0-e95de079c104', 'Cashier', 1, CURRENT_DATE, NULL);

INSERT INTO `requests` (`id`, `request_type`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0afbae0a-c871-4fc8-9578-c162cd9dda3d', 'Certification Request', NULL, NULL, '1', '2022-06-16 00:54:30', NULL, NULL),
('3f62f4f9-d33f-4266-b7b8-3c7509a61dcd', 'Subject Tutorial Request', NULL, NULL, '1', '2022-06-16 00:54:17', NULL, NULL),
('592783dc-e4ba-4bf4-b428-0c490be6a840', 'Subject Petition', NULL, NULL, '1', '2022-06-16 00:53:49', NULL, NULL),
('6e8c76d9-85d3-4218-98d4-d8b6f7914ea2', 'Adding of Subject', NULL, NULL, '1', '2022-06-16 00:52:34', NULL, NULL),
('958c1671-353b-472f-bead-2dcfd11ed1a8', 'Shifting', NULL, NULL, '1', '2022-06-16 00:53:25', NULL, NULL),
('b3d5680f-c0b5-455e-8521-bfb10f5f2353', 'Manual Enrolment', NULL, NULL, '1', '2022-06-16 00:53:38', NULL, NULL),
('b6668f3e-1fcf-421f-9de9-aa838203ef91', 'Cross-enrolment', NULL, NULL, '1', '2022-06-16 00:53:14', NULL, NULL),
('d17f98a3-5cef-4867-acec-f6375899fa7d', 'Change of Subject or Schedule', NULL, NULL, '1', '2022-06-16 00:52:51', NULL, NULL),
('db952c25-de00-40a6-8833-6fe151de6c78', 'Overload', NULL, NULL, '1', '2022-06-16 00:52:16', NULL, NULL),
('f4aade9a-4e04-447f-b025-883dd90d1638', 'Grade Correction and Reporting', NULL, NULL, '1', '2022-06-16 00:53:04', NULL, NULL);


INSERT INTO `users` (`id`, `email`, `created_by`, `updated_by`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a62a2519-dfde-4620-acb1-6b31a322893a', 'admin@test.com', NULL, NULL, '1', '$2y$10$802s0f0JDpeVIWP4bW89nubkXKuDWphq1rniUUvUY7mibES30.VTK', NULL, '2022-06-09 02:02:03', '2022-06-09 02:02:03', NULL),
('f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', 'student@test.com', NULL, NULL, '1', '$2y$10$z4Fe2.7x/.bg/Dmu2B0AKeWJO.tJNBrQSgzbdE8/fH5QApBLK7tPG', NULL, '2022-06-09 02:03:24', '2022-06-09 02:03:24', NULL);

INSERT INTO `user_roles` (`user_id`, `role_id`, `start_date`, `end_date`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a62a2519-dfde-4620-acb1-6b31a322893a', '99868717-5ddd-4311-af35-09f73da7a826', NULL, NULL, NULL, NULL, '1', '2022-06-09 02:02:03', '2022-06-09 02:02:03', NULL),
('f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', '8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', NULL, NULL, NULL, NULL, '1', '2022-06-09 02:03:24', '2022-06-09 02:03:24', NULL);
