-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2022 at 12:00 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webparkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `transportations`
--

CREATE TABLE `transportations` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(4) NOT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transportations`
--

INSERT INTO `transportations` (`id`, `code`, `user_id`, `zone`, `type`, `created_at`, `updated_at`) VALUES
(12, 'CODE752', 1, '', 'Motor', '2021-06-26 21:43:44', '2022-04-07 09:18:57'),
(13, 'CODE294', 1, '', 'Mobil', '2021-06-26 22:41:09', '2021-06-27 04:39:02'),
(14, 'CODE503', 1, '', 'Motor', '2021-06-27 04:36:28', '2021-06-27 04:39:36'),
(15, 'CODE854', 1, '', 'Motor', '2022-04-07 09:44:51', '2022-04-07 09:46:21'),
(16, 'CODE410', 1, '', 'Motor', '2022-04-07 09:49:42', '2022-04-07 09:53:32'),
(17, 'CODE119', 2, '', 'Mobil', '2022-04-07 09:58:00', '2022-04-08 11:58:20'),
(18, '899', 2, '', 'Polines', '2022-04-07 12:45:43', NULL),
(19, '319', 2, 'Banyumanik', 'Mobil', '2022-04-07 12:55:22', '2022-04-07 13:45:06'),
(20, 'Polines395', 2, 'Polines', 'Mobil', '2022-04-07 12:58:33', NULL),
(21, 'JavaMall…\Z#ß[mv0{±', 2, 'JavaMall', 'Motor', '2022-04-07 13:02:08', NULL),
(22, 'ParagonMall42a93ad82d49f7c20a3b', 2, 'ParagonMall', 'Motor', '2022-04-07 13:03:51', NULL),
(23, 'JavaMallcdfe4252cd89a79a', 2, 'JavaMall', 'Mobil', '2022-04-07 13:06:44', '2022-04-07 13:14:47'),
(24, 'Banyumanik-9', 2, 'Banyumanik', 'Motor', '2022-04-07 13:11:42', '2022-04-07 13:26:58'),
(57, 'Polines52dbc2b9376aeaa3', 1, 'Polines', 'Mobil', '2022-04-09 08:09:03', NULL),
(58, 'Polinesbd1caa2203f7741f', 1, 'Polines', 'Mobil', '2022-04-09 08:09:03', NULL),
(59, 'Polinesc3c7adf746abcc19', 1, 'Polines', 'Motor', '2022-04-09 09:21:31', NULL),
(60, 'Banyumanikc9c49a9a22971750', 1, 'Banyumanik', 'Motor', '2022-04-09 09:24:54', NULL),
(61, 'Banyumanikebde2b303628dc6e', 1, 'Banyumanik', 'Motor', '2022-04-09 09:26:57', NULL),
(62, 'Polines11e30b3ea600f22c', 3, 'Polines', 'Motor', '2022-04-09 10:11:26', '2022-04-13 09:04:57'),
(63, 'Banyumanik96ae611d25f77232', 3, 'Banyumanik', 'Motor', '2022-04-09 10:13:01', NULL),
(64, 'Banyumanikcd795e5954bb9d19', 3, 'Banyumanik', 'Motor', '2022-04-09 10:15:57', NULL),
(65, 'Banyumanik6303f7eba80c529b', 3, 'Banyumanik', 'Mobil', '2022-04-09 10:26:43', NULL),
(66, 'Polines79d7d49a4cbfc352', 3, 'Polines', 'Motor', '2022-04-09 13:38:56', NULL),
(67, 'Banyumanik0bfb98fa71a235b2', 3, 'Banyumanik', 'Motor', '2022-04-09 14:01:35', NULL),
(68, 'Banyumanik4890f216a06dee48', 3, 'Banyumanik', 'Motor', '2022-04-09 14:03:55', '2022-04-13 08:52:49'),
(70, 'Banyumanike6ab884447d8cc7e', 3, 'Banyumanik', 'Motor', '2022-04-09 18:10:06', '2022-04-17 10:34:43'),
(71, 'Banyumanik2a19c5ed8c2d9054', 3, 'Banyumanik', 'Motor', '2022-04-09 18:49:33', NULL),
(72, 'Banyumanik68637c45603173ac', 3, 'Banyumanik', 'Motor', '2022-04-09 18:50:40', NULL),
(73, 'Banyumanikff4c8e4e4c5be7db', 3, 'Banyumanik', 'Motor', '2022-04-09 19:04:40', NULL),
(74, 'Banyumanik2788c65f701172df', 3, 'Banyumanik', 'Motor', '2022-04-09 19:07:24', NULL),
(75, 'Banyumanik08bc698c3801dd31', 3, 'Banyumanik', 'Motor', '2022-04-10 05:11:56', NULL),
(76, 'Polines5bfcc9aac7cc0eb0', 1, 'Polines', 'Motor', '2022-04-10 05:53:47', NULL),
(77, 'Polines66685128be2d13fc', 2, 'Polines', 'Motor', '2022-04-10 07:49:00', NULL),
(78, 'Banyumanikd8182a5d6c8df4c4', 2, 'Banyumanik', 'Motor', '2022-04-10 07:51:22', NULL),
(79, 'Banyumanik38322fe7171d493c', 2, 'Banyumanik', 'Motor', '2022-04-10 07:52:37', NULL),
(80, 'Banyumanik10188c38559adbfa', 2, 'Banyumanik', 'Motor', '2022-04-10 07:53:03', NULL),
(81, 'Polines91effdb396af83bb', 1, 'Polines', 'Motor', '2022-04-10 07:57:52', NULL),
(82, 'Polinesd26c4fd310707cde', 2, 'Polines', 'Mobil', '2022-04-10 08:24:34', NULL),
(83, 'Polines61cf872bf100ee66', 2, 'Polines', 'Mobil', '2022-04-10 13:56:40', NULL),
(84, 'Banyumanik2fe7444442ba62d8', 4, 'Banyumanik', 'Motor', '2022-04-13 06:07:21', '2022-04-13 06:08:03'),
(85, 'Banyumanik5431373f717c2257', 4, 'Banyumanik', 'Mobil', '2022-04-13 06:58:47', '2022-04-13 06:59:18'),
(86, 'Banyumanik4ea406f6523e900a', 5, 'Banyumanik', 'Motor', '2022-04-16 08:28:58', NULL),
(87, 'Polinesb29b64c25fea341c', 2, 'Polines', 'Mobil', '2022-04-16 08:35:26', NULL),
(88, 'JavaMalla3135aa3aa116dba', 2, 'JavaMall', 'Motor', '2022-04-16 09:30:03', '2022-04-16 09:47:11'),
(89, 'Polines358e20e9ef6bd628', 2, 'Polines', 'Motor', '2022-04-16 10:11:48', NULL),
(90, 'Polinesc8d0942662fa021c', 2, 'Polines', 'Mobil', '2022-04-16 10:17:33', '2022-04-16 11:46:47'),
(91, 'Banyumanikdd0d2330af6cc13e', 2, 'Banyumanik', 'Motor', '2022-04-16 11:49:06', '2022-04-16 11:49:54'),
(92, 'Polinesce8c6ec2f3283f68', 2, 'Polines', 'Motor', '2022-04-16 17:53:45', '2022-04-16 17:56:08'),
(93, 'Banyumanikb8993f4d9ec9393e', 2, 'Banyumanik', 'Motor', '2022-04-17 08:28:57', '2022-04-20 07:14:48'),
(94, 'JavaMallbeaddf90c7bb4ec6', 5, 'JavaMall', 'Motor', '2022-04-20 07:04:25', NULL),
(95, 'JavaMall3e906c3c45f4d24a', 5, 'JavaMall', 'Motor', '2022-04-20 07:11:02', NULL),
(96, 'ParagonMalla882494d826f93c7', 2, 'ParagonMall', 'Motor', '2022-04-23 08:26:25', '2022-04-23 08:26:59'),
(97, 'BANYUMANIK-2baadbd011f49ff3', 1, 'Banyumanik', 'Motor', '2022-04-26 08:45:11', NULL),
(98, 'BANYUMANIK-e7d2ce3e8a2d0fca', 2, 'Polines', 'Mobil', '2022-04-26 15:11:24', NULL),
(99, 'BANYUMANIK-acbb3ec4c61ebdf1', 2, 'Banyumanik', 'Motor', '2022-04-27 18:32:11', NULL),
(100, 'BANYUMANIK-f2c227c3db22b8f5', 2, 'Polines', 'Mobil', '2022-04-27 18:32:46', NULL),
(101, 'BANYUMANIK-8d474ba9de3f6ec4', 3, 'Banyumanik', 'Motor', '2022-04-27 18:54:13', '2022-04-27 19:05:30'),
(102, 'BANYUMANIK-85a2eba13dac5a64', 2, 'Banyumanik', 'Mobil', '2022-04-28 23:00:23', '2022-04-28 23:01:04'),
(103, 'BANYUMANIK-a112542632dd9547', 2, 'Banyumanik', 'Motor', '2022-04-28 23:12:50', '2022-04-28 23:13:34'),
(104, 'BANYUMANIK-608ff085d4ffaafe', 2, 'JavaMall', 'Motor', '2022-04-29 16:59:19', '2022-04-29 17:00:45'),
(105, 'BANYUMANIK-756c3549e193eb42', 2, 'Banyumanik', 'Motor', '2022-04-29 18:15:30', NULL),
(106, 'BANYUMANIK-933a295dd3d13136', 2, 'Banyumanik', 'Mobil', '2022-04-29 19:20:44', '2022-04-29 19:22:38'),
(107, 'BANYUMANIK-07e83801625d281b', 2, 'Banyumanik', 'Mobil', '2022-04-30 08:04:31', '2022-04-30 08:05:43'),
(108, 'BANYUMANIK-9fa74544e01c752a', 8, 'Banyumanik', 'Motor', '2022-05-01 18:11:24', '2022-05-01 18:12:34'),
(109, 'BANYUMANIK-f391f4c3d2aea9d1', 2, 'Banyumanik', 'Motor', '2022-05-08 07:04:30', '2022-05-08 07:05:30'),
(110, 'BANYUMANIK-16f8a0f9bfcd5d74', 3, 'Banyumanik', 'Mobil', '2022-05-08 07:55:27', '2022-05-08 08:43:23'),
(111, 'BANYUMANIK-484bc1d1d4955bce', 2, 'Banyumanik', 'Motor', '2022-05-25 07:50:54', '2022-05-25 07:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `umur`, `created_at`) VALUES
(1, 'operator', 'aku123', '', '', '2022-04-07 09:14:02'),
(2, 'aku', 'aku123', '', '', '2022-04-07 09:02:54'),
(3, 'halo', 'halo123', '', '', '2022-04-09 09:33:31'),
(4, '43118012', 'fff', 'f', '30', '2022-04-11 07:46:33'),
(5, 'melinda', 'melinda123.', 'melinda.mrt@gmail.com', '22', '2022-04-20 07:03:40'),
(8, 'anjir', 'anjir', 'mld@coy', '20', '2022-05-01 18:10:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transportations`
--
ALTER TABLE `transportations`
  ADD CONSTRAINT `transportations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
