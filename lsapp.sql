-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 21, 2021 lúc 06:37 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lsapp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `devices`
--

CREATE TABLE `devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `DeviceName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouseID` int(11) NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `devices`
--

INSERT INTO `devices` (`id`, `DeviceName`, `warehouseID`, `body`, `created_at`, `updated_at`) VALUES
(9, 'LCD', 7, '<p>ggg</p>', '2021-06-07 02:53:51', '2021-06-07 02:53:51'),
(10, 'TEMP-HUMID', 7, '<p>adadasdas</p>', '2021-06-07 02:54:31', '2021-06-07 02:54:31'),
(11, 'SPEAKER', 7, '<p>aa</p>', '2021-06-07 04:25:05', '2021-06-07 04:25:05'),
(14, 'LCD', 8, '<p>bb</p>', '2021-06-11 10:38:47', '2021-06-11 10:38:47'),
(15, 'TEMP-HUMID', 8, '<p>b</p>', '2021-06-11 10:38:56', '2021-06-11 10:38:56'),
(16, 'SPEAKER', 8, '<p>a</p>', '2021-06-11 10:39:25', '2021-06-11 10:39:25'),
(17, 'TEMP-HUMID', 7, '<p>g&oacute;c trong c&ugrave;ng l&ograve; sưởi</p>', '2021-06-16 04:33:46', '2021-06-16 04:33:46'),
(18, 'RELAY', 7, '<p>vvv</p>', '2021-06-19 20:56:03', '2021-06-19 20:56:03'),
(19, 'SPEAKER', 9, '<p>a</p>', '2021-06-19 21:47:36', '2021-06-19 21:47:36'),
(21, 'LCD', 9, '<p>v</p>', '2021-06-20 00:40:43', '2021-06-20 00:40:43'),
(22, 'TEMP-HUMID', 9, '<p>a</p>', '2021-06-20 00:41:04', '2021-06-20 00:41:04'),
(23, 'RELAY', 9, '<p>b</p>', '2021-06-20 02:27:10', '2021-06-20 02:27:10'),
(24, 'LCD', 10, '<p>a</p>', '2021-06-20 10:13:44', '2021-06-20 10:13:44'),
(25, 'SPEAKER', 10, '<p>a</p>', '2021-06-20 10:13:49', '2021-06-20 10:13:49'),
(26, 'TEMP-HUMID', 10, '<p>b</p>', '2021-06-20 10:13:54', '2021-06-20 10:13:54'),
(27, 'RELAY', 10, '<p>c</p>', '2021-06-20 10:13:59', '2021-06-20 10:13:59'),
(28, 'LCD', 11, '<p>b</p>', '2021-06-21 00:18:19', '2021-06-21 00:18:19'),
(29, 'SPEAKER', 11, '<p>a</p>', '2021-06-21 00:18:23', '2021-06-21 00:18:23'),
(30, 'TEMP-HUMID', 11, '<p>a</p>', '2021-06-21 00:18:27', '2021-06-21 00:18:27'),
(31, 'RELAY', 11, '<p>a</p>', '2021-06-21 00:18:34', '2021-06-21 00:18:34'),
(33, 'LCD', 12, '<p>b</p>', '2021-06-21 08:53:23', '2021-06-21 08:53:23'),
(34, 'SPEAKER', 12, '<p>b</p>', '2021-06-21 08:53:27', '2021-06-21 08:53:27'),
(35, 'TEMP-HUMID', 12, '<p>b</p>', '2021-06-21 08:53:30', '2021-06-21 08:53:30'),
(36, 'RELAY', 12, '<p>b</p>', '2021-06-21 08:53:34', '2021-06-21 08:53:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2017_06_02_182856_create_posts_table', 1),
(19, '2017_06_03_144733_add_user_id_to_posts', 1),
(20, '2017_06_03_211549_add_cover_image_to_posts', 1),
(21, '2021_05_16_073048_create_tmp_table', 1),
(22, '2021_05_21_160106_create_sessions_table', 2),
(23, '2021_05_18_011227_edit_tmp_table', 3),
(24, '2021_05_30_001940_create_devices_table', 4),
(28, '2021_06_01_053958_create_devices_table', 5),
(29, '2021_06_06_101816_devices', 6),
(30, '2021_06_07_092217_create_sessions_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(11, 'bk b4', '<p>a</p>', '2021-06-21 00:18:14', '2021-06-21 00:18:14', 1, 'noimage.jpg'),
(12, 'BK CSE', '<p>a</p>', '2021-06-21 08:53:08', '2021-06-21 08:53:08', 1, 'noimage.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tmp`
--

CREATE TABLE `tmp` (
  `id` int(10) UNSIGNED NOT NULL,
  `celsius` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tri Nguyen', 'tri.nguyenminhtri@hcmut.edu.vn', '$2y$10$2XvJpjV3mGyguSNaZSlxheEXohaWDW3YuN8YoGFh7W3qsqPXs0JUu', '7yAhJ5VsVxBjE72ZFIPi273fjczvgFhOHMAJOoOjlMrzorGZUMOpNlS7IuKx', '2021-05-22 01:01:01', '2021-05-22 01:01:01'),
(2, 'Tri Nguyen', 'tri.nguyenminhtri2@hcmut.edu.vn', '$2y$10$bqSRdOrm0PTpWivCjEqdx.gL.iSsRS5mStJDM7gZI.woj4joTmWG.', '2vpI2X7g5M1bHwRzbmkG4gKtYwzPaqZGJOCxw1NWcYo2omHC3MSE3P3hFXVG', '2021-05-23 02:36:57', '2021-05-23 02:36:57'),
(3, 'Tri Nguyen', 'tri.nguyenminhtri3@hcmut.edu.vn', '$2y$10$ezJMKvzR/1Aj0HOq8d9eNuFA7umEaC96jKZxetJlZ3eBnTve2c26S', 'tRZ2h5BRjoK4sU2gMc55lIexWwtvaIJqdj1qiO1QJBYcu3g68fDt7XT7LEqK', '2021-05-23 02:44:26', '2021-05-23 02:44:26'),
(4, 'Tri Nguyen', 'tri.nguyenminhtri@hcmut.edu.vn4', '$2y$10$AAZL3dPXkwvpZCZLZeEn0u6NB7LPoWxZbrmXAqT5Ym3xG4z9YPo5C', 'iWKEDChWgBAdfHkP0csuv8CJNxh45M3xxr1gcePhBOr58vYrUR6Ko3oKHofb', '2021-05-23 02:46:47', '2021-05-23 02:46:47');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Chỉ mục cho bảng `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
