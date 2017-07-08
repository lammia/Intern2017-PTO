-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 07:16 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adid`, `email`, `password`, `fullname`, `remember_token`, `created_at`, `updated_at`) VALUES
('A001', 'ndat04080@gmail.com', '$2y$10$SbWqyjvi68nZhPpSKZN0oetT85OHyN8WKaqkDe/FWamkQXslDLh3i', 'Dat', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `mgid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dayleft` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`mgid`, `teamid`, `email`, `password`, `fullname`, `dayleft`, `remember_token`, `created_at`, `updated_at`) VALUES
('M001', 'T001', 'Lauren@gmail.com', '$2y$10$kC.eMt/mZU9pSEkZ2.yj1.N9PPeGCtdvCFkDzFBMYuj27/..A6Xz2', 'Lauren', '15', NULL, NULL, NULL),
('M002', 'T002', 'Top@gmail.com', '$2y$10$96J1/GRmTv6xow7H8LYLS.2PS22MZ8fa0IO1v6VZWUe8K6vlywOVC', 'Long', '9', NULL, NULL, NULL),
('M003', 'T003', 'Kun@gmail.com', '$2y$10$SpLREobBjXD.3YbFyAyE6enCv8iJW.5IaP3ldYpbwB.h2ZT9eHG4m', 'Dat', '6', NULL, NULL, NULL),
('M004', 'T004', 'Ken@gmail.com', '$2y$10$GAJ4NrdkGAAopOHzuNbUjuegvJUi9XqjOIdBYsojeALVBu834P3lu', 'Kien', '9', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_06_21_100347_create_team_table', 1),
(7, '2014_10_12_000000_create_users_table', 2),
(11, '2017_06_18_210500_create_admins_table', 3),
(12, '2017_06_18_233826_create_managers_table', 3),
(14, '2017_06_20_171111_create_pto_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pto_request`
--

CREATE TABLE `pto_request` (
  `rqid` int(10) UNSIGNED NOT NULL,
  `id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mgid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofrequest` date NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approvalofmanager` int(11) NOT NULL,
  `reasonforrejected` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approvalofadmin` int(11) NOT NULL,
  `status` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pto_request`
--

INSERT INTO `pto_request` (`rqid`, `id`, `mgid`, `dateofrequest`, `datestart`, `dateend`, `reason`, `approvalofmanager`, `reasonforrejected`, `approvalofadmin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'E001', NULL, '2017-02-20', '2017-02-25', '2017-02-27', 'marridge', 1, '', 1, -1, NULL, NULL),
(2, 'E002', NULL, '2017-03-20', '2017-03-22', '2017-03-24', 'sick', 1, '', 1, 1, NULL, NULL),
(3, 'E004', NULL, '2017-05-20', '2017-05-25', '2017-05-26', 'take care of child', 1, 'CCC', 2, 2, NULL, NULL),
(4, 'E005', NULL, '2017-01-21', '2017-01-25', '2017-01-27', 'go with my friend', 1, NULL, 0, 0, NULL, NULL),
(5, 'E001', NULL, '2017-06-22', '2017-06-30', '2017-07-01', 'Dau', 1, '', 1, -1, NULL, NULL),
(6, 'E002', NULL, '2017-06-23', '2017-06-26', '2017-06-28', 'Clean Home', 1, '', 1, 0, NULL, NULL),
(7, NULL, 'M001', '2017-06-23', '2017-06-29', '2017-07-01', 'Go to a vacation.', 1, '', 2, 0, NULL, NULL),
(8, NULL, 'M001', '2017-06-23', '2017-06-25', '2017-06-28', 'Clean office', 1, '', 1, 0, NULL, NULL),
(9, NULL, 'M001', '2017-06-23', '2017-06-29', '2017-06-30', 'Go wedding of old girlfriend', 1, 'I think you mustn''t go', 2, 0, NULL, NULL),
(10, 'E005', NULL, '2017-06-23', '2017-06-30', '2017-06-30', 'Go to DaLat', 2, '', 0, 0, NULL, NULL),
(11, 'E006', NULL, '2017-06-24', '2017-06-27', '2017-06-29', 'Sick', 0, '', 0, 0, NULL, NULL),
(12, NULL, 'M001', '2017-06-24', '2017-06-27', '2017-06-29', 'Go to Da Nang City', 1, '', 1, 0, NULL, NULL),
(13, 'E003', NULL, '2017-06-24', '2017-06-28', '2017-07-01', 'Go my village', 1, '', 1, 0, NULL, NULL),
(14, 'E001', NULL, '2017-07-03', '2017-07-04', '2017-07-06', 'Stomachache', 1, 'CC', 2, -1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamid`, `teamname`, `created_at`, `updated_at`) VALUES
('T001', 'Drift', NULL, NULL),
('T002', 'LacTroi', NULL, NULL),
('T003', 'ConGa', NULL, NULL),
('T004', 'ConVit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dayleft` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `teamid`, `email`, `password`, `fullname`, `dayleft`, `remember_token`, `created_at`, `updated_at`) VALUES
('E001', 'T001', 'ndat905@gmail.com', '$2y$10$8IBLfU0wWchU91jZRmBdpuJZR2imnAo1cN9enQUGHmB2ohOt.fFsS', 'kun', '6', 'Bgpnv7SCrRXqmQbwTK1i3bFBfozJBHIyiy5z1fxKmExmNmJ5uanUMAKVtt1c', NULL, NULL),
('E002', 'T001', 'hanley905@gmail.com', '$2y$10$aEgscb3Lf8fUrXffCu6vI.0w026KES1XkqL9KfThXscjHIq2fGsVS', 'hien', '9', NULL, NULL, NULL),
('E003', 'T001', 'ken905@gmail.com', '$2y$10$KAn...UoxZx3ypl0GLxuKupYSHsNR50bUo/aVLhmt4fiTcMNdbpmC', 'kien', '6', NULL, NULL, NULL),
('E004', 'T002', 'team21@gmail.com', '$2y$10$GN3cY3cCVJftH0vfatehxuQh0HSfBai0Hlmi.5vQ89JD3auLdC0HC', 'hoa', '5', NULL, NULL, NULL),
('E005', 'T002', 'team22@gmail.com', '$2y$10$C4vlj8XTzF2Fbaz/tlP36u3E5lFIdqgiivVvdMf3Njmj18PMUYBPC', 'hanh', '12', NULL, NULL, NULL),
('E006', 'T002', 'team23@gmail.com', '$2y$10$W2gvZLYmsQn6OgVEttl6vOJblT/bUUjIdAZmStTC4LAxaRVsBV3Pi', 'nhu', '9', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adid`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`mgid`),
  ADD UNIQUE KEY `managers_email_unique` (`email`),
  ADD KEY `managers_teamid_foreign` (`teamid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pto_request`
--
ALTER TABLE `pto_request`
  ADD PRIMARY KEY (`rqid`),
  ADD KEY `pto_request_id_foreign` (`id`),
  ADD KEY `pto_request_mgid_foreign` (`mgid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_teamid_foreign` (`teamid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pto_request`
--
ALTER TABLE `pto_request`
  MODIFY `rqid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_teamid_foreign` FOREIGN KEY (`teamid`) REFERENCES `team` (`teamid`);

--
-- Constraints for table `pto_request`
--
ALTER TABLE `pto_request`
  ADD CONSTRAINT `pto_request_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pto_request_mgid_foreign` FOREIGN KEY (`mgid`) REFERENCES `managers` (`mgid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_teamid_foreign` FOREIGN KEY (`teamid`) REFERENCES `team` (`teamid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
