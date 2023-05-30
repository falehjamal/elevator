-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Agu 2017 pada 01.23
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `lembaga` varchar(35) NOT NULL,
  `tanggal` date NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal2` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `nama`, `lembaga`, `tanggal`, `no_tlp`, `user_id`, `keterangan`, `tanggal2`, `email`) VALUES
(44, 'dbajh', 'hjb', '2017-07-14', '878', 1, 'jkjkjk', '29-07-2017', 'dakmk@kjkj.comm'),
(45, 'muha', 'kepo', '2017-01-01', '92929', 1, 'ini adalah keterangan', '29-07-2017', 'email@email.com'),
(46, 'faleh jamal', 'smk umar fatah', '2015-11-03', '089649727851', 2, 'keterangan', '30-07-2017', 'falehdewe.fj@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `lembaga` varchar(40) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_instruktur` varchar(25) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `nama`, `tanggal`, `tempat`, `foto`, `lembaga`, `jumlah`, `nama_instruktur`, `jenis_id`, `status_id`, `user_id`, `date`) VALUES
(127, 'Nikah massal', '2017-08-14', 'Mlagen village', 'foto.jpg', 'smk umar fatah', 150, 'joko winarto', 3, 1, 1, '2017-07-31'),
(130, 'kjkjjkjkjk', '2017-01-01', 'kllklk', 'gambar7.jpg', 'djdbjhb', 8, 'jkj', 3, 1, 1, '04-08-2017'),
(131, 'nh', '2017-08-21', 'mmm', 'dd.jpg', 'djk', 9, 'kj', 3, 1, 2, '21-20-2019'),
(132, 'hh', '2017-01-01', 'jkkj', 'gambar11.jpg', 'hjjh', 87, 'hj', 3, 1, 2, '03-08-2017'),
(133, 'sahbdjhabs', '2017-01-01', 'kj', 'gambar12.jpg', 'khkh', 11111, 'jh', 4, 2, 1, '2017-08-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_event`
--

CREATE TABLE `jenis_event` (
  `id` int(11) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_event`
--

INSERT INTO `jenis_event` (`id`, `jenis`) VALUES
(3, 'Pameran'),
(4, 'Workshop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jk`
--

CREATE TABLE `jk` (
  `id` int(11) NOT NULL,
  `jk` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jk`
--

INSERT INTO `jk` (`id`, `jk`) VALUES
(2, 'laki laki'),
(3, 'perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(18, 'Pelayaran'),
(19, 'Rpl'),
(20, 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projek`
--

CREATE TABLE `projek` (
  `id` int(11) NOT NULL,
  `nama_id` int(11) NOT NULL,
  `projek` varchar(20) NOT NULL,
  `pembimbing` varchar(20) NOT NULL,
  `status` enum('sedang proses','selesai') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `projek`
--

INSERT INTO `projek` (`id`, `nama_id`, `projek`, `pembimbing`, `status`, `user_id`) VALUES
(5, 95, 'magang', 'uli albab', 'selesai', 2),
(6, 106, 'kjdsndfkj', 'ndakjn', 'sedang proses', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `profil` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `alamat`, `profil`, `user_id`) VALUES
(1, 'SMP Umar Fatah Rembang', 'KJB', 'k1', 1),
(2, 'smk umar fatah ', 'Rembang', 'jl', 1),
(3, 'kj', 'jk', 'jk', 1),
(5, 'SMP IKITAS01', 'bedan ngisor', 'kepoo deh', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `foto`, `nama`, `sekolah_id`, `jurusan_id`, `tgl_masuk`, `tgl_keluar`, `jk_id`, `user_id`) VALUES
(95, 'gambar5.jpg', '$nama', 1, 20, '0000-00-00', '0000-00-00', 2, 2),
(106, 'gambar7.jpg', 'arifin', 1, 18, '2017-08-25', '2017-08-25', 2, 1),
(107, 'gambar11.jpg', 'falehjamaluddin', 1, 18, '2017-08-17', '2017-08-11', 2, 1),
(115, 'gambar2.jpg', 'fnjksnsjkndf', 2, 19, '2017-08-15', '2017-08-15', 2, 2),
(129, 'gambar65.jpg', 'nopa aryanto', 1, 18, '2017-08-26', '2017-08-18', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Diterima'),
(2, 'Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `lembaga` varchar(40) NOT NULL,
  `no_surat` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `prihal` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `lembaga`, `no_surat`, `tanggal_surat`, `status_id`, `prihal`, `user_id`, `file`, `date`) VALUES
(151, 'smk negriku indonesiaku', 1, '2017-07-21', 1, 'hbj', 1, 'Ikitas.pdf', '31-07-2017'),
(152, 'smk bina nggotraniiiii', 112, '2017-07-08', 2, 'jjj', 1, 'gambar2.jpg', '31-07-2017'),
(154, 'required', 82, '2017-07-15', 1, 'nn', 1, 'gambar109.jpg', '31-07-2017'),
(155, 'j', 999, '2017-08-25', 1, 'jjk', 1, 'gambar2.jpg', '04-08-2017'),
(156, 'smk umar fatah', 7778, '2017-08-18', 1, 'jbhbhbhb', 1, 'gambar12.jpg', '03-08-2017'),
(159, 'k', 9, '2017-01-01', 1, 'j', 2, 'gambar11.jpg', '03-08-2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level_id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `nama_lengkap`, `username`, `password`, `level_id`, `date`) VALUES
(1, 'admin@ikitas.com', 'Ulil albab', 'admin', 'ad001', 1, '30-07-2017'),
(2, 'ufa15002@smktiufa.sch.id', 'falehjamaluddin', 'siswa001', 's001', 2, '2017-05-07'),
(3, 'falehdewe.fj@gmail.com', 'Ahmad faleh jamaluddin', 'falehjamaluddin', 'ping google.com', 1, '30-07-2017'),
(4, 'email@email.com', 'anonymous', 'an', 'an001', 2, '03-08-2017'),
(5, 'email1@email.com', 'muha', 'muha ', 'muha23', 2, '03-08-2017'),
(6, 'q@gmail.com', 'muhaa', 'faleh', 'jamal', 2, '03-08-2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indexes for table `jenis_event`
--
ALTER TABLE `jenis_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jk`
--
ALTER TABLE `jk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projek`
--
ALTER TABLE `projek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_id` (`nama_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_id` (`sekolah_id`),
  ADD KEY `jurusan_id` (`jurusan_id`),
  ADD KEY `jk_id` (`jk_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `jenis_event`
--
ALTER TABLE `jenis_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jk`
--
ALTER TABLE `jk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projek`
--
ALTER TABLE `projek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD CONSTRAINT `buku_tamu_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `projek`
--
ALTER TABLE `projek`
  ADD CONSTRAINT `projek_ibfk_1` FOREIGN KEY (`nama_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`jk_id`) REFERENCES `jk` (`id`),
  ADD CONSTRAINT `siswa_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `surat_masuk_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
