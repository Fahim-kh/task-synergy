-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 11:13 PM
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
-- Database: `nn16_megaresources`
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
(3, 'Happyness Main Smashing Pod cast Episode From Marcy Inspired Design Decisions', 'happyness-main-smashing-pod-cast-episode-from-marcy-inspired-design-decisions', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo elit, commodo vulputate metus at, gravida accumsan turpis. Donec lorem lacus, convallis at sem id, imperdiet dapibus metus. Pellentesque rhoncus libero vitae sollicitudin tempus. In hac habitasse platea dictumst. Aliquam nulla ex, consequat id turpis at, iaculis fringilla odio. Nunc a rhoncus neque. Sed a magna ut urna bibendum placerat. Donec eget dignissim ipsum, a blandit purus. Suspendisse potenti. Donec dapibus, metus nec molestie tempor, dolor quam luctus nulla, eu molestie nibh mi vel nisi. Sed sodales orci ac turpis convallis suscipit. Proin in tellus sed ligula vehicula rutrum non quis dui.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Aenean ex nisi, porttitor eget lacinia eget, vehicula id erat. Donec at orci eu lorem sollicitudin tempor vitae nec dui. Curabitur eleifend ex sed venenatis pharetra. Sed vel velit ex. Curabitur vel erat mi. Vestibulum eget dolor consectetur, porttitor erat eget, consequat risus. Aenean sollicitudin tincidunt felis, quis ultricies nibh condimentum ac. Proin orci erat, placerat sit amet tortor vitae, faucibus sodales est. Mauris rhoncus mi libero, eu feugiat libero tincidunt nec. Aenean gravida, nunc et ullamcorper suscipit, libero tellus sodales dolor, in mollis felis lectus a velit. Pellentesque ut tempor dui. Vivamus sed pretium tortor. Maecenas et dui porttitor, cursus odio eu, dictum arcu.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Nullam ut volutpat neque. Aliquam pretium ultrices lectus, et rutrum felis mollis in. Curabitur non elit in lacus vehicula porttitor at eget arcu. Nullam tincidunt vehicula velit eu gravida. Sed erat dolor, auctor at felis at, cursus tempus ipsum. Aliquam pretium nulla sed aliquam volutpat. Sed eu rhoncus tellus. Proin mattis placerat sapien, et pellentesque est egestas et. Curabitur lacus mauris, luctus quis ipsum ut, laoreet iaculis sem. In nulla quam, lacinia sit amet viverra quis, tincidunt vel enim. Praesent finibus porttitor eros lacinia semper.</p>', '8883097340b38672429cd0cc1607bc5a1721344513.jpg', 1, '2024-07-18 18:15:13', '2024-07-20 16:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `phone_optional` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `white_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `social_media` text DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `phone_number_optional` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_optional` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vission` varchar(255) DEFAULT NULL,
  `vission_image` varchar(255) DEFAULT NULL,
  `mission` varchar(255) DEFAULT NULL,
  `mission_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `logo`, `white_logo`, `favicon`, `social_media`, `phone_number`, `phone_number_optional`, `email`, `email_optional`, `address`, `created_at`, `updated_at`, `vission`, `vission_image`, `mission`, `mission_image`) VALUES
