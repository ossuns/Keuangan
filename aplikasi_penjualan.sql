-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Des 2018 pada 07.40
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `harga_jual` int(30) NOT NULL,
  `stok_barang` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_jual`, `stok_barang`) VALUES
('B001', 'buku tulis kiky', 2000, 56),
('B002', 'pensil 2B', 2500, 39),
('B003', 'map', 5000, 30),
('B004', 'Tipe-x', 4000, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `username`, `nama`, `alamat`, `no_telp`, `email`) VALUES
(2, 'pegawai', 'Jumaidi', 'wonosegoro', '813261784', 'jdpproduction@gmail.com'),
(3, 'cahyani', 'cahyani', 'sukabumi', '098787843736', 'cahyani@gmail.com'),
(4, 'prabu', 'prabu Banyu wangi', 'sukabumi', '083452428310', 'prabu@yahoo.com'),
(5, 'firman', 'firman', 'solo', '08747847737', 'firman.com'),
(6, 'fadli', 'fadli', 'solo', '1234567890', 'fadli@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'pembeli', 'Muharraom', 'Jatinagor', '0813264583'),
(4, 'jujur', 'Jujur Dewa Pamungkas', 'wonosegoro', '081422222'),
(5, 'suci', 'suci', 'solo', '09876866367'),
(6, 'kiki', 'kiki', 'solo', '0899090490'),
(7, 'hjhj', 'yutu', 'gjhj', '09090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE IF NOT EXISTS `pelayanan` (
  `id_pelanggan` int(20) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `tgl_pelayanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelanggan`, `id_pegawai`, `tgl_pelayanan`) VALUES
(4, 2, '2018-01-01'),
(5, 2, '2018-01-01'),
(6, 3, '2018-01-03'),
(4, 2, '2018-01-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `tgl_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pelanggan`, `kode_barang`, `tgl_pembelian`) VALUES
(4, 'B002', '2018-01-04'),
(4, 'B001', '2018-01-04'),
(1, 'B001', '2018-11-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplai`
--

CREATE TABLE IF NOT EXISTS `suplai` (
  `kode_barang` varchar(20) NOT NULL,
  `jumlah_barang` int(30) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `tgl_suplai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplai`
--

INSERT INTO `suplai` (`kode_barang`, `jumlah_barang`, `id_pegawai`, `harga_beli`, `tgl_suplai`) VALUES
('B001', 10, 2, 1500, '2017-12-06'),
('B002', 10, 3, 3000, '2018-01-03'),
('B003', 10, 4, 2000, '2018-01-03'),
('B002', 7, 3, 3000, '2018-01-03'),
('B003', 2, 3, 2000, '2018-01-03'),
('B004', 3, 6, 2000, '2018-01-04'),
('B003', 5, 5, 2000, '2018-01-02'),
('B001', 4, 2, 1500, '2018-01-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 3),
('cahyani', '4f33c80cd57c096bb6058428a6eca467', 2),
('fadli', '0a539e9da09b0ab58fd282832c07b6ab', 2),
('firman', '74bfebec67d1a87b161e5cbcf6f72a4a', 2),
('hjhj', '202cb962ac59075b964b07152d234b70', 1),
('jujur', '192bf1bb0c9d8e9a713f1969aa854316', 1),
('kiki', '0d61130a6dd5eea85c2c5facfe1c15a7', 1),
('pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 2),
('pembeli', 'a9f8bbb8cb84375f241ce3b9da6219a1', 1),
('prabu', '2d234004e99aa59a08dfd6c9163e288c', 2),
('suci', '1cc6545f956f39a79c80b05f65df3c0a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `id_pelanggan` (`id_pelanggan`) USING BTREE;

--
-- Indexes for table `suplai`
--
ALTER TABLE `suplai`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Ketidakleluasaan untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pelayanan_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Ketidakleluasaan untuk tabel `suplai`
--
ALTER TABLE `suplai`
  ADD CONSTRAINT `suplai_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `suplai_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
