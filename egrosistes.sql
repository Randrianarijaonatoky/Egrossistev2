-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2024 at 09:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egrosistes`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageCategorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categorie`, `imageCategorie`, `created_at`, `updated_at`) VALUES
(1, 'Boisson', '1725484490.jpeg', '2024-09-04 18:14:50', '2024-09-04 18:14:50'),
(2, 'Bonbon', '1725484509.jpg', '2024-09-04 18:15:10', '2024-09-04 18:15:10'),
(3, 'PPN', '1725484523.jfif', '2024-09-04 18:15:23', '2024-09-04 18:15:23'),
(4, 'Biscuits', '1725484576.jfif', '2024-09-04 18:16:16', '2024-09-04 18:16:16'),
(5, 'Produit laitié', '1725484601.png', '2024-09-04 18:16:41', '2024-09-04 18:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint UNSIGNED NOT NULL,
  `conversation_id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `id_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_produits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_livraison` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frais_de_livraison` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heurre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_a_paye` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut_paiement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `user_id`, `id_produit`, `nom`, `prenom`, `contact`, `nom_produits`, `quantite`, `prix`, `image`, `date_de_livraison`, `lieu`, `localisation`, `frais_de_livraison`, `heurre`, `statut`, `montant_a_paye`, `statut_paiement`, `created_at`, `updated_at`) VALUES
(5, 6, '9', 'John', 'Jesse', '0324571285', 'Double crème', '7', '2000 Ar', '1725484839.jpg', '2024-09-07', 'Andavamamba', 'en dehors du ville ', '3000', '08:00:00', 'en a tente', '36000', 'Payer', '2024-09-05 06:34:02', '2024-09-05 06:34:02'),
(6, 6, '16', 'John', 'Jesse', '0324571285', 'Ronono mandry', '4', '3500 Ar', '1725485990.jpg', '2024-09-07', 'Andavamamba', 'en dehors du ville ', '3000', '08:00:00', 'en a tente', '36000', 'Payer', '2024-09-05 06:36:24', '2024-09-05 06:36:24'),
(7, 6, '13', 'John', 'Jesse', '0324571285', 'Huille Coeur d\'or', '1', '5000 Ar', '1725485714.jpg', '2024-09-07', 'Andavamamba', 'en dehors du ville ', '3000', '08:00:00', 'en a tente', '36000', 'Payer', '2024-09-05 06:36:24', '2024-09-05 06:36:24'),
(9, 6, '14', 'John', 'Jesse', '0324571285', 'Gouty coockies', '1', '3200 Ar', '1725485808.jfif', '2024-09-07', 'Analakely', 'en dehors du ville ', '3000', '09:13:00', 'en a tente', '13700', 'Payer', '2024-09-05 21:02:02', '2024-09-05 21:02:02'),
(10, 6, '13', 'John', 'Jesse', '0324571285', 'Huille Coeur d\'or', '1', '5000 Ar', '1725485714.jpg', '2024-09-07', 'Analakely', 'en dehors du ville ', '3000', '09:13:00', 'en a tente', '13700', 'Payer', '2024-09-05 21:02:02', '2024-09-05 21:02:02'),
(11, 6, '12', 'John', 'Jesse', '0324571285', 'Gouty Madelines', '1', '2500 Ar', '1725485463.jpg', '2024-09-07', 'Analakely', 'en dehors du ville ', '3000', '09:13:00', 'en a tente', '13700', 'Payer', '2024-09-05 21:02:02', '2024-09-05 21:02:02'),
(12, 6, '11', 'John', 'Jesse', '0324571285', 'Booster', '3', '200000 Ar', '1725485399.jpg', '2024-09-08', 'Analakely', 'en dehors du ville ', '3000', '11:13:00', 'en a tente', '573000', 'Payer', '2024-09-05 22:32:51', '2024-09-05 22:32:51'),
(17, 6, '13', 'Randrianarijaona', 'Hery Fanomezantsoa Toky Fandresena', '0322546505', 'Huille Coeur d\'or', '1', '5000 Ar', '1725485714.jpg', '2024-09-20', 'Lot MB 81ter Mahabo', 'en dehors du ville ', '5000', '08:00:00', 'en a tente', '13500', 'Payer', '2024-09-26 04:41:36', '2024-09-26 04:41:36'),
(18, 6, '16', 'Randrianarijaona', 'Hery Fanomezantsoa Toky Fandresena', '0322546505', 'Ronono mandry', '1', '3500 Ar', '1725485990.jpg', '2024-09-20', 'Lot MB 81ter Mahabo', 'en dehors du ville ', '5000', '08:00:00', 'en a tente', '13500', 'Payer', '2024-09-26 04:41:37', '2024-09-26 04:41:37'),
(19, 8, '16', 'Randrianarijaona', 'Hery', '0325648902', 'Ronono mandry', '1', '3500 Ar', '1725485990.jpg', '2024-10-04', 'Analakely', 'en dehors du ville ', '3000', '13:14:00', 'en a tente', '11500', 'au moment du livriason', '2024-10-02 14:21:34', '2024-10-02 14:21:34'),
(20, 8, '17', 'Randrianarijaona', 'Hery', '0325648902', 'Salto POP', '1', '3000 Ar', '1725486067.jpg', '2024-10-04', 'Analakely', 'en dehors du ville ', '3000', '13:14:00', 'en a tente', '11500', 'au moment du livriason', '2024-10-02 14:21:35', '2024-10-02 14:21:35'),
(21, 8, '13', 'Randrianarijaona', 'Hery', '0325648902', 'Huille Coeur d\'or', '1', '5000 Ar', '1725485714.jpg', '2024-10-04', 'Analakely', 'en dehors du ville ', '3000', '13:14:00', 'en a tente', '11500', 'au moment du livriason', '2024-10-02 14:21:35', '2024-10-02 14:21:35'),
(24, 8, '16', 'John', 'Jesse', '0345678920', 'Ronono mandry', '1', '3500 Ar', '1725485990.jpg', '2024-10-11', 'Andavamamba', 'en dehors du ville ', '3000', '09:13:00', 'en a tente', '6500', 'Payer', '2024-10-03 04:53:31', '2024-10-03 04:53:31'),
(25, 6, '14', 'John', 'Jesse', '0345678920', 'Gouty coockies', '1', '3200 Ar', '1725485808.jfif', '2024-10-12', 'Andavamamba', 'en dehors du ville ', '5000', '09:13:00', 'en a tente', '13700', 'Payer', '2024-10-03 07:51:26', '2024-10-03 07:51:26'),
(27, 6, '9', 'John', 'Jesse', '0345678920', 'Double crème', '1', '2000 Ar', '1725484839.jpg', '2024-10-12', 'Andavamamba', 'en dehors du ville ', '5000', '09:13:00', 'en a tente', '13700', 'Payer', '2024-10-03 07:51:27', '2024-10-03 07:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reduction` decimal(5,2) NOT NULL,
  `utilise` tinyint(1) NOT NULL DEFAULT '0',
  `date_expiration` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `code`, `reduction`, `utilise`, `date_expiration`, `created_at`, `updated_at`) VALUES
