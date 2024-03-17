-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 17, 2024 lúc 06:21 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Nike', '2024-03-02 20:45:35', '2024-03-02 20:45:35'),
(22, 'Adidas', '2024-03-07 22:08:51', '2024-03-07 22:08:51'),
(23, 'Jordan', '2024-03-07 22:18:30', '2024-03-07 22:18:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 2),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(10, '2024_02_02_042452_create_product_table', 3),
(11, '2024_03_02_034258_create_brand_table', 4),
(13, '2024_03_09_190353_slider', 5),
(14, '2024_03_15_015127_order', 6),
(15, '2024_03_16_044716_order_detail', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `payment` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `userID`, `name`, `tel`, `city`, `district`, `ward`, `address`, `note`, `payment`, `total`, `created_at`, `updated_at`) VALUES
(12, 5, 'Thành', '0987390584', 'Quận Thủ Đức', 'Quận Thủ Đức', 'Phường Hiệp Bình Chánh', '8/11 đường số 3', 'qưeqweqwe', 'COD', 5500000, '2024-03-15 23:33:54', '2024-03-15 23:33:54'),
(13, 10, 'user 1', '0377421240', 'Tỉnh Tuyên Quang', 'Huyện Na Hang', 'Xã Sinh Long', '123a', 'test', 'COD', 7800000, '2024-03-16 12:46:38', '2024-03-16 12:46:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `user_id`, `product_id`, `productName`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(8, 10, 5, 39, 'NIKE RUN SWIFT 3', '1', '2300000', '2024-03-15 23:29:21', '2024-03-15 23:29:21'),
(9, 10, 5, 38, 'NIKE PEGASUS 40', '1', '3200000', '2024-03-15 23:29:21', '2024-03-15 23:29:21'),
(10, 11, 5, 35, 'NIKE AIR ZOOM TEMPO NEXT%', '1', '6800000', '2024-03-15 23:31:33', '2024-03-15 23:31:33'),
(11, 11, 5, 36, 'NIKE P-6000', '1', '3500000', '2024-03-15 23:31:33', '2024-03-15 23:31:33'),
(12, 12, 5, 30, 'NIKE RUN SWIFT 3', '1', '2300000', '2024-03-15 23:33:54', '2024-03-15 23:33:54'),
(13, 12, 5, 31, 'AIR FORCE 1 BLACK SWOOSH', '1', '3200000', '2024-03-15 23:33:54', '2024-03-15 23:33:54'),
(14, 13, 10, 30, 'NIKE RUN SWIFT 3', '2', '2300000', '2024-03-16 12:46:38', '2024-03-16 12:46:38'),
(15, 13, 10, 31, 'AIR FORCE 1 BLACK SWOOSH', '1', '3200000', '2024-03-16 12:46:38', '2024-03-16 12:46:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `description`, `brand`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(30, 'NIKE RUN SWIFT 3', 'uploads/1709873959.jpeg', '123', 'Nike', 2300000, 5, '2024-03-07 21:59:19', '2024-03-07 21:59:19'),
(31, 'AIR FORCE 1 BLACK SWOOSH', 'uploads/1709874014.jpeg', '123', 'Nike', 3200000, 5, '2024-03-07 22:00:14', '2024-03-07 22:00:14'),
(32, 'NIKE TERMINATOR LOW PHANTOM', 'uploads/1709874048.jpeg', '123', 'Nike', 3900000, 5, '2024-03-07 22:00:48', '2024-03-07 22:00:48'),
(33, 'NIKE AAF88 X BILLIE FIRE RED AND WHITE', 'uploads/1709874104.jpeg', '123', 'Nike', 3500000, 5, '2024-03-07 22:01:44', '2024-03-07 22:01:44'),
(34, 'NIKE AIR FORCE 1 \'07', 'uploads/1709874148.jpeg', '123', 'Nike', 4200000, 5, '2024-03-07 22:02:28', '2024-03-07 22:02:28'),
(35, 'NIKE AIR ZOOM TEMPO NEXT%', 'uploads/1709874180.jpeg', '123', 'Nike', 6800000, 5, '2024-03-07 22:03:00', '2024-03-07 22:03:00'),
(36, 'NIKE P-6000', 'uploads/1709874216.jpeg', '123', 'Nike', 3500000, 5, '2024-03-07 22:03:36', '2024-03-07 22:03:36'),
(37, 'NIKE MC TRAINER 2', 'uploads/1709874250.jpeg', '123', 'Nike', 2800000, 5, '2024-03-07 22:04:10', '2024-03-07 22:04:10'),
(38, 'NIKE PEGASUS 40', 'uploads/1709874291.jpeg', '123', 'Nike', 3200000, 5, '2024-03-07 22:04:51', '2024-03-07 22:04:51'),
(39, 'NIKE RUN SWIFT 3', 'uploads/1709874328.jpeg', '123', 'Nike', 2300000, 5, '2024-03-07 22:05:28', '2024-03-07 22:05:28'),
(40, 'ADIDAS SAMBA OG', 'uploads/1709874564.jpeg', '123', 'Adidas', 3600000, 5, '2024-03-07 22:06:51', '2024-03-07 22:09:24'),
(41, 'ADIDAS FORUM 84 LOW', 'uploads/1709874577.jpeg', '123', 'Adidas', 2900000, 5, '2024-03-07 22:08:40', '2024-03-07 22:09:37'),
(42, 'FIVE TEN TRAILCROSS LT MOUNTAIN BIKE', 'uploads/1709874614.jpeg', '123', 'Adidas', 2900000, 5, '2024-03-07 22:10:14', '2024-03-07 22:10:14'),
(43, 'FREERIDER PRO \'GREY BRONZE STRATA\'', 'uploads/1709874641.jpeg', '123', 'Adidas', 2900000, 5, '2024-03-07 22:10:41', '2024-03-07 22:10:41'),
(44, 'ADIDAS SUPERSTAR', 'uploads/1709874680.jpeg', '123', 'Adidas', 2200000, 5, '2024-03-07 22:11:20', '2024-03-07 22:11:20'),
(45, 'ADIDAS NMD_S1', 'uploads/1709874710.jpeg', '123', 'Adidas', 2900000, 5, '2024-03-07 22:11:50', '2024-03-07 22:11:50'),
(46, 'ADIDAS ZNSORED', 'uploads/1709874765.jpeg', '123', 'Adidas', 2200000, 5, '2024-03-07 22:12:45', '2024-03-07 22:12:45'),
(47, 'ADIDAS ULTRA4D SUN DEVILS', 'uploads/1709874800.jpeg', '123', 'Adidas', 4800000, 5, '2024-03-07 22:13:20', '2024-03-07 22:13:20'),
(48, 'ADIDAS ADISTAR', 'uploads/1709874829.jpeg', '123', 'Adidas', 2900000, 5, '2024-03-07 22:13:49', '2024-03-07 22:13:49'),
(49, 'SOLAR HU NMD', 'uploads/1709874860.jpeg', '123', 'Adidas', 5800000, 5, '2024-03-07 22:14:20', '2024-03-07 22:14:20'),
(50, 'AIR JORDAN MAX AURA 5', 'uploads/1710299868.jpeg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!', 'Jordan', 3900000, 5, '2024-03-07 22:20:31', '2024-03-12 20:17:49'),
(51, 'JORDAN 1 MID \'TAXI\'', 'uploads/1709875255.jpeg', '123', 'Jordan', 4200000, 5, '2024-03-07 22:20:55', '2024-03-07 22:20:55'),
(52, 'JORDAN 1 ELEVATE LOW', 'uploads/1709875280.jpeg', '123', 'Jordan', 4800000, 5, '2024-03-07 22:21:20', '2024-03-07 22:21:20'),
(53, 'JORDAN 4 \'SAIL METALLIC GOLD\'', 'uploads/1709875310.jpeg', '123', 'Jordan', 8500000, 5, '2024-03-07 22:21:50', '2024-03-07 22:21:50'),
(54, 'NIKE SB DUNK LOW', 'uploads/1709875337.jpeg', '123', 'Jordan', 28000000, 5, '2024-03-07 22:22:17', '2024-03-07 22:22:17'),
(55, 'JORDAN 1 LOW BULL CHICAGO', 'uploads/1709875370.jpeg', '123', 'Jordan', 4800000, 5, '2024-03-07 22:22:50', '2024-03-07 22:22:50'),
(56, 'AIR JORDAN 4 BLUE', 'uploads/1709875402.jpeg', '123', 'Jordan', 6800000, 5, '2024-03-07 22:23:22', '2024-03-07 22:23:22'),
(57, 'AIR JORDAN 3 BLACK GOLD', 'uploads/1709875435.jpeg', '123', 'Jordan', 4800000, 5, '2024-03-07 22:23:55', '2024-03-07 22:23:55'),
(58, 'AIR JORDAN 5 LOW PSG', 'uploads/1709875467.jpeg', '123', 'Jordan', 6800000, 5, '2024-03-07 22:24:27', '2024-03-07 22:24:27'),
(59, 'AIR JORDAN 1 ELEVATE LOW', 'uploads/1709875504.jpeg', '123', 'Jordan', 5800000, 5, '2024-03-07 22:25:04', '2024-03-07 22:25:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `content1` varchar(255) NOT NULL,
  `content2` varchar(255) NOT NULL,
  `content3` varchar(255) NOT NULL,
  `content4` varchar(255) DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `content1`, `content2`, `content3`, `content4`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Khuyến mãi', 'Uư  đãi  dành  khách  hàng mới lên  tới  100.000/VNĐ', 'Cho  các hóa đơn', 'trên 500.000/VNĐ', '1710124319.jpeg', NULL, '2024-03-10 19:31:59'),
(2, 'Khuyến mãi', 'Miễn  phí  vận  chuyển', 'Cho  các hóa đơn', 'trên 1.000.000/VNĐ', '1710124429.jpeg', NULL, '2024-03-10 19:33:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `city`, `district`, `ward`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Thành', 'thanhvan2703201@gmail.com', '0987390584', 'Thành phố Hồ Chí Minh', 'Quận Thủ Đức', 'Phường Hiệp Bình Chánh', '8/11 đường số 3', NULL, '$2y$12$HejIHo/Abc4SAz36Owyh1.e2YzjBM2ztwKvmqzZc.MXXtVPjk.Z8i', NULL, '2024-01-16 04:11:25', '2024-03-14 22:59:57'),
(10, 'user 1', 'user@gmail.com', '0377421240', NULL, NULL, NULL, NULL, NULL, '$2y$12$WK5fTM9gg7IPgGfxRjCxSulK6pS6Nbjrhx8zAMYJ8ZnvL3mRPtdB6', NULL, '2024-03-16 12:45:12', '2024-03-16 12:45:57');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
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
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
