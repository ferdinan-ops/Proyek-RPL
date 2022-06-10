-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2022 pada 03.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdiskusi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `id_kategori`, `judul`, `isi`, `tgl`, `id_user`) VALUES
(12, 5, 'Apa yang harus dipersiapkan untuk UTS?', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo labore nisi in ea repudiandae blanditiis maiores obcaecati doloremque, voluptatem fuga quod accusamus modi iure cum natus. Minus natus nostrum sunt!\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Illo labore nisi in ea repudiandae blanditiis maiores obcaecati doloremque, voluptatem fuga quod accusamus modi iure cum natus. Minus natus nostrum sunt!\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Illo labore nisi in ea repudiandae blanditiis maiores obcaecati doloremque, voluptatem fuga quod accusamus modi iure cum natus. Minus natus nostrum sunt!', '2022-04-28', 5),
(32, 5, 'Bagaimana Cara Mengisi KRS dengan Baik dan Benar?', '<p style=\"text-align: justify; \"><span style=\"font-size: 12pt; line-height: 107%; font-family: &quot;Times New Roman&quot;, serif;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium,\r\niusto perferendis dicta debitis dolore reiciendis veritatis ut aliquid, dolorum\r\nipsum consectetur explicabo atque ullam eius non veniam animi deserunt minima.</span><span style=\"font-family: &quot;Times New Roman&quot;, serif; font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, iusto perferendis dicta debitis dolore reiciendis veritatis ut aliquid, dolorum ipsum consectetur explicabo atque ullam eius non veniam animi deserunt minima.</span><span style=\"font-family: &quot;Times New Roman&quot;, serif; font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, iusto perferendis dicta debitis dolore reiciendis veritatis ut aliquid, dolorum ipsum consectetur explicabo atque ullam eius non veniam animi deserunt minima.</span><span style=\"font-family: &quot;Times New Roman&quot;, serif; font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, iusto perferendis dicta debitis dolore reiciendis veritatis ut aliquid, dolorum ipsum consectetur explicabo atque ullam eius non veniam animi deserunt minima.</span><span style=\"font-family: &quot;Times New Roman&quot;, serif; font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, iusto perferendis dicta debitis dolore reiciendis veritatis ut aliquid, dolorum ipsum consectetur explicabo atque ullam eius non veniam animi deserunt minima.</span><span style=\"font-family: &quot;Times New Roman&quot;, serif; font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, iusto perferendis dicta debitis dolore reiciendis veritatis ut aliquid,&nbsp;</span></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;, serif; text-align: start;\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, iusto perferendis dicta debitis dolore reiciendis veritatis ut aliquid, dolorum ipsum consectetur explicabo atque ullam eius non veniam animi deserunt minima.</span><span style=\"font-family: &quot;Times New Roman&quot;, serif; font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><br></span><br></p>', '2022-06-02', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `id_berita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_komen`
--

CREATE TABLE `file_komen` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `id_komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nm_kategori`) VALUES
(1, 'Layanan'),
(2, 'Keamanan'),
(4, 'Teknologi'),
(5, 'Perkuliahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `komentar` text NOT NULL,
  `tgl` date NOT NULL,
  `id_berita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `pesan`) VALUES
(6, 'Bruce Banner', 'bruce.banner@gmail.com', 'Halo saya sangat terkesan dengan desain landing page ini, saya juga tertarik dengan fitur yang diberikan aplikasi ini kiranya saya ingin untuk bisa memiliki akun pada aplikasi ini. Terima Kasih🙏');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `nama_foto` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `email`, `telp`, `level`, `aktif`, `nama_foto`, `lokasi`) VALUES
(3, '200840007', '95c2e6314d0b0340114088b3e097c658', 'Ferdinan Imanuel Tumanggor', 'perdinantumanggor95@gmail.com', '082163240061', 'Mahasiswa', 'Y', 'ferdinan3.jpeg', 'assets/uploads/629842faf1050-ferdinan3.jpeg'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', '0821212121', 'admin', 'Y', 'foto.png', 'assets/uploads/foto.png'),
(5, '200840010', '253953ae107bfeeb19f71ef09ab63359', 'Dionisius Siahaan', 'dion@gmail.com', '082323232323', 'Mahasiswa', 'Y', 'foto.png', 'assets/uploads/foto.png'),
(7, '200840023', 'c4915d5340d75107f17ca53d4a88812d', 'Samuel Doli Hasian Manihuruk', 'samuel@gmail.com', '082323232323', 'Mahasiswa', 'Y', 'foto.png', 'assets/uploads/foto.png'),
(8, '200840030', '6b445ea2744fa7df622b341b2ba8cbb1', 'Fery Jonathan Sirait', 'fery@gmail.com', '082323232323', 'Mahasiswa', 'Y', 'foto.png', 'assets/uploads/foto.png'),
(9, '200840029', '4c9eb42f3fd48ad7c35988f8682ca1f2', 'Christ Jordan Baeha', 'christ@gmail.com', '082323232323', 'Mahasiswa', 'Y', 'foto.png', 'assets/uploads/foto.png'),
(10, '200840031', 'cf446887cb83a77bad62040a522d7361', 'Yosia Silalahi', 'yosia@gmail.com', '082323232323', 'Mahasiswa', 'Y', 'foto.jpg', 'assets/uploads/629856e619ccf-foto.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_berita` (`id_berita`);

--
-- Indeks untuk tabel `file_komen`
--
ALTER TABLE `file_komen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_komentar` (`id_komentar`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_berita` (`id_berita`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `file_komen`
--
ALTER TABLE `file_komen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`);

--
-- Ketidakleluasaan untuk tabel `file_komen`
--
ALTER TABLE `file_komen`
  ADD CONSTRAINT `file_komen_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `komentar` (`id`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