(1, 6, '2JV1whEKH4', '5.00', 0, '2024-09-06', '2024-09-05 06:36:25', '2024-09-05 06:36:25'),
(2, 6, 'EyloXvgA7G', '5.00', 1, '2024-09-07', '2024-09-05 21:02:02', '2024-09-05 22:32:48'),
(3, 6, '51nn3L7DvN', '5.00', 0, '2024-09-07', '2024-09-05 22:32:51', '2024-09-05 22:32:51'),
(5, 6, 'd1QWONsrfB', '5.00', 1, '2024-09-27', '2024-09-26 04:41:37', '2024-09-26 04:49:20'),
(8, 8, 'rNjXRogCKG', '5.00', 0, '2024-10-04', '2024-10-03 04:53:31', '2024-10-03 04:53:31'),
(9, 6, '0VYClpf7Kl', '5.00', 0, '2024-10-04', '2024-10-03 07:51:27', '2024-10-03 07:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produits`
--

CREATE TABLE `detail_produits` (
  `id` bigint UNSIGNED NOT NULL,
  `id_produit` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `composant` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_produits`
--

INSERT INTO `detail_produits` (`id`, `id_produit`, `description`, `composant`, `date_creation`, `created_at`, `updated_at`) VALUES
(1, 9, 'Vokatra Socolait', 'Lait,sucre', '2024-08-31', '2024-09-04 18:20:39', '2024-09-04 18:20:39'),
(2, 10, 'Esse, accusamus. Corporis asperiores officia consequuntur velit perferendis molestias, tempore accusamus quod inventore quibusdam. Suscipit illum pariatur, dolorem doloremque corrupti nostrum.\r\nQuisquam veniam laudantium saepe libero iusto beatae nihil ipsum architecto! Odio dignissimos labore reprehenderit, cumque veritatis architecto exercitationem ducimus tempore, perferendis nulla maiores, accusamus rerum enim esse iste sunt commodi.\r\nVoluptate, molestias provident velit repellat eos fugiat odit perspiciatis sed corrupti ipsum ullam autem dolores, itaque quidem nihil doloremque voluptas commodi nobis excepturi illum incidunt laudantium. Nulla ex fugit quisquam.\r\nIllum cum minus, aspernatur eius perferendis f', 'Loharano Antsirabe', '2018-01-05', '2024-09-04 18:23:50', '2024-09-04 18:23:50'),
(4, 12, 'Vokariny orana JB', 'Farine , oeufs ,sucre', '2024-04-12', '2024-09-04 18:31:03', '2024-09-04 18:31:03'),
(5, 13, 'Aut nobis placeat quos. Numquam laudantium sapiente temporibus quis explicabo impedit sequi laborum, sit odio excepturi eaque exercitationem consectetur ea aspernatur asperiores ullam et quisquam facilis a culpa similique commodi!\r\nNisi earum distinctio labore consectetur officiis error perspiciatis nostrum optio? Placeat corporis libero neque, fuga molestias vitae et soluta error adipisci atque! Sapiente ipsam sint maiores iste quod culpa eligendi!\r\nVoluptatem rerum, sint, dignissimos molestias temporibus asperiores unde, id maiores eum inventore non architecto. Assumenda perspiciatis, dolore temporibus accusantium sint molestiae, obcaecati reiciendis porro natus cum nulla ad, doloribus et.', 'Tournesol avec du Söja', '2024-04-19', '2024-09-04 18:35:14', '2024-09-04 18:35:14'),
(6, 14, 'Dolores repellat culpa minus eos tempore odit ipsum, explicabo vitae modi aperiam recusandae veritatis necessitatibus, quam quae quo! Expedita rem quod in dolore tenetur asperiores odit dolor aliquid esse consectetur.\r\nAnimi, temporibus rem adipisci obcaecati voluptate labore tempora eligendi ipsam libero molestiae, delectus aut culpa. Debitis, autem! Illo sapiente ipsam assumenda aliquam deleniti vitae rem explicabo tempora,', 'Farine , oeufs ,sucre', '2024-01-26', '2024-09-04 18:36:48', '2024-09-04 18:36:48'),
(7, 15, 'Vokatra JB vita Malagasy', 'sucre', '2024-06-08', '2024-09-04 18:38:23', '2024-09-04 18:38:23'),
(8, 16, 'Vokarina ao Antsirabe', 'Lait,sucre', '1995-01-21', '2024-09-04 18:39:50', '2024-09-04 18:39:50'),
(9, 17, 'Excepturi, veniam? Voluptatum illo ullam nulla dolores odit suscipit praesentium nisi commodi voluptate ex facilis architecto doloremque minus vero velit magni totam beatae ad amet dolorem saepe, delectus, facere eveniet!\r\nCupiditate possimus ea aspernatur aliquid recusandae iure dolorem cum laboriosam, expedita natus consectetur sit ipsa amet illo deleniti in dignissimos! Illo, obc', 'Fromage', '2024-08-02', '2024-09-04 18:41:07', '2024-09-04 18:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heure_livraisons`
--

CREATE TABLE `heure_livraisons` (
  `id` bigint UNSIGNED NOT NULL,
  `heurre` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heure_livraisons`
--

INSERT INTO `heure_livraisons` (`id`, `heurre`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '2024-09-05 04:13:39', '2024-09-05 04:13:39'),
(2, '09:13:00', '2024-09-05 04:13:48', '2024-09-05 04:13:48'),
(3, '11:13:00', '2024-09-05 04:13:56', '2024-09-05 04:13:56'),
(4, '13:14:00', '2024-09-05 04:14:04', '2024-09-05 04:14:04'),
(5, '14:14:00', '2024-09-05 04:14:10', '2024-09-05 04:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `image_produits`
--

CREATE TABLE `image_produits` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(5, '2024_08_04_110558_create_produits_table', 2),
(6, '2024_08_04_110915_create_categories_table', 2),
(7, '2024_08_04_145853_create_produits_table', 3),
(8, '2024_08_10_162424_create_promotions_table', 4),
(9, '2024_08_11_122254_create_promotions_table', 5),
(11, '2024_08_13_061847_create_promotions_table', 7),
(17, '2024_08_26_175431_create_paiements_table', 10),
(25, '2024_09_03_075152_create_image_produits_table', 18),
(26, '2024_09_03_220353_create_notifs_table', 19),
(29, '2014_10_12_100000_create_password_reset_tokens_table', 20),
(30, '2019_08_19_000000_create_failed_jobs_table', 20),
(31, '2019_12_14_000001_create_personal_access_tokens_table', 20),
(32, '2024_08_11_145943_create_produits_table', 20),
(33, '2024_08_13_062155_create_promotions_table', 20),
(34, '2024_08_13_095453_create_categories_table', 20),
(35, '2024_08_26_123337_create_tests_table', 20),
(36, '2024_08_26_180002_create_paiements_table', 20),
(37, '2024_08_29_054256_create_commandes_table', 20),
(38, '2024_08_29_194902_create_heure_livraisons_table', 20),
(39, '2024_08_30_204555_create_coupons_table', 20),
(40, '2024_09_02_172223_create_notifications_table', 20),
(41, '2024_09_02_205351_create_conversations_table', 20),
(42, '2024_09_02_205749_create_chats_table', 20),
(43, '2024_09_04_074607_create_notifs_table', 20),
(44, '2024_09_04_210720_create_detail_produits_table', 21),
(45, '2024_09_16_114537_ajout_plus_table_user', 22);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('12f334c8-31cd-4575-8486-b91f4ab10226', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 6, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":\"10700\",\"invoiceNumber\":591678,\"date\":\"2024-09-06T00:02:02.271183Z\"}}', NULL, '2024-09-05 21:02:02', '2024-09-05 21:02:02'),
('2dbf42eb-3941-454c-8e33-beac9d50afec', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 6, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":\"33000\",\"invoiceNumber\":839241,\"date\":\"2024-09-05T09:36:25.055896Z\"}}', NULL, '2024-09-05 06:36:25', '2024-09-05 06:36:25'),
('5b9fd545-3a75-4004-8643-99113766b624', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 7, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":6650,\"invoiceNumber\":224416,\"date\":\"2024-10-02T18:14:10.560217Z\"}}', NULL, '2024-10-02 15:14:10', '2024-10-02 15:14:10'),
('62693cf3-cb4c-49ce-86d6-4b7701d17299', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 6, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":\"8700\",\"invoiceNumber\":70201,\"date\":\"2024-10-03T10:51:27.259867Z\"}}', NULL, '2024-10-03 07:51:27', '2024-10-03 07:51:27'),
('770f9df9-1bc2-4721-8f5d-e8e30d89c9af', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 6, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":\"8500\",\"invoiceNumber\":524962,\"date\":\"2024-09-26T07:41:37.301152Z\"}}', NULL, '2024-09-26 04:41:38', '2024-09-26 04:41:38'),
('9bb7333a-29cc-44fc-a9ea-7e9bf75b19a5', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 8, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":\"3500\",\"invoiceNumber\":449950,\"date\":\"2024-10-03T07:53:32.022469Z\"}}', NULL, '2024-10-03 04:53:32', '2024-10-03 04:53:32'),
('a0733f48-704f-4ee5-a8f7-5a95b574b625', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 7, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":\"8000\",\"invoiceNumber\":324146,\"date\":\"2024-09-17T07:52:23.383412Z\"}}', NULL, '2024-09-17 04:52:23', '2024-09-17 04:52:23'),
('b645e964-64a1-4a27-967b-fc7e94ea0a97', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 7, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":\"7000\",\"invoiceNumber\":429791,\"date\":\"2024-10-02T18:14:02.943866Z\"}}', NULL, '2024-10-02 15:14:03', '2024-10-02 15:14:03'),
('f27d0a03-658f-443f-9058-940455b38832', 'App\\Notifications\\AchatEffectueNotification', 'App\\Models\\User', 6, '{\"message\":\"Votre achat est effectu\\u00e9 avec succ\\u00e8s\",\"details\":{\"amount\":570000,\"invoiceNumber\":815070,\"date\":\"2024-09-06T01:32:51.586802Z\"}}', NULL, '2024-09-05 22:32:51', '2024-09-05 22:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `notifs`
--

CREATE TABLE `notifs` (
  `id` bigint UNSIGNED NOT NULL,
  `id_receve` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifs`
--

INSERT INTO `notifs` (`id`, `id_receve`, `user_id`, `type`, `data`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":1,\"id_produit\":\"15\",\"nom_produit\":\"Jok S\\u00f6da\",\"quantite\":\"3\",\"prix\":\"1300 Ar\",\"image\":\"1725485903.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-05 06:19:04', '2024-09-05 18:37:28'),
(2, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":1,\"id_produit\":\"15\",\"nom_produit\":\"Jok S\\u00f6da\",\"quantite\":\"3\",\"prix\":\"1300 Ar\",\"image\":\"1725485903.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-05 18:38:56', '2024-09-05 18:39:37'),
(3, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":2,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"1\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-05 18:38:58', '2024-09-05 18:40:10'),
(4, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":1,\"id_produit\":\"15\",\"nom_produit\":\"Jok S\\u00f6da\",\"quantite\":\"3\",\"prix\":\"1300 Ar\",\"image\":\"1725485903.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-05 18:41:49', '2024-09-05 18:42:06'),
(5, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":2,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"1\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-05 18:41:50', '2024-09-05 20:32:27'),
(6, 6, 3, 'Votre demmande d\'annulation commande à été valider par administrateur', '{\"id_commande\":1,\"id_produit\":\"15\",\"nom_produit\":\"Jok S\\u00f6da\",\"quantite\":\"3\",\"prix\":\"1300 Ar\",\"image\":\"1725485903.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-05 18:42:06', '2024-09-05 18:42:06'),
(7, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":3,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"4\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-05 20:16:41', '2024-09-05 20:16:41'),
(8, 6, 3, 'Votre demmande d\'annulation commande à été valider par administrateur', '{\"id_commande\":2,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"1\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-05 20:32:27', '2024-09-05 20:32:27'),
(9, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":8,\"id_produit\":\"9\",\"nom_produit\":\"Double cr\\u00e8me\",\"quantite\":\"7\",\"prix\":\"2000 Ar\",\"image\":\"1725484839.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-05 21:55:28', '2024-09-05 22:01:14'),
(10, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":9,\"id_produit\":\"14\",\"nom_produit\":\"Gouty coockies\",\"quantite\":\"1\",\"prix\":\"3200 Ar\",\"image\":\"1725485808.jfif\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Analakely\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-05 21:57:56', '2024-09-05 21:57:56'),
(11, 6, 3, 'Votre demmande d\'annulation commande à été valider par administrateur', '{\"id_commande\":8,\"id_produit\":\"9\",\"nom_produit\":\"Double cr\\u00e8me\",\"quantite\":\"7\",\"prix\":\"2000 Ar\",\"image\":\"1725484839.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-05 22:01:14', '2024-09-05 22:01:14'),
(12, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":3,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"4\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-05 22:18:08', '2024-09-05 22:18:08'),
(13, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":3,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"4\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-06 06:51:13', '2024-09-06 06:51:49'),
(14, 6, 3, 'Votre demmande d\'annulation commande à été valider par administrateur', '{\"id_commande\":3,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"4\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-06\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-06 06:51:49', '2024-09-06 06:51:49'),
(15, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":4,\"id_produit\":\"13\",\"nom_produit\":\"Huille Coeur d\'or\",\"quantite\":\"1\",\"prix\":\"5000 Ar\",\"image\":\"1725485714.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-06 08:34:24', '2024-09-06 08:34:24'),
(16, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":5,\"id_produit\":\"9\",\"nom_produit\":\"Double cr\\u00e8me\",\"quantite\":\"7\",\"prix\":\"2000 Ar\",\"image\":\"1725484839.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-06 08:34:27', '2024-09-06 08:35:36'),
(17, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":6,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"4\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-09-06 08:34:30', '2024-09-06 08:35:32'),
(18, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":9,\"id_produit\":\"14\",\"nom_produit\":\"Gouty coockies\",\"quantite\":\"1\",\"prix\":\"3200 Ar\",\"image\":\"1725485808.jfif\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Analakely\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-09-11 18:55:09', '2024-09-11 18:55:09'),
(20, 7, 3, 'Votre demmande d\'annulation commande à été valider par administrateur', '{\"id_commande\":13,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"1\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-18\",\"statut\":\"en a tente\",\"lieu\":\"Analakely\",\"heure\":null,\"nom\":\"Walker\",\"prenom\":\"Jack\",\"contact\":\"0348975630\"}', 0, '2024-09-17 05:02:21', '2024-09-17 05:02:21'),
(21, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":17,\"id_produit\":\"13\",\"nom_produit\":\"Huille Coeur d\'or\",\"quantite\":\"1\",\"prix\":\"5000 Ar\",\"image\":\"1725485714.jpg\",\"date_de_livraison\":\"2024-09-20\",\"statut\":\"en a tente\",\"lieu\":\"Lot MB 81ter Mahabo\",\"heure\":null,\"nom\":\"Randrianarijaona\",\"prenom\":\"Hery Fanomezantsoa Toky Fandresena\",\"contact\":\"0322546505\"}', 0, '2024-09-26 04:44:24', '2024-09-26 04:44:24'),
(22, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":18,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"1\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-20\",\"statut\":\"en a tente\",\"lieu\":\"Lot MB 81ter Mahabo\",\"heure\":null,\"nom\":\"Randrianarijaona\",\"prenom\":\"Hery Fanomezantsoa Toky Fandresena\",\"contact\":\"0322546505\"}', 0, '2024-09-26 04:44:34', '2024-09-26 04:44:34'),
(23, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":18,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"1\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-09-20\",\"statut\":\"en a tente\",\"lieu\":\"Lot MB 81ter Mahabo\",\"heure\":null,\"nom\":\"Randrianarijaona\",\"prenom\":\"Hery Fanomezantsoa Toky Fandresena\",\"contact\":\"0322546505\"}', 1, '2024-09-26 04:44:45', '2024-09-26 05:00:20'),
(24, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":4,\"id_produit\":\"13\",\"nom_produit\":\"Huille Coeur d\'or\",\"quantite\":\"1\",\"prix\":\"5000 Ar\",\"image\":\"1725485714.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 1, '2024-10-01 08:40:01', '2024-10-01 08:41:05'),
(25, 6, 3, 'Votre demmande d\'annulation commande à été valider par administrateur', '{\"id_commande\":4,\"id_produit\":\"13\",\"nom_produit\":\"Huille Coeur d\'or\",\"quantite\":\"1\",\"prix\":\"5000 Ar\",\"image\":\"1725485714.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-10-01 08:41:05', '2024-10-01 08:41:05'),
(26, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":11,\"id_produit\":\"12\",\"nom_produit\":\"Gouty Madelines\",\"quantite\":\"1\",\"prix\":\"2500 Ar\",\"image\":\"1725485463.jpg\",\"date_de_livraison\":\"2024-09-07\",\"statut\":\"en a tente\",\"lieu\":\"Analakely\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0324571285\"}', 0, '2024-10-02 12:22:30', '2024-10-02 12:22:30'),
(27, 3, 6, 'Demmande d\'annulation commande', '{\"id_commande\":26,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"1\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-10-12\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0345678920\"}', 1, '2024-10-03 07:52:38', '2024-10-03 07:53:40'),
(28, 6, 3, 'Votre demmande d\'annulation commande à été valider par administrateur', '{\"id_commande\":26,\"id_produit\":\"16\",\"nom_produit\":\"Ronono mandry\",\"quantite\":\"1\",\"prix\":\"3500 Ar\",\"image\":\"1725485990.jpg\",\"date_de_livraison\":\"2024-10-12\",\"statut\":\"en a tente\",\"lieu\":\"Andavamamba\",\"heure\":null,\"nom\":\"John\",\"prenom\":\"Jesse\",\"contact\":\"0345678920\"}', 0, '2024-10-03 07:53:40', '2024-10-03 07:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `id_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_facture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `stripe_charge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paiements`
--

INSERT INTO `paiements` (`id`, `user_id`, `id_produit`, `nom`, `quantite`, `prix`, `image`, `numero_facture`, `amount`, `stripe_charge_id`, `created_at`, `updated_at`) VALUES
(1, 6, '[\"16\",\"13\",\"9\"]', '[\"Ronono mandry\",\"Huille Coeur d\'or\",\"Double cr\\u00e8me\"]', '[\"4\",\"1\",\"7\"]', '[\"3500 Ar\",\"5000 Ar\",\"2000 Ar\"]', '[\"1725485990.jpg\",\"1725485714.jpg\",\"1725484839.jpg\"]', '839241', '33000.00', 'ch_3Pvc71RxV6dbiGjl1xYMXskM', '2024-09-05 06:36:24', '2024-09-05 06:36:24'),
(2, 6, '[\"14\",\"13\",\"12\"]', '[\"Gouty coockies\",\"Huille Coeur d\'or\",\"Gouty Madelines\"]', '[\"1\",\"1\",\"1\"]', '[\"3200 Ar\",\"5000 Ar\",\"2500 Ar\"]', '[\"1725485808.jfif\",\"1725485714.jpg\",\"1725485463.jpg\"]', '591678', '10700.00', 'ch_3PvpcjRxV6dbiGjl07nYPhKa', '2024-09-05 21:02:02', '2024-09-05 21:02:02'),
(3, 6, '[\"11\"]', '[\"Booster\"]', '[\"3\"]', '[\"200000 Ar\"]', '[\"1725485399.jpg\"]', '815070', '570000.00', 'ch_3Pvr2cRxV6dbiGjl0YYqiQjo', '2024-09-05 22:32:51', '2024-09-05 22:32:51'),
(5, 6, '[\"13\",\"16\"]', '[\"Huille Coeur d\'or\",\"Ronono mandry\"]', '[\"1\",\"1\"]', '[\"5000 Ar\",\"3500 Ar\"]', '[\"1725485714.jpg\",\"1725485990.jpg\"]', '524962', '8500.00', 'ch_3Q3CKQRxV6dbiGjl066wxvfh', '2024-09-26 04:41:37', '2024-09-26 04:41:37'),
(8, 8, '[\"16\"]', '[\"Ronono mandry\"]', '[\"1\"]', '[\"3500 Ar\"]', '[\"1725485990.jpg\"]', '449950', '3500.00', 'ch_3Q5jqlRxV6dbiGjl0r9WFSX6', '2024-10-03 04:53:31', '2024-10-03 04:53:31'),
(9, 6, '[\"14\",\"16\",\"9\"]', '[\"Gouty coockies\",\"Ronono mandry\",\"Double cr\\u00e8me\"]', '[\"1\",\"1\",\"1\"]', '[\"3200 Ar\",\"3500 Ar\",\"2000 Ar\"]', '[\"1725485808.jfif\",\"1725485990.jpg\",\"1725484839.jpg\"]', '70201', '8700.00', 'ch_3Q5mcwRxV6dbiGjl0h5GZr3H', '2024-10-03 07:51:27', '2024-10-03 07:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixPromotion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `categorie`, `quantite`, `prix`, `prixPromotion`, `image`, `created_at`, `updated_at`) VALUES
(9, 'Double crème', 'Produit laitié', '111', '2500 Ar', '2000 Ar', '1725484839.jpg', '2024-09-04 18:20:39', '2024-09-04 18:43:30'),
(10, 'Eau Vive', 'Boisson', '265', '300000Ar', '250000 Ar', '1725485030.jpg', '2024-09-04 18:23:50', '2024-09-17 04:44:58'),
(12, 'Gouty Madelines', 'Biscuits', '245', '2500 Ar', '2500 Ar', '1725485463.jpg', '2024-09-04 18:31:03', '2024-09-04 18:31:03'),
(13, 'Huille Coeur d\'or', 'PPN', '65', '5000 Ar', '5000 Ar', '1725485714.jpg', '2024-09-04 18:35:14', '2024-10-03 04:50:42'),
(14, 'Gouty coockies', 'Biscuits', '23', '3500 Ar', '3200 Ar', '1725485808.jfif', '2024-09-04 18:36:48', '2024-09-04 18:43:07'),
(15, 'Jok Söda', 'Bonbon', '55', '1300 Ar', '1300 Ar', '1725485903.jpg', '2024-09-04 18:38:23', '2024-09-04 18:38:23'),
(16, 'Ronono mandry', 'Produit laitié', '111', '4000 Ar', '3500 Ar', '1725485990.jpg', '2024-09-04 18:39:50', '2024-09-17 04:45:30'),
(17, 'Salto POP', 'Biscuits', '35', '6000 Ar', '3000 Ar', '1725486067.jpg', '2024-09-04 18:41:07', '2024-10-03 07:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oldPrix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newPrix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `nom`, `oldPrix`, `newPrix`, `id_produit`, `image`, `date_fin`, `created_at`, `updated_at`) VALUES
(2, 'Gouty coockies', '3500 Ar', '3200 Ar', '14', '1725485808.jfif', '2024-09-11', '2024-09-04 18:43:07', '2024-09-04 18:43:07'),
(3, 'Double crème', '2500 Ar', '2000 Ar', '9', '1725484839.jpg', '2024-09-18', '2024-09-04 18:43:30', '2024-09-04 18:43:30'),
(5, 'Eau Vive', '300000Ar', '250000 Ar', '10', '1725485030.jpg', '2024-11-28', '2024-09-17 04:44:58', '2024-09-17 04:44:58'),
(6, 'Ronono mandry', '4000 Ar', '3500 Ar', '16', '1725485990.jpg', '2024-11-28', '2024-09-17 04:45:30', '2024-09-17 04:45:30'),
(8, 'Salto POP', '6000 Ar', '3000 Ar', '17', '1725486067.jpg', '2024-10-12', '2024-10-03 07:54:45', '2024-10-03 07:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_cname` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(50) NOT NULL,
  `cust_country` int NOT NULL,
  `cust_address` text NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_state` varchar(100) NOT NULL,
  `cust_zip` varchar(30) NOT NULL,
  `cust_b_name` varchar(100) NOT NULL,
  `cust_b_cname` varchar(100) NOT NULL,
  `cust_b_phone` varchar(50) NOT NULL,
  `cust_b_country` int NOT NULL,
  `cust_b_address` text NOT NULL,
  `cust_b_city` varchar(100) NOT NULL,
  `cust_b_state` varchar(100) NOT NULL,
  `cust_b_zip` varchar(30) NOT NULL,
  `cust_s_name` varchar(100) NOT NULL,
  `cust_s_cname` varchar(100) NOT NULL,
  `cust_s_phone` varchar(50) NOT NULL,
  `cust_s_country` int NOT NULL,
  `cust_s_address` text NOT NULL,
  `cust_s_city` varchar(100) NOT NULL,
  `cust_s_state` varchar(100) NOT NULL,
  `cust_s_zip` varchar(30) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_token` varchar(255) NOT NULL,
  `cust_datetime` varchar(100) NOT NULL,
  `cust_timestamp` varchar(100) NOT NULL,
  `cust_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_name`, `cust_cname`, `cust_email`, `cust_phone`, `cust_country`, `cust_address`, `cust_city`, `cust_state`, `cust_zip`, `cust_b_name`, `cust_b_cname`, `cust_b_phone`, `cust_b_country`, `cust_b_address`, `cust_b_city`, `cust_b_state`, `cust_b_zip`, `cust_s_name`, `cust_s_cname`, `cust_s_phone`, `cust_s_country`, `cust_s_address`, `cust_s_city`, `cust_s_state`, `cust_s_zip`, `cust_password`, `cust_token`, `cust_datetime`, `cust_timestamp`, `cust_status`) VALUES
(1, 'Liam Moore', 'WV Company', 'liam@mail.com', '7458965410', 230, '788 Cottonwood Lane', 'Nashville', 'TN', '37072', 'Liam Moore', 'WV Company', '7458965410', 230, '788 Cottonwood Lane', 'Nashville', 'TN', '37072', 'Liam Moore', 'WV Company', '7458965410', 230, '788 Cottonwood Lane', 'Nashville', 'TN', '37072', 'azerty', '0081e99a29cacd4b553db15c5c5c047e', '2022-03-17 11:09:34', '1647544174', 1),
(2, 'Chad N. Carney', 'none', 'chad@mail.com', '4785690000', 230, '469 Diamond Street', 'Charlotte', 'NC', '28808', 'Chad N. Carney', 'none', '7477474440', 230, '469 Diamond Street', 'Charlotte', 'NC', '28808', 'Chad N. Carney', 'none', '7477474440', 230, '469 Diamond Street', 'Charlotte', 'NC', '28808', '5f4dcc3b5aa765d61d8327deb882cf99', 'ca87666426f4bc5c5128a96dabfecefb', '2022-03-17 11:15:26', '1647544526', 1),
(3, 'Jean Collins', 'none', 'jean@mail.com', '1478523698', 230, '1508 Crosswind Drive', 'Owensboro', 'KY', '13040', 'Jean Collins', 'none', '1478523698', 230, '1508 Crosswind Drive', 'Owensboro', 'KY', '13040', 'Jean Collins', 'none', '1478523698', 230, '1508 Crosswind Drive', 'Owensboro', 'KY', '13040', '5f4dcc3b5aa765d61d8327deb882cf99', '6b3439bf95644a36a1ed92bef374ebb7', '2022-03-20 10:29:39', '1647797379', 1),
(4, 'Annie Young', 'XYZ Company', 'annie@mail.com', '7770001144', 230, '79 Burwell Heights Road', 'Beaumont', 'TX', '77400', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'fc8f07537cdd6b3f89eb94f1cad78060', '2022-03-20 10:31:35', '1647797495', 1),
(5, 'Matthew Morales', 'ABC Company', 'matthew@mail.com', '7896587450', 230, '81 Felosa Drive', 'Mira Loma', 'CA', '91002', 'Matthew Morales', 'ABC Company', '7896587450', 230, '81 Felosa Drive', 'Mira Loma', 'CA', '91002', 'Matthew Morales', 'ABC Company', '7896587450', 230, '81 Felosa Drive', 'Mira Loma', 'CA', '91002', '5f4dcc3b5aa765d61d8327deb882cf99', 'c391105908fe01a636bfa5fc39eed33d', '2022-03-20 10:33:15', '1647797595', 1),
(6, 'August F. Freels', 'none', 'august@mail.com', '1478547850', 230, '96 Johnny Lane', 'Milwaukee', 'WI', '55550', 'August F. Freels', 'none', '1478547850', 230, '96 Johnny Lane', 'Milwaukee', 'WI', '55550', 'August F. Freels', 'none', '1478547850', 230, '96 Johnny Lane', 'Milwaukee', 'WI', '55550', '5f4dcc3b5aa765d61d8327deb882cf99', 'decc1fc2c5dd9935df82c0233002ce66', '2022-03-20 10:34:08', '1647797648', 1),
(7, 'Carl M. Dineen', 'none', 'carl@mail.com', '789878987', 230, '77 Lyndon Street', 'Kutztown', 'PA', '19855', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'c79bac688e70cc9665a2164c57ec172c', '2022-03-20 10:35:02', '1647797702', 1),
(8, 'Benjamin B. Louque', 'none', 'benjamin@mail.com', '7777889955', 230, '32 Bridge Street', 'Tulsa', 'OK', '74220', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', '5a0e096368f9669508af7b7203382b07', '2022-03-20 10:36:31', '1647797791', 1),
(9, 'Joe K. Richardson', 'none', 'joe@mail.com', '4444445555', 230, '17 Derek Drive', 'Youngstown', 'OH', '44500', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'e74ac0178d7833988d4b1625c42ba26e', '2022-03-20 10:37:18', '1647797838', 1),
(10, 'Will Williams', 'Test Company', 'williams@mail.com', '7410000000', 230, '39 Marcus Street', 'Anniston', 'AL', '37207', 'Will Williams', 'Test Company', '7410000000', 230, '39 Marcus Street', 'Anniston', 'AL', '37207', 'Will Williams', 'Test Company', '7410000000', 230, '39 Marcus Street', 'Anniston', 'AL', '37207', '5f4dcc3b5aa765d61d8327deb882cf99', '941c9265fb920f691cf01b12a15f80f8', '2022-03-20 11:15:59', '1647800159', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `email_verified_at`, `password`, `statut`, `pdp`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@gmail.com', NULL, NULL, '$2y$10$bJHAtA2HX3mZCRDKvxpprOqQVnlSAhMiOYoDswDReZIWd2sCVg3Tu', 'admin', '1722933769.jpg', NULL, '2024-08-06 05:42:49', '2024-08-06 05:42:49'),
(6, 'Toky Randria', 'toky@gmail.com', NULL, NULL, '$2y$10$04J0xDpFc/h5ZCihG3R6wOkJsF0M4BBFKtj7y9RZuatmjWTWMRGsG', 'user', '1723047052.jpg', NULL, '2024-08-07 13:10:52', '2024-08-07 13:10:52'),
(8, 'Hery', 'hery@gmail.com', NULL, NULL, '$2y$10$Zl2NIORT49nyW7Ptr7hZ3euDr1r5RvnGOKF8U6R9PDurfeTwVauPa', 'user', '1727889536.jpg', NULL, '2024-10-02 14:18:56', '2024-10-02 14:18:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_conversation_id_foreign` (`conversation_id`),
  ADD KEY `chats_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_user_id_foreign` (`user_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`),
  ADD KEY `coupons_user_id_foreign` (`user_id`);

--
-- Indexes for table `detail_produits`
--
ALTER TABLE `detail_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_produits_id_produit_foreign` (`id_produit`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `heure_livraisons`
--
ALTER TABLE `heure_livraisons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_produits`
--
ALTER TABLE `image_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_produits_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `notifs`
--
ALTER TABLE `notifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifs_user_id_foreign` (`user_id`);

--
-- Indexes for table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiements_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_produits`
--
ALTER TABLE `detail_produits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heure_livraisons`
--
ALTER TABLE `heure_livraisons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image_produits`
--
ALTER TABLE `image_produits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notifs`
--
ALTER TABLE `notifs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_produits`
--
ALTER TABLE `detail_produits`
  ADD CONSTRAINT `detail_produits_id_produit_foreign` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_produits`
--
ALTER TABLE `image_produits`
  ADD CONSTRAINT `image_produits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifs`
--
ALTER TABLE `notifs`
  ADD CONSTRAINT `notifs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
