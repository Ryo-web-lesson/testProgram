-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-07-10 22:33:49
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ecsite`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `imgpath` varchar(255) NOT NULL COMMENT '画像パス',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `quantity`, `imgpath`, `created_at`, `updated_at`) VALUES
(3, 1, 13, 1, '20230723_171923_iphone13PAR59392_TP_V4 (1).jpg', '2023-07-10 11:19:20', '2023-07-10 11:19:29');

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`id`, `comment`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'テストです', 13, 1, '2023-07-10 09:18:45', '2023-07-10 09:18:45');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
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
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL COMMENT '顧客ID',
  `product_id` bigint(20) UNSIGNED NOT NULL COMMENT '商品ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '2023-07-10 09:16:19', '2023-07-10 09:16:19');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_04_044905_create_products_table', 1),
(6, '2023_07_04_045313_create_orders_table', 1),
(7, '2023_07_04_045927_create_order__detaills_table', 1),
(8, '2023_07_04_050203_create_likes_table', 1),
(9, '2023_07_04_050657_create_carts_table', 1),
(10, '2023_07_04_051631_create_admins_table', 1),
(11, '2023_07_10_091906_create_comments_table', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL COMMENT '顧客ID',
  `name` varchar(255) NOT NULL COMMENT '宛名',
  `postal_code` int(11) NOT NULL COMMENT '郵便番号',
  `prefecture` varchar(255) NOT NULL COMMENT '都道府県',
  `address1` varchar(255) NOT NULL COMMENT '住所1',
  `address2` varchar(255) DEFAULT NULL COMMENT '住所2',
  `postage` int(11) NOT NULL COMMENT '送料',
  `billing_amount` int(11) NOT NULL COMMENT '請求金額',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '注文ステータス',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `postal_code`, `prefecture`, `address1`, `address2`, `postage`, `billing_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '山田', 0, '大阪府', '大阪市平野区平野西1-11-31', NULL, 3060, 874, 0, '2023-07-10 09:17:45', '2023-07-10 09:17:45');

-- --------------------------------------------------------

--
-- テーブルの構造 `order__detaills`
--

CREATE TABLE `order__detaills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL COMMENT '顧客ID',
  `order_id` bigint(20) NOT NULL COMMENT '購入ID',
  `product_id` bigint(20) NOT NULL COMMENT '商品ID',
  `price` int(11) NOT NULL COMMENT '決済時商品単価',
  `quantity` int(11) NOT NULL COMMENT '数量',
  `imgpath` varchar(255) NOT NULL COMMENT '画像パス',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `order__detaills`
--

INSERT INTO `order__detaills` (`id`, `customer_id`, `order_id`, `product_id`, `price`, `quantity`, `imgpath`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 11, 874, 1, '20230756_164056_017kumakichi0327_TP_V4.jpg', '2023-07-10 09:17:45', '2023-07-10 09:17:45');

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
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
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '商品名',
  `price` int(11) NOT NULL COMMENT '価格',
  `category` int(11) NOT NULL COMMENT '商品カテゴリ',
  `description` text NOT NULL COMMENT '商品説明',
  `stock` int(11) NOT NULL COMMENT '在庫数',
  `imgpath` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `description`, `stock`, `imgpath`, `created_at`, `updated_at`) VALUES
(1, 'testitem1', 10000, 1, 'aaaaaaaaaaa', 99, '20230702_163702_yudai725028_TP_V4.jpg', '2023-07-10 07:37:02', '2023-07-10 07:37:02'),
(2, 'testitem2', 5000, 1, 'aaaaaaaaaa', 99, '20230718_163718_woman-3551832_1280.jpg', '2023-07-10 07:37:18', '2023-07-10 07:37:18'),
(3, 'testitem3', 10000, 2, 'asiakais', 88, '20230735_163735_woman-1919143_1280.jpg', '2023-07-10 07:37:35', '2023-07-10 07:37:35'),
(4, 'testitem4', 55555, 3, 'aksiaksaisas', 99, '20230756_163756_woman-1274056_1280.jpg', '2023-07-10 07:37:56', '2023-07-10 07:37:56'),
(5, 'testitem5', 5554, 4, 'aksiuufdyfuja', 6054, '20230722_163822_susipakuameIMG_1656_TP_V4.jpg', '2023-07-10 07:38:22', '2023-07-10 07:38:22'),
(6, 'testitem6', 5046, 5, 'asksisifufuasda', 99, '20230738_163838_nature-3106213_1280.jpg', '2023-07-10 07:38:38', '2023-07-10 07:38:38'),
(7, 'testitem7', 8874, 6, 'asoofigggggd', 99, '20230755_163855_mamechi1110015_TP_V4.jpg', '2023-07-10 07:38:55', '2023-07-10 07:38:55'),
(8, 'testitem8', 2525, 6, 'kiifguudjksdfgs', 1547, '20230719_163919_fashion-2309519_1280.jpg', '2023-07-10 07:39:19', '2023-07-10 07:39:19'),
(9, 'testitem9', 6023, 7, 'askjfiahgagdsgs', 333, '20230747_163947_bulldog-1224267_1280.jpg', '2023-07-10 07:39:47', '2023-07-10 07:39:47'),
(10, 'testitem10', 5874, 8, 'tstststs', 999, '20230741_164041_ANJ3P2A4967_TP_V4.jpg', '2023-07-10 07:40:41', '2023-07-10 07:40:41'),
(11, 'testitem11', 874, 9, 'llosifiasfd', 888, '20230756_164056_017kumakichi0327_TP_V4.jpg', '2023-07-10 07:40:56', '2023-07-10 07:40:56'),
(12, 'testitem12', 15115, 10, 'てｓｔ', 22, '20230702_171902_022nanashiki07_TP_V4.jpg', '2023-07-10 08:19:02', '2023-07-10 08:19:02'),
(13, 'testitem13', 666, 5, 'aksiasfasfa', 87, '20230723_171923_iphone13PAR59392_TP_V4 (1).jpg', '2023-07-10 08:19:23', '2023-07-10 08:19:23');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'もち吉君', 'test12@test.co.jp', NULL, '$2y$10$GZAuKbpnwlVMbMnhTEI/JekwZjltPw8makPbFuVJGy6TgOpAiyhbe', 99, NULL, '2023-07-10 07:09:23', '2023-07-10 07:09:23'),
(3, 'もちこ', 'test123@test.co.jp', NULL, '$2y$10$3q9Rgnv6dgiNrcrQHZg1HOw.SuWRmJlt.5xGbuLG71CCHRyxhQlHC', 0, NULL, '2023-07-10 20:23:16', '2023-07-10 20:23:16');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- テーブルのインデックス `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_product_id_foreign` (`product_id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- テーブルのインデックス `order__detaills`
--
ALTER TABLE `order__detaills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order__detaills_customer_id_foreign` (`customer_id`);

--
-- テーブルのインデックス `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `order__detaills`
--
ALTER TABLE `order__detaills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `order__detaills`
--
ALTER TABLE `order__detaills`
  ADD CONSTRAINT `order__detaills_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
