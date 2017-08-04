-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Agu 2017 pada 03.14
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_messages`
--

CREATE TABLE IF NOT EXISTS `tbl_messages` (
  `id_message` int(11) NOT NULL,
  `id_nasabah` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_messages`
--

INSERT INTO `tbl_messages` (`id_message`, `id_nasabah`, `judul`, `isi`, `created_at`) VALUES
(1, '1234567890', 'Doloribus quo qui veritatis totam laborum vel maxime sequi.', 'Et nobis maxime soluta quia autem libero quia. Corrupti et est est est rerum reiciendis porro. Et fuga sit sit accusantium iste sit. Nesciunt et quam accusantium repudiandae.', '2017-07-12 16:13:19'),
(2, '1234567890', 'Voluptatem quae velit aut dolorem delectus dolore.', 'Vel et voluptatum aut vitae explicabo. Excepturi dolor tenetur reprehenderit quia repellendus. Dolorem doloremque nam praesentium pariatur esse. Iste iusto commodi ut repudiandae.', '2017-07-18 05:57:20'),
(3, '1234567890', 'Voluptate quidem molestiae amet ea.', 'Omnis voluptatem at provident quia cum consequuntur recusandae. Aspernatur atque optio eos fuga adipisci. Officiis sit ipsam veritatis aut.', '2017-07-06 14:19:53'),
(4, '1234567890', 'Consequuntur et dolorem sed.', 'Ullam occaecati neque et nihil. Reprehenderit odit deserunt dicta minus. Nobis veritatis laboriosam accusamus consequatur fugiat.', '2017-06-30 06:51:08'),
(5, '1234567890', 'Hic quaerat natus voluptatem.', 'Eligendi voluptate corrupti unde quisquam rerum rerum dolorem facilis. Accusamus aliquam cumque dolore maxime voluptas. Amet inventore dolore temporibus nobis in accusantium id nulla.', '2017-07-14 21:17:22'),
(6, '1234567890', 'Ea aut sit totam recusandae et exercitationem.', 'Facilis expedita necessitatibus accusamus exercitationem praesentium. Et et placeat ab ad. Molestiae et rem voluptatibus cupiditate laborum aliquid. Nihil corrupti cum aut mollitia dolore.', '2017-07-22 03:53:33'),
(7, '1234567890', 'Facilis harum ullam eum numquam sed ut.', 'Soluta accusamus libero ducimus provident similique doloribus neque est. Sit placeat laborum sed mollitia. Consequatur possimus pariatur exercitationem facere dignissimos veniam.', '2017-07-08 11:31:11'),
(8, '1234567890', 'Quas neque distinctio neque ratione perspiciatis esse sed rem.', 'Blanditiis eveniet aliquam similique quaerat. Voluptatibus quisquam molestiae corporis ut qui nesciunt. Tenetur corporis odit voluptas iste.', '2017-07-23 16:59:01'),
(9, '1234567890', 'Sint eveniet velit iusto exercitationem.', 'Pariatur dolorem quis aliquid sapiente. Ad quia consectetur eligendi. Cupiditate debitis magnam architecto aliquam ullam id. Aut rerum excepturi nostrum quo suscipit minima.', '2017-07-09 15:12:08'),
(10, '1234567890', 'Sapiente et et qui libero fugit facilis in reprehenderit.', 'Cupiditate eum unde asperiores eum alias. Quam vel quasi placeat distinctio. Nulla quaerat optio consequuntur asperiores ex sed quis.', '2017-07-13 02:08:30'),
(11, '1234567890', 'Ut corrupti fugit error nulla.', 'Provident quas dolores inventore ea corrupti error vel. Qui ut et sit recusandae fugit quia suscipit. At accusantium et voluptas et ut vel.', '2017-07-11 14:11:31'),
(12, '1234567890', 'Nostrum nulla aspernatur aut.', 'Possimus ducimus sit officia laboriosam ipsam. Animi eos labore consequatur voluptas repellat veniam. Ipsa voluptatem iste maiores aut officiis magni porro.', '2017-07-15 20:20:30'),
(13, '1234567890', 'Ipsam vel tempore quod.', 'Occaecati eum quia doloremque quis sit commodi consectetur. Iusto numquam quo nisi quod similique.', '2017-07-16 22:28:49'),
(14, '1234567890', 'Voluptatibus eos et qui facilis aut.', 'Aperiam voluptate molestiae distinctio corporis dolores voluptatum natus. Quam at placeat ducimus. Hic velit qui unde. Distinctio sequi eveniet ad repudiandae dolores debitis.', '2017-07-16 19:56:58'),
(15, '1234567890', 'Corrupti est fuga quia veniam et architecto.', 'Sit eveniet vitae voluptatem. Accusantium sit tempore impedit et laborum iusto. A tenetur a totam et. Doloremque esse libero qui.', '2017-07-15 00:15:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE IF NOT EXISTS `tbl_rekening` (
  `no_rekening` varchar(30) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`no_rekening`, `id_user`, `saldo`) VALUES
