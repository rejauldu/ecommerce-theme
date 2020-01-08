-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 06:53 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biponi`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pending payment', 'Order received, no payment initiated. Awaiting payment (unpaid).', '2020-01-07 07:07:25', '2020-01-07 07:07:25'),
(2, 'Failed', 'Payment failed or was declined (unpaid) or requires authentication (SCA). Note that this status may not show immediately and instead show as Pending until verified (e.g., PayPal).', '2020-01-07 07:07:25', '2020-01-07 07:07:25'),
(3, 'Processing', 'Payment received (paid) and stock has been reduced; order is awaiting fulfillment. All product orders require processing, except those that only contain products which are both Virtual and Downloadable.', '2020-01-07 07:07:26', '2020-01-07 07:07:26'),
(4, 'Completed', 'Order fulfilled and complete – requires no further action.', '2020-01-07 07:07:26', '2020-01-07 07:07:26'),
(5, 'On-Hold', 'Awaiting payment – stock is reduced, but you need to confirm payment.', '2020-01-07 07:07:26', '2020-01-07 07:07:26'),
(6, 'Cancelled', 'Cancelled by an admin or the customer – stock is increased, no further action required.', '2020-01-07 07:07:26', '2020-01-07 07:07:26'),
(7, 'Refunded', 'Refunded by an admin – no further action required.', '2020-01-07 07:07:26', '2020-01-07 07:07:26'),
(8, 'Authentication required', 'Awaiting action by the customer to authenticate transaction and/or complete SCA requirements.', '2020-01-07 07:07:26', '2020-01-07 07:07:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
