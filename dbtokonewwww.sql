-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 01 Jul 2019 pada 12.16
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `dbtoko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `level` varchar(5) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`username`, `password`, `nama`, `level`) VALUES
('21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin'),
('ee11cbb19052e40b07aac0ca060c23ee', 'ee11cbb19052e40b07aac0ca060c23ee', 'User Account', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `inc` int(9) NOT NULL AUTO_INCREMENT,
  `lokasi_id` int(11) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `unit_id` tinyint(3) NOT NULL DEFAULT '0',
  `kategori_id` tinyint(3) DEFAULT NULL,
  `harga_beli` int(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`inc`, `lokasi_id`, `barang_id`, `barang_nama`, `unit_id`, `kategori_id`, `harga_beli`) VALUES
(1, 5, 'BRG-1', 'Pupuk Kompos', 6, 4, 120000),
(3, 6, 'BRG-3', 'Pupuk Kandang', 6, 4, 24000),
(4, 7, 'BRG-4', 'Pupuk Kimia', 5, 4, 120000),
(6, 5, 'BRG-6', 'sue4', 0, 0, 456),
(7, 10, 'BRG-7', 'ghgj', 0, 0, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE IF NOT EXISTS `beli` (
  `inc` int(9) NOT NULL,
  `beli_id` varchar(9) NOT NULL,
  `tgl_trans` varchar(10) NOT NULL,
  `supplier_id` varchar(90) NOT NULL,
  `total` double(20,0) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `beli_id` (`beli_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`inc`, `beli_id`, `tgl_trans`, `supplier_id`, `total`) VALUES
