-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 03:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `areyriecommercedb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `product_title` varchar(191) DEFAULT NULL,
  `quantity` varchar(191) DEFAULT NULL,
  `price` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `product_id` varchar(191) DEFAULT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `quantity`, `price`, `image`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(29, 'user1', 'idolgloc@gmail.com', '09215172724', 'laguna, philippines', 'test', '16', '19392', NULL, '15', '3', '2023-11-28 07:29:48', '2023-11-28 07:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', '2023-11-12 08:02:40', '2023-11-12 08:02:40'),
(9, 'Palda', '2023-11-15 07:24:17', '2023-11-15 07:24:17'),
(13, 'Toy', '2023-11-19 03:03:16', '2023-11-19 03:03:16'),
(14, 'Laptop', '2023-11-24 05:57:27', '2023-11-24 05:57:27'),
(15, 'T shirt', '2023-11-24 05:57:33', '2023-11-24 05:57:33'),
(16, 'Pants', '2023-11-24 05:57:37', '2023-11-24 05:57:37');

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
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_09_124505_create_sessions_table', 1),
(7, '2023_11_12_153200_create_categories_table', 1),
(8, '2023_11_15_154308_create_products_table', 1),
(9, '2023_11_22_093053_create_carts_table', 1),
(10, '2023_11_23_145936_create_orders_table', 1),
(11, '2023_11_27_125847_create_notifications_table', 2),
(12, '2023_12_06_005000_add_google_id_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `product_title` varchar(191) DEFAULT NULL,
  `quantity` varchar(191) DEFAULT NULL,
  `price` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `product_id` varchar(191) DEFAULT NULL,
  `payment_status` varchar(191) DEFAULT NULL,
  `delivery_status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(30, 'padder', 'padder1010@gmail.com', '09123456789', 'laguna, philippines', '1', 'test', '7', '8484', NULL, '15', 'Paid', 'delivered', '2023-11-24 08:20:38', '2023-11-25 03:13:56'),
