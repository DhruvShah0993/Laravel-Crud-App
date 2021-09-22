-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 05:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `price`, `total_amount`, `qty`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 1, 15999.00, 15999.00, 1, 1, '2021-09-08 03:07:50', '2021-09-16 04:08:48', NULL),
(4, 2, 2, 59999.00, 119998.00, 2, 1, '2021-09-08 03:08:58', '2021-09-16 04:08:48', NULL),
(27, 2, 1, 15999.00, 15999.00, 1, 1, '2021-09-16 03:09:20', '2021-09-16 04:08:48', NULL),
(28, 2, 2, 59999.00, 119998.00, 2, 1, '2021-09-16 03:35:02', '2021-09-16 04:08:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mobile', '2021-09-04 01:00:02', '2021-09-04 01:00:02', NULL),
(2, 'Laptop', '2021-09-04 01:56:54', '2021-09-04 01:56:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 1, '2021-09-13 10:43:12', '2021-09-13 10:43:12'),
(2, 'New York', 2, '2021-09-13 12:31:03', '2021-09-13 12:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'India', '2021-09-13 10:39:20', '2021-09-13 10:39:20'),
(2, 'USA', '2021-09-13 11:18:37', '2021-09-13 11:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Computer Engineering', '2021-09-02 06:02:40', '2021-09-02 06:02:40', NULL),
(2, 'Electrical Engineering', '2021-09-02 06:11:09', '2021-09-02 06:11:09', NULL),
(3, 'Mechanical Engineering', '2021-09-02 07:50:35', '2021-09-02 07:50:35', NULL),
(4, 'Civil Engineering', '2021-09-02 07:50:54', '2021-09-02 07:50:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_28_130502_create_students_table', 1),
(6, '2021_09_02_053259_add_soft_deletes', 1),
(7, '2021_09_02_055322_create_departments_table', 1),
(13, '2021_09_03_112001_create_products_table', 2),
(14, '2021_09_03_112807_create_categories_table', 2),
(15, '2021_09_03_121914_add_cat_id', 2),
(16, '2021_09_04_051636_add_soft_deletes', 2),
(17, '2021_09_04_053942_add_soft_deletes_categories', 2),
(18, '2021_09_04_112930_create_role_table', 3),
(20, '2021_09_04_130259_add_role_id_in_users', 4),
(21, '2021_09_06_043006_add_image_column', 5),
(26, '2021_09_06_100104_create_carts_table', 6),
(27, '2021_09_06_100229_add_softdeletes_carts', 6),
(31, '2021_09_13_054932_create_checkouts_table', 7),
(32, '2021_09_13_055448_create_softdeletes_checkout', 8),
(37, '2021_09_13_090457_create_countries_table', 9),
(38, '2021_09_13_090511_create_states_table', 9),
(39, '2021_09_13_090521_create_cities_table', 9),
(42, '2021_09_14_054257_create_orders_table', 10),
(43, '2021_09_14_060145_add_softdeletes_orders', 10),
(45, '2021_09_15_065816_add_status_column_carts', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `prod_id`, `address`, `contact`, `city_id`, `price`, `qty`, `total`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 1, 'Sit ea facilis dolor', '+1 (333) 216-6993', 2, 15999.00, 1, 15999.00, 0, '2021-09-15 23:24:27', '2021-09-16 08:14:36', NULL),
(4, 2, 2, 'Sit ea facilis dolor', '+1 (333) 216-6993', 2, 59999.00, 2, 119998.00, 0, '2021-09-15 23:24:27', '2021-09-16 08:13:29', NULL),
(27, 2, 1, 'xyz, flat-121B,\r\nAhmedabad-382016', '1234567890', 1, 15999.00, 1, 15999.00, 0, '2021-09-16 04:08:48', '2021-09-16 08:10:22', NULL),
(28, 2, 2, 'xyz, flat-121B,\r\nAhmedabad-382016', '1234567890', 1, 59999.00, 2, 119998.00, 0, '2021-09-16 04:08:48', '2021-09-16 07:58:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prodname`, `details`, `price`, `image`, `cat_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Redmi Note 8 Pro', 'This is the product by Xiaomi', 15999.00, '163100380512934.jpg', 1, '2021-09-04 06:30:59', '2021-09-07 03:06:45', NULL),
(2, 'Dell Inspiron', 'This is the product by Dell', 59999.00, '163091291468232.png', 2, '2021-09-04 02:18:37', '2021-09-06 01:51:54', NULL),
(3, 'One plus 8', 'This is product by One Plus', 29999.00, '163098844851026.jpg', 1, '2021-09-05 23:45:47', '2021-09-06 22:50:48', NULL),
(4, 'Realme 8', 'This is Realme 8', 12999.00, '163098846654380.jpg', 1, '2021-09-06 00:27:20', '2021-09-06 22:51:06', NULL),
(5, 'Realme X2 Pro', 'This is Realme X2 Pro', 29999.00, '163098848289353.jpg', 1, '2021-09-06 00:28:50', '2021-09-06 22:51:22', NULL),
(6, 'One Plus 5T', 'This is One Plus 5T', 34999.00, '163098850652501.jpg', 1, '2021-09-06 00:29:46', '2021-09-06 22:51:46', NULL),
(7, 'HP Pavilion', 'This is HP Pavilion', 59999.00, '163098852311610.jpg', 2, '2021-09-06 00:30:55', '2021-09-06 22:52:03', NULL),
(8, 'Lenovo', 'This is Lenovo Laptop', 59999.00, '163091943587920.png', 2, '2021-09-06 00:32:29', '2021-09-06 03:40:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-09-04 11:33:37', '2021-09-04 11:33:37'),
(2, 'User', '2021-09-04 13:09:17', '2021-09-04 13:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', 1, '2021-09-13 10:43:42', '2021-09-13 10:43:42'),
(2, 'New York', 2, '2021-09-13 12:29:26', '2021-09-13 12:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studname`, `eno`, `d_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Divyesh', '53738375374', 2, '2021-09-02 06:11:59', '2021-09-03 03:56:58', NULL),
(3, 'Dhruv', '170820107048', 1, '2021-09-02 06:17:30', '2021-09-02 07:51:17', NULL),
(4, 'Priyank', '25648749656', 4, '2021-09-02 07:45:49', '2021-09-03 01:57:43', '2021-09-03 01:57:43'),
(5, 'Somins', '254855489785', 1, '2021-09-02 07:49:21', '2021-09-03 05:19:02', NULL),
(6, 'Samarth', '170820107037', 1, '2021-09-02 07:57:23', '2021-09-03 01:58:06', '2021-09-03 01:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin123.com', NULL, '$2y$10$ZiUJRQuzmYDflhncr5r8vOBw3AxVyp7YNPnmrzEWitXmI3rqD1Ah2', NULL, '2021-09-02 07:59:25', '2021-09-02 07:59:25'),
(2, 2, 'User', 'user@user.com', NULL, '$2y$10$F/5lJqNEHEkv4d8aUep9O.EJBpsZQcT315hoerCS0AMaXiK5j8kqW', NULL, '2021-09-04 07:32:02', '2021-09-04 07:32:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
