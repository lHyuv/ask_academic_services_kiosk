
ALTER TABLE SUBMITTED_REQUESTS
ADD ticket_status VARCHAR(255) NOT NULL DEFAULT 'Pending';

ALTER TABLE CLIENTS
ADD contact_number VARCHAR (255) NULL;

ALTER TABLE CLIENTS
ADD year_level VARCHAR (255) NULL;

ALTER TABLE CLIENTS
ADD program VARCHAR (255) NULL;

ALTER TABLE CLIENTS
ADD student_number VARCHAR (255) NULL;

ALTER TABLE CLIENTS CHANGE `user_id` `user_id` CHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;


INSERT INTO `clients` (`id`, `last_name`, `first_name`, `middle_name`, `extension_name`, `user_id`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`, `contact_number`, `year_level`, `program`, `student_number`) VALUES
('2bc4a3c4-0fd8-47e8-8e08-008506e093c7', 'Stuart', 'John', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '09132456125', '4', 'Bachelor of Science in Information Technology', '2022-00123-CM-1'),
('f6e19e5b-5924-42fb-87b0-8a7c9dfcb64c', 'Williams', 'Ray', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '09132456125', '3', 'Bachelor of Science in Business Administration major in Marketing Management', '2022-00987-CM-2');

ALTER TABLE SUBMITTED_REQUESTS
ADD program VARCHAR(255) NULL;


