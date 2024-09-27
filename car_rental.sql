-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 08:53 PM
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
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(31, 'Beau Garrett', 'Est iste enim dolore', 'Aliquam et laborum', '1990', 'Sed voluptatibus lab', 703.00, 1, '1727291522.1.jpg', '2024-09-25 13:12:02', '2024-09-25 13:12:02'),
(32, 'Katell Martinez', 'Et ipsum suscipit n', 'Reiciendis magnam ea', '2011', 'Dolore sit fuga Ali', 337.00, 1, '1727343533.2.jpg', '2024-09-26 03:38:53', '2024-09-26 03:40:08'),
(33, 'Alvin Potts', 'Est qui sed doloribu', 'Nesciunt voluptatib', '1995', 'Ut cumque ut dolores', 464.00, 1, '1727343595.3.jpg', '2024-09-26 03:39:55', '2024-09-26 03:40:44'),
(34, 'Clementine Green', 'Sed consectetur quis', 'Odit quis ex occaeca', '1988', 'Laudantium voluptat', 567.00, 1, '1727343653.4.jpg', '2024-09-26 03:40:53', '2024-09-26 05:09:22'),
(35, 'Ira Britt', 'Qui nisi ea in eu do', 'Excepturi omnis sunt', '1985', 'Ad debitis commodo a', 441.00, 1, '1727343668.5.jpg', '2024-09-26 03:41:08', '2024-09-26 03:41:08'),
(36, 'Abbot Tillman', 'Nesciunt quis totam', 'Anim irure dignissim', '1977', 'Aspernatur sunt qui', 442.00, 0, '1727343678.5.jpg', '2024-09-26 03:41:18', '2024-09-26 03:41:18'),
(37, 'Chandler Duffy', 'Laudantium ducimus', 'Ea sequi id et labor', '2008', 'Ipsam id quas incidu', 963.00, 1, '1727348952.15.jpg', '2024-09-26 05:09:12', '2024-09-26 05:09:12'),
(38, 'Kelly Knight', 'Doloremque voluptas', 'Odit minima omnis en', '2014', 'Eligendi omnis rerum', 819.00, 1, '1727459133.11.jpg', '2024-09-27 11:45:33', '2024-09-27 11:45:33');

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
(1, '2024_09_19_180410_create_cars_table', 1),
(2, '2024_09_19_180445_create_users_table', 1),
(3, '2024_09_19_180455_create_rentals_table', 1),
(4, '2024_09_19_181232_create_sessions_table', 2),
(5, '2024_09_21_180831_create_cache_table', 3),
(6, '2024_09_26_174233_create_rentals_table', 4),
(7, '2024_09_26_174710_create_sessions_table', 5),
(8, '2024_09_26_174952_create_cache_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 3, 31, '2024-09-27', '2024-09-30', 2109.00, '2024-09-26 11:44:20', '2024-09-26 11:44:20'),
(2, 3, 32, '2024-09-27', '2024-09-29', 674.00, '2024-09-26 11:45:10', '2024-09-26 11:45:10'),
(3, 1, 34, '2024-09-27', '2024-09-28', 567.00, '2024-09-26 11:51:35', '2024-09-26 11:51:35'),
(4, 1, 35, '2024-09-28', '2024-10-11', 5733.00, '2024-09-27 11:47:05', '2024-09-27 11:47:05');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UEAVmMDwywIQng5kCTkC5lNFNhuTIoWEQkgDSNli', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOG03enZBdEExQlo3Rm1KSFZPOHg0UFRwZ1ozNmp2VnhUb0syV1ZrWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1727462933);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'ashraful', 'idb.ashraful@gmail.con', '$2y$12$OEVYwaWPAtjCqgENZND4BumNkp867OnZWyc92gy/mYJyo6XvvOwFG', 'admin', '2024-09-21 11:17:31', '2024-09-21 11:17:31'),
(2, 'ashraf', 'ashraf@email.com', '$2y$12$OEVYwaWPAtjCqgENZND4BumNkp867OnZWyc92gy/mYJyo6XvvOwFG', 'admin', NULL, NULL),
(3, 'Ashraful ', 'ashraful@email.com', '$2y$12$RG3Ue0JWT27sTY.8mwQYN.jsoPTJT.oFv.egHRqKtoEPfuHblqVjm', 'customer', '2024-09-23 10:47:20', '2024-09-23 10:47:20'),
(4, 'islam', 'islam@email.com', '$2y$12$e7Uv1H.ywzHyFTTiZyEuR.KVg57i2lvK0DJoAHTtONgzhyNqsUcHG', 'customer', '2024-09-24 11:53:36', '2024-09-24 11:53:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
