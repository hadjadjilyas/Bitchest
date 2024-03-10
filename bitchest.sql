-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 mars 2024 à 17:34
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bitchest`
--

-- --------------------------------------------------------

--
-- Structure de la table `crypto`
--

CREATE TABLE `crypto` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `cours` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `crypto`
--

INSERT INTO `crypto` (`id`, `name`, `symbol`, `price`, `cours`) VALUES
(61, 'Bitcoin', 'BTC', 69267.891090816, NULL),
(62, 'Ethereum', 'ETH', 3894.7775236648, NULL),
(63, 'XRP', 'XRP', 0.61050157334152, NULL),
(64, 'Cardano', 'ADA', 0.71728143353487, NULL),
(65, 'Litecoin', 'LTC', 87.678045855847, NULL),
(66, 'Bitcoin Cash', 'BCH', 423.96204261301, NULL),
(67, 'Stellar', 'XLM', 0.1395304295164, NULL),
(68, 'IOTA', 'MIOTA', 0.34426999922527, NULL),
(69, 'Dash', 'DASH', 39.692515011217, NULL),
(70, 'NEM', 'XEM', 0.052116037713195, NULL),
(71, 'Bitcoin', 'BTC', 51030.555188985, NULL),
(72, 'Ethereum', 'ETH', 2753.870394418, NULL),
(73, 'XRP', 'XRP', 0.5447650177933, NULL),
(74, 'Cardano', 'ADA', 0.57822761252899, NULL),
(75, 'Litecoin', 'LTC', 69.052473586937, NULL),
(76, 'Bitcoin Cash', 'BCH', 263.08230607461, NULL),
(77, 'Stellar', 'XLM', 0.11296405635127, NULL),
(78, 'IOTA', 'MIOTA', 0.25843419889972, NULL),
(79, 'Dash', 'DASH', 29.15331281933, NULL),
(80, 'NEM', 'XEM', 0.036894199138729, NULL),
(81, 'Bitcoin', 'BTC', 51027.153508019, NULL),
(82, 'Ethereum', 'ETH', 2754.2238901249, NULL),
(83, 'XRP', 'XRP', 0.54478219422535, NULL),
(84, 'Cardano', 'ADA', 0.57826247551113, NULL),
(85, 'Litecoin', 'LTC', 69.049881463799, NULL),
(86, 'Bitcoin Cash', 'BCH', 263.09731879968, NULL),
(87, 'Stellar', 'XLM', 0.11301328189207, NULL),
(88, 'IOTA', 'MIOTA', 0.25845104515302, NULL),
(89, 'Dash', 'DASH', 29.154300523817, NULL),
(90, 'NEM', 'XEM', 0.03698857305721, NULL),
(91, 'Bitcoin', 'BTC', 51348.15191954, NULL),
(92, 'Ethereum', 'ETH', 2773.4667278713, NULL),
(93, 'XRP', 'XRP', 0.54762621822429, NULL),
(94, 'Cardano', 'ADA', 0.58601105239934, NULL),
(95, 'Litecoin', 'LTC', 69.814142856709, NULL),
(96, 'Bitcoin Cash', 'BCH', 265.20079948219, NULL),
(97, 'Stellar', 'XLM', 0.1138876924919, NULL),
(98, 'IOTA', 'MIOTA', 0.26097218714097, NULL),
(99, 'Dash', 'DASH', 30.01996929256, NULL),
(100, 'NEM', 'XEM', 0.037216578284294, NULL),
(101, 'Bitcoin', 'BTC', 51348.15191954, NULL),
(102, 'Ethereum', 'ETH', 2773.4667278713, NULL),
(103, 'XRP', 'XRP', 0.54762621822429, NULL),
(104, 'Cardano', 'ADA', 0.58601105239934, NULL),
(105, 'Litecoin', 'LTC', 69.814142856709, NULL),
(106, 'Bitcoin Cash', 'BCH', 265.20079948219, NULL),
(107, 'Stellar', 'XLM', 0.1138876924919, NULL),
(108, 'IOTA', 'MIOTA', 0.26097218714097, NULL),
(109, 'Dash', 'DASH', 30.01996929256, NULL),
(110, 'NEM', 'XEM', 0.037216578284294, NULL),
(111, 'Bitcoin', 'BTC', 51347.883064757, NULL),
(112, 'Ethereum', 'ETH', 2773.4509182857, NULL),
(113, 'XRP', 'XRP', 0.54764110361104, NULL),
(114, 'Cardano', 'ADA', 0.58612770361439, NULL),
(115, 'Litecoin', 'LTC', 69.813769556161, NULL),
(116, 'Bitcoin Cash', 'BCH', 265.21238735586, NULL),
(117, 'Stellar', 'XLM', 0.11390262995522, NULL),
(118, 'IOTA', 'MIOTA', 0.26103136332747, NULL),
(119, 'Dash', 'DASH', 30.020762082274, NULL),
(120, 'NEM', 'XEM', 0.037215913887275, NULL),
(121, 'Bitcoin', 'BTC', 51400.008439879, NULL),
(122, 'Ethereum', 'ETH', 2776.6636194261, NULL),
(123, 'XRP', 'XRP', 0.54794690171361, NULL),
(124, 'Cardano', 'ADA', 0.58736565279958, NULL),
(125, 'Litecoin', 'LTC', 69.862910307688, NULL),
(126, 'Bitcoin Cash', 'BCH', 265.40015721557, NULL),
(127, 'Stellar', 'XLM', 0.11395147042716, NULL),
(128, 'IOTA', 'MIOTA', 0.26180093347671, NULL),
(129, 'Dash', 'DASH', 29.871993268383, NULL),
(130, 'NEM', 'XEM', 0.037309849329434, NULL),
(131, 'Bitcoin', 'BTC', 51378.788164001, NULL),
(132, 'Ethereum', 'ETH', 2774.7382261553, NULL),
(133, 'XRP', 'XRP', 0.54765202423024, NULL),
(134, 'Cardano', 'ADA', 0.58805517091783, NULL),
(135, 'Litecoin', 'LTC', 69.849471022155, NULL),
(136, 'Bitcoin Cash', 'BCH', 265.33549539698, NULL),
(137, 'Stellar', 'XLM', 0.11396837415904, NULL),
(138, 'IOTA', 'MIOTA', 0.2614852374351, NULL),
(139, 'Dash', 'DASH', 29.83292078132, NULL),
(140, 'NEM', 'XEM', 0.037316757816334, NULL),
(141, 'Bitcoin', 'BTC', 51489.699874137, NULL),
(142, 'Ethereum', 'ETH', 2777.8638136041, NULL),
(143, 'XRP', 'XRP', 0.5481757934175, NULL),
(144, 'Cardano', 'ADA', 0.59657989768074, NULL),
(145, 'Litecoin', 'LTC', 69.883583595913, NULL),
(146, 'Bitcoin Cash', 'BCH', 265.89488280092, NULL),
(147, 'Stellar', 'XLM', 0.11401511808129, NULL),
(148, 'IOTA', 'MIOTA', 0.26195159169167, NULL),
(149, 'Dash', 'DASH', 29.992581052759, NULL),
(150, 'NEM', 'XEM', 0.037317883436702, NULL),
(151, 'Bitcoin', 'BTC', 52148.724525181, NULL),
(152, 'Ethereum', 'ETH', 2946.8834802291, NULL),
(153, 'XRP', 'XRP', 0.55781587819503, NULL),
(154, 'Cardano', 'ADA', 0.62445158139454, NULL),
(155, 'Litecoin', 'LTC', 71.086142431492, NULL),
(156, 'Bitcoin Cash', 'BCH', 268.33950516098, NULL),
(157, 'Stellar', 'XLM', 0.11706898155491, NULL),
(158, 'IOTA', 'MIOTA', 0.27885943495164, NULL),
(159, 'Dash', 'DASH', 29.808683701583, NULL),
(160, 'NEM', 'XEM', 0.038693493392802, NULL),
(161, 'Bitcoin', 'BTC', 52148.724525181, NULL),
(162, 'Ethereum', 'ETH', 2946.8834802291, NULL),
(163, 'XRP', 'XRP', 0.55781587819503, NULL),
(164, 'Cardano', 'ADA', 0.62445158139454, NULL),
(165, 'Litecoin', 'LTC', 71.086142431492, NULL),
(166, 'Bitcoin Cash', 'BCH', 268.33950516098, NULL),
(167, 'Stellar', 'XLM', 0.11706898155491, NULL),
(168, 'IOTA', 'MIOTA', 0.27885943495164, NULL),
(169, 'Dash', 'DASH', 29.808683701583, NULL),
(170, 'NEM', 'XEM', 0.038693493392802, NULL),
(171, 'Bitcoin', 'BTC', 52107.906259402, NULL),
(172, 'Ethereum', 'ETH', 2941.4570904171, NULL),
(173, 'XRP', 'XRP', 0.55859960266977, NULL),
(174, 'Cardano', 'ADA', 0.6237369876024, NULL),
(175, 'Litecoin', 'LTC', 71.064351151404, NULL),
(176, 'Bitcoin Cash', 'BCH', 268.11264888383, NULL),
(177, 'Stellar', 'XLM', 0.11724697221924, NULL),
(178, 'IOTA', 'MIOTA', 0.27868674950421, NULL),
(179, 'Dash', 'DASH', 29.716615740814, NULL),
(180, 'NEM', 'XEM', 0.038589347246596, NULL),
(181, 'Bitcoin', 'BTC', 52107.906259402, NULL),
(182, 'Ethereum', 'ETH', 2941.4570904171, NULL),
(183, 'XRP', 'XRP', 0.55859960266977, NULL),
(184, 'Cardano', 'ADA', 0.6237369876024, NULL),
(185, 'Litecoin', 'LTC', 71.064351151404, NULL),
(186, 'Bitcoin Cash', 'BCH', 268.11264888383, NULL),
(187, 'Stellar', 'XLM', 0.11724697221924, NULL),
(188, 'IOTA', 'MIOTA', 0.27868674950421, NULL),
(189, 'Dash', 'DASH', 29.716615740814, NULL),
(190, 'NEM', 'XEM', 0.038589347246596, NULL),
(191, 'Bitcoin', 'BTC', 52204.194719944, NULL),
(192, 'Ethereum', 'ETH', 2947.6409134181, NULL),
(193, 'XRP', 'XRP', 0.56058704310988, NULL),
(194, 'Cardano', 'ADA', 0.6261181057214, NULL),
(195, 'Litecoin', 'LTC', 71.226022772037, NULL),
(196, 'Bitcoin Cash', 'BCH', 268.72527387661, NULL),
(197, 'Stellar', 'XLM', 0.11721463368707, NULL),
(198, 'IOTA', 'MIOTA', 0.27953521826546, NULL),
(199, 'Dash', 'DASH', 29.866137554402, NULL),
(200, 'NEM', 'XEM', 0.038664843620231, NULL),
(201, 'Bitcoin', 'BTC', 52066.76453855, NULL),
(202, 'Ethereum', 'ETH', 2938.0800887272, NULL),
(203, 'XRP', 'XRP', 0.5592636369049, NULL),
(204, 'Cardano', 'ADA', 0.624757435508, NULL),
(205, 'Litecoin', 'LTC', 71.176388604493, NULL),
(206, 'Bitcoin Cash', 'BCH', 268.10905448965, NULL),
(207, 'Stellar', 'XLM', 0.11746135763729, NULL),
(208, 'IOTA', 'MIOTA', 0.27935831058414, NULL),
(209, 'Dash', 'DASH', 29.809753949983, NULL),
(210, 'NEM', 'XEM', 0.03860824075309, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240126101822', '2024-01-26 11:18:34', 95),
('DoctrineMigrations\\Version20240126103158', '2024-01-26 11:32:10', 13),
('DoctrineMigrations\\Version20240201145015', '2024-02-01 15:50:29', 127),
('DoctrineMigrations\\Version20240201145151', '2024-02-01 15:52:13', 136),
('DoctrineMigrations\\Version20240202121831', '2024-02-02 13:18:44', 307),
('DoctrineMigrations\\Version20240202123225', '2024-02-02 13:33:30', 12),
('DoctrineMigrations\\Version20240217151409', '2024-02-17 16:14:24', 114),
('DoctrineMigrations\\Version20240217153702', '2024-02-17 16:37:15', 44),
('DoctrineMigrations\\Version20240217164103', '2024-02-17 17:41:56', 180),
('DoctrineMigrations\\Version20240217181343', '2024-02-17 19:13:56', 98),
('DoctrineMigrations\\Version20240224120614', '2024-02-24 13:06:29', 212),
('DoctrineMigrations\\Version20240227115633', '2024-02-27 12:56:45', 141);

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_transaction` datetime NOT NULL,
  `quantity` double NOT NULL,
  `transaction_amount` double NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `cryptomonaie` varchar(255) DEFAULT NULL,
  `crypto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `date_transaction`, `quantity`, `transaction_amount`, `transaction_type`, `cryptomonaie`, `crypto_id`) VALUES
(2, 9, '2024-02-08 13:47:00', 1, 200, 'buy', 'BTC', NULL),
(3, 9, '2024-02-08 20:17:00', 1, 299, 'buy', 'BTC', NULL),
(4, 9, '2024-02-08 20:23:00', 1, 200, 'sell', 'BTC', NULL),
(5, 9, '2024-02-09 11:47:00', 1, 10, 'buy', 'BTC', NULL),
(6, 9, '2024-02-14 21:25:00', 1, 100, 'buy', 'BTC', NULL),
(7, 12, '2024-02-14 21:40:00', 1, 499, 'buy', 'BTC', NULL),
(8, 9, '2024-02-17 15:59:00', 1, 50, 'buy', 'BTC', NULL),
(9, 9, '2024-02-17 18:34:00', 1, 10, 'buy', 'BTC', 61),
(10, 9, '2024-02-17 18:56:00', 0.001, 10, 'buy', '61', NULL),
(11, 9, '2024-02-17 18:58:00', 1, 10, 'buy', 'BTC', 61),
(12, 9, '2024-02-17 19:11:00', 1, 10, 'buy', NULL, 61),
(13, 9, '2024-02-17 19:19:00', 1, 1, 'buy', NULL, 61),
(14, 13, '2024-02-19 20:34:00', 0.001, 10, 'buy', NULL, 61),
(15, 13, '2024-02-19 20:48:00', 1, 10, 'buy', NULL, 61),
(16, 13, '2024-02-19 20:49:00', 1, 10, 'buy', NULL, 61),
(17, 13, '2024-02-19 20:54:00', 1, 10, 'buy', NULL, 61),
(18, 13, '2024-02-19 21:00:00', 1, 9, 'sell', NULL, 61),
(19, 13, '2024-02-19 21:08:00', 1, 8, 'sell', NULL, 61),
(20, 13, '2024-02-19 21:10:00', 1, 7, 'sell', NULL, 61),
(21, 9, '2024-02-19 21:11:00', 1, 10, 'sell', NULL, 61),
(22, 13, '2024-02-20 20:47:00', 1, 1, 'buy', NULL, 61),
(23, 13, '2024-02-23 13:28:00', 1, 5, 'buy', NULL, 61),
(24, 13, '2024-02-23 14:01:00', 1, 5, 'sell', NULL, 61),
(25, 9, '2024-02-23 14:06:00', 1, 10, 'sell', NULL, 61),
(26, 13, '2024-02-23 15:36:00', 0.001, 50.980624862411, 'buy', NULL, 61),
(27, 13, '2024-02-23 15:39:00', 0.001, 2.9343961045542, 'buy', NULL, 62),
(28, 14, '2024-02-24 12:16:00', 0.001, 51.047355720593, 'buy', NULL, 61),
(29, 14, '2024-02-24 12:22:00', 0.001, 51.047355720593, 'buy', NULL, 61),
(30, 14, '2024-02-24 12:23:00', 0.001, 51.047355720593, 'sell', NULL, 61),
(31, 14, '2024-02-24 12:25:00', 0.001, 51.047355720593, 'sell', NULL, 61),
(32, 15, '2024-02-24 13:30:00', 0.001, 51.047355720593, 'buy', NULL, 61),
(33, 15, '2024-02-24 14:08:00', 0.001, 51.047355720593, 'buy', NULL, 61),
(34, 15, '2024-02-24 14:19:00', 0.001, 2.9566378976843, 'buy', NULL, 62),
(35, 15, '2024-02-24 14:20:00', 0.001, 2.9566378976843, 'buy', NULL, 62),
(36, 15, '2024-02-24 14:20:00', 0.001, 2.9566378976843, 'sell', NULL, 62),
(37, 15, '2024-02-24 14:39:00', 0.002, 102.09471144119, 'buy', NULL, 61),
(38, 15, '2024-02-24 14:42:00', 0.002, 102.09471144119, 'sell', NULL, 61),
(39, 15, '2024-02-25 19:22:00', 0.002, 103.20426444899, 'buy', NULL, 61),
(40, 15, '2024-02-25 19:23:00', 0.001, 3.0374878473658, 'buy', NULL, 62),
(41, 15, '2024-02-25 19:24:00', 0.002, 6.0749756947316, 'sell', NULL, 62),
(42, 15, '2024-02-26 09:24:00', 0.001, 51.332513989692, 'buy', NULL, 61),
(43, 15, '2024-02-26 09:24:00', 0.001, 3.0969796301686, 'buy', NULL, 62),
(44, 15, '2024-02-26 09:27:00', 0.002, 102.66502797938, 'sell', NULL, 61),
(45, 15, '2024-02-26 11:53:50', 0.001, 3.0628301471068, 'buy', NULL, 62),
(46, 15, '2024-02-26 12:44:10', 0.001, 51.196619510669, 'buy', NULL, 61),
(47, 15, '2024-02-26 13:56:42', 0.001, 51.165079500462, 'buy', NULL, 61),
(48, 15, '2024-02-26 17:28:51', 0.001, 51.660504352185, 'buy', NULL, 61),
(49, 15, '2024-02-26 17:29:59', 0.001, 51.660504352185, 'sell', NULL, 61),
(50, 15, '2024-02-26 18:02:11', 0.001, 53.388660961356, 'buy', NULL, 61),
(51, 15, '2024-02-27 16:39:37', 0.002, 114.42136840856, 'buy', NULL, 61),
(52, 15, '2024-02-27 16:40:09', 0.001, 3.2565034858612, 'sell', NULL, 62),
(53, 15, '2024-02-29 14:34:36', 0.001, 3.4650088431809, 'sell', NULL, 62),
(54, 15, '2024-03-01 09:20:31', 0.005, 308.90091693722, 'sell', NULL, 61),
(55, 15, '2024-03-01 09:21:55', 0.001, 61.805708904544, 'sell', NULL, 61),
(56, 15, '2024-03-01 10:03:32', 0.001, 61.805346433562, 'sell', NULL, 61),
(57, 15, '2024-03-01 10:06:20', 0.001, 61.971309245791, 'sell', NULL, 61),
(58, 15, '2024-03-01 10:08:03', 0.001, 3.4253892118258, 'buy', NULL, 62),
(59, 15, '2024-03-01 10:08:21', 0.001, 3.4253892118258, 'sell', NULL, 62),
(60, 15, '2024-03-01 10:13:52', 0.01, 621.46495941365, 'sell', NULL, 61),
(61, 15, '2024-03-01 10:14:20', 0.01, 621.46495941365, 'buy', NULL, 61),
(62, 15, '2024-03-01 10:15:32', 0.001, 62.146495941365, 'sell', NULL, 61),
(63, 15, '2024-03-01 10:15:53', 0.001, 62.146495941365, 'buy', NULL, 61),
(64, 15, '2024-03-01 10:25:03', 0.001, 62.136628326991, 'sell', NULL, 61),
(65, 15, '2024-03-01 10:25:16', 0.001, 62.136628326991, 'buy', NULL, 61),
(66, 15, '2024-03-01 10:31:56', 0.001, 62.187860154876, 'sell', NULL, 61),
(67, 15, '2024-03-01 10:33:09', 0.002, 124.39387840405, 'buy', NULL, 61),
(68, 15, '2024-03-01 10:36:40', 0.001, 62.149399593802, 'buy', NULL, 61),
(69, 15, '2024-03-01 10:54:21', 0.001, 3.4293279254621, 'sell', NULL, 62),
(70, 15, '2024-03-01 10:56:38', 0.001, 3.4298754636731, 'buy', NULL, 62),
(71, 15, '2024-03-01 10:58:41', 0.002, 6.8597509273462, 'buy', NULL, 62),
(72, 15, '2024-03-01 11:03:15', 0.002, 6.8583960115346, 'sell', NULL, 62),
(73, 15, '2024-03-04 10:09:24', 0.002, 130.17849209592, 'sell', NULL, 61),
(74, 15, '2024-03-08 09:31:55', 0.001, 67.073448089735, 'buy', NULL, 61),
(75, 15, '2024-03-10 12:09:22', 0.001, 69.735673000312, 'sell', NULL, 61);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `has_wallet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`, `has_wallet_id`) VALUES
(8, 'ilyas@ilyas.dz', '[\"ROLE_ADMIN\"]', '$2y$13$01z46f6b.g.5Tj07nPkJEON3QJJ8Qse2wINrhubrsBiQ/Ve2WeZXW', 'lyas', 'hdj', 2),
(9, 'mm@mm.dz', '[]', '$2y$13$3dq3uoiyiWtqx4BeiYppd.s9Bs89GjrT2jt8yz6ePCfo/YXukxmP6', 'test', 'etst', 13),
(12, 'john@doe.fr', '[]', '$2y$13$oez0.QSuUHPPED09kVo57eP9iAfzuckuiBOOIL7C8xdNu2evuqoxK', 'john', 'doe', 15),
(13, 'sayli@sayli.fr', '[]', '$2y$13$S93HBDKmDKfWigdhHFC4lewPAEErUhWRLUS4IlioefNWwRxeCIe72', 'sayli', 'sayli', 16),
(14, 'john@john.fr', '[]', '$2y$13$FhzpFUsBSzGRXd.n5pE2PupiJzA0SXMAc1aNbHdSf6S0EKiF6D1Zi', 'john', 'john', 17),
(15, 'gg@gg.fr', '[]', '$2y$13$Lzxgwmv4B5D9RtCuwgvKHevLyU0cruUaygSgKXO3Q3CsuDAZYuo1u', 'gg', 'gg', 18),
(20, 'al@al.fr', '[\"ROLE_ADMIN\"]', '$2y$13$6kmEfcc96.LoXosixmeDUuDSeNqVxehSpymnK0MdjjE8pBYplzQoC', 'al', 'al', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_crypto`
--

