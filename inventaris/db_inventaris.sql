-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Apr 2019 pada 06.19
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris_5`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `rusak` int(11) DEFAULT NULL,
  `id_inventaris` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `jumlah`, `rusak`, `id_inventaris`, `id_peminjaman`) VALUES
(17, 5, NULL, 12, 15),
(18, 5, NULL, 12, 16),
(19, 5, NULL, 12, 17),
(20, 10, NULL, 12, 18),
(21, 10, NULL, 12, 19),
(22, 10, NULL, 12, 20),
(23, 10, 4, 12, 21),
(24, 10, 6, 12, 21),
(25, 10, 7, 12, 22),
(26, 9, 8, 12, 23),
(27, 10, 10, 14, 24),
(28, 10, NULL, 16, 25),
(29, 10, NULL, 16, 26),
(30, 10, NULL, 16, 26),
(31, 10, NULL, 16, 26),
(32, 50, NULL, 16, 27),
(33, 10, NULL, 16, 28),
(34, 10, NULL, 16, 28),
(35, 10, NULL, 16, 28),
(36, 10, NULL, 16, 28),
(37, 10, NULL, 16, 28),
(38, 10, NULL, 16, 28),
(39, 100, NULL, 16, 29),
(40, 10, NULL, 16, 30),
(41, 10, NULL, 17, 31),
(42, 10, NULL, 16, 31),
(43, 10, 10, 17, 32),
(44, 5, NULL, 16, 33);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_supply`
--

