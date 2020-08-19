-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2020 pada 14.10
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbakademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` char(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
('1234', 'Rifian Joe', 'rifian', '37202dbda06a14c31a21561ad1d5b7c7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` char(8) NOT NULL,
  `nama_dosen` varchar(30) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kode_mk` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `ttl`, `jk`, `alamat`, `kode_mk`) VALUES
('19671115', 'Eneng Sumeneng', '1990-01-20', 'P', 'Bandung', 'IFB2'),
('19771114', 'Dedi Sembako', '1970-06-12', 'L', 'Bali', 'IHP1'),
('19781112', 'Budi Stopers', '1980-03-03', 'L', 'Bandung', 'IKW1'),
('19801113', 'Cici Likers', '1989-08-08', 'P', 'Medan', 'SJJ1'),
('19901111', 'Andi Smokers', '1987-02-02', 'L', 'Bandung', 'TII1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` char(8) NOT NULL,
  `nama_fakultas` varchar(30) DEFAULT NULL,
  `id_jurusan` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `id_jurusan`) VALUES
('FAK1', 'Teknik dan Ilmu Komputer', 'IF1111'),
('FAK1', 'Teknik dan Ilmu Komputer', 'TI1111'),
('FAK2', 'Ilmu Sosial dan Ilmu Politik', 'IK1111'),
('FAK3', 'Fakultas Hukum', 'IH1111'),
('FAK4', 'Fakultas Sastra', 'SJ1111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` char(8) NOT NULL,
  `nama_jurusan` varchar(30) DEFAULT NULL,
  `id_fakultas` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `id_fakultas`) VALUES
('IF1111', 'Teknik Informatika', 'FAK1'),
('IH1111', 'Ilmu Hukum', 'FAK3'),
('IK1111', 'Ilmu Komunikasi', 'FAK2'),
('SJ1111', 'Sastra Jepang', 'FAK4'),
('TI1111', 'Teknik Industri', 'FAK1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama_mahasiswa` varchar(30) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `id_fakultas` char(8) NOT NULL,
  `id_jurusan` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `ttl`, `jk`, `alamat`, `id_fakultas`, `id_jurusan`) VALUES
('10116090', 'Fulan', '1998-09-27', 'P', 'Jakarta', 'FAK4', 'IF1111'),
('10117010', 'Ujang', '1999-08-19', 'L', 'Bandung', 'FAK3', 'IH1111'),
('10118013', 'Rifian Joe', '2000-07-05', 'L', 'Merauke', 'FAK1', 'IF1111'),
('10118426', 'Ajis', '2000-04-29', 'P', 'Padalarang', 'FAK1', 'TI1111'),
('10119101', 'Komara', '2001-05-10', 'P', 'Padalarang', 'FAK2', 'IK1111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `kode_mk` char(8) NOT NULL,
  `nama_mk` varchar(30) DEFAULT NULL,
  `sks` smallint(6) DEFAULT NULL,
  `semester` smallint(6) DEFAULT NULL,
  `id_jurusan` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`kode_mk`, `nama_mk`, `sks`, `semester`, `id_jurusan`) VALUES
('IFB2', 'Basis Data 2', 4, 4, 'IF1111'),
('IHP1', 'PKN 1', 3, 3, 'IH1111'),
('IKW1', 'Pemrograman Web 2', 3, 2, 'IK1111'),
('SJJ1', 'Bahasa Jepang 1', 3, 1, 'SJ1111'),
('TII1', 'Bahasa Inggris 1', 2, 1, 'TI1111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL,
  `nim` char(8) NOT NULL,
  `nip` char(8) NOT NULL,
  `kode_mk` char(8) NOT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `nip`, `kode_mk`, `nilai`) VALUES
(1, '10117010', '19771114', 'IHP1', 82),
(2, '10118013', '19901111', 'IFB2', 90),
(3, '10118426', '19781112', 'TII1', 86),
(4, '10119101', '19801113', 'IKW1', 79),
(5, '10116090', '19781112', 'IHP1', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kode_mk` (`kode_mk`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`,`id_jurusan`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`,`id_fakultas`,`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_mk`,`id_jurusan`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `matkul` (`kode_mk`);

--
-- Ketidakleluasaan untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD CONSTRAINT `fakultas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kode_mk`) REFERENCES `matkul` (`kode_mk`),
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