('00966072497', '2', 5000000),
('1234567890', '3', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `no_rekening_asal` varchar(30) NOT NULL,
  `no_rekening_tujuan` varchar(30) NOT NULL,
  `jenis_transaksi` enum('debit','kredit') NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `no_rekening_asal`, `no_rekening_tujuan`, `jenis_transaksi`, `tanggal_transaksi`, `jumlah`) VALUES
('0', '0731754122', '40742389034', 'kredit', '2017-06-28 13:38:21', 50000),
('1', '0731754122', '7477950382599', 'debit', '2017-06-24 08:55:06', 50000),
('2', '0731754122', '379468414947138', 'kredit', '2017-06-30 21:21:41', 500000),
('3', '0731754122', '6382697913', 'debit', '2017-07-14 21:52:15', 100000),
('3402610274', '1234567890', '76896438034564', 'debit', '2017-07-25 19:46:13', 300000),
('3404567973', '1234567890', '60542947998688', 'kredit', '2017-07-21 01:58:14', 350000),
('3409917144', '1234567890', '907541205', 'kredit', '2017-07-08 19:32:20', 300000),
('3411579504', '1234567890', '4148497246847', 'kredit', '2017-07-19 04:23:19', 350000),
('3417071443', '00966072497', '812278591', 'kredit', '2017-07-22 01:36:18', 300000),
('3424269827', '1234567890', '9183605042', 'debit', '2017-07-09 16:52:33', 350000),
('3434812554', '1234567890', '41004496339', 'debit', '2017-07-10 02:04:14', 350000),
('3444795864', '1234567890', '87602043', 'debit', '2017-07-08 13:21:18', 300000),
('3447734024', '142428739767', '3123645', 'kredit', '2017-06-23 19:18:45', 350000),
('3473692211', '1234567890', '7374854125165', 'debit', '2017-07-27 14:13:28', 50000),
('3488261645', '1234567890', '65339460', 'debit', '2017-07-16 12:33:12', 100000),
('3490792016', '96756964438328', '348686005', 'debit', '2017-07-15 20:15:44', 50000),
('3497287335', '142428739767', '7328266', 'debit', '2017-07-08 00:59:30', 500000),
('3700152455', '1234567890', '19797170319317', 'kredit', '2017-07-02 11:59:19', 500000),
('3718905055', '1234567890', '0668876058088', 'kredit', '2017-07-06 02:02:49', 100000),
('3725323243', '1234567890', '884531481', 'kredit', '2017-07-21 09:55:28', 350000),
('3729939395', '1234567890', '73463108236908', 'debit', '2017-07-13 04:51:21', 100000),
('3731188974', '1234567890', '75032888538500', 'debit', '2017-07-10 05:06:26', 300000),
('3733573860', '96756964438328', '81612855841', 'debit', '2017-07-08 03:27:13', 100000),
('3743650099', '1234567890', '5465314369533', 'debit', '2017-07-01 18:27:20', 300000),
('3765413783', '1234567890', '1766944746987', 'debit', '2017-07-13 16:11:17', 300000),
('3768008196', '1234567890', '11881708098', 'debit', '2017-07-23 01:54:59', 500000),
('3772445795', '1234567890', '727597397', 'debit', '2017-07-19 22:04:56', 50000),
('3792279586', '1234567890', '8630806656', 'kredit', '2017-07-06 02:25:03', 300000),
('3795263899', '1234567890', '928957775704', 'kredit', '2017-06-28 05:45:21', 100000),
('3796204385', '1234567890', '61561194902', 'kredit', '2017-07-16 01:37:11', 100000),
('3799009271', '1234567890', '22669179', 'kredit', '2017-07-24 08:26:47', 350000),
('4', '875527000621', '27335199750', 'kredit', '2017-06-26 21:23:57', 350000),
('4024007100', '1234567890', '625899348', 'kredit', '2017-07-29 03:01:55', 50000),
('4024007107', '142428739767', '443576817065594', 'kredit', '2017-07-07 19:09:45', 350000),
('4024007108', '1234567890', '79173606620', 'kredit', '2017-07-04 19:05:00', 350000),
('4024007116', '142428739767', '4825236250', 'kredit', '2017-07-22 10:40:33', 500000),
('4024007122', '1234567890', '9963363496632', 'kredit', '2017-07-01 17:35:29', 100000),
('4024007139', '1234567890', '18207644165300', 'kredit', '2017-06-29 09:21:23', 100000),
('4024007141', '96756964438328', '51065695110119', 'kredit', '2017-07-11 16:23:26', 100000),
('4024007162', '142428739767', '086211187469', 'debit', '2017-07-18 16:38:40', 100000),
('4024007166', '1234567890', '2937598558', 'debit', '2017-07-09 22:54:05', 500000),
('4024007172', '00966072497', '484333', 'kredit', '2017-07-01 03:35:27', 300000),
('4024007174', '1234567890', '894273171325836', 'kredit', '2017-07-24 01:26:30', 350000),
('4024007175', '142428739767', '2387385197002', 'debit', '2017-07-12 10:32:06', 350000),
('4024007176', '1234567890', '39508656587209217', 'debit', '2017-07-22 02:21:25', 500000),
('4024007190', '00966072497', '26746', 'kredit', '2017-06-27 14:23:37', 500000),
('4141956994', '1234567890', '4543664974941', 'kredit', '2017-07-04 20:31:26', 300000),
('4161944714', '1234567890', '1776780662', 'debit', '2017-07-11 14:13:06', 350000),
('4162981120', '1234567890', '12182408636', 'kredit', '2017-06-25 12:54:50', 350000),
('4163435625', '00966072497', '67575139991', 'kredit', '2017-07-03 23:33:38', 100000),
('4253845748', '1234567890', '194366693686080', 'debit', '2017-06-28 12:19:27', 500000),
('4264645110', '1234567890', '28360065586', 'kredit', '2017-07-16 10:22:05', 50000),
('4318315370', '1234567890', '3526701859', 'kredit', '2017-07-08 08:52:22', 500000),
('4337974918', '1234567890', '7973496229493', 'debit', '2017-07-15 11:25:07', 300000),
('4353608455', '142428739767', '534685226', 'debit', '2017-07-21 13:40:29', 300000),
('4485002579', '96756964438328', '09550774937702', 'debit', '2017-07-17 20:49:08', 50000),
('4485041348', '142428739767', '306288425006980', 'kredit', '2017-07-17 06:38:07', 300000),
('4485266589', '1234567890', '5160370955765', 'debit', '2017-07-16 18:45:55', 300000),
('4485387119', '1234567890', '549589529', 'kredit', '2017-07-13 22:18:04', 100000),
('4485646616', '1234567890', '3505819406', 'kredit', '2017-07-03 13:12:03', 100000),
('4485705279', '00966072497', '1175610621', 'kredit', '2017-06-25 08:33:27', 500000),
('4485782337', '00966072497', '645535813669', 'debit', '2017-07-13 04:29:19', 500000),
('4485901952', '142428739767', '701151658', 'kredit', '2017-07-11 17:50:49', 300000),
('4485953692', '1234567890', '30524174', 'debit', '2017-07-11 13:51:11', 350000),
('4485973998', '142428739767', '77948750', 'debit', '2017-07-19 02:41:46', 350000),
('4485991268', '1234567890', '61569295117', 'debit', '2017-07-01 09:49:41', 50000),
('4532122151', '00966072497', '43686058885', 'kredit', '2017-07-21 17:22:11', 500000),
('4532145446', '1234567890', '07983721', 'kredit', '2017-07-04 07:41:00', 50000),
('4532219757', '1234567890', '0701592733339261', 'kredit', '2017-06-25 07:24:53', 100000),
('4532377577', '1234567890', '183219072021', 'kredit', '2017-07-14 18:23:26', 350000),
('4532412142', '96756964438328', '89935445', 'kredit', '2017-06-27 04:05:22', 50000),
('4532518586', '96756964438328', '4405416143', 'kredit', '2017-07-08 09:56:51', 500000),
('4532531327', '142428739767', '30575885', 'debit', '2017-07-17 20:27:01', 350000),
('4532547765', '1234567890', '56415916801045', 'kredit', '2017-07-03 11:53:27', 500000),
('4532855942', '1234567890', '27893593', 'debit', '2017-07-13 05:16:12', 50000),
('4532882710', '96756964438328', '7480669953', 'kredit', '2017-07-16 16:40:03', 350000),
('4532936664', '96756964438328', '0197001819', 'debit', '2017-07-10 06:33:49', 300000),
('4532997833', '1234567890', '866135527', 'debit', '2017-07-14 10:53:16', 350000),
('4539073228', '1234567890', '5044547172446', 'kredit', '2017-07-08 09:09:06', 100000),
('4539167267', '1234567890', '58123524705278', 'kredit', '2017-07-16 01:09:36', 100000),
('4539167795', '142428739767', '12519654256352', 'debit', '2017-07-01 16:24:39', 500000),
('4539177352', '1234567890', '0484210666551', 'kredit', '2017-07-04 21:26:47', 500000),
('4539215921', '1234567890', '5169167406', 'kredit', '2017-07-18 14:30:41', 100000),
('4539280936', '1234567890', '43429471689', 'kredit', '2017-07-12 18:41:45', 50000),
('4539374790', '00966072497', '276533121769', 'kredit', '2017-06-28 17:15:09', 50000),
('4539429856', '1234567890', '19959422323650', 'kredit', '2017-07-07 15:28:14', 50000),
('4539472933', '1234567890', '7864932887', 'debit', '2017-07-21 13:10:25', 100000),
('4539479416', '1234567890', '60233459924', 'debit', '2017-07-12 13:21:38', 100000),
('4539501948', '1234567890', '02854026916', 'debit', '2017-07-11 08:59:17', 300000),
('4539570211', '00966072497', '10525524', 'kredit', '2017-07-10 09:34:36', 50000),
('4539592892', '1234567890', '972888275219', 'kredit', '2017-07-21 03:50:18', 350000),
('4539758045', '142428739767', '168555564838092', 'kredit', '2017-07-12 01:56:13', 50000),
('4539879541', '96756964438328', '532562034', 'kredit', '2017-07-18 21:25:13', 350000),
('4539946342', '1234567890', '78551220690', 'kredit', '2017-07-06 14:46:16', 500000),
('4556084908', '1234567890', '947014001235995', 'debit', '2017-07-14 01:28:44', 350000),
('4556165939', '1234567890', '2471649536', 'debit', '2017-07-14 15:06:45', 500000),
('4556184093', '00966072497', '99278392383', 'debit', '2017-06-26 10:57:34', 500000),
('4556331790', '00966072497', '593437', 'debit', '2017-07-01 05:43:24', 100000),
('4556389364', '1234567890', '65324320573', 'kredit', '2017-07-19 02:00:09', 100000),
('4556393560', '1234567890', '72159965', 'debit', '2017-07-10 10:23:24', 500000),
('4556520455', '1234567890', '33477410', 'kredit', '2017-07-01 00:04:34', 350000),
('4556542951', '142428739767', '835415736', 'debit', '2017-07-12 09:49:12', 50000),
('4556563509', '96756964438328', '1228925807870', 'kredit', '2017-07-04 06:51:12', 100000),
('4556582574', '1234567890', '95768650675', 'debit', '2017-07-02 00:55:42', 100000),
('4556637472', '1234567890', '462645825235', 'debit', '2017-07-09 02:26:44', 500000),
('4556679867', '1234567890', '023997', 'kredit', '2017-07-04 11:35:48', 100000),
('4556682490', '1234567890', '989242587', 'debit', '2017-07-23 18:13:00', 350000),
('4556737450', '96756964438328', '8622586679', 'kredit', '2017-07-20 10:35:05', 500000),
('4556829796', '142428739767', '993739492729', 'debit', '2017-07-21 12:50:10', 50000),
('4573009118', '1234567890', '6442119131', 'kredit', '2017-07-10 15:46:35', 300000),
('4590425727', '1234567890', '7359683627040603', 'kredit', '2017-07-13 21:06:50', 500000),
('4597342649', '1234567890', '236550641034', 'debit', '2017-07-22 21:03:56', 300000),
('4672644005', '142428739767', '620542106406', 'debit', '2017-07-07 02:01:13', 350000),
('4706064444', '1234567890', '7102889977', 'debit', '2017-07-19 03:22:08', 100000),
('4716043726', '142428739767', '902574991027', 'debit', '2017-07-07 14:38:37', 350000),
('4716257323', '1234567890', '892322', 'debit', '2017-06-26 17:43:10', 50000),
('4716299698', '1234567890', '08042735081555', 'debit', '2017-07-16 02:02:56', 500000),
('4716340746', '96756964438328', '27668022346', 'kredit', '2017-07-08 01:16:16', 100000),
('4716351808', '1234567890', '215171575', 'debit', '2017-06-26 08:08:42', 350000),
('4716522388', '1234567890', '814059814609', 'kredit', '2017-07-05 16:56:49', 100000),
('4716549259', '1234567890', '848608776', 'kredit', '2017-07-08 02:51:24', 50000),
('4716663707', '142428739767', '809606099337', 'debit', '2017-07-04 23:26:17', 100000),
('4716777613', '00966072497', '115443875', 'kredit', '2017-06-28 04:17:31', 300000),
('4716852406', '00966072497', '0071889770099', 'debit', '2017-07-12 17:10:31', 100000),
('4716869033', '96756964438328', '204081338448752', 'kredit', '2017-07-20 08:15:47', 50000),
('4716908137', '1234567890', '72789968', 'debit', '2017-07-28 14:59:56', 100000),
('4716914799', '1234567890', '4675451528', 'debit', '2017-07-13 19:37:20', 50000),
('4806142849', '1234567890', '1536418056', 'kredit', '2017-07-03 03:33:39', 350000),
('4901235895', '1234567890', '51437523550', 'debit', '2017-07-11 15:55:38', 100000),
('4916012107', '1234567890', '6050880621899', 'debit', '2017-07-09 03:38:29', 350000),
('4916036455', '1234567890', '5368661869017755', 'debit', '2017-07-10 11:40:17', 100000),
('4916128167', '1234567890', '8348987644487', 'kredit', '2017-07-10 06:20:48', 300000),
('4916194372', '00966072497', '298412162798', 'debit', '2017-06-27 06:38:54', 300000),
('4916296390', '96756964438328', '45393875040', 'kredit', '2017-07-14 22:52:54', 300000),
('4916323577', '1234567890', '115189057778', 'kredit', '2017-06-28 19:54:38', 50000),
('4916362250', '1234567890', '4609334617', 'debit', '2017-07-16 17:46:19', 500000),
('4916525588', '1234567890', '416376982', 'debit', '2017-06-24 04:14:32', 500000),
('4916833833', '1234567890', '64227030263002', 'debit', '2017-07-18 12:11:04', 300000),
('4916966477', '1234567890', '96873133789', 'kredit', '2017-07-17 19:31:09', 500000),
('4916976421', '1234567890', '3789451517', 'debit', '2017-07-04 16:04:50', 50000),
('4929028365', '1234567890', '817074281', 'debit', '2017-07-21 09:55:38', 50000),
('4929028710', '1234567890', '31350237130', 'debit', '2017-07-03 21:14:04', 300000),
('4929033862', '1234567890', '93897128330', 'kredit', '2017-07-04 07:56:40', 500000),
('4929157634', '96756964438328', '720499191710', 'kredit', '2017-07-08 16:47:04', 350000),
('4929464213', '1234567890', '807270457648', 'debit', '2017-07-27 06:21:18', 50000),
('4929650144', '1234567890', '551198460907', 'debit', '2017-07-16 17:48:58', 50000),
('4929760859', '1234567890', '530434', 'kredit', '2017-07-22 00:56:09', 50000),
('4929843373', '142428739767', '35248740', 'debit', '2017-06-29 09:40:39', 300000),
('4929918223', '1234567890', '946211233520', 'debit', '2017-07-07 08:26:46', 500000),
('4929966430', '1234567890', '078270574', 'debit', '2017-07-12 22:42:05', 350000),
('4936476062', '1234567890', '902944733', 'kredit', '2017-06-27 07:10:56', 500000),
('4978817908', '1234567890', '1577185148', 'debit', '2017-07-12 10:58:09', 500000),
('5', '0731754122', '4940455583769', 'debit', '2017-07-07 12:10:44', 50000),
('5100051201', '96756964438328', '057341949515', 'kredit', '2017-07-18 21:32:34', 300000),
('5100161689', '1234567890', '251634929524371', 'debit', '2017-07-21 10:11:16', 300000),
('5100900448', '00966072497', '8740554891', 'debit', '2017-07-09 05:25:53', 50000),
('5109509375', '1234567890', '362437278697', 'debit', '2017-07-04 02:52:33', 300000),
('5116171025', '96756964438328', '6365033891455', 'kredit', '2017-06-27 02:20:40', 500000),
('5117656193', '1234567890', '6498419052', 'kredit', '2017-07-05 09:38:35', 300000),
('5117699867', '1234567890', '55223418300850', 'debit', '2017-06-24 04:54:13', 500000),
('5124997858', '00966072497', '362529083', 'debit', '2017-07-06 02:27:27', 100000),
('5132235568', '1234567890', '0238459045', 'debit', '2017-07-15 13:40:25', 500000),
('5134050412', '96756964438328', '092973419036', 'debit', '2017-07-04 10:03:51', 300000),
('5135246713', '1234567890', '32001058807', 'kredit', '2017-07-13 21:32:55', 50000),
('5137625777', '1234567890', '6910863856', 'kredit', '2017-07-03 13:29:14', 350000),
('5156427002', '1234567890', '377975293877', 'debit', '2017-07-03 13:06:32', 500000),
('5157678946', '1234567890', '007957094243', 'kredit', '2017-07-23 11:17:20', 300000),
('5162168509', '00966072497', '862814489617', 'kredit', '2017-07-23 02:48:46', 350000),
('5162271891', '1234567890', '359306736266', 'debit', '2017-07-13 19:33:29', 50000),
('5165201165', '1234567890', '8192041378', 'debit', '2017-07-18 05:32:14', 100000),
('5170655440', '1234567890', '5890822299', 'kredit', '2017-07-01 21:17:58', 50000),
('5171979379', '1234567890', '32894507739', 'kredit', '2017-06-25 11:58:02', 500000),
('5177508716', '1234567890', '69990464600', 'debit', '2017-07-10 21:37:09', 50000),
('5178962422', '1234567890', '24557617917', 'debit', '2017-07-13 14:51:10', 500000),
('5181172808', '1234567890', '09519015946', 'kredit', '2017-07-28 03:17:44', 350000),
('5187006868', '1234567890', '1155376288', 'kredit', '2017-07-21 20:33:35', 500000),
('5189135125', '1234567890', '803945385157', 'kredit', '2017-07-24 01:54:27', 50000),
('5189357653', '1234567890', '6611621245', 'kredit', '2017-06-29 22:17:08', 350000),
('5192063178', '00966072497', '320591833', 'debit', '2017-07-20 01:00:57', 500000),
('5192626442', '1234567890', '3118005607', 'kredit', '2017-07-11 21:43:29', 50000),
('5197635238', '96756964438328', '5434362509', 'kredit', '2017-07-04 12:51:35', 100000),
('5197996419', '1234567890', '065006573', 'kredit', '2017-07-02 06:23:09', 50000),
('5210935122', '1234567890', '73690350108', 'debit', '2017-07-08 03:15:37', 350000),
('5213490667', '96756964438328', '37874312428967', 'debit', '2017-07-03 00:57:30', 50000),
('5217185362', '1234567890', '948776106733', 'debit', '2017-06-30 11:19:07', 100000),
('5224708519', '1234567890', '777753520650', 'kredit', '2017-06-25 04:25:49', 500000),
('5225601440', '1234567890', '2589245', 'debit', '2017-07-05 02:18:04', 350000),
('5226889943', '96756964438328', '438340517904', 'debit', '2017-07-22 21:23:18', 350000),
('5233035661', '1234567890', '72288334', 'debit', '2017-06-26 14:44:05', 100000),
('5236392018', '1234567890', '346795756347634', 'kredit', '2017-07-28 00:06:48', 50000),
('5237800328', '142428739767', '6784737295002057', 'debit', '2017-07-06 21:11:08', 300000),
('5246388897', '142428739767', '489067001563', 'kredit', '2017-06-29 01:27:42', 300000),
('5247753040', '1234567890', '435624292554', 'debit', '2017-06-25 20:51:55', 100000),
('5248825679', '1234567890', '0901158351', 'kredit', '2017-07-10 20:29:51', 500000),
('5250171935', '1234567890', '6979052229180', 'debit', '2017-07-21 05:46:37', 100000),
('5269488374', '1234567890', '36307934', 'debit', '2017-07-13 23:50:13', 350000),
('5276458151', '1234567890', '562478549740', 'debit', '2017-06-26 03:22:42', 500000),
('5277290463', '1234567890', '6274096416624', 'kredit', '2017-07-02 17:51:24', 100000),
('5279568811', '1234567890', '170727079', 'kredit', '2017-07-07 17:36:15', 300000),
('5280674609', '142428739767', '5767190665', 'debit', '2017-06-27 19:29:30', 350000),
('5283122164', '1234567890', '352065974378', 'debit', '2017-07-08 22:09:38', 300000),
('5283396528', '96756964438328', '5097092869665', 'debit', '2017-06-26 14:11:33', 350000),
('5287991295', '142428739767', '45183672107', 'kredit', '2017-07-08 01:05:27', 500000),
('5297917200', '142428739767', '8540982080885', 'debit', '2017-07-10 16:02:52', 350000),
('5303590705', '96756964438328', '828961804', 'kredit', '2017-07-15 12:55:58', 100000),
('5309789731', '1234567890', '0483764198064458', 'kredit', '2017-06-23 22:16:21', 100000),
('5321348217', '1234567890', '12983907266', 'debit', '2017-06-30 03:57:18', 500000),
('5323366674', '1234567890', '601625458868', 'debit', '2017-07-23 16:47:22', 350000),
('5324946742', '1234567890', '7187863028015', 'kredit', '2017-07-03 19:19:45', 50000),
('5331792425', '1234567890', '7457209730', 'kredit', '2017-07-06 17:15:32', 50000),
('5332292449', '1234567890', '10216139771845', 'kredit', '2017-07-04 12:34:30', 100000),
('5335264407', '1234567890', '3966460771411', 'debit', '2017-07-20 18:13:56', 100000),
('5342005068', '00966072497', '44829579278834', 'kredit', '2017-07-09 13:38:54', 500000),
('5345955849', '00966072497', '82016155014696', 'debit', '2017-07-03 06:02:25', 100000),
('5347487825', '96756964438328', '417317136008', 'debit', '2017-07-23 01:20:09', 300000),
('5349583415', '1234567890', '717880565', 'debit', '2017-07-07 17:13:47', 50000),
('5351390523', '96756964438328', '6545732641579', 'debit', '2017-07-20 10:00:52', 300000),
('5352386476', '1234567890', '34218514', 'kredit', '2017-06-27 14:36:51', 500000),
('5355738856', '00966072497', '75405443773933', 'kredit', '2017-06-27 05:41:18', 500000),
('5356238241', '1234567890', '77764190220970', 'kredit', '2017-07-19 10:20:10', 50000),
('5366056858', '1234567890', '2485403602132', 'kredit', '2017-07-12 21:16:00', 350000),
('5368899789', '142428739767', '565946250565431', 'debit', '2017-07-06 04:25:49', 500000),
('5371810217', '142428739767', '891427402188', 'debit', '2017-06-26 10:04:28', 100000),
('5371961594', '1234567890', '52266360844', 'kredit', '2017-07-28 03:52:30', 50000),
('5376059777', '1234567890', '9178720', 'debit', '2017-07-12 06:46:34', 50000),
('5381240657', '00966072497', '8251067167405', 'debit', '2017-07-17 22:19:03', 300000),
('5381631583', '1234567890', '065300079', 'kredit', '2017-07-05 09:33:43', 50000),
('5384532942', '1234567890', '3419883843582725', 'kredit', '2017-07-19 18:23:51', 350000),
('5390518128', '1234567890', '1625720', 'debit', '2017-07-12 16:17:24', 50000),
('5394801694', '1234567890', '063026652289', 'debit', '2017-07-03 12:00:23', 500000),
('5397790820', '1234567890', '406008288838', 'kredit', '2017-07-06 01:14:37', 300000),
('5400996152', '1234567890', '04604722962', 'debit', '2017-07-10 14:05:24', 500000),
('5409433357', '1234567890', '3668133990003', 'kredit', '2017-07-03 14:10:01', 50000),
('5409609816', '1234567890', '85537440701', 'debit', '2017-07-03 01:38:57', 100000),
('5409932940', '1234567890', '16660951758495', 'debit', '2017-07-28 01:03:31', 300000),
('5410654040', '142428739767', '1940717170473', 'kredit', '2017-07-18 11:20:33', 300000),
('5411411309', '1234567890', '74601557081903', 'kredit', '2017-07-12 02:14:47', 350000),
('5412805467', '1234567890', '63652067094', 'debit', '2017-07-18 03:33:25', 50000),
('5420906473', '1234567890', '5861425991', 'debit', '2017-07-26 12:35:53', 100000),
('5432800007', '00966072497', '6995042783881', 'kredit', '2017-07-06 08:29:07', 100000),
('5447432000', '96756964438328', '28700729456', 'debit', '2017-06-24 05:44:21', 350000),
('5450358826', '1234567890', '7773131', 'kredit', '2017-07-12 02:16:16', 300000),
('5452716826', '00966072497', '732108409727', 'debit', '2017-07-13 19:13:06', 350000),
('5455158153', '142428739767', '764352670', 'kredit', '2017-07-09 20:50:40', 500000),
('5456883668', '1234567890', '1360038008', 'debit', '2017-07-16 11:55:58', 300000),
('5457348321', '00966072497', '209977780935', 'kredit', '2017-07-01 16:10:27', 50000),
('5459857934', '1234567890', '0682954128', 'debit', '2017-06-29 11:50:34', 350000),
('5461310717', '1234567890', '8668974123611', 'kredit', '2017-06-29 19:07:40', 500000),
('5462825294', '1234567890', '93813428373260', 'debit', '2017-07-03 09:47:14', 500000),
('5465531083', '1234567890', '03327483525', 'debit', '2017-07-27 17:26:06', 100000),
('5468601272', '1234567890', '04100117462', 'kredit', '2017-06-28 18:35:28', 500000),
('5471645321', '1234567890', '954220446', 'debit', '2017-07-09 21:24:13', 50000),
('5484211600', '96756964438328', '850897803575', 'debit', '2017-06-24 02:38:51', 350000),
('5492557867', '1234567890', '5376488434', 'debit', '2017-07-02 19:17:50', 500000),
('5494343114', '00966072497', '949690054777517', 'kredit', '2017-07-19 15:28:41', 100000),
('5499688073', '1234567890', '40011980921', 'kredit', '2017-07-19 23:51:23', 50000),
('5499869966', '1234567890', '40020312615', 'debit', '2017-07-11 20:16:00', 500000),
('5504825713', '96756964438328', '15828', 'debit', '2017-07-05 23:33:07', 350000),
('5506675768', '1234567890', '063309581', 'kredit', '2017-07-12 02:43:15', 50000),
('5515354299', '1234567890', '1119184589', 'kredit', '2017-07-05 23:16:37', 500000),
('5519268719', '00966072497', '5965955', 'debit', '2017-07-20 16:00:21', 300000),
('5521042300', '96756964438328', '9755776292', 'debit', '2017-07-13 08:46:10', 350000),
('5523514093', '1234567890', '1099286629', 'kredit', '2017-06-25 05:04:03', 300000),
('5523905486', '1234567890', '081397545', 'debit', '2017-07-01 14:12:29', 50000),
('5524765458', '96756964438328', '9629977317', 'kredit', '2017-07-06 11:56:24', 100000),
('5527224188', '00966072497', '58718298', 'debit', '2017-07-13 07:19:11', 50000),
('5529409836', '1234567890', '8791342764718', 'debit', '2017-07-12 00:21:25', 300000),
('5532661581', '1234567890', '5052552', 'kredit', '2017-06-25 08:13:40', 500000),
('5533414774', '1234567890', '2638390033906', 'debit', '2017-07-21 22:52:00', 100000),
('5533943751', '1234567890', '6395057791375', 'kredit', '2017-07-05 02:18:46', 50000),
('5542093301', '1234567890', '08582049705824', 'kredit', '2017-06-28 02:08:23', 350000),
('5561673991', '96756964438328', '0491289583724', 'debit', '2017-07-01 05:59:14', 500000),
('5565239110', '1234567890', '0489242179', 'debit', '2017-07-02 18:49:20', 50000),
('5575315732', '1234567890', '7309752956', 'kredit', '2017-07-19 13:31:29', 300000),
('5580005368', '1234567890', '3714646426516', 'kredit', '2017-07-02 20:01:07', 100000),
('5580278469', '1234567890', '547303384252', 'kredit', '2017-07-25 02:20:01', 50000),
('5585459276', '1234567890', '55013527631652', 'kredit', '2017-07-21 23:42:34', 500000),
('5587384909', '1234567890', '7556931207054184', 'kredit', '2017-07-19 00:24:32', 50000),
('5596656200', '1234567890', '30155459903434', 'kredit', '2017-07-01 10:41:32', 500000),
('6', '9762642634', '68095695407', 'debit', '2017-07-12 11:44:07', 50000),
('6011021620', '1234567890', '229310324940', 'kredit', '2017-07-18 21:38:01', 350000),
('6011061004', '00966072497', '3226487701', 'debit', '2017-06-27 07:55:04', 100000),
('6011070327', '96756964438328', '448774911', 'kredit', '2017-07-01 12:31:57', 300000),
('6011115135', '1234567890', '76062073279', 'kredit', '2017-07-18 18:11:45', 50000),
('6011198496', '1234567890', '9670766777', 'debit', '2017-07-01 17:08:11', 500000),
('6011257179', '1234567890', '3064421374612', 'debit', '2017-07-26 00:28:08', 500000),
('6011344538', '142428739767', '083972974', 'kredit', '2017-07-08 13:12:52', 50000),
('6011350272', '1234567890', '537035773946', 'debit', '2017-07-17 13:22:31', 500000),
('6011387213', '142428739767', '618562368555', 'kredit', '2017-07-03 07:29:54', 500000),
('6011394089', '00966072497', '9716317944', 'kredit', '2017-06-30 18:51:42', 300000),
('6011402718', '1234567890', '567012', 'kredit', '2017-07-13 05:11:39', 500000),
('6011453784', '1234567890', '40192163808795', 'debit', '2017-06-30 10:58:06', 300000),
('6011486621', '1234567890', '61113521478', 'debit', '2017-07-01 20:20:27', 100000),
('6011537965', '142428739767', '3881740871921', 'kredit', '2017-07-12 12:23:11', 500000),
('6011547920', '1234567890', '19514757', 'kredit', '2017-06-27 13:33:44', 500000),
('6011634847', '96756964438328', '8015081692', 'debit', '2017-06-29 22:41:59', 100000),
('6011682275', '00966072497', '7105207617921', 'kredit', '2017-07-18 00:38:11', 300000),
('6011712106', '1234567890', '6708015447460', 'debit', '2017-07-11 02:18:15', 100000),
('6011809950', '96756964438328', '027231367', 'debit', '2017-07-10 10:27:15', 100000),
('6011862070', '00966072497', '63796748573', 'kredit', '2017-07-15 05:45:34', 300000),
('6011863590', '1234567890', '36776596', 'kredit', '2017-07-08 07:27:34', 100000),
('6011879514', '1234567890', '3534218040', 'kredit', '2017-06-26 23:29:23', 300000),
('6011901401', '96756964438328', '68597348245', 'kredit', '2017-07-10 12:35:30', 50000),
('6011907529', '1234567890', '0335861178', 'kredit', '2017-07-06 00:53:01', 500000),
('6011925295', '96756964438328', '8014910', 'kredit', '2017-07-18 19:31:47', 50000),
('6011934839', '1234567890', '0375428', 'debit', '2017-07-27 19:30:29', 500000),
('6011987778', '142428739767', '665090462434', 'debit', '2017-07-17 03:37:30', 300000),
('7', '875527000621', '15060321', 'kredit', '2017-06-25 01:04:31', 100000),
('8', '875527000621', '7236219035', 'kredit', '2017-07-14 11:56:39', 50000),
('9', '0731754122', '96499208549132', 'kredit', '2017-06-23 21:54:28', 350000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `TTL` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `id_number`, `alamat`, `email`, `TTL`) VALUES
(2, 'johndoe', 'e58408063b13a2ea53de9887bf8852cdb443b1aa24dafb21eacc08c6a50a583ac9b08823e2775e1dcd0b688287147e6ec994091226a47b65f9a57d00ac315659bsa8srvJwR9v0LzOrflVtCx9xKFtfVs=', 'john doe', 'USR002', 'maxico', 'johndoe@example.com', '1985-05-23'),
(3, 'amirbuldan', '9d92ee82adc45ea8d7974ad666459b4d4372483e2b4b2b542c19462fb7e6fb7b1e8c8ef88c26999619647b3cbfdf60ed906e8e32ebd7f6aa64e4865ff7bb9128pXQD18lxrzayQjvn8hr4In9VpxgT1+Mrg+o=', 'amir buldan', 'USR003', 'maxico', 'amirbuldan@example.com', '1985-05-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_en`
--

CREATE TABLE IF NOT EXISTS `tbl_user_en` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_en`
--

INSERT INTO `tbl_user_en` (`id_user`, `username`, `password`, `key`) VALUES
(3, 'johndoess', '6830f99f4a29d9870e3b46847437dace09775949afe4fb45e0982e3c331ce42999c74c01fb931be27a58cddb0ccc65c042b6bb660af5d42b8a4172d9ec81bd53EA/0JVNE+kMGjA9LcCNnPhIVon3956dg', '???s[V?(?1.??{???6???:z????'),
(5, 'johndoe', '72781a9a5446f63e7440ec6c4becf50a66c9d863bdf51e66180a6f6096519ad263810472f0867f7ad20255ed791ec571da42e7c553c165def541c3fafe2789a5zVDdK/txYr3vOnvkom8jY5uKm6UfYs0=', 'd9960ebe056940118c21d4223a1578c29a37f17b05132d50aa9bfe78b321486d'),
(8, 'amirbuldan', '0', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`no_rekening`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_user_en`
--
ALTER TABLE `tbl_user_en`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user_en`
--
ALTER TABLE `tbl_user_en`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
