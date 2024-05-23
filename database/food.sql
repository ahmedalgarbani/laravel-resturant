-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 08:04 PM
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
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `main_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `video_link` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `title`, `main_title`, `description`, `video_link`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_663a7e3287ffe.jpg', 'About Company', 'Helathy Foods Provider', '<div class=\"fp__about_us_text\">\r\n                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aspernatur molestiae\r\n                            minima pariatur consequatur voluptate sapiente deleniti soluta, animi ab necessitatibus\r\n                            optio similique quasi fuga impedit corrupti obcaecati neque consequatur sequi.</p>\r\n                        <ul><li>Delicious &amp; Healthy Foods </li><li>Spacific Family &amp; Kids Zone</li><li>Best Price &amp; Offers</li><li>Made By Fresh Ingredients</li><li>Music &amp; Other Facilities</li><li>Delicious &amp; Healthy Foods </li><li>Spacific Family &amp; Kids Zone</li><li>Best Price &amp; Offers</li><li>Made By Fresh Ingredients</li><li>Delicious &amp; Healthy Foods c<br></li></ul>\r\n                    </div>', 'https://www.youtube.com/watch?v=tu7LlEskM-c', '2024-05-07 16:16:34', '2024-05-21 16:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_area_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `delivery_area_id`, `first_name`, `last_name`, `phone`, `email`, `address`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'aaa', 'ddd', '1211111', 'admin1@gmail.com', 'aadsd,yhuhgj98765 #fsdfdsfd', 'home', '2024-05-01 09:04:51', '2024-05-01 09:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'main_menu', NULL, NULL),
(2, 'menu_footer_one', NULL, NULL),
(3, 'menu_footer_two', NULL, NULL),
(4, 'menu_footer_three', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `class` varchar(255) DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu_items`
--

