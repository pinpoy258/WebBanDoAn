-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 12:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwebdoanlaravel`
--

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
-- Table structure for table `giohangs`
--

CREATE TABLE `giohangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `sanpham_huongvi_id` int(11) DEFAULT NULL,
  `sanpham_kichthuoc_id` int(11) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giohangs`
--

INSERT INTO `giohangs` (`id`, `user_id`, `sanpham_id`, `sanpham_huongvi_id`, `sanpham_kichthuoc_id`, `soluong`, `created_at`, `updated_at`) VALUES
(123, 6, 21, 56, 50, 5, '2022-12-30 20:41:22', '2022-12-30 20:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `huongvis`
--

CREATE TABLE `huongvis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenhuongvi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `huongvis`
--

INSERT INTO `huongvis` (`id`, `tenhuongvi`, `code`, `trangthai`, `created_at`, `updated_at`) VALUES
(10, 'Dâu', 'dau', 0, '2022-12-01 03:18:10', '2022-12-01 03:18:10'),
(11, 'Đào', 'dao', 0, '2022-12-06 10:52:02', '2022-12-06 10:52:02'),
(12, 'Socola', 'socola', 0, '2022-12-06 10:55:00', '2022-12-06 10:55:00'),
(13, 'Matcha', 'matcha', 0, '2022-12-06 12:08:15', '2022-12-06 12:08:15'),
(14, 'Sữa', 'sua', 0, '2022-12-11 10:37:07', '2022-12-11 10:37:07'),
(15, 'Thạch Đào', 'thach dao', 0, '2022-12-13 02:37:52', '2022-12-13 02:37:52'),
(16, 'Trà Đào Cam Xã', 'tra dao cam xa', 0, '2022-12-13 02:38:21', '2022-12-13 02:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `kichthuocs`
--

CREATE TABLE `kichthuocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenkichthuoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makichthuoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kichthuocs`
--

INSERT INTO `kichthuocs` (`id`, `tenkichthuoc`, `makichthuoc`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'S', 's', 0, '2022-11-30 01:33:28', '2022-12-11 11:28:28'),
(2, 'M', 'm', 0, '2022-11-30 01:42:23', '2022-12-01 04:04:06'),
(3, 'L', 'l', 0, '2022-11-30 02:39:30', '2022-12-01 04:04:15'),
(4, 'XL', 'xl', 0, '2022-11-30 02:46:03', '2022-12-01 04:04:22'),
(6, 'XXL', 'xxl', 0, '2022-12-01 04:05:02', '2022-12-01 04:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `loaisps`
--

CREATE TABLE `loaisps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_mota` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisps`
--

INSERT INTO `loaisps` (`id`, `tenloai`, `slug`, `mota`, `hinhanh`, `meta_tieude`, `meta_keyword`, `meta_mota`, `trangthai`, `created_at`, `updated_at`) VALUES
(17, 'Đồ Ăn', 'do-an', 'Ngon', 'uploads/loaisp/1668539951.jpg', 'Đồ Ăn Vặt', 'Ngon', 'Ngon', 0, '2022-11-15 12:19:11', '2022-11-15 13:08:07'),
(18, 'Đồ Uống', 'do-uong', 'Ngon', 'uploads/loaisp/1668541889.jpg', 'Đồ Uống Ngon', 'Ngon', 'Ngon', 0, '2022-11-15 12:51:29', '2022-12-19 23:18:01');

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
(5, '2022_11_03_110516_add_details_to_user_table', 2),
(6, '2022_11_03_182755_create_categories_table', 3),
(7, '2022_11_03_184503_create_loaisps_table', 4),
(8, '2022_11_03_184948_create_loaisps_table', 5),
(9, '2022_11_03_190028_create_loaisps_table', 6),
(10, '2022_11_08_074544_create_nhacungcaps_table', 7),
(11, '2022_11_11_081113_create_sanphams_table', 8),
(12, '2022_11_11_082924_create_sanpham_hinhanhs_table', 9),
(13, '2022_11_15_033359_create_huongvis_table', 10),
(14, '2022_11_15_034307_create_huongvis_table', 11),
(15, '2022_11_15_183558_create_sanpham_huongvis_table', 12),
(16, '2022_11_18_100725_create_sliders_table', 13),
(17, '2022_11_30_072405_create_kichthuoscs_table', 14),
(18, '2022_11_30_072943_create_kichthuocs_table', 15),
(19, '2022_11_30_145130_create_sanpham_kichthuocs_table', 16),
(20, '2022_12_02_202720_add_loaisp_id_to_nhacungcaps_table', 17),
(21, '2022_12_07_100610_create_wishlists_table', 18),
(22, '2022_12_11_060813_create_giohangs_table', 19),
(23, '2022_12_14_210018_create_orders_table', 20),
(24, '2022_12_14_211120_create_order_items_table', 20),
(25, '2023_01_06_031832_create_settings_table', 21),
(26, '2023_01_06_041837_create_settings_table', 22),
(27, '2023_01_08_055035_create_user_details_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcaps`
--

CREATE TABLE `nhacungcaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tennhacungcap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loaisp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhacungcaps`
--

INSERT INTO `nhacungcaps` (`id`, `tennhacungcap`, `slug`, `trangthai`, `created_at`, `updated_at`, `loaisp_id`) VALUES
(2, 'Thế Giới Ăn Vặt 24h', 'the-gioi-an-vat-24h', 0, '2022-11-08 01:07:33', '2022-12-02 13:49:21', 17),
(3, 'Highland', 'highland', 0, '2022-11-08 01:08:07', '2022-12-05 23:59:15', 18),
(7, 'PinPoy Ăn Vặt Shop', 'pinpoy-an-vat-shop', 0, '2022-11-13 12:44:39', '2022-12-02 13:36:35', 17),
(8, 'Toco', 'toco', 0, '2022-12-05 23:58:40', '2022-12-06 12:01:56', 18),
(9, 'Phúc Long', 'phuc-long', 0, '2022-12-06 00:46:11', '2022-12-06 00:46:11', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhtoan_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhtoan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `diachi`, `status_message`, `thanhtoan_mode`, `thanhtoan_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'WebAnVat-FjThwZeDPe', 'Hiep', 'user@gmail.com', '01267458647', 'Cao Lo, Quan 8, TP.HCM', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-14 15:49:36', '2022-12-14 15:49:36'),
(2, 4, 'WebAnVat-IVe4UTAAsP', 'Hiep', 'user@gmail.com', '01267458647', 'Cao Lo, Quan 8, TP.HCM', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-14 15:54:33', '2022-12-14 15:54:33'),
(3, 4, 'WebAnVat-Xlrgi7ZrqH', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lo, Quan 8, TP.HCM', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-14 16:22:57', '2022-12-14 16:22:57'),
(4, 4, 'WebAnVat-7Fslw0xPTT', 'Hiep', 'user@gmail.com', '0328095163', 'Nguyen Khoai, Phuong 2, Quan 4', 'đã thanh toán', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-17 16:34:59', '2022-12-17 12:58:42'),
(5, 4, 'WebAnVat-rQN5Antjnt', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lo, Quan 8', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-15 02:46:37', '2022-12-15 02:46:37'),
(6, 4, 'WebAnVat-YTiZef98bT', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lo, Quan 8, STU', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-15 02:57:01', '2022-12-15 02:57:01'),
(7, 4, 'WebAnVat-Sy5aRDsUQN', 'Hiep', 'user@gmail.com', '0328095163', 'STU, Cao Lo, Quan 8, TP.HCM', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-15 11:45:31', '2022-12-15 11:45:31'),
(8, 4, 'WebAnVat-KFWqqFNODW', 'Hiep', 'user@gmail.com', '0328095163', 'Cao lo, Quan 8', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-15 11:48:00', '2022-12-15 11:48:00'),
(9, 4, 'WebAnVat-t9yxlltbJU', 'Hiep', 'user@gmail.com', '0328095163', 'STU, Cao Lo, Quan 8', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-15 11:51:23', '2022-12-15 11:51:23'),
(10, 4, 'WebAnVat-xP1vS4SP7A', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lo, Quan 8', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-16 03:51:16', '2022-12-16 03:51:16'),
(11, 4, 'WebAnVat-DHOEp87ede', 'Hiep', 'user@gmail.com', '0328095163', 'kanxkanxkkaxnkaxn', 'trong tiến trình', 'Paid by Paypal', '37350432ST411243H', '2022-12-16 04:03:08', '2022-12-16 04:03:08'),
(12, 4, 'WebAnVat-jgRGtts8zg', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lo, Quan 8, TP.HCM', 'trong tiến trình', 'Paid by Paypal', '37319980YF349571J', '2022-12-16 04:06:54', '2022-12-16 04:06:54'),
(13, 4, 'WebAnVat-F1Dqouuy7O', 'Hiep', 'user@gmail.com', '0762275136', 'Cao Lo, Quan 8', 'trong tiến trình', 'Paid by Paypal', '87F96057LA7851948', '2022-12-16 09:40:20', '2022-12-16 09:40:20'),
(14, 4, 'WebAnVat-X2qFmXk74V', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lỗ, Quận 8, TP.HCM', 'trong tiến trình', 'Paid by Paypal', '3KA151752R409833C', '2022-12-16 13:17:23', '2022-12-16 13:17:23'),
(15, 4, 'WebAnVat-zwI3uSQjfV', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lỗ, Quận 8, TP.HCM', 'đã thanh toán', 'Paid by Paypal', '33395420925429730', '2022-12-17 01:34:31', '2022-12-17 13:01:22'),
(16, 5, 'WebAnVat-5qwTYjYvKz', 'Pinpoy', 'pinpoy@gmail.com', '0328095163', 'Cao Lỗ, Quận 8, TP.HCM', 'đã duyệt', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-17 02:36:33', '2023-01-01 16:33:12'),
(17, 4, 'WebAnVat-o3k69r8Yzb', 'Hiep', 'user@gmail.com', '03280647898', 'STU, Cao Lo, Quan 8', 'chờ nhận hàng', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-23 13:32:57', '2022-12-23 14:01:43'),
(18, 4, 'WebAnVat-7FCycNc6nS', 'Hiep', 'user@gmail.com', '0123456789', 'Cao lo, Quan 8', 'đã duyệt', 'Paid by Paypal', '7BH9991741770545U', '2022-12-23 23:24:40', '2022-12-23 23:25:40'),
(19, 4, 'WebAnVat-53vesNcccI', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lo, Quan 8', 'đã duyệt', 'Thanh Toán Khi Nhận Hàng', NULL, '2022-12-27 19:57:46', '2022-12-27 20:00:47'),
(20, 4, 'WebAnVat-8w0MR3TDsP', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lỗ, Quận 8', 'trong tiến trình', 'Paid by Paypal', '4K081810KR3237841', '2022-12-27 20:06:18', '2022-12-27 20:06:18'),
(21, 4, 'WebAnVat-EU8Aw0eKs5', 'Hiep', 'user@gmail.com', '0328095163', 'Cao Lo', 'đang giao hàng', 'Paid by Paypal', '0EC80343A25341449', '2022-12-27 21:22:32', '2022-12-27 21:28:07'),
(22, 6, 'WebAnVat-T5ze993Lmv', 'vo@', 'anhvonguyen27@gmail.com', '0123456789', 'tphcm@', 'đang giao hàng', 'Paid by Paypal', '2P544498RS547364D', '2022-12-30 20:20:41', '2022-12-30 20:22:47'),
(23, 4, 'WebAnVat-cxUdGIyGSe', 'Hiep', 'user@gmail.com', '0123456789', 'Cao Lo, Quan 8', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2023-01-07 22:12:11', '2023-01-07 22:12:11'),
(24, 4, 'WebAnVat-SVx8NUEAgt', 'Hiep', 'user@gmail.com', '0123456789', 'Cao Lo, Quan 8', 'trong tiến trình', 'Paid by Paypal', '0WW94900KU226173W', '2023-01-07 22:14:04', '2023-01-07 22:14:04'),
(25, 4, 'WebAnVat-JHGA0XjZyw', 'Hiep', 'user@gmail.com', '0123456789', 'Cao Lo, Quan 8', 'trong tiến trình', 'Thanh Toán Khi Nhận Hàng', NULL, '2023-01-07 22:23:28', '2023-01-07 22:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `sanpham_huongvi_id` int(11) DEFAULT NULL,
  `sanpham_kichthuoc_id` int(11) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `sanpham_id`, `sanpham_huongvi_id`, `sanpham_kichthuoc_id`, `soluong`, `gia`, `created_at`, `updated_at`) VALUES
(1, 1, 11, NULL, NULL, 3, 25000, '2022-12-14 15:49:37', '2022-12-14 15:49:37'),
(2, 1, 27, 57, 55, 2, 35000, '2022-12-14 15:49:37', '2022-12-14 15:49:37'),
(3, 1, 29, NULL, NULL, 2, 35000, '2022-12-14 15:49:37', '2022-12-14 15:49:37'),
(4, 2, 11, NULL, NULL, 3, 25000, '2022-12-14 15:54:34', '2022-12-14 15:54:34'),
(5, 2, 27, 57, 55, 2, 35000, '2022-12-14 15:54:34', '2022-12-14 15:54:34'),
(6, 2, 29, NULL, NULL, 2, 35000, '2022-12-14 15:54:34', '2022-12-14 15:54:34'),
(7, 3, 27, 58, 55, 1, 35000, '2022-12-14 16:22:57', '2022-12-14 16:22:57'),
(8, 4, 28, 46, 53, 1, 45000, '2022-12-14 16:34:59', '2022-12-14 16:34:59'),
(9, 4, 19, NULL, NULL, 1, 35000, '2022-12-14 16:34:59', '2022-12-14 16:34:59'),
(10, 5, 11, NULL, NULL, 2, 25000, '2022-12-15 02:46:37', '2022-12-15 02:46:37'),
(11, 5, 27, 58, 55, 2, 35000, '2022-12-15 02:46:37', '2022-12-15 02:46:37'),
(12, 6, 19, NULL, NULL, 2, 35000, '2022-12-15 02:57:01', '2022-12-15 02:57:01'),
(13, 6, 21, 55, 49, 1, 45000, '2022-12-15 02:57:01', '2022-12-15 02:57:01'),
(14, 7, 26, NULL, NULL, 1, 100000, '2022-12-15 11:45:31', '2022-12-15 11:45:31'),
(15, 7, 29, NULL, NULL, 3, 35000, '2022-12-15 11:45:31', '2022-12-15 11:45:31'),
(16, 8, 27, 58, 55, 3, 35000, '2022-12-15 11:48:00', '2022-12-15 11:48:00'),
(17, 9, 27, 58, 55, 5, 35000, '2022-12-15 11:51:23', '2022-12-15 11:51:23'),
(18, 10, 25, NULL, NULL, 2, 25000, '2022-12-16 03:51:16', '2022-12-16 03:51:16'),
(19, 10, 28, 46, 53, 2, 45000, '2022-12-16 03:51:16', '2022-12-16 03:51:16'),
(20, 11, 19, NULL, NULL, 1, 35000, '2022-12-16 04:03:08', '2022-12-16 04:03:08'),
(21, 12, 11, NULL, NULL, 3, 25000, '2022-12-16 04:06:54', '2022-12-16 04:06:54'),
(22, 12, 28, 45, 52, 2, 45000, '2022-12-16 04:06:54', '2022-12-16 04:06:54'),
(23, 13, 19, NULL, NULL, 2, 35000, '2022-12-16 09:40:20', '2022-12-16 09:40:20'),
(24, 14, 20, NULL, NULL, 2, 25000, '2022-12-16 13:17:23', '2022-12-16 13:17:23'),
(25, 14, 25, NULL, NULL, 1, 25000, '2022-12-16 13:17:23', '2022-12-16 13:17:23'),
(26, 14, 27, 57, 55, 1, 35000, '2022-12-16 13:17:23', '2022-12-16 13:17:23'),
(27, 15, 20, NULL, NULL, 10, 5000, '2022-12-17 01:34:31', '2022-12-17 01:34:31'),
(28, 15, 21, 56, 49, 1, 45000, '2022-12-17 01:34:31', '2022-12-17 01:34:31'),
(29, 16, 29, NULL, NULL, 1, 35000, '2022-12-17 02:36:33', '2022-12-17 02:36:33'),
(30, 16, 21, 55, 49, 1, 45000, '2022-12-17 02:36:33', '2022-12-17 02:36:33'),
(31, 17, 19, NULL, NULL, 1, 35000, '2022-12-23 13:32:57', '2022-12-23 13:32:57'),
(32, 17, 21, 55, 49, 1, 45000, '2022-12-23 13:32:57', '2022-12-23 13:32:57'),
(33, 18, 21, 55, 48, 6, 45000, '2022-12-23 23:24:40', '2022-12-23 23:24:40'),
(34, 18, 27, 58, 55, 2, 35000, '2022-12-23 23:24:40', '2022-12-23 23:24:40'),
(35, 19, 27, 58, 55, 2, 35000, '2022-12-27 19:57:46', '2022-12-27 19:57:46'),
(36, 20, 32, NULL, NULL, 2, 35000, '2022-12-27 20:06:18', '2022-12-27 20:06:18'),
(37, 21, 19, NULL, NULL, 1, 35000, '2022-12-27 21:22:32', '2022-12-27 21:22:32'),
(38, 21, 28, 45, 52, 1, 45000, '2022-12-27 21:22:32', '2022-12-27 21:22:32'),
(39, 22, 31, NULL, NULL, 2, 35000, '2022-12-30 20:20:41', '2022-12-30 20:20:41'),
(40, 22, 27, 58, 55, 2, 35000, '2022-12-30 20:20:41', '2022-12-30 20:20:41'),
(41, 23, 31, NULL, NULL, 2, 35000, '2023-01-07 22:12:11', '2023-01-07 22:12:11'),
(42, 23, 28, 46, 51, 1, 45000, '2023-01-07 22:12:11', '2023-01-07 22:12:11'),
(43, 24, 11, NULL, NULL, 1, 25000, '2023-01-07 22:14:04', '2023-01-07 22:14:04'),
(44, 24, 31, NULL, NULL, 2, 35000, '2023-01-07 22:14:04', '2023-01-07 22:14:04'),
(45, 25, 30, NULL, NULL, 2, 35000, '2023-01-07 22:23:28', '2023-01-07 22:23:28');

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
-- Table structure for table `sanphams`
--

CREATE TABLE `sanphams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loaisp_id` bigint(20) UNSIGNED NOT NULL,
  `tensanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhacungcap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_mota` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_gia` int(11) NOT NULL,
  `selling_gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `banchay` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=banchay,0=khong-banchay',
  `noibat` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=noibat,0=khong-noibat',
  `trangthai` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `meta_tieude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_mota` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanphams`
--

INSERT INTO `sanphams` (`id`, `loaisp_id`, `tensanpham`, `slug`, `nhacungcap`, `small_mota`, `mota`, `original_gia`, `selling_gia`, `soluong`, `banchay`, `noibat`, `trangthai`, `meta_tieude`, `meta_keyword`, `meta_mota`, `created_at`, `updated_at`) VALUES
(11, 17, 'Bánh Tráng Trộn', 'banh-trang-tron', 'PinPoy Ăn Vặt Shop', 'Ngon', 'Ngon', 35000, 25000, 14, 1, 0, 0, 'Bánh Tráng Trộn', 'Ngon', 'Ngon', '2022-11-15 12:22:22', '2023-01-07 22:14:04'),
(19, 17, 'Há Cảo', 'ha-cao', 'Thế Giới Ăn Vặt 24h', 'Ngon', 'Ngon', 35000, 35000, 13, 1, 0, 0, 'Há Cảo', 'Ngon', 'Ngon', '2022-12-01 01:17:17', '2022-12-27 21:22:32'),
(20, 17, 'Gỏi cuốn', 'goi-cuon', 'Thế Giới Ăn Vặt 24h', 'ngon', 'ngon', 5000, 5000, 8, 1, 0, 0, 'Gỏi Cuốn', 'ngon', 'ngon', '2022-12-01 01:23:10', '2022-12-17 01:34:31'),
(21, 18, 'Trà Đào', 'o-long-sua', 'Phúc Long', 'ngon', 'ngon', 45000, 45000, 20, 0, 1, 0, 'Trà Đào', 'ngon', 'ngon', '2022-12-01 03:17:39', '2022-12-06 11:52:33'),
(25, 17, 'Bắp xào', 'bap-xao', 'Thế Giới Ăn Vặt 24h', 'ngon', 'ngon', 25000, 25000, 17, 1, 0, 0, 'Bắp xào', 'ngon', 'ngon', '2022-12-01 04:02:25', '2022-12-16 13:17:23'),
(26, 17, 'Cá Viên Chiên', 'ca-vien-chien', 'PinPoy Ăn Vặt Shop', 'ngon', 'ngon', 100000, 100000, 19, 0, 0, 0, 'Cá Viên Chiên', 'ngon', 'ngon', '2022-12-06 01:24:24', '2022-12-15 11:45:31'),
(27, 18, 'Trà Sữa Trân Châu', 'trasuasocola', 'Toco', 'Ngon', 'Ngon', 35000, 35000, 25, 0, 1, 0, 'Trà Sữa Trân Châu Socola', 'Ngon', 'Ngon', '2022-12-06 10:58:10', '2022-12-13 09:26:32'),
(28, 18, 'Freeze', 'freeze', 'Highland', 'Ngon', 'ngon', 45000, 45000, 20, 0, 1, 0, 'Freeze', 'ngon', 'Ngon', '2022-12-06 12:07:54', '2022-12-06 12:12:24'),
(29, 17, 'Bột Chiên', 'bot-chien', 'PinPoy Ăn Vặt Shop', 'Ngon', 'Ngon', 35000, 35000, 6, 0, 0, 0, 'Bột Chiên', 'Ngon', 'Ngon', '2022-12-06 18:48:41', '2022-12-17 02:36:33'),
(30, 17, 'Gỏi khô bò', 'goi-kho-bo', 'Thế Giới Ăn Vặt 24h', 'ngon', 'ngon', 35000, 35000, 8, 0, 0, 0, 'gỏi khô bò', 'ngon', 'ngon', '2022-12-27 13:23:33', '2023-01-07 22:23:28'),
(31, 17, 'Gỏi đu đủ', 'goi-du-du', 'Thế Giới Ăn Vặt 24h', 'ngon', 'ngon', 35000, 35000, 4, 0, 0, 0, 'Gỏi đu đủ', 'ngon', 'ngon', '2022-12-27 14:46:26', '2023-01-07 22:14:04'),
(32, 18, 'Sinh Tố Dừa', 'sinh-to-dua', 'Toco', 'ngon', 'ngon', 35000, 35000, 8, 0, 1, 0, 'sinh tố dừa', 'ngon', 'ngon', '2022-12-27 20:04:26', '2022-12-27 20:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_hinhanhs`
--

CREATE TABLE `sanpham_hinhanhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sanpham_id` bigint(20) UNSIGNED NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham_hinhanhs`
--

INSERT INTO `sanpham_hinhanhs` (`id`, `sanpham_id`, `hinhanh`, `created_at`, `updated_at`) VALUES
(19, 11, 'uploads/sanphams/16685401421.jpg', '2022-11-15 12:22:22', '2022-11-15 12:22:22'),
(32, 19, 'uploads/sanphams/16698826371.jpg', '2022-12-01 01:17:17', '2022-12-01 01:17:17'),
(37, 25, 'uploads/sanphams/16698928021.jpg', '2022-12-01 04:06:42', '2022-12-01 04:06:42'),
(38, 20, 'uploads/sanphams/16699421641.jpg', '2022-12-01 17:49:24', '2022-12-01 17:49:24'),
(39, 26, 'uploads/sanphams/16703150641.jpg', '2022-12-06 01:24:24', '2022-12-06 01:24:24'),
(40, 21, 'uploads/sanphams/16703155751.png', '2022-12-06 01:32:55', '2022-12-06 01:32:55'),
(43, 28, 'uploads/sanphams/16703538441.png', '2022-12-06 12:10:44', '2022-12-06 12:10:44'),
(44, 29, 'uploads/sanphams/16703777211.jpg', '2022-12-06 18:48:41', '2022-12-06 18:48:41'),
(45, 27, 'uploads/sanphams/16707802011.png', '2022-12-11 10:36:41', '2022-12-11 10:36:41'),
(50, 30, 'uploads/sanphams/16721820401.jpg', '2022-12-27 16:00:40', '2022-12-27 16:00:40'),
(51, 31, 'uploads/sanphams/16721820621.jpg', '2022-12-27 16:01:02', '2022-12-27 16:01:02'),
(52, 32, 'uploads/sanphams/16721966661.jpg', '2022-12-27 20:04:26', '2022-12-27 20:04:26'),
(53, 11, 'uploads/sanphams/16724364951.jpg', '2022-12-30 14:41:35', '2022-12-30 14:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_huongvis`
--

CREATE TABLE `sanpham_huongvis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sanpham_id` bigint(20) UNSIGNED NOT NULL,
  `huongvi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham_huongvis`
--

INSERT INTO `sanpham_huongvis` (`id`, `sanpham_id`, `huongvi_id`, `soluong`, `created_at`, `updated_at`) VALUES
(45, 28, 12, 7, '2022-12-06 12:07:54', '2022-12-27 21:22:32'),
(46, 28, 13, 8, '2022-12-06 12:09:03', '2023-01-07 22:12:11'),
(55, 21, 15, 10, '2022-12-13 02:38:53', '2023-01-04 18:25:48'),
(56, 21, 16, 9, '2022-12-13 02:38:53', '2022-12-17 01:34:31'),
(57, 27, 10, 99, '2022-12-13 10:09:46', '2022-12-16 13:17:23'),
(58, 27, 12, 84, '2022-12-13 10:09:46', '2022-12-30 20:20:41'),
(59, 27, 14, 100, '2022-12-13 10:09:46', '2022-12-13 10:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_kichthuocs`
--

CREATE TABLE `sanpham_kichthuocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sanpham_id` bigint(20) UNSIGNED NOT NULL,
  `kichthuoc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham_kichthuocs`
--

INSERT INTO `sanpham_kichthuocs` (`id`, `sanpham_id`, `kichthuoc_id`, `soluong`, `created_at`, `updated_at`) VALUES
(48, 21, 1, 4, '2022-12-06 11:52:33', '2022-12-23 23:24:40'),
(49, 21, 2, 10, '2022-12-06 11:52:33', '2023-01-04 18:26:14'),
(50, 21, 3, 5, '2022-12-06 11:52:33', '2022-12-13 09:25:09'),
(51, 28, 1, 10, '2022-12-06 12:07:54', '2023-01-07 22:12:11'),
(52, 28, 2, 7, '2022-12-06 12:07:54', '2022-12-27 21:22:32'),
(53, 28, 3, 8, '2022-12-06 12:07:54', '2022-12-16 03:51:16'),
(54, 27, 1, 100, '2022-12-13 10:09:46', '2022-12-13 10:12:10'),
(55, 27, 2, 83, '2022-12-13 10:09:46', '2022-12-30 20:20:41'),
(56, 27, 3, 100, '2022-12-13 10:09:46', '2022-12-13 10:12:14'),
(57, 32, 1, 10, '2022-12-27 20:04:48', '2022-12-27 20:04:48'),
(58, 32, 2, 10, '2022-12-27 20:04:48', '2022-12-27 20:04:48'),
(59, 32, 3, 10, '2022-12-27 20:04:48', '2022-12-27 20:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_mota` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doan1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doan2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `title`, `meta_keywords`, `meta_mota`, `diachi`, `doan1`, `doan2`, `email1`, `email2`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(2, 'Ăn Vặt 24h', 'http://localhost:8000/', 'Web Bán Đồ Ăn Vặt', 'Web Bán Đồ Ăn Vặt', 'Web ăn vặt 24h là web bán các món ăn vặt ngon, quý khách có thể trải nghiệm các món ăn ngon tại đây.\r\n                        Web phù hợp cho mọi lứa tuổi có đam mê với các món đồ ăn vặt, tiện lợi cho quý khách đặt hàng và món ăn sẽ được giao tận nơi.', 'Cao Lỗ, Quận 8, Tp.HCM', '0328065465', '0328065465', 'anvat24h@gmail.com', 'anvat24h@gmail.com', 'facebook.com', 'twitt.com', 'insta.com', 'yt', '2023-01-05 23:35:53', '2023-01-06 00:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `tieude`, `mota`, `hinhanh`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '<span>Web Bán Đồ Ăn Vặt Uy Tín  </span>  <br> Giao Hàng Tận Nơi', 'We offer an industry-driven and successful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company \r\nprofit.', 'uploads/slider/1672611354.jpg', 0, '2022-11-18 04:18:21', '2023-01-04 18:48:06'),
(2, 'Web Bán Đồ Ăn Vặt', 'Mô Tả', 'uploads/slider/1672883341.jpg', 0, '2022-11-18 04:37:54', '2023-01-04 18:49:01'),
(3, 'Web Bán Đồ Ăn Vặt', 'Mô Tả Một Trang Web Bán Đồ Ăn Vặt', 'uploads/slider/1672883515.jpg', 0, '2022-11-18 04:40:20', '2023-01-04 18:51:55'),
(6, 'Web Đồ Ăn Vặt', 'Ngon', 'uploads/slider/1668801061.jpg', 0, '2022-11-18 07:36:30', '2022-11-18 12:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Hiep PinPoy', 'lehiep4325@gmail.com', NULL, '$2y$10$Cz3uo44fpeovQX1byjOLW.OTjMfAynnUp4q.21dgLfp0MWpaS8giq', 'fPI3M8woCNnHVwmOXXIdLTCWww7YNuBoZyrhYZqrUJCM8GXdRWSOUyly5t3Y', '2022-10-23 02:16:08', '2023-01-06 21:39:37', 1),
(2, 'VanHiep', 'lehiep123@gmail.com', NULL, '$2y$10$OF1cP/QRBiC8MwR97Y0bA.sSNeI.Zi9n9KRRzwX3kZUXOOetjTZN2', NULL, '2022-11-03 03:05:22', '2022-11-03 03:05:22', 0),
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$jFMx6VDDT4YyvcA5NwMNnOHo0KConfyBRuv./iPpFGfe3j8vk3zMu', '9rIsFn9VEemEmcFM2LC1QD94xQX6qvw0zUQbPZklMwMhnwpU0rEpoQRiW9wp', '2022-11-03 05:06:14', '2022-11-03 05:06:14', 1),
(4, 'Hiep PinPoy', 'user@gmail.com', NULL, '$2y$10$03IUn/8mTCiay3saV.zj1ueROloASWToFrAha0pHRjYxndSBS.z6a', NULL, '2022-12-01 16:54:31', '2023-01-08 16:01:05', 0),
(5, 'Pinpoy', 'pinpoy@gmail.com', NULL, '$2y$10$D3IICxWK79bOXZCLYWdIp.Wczy2EeEl5Dym/lxO7u8vZGzC2hH9TO', NULL, '2022-12-13 10:25:58', '2023-01-06 21:40:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `diachi`, `created_at`, `updated_at`) VALUES
(1, 4, '0328095165', 'Nguyễn Khoái, Phường 2, Quận 4, Tp.HCM', '2023-01-08 00:24:04', '2023-01-08 00:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(40, 4, 21, '2023-01-04 18:26:33', '2023-01-04 18:26:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giohangs`
--
ALTER TABLE `giohangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `huongvis`
--
ALTER TABLE `huongvis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kichthuocs`
--
ALTER TABLE `kichthuocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisps`
--
ALTER TABLE `loaisps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhacungcaps`
--
ALTER TABLE `nhacungcaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
-- Indexes for table `sanphams`
--
ALTER TABLE `sanphams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanphams_loaisp_id_foreign` (`loaisp_id`);

--
-- Indexes for table `sanpham_hinhanhs`
--
ALTER TABLE `sanpham_hinhanhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_hinhanhs_sanpham_id_foreign` (`sanpham_id`);

--
-- Indexes for table `sanpham_huongvis`
--
ALTER TABLE `sanpham_huongvis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_huongvis_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `sanpham_huongvis_huongvi_id_foreign` (`huongvi_id`);

--
-- Indexes for table `sanpham_kichthuocs`
--
ALTER TABLE `sanpham_kichthuocs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_kichthuocs_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `sanpham_kichthuocs_kichthuoc_id_foreign` (`kichthuoc_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_user_id_unique` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohangs`
--
ALTER TABLE `giohangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `huongvis`
--
ALTER TABLE `huongvis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kichthuocs`
--
ALTER TABLE `kichthuocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loaisps`
--
ALTER TABLE `loaisps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nhacungcaps`
--
ALTER TABLE `nhacungcaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanphams`
--
ALTER TABLE `sanphams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sanpham_hinhanhs`
--
ALTER TABLE `sanpham_hinhanhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sanpham_huongvis`
--
ALTER TABLE `sanpham_huongvis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sanpham_kichthuocs`
--
ALTER TABLE `sanpham_kichthuocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanphams`
--
ALTER TABLE `sanphams`
  ADD CONSTRAINT `sanphams_loaisp_id_foreign` FOREIGN KEY (`loaisp_id`) REFERENCES `loaisps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanpham_hinhanhs`
--
ALTER TABLE `sanpham_hinhanhs`
  ADD CONSTRAINT `sanpham_hinhanhs_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanphams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanpham_huongvis`
--
ALTER TABLE `sanpham_huongvis`
  ADD CONSTRAINT `sanpham_huongvis_huongvi_id_foreign` FOREIGN KEY (`huongvi_id`) REFERENCES `huongvis` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sanpham_huongvis_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanphams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanpham_kichthuocs`
--
ALTER TABLE `sanpham_kichthuocs`
  ADD CONSTRAINT `sanpham_kichthuocs_kichthuoc_id_foreign` FOREIGN KEY (`kichthuoc_id`) REFERENCES `kichthuocs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sanpham_kichthuocs_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanphams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
