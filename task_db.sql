-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 12:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `slug`, `body`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Happyness Main Smashing Pod cast Episode From Marcy Inspired Design Decisions', 'happyness-main-smashing-pod-cast-episode-from-marcy-inspired-design-decisions', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo elit, commodo vulputate metus at, gravida accumsan turpis. Donec lorem lacus, convallis at sem id, imperdiet dapibus metus. Pellentesque rhoncus libero vitae sollicitudin tempus. In hac habitasse platea dictumst. Aliquam nulla ex, consequat id turpis at, iaculis fringilla odio. Nunc a rhoncus neque. Sed a magna ut urna bibendum placerat. Donec eget dignissim ipsum, a blandit purus. Suspendisse potenti. Donec dapibus, metus nec molestie tempor, dolor quam luctus nulla, eu molestie nibh mi vel nisi. Sed sodales orci ac turpis convallis suscipit. Proin in tellus sed ligula vehicula rutrum non quis dui.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Aenean ex nisi, porttitor eget lacinia eget, vehicula id erat. Donec at orci eu lorem sollicitudin tempor vitae nec dui. Curabitur eleifend ex sed venenatis pharetra. Sed vel velit ex. Curabitur vel erat mi. Vestibulum eget dolor consectetur, porttitor erat eget, consequat risus. Aenean sollicitudin tincidunt felis, quis ultricies nibh condimentum ac. Proin orci erat, placerat sit amet tortor vitae, faucibus sodales est. Mauris rhoncus mi libero, eu feugiat libero tincidunt nec. Aenean gravida, nunc et ullamcorper suscipit, libero tellus sodales dolor, in mollis felis lectus a velit. Pellentesque ut tempor dui. Vivamus sed pretium tortor. Maecenas et dui porttitor, cursus odio eu, dictum arcu.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\">Nullam ut volutpat neque. Aliquam pretium ultrices lectus, et rutrum felis mollis in. Curabitur non elit in lacus vehicula porttitor at eget arcu. Nullam tincidunt vehicula velit eu gravida. Sed erat dolor, auctor at felis at, cursus tempus ipsum. Aliquam pretium nulla sed aliquam volutpat. Sed eu rhoncus tellus. Proin mattis placerat sapien, et pellentesque est egestas et. Curabitur lacus mauris, luctus quis ipsum ut, laoreet iaculis sem. In nulla quam, lacinia sit amet viverra quis, tincidunt vel enim. Praesent finibus porttitor eros lacinia semper.</p>', '8883097340b38672429cd0cc1607bc5a1721344513.jpg', 1, '2024-07-18 18:15:13', '2024-07-23 17:31:42');

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
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Northamptonshire', 1, '2024-07-15 05:45:04', '2024-07-15 05:45:04'),
(2, 'Bedfordshire', 1, '2024-07-15 05:45:19', '2024-07-15 08:58:54'),
(3, 'Hertfordshire', 1, '2024-07-15 05:45:36', '2024-07-15 09:00:15'),
(4, 'Banbury', 0, '2024-07-15 05:45:52', '2024-07-15 09:00:28'),
(5, 'Gloucestershire', 1, '2024-07-15 05:46:03', '2024-07-15 08:59:47');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_01_24_114506_module', 1),
(5, '2023_01_24_114705_role', 1),
(6, '2023_01_24_114750_role_permission', 1),
(7, '2024_01_02_000001_create_users_table', 2),
(8, '2024_07_11_183106_create_table_general_setting', 3),
(9, '2024_07_11_085632_slider_table', 4),
(10, '2024_07_10_075508_f_a_qs', 5),
(11, '2024_07_10_101414_create_testimonial_models_table', 5),
(12, '2024_07_12_165815_team', 6),
(13, '2024_07_13_092034_add_fields_general_setting', 7),
(14, '2024_07_13_203908_services', 8),
(17, '2024_07_15_082002_add_fields_services', 9),
(18, '2024_01_01_092117_create_location_models_table', 10),
(19, '2024_01_02_000000_create_branch_models_table', 10),
(20, '2024_07_15_203752_create_pages_models_table', 11),
(21, '2022_04_29_103453_blog_model', 12),
(22, '2024_07_19_143113_create_sub_services_models_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `route`, `icon`, `parent_id`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', '#', 'side-menu__icon si si-screen-desktop', 0, 1, '2024-07-11 05:19:24', '2024-07-11 05:19:24'),
(3, 'Management', '#', 'fa fa-server', 0, 3, '2024-07-11 07:07:30', '2024-07-11 07:07:30'),
(4, 'Users', 'user.index', 'user icon', 3, NULL, '2024-07-11 07:17:36', '2024-07-11 07:17:36'),
(5, 'Role', 'role.index', 'user icon', 3, NULL, '2024-07-11 13:14:11', '2024-07-11 13:14:11'),
(12, 'Locations', 'location.index', 'icon', 0, 24, '2024-07-15 05:35:35', '2024-07-15 05:35:35'),
(13, 'Branches', 'branch.index', 'icon', 7, NULL, '2024-07-15 05:36:29', '2024-07-15 05:36:29'),
(16, 'Blogs', 'blog.index', 'icon', 0, 24, '2024-07-18 04:46:21', '2024-07-18 04:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-07-11 05:19:24', '2024-07-11 05:19:24'),
(2, 'Editor', '2024-07-20 16:07:12', '2024-07-20 16:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `pview` int(11) NOT NULL,
  `pcreate` int(11) NOT NULL,
  `pedit` int(11) NOT NULL,
  `pdelete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `module_id`, `pview`, `pcreate`, `pedit`, `pdelete`, `created_at`, `updated_at`) VALUES
(206, 2, 17, 0, 0, 0, 0, '2024-07-23 17:28:04', '2024-07-23 17:28:04'),
(207, 2, 16, 1, 0, 1, 0, '2024-07-23 17:28:04', '2024-07-23 17:28:04'),
(208, 2, 15, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(209, 2, 14, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(210, 2, 13, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(211, 2, 12, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(212, 2, 11, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(213, 2, 10, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(214, 2, 9, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(215, 2, 8, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(216, 2, 7, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(217, 2, 6, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(218, 2, 5, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(219, 2, 4, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(220, 2, 3, 0, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(221, 2, 1, 1, 0, 0, 0, '2024-07-23 17:28:05', '2024-07-23 17:28:05'),
(222, 1, 16, 1, 1, 1, 1, '2024-07-23 17:29:54', '2024-07-23 17:29:54'),
(223, 1, 13, 0, 0, 0, 0, '2024-07-23 17:29:54', '2024-07-23 17:29:54'),
(224, 1, 12, 1, 1, 1, 1, '2024-07-23 17:29:54', '2024-07-23 17:29:54'),
(225, 1, 5, 1, 1, 1, 1, '2024-07-23 17:29:54', '2024-07-23 17:29:54'),
(226, 1, 4, 1, 0, 0, 0, '2024-07-23 17:29:55', '2024-07-23 17:29:55'),
(227, 1, 3, 1, 0, 0, 0, '2024-07-23 17:29:55', '2024-07-23 17:29:55'),
(228, 1, 1, 1, 0, 0, 0, '2024-07-23 17:29:55', '2024-07-23 17:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `user_image`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Muhammad Fahim', 'cb91a17739b0c21b4ab520cb6ebf00bd_31-05-24_1717156328.jpg', 'm.fahim@statelyweb.com', NULL, '$2y$12$7NM9F0yjX0npwyWxj4Cmd.04w6gSkGEM6a3A7pBuTnls9rEst98ly', 1, NULL, '2024-07-11 05:19:25', '2024-07-11 13:09:05'),
(3, 1, 'test user', NULL, 'test@example.com', NULL, '$2y$12$0dO6bE6J6o3Sl8j.ikK.r.Z3RyZ.3myDou5i80488r2vsfy0TzAfC', 1, NULL, '2024-07-20 16:08:08', '2024-07-20 16:08:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_module_id_foreign` (`module_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
