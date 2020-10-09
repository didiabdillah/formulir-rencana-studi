-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2020 pada 03.25
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `frs`
--

CREATE TABLE `frs` (
  `id` int(11) NOT NULL,
  `no_frs` int(9) UNSIGNED ZEROFILL NOT NULL,
  `nim` int(7) UNSIGNED ZEROFILL NOT NULL,
  `kode_matkul` varchar(5) NOT NULL,
  `tahun_akademik` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `frs`
--

INSERT INTO `frs` (`id`, `no_frs`, `nim`, `kode_matkul`, `tahun_akademik`) VALUES
(1, 091421001, 0200301, 'MK001', '2021/2022'),
(2, 091421001, 0200301, 'MK002', '2021/2022'),
(3, 091421002, 0200302, 'MK001', '2021/2022'),
(4, 091421002, 0200302, 'MK002', '2021/2022'),
(5, 091421002, 0200302, 'MK003', '2021/2022'),
(6, 091421003, 0210701, 'MK002', '2021/2022'),
(7, 091421004, 0210702, 'MK001', '2021/2022'),
(10, 000000069, 1803009, 'MK001', '2018/2019'),
(11, 000000069, 1803009, 'MK002', '2018/2019'),
(12, 000000069, 1803009, 'MK003', '2018/2019'),
(14, 000000069, 1803009, 'MK069', '2018/2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(7) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_masuk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `gender`, `tanggal_lahir`, `tahun_masuk`) VALUES
(1, 0200301, 'Adi Hidayat', 'Laki-Laki', '2002-12-12', 2021),
(2, 0200302, 'Cahyani Sulistyowati', 'Perempuan', '2001-05-05', 2021),
(3, 0210701, 'Rendi Carmadi', 'Laki-Laki', '2003-08-14', 2021),
(4, 0210702, 'Raras Cinderalas', 'Perempuan', '2004-01-10', 2021),
(6, 1803009, 'Didi Abdillah', 'Laki-Laki', '2001-07-25', 2018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kode_matakuliah` varchar(5) NOT NULL,
  `nama_matakuliah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_matakuliah`, `nama_matakuliah`) VALUES
(1, 'MK001', 'Algoritma dan Struktur Data'),
(2, 'MK002', 'Pemrograman Web'),
(3, 'MK003', 'Pemrograman Berorientasi Objek'),
(6, 'MK069', 'Jaringan Komputer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `frs`
--
ALTER TABLE `frs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_matkul` (`kode_matkul`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_matakuliah` (`kode_matakuliah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `frs`
--
ALTER TABLE `frs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `frs`
--
ALTER TABLE `frs`
  ADD CONSTRAINT `frs_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matakuliah`),
  ADD CONSTRAINT `frs_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