(1, '1bb87d41d15fe27b500a4bfcde01bb0e_20-07-24_1721509230.png', '1bb87d41d15fe27b500a4bfcde01bb0e_20-07-24_1721509230.png', 'f50c73d00fda2bd6d78ce4082e70f008_20-07-24_1721509230.png', '[{\"social_icon\":\"fa-brands fa-facebook\",\"social_link\":\"https:\\/\\/www.facebook.com\\/\"},{\"social_icon\":\"fa-brands fa-instagram\",\"social_link\":\"https:\\/\\/www.instagram.com\\/\"},{\"social_icon\":\"fas fa-tiktok\",\"social_link\":\"https:\\/\\/www.tiktok.com\\/\"}]', '09876543234567', '98765432', 'info@example.com', NULL, 'st Nn16 test address', '2024-07-11 13:34:53', '2024-07-20 16:00:30', 'Our vision is to be the foremost provider of compassionate and superior home care services, enriching the lives of our clients and their families across the Midlands and beyond.', '25e04ee70737877de53e457ef09f5da7_13-07-24_1720863180.png', 'Our mission is to deliver unparalleled quality in-home care, rooted in family values and unwavering dedication. Through relentless teamwork and continuous improvement, we strive to empower our clients to live with dignity, respect and independence.', 'fa3b58e43ffbe4adff04e15c4a54172c_13-07-24_1720863180.png');

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
(6, 'General Settings', 'general_settings.index', 'si si-settings', 0, 5, '2024-07-11 13:28:23', '2024-07-11 13:28:23'),
(7, 'Components', '#', 'fa fa-list', 0, 5, '2024-07-12 11:30:46', '2024-07-12 11:30:46'),
(8, 'Slider', 'slider.index', 'fa fa-setting', 7, NULL, '2024-07-12 11:31:47', '2024-07-12 11:31:47'),
(9, 'Team', 'team.index', 'icon', 7, NULL, '2024-07-13 15:20:38', '2024-07-13 15:20:38'),
(10, 'Services', 'services.index', 'si si-settings', 0, 6, '2024-07-13 15:25:32', '2024-07-13 15:25:32'),
(11, 'Testimonial', 'testimonial.index', 'icon', 7, NULL, '2024-07-13 15:26:12', '2024-07-13 15:26:12'),
(12, 'Locations', 'location.index', 'icon', 7, NULL, '2024-07-15 05:35:35', '2024-07-15 05:35:35'),
(13, 'Branches', 'branch.index', 'icon', 7, NULL, '2024-07-15 05:36:29', '2024-07-15 05:36:29'),
(14, 'Pages List', 'page.index', 'fa fa-file', 0, 8, '2024-07-15 15:28:47', '2024-07-15 15:28:47'),
(15, 'Beneficial Information', '#', 'fa fa-database', 0, 8, '2024-07-18 04:45:36', '2024-07-18 04:45:36'),
(16, 'Blogs', 'blog.index', 'icon', 15, NULL, '2024-07-18 04:46:21', '2024-07-18 04:46:21'),
(17, 'Faqs', 'faq.index', 'icon', 15, NULL, '2024-07-18 05:30:26', '2024-07-18 05:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Privacy Policy', 'privacy-policy', '<section class=\"blog-details-area pt-130 pb-100\">\r\n        <div class=\"container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-xl-12 col-lg-12 col-md-12 \">\r\n                    <div class=\"blogs-04 p-5\">\r\n                            <div class=\"blog_detail\" style=\"font-size:16px !important; \">\r\n                                <p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed justo elit, commodo vulputate metus at, gravida accumsan turpis. Donec lorem lacus, convallis at sem id, imperdiet dapibus metus. Pellentesque rhoncus libero vitae sollicitudin tempus. In hac habitasse platea dictumst. Aliquam nulla ex, consequat id turpis at, iaculis fringilla odio. Nunc a rhoncus neque. Sed a magna ut urna bibendum placerat. Donec eget dignissim ipsum, a blandit purus. Suspendisse potenti. Donec dapibus, metus nec molestie tempor, dolor quam luctus nulla, eu molestie nibh mi vel nisi. Sed sodales orci ac turpis convallis suscipit. Proin in tellus sed ligula vehicula rutrum non quis dui.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Aenean ex nisi, porttitor eget lacinia eget, vehicula id erat. Donec at orci eu lorem sollicitudin tempor vitae nec dui. Curabitur eleifend ex sed venenatis pharetra. Sed vel velit ex. Curabitur vel erat mi. Vestibulum eget dolor consectetur, porttitor erat eget, consequat risus. Aenean sollicitudin tincidunt felis, quis ultricies nibh condimentum ac. Proin orci erat, placerat sit amet tortor vitae, faucibus sodales est. Mauris rhoncus mi libero, eu feugiat libero tincidunt nec. Aenean gravida, nunc et ullamcorper suscipit, libero tellus sodales dolor, in mollis felis lectus a velit. Pellentesque ut tempor dui. Vivamus sed pretium tortor. Maecenas et dui porttitor, cursus odio eu, dictum arcu.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Nullam ut volutpat neque. Aliquam pretium ultrices lectus, et rutrum felis mollis in. Curabitur non elit in lacus vehicula porttitor at eget arcu. Nullam tincidunt vehicula velit eu gravida. Sed erat dolor, auctor at felis at, cursus tempus ipsum. Aliquam pretium nulla sed aliquam volutpat. Sed eu rhoncus tellus. Proin mattis placerat sapien, et pellentesque est egestas et. Curabitur lacus mauris, luctus quis ipsum ut, laoreet iaculis sem. In nulla quam, lacinia sit amet viverra quis, tincidunt vel enim. Praesent finibus porttitor eros lacinia semper.</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                    \r\n                </div>\r\n            </div>\r\n        \r\n    </section>', 1, '2024-07-19 17:16:23', '2024-07-20 16:01:57');

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
(135, 1, 17, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(136, 1, 16, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(137, 1, 15, 1, 0, 0, 0, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(138, 1, 14, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(139, 1, 13, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(140, 1, 12, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(141, 1, 11, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(142, 1, 10, 0, 0, 0, 0, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(143, 1, 9, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(144, 1, 8, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(145, 1, 7, 1, 0, 0, 0, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(146, 1, 6, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(147, 1, 5, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(148, 1, 4, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(149, 1, 3, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(151, 1, 1, 1, 1, 1, 1, '2024-07-20 16:06:26', '2024-07-20 16:06:26'),
(152, 2, 17, 1, 0, 1, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(153, 2, 16, 1, 0, 1, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(154, 2, 15, 1, 0, 1, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(155, 2, 14, 1, 0, 1, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(156, 2, 13, 0, 0, 0, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(157, 2, 12, 0, 0, 0, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(158, 2, 11, 0, 0, 0, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(159, 2, 10, 0, 0, 0, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(160, 2, 9, 0, 0, 0, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(161, 2, 8, 0, 0, 0, 0, '2024-07-20 16:07:12', '2024-07-20 16:07:12'),
(162, 2, 7, 0, 0, 0, 0, '2024-07-20 16:07:13', '2024-07-20 16:07:13'),
(163, 2, 6, 0, 0, 0, 0, '2024-07-20 16:07:13', '2024-07-20 16:07:13'),
(164, 2, 5, 0, 0, 0, 0, '2024-07-20 16:07:13', '2024-07-20 16:07:13'),
(165, 2, 4, 0, 0, 0, 0, '2024-07-20 16:07:13', '2024-07-20 16:07:13'),
(166, 2, 3, 0, 0, 0, 0, '2024-07-20 16:07:13', '2024-07-20 16:07:13'),
(168, 2, 1, 1, 0, 0, 0, '2024-07-20 16:07:13', '2024-07-20 16:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `paragraph` varchar(255) NOT NULL,
  `excerpt` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `paragraph` varchar(255) DEFAULT NULL,
  `slider_img` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `heading`, `paragraph`, `slider_img`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Carers Companions & Heroes', NULL, '61c04f78d624ec7da62f305880d9871a1720857899.jpg', '#', '0', '2024-07-12 11:37:17', '2024-07-18 03:41:34'),
(2, 'Longevity Through Excellence', NULL, '1c504ade8d5eb0ef489c2476d6fb1e2b1720857919.png', '#', '1', '2024-07-12 11:42:46', '2024-07-18 03:41:46'),
(3, 'Carers Companions & Heroes', 'Across Communities in the UK', '6715db9b7f8325d249206727c7637c191720857977.png', '#', '0', '2024-07-13 03:06:17', '2024-07-18 02:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `sub_services`
--

CREATE TABLE `sub_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `side_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `team_img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `designation`, `team_img`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Urszula Mejsak', 'Associate Director for Growth and Operations', '06c3bba06219e277b0ec9a7322f73df91721033590.jpg', 1, '2024-07-15 03:53:10', '2024-07-20 15:58:21'),
(7, 'Ian Kibukamusoke', 'Director Of Technology', '06c3bba06219e277b0ec9a7322f73df91721052150.jpg', 1, '2024-07-15 09:02:30', '2024-07-15 09:02:30'),
(8, 'Suzana Kaczalek', 'Associate Director of Clinical Operations', '06c3bba06219e277b0ec9a7322f73df91721052209.jpg', 1, '2024-07-15 09:03:29', '2024-07-15 09:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `testimonial_image` varchar(255) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `designation`, `testimonial_image`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 'E.Evans', 'client', NULL, 'Carers are obviously well trained. My wife has dementia and is treated with great kindness and respect, always retaining her all important dignity', '1', '2024-07-15 04:10:09', '2024-07-15 04:10:09'),
(3, 'A. Watt', 'client', NULL, 'I have received excellent care from my regular carer, other carers have been quite good but this is because they are not used to my routine. All considered my experience has been excellent and I have no complaints.', '1', '2024-07-15 04:14:14', '2024-07-15 04:14:14');

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
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_location_id_foreign` (`location_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_services`
--
ALTER TABLE `sub_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD CONSTRAINT `sub_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
