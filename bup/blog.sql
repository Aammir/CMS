-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 11:44 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Laravel', 'laravel'),
(2, 'VueJs', 'vuejs'),
(3, 'jQuery', 'jquery'),
(4, 'Javascript', 'javascript'),
(5, 'php7', 'php7');

-- --------------------------------------------------------

--
-- Table structure for table `categories_posts`
--

CREATE TABLE `categories_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_posts`
--

INSERT INTO `categories_posts` (`id`, `category_id`, `post_id`) VALUES
(4, 2, 14),
(5, 3, 14),
(6, 1, 15),
(7, 2, 15),
(8, 3, 15),
(9, 4, 15),
(10, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `created_at`, `read_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aamir', 'joe@mail.net', 'hello!', 16, '2019-10-09 16:22:29', NULL, '2019-10-09 16:22:29', NULL),
(2, 'joe@mail.net', 'joe@mail.net', 'joe@mail.net', 16, '2019-10-09 16:22:55', NULL, '2019-10-09 16:22:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_26_115233_create_pages_table', 1),
(4, '2019_09_27_130019_create_posts_table', 1),
(5, '2019_09_27_130537_create_comments_table', 1),
(6, '2019_09_28_013254_create_categories_table', 1),
(7, '2019_09_28_013411_create_tags_table', 1),
(8, '2019_09_28_013822_create_posts_tags_table', 1),
(9, '2019_09_28_013944_create_categories_posts_table', 1),
(10, '2019_09_30_222643_create_contacts_table', 1),
(11, '2019_10_01_002523_create_newsletters_table', 1),
(12, '2019_10_04_081230_create_site_table', 1),
(13, '2019_10_09_092437_create_social_media_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `subscriber_email`, `subscribed_at`, `read_at`) VALUES
(1, 'email@gmail.com', '2019-10-09 18:29:42', NULL),
(2, 'Aamir@company.com', '2019-10-09 19:25:08', NULL),
(3, 'aamir.getranked@gmail.com', '2019-10-09 21:03:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `image`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'about', 'about', 'about.jpg', '<p>Suspendisse et leo posuere, pulvinar augue eget, sodales nibh. Praesent mi libero, pulvinar eget magna viverra, dictum feugiat est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam vel mattis erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br></p>\r\n<p><strong>Nullam sit amet varius lacus. Donec nibh sem, tempor sed mi ut, finibus rutrum orci. Donec ultrices, urna a maximus blandit, mauris ipsum fringilla risus, in venenatis nisi eros in justo. </strong><br></p>\r\n<p>Maecenas eu lacus vel lacus laoreet hendrerit. Quisque ultrices orci in neque accumsan accumsan. Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. <br></p>\r\n<p><del>Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate, massa urna lobortis arcu, vitae bibendum velit lacus ut dolor.</del></p>', '2019-10-08 17:31:21', '2019-10-09 14:18:00', NULL),
(2, 'contact', 'contact', '', '<p>Suspendisse et leo posuere, pulvinar augue eget, sodales nibh. Praesent mi libero, pulvinar eget magna viverra, dictum feugiat est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam vel mattis erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam sit amet varius lacus. Donec nibh sem, tempor sed mi ut, finibus rutrum orci. Donec ultrices, urna a maximus blandit, mauris ipsum fringilla risus, in venenatis nisi eros in justo. Maecenas eu lacus vel lacus laoreet hendrerit. Quisque ultrices orci in neque accumsan accumsan. Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate, massa urna lobortis arcu, vitae bibendum velit lacus ut dolor.</p>', '2019-10-08 17:31:30', '2019-10-08 17:31:30', NULL),
(3, 'blog', 'blog', '', '<p>Suspendisse et leo posuere, pulvinar augue eget, sodales nibh. Praesent mi libero, pulvinar eget magna viverra, dictum feugiat est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam vel mattis erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam sit amet varius lacus. Donec nibh sem, tempor sed mi ut, finibus rutrum orci. Donec ultrices, urna a maximus blandit, mauris ipsum fringilla risus, in venenatis nisi eros in justo. Maecenas eu lacus vel lacus laoreet hendrerit. Quisque ultrices orci in neque accumsan accumsan. Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate, massa urna lobortis arcu, vitae bibendum velit lacus ut dolor.</p>', '2019-10-08 17:31:38', '2019-10-08 17:31:38', NULL),
(4, 'new page', 'new-page', '', '<p>Etiam nec volutpat ex. Proin suscipit at mi nec tincidunt. Donec suscipit felis eget ultricies dapibus. Aliquam scelerisque metus id ligula efficitur faucibus. Fusce sollicitudin luctus justo, a egestas tortor imperdiet vel. Donec id tortor at neque finibus eleifend.</p>', '2019-10-09 11:07:29', '2019-10-09 11:07:53', '2019-10-09 11:07:53');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `body`, `type`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hello world', 'hello-world', 'hello-world.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum.</p>', 'home1', 1, '2019-10-08 17:02:11', '2019-10-08 17:02:11', NULL),
(2, 'Welcome to our blog', 'welcome-to-our-blog', 'welcome-to-our-blog.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum.</p>', 'home2', 1, '2019-10-08 17:02:33', '2019-10-08 17:02:33', NULL),
(3, 'Lorem ipsum dolor', 'lorem-ipsum-dolor', 'lorem-ipsum-dolor.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum.</p>', 'home3', 1, '2019-10-08 17:02:52', '2019-10-08 17:04:35', NULL),
(4, 'Suspendisse et leo posuere', 'suspendisse-et-leo-posuere', 'suspendisse-et-leo-posuere.jpg', '<p>Suspendisse et leo posuere, pulvinar augue eget, sodales nibh. Praesent mi libero, pulvinar eget magna viverra, dictum feugiat est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam vel mattis erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam sit amet varius lacus. Donec nibh sem, tempor sed mi ut, finibus rutrum orci. Donec ultrices, urna a maximus blandit, mauris ipsum fringilla risus, in venenatis nisi eros in justo. Maecenas eu lacus vel lacus laoreet hendrerit. Quisque ultrices orci in neque accumsan accumsan. Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate, massa urna lobortis arcu, vitae bibendum velit lacus ut dolor.</p>', 'pinned', 1, '2019-10-08 17:32:27', '2019-10-08 17:32:27', NULL),
(5, 'Nunc eget risus sit amet ante', 'nunc-eget-risus-sit-amet-ante', NULL, '<p>Nunc eget risus sit amet ante dapibus pretium. Pellentesque rutrum augue non augue imperdiet, quis scelerisque eros lacinia. Cras vitae mauris id justo lacinia dictum. Integer luctus sapien eget urna efficitur fringilla. Curabitur dictum venenatis felis, fringilla euismod leo posuere in. Etiam lobortis ultricies nisl in auctor. Cras eu enim bibendum, ultrices tellus sed</p>', 'pinned', 1, '2019-10-09 10:55:05', '2019-10-09 11:54:22', '2019-10-09 11:54:22'),
(6, 'Aliquam vitae diam iaculi', 'aliquam-vitae-diam-iaculi', NULL, '<p>Aliquam vitae diam iaculis, ultrices quam quis, condimentum lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin maximus lacus ac vehicula semper. Quisque eget diam non turpis accumsan ornare sed in massa. Vivamus ultricies euismod risus et blandit.</p>', 'pinned', 1, '2019-10-09 10:59:45', '2019-10-09 12:21:26', '2019-10-09 12:21:26'),
(7, 'Quisque metus ante', 'quisque-metus-ante', 'quisque-metus-ante.jpg', '<p>Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate</p>', NULL, 1, '2019-10-09 11:28:49', '2019-10-09 14:08:07', NULL),
(8, 'another post', 'another-post', NULL, '<p>Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. <br></p><p>Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate</p>', NULL, 1, '2019-10-09 12:02:29', '2019-10-09 13:48:50', NULL),
(9, 'coming soon', 'lakdsjfklaj-kadj-fkljakl', 'coming-soon.jpg', '<p>Maecenas eu gravida elit, id commodo leo. Pellentesque pretium mauris orci, in porttitor nisi finibus vitae. Quisque at mollis purus, eu consequat eros. Etiam venenatis elit nulla, hendrerit accumsan dui euismod in. Integer sed felis ligula. Donec vel arcu suscipit mauris euismod pretium. Morbi non dui libero. Maecenas id feugiat quam. Sed pretium elit orci, sed cursus dui rhoncus at.</p>\r\n<p></p>', NULL, 1, '2019-10-09 12:06:38', '2019-10-09 14:17:34', NULL),
(10, 'new post 2', 'new-post-2', NULL, '<p>Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate</p>', NULL, 1, '2019-10-09 12:08:01', '2019-10-09 12:58:57', '2019-10-09 12:58:57'),
(11, 'new post 2039480928398', 'new-post-2039480928398', NULL, '<p>Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate</p>', NULL, 1, '2019-10-09 12:13:57', '2019-10-09 12:13:57', NULL),
(12, 'Suspendisse dui orci', 'suspendisse-dui-orci', NULL, '<p>Suspendisse dui orci, iaculis id orci id, aliquam ultricies ante. Sed finibus purus sed lorem blandit faucibus in non nisl. Mauris in semper elit. Praesent ac quam pellentesque, volutpat lacus at, dignissim velit. Nunc eget risus sit amet ante dapibus pretium. Pellentesque rutrum augue non augue imperdiet, quis scelerisque eros lacinia. Cras vitae mauris id justo lacinia dictum.</p>', NULL, 1, '2019-10-09 12:34:11', '2019-10-09 12:34:11', NULL),
(13, 'Suspen disse dui orci', 'suspen-disse-dui-orci', NULL, '<p>Suspendisse dui orci&nbsp;Suspendisse dui orciSuspendisse dui orciSuspendisse dui orciSuspendisse dui orciSuspendisse dui orciSuspendisse dui orciSuspendisse dui orciSuspendisse dui orci</p>', NULL, 1, '2019-10-09 12:38:32', '2019-10-09 12:52:41', '2019-10-09 12:52:41'),
(14, 'Aenean varius condimentum nisi', 'aenean-varius-condimentum-nisi', 'aenean-varius-condimentum-nisi.jpg', '<p>Aenean varius condimentum nisi, ac pulvinar leo mattis non. Maecenas aliquet auctor leo, eu dapibus ligula fermentum vel. <br></p><p>Nulla accumsan mattis ante, quis elementum urna bibendum at. Pellentesque gravida lorem vitae auctor porta. Ut hendrerit nulla ac ultricies suscipit. Maecenas et diam magna. <br></p><p>Cras in condimentum justo, nec laoreet neque. Proin nec auctor dolor, eu bibendum metus. Sed tempor ex in ligula tristique placerat. Fusce in rutrum risus, eu sollicitudin neque. In hac habitasse platea dictumst. Cras ligula ex, malesuada ac interdum eget, tempor in urna.</p>', 'pinned', 1, '2019-10-09 12:46:24', '2019-10-09 12:46:24', NULL),
(15, 'new post', 'new-post', 'new-post.jpg', '<p>this is another new post testing. thanks GOD I kept a backup!<br></p>\r\n<p></p>', 'pinned', 1, '2019-10-09 14:08:46', '2019-10-09 14:09:04', NULL),
(16, 'Success!', 'success', 'success!.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum. Curabitur dapibus massa in aliquam volutpat.</p>\r\n<p>Suspendisse et leo posuere, pulvinar augue eget, sodales nibh. Praesent mi libero, pulvinar eget magna viverra, dictum feugiat est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam vel mattis erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam sit amet varius lacus. Donec nibh sem, tempor sed mi ut, finibus rutrum orci. Donec ultrices, urna a maximus blandit, mauris ipsum fringilla risus, in venenatis nisi eros in justo. Maecenas eu lacus vel lacus laoreet hendrerit. Quisque ultrices orci in neque accumsan accumsan. Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate, massa urna lobortis arcu, vitae bibendum velit lacus ut dolor.</p>\r\n<p>Suspendisse iaculis nunc in metus mattis consectetur. Nulla sodales, est ac lacinia ullamcorper, massa turpis scelerisque tortor, ac dapibus sem odio sit amet mauris. Mauris dapibus tincidunt laoreet. Pellentesque venenatis elit eu eros gravida finibus. Etiam nec pharetra diam. Pellentesque sed cursus ipsum, eget semper metus. Nunc sed nulla tristique, facilisis ligula sit amet, ullamcorper turpis. Aenean viverra odio id diam sagittis faucibus. Duis in porttitor quam. Cras sollicitudin ante in lobortis laoreet. Nullam pharetra nulla massa, non tempus augue egestas eget. Vestibulum vitae finibus sapien. Vestibulum eget nibh nec augue aliquet aliquet.</p>\r\n<p>Mauris ut efficitur tortor. Proin eu pretium nisl. Pellentesque facilisis sollicitudin dolor, ac varius mauris condimentum a. Vivamus tempus risus at orci molestie, vitae egestas tellus suscipit. Aenean varius condimentum nisi, ac pulvinar leo mattis non. Maecenas aliquet auctor leo, eu dapibus ligula fermentum vel. Nulla accumsan mattis ante, quis elementum urna bibendum at. Pellentesque gravida lorem vitae auctor porta. Ut hendrerit nulla ac ultricies suscipit. Maecenas et diam magna. Cras in condimentum justo, nec laoreet neque. Proin nec auctor dolor, eu bibendum metus. Sed tempor ex in ligula tristique placerat. Fusce in rutrum risus, eu sollicitudin neque. In hac habitasse platea dictumst. Cras ligula ex, malesuada ac interdum eget, tempor in urna.</p>\r\n<p>Suspendisse dui orci, iaculis id orci id, aliquam ultricies ante. Sed finibus purus sed lorem blandit faucibus in non nisl. Mauris in semper elit. Praesent ac quam pellentesque, volutpat lacus at, dignissim velit. Nunc eget risus sit amet ante dapibus pretium. Pellentesque rutrum augue non augue imperdiet, quis scelerisque eros lacinia. Cras vitae mauris id justo lacinia dictum. Integer luctus sapien eget urna efficitur fringilla. Curabitur dictum venenatis felis, fringilla euismod leo posuere in. Etiam lobortis ultricies nisl in auctor. Cras eu enim bibendum, ultrices tellus sed, feugiat nisi. Cras dictum quam eu mattis elementum. Vestibulum in dignissim mauris, quis suscipit ipsum. Proin ac nisl est. Aliquam eget leo non sapien lobortis fringilla. Nam id viverra dui.</p>\r\n<p>Praesent dolor erat, rhoncus ac condimentum sed, imperdiet et tortor. Sed ut lacus arcu. Nullam in rhoncus massa, ut luctus eros. Nulla ut quam a ex viverra vestibulum sed quis turpis. Quisque aliquam hendrerit tellus eget tristique. Aliquam vitae diam iaculis, ultrices quam quis, condimentum lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin maximus lacus ac vehicula semper. Quisque eget diam non turpis accumsan ornare sed in massa. Vivamus ultricies euismod risus et blandit. Morbi eros leo, consequat a facilisis in, bibendum id arcu. Nam vitae ipsum a purus fermentum fringilla. In volutpat ut lectus eu ornare. Integer sodales tortor a fringilla varius.</p>\r\n<p>Vestibulum et feugiat nisl. Vivamus luctus, mi at pulvinar commodo, libero nunc commodo lectus, a consectetur ligula leo posuere lorem. Donec et velit non mauris tempus gravida sed nec dui. Nam viverra ligula nec blandit feugiat. Nam egestas tincidunt sodales. Phasellus in est enim. Sed in nisi sagittis, laoreet massa at, facilisis nunc.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut vitae urna sit amet sem aliquet congue. In hac habitasse platea dictumst. Sed a convallis augue, eu ultrices eros. Aliquam ac sagittis justo. Duis a purus purus. In sed libero neque.</p>\r\n<p>Maecenas eu gravida elit, id commodo leo. Pellentesque pretium mauris orci, in porttitor nisi finibus vitae. Quisque at mollis purus, eu consequat eros. Etiam venenatis elit nulla, hendrerit accumsan dui euismod in. Integer sed felis ligula. Donec vel arcu suscipit mauris euismod pretium. Morbi non dui libero. Maecenas id feugiat quam. Sed pretium elit orci, sed cursus dui rhoncus at.</p>\r\n<p>In varius metus non ipsum lacinia rutrum. Etiam nec volutpat ex. Proin suscipit at mi nec tincidunt. Donec suscipit felis eget ultricies dapibus. Aliquam scelerisque metus id ligula efficitur faucibus. Fusce sollicitudin luctus justo, a egestas tortor imperdiet vel. Donec id tortor at neque finibus eleifend.</p>', 'pinned', 1, '2019-10-09 14:36:10', '2019-10-09 14:36:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `tag_id`, `post_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 3),
(4, 2, 3),
(5, 3, 3),
(6, 1, 2),
(7, 2, 2),
(8, 2, 14),
(9, 1, 15),
(10, 2, 15),
(11, 3, 15),
(12, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posts_per_page` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_info` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `show_pinned_post_section` tinyint(1) DEFAULT '0',
  `show_tags` tinyint(1) DEFAULT '0',
  `show_main_footer` tinyint(1) DEFAULT '0',
  `show_footer_bottom` tinyint(1) DEFAULT '0',
  `about_section_text` text COLLATE utf8mb4_unicode_ci,
  `newsletter_section_text` text COLLATE utf8mb4_unicode_ci,
  `footer_bottom` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `site_name`, `logo`, `favicon`, `posts_per_page`, `site_meta_info`, `email`, `phone`, `address`, `map`, `show_pinned_post_section`, `show_tags`, `show_main_footer`, `show_footer_bottom`, `about_section_text`, `newsletter_section_text`, `footer_bottom`) VALUES