(1, 'BM-1', '2019-06-15', 'SPL-1', 600000),
(2, 'BM-2', '2019-06-15', 'SPL-1', 408000),
(3, 'BM-3', '2019-06-15', 'SPL-1', 144000),
(4, 'BM-4', '2019-06-15', 'SPL-1', 648000),
(5, 'BM-5', '2019-06-15', 'SPL-1', 240000),
(6, 'BM-6', '2019-06-15', 'SPL-2', 120000),
(7, 'BM-7', '2019-06-15', 'SPL-2', 120000),
(8, 'BM-8', '2019-06-15', 'SPL-1', 2040000),
(9, 'BM-9', '2019-06-15', 'SPL-1', 120000),
(10, 'BM-10', '2019-06-15', 'SPL-1', 120000),
(11, 'BM-11', '2019-06-15', 'SPL-1', 48),
(12, 'BM-12', '2019-06-25', 'SPL-1', 480000),
(13, 'BM-13', '2019-06-25', 'SPL-1', 960000),
(14, 'BM-14', '2019-06-26', 'SPL-3', 672000),
(15, 'BM-15', '2019-06-26', 'SPL-1', 4560000),
(16, 'BM-16', '2019-06-26', 'SPL-1', 2280000),
(17, 'BM-17', '2019-06-27', 'SPL-2', 1440000),
(18, 'BM-18', '2019-06-30', 'SPL-2', 2400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_detail`
--

CREATE TABLE IF NOT EXISTS `beli_detail` (
  `beli_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `diskon` int(5) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `beli_id` (`beli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli_detail`
--

INSERT INTO `beli_detail` (`beli_id`, `barang_id`, `qty`, `harga_satuan`, `diskon`, `harga_total`) VALUES
('BM-1', 'BRG-1', 4, 120000, 0, 480000),
('BM-1', 'BRG-3', 5, 24000, 0, 120000),
('BM-2', 'BRG-3', 2, 24000, 0, 48000),
('BM-2', 'BRG-1', 3, 120000, 0, 360000),
('BM-3', 'BRG-3', 6, 24000, 0, 144000),
('BM-4', 'BRG-1', 5, 120000, 0, 600000),
('BM-4', 'BRG-3', 2, 24000, 0, 48000),
('BM-5', 'BRG-1', 2, 120000, 0, 240000),
('BM-6', 'BRG-3', 5, 24000, 0, 120000),
('BM-7', 'BRG-3', 5, 24000, 0, 120000),
('BM-8', 'BRG-4', 17, 120000, 0, 2040000),
('BM-9', 'BRG-4', 1, 120000, 0, 120000),
('BM-10', 'BRG-4', 1, 120000, 0, 120000),
('BM-11', 'BRG-5', 4, 12, 0, 48),
('BM-12', 'BRG-1', 4, 120000, 0, 480000),
('BM-13', 'BRG-3', 40, 24000, 0, 960000),
('BM-14', 'BRG-1', 2, 120000, 0, 240000),
('BM-14', 'BRG-4', 2, 120000, 0, 240000),
('BM-14', 'BRG-3', 8, 24000, 0, 192000),
('BM-15', 'BRG-4', 38, 120000, 0, 4560000),
('BM-16', 'BRG-1', 19, 120000, 0, 2280000),
('BM-17', 'BRG-1', 4, 120000, 0, 480000),
('BM-17', 'BRG-4', 8, 120000, 0, 960000),
('BM-18', 'BRG-1', 2, 120000, 0, 240000),
('BM-18', 'BRG-4', 18, 120000, 0, 2160000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `eceran`
--

CREATE TABLE IF NOT EXISTS `eceran` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(14) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
  `inc` int(9) NOT NULL,
  `hasil_id` varchar(9) NOT NULL,
  `tgl_trans` varchar(10) NOT NULL,
  `kar_id` varchar(90) NOT NULL,
  `total` double(20,0) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `beli_id` (`hasil_id`),
  KEY `supplier_id` (`kar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`inc`, `hasil_id`, `tgl_trans`, `kar_id`, `total`) VALUES
(1, 'PM-1', '2019-06-15', 'KRY-1', 4000),
(2, 'PM-2', '2019-06-15', 'KRY-1', 4000),
(3, 'PM-3', '2019-06-15', 'KRY-1', 100000),
(4, 'PM-4', '2019-06-15', 'KRY-2', 9000),
(5, 'PM-5', '2019-06-15', 'KRY-1', 2000),
(6, 'PM-6', '2019-06-23', 'KRY-1', 40),
(7, 'PM-7', '2019-06-23', 'KRY-1', 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_detail`
--

CREATE TABLE IF NOT EXISTS `hasil_detail` (
  `hasil_id` varchar(9) NOT NULL,
  `panen_id` varchar(14) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `diskon` int(5) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `beli_id` (`hasil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_detail`
--

INSERT INTO `hasil_detail` (`hasil_id`, `panen_id`, `qty`, `harga_satuan`, `diskon`, `harga_total`) VALUES
('PM-1', 'PM-1', 4, 1000, 0, 4000),
('PM-2', 'PM-2', 4, 1000, 0, 4000),
('PM-3', 'PM-3', 100, 1000, 0, 100000),
('PM-4', 'PM-4', 9, 1000, 0, 9000),
('PM-5', 'PNN-3', 2, 1000, 0, 2000),
('PM-6', 'PNN-4', 10, 4, 0, 40),
('PM-7', 'PNN-4', 12, 4, 0, 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(3) NOT NULL AUTO_INCREMENT,
  `nama_identitas` varchar(100) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_identitas`, `alamat`, `telp`, `keterangan`) VALUES
(1, 'PT Sawit Jaya', 'Jl New Merdeka No.17 Tahun 194', '085773518857', 'NPWP 01.302.384.1-092');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE IF NOT EXISTS `jual` (
  `inc` int(9) NOT NULL,
  `jual_id` varchar(14) NOT NULL,
  `tgl_jual` varchar(10) NOT NULL,
  `kar_id` varchar(90) NOT NULL,
  `total` double(20,0) NOT NULL,
  `biaya_kirim` double(20,0) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `jual_id` (`jual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`inc`, `jual_id`, `tgl_jual`, `kar_id`, `total`, `biaya_kirim`) VALUES
(1, 'JL-1', '2019-06-25', 'KRY-1', 20, 0),
(2, 'JL-2', '2019-06-26', 'KRY-2', 2, 0),
(3, 'JL-3', '2019-06-26', 'KRY-3', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual_detail`
--

CREATE TABLE IF NOT EXISTS `jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `qty` smallint(5) NOT NULL,
  KEY `jual_id` (`jual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jual_detail`
--

INSERT INTO `jual_detail` (`jual_id`, `barang_id`, `qty`) VALUES
('JL-1', 'BRG-3', 20),
('JL-2', 'BRG-1', 2),
('JL-3', 'BRG-4', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `inc` int(9) NOT NULL,
  `kar_id` varchar(9) NOT NULL,
  `kar_nama` varchar(90) NOT NULL,
  `kar_alamat` varchar(90) NOT NULL,
  `kar_kota` varchar(50) NOT NULL,
  `kar_email` varchar(90) NOT NULL,
  `kar_kontak` varchar(20) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `pelanggan_id` (`kar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`inc`, `kar_id`, `kar_nama`, `kar_alamat`, `kar_kota`, `kar_email`, `kar_kontak`) VALUES
(1, 'KRY-1', 'Arif', 'Bogor', 'Bogor', 'arif@gmail.com', '123'),
(2, 'KRY-2', 'kamaleng', 'Bogor ', 'Bogor ', 'arif2@gmail.com', '0989898'),
(3, 'KRY-3', 'burhan', 'Jakarta', 'jakarta', 'burhan@gmail.com', '087878787878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(4, 'Pupuk'),
(5, 'Panen'),
(6, 'Inventaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE IF NOT EXISTS `keluar` (
  `inc` int(9) NOT NULL,
  `keluar_id` varchar(14) NOT NULL,
  `tgl_keluar` varchar(10) NOT NULL,
  `pelanggan_id` varchar(90) NOT NULL,
  `kar_id` varchar(90) NOT NULL,
  `spb` varchar(90) NOT NULL,
  `nopol` varchar(90) NOT NULL,
  `total` double(20,0) NOT NULL,
  `biaya_kirim` double(20,0) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `jual_id` (`keluar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`inc`, `keluar_id`, `tgl_keluar`, `pelanggan_id`, `kar_id`, `spb`, `nopol`, `total`, `biaya_kirim`) VALUES
(1, 'PK-1', '2019-06-15', 'PLG-1', '', '', '', 5000, 0),
(2, 'PK-2', '2019-06-15', 'PLG-1', '', '', '', 1000, 0),
(3, 'PK-3', '2019-06-15', 'PLG-1', '', '', '', 1000, 0),
(4, 'PK-4', '2019-06-15', 'PLG-1', '', '', '', 1000, 0),
(5, 'PK-5', '2019-06-23', 'PLG-1', '', '', '', 5000, 4000),
(6, 'PK-6', '2019-06-23', 'PLG-1', '', '', '', 93000, 4000),
(7, 'PK-7', '2019-06-25', 'PLG-1', 'KRY-1', '6776767hj', 'jh688', 8, 2),
(8, 'PK-8', '2019-06-25', 'PLG-1', 'KRY-1', '', '', 8, 3),
(9, 'PK-9', '2019-06-25', 'PLG-1', 'KRY-1', '6776767hj', '435435', 12, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar_detail`
--

CREATE TABLE IF NOT EXISTS `keluar_detail` (
  `keluar_id` varchar(9) NOT NULL,
  `panen_id` varchar(14) NOT NULL,
  `bruto` smallint(7) NOT NULL,
  `tarra` smallint(7) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `jual_id` (`keluar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluar_detail`
--

INSERT INTO `keluar_detail` (`keluar_id`, `panen_id`, `bruto`, `tarra`, `qty`, `harga_satuan`, `harga_total`) VALUES
('PK-4', 'PNN-3', 0, 0, 1, 1000, 1000),
('PK-5', 'PNN-3', 0, 0, 5, 1000, 5000),
('PK-6', 'PNN-3', 0, 0, 93, 1000, 93000),
('PK-7', 'PNN-4', 0, 0, 2, 4, 8),
('PK-8', 'PNN-4', 0, 0, 2, 4, 8),
('PK-9', 'PNN-4', 40, 37, 3, 4, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `lokasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(35) NOT NULL,
  PRIMARY KEY (`lokasi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`lokasi_id`, `lokasi`) VALUES
(5, 'Gudang A'),
(6, 'Gudang B'),
(7, 'Gudang C'),
(9, 'Blok A'),
(10, 'Blok B'),
(11, 'Blok C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panen`
--

CREATE TABLE IF NOT EXISTS `panen` (
  `inc` int(9) NOT NULL AUTO_INCREMENT,
  `lokasi_id` int(11) NOT NULL,
  `panen_id` varchar(14) NOT NULL,
  `panen_nama` varchar(90) NOT NULL,
  `unit_id` tinyint(3) NOT NULL DEFAULT '0',
  `kategori_id` tinyint(3) DEFAULT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `barang_id` (`panen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `panen`
--

INSERT INTO `panen` (`inc`, `lokasi_id`, `panen_id`, `panen_nama`, `unit_id`, `kategori_id`, `harga_beli`, `harga_jual`) VALUES
(2, 7, 'PNN-2', 'Sawit 2', 0, 0, 0, 13000),
(3, 10, 'PNN-3', 'Sawit 44', 0, 0, 1000, 1000),
(4, 10, 'PNN-4', 'Palm Oil', 0, 0, 4, 4),
(6, 5, 'PNN-6', 'Kelapa aja sih', 0, 0, 10000, 0),
(7, 9, 'PNN-7', 'anugrah', 5, 5, 90000, 4000),
(8, 10, 'PNN-8', 'cinta', 5, 5, 1000000, 100000),
(9, 9, 'PNN-9', 'luar', 5, 5, 90000, 0),
(10, 10, 'PNN-10', 'biasa', 5, 5, 90000, 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `inc` int(9) NOT NULL,
  `pelanggan_id` varchar(9) NOT NULL,
  `pelanggan_nama` varchar(90) NOT NULL,
  `pelanggan_alamat` varchar(90) NOT NULL,
  `pelanggan_kota` varchar(50) NOT NULL,
  `pelanggan_email` varchar(90) NOT NULL,
  `pelanggan_kontak` varchar(20) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `pelanggan_id` (`pelanggan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`inc`, `pelanggan_id`, `pelanggan_nama`, `pelanggan_alamat`, `pelanggan_kota`, `pelanggan_email`, `pelanggan_kontak`) VALUES
(1, 'PLG-1', 'PT XYZ 1', 'Bogor', 'bogor', 'xyz@gmail.com', '5555'),
(2, 'PLG-2', 'PT XYZ 2', 'Bandung 2', 'Bandung 2', 'xyz2@gmail.com', '55556'),
(3, 'PLG-3', 'PT XYZ 3', 'vnvnv', 'vnvbn', 'nbnb@gmail.com', '08777777777');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `qty` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`barang_id`, `barang_nama`, `qty`) VALUES
('BRG-1', 'Pupuk Kompos', 25),
('BRG-3', 'Pupuk Kandang', 28),
('BRG-4', 'Pupuk Kimia', 64);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok2`
--

CREATE TABLE IF NOT EXISTS `stok2` (
  `panen_id` varchar(14) NOT NULL,
  `panen_nama` varchar(90) NOT NULL,
  `qty` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok2`
--

INSERT INTO `stok2` (`panen_id`, `panen_nama`, `qty`) VALUES
('PNN-3', 'Sawit 4', 2),
('PNN-4', 'Palm Oil', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `inc` int(9) NOT NULL,
  `supplier_id` varchar(9) NOT NULL,
  `supplier_nama` varchar(90) NOT NULL,
  `supplier_alamat` varchar(90) NOT NULL,
  `supplier_kota` varchar(50) NOT NULL,
  `supplier_email` varchar(90) NOT NULL,
  `supplier_kontak` varchar(20) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`inc`, `supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_kota`, `supplier_email`, `supplier_kontak`) VALUES
(1, 'SPL-1', 'PT SUPPL 1', 'Jakartat lengkap', 'Jakarta', 'suppl@gmail.com', '555555555'),
(2, 'SPL-2', 'PT SUPPL 2', 'Jakarta 2', 'Jakarta 2', 'suppl2@gmail.com', '55555'),
(3, 'SPL-3', 'PT SUPPL 3', 'Jakartat lengkap', 'jakarta', 'd2@gmail.com', '0877111111111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_beli_detail`
--

CREATE TABLE IF NOT EXISTS `temp_beli_detail` (
  `beli_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_hasil_detail`
--

CREATE TABLE IF NOT EXISTS `temp_hasil_detail` (
  `hasil_id` varchar(9) NOT NULL,
  `panen_id` varchar(14) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_jual_detail`
--

CREATE TABLE IF NOT EXISTS `temp_jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `qty` smallint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_keluar_detail`
--

CREATE TABLE IF NOT EXISTS `temp_keluar_detail` (
  `keluar_id` varchar(9) NOT NULL,
  `panen_id` varchar(14) NOT NULL,
  `bruto` smallint(7) NOT NULL,
  `tarra` smallint(7) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `unit` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`unit_id`, `unit`) VALUES
(5, 'Kg'),
(6, 'Sak'),
(7, 'Pcs'),
(8, 'Set');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beli_detail`
--
ALTER TABLE `beli_detail`
  ADD CONSTRAINT `beli_detail_ibfk_1` FOREIGN KEY (`beli_id`) REFERENCES `beli` (`beli_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jual_detail`
--
ALTER TABLE `jual_detail`
  ADD CONSTRAINT `jual_detail_ibfk_1` FOREIGN KEY (`jual_id`) REFERENCES `jual` (`jual_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
