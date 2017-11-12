-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Nov 2017 pada 00.40
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
-- Struktur dari tabel `tbl_detailtransaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_detailtransaksi` (
  `id_trans` varchar(100) NOT NULL,
  `rek_asal` varchar(100) NOT NULL,
  `rek_tujuan` varchar(100) NOT NULL,
  `saldo_awal` double NOT NULL,
  `saldo_akhir` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detailtransaksi`
--

INSERT INTO `tbl_detailtransaksi` (`id_trans`, `rek_asal`, `rek_tujuan`, `saldo_awal`, `saldo_akhir`) VALUES
('348390534430059', '1234567890', '1234567890', 2500000, 2600000),
('4024007144225454', '1234567890', '1234567890', 2750000, 3250000),
('4024007195738876', '1234567890', '1234567890', 3250000, 4250000),
('4485034333973860', '1234567890', '1234567890', 2600000, 2650000),
('4532279272742', '1234567890', '00966072497', 4250000, 3750000),
('4539352496296', '1234567890', '00966072497', 4010000, 3990000),
('4916466213306', '1234567890', '00966072497', 2350000, 2250000),
('4929738075463096', '1234567890', '00966072497', 2250000, 1550000),
('4929875636462', '1234567890', '1234567890', 2000000, 2500000),
('5304853166396352', '1234567890', '1234567890', 4000000, 4010000),
('5402365298124645', '1234567890', '1234567890', 1550000, 2550000),
('5465223643900108', '1234567890', '1234567890', 2150000, 2350000),
('5529705448692264', '1234567890', '00966072497', 2650000, 2150000),
('5580772719263981', '1234567890', '1234567890', 2550000, 2750000),
('6011854895226318', '1234567890', '1234567890', 3750000, 4000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_headertransaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_headertransaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `jenis` enum('debit','kredit') NOT NULL,
  `jumlah_transaksi` double NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_headertransaksi`
--

INSERT INTO `tbl_headertransaksi` (`id_transaksi`, `jenis`, `jumlah_transaksi`, `tgl_transaksi`) VALUES
('348390534430059', 'kredit', 100000, '2017-11-06 13:56:14'),
('4024007144225454', 'kredit', 500000, '2017-11-06 13:59:52'),
('4024007195738876', 'kredit', 1000000, '2017-11-06 14:00:06'),
('4485034333973860', 'kredit', 50000, '2017-11-06 13:56:25'),
('4532279272742', 'debit', 500000, '2017-11-06 14:00:24'),
('4539352496296', 'debit', 20000, '2017-11-13 06:09:39'),
('4916466213306', 'debit', 100000, '2017-11-06 13:58:34'),
('4929738075463096', 'debit', 700000, '2017-11-06 13:58:49'),
('4929875636462', 'kredit', 500000, '2017-11-06 13:55:49'),
('5304853166396352', 'kredit', 10000, '2017-11-13 06:09:23'),
('5402365298124645', 'kredit', 1000000, '2017-11-06 13:59:16'),
('5465223643900108', 'kredit', 200000, '2017-11-06 13:58:06'),
('5529705448692264', 'debit', 500000, '2017-11-06 13:56:46'),
('5580772719263981', 'kredit', 200000, '2017-11-06 13:59:34'),
('6011854895226318', 'kredit', 250000, '2017-11-06 14:00:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_messages`
--

INSERT INTO `tbl_messages` (`id_message`, `id_nasabah`, `judul`, `isi`, `created_at`) VALUES
(44, '1234567890', 'm-Transfer', '\n            <p>m-Transfer</p>\n            <p>BERHASIL</p>\n            <p>2017-11-06 13:56:46</p>\n            <p>Ke 00966072497</p>\n            <p>Rp. 500.000,00<p>Ref : 5529705448692264</p>', '2017-11-06 06:57:23'),
(45, '1234567890', 'm-Transfer', '\r\n            <p>m-Transfer</p>\r\n            <p>BERHASIL</p>\r\n            <p>2017-11-06 13:58:35</p>\r\n            <p>Ke 00966072497</p>\r\n            <p>Rp. 100.000,00<p>Ref : 4916466213306</p>', '2017-11-06 06:58:35'),
(46, '1234567890', 'm-Transfer', '\r\n            <p>m-Transfer</p>\r\n            <p>BERHASIL</p>\r\n            <p>2017-11-06 13:58:49</p>\r\n            <p>Ke 00966072497</p>\r\n            <p>Rp. 700.000,00<p>Ref : 4929738075463096</p>', '2017-11-06 06:58:49'),
(47, '1234567890', 'm-Transfer', '\r\n            <p>m-Transfer</p>\r\n            <p>BERHASIL</p>\r\n            <p>2017-11-06 14:00:24</p>\r\n            <p>Ke 00966072497</p>\r\n            <p>Rp. 500.000,00<p>Ref : 4532279272742</p>', '2017-11-06 07:00:24'),
(48, '1234567890', 'm-Transfer', '\r\n            <p>m-Transfer</p>\r\n            <p>BERHASIL</p>\r\n            <p>2017-11-13 06:09:39</p>\r\n            <p>Ke 00966072497</p>\r\n            <p>Rp. 20.000,00<p>Ref : 4539352496296</p>', '2017-11-12 23:09:39');

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
('1234567890', '3', 3990000);

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
(3, 'dimas', '095ebf54b2a8a7d65a418f27eb2f8afcbc2c2ec86c05975f176b0cde51158cc65ed3987451429206d1feba01f06ebe22a8f3aa44b45b682b74779d3e0f3c2ff7pUlQUg6lBjex5q2xIYZQ+7eYIMvfO3fAvg==', 'dimas', 'USR003', 'Bekasi', 'dimas@example.com', '1995-02-01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
--
CREATE TABLE IF NOT EXISTS `view_transaksi` (
`id_transaksi` varchar(100)
,`jenis` enum('debit','kredit')
,`jumlah_transaksi` double
,`tgl_transaksi` datetime
,`id_trans` varchar(100)
,`rek_asal` varchar(100)
,`rek_tujuan` varchar(100)
,`saldo_awal` double
,`saldo_akhir` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
--
CREATE TABLE IF NOT EXISTS `view_user` (
`id_user` int(11)
,`username` varchar(150)
,`password` varchar(255)
,`nama` varchar(150)
,`id_number` varchar(100)
,`alamat` varchar(200)
,`email` varchar(100)
,`TTL` date
,`no_rekening` varchar(30)
,`saldo` double
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi` AS (select `tbl_headertransaksi`.`id_transaksi` AS `id_transaksi`,`tbl_headertransaksi`.`jenis` AS `jenis`,`tbl_headertransaksi`.`jumlah_transaksi` AS `jumlah_transaksi`,`tbl_headertransaksi`.`tgl_transaksi` AS `tgl_transaksi`,`tbl_detailtransaksi`.`id_trans` AS `id_trans`,`tbl_detailtransaksi`.`rek_asal` AS `rek_asal`,`tbl_detailtransaksi`.`rek_tujuan` AS `rek_tujuan`,`tbl_detailtransaksi`.`saldo_awal` AS `saldo_awal`,`tbl_detailtransaksi`.`saldo_akhir` AS `saldo_akhir` from (`tbl_headertransaksi` join `tbl_detailtransaksi` on((`tbl_headertransaksi`.`id_transaksi` = `tbl_detailtransaksi`.`id_trans`))));

-- --------------------------------------------------------

--
-- Struktur untuk view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS select `tbl_user`.`id_user` AS `id_user`,`tbl_user`.`username` AS `username`,`tbl_user`.`password` AS `password`,`tbl_user`.`nama` AS `nama`,`tbl_user`.`id_number` AS `id_number`,`tbl_user`.`alamat` AS `alamat`,`tbl_user`.`email` AS `email`,`tbl_user`.`TTL` AS `TTL`,`tbl_rekening`.`no_rekening` AS `no_rekening`,`tbl_rekening`.`saldo` AS `saldo` from (`tbl_user` join `tbl_rekening` on((`tbl_user`.`id_user` = `tbl_rekening`.`id_user`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detailtransaksi`
--
ALTER TABLE `tbl_detailtransaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `tbl_headertransaksi`
--
ALTER TABLE `tbl_headertransaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
