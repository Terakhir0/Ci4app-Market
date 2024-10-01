-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 12:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market2`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `produk_g_id` int(11) NOT NULL,
  `genreg_id` int(11) NOT NULL,
  `produkg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`produk_g_id`, `genreg_id`, `produkg_id`) VALUES
(236, 9, 30),
(237, 10, 30),
(238, 11, 30),
(239, 1, 30),
(240, 16, 30),
(241, 15, 30),
(242, 32, 30),
(243, 22, 30),
(244, 9, 31),
(245, 1, 31),
(246, 15, 31),
(247, 26, 31),
(248, 24, 31),
(249, 23, 31),
(432, 9, 49),
(433, 1, 49),
(434, 29, 49),
(435, 31, 49),
(436, 26, 49),
(437, 23, 49),
(438, 9, 50),
(439, 1, 50),
(440, 29, 50),
(441, 31, 50),
(442, 26, 50),
(443, 23, 50),
(444, 9, 51),
(445, 1, 51),
(446, 29, 51),
(447, 31, 51),
(448, 26, 51),
(449, 23, 51),
(450, 0, 54),
(451, 0, 54),
(452, 0, 54),
(453, 0, 54),
(454, 0, 54),
(455, 0, 54),
(456, 0, 55),
(457, 0, 55),
(458, 0, 55),
(459, 0, 55),
(460, 0, 55),
(461, 0, 56),
(462, 0, 56),
(463, 0, 56),
(464, 0, 56),
(465, 9, 57),
(466, 1, 57),
(467, 29, 57),
(484, 1, 83),
(485, 14, 83),
(571, 1, 94),
(572, 9, 94),
(573, 14, 94),
(574, 15, 94),
(575, 19, 94),
(576, 20, 94),
(577, 24, 94),
(578, 25, 94),
(579, 29, 94),
(580, 30, 94),
(581, 34, 94),
(687, 1, 1),
(688, 9, 1),
(689, 11, 1),
(690, 16, 1),
(691, 20, 1),
(692, 22, 1),
(693, 32, 1),
(694, 1, 13),
(695, 9, 13),
(696, 10, 13),
(697, 11, 13),
(698, 16, 13),
(699, 22, 13),
(700, 1, 14),
(701, 9, 14),
(702, 13, 14),
(703, 15, 14),
(704, 20, 14),
(705, 22, 14),
(706, 28, 14),
(707, 31, 14),
(708, 1, 15),
(709, 9, 15),
(710, 11, 15),
(711, 16, 15),
(712, 20, 15),
(713, 22, 15),
(714, 1, 16),
(715, 9, 16),
(716, 11, 16),
(717, 16, 16),
(718, 19, 16),
(719, 22, 16),
(720, 32, 16),
(721, 1, 17),
(722, 9, 17),
(723, 10, 17),
(724, 11, 17),
(725, 13, 17),
(726, 14, 17),
(727, 16, 17),
(728, 20, 17),
(729, 22, 17),
(730, 23, 17),
(731, 32, 17),
(732, 34, 17),
(733, 1, 18),
(734, 9, 18),
(735, 10, 18),
(736, 11, 18),
(737, 13, 18),
(738, 14, 18),
(739, 16, 18),
(740, 20, 18),
(741, 22, 18),
(742, 23, 18),
(743, 32, 18),
(744, 34, 18),
(745, 1, 19),
(746, 9, 19),
(747, 10, 19),
(748, 11, 19),
(749, 13, 19),
(750, 14, 19),
(751, 16, 19),
(752, 20, 19),
(753, 22, 19),
(754, 23, 19),
(755, 32, 19),
(756, 34, 19),
(757, 1, 20),
(758, 9, 20),
(759, 10, 20),
(760, 11, 20),
(761, 13, 20),
(762, 16, 20),
(763, 19, 20),
(764, 22, 20),
(765, 1, 21),
(766, 9, 21),
(767, 10, 21),
(768, 11, 21),
(769, 13, 21),
(770, 16, 21),
(771, 19, 21),
(772, 22, 21),
(773, 1, 22),
(774, 9, 22),
(775, 10, 22),
(776, 11, 22),
(777, 13, 22),
(778, 16, 22),
(779, 19, 22),
(780, 22, 22),
(781, 1, 32),
(782, 9, 32),
(783, 11, 32),
(784, 16, 32),
(785, 20, 32),
(786, 22, 32),
(787, 1, 33),
(788, 9, 33),
(789, 11, 33),
(790, 16, 33),
(791, 20, 33),
(792, 22, 33),
(793, 1, 34),
(794, 9, 34),
(795, 11, 34),
(796, 16, 34),
(797, 20, 34),
(798, 22, 34),
(799, 1, 37),
(800, 9, 37),
(801, 10, 37),
(802, 11, 37),
(803, 13, 37),
(804, 14, 37),
(805, 16, 37),
(806, 20, 37),
(807, 22, 37),
(808, 23, 37),
(809, 32, 37),
(810, 34, 37),
(811, 1, 38),
(812, 9, 38),
(813, 10, 38),
(814, 11, 38),
(815, 13, 38),
(816, 16, 38),
(817, 18, 38),
(818, 20, 38),
(819, 22, 38),
(820, 23, 38),
(821, 34, 38),
(822, 1, 39),
(823, 9, 39),
(824, 10, 39),
(825, 11, 39),
(826, 14, 39),
(827, 16, 39),
(828, 18, 39),
(829, 20, 39),
(830, 22, 39),
(831, 23, 39),
(832, 34, 39),
(833, 1, 40),
(834, 9, 40),
(835, 10, 40),
(836, 11, 40),
(837, 14, 40),
(838, 16, 40),
(839, 18, 40),
(840, 20, 40),
(841, 22, 40),
(842, 23, 40),
(843, 32, 40),
(844, 34, 40),
(845, 1, 41),
(846, 9, 41),
(847, 10, 41),
(848, 11, 41),
(849, 14, 41),
(850, 16, 41),
(851, 18, 41),
(852, 20, 41),
(853, 22, 41),
(854, 23, 41),
(855, 32, 41),
(856, 34, 41),
(857, 1, 42),
(858, 9, 42),
(859, 10, 42),
(860, 11, 42),
(861, 14, 42),
(862, 16, 42),
(863, 18, 42),
(864, 20, 42),
(865, 22, 42),
(866, 23, 42),
(867, 32, 42),
(868, 34, 42),
(869, 1, 43),
(870, 9, 43),
(871, 10, 43),
(872, 11, 43),
(873, 14, 43),
(874, 16, 43),
(875, 18, 43),
(876, 20, 43),
(877, 22, 43),
(878, 23, 43),
(879, 32, 43),
(880, 34, 43),
(881, 1, 35),
(882, 9, 35),
(883, 11, 35),
(884, 20, 35),
(885, 22, 35),
(886, 1, 36),
(887, 9, 36),
(888, 11, 36),
(889, 16, 36),
(890, 20, 36),
(891, 22, 36);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `chart_id` int(11) NOT NULL,
  `produkC_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`chart_id`, `produkC_id`, `user_id`, `jumlah`) VALUES
(1040, 1, 2, 1),
(1041, 13, 2, 1),
(1042, 14, 2, 1),
(1043, 16, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komen_tb`
--

