-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 09:35 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crypto_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `banner`, `url`, `user_id`, `approved`) VALUES
(1, 'img/banners/banner1.jpg', 'https://adscrypto.com/', 2, 1),
(5, 'img/banners/1518807256.png', 'http://kylerea.net/cryptocurrency-resources-and-faqs/', 1, 1),
(6, 'img/banners/1518812226.jpg', 'https://www.daxxcoin.com', 1, 1),
(7, 'img/banners/1518820922.jpg', 'https://elevenews.com/2018/01/19/clout-just-launched-on-coinbene-singapores-leading-cryptocurrency-exchange/', 1, 1),
(8, 'img/banners/1518990997.jpg', 'https://www.americanexpress.com/us/content/foreign-exchange/articles/cryptocurrencies-global-payment-solutions/', 1, 1),
(9, 'img/banners/1519780103.gif', 'https://www.paidverts.com/member/paid_ads.html', 1, 1),
(10, 'img/banners/1520788382.gif', 'http://spikedgiraffe.com/index.php/mining/', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(50) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Very informative! Thanks', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'komentar', 1, 4, '2018-03-07 22:42:54', '2018-03-07 21:41:24'),
(4, 'this', 3, 4, '2018-03-07 21:46:00', '2018-03-07 21:46:00'),
(9, 'comment', 3, 4, '2018-03-07 22:25:35', '2018-03-07 22:25:35'),
(20, 'PostID', 1, 5, '2018-03-07 23:44:37', '2018-03-07 23:44:37'),
(21, 'Post 4', 4, 5, '2018-03-07 23:45:17', '2018-03-07 23:45:17'),
(22, 'neki komentar', 1, 4, '2018-03-08 19:56:43', '2018-03-08 19:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `parent`) VALUES
(1, 'HOME', '/', 0),
(2, 'BLOG', 'blog', 0),
(3, 'ADVERTISE', 'advertise', 0),
(5, 'CONTACT', '/contact', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `alt`, `link`) VALUES
(1, 'post1', 'img/posts/post1.jpg'),
(2, 'post2', 'img/posts/post2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(50) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(255) NOT NULL,
  `photo_id` int(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `modified_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `user_id`, `photo_id`, `created_at`, `modified_at`) VALUES
(1, 'Watch out for Cryptocurrency Telephone Scams', 'In almost every case, no one from a cryptocurrency related product or service will call you. In a case where they would, they will never ask for your private keys, secrets, seeds, and passwords. Further, this sort of information should generally not be given out under any circumstances (not by email, not in a support ticket, etc).\r\nIn other words, if someone calls you and says they are from Ledger or Coinbase or whatever, it is a giant red flag and there is a high probability you are getting “phished” (that is, the person on the phone is trying to get personal information from you).\r\n\r\nIf you think the call is real, you can always call them back. You can go and check the official website and figure out their policy, contact their support by opening a ticket, etc (make sure to double check the URL you are using to ensure you are going to the official site).\r\n\r\nThere really isn’t a reason for customer service people from cryptocurrency related products and services to call you.\r\n\r\nIf you get a call like this, one that might be a scammer, it could be something simple. For example, you posted in a crypto group with your Facebook, and you have your number and name as public information there (or somewhere else). Or, it could be something more complex, like you filled in information on a malicious web form.\r\n\r\nIf you do get this sort of call, as a precaution smart moves include: not giving them any information, reporting their number (see //www.consumer.ftc.gov/articles/0076-phone-scams), reviewing what type of information you have publicly displayed online, considering your web history for where you could have entered your information on a malicious site, and changing passwords of websites (and making sure you have 2 factor authentication on).\r\n\r\nWith that covered, if someone is calling you trying to phish for information, it implies that there is a good chance they are lacking the information they need to cause serious headaches for you… so, give them nothing and then take some extra precautions just in case.', 1, 1, '2012-12-12 20:02:00.000000', '2018-03-15 00:10:52.229540'),
(3, 'What Does Fork Mean In Cryptocurrency?', 'Often, the price of a cryptocurrency goes wild as and when it approaches the phenomenon called ‘fork‘.\r\n\r\nSometimes these wild rides can be positive while at times it can also go the other way. Irrespective of which way it goes, you can still make money if you play smart. And if you have been in the cryosphere for a while, you must have witnessed quite a few ‘fork’ events.\r\n\r\nI have witnessed a few forks which I can name when Bitcoin’s price went on a wild ride. These forks were:\r\n\r\nBut what is so special about these ‘forks’ and why exactly are they called forks?\r\n\r\n‘Fork’ or ‘Forking’ generally means a kind of software upgrade/update which is done in such a way that it can be backward-compatible or cannot be backward-compatible.(We will talk about compatibility further in this article).\r\n\r\nIn short, ‘Fork’ is just a fancy name for a software or a protocol update.\r\n\r\nSimilarly, updating a cryptocurrency protocol or code is referred to as “Fork”. Forks create an alternate version of the blockchain, leaving two blockchains to run simultaneously on different parts of the network, depending on which type of fork is happening.\r\n\r\nIn the realm of cryptocurrencies or blockchains, these forks are majorly of two types:\r\n\r\nSoft Fork (Backward Compatible)\r\nHard Fork (Non-Backward Compatible)\r\nAlso, soft forks are known as backward compatible forks which are optional but the other type i.e. hard forks are not backward compatible and hence are mandatory to be applied.\r\n', 1, 2, '2018-03-15 00:10:52.229540', '2018-03-15 00:10:52.229540'),
(4, 'Watch out for Cryptocurrency Telephone Scams', 'In almost every case, no one from a cryptocurrency related product or service will call you. In a case where they would, they will never ask for your private keys, secrets, seeds, and passwords. Further, this sort of information should generally not be given out under any circumstances (not by email, not in a support ticket, etc).\r\nIn other words, if someone calls you and says they are from Ledger or Coinbase or whatever, it is a giant red flag and there is a high probability you are getting “phished” (that is, the person on the phone is trying to get personal information from you).\r\n\r\nIf you think the call is real, you can always call them back. You can go and check the official website and figure out their policy, contact their support by opening a ticket, etc (make sure to double check the URL you are using to ensure you are going to the official site).\r\n\r\nThere really isn’t a reason for customer service people from cryptocurrency related products and services to call you.\r\n\r\nIf you get a call like this, one that might be a scammer, it could be something simple. For example, you posted in a crypto group with your Facebook, and you have your number and name as public information there (or somewhere else). Or, it could be something more complex, like you filled in information on a malicious web form.\r\n\r\nIf you do get this sort of call, as a precaution smart moves include: not giving them any information, reporting their number (see //www.consumer.ftc.gov/articles/0076-phone-scams), reviewing what type of information you have publicly displayed online, considering your web history for where you could have entered your information on a malicious site, and changing passwords of websites (and making sure you have 2 factor authentication on).\r\n\r\nWith that covered, if someone is calling you trying to phish for information, it implies that there is a good chance they are lacking the information they need to cause serious headaches for you… so, give them nothing and then take some extra precautions just in case.', 1, 1, '2012-12-12 20:02:00.000000', '2018-03-15 00:10:52.229540');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(2, 'user', 'user@mail.com', '$2y$10$SMIHAHfH.92EpO2iufXx.eGlL4h7O8/2nzjwv..NEgHFGIvwKKxkO', 'VmjpdBE6sNrPu1PcrDEBTqfN5uAgBdjYQ8oWAzJKiTBL5vvgN1ePB9AdVIdU', '2018-02-17 15:11:47', '2018-02-17 15:11:47', 2),
(3, 'mafi', 'mafi@mail.com', '$2y$10$1mvZ2koH3MREvvCk4Dfy6.KzUu635v7DRDVZHLC4lRhylvn/RZrI.', 'PAFAaWv0zUhs6eyxNMKBIsdj3TfSXdIDwREbsLhBmnl2MwdIThmN9LmGq0lX', '2018-02-17 16:54:31', '2018-02-17 16:54:31', 2),
(4, 'lucky', 'lucky@mail.com', '$2y$10$E/9gvdgpA29OFtiWihtLQeKE0uKLn9RV/13u0IdYAM1k/Lzul4rp.', '4Xp4IZSiSnjucr3WlAAr1N21wpck7MS9bhrkYMV7kB94XOvznzwFaeJF1zc6', '2018-02-18 11:08:39', '2018-02-18 11:08:39', 2),
(5, 'test', 'test@test.com', '$2y$10$e/VPhuvX4sYQfM7EVOgMnOZJ2ZnBOdzubVK4t5VEkWgUckGuPrxZG', 'FxYhwix98j2tIFPFwTABGmLU9zQjQ21WuIiyJZf3hn697maqd35YFwRMThGZ', '2018-02-18 11:53:38', '2018-02-18 11:53:38', 2),
(6, 'korisnik', 'korisnik@gmail.com', '$2y$10$F/6JESZ0VDfCWsc6i6BR4u13ZAkKCCKBq0DKJeKR7u9avGGvgiV82', 'i9CmtsZ3wIqVj7RHQYZzl7jCzLBPGklOA6tTS4DSuj64ZNPVQrNnoB07PYXj', '2018-03-09 14:33:02', '2018-03-09 14:33:02', 2),
(7, 'admin', 'admin@admin.com', '$2y$10$bETaIxsczWxiiXie8jL3euR/e6s8S8.tinRiLHCHgbjaI9H9TfxZi', 'VIsl5ULnogH7kjrebe7HQXt5aMFx7tCEMQdrl0rL8e95fazMr5wxkGUxQ1yW', '2018-03-14 20:50:13', '2018-03-14 20:50:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