CREATE TABLE `detail_supply` (
  `id_supplier` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text NOT NULL,
  `kondisi` enum('rusak','baik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `detail_supply`
--

INSERT INTO `detail_supply` (`id_supplier`, `id_inventaris`, `jumlah`, `ket`, `kondisi`) VALUES
(2, 17, 100, '10', 'rusak'),
(2, 17, 101, '10', 'rusak'),
(2, 16, 10, 'baik', 'baik'),
(2, 19, 10, 'askd', 'baik'),
(2, 19, 10, 'keterangan', 'baik'),
(2, 19, 10, 'aklsd', 'baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kondisi` enum('baik','rusak') NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  `tanggal_register` date NOT NULL,
  `kode_inventaris` varchar(45) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jumlah_all` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan`, `tanggal_register`, `kode_inventaris`, `id_jenis`, `id_ruang`, `id_petugas`, `jumlah`, `jumlah_all`) VALUES
(12, 'ASDJH', 'baik', 'JAKSDHJK', '2019-04-05', '', 2, 16, 1, 10, 10),
(13, 'nama', 'baik', 'keterangan', '2019-04-06', 'INV00001', 2, 15, 1, 10, 10),
(14, 'nama2', 'baik', 'keterangan2', '2019-04-06', 'INV00002', 3, 15, 1, 40, 40),
(15, 'lkajsdl', 'baik', 'keterangan', '2019-04-06', 'INV00003', 2, 15, 1, 109, 109),
(16, 'Komputer', 'baik', 'keterangan', '2019-04-06', 'INV00004', 2, 15, 1, 125, 100),
(17, 'Laptop', 'baik', 'keterangan', '2019-04-06', 'INV00005', 2, 15, 1, 301, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(45) NOT NULL,
  `kode_jenis` varchar(45) NOT NULL,
  `keterangan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
(2, 'NAMA', 'JNS00001', 'LKAJSDLK'),
(3, 'ALJSDKL', 'JNS00002', 'KJSADLKJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'operator'),
(2, 'admin'),
(3, 'peminjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(45) NOT NULL,
  `nip` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `alamat`) VALUES
(1, 'admin', '1111', 'admin'),
(4, 'Siswa', '1010', 'kp, bebas'),
(5, 'Reza', '12301', 'kp. asd'),
(6, 'alskdhl', '101010', 'laskdj'),
(7, 'operator', '5555', 'Kp. Pasar Senen'),
(8, 'opertator3', '1001010', 'alamat'),
(9, 'operator', '11111', 'alamat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` enum('REQUESTED','APPROVED','REJECTED','RETURNED','TAKEN') NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `kode_pinjam` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`, `id_petugas`, `kode_pinjam`) VALUES
(15, '2019-04-05', '2019-04-05', 'RETURNED', 5, 1, '2759801364'),
(16, '2019-04-05', '2019-04-05', 'RETURNED', 5, 1, '8571632049'),
(17, '2019-04-05', '2019-04-05', 'RETURNED', 1, 1, '6079354821'),
(18, '2019-04-05', '2019-04-05', 'RETURNED', 1, 1, '7258349160'),
(19, '2019-04-05', '2019-04-05', 'RETURNED', 1, 1, '1205368794'),
(20, '2019-04-05', '2019-04-05', 'RETURNED', 1, 1, '8317564290'),
(21, '2019-04-05', '2019-04-05', 'RETURNED', 1, 1, '6741053289'),
(22, '2019-04-05', '2019-04-05', 'RETURNED', 1, 1, '1729063584'),
(23, '2019-04-05', '2019-04-05', 'RETURNED', 5, 1, '6904178325'),
(24, '2019-04-06', '2019-04-06', 'RETURNED', 1, 1, '5963714802'),
(25, '2019-04-06', '2019-04-06', 'RETURNED', 1, 1, '0569431278'),
(26, '2019-04-06', '2019-04-06', 'RETURNED', 1, 1, '2903481765'),
(27, '2019-04-06', '2019-04-06', 'RETURNED', 1, 1, '3460298157'),
(28, '2019-04-06', '2019-04-06', 'RETURNED', 1, 1, '0293574168'),
(29, '2019-04-06', '2019-04-06', 'RETURNED', 1, 1, '5139246780'),
(30, '2019-04-06', NULL, 'TAKEN', 5, 1, '2780469315'),
(31, '2019-04-06', '2019-04-06', 'RETURNED', 1, 1, '4368957012'),
(32, '2019-04-06', '2019-04-06', 'RETURNED', 1, 1, '1975602438'),
(33, '2019-04-06', NULL, 'TAKEN', 5, 1, '5397184602');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_petugas` varchar(45) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`, `id_pegawai`) VALUES
(1, '1111', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 2, 1),
(4, '1010', 'b96dbf74436b3f73db2f27c2fb7c966eb1f47360', 'Siswa', 3, 4),
(5, '12301', 'b44dd8a5ac218f76f573d4f8d08aea4c284c2d11', 'Reza', 3, 5),
(6, '101010', '8a891e95f396aa8100f0f3ff09a0b24a6ae3ee66', 'alskdhl', 3, 6),
(7, '5555', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'operator', 1, 7),
(8, '1001010', '020b1c7b908a42365e1d7bd5d015cedcd777429a', 'opertator3', 1, 8),
(9, '11111', 'fe96dd39756ac41b74283a9292652d366d73931f', 'operator', 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(45) NOT NULL,
  `kode_ruang` varchar(45) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan`) VALUES
(15, 'Gudang 2', 'RNG001', ''),
(16, 'Gudang 3', 'RNG001', ''),
(19, 'Gudang 1', 'RNG002', ''),
(20, 'Gudang 4', 'RNG00003', ''),
(21, 'Gudang 5', 'RNG00004', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `nm_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `nm_perusahaan`) VALUES
(2, 'REZA', 'Kp. Pasar senen', 'PT. SEJAHTERA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `fk_detail_peminjaman_inventaris1_idx` (`id_inventaris`),
  ADD KEY `fk_detail_peminjaman_peminjaman1_idx` (`id_peminjaman`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `fk_inventaris_jenis_idx` (`id_jenis`),
  ADD KEY `fk_inventaris_ruang1_idx` (`id_ruang`),
  ADD KEY `fk_inventaris_petugas1_idx` (`id_petugas`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_peminjaman_pegawai1_idx` (`id_pegawai`),
  ADD KEY `fk_peminjaman_petugas1_idx` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `fk_petugas_level1_idx` (`id_level`),
  ADD KEY `fk_petugas_pegawai1_idx` (`id_pegawai`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `fk_detail_peminjaman_inventaris1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detail_peminjaman_peminjaman1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `fk_inventaris_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventaris_petugas1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventaris_ruang1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_pegawai1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_petugas1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `fk_petugas_level1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_petugas_pegawai1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 