CREATE TABLE `komen_tb` (
  `komen_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komen_tb`
--

INSERT INTO `komen_tb` (`komen_id`, `produk_id`, `user_id`, `komentar`) VALUES
(1, 15, 2, 'test'),
(2, 15, 2, 'test2'),
(3, 15, 1, 'test'),
(4, 39, 2, 'asd'),
(5, 19, 2, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `order_id` int(11) NOT NULL,
  `produkO_id` int(255) NOT NULL,
  `user_order` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `riwayat_id` int(11) NOT NULL,
  `produkr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_jumlah` int(11) NOT NULL,
  `tanggal_beli` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`riwayat_id`, `produkr_id`, `user_id`, `produk_jumlah`, `tanggal_beli`) VALUES
(22, 22, 1, 1, '2023-04-14 08:12:19'),
(23, 13, 1, 2, '2023-04-14 08:12:19'),
(24, 18, 1, 1, '2023-04-15 05:31:02'),
(25, 20, 2, 2, '2023-05-08 07:38:29'),
(26, 22, 2, 2, '2023-05-08 07:38:29'),
(27, 20, 2, 1, '2023-05-08 07:40:30'),
(28, 22, 2, 1, '2023-05-08 07:40:30'),
(29, 22, 2, 1, '2023-05-08 07:44:14'),
(30, 22, 2, 1, '2023-05-08 07:44:14'),
(31, 21, 2, 1, '2023-05-08 07:44:14'),
(32, 22, 2, 1, '2023-05-08 07:44:15'),
(33, 22, 2, 1, '2023-05-08 07:44:22'),
(34, 21, 2, 1, '2023-05-08 07:56:04'),
(35, 21, 2, 1, '2023-05-08 07:59:13'),
(36, 13, 2, 1, '2023-05-08 08:00:30'),
(37, 14, 2, 1, '2023-05-08 08:00:52'),
(38, 19, 2, 1, '2023-05-08 08:01:29'),
(39, 22, 2, 1, '2023-05-08 08:03:00'),
(40, 14, 2, 1, '2023-05-08 08:04:29'),
(41, 14, 2, 1, '2023-05-08 08:06:03'),
(42, 21, 2, 1, '2023-05-08 08:06:14'),
(43, 13, 2, 1, '2023-05-08 08:08:55'),
(44, 13, 2, 1, '2023-05-08 08:09:13'),
(45, 21, 2, 1, '2023-05-09 07:39:34'),
(46, 22, 2, 1, '2023-05-09 07:39:34'),
(47, 22, 2, 1, '2023-05-09 07:41:58'),
(48, 21, 2, 1, '2023-05-09 07:42:19'),
(49, 19, 2, 1, '2023-05-09 07:48:45'),
(50, 22, 2, 1, '2023-05-15 08:07:43'),
(51, 14, 2, 1, '2023-05-15 08:07:43'),
(52, 1, 2, 1, '2023-05-25 07:51:36'),
(53, 13, 2, 1, '2023-05-25 07:51:36'),
(54, 15, 2, 1, '2023-05-25 07:51:36'),
(55, 16, 2, 1, '2023-05-25 07:51:37'),
(56, 17, 2, 1, '2023-05-25 07:51:37'),
(57, 18, 2, 1, '2023-05-25 07:51:37'),
(58, 19, 2, 1, '2023-05-25 07:51:37'),
(59, 20, 2, 1, '2023-05-25 07:51:38'),
(60, 21, 2, 1, '2023-05-25 07:51:38'),
(61, 22, 2, 1, '2023-05-25 07:51:38'),
(62, 37, 2, 1, '2023-05-25 07:53:06'),
(63, 36, 2, 1, '2023-05-25 07:53:06'),
(64, 35, 2, 1, '2023-05-25 07:53:06'),
(65, 34, 2, 1, '2023-05-25 07:53:06'),
(66, 33, 2, 1, '2023-05-25 07:53:06'),
(67, 32, 2, 1, '2023-05-25 07:53:07'),
(68, 22, 2, 1, '2023-05-25 07:53:07'),
(69, 21, 2, 1, '2023-05-25 07:53:07'),
(70, 14, 2, 10, '2023-05-25 07:53:44'),
(71, 13, 2, 1, '2023-11-26 07:27:01'),
(72, 14, 2, 1, '2023-11-26 07:27:01'),
(73, 15, 2, 1, '2023-11-26 07:27:01'),
(74, 16, 2, 1, '2023-11-26 07:27:01'),
(75, 17, 2, 1, '2023-11-26 07:27:01'),
(76, 18, 2, 1, '2023-11-26 07:27:01'),
(77, 19, 2, 1, '2023-11-26 07:27:02'),
(78, 20, 2, 13, '2023-11-26 07:27:02'),
(79, 34, 2, 9, '2023-11-26 07:27:02'),
(80, 14, 5, 1, '2023-11-27 07:30:39'),
(81, 14, 5, 4, '2023-12-01 06:05:44'),
(82, 15, 5, 1, '2023-12-01 06:05:44'),
(83, 14, 5, 1, '2023-12-01 06:07:23'),
(84, 18, 5, 4, '2023-12-01 06:07:24'),
(85, 14, 5, 1, '2023-12-04 07:41:47'),
(86, 1, 5, 1, '2023-12-04 07:44:53'),
(87, 15, 5, 1, '2023-12-04 07:45:43'),
(88, 14, 5, 1, '2023-12-05 07:29:58'),
(89, 14, 5, 1, '2023-12-05 08:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_genre`
--

CREATE TABLE `tb_genre` (
  `genre_id` int(11) NOT NULL,
  `genre_nama` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_genre`
--

INSERT INTO `tb_genre` (`genre_id`, `genre_nama`, `tanggal`) VALUES
(1, 'Fantasy', '2023-02-21 07:35:43'),
(9, 'Action', '2023-02-21 07:44:00'),
(10, 'Adventure', '2023-02-21 07:44:04'),
(11, 'Comedy', '2023-02-21 07:44:10'),
(13, 'Romance', '2023-02-22 07:53:23'),
(14, 'Drama', '2023-02-22 07:56:37'),
(15, 'Sci-fi', '2023-02-22 08:01:10'),
(16, 'Isekai', '2023-03-14 11:32:17'),
(17, 'Horror', '2023-03-16 04:19:56'),
(18, 'Physicological', '2023-03-16 04:41:43'),
(19, 'Shounen', '2023-03-16 04:41:50'),
(20, 'Seinen', '2023-03-16 04:41:54'),
(21, 'Shoujo', '2023-03-16 04:41:58'),
(22, 'Supernatural', '2023-03-16 04:42:27'),
(23, 'Tragedy', '2023-03-16 04:42:43'),
(24, 'Sports', '2023-03-16 04:42:48'),
(25, 'Historical', '2023-03-16 05:33:22'),
(26, 'Slice of Life', '2023-03-16 05:36:52'),
(27, 'Mecha', '2023-03-16 05:37:12'),
(28, 'Mystery', '2023-03-16 05:37:25'),
(29, 'Military', '2023-03-16 05:37:58'),
(30, 'Thriller', '2023-03-16 05:38:27'),
(31, 'School Life', '2023-03-17 07:23:01'),
(32, 'Super Power', '2023-03-17 07:27:45'),
(33, 'Music', '2023-03-17 07:30:23'),
(34, 'Ecchi', '2023-03-17 07:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `produk_gambar` varchar(255) NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_genres` varchar(255) NOT NULL,
  `produk_penulis` varchar(255) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `produk_gambar`, `produk_nama`, `produk_genres`, `produk_penulis`, `produk_deskripsi`, `produk_harga`, `produk_stok`, `tanggal`) VALUES
(1, 'produk1678953346.jpg', 'Tensei Shitara Slime datta ken Vol. 11', 'Action, Comedy, Fantasy, Isekai, Seinen, Super Power, Supernatural', 'Fuse', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem et, expedita quaerat consectetur vel sed hic obcaecati aperiam ab atque soluta veniam aut laudantium iusto animi culpa perspiciatis provident perferendis quas labore temporibus eius doloremque inventore modi! Ipsum voluptatum sequi optio molestias sapiente, sunt illo ut facere eius. Neque, impedit.</p>\r\n', 55000, 999, '2023-02-21 07:28:09'),
(13, 'produk1679037643.jpg', 'Tensei Shitara Ken Deshita Vol.1', 'Action, Adventure, Comedy, Fantasy, Isekai, Supernatural', 'Yuu Tanaka', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates neque veniam tempore quos ea cupiditate vero cum placeat laboriosam provident temporibus nisi perferendis odit laborum expedita nam quam, commodi iure dignissimos voluptatibus quasi fugiat repudiandae molestiae doloribus. Veniam dignissimos vero necessitatibus recusandae, culpa aliquid neque expedita quis incidunt. Natus, optio.</p>\r\n', 50000, 975, '2023-02-24 07:57:50'),
(14, 'produk1679038468.jpg', 'Mahouka Kokou no Rettousei Vol.1', 'Action, Fantasy, Mystery, Romance, School Life, Sci-fi, Seinen, Supernatural', 'Satou Tsutomu', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates neque veniam tempore quos ea cupiditate vero cum placeat laboriosam provident temporibus nisi perferendis odit laborum expedita nam quam, commodi iure dignissimos voluptatibus quasi fugiat repudiandae molestiae doloribus. Veniam dignissimos vero necessitatibus recusandae, culpa aliquid neque expedita quis incidunt. Natus, optio.</p>\r\n', 500000, 963, '2023-02-27 04:58:50'),
(15, 'produk1679037750.jpg', 'Overlord Vol.1', 'Action, Comedy, Fantasy, Isekai, Seinen, Supernatural', 'Maruyama Kugane', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, perspiciatis. Qui illo repellat, quisquam repellendus perferendis voluptatem rem consequatur repudiandae dolor quia porro fugit. Quidem in alias ad deleniti nam sapiente sequi officia aperiam aliquam, tempora quo rerum quae debitis id soluta quia commodi quisquam est pariatur? Eos eveniet a temporibus, repellat molestiae modi ipsum enim consequatur repellendus obcaecati ullam. Libero eum fugit cumque minima reprehenderit repellat saepe nam nisi iure? Perspiciatis blanditiis porro ad nam consequatur reprehenderit dolores delectus repellendus optio beatae labore amet voluptatibus incidunt velit alias atque, quas eligendi soluta doloremque! Asperiores vitae praesentium neque eum, eaque minima id non consectetur ratione quia facere corporis assumenda cumque enim eligendi recusandae culpa, eos nobis. Ad ea odit facere sunt provident dicta, assumenda, nihil pariatur suscipit accusamus ullam fugiat delectus error obcaecati consequatur nostrum recusandae debitis ratione asperiores, labore blanditiis omnis. Quisquam quidem non aliquam rem magnam, facilis quasi?</p>\r\n', 500000, 994, '2023-03-06 07:19:37'),
(16, 'produk1678953950.jpg', 'Tensei Shitara Slime datta ken Vol. 10', 'Action, Comedy, Fantasy, Isekai, Shounen, Super Power, Supernatural', 'Fuse', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ipsum et eos quia soluta dignissimos nobis. Ratione minima rem odio dolore? Aut suscipit unde temporibus voluptatibus nobis facere impedit excepturi nemo praesentium cumque maiores, error omnis a possimus nihil recusandae id ex illo veritatis molestiae aspernatur vitae corporis. Veritatis, dignissimos.</p>\r\n', 55000, 990, '2023-03-16 08:05:50'),
(17, 'produk1679038845.jpg', 'Mushoku Tensei Vol.1', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Romance, Seinen, Super Power, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, asperiores quam! Et repudiandae dolore debitis maxime quas quam possimus repellendus similique aliquid sequi? A in et reiciendis iusto! Ipsam voluptatibus vel debitis, maiores consequuntur delectus sit ipsum corporis ad quam, id magni et enim reprehenderit voluptates repellat sunt explicabo voluptatem?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 988, '2023-03-17 07:40:45'),
(18, 'produk1679039050.jpg', 'Mushoku Tensei Vol.2', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Romance, Seinen, Super Power, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, asperiores quam! Et repudiandae dolore debitis maxime quas quam possimus repellendus similique aliquid sequi? A in et reiciendis iusto! Ipsam voluptatibus vel debitis, maiores consequuntur delectus sit ipsum corporis ad quam, id magni et enim reprehenderit voluptates repellat sunt explicabo voluptatem?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 989, '2023-03-17 07:44:10'),
(19, 'produk1679039226.jpg', 'Mushoku Tensei Vol.3', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Romance, Seinen, Super Power, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, asperiores quam! Et repudiandae dolore debitis maxime quas quam possimus repellendus similique aliquid sequi? A in et reiciendis iusto! Ipsam voluptatibus vel debitis, maiores consequuntur delectus sit ipsum corporis ad quam, id magni et enim reprehenderit voluptates repellat sunt explicabo voluptatem?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 5000000, 995, '2023-03-17 07:47:06'),
(20, 'produk1679039330.jpg', 'Kono Subarashi Sekai Ni Shukufuku Wo! Vol.1', 'Action, Adventure, Comedy, Fantasy, Isekai, Romance, Shounen, Supernatural', 'Akatsuki Natsume', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, asperiores quam! Et repudiandae dolore debitis maxime quas quam possimus repellendus similique aliquid sequi? A in et reiciendis iusto! Ipsam voluptatibus vel debitis, maiores consequuntur delectus sit ipsum corporis ad quam, id magni et enim reprehenderit voluptates repellat sunt explicabo voluptatem?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 983, '2023-03-17 07:48:50'),
(21, 'produk1679039371.jpg', 'Kono Subarashi Sekai Ni Shukufuku Wo! Vol.2', 'Action, Adventure, Comedy, Fantasy, Isekai, Romance, Shounen, Supernatural', 'Akatsuki Natsume', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, asperiores quam! Et repudiandae dolore debitis maxime quas quam possimus repellendus similique aliquid sequi? A in et reiciendis iusto! Ipsam voluptatibus vel debitis, maiores consequuntur delectus sit ipsum corporis ad quam, id magni et enim reprehenderit voluptates repellat sunt explicabo voluptatem?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 978, '2023-03-17 07:49:31'),
(22, 'produk1679039418.jpg', 'Kono Subarashi Sekai Ni Shukufuku Wo! Vol.3', 'Action, Adventure, Comedy, Fantasy, Isekai, Romance, Shounen, Supernatural', 'Akatsuki Natsume', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, asperiores quam! Et repudiandae dolore debitis maxime quas quam possimus repellendus similique aliquid sequi? A in et reiciendis iusto! Ipsam voluptatibus vel debitis, maiores consequuntur delectus sit ipsum corporis ad quam, id magni et enim reprehenderit voluptates repellat sunt explicabo voluptatem?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 963, '2023-03-17 07:50:18'),
(32, 'produk1684384979.jpg', 'Overlord Vol.2', 'Action, Comedy, Fantasy, Isekai, Seinen, Supernatural', 'Maruyama Kugane', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat quos, inventore numquam labore praesentium perferendis odio, fugit neque consectetur culpa cum facilis vel quia, cupiditate exercitationem. Quia porro doloremque quo sequi, molestiae consequuntur deleniti quidem rem eum sapiente nulla dolorum voluptates ad perferendis sed ducimus esse laudantium deserunt mollitia. Fugiat necessitatibus quae sit numquam, accusantium odio illo nobis mollitia illum. Recusandae labore dolor ducimus dolores maxime reprehenderit delectus vitae veniam corrupti facilis eveniet nisi blanditiis nobis explicabo iure quaerat consectetur consequuntur dicta sint vel, quisquam sed optio inventore. Nisi voluptatem voluptate officiis! Aliquam, dolor quasi! Nam dicta a culpa neque.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 999, '2023-05-18 04:42:59'),
(33, 'produk1684730958.jpg', 'Overlord Vol.3', 'Action, Comedy, Fantasy, Isekai, Seinen, Supernatural', 'Maruyama Kugane', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel eos eligendi temporibus dolores sequi soluta neque ducimus maxime nesciunt provident, quia vitae atque optio repudiandae laudantium pariatur voluptatibus accusamus! Reiciendis, omnis quia! Ab mollitia eveniet iusto facere laborum distinctio soluta itaque. Laudantium ex magni mollitia laborum, hic officia quod voluptas officiis provident repellendus vero soluta repudiandae sunt quis ipsam unde saepe. Dicta culpa impedit qui, dignissimos nostrum quod quas facere quisquam voluptates cupiditate iusto nemo voluptas eaque sed fugit pariatur quos neque, explicabo assumenda dolorum nobis suscipit? Assumenda quia nemo obcaecati voluptatum voluptatibus sapiente, quos sit consequuntur, saepe sunt vero?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 999, '2023-05-22 04:49:18'),
(34, 'produk1684731085.jpg', 'Overlord Vol.4', 'Action, Comedy, Fantasy, Isekai, Seinen, Supernatural', 'Maruyama Kugane', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel eos eligendi temporibus dolores sequi soluta neque ducimus maxime nesciunt provident, quia vitae atque optio repudiandae laudantium pariatur voluptatibus accusamus! Reiciendis, omnis quia! Ab mollitia eveniet iusto facere laborum distinctio soluta itaque. Laudantium ex magni mollitia laborum, hic officia quod voluptas officiis provident repellendus vero soluta repudiandae sunt quis ipsam unde saepe. Dicta culpa impedit qui, dignissimos nostrum quod quas facere quisquam voluptates cupiditate iusto nemo voluptas eaque sed fugit pariatur quos neque, explicabo assumenda dolorum nobis suscipit? Assumenda quia nemo obcaecati voluptatum voluptatibus sapiente, quos sit consequuntur, saepe sunt vero?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 990, '2023-05-22 04:51:25'),
(35, 'produk1684731313.jpg', 'Overlord Vol.5', 'Action, Comedy, Fantasy, Seinen, Supernatural', 'Maruyama Kugane', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel eos eligendi temporibus dolores sequi soluta neque ducimus maxime nesciunt provident, quia vitae atque optio repudiandae laudantium pariatur voluptatibus accusamus! Reiciendis, omnis quia! Ab mollitia eveniet iusto facere laborum distinctio soluta itaque. Laudantium ex magni mollitia laborum, hic officia quod voluptas officiis provident repellendus vero soluta repudiandae sunt quis ipsam unde saepe. Dicta culpa impedit qui, dignissimos nostrum quod quas facere quisquam voluptates cupiditate iusto nemo voluptas eaque sed fugit pariatur quos neque, explicabo assumenda dolorum nobis suscipit? Assumenda quia nemo obcaecati voluptatum voluptatibus sapiente, quos sit consequuntur, saepe sunt vero?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 999, '2023-05-22 04:55:13'),
(36, 'produk1684731340.jpg', 'Overlord Vol.6', 'Action, Comedy, Fantasy, Isekai, Seinen, Supernatural', 'Maruyama Kugane', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel eos eligendi temporibus dolores sequi soluta neque ducimus maxime nesciunt provident, quia vitae atque optio repudiandae laudantium pariatur voluptatibus accusamus! Reiciendis, omnis quia! Ab mollitia eveniet iusto facere laborum distinctio soluta itaque. Laudantium ex magni mollitia laborum, hic officia quod voluptas officiis provident repellendus vero soluta repudiandae sunt quis ipsam unde saepe. Dicta culpa impedit qui, dignissimos nostrum quod quas facere quisquam voluptates cupiditate iusto nemo voluptas eaque sed fugit pariatur quos neque, explicabo assumenda dolorum nobis suscipit? Assumenda quia nemo obcaecati voluptatum voluptatibus sapiente, quos sit consequuntur, saepe sunt vero?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 999, '2023-05-22 04:55:40'),
(37, 'produk1684731589.jpg', 'Mushoku Tensei Vol.4', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Romance, Seinen, Super Power, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel eos eligendi temporibus dolores sequi soluta neque ducimus maxime nesciunt provident, quia vitae atque optio repudiandae laudantium pariatur voluptatibus accusamus! Reiciendis, omnis quia! Ab mollitia eveniet iusto facere laborum distinctio soluta itaque. Laudantium ex magni mollitia laborum, hic officia quod voluptas officiis provident repellendus vero soluta repudiandae sunt quis ipsam unde saepe. Dicta culpa impedit qui, dignissimos nostrum quod quas facere quisquam voluptates cupiditate iusto nemo voluptas eaque sed fugit pariatur quos neque, explicabo assumenda dolorum nobis suscipit? Assumenda quia nemo obcaecati voluptatum voluptatibus sapiente, quos sit consequuntur, saepe sunt vero?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 500000, 999, '2023-05-22 04:59:49'),
(38, 'produk1685951124.jpg', 'Mushoku Tensei Vol.5', 'Action, Adventure, Comedy, Ecchi, Fantasy, Isekai, Physicological, Romance, Seinen, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit sapiente corrupti non unde perferendis porro pariatur illum eligendi soluta. Consectetur omnis consequuntur facere corporis quam quos, molestias deleniti ipsa unde maxime? Dignissimos eius exercitationem est atque dolores consectetur delectus, dolorum, soluta non ducimus quasi ipsam iusto nam architecto quod aliquid sit amet hic iste similique? Ullam error consequuntur possimus eum atque sint inventore deleniti suscipit recusandae laborum soluta, assumenda culpa ab. Fugit laboriosam ullam molestias repudiandae atque? Quis provident quos a molestiae earum magnam ipsum praesentium cumque veniam asperiores id qui, placeat odio eum veritatis libero in minima eius.</p>\r\n', 500000, 1000, '2023-06-05 07:45:25'),
(39, 'produk1685951180.jpg', 'Mushoku Tensei Vol.6', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Physicological, Seinen, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit sapiente corrupti non unde perferendis porro pariatur illum eligendi soluta. Consectetur omnis consequuntur facere corporis quam quos, molestias deleniti ipsa unde maxime? Dignissimos eius exercitationem est atque dolores consectetur delectus, dolorum, soluta non ducimus quasi ipsam iusto nam architecto quod aliquid sit amet hic iste similique? Ullam error consequuntur possimus eum atque sint inventore deleniti suscipit recusandae laborum soluta, assumenda culpa ab. Fugit laboriosam ullam molestias repudiandae atque? Quis provident quos a molestiae earum magnam ipsum praesentium cumque veniam asperiores id qui, placeat odio eum veritatis libero in minima eius.</p>\r\n', 500000, 1000, '2023-06-05 07:46:20'),
(40, 'produk1685951215.jpg', 'Mushoku Tensei Vol.7', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Physicological, Seinen, Super Power, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit sapiente corrupti non unde perferendis porro pariatur illum eligendi soluta. Consectetur omnis consequuntur facere corporis quam quos, molestias deleniti ipsa unde maxime? Dignissimos eius exercitationem est atque dolores consectetur delectus, dolorum, soluta non ducimus quasi ipsam iusto nam architecto quod aliquid sit amet hic iste similique? Ullam error consequuntur possimus eum atque sint inventore deleniti suscipit recusandae laborum soluta, assumenda culpa ab. Fugit laboriosam ullam molestias repudiandae atque? Quis provident quos a molestiae earum magnam ipsum praesentium cumque veniam asperiores id qui, placeat odio eum veritatis libero in minima eius.</p>\r\n', 500000, 1000, '2023-06-05 07:46:55'),
(41, 'produk1685951342.jpg', 'Mushoku Tensei Vol.8', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Physicological, Seinen, Super Power, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit sapiente corrupti non unde perferendis porro pariatur illum eligendi soluta. Consectetur omnis consequuntur facere corporis quam quos, molestias deleniti ipsa unde maxime? Dignissimos eius exercitationem est atque dolores consectetur delectus, dolorum, soluta non ducimus quasi ipsam iusto nam architecto quod aliquid sit amet hic iste similique? Ullam error consequuntur possimus eum atque sint inventore deleniti suscipit recusandae laborum soluta, assumenda culpa ab. Fugit laboriosam ullam molestias repudiandae atque? Quis provident quos a molestiae earum magnam ipsum praesentium cumque veniam asperiores id qui, placeat odio eum veritatis libero in minima eius.</p>\r\n', 500000, 1000, '2023-06-05 07:49:02'),
(42, 'produk1685951370.jpg', 'Mushoku Tensei Vol.9', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Physicological, Seinen, Super Power, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit sapiente corrupti non unde perferendis porro pariatur illum eligendi soluta. Consectetur omnis consequuntur facere corporis quam quos, molestias deleniti ipsa unde maxime? Dignissimos eius exercitationem est atque dolores consectetur delectus, dolorum, soluta non ducimus quasi ipsam iusto nam architecto quod aliquid sit amet hic iste similique? Ullam error consequuntur possimus eum atque sint inventore deleniti suscipit recusandae laborum soluta, assumenda culpa ab. Fugit laboriosam ullam molestias repudiandae atque? Quis provident quos a molestiae earum magnam ipsum praesentium cumque veniam asperiores id qui, placeat odio eum veritatis libero in minima eius.</p>\r\n', 500000, 1000, '2023-06-05 07:49:30'),
(43, 'produk1685951396.jpg', 'Mushoku Tensei Vol.10', 'Action, Adventure, Comedy, Drama, Ecchi, Fantasy, Isekai, Physicological, Seinen, Super Power, Supernatural, Tragedy', 'Rifujin na Magonote', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit sapiente corrupti non unde perferendis porro pariatur illum eligendi soluta. Consectetur omnis consequuntur facere corporis quam quos, molestias deleniti ipsa unde maxime? Dignissimos eius exercitationem est atque dolores consectetur delectus, dolorum, soluta non ducimus quasi ipsam iusto nam architecto quod aliquid sit amet hic iste similique? Ullam error consequuntur possimus eum atque sint inventore deleniti suscipit recusandae laborum soluta, assumenda culpa ab. Fugit laboriosam ullam molestias repudiandae atque? Quis provident quos a molestiae earum magnam ipsum praesentium cumque veniam asperiores id qui, placeat odio eum veritatis libero in minima eius.</p>\r\n', 500000, 1000, '2023-06-05 07:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `hp` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `uang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `gambar`, `nama`, `username`, `password`, `email`, `hp`, `alamat`, `uang`) VALUES
(1, 'gambar1678163350.jpg', 'test1', 'Test', '202cb962ac59075b964b07152d234b70', 'budi@gmail.com', 213213, 'Jakarta', 1000000000),
(2, 'gambar1678163350.jpg', 'Admin', 'Admin', '202cb962ac59075b964b07152d234b70', 'gilang@gmail.com', 2132132, 'Jakarta', 100000000),
(3, 'produk1683520599.jpg', 'tes2', 'Test2', '202cb962ac59075b964b07152d234b70', 'tes@gmail.com', 2132132, 'Jakarta', 10000000),
(4, 'default.png', 'Anjing', 'test123', '$2y$10$oSoV1Z0O9Z98EzX.owD6iewTwwNuq2VRugvHgW.oSqbtakKrTRWYy', 'sandi@gamail.com', 191919192, 'Jakarta', 100000),
(5, 'produk1683520599.jpg', 'Admin2', 'Admin2', '202cb962ac59075b964b07152d234b70', 'andi@gmail.com', 2132132213, 'Jakarta', 780000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`produk_g_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`chart_id`);

--
-- Indexes for table `komen_tb`
--
ALTER TABLE `komen_tb`
  ADD PRIMARY KEY (`komen_id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- Indexes for table `tb_genre`
--
ALTER TABLE `tb_genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `produk_g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=892;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `chart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1044;

--
-- AUTO_INCREMENT for table `komen_tb`
--
ALTER TABLE `komen_tb`
  MODIFY `komen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_genre`
--
ALTER TABLE `tb_genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