INSERT INTO `admin_menu_items` (`id`, `label`, `link`, `parent_id`, `sort`, `class`, `menu_id`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 0, 0, NULL, 2, 0, NULL, NULL),
(2, 'About Us', '/about', 0, 1, NULL, 2, 0, NULL, NULL),
(3, 'Contact Us', '/contact', 0, 2, NULL, 2, 0, NULL, NULL),
(4, 'Our Service', '/', 0, 3, NULL, 2, 0, NULL, NULL),
(5, 'Gallary', '/', 0, 4, NULL, 2, 0, NULL, NULL),
(6, 'Terms And Conditions', '/terms-condition', 0, 0, NULL, 3, 0, NULL, NULL),
(7, 'Privacy Policy', '/privacy-policy', 0, 1, NULL, 3, 0, NULL, NULL),
(9, 'Refund Policy', '/privacy-policy', 0, 2, NULL, 3, 0, NULL, NULL),
(10, 'FAQ', '/', 0, 3, NULL, 3, 0, NULL, NULL),
(11, 'Contact', '/contact', 0, 4, NULL, 3, 0, NULL, NULL),
(12, 'FAQs', '/', 0, 0, NULL, 4, 0, NULL, NULL),
(13, 'Payment', '/payment', 0, 1, NULL, 4, 0, NULL, NULL),
(14, 'Settings', '/settings', 0, 2, NULL, 4, 0, NULL, NULL),
(15, 'Privacy Policy', '/privacy-policy', 0, 3, NULL, 4, 0, NULL, NULL),
(16, 'Home', '/', 0, 0, NULL, 1, 0, NULL, '2024-05-10 18:19:33'),
(17, 'About', '/about', 0, 2, NULL, 1, 0, NULL, '2024-05-11 17:56:34'),
(18, 'Blog', '/blogs', 0, 3, NULL, 1, 0, NULL, '2024-05-11 17:56:34'),
(19, 'Contact', '/contact', 0, 4, NULL, 1, 0, NULL, '2024-05-11 17:56:34'),
(20, 'Page', '#', 0, 5, NULL, 1, 0, NULL, '2024-05-11 17:56:34'),
(21, 'Chefs', '/chefs', 20, 6, NULL, 1, 1, NULL, '2024-05-11 17:56:34'),
(22, 'Testimoials', '/testimoials', 20, 7, NULL, 1, 1, NULL, '2024-05-11 17:56:34'),
(23, 'Privacy Policy', '/privacy-policy', 20, 8, NULL, 1, 1, NULL, '2024-05-11 17:56:34'),
(24, 'Terms And Conditions', '/terms-condition', 20, 9, NULL, 1, 1, NULL, '2024-05-11 17:56:34'),
(27, 'Product', '/products', 0, 1, NULL, 1, 0, '2024-05-11 17:56:24', '2024-05-11 17:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `app_downloads`
--

CREATE TABLE `app_downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `play_store_link` varchar(255) DEFAULT NULL,
  `apple_store_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_downloads`
--

INSERT INTO `app_downloads` (`id`, `image`, `background`, `title`, `short_description`, `play_store_link`, `apple_store_link`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_6639375027faf.png', '/uploads/media_663937502828c.jpg', 'download our mobile apps', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque assumenda tenetur, provident earum consequatur, ut voluptas laboriosam fuga error aut eaque architecto quo pariatur. Vel dolore omnis quisquam. Lorem ipsum dolor, sit amet consectetur adipisicing elit Cumque', NULL, 'https://chat.openai.com/', '2024-05-06 17:02:15', '2024-05-06 17:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `banner_sliders`
--

CREATE TABLE `banner_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_sliders`
--

INSERT INTO `banner_sliders` (`id`, `title`, `sub_title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'red chicken', 'Lorem ipsum dolor sit amet consectetur.', '/uploads/media_6638e1590cba2.png', 1, '2024-05-06 10:55:37', '2024-05-06 10:55:37'),
(5, 'red chicken', 'Lorem ipsum dolor sit amet consectetur.', '/uploads/media_6638e1c6a7ee2.png', 1, '2024-05-06 10:57:26', '2024-05-06 10:57:26'),
(6, 'red chicken', 'Lorem ipsum dolor sit amet consectetur.', '/uploads/media_6638e1d54d7f9.png', 1, '2024-05-06 10:57:41', '2024-05-06 10:57:41'),
(7, 'red chicken', 'Lorem ipsum dolor sit amet consectetur.', '/uploads/media_6638e1e2ea8dc.png', 1, '2024-05-06 10:57:54', '2024-05-06 10:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Pizza', 'pizza', 1, 1, NULL, NULL),
(3, 'Taco', 'taco', 1, 1, NULL, NULL),
(4, 'Burger', 'burger', 1, 1, '2024-03-26 22:19:00', '2024-03-26 22:21:09'),
(5, 'sddfdsf', 'sddfdsf', 0, 1, '2024-04-26 18:40:27', '2024-04-26 18:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(34, 2, 1, 'شسيشسيس', 0, '2024-05-04 16:54:03', '2024-05-04 16:54:03'),
(35, 2, 1, '3ق343423', 0, '2024-05-04 16:54:08', '2024-05-04 16:54:08'),
(36, 1, 2, 'sssss', 0, '2024-05-04 16:54:59', '2024-05-04 16:54:59'),
(37, 2, 1, 'gjgjhgjh', 0, '2024-05-04 17:05:05', '2024-05-04 17:05:05'),
(38, 2, 1, 'zdsdfsdfsd', 0, '2024-05-04 17:10:32', '2024-05-04 17:10:32'),
(39, 2, 1, 'hi i am user', 0, '2024-05-04 17:10:53', '2024-05-04 17:10:53'),
(40, 1, 2, 'hi there i am admin ahmed', 0, '2024-05-04 17:11:09', '2024-05-04 17:11:09'),
(41, 2, 1, 'hi admin', 0, '2024-05-04 17:13:34', '2024-05-04 17:13:34'),
(42, 2, 1, 'hi admin', 0, '2024-05-04 17:14:26', '2024-05-04 17:14:26'),
(43, 2, 1, 'hi', 0, '2024-05-04 17:14:50', '2024-05-04 17:14:50'),
(44, 1, 2, 'aaaaaaaa', 0, '2024-05-04 17:15:08', '2024-05-04 17:15:08'),
(45, 2, 1, 'ssssssss', 0, '2024-05-04 17:15:20', '2024-05-04 17:15:20'),
(46, 2, 1, '4444444', 0, '2024-05-21 20:21:35', '2024-05-21 20:21:35'),
(47, 1, 2, 'hi wtf', 0, '2024-05-21 20:21:49', '2024-05-21 20:21:49'),
(48, 2, 1, 'i am good', 0, '2024-05-21 20:21:57', '2024-05-21 20:21:57'),
(49, 2, 1, 'hiiiiiiiiiiiiiiiiiii', 0, '2024-05-21 20:24:33', '2024-05-21 20:24:33'),
(50, 1, 2, 'sss', 0, '2024-05-21 20:24:43', '2024-05-21 20:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `in` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `image`, `name`, `title`, `fb`, `in`, `x`, `web`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(3, '/uploads/media_66392a8c54390.jpg', 'ahmed mohamed', 'secior chef', 'ss', 's', 'd', 'e', 1, 1, '2024-05-06 16:07:56', '2024-05-06 16:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_one` varchar(255) DEFAULT NULL,
  `phone_two` varchar(255) DEFAULT NULL,
  `email_one` varchar(255) DEFAULT NULL,
  `email_two` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone_one`, `phone_two`, `email_one`, `email_two`, `address`, `map_link`, `created_at`, `updated_at`) VALUES
(1, '+121212', '+131313', 'asdas@ddas', 'aasda@efas', 'asdasdas', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29199.78758207035!2d90.43684581929195!3d23.819543211524437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fce7d991f%3A0xacfaf1ac8e944c05!2sBasundhara%20Residential%20Area%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1667021568123!5m2!1sen!2sbd', '2024-05-07 17:51:06', '2024-05-07 18:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background` varchar(255) NOT NULL,
  `counter_icon_one` varchar(255) NOT NULL,
  `counter_name_one` varchar(255) NOT NULL,
  `counter_count_one` varchar(255) NOT NULL,
  `counter_icon_two` varchar(255) NOT NULL,
  `counter_name_two` varchar(255) NOT NULL,
  `counter_count_two` varchar(255) NOT NULL,
  `counter_icon_three` varchar(255) NOT NULL DEFAULT '',
  `counter_name_three` varchar(255) NOT NULL,
  `counter_count_three` varchar(255) NOT NULL,
  `counter_icon_four` varchar(255) NOT NULL,
  `counter_name_four` varchar(255) NOT NULL,
  `counter_count_four` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `background`, `counter_icon_one`, `counter_name_one`, `counter_count_one`, `counter_icon_two`, `counter_name_two`, `counter_count_two`, `counter_icon_three`, `counter_name_three`, `counter_count_three`, `counter_icon_four`, `counter_name_four`, `counter_count_four`, `created_at`, `updated_at`) VALUES
(1, '/uploads/media_663a4fbdbb55d.jpg', 'fab fa-bitbucket', 'aa', '22', 'fas fa-align-center', 'dd', '33', 'fab fa-accessible-icon', 'ff', '44', 'fab fa-affiliatetheme', 'gg', '55', '2024-05-07 12:50:30', '2024-05-07 12:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_purchase_amount` int(11) NOT NULL DEFAULT 0,
  `expired_date` date NOT NULL,
  `discount_type` enum('percent','amount') NOT NULL,
  `discount` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `quantity`, `min_purchase_amount`, `expired_date`, `discount_type`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MAR', 'mar', 100, 500, '2026-07-22', 'percent', 20, 1, '2024-05-20 19:38:46', '2024-05-20 19:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `name`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 'home page new', 'home-page-new', 'HOME PAGE <b>NEW</b><br>', 1, '2024-05-10 17:51:32', '2024-05-10 17:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `daily_offers`
--

CREATE TABLE `daily_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_offers`
--

INSERT INTO `daily_offers` (`id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 9, 1, '2024-05-04 20:38:48', '2024-05-04 20:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_areas`
--

CREATE TABLE `delivery_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `min_delivery_time` varchar(255) NOT NULL,
  `max_delivery_time` varchar(255) NOT NULL,
  `delivery_fee` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_areas`
--

INSERT INTO `delivery_areas` (`id`, `area_name`, `min_delivery_time`, `max_delivery_time`, `delivery_fee`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aaa', '22', '33', 50, 1, '2024-05-01 09:04:05', '2024-05-01 09:04:05'),
(2, 'bb', '33', '22', 10, 1, '2024-05-01 09:04:20', '2024-05-01 09:04:20');

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
-- Table structure for table `footer_infos`
--

CREATE TABLE `footer_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_description` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_infos`
--

INSERT INTO `footer_infos` (`id`, `short_description`, `email`, `phone`, `address`, `copyright`, `status`, `created_at`, `updated_at`) VALUES
(1, 'There are many variations of Lorem Ipsum available, but the majority have suffered.', 'ahmed@gmail.com', '781717609', '7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States', 'Copyright 2024 FoodPark All Rights Reserved.', 1, '2024-05-09 17:52:35', '2024-05-20 19:15:37');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_14_161106_create_slider_table', 1),
(6, '2024_03_25_121605_rename_slider_table_to_sliders_table', 1),
(7, '2024_03_26_104919_create_whychooseuses_table', 2),
(8, '2024_03_26_105032_create_section_titles_table', 2),
(9, '2024_03_26_120449_rename_whychooseus_table_to_why_choose_us_table', 3),
(10, '2024_03_26_120449_rename_whychooseuses_table_to_why_choose_us_table', 4),
(12, '2024_03_27_001916_create_categories_table', 5),
(14, '2024_03_27_133655_create_products_table', 6),
(16, '2024_03_27_222735_create_product_gallaries_table', 7),
(17, '2024_03_31_114038_create_product_variants_table', 8),
(18, '2024_03_31_114052_create_product_sizes_table', 8),
(34, '2024_05_01_113347_add_address_id_to_orders_table', 13),
(35, '2024_04_02_183607_create_settings_table', 14),
(39, '2024_04_24_222555_create_coupons_table', 15),
(40, '2024_04_26_213931_create_delivery_areas_table', 15),
(41, '2024_04_27_224208_create_addresses_table', 15),
(46, '2024_04_29_095316_create_orders_table', 16),
(47, '2024_04_29_095337_create_order_items_table', 16),
(48, '2024_04_29_201739_create_payment_getways_table', 16),
(49, '2024_05_01_114024_add_address_id_to_orders_table', 16),
(51, '2024_05_03_222606_create_chats_table', 17),
(52, '2024_05_04_204833_create_daily_offers_table', 18),
(55, '2024_05_06_124827_create_banner_sliders_table', 19),
(56, '2024_05_06_144407_create_chefs_table', 20),
(59, '2024_05_06_191229_create_app_downloads_table', 21),
(60, '2024_05_06_204445_create_testimonials_table', 22),
(61, '2024_05_07_124123_create_privacy_policies_table', 23),
(62, '2024_05_07_124137_create_terms_conditions_table', 23),
(65, '2024_05_07_141350_create_counters_table', 24),
(66, '2024_05_07_180757_create_abouts_table', 25),
(68, '2024_05_07_202828_create_contacts_table', 26),
(69, '2024_05_09_171346_create_subscribers_table', 27),
(74, '2024_05_09_191616_create_footer_infos_table', 28),
(75, '2024_05_09_191631_create_social_links_table', 28),
(76, '2017_08_11_073824_create_menus_wp_table', 29),
(77, '2017_08_11_074006_create_menu_items_wp_table', 29),
(78, '2024_05_10_195107_create_custom_pages_table', 30),
(79, '2024_05_11_171529_create_wishlists_table', 31),
(81, '2024_05_12_141422_create_product_ratings_table', 32),
(83, '2024_05_17_165502_add_delivery_area_id_table', 33),
(84, '2024_05_20_155656_create_permission_tables', 34),
(85, '2024_05_21_173048_create_notifications_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('36871f99-5a7c-46e1-b434-ec997fd6b352', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"Data_id\":16,\"message\":\"Deleted asdfsdfsd Account By admin\",\"route\":\"admin.AccountManagement.index\"}', NULL, '2024-05-21 20:09:14', '2024-05-21 20:09:14'),
('3f60273d-747a-4b62-8531-4f3c08166b1d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"Data_id\":15,\"message\":\"Deleted asdsca Account By admin\",\"route\":\"admin.AccountManagement.index\"}', NULL, '2024-05-21 20:10:28', '2024-05-21 20:10:28'),
('76372b48-c033-4ee7-b9cb-5373faca7cf4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Data_id\":16,\"message\":\"Deleted asdfsdfsd Account By admin\",\"route\":\"admin.AccountManagement.index\"}', NULL, '2024-05-21 20:09:14', '2024-05-21 20:09:14'),
('91466412-9903-484d-af3f-c58fd19b2732', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 7, '{\"Data_id\":15,\"message\":\"Deleted asdsca Account By admin\",\"route\":\"admin.AccountManagement.index\"}', NULL, '2024-05-21 20:10:28', '2024-05-21 20:10:28'),
('b1b34616-03a3-4450-aa89-bdfefb396571', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Data_id\":15,\"message\":\"Deleted asdsca Account By admin\",\"route\":\"admin.AccountManagement.index\"}', NULL, '2024-05-21 20:10:28', '2024-05-21 20:10:28'),
('bbec1fb3-dcce-4b20-bbad-d6337459b911', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"Data_id\":16,\"message\":\"Deleted asdfsdfsd Account By admin\",\"route\":\"admin.AccountManagement.index\"}', NULL, '2024-05-21 20:09:14', '2024-05-21 20:09:14'),
('bf420472-8abb-4ec0-81bf-b2fc89c1cefc', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 7, '{\"Data_id\":16,\"message\":\"Deleted asdfsdfsd Account By admin\",\"route\":\"admin.AccountManagement.index\"}', NULL, '2024-05-21 20:09:14', '2024-05-21 20:09:14'),
('fcc50fda-79c7-418b-90cc-d62c05a96b84', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"Data_id\":15,\"message\":\"Deleted asdsca Account By admin\",\"route\":\"admin.AccountManagement.index\"}', NULL, '2024-05-21 20:10:28', '2024-05-21 20:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `subtotal` double NOT NULL,
  `grand_total` double NOT NULL,
  `product_qty` int(11) NOT NULL,
  `delivery_charge` int(11) NOT NULL DEFAULT 0,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_approve_date` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `coupon_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`coupon_info`)),
  `currency_name` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `delivery_area_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `user_id`, `address`, `discount`, `subtotal`, `grand_total`, `product_qty`, `delivery_charge`, `payment_method`, `payment_status`, `payment_approve_date`, `transaction_id`, `coupon_info`, `currency_name`, `order_status`, `created_at`, `updated_at`, `address_id`, `delivery_area_id`) VALUES
(85, '8434241826', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 265, 315, 1, 50, NULL, 'pending', NULL, NULL, NULL, NULL, 'delivered', '2024-05-18 08:30:26', '2024-05-20 19:26:56', 1, 1),
(125, '9930241840', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 760, 810, 2, 50, NULL, 'pending', NULL, NULL, NULL, NULL, 'declined', '2024-05-18 09:39:40', '2024-05-18 09:55:53', 1, 1),
(126, '2950241851', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 760, 810, 2, 50, 'stripe', 'complete', '2024-05-18 09:44:21', 'pi_3PHmYeEbPuC2dopv0hBF1UZm', NULL, 'usd', 'pending', '2024-05-18 09:39:51', '2024-05-18 09:44:21', 1, 1),
(127, '5727241835', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 1020, 1070, 2, 50, 'stripe', 'COMPLETED', '2024-05-18 09:48:39', 'pi_3PHmgKEbPuC2dopv1lQwtdyL', NULL, 'usd', 'pending', '2024-05-18 09:45:35', '2024-05-18 09:48:39', 1, 1),
(128, '4239241854', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 260, 310, 1, 50, NULL, 'pending', NULL, NULL, NULL, NULL, 'pending', '2024-05-18 13:44:54', '2024-05-18 13:44:54', 1, 1),
(129, '6522241803', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 260, 310, 1, 50, NULL, 'pending', NULL, NULL, NULL, NULL, 'pending', '2024-05-18 13:45:03', '2024-05-18 13:45:03', 1, 1),
(130, '6538241804', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 520, 570, 1, 50, NULL, 'pending', NULL, NULL, NULL, NULL, 'pending', '2024-05-18 17:53:04', '2024-05-18 17:53:04', 1, 1),
(131, '8557241830', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 520, 570, 1, 50, NULL, 'pending', NULL, NULL, NULL, NULL, 'pending', '2024-05-18 17:53:30', '2024-05-18 17:53:30', 1, 1),
(132, '4219241836', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 520, 570, 1, 50, NULL, 'pending', NULL, NULL, NULL, NULL, 'pending', '2024-05-18 17:54:36', '2024-05-18 17:54:36', 1, 1),
(133, '6975241855', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 520, 570, 1, 50, 'stripe', 'Failed', '2024-05-18 18:42:15', '', NULL, '', 'pending', '2024-05-18 17:55:56', '2024-05-18 18:42:15', 1, 1),
(134, '9635241833', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 520, 570, 1, 50, NULL, 'pending', NULL, NULL, NULL, NULL, 'pending', '2024-05-18 18:42:33', '2024-05-18 18:42:33', 1, 1),
(135, '9086241839', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 520, 570, 1, 50, 'stripe', 'Failed', '2024-05-18 18:49:56', '', NULL, '', 'pending', '2024-05-18 18:42:39', '2024-05-18 18:49:56', 1, 1),
(136, '9079241831', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 520, 570, 1, 50, 'stripe', 'COMPLETED', '2024-05-18 18:51:13', 'pay_OC6xNm7DsP96yF', NULL, 'USD', 'pending', '2024-05-18 18:50:31', '2024-05-18 18:51:13', 1, 1),
(137, '805241854', 2, 'aadsd,yhuhgj98765 #fsdfdsfd, Ariaaaa', 0, 500, 550, 1, 50, 'stripe', 'COMPLETED', '2024-05-18 18:53:57', 'pay_OC70DCqcQdruwv', NULL, 'USD', 'pending', '2024-05-18 18:52:54', '2024-05-18 18:53:57', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `product_size` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_size`)),
  `product_option` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_option`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_id`, `unit_price`, `qty`, `product_size`, `product_option`, `created_at`, `updated_at`) VALUES
(60, 126, 'spgeti', 8, 200, 2, '{\"id\":8,\"name\":\"Small\",\"price\":\"50\"}', '[]', '2024-05-18 09:39:56', '2024-05-18 09:39:56'),
(61, 126, 'Maxican Pizza Test Better', 9, 200, 1, '{\"id\":4,\"name\":\"Large\",\"price\":\"50\"}', '[{\"id\":3,\"name\":\"Coca-Cola\",\"price\":\"10\"}]', '2024-05-18 09:39:56', '2024-05-18 09:39:56'),
(62, 127, 'Maxican Pizza Test Better', 9, 200, 2, '{\"id\":4,\"name\":\"Large\",\"price\":\"50\"}', '[{\"id\":3,\"name\":\"Coca-Cola\",\"price\":\"10\"}]', '2024-05-18 09:45:39', '2024-05-18 09:45:39'),
(63, 127, 'spgeti', 8, 200, 2, '{\"id\":8,\"name\":\"Small\",\"price\":\"50\"}', '[]', '2024-05-18 09:45:39', '2024-05-18 09:45:39'),
(64, 129, 'Maxican Pizza Test Better', 9, 200, 1, '{\"id\":4,\"name\":\"Large\",\"price\":\"50\"}', '[{\"id\":3,\"name\":\"Coca-Cola\",\"price\":\"10\"}]', '2024-05-18 13:45:09', '2024-05-18 13:45:09'),
(65, 131, 'Maxican Pizza Test Better', 9, 200, 2, '{\"id\":4,\"name\":\"Large\",\"price\":\"50\"}', '[{\"id\":3,\"name\":\"Coca-Cola\",\"price\":\"10\"}]', '2024-05-18 17:54:00', '2024-05-18 17:54:00'),
(66, 133, 'Maxican Pizza Test Better', 9, 200, 2, '{\"id\":4,\"name\":\"Large\",\"price\":\"50\"}', '[{\"id\":3,\"name\":\"Coca-Cola\",\"price\":\"10\"}]', '2024-05-18 17:56:12', '2024-05-18 17:56:12'),
(67, 135, 'Maxican Pizza Test Better', 9, 200, 2, '{\"id\":4,\"name\":\"Large\",\"price\":\"50\"}', '[{\"id\":3,\"name\":\"Coca-Cola\",\"price\":\"10\"}]', '2024-05-18 18:42:47', '2024-05-18 18:42:47'),
(68, 136, 'Maxican Pizza Test Better', 9, 200, 2, '{\"id\":4,\"name\":\"Large\",\"price\":\"50\"}', '[{\"id\":3,\"name\":\"Coca-Cola\",\"price\":\"10\"}]', '2024-05-18 18:50:37', '2024-05-18 18:50:37'),
(69, 137, 'spgeti', 8, 200, 2, '{\"id\":8,\"name\":\"Small\",\"price\":\"50\"}', '[]', '2024-05-18 18:52:59', '2024-05-18 18:52:59');

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
-- Table structure for table `payment_getways`
--

CREATE TABLE `payment_getways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_getways`
--

INSERT INTO `payment_getways` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'paypal_logo', '/uploads/media_6646e17ee0d1b.jpg', '2024-05-17 01:47:58', '2024-05-17 01:47:58'),
(2, 'paypal_status', '1', '2024-05-17 01:47:58', '2024-05-18 13:44:42'),
(3, 'paypal_account_mode', 'sandbox', '2024-05-17 01:47:58', '2024-05-17 01:47:58'),
(4, 'paypal_country', 'United States', '2024-05-17 01:47:58', '2024-05-17 01:47:58'),
(5, 'paypal_currency', 'USD', '2024-05-17 01:47:58', '2024-05-17 01:47:58'),
(6, 'paypal_rate', '1', '2024-05-17 01:47:58', '2024-05-17 01:47:58'),
(7, 'paypal_api_key', 'AXas_iEaUPdMS4gY5YJ20QZFtsJw2FryzV4R9NQt2u435BZRqZbtVqgb-UPZDT6hoO88CthwueE9r7C_', '2024-05-17 01:47:58', '2024-05-17 01:47:58'),
(8, 'paypal_secret_key', 'EKHMFpllrOR9LJhO9aP5AGQHqVlfnLH_0AWqHLn7AR1PtvcDpOsL8XM9uC4SnoSgHdbSFQ102Nv14dNm', '2024-05-17 01:47:58', '2024-05-17 01:47:58'),
(9, 'paypal_app_id', 'App Id', '2024-05-17 15:26:23', '2024-05-17 15:26:23'),
(10, 'stripe_logo', '/uploads/media_6648748512cb7.png', '2024-05-18 06:27:33', '2024-05-18 06:27:33'),
(11, 'stripe_status', '1', '2024-05-18 06:27:33', '2024-05-18 06:27:33'),
(12, 'stripe_country', 'United States', '2024-05-18 06:27:33', '2024-05-18 06:40:52'),
(13, 'stripe_currency', 'USD', '2024-05-18 06:27:33', '2024-05-18 06:40:52'),
(14, 'stripe_rate', '1', '2024-05-18 06:27:33', '2024-05-18 06:40:52'),
(15, 'stripe_api_key', 'pk_test_51PHje2EbPuC2dopv7DZPQKMkI900Rtrh3g6mWNeQdP56CduSw08yQHJOqaEYwQdSZG9SvPXNN4X0jCEQR8RET8DX00eBeHfqz6', '2024-05-18 06:27:33', '2024-05-18 06:40:10'),
(16, 'stripe_secret_key', 'sk_test_51PHje2EbPuC2dopvB16oiTkytx3PaFlv27J0vipx3H7pLAV0wmFxSQBolOZI8a5oe1TBx8OTJBGDrCBf1FbWg7I400YcdUzL13', '2024-05-18 06:27:33', '2024-05-18 06:40:10'),
(17, 'razorpay_logo', '/uploads/media_6648da112612d.jpg', '2024-05-18 13:40:49', '2024-05-18 13:40:49'),
(18, 'razorpay_status', '1', '2024-05-18 13:40:49', '2024-05-18 13:40:49'),
(19, 'razorpay_country', 'United States', '2024-05-18 13:40:49', '2024-05-18 13:40:49'),
(20, 'razorpay_currency', 'USD', '2024-05-18 13:40:49', '2024-05-18 13:40:49'),
(21, 'razorpay_rate', '1', '2024-05-18 13:40:49', '2024-05-18 13:40:49'),
(22, 'razorpay_api_key', 'rzp_test_K7CipNQYyyMPiS', '2024-05-18 13:40:49', '2024-05-18 13:40:49'),
(23, 'razorpay_secret_key', 'zSBmNMorJrirOrnDrbOd1ALO', '2024-05-18 13:40:49', '2024-05-18 13:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(54, 'role-list', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(55, 'role-create', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(56, 'role-edit', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(57, 'role-delete', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(58, 'product-list', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(59, 'product-create', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(60, 'product-edit', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(61, 'product Option-show', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(62, 'product Size-list', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(63, 'product Variant-list', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(64, 'product Gallary-list', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(65, 'product Size-update', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(66, 'product Variant-update', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(67, 'product Gallary-update', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(68, 'product-delete', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(69, 'Daily Offer-list', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(70, 'Daily Offer-create', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(71, 'Daily Offer-edit', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(72, 'Daily Offer-delete', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(73, 'Daily Offer-show-title', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(74, 'Daily Offer-update-title', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(75, 'Slider Home-list', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(76, 'Slider Home-create', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(77, 'Slider Home-edit', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(78, 'Slider Home-delete', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(79, 'Section-show', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(80, 'Order-show', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(81, 'Page-show', 'web', '2024-05-20 20:05:25', '2024-05-20 20:05:25'),
(82, 'Chat-show', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(83, 'Setting-show', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(84, 'Menu Builder-show', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(85, 'Manage Restaurant-show', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(86, 'why-choose-us-list', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(87, 'why-choose-us-create', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(88, 'why-choose-us-edit', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(89, 'why-choose-us-delete', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(90, 'why-choose-us-show-title', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(91, 'why-choose-us-update-title', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(92, 'Testimonial-list', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(93, 'Testimonial-create', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(94, 'Testimonial-edit', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(95, 'Testimonial-delete', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(96, 'Testimonial-show-title', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(97, 'Testimonial-update-title', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(98, 'Account Management-list', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(99, 'Account Management-create', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(100, 'Account Management-edit', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(101, 'Account Management-delete', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(102, 'Bunner Slider-list', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(103, 'Bunner Slider-create', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(104, 'Bunner Slider-edit', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(105, 'Bunner Slider-delete', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(106, 'Custom Page-list', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(107, 'Custom Page-create', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(108, 'Custom Page-edit', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(109, 'Custom Page-delete', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(110, 'Social Link-list', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(111, 'Social Link-create', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(112, 'Social Link-edit', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(113, 'Social Link-delete', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(114, 'Product Review-list', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(115, 'Product Review-edit', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(116, 'Product Review-delete', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(117, 'Chef-list', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(118, 'Chef-create', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(119, 'Chef-edit', 'web', '2024-05-20 20:05:26', '2024-05-20 20:05:26'),
(120, 'Chef-delete', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(121, 'Chef-show-title', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(122, 'Chef-update-title', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(123, 'App Download-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(124, 'App Download-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(125, 'Counter-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(126, 'Counter-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(127, 'Global Setting-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(128, 'Global Setting-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(129, 'Logo Setting-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(130, 'Logo Setting-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(131, 'Email Setting-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(132, 'Email Setting-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(133, 'Appearance Setting-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(134, 'Appearance Setting-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(135, 'Seo Setting-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(136, 'Seo Setting-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(137, 'Notification Setting-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(138, 'Notification Setting-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(139, 'Terms Condition-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(140, 'Terms Condition-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(141, 'News Letter-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(142, 'News Letter Send Message-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(143, 'News Letter Send Message-send', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(144, 'Privacy Policy-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(145, 'Privacy Policy-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(146, 'Footer Information-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(147, 'Footer Information-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(148, 'About-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(149, 'About-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(150, 'Contact Us-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(151, 'Contact Us-edit', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(152, 'All Order-list', 'web', '2024-05-20 20:05:27', '2024-05-20 20:05:27'),
(153, 'In Process Order-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(154, 'Pending Order-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(155, 'Delivered Order-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(156, 'Declined Order-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(157, 'Order-delete', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(158, 'Order Detaile-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(159, 'Order Update-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(160, 'Order Payment Status-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(161, 'Order Status-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(162, 'Order Status-update', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(163, 'Category-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(164, 'Category-create', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(165, 'Category-edit', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(166, 'Category-delete', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(167, 'Coupon-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(168, 'Coupon-create', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(169, 'Coupon-edit', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(170, 'Coupon-delete', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(171, 'Delivery-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(172, 'Delivery-create', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(173, 'Delivery-edit', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(174, 'Delivery-delete', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(175, 'Payment Getway-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(176, 'Paypal-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(177, 'Paypal-edit', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(178, 'Stripe-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(179, 'Stripe-edit', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(180, 'RazorPay-list', 'web', '2024-05-20 20:05:28', '2024-05-20 20:05:28'),
(181, 'RazorPay-edit', 'web', '2024-05-20 20:05:29', '2024-05-20 20:05:29'),
(182, 'login', 'web', '2024-05-21 06:12:40', '2024-05-21 06:12:40'),
(183, 'register', 'web', '2024-05-21 06:12:40', '2024-05-21 06:12:40');

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
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"fp__about_us_text\">\r\n                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aspernatur molestiae\r\n                            minima pariatur consequatur voluptate sapiente deleniti soluta, animi ab necessitatibus\r\n                            optio similique quasi fuga impedit corrupti obcaecati neque consequatur sequi.</p>\r\n                        <ul><li>Delicious &amp; Healthy Foods </li><li>Spacific Family &amp; Kids Zone</li><li>Best Price &amp; Offers</li><li>Made By Fresh Ingredients</li><li>Music &amp; Other Facilities</li><li>Delicious &amp; Healthy Foods </li><li>Spacific Family &amp; Kids Zone</li><li>Best Price &amp; Offers</li><li>Made By Fresh Ingredients</li><li>Delicious &amp; Healthy Foods </li></ul>\r\n                    </div>', '2024-05-07 10:04:01', '2024-05-07 15:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `price` double NOT NULL,
  `offer_price` double NOT NULL DEFAULT 0,
  `quantity` int(10) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `thumb_image`, `name`, `slug`, `sku`, `short_description`, `long_description`, `price`, `offer_price`, `quantity`, `category_id`, `seo_title`, `seo_description`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(3, '/uploads/media_66047440c0574.png', 'officia', 'officia', '1661566571497', 'Ut perspiciatis ducimus quae distinctio. Libero tenetur et asperiores harum. Quia vero animi minus asperiores autem esse.', 'Eum soluta et repudiandae laborum unde a. Laboriosam odit voluptas dolorum quia. Magni inventore veritatis rerum ullam sit quidem quaerat. Modi et reiciendis quis nostrum.', 37.17, 24.16, 5, 3, 'Nihil facilis molestiae dolore nihil repudiandae non necessitatibus.', 'Neque et autem earum animi maiores quasi. Repudiandae nobis corporis est non ratione.', 1, 1, '2024-03-27 15:11:04', '2024-04-01 10:49:31'),
(6, '/uploads/media_6604708bc407d.jpg', 'asas', 'taco', 'w5sd', 'sdasd', 'assssssssssssssss', 555, 0, 55, 3, 'saxxxx', 'xxxx', 1, 1, '2024-03-27 16:16:27', '2024-03-27 16:16:27'),
(8, '/uploads/media_660aadf9229b2.jpg', 'spgeti', 'pizza', 'sss', 'aaaaaas', 'asssssssssssssss', 250, 200, 9, 2, 'dsasd', 'sdsd', 1, 1, '2024-04-01 09:52:09', '2024-04-01 09:52:09'),
(9, '/uploads/media_660abaa91da74.png', 'Maxican Pizza Test Better', 'maxican-pizza-test-better', 'ss', 'Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients, which is then baked at a high temperature, traditionally in a wood-fired oven. A small pizza is sometimes called a pizzetta.', '<div class=\"tab-pane fade active show\" id=\"pills-home\" role=\"tabpanel\" aria-labelledby=\"pills-home-tab\" tabindex=\"0\">\r\n                                <div class=\"menu_det_description\">\r\n                                    <p>Ipsum dolor, sit amet consectetur adipisicing elit. Doloribus consectetur\r\n                                        ullam in? Beatae, dolorum ad ea deleniti ratione voluptatum similique omnis\r\n                                        voluptas tempora optio soluta vero veritatis reiciendis blanditiis architecto.\r\n                                        Debitis nesciunt inventore voluptate tempora ea incidunt iste, corporis, quo\r\n                                        cumque facere doloribus possimus nostrum sed magni quasi, assumenda autem!\r\n                                        Repudiandae nihil magnam provident illo alias vero odit repellendus, ipsa nemo\r\n                                        itaque. Aperiam fuga, magnam quia illum minima blanditiis tempore. vero\r\n                                        veritatis reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate\r\n                                        tempora ea incidunt iste, corporis, quo cumque facere doloribus possimus nostrum\r\n                                        sed magni quasi</p>\r\n                                    <ul><li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus\r\n                                            consectetur ullam in</li><li>Dolor sit amet consectetur adipisicing elit. Earum itaque nesciunt.</li><li>Corporis, quo cumque facere doloribus possimus nostrum sed magni quasi.</li><li>Reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate\r\n                                            tempora ea.</li><li>Incidunt iste, corporis, quo cumque facere doloribus possimus\r\n                                            nostrum sed magni quasi</li><li>Architecto. Debitis nesciunt inventore voluptate tempora ea incidunt iste\r\n                                            corporis.</li><li>Earum itaque nesciunt dolor laudantium placeat sed velit aspernatur.</li><li>Laudantium placeat sed velit aspernatur, nobis quos quibusdam distinctio\r\n                                            voluptatum.</li></ul>\r\n                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum itaque nesciunt\r\n                                        dolor laudantium placeat sed velit aspernatur, nobis quos quibusdam distinctio\r\n                                        voluptatum officia vel sapiente enim, reprehenderit impedit beatae molestias\r\n                                        dolorum. A laborum consectetur sed quis exercitationem optio consequatur, unde\r\n                                        neque est odit, pariatur quae incidunt quasi dolorem nihil aliquid ut veritatis\r\n                                        porro eaque cupiditate voluptatem vel ad! Asperiores, praesentium. sit amet\r\n                                        consectetur adipisicing elit. Doloribus consectetur ullam in? Beatae, dolorum ad\r\n                                        ea deleniti ratione voluptatum similique omnis voluptas tempora optio soluta</p>\r\n\r\n                                    <ul><li>Reiciendis blanditiis architecto. Debitis nesciunt inventore voluptate\r\n                                            tempora ea.</li><li>Incidunt iste, corporis, quo cumque facere doloribus possimus\r\n                                            nostrum sed magni quasi</li><li>Architecto. Debitis nesciunt inventore voluptate tempora ea incidunt iste\r\n                                            corporis.</li><li>Earum itaque nesciunt dolor laudantium placeat sed velit aspernatur.</li><li>Laudantium placeat sed velit aspernatur, nobis quos quibusdam distinctio\r\n                                            voluptatum.</li></ul>\r\n                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus consectetur\r\n                                        ullam in? Beatae, dolorum ad ea deleniti ratione voluptatum similique omnis\r\n                                        voluptas tempora optio soluta vero veritatis reiciendis blanditiis architecto.\r\n                                        Debitis nesciunt inventore voluptate tempora ea incidunt iste, corporis, quo\r\n                                        cumque facere doloribus possimus nostrum sed magni quasi, assumenda autem!\r\n                                        Repudiandae nihil magnam provident illo alias vero odit repellendus, ipsa nemo\r\n                                        itaque. Aperiam fuga, magnam quia illum minima blanditiis tempore.</p>\r\n                                </div>\r\n                            </div>', 320, 200, 3, 2, 'csdc', 'dcd', 1, 1, '2024-04-01 10:46:17', '2024-05-04 20:38:31'),
(11, '/uploads/media_6622cdb772610.jpg', 'ass', 'ass', 'sdads', 'asdas', 'sdsdsadsdas', 1222, 1111, 0, 3, NULL, NULL, 1, 1, '2024-04-19 17:01:59', '2024-04-19 17:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallaries`
--

CREATE TABLE `product_gallaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallary_image` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_gallaries`
--

INSERT INTO `product_gallaries` (`id`, `gallary_image`, `product_id`, `created_at`, `updated_at`) VALUES
(6, '/uploads/media_6609491f6c05b.jpg', 6, '2024-03-31 08:29:35', '2024-03-31 08:29:35'),
(9, '/uploads/media_660abc15e0f8f.png', 9, '2024-04-01 10:52:21', '2024-04-01 10:52:21'),
(10, '/uploads/media_660abc1ab3ead.png', 9, '2024-04-01 10:52:26', '2024-04-01 10:52:26'),
(11, '/uploads/media_660abc1e8e6d0.png', 9, '2024-04-01 10:52:30', '2024-04-01 10:52:30'),
(12, '/uploads/media_660abc2213a9f.png', 9, '2024-04-01 10:52:34', '2024-04-01 10:52:34'),
(13, '/uploads/media_660abc25ab323.png', 9, '2024-04-01 10:52:37', '2024-04-01 10:52:37'),
(14, '/uploads/media_660abc29bdf5d.png', 9, '2024-04-01 10:52:41', '2024-04-01 10:52:41'),
(15, '/uploads/media_660abc2d64cf2.png', 9, '2024-04-01 10:52:45', '2024-04-01 10:52:45'),
(16, '/uploads/media_660abc30ca641.png', 9, '2024-04-01 10:52:48', '2024-04-01 10:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isBuy` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `product_id`, `user_id`, `rating`, `review`, `status`, `isBuy`, `created_at`, `updated_at`) VALUES
(6, 9, 2, 5, 'hello fucking world', 1, 1, '2024-05-18 14:59:21', '2024-05-18 14:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(4, 9, 'Large', '50', '2024-04-01 11:13:01', '2024-04-01 11:13:01'),
(5, 9, 'Medium', '30', '2024-04-01 11:13:12', '2024-04-01 11:13:12'),
(6, 9, 'Small', '10', '2024-04-01 11:13:24', '2024-04-01 11:13:24'),
(8, 8, 'Small', '50', NULL, NULL),
(9, 8, 'Medium', '60', NULL, NULL),
(10, 8, 'Large', '70', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 'saccc', '222', '2024-03-31 09:43:45', '2024-03-31 09:43:45'),
(2, 3, 'dqwdsX', '222', '2024-03-31 09:44:04', '2024-03-31 09:44:04'),
(3, 9, 'Coca-Cola', '10', '2024-04-01 11:13:47', '2024-04-01 11:13:47'),
(4, 9, '7up', '5', '2024-04-01 11:13:57', '2024-04-01 11:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-05-20 12:59:54', '2024-05-20 12:59:54'),
(2, 'User', 'web', NULL, '2024-05-20 18:19:35'),
(4, 'Super admin', 'web', '2024-05-20 18:36:23', '2024-05-20 18:36:23'),
(5, 'ahmed', 'web', '2024-05-20 18:49:01', '2024-05-20 18:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1);

-- --------------------------------------------------------

--
-- Table structure for table `section_titles`
--

CREATE TABLE `section_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_titles`
--

INSERT INTO `section_titles` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'why_choose_us_top_title', '3333', NULL, '2024-05-04 20:55:13'),
(2, 'why_choose_us_main_title', 'why choose us', NULL, '2024-05-04 20:55:13'),
(3, 'why_choose_us_sub_title', 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.', NULL, '2024-05-04 20:55:13'),
(5, 'dailyoffer_top_title', '22', '2024-05-04 21:09:57', '2024-05-04 21:09:57'),
(6, 'dailyoffer_main_title', '333', '2024-05-04 21:09:57', '2024-05-04 21:09:57'),
(7, 'dailyoffer_sub_title', '444', '2024-05-04 21:09:57', '2024-05-04 21:09:57'),
(8, 'chef_top_title', 'aaa', '2024-05-06 15:49:21', '2024-05-06 15:49:21'),
(9, 'chef_main_title', 'sssss', '2024-05-06 15:49:21', '2024-05-06 15:49:21'),
(10, 'chef_sub_title', 'ccccccc', '2024-05-06 15:49:21', '2024-05-06 15:49:21'),
(11, 'Testimonial_top_title', 'Testimonial top', '2024-05-06 18:01:37', '2024-05-06 18:01:37'),
(12, 'Testimonial_main_title', 'Testimonial main', '2024-05-06 18:01:37', '2024-05-06 18:01:37'),
(13, 'Testimonial_sub_title', 'Testimonial sub', '2024-05-06 18:01:37', '2024-05-06 18:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'mail_driver', 'smtp', '2024-05-08 17:31:46', '2024-05-08 17:41:53'),
(2, 'mail_host', 'sandbox.smtp.mailtrap.io', '2024-05-08 17:31:46', '2024-05-17 03:59:49'),
(3, 'mail_port', '587', '2024-05-08 17:31:46', '2024-05-08 17:41:53'),
(4, 'mail_username', 'eb1bab21045154', '2024-05-08 17:31:46', '2024-05-17 03:59:49'),
(5, 'mail_password', 'd906ae741331e2', '2024-05-08 17:31:46', '2024-05-17 03:59:49'),
(6, 'mail_encryption', 'tls', '2024-05-08 17:31:46', '2024-05-08 17:41:53'),
(7, 'mail_form_address', 'user@eeeee.com', '2024-05-08 17:31:46', '2024-05-08 17:41:53'),
(8, 'mail_receiver', 'support.user@eeeee.com', '2024-05-08 17:31:46', '2024-05-08 17:41:53'),
(9, 'site_name', 'Food App', '2024-05-08 17:34:44', '2024-05-14 03:57:26'),
(10, 'default_currency', 'USD', '2024-05-08 17:34:44', '2024-05-08 17:34:44'),
(11, 'currency_icon', '$', '2024-05-08 17:34:44', '2024-05-08 17:34:44'),
(12, 'currency_Icon_position', 'left', '2024-05-08 17:34:44', '2024-05-08 17:34:44'),
(13, 'logo', '/uploads/media_664276b807944.png', '2024-05-13 14:45:55', '2024-05-13 17:23:20'),
(14, 'footer_logo', '/uploads/media_664276b818716.png', '2024-05-13 14:45:55', '2024-05-13 17:23:20'),
(15, 'breadcrumb', '/uploads/media_664251f9394fc.jpg', '2024-05-13 14:45:55', '2024-05-13 14:46:33'),
(16, 'favicon', '/uploads/media_664251f93a9c1.jpg', '2024-05-13 14:45:55', '2024-05-13 14:46:33'),
(17, 'color', '#440D68', '2024-05-13 15:17:50', '2024-05-18 09:49:47'),
(18, 'seo_title', 'asdasd', '2024-05-14 04:35:03', '2024-05-14 04:35:03'),
(19, 'seo_description', 'sdsadsad', '2024-05-14 04:35:03', '2024-05-14 04:35:03'),
(20, 'seo_keywords', 'sdasd,sdsasef,f4ref,ertgtrg', '2024-05-14 04:35:03', '2024-05-14 04:35:03'),
(21, 'pusher_app_id', '1805416', '2024-05-20 03:59:11', '2024-05-20 03:59:11'),
(22, 'pusher_key', '787efcbc095488ebff1d', '2024-05-20 03:59:11', '2024-05-20 03:59:11'),
(23, 'pusher_secret', '58268bbdaf865d8898ec', '2024-05-20 03:59:11', '2024-05-20 03:59:11'),
(24, 'pusher_cluster', 'mt1', '2024-05-20 03:59:11', '2024-05-20 03:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `offer` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `offer`, `title`, `sub_title`, `short_description`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(6, '/uploads/media_663d2fa98e2be.jpg', NULL, 'Different spice for a Different taste', 'Fast Food & Restaurants', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima                                             et debitis ut distinctio optio qui voluptate natus.', NULL, 1, '2024-03-25 19:25:02', '2024-05-10 17:56:20'),
(7, '/uploads/media_660ab37e3f120.jpg', 'asdasd', 'zzzzzz', 'sadsa', 'fafads', 'ssdsd', 1, '2024-04-01 10:15:42', '2024-04-01 10:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `link`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FACEBOOK', 'https://facebook.com/jjj', 'fab fa-facebook-f', 1, '2024-05-10 09:52:44', '2024-05-10 09:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'zxcxzc@dfgsd', '2024-05-09 14:41:35', '2024-05-09 14:41:35'),
(2, 'adas@sdfsdfasdasd', '2024-05-09 14:42:47', '2024-05-09 14:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h3>Your agreement: Ahmed<br></h3>\r\n                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit\r\n                            aliquam\r\n                            doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro\r\n                            consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum\r\n                            quod\r\n                            ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam\r\n                            praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores\r\n                            iusto\r\n                            error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus\r\n                            quo\r\n                            quae repudiandae earum facere eum ad qui voluptatum eaque.</p>\r\n                        <h3>Main responsibilities:</h3>\r\n                        <ul><li>Solve the problem with code.</li><li>Work on Client\'s projects &amp; In-house products as well.</li><li>Analyze the product\'s needs and find out the best solutions.</li><li>Work as a team and lead the junior developer.</li><li>Collaborate with other teams by providing code review and technical direction.</li></ul>\r\n                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit\r\n                            aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit\r\n                            porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime\r\n                            nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p>\r\n                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit\r\n                            aliquam\r\n                            doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro\r\n                            consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum\r\n                            quod\r\n                            ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam\r\n                            praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores\r\n                            iusto\r\n                            error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus\r\n                            quo\r\n                            quae repudiandae earum facere eum ad qui voluptatum eaque.</p>\r\n                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit\r\n                            aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit\r\n                            porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime\r\n                            nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p>\r\n                        <ul><li>Solve the problem with code.</li><li>Work on Client\'s projects &amp; In-house products as well.</li><li>Analyze the product\'s needs and find out the best solutions.</li><li>Work as a team and lead the junior developer.</li><li>Collaborate with other teams by providing code review and technical direction.</li></ul>\r\n                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit\r\n                            aliquam\r\n                            doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit porro\r\n                            consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime nostrum\r\n                            quod\r\n                            ipsum, quibusdam, a omnis quam aperiam pariatur consectetur est perspiciatis. Laboriosam\r\n                            praesentium id asperiores cumque debitis, ex adipisci? Impedit temporibus labore dolores\r\n                            iusto\r\n                            error nobis, porro hic iure placeat, sint esse corporis, quibusdam adipisci magni non minus\r\n                            quo\r\n                            quae repudiandae earum facere eum ad qui voluptatum eaque.</p>\r\n                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, repellendus! Nesciunt fugit\r\n                            aliquam doloremque velit ullam quos ad et magnam aperiam eum vero unde cum reprehenderit\r\n                            porro consectetur voluptatum, veritatis blanditiis. Repellendus veritatis fugit maxime\r\n                            nostrum quod ipsum, quibusdam, a omnis quam aperiam pariatur</p>', '2024-05-07 10:05:43', '2024-05-07 10:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `show_at_home` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `title`, `review`, `rating`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(2, '/uploads/media_66394c5a72cf5.jpg', 'ahmed', 'ali', 'good', 4, 1, 1, '2024-05-06 18:29:12', '2024-05-06 18:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '/avatar/avatar.jpg',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `Role` enum('user','Admin','Super admin') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `email_verified_at`, `password`, `Role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '/avatar/avatar.jpg', 'admin', 'admin@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', NULL, NULL, NULL),
(2, '/avatar/avatar.jpg', 'user', 'user@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', NULL, NULL, NULL),
(5, '/avatar/avatar.jpg', 'Prevail Ejimadu', 'test@example.com', NULL, '$2y$10$1aC5bQwiaYa4yZmecNMPfO2YC/MuU07s6fVpW8A0SH9bZQmOXzmtW', 'Admin', NULL, '2024-05-20 12:59:54', '2024-05-20 12:59:54'),
(7, '/avatar/avatar.jpg', 'ahmed', 'ahmed@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', NULL, '2024-05-20 18:50:29', '2024-05-20 18:50:29'),
(8, '/avatar/avatar.jpg', 'ahmed Fouad', 'test2@example.com', NULL, '$2y$10$l1p4FSyfB/VZxcuAJSuEQONFxqjtEvwBhFoNvIOdUtCAgQUTLnnly', 'Admin', NULL, '2024-05-20 20:05:29', '2024-05-21 16:42:13'),
(9, '/avatar/avatar.jpg', 'asds', 'asd@sdfsd.rsfd', NULL, '$2y$10$gvWzuv1WwzU0cjRQGkpUpuNXwf3OXiSb9hPlbW7gm0wOOdvC.IgVK', 'user', NULL, '2024-05-21 15:22:24', '2024-05-21 15:22:24'),
(15, '/avatar/avatar.jpg', 'asd', 'asd@efsdada.jghf', NULL, '$2y$10$N8OYGnbWi6xZk8Oj/gyNye32thqBk5.I2VN.ersAcLNVSmNYAIM7S', 'user', NULL, '2024-05-21 16:25:30', '2024-05-21 16:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `icon`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'far fa-address-book', 'ssa', 'aas', 1, '2024-03-26 12:45:58', '2024-03-26 12:45:58'),
(5, 'fas fa-address-card', 'ssasss', 'aasddd', 1, '2024-03-26 12:46:41', '2024-03-26 12:46:41'),
(6, 'far fa-address-book', 'z', 'xx', 1, '2024-03-26 13:40:22', '2024-03-26 13:40:22'),
(7, 'fas fa-bullhorn', 'edited22', 'edited22', 1, '2024-03-26 13:59:04', '2024-03-26 18:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 2, 3, '2024-05-11 15:22:26', '2024-05-11 15:22:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`),
  ADD KEY `addresses_delivery_area_id_foreign` (`delivery_area_id`);

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `app_downloads`
--
ALTER TABLE `app_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_sliders`
--
ALTER TABLE `banner_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_offers`
--
ALTER TABLE `daily_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_offers_product_id_foreign` (`product_id`);

--
-- Indexes for table `delivery_areas`
--
ALTER TABLE `delivery_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_infos`
--
ALTER TABLE `footer_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_getways`
--
ALTER TABLE `payment_getways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_gallaries`
--
ALTER TABLE `product_gallaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_gallaries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ratings_product_id_foreign` (`product_id`),
  ADD KEY `product_ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `section_titles`
--
ALTER TABLE `section_titles`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `app_downloads`
--
ALTER TABLE `app_downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_sliders`
--
ALTER TABLE `banner_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily_offers`
--
ALTER TABLE `daily_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_areas`
--
ALTER TABLE `delivery_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_infos`
--
ALTER TABLE `footer_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `payment_getways`
--
ALTER TABLE `payment_getways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_gallaries`
--
ALTER TABLE `product_gallaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section_titles`
--
ALTER TABLE `section_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_delivery_area_id_foreign` FOREIGN KEY (`delivery_area_id`) REFERENCES `delivery_areas` (`id`),
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD CONSTRAINT `admin_menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daily_offers`
--
ALTER TABLE `daily_offers`
  ADD CONSTRAINT `daily_offers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_gallaries`
--
ALTER TABLE `product_gallaries`
  ADD CONSTRAINT `product_gallaries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