(31, 'padder', 'padder1010@gmail.com', '09123456789', 'laguna, philippines', '1', 'test3', '5', '12115', NULL, '12', 'Paid', 'You canceled the order', '2023-11-24 08:20:38', '2023-11-28 21:02:06'),
(32, 'padder', 'padder1010@gmail.com', '09123456789', 'laguna, philippines', '1', 'test', '13', '1443', NULL, '18', 'Paid', 'You canceled the order', '2023-11-24 08:39:23', '2023-11-28 21:02:04'),
(33, 'padder', 'padder1010@gmail.com', '09123456789', 'laguna, philippines', '1', 'test', '4', '932', NULL, '23', 'Paid', 'delivered', '2023-11-24 23:22:44', '2023-11-25 06:39:28'),
(34, 'user1', 'idolgloc@gmail.com', '09215172724', 'laguna, philippines', '3', 'test', '3', '3636', NULL, '15', 'Paid', 'You canceled the order', '2023-11-25 06:38:18', '2023-11-28 07:39:44'),
(35, 'user1', 'idolgloc@gmail.com', '09215172724', 'laguna, philippines', '3', 'test', '3', '99', NULL, '16', 'Paid', 'You canceled the order', '2023-11-25 06:38:19', '2023-11-28 07:42:00'),
(36, 'user1', 'idolgloc@gmail.com', '09215172724', 'laguna, philippines', '3', 'test', '1', '111', NULL, '18', 'Paid', 'delivered', '2023-11-25 06:38:19', '2023-11-25 06:39:20'),
(37, 'user1', 'idolgloc@gmail.com', '09215172724', 'laguna, philippines', '3', 'test', '3', '135', NULL, '20', 'Paid', 'delivered', '2023-11-25 06:38:19', '2023-11-25 06:39:18'),
(38, 'user1', 'idolgloc@gmail.com', '09215172724', 'laguna, philippines', '3', 'test', '5', '105', NULL, '21', 'Paid', 'delivered', '2023-11-25 06:38:19', '2023-11-25 06:39:15'),
(39, 'user1', 'idolgloc@gmail.com', '09215172724', 'laguna, philippines', '3', 'test', '9', '198', NULL, '19', 'Paid', 'delivered', '2023-11-25 06:38:19', '2023-11-25 06:39:12'),
(40, 'padder', 'padder1010@gmail.com', '09123456789', 'laguna, philippines', '1', 'test4', '6', '141138', NULL, '13', 'cash on delivery', 'You canceled the order', '2023-11-28 21:01:46', '2023-11-28 21:02:03'),
(42, 'padder', 'padder1010@gmail.com', '09123456789', 'laguna, philippines', '1', 'test1', '1', '4502', NULL, '2', 'cash on delivery', 'You canceled the order', '2023-12-01 16:33:26', '2023-12-01 16:40:04'),
(43, 'padder', 'padder1010@gmail.com', '09123456789', 'laguna, philippines', '1', 'test', '1', '1212', NULL, '15', 'cash on delivery', 'You canceled the order', '2023-12-01 16:33:27', '2023-12-02 20:00:42'),
(44, 'Xzyve', 'xzyve43@gmail.com', '', NULL, '23', 'test', '1', '455', NULL, '3', 'cash on delivery', 'processing', '2023-12-05 18:21:49', '2023-12-05 18:21:49'),
(45, 'Xzyve', 'xzyve43@gmail.com', '', NULL, '23', 'test', '1', '455', NULL, '3', 'cash on delivery', 'processing', '2023-12-05 18:29:15', '2023-12-05 18:29:15');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(2, 'test1', 'test1', '1700140856.jpg', 'Palda', '45', '4502', NULL, '2023-11-16 05:20:56', '2023-11-19 05:40:23'),
(3, 'test', 'test2', '1700140981.jpg', 'Shirt', '4545', '455', NULL, '2023-11-16 05:23:01', '2023-11-16 05:23:01'),
(12, 'test3', 'test3', '1700400447.PNG', 'Shirt', '2344', '23242', '2423', '2023-11-19 05:27:27', '2023-11-19 05:27:27'),
(13, 'test4', 'test4', '1700400471.PNG', 'Toy', '234', '34234', '23523', '2023-11-19 05:27:51', '2023-11-19 05:27:51'),
(14, 'test5', 'test5', '1700400499.PNG', 'Shirt', '1231', '3123', '123', '2023-11-19 05:28:19', '2023-11-19 05:28:19'),
(15, 'test', 'test', '1700494196.jpg', 'Shirt', '1212', '132', '1212', '2023-11-20 07:29:56', '2023-11-20 07:29:56'),
(16, 'test', 'test', '1700494209.jpg', 'Palda', '322', '1212', '33', '2023-11-20 07:30:09', '2023-11-20 07:30:09'),
(17, 'test', 'test', '1700494223.jpg', 'Toy', '21', '232', '5454', '2023-11-20 07:30:23', '2023-11-20 07:30:23'),
(18, 'test', 'test', '1700494421.jpg', 'Shirt', '13', '323', '111', '2023-11-20 07:33:41', '2023-11-20 07:33:41'),
(19, 'test', 'test', '1700494432.jpg', 'Shirt', '42', '3423', '22', '2023-11-20 07:33:52', '2023-11-20 07:33:52'),
(20, 'test', 'test', '1700494443.jpg', 'Palda', '21', '323', '45', '2023-11-20 07:34:03', '2023-11-20 07:34:03'),
(21, 'test', 'test', '1700494476.jpg', 'Palda', '34', '434', '21', '2023-11-20 07:34:36', '2023-11-20 07:34:36'),
(22, 'test', 'test', '1700494492.jpg', 'Palda', '234', '343', '44', '2023-11-20 07:34:52', '2023-11-20 07:34:52'),
(23, 'test', 'test', '1700757415.jpg', 'Shirt', '42', '22', '233', '2023-11-23 08:36:55', '2023-11-23 08:36:55'),
(24, 'NEw', 'test', '1701524213.jpeg', 'Shirt', '12', '350', '0', '2023-12-02 05:36:53', '2023-12-02 05:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `google_id` varchar(191) DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'padder', 'padder1010@gmail.com', NULL, '0', '09123456789', 'laguna, philippines', '2023-11-01 15:47:51', '$2y$10$b/Sm6XQPxkkL8icnoyC2dOaRUyypL4vhAg7tjtrDKyuIsrc7syetO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 05:04:22', '2023-10-09 05:04:22'),
(2, 'admin', 'renzanjelo542@gmail.com', NULL, '1', '09215172724', 'laguna, philippines', '2023-11-01 14:35:48', '$2y$10$NZzgFBy1mkqicrqbikUNseSA0OHqUcs9xTbIZD/q3euvXksIJH.LO', NULL, NULL, NULL, 'DlPBxFIsA4zQy3JB5LCbWKT1IB6sKdLCV0WsLVdwYJIn3KaHB9dyfXatQpaN', NULL, NULL, '2023-10-09 05:06:12', '2023-10-09 05:06:12'),
(3, 'user1', 'idolgloc@gmail.com', NULL, '0', '09215172724', 'laguna, philippines', '2023-11-25 06:32:07', '$2y$10$.wv5Ga32XVmveUkjCsdcVOhAA21oTJLhOWpNIxd9edabNAIJaN74.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-25 06:26:12', '2023-11-25 06:32:07'),
(4, 'Michael', 'info@email.com', NULL, '0', '0991234578', 'Maslun', NULL, '$2y$10$TaAnNdTjO2dQV7QUZQNN/O7Jl8dctoEaHG3I93KCePx8a/4dTiLqC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-01 16:54:28', '2023-12-01 16:54:28');

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
