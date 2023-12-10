-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 06, 2023 at 01:22 PM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `subject` text NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `ben_fname` varchar(255) DEFAULT NULL,
  `ben_mname` varchar(255) DEFAULT NULL,
  `ben_lname` varchar(255) DEFAULT NULL,
  `ben_suffix` varchar(255) DEFAULT NULL,
  `ben_dob` date DEFAULT NULL,
  `ben_relationship` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `tel_no` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `area`, `address`, `tel_no`, `mobile_no`, `email`, `created_at`, `updated_at`) VALUES
(13, 'Tibanga-Main', '1', 'A. Bonifacio Ave.,Tibanga, Iligan City', '(063) 221-4063; 221-4064; 492-0611', NULL, NULL, '2023-11-14 08:52:50', '2023-11-14 10:42:59'),
(14, 'Bulua Branch', '1', 'Lower Zone 2, National Highway, Bulua, Cagayan de Oro City', NULL, '(063) 09171451396', NULL, '2023-11-14 10:19:43', '2023-11-14 10:38:50'),
(15, 'Carmen Branch', '1', 'Door#1 CYK Bldg. Vamenta Blvd., Carmen, Cagayan de Oro City', NULL, '(063) 9171622044', NULL, '2023-11-14 10:20:06', '2023-11-14 10:39:34'),
(16, 'Cogon Branch', '1', 'BMG Bldg. Quirino-Yacapin St., Cogon, Cagayan de Oro City', NULL, '(063) 9171584127', NULL, '2023-11-14 10:20:41', '2023-11-14 10:39:43'),
(17, 'Laguindingan Branch', '1', 'Zone 2 Poblacion, Laguindingan, Misamis Oriental', '(088) 555-0392', NULL, NULL, '2023-11-14 10:21:08', '2023-11-14 10:40:32'),
(18, 'Manticao Branch', '1', 'Prk 4., Poblacio, Manticao, Misamis Oriental', '(088) 567-7594', NULL, NULL, '2023-11-14 10:21:29', '2023-11-14 10:40:54'),
(19, 'Puerto Branch', '1', 'Lot #5-C, Corner Brgy. Road, Nat\'l Highway, Puerto, Cagayan de Oro City', '(088) 864-1330', NULL, NULL, '2023-11-14 10:21:49', '2023-11-14 10:41:58'),
(20, 'Pala-o Branch', '2', 'Gregorio T. Lluch Sr. Ave., Pala-o Iligan City', '(063) 223-2779; (063) 228-5607', NULL, NULL, '2023-11-14 10:22:32', '2023-11-14 10:41:42'),
(21, 'Buru-un Branch', '2', 'Prk. 3, Buru-un, Highway, Iligan City', '(063) 228-7200', NULL, NULL, '2023-11-14 10:22:51', '2023-11-14 10:39:08'),
(22, 'Kiwalan Branch', '2', 'Prk. 3, Kiwalan Highway, Iligan City', '(063) 225-2701', NULL, NULL, '2023-11-14 10:23:10', '2023-11-14 10:40:20'),
(23, 'Poblacion Branch', '2', 'Prk. 8,Sabayle St. Poblacion, Iligan City', '(063) 221-0262', NULL, NULL, '2023-11-14 10:23:29', '2023-11-14 10:41:49'),
(24, 'Suarez-Tominobo Branch', '2', '0310 Tominobo Highway, Iligan City', '(063) 225-9830', NULL, NULL, '2023-11-14 10:23:47', '2023-11-14 10:42:42'),
(25, 'Tubod Iligan Branch', '2', 'Lanao Builders Bldg. Macapagal Ave., Tubod, Iligan City', '(063) 225-4875; 302-0585', NULL, NULL, '2023-11-14 10:24:03', '2023-11-14 10:43:08'),
(26, 'Butuan Branch', '3', 'CJU Bldg. Langihan Road, Limaha, Butuan City', '(085) 818-7261', NULL, NULL, '2023-11-14 10:24:24', '2023-11-14 10:39:23'),
(27, 'Davao Branch', '3', 'Door 14&15 Ground Floor, Plaza De Tavera Bldg., Camus Ext., Barangay 9-A, Davao City', NULL, '(063) 9171625004', NULL, '2023-11-14 10:24:42', '2023-11-14 10:39:55'),
(28, 'General Santos Branch', '3', 'Door 4 Du Bldg. , Jose Catolico Sr. Avenue Lagao, General Santos City', '(083) 552-1354', NULL, NULL, '2023-11-14 10:24:58', '2023-11-14 10:40:06'),
(29, 'Bacolod LDN Branch', '3', 'Purok 1 Poblacion, Bacolod, Lanao del Norte', NULL, '(063) 9171609257', NULL, '2023-11-14 10:25:14', '2023-11-14 10:38:35'),
(30, 'Maranding Branch', '3', 'Venue Suite Bldg. Purok Nilo, Maranding, Lala, Lanao del Norte', '(063) 229-8420', NULL, NULL, '2023-11-14 10:25:32', '2023-11-14 10:41:03'),
(31, 'Pagadian Branch', '3', 'Prk. Bougainvilla, P.L. Urro St., San Jose District, Pagadian', '(063) 945-2856', NULL, NULL, '2023-11-14 10:25:50', '2023-11-14 10:41:11'),
(32, 'Tubod LDN Branch', '3', 'Prk. 6A, Quezon Ave., Poblacion, Tubod, Lanao del Norte', '(063) 227-6723', NULL, NULL, '2023-11-14 10:26:16', '2023-11-14 10:43:18'),
(33, 'San Francisco Branch', '3', 'National Highway Prk. 1, Barangay 4, San Francisco, Agusan del Sur', '(085) 242-2890', NULL, NULL, '2023-11-14 10:26:33', '2023-11-14 10:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_tin` varchar(255) DEFAULT NULL,
  `business_address` longtext DEFAULT NULL,
  `business_contact` varchar(255) DEFAULT NULL,
  `op_duration_year` int(11) DEFAULT NULL,
  `op_duration_month` int(11) DEFAULT NULL,
  `no_workers` int(11) DEFAULT NULL,
  `yearly_income` varchar(255) DEFAULT NULL,
  `source_income` varchar(255) DEFAULT NULL,
  `monthly_income` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `no_child` int(11) DEFAULT NULL,
  `no_child_contrib` int(11) DEFAULT NULL,
  `total_monthly_contrib` varchar(255) DEFAULT NULL,
  `no_child_work` int(11) DEFAULT NULL,
  `no_child_study` int(11) DEFAULT NULL,
  `no_child_notstudy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `emer_name` varchar(255) DEFAULT NULL,
  `emer_contact` varchar(255) DEFAULT NULL,
  `emer_address` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `employer_name` varchar(255) DEFAULT NULL,
  `service_length` varchar(255) DEFAULT NULL,
  `employer_status` varchar(255) DEFAULT NULL,
  `employer_address` longtext DEFAULT NULL,
  `employer_contact` varchar(255) DEFAULT NULL,
  `monthly_salary` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employments`
--

CREATE TABLE `employments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `emp_stat` varchar(255) DEFAULT NULL,
  `emp_type` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `emp_others` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `asset_size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `q_one` text NOT NULL,
  `q_two` text NOT NULL,
  `q_three` text NOT NULL,
  `q_four` text NOT NULL,
  `q_five` text NOT NULL,
  `q_six` text NOT NULL,
  `q_seven` text NOT NULL,
  `q_eight` text NOT NULL,
  `q_nine` text NOT NULL,
  `q_ten` text NOT NULL,
  `score` int(11) DEFAULT NULL,
  `pass_status` varchar(255) DEFAULT NULL,
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
-- Table structure for table `fathers`
--

CREATE TABLE `fathers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `father_fname` varchar(255) DEFAULT NULL,
  `father_mname` varchar(255) DEFAULT NULL,
  `father_lname` varchar(255) DEFAULT NULL,
  `father_suffix` varchar(255) DEFAULT NULL,
  `father_dob` date DEFAULT NULL,
  `father_age` int(11) DEFAULT NULL,
  `father_contact` varchar(255) DEFAULT NULL,
  `father_occu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `duration_residency` varchar(255) DEFAULT NULL,
  `living_parents` varchar(255) DEFAULT NULL,
  `house` varchar(255) DEFAULT NULL,
  `house_month` decimal(8,2) DEFAULT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `lot_month` decimal(8,2) DEFAULT NULL,
  `house_yearly_income` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_photo` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `tel_no` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `place_birth` longtext DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `ofw_family_member` varchar(255) DEFAULT NULL,
  `present_address` longtext DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `educational_attainment` varchar(255) DEFAULT NULL,
  `e_signature` varchar(255) DEFAULT NULL,
  `app_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usercode` varchar(8) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `id_photo`, `lname`, `mname`, `fname`, `suffix`, `sex`, `civil_status`, `dob`, `age`, `tel_no`, `mobile_no`, `religion`, `email`, `place_birth`, `occupation`, `ofw_family_member`, `present_address`, `latitude`, `longitude`, `tin`, `educational_attainment`, `e_signature`, `app_date`, `created_at`, `updated_at`, `usercode`, `img`) VALUES
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-18 19:41:47', '2023-11-18 19:41:47', NULL, NULL);

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_11_07_121405_create_members_table', 1),
(14, '2023_11_07_155929_create_branches_table', 1),
(15, '2023_11_07_185744_create_webinars_table', 1),
(16, '2023_11_07_192900_create_web_bookings_table', 1),
(17, '2023_11_08_020351_create_evaluations_table', 2),
(18, '2023_11_08_023125_create_staff_table', 3),
(19, '2023_11_08_034310_create_appointments_table', 4),
(20, '2023_11_08_035200_create_payments_table', 5),
(21, '2023_11_08_035750_create_applications_table', 6),
(22, '2023_11_15_004208_create_beneficiaries_table', 7),
(23, '2023_11_18_144050_create_employments_table', 8),
(24, '2023_11_18_145427_create_employers_table', 9),
(25, '2023_11_18_150242_create_businesses_table', 10),
(26, '2023_11_18_150803_create_fathers_table', 11),
(27, '2023_11_18_151627_create_mothers_table', 12),
(28, '2023_11_18_152014_create_spouses_table', 13),
(29, '2023_11_18_153105_create_children_table', 14),
(30, '2023_11_18_153711_create_emergencies_table', 15),
(31, '2023_11_18_154151_create_houses_table', 16),
(32, '2023_11_19_010625_create_members_table', 17),
(33, '2023_11_21_084848_create_sessions_table', 18),
(34, '2023_11_27_121230_add_column_to_members_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `mothers`
--

CREATE TABLE `mothers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `mother_fname` varchar(255) DEFAULT NULL,
  `mother_mname` varchar(255) DEFAULT NULL,
  `mother_lname` varchar(255) DEFAULT NULL,
  `mother_suffix` varchar(255) DEFAULT NULL,
  `mother_dob` date DEFAULT NULL,
  `mother_age` int(11) DEFAULT NULL,
  `mother_contact` varchar(255) DEFAULT NULL,
  `mother_occu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(12) NOT NULL,
  `coop_teller` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('k9W4mKHDcKfzaLCHaDAfud1oevlpByOJNO7fkG1B', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0JrcHFWSW1xazdZSDlybFBKTWlleEJ6cnZzWXJqN09NMjF4bUxkciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9QcmVtZW1iZXJzaGlwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701864861),
('ZafrOYkvR8DhRAJ0iRrsv9myYH95TR5pbdfLgOIN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVpJMjdBY2hmeEducG9iWUVPSE9lenViN3c0TlhGVmdqTzVRYUtqMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb2RlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701862242);

-- --------------------------------------------------------

--
-- Table structure for table `spouses`
--

CREATE TABLE `spouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `spouse_fname` varchar(255) DEFAULT NULL,
  `spouse_mname` varchar(255) DEFAULT NULL,
  `spouse_lname` varchar(255) DEFAULT NULL,
  `spouse_suffix` varchar(255) DEFAULT NULL,
  `spouse_dob` date DEFAULT NULL,
  `spouse_age` int(11) DEFAULT NULL,
  `spouse_contact` varchar(255) DEFAULT NULL,
  `spouse_occu` varchar(255) DEFAULT NULL,
  `spouse_emp_name` varchar(255) DEFAULT NULL,
  `spouse_emp_stat` varchar(255) DEFAULT NULL,
  `spouse_monthly_income` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_photo` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `tel_no` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `present_address` longtext DEFAULT NULL,
  `position` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `id_photo`, `lname`, `mname`, `fname`, `suffix`, `sex`, `civil_status`, `dob`, `age`, `tel_no`, `mobile_no`, `email`, `present_address`, `position`, `created_at`, `updated_at`) VALUES
(14, 'id_photo_1700326481.png', 'Santos', 'Pedro', 'Juans', 'Jr', 'Male', 'Single', '2023-11-19', 12, '(063) 221-4063; 221-4064; 492-0611', '+15165156223', 'nissi@gmail.com', 'iligan', 'Gender and Development Committee', '2023-11-18 08:54:41', '2023-11-18 08:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_photo`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'id_photo_1700357119.png', 'System Administrator', 'admin@gmail.com', NULL, '$2y$10$/RpduoEQnHEZSXwjYfgWcemKuKP7Sa.6e36irFcQnIWO8iL5A713i', 'System Administrator', 'cnMtF5iM9YBl2ME8bhuQLgYWwgXyJkmjxTFoIhX92tVTSzEB852hpvoFa9wa', '2023-11-07 12:09:17', '2023-11-18 17:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `webinars`
--

CREATE TABLE `webinars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_tool` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `resource_speaker` text DEFAULT NULL,
  `web_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webinars`
--

INSERT INTO `webinars` (`id`, `web_tool`, `date`, `start_time`, `end_time`, `resource_speaker`, `web_link`, `created_at`, `updated_at`) VALUES
(11, 'Google Meet', '2023-11-14', '16:57:00', '18:57:00', NULL, NULL, '2023-11-13 22:57:33', '2023-11-13 22:57:33'),
(12, 'Google Meet', '2023-11-27', '18:19:00', '20:19:00', NULL, NULL, '2023-11-13 23:19:52', '2023-11-13 23:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `web_bookings`
--

CREATE TABLE `web_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `web_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_member_id_foreign` (`member_id`),
  ADD KEY `applications_branch_id_foreign` (`branch_id`),
  ADD KEY `applications_approved_by_foreign` (`approved_by`),
  ADD KEY `applications_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_member_id_foreign` (`member_id`),
  ADD KEY `appointments_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiaries_member_id_foreign` (`member_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_branches_id` (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `businesses_member_id_foreign` (`member_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `children_member_id_foreign` (`member_id`);

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emergencies_member_id_foreign` (`member_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employers_member_id_foreign` (`member_id`);

--
-- Indexes for table `employments`
--
ALTER TABLE `employments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employments_member_id_foreign` (`member_id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_member_id_foreign` (`member_id`),
  ADD KEY `evaluations_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fathers`
--
ALTER TABLE `fathers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fathers_member_id_foreign` (`member_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `houses_member_id_foreign` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mothers`
--
ALTER TABLE `mothers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mothers_member_id_foreign` (`member_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_member_id_foreign` (`member_id`),
  ADD KEY `payments_branch_id_foreign` (`branch_id`),
  ADD KEY `payments_coop_teller_foreign` (`coop_teller`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `spouses`
--
ALTER TABLE `spouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spouses_member_id_foreign` (`member_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `webinars`
--
ALTER TABLE `webinars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_bookings`
--
ALTER TABLE `web_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `web_bookings_member_id_foreign` (`member_id`),
  ADD KEY `web_bookings_web_id_foreign` (`web_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employments`
--
ALTER TABLE `employments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fathers`
--
ALTER TABLE `fathers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mothers`
--
ALTER TABLE `mothers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spouses`
--
ALTER TABLE `spouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `webinars`
--
ALTER TABLE `webinars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `web_bookings`
--
ALTER TABLE `web_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD CONSTRAINT `beneficiaries_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD CONSTRAINT `emergencies_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employers_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employments`
--
ALTER TABLE `employments`
  ADD CONSTRAINT `employments_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluations_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fathers`
--
ALTER TABLE `fathers`
  ADD CONSTRAINT `fathers_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mothers`
--
ALTER TABLE `mothers`
  ADD CONSTRAINT `mothers_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_coop_teller_foreign` FOREIGN KEY (`coop_teller`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spouses`
--
ALTER TABLE `spouses`
  ADD CONSTRAINT `spouses_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `web_bookings`
--
ALTER TABLE `web_bookings`
  ADD CONSTRAINT `web_bookings_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `web_bookings_web_id_foreign` FOREIGN KEY (`web_id`) REFERENCES `webinars` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
