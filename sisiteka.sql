-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2023 pada 13.30
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisiteka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(6) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `email_dosen`, `foto`) VALUES
('122275', 'Ahmadi Irmansyah Lubis, S.Kom., M.Kom.', 'ahmadi@polibatam.ac.id', 'ahmadi.jpg'),
('122279', 'Alena Uperiati, S.T., M.Cs', 'alena@polibatam.ac.id', 'alena.jpg'),
('100017', 'Dr. Metta Santiputri, S.T., M.Sc, Ph.D', 'metta@gmail.com', 'meta.jpg'),
('117175', 'Hamdani Arif, S.Pd., M.Sc', 'hamdaniarif@polibatam.ac.id', 'arif.jpg'),
('122277', 'Noper Ardi, S.Pd., M.Eng', 'noperardi@polibatam.ac.id', 'noper.jpg'),
('121246', 'Siskha Handayani M.Si', 'siskha@polibatam.ac.id', 'siska.jpg'),
('113105', 'Supardianto, M.Eng.', 'supardianto@polibatam.ac.id', 'supar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `email_mahasiswa` varchar(100) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `email_mahasiswa`, `kode_kelas`, `prodi`, `foto`) VALUES
('12345678', 'Anak Kelas A', 'anakkelasa@gmaIl.com', 'TRPL-1A', 'Teknologi Rekayasa Perangkat Lunak', 'profile.png'),
('1234567', 'Anak Kelas C', 'anakkelasc@gmaIl.com', 'TRPL-1C', 'Teknologi Rekayasa Perangkat Lunak', 'profile.png'),
('4342201036', 'Disa Ufairah Rangkuti', 'disa@gmail.com', 'TRPL-1B', 'Teknologi Rekayasa Perangkat Lunak', 'disa.jpg'),
('4342201032', 'Geovanno Ardy Wicaksana', 'geovanno@gmaIl.com', 'TRPL-1B', 'Teknologi Rekayasa Perangkat Lunak', 'dage.png'),
('4342201034', 'Marcella Corazon', 'marcella@gmaIl.com', 'TRPL-1B', 'Teknologi Rekayasa Perangkat Lunak', 'profile.png'),
('4342201033', 'Naufal Arig Dzaki', 'naufal@gmail.com', 'TRPL-1B', 'Teknologi Rekayasa Perangkat Lunak', 'naufal.jpg'),
('4342201035', 'Nofira Rahmadani', 'nofira@gmail.com', 'TRPL-1B', 'Teknologi Rekayasa Perangkat Lunak', 'nofira.jpg'),
('4342201031', 'Noris Parompon', 'noris@gmail.com', 'TRPL-1B', 'Teknologi Rekayasa Perangkat Lunak', 'noris.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `kode_dosen` varchar(6) NOT NULL,
  `gambar_mk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `kode_dosen`, `gambar_mk`) VALUES
('RPL-102', 'Algoritma dan Pemrograman', '117175', 'alpro.jpeg'),
('RPL-105', 'Pemrograman Berbasis Web', '122277', 'web.jpeg'),
('RPL-106', 'Pengantar Basis Data', '122275', 'basdat.jpeg'),
('RPL101', 'Pengantar Rekayasa Perangkat Lunak', '100017', 'prpl.jpeg'),
('RPL103', 'Matematika Diskrit', '121246', 'math.jpeg'),
('RPL104', 'Analisis dan spesifikasi kebutuhan perangkat lunak', '122279', 'analis.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `data_kehadiran` varchar(5) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `kode_dosen` varchar(6) NOT NULL,
  `tanggal_presensi` varchar(100) NOT NULL,
  `waktu_presensi` varchar(100) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `id_presensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`data_kehadiran`, `nama_mk`, `kode_mk`, `nim`, `nama_mahasiswa`, `kode_dosen`, `tanggal_presensi`, `waktu_presensi`, `kode_kelas`, `id_presensi`) VALUES
('Alfa', 'Analisis dan spesifikasi kebutuhan perangkat lunak', 'RPL104', '4342201032', 'Geovanno Ardy Wicaksana', '122279', '1/3/2023', '5:41:19 AM', 'TRPL-1B', 2),
('Hadir', 'Pengantar Rekayasa Perangkat Lunak', 'RPL101', '4342201031', 'Noris Parompon', '100017', '1/3/2023', '10:53:01 PM', 'TRPL-1B', 7),
('Hadir', 'Pengantar Rekayasa Perangkat Lunak', 'RPL101', '4342201035', 'Nofira Rahmadani', '100017', '1/3/2023', '10:53:25 PM', 'TRPL-1B', 8),
('Sakit', 'Pengantar Rekayasa Perangkat Lunak', 'RPL101', '1234567', 'Anak Kelas C', '100017', '1/3/2023', '11:12:34 PM', 'TRPL-1C', 10),
('Izin', 'Pengantar Rekayasa Perangkat Lunak', 'RPL101', '12345678', 'Anak Kelas A', '100017', '1/3/2023', '11:13:08 PM', 'TRPL-1A', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_pengguna` varchar(10) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_pengguna`, `nama_pengguna`, `password`, `level`) VALUES
('100017', 'Dr. Metta Santiputri, S.T., M.Sc, Ph.D', '1', 'dosen'),
('113105', 'Supardianto, M.Eng.', '123', 'dosen'),
('117175', 'Hamdani Arif, S.Pd., M.Sc', '123', 'dosen'),
('121246', 'Siskha Handayani M.Si', '123', 'dosen'),
('122275', 'Ahmadi Irmansyah Lubis, S.Kom., M.Kom.', '123', 'dosen'),
('122277', 'Noper Ardi, S.Pd., M.Eng', '123', 'dosen'),
('122279', 'Alena Uperiati, S.T., M.Cs', '123', 'dosen'),
('1234567', 'Anak Kelas C', '123', 'mahasiswa'),
('12345678', 'Anak Kelas A', '123', 'mahasiswa'),
('4342201031', 'Noris Parompon', '123', 'mahasiswa'),
('4342201032', 'Geovanno Ardy Wicaksana', '1', 'mahasiswa'),
('4342201033', 'Naufal Arig Dzaki', '123', 'mahasiswa'),
('4342201034', 'Marcella Corazon', '123', 'mahasiswa'),
('4342201035', 'Nofira Rahmadani', '123', 'mahasiswa'),
('4342201036', 'Disa Ufairah Rangkuti', '123', 'mahasiswa'),
('admin', 'ADMIN GENNO', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nama_dosen`),
  ADD KEY `dosen` (`nidn`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nama_mahasiswa`,`kode_kelas`) USING BTREE,
  ADD KEY `mahasiswa` (`nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`,`nama_mk`),
  ADD KEY `kode_dosen` (`kode_dosen`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `absen_mhs` (`nim`,`nama_mahasiswa`,`kode_kelas`),
  ADD KEY `absen_ds` (`kode_dosen`),
  ADD KEY `absen_mk` (`kode_mk`,`nama_mk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen` FOREIGN KEY (`nidn`) REFERENCES `user` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa` FOREIGN KEY (`nim`) REFERENCES `user` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `kode_dosen` FOREIGN KEY (`kode_dosen`) REFERENCES `dosen` (`nidn`);

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `absen_ds` FOREIGN KEY (`kode_dosen`) REFERENCES `dosen` (`nidn`),
  ADD CONSTRAINT `absen_mhs` FOREIGN KEY (`nim`,`nama_mahasiswa`,`kode_kelas`) REFERENCES `mahasiswa` (`nim`, `nama_mahasiswa`, `kode_kelas`),
  ADD CONSTRAINT `absen_mk` FOREIGN KEY (`kode_mk`,`nama_mk`) REFERENCES `matakuliah` (`kode_mk`, `nama_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