(1, 'Tech Blog', 'logo.jpg', 'favicon.jpg', '12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum. Curabitur dapibus massa in aliquam volutpat.', 'aamir.2k18@gmail.com', '+923475415041', 'Lorem ipsum dolor sit amet, \r\nconsectetur adipiscing elit. \r\nAliquam mollis dolor et hendrerit ultrices.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d106353.40049686178!2d73.03133251261163!3d33.591244796204826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1570656736639!5m2!1sen!2s\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 1, 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices.', 'All rights reserved 2019'),
(2, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(3, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(4, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(5, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(6, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(7, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(8, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(9, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(10, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(11, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(12, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(13, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(14, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(15, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(16, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(17, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(18, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(19, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(20, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(21, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(22, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(23, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(24, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(25, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(26, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(27, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(28, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(29, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(30, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(31, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(32, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(33, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(34, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(35, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(36, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(37, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(38, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(39, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(40, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(41, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(42, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(43, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(44, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(45, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(46, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(47, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(48, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(49, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(50, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(51, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(52, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(53, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(54, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(55, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(56, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(57, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(58, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(59, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(60, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(61, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(62, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(63, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(64, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(65, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(66, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(67, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(68, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(69, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(70, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(71, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(72, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(73, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(74, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(75, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(76, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(77, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(78, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(79, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(80, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(81, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(82, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(83, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(84, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(85, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(86, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(87, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(88, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(89, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(90, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(91, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(92, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(93, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(94, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(95, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(96, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(97, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(98, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(99, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL),
(100, 'WebDevBlog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gplus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `facebook`, `twitter`, `gplus`, `linkedin`, `instagram`, `pinterest`, `youtube`, `whatsapp`) VALUES
(1, 'http://facebook.com/user/data?something-etc', '#tw', '#gpac', '#', '#', '#', '#', '+923475415041');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`) VALUES
(1, 'Learning', 'learning'),
(2, 'Applying', 'applying'),
(3, 'Obstacles', 'obstacles'),
(4, 'Focusing', 'focusing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `info`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aamir H', '', 'aamir.2k18@gmail.com', '<p>Aamir Hussain is a web developer, lives in rawalpindi and loves to work with Laravel and is keen to learn Ajax and VueJs for 2019-20.</p>', NULL, '2k18pass', NULL, '2019-10-08 17:00:06', '2019-10-09 16:10:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_posts_category_id_index` (`category_id`),
  ADD KEY `categories_posts_post_id_index` (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_subscriber_email_unique` (`subscriber_email`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_index` (`user_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_tags_tag_id_index` (`tag_id`),
  ADD KEY `posts_tags_post_id_index` (`post_id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories_posts`
--
ALTER TABLE `categories_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD CONSTRAINT `categories_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `categories_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `posts_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `posts_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
