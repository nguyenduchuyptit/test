-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2017 lúc 07:13 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advertising`
--

CREATE TABLE `advertising` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `advertising`
--

INSERT INTO `advertising` (`id`, `ten`, `hinh`, `noidung`, `link`, `created_at`, `updated_at`) VALUES
(4, 'ads', 'vjM0_shipping.jpg', '<p>quảng cáo 4</p>', 'product', NULL, '2017-03-12 04:48:08'),
(5, 'Slide Product', 'VTtw_advertisement.jpg', '<p>slide-product-e-shop</p>', 'product', '2017-03-13 08:28:20', '2017-03-13 08:28:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `tieude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieudekodau` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noibat` int(11) NOT NULL DEFAULT '0',
  `soluotxem` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `idUser`, `tieude`, `tieudekodau`, `tomtat`, `noidung`, `hinh`, `noibat`, `soluotxem`, `created_at`, `updated_at`) VALUES
(18, 11, 'Girls Pink T Shirt arrived in store 0', 'girls-pink-t-shirt-arrived-in-store-0', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', 'gNCR_blog-three.jpg', 1, 0, '2017-03-16 02:38:10', '2017-03-16 08:55:00'),
(19, 11, 'Girls Pink T Shirt arrived in store 2', 'girls-pink-t-shirt-arrived-in-store-2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', 'pXNo_blog-two.jpg', 1, 0, '2017-03-16 02:39:06', '2017-03-16 02:39:06'),
(20, 11, 'Girls Pink T Shirt arrived in store 3', 'girls-pink-t-shirt-arrived-in-store-3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', 'vBWB_blog-one.jpg', 1, 0, '2017-03-16 02:41:35', '2017-03-16 02:41:35'),
(21, 11, 'Girls Pink T Shirt arrived in store 4', 'girls-pink-t-shirt-arrived-in-store-4', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', 'wmpA_blog-two.jpg', 1, 0, '2017-03-16 02:42:18', '2017-03-16 02:42:18'),
(22, 11, 'Girls Pink T Shirt arrived in store 5', 'girls-pink-t-shirt-arrived-in-store-5', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', 'HpH1_blog-three.jpg', 1, 0, '2017-03-16 02:42:35', '2017-03-16 02:42:35'),
(23, 11, 'Girls Pink T Shirt arrived in store 6', 'girls-pink-t-shirt-arrived-in-store-6', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', 'm3ZA_blog-one.jpg', 0, 4, '2017-03-16 02:42:53', '2017-03-29 11:57:05'),
(24, 11, 'Girls Pink T Shirt arrived in store 7', 'girls-pink-t-shirt-arrived-in-store-7', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', 'eEAz_blog-three.jpg', 0, 67, '2017-03-16 02:43:17', '2017-03-29 16:52:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkodau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `ten`, `tenkodau`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'nike', NULL, '2017-03-12 03:11:33'),
(2, 'ESPN', 'espn', NULL, '2017-03-12 03:11:49'),
(3, 'Adidas', 'adidas', NULL, '2017-03-12 03:12:03'),
(4, 'Underwear', 'underwear', NULL, '2017-03-12 03:12:38'),
(5, 'Hermes', 'hermes', NULL, '2017-03-12 03:13:42'),
(7, 'Burberry', 'burberry', '2017-03-09 02:38:26', '2017-03-12 03:14:04'),
(10, 'Christian Dior', 'christian-dior', '2017-03-12 03:16:44', '2017-03-12 03:16:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkodau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `ten`, `tenkodau`, `created_at`, `updated_at`) VALUES
(1, 'Sportswear', 'sportswear', NULL, '2017-03-12 02:58:47'),
(2, 'Mens', 'mens', NULL, '2017-03-12 02:58:59'),
(3, 'Womens', 'womens', NULL, '2017-03-12 02:59:10'),
(4, 'Kids', 'kids', NULL, '2017-03-12 02:59:20'),
(5, 'Fashion', 'fashion', NULL, '2017-03-12 02:59:29'),
(6, 'Households', 'households', NULL, '2017-03-12 02:59:43'),
(7, 'Interiors', 'interiors', NULL, '2017-03-12 02:59:59'),
(8, 'Clothing', 'clothing', NULL, '2017-03-12 03:00:09'),
(12, 'Bags', 'bags', '2017-03-09 01:54:26', '2017-03-12 03:00:38'),
(13, 'Shoes', 'shoes', '2017-03-09 01:54:34', '2017-03-12 03:00:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_blog`
--

CREATE TABLE `comment_blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED DEFAULT NULL,
  `idBlog` int(10) UNSIGNED DEFAULT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `comment_blog`
--

INSERT INTO `comment_blog` (`id`, `idUser`, `idBlog`, `ten`, `email`, `noidung`, `created_at`, `updated_at`) VALUES
(18, 11, 21, '{\"name\":\"\\u0110\\u1ed7 \\u0110\\u00ecnh D\\u1ef1\"}', '{\"email\":\"kaideptrai1102@gmail.com\"}', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp; Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '2017-03-16 05:31:33', '2017-03-16 10:05:37'),
(21, 11, 23, '{\"name\":\"\\u0110\\u1ed7 \\u0110\\u00ecnh D\\u1ef1\"}', '{\"email\":\"kaideptrai1102@gmail.com\"}', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp; Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '2017-03-16 05:32:12', '2017-03-16 05:32:12'),
(22, 11, 23, '{\"name\":\"\\u0110\\u1ed7 \\u0110\\u00ecnh D\\u1ef1\"}', '{\"email\":\"kaideptrai1102@gmail.com\"}', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp; Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '2017-03-16 05:32:31', '2017-03-16 05:32:31'),
(23, 11, 23, 'Đỗ Đình Dự', 'kaideptrai1102@gmail.com', 'bài viết hay quá', '2017-03-16 06:14:24', '2017-03-16 06:14:24'),
(24, 11, 22, 'Đỗ Đình Dự', 'kaideptrai1102@gmail.com', 'ád', '2017-03-16 06:33:30', '2017-03-16 06:33:30'),
(25, 11, 22, 'Đỗ Đình Dự', 'kaideptrai1102@gmail.com', 'a', '2017-03-16 06:35:36', '2017-03-16 06:35:36'),
(26, 11, 22, 'Đỗ Đình Dự', 'kaideptrai1102@gmail.com', 'a', '2017-03-16 06:35:41', '2017-03-16 06:35:41'),
(27, 11, 24, 'Đỗ Đình Dự', 'kaideptrai1102@gmail.com', 'Mình rất thích bài viết này', '2017-03-16 06:37:33', '2017-03-16 06:37:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_product`
--

CREATE TABLE `comment_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED DEFAULT NULL,
  `idPro` int(10) UNSIGNED DEFAULT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `comment_product`
--

INSERT INTO `comment_product` (`id`, `idUser`, `idPro`, `ten`, `email`, `noidung`, `created_at`, `updated_at`) VALUES
(1, 11, 31, '{\"name\":\"\\u0110\\u1ed7 \\u0110\\u00ecnh D\\u1ef1\"}', '{\"email\":\"kaideptrai1102@gmail.com\"}', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '2017-03-16 10:15:44', '2017-03-16 10:15:44'),
(2, 11, 31, '{\"name\":\"\\u0110\\u1ed7 \\u0110\\u00ecnh D\\u1ef1\"}', '{\"email\":\"kaideptrai1102@gmail.com\"}', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '2017-03-16 10:16:08', '2017-03-16 10:16:08'),
(3, 11, 19, '{\"name\":\"\\u0110\\u1ed7 \\u0110\\u00ecnh D\\u1ef1\"}', '{\"email\":\"kaideptrai1102@gmail.com\"}', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', '2017-03-16 10:16:17', '2017-03-16 10:16:17'),
(4, 11, 31, 'Đỗ Đình Dự', 'kaideptrai1102@gmail.com', 'bài viết này thật sự rất hay', '2017-03-16 10:28:10', '2017-03-16 10:28:10'),
(5, 11, 26, 'Đỗ Đình Dự', 'kaideptrai1102@gmail.com', 'Mình muốn đặt chiếc áo này', '2017-03-16 10:35:40', '2017-03-16 10:35:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED DEFAULT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `idUser`, `company`, `address`, `message`, `title`, `phone`, `subtotal`, `status`, `created_at`, `updated_at`) VALUES
(9, 11, 'SOmething', 'Đông Anh HN', 'Số nhà 69, khu 5, thụy lôi, thụy lâm, ĐA, Hà Nội', 'Something', '09720605171', '374.00', 0, '2017-03-21 15:38:21', '2017-03-21 15:49:00'),
(10, 19, 'Chưa có', 'Nhổn, ĐhCN', 'đại học CN HN, nhổn', 'Chưa có', '0123456789', '256.00', 0, '2017-03-21 15:58:28', '2017-03-21 15:58:28'),
(11, 35, '', 'muahang3', 'muahang3', '', '123456789', '139.00', 0, '2017-03-27 16:32:30', '2017-03-27 16:32:30'),
(12, 36, '', 'muahang4', 'muahang4', '', '124365787', '1,350.00', 0, '2017-03-27 17:17:21', '2017-03-27 17:17:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom_order`
--

CREATE TABLE `custom_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `idCustom` int(10) UNSIGNED DEFAULT NULL,
  `idPro` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `custom_order`
--

INSERT INTO `custom_order` (`id`, `idCustom`, `idPro`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(6, 9, 31, 2, 27.00, 54.00, '2017-03-21 15:38:21', '2017-03-21 15:38:21'),
(7, 9, 26, 5, 64.00, 320.00, '2017-03-21 15:38:21', '2017-03-21 15:38:21'),
(9, 10, 9, 1, 34.00, 34.00, '2017-03-21 15:58:28', '2017-03-21 15:58:28'),
(10, 10, 17, 1, 29.00, 29.00, '2017-03-21 15:58:28', '2017-03-21 15:58:28'),
(11, 11, 27, 1, 27.00, 27.00, '2017-03-27 16:32:30', '2017-03-27 16:32:30'),
(12, 11, 30, 2, 56.00, 112.00, '2017-03-27 16:32:30', '2017-03-27 16:32:30'),
(13, 12, 27, 50, 27.00, 1350.00, '2017-03-27 17:17:21', '2017-03-27 17:17:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `foot_category`
--

CREATE TABLE `foot_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkodau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `foot_category`
--

INSERT INTO `foot_category` (`id`, `ten`, `tenkodau`, `created_at`, `updated_at`) VALUES
(9, 'Service', 'service', '2017-03-12 06:37:58', '2017-03-12 06:37:58'),
(10, 'Quick Shop', 'quick-shop', '2017-03-12 06:38:04', '2017-03-12 06:38:13'),
(11, 'Policies', 'policies', '2017-03-12 06:38:28', '2017-03-12 06:38:28'),
(12, 'About Shopper', 'about-shopper', '2017-03-12 06:38:34', '2017-03-12 06:38:34');

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
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2017_03_08_101342_category', 1),
(37, '2017_03_08_101453_slide', 1),
(38, '2017_03_08_101502_brand', 1),
(39, '2017_03_08_101515_sub_category', 1),
(40, '2017_03_08_101520_product', 1),
(41, '2017_03_08_101552_blog', 1),
(42, '2017_03_08_101625_foot_category', 1),
(43, '2017_03_08_101809_sub_foot_category', 1),
(44, '2017_03_08_111657_comment_blog', 1),
(45, '2017_03_08_112018_advertising', 1),
(46, '2017_03_08_112934_comment_product', 1),
(58, '2017_03_20_225426_customer', 2),
(59, '2017_03_20_225505_custom_order', 2);

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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `idSubCate` int(10) UNSIGNED NOT NULL,
  `idBrand` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkodau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(10) UNSIGNED NOT NULL,
  `soluong` int(10) UNSIGNED NOT NULL,
  `noibat` int(11) NOT NULL DEFAULT '0',
  `soluotxem` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `idSubCate`, `idBrand`, `ten`, `tenkodau`, `tomtat`, `noidung`, `hinh`, `hinh2`, `hinh3`, `gia`, `soluong`, `noibat`, `soluotxem`, `created_at`, `updated_at`) VALUES
(7, 18, 7, 'Easy Polo Black Edition', 'easy-polo-black-edition', 'Easy Polo Black Edition', '<p>Easy Polo Black Edition</p>', 'IlV9_product1.jpg', 'sxvs_product3.jpg', '3Vvh_product5.jpg', 56, 11, 1, 0, '2017-03-12 03:55:53', '2017-03-27 16:15:51'),
(8, 23, 3, 'Easy Polo Black Edition 3', 'easy-polo-black-edition-3', 'Easy Polo Black Edition', '<p>Easy Polo Black Edition</p>', 'GPF4_product2.jpg', '8h5t_product3.jpg', 'IQfB_product4.jpg', 56, 13, 1, 0, '2017-03-12 05:44:35', '2017-03-12 06:31:32'),
(9, 31, 7, 'Easy Polo Black Edition 4', 'easy-polo-black-edition-4', 'Easy Polo Black Edition 4', '<p>Easy Polo Black Edition 4</p>', '9PyU_product3.jpg', '7KLJ_product4.jpg', 'TNjE_product1.jpg', 34, 1, 0, 0, '2017-03-12 07:00:42', '2017-03-12 07:00:42'),
(10, 32, 5, 'Easy Polo Black Edition 5.2', 'easy-polo-black-edition-52', 'Easy Polo Black Edition 5', '<p>Easy Polo Black Edition 5</p>', 'Nv1w_product4.jpg', 'SikL_product5.jpg', 'Krb5_product6.jpg', 27, 32, 0, 0, '2017-03-12 07:01:45', '2017-03-12 07:20:01'),
(12, 22, 3, 'Easy Polo Black Edition 7', 'easy-polo-black-edition-7', 'Easy Polo Black Edition 7', '<p>Easy Polo Black Edition 7</p>', '2tP6_gallery2.jpg', 'mRvL_product2.jpg', 'ZksG_gallery1.jpg', 3, 4, 1, 0, '2017-03-12 07:03:56', '2017-03-12 07:03:56'),
(14, 31, 4, 'Userwear Rose 1.1', 'userwear-rose-11', 'Userwear Rose 1.1', '<p>Userwear Rose</p>', '3dle_product5.jpg', 'rzfH_product3.jpg', 'Q87C_product1.jpg', 27, 56, 0, 0, '2017-03-12 08:58:39', '2017-03-13 02:18:37'),
(15, 31, 10, 'Easy Polo Black Edition Dior', 'easy-polo-black-edition-dior', 'Easy Polo Black Edition Dior', '<p>Easy Polo Black Edition Dior</p>', 'Rex8_product3.jpg', 't0iL_product4.jpg', 'ZjRg_product5.jpg', 29, 29, 0, 0, '2017-03-12 08:59:46', '2017-03-13 02:19:40'),
(17, 17, 3, 'Sportswear Hot 2', 'sportswear-hot-2', 'Sportswear Hot 2', '<p>Sportswear Hot 2</p>', 'zLKZ_product2.jpg', 'IOWZ_gallery2.jpg', 'ZNzC_product6.jpg', 29, 23, 1, 0, '2017-03-12 09:55:47', '2017-03-12 09:55:47'),
(18, 17, 3, 'Sportswear Hot 3', 'sportswear-hot-3', 'Sportswear Hot 3', '<p>Sportswear Hot 3</p>', 'FX21_product6.jpg', 'tok0_product5.jpg', 'kqpg_product4.jpg', 27, 34, 1, 0, '2017-03-13 02:21:09', '2017-03-13 02:21:09'),
(19, 17, 3, 'Sportswear Hot 4', 'sportswear-hot-4', 'Sportswear Hot 4', '<p>Sportswear Hot 4</p>', 'WTjx_product5.jpg', 'b0VN_product4.jpg', 'gene_product3.jpg', 37, 42, 1, 0, '2017-03-13 02:21:41', '2017-03-13 02:21:41'),
(20, 17, 3, 'Sportswear Hot 5', 'sportswear-hot-5', 'Sportswear Hot 5', '<p>Sportswear Hot 5</p>', 'nqkp_product4.jpg', 'd6w8_product3.jpg', 'wJXy_product2.jpg', 27, 64, 1, 0, '2017-03-13 02:22:23', '2017-03-13 02:22:23'),
(21, 24, 7, 'Product Mens Hot 3', 'product-mens-hot-3', 'Product Mens Hot 3', '<p>Product Mens Hot 3</p>', 'BGja_product3.jpg', 'zvnk_product2.jpg', 'UkG8_product1.jpg', 27, 13, 1, 0, '2017-03-13 02:24:32', '2017-03-13 02:24:32'),
(22, 24, 3, 'Product Mens Hot 4', 'product-mens-hot-4', 'Product Mens Hot 4', '<p>Product Mens Hot 4</p>', 't6hg_product2.jpg', 'lgw7_product1.jpg', 'bYuV_product6.jpg', 39, 43, 1, 1, '2017-03-13 02:25:05', '2017-03-29 15:04:57'),
(24, 30, 5, 'Womens Product Recomemded', 'womens-product-recomemded', 'Womens Product Recomemded', '<p>Womens Product Recomemded</p>', '7ijm_product4.jpg', 'uUWp_product5.jpg', 'NVnf_product6.jpg', 37, 27, 1, 0, '2017-03-13 02:31:51', '2017-03-13 02:31:51'),
(25, 31, 7, 'Womens Product Recomemded 2.1', 'womens-product-recomemded-21', 'Womens Product Recomemded 2.1', '<p>Womens Product Recomemded 2</p>', 'pefH_product5.jpg', 'xYxP_product6.jpg', 'g6Pc_product4.jpg', 27, 98, 0, 1, '2017-03-13 02:32:18', '2017-03-29 11:51:14'),
(26, 31, 7, 'Womens Product Recomemded 3', 'womens-product-recomemded-3', 'Womens Product Recomemded 3', '<p>Womens Product Recomemded 3</p>', 'Omtz_girl3.jpg', 'kkzh_product5.jpg', '7xis_product3.jpg', 64, 36, 1, 1, '2017-03-13 02:33:16', '2017-03-29 11:51:11'),
(27, 22, 7, 'Mens Product 3', 'mens-product-3', 'Mens Product 3', '<p>Mens Product 3</p>', 'yPeC_product2.jpg', 'Njqw_gallery2.jpg', 'f1n2_girl1.jpg', 27, 16, 0, 0, '2017-03-13 02:34:31', '2017-03-13 02:34:31'),
(29, 15, 1, 'Sportswear Product 1.1', 'sportswear-product-11', 'Sportswear Product 1.1', '<p>Sportswear Product 1.1</p>', 'Zcoh_product11.jpg', 'Ofvb_product9.jpg', 'Lr8d_product10.jpg', 64, 45, 0, 1, '2017-03-13 02:38:09', '2017-03-29 15:05:45'),
(30, 31, 4, 'Mens Product 1.1', 'mens-product-11', 'Mens Product 1.1', '<p>Mens Product 1.1</p>', 'fCBe_product8.jpg', 'emHj_product7.jpg', 'RX9X_product9.jpg', 56, 75, 0, 0, '2017-03-13 02:38:52', '2017-03-13 02:38:52'),
(31, 32, 4, 'Womens Product 4', 'womens-product-4', 'Womens Product 4', '<p>Womens Product 4</p>', 'ECXU_product9.jpg', 'KTb6_product8.jpg', 'zM6y_product7.jpg', 27, 27, 1, 3, '2017-03-13 02:40:45', '2017-03-29 16:54:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `ten`, `hinh`, `noidung`, `link`, `created_at`, `updated_at`) VALUES
(6, 'Sale 20%', '7uGk_girl1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 'product', '2017-03-12 04:20:29', '2017-03-12 04:24:05'),
(7, 'Cam kết hàng chính hãng 100%', 'F7Aa_girl3.jpg', '<p>Nếu phát hiện hàng giả,hàng nhái đền gấp 10!</p>', 'product', '2017-03-12 04:21:56', '2017-03-12 04:24:22'),
(8, 'E-shop - Giá rẻ cho mọi nhà.', '8eAU_girl2.jpg', '<p>Luôn tự hào là 1 shop có chất lượng cũng như giá thành tốt nhất Hà Nội</p>', 'product', '2017-03-12 04:23:14', '2017-03-12 04:24:40'),
(9, 'Nhấc mông lên và đến với chúng tôi', 'LU34_girl1.jpg', '<p>Đội ngũ nhân viên 25/24. Tư vấn nhiệt tình vì khách hàng.</p>', 'blog', '2017-03-12 04:26:16', '2017-03-12 04:26:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `idCate` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkodau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_category`
--

INSERT INTO `sub_category` (`id`, `idCate`, `ten`, `tenkodau`, `created_at`, `updated_at`) VALUES
(15, 1, 'Nike', 'nike', '2017-03-12 03:02:36', '2017-03-12 03:02:36'),
(16, 1, 'Under Armour', 'under-armour', '2017-03-12 03:02:52', '2017-03-12 03:02:52'),
(17, 1, 'Adidas', 'adidas', '2017-03-12 03:03:02', '2017-03-12 03:03:02'),
(18, 1, 'Puma', 'puma', '2017-03-12 03:03:10', '2017-03-12 03:03:10'),
(19, 1, 'ASICS', 'asics', '2017-03-12 03:03:18', '2017-03-12 03:03:18'),
(20, 2, 'Fendi', 'fendi', '2017-03-12 03:03:40', '2017-03-12 03:03:40'),
(21, 2, 'Guess', 'guess', '2017-03-12 03:04:20', '2017-03-12 03:04:20'),
(22, 2, 'Valentino', 'valentino', '2017-03-12 03:04:27', '2017-03-12 03:04:27'),
(23, 2, 'Dior', 'dior', '2017-03-12 03:04:33', '2017-03-12 03:04:33'),
(24, 2, 'Versace', 'versace', '2017-03-12 03:04:39', '2017-03-12 03:04:39'),
(25, 2, 'Armani', 'armani', '2017-03-12 03:04:45', '2017-03-12 03:04:45'),
(26, 2, 'Prada', 'prada', '2017-03-12 03:04:51', '2017-03-12 03:04:51'),
(27, 2, 'Dolce and Gabbana', 'dolce-and-gabbana', '2017-03-12 03:04:56', '2017-03-12 03:04:56'),
(28, 2, 'Chanel', 'chanel', '2017-03-12 03:05:02', '2017-03-12 03:05:02'),
(29, 2, 'Gucci', 'gucci', '2017-03-12 03:05:06', '2017-03-12 03:05:06'),
(30, 3, 'Luis Vutton', 'luis-vutton', '2017-03-12 03:06:05', '2017-03-12 03:06:50'),
(31, 3, 'Fox and Rose', 'fox-and-rose', '2017-03-12 03:07:45', '2017-03-12 03:07:45'),
(32, 3, 'Wonderful', 'wonderful', '2017-03-12 03:09:08', '2017-03-12 03:09:08'),
(33, 3, 'Mommy', 'mommy', '2017-03-12 03:10:14', '2017-03-12 03:10:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_foot_category`
--

CREATE TABLE `sub_foot_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `idFoot` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkodau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_foot_category`
--

INSERT INTO `sub_foot_category` (`id`, `idFoot`, `ten`, `tenkodau`, `created_at`, `updated_at`) VALUES
(18, 9, 'Online Help', 'online-help', '2017-03-12 06:39:31', '2017-03-12 06:39:31'),
(19, 9, 'Contact Us', 'contact-us', '2017-03-12 06:39:41', '2017-03-12 06:39:54'),
(20, 9, 'Order Status', 'order-status', '2017-03-12 06:40:04', '2017-03-12 06:40:04'),
(21, 9, 'Change Location', 'change-location', '2017-03-12 06:40:12', '2017-03-12 06:40:12'),
(22, 9, 'FAQ\'s', 'faqs', '2017-03-12 06:40:19', '2017-03-12 06:40:19'),
(23, 10, 'T-shrit', 't-shrit', '2017-03-12 06:40:33', '2017-03-12 06:40:33'),
(24, 10, 'Mens', 'mens', '2017-03-12 06:40:39', '2017-03-12 06:40:39'),
(25, 10, 'Womens', 'womens', '2017-03-12 06:40:44', '2017-03-12 06:40:44'),
(26, 10, 'Gift Cards', 'gift-cards', '2017-03-12 06:40:52', '2017-03-12 06:40:52'),
(27, 10, 'Shoes', 'shoes', '2017-03-12 06:40:58', '2017-03-12 06:40:58'),
(28, 11, 'Terms Of Use', 'terms-of-use', '2017-03-12 06:41:15', '2017-03-12 06:41:15'),
(29, 11, 'Privacy Policy', 'privacy-policy', '2017-03-12 06:41:49', '2017-03-12 06:41:49'),
(30, 11, 'Refund Policy', 'refund-policy', '2017-03-12 06:42:04', '2017-03-12 06:42:04'),
(31, 11, 'Billing System', 'billing-system', '2017-03-12 06:42:14', '2017-03-12 06:42:14'),
(32, 11, 'Ticket System', 'ticket-system', '2017-03-12 06:42:26', '2017-03-12 06:42:26'),
(33, 12, 'Company Information', 'company-information', '2017-03-12 06:42:45', '2017-03-12 06:42:45'),
(34, 12, 'Careers', 'careers', '2017-03-12 06:42:52', '2017-03-12 06:42:52'),
(35, 12, 'Store Location', 'store-location', '2017-03-12 06:42:57', '2017-03-12 06:42:57'),
(36, 12, 'Affillate Program', 'affillate-program', '2017-03-12 06:43:02', '2017-03-12 06:43:02'),
(37, 12, 'Copyright', 'copyright', '2017-03-12 06:43:08', '2017-03-12 06:43:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `quyen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User1', 'User1@gmail.com', 'User1', 0, NULL, NULL, NULL),
(2, 'User2', 'User2@gmail.com', 'User2@gmail.com', 0, NULL, NULL, NULL),
(3, 'User3@gmail.com', 'User3@gmail.com', 'User3@gmail.com', 0, NULL, NULL, NULL),
(4, 'User4@gmail.com', 'User4@gmail.com', 'User4@gmail.com', 0, NULL, NULL, NULL),
(5, 'Use5@gmail.com', 'Use5@gmail.com', 'Use5@gmail.com', 0, NULL, NULL, NULL),
(6, 'Use6@gmail.com', 'Use6@gmail.com', 'Use6@gmail.com', 0, NULL, NULL, NULL),
(7, 'Use7@gmail.com', 'Use7@gmail.com', 'Use7@gmail.com', 0, NULL, NULL, NULL),
(9, 'Use9@gmail.com', 'Use9@gmail.com', 'Use9@gmail.com', 0, NULL, NULL, NULL),
(10, 'Use911@gmail.com', 'Use911@gmail.com', 'Use911@gmail.com', 1, NULL, NULL, NULL),
(11, 'Đỗ Đình Dự', 'kaideptrai1102@gmail.com', '$2y$10$k.k6WFpaAdZH0wHq8jGfHO3UJi1rQ/Hn7tsXdeeDwGkjGrdtqrV2i', 2, 'DKxtxJSY4RKcPJuoYoPN9PKESUkz6p6AaJrjd1XDYgHH8jCOhCf77HXLTxz2', NULL, '2017-03-16 10:02:25'),
(13, 'đỗ đình dự 2', 'kaihandsome@gmail.com', '$2y$10$VRCq3Bev6iL1.BhWNIeGHOF.SsjwKVptocfcCtxG0oMDb1GiKvLAe', 0, NULL, '2017-03-16 01:29:45', '2017-03-16 01:35:06'),
(14, 'đỗ đình dự 3', 'dinhdu3@gmail.com', '$2y$10$vGzwm/Fl6ogGvrVVWUtXDeBU.0tjL46L2rOcAlqVF5.xBysL6Euny', 0, 'DflMyzQUI5CxUoHUYHX2VAPAFbAOoI0DeGnVkiPAydYuRnZKZSeNozfa2xNN', '2017-03-16 01:31:42', '2017-03-16 01:34:48'),
(15, 'đỗ đình dự 4', 'dinhdu4@gmail.com', '$2y$10$.dseuk5.a1XmI4sLMspMWeJDldN3Udg3S2bGpd/NSx5Ik5mapb.t2', 0, NULL, '2017-03-16 01:36:12', '2017-03-16 01:36:12'),
(16, 'đình dự 6', 'dinhdu5@gmail.com', '$2y$10$1JBcYgTg69hMnqg7ZJoGmex309oOyCIJU8nIAi2OmwXbKXd1Pmbw2', 0, 'UHNtAIWIBbeYRyyhXRGQRyO7VLY3a0doq24RA8PK2nEF3FPzk7vB1ruPrsbc', '2017-03-16 01:37:21', '2017-03-16 02:15:08'),
(17, 'kai đẹp trai', 'testregister@gmail.com', '$2y$10$APekxRDN/xXTDm8oBpdGK.e4IiD6PoJYoWH2tIbE3a0hqi4FT08Ce', 0, 'QHU2bObE8g8Ch3KhRvU7tHbSkyWlxeYj7y8Cy9aVIJd4IFl98KGzq5TawHET', '2017-03-19 17:12:55', '2017-03-19 17:12:55'),
(18, 'kai handsome', 'testregister2@gmail.com', '$2y$10$s9SwXJfStQAMYeq90FhEueDj3kOQZQmg33no.eu0NLafmPYW2oiOu', 0, NULL, '2017-03-19 17:17:34', '2017-03-19 17:17:34'),
(19, 'Đình Dự', 'dinhdu1102@gmail.com', '$2y$10$nUiFUo/e/TZW2z/GTEpQcOEqyzGyz/8hi1TmwUsKwoAWmj0x4j2cu', 0, 'FJOhpLIIfrwpZgf5R1unmSlpeAvVgTzSUIpAJvn83ZVNo930tMT7GNXf2vB2', '2017-03-20 15:18:02', '2017-03-20 15:18:02'),
(20, 'dinhdu', 'Uvi6CJl@gmail.com', '$2y$10$N5Xblq9i6npWmMotem9Pc.kucc2u5c2pq4/GFJcGmIQH4I3cP6xeO', 0, NULL, NULL, NULL),
(21, 'dinhdu1', 'sHtDM@gmail.com', '$2y$10$4Z1xiakcV3tP.zG67L0qv.dSjVLfLvLv4YAdimGfcGOEtpe.WxUzi', 0, NULL, NULL, NULL),
(22, 'dinhdu2', 'hvU824rmIj@gmail.com', '$2y$10$YVajeMttNeIndA54iixUZ..ml7apshbZq4uhUFdah6PMplQuOgnPe', 0, NULL, NULL, NULL),
(23, 'dinhdu', 'dCEEoDX@gmail.com', '$2y$10$K4ajZ6Dt0QxfIdaAx8iGbOq7BKHxv9kSOpe.U3bAJC6Tp6to3zKe.', 0, NULL, NULL, NULL),
(24, 'dinhdu1', '6aUPG@gmail.com', '$2y$10$g1xmfBE0EYGQHrcXcuPEHeYGJvtdLap3Ph1bbl53m7y55EB/CHWf2', 0, NULL, NULL, NULL),
(25, 'dinhdu2', 'ielLHGOJwT@gmail.com', '$2y$10$iSaOrR0ajxbFAXETIjI0KedEg6vtxMkstwT9Wfqz5Q1bPEJGDmVqa', 0, NULL, NULL, NULL),
(26, 'dinhdu', 'udgvVE1@gmail.com', '$2y$10$M3FD8EZfROXxVZAid8G.CO6WxWDRpsy2cKeaBXhx.to6kcSfZftR.', 0, NULL, NULL, NULL),
(27, 'dinhdu1', '9m1PL@gmail.com', '$2y$10$FbAB3pFjdQ.CPDSVwaGRoOtAC4.CGk4piG0RlQR88UAPfI/0CTSB.', 0, NULL, NULL, NULL),
(28, 'dinhdu2', 'wxG9g2PEfe@gmail.com', '$2y$10$a2S9ns4WITRZx.jI25w0Nu/5.wQT/TbJka9xwabKsJoKUG7I2B7Ye', 0, NULL, NULL, NULL),
(29, 'dinhdu', 'xVKhemU@gmail.com', '$2y$10$cz97r5mVcUidH9WB7PJhrOwrLxwAeOtr0z1a8tROvbYgRRbScIWBu', 0, NULL, NULL, NULL),
(30, 'dinhdu1', 'Gr8Ky@gmail.com', '$2y$10$/IMe/HhTed7PwufzrsBmxurUIb.xPi2g/TDEKTwhsTzg4YK6hw1iG', 0, NULL, NULL, NULL),
(31, 'dinhdu2', 'C365lxabz5@gmail.com', '$2y$10$PFyvkuQsuB2CaDG2ydFvMeUYogiq.N3cOrmG427IZ45leAPpL4ubW', 0, NULL, NULL, NULL),
(32, 'dinhdu', 'Sq9sPjl@gmail.com', '$2y$10$T9UBNlbo4C8U6FDTlhLyT.g7wCGiMoEQxw0zLKFkB.2VaA2GJ1asi', 0, NULL, NULL, NULL),
(33, 'dinhdu1', 'G22jK@gmail.com', '$2y$10$JFXsb0EfleH9nJkmJ54rOe9MFP2lfMZrMWGNLe1i6Lzs/J/kptJHC', 0, NULL, NULL, NULL),
(34, 'dinhdu2', 'gS0UbIn8WP@gmail.com', '$2y$10$nvGnntOsBZxN7IyGLdVJFeXmK.IL9jfTS8Y.E5x7Vhdatd44MduoC', 0, NULL, NULL, NULL),
(35, 'muahang3', 'muahang3@gmail.com', '$2y$10$4Z3xvBiTXyMBl4.F/Jt5oOcoSRpqxb57LtzsUpKpTg7AXkbXKS27W', 0, 'h7qQjiLdB3Kw6qakj3nuHmDLANqCGcBlpIcmZTwAzZzBmDiAeuLkzGhZ62NU', '2017-03-27 16:32:01', '2017-03-27 16:32:01'),
(36, 'muahang4', 'muahang4@gmail.com', '$2y$10$5Ii4jo4IYIUfSLWiewpPOu21n/XH0mYAFfZz.p9WwJo68y5OO/TZG', 0, 'YDTij1Th92uqcBj4UaT8rOAGThgPc96hVZk2SFBVyJlcfwBXgljn7YTOOVZh', '2017-03-27 17:07:40', '2017-03-27 17:07:40');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_iduser_foreign` (`idUser`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_blog_iduser_foreign` (`idUser`),
  ADD KEY `comment_blog_idblog_foreign` (`idBlog`);

--
-- Chỉ mục cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_product_iduser_foreign` (`idUser`),
  ADD KEY `comment_product_idpro_foreign` (`idPro`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_iduser_foreign` (`idUser`);

--
-- Chỉ mục cho bảng `custom_order`
--
ALTER TABLE `custom_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_order_idcustom_foreign` (`idCustom`);

--
-- Chỉ mục cho bảng `foot_category`
--
ALTER TABLE `foot_category`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_idsubcate_foreign` (`idSubCate`),
  ADD KEY `product_idbrand_foreign` (`idBrand`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_idcate_foreign` (`idCate`);

--
-- Chỉ mục cho bảng `sub_foot_category`
--
ALTER TABLE `sub_foot_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_foot_category_idfoot_foreign` (`idFoot`);

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
-- AUTO_INCREMENT cho bảng `advertising`
--
ALTER TABLE `advertising`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `comment_blog`
--
ALTER TABLE `comment_blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `custom_order`
--
ALTER TABLE `custom_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `foot_category`
--
ALTER TABLE `foot_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT cho bảng `sub_foot_category`
--
ALTER TABLE `sub_foot_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD CONSTRAINT `comment_blog_idblog_foreign` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `comment_blog_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD CONSTRAINT `comment_product_idpro_foreign` FOREIGN KEY (`idPro`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_product_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `custom_order`
--
ALTER TABLE `custom_order`
  ADD CONSTRAINT `custom_order_idcustom_foreign` FOREIGN KEY (`idCustom`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_idbrand_foreign` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `product_idsubcate_foreign` FOREIGN KEY (`idSubCate`) REFERENCES `sub_category` (`id`);

--
-- Các ràng buộc cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_idcate_foreign` FOREIGN KEY (`idCate`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `sub_foot_category`
--
ALTER TABLE `sub_foot_category`
  ADD CONSTRAINT `sub_foot_category_idfoot_foreign` FOREIGN KEY (`idFoot`) REFERENCES `foot_category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
