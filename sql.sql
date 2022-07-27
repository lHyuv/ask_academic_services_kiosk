INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES ('99868717-5ddd-4311-af35-09f73da7a826', 'Admin', 1, CURRENT_DATE, NULL);
INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES ('dfca8de3-277b-4733-b694-9b142988b58a', 'Head', 1, CURRENT_DATE, NULL);
INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES ('8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', 'Client', 1, CURRENT_DATE, NULL);
INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES ('9124df97-d15f-4c15-93a0-e95de079c104', 'Cashier', 1, CURRENT_DATE, NULL);


INSERT INTO `users` (`id`, `email`, `created_by`, `updated_by`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a62a2519-dfde-4620-acb1-6b31a322893a', 'admin@test.com', NULL, NULL, '1', '$2y$10$802s0f0JDpeVIWP4bW89nubkXKuDWphq1rniUUvUY7mibES30.VTK', NULL, '2022-06-09 02:02:03', '2022-06-09 02:02:03', NULL),
('f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', 'student@test.com', NULL, NULL, '1', '$2y$10$z4Fe2.7x/.bg/Dmu2B0AKeWJO.tJNBrQSgzbdE8/fH5QApBLK7tPG', NULL, '2022-06-09 02:03:24', '2022-06-09 02:03:24', NULL);

INSERT INTO `user_roles` (`user_id`, `role_id`, `start_date`, `end_date`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a62a2519-dfde-4620-acb1-6b31a322893a', '99868717-5ddd-4311-af35-09f73da7a826', NULL, NULL, NULL, NULL, '1', '2022-06-09 02:02:03', '2022-06-09 02:02:03', NULL),
('f2310bcb-a49c-4dfd-9f8e-f70eb850c0a5', '8f69bc54-616e-4ce8-9bcb-5ccc6a978fa4', NULL, NULL, NULL, NULL, '1', '2022-06-09 02:03:24', '2022-06-09 02:03:24', NULL);

INSERT INTO `requests` (`id`, `request_type`,`created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`, `icon_file_name`, `icon_file_path`) VALUES
('1081d3a5-2e0a-434b-a745-b3e15b6beed7', 'Subject Tutorial', NULL, NULL, '1',CURDATE(), CURDATE(), NULL, '2022-07-04tutorial.png', 'files/'),
('22a6d202-bf42-45dc-802a-efb490b69ca6', 'Cross-enrollment', NULL, NULL, '1', CURDATE(), CURDATE(),  NULL, '2022-07-04cross.png', 'files/'),
('347b20bb-27d5-423b-8903-0c97957ff01b', 'Change Subject', NULL, NULL,  '1', CURDATE(), CURDATE(),  NULL, '2022-07-04change.png', 'files/'),
('68a2b350-7d68-460b-bf83-7f3de12c387b', 'Subject Petition', NULL, NULL,  '1', CURDATE(), CURDATE(),  NULL, '2022-07-04petition.png', 'files/'),
('74c59164-1ca1-4916-b455-9eed9ec527af', 'Correction', NULL, NULL, '1', CURDATE(), CURDATE(),  NULL, '2022-07-04correction.png', 'files/'),
('7ed558b5-0a86-43d5-b83d-db4e468ded5f', 'Certification', NULL, NULL,'1', CURDATE(), CURDATE(),  NULL, '2022-07-04certification.png', 'files/'),
('a362ccad-5867-47b6-9895-1db6b201ec02', 'Shifting', NULL, NULL, '1', CURDATE(), CURDATE(),  NULL, '2022-07-04shifting.png', 'files/'),
('a4db111e-dbb9-45d1-b0fc-9a3eca2fc812', 'Manual Enrollment', NULL, NULL, '1', CURDATE(), CURDATE(), NULL, '2022-07-04manual.png', 'files/'),
('aefb014d-a83e-42e1-b67f-b05e99e92ff2', 'Add Subject', NULL, NULL, '1', CURDATE(), CURDATE(),  NULL, '2022-07-04add.png', 'files/'),
('bf3aeb08-1764-4f40-8b16-932e93db5359', 'Subject Overload', NULL, NULL, '1', CURDATE(), CURDATE(),  NULL, '2022-07-04overload.png', 'files/');

INSERT INTO `requirements` (`id`, `requirement_name`, `request_id`, `source`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('08cb2d0c-3c1d-4e43-b13e-4b7e373f8c61', 'Application Letter for Cross-Enrollment', '22a6d202-bf42-45dc-802a-efb490b69ca6', NULL, 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('19c60364-d182-4e21-a199-3a6bbfb74512', 'Accomplished and printed copy of ACE	Form(Change Schedule/Subject)   downloadable', '347b20bb-27d5-423b-8903-0c97957ff01b', 'Link: www.pup.edu.ph', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('2589b7b4-ef9b-4698-8a1d-2ba363904ef8', 'Certificate of Registration for the current semester', 'bf3aeb08-1764-4f40-8b16-932e93db5359', 'Admissions Office', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('2b7f175f-b39a-44e5-90e4-f10a7b2e3359', 'Online petition of subject', '68a2b350-7d68-460b-bf83-7f3de12c387b', 'Link: https://apps.pup.edu.ph/sis', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('2dffad57-beca-463f-bdd4-b53f1cb99f6e', 'Permit to cross-enroll', '22a6d202-bf42-45dc-802a-efb490b69ca6', 'Office of the University Registrar', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('39cd3e25-2a12-4c39-a4af-7063c4a6da35', 'Accomplished request form', '7ed558b5-0a86-43d5-b83d-db4e468ded5f', 'Campus', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('39e0b0f4-c41d-4ccb-8dd5-bc9dc2499368', 'Copy of Class Record', '74c59164-1ca1-4916-b455-9eed9ec527af', 'Assigned professor', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('3b644d4c-95b5-447d-8219-d2ccadb3a6d2', 'Fully-accomplished Request for Overload Form (For College/Branch/Campus)', 'bf3aeb08-1764-4f40-8b16-932e93db5359', 'Campus', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('4f5345ca-687a-4adc-af74-d7ce87f45d8c', 'Notarized affidavit for change of grade of professor(for  correction  of  entry/late reporting of grade)', '74c59164-1ca1-4916-b455-9eed9ec527af', 'Notary Public', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('584151b8-08ba-485b-a41c-0d9102a276c8', 'Fully-accomplished ACE form (Adding of Subject of Changing of Subject/Schedule', 'bf3aeb08-1764-4f40-8b16-932e93db5359', 'Link: https://www.pup.edu.ph/downloads/students/', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('607b8714-6993-4f29-b42a-465c004900c1', 'Request Letter for Overload (Complete justification of the need for overload, subjects to overload)', 'bf3aeb08-1764-4f40-8b16-932e93db5359', NULL, 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('860db99a-f33e-44f8-a128-e3f19aa2bce4', 'SIS Generated Curriculum Profile', 'bf3aeb08-1764-4f40-8b16-932e93db5359', 'SIS', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('b478f92c-c3fe-4191-b55c-1b368acc7ebe', 'Accomplished and printed copy of ACE  Form  (Adding  of  Subject)', 'aefb014d-a83e-42e1-b67f-b05e99e92ff2', 'Link: www.pup.edu.ph', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('c86846b0-3356-4e49-87ec-39f3c979e40d', 'Authorization	letter and Identification card (ID) if claimant is not the owner of the document', '7ed558b5-0a86-43d5-b83d-db4e468ded5f', NULL, 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(),NULL),
('ce8385b5-843e-4711-a9c0-edb4a57305c6', 'Completion Form (3 original copies)', '74c59164-1ca1-4916-b455-9eed9ec527af', 'Link: http://www.pup.edu.ph/downloads/students/', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('d8ead11b-dfee-468c-b1ca-350b5c152416', 'Identification Card (ID)', '7ed558b5-0a86-43d5-b83d-db4e468ded5f', NULL, 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('e42c2ce3-b87b-4009-ab2e-e2961aa228f3', 'Fully-accomplished Shifting Form', 'a362ccad-5867-47b6-9895-1db6b201ec02', 'Campus', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('e54c4808-f3d9-4855-8990-a648a1508ef7', 'Certified Copy of Grades', 'a362ccad-5867-47b6-9895-1db6b201ec02', 'Admissions Office', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL);


INSERT INTO `steps` (`id`, `step_number`, `step_name`,  `request_id`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0574b39f-e908-4c4d-8c82-00ef130f35bd', 1, 'Submit accomplished request form.', '7ed558b5-0a86-43d5-b83d-db4e468ded5f', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('0f7d88d6-e215-46ea-ab52-d3899f3fec29', 2, 'Proceed to the Admissions Office and present official receipt.', 'a362ccad-5867-47b6-9895-1db6b201ec02', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('10e114fe-45b9-4cb4-b6b0-cde8aae3fadb', 3, 'Proceed to Cashier’s Office to pay the assessed fee (for students not covered by R.A. 10931).',  '347b20bb-27d5-423b-8903-0c97957ff01b', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('1198b95d-1c01-4ba1-ac71-5eee84acda7e', 2, 'Present claim stub.',  '7ed558b5-0a86-43d5-b83d-db4e468ded5f', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('28bd4758-eeb0-4313-aea2-b9b19b4f18f3', 2, 'Enroll the petition subject during online registration or on adjustment period.',  '1081d3a5-2e0a-434b-a745-b3e15b6beed7', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('2e9fce34-65b3-4b15-8ecf-56430a3a90f7', 1, 'Pay the amount for securing certified copy of grades.',  'a362ccad-5867-47b6-9895-1db6b201ec02', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('341c9a29-060a-4458-8a77-0f3ad4a10afd', 5, 'Present the fully-accomplished shifting form for final approval of release from the current program.', 'a362ccad-5867-47b6-9895-1db6b201ec02', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(),NULL),
('3be49cda-199e-4540-9399-19ef7638637a', 1, 'Request for tutorial of subject online.', '1081d3a5-2e0a-434b-a745-b3e15b6beed7', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(),NULL),
('43335cc2-4df9-45ab-8605-b53afcf4d702', 2, 'Proceed to Cashier’s Office to pay the assessed fee (for students not covered by R.A. 10931).', 'aefb014d-a83e-42e1-b67f-b05e99e92ff2', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('472d822b-a390-4a6d-95d3-3d85ffc4d0a8', 3, 'Acknowledge receipt of the document.',  '7ed558b5-0a86-43d5-b83d-db4e468ded5f', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('4fec5a0b-e2e3-47db-a908-f951f718bfd0', 1, 'Go to the Director/Head of Academic Program for signature and tagging of subject.',  'aefb014d-a83e-42e1-b67f-b05e99e92ff2', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('5131540c-1698-4544-9f45-ed734ac9de1b', 2, 'Enroll the petitioned subject during online  registration or on  adjustment period.',  '68a2b350-7d68-460b-bf83-7f3de12c387b', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('58c2163b-a7ee-474a-b7b2-7f42ac75e452', 1, 'Submit all requirements for evaluation and approval.', 'bf3aeb08-1764-4f40-8b16-932e93db5359', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('5f789b18-2b19-4f84-9d65-06e2f9bd03af', 2, 'Go to the Director/ Head of Academic Program for signature and tagging.',  'a4db111e-dbb9-45d1-b0fc-9a3eca2fc812', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1',CURDATE(), CURDATE(), NULL),
('6c6afbca-a1b6-4ff0-8436-4a51cbb8b86e', 1, 'Go to the Faculty member/s assigned to the subject/s to be enrolled for acceptance to the class.',  'a4db111e-dbb9-45d1-b0fc-9a3eca2fc812', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('7a07b981-9e1f-406c-8f94-746cfbbe66f1', 4, 'Return the fully-accomplished shifting form to the Director/Head of Academic Program.',  'a362ccad-5867-47b6-9895-1db6b201ec02', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('82997ee1-6bd4-42be-9737-5752905f1c57', 2, 'Present recommendation to the campus registrar.',  '22a6d202-bf42-45dc-802a-efb490b69ca6', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('8f4e7d38-6887-4512-b63a-e2fced206e9e', 3, 'Proceed to Cashier’s Office to pay the assessed fee (for students not covered by R.A. 10931).', 'a4db111e-dbb9-45d1-b0fc-9a3eca2fc812', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('93eedb72-faef-413a-82f9-21a70cc778c1', 1, 'Proceed to Cashier’s Office to pay the assessed fee.',  '74c59164-1ca1-4916-b455-9eed9ec527af', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('9eca368b-c312-43ed-bf27-35e37e9886a3', 3, 'Present the approved overload form to the Director/ Head of Academic Program for adding of units to the student SIS account.', 'bf3aeb08-1764-4f40-8b16-932e93db5359', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('9fb4bc8a-efce-4519-83b6-ba387804d8e9', 1, 'Submit application letter for cross-enrollment.',  '22a6d202-bf42-45dc-802a-efb490b69ca6', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('aa1daac0-3e60-42b3-a21c-fea8ded3dbe5', 2, 'Present the overload request form for approval  of the Director',  'bf3aeb08-1764-4f40-8b16-932e93db5359', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('b8c73ef5-877b-424d-ac47-ece430a873ea', 1, 'Request for petition of subject online.', '68a2b350-7d68-460b-bf83-7f3de12c387b', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1',  CURDATE(), CURDATE(), NULL),
('c60f61f2-e5a5-4296-a0e0-ddcd5aea1d00', 2, 'Go to the Director/ Head of Academic Program for signature and tagging.', '347b20bb-27d5-423b-8903-0c97957ff01b', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('d7695351-ae26-4a2e-a93f-562319fdbe23', 4, 'Submit the Original Copy of ACE Form (Change of Schedule/ Subject) to  Director/ Head  of Academic Program.', '347b20bb-27d5-423b-8903-0c97957ff01b', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('da6627f6-1148-467c-863e-c63c022b65d7', 3, 'Present the fully-accomplished shifting form and certified copy of grades for evaluation and approval.',  'a362ccad-5867-47b6-9895-1db6b201ec02', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('e5ad2e92-590f-4917-9f74-f7290fcb595e', 1, 'Go to the Faculty member/s assigned to the subject/s to be enrolled for release from and acceptance to the class.', '347b20bb-27d5-423b-8903-0c97957ff01b', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('f0be3d9f-7dd5-4c77-8577-98ce6d70bbe5', 3, 'Submit the Original Copy of ACE Form (Adding of Subjects) to Director/ Head of Academic  Program.', 'aefb014d-a83e-42e1-b67f-b05e99e92ff2', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1', CURDATE(), CURDATE(), NULL),
('f7fd3ee0-22f8-4c00-92d0-e98572d76f59', 2, 'Submit  the filled out Completion Form and official receipt to the  Professorfor completion  of  grades for subject.',  '74c59164-1ca1-4916-b455-9eed9ec527af', 'a62a2519-dfde-4620-acb1-6b31a322893a', NULL, '1',CURDATE(), CURDATE(), NULL);

ALTER TABLE SUBMITTED_REQUESTS
ADD ticket_status VARCHAR(255) NOT NULL DEFAULT 'Pending';

