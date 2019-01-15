-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 02:29 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doaibu`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `stok` int(4) NOT NULL,
  `harga` int(8) NOT NULL,
  `satuan` varchar(8) NOT NULL,
  `ubah_terakhir` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga`, `satuan`, `ubah_terakhir`) VALUES
('B0000001', 'KEYBOARD', 19, 200000, 'PCS', 2019001),
('B0000002', 'ROKOK', 24, 300000, 'PAK', 2019001),
('B0000003', 'AQUA', 3, 100000, 'DOS', 2019001);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_transaksi` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `satuan` varchar(8) NOT NULL,
  `harga` int(8) NOT NULL,
  `qty` int(4) NOT NULL,
  `subtotal` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(8) NOT NULL,
  `nama_lengkap` varchar(32) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `no_telepon` varchar(16) NOT NULL,
  `ubah_terakhir` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_lengkap`, `alamat`, `no_telepon`, `ubah_terakhir`) VALUES
('PL000001', 'ALDRICH TJANDRA', 'JL LANDAK', '08123456789', 2019001),
('PL000002', 'ANDI ASHRI', 'JL SERIGALA', '08123871232', 2019001);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(8) NOT NULL,
  `id_supplier` varchar(8) NOT NULL,
  `total` int(8) NOT NULL,
  `tanggal` datetime NOT NULL,
  `buyer` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `total`, `tanggal`, `buyer`) VALUES
('PB000001', 'SU000001', 2250000, '2019-01-15 09:27:18', 2019001);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `qty` int(4) NOT NULL,
  `harga` int(8) NOT NULL,
  `subtotal` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian`, `id_barang`, `qty`, `harga`, `subtotal`) VALUES
('PB000001', 'B0000001', 10, 150000, 1500000),
('PB000001', 'B0000002', 5, 150000, 750000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(8) NOT NULL,
  `id_pelanggan` varchar(8) NOT NULL,
  `total` int(8) NOT NULL,
  `bayar` int(8) NOT NULL,
  `kembali` int(8) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kasir` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `total`, `bayar`, `kembali`, `tanggal`, `kasir`) VALUES
('PJ000001', 'PL000002', 200000, 200000, 0, '2019-01-15 09:27:40', 2019001),
('PJ000002', 'PL000001', 300000, 310000, 10000, '2019-01-15 09:27:57', 2019001);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `qty` int(4) NOT NULL,
  `harga` int(8) NOT NULL,
  `subtotal` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan`, `id_barang`, `qty`, `harga`, `subtotal`) VALUES
('PJ000001', 'B0000001', 1, 200000, 200000),
('PJ000002', 'B0000002', 1, 300000, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(8) NOT NULL,
  `nama_supplier` varchar(32) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `no_telepon` varchar(16) NOT NULL,
  `ubah_terakhir` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telepon`, `ubah_terakhir`) VALUES
('SU000001', 'JUTAR', 'JL ALAUDIN', '0813333333', 2019001),
('SU000002', 'KHARISMA', 'JL BAJI ATEKA', '1234324233', 2019001);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_stok`
--

CREATE TABLE `tmp_stok` (
  `tmp_id_barang` varchar(8) NOT NULL,
  `tmp_stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nik` int(7) NOT NULL,
  `nama_lengkap` varchar(32) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nik`, `nama_lengkap`, `jabatan`, `password`) VALUES
(2019001, 'JASON LOARDY', 'ADMIN', 'af6e236b38bbd1ff50e292cbfcdae20f'),
(2019002, 'AKBAR MUKHAROM', 'PEMBELIAN', 'ee2f518f528dba093e1635961023f620'),
(2019003, 'RONALDO LUMINTANG', 'PENJUALAN', 'de75fea19916e1c9fb8364b59a1e5782');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tmp_stok`
--
ALTER TABLE `tmp_stok`
  ADD PRIMARY KEY (`tmp_id_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