CREATE TABLE `user_crypto` (
  `user_id` int(11) NOT NULL,
  `crypto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_crypto`
--

INSERT INTO `user_crypto` (`user_id`, `crypto_id`) VALUES
(15, 61),
(15, 62);

-- --------------------------------------------------------

--
-- Structure de la table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `total_balance` double NOT NULL,
  `crypto_balance` double NOT NULL,
  `usuable_balance` double NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wallet`
--

INSERT INTO `wallet` (`id`, `total_balance`, `crypto_balance`, `usuable_balance`, `user_id`) VALUES
(1, 0, 0, 500, NULL),
(2, 0, 0, 500, NULL),
(12, 500, 0, 500, NULL),
(13, 108, 88, 20, NULL),
(14, 500, 0, 500, NULL),
(15, 1, 0, 1, NULL),
(16, 430.08497903304, 1, 429.08497903304, NULL),
(17, 499.999, -0.00099999999999767, 500, NULL),
(18, 500.00000000003, -79.471040450523, 579.47104045055, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `crypto`
--
ALTER TABLE `crypto`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_723705D1A76ED395` (`user_id`),
  ADD KEY `IDX_723705D1E9571A63` (`crypto_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D6495080B2BC` (`has_wallet_id`);

--
-- Index pour la table `user_crypto`
--
ALTER TABLE `user_crypto`
  ADD PRIMARY KEY (`user_id`,`crypto_id`),
  ADD KEY `IDX_D7A33B8A76ED395` (`user_id`),
  ADD KEY `IDX_D7A33B8E9571A63` (`crypto_id`);

--
-- Index pour la table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7C68921FA76ED395` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `crypto`
--
ALTER TABLE `crypto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_723705D1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_723705D1E9571A63` FOREIGN KEY (`crypto_id`) REFERENCES `crypto` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6495080B2BC` FOREIGN KEY (`has_wallet_id`) REFERENCES `wallet` (`id`);

--
-- Contraintes pour la table `user_crypto`
--
ALTER TABLE `user_crypto`
  ADD CONSTRAINT `FK_D7A33B8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D7A33B8E9571A63` FOREIGN KEY (`crypto_id`) REFERENCES `crypto` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `FK_7C68921FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
