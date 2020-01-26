-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 10:01 PM
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
-- Database: `blog_cms`
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
(1, 'Laravel', 'Laravel'),
(2, 'VueJs', 'VueJs'),
(3, 'jQuery', 'jquery'),
(4, 'php', 'php'),
(5, 'AngularJs', 'angular-js'),
(6, 'Wordpress', 'wordpress'),
(7, 'NodeJs', 'nodejs');

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
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 3),
(5, 5, 3),
(6, 7, 3),
(7, 2, 4),
(8, 5, 5),
(9, 7, 5),
(10, 2, 6),
(11, 5, 7),
(12, 6, 8),
(13, 4, 9),
(14, 1, 10),
(15, 3, 11),
(16, 6, 12),
(17, 2, 13),
(18, 5, 14),
(19, 7, 15),
(20, 4, 16),
(21, 3, 17),
(22, 5, 18),
(23, 2, 19),
(24, 4, 20);

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'joe', 'joe@mail.net', 'good stuff!', 2, '2019-10-12 14:09:44', '2019-10-12 14:09:44', NULL),
(2, 'Ali', 'ali31991@gmail.com', 'agree yo!', 2, '2019-10-12 14:10:15', '2019-10-12 14:10:15', NULL),
(3, 'John Doe', 'jdoe@mail.net', 'nice stuff man!', 4, '2019-10-12 14:19:16', '2019-10-12 14:19:16', NULL),
(4, 'bin', 'bin@abc.net', 'whoa', 4, '2019-10-12 14:21:13', '2019-10-12 14:21:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ali', 'ali@mail.co', 'Hi,\r\nQuisque ultrices orci in neque accumsan accumsan. Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate, massa urna lobortis arcu, vitae bibendum velit lacus ut dolor.\r\n\r\nThanks', '2019-10-12 14:24:34', '2019-10-12 14:24:34'),
(2, 'jamal', 'jamal@mail.co', 'Duis in porttitor quam. Cras sollicitudin ante in lobortis laoreet. Nullam pharetra nulla massa, non tempus augue egestas eget. Vestibulum vitae finibus sapien. Vestibulum eget nibh nec augue aliquet aliquet.', '2019-10-12 14:26:27', '2019-10-12 14:26:27'),
(3, 'tim', 'tim@mail.com', 'ac dapibus sem odio sit amet mauris. Mauris dapibus tincidunt laoreet. Pellentesque venenatis elit eu eros gravida finibus. Etiam nec pharetra diam. Pellentesque sed cursus ipsum, eget semper metus. Nunc sed nulla tristique, facilisis ligula sit amet, ullamcorper turpis. Aenean viverra odio id diam sagittis faucibus.', '2019-10-12 14:26:48', '2019-10-12 14:26:48');

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
(11, '2019_10_01_002523_create_subscribers_table', 1),
(12, '2019_10_04_081230_create_site_table', 1),
(13, '2019_10_09_092437_create_social_media_table', 1);

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `image`, `body`, `created_at`, `updated_at`) VALUES
(1, 'About', 'about', 'about.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum. <a href=\"#\">Curabitur </a>dapibus massa in <strong><em>aliquam volutpat.</em></strong></p><p></p>\r\n<h4>Suspendisse et leo posuere, pulvinar augue eget, sodales nibh. <br></h4><p>Praesent mi libero, pulvinar eget magna viverra, dictum feugiat est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam vel mattis erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam sit amet varius lacus. Donec nibh sem, tempor sed mi ut, finibus rutrum orci. <br></p><ul><li>Donec ultrices, urna a maximus blandit, <br></li><li>mauris ipsum fringilla risus,</li><li> in venenatis nisi eros in justo.</li><li> Maecenas eu lacus vel lacus</li><li> laoreet hendrerit.</li></ul>', '2019-10-12 13:44:33', '2019-10-12 13:44:33'),
(2, 'Blog', 'blog', 'blog.jpg', '<p><em><strong>Lorem ipsum dolor sit amet,!</strong></em></p>\r\n<p>Duis in porttitor quam. Cras sollicitudin ante in lobortis laoreet. Nullam pharetra nulla massa, non tempus augue <del>egestas </del>eget.<strong><br></strong></p>', '2019-10-12 13:45:15', '2019-10-12 14:02:23'),
(3, 'Contact', 'contact', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo.</p>', '2019-10-12 13:50:09', '2019-10-12 13:50:09');

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
(1, 'hello world', 'hello-world', 'hello-world.jpg', '<p>Mauris ut efficitur tortor. Proin eu pretium nisl. Pellentesque facilisis sollicitudin dolor, ac varius mauris condimentum a. Vivamus tempus risus at orci molestie, vitae egestas tellus suscipit. Aenean varius condimentum nisi, ac pulvinar leo mattis non. Maecenas aliquet auctor leo, eu dapibus ligula fermentum vel.</p><p> Nulla accumsan mattis ante, quis elementum urna bibendum at. Pellentesque gravida lorem vitae auctor porta. Ut hendrerit nulla ac ultricies suscipit. Maecenas et diam magna. Cras in condimentum justo, nec laoreet neque. Proin nec auctor dolor, eu bibendum metus. Sed tempor ex in ligula tristique placerat. Fusce in rutrum risus, eu sollicitudin neque. In hac habitasse platea dictumst. Cras ligula ex, malesuada ac interdum eget, tempor in urna.</p>', 'home1', 1, '2019-10-12 13:57:45', '2019-10-12 13:57:45', NULL),
(2, 'New Version of laravel released!', 'new-version-of-laravel-released', 'new-version-of-laravel-released!.jpg', '<p>Suspendisse iaculis nunc in metus mattis consectetur. Nulla sodales, \r\nest ac lacinia ullamcorper, massa turpis scelerisque tortor, ac dapibus \r\nsem odio sit amet mauris. Mauris dapibus tincidunt laoreet. Pellentesque\r\n venenatis elit eu eros gravida finibus. Etiam nec pharetra diam. \r\nPellentesque sed cursus ipsum, eget semper metus. <br></p>\r\n<p>Nunc sed \r\nnulla tristique, facilisis ligula sit amet, ullamcorper turpis. Aenean \r\nviverra odio id diam sagittis faucibus. Duis in porttitor quam. Cras \r\nsollicitudin ante in lobortis laoreet. Nullam pharetra nulla massa, non \r\ntempus augue egestas eget. Vestibulum vitae finibus sapien. Vestibulum \r\neget nibh nec augue aliquet aliquet.</p>', 'home2', 1, '2019-10-12 13:59:07', '2019-10-12 13:59:07', NULL),
(3, 'Lorem ipsum dolor', 'lorem-ipsum-dolor', 'lorem-ipsum-dolor.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti.</p>', 'pinned', 1, '2019-10-12 14:16:00', '2019-10-12 14:16:00', NULL),
(4, 'Praesent mi libero', 'praesent-mi-libero', 'praesent-mi-libero.jpg', '<p>Praesent mi libero, pulvinar eget magna viverra, dictum feugiat est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam vel mattis erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam sit amet varius lacus. Donec nibh sem, tempor sed mi ut, finibus rutrum orci. Donec ultrices, urna a maximus blandit, mauris ipsum fringilla risus, in venenatis nisi eros in justo. Maecenas eu lacus vel lacus laoreet hendrerit.</p>', 'home3', 1, '2019-10-12 14:18:24', '2019-10-12 14:18:24', NULL),
(5, 'ac dapibus sem', 'ac-dapibus-sem', '', '<p>ac dapibus sem odio sit amet mauris. Mauris dapibus tincidunt laoreet. Pellentesque venenatis elit eu eros gravida finibus. Etiam nec pharetra diam. Pellentesque sed cursus ipsum, eget semper metus. Nunc sed nulla tristique, facilisis ligula sit amet, ullamcorper turpis. Aenean viverra odio id diam sagittis faucibus.</p>', 'pinned', 2, '2019-10-12 14:27:13', '2019-10-12 14:27:13', NULL),
(6, 'Lorem ipsum dolor sit amet', 'lorem-ipsum-dolor-sit-amet', 'lorem-ipsum-dolor-sit-amet.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum. Curabitur dapibus massa in aliquam volutpat.</p>', 'pinned', 2, '2019-10-12 14:32:13', '2019-10-12 14:32:13', NULL),
(7, 'Aliquam mollis dolor et hendrerit ultrices.', 'aliquam-mollis-dolor-et-hendrerit-ultrices', '', '<p>&nbsp;Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum. Curabitur dapibus massa in aliquam volutpat.</p>', 'pinned', 2, '2019-10-12 14:43:54', '2019-10-12 14:43:54', NULL),
(8, 'Leo posuere', 'leo-posuere', 'leo-posuere.jpg', '<p>Leo posuere, pulvinar augue eget, sodales nibh. Praesent mi libero, pulvinar eget magna viverra, dictum feugiat est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br></p>\r\n<p>Nam vel mattis erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam sit amet varius lacus. Donec nibh sem, tempor sed mi ut, finibus rutrum orci. Donec ultrices, urna a maximus blandit, mauris ipsum fringilla risus, in venenatis nisi eros in justo. Maecenas eu lacus vel lacus laoreet hendrerit. Quisque ultrices orci in neque accumsan accumsan. <br></p>\r\n<p>Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate, massa urna lobortis arcu, vitae bibendum velit lacus ut dolor.</p>', 'pinned', 2, '2019-10-12 14:45:28', '2019-10-12 14:46:27', NULL),
(9, 'Nulla sodales', 'nulla-sodales', 'nulla-sodales.jpg', '<p>Nulla sodales, est ac lacinia ullamcorper, massa turpis scelerisque tortor, ac dapibus sem odio sit amet mauris. Mauris dapibus tincidunt laoreet. Pellentesque venenatis elit eu eros gravida finibus. Etiam nec pharetra diam. Pellentesque sed cursus ipsum, eget semper metus. Nunc sed nulla tristique, facilisis ligula sit amet, ullamcorper turpis. Aenean viverra odio id diam sagittis faucibus. Duis in porttitor quam. <br></p>\r\n<p>Cras sollicitudin ante in lobortis laoreet. Nullam pharetra nulla massa, non tempus augue egestas eget. Vestibulum vitae finibus sapien. Vestibulum eget nibh nec augue aliquet aliquet.</p>', 'pinned', 1, '2019-10-12 14:48:27', '2019-10-12 14:48:27', NULL),
(10, 'Pellentesque', 'pellentesque', '', '<p>Pellentesque facilisis sollicitudin dolor, ac varius mauris condimentum a. Vivamus tempus risus at orci molestie, vitae egestas tellus suscipit. Aenean varius condimentum nisi, ac pulvinar leo mattis non. Maecenas aliquet auctor leo, eu dapibus ligula fermentum vel. Nulla accumsan mattis ante, quis elementum urna bibendum at. <br></p><p>Pellentesque gravida lorem vitae auctor porta. Ut hendrerit nulla ac ultricies suscipit. Maecenas et diam magna. Cras in condimentum justo, nec laoreet neque. Proin nec auctor dolor, eu bibendum metus. Sed tempor ex in ligula tristique placerat. Fusce in rutrum risus</p>', 'pinned', 1, '2019-10-12 14:51:27', '2019-10-12 14:51:27', NULL),
(11, 'Est ac lacinia', 'est-ac-lacinia', 'est-ac-lacinia.jpg', '<p>Est ac lacinia ullamcorper, massa turpis scelerisque tortor, ac dapibus sem odio sit amet mauris. Mauris dapibus tincidunt laoreet. Pellentesque venenatis elit eu eros gravida finibus. Etiam nec pharetra diam. Pellentesque sed cursus ipsum, eget semper metus. Nunc sed nulla tristique, facilisis ligula sit amet, ullamcorper turpis. Aenean viverra odio id diam sagittis faucibus. Duis in porttitor quam.</p>', NULL, 1, '2019-10-12 14:55:29', '2019-10-12 14:55:29', NULL),
(12, 'Proin eu pretium nisl', 'proin-eu-pretium-nisl', '', '<p>Proin eu pretium nisl. Pellentesque facilisis sollicitudin dolor, ac varius mauris condimentum a. Vivamus tempus risus at orci molestie, vitae egestas tellus suscipit. Aenean varius condimentum nisi, ac pulvinar leo mattis non. Maecenas aliquet auctor leo, eu dapibus ligula fermentum vel. Nulla accumsan mattis ante, quis elementum urna bibendum at. <br></p><p>Pellentesque gravida lorem vitae auctor porta. Ut hendrerit nulla ac ultricies suscipit. Maecenas et diam magna. Cras in condimentum justo, nec laoreet neque. Proin nec auctor dolor, eu bibendum metus. Sed tempor ex in ligula tristique placerat. Fusce in rutrum risus, eu sollicitudin neque.</p>', NULL, 1, '2019-10-12 14:56:12', '2019-10-12 14:56:12', NULL),
(13, 'Sed finibus', 'sed-finibus', '', '<p>Sed finibus purus sed lorem blandit faucibus in non nisl. Mauris in semper elit. Praesent ac quam pellentesque, volutpat lacus at, dignissim velit. Nunc eget risus sit amet ante dapibus pretium. Pellentesque rutrum augue non augue imperdiet, quis scelerisque eros lacinia. Cras vitae mauris id justo lacinia dictum. Integer luctus sapien eget urna efficitur fringilla. Curabitur dictum venenatis felis, fringilla euismod leo posuere in.</p><p> <strong>Etiam lobortis ultricies nisl in auctor. Cras eu enim bibendum, ultrices tellus sed, feugiat nisi. Cras dictum quam eu mattis elementum. Vestibulum in dignissim mauris</strong></p>', NULL, 1, '2019-10-12 14:56:46', '2019-10-12 14:56:46', NULL),
(14, 'Quam a ex', 'quam-a-ex', '', '<p>Quam a ex viverra vestibulum sed quis turpis. Quisque aliquam hendrerit tellus eget tristique. Aliquam vitae diam iaculis, ultrices quam quis, condimentum lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin maximus lacus ac vehicula semper. Quisque eget diam non turpis accumsan ornare sed in massa. Vivamus ultricies euismod risus et blandit. Morbi eros leo, consequat a facilisis in, bibendum id arcu. Nam vitae ipsum a purus fermentum fringilla. In volutpat ut lectus eu ornare. Integer sodales tortor a fringilla varius.</p>', NULL, 2, '2019-10-12 14:57:30', '2019-10-12 14:57:30', NULL),
(15, 'facilisis nunc.', 'facilisis-nunc', '', '<p>Vestibulum et feugiat nisl. Vivamus luctus, mi at pulvinar commodo, libero nunc commodo lectus, a consectetur ligula leo posuere lorem. Donec et velit non mauris tempus gravida sed nec dui. Nam viverra ligula nec blandit feugiat.</p>\r\n<p> Nam egestas tincidunt sodales. Phasellus in est enim. Sed in nisi sagittis, laoreet massa at, facilisis nunc.</p>', NULL, 2, '2019-10-12 14:58:05', '2019-10-12 14:58:05', NULL),
(16, 'new post', 'new-post', '', '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut vitae urna sit amet sem aliquet congue. In hac habitasse platea dictumst. Sed a convallis augue, eu ultrices eros. Aliquam ac sagittis justo. Duis a purus purus. In sed libero neque.</p>', NULL, 2, '2019-10-12 14:58:32', '2019-10-12 14:58:32', NULL),
(17, 'Sed pretium elit orci', 'sed-pretium-elit-orci', '', '<p>Maecenas eu gravida elit, id commodo leo. Pellentesque pretium mauris orci, in porttitor nisi finibus vitae. Quisque at mollis purus, eu consequat eros. Etiam venenatis elit nulla, hendrerit accumsan dui euismod in. Integer sed felis ligula. Donec vel arcu suscipit mauris euismod pretium. Morbi non dui libero. Maecenas id feugiat quam.</p>', NULL, 2, '2019-10-12 14:59:22', '2019-10-12 14:59:22', NULL),
(18, 'In varius metus', 'in-varius-metus', '', '<p>In varius metus non ipsum lacinia rutrum. Etiam nec volutpat ex. Proin suscipit at mi nec tincidunt. Donec suscipit felis eget ultricies dapibus. Aliquam scelerisque metus id ligula efficitur faucibus. Fusce sollicitudin luctus justo, a egestas tortor imperdiet vel. Donec id tortor at neque finibus eleifend.</p>', NULL, 2, '2019-10-12 14:59:54', '2019-10-12 14:59:54', NULL),
(19, 'Donec eget orci nis', 'donec-eget-orci-nis', '', '<p>Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl. Nunc et tellus tempor, placerat lacus at, maximus leo. Maecenas id ex at quam laoreet viverra sit amet nec enim. Aenean commodo pulvinar magna, non venenatis dui pharetra eu. Integer rhoncus, risus placerat pretium suscipit, sapien dolor bibendum nisl, porta rhoncus erat sapien at sem. Suspendisse potenti. Nullam vulputate pretium dui non dictum. Proin a leo non enim semper porttitor a eget ipsum. Curabitur dapibus massa in aliquam volutpat.</p>', NULL, 1, '2019-10-12 15:00:49', '2019-10-12 15:00:49', NULL),
(20, 'Quisque ultrices orci', 'quisque-ultrices-orci', '', '<p>urna a maximus blandit, mauris ipsum fringilla risus, in venenatis nisi eros in justo. Maecenas eu lacus vel lacus laoreet hendrerit. Quisque ultrices orci in neque accumsan accumsan. Quisque metus ante, mattis ut nisi vitae, interdum tincidunt orci. Proin sapien turpis, pharetra sed semper in, lobortis ac tellus. Nunc sem risus, consectetur sed dui sit amet, eleifend egestas lacus. Maecenas vitae faucibus</p>', NULL, 1, '2019-10-12 15:01:26', '2019-10-12 15:01:26', NULL);

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
(1, 6, 1),
(2, 7, 1),
(3, 5, 2),
(4, 1, 3),
(5, 2, 3),
(6, 3, 3),
(7, 5, 3),
(8, 4, 4),
(9, 5, 4),
(10, 6, 4),
(11, 7, 4),
(12, 1, 5),
(13, 2, 5),
(14, 7, 5),
(15, 3, 6),
(16, 4, 6),
(17, 5, 6),
(18, 7, 6),
(19, 5, 7),
(20, 6, 7),
(21, 7, 7),
(22, 2, 8),
(23, 3, 8),
(24, 4, 8),
(25, 1, 9),
(26, 2, 9),
(27, 3, 9),
(28, 4, 9),
(29, 5, 9),
(30, 6, 9),
(31, 7, 9),
(32, 2, 10),
(33, 3, 10),
(34, 4, 10),
(35, 4, 11),
(36, 5, 11),
(37, 7, 11),
(38, 5, 12),
(39, 6, 12),
(40, 3, 13),
(41, 5, 14),
(42, 7, 14),
(43, 4, 15),
(44, 5, 15),
(45, 7, 15),
(46, 3, 16),
(47, 4, 16),
(48, 3, 17),
(49, 5, 17),
(50, 1, 18),
(51, 3, 18),
(52, 5, 18),
(53, 1, 19),
(54, 2, 19),
(55, 3, 19),
(56, 1, 20),
(57, 2, 20),
(58, 4, 20),
(59, 5, 20),
(60, 7, 20);

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
(1, 'Tech Blog', 'logo.png', 'favicon.png', '9', 'This is the meta info for the website and should show up in the website meta description.', 'contact@philosophywebsite.com, info@philosophywebsite.com', '(+0) 123 456 789', 'House #325-B, Near A Block, \r\nGazali road, Afandi colony,\r\nRawalpindi.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d106378.33112349427!2d73.00500523597411!3d33.570965899980614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1569917087212!5m2!1sen!2s\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 1, 1, 1, 1, 'About section sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.<br>\r\n\r\nMaecenas vitae faucibus augue. Maecenas cursus, nibh vel eleifend vulputate, massa urna lobortis arcu, vitae bibendum velit lacus ut dolor.', 'Sit newsletter nvel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.', '© Copyright WebDevBlog 2019 | Developed by <a href=\"#\">Aamir</a>');

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
(1, 'http://facebook.com/user/data?something-etc', '#', NULL, '#', NULL, NULL, NULL, '+923475415041'),
(3, '#', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `subscriber_email`, `subscribed_at`) VALUES
(1, 'Aamir@company.com', '2019-10-12 19:21:31'),
(2, 'jin@mail.co', '2019-10-12 19:21:41'),
(3, 'jojo@newtownmail.net', '2019-10-12 19:21:57');

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
(1, 'LEARNING', 'learning'),
(2, 'APPLYING', 'applying'),
(3, 'OBSTACLES', 'obstacles'),
(4, 'Work ENVIRONMENT', 'work-environment'),
(5, 'New IDEaS', 'new-ideas'),
(6, 'cms', 'cms'),
(7, 'Team work', 'team-work');

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
(1, 'Aamir H', 'aamir-h.jpg', 'aamir.1994@mail.com', '<p>Aamir H is a backend web developer from rawalpindi. He works with <strong>Laravel, VueJs, php and jQuery.</strong></p>', NULL, '$2y$10$Ya/NBeaeDQDAVOULCFftJO7uCqj7jDtFKhNd7OyPIZDtWGksgMJLS', 'l7jHwVpJRPgdCDMVJVlljaxgmLdEe4yRGLrxnxaSlpRcORVjDZGOoTOLUyVJ', '2019-10-12 10:51:08', '2019-10-12 14:14:47', NULL),
(2, 'Joe', '', 'joe@mail.com', '<p>Joe Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mollis dolor et hendrerit ultrices. Donec eget orci nisl.<br></p>\r\n<p></p>', NULL, '$2y$10$/mrRyiU/neBPHoXm5Hlfye.TQjY/icf7QytyrWNw0VXvdBApBN5B6', NULL, '2019-10-12 14:14:34', '2019-10-12 14:25:18', NULL);

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
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_subscriber_email_unique` (`subscriber_email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories_posts`
--
ALTER TABLE `categories_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
