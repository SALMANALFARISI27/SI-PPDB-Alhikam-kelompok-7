-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2026 pada 06.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alhikam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `kode_rahasia` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`, `kode_rahasia`, `gambar`) VALUES
(11, 'salman', 'salman12345@gmail.com', 'salman', '85bc9efdc25da6cc4877c4ce279eee8a145c0811', NULL, '1774411626_20ed7bae8c8d870bee63.png'),
(13, 'ZAMHARI', 'zamharihakim35@gmail.com', 'ZAMHARI', 'af2851f060cb28e6d5b369a5d60caa9976e180ae', NULL, '1774838954_e8c201a212543307de0e.jpeg'),
(14, 'salman alfarisi', 'salmanlaptop12345@gmail.com', 'salman123', 'feb532fe00991403077e6607e1aff260c9774b7a', '', '1775219601_4bfe50318439ff5e7437.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `jenis_akun` varchar(20) NOT NULL,
  `status_akun` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `kode_akun` varchar(255) NOT NULL,
  `link_reset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `jenis_akun`, `status_akun`, `username`, `email`, `password`, `telepon`, `kode_akun`, `link_reset`) VALUES
(30, 'Pendaftar', 'Aktif', 'Salman Alfarisi', 'salmanlaptop12345@gmail.com', '0080ce0aa4e8e88828fd8897653536cd92579c9c', '0895708824646', 'NNHYZLTICKSIIGV9PHJZXLVRN4IB7UBOMXJ1FSY4T4WCKPM6BTAF8KBT7YDSURS5', 'NNHYZLTICKSIIGV9PHJZXLVRN4IB7UBOMXJ1FSY4T4WCKPM6BTAF8KBT7YDSURS5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `ringkasan` varchar(500) NOT NULL,
  `isi` text NOT NULL,
  `status_berita` varchar(20) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_admin`, `id_kategori`, `slug_berita`, `judul_berita`, `ringkasan`, `isi`, `status_berita`, `jenis_berita`, `gambar`, `hits`, `urutan`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(1, 13, 10, 'smp-nusantara-cipunagara-pesantren-al-hikamussalafie-membuka-penerimaan-siswa-baru-tahun-ajaran-20262027', 'SMP Nusantara Cipunagara & Pesantren Al-Hikamussalafie Membuka Penerimaan Siswa Baru Tahun Ajaran 2026/2027', 'SMP Nusantara Cipunagara bersama Pesantren Al-Hikamussalafie resmi membuka penerimaan siswa baru tahun ajaran 2026/2027. Kesempatan ini terbuka bagi calon siswa yang ingin mendapatkan pendidikan terpadu antara ilmu pengetahuan dan pendidikan pesantren.', '<p>SMP Nusantara Cipunagara bersama Pesantren Al-Hikamussalafie secara resmi membuka Penerimaan Peserta Didik Baru (PPDB) untuk tahun ajaran 2026/2027. Program ini memberikan kesempatan bagi para calon siswa untuk memperoleh pendidikan yang seimbang antara ilmu pengetahuan umum dan pendidikan agama dalam lingkungan yang kondusif dan islami.</p>\r\n\r\n<p>Pendaftaran dapat dilakukan secara online maupun langsung ke sekolah sesuai dengan jadwal yang telah ditentukan. Calon siswa akan melalui beberapa tahapan seleksi, mulai dari pengisian formulir, verifikasi berkas, hingga tes seleksi sesuai ketentuan yang berlaku.</p>\r\n\r\n<p>SMP Nusantara Cipunagara menawarkan sistem pendidikan terpadu yang menggabungkan kurikulum nasional dengan pembinaan karakter berbasis pesantren. Siswa tidak hanya dibekali kemampuan akademik, tetapi juga pendidikan akhlak, kedisiplinan, serta pembiasaan ibadah dalam kehidupan sehari-hari di lingkungan Pesantren Al-Hikamussalafie.</p>\r\n\r\n<p>Selain itu, tersedia berbagai program unggulan seperti kegiatan ekstrakurikuler, pembinaan tahfidz Al-Qur’an, serta pengembangan bakat dan minat siswa di berbagai bidang. Fasilitas yang memadai serta tenaga pengajar yang profesional menjadi pendukung utama dalam menciptakan suasana belajar yang nyaman dan berkualitas.</p>\r\n\r\n<p>SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie juga memberikan kesempatan bagi siswa berprestasi untuk mendapatkan program pembinaan khusus sebagai bentuk dukungan terhadap potensi akademik maupun non-akademik.</p>\r\n\r\n<p>Dengan dibukanya PPDB tahun ajaran 2026/2027 ini, diharapkan dapat menjaring generasi muda yang siap menjadi pribadi unggul, berilmu, dan berakhlak mulia. Segera daftarkan diri Anda dan jadilah bagian dari keluarga besar SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie.</p>', 'Publish', 'Berita', '1774842254_ec09307ed3a2b766f146.jpeg', 8, 0, '2024-01-17 04:50:05', '2026-03-30 04:49:00', '2026-03-30 05:12:15'),
(2, 11, 10, 'sejarah-pondok-pesantren-al-hikamussalafie', 'SEJARAH PONDOK PESANTREN AL-HIKAMUSSALAFIE', 'Sejarah Pondok Pesantren Al-Hikamussalafie', '<section id=\"profil-pesantren\" style=\"max-width: 1100px; margin: 0 auto; font-family: \'Segoe UI\', \'Poppins\', system-ui, -apple-system, sans-serif; background: #ffffff; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); overflow: hidden;\">\r\n    \r\n    <!-- Header dengan latar gradien hijau -->\r\n    <header style=\"background: linear-gradient(135deg, #1e6b3e, #0f4a2a); padding: 45px 30px 40px; text-align: center; color: white;\">\r\n        <div style=\"font-size: 48px; margin-bottom: 15px;\">\r\n            <i class=\"fas fa-mosque\" style=\"background: rgba(255,255,255,0.15); padding: 12px 20px; border-radius: 60px;\"></i>\r\n        </div>\r\n    <h1 style=\"font-size: 2.2rem; margin: 0 0 12px 0; font-weight: 700; letter-spacing: -0.5px; color: white;\">\r\n    Pondok Pesantren Al Hikamussalafie\r\n</h1>\r\n        <p style=\"font-size: 0.95rem; opacity: 0.9; margin: 0; border-top: 1px solid rgba(255,255,255,0.3); display: inline-block; padding-top: 12px;\">\r\n            <i class=\"fas fa-quote-left\"></i> \"Mencetak Generasi Berilmu, Beriman, dan Berakhlakul Karimah\" <i class=\"fas fa-quote-right\"></i>\r\n        </p>\r\n    </header>\r\n\r\n    <!-- Badge info singkat -->\r\n    <div style=\"display: flex; flex-wrap: wrap; gap: 16px; background: #fef9ef; padding: 18px 28px; border-bottom: 1px solid #e9e0d0;\">\r\n        <div style=\"display: flex; align-items: center; gap: 10px;\">\r\n            <span style=\"background: #1e6b3e; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-calendar-alt\"></i></span>\r\n            <span><strong style=\"color: #2c5a3a;\">Berdiri:</strong> 14 Januari 1996 M / 23 Sya\'ban 1416 H</span>\r\n        </div>\r\n        <div style=\"display: flex; align-items: center; gap: 10px;\">\r\n            <span style=\"background: #1e6b3e; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-map-marker-alt\"></i></span>\r\n            <span><strong style=\"color: #2c5a3a;\">Lokasi:</strong> Kampung Tanjungsari, Cipunagara, Subang</span>\r\n        </div>\r\n        <div style=\"display: flex; align-items: center; gap: 10px;\">\r\n            <span style=\"background: #1e6b3e; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-history\"></i></span>\r\n            <span><strong style=\"color: #2c5a3a;\">Nama Awal:</strong> Ponpes Syarif Hidayatullah</span>\r\n        </div>\r\n    </div>\r\n\r\n    <!-- Konten Sejarah Utama -->\r\n    <article style=\"padding: 35px 32px; line-height: 1.85; color: #2c3e2f; background: #fffefb;\">\r\n        \r\n        <!-- Paragraf 1: Berdiri & nama awal -->\r\n        <p style=\"margin-bottom: 20px; font-size: 1rem; text-align: justify;\">\r\n            <strong style=\"color: #1f6e43; font-size: 1.05rem;\"><i class=\"fas fa-landmark\"></i> Pondok Pesantren Al Hikamussalafie</strong> merupakan lembaga pendidikan Islam yang berdiri pada hari \r\n            <span style=\"background: #e8f0e5; padding: 2px 10px; border-radius: 20px; font-weight: 600;\"><i class=\"fas fa-moon\"></i> Ahad, 23 Sya\'ban 1416 H</span>, \r\n            bertepatan dengan tanggal <span style=\"background: #e8f0e5; padding: 2px 10px; border-radius: 20px; font-weight: 600;\"><i class=\"fas fa-sun\"></i> 14 Januari 1996 M</span>. \r\n            Pada awal berdirinya, pesantren ini menggunakan nama <strong style=\"color: #b95f1a;\"><i class=\"fas fa-tag\"></i> Pondok Pesantren Syarif Hidayatullah</strong>.\r\n        </p>\r\n\r\n        <!-- Paragraf 2: Latar belakang kondisi masyarakat -->\r\n        <p style=\"margin-bottom: 20px; text-align: justify;\">\r\n            <i class=\"fas fa-place-of-worship\"></i> Latar belakang berdirinya pesantren ini tidak terlepas dari kondisi masyarakat pada saat itu. Di wilayah \r\n            <strong><i class=\"fas fa-location-dot\"></i> Kampung Tanjungsari RT 21 RW 07, Desa Tanjung, Kecamatan Cipunagara, Kabupaten Subang</strong>, \r\n            masih terdapat berbagai praktik kemusyrikan yang cukup kuat. Salah satunya adalah adanya kepercayaan masyarakat terhadap \r\n            sebuah sumur keramat yang dikenal dengan sebutan <strong style=\"color: #b95f1a;\"><i class=\"fas fa-water\"></i> Sumur Kidul</strong>. \r\n            Banyak masyarakat yang datang untuk melakukan ritual tertentu di tempat tersebut.\r\n        </p>\r\n\r\n        <!-- Box khusus: Fenomena Sumur Kidul & Kesurupan -->\r\n        <div style=\"background: linear-gradient(115deg, #fef5e6, #fffaf0); border-left: 5px solid #d49b3a; border-radius: 20px; padding: 20px 25px; margin: 28px 0; display: flex; gap: 18px; flex-wrap: wrap;\">\r\n            <div style=\"font-size: 2.2rem; min-width: 55px; text-align: center;\">\r\n                <i class=\"fas fa-hands-praying\" style=\"color: #b45f2a;\"></i>\r\n            </div>\r\n            <div style=\"flex: 1;\">\r\n                <h4 style=\"margin: 0 0 8px 0; color: #b45f2a; font-size: 1.2rem;\"><i class=\"fas fa-exclamation-triangle\"></i> Fenomena Sumur Kidul & Kesurupan Massal</h4>\r\n                <p style=\"margin: 0; line-height: 1.65; text-align: justify;\">\r\n                    <i class=\"fas fa-cloud-moon\"></i> Pada masa itu juga sering terjadi peristiwa kesurupan yang hampir terjadi setiap malam, bahkan dalam satu malam bisa mencapai dua hingga tiga orang. \r\n                    Selain itu, hampir setiap bulan terdapat kabar duka dengan meninggalnya beberapa warga. \r\n                    Kondisi tersebut menimbulkan keresahan mendalam di tengah masyarakat.\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Paragraf 3: Santri berjuang -->\r\n        <p style=\"margin-bottom: 20px; text-align: justify;\">\r\n            <i class=\"fas fa-quran\"></i> Para santri yang pada waktu itu berusaha menghadapi kondisi tersebut dengan membaca Al-Qur\'an dan melakukan berbagai amalan keagamaan. \r\n            Namun usaha tersebut sering kali tidak dihargai oleh sebagian masyarakat, bahkan keberadaan santri dan kegiatan keagamaan yang dilakukan kurang mendapat perhatian.\r\n        </p>\r\n\r\n        <!-- Paragraf 4: Tekad mendirikan pesantren -->\r\n        <p style=\"margin-bottom: 20px; text-align: justify;\">\r\n            <i class=\"fas fa-heart\" style=\"color: #e67e22;\"></i> Melihat kondisi tersebut, muncul tekad dan doa yang kuat kepada Allah SWT agar diberikan jalan untuk memperbaiki keadaan masyarakat melalui pendidikan agama. \r\n            Dari sinilah lahir keputusan untuk mendirikan sebuah <strong><i class=\"fas fa-mosque\"></i> pondok pesantren</strong> yang menjadi pusat pembelajaran ilmu agama Islam dan pembinaan akhlak bagi masyarakat sekitar.\r\n        </p>\r\n\r\n        <!-- Paragraf 5: Awal kegiatan di rumah orang tua (icon rumah di tengah) -->\r\n        <div style=\"background: #f4f0e8; border-radius: 24px; padding: 18px 24px; margin: 25px 0;\">\r\n            <div style=\"text-align: center; margin-bottom: 15px;\">\r\n                <div style=\"font-size: 2.5rem; display: inline-block; background: #e6d9c6; width: 70px; height: 70px; line-height: 70px; text-align: center; border-radius: 50%;\">\r\n                    <i class=\"fas fa-home\" style=\"color: #2d6a4f;\"></i>\r\n                </div>\r\n            </div>\r\n            <div>\r\n                <p style=\"margin: 0 0 8px 0; font-weight: 700; color: #2d6a4f; text-align: center; font-size: 1.1rem;\">\r\n                    <i class=\"fas fa-chalkboard-user\"></i> Awal Kegiatan Belajar Mengajar\r\n                </p>\r\n                <p style=\"margin: 6px 0 0 0; text-align: justify;\">\r\n                    Pada masa awal berdirinya, kegiatan belajar mengajar pesantren dilaksanakan di rumah orang tua pendiri, yaitu \r\n                    <strong><i class=\"fas fa-user-graduate\"></i> Bapak H. Mohammad Nur bin Sukrad</strong> dan <strong><i class=\"fas fa-user-graduate\"></i> Ibu Hj. Siti Wasri binti Saryad</strong>. \r\n                    Dari tempat sederhana inilah proses pendidikan Islam dimulai dengan penuh keikhlasan dan semangat dakwah.\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Paragraf 6: Perkembangan pesantren -->\r\n        <p style=\"margin-bottom: 20px; text-align: justify;\">\r\n            <i class=\"fas fa-chart-line\"></i> Seiring berjalannya waktu, kegiatan pendidikan di pesantren berjalan dengan baik dan mendapat dukungan dari masyarakat. \r\n            Para santri mulai berdatangan untuk menimba ilmu agama, khususnya dalam mempelajari \r\n            <strong><i class=\"fas fa-book-quran\"></i> Al-Qur\'an</strong> dan <strong><i class=\"fas fa-book\"></i> kitab-kitab klasik (kitab kuning)</strong> dengan metode pembelajaran khas pesantren salaf.\r\n        </p>\r\n\r\n        <!-- Perubahan Nama (Feature Card) -->\r\n        <div style=\"background: #e6e2d6; border-radius: 28px; padding: 25px; text-align: center; margin: 35px 0;\">\r\n            <div style=\"font-size: 0.9rem; color: #6f4f2a;\"><i class=\"fas fa-tags\"></i> Transformasi Identitas</div>\r\n            <div style=\"font-size: 1.1rem; text-decoration: line-through; opacity: 0.7; margin: 10px 0 5px;\"><i class=\"fas fa-mosque\"></i> Pondok Pesantren Syarif Hidayatullah</div>\r\n            <div style=\"font-size: 1.8rem; font-weight: 800; color: #1e6b3e; margin: 8px 0;\"><i class=\"fas fa-arrow-down\"></i> <i class=\"fas fa-arrow-down\"></i> <i class=\"fas fa-arrow-down\"></i></div>\r\n            <div style=\"font-size: 1.5rem; font-weight: 800; color: #2a5a3a; letter-spacing: 1px;\"><i class=\"fas fa-star-and-crescent\"></i> Pondok Pesantren Al Hikamussalafie</div>\r\n            <div style=\"margin-top: 15px;\">\r\n                <span style=\"background: #fff1e0; padding: 6px 18px; border-radius: 40px; font-size: 0.8rem; font-weight: 500;\">\r\n                    <i class=\"far fa-calendar-alt\"></i> 10 Januari 2015 M · 19 Rabiul Awal 1436 H\r\n                </span>\r\n            </div>\r\n            <p style=\"margin-top: 14px; font-size: 0.85rem; color: #5a3e20;\">\r\n                <i class=\"fas fa-gem\"></i> Perubahan nama ini dilakukan sebagai bagian dari pengembangan lembaga dan identitas pesantren yang lebih kuat dalam menjaga tradisi keilmuan Islam salaf.\r\n            </p>\r\n        </div>\r\n\r\n        <!-- Paragraf 7: Yayasan & Unit Pendidikan -->\r\n        <p style=\"margin-bottom: 20px; text-align: justify;\">\r\n            <i class=\"fas fa-church\"></i> Hingga saat ini, Pondok Pesantren Al Hikamussalafie terus berkembang dan berperan aktif dalam bidang pendidikan dan dakwah. \r\n            Lembaga ini berada di bawah naungan <strong style=\"color: #1f6e43;\"><i class=\"fas fa-building\"></i> Yayasan Al Hikamussalafie</strong> yang menaungi beberapa unit pendidikan, \r\n            di antaranya Pondok Pesantren Al Hikamussalafie serta <strong style=\"color: #1f6e43;\"><i class=\"fas fa-school\"></i> SMP Nusantara Cipunagara</strong>.\r\n        </p>\r\n\r\n        <!-- Grid: Kurikulum & Metode Pengajaran -->\r\n        <div style=\"display: flex; gap: 24px; flex-wrap: wrap; margin: 40px 0 30px;\">\r\n            <div style=\"flex: 1; min-width: 260px; background: #faf7f0; border-radius: 20px; padding: 22px 20px; border: 1px solid #e5d9c8;\">\r\n                <h3 style=\"color: #2a6b47; margin-top: 0; display: flex; align-items: center; gap: 10px;\">\r\n                    <i class=\"fas fa-book\" style=\"font-size: 1.6rem;\"></i> Kurikulum Salaf\r\n                </h3>\r\n                <ul style=\"list-style-type: none; padding-left: 0;\">\r\n                    <li style=\"margin-bottom: 10px;\"><i class=\"fas fa-check-circle\" style=\"color: #27ae60;\"></i> Kajian Kitab Klasik (Kitab Kuning)</li>\r\n                    <li style=\"margin-bottom: 10px;\"><i class=\"fas fa-check-circle\" style=\"color: #27ae60;\"></i> Tahsin & Tahfidz Al-Qur\'an</li>\r\n                    <li style=\"margin-bottom: 10px;\"><i class=\"fas fa-check-circle\" style=\"color: #27ae60;\"></i> Ilmu Alat: Nahwu & Shorof</li>\r\n                    <li style=\"margin-bottom: 10px;\"><i class=\"fas fa-check-circle\" style=\"color: #27ae60;\"></i> Dasar Keislaman: Fiqih, Tauhid, & Akhlak</li>\r\n                </ul>\r\n            </div>\r\n\r\n            <div style=\"flex: 1; min-width: 260px; background: #faf7f0; border-radius: 20px; padding: 22px 20px; border: 1px solid #e5d9c8;\">\r\n                <h3 style=\"color: #2a6b47; margin-top: 0; display: flex; align-items: center; gap: 10px;\">\r\n                    <i class=\"fas fa-chalkboard\" style=\"font-size: 1.6rem;\"></i> Metode Pengajaran\r\n                </h3>\r\n                <ul style=\"list-style-type: none; padding-left: 0;\">\r\n                    <li style=\"margin-bottom: 10px;\"><i class=\"fas fa-users\" style=\"color: #27ae60;\"></i> <strong>Bandongan:</strong> Pengajian kolektif</li>\r\n                    <li style=\"margin-bottom: 10px;\"><i class=\"fas fa-user-graduate\" style=\"color: #27ae60;\"></i> <strong>Sorogan:</strong> Bimbingan intensif perorangan</li>\r\n                    <li style=\"margin-bottom: 10px;\"><i class=\"fas fa-gavel\" style=\"color: #27ae60;\"></i> <strong>Disiplin:</strong> Pembinaan karakter & tanggung jawab</li>\r\n                </ul>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Sinergi Pendidikan Formal -->\r\n        <footer style=\"margin: 25px 0 20px; padding: 20px 28px; border-left: 6px solid #27ae60; background: #eef5ea; border-radius: 20px;\">\r\n            <h4 style=\"margin-top: 0; margin-bottom: 12px; color: #2c6e3c;\"><i class=\"fas fa-handshake\"></i> Sinergi Pendidikan Formal</h4>\r\n            <p style=\"margin: 0; line-height: 1.6; text-align: justify;\">\r\n                <i class=\"fas fa-building-columns\"></i> Di bawah naungan <strong>Yayasan Al Hikamussalafie</strong>, kami terus berinovasi tanpa meninggalkan tradisi. \r\n                Salah satu bentuk kontribusi nyata kami bagi masyarakat adalah pengembangan lembaga formal \r\n                <strong><i class=\"fas fa-school\"></i> SMP Nusantara Cipunagara</strong> yang berdiri pada 4 Januari 2022, serta terus mencetak generasi unggul yang berakar pada nilai-nilai pesantren.\r\n            </p>\r\n        </footer>\r\n\r\n        <!-- Komitmen Penutup -->\r\n        <div style=\"background: linear-gradient(105deg, #2f6b49, #1e543a); color: white; padding: 32px 28px; border-radius: 24px; text-align: center; margin-top: 25px;\">\r\n            <div style=\"font-size: 2rem; margin-bottom: 8px;\"><i class=\"fas fa-hands-helping\"></i></div>\r\n            <p style=\"font-size: 1rem; line-height: 1.6; margin: 0; font-weight: 500;\">\r\n                <i class=\"fas fa-star-and-crescent\"></i> Dengan berpegang pada nilai-nilai keislaman, tradisi pesantren salaf, serta semangat pendidikan, \r\n                Pondok Pesantren Al Hikamussalafie berkomitmen untuk terus mencetak generasi yang <strong><i class=\"fas fa-graduation-cap\"></i> berilmu, berakhlak mulia</strong>, \r\n                serta mampu memberikan manfaat bagi agama, masyarakat, dan bangsa. <i class=\"fas fa-star-and-crescent\"></i>\r\n            </p>\r\n        </div>\r\n\r\n        <!-- Footer informasi tambahan -->\r\n        <div style=\"margin-top: 35px; padding-top: 18px; border-top: 1px solid #e0d6c6; text-align: center; font-size: 0.7rem; color: #8b7a60; display: flex; flex-wrap: wrap; justify-content: center; gap: 24px;\">\r\n            <span><i class=\"fas fa-calendar-alt\"></i> Berdiri 1996 · Perubahan Nama 2015</span>\r\n            <span><i class=\"fas fa-building\"></i> Yayasan Al Hikamussalafie</span>\r\n            <span><i class=\"fas fa-school\"></i> SMP Nusantara Cipunagara (2022)</span>\r\n        </div>\r\n\r\n        <div style=\"text-align: center; margin-top: 30px; font-weight: 600; color: #2c5a3a; letter-spacing: 0.3px;\">\r\n            <p><i class=\"fas fa-leaf\"></i> Menuju Generasi Muslim yang Rahmatan Lil \'Alamin <i class=\"fas fa-leaf\"></i></p>\r\n        </div>\r\n    </article>\r\n</section>\r\n\r\n<!-- Font Awesome CDN untuk icon -->\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">', 'Publish', 'Profil', '1773146773_81066a13b54c9856d3d4.jpeg', 80, 0, '2024-01-21 20:36:05', '2026-01-01 20:35:00', '2026-04-06 14:44:18'),
(4, 11, 10, 'perpaduan-kurikulum-tradisional-dan-modern', 'Perpaduan Kurikulum Tradisional dan Modern', 'Pesantren ini berhasil mempertahankan tradisi Kitab Kuning (literatur klasik Islam) yang mendalam sambil tetap mengintegrasikan pendidikan formal. Hal ini memungkinkan santri untuk menguasai ilmu agama yang kokoh tanpa tertinggal dalam aspek akademik umum.', '', 'Publish', 'Keunggulan', '1774587566_7f8aaf2b6e553ef45e9f.jpg', 0, 0, '2024-01-22 06:31:34', '2026-01-01 06:29:00', '2026-03-27 04:59:26'),
(5, 11, 10, 'sanad-keilmuan-yang-jelas', 'Sanad Keilmuan yang Jelas', 'Salah satu aspek terpenting dalam dunia pesantren adalah silsilah keilmuan (sanad). Al-Hikamussalafie memiliki garis keturunan pengajar yang tersambung dengan ulama-ulama besar, sehingga kemurnian ajaran dan keberkahan ilmu lebih terjaga.', '', 'Publish', 'Keunggulan', '1774587368_aaa7f77f7c9224dae746.jpg', 0, 0, '2024-01-22 06:34:02', '2024-01-22 06:33:00', '2026-03-27 04:56:08'),
(6, 11, 10, 'lingkungan-yang-mendukung-pembentukan-karakter', 'Lingkungan yang Mendukung Pembentukan Karakter', 'Lokasi dan sistem asramanya dirancang untuk menumbuhkan kedisiplinan dan kemandirian. Santri dilatih untuk mengatur waktu, bekerja sama dalam komunitas, dan memiliki etika (adab) yang baik terhadap guru maupun sesama.', '', 'Publish', 'Keunggulan', '1774587396_199dba1b897f956d3347.jpg', 0, 0, '2024-01-22 06:36:13', '2024-01-22 06:35:00', '2026-03-27 04:56:36'),
(7, 11, 10, 'integrasi-pendidikan-agama-umum', 'Integrasi Pendidikan Agama & Umum', '<p>SMP Nusantara Cipunagara tidak hanya fokus pada pelajaran umum, tetapi juga mengintegrasikan pendidikan pesantren seperti Al-Qur’an dan kitab kuning. Ini membuat siswa memiliki keseimbangan antara ilmu dunia dan akhirat.</p>', '', 'Publish', 'Keunggulan', '1774587447_353da0225415f34ab589.jpg', 0, 0, '2024-01-22 06:37:43', '2026-03-26 06:37:00', '2026-03-27 04:57:27'),
(8, 11, 10, 'lingkungan-religius-berkarakter', 'Lingkungan Religius & Berkarakter', '<p>Berada di bawah naungan yayasan pesantren, siswa dibentuk dalam lingkungan yang disiplin, islami, dan penuh akhlak. Sangat cocok untuk membentuk karakter generasi yang santun dan bertanggung jawab.</p>', '', 'Publish', 'Keunggulan', '1774587593_3009c7e91a03a26056bf.jpg', 0, 0, '2024-01-22 06:38:21', '2024-01-22 06:37:00', '2026-03-27 04:59:53'),
(9, 11, 10, 'pendidikan-berkualitas-relevan', 'Pendidikan Berkualitas & Relevan', '<p>Sekolah ini menghadirkan pendidikan formal yang mengikuti kurikulum nasional, sehingga siswa tetap mendapatkan ilmu akademik yang siap bersaing, sekaligus dibekali nilai-nilai keislaman.</p>', '', 'Publish', 'Keunggulan', '1774587524_6bad0f71c4f1158f4b61.jpg', 0, 0, '2024-01-22 06:39:43', '2024-01-22 06:39:00', '2026-03-27 04:58:44'),
(10, 13, 10, 'pengumuman-kalender-akademik-tahun-pelajaran-20262027-smp-nusantara-cipunagara-pesantren-al-hikamussalafie', 'Pengumuman Kalender Akademik Tahun Pelajaran 2026/2027 SMP Nusantara Cipunagara & Pesantren Al-Hikamussalafie', 'SMP Nusantara Cipunagara bersama Pesantren Al-Hikamussalafie resmi mengumumkan kalender akademik tahun pelajaran 2026/2027 sebagai panduan kegiatan belajar, ujian, dan program pesantren bagi siswa, guru, dan orang tua.', '<p>SMP Nusantara Cipunagara bersama Pesantren Al-Hikamussalafie dengan gembira mengumumkan kalender akademik untuk tahun pelajaran 2026/2027. Kalender ini disusun sebagai panduan bagi siswa, guru, dan orang tua dalam merencanakan kegiatan akademik maupun kegiatan kepesantrenan selama satu tahun penuh.</p>\r\n\r\n<p>Pada awal tahun ajaran, seluruh siswa baru akan mengikuti kegiatan Masa Pengenalan Lingkungan Sekolah (MPLS) yang bertujuan untuk mengenalkan lingkungan sekolah, tata tertib, serta budaya belajar yang diterapkan di SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie.</p>\r\n\r\n<p><img src=\"http://localhost/websitesekolah/assets/upload/image/1705901868_1492c5109a950be5dac1.jpg\" alt=\"Kalender Akademik Sekolah\" width=\"100%\" /></p>\r\n\r\n<p>Semester ganjil dijadwalkan dimulai pada bulan Juli 2026 hingga Desember 2026. Selama periode ini, siswa akan mengikuti berbagai kegiatan pembelajaran, penilaian harian, serta Ujian Tengah Semester (UTS) dan Ujian Akhir Semester (UAS). Selain kegiatan akademik, siswa juga akan mengikuti program pembinaan karakter dan kegiatan keagamaan di lingkungan pesantren.</p>\r\n\r\n<p>Sementara itu, semester genap akan dimulai pada Januari 2027 hingga Juni 2027. Pada semester ini, kegiatan pembelajaran akan dilanjutkan dengan berbagai program pengembangan diri, kegiatan ekstrakurikuler, serta evaluasi akhir pembelajaran sebagai penutup tahun ajaran.</p>\r\n\r\n<p>Kami mengimbau kepada seluruh siswa dan orang tua untuk selalu memperhatikan jadwal yang telah ditetapkan serta mengikuti setiap kegiatan dengan disiplin. Kalender akademik ini dapat berubah sewaktu-waktu sesuai dengan kebijakan sekolah.</p>\r\n\r\n<p>Dengan adanya kalender akademik yang terstruktur, SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie berharap dapat menciptakan proses pembelajaran yang lebih terarah, efektif, dan berkualitas.</p>', 'Publish', 'Berita', '1774842027_f83def3997fd25ba8378.jpg', 6, 0, '2024-01-22 08:25:45', '2026-03-30 08:25:00', '2026-04-05 15:31:33'),
(11, 14, 10, 'tips-sukses-menjadi-siswasantri-berprestasi-di-smp-nusantara-cipunagara-pesantren-al-hikamussalafie', 'Tips Sukses Menjadi Siswa/Santri Berprestasi di SMP Nusantara Cipunagara & Pesantren Al-Hikamussalafie', 'Menjadi siswa berprestasi di SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie membutuhkan kerja keras, disiplin, serta keseimbangan antara ilmu pengetahuan dan akhlak. Berikut beberapa tips yang dapat membantu siswa meraih kesuksesan dalam pendidikan.', '<p>Menjadi siswa berprestasi di SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie bukanlah hal yang instan, melainkan hasil dari dedikasi, kerja keras, serta kedisiplinan dalam menjalani proses belajar. Dengan lingkungan pendidikan yang memadukan ilmu pengetahuan dan nilai-nilai keislaman, setiap siswa memiliki peluang besar untuk meraih prestasi yang gemilang.</p>\r\n\r\n<p>Pertama, penting bagi siswa untuk memiliki manajemen waktu yang baik. Membuat jadwal harian yang teratur membantu siswa membagi waktu antara belajar, ibadah, istirahat, dan kegiatan lainnya. Dengan pengelolaan waktu yang baik, siswa dapat lebih fokus dan produktif dalam menjalani aktivitas sehari-hari.</p>\r\n\r\n<p>Kedua, siswa perlu memahami materi pelajaran dengan baik, bukan hanya menghafal. Di SMP Nusantara Cipunagara, siswa didorong untuk aktif bertanya dan berdiskusi agar mampu memahami konsep secara mendalam. Hal ini akan sangat membantu dalam meningkatkan kemampuan berpikir kritis dan pemecahan masalah.</p>\r\n\r\n<p><img src=\"http://localhost:8080/assets/upload/file/1773119015_7f0c4ac945070a783a0d.jpeg\" alt=\"Kegiatan Belajar Siswa\" width=\"100%\" /></p>\r\n\r\n<p>Selain itu, menjaga kesehatan fisik dan mental juga menjadi faktor penting dalam menunjang prestasi. Pola hidup sehat, seperti olahraga rutin, makan bergizi, serta istirahat yang cukup, akan meningkatkan konsentrasi dan daya ingat siswa. Lingkungan pesantren juga memberikan dukungan melalui kegiatan ibadah dan pembinaan karakter yang memperkuat mental siswa.</p>\r\n\r\n<p><img src=\"http://localhost:8080/assets/upload/image/1774583794_6e5ebd8ac758a2fab053.jpeg\" alt=\"Kegiatan Santri\" width=\"100%\" /></p>\r\n\r\n<p>Terakhir, siswa harus memiliki sikap positif dan semangat belajar yang tinggi. Setiap tantangan yang dihadapi merupakan bagian dari proses menuju kesuksesan. Dengan tekad yang kuat, doa, serta bimbingan dari guru dan lingkungan pesantren, siswa dapat berkembang menjadi pribadi yang unggul, berakhlak mulia, dan siap menghadapi masa depan.</p>\r\n\r\n<p>Melalui penerapan tips-tips tersebut, SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie terus berkomitmen mencetak generasi yang tidak hanya cerdas secara akademik, tetapi juga memiliki karakter islami yang kuat.</p>', 'Publish', 'Berita', '1774841822_d61e84f696a6293b14df.jpg', 19, 0, '2024-01-22 08:30:22', '2026-03-30 08:29:00', '2026-04-06 15:10:29'),
(12, 13, 4, 'tahun-ajaran-baru-dimulai-smp-nusantara-cipunagara-pesantren-al-hikamussalafie-siap-mencetak-generasi-unggul-berakhlak-dan-berprestasi', 'Tahun Ajaran Baru Dimulai: SMP Nusantara Cipunagara & Pesantren Al-Hikamussalafie Siap Mencetak Generasi Unggul Berakhlak dan Berprestasi', 'SMP Nusantara Cipunagara bersama Pesantren Al-Hikamussalafie menyambut tahun ajaran baru dengan penuh semangat. Dengan perpaduan pendidikan formal dan pesantren, sekolah ini berkomitmen mencetak generasi unggul yang berakhlak mulia, berprestasi, serta siap menghadapi tantangan masa depan.', '<p>SMP Nusantara Cipunagara bersama Pesantren Al-Hikamussalafie dengan penuh semangat menyambut tahun ajaran baru periode 2026/2027. Momentum ini menjadi langkah awal dalam membentuk generasi muda yang tidak hanya unggul dalam bidang akademik, tetapi juga memiliki akhlak yang mulia dan karakter yang kuat.</p>\r\n\r\n<p>Pada hari pertama masuk sekolah, seluruh siswa baru mengikuti kegiatan Masa Pengenalan Lingkungan Sekolah (MPLS) yang berlangsung dengan tertib dan penuh antusias. Kegiatan ini bertujuan untuk mengenalkan lingkungan sekolah, sistem pembelajaran, serta nilai-nilai kedisiplinan dan kebersamaan yang menjadi ciri khas SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie.</p>\r\n\r\n<p>SMP Nusantara Cipunagara menghadirkan sistem pendidikan terpadu yang menggabungkan kurikulum nasional dengan pendidikan pesantren. Para siswa tidak hanya mendapatkan pembelajaran akademik di kelas, tetapi juga dibekali dengan pendidikan agama, pembinaan karakter, serta kegiatan keislaman yang rutin dilaksanakan setiap hari.</p>\r\n\r\n<p><img src=\"http://localhost:8080/assets/upload/image/1774583794_6e5ebd8ac758a2fab053.jpeg\" alt=\"Kegiatan Siswa SMP Nusantara Cipunagara\" width=\"100%\" /></p>\r\n\r\n<p>Didukung oleh tenaga pengajar yang profesional dan berpengalaman, sekolah ini terus berupaya memberikan pendidikan terbaik bagi para siswa. Berbagai kegiatan ekstrakurikuler juga disediakan untuk mengembangkan bakat dan minat siswa, baik di bidang akademik maupun non-akademik.</p>\r\n\r\n<p>Selain itu, Pesantren Al-Hikamussalafie turut berperan dalam membentuk karakter siswa melalui pembiasaan ibadah, kedisiplinan, serta kehidupan berasrama yang mendukung pembelajaran secara menyeluruh. Lingkungan yang religius dan kondusif menjadi nilai tambah dalam menciptakan generasi yang beriman dan berilmu.</p>\r\n\r\n<p>Dengan semangat baru di tahun ajaran ini, SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie berkomitmen untuk terus meningkatkan kualitas pendidikan dan menciptakan lingkungan belajar yang inspiratif, guna melahirkan generasi yang siap menghadapi tantangan di masa depan.</p>', 'Publish', 'Berita', '1774841640_1831df668e894cfa26cf.jpg', 37, 0, '2024-01-22 08:32:02', '2026-03-30 08:31:00', '2026-04-06 13:35:51'),
(17, 14, 10, 'sejarah-smp-nusantara-cipunagara', 'SEJARAH SMP NUSANTARA CIPUNAGARA', 'Sejarah Smp Nusantara Cipunagara', '<section id=\"sejarah-smp\" style=\"max-width: 1100px; margin: 30px auto; font-family: \'Segoe UI\', \'Poppins\', system-ui, -apple-system, sans-serif; background: #ffffff; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); overflow: hidden;\">\r\n    \r\n    <!-- Header dengan latar gradien biru kehijauan -->\r\n    <header style=\"background: linear-gradient(135deg, #2c6e9e, #1a4d6b); padding: 45px 30px 40px; text-align: center; color: white;\">\r\n        <div style=\"font-size: 48px; margin-bottom: 15px;\">\r\n            <i class=\"fas fa-school\" style=\"background: rgba(255,255,255,0.15); padding: 12px 20px; border-radius: 60px;\"></i>\r\n        </div>\r\n        <h1 style=\"font-size: 2.2rem; margin: 0 0 12px 0; font-weight: 700; letter-spacing: -0.5px; color: white;\">\r\n    SMP Nusantara Cipunagara\r\n</h1>\r\n        <p style=\"font-size: 0.95rem; opacity: 0.9; margin: 0; border-top: 1px solid rgba(255,255,255,0.3); display: inline-block; padding-top: 12px;\">\r\n            <i class=\"fas fa-quote-left\"></i> \"Mendidik Generasi Berkarakter, Berprestasi, dan Berakhlak Mulia\" <i class=\"fas fa-quote-right\"></i>\r\n        </p>\r\n    </header>\r\n\r\n    <!-- Badge info singkat -->\r\n    <div style=\"display: flex; flex-wrap: wrap; gap: 16px; background: #f0f7fc; padding: 18px 28px; border-bottom: 1px solid #d4e3ed;\">\r\n        <div style=\"display: flex; align-items: center; gap: 10px;\">\r\n            <span style=\"background: #2c6e9e; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-calendar-alt\"></i></span>\r\n            <span><strong style=\"color: #1a5d7a;\">KBM Dimulai:</strong> 4 Januari 2022</span>\r\n        </div>\r\n        <div style=\"display: flex; align-items: center; gap: 10px;\">\r\n            <span style=\"background: #2c6e9e; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-user-tie\"></i></span>\r\n            <span><strong style=\"color: #1a5d7a;\">Kepala Sekolah:</strong> Hamdan Hidayat, S.H.</span>\r\n        </div>\r\n        <div style=\"display: flex; align-items: center; gap: 10px;\">\r\n            <span style=\"background: #2c6e9e; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-building\"></i></span>\r\n            <span><strong style=\"color: #1a5d7a;\">Yayasan:</strong> Al Hikamussalafie</span>\r\n        </div>\r\n    </div>\r\n\r\n    <!-- Konten Sejarah Utama -->\r\n    <article style=\"padding: 35px 32px; line-height: 1.85; color: #2c3e2f; background: #ffffff;\">\r\n        \r\n        <!-- Timeline Sejarah -->\r\n        <div style=\"position: relative; margin-bottom: 35px;\">\r\n            <!-- Garis Timeline -->\r\n            <div style=\"position: absolute; left: 30px; top: 20px; bottom: 20px; width: 3px; background: linear-gradient(180deg, #2c6e9e, #e6bc7e); border-radius: 3px;\"></div>\r\n            \r\n            <!-- Point 1: Perubahan Nama Pesantren -->\r\n            <div style=\"display: flex; gap: 20px; margin-bottom: 35px; position: relative;\">\r\n                <div style=\"width: 60px; height: 60px; background: #e8f0f5; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 3px solid #2c6e9e; z-index: 1; background: white;\">\r\n                    <i class=\"fas fa-exchange-alt\" style=\"color: #2c6e9e; font-size: 1.3rem;\"></i>\r\n                </div>\r\n                <div style=\"flex: 1;\">\r\n                    <div style=\"display: flex; flex-wrap: wrap; gap: 10px; align-items: center; margin-bottom: 8px;\">\r\n                        <span style=\"background: #2c6e9e; color: white; padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">\r\n                            <i class=\"fas fa-calendar-alt\"></i> 10 Januari 2015 M\r\n                        </span>\r\n                        <span style=\"background: #e6bc7e; color: #2c3e2f; padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">\r\n                            <i class=\"fas fa-moon\"></i> 19 Rabiul Awal 1436 H\r\n                        </span>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #2c6e9e; font-size: 1.25rem;\">\r\n                        <i class=\"fas fa-mosque\"></i> Perubahan Nama Pesantren\r\n                    </h3>\r\n                    <p style=\"margin: 0; text-align: justify; color: #4a5b6e;\">\r\n                        Pergantian nama dari <strong>Pondok Pesantren Syarif Hidayatullah</strong> menjadi \r\n                        <strong>Pondok Pesantren Al Hikamussalafie</strong>. Momen bersejarah ini menjadi titik awal \r\n                        transformasi lembaga pendidikan Islam di wilayah Cipunagara.\r\n                    </p>\r\n                </div>\r\n            </div>\r\n\r\n            <!-- Point 2: Masa Sulit -->\r\n            <div style=\"display: flex; gap: 20px; margin-bottom: 35px; position: relative;\">\r\n                <div style=\"width: 60px; height: 60px; background: #e8f0f5; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 3px solid #e6bc7e; z-index: 1; background: white;\">\r\n                    <i class=\"fas fa-frown\" style=\"color: #e6bc7e; font-size: 1.3rem;\"></i>\r\n                </div>\r\n                <div style=\"flex: 1;\">\r\n                    <div style=\"margin-bottom: 8px;\">\r\n                        <span style=\"background: #e6bc7e; color: #2c3e2f; padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">\r\n                            <i class=\"fas fa-clock\"></i> 2015 - 2021\r\n                        </span>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #e6bc7e; font-size: 1.25rem;\">\r\n                        <i class=\"fas fa-users-slash\"></i> Masa Sulit: Minimnya Pendaftar\r\n                    </h3>\r\n                    <p style=\"margin: 0; text-align: justify; color: #4a5b6e;\">\r\n                        Sejak perubahan nama pesantren, tidak ada anak santri yang mendaftar ke pondok pesantren \r\n                        kecuali hanya anak dari <strong>Kampung Tanjung Sari</strong> atau kampung sendiri. \r\n                        Hal ini dikarenakan setiap ada wali murid yang bertanya tentang <strong>sekolah formal</strong>, \r\n                        karena belum ada sekolah maka tidak ada yang mau mendaftar di pesantren.\r\n                    </p>\r\n                </div>\r\n            </div>\r\n\r\n            <!-- Point 3: Gagasan & Izin -->\r\n            <div style=\"display: flex; gap: 20px; margin-bottom: 35px; position: relative;\">\r\n                <div style=\"width: 60px; height: 60px; background: #e8f0f5; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 3px solid #2c6e9e; z-index: 1; background: white;\">\r\n                    <i class=\"fas fa-lightbulb\" style=\"color: #2c6e9e; font-size: 1.3rem;\"></i>\r\n                </div>\r\n                <div style=\"flex: 1;\">\r\n                    <div style=\"margin-bottom: 8px;\">\r\n                        <span style=\"background: #2c6e9e; color: white; padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">\r\n                            <i class=\"fas fa-calendar-week\"></i> Januari 2022\r\n                        </span>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #2c6e9e; font-size: 1.25rem;\">\r\n                        <i class=\"fas fa-handshake\"></i> Gagasan & Perizinan\r\n                    </h3>\r\n                    <p style=\"margin: 0; text-align: justify; color: #4a5b6e;\">\r\n                        Di tahun 2022 Januari dimulainya gagasan mendirikan sekolah SMP dan disepakati dari semua pihak, \r\n                        baik dari pesantren maupun dari warga setempat. Kemudian dibuat surat izin lingkungan hingga mendapat \r\n                        izin dari lingkungan setempat dan dari sekolah lain, di antaranya ada izin dari \r\n                        <strong>SMPN Cipunagara</strong>.\r\n                    </p>\r\n                </div>\r\n            </div>\r\n\r\n            <!-- Point 4: KBM Dimulai -->\r\n            <div style=\"display: flex; gap: 20px; margin-bottom: 35px; position: relative;\">\r\n                <div style=\"width: 60px; height: 60px; background: #e8f0f5; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 3px solid #27ae60; z-index: 1; background: white;\">\r\n                    <i class=\"fas fa-flag-checkered\" style=\"color: #27ae60; font-size: 1.3rem;\"></i>\r\n                </div>\r\n                <div style=\"flex: 1;\">\r\n                    <div style=\"margin-bottom: 8px;\">\r\n                        <span style=\"background: #27ae60; color: white; padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">\r\n                            <i class=\"fas fa-calendar-check\"></i> 4 Januari 2022\r\n                        </span>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #27ae60; font-size: 1.25rem;\">\r\n                        <i class=\"fas fa-school\"></i> Kegiatan Belajar Mengajar Dimulai\r\n                    </h3>\r\n                    <p style=\"margin: 0; text-align: justify; color: #4a5b6e;\">\r\n                        <strong>Sekolah Menengah Pertama (SMP) Nusantara Cipunagara</strong> resmi memulai \r\n                        kegiatan belajar mengajar (KBM). Hari pertama ini menjadi babak baru bagi pendidikan \r\n                        formal di lingkungan pesantren, menjawab kebutuhan masyarakat akan sekolah yang \r\n                        berbasis nilai-nilai Islam.\r\n                    </p>\r\n                </div>\r\n            </div>\r\n\r\n            <!-- Point 5: Kepala Sekolah Pertama -->\r\n            <div style=\"display: flex; gap: 20px; position: relative;\">\r\n                <div style=\"width: 60px; height: 60px; background: #e8f0f5; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 3px solid #e6bc7e; z-index: 1; background: white;\">\r\n                    <i class=\"fas fa-user-tie\" style=\"color: #e6bc7e; font-size: 1.3rem;\"></i>\r\n                </div>\r\n                <div style=\"flex: 1;\">\r\n                    <div style=\"margin-bottom: 8px;\">\r\n                        <span style=\"background: #e6bc7e; color: #2c3e2f; padding: 4px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 600;\">\r\n                            <i class=\"fas fa-scroll\"></i> Rabu, 1 Juni 2022\r\n                        </span>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #e6bc7e; font-size: 1.25rem;\">\r\n                        <i class=\"fas fa-crown\"></i> Kepala Sekolah Pertama Ditetapkan\r\n                    </h3>\r\n                    <p style=\"margin: 0; text-align: justify; color: #4a5b6e;\">\r\n                        <strong>Bpk Hamdan Hidayat, S.H.</strong> diangkat sebagai kepala sekolah pertama \r\n                        SMP Nusantara Cipunagara atas <strong>SK Yayasan Al Hikamussalafie</strong>. \r\n                        Penetapan ini menjadi tonggak kepemimpinan yang membawa visi sekolah menuju \r\n                        pendidikan berkualitas dengan pondasi nilai-nilai pesantren.\r\n                    </p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Card Info Kepala Sekolah -->\r\n        <div style=\"background: linear-gradient(115deg, #f0f7fc, #e8f0f5); border-radius: 24px; padding: 25px; margin: 30px 0; text-align: center;\">\r\n            <div style=\"display: flex; flex-direction: column; align-items: center;\">\r\n                <div style=\"background: #2c6e9e; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                    <i class=\"fas fa-chalkboard-user\" style=\"font-size: 2.5rem; color: white;\"></i>\r\n                </div>\r\n                <h3 style=\"margin: 0 0 5px 0; color: #1a5d7a; font-size: 1.3rem;\">Hamdan Hidayat, S.H.</h3>\r\n                <p style=\"margin: 0 0 5px 0; color: #4a5b6e;\"><i class=\"fas fa-trophy\"></i> Kepala Sekolah Pertama</p>\r\n                <p style=\"margin: 0; font-size: 0.85rem; color: #6c7a8a;\">\r\n                    <i class=\"fas fa-calendar-alt\"></i> SK Yayasan Al Hikamussalafie | 1 Juni 2022\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Visi Misi Singkat -->\r\n        <div style=\"background: #fef9ef; border-radius: 20px; padding: 22px 25px; margin: 25px 0; border-left: 5px solid #e6bc7e;\">\r\n            <h4 style=\"margin: 0 0 12px 0; color: #2c6e9e; display: flex; align-items: center; gap: 10px;\">\r\n                <i class=\"fas fa-bullseye\"></i> Komitmen SMP Nusantara Cipunagara\r\n            </h4>\r\n            <p style=\"margin: 0; text-align: justify; line-height: 1.7;\">\r\n                Berdiri sebagai jawaban atas kebutuhan pendidikan formal yang terintegrasi dengan nilai-nilai pesantren, \r\n                <strong>SMP Nusantara Cipunagara</strong> berkomitmen mencetak generasi yang <strong>unggul dalam ilmu pengetahuan, \r\n                kokoh dalam iman dan takwa, serta berakhlak mulia</strong>. Dengan sinergi antara pesantren dan sekolah, \r\n                kami hadir untuk memberikan pendidikan terbaik bagi masyarakat Cipunagara dan sekitarnya.\r\n            </p>\r\n        </div>\r\n\r\n        <!-- Footer Informasi -->\r\n        <div style=\"margin-top: 30px; padding-top: 20px; border-top: 1px solid #e0e6e8; text-align: center; font-size: 0.7rem; color: #8b9aae; display: flex; flex-wrap: wrap; justify-content: center; gap: 24px;\">\r\n            <span><i class=\"fas fa-calendar-alt\"></i> KBM Dimulai: 4 Januari 2022</span>\r\n            <span><i class=\"fas fa-user-check\"></i> Kepala Sekolah: Hamdan Hidayat, S.H. (1 Juni 2022)</span>\r\n            <span><i class=\"fas fa-building\"></i> Yayasan Al Hikamussalafie</span>\r\n        </div>\r\n\r\n        <div style=\"text-align: center; margin-top: 25px; font-weight: 600; color: #2c6e9e; letter-spacing: 0.3px;\">\r\n            <p><i class=\"fas fa-leaf\"></i> Membangun Generasi Berkarakter, Berprestasi, dan Berakhlak Mulia <i class=\"fas fa-leaf\"></i></p>\r\n        </div>\r\n    </article>\r\n</section>\r\n\r\n<!-- Font Awesome CDN untuk icon -->\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">', 'Publish', 'Profil', '1774583524_3b244f6cef39c790f565.jpeg', 23, 0, '2026-03-24 15:09:57', '2026-03-24 15:07:00', '2026-04-06 14:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_peserta_didik`
--

CREATE TABLE `calon_peserta_didik` (
  `id_calon_peserta_didik` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_gelombang` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_jenjang_pendidikan` int(11) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya') DEFAULT NULL,
  `kode_calon_peserta_didik` varchar(8) NOT NULL,
  `slug_calon_peserta_didik` varchar(255) NOT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `status_wn` enum('WNI','WNA') NOT NULL DEFAULT 'WNI',
  `negara_asal` varchar(255) DEFAULT NULL,
  `nama_calon_peserta_didik` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','L','P') NOT NULL,
  `berkebutuhan_khusus` enum('Tidak','Ya') NOT NULL DEFAULT 'Tidak',
  `isi` text DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `agama_ayah` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya') DEFAULT NULL,
  `jenjang_ayah` enum('Tidak Sekolah','SD','SMP/Sederajat','SMA/Sederajat','D1','D2','D3','S1','S2','S3') DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `alamat_ayah` varchar(255) DEFAULT NULL,
  `telepon_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `agama_ibu` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya') DEFAULT NULL,
  `jenjang_ibu` enum('Tidak Sekolah','SD','SMP/Sederajat','SMA/Sederajat','D1','D2','D3','S1','S2','S3') DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `alamat_ibu` varchar(255) DEFAULT NULL,
  `telepon_ibu` varchar(255) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `agama_wali` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya') DEFAULT NULL,
  `jenjang_wali` enum('Tidak Sekolah','SD','SMP/Sederajat','SMA/Sederajat','D1','D2','D3','S1','S2','S3') DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `alamat_wali` varchar(255) DEFAULT NULL,
  `telepon_wali` varchar(255) DEFAULT NULL,
  `identitas_wali` varchar(20) NOT NULL,
  `goldar_calon_peserta_didik` varchar(255) DEFAULT NULL,
  `hobi_calon_peserta_didik` varchar(255) DEFAULT NULL,
  `penyakit_calon_peserta_didik` varchar(255) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `jenis_calon_peserta_didik` enum('Langsung','Pindahan','Lainnya') NOT NULL DEFAULT 'Langsung',
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `alamat_sekolah_asal` varchar(255) DEFAULT NULL,
  `tanggal_pindah` varchar(255) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `status_pendaftaran` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `calon_peserta_didik`
--

INSERT INTO `calon_peserta_didik` (`id_calon_peserta_didik`, `id_admin`, `id_gelombang`, `id_akun`, `id_jenjang_pendidikan`, `agama`, `kode_calon_peserta_didik`, `slug_calon_peserta_didik`, `nis`, `nisn`, `status_wn`, `negara_asal`, `nama_calon_peserta_didik`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`, `kode_pos`, `email`, `jenis_kelamin`, `berkebutuhan_khusus`, `isi`, `nama_ayah`, `agama_ayah`, `jenjang_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `telepon_ayah`, `nama_ibu`, `agama_ibu`, `jenjang_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `telepon_ibu`, `nama_wali`, `agama_wali`, `jenjang_wali`, `pekerjaan_wali`, `alamat_wali`, `telepon_wali`, `identitas_wali`, `goldar_calon_peserta_didik`, `hobi_calon_peserta_didik`, `penyakit_calon_peserta_didik`, `tinggi`, `berat`, `jenis_calon_peserta_didik`, `asal_sekolah`, `alamat_sekolah_asal`, `tanggal_pindah`, `anak_ke`, `jumlah_saudara`, `status_pendaftaran`, `tanggal`) VALUES
(16, 14, 1, 30, 17, 'Islam', 'CGZCKZKX', 'salman-alfarisi-0T5NF1A0', '037093', '27272727', 'WNI', '', 'Salman Alfarisi kece banget', 'CIPUNAGARA', '2000-01-01', 'aaaa', '3433333333333333', '22423432', 'salmanlaptop12345@gmail.com', 'L', 'Tidak', '', 'asep', 'Islam', 'Tidak Sekolah', 'aaaaaaaaaa', 'aaaaaa', '222222222222222', 'jghfhjrj', 'Kristen', 'SMP/Sederajat', 'aaaaaaaaa', 'aaaaaaaaa', '44444444444444', 'asep', 'Islam', 'Tidak Sekolah', 'aaaaaaaaaa', 'aaaaaa', '222222222222222', 'Ayah', 'A', 'aaaaaa', 'aaaa', 111, 111, 'Langsung', 'aaaaaaaaa', 'aaaaaaaaaaaaaaaaa', '0', 1, 3, 'Lulus', '2026-04-06 12:24:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_calon_peserta_didik` int(11) NOT NULL,
  `id_jenis_dokumen` int(11) NOT NULL,
  `kode_dokumen` varchar(32) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `file_size` decimal(4,3) NOT NULL,
  `file_ext` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_akun`, `id_calon_peserta_didik`, `id_jenis_dokumen`, `kode_dokumen`, `gambar`, `file_size`, `file_ext`) VALUES
(61, 30, 16, 1, 'C6PURGOJSPSN4HSLB198EOUBUCCYIB7U', '7e5033062149bf121b8c154ad5bc203f.jpg', 0.090, 'jpg'),
(62, 30, 16, 2, 'HOQCBI93GT1LGW2ZFK4YQMN1VWB27IVJ', '54285cb2cc5a914d05c2d08b7336bf22.pdf', 0.180, 'pdf'),
(63, 30, 16, 8, '1MMWKQBSSHJWYODJ704FGHIJLCSKNGGT', '72f612fe7429e2f01c922aaad7e6f91b.jpg', 0.090, 'jpg'),
(64, 30, 16, 6, 'ZAVBI14QGM833UGAPUI1LULB9YWMTCQY', 'ef316b859457c738185334097d4e0389.jpg', 0.090, 'jpg'),
(67, 30, 16, 7, 'EBUZGM9EVCUFVEGGLTJ0UHSDAF2APJR4', 'f8e4d49a8fe0108a34940863a65070b6.pdf', 0.020, 'pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE `download` (
  `id_download` int(11) NOT NULL,
  `id_kategori_download` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul_download` varchar(200) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `hits` int(11) NOT NULL,
  `file_ext` varchar(255) DEFAULT NULL,
  `file_size` decimal(4,3) NOT NULL,
  `status_download` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `download`
--

INSERT INTO `download` (`id_download`, `id_kategori_download`, `id_admin`, `judul_download`, `isi`, `gambar`, `hits`, `file_ext`, `file_size`, `status_download`, `tanggal_post`, `tanggal`) VALUES
(2, 7, 11, 'PANDUAN TEKNIS PPDB SMP NUSANTARA CIPUNAGARA 2026', 'Pastikan telah membaca panduan ini dengan cermat sebelum memulai.', '1774870189_169ca429ff0a91397fcd.pdf', 18, 'pdf', 0.424, 'Publish', '2024-01-21 22:33:37', '2026-04-05 08:05:13'),
(7, 7, 11, 'PANDUAN TEKNIS PPDB PESANTREN AL-HIKAMUSSALAFIE 2026', 'Pastikan telah membaca panduan ini dengan cermat sebelum memulai.', '1774890597_6518932e0f299ede2af3.pdf', 3, 'pdf', 0.177, 'Publish', '2026-03-30 17:09:57', '2026-04-06 07:43:22'),
(8, 9, 11, 'PENGUMUMAN PPDB TAHAP 1 ', 'Apresiasi setinggi-tingginya atas antusiasme pendaftar. Berikut adalah hasil seleksi akhir Penerimaan Peserta Didik Baru (PPDB) Tahap 1 Tahun Pelajaran 2026/2027.', '1774890910_ff47ff96041cd0e2f32c.pdf', 3, 'pdf', 0.311, 'Publish', '2026-03-30 17:14:25', '2026-04-01 05:39:23'),
(9, 10, 14, 'INFORMASI YAYASAN', '', '1775491379_e4ac5c881711efb63479.pdf', 2, 'pdf', 0.312, 'Publish', '2026-03-31 08:40:56', '2026-04-06 16:02:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id_ekstrakurikuler` int(11) NOT NULL,
  `id_kategori_ekstrakurikuler` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_ekstrakurikuler` varchar(255) NOT NULL,
  `judul_ekstrakurikuler` varchar(200) DEFAULT NULL,
  `nama_penanggung_jawab` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `status_ekstrakurikuler` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id_ekstrakurikuler`, `id_kategori_ekstrakurikuler`, `id_admin`, `slug_ekstrakurikuler`, `judul_ekstrakurikuler`, `nama_penanggung_jawab`, `isi`, `gambar`, `hits`, `status_ekstrakurikuler`, `tanggal`) VALUES
(5, 7, 14, 'ekstrakurikuler-bahasa-inggris', 'Ekstrakurikuler Bahasa Inggris', 'Hamdan Hidayat', '<section id=\"english-club\" style=\"max-width: 1100px; margin: 0 auto; font-family: \'Segoe UI\', \'Poppins\', system-ui, -apple-system, sans-serif; background: #ffffff; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); overflow: hidden;\">\r\n    \r\n    <!-- Header dengan gradien biru keunguan yang modern -->\r\n    <header style=\"background: linear-gradient(135deg, #1e4a76, #2c6e9e, #5b8caf); padding: 50px 30px 45px; text-align: center; color: white; position: relative;\">\r\n        <div style=\"position: absolute; top: 20px; right: 20px; opacity: 0.08; font-size: 100px;\">\r\n            <i class=\"fas fa-language\"></i>\r\n        </div>\r\n        <div style=\"font-size: 55px; margin-bottom: 15px;\">\r\n            <i class=\"fas fa-comments\" style=\"background: rgba(255,255,255,0.2); padding: 15px 22px; border-radius: 60px;\"></i>\r\n        </div>\r\n      <h1 style=\"font-size: 2.2rem; margin: 0 0 12px 0; font-weight: 700; letter-spacing: -0.5px; color: white;\">\r\n English Club\r\n</h1>\r\n        <p style=\"font-size: 1rem; opacity: 0.95; margin: 0 auto; max-width: 600px; line-height: 1.5;\">\r\n            <i class=\"fas fa-quote-left\"></i> Speak Globally, Stay Locally: Mengasah Kemampuan Bahasa Inggris dengan Kearifan Budaya Lokal <i class=\"fas fa-quote-right\"></i>\r\n        </p>\r\n        <div style=\"margin-top: 20px; display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;\">\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-school\"></i> SMP Nusantara Cipunagara\r\n            </span>\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-globe\"></i> English Club\r\n            </span>\r\n        </div>\r\n    </header>\r\n\r\n    <!-- Deskripsi Awal -->\r\n    <div style=\"padding: 30px 32px 0 32px; background: #ffffff;\">\r\n        <div style=\"background: linear-gradient(115deg, #f0f7fe, #f8faff); border-radius: 24px; padding: 28px 30px; border-left: 6px solid #2c6e9e;\">\r\n            <p style=\"line-height: 1.75; text-align: justify; color: #2c3e50; font-size: 1rem; margin: 0;\">\r\n                Di <strong>SMP Nusantara Cipunagara</strong>, ekstrakurikuler <strong>Bahasa Inggris atau English Club</strong> \r\n                hadir sebagai wadah strategis bagi siswa untuk memperdalam keterampilan bahasa internasional di luar jam pelajaran formal. \r\n                Mengingat pentingnya bahasa Inggris di era global, sekolah memberikan kesempatan berharga bagi siswa di Cipunagara \r\n                untuk mengasah kemampuan <strong>speaking, listening, reading, dan writing</strong> melalui metode yang interaktif dan menyenangkan.\r\n            </p>\r\n        </div>\r\n    </div>\r\n\r\n    <!-- Konten Utama -->\r\n    <article style=\"padding: 30px 32px 40px 32px; background: #ffffff;\">\r\n        \r\n        <!-- 1) Pengembangan Kreativitas Lokal dengan Skala Global -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #2c6e9e; padding-left: 18px;\">\r\n                <i class=\"fas fa-lightbulb\" style=\"color: #2c6e9e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a5f; font-size: 1.4rem; font-weight: 600;\">Pengembangan Kreativitas Lokal dengan Skala Global</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 25px; align-items: center;\">\r\n                <div style=\"flex: 2;\">\r\n                    <p style=\"line-height: 1.7; color: #2d3e4a; text-align: justify; margin-bottom: 15px;\">\r\n                        Siswa <strong>SMP Nusantara Cipunagara</strong> tidak hanya belajar tata bahasa, tetapi juga terlibat dalam \r\n                        <strong>proyek kreatif</strong>. Mereka diajak untuk mengekspresikan ide, perasaan, dan budaya lokal Subang \r\n                        melalui cerita pendek, puisi, hingga pembuatan video pendek berbahasa Inggris. Hal ini melatih siswa untuk \r\n                        percaya diri memperkenalkan identitas diri dan sekolah mereka kepada khalayak yang lebih luas.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #2c6e9e20, #5b8caf20); border-radius: 24px; padding: 20px;\">\r\n                        <i class=\"fas fa-video\" style=\"font-size: 2.5rem; color: #2c6e9e;\"></i>\r\n                        <p style=\"margin: 10px 0 0 0; font-size: 0.8rem; color: #4a6a7a;\">Video Pendek | Cerita | Puisi</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 2) Memperluas Wawasan Budaya -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #5b8caf; padding-left: 18px;\">\r\n                <i class=\"fas fa-globe-asia\" style=\"color: #5b8caf; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a5f; font-size: 1.4rem; font-weight: 600;\">Memperluas Wawasan Budaya</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 25px; flex-direction: row-reverse; align-items: center;\">\r\n                <div style=\"flex: 2;\">\r\n                    <p style=\"line-height: 1.7; color: #2d3e4a; text-align: justify; margin-bottom: 15px;\">\r\n                        Melalui kegiatan seperti <strong>debat dan drama</strong>, siswa diajak menjelajahi berbagai aspek budaya dari \r\n                        negara-negara pengguna bahasa Inggris. Aktivitas ini sangat penting untuk membuka cakrawala berpikir siswa \r\n                        di lingkungan <strong>SMP Nusantara Cipunagara</strong>, agar mereka tumbuh menjadi individu yang \r\n                        <strong>toleran, berwawasan luas, dan siap bergaul</strong> dalam lingkungan masyarakat multikultural.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #5b8caf20, #2c6e9e20); border-radius: 24px; padding: 20px;\">\r\n                        <i class=\"fas fa-theater-masks\" style=\"font-size: 2.5rem; color: #5b8caf;\"></i>\r\n                        <p style=\"margin: 10px 0 0 0; font-size: 0.8rem; color: #4a6a7a;\">Debat | Drama | Diskusi</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 3) Persiapan Masa Depan dan Studi Lanjutan -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #2c6e9e; padding-left: 18px;\">\r\n                <i class=\"fas fa-chart-line\" style=\"color: #2c6e9e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a5f; font-size: 1.4rem; font-weight: 600;\">Persiapan Masa Depan dan Studi Lanjutan</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 25px; align-items: center;\">\r\n                <div style=\"flex: 2;\">\r\n                    <p style=\"line-height: 1.7; color: #2d3e4a; text-align: justify; margin-bottom: 15px;\">\r\n                        Program ini juga dirancang untuk membekali siswa dengan <strong>strategi dasar menghadapi ujian kemampuan bahasa</strong>. \r\n                        Dengan bimbingan yang tepat, siswa <strong>SMP Nusantara Cipunagara</strong> dipersiapkan agar memiliki fondasi yang kuat \r\n                        jika ingin melanjutkan studi ke sekolah unggulan atau kelak mengejar karier di perusahaan multinasional.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #2c6e9e20, #5b8caf20); border-radius: 24px; padding: 20px;\">\r\n                        <i class=\"fas fa-graduation-cap\" style=\"font-size: 2.5rem; color: #2c6e9e;\"></i>\r\n                        <p style=\"margin: 10px 0 0 0; font-size: 0.8rem; color: #4a6a7a;\">Studi Lanjutan | Karir Global</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Keunggulan English Club dalam bentuk Grid -->\r\n        <div style=\"margin: 35px 0 25px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #e6bc7e; padding-left: 18px;\">\r\n                <i class=\"fas fa-award\" style=\"color: #e6bc7e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a5f; font-size: 1.4rem; font-weight: 600;\">Keunggulan English Club</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <div style=\"flex: 1; min-width: 220px; background: #f8fafd; border-radius: 20px; padding: 20px; text-align: center; border: 1px solid #e2e8f0;\">\r\n                    <div style=\"background: #2c6e9e15; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-comment-dots\" style=\"color: #2c6e9e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2c6e9e; font-size: 1rem;\">Speaking Practice</h3>\r\n                    <p style=\"margin: 0; color: #5a6e7a; font-size: 0.8rem;\">Latihan percakapan dengan metode interaktif</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 220px; background: #f8fafd; border-radius: 20px; padding: 20px; text-align: center; border: 1px solid #e2e8f0;\">\r\n                    <div style=\"background: #2c6e9e15; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-headphones\" style=\"color: #2c6e9e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2c6e9e; font-size: 1rem;\">Listening & Media</h3>\r\n                    <p style=\"margin: 0; color: #5a6e7a; font-size: 0.8rem;\">Pembelajaran melalui lagu, film, podcast</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 220px; background: #f8fafd; border-radius: 20px; padding: 20px; text-align: center; border: 1px solid #e2e8f0;\">\r\n                    <div style=\"background: #2c6e9e15; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-pen-fancy\" style=\"color: #2c6e9e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2c6e9e; font-size: 1rem;\">Creative Writing</h3>\r\n                    <p style=\"margin: 0; color: #5a6e7a; font-size: 0.8rem;\">Menulis cerpen, puisi, dan artikel kreatif</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 220px; background: #f8fafd; border-radius: 20px; padding: 20px; text-align: center; border: 1px solid #e2e8f0;\">\r\n                    <div style=\"background: #2c6e9e15; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-users\" style=\"color: #2c6e9e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2c6e9e; font-size: 1rem;\">Debate & Drama</h3>\r\n                    <p style=\"margin: 0; color: #5a6e7a; font-size: 0.8rem;\">Melatih public speaking dan kerja tim</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Testimoni / Quote -->\r\n        <div style=\"background: linear-gradient(115deg, #eef4fa, #e6f0f8); border-radius: 24px; padding: 28px 32px; margin: 30px 0 20px; text-align: center;\">\r\n            <i class=\"fas fa-quote-left\" style=\"color: #2c6e9e; font-size: 2rem; opacity: 0.5;\"></i>\r\n            <p style=\"font-style: italic; color: #2c5a6e; font-size: 1rem; line-height: 1.6; max-width: 700px; margin: 15px auto 10px auto;\">\r\n                \"English Club bukan hanya tentang belajar bahasa, tapi tentang membangun rasa percaya diri, \r\n                membuka wawasan dunia, dan bangga memperkenalkan budaya Subang dengan bahasa internasional.\"\r\n            </p>\r\n            <p style=\"font-weight: 600; color: #2c6e9e; margin: 0;\">— Pembina English Club SMP Nusantara Cipunagara —</p>\r\n        </div>\r\n\r\n        <!-- Footer Informasi -->\r\n        <div style=\"margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0; text-align: center; font-size: 0.75rem; color: #7a8e9e; display: flex; flex-wrap: wrap; justify-content: center; gap: 28px;\">\r\n            <span><i class=\"fas fa-calendar-alt\"></i> Kegiatan Rutin: Setiap Hari Jumat</span>\r\n            <span><i class=\"fas fa-clock\"></i> Pukul 14.00 - 16.00 WIB</span>\r\n            <span><i class=\"fas fa-map-marker-alt\"></i> Ruang English Club, SMP Nusantara Cipunagara</span>\r\n        </div>\r\n        <div style=\"text-align: center; margin-top: 20px; font-weight: 500; color: #2c6e9e;\">\r\n            <i class=\"fas fa-globe\"></i> Speak English, Show Your Culture, Go International! <i class=\"fas fa-globe\"></i>\r\n        </div>\r\n    </article>\r\n</section>\r\n\r\n<!-- Font Awesome CDN -->\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">', '1774892760_8622fa3a68212969c135.jpg', 13, 'Publish', '2024-01-21 10:07:06'),
(6, 6, 14, 'ekstrakurikuler-pencak-silat', 'Ekstrakurikuler Pencak Silat', 'Pujianto', '<section id=\"pencak-silat\" style=\"max-width: 1100px; margin: 0 auto; font-family: \'Segoe UI\', \'Poppins\', system-ui, -apple-system, sans-serif; background: #ffffff; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); overflow: hidden;\">\r\n    \r\n    <!-- Header dengan gradien merah marun keemasan yang gagah -->\r\n    <header style=\"background: linear-gradient(135deg, #8B3A2A, #B85C3A, #D4A373); padding: 50px 30px 45px; text-align: center; color: white; position: relative;\">\r\n        <div style=\"position: absolute; top: 20px; right: 20px; opacity: 0.08; font-size: 100px;\">\r\n            <i class=\"fas fa-fist-raised\"></i>\r\n        </div>\r\n        <div style=\"font-size: 55px; margin-bottom: 15px;\">\r\n            <i class=\"fas fa-hand-fist\" style=\"background: rgba(255,255,255,0.2); padding: 15px 22px; border-radius: 60px;\"></i>\r\n        </div>\r\n       <h1 style=\"font-size: 2.2rem; margin: 0 0 12px 0; font-weight: 700; letter-spacing: -0.5px; color: white;\">\r\nPencak Silat\r\n</h1>\r\n        <p style=\"font-size: 1rem; opacity: 0.95; margin: 0 auto; max-width: 600px; line-height: 1.5;\">\r\n            <i class=\"fas fa-quote-left\"></i> Melestarikan Warisan Leluhur, Membentuk Santri Tangguh <i class=\"fas fa-quote-right\"></i>\r\n        </p>\r\n        <div style=\"margin-top: 20px; display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;\">\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-school\"></i> SMP Nusantara Cipunagara\r\n            </span>\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-mosque\"></i> Pesantren Al-Hikamussalafie\r\n            </span>\r\n        </div>\r\n    </header>\r\n\r\n    <!-- Deskripsi Awal -->\r\n    <div style=\"padding: 30px 32px 0 32px; background: #ffffff;\">\r\n        <div style=\"background: linear-gradient(115deg, #FFF5EC, #FEF3E8); border-radius: 24px; padding: 28px 30px; border-left: 6px solid #B85C3A;\">\r\n            <p style=\"line-height: 1.75; text-align: justify; color: #4A3A2A; font-size: 1rem; margin: 0;\">\r\n                Di <strong>SMP Nusantara Cipunagara</strong> dan <strong>Pesantren Al-Hikamussalafie</strong>, \r\n                <strong>Pencak Silat</strong> menjadi jembatan utama untuk melestarikan warisan leluhur sekaligus membentuk karakter santri yang tangguh. \r\n                Sebagai seni bela diri asli Nusantara, kegiatan ini memberikan pengalaman mendalam yang melampaui teknik bertarung fisik.\r\n            </p>\r\n        </div>\r\n    </div>\r\n\r\n    <!-- Konten Utama -->\r\n    <article style=\"padding: 30px 32px 40px 32px; background: #ffffff;\">\r\n        \r\n        <!-- 1) Ketahanan Fisik dan Disiplin Santri -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #B85C3A; padding-left: 18px;\">\r\n                <i class=\"fas fa-dumbbell\" style=\"color: #B85C3A; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #5A3A2A; font-size: 1.4rem; font-weight: 600;\">Ketahanan Fisik dan Disiplin Santri</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #4A3A2E; text-align: justify; margin-bottom: 15px;\">\r\n                        Melalui latihan intensif di lapangan <strong>SMP Nusantara</strong>, para siswa yang juga merupakan santri \r\n                        <strong>Al-Hikamussalafie</strong> diajak untuk meningkatkan kebugaran fisik. Pencak Silat mengajarkan \r\n                        <strong>kedisiplinan tingkat tinggi, konsentrasi, dan pengendalian diri</strong>—nilai-nilai yang sangat sejalan \r\n                        dengan kehidupan pesantren yang menuntut kemandirian dan keteguhan hati.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #FEF3E8, #FDE9DC); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-person-running\" style=\"font-size: 2.5rem; color: #B85C3A;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #8A5A3A;\">Latihan Intensif | Kedisiplinan | Konsentrasi</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <!-- Quote pendek -->\r\n            <div style=\"margin-top: 20px; background: #FEF3E8; border-radius: 18px; padding: 15px 20px; border-left: 3px solid #B85C3A;\">\r\n                <p style=\"margin: 0; font-style: italic; color: #7A4A2A; font-size: 0.9rem;\">\r\n                    <i class=\"fas fa-quote-left\" style=\"color: #B85C3A; margin-right: 8px;\"></i> \r\n                    Setiap gerakan silat mengajarkanku untuk disiplin dan tidak mudah menyerah.\r\n                    <span style=\"display: block; margin-top: 8px; font-weight: 500;\">— Darmanji —</span>\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 2) Filosofi Keselarasan Tubuh dan Jiwa -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #D4A373; padding-left: 18px;\">\r\n                <i class=\"fas fa-yin-yang\" style=\"color: #D4A373; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #5A3A2A; font-size: 1.4rem; font-weight: 600;\">Filosofi Keselarasan Tubuh dan Jiwa</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center; flex-direction: row-reverse;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #4A3A2E; text-align: justify; margin-bottom: 15px;\">\r\n                        Di bawah bimbingan instruktur yang memahami tradisi, siswa tidak hanya belajar jurus menyerang dan bertahan, \r\n                        tetapi juga mendalami <strong>filosofi di balik setiap gerakan</strong>. Di lingkungan \r\n                        <strong>Pesantren Al-Hikamussalafie</strong>, aspek ini diperkuat dengan pemahaman bahwa \r\n                        <strong>kekuatan fisik harus selaras dengan kebersihan jiwa</strong>. Persaudaraan (ukhuwah) antarpesilat \r\n                        dibangun dengan kuat, menciptakan rasa kerja sama tim yang solid di antara para santri.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #FEF8F0, #FEF3E5); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-hand-sparkles\" style=\"font-size: 2.5rem; color: #D4A373;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #8A6A4A;\">Keselarasan Fisik & Jiwa | Ukhuwah | Kerja Tim</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <!-- Quote pendek -->\r\n            <div style=\"margin-top: 20px; background: #FEF8F0; border-radius: 18px; padding: 15px 20px; border-left: 3px solid #D4A373;\">\r\n                <p style=\"margin: 0; font-style: italic; color: #7A5A3A; font-size: 0.9rem;\">\r\n                    <i class=\"fas fa-quote-left\" style=\"color: #D4A373; margin-right: 8px;\"></i> \r\n                    Silat bukan sekadar bela diri, tapi jalan untuk membersihkan jiwa dan memperkuat persaudaraan.\r\n                    <span style=\"display: block; margin-top: 8px; font-weight: 500;\">— Pujianto —</span>\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 3) Prestasi dan Syiar Budaya -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #B85C3A; padding-left: 18px;\">\r\n                <i class=\"fas fa-trophy\" style=\"color: #B85C3A; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #5A3A2A; font-size: 1.4rem; font-weight: 600;\">Prestasi dan Syiar Budaya</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #4A3A2E; text-align: justify; margin-bottom: 15px;\">\r\n                        Eksplorasi bakat siswa <strong>SMP Nusantara Cipunagara</strong> juga diwadahi melalui berbagai \r\n                        <strong>kompetisi dan pertunjukan seni bela diri</strong>. Pengalaman ini melatih sportivitas, keberanian, \r\n                        dan rasa percaya diri. Saat tampil, mereka tidak hanya menunjukkan ketangkasan, tetapi juga menjalankan \r\n                        <strong>misi syiar budaya Indonesia yang kaya</strong>, membawa nama baik sekolah dan pesantren ke kancah yang lebih luas.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #FEF3E8, #FDE9DC); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-medal\" style=\"font-size: 2.5rem; color: #B85C3A;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #8A5A3A;\">Kompetisi | Pentas Seni | Syiar Budaya</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Keunggulan Pencak Silat dalam bentuk Grid (dengan icon yang sudah diperbaiki) -->\r\n        <div style=\"margin: 45px 0 30px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #D4A373; padding-left: 18px;\">\r\n                <i class=\"fas fa-star\" style=\"color: #D4A373; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #5A3A2A; font-size: 1.4rem; font-weight: 600;\">Nilai yang Ditumbuhkan</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <!-- Ketangguhan - dengan icon yang sesuai -->\r\n                <div style=\"flex: 1; min-width: 200px; background: #FEFAF5; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #F0E0D0;\">\r\n                    <div style=\"background: #B85C3A20; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-dragon\" style=\"color: #B85C3A; font-size: 1.8rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #5A3A2A; font-size: 1rem;\">Ketangguhan</h3>\r\n                    <p style=\"margin: 0; color: #7A6A5A; font-size: 0.8rem;\">Fisik kuat, mental baja</p>\r\n                </div>\r\n                <!-- Pengendalian Diri -->\r\n                <div style=\"flex: 1; min-width: 200px; background: #FEFAF5; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #F0E0D0;\">\r\n                    <div style=\"background: #D4A37320; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-hand-peace\" style=\"color: #D4A373; font-size: 1.8rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #5A3A2A; font-size: 1rem;\">Pengendalian Diri</h3>\r\n                    <p style=\"margin: 0; color: #7A6A5A; font-size: 0.8rem;\">Emosi stabil, hati tenang</p>\r\n                </div>\r\n                <!-- Solidaritas -->\r\n                <div style=\"flex: 1; min-width: 200px; background: #FEFAF5; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #F0E0D0;\">\r\n                    <div style=\"background: #B85C3A20; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-handshake\" style=\"color: #B85C3A; font-size: 1.8rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #5A3A2A; font-size: 1rem;\">Solidaritas</h3>\r\n                    <p style=\"margin: 0; color: #7A6A5A; font-size: 0.8rem;\">Ukhuwah kuat, kerja tim</p>\r\n                </div>\r\n                <!-- Sportivitas -->\r\n                <div style=\"flex: 1; min-width: 200px; background: #FEFAF5; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #F0E0D0;\">\r\n                    <div style=\"background: #D4A37320; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-flag-checkered\" style=\"color: #D4A373; font-size: 1.8rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #5A3A2A; font-size: 1rem;\">Sportivitas</h3>\r\n                    <p style=\"margin: 0; color: #7A6A5A; font-size: 0.8rem;\">Jujur, berani, percaya diri</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Prestasi & Penghargaan -->\r\n        <div style=\"background: linear-gradient(115deg, #FFF5EC, #FEF0E5); border-radius: 24px; padding: 28px 32px; margin: 35px 0 20px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 18px;\">\r\n                <i class=\"fas fa-trophy\" style=\"color: #B85C3A; font-size: 1.8rem;\"></i>\r\n                <h3 style=\"margin: 0; color: #5A3A2A; font-size: 1.2rem; font-weight: 700;\">Prestasi & Penghargaan</h3>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 25px;\">\r\n                <div style=\"flex: 1; min-width: 200px;\">\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-medal\" style=\"color: #D4A373; font-size: 1.2rem;\"></i>\r\n                        <span style=\"color: #5A3A2A;\">Juara 1 Kejuaraan Silat Tingkat Kabupaten</span>\r\n                    </div>\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-medal\" style=\"color: #D4A373; font-size: 1.2rem;\"></i>\r\n                        <span style=\"color: #5A3A2A;\">Penampilan Terbaik Festival Seni Budaya Subang</span>\r\n                    </div>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 200px;\">\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-medal\" style=\"color: #D4A373; font-size: 1.2rem;\"></i>\r\n                        <span style=\"color: #5A3A2A;\">Tim Pesilat Terfavorit Ekshibisi Pendidikan</span>\r\n                    </div>\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-medal\" style=\"color: #D4A373; font-size: 1.2rem;\"></i>\r\n                        <span style=\"color: #5A3A2A;\">Penghargaan Pelestari Seni Bela Diri Nusantara</span>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Footer Informasi -->\r\n        <div style=\"margin-top: 30px; padding-top: 20px; border-top: 1px solid #E8DCD0; text-align: center; font-size: 0.75rem; color: #9A8A72; display: flex; flex-wrap: wrap; justify-content: center; gap: 28px;\">\r\n            <span><i class=\"fas fa-calendar-alt\"></i> Latihan Rutin: Setiap Hari Sabtu & Minggu</span>\r\n            <span><i class=\"fas fa-clock\"></i> Pukul 08.00 - 10.00 WIB</span>\r\n            <span><i class=\"fas fa-map-marker-alt\"></i> Lapangan SMP Nusantara Cipunagara</span>\r\n        </div>\r\n        <div style=\"text-align: center; margin-top: 20px; font-weight: 500; color: #B85C3A;\">\r\n            <i class=\"fas fa-fist-raised\"></i> Tangguh Fisik, Kokoh Jiwa, Lestarikan Budaya Bangsa <i class=\"fas fa-fist-raised\"></i>\r\n        </div>\r\n    </article>\r\n</section>\r\n\r\n<!-- Font Awesome CDN -->\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">', '1774892587_dc2d18713d5469f01e5b.jpg', 14, 'Publish', '2024-01-21 12:32:06');
INSERT INTO `ekstrakurikuler` (`id_ekstrakurikuler`, `id_kategori_ekstrakurikuler`, `id_admin`, `slug_ekstrakurikuler`, `judul_ekstrakurikuler`, `nama_penanggung_jawab`, `isi`, `gambar`, `hits`, `status_ekstrakurikuler`, `tanggal`) VALUES
(7, 6, 14, 'ekstrakurikuler-sepak-bola-dan-futsal', 'Ekstrakurikuler Sepak Bola dan Futsal', 'Pujianto', '<section id=\"sepakbola-futsal\" style=\"max-width: 1100px; margin: 0 auto; font-family: \'Segoe UI\', \'Poppins\', system-ui, -apple-system, sans-serif; background: #ffffff; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); overflow: hidden;\">\r\n    \r\n    <!-- Header dengan gradien hijau rumput yang segar -->\r\n    <header style=\"background: linear-gradient(135deg, #2D6A4F, #40916C, #52B788); padding: 50px 30px 45px; text-align: center; color: white; position: relative;\">\r\n        <div style=\"position: absolute; top: 20px; right: 20px; opacity: 0.08; font-size: 100px;\">\r\n            <i class=\"fas fa-futbol\"></i>\r\n        </div>\r\n        <div style=\"font-size: 55px; margin-bottom: 15px;\">\r\n            <i class=\"fas fa-futbol\" style=\"background: rgba(255,255,255,0.2); padding: 15px 22px; border-radius: 60px;\"></i>\r\n        </div>\r\n     <h1 style=\"font-size: 2.2rem; margin: 0 0 12px 0; font-weight: 700; letter-spacing: -0.5px; color: white;\">\r\n    Sepak Bola & Futsal\r\n</h1>\r\n        <p style=\"font-size: 1rem; opacity: 0.95; margin: 0 auto; max-width: 600px; line-height: 1.5;\">\r\n            <i class=\"fas fa-quote-left\"></i> Bola Bergulir, Ukhuwah Menguat, Prestasi Terukir <i class=\"fas fa-quote-right\"></i>\r\n        </p>\r\n        <div style=\"margin-top: 20px; display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;\">\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-school\"></i> SMP Nusantara Cipunagara\r\n            </span>\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-mosque\"></i> Pesantren Al-Hikamussalafie\r\n            </span>\r\n        </div>\r\n    </header>\r\n\r\n    <!-- Deskripsi Awal -->\r\n    <div style=\"padding: 30px 32px 0 32px; background: #ffffff;\">\r\n        <div style=\"background: linear-gradient(115deg, #E8F5E9, #F1F8E9); border-radius: 24px; padding: 28px 30px; border-left: 6px solid #40916C;\">\r\n            <p style=\"line-height: 1.75; text-align: justify; color: #2D5A3A; font-size: 1rem; margin: 0;\">\r\n                Ekstrakurikuler <strong>sepak bola dan futsal</strong> di <strong>SMP Nusantara Cipunagara</strong> menjadi wadah yang sangat efektif \r\n                bagi para santri <strong>Pesantren Al-Hikamussalafie</strong> untuk menyalurkan energi positif dan bakat atletik mereka. \r\n                Di sini, bola yang bergulir menjadi simbol kerja keras dan persatuan.\r\n            </p>\r\n        </div>\r\n    </div>\r\n\r\n    <!-- Konten Utama -->\r\n    <article style=\"padding: 30px 32px 40px 32px; background: #ffffff;\">\r\n        \r\n        <!-- 1) Fisik yang Kuat, Jiwa yang Sehat -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #40916C; padding-left: 18px;\">\r\n                <i class=\"fas fa-heartbeat\" style=\"color: #40916C; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #2D5A3A; font-size: 1.4rem; font-weight: 600;\">Fisik yang Kuat, Jiwa yang Sehat</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #3A5A3A; text-align: justify; margin-bottom: 15px;\">\r\n                        Melalui latihan rutin di area Cipunagara, siswa diajak meningkatkan teknik dasar seperti \r\n                        <strong>dribbling, passing, dan shooting</strong>. Bagi santri Al-Hikamussalafie, kegiatan ini adalah bentuk pengamalan \r\n                        bahwa <strong>mukmin yang kuat lebih dicintai Allah</strong>. Kebugaran fisik yang didapat dari lapangan hijau \r\n                        mendukung ketahanan mereka dalam menjalani rutinitas belajar dan ibadah yang padat.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #E8F5E9, #F1F8E9); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-person-running\" style=\"font-size: 2.5rem; color: #40916C;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #5A7A5A;\">Dribbling | Passing | Shooting</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <!-- Quote pendek -->\r\n            <div style=\"margin-top: 20px; background: #E8F5E9; border-radius: 18px; padding: 15px 20px; border-left: 3px solid #40916C;\">\r\n                <p style=\"margin: 0; font-style: italic; color: #3A6A3A; font-size: 0.9rem;\">\r\n                    <i class=\"fas fa-quote-left\" style=\"color: #40916C; margin-right: 8px;\"></i> \r\n                    Mukmin yang kuat lebih dicintai Allah daripada mukmin yang lemah. Latihan ini adalah bentuk ikhtiar menjadi hamba yang kuat.\r\n                    <span style=\"display: block; margin-top: 8px; font-weight: 500;\">— Pujianto —</span>\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 2) Membangun Ukhuwah Islamiyah di Atas Lapangan -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #52B788; padding-left: 18px;\">\r\n                <i class=\"fas fa-handshake\" style=\"color: #52B788; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #2D5A3A; font-size: 1.4rem; font-weight: 600;\">Membangun Ukhuwah Islamiyah di Atas Lapangan</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center; flex-direction: row-reverse;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #3A5A3A; text-align: justify; margin-bottom: 15px;\">\r\n                        Sepak bola dan futsal di <strong>SMP Nusantara</strong> mengajarkan arti penting <strong>kerja sama tim</strong>. \r\n                        Siswa belajar bahwa kemenangan tidak diraih sendirian, melainkan melalui komunikasi dan saling dukung antar-pemain. \r\n                        Nilai-nilai <strong>ukhuwah (persaudaraan), kejujuran, dan tanggung jawab</strong> yang diajarkan di pesantren \r\n                        dipraktikkan langsung dalam bentuk sportivitas saat bertanding.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #E8F5E9, #F1F8E9); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-users\" style=\"font-size: 2.5rem; color: #52B788;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #5A7A5A;\">Ukhuwah | Sportivitas | Kerja Tim</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <!-- Quote pendek -->\r\n            <div style=\"margin-top: 20px; background: #F1F8E9; border-radius: 18px; padding: 15px 20px; border-left: 3px solid #52B788;\">\r\n                <p style=\"margin: 0; font-style: italic; color: #4A6A4A; font-size: 0.9rem;\">\r\n                    <i class=\"fas fa-quote-left\" style=\"color: #52B788; margin-right: 8px;\"></i> \r\n                    Di lapangan, kami belajar bahwa kemenangan diraih bersama. Saling mendukung, saling percaya, itulah ukhuwah.\r\n                    <span style=\"display: block; margin-top: 8px; font-weight: 500;\">— Suherlan (Captain Futsal) —</span>\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 3) Wadah Prestasi dan Bakat Santri -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #40916C; padding-left: 18px;\">\r\n                <i class=\"fas fa-trophy\" style=\"color: #40916C; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #2D5A3A; font-size: 1.4rem; font-weight: 600;\">Wadah Prestasi dan Bakat Santri</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #3A5A3A; text-align: justify; margin-bottom: 15px;\">\r\n                        Ekstrakurikuler ini juga menjadi ajang pembuktian bakat santri Cipunagara. Dengan bimbingan yang tepat, \r\n                        potensi atletis siswa diasah untuk siap terjun dalam <strong>kompetisi antar-sekolah maupun turnamen regional di Subang</strong>. \r\n                        Prestasi di lapangan hijau ini membuka pintu pengakuan dan kebanggaan, membuktikan bahwa santri \r\n                        <strong>Al-Hikamussalafie</strong> juga mampu bersinar di bidang olahraga.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #E8F5E9, #F1F8E9); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-medal\" style=\"font-size: 2.5rem; color: #40916C;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #5A7A5A;\">Kompetisi | Turnamen | Prestasi</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Nilai yang Ditumbuhkan dalam bentuk Grid -->\r\n        <div style=\"margin: 45px 0 30px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #52B788; padding-left: 18px;\">\r\n                <i class=\"fas fa-star\" style=\"color: #52B788; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #2D5A3A; font-size: 1.4rem; font-weight: 600;\">Nilai yang Ditumbuhkan</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <!-- Kerja Keras -->\r\n                <div style=\"flex: 1; min-width: 200px; background: #F8FFF8; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #D0E8D0;\">\r\n                    <div style=\"background: #40916C20; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-dumbbell\" style=\"color: #40916C; font-size: 1.8rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2D5A3A; font-size: 1rem;\">Kerja Keras</h3>\r\n                    <p style=\"margin: 0; color: #6A8A6A; font-size: 0.8rem;\">Pantang menyerah, terus berlatih</p>\r\n                </div>\r\n                <!-- Kerja Sama Tim -->\r\n                <div style=\"flex: 1; min-width: 200px; background: #F8FFF8; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #D0E8D0;\">\r\n                    <div style=\"background: #52B78820; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-people-arrows\" style=\"color: #52B788; font-size: 1.8rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2D5A3A; font-size: 1rem;\">Kerja Sama Tim</h3>\r\n                    <p style=\"margin: 0; color: #6A8A6A; font-size: 0.8rem;\">Solidaritas, komunikasi efektif</p>\r\n                </div>\r\n                <!-- Sportivitas -->\r\n                <div style=\"flex: 1; min-width: 200px; background: #F8FFF8; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #D0E8D0;\">\r\n                    <div style=\"background: #40916C20; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-hand-sparkles\" style=\"color: #40916C; font-size: 1.8rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2D5A3A; font-size: 1rem;\">Sportivitas</h3>\r\n                    <p style=\"margin: 0; color: #6A8A6A; font-size: 0.8rem;\">Jujur, hormat lawan, fair play</p>\r\n                </div>\r\n                <!-- Kepemimpinan -->\r\n                <div style=\"flex: 1; min-width: 200px; background: #F8FFF8; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #D0E8D0;\">\r\n                    <div style=\"background: #52B78820; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-crown\" style=\"color: #52B788; font-size: 1.8rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2D5A3A; font-size: 1rem;\">Kepemimpinan</h3>\r\n                    <p style=\"margin: 0; color: #6A8A6A; font-size: 0.8rem;\">Tanggung jawab, mengambil inisiatif</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Prestasi & Penghargaan -->\r\n        <div style=\"background: linear-gradient(115deg, #E8F5E9, #F1F8E9); border-radius: 24px; padding: 28px 32px; margin: 35px 0 20px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 18px;\">\r\n                <i class=\"fas fa-trophy\" style=\"color: #40916C; font-size: 1.8rem;\"></i>\r\n                <h3 style=\"margin: 0; color: #2D5A3A; font-size: 1.2rem; font-weight: 700;\">Prestasi & Capaian</h3>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 25px;\">\r\n                <div style=\"flex: 1; min-width: 200px;\">\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-medal\" style=\"color: #52B788; font-size: 1.2rem;\"></i>\r\n                        <span style=\"color: #3A6A3A;\">Juara 2 Turnamen Futsal Se-Kabupaten Subang</span>\r\n                    </div>\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-medal\" style=\"color: #52B788; font-size: 1.2rem;\"></i>\r\n                        <span style=\"color: #3A6A3A;\">Best Player Liga Pelajar Cipunagara</span>\r\n                    </div>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 200px;\">\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-medal\" style=\"color: #52B788; font-size: 1.2rem;\"></i>\r\n                        <span style=\"color: #3A6A3A;\">Semifinalis Piala Bupati Subang U-15</span>\r\n                    </div>\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-medal\" style=\"color: #52B788; font-size: 1.2rem;\"></i>\r\n                        <span style=\"color: #3A6A3A;\">Tim Favorit Ekshibisi Olahraga Santri</span>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Jadwal & Informasi -->\r\n        <div style=\"margin-top: 30px; display: flex; flex-wrap: wrap; gap: 20px; background: #F8FFF8; border-radius: 20px; padding: 20px 25px;\">\r\n            <div style=\"flex: 1; text-align: center;\">\r\n                <i class=\"fas fa-futbol\" style=\"color: #40916C; font-size: 1.5rem;\"></i>\r\n                <h4 style=\"margin: 8px 0 4px; color: #2D5A3A;\">Sepak Bola</h4>\r\n                <p style=\"margin: 0; font-size: 0.75rem; color: #6A8A6A;\">Latihan: Senin & Kamis | 15.00 - 17.00</p>\r\n            </div>\r\n            <div style=\"flex: 1; text-align: center;\">\r\n                <i class=\"fas fa-shoe-prints\" style=\"color: #52B788; font-size: 1.5rem;\"></i>\r\n                <h4 style=\"margin: 8px 0 4px; color: #2D5A3A;\">Futsal</h4>\r\n                <p style=\"margin: 0; font-size: 0.75rem; color: #6A8A6A;\">Latihan: Selasa & Jumat | 15.00 - 17.00</p>\r\n            </div>\r\n            <div style=\"flex: 1; text-align: center;\">\r\n                <i class=\"fas fa-map-marker-alt\" style=\"color: #40916C; font-size: 1.5rem;\"></i>\r\n                <h4 style=\"margin: 8px 0 4px; color: #2D5A3A;\">Lokasi</h4>\r\n                <p style=\"margin: 0; font-size: 0.75rem; color: #6A8A6A;\">Lapangan SMP Nusantara Cipunagara</p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Footer Penutup -->\r\n        <div style=\"margin-top: 30px; padding-top: 20px; border-top: 1px solid #D0E8D0; text-align: center; font-size: 0.75rem; color: #8AA88A; display: flex; flex-wrap: wrap; justify-content: center; gap: 28px;\">\r\n            <span><i class=\"fas fa-calendar-alt\"></i> Latihan Rutin Setiap Pekan</span>\r\n            <span><i class=\"fas fa-users\"></i> Dibina oleh Pelatih Berpengalaman</span>\r\n            <span><i class=\"fas fa-handshake\"></i> Sinergi Pesantren & Sekolah</span>\r\n        </div>\r\n        <div style=\"text-align: center; margin-top: 20px; font-weight: 500; color: #40916C;\">\r\n            <i class=\"fas fa-futbol\"></i> Raih Prestasi, Jaga Ukhuwah, Jadi Santri yang Tangguh <i class=\"fas fa-futbol\"></i>\r\n        </div>\r\n    </article>\r\n</section>\r\n\r\n<!-- Font Awesome CDN -->\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">', '1774892560_e47bc9cf8b2f5c6a40ec.jpg', 21, 'Publish', '2024-01-28 12:16:26'),
(9, 7, 14, 'ekstrakurikuler-menulis-fiksi-dan-ilmiah', 'Ekstrakurikuler Menulis Fiksi dan Ilmiah', 'Laelatul Lutfiah', '<section id=\"menulis-santri\" style=\"max-width: 1100px; margin: 0 auto; font-family: \'Segoe UI\', \'Poppins\', system-ui, -apple-system, sans-serif; background: #ffffff; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); overflow: hidden;\">\r\n    \r\n    <!-- Header dengan gradien hijau keemasan yang elegan -->\r\n    <header style=\"background: linear-gradient(135deg, #1a5f3a, #2c8a5a, #d4a373); padding: 50px 30px 45px; text-align: center; color: white; position: relative;\">\r\n        <div style=\"position: absolute; top: 20px; right: 20px; opacity: 0.08; font-size: 100px;\">\r\n            <i class=\"fas fa-feather-alt\"></i>\r\n        </div>\r\n        <div style=\"font-size: 55px; margin-bottom: 15px;\">\r\n            <i class=\"fas fa-pen-fancy\" style=\"background: rgba(255,255,255,0.2); padding: 15px 22px; border-radius: 60px;\"></i>\r\n        </div>\r\n        <h1 style=\"font-size: 2rem; margin: 0 0 12px 0; font-weight: 700; letter-spacing: -0.5px; color: white;\">\r\n            Menulis Fiksi & Ilmiah\r\n        </h1>\r\n        <p style=\"font-size: 1rem; opacity: 0.95; margin: 0 auto; max-width: 650px; line-height: 1.5;\">\r\n            <i class=\"fas fa-quote-left\"></i> Menyeimbangkan Kecerdasan Spiritual dan Intelektual Melalui Kata-Kata <i class=\"fas fa-quote-right\"></i>\r\n        </p>\r\n        <div style=\"margin-top: 20px; display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;\">\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-school\"></i> SMP Nusantara Cipunagara\r\n            </span>\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-mosque\"></i> Pesantren Al-Hikamussalafie\r\n            </span>\r\n        </div>\r\n    </header>\r\n\r\n    <!-- Deskripsi Awal -->\r\n    <div style=\"padding: 30px 32px 0 32px; background: #ffffff;\">\r\n        <div style=\"background: linear-gradient(115deg, #fef7e8, #fffaf0); border-radius: 24px; padding: 28px 30px; border-left: 6px solid #d4a373;\">\r\n            <p style=\"line-height: 1.75; text-align: justify; color: #3a4a2f; font-size: 1rem; margin: 0;\">\r\n                Di lingkungan <strong>SMP Nusantara Cipunagara</strong> yang terintegrasi dengan \r\n                <strong>Pesantren Al-Hikamussalafie</strong>, kegiatan <strong>menulis fiksi dan ilmiah</strong> menjadi sarana \r\n                bagi santri untuk menyeimbangkan kecerdasan spiritual dan intelektual. Program ini dirancang untuk melahirkan \r\n                <strong>penulis-penulis muda</strong> yang mampu menyuarakan kebenaran dan keindahan melalui kata-kata.\r\n            </p>\r\n        </div>\r\n    </div>\r\n\r\n    <!-- Konten Utama -->\r\n    <article style=\"padding: 30px 32px 40px 32px; background: #ffffff;\">\r\n        \r\n        <!-- 1) Imajinasi Berlandaskan Nilai: Penulisan Fiksi -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #d4a373; padding-left: 18px;\">\r\n                <i class=\"fas fa-book-open\" style=\"color: #d4a373; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #2d5a3a; font-size: 1.4rem; font-weight: 600;\">Imajinasi Berlandaskan Nilai: Penulisan Fiksi</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #3a4a3a; text-align: justify; margin-bottom: 15px;\">\r\n                        Siswa <strong>SMP Nusantara</strong> sekaligus santri <strong>Al-Hikamussalafie</strong> diajak mengeksplorasi \r\n                        imajinasi mereka untuk merancang cerita fiksi yang unik. Karakter-karakter yang dibangun seringkali mencerminkan \r\n                        <strong>nilai-nilai moral dan kesantunan</strong> yang dipelajari di pesantren. Dengan teknik naratif yang kuat, \r\n                        mereka mampu menciptakan alur cerita yang tidak hanya menghibur, tetapi juga sarat akan makna kehidupan.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #fef7e8, #fff3e0); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-feather-alt\" style=\"font-size: 2.5rem; color: #d4a373;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #7a6a4a;\">Cerpen | Novel | Dongeng Religi</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <!-- Quote pendek dari santri -->\r\n            <div style=\"margin-top: 20px; background: #fef7e8; border-radius: 18px; padding: 15px 20px; border-left: 3px solid #d4a373;\">\r\n                <p style=\"margin: 0; font-style: italic; color: #6a5a3a; font-size: 0.9rem;\">\r\n                    <i class=\"fas fa-quote-left\" style=\"color: #d4a373; margin-right: 8px;\"></i> \r\n                    Menulis cerita membuatku bisa menyampaikan nilai-nilai kebaikan dengan cara yang menyenangkan.\r\n                    <span style=\"display: block; margin-top: 8px; font-weight: 500;\">— Adil Pangestu —</span>\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 2) Ketajaman Berpikir: Penulisan Ilmiah -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #2c8a5a; padding-left: 18px;\">\r\n                <i class=\"fas fa-microscope\" style=\"color: #2c8a5a; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #2d5a3a; font-size: 1.4rem; font-weight: 600;\">Ketajaman Berpikir: Penulisan Ilmiah</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center; flex-direction: row-reverse;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #3a4a3a; text-align: justify; margin-bottom: 15px;\">\r\n                        Di sisi lain, kemampuan analitis santri diasah melalui <strong>penulisan ilmiah</strong>. Di bawah naungan \r\n                        <strong>SMP Nusantara Cipunagara</strong>, siswa belajar menyusun laporan penelitian dan artikel ilmiah secara terperinci. \r\n                        Hal ini melatih mereka untuk disiplin dalam menyajikan data dan fakta, baik dalam topik sains modern maupun \r\n                        <strong>kajian-kajian keislaman</strong> yang relevan dengan perkembangan teknologi masa kini.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #e8f5e8, #e0f0e0); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-chart-line\" style=\"font-size: 2.5rem; color: #2c8a5a;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #4a6a4a;\">Penelitian | Artikel Ilmiah | Kajian Islam</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <!-- Quote pendek -->\r\n            <div style=\"margin-top: 20px; background: #e8f5e8; border-radius: 18px; padding: 15px 20px; border-left: 3px solid #2c8a5a;\">\r\n                <p style=\"margin: 0; font-style: italic; color: #4a6a4a; font-size: 0.9rem;\">\r\n                    <i class=\"fas fa-quote-left\" style=\"color: #2c8a5a; margin-right: 8px;\"></i> \r\n                    Menulis ilmiah mengajarkanku untuk berpikir sistematis dan menyampaikan fakta dengan jujur.\r\n                    <span style=\"display: block; margin-top: 8px; font-weight: 500;\">— Adil Pangestu —</span>\r\n                </p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 3) Pemberdayaan Penulis Muda yang Kritis -->\r\n        <div style=\"margin-bottom: 35px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #d4a373; padding-left: 18px;\">\r\n                <i class=\"fas fa-brain\" style=\"color: #d4a373; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #2d5a3a; font-size: 1.4rem; font-weight: 600;\">Pemberdayaan Penulis Muda yang Kritis</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 30px; align-items: center;\">\r\n                <div style=\"flex: 1.5;\">\r\n                    <p style=\"line-height: 1.75; color: #3a4a3a; text-align: justify; margin-bottom: 15px;\">\r\n                        Melalui kolaborasi antara sekolah dan pesantren ini, siswa dikembangkan menjadi \r\n                        <strong>pribadi yang berpikiran tajam</strong>. Mereka belajar merumuskan argumen yang kuat dan menyampaikan ide \r\n                        secara efektif. Kemampuan komunikasi tertulis ini menjadi bekal berharga bagi mereka untuk mengejar karier di \r\n                        bidang <strong>jurnalisme, penulisan kreatif, atau menjadi cendekiawan</strong> yang mampu berdakwah melalui \r\n                        tulisan ilmiah yang akurat.\r\n                    </p>\r\n                </div>\r\n                <div style=\"flex: 1; text-align: center;\">\r\n                    <div style=\"background: linear-gradient(135deg, #fef7e8, #fff3e0); border-radius: 24px; padding: 25px; text-align: center;\">\r\n                        <i class=\"fas fa-graduation-cap\" style=\"font-size: 2.5rem; color: #d4a373;\"></i>\r\n                        <p style=\"margin: 12px 0 0 0; font-size: 0.85rem; color: #7a6a4a;\">Jurnalisme | Penulis Kreatif | Cendekiawan</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Keunggulan Program Menulis dalam bentuk Grid -->\r\n        <div style=\"margin: 45px 0 30px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #2c8a5a; padding-left: 18px;\">\r\n                <i class=\"fas fa-star\" style=\"color: #2c8a5a; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #2d5a3a; font-size: 1.4rem; font-weight: 600;\">Apa yang Dikembangkan?</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <div style=\"flex: 1; min-width: 200px; background: #fefaf2; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #f0e5d4;\">\r\n                    <div style=\"background: #d4a37320; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-lightbulb\" style=\"color: #d4a373; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2d5a3a; font-size: 1rem;\">Kreativitas Naratif</h3>\r\n                    <p style=\"margin: 0; color: #6a7a5a; font-size: 0.8rem;\">Membangun cerita dengan pesan moral</p>\r\n                </div>\r\n\r\n                <div style=\"flex: 1; min-width: 200px; background: #fefaf2; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #f0e5d4;\">\r\n                    <div style=\"background: #2c8a5a20; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                       <i class=\"fas fa-chart-bar\" style=\"color: #2c8a5a; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2d5a3a; font-size: 1rem;\">Analisis & Data</h3>\r\n                    <p style=\"margin: 0; color: #6a7a5a; font-size: 0.8rem;\">Menyusun argumen berbasis fakta</p>\r\n                </div>\r\n\r\n                <div style=\"flex: 1; min-width: 200px; background: #fefaf2; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #f0e5d4;\">\r\n                    <div style=\"background: #d4a37320; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-hand-sparkles\" style=\"color: #d4a373; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2d5a3a; font-size: 1rem;\">Dakwah Bil Qalam</h3>\r\n                    <p style=\"margin: 0; color: #6a7a5a; font-size: 0.8rem;\">Menyebarkan kebaikan melalui tulisan</p>\r\n                </div>\r\n\r\n                <div style=\"flex: 1; min-width: 200px; background: #fefaf2; border-radius: 20px; padding: 22px 18px; text-align: center; border: 1px solid #f0e5d4;\">\r\n                    <div style=\"background: #2c8a5a20; width: 65px; height: 65px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px;\">\r\n                        <i class=\"fas fa-microphone-alt\" style=\"color: #2c8a5a; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #2d5a3a; font-size: 1rem;\">Public Speaking</h3>\r\n                    <p style=\"margin: 0; color: #6a7a5a; font-size: 0.8rem;\">Menyampaikan ide dengan percaya diri</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Manfaat Program -->\r\n        <div style=\"background: linear-gradient(115deg, #eef5ea, #e6f0e0); border-radius: 24px; padding: 28px 32px; margin: 35px 0 20px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 18px;\">\r\n                <i class=\"fas fa-gem\" style=\"color: #2c8a5a; font-size: 1.8rem;\"></i>\r\n                <h3 style=\"margin: 0; color: #2d5a3a; font-size: 1.2rem; font-weight: 700;\">Manfaat bagi Santri Penulis</h3>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <div style=\"flex: 1; min-width: 200px;\">\r\n                    <div style=\"display: flex; gap: 10px; margin-bottom: 12px;\">\r\n                        <i class=\"fas fa-check-circle\" style=\"color: #2c8a5a;\"></i>\r\n                        <span style=\"color: #3a5a3a;\">Kemampuan berpikir kritis terasah</span>\r\n                    </div>\r\n                    <div style=\"display: flex; gap: 10px; margin-bottom: 12px;\">\r\n                        <i class=\"fas fa-check-circle\" style=\"color: #2c8a5a;\"></i>\r\n                        <span style=\"color: #3a5a3a;\">Kreativitas dan imajinasi berkembang</span>\r\n                    </div>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 200px;\">\r\n                    <div style=\"display: flex; gap: 10px; margin-bottom: 12px;\">\r\n                        <i class=\"fas fa-check-circle\" style=\"color: #2c8a5a;\"></i>\r\n                        <span style=\"color: #3a5a3a;\">Kepekaan sosial dan moral meningkat</span>\r\n                    </div>\r\n                    <div style=\"display: flex; gap: 10px; margin-bottom: 12px;\">\r\n                        <i class=\"fas fa-check-circle\" style=\"color: #2c8a5a;\"></i>\r\n                        <span style=\"color: #3a5a3a;\">Bekal menuju karier di bidang literasi</span>\r\n                    </div>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 200px;\">\r\n                    <div style=\"display: flex; gap: 10px; margin-bottom: 12px;\">\r\n                        <i class=\"fas fa-check-circle\" style=\"color: #2c8a5a;\"></i>\r\n                        <span style=\"color: #3a5a3a;\">Mampu berdakwah melalui tulisan</span>\r\n                    </div>\r\n                    <div style=\"display: flex; gap: 10px; margin-bottom: 12px;\">\r\n                        <i class=\"fas fa-check-circle\" style=\"color: #2c8a5a;\"></i>\r\n                        <span style=\"color: #3a5a3a;\">Siap bersaing di era digital</span>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Footer Informasi -->\r\n        <div style=\"margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e0d4; text-align: center; font-size: 0.75rem; color: #8a7a62; display: flex; flex-wrap: wrap; justify-content: center; gap: 28px;\">\r\n            <span><i class=\"fas fa-calendar-alt\"></i> Program Rutin: Setiap Pekan</span>\r\n            <span><i class=\"fas fa-pen-fancy\"></i> Bimbingan Menulis Fiksi & Ilmiah</span>\r\n            <span><i class=\"fas fa-trophy\"></i> Publikasi Karya Santri</span>\r\n        </div>\r\n        <div style=\"text-align: center; margin-top: 20px; font-weight: 500; color: #2c6b48;\">\r\n            <i class=\"fas fa-feather-alt\"></i> Menulis dengan Hati, Menyentuh Jiwa, Mencerahkan Peradaban <i class=\"fas fa-feather-alt\"></i>\r\n        </div>\r\n    </article>\r\n</section>\r\n\r\n<!-- Font Awesome CDN -->\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">', '1774892368_19aef716b0c90e3bddbc.jpg', 25, 'Publish', '2024-01-28 12:19:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `id_kategori_fasilitas` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_fasilitas` varchar(255) NOT NULL,
  `judul_fasilitas` varchar(200) DEFAULT NULL,
  `kode_nomor_fasilitas` varchar(255) DEFAULT NULL,
  `kondisi_fasilitas` varchar(200) DEFAULT NULL,
  `tanggal_fasilitas` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `status_fasilitas` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `id_kategori_fasilitas`, `id_admin`, `slug_fasilitas`, `judul_fasilitas`, `kode_nomor_fasilitas`, `kondisi_fasilitas`, `tanggal_fasilitas`, `isi`, `gambar`, `hits`, `status_fasilitas`, `tanggal`) VALUES
(9, 6, 11, 'lab-komputer', 'Lab Komputer', '34567', 'Baik', '2023-01-25', 'lab komputer', '1774892045_de4fb4de8e031acea7f7.jpeg', 12, 'Publish', '2026-03-10 14:23:38'),
(10, 7, 11, 'asrama', 'Asrama', '2345', 'Baik', '2022-04-02', 'asrama', '1774892018_62249d6fa40a8e938580.jpeg', 18, 'Publish', '2026-03-11 03:54:02'),
(11, 8, 11, 'lapangan', 'Lapangan', '56789', 'Rusak', '2024-03-09', 'lapangan bola', '1774892093_a93f85f9ff3b6590195e.jpeg', 4, 'Publish', '2026-03-12 05:35:47'),
(12, 5, 11, 'masjid', 'Masjid ', '12345', 'Baik', '2022-01-03', 'masjid habib', '1774891717_93d27ae110e667d14956.jpeg', 5, 'Publish', '2026-03-24 16:10:53'),
(13, 7, 14, 'kelas', 'Kelas', '31313', 'Baik', '2022-01-03', 'adadadw', '1774584337_239287c109c3c25c0f75.jpeg', 30, 'Publish', '2026-03-24 16:11:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_kategori_galeri` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul_galeri` varchar(200) DEFAULT NULL,
  `jenis_galeri` varchar(20) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_kategori_galeri`, `id_admin`, `judul_galeri`, `jenis_galeri`, `isi`, `gambar`, `hits`, `tanggal`) VALUES
(1, 6, 11, 'Membentuk Generasi Qurani yang Mandiri dan Berakhlak Mulia', 'Homepage', '<p style=\"text-align: justify;\">\r\nBersama Yayasan Pendidikan Al Hikamussalafie, kami menghadirkan pendidikan terpadu berbasis Al-Qur’an untuk membentuk generasi Qurani yang berakhlak mulia, mandiri, dan siap memimpin masa depan.\r\n</p>', '1773156020_5cd646e575140256d79e.png', 17, '2026-04-06 07:43:15'),
(13, 4, 14, 'Senam Pagi ', 'Galeri', 'Melakukan Aktivitas Olahraga Senam Pagi', '1775488044_56498ff9da0e8564eb17.jpeg', 2, '2026-04-06 15:09:05'),
(14, 4, 14, 'Upacara', 'Galeri', 'Upacara Smp Nusantara Cipunagara ', '1775488142_853a61315ce1830aec08.jpeg', 1, '2026-04-06 15:09:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gelombang`
--

CREATE TABLE `gelombang` (
  `id_gelombang` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `tahap` int(11) DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `tanggal_pengumuman` date DEFAULT NULL,
  `status_gelombang` varchar(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gelombang`
--

INSERT INTO `gelombang` (`id_gelombang`, `id_admin`, `tahun_ajaran`, `tahap`, `tahun`, `slug`, `judul`, `isi`, `tanggal_buka`, `tanggal_tutup`, `tanggal_pengumuman`, `status_gelombang`, `gambar`, `tanggal`) VALUES
(1, 11, '2026/2027', 1, '2026', 'ppdb-tahap-1-tahun-ajaran-20262027', 'PPDB Tahap 1 - Tahun Ajaran 2026/2027', '<p><strong>Penerimaan Peserta Didik Baru (PPDB) SMP Nusantara Cipunagara & Pesantren Al-Hikamussalafie Tahun Ajaran 2026/2027</strong></p>\r\n\r\n<p>SMP Nusantara Cipunagara bersama Pesantren Al-Hikamussalafie membuka kesempatan bagi calon peserta didik baru untuk bergabung dalam lingkungan pendidikan terpadu berbasis akademik dan keislaman. Kami berkomitmen membentuk generasi yang cerdas, berakhlak mulia, dan mandiri. Berikut informasi mengenai proses Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027.</p>\r\n\r\n<h2><strong>Tahapan Pendaftaran</strong></h2>\r\n\r\n<h3>1. <strong>Pendaftaran Online</strong></h3>\r\n<p>Calon peserta didik melakukan pendaftaran secara online melalui website resmi SMP Nusantara Cipunagara / Pesantren Al-Hikamussalafie.</p>\r\n<ul>\r\n<li>Mengisi formulir pendaftaran dengan lengkap dan benar.</li>\r\n<li>Mengunggah dokumen persyaratan yang telah ditentukan.</li>\r\n<li>Menerima kode pendaftaran sebagai bukti pendaftaran.</li>\r\n</ul>\r\n\r\n<h3>2. <strong>Verifikasi Dokumen</strong></h3>\r\n<p>Tim administrasi akan melakukan verifikasi dokumen yang telah diunggah. Jika terdapat kekurangan, calon peserta didik akan diinformasikan untuk melengkapi dokumen sesuai batas waktu yang ditentukan.</p>\r\n\r\n<h3>3. <strong>Tes Seleksi</strong></h3>\r\n<p>Calon peserta didik yang lolos tahap verifikasi akan mengikuti tes seleksi, meliputi:</p>\r\n<ul>\r\n<li>Tes akademik sesuai jenjang pendidikan.</li>\r\n<li>Wawancara calon peserta didik dan orang tua/wali.</li>\r\n<li>Tes keagamaan (membaca Al-Qur’an dan dasar keislaman).</li>\r\n</ul>\r\n\r\n<h3>4. <strong>Pengumuman Hasil Seleksi</strong></h3>\r\n<p>Hasil seleksi diumumkan melalui website resmi dan/atau kontak yang telah didaftarkan.</p>\r\n\r\n<h3>5. <strong>Registrasi Ulang</strong></h3>\r\n<p>Peserta yang dinyatakan lolos wajib melakukan registrasi ulang dengan:</p>\r\n<ul>\r\n<li>Mengumpulkan dokumen fisik ke kantor administrasi.</li>\r\n<li>Mengikuti kegiatan orientasi santri/siswa baru.</li>\r\n</ul>\r\n\r\n<h2><strong>Persyaratan Dokumen</strong></h2>\r\n\r\n<ol>\r\n<li><strong>Dokumen Umum:</strong>\r\n<ul>\r\n<li>Formulir pendaftaran yang telah diisi dan ditandatangani.</li>\r\n<li>Fotokopi Akta Kelahiran.</li>\r\n<li>Fotokopi Izasah Terakhir.</li>\r\n<li>Fotokopi Kartu Keluarga.</li>\r\n<li>Fotokopi KTP orang tua/wali.</li>\r\n<li>Pas foto berwarna ukuran 3x4 (3 lembar).</li>\r\n</ul>\r\n</li>\r\n\r\n<li><strong>Dokumen Akademik:</strong>\r\n<ul>\r\n<li>Surat keterangan dari sekolah asal (jika ada).</li>\r\n</ul>\r\n</li>\r\n\r\n<li><strong>Dokumen Tambahan (Jika Diperlukan):</strong>\r\n<ul>\r\n<li>Sertifikat prestasi akademik/non-akademik (jika ada).</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n\r\n<h2><strong>Informasi Tambahan</strong></h2>\r\n<ul>\r\n<li>Semua dokumen diunggah dalam format PDF atau JPEG dengan ukuran maksimal 2MB.</li>\r\n<li>Informasi lebih lanjut mengenai jadwal, dan detail lainnya dapat diakses melalui website resmi atau kontak administrasi.</li>\r\n</ul>\r\n\r\n<p>Mari bergabung bersama SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie untuk meraih masa depan yang gemilang!</p>\r\n\r\n<p><strong>SMP Nusantara Cipunagara & Pesantren Al-Hikamussalafie - Mencetak Generasi Berilmu, Berakhlak, dan Mandiri</strong>', '2026-01-01', '2026-12-01', '2026-12-31', 'Buka', '1774884695_fb1c7d510434612588eb.jpeg', '2026-03-31 07:55:13'),
(2, 11, '2026/2027', 2, '2026', 'ppdb-tahap-2-tahun-ajaran-20262027', 'PPDB Tahap 2 - Tahun Ajaran 2026/2027', '<p><strong>Penerimaan Peserta Didik Baru (PPDB) SMP Nusantara Cipunagara & Pesantren Al-Hikamussalafie Tahun Ajaran 2026/2027</strong></p>\r\n\r\n<p>SMP Nusantara Cipunagara bersama Pesantren Al-Hikamussalafie membuka kesempatan bagi calon peserta didik baru untuk bergabung dalam lingkungan pendidikan terpadu berbasis akademik dan keislaman. Kami berkomitmen membentuk generasi yang cerdas, berakhlak mulia, dan mandiri. Berikut informasi mengenai proses Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027.</p>\r\n\r\n<h2><strong>Tahapan Pendaftaran</strong></h2>\r\n\r\n<h3>1. <strong>Pendaftaran Online</strong></h3>\r\n<p>Calon peserta didik melakukan pendaftaran secara online melalui website resmi SMP Nusantara Cipunagara / Pesantren Al-Hikamussalafie.</p>\r\n<ul>\r\n<li>Mengisi formulir pendaftaran dengan lengkap dan benar.</li>\r\n<li>Mengunggah dokumen persyaratan yang telah ditentukan.</li>\r\n<li>Menerima kode pendaftaran sebagai bukti pendaftaran.</li>\r\n</ul>\r\n\r\n<h3>2. <strong>Verifikasi Dokumen</strong></h3>\r\n<p>Tim administrasi akan melakukan verifikasi dokumen yang telah diunggah. Jika terdapat kekurangan, calon peserta didik akan diinformasikan untuk melengkapi dokumen sesuai batas waktu yang ditentukan.</p>\r\n\r\n<h3>3. <strong>Tes Seleksi</strong></h3>\r\n<p>Calon peserta didik yang lolos tahap verifikasi akan mengikuti tes seleksi, meliputi:</p>\r\n<ul>\r\n<li>Tes akademik sesuai jenjang pendidikan.</li>\r\n<li>Wawancara calon peserta didik dan orang tua/wali.</li>\r\n<li>Tes keagamaan (membaca Al-Qur’an dan dasar keislaman).</li>\r\n</ul>\r\n\r\n<h3>4. <strong>Pengumuman Hasil Seleksi</strong></h3>\r\n<p>Hasil seleksi diumumkan melalui website resmi dan/atau kontak yang telah didaftarkan.</p>\r\n\r\n<h3>5. <strong>Registrasi Ulang</strong></h3>\r\n<p>Peserta yang dinyatakan lolos wajib melakukan registrasi ulang dengan:</p>\r\n<ul>\r\n<li>Mengumpulkan dokumen fisik ke kantor administrasi.</li>\r\n<li>Mengikuti kegiatan orientasi santri/siswa baru.</li>\r\n</ul>\r\n\r\n<h2><strong>Persyaratan Dokumen</strong></h2>\r\n\r\n<ol>\r\n<li><strong>Dokumen Umum:</strong>\r\n<ul>\r\n<li>Formulir pendaftaran yang telah diisi dan ditandatangani.</li>\r\n<li>Fotokopi Akta Kelahiran.</li>\r\n<li>Fotokopi Izasah Terakhir.</li>\r\n<li>Fotokopi Kartu Keluarga.</li>\r\n<li>Fotokopi KTP orang tua/wali.</li>\r\n<li>Pas foto berwarna ukuran 3x4 (3 lembar).</li>\r\n</ul>\r\n</li>\r\n\r\n<li><strong>Dokumen Akademik:</strong>\r\n<ul>\r\n<li>Surat keterangan dari sekolah asal (jika ada).</li>\r\n</ul>\r\n</li>\r\n\r\n<li><strong>Dokumen Tambahan (Jika Diperlukan):</strong>\r\n<ul>\r\n<li>Sertifikat prestasi akademik/non-akademik (jika ada).</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n\r\n<h2><strong>Informasi Tambahan</strong></h2>\r\n<ul>\r\n<li>Semua dokumen diunggah dalam format PDF atau JPEG dengan ukuran maksimal 2MB.</li>\r\n<li>Informasi lebih lanjut mengenai jadwal, dan detail lainnya dapat diakses melalui website resmi atau kontak administrasi.</li>\r\n</ul>\r\n\r\n<p>Mari bergabung bersama SMP Nusantara Cipunagara dan Pesantren Al-Hikamussalafie untuk meraih masa depan yang gemilang!</p>\r\n\r\n<p><strong>SMP Nusantara Cipunagara & Pesantren Al-Hikamussalafie - Mencetak Generasi Berilmu, Berakhlak, dan Mandiri</strong>', '2026-01-01', '2026-12-01', '2026-12-31', 'Buka', '1774884704_2bd4df95b79fdea1af93.jpeg', '2026-03-31 07:55:20'),
(6, 14, '2027/2028', 1, '2027', 'ppdb-tahap-1-tahun-ajaran-20272028', 'PPDB Tahap 1 - Tahun Ajaran 2027/2028', '', '2027-04-01', '2027-04-30', '2027-12-31', 'Buka', '', '2026-04-06 12:48:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_dokumen`
--

CREATE TABLE `jenis_dokumen` (
  `id_jenis_dokumen` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `slug_jenis_dokumen` varchar(255) NOT NULL,
  `nama_jenis_dokumen` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status_jenis_dokumen` varchar(20) NOT NULL,
  `urutan` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jenis_dokumen`
--

INSERT INTO `jenis_dokumen` (`id_jenis_dokumen`, `id_admin`, `slug_jenis_dokumen`, `nama_jenis_dokumen`, `keterangan`, `status_jenis_dokumen`, `urutan`, `gambar`) VALUES
(1, 14, 'ijazah-terakhir', 'Ijazah Terakhir', 'Scan dengan warna yang mudah dibaca dan jelas', 'Wajib', 1, '1774933166_7dd9d1adf523a0a6891a.jpg'),
(2, 11, 'kartu-keluarga-kk', 'Kartu Keluarga (KK)', 'Pastikan nama calon siswa ada dalam KK tersebut', 'Wajib', 2, '1774933193_fdb3062a7609f0a1b30c.jpg'),
(4, 11, 'sertifikat-pendukung', 'Sertifikat Pendukung', 'Sertifikat atau piagam prestasi dan penghargaan yang mendukung', 'Tidak Wajib', 6, '1774933315_0a3ee3dc768b4f869491.jpg'),
(6, 11, 'foto-3x4', 'FOTO 3x4', 'Foto ukuran resmi', 'Wajib', 4, '1774933262_3f6b59a394514a0e2bfe.jpg'),
(7, 11, 'ktp-orang-tuawali', 'KTP ORANG TUA/WALI', 'Identitas orang tua/wali', 'Wajib', 5, '1774933281_8bf392b5c77e6ae99db5.jpg'),
(8, 11, 'akte-kelahiran', 'AKTE KELAHIRAN', 'Bukti identitas kelahiran', 'Wajib', 3, '1774933212_28f58fbe9b7764b2d213.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_pendidikan`
--

CREATE TABLE `jenjang_pendidikan` (
  `id_jenjang_pendidikan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_jenjang_pendidikan` varchar(255) NOT NULL,
  `judul_jenjang_pendidikan` varchar(255) NOT NULL,
  `ringkasan` varchar(500) NOT NULL,
  `isi` text NOT NULL,
  `status_jenjang_pendidikan` varchar(20) NOT NULL,
  `jenis_jenjang_pendidikan` varchar(20) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jenjang_pendidikan`
--

INSERT INTO `jenjang_pendidikan` (`id_jenjang_pendidikan`, `id_admin`, `slug_jenjang_pendidikan`, `judul_jenjang_pendidikan`, `ringkasan`, `isi`, `status_jenjang_pendidikan`, `jenis_jenjang_pendidikan`, `gambar`, `hits`, `urutan`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(16, 14, 'pesantren-al-hikamussalfie', 'PESANTREN AL-HIKAMUSSALFIE', 'Yayasan Al-Hikamussalafie melalui Pondok Pesantren Al-Hikamussalafie dan SMP Nusantara Cipunagara menyelenggarakan pendidikan Islam terpadu yang memadukan tradisi kitab kuning dengan kurikulum nasional. Berlandaskan sejarah dakwah sejak 1996, kami berkomitmen mencetak generasi qur\'ani yang cerdas secara akademik, mandiri, dan berakhlakul karimah.', '<section id=\"profil-ponpes\" style=\"max-width: 1100px; margin: 0 auto; font-family: \'Segoe UI\', \'Poppins\', system-ui, -apple-system, sans-serif; background: #ffffff; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); overflow: hidden;\">\r\n    \r\n    <!-- Header dengan gradien hijau gelap yang elegan -->\r\n    <header style=\"background: linear-gradient(135deg, #0f4a2a, #1e6b3e, #2c7a4a); padding: 50px 30px 45px; text-align: center; color: white; position: relative;\">\r\n        <div style=\"position: absolute; top: 20px; right: 20px; opacity: 0.08; font-size: 100px;\">\r\n            <i class=\"fas fa-mosque\"></i>\r\n        </div>\r\n        <div style=\"font-size: 55px; margin-bottom: 15px;\">\r\n            <i class=\"fas fa-mosque\" style=\"background: rgba(255,255,255,0.2); padding: 15px 22px; border-radius: 60px;\"></i>\r\n        </div>\r\n<h1 style=\"font-size: 2.2rem; margin: 0 0 12px 0; font-weight: 700; letter-spacing: -0.5px; color: white;\">\r\n    Pondok Pesantren Al Hikamussalafie\r\n</h1>\r\n \r\n        <p style=\"font-size: 1rem; opacity: 0.95; margin: 0 auto; max-width: 600px; line-height: 1.5;\">\r\n            <i class=\"fas fa-quote-left\"></i> Membumikan Al-Qur\'an dan Sunnah, Menebar Rahmat bagi Semesta <i class=\"fas fa-quote-right\"></i>\r\n        </p>\r\n        <div style=\"margin-top: 20px; display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;\">\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-calendar-alt\"></i> Berdiri: 14 Januari 1996\r\n            </span>\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-moon\"></i> 23 Sya\'ban 1416 H\r\n            </span>\r\n        </div>\r\n    </header>\r\n\r\n    <!-- Badge Informasi -->\r\n    <div style=\"display: flex; flex-wrap: wrap; gap: 20px; background: linear-gradient(95deg, #fafaf5, #f3f5ef); padding: 20px 30px; border-bottom: 1px solid #e0e8dc;\">\r\n        <div style=\"display: flex; align-items: center; gap: 12px;\">\r\n            <span style=\"background: #1e6b3e; width: 38px; height: 38px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-building\"></i></span>\r\n            <div>\r\n                <div style=\"font-size: 0.7rem; color: #5a7a6a;\">YAYASAN</div>\r\n                <div style=\"font-weight: 700; color: #1e5631;\">Al Hikamussalafie</div>\r\n            </div>\r\n        </div>\r\n        <div style=\"display: flex; align-items: center; gap: 12px;\">\r\n            <span style=\"background: #1e6b3e; width: 38px; height: 38px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-tag\"></i></span>\r\n            <div>\r\n                <div style=\"font-size: 0.7rem; color: #5a7a6a;\">NAMA AWAL</div>\r\n                <div style=\"font-weight: 700; color: #1e5631;\">PP Syarif Hidayatullah</div>\r\n            </div>\r\n        </div>\r\n        <div style=\"display: flex; align-items: center; gap: 12px;\">\r\n            <span style=\"background: #1e6b3e; width: 38px; height: 38px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-map-marker-alt\"></i></span>\r\n            <div>\r\n                <div style=\"font-size: 0.7rem; color: #5a7a6a;\">LOKASI</div>\r\n                <div style=\"font-weight: 700; color: #1e5631;\">Cipunagara, Subang</div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!-- Konten Utama -->\r\n    <article style=\"padding: 35px 32px; background: #ffffff;\">\r\n        \r\n        <!-- Deskripsi Awal -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <p style=\"line-height: 1.75; text-align: justify; color: #2d3e32; font-size: 1rem;\">\r\n                <strong>Pondok Pesantren Al Hikamussalafie</strong> merupakan bagian dari \r\n                <strong>Yayasan Al Hikamussalafie</strong> yang berfokus pada pendidikan Islam salaf dan pembinaan akhlak mulia \r\n                dengan landasan murni Al-Qur\'an dan Sunnah. Berdiri sejak <strong>14 Januari 1996</strong> \r\n                (sebelumnya bernama PP Syarif Hidayatullah), pesantren ini lahir sebagai <strong>mercusuar dakwah</strong> \r\n                untuk membawa masyarakat menuju cahaya Islam yang kaffah.\r\n            </p>\r\n        </div>\r\n\r\n        <!-- 1) Visi & Misi -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #e6bc7e; padding-left: 18px;\">\r\n                <i class=\"fas fa-bullseye\" style=\"color: #e6bc7e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a2f; font-size: 1.5rem; font-weight: 600;\">Visi & Misi</h2>\r\n            </div>\r\n            <div style=\"background: #fefcf5; border-radius: 24px; padding: 28px; border: 1px solid #ebe1cf;\">\r\n                <div style=\"margin-bottom: 28px;\">\r\n                    <h3 style=\"color: #1e6b3e; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;\">\r\n                        <i class=\"fas fa-eye\"></i> Visi\r\n                    </h3>\r\n                    <p style=\"font-style: italic; color: #3a5a48; font-size: 1rem; line-height: 1.6; margin: 0; padding-left: 20px; border-left: 3px solid #e6bc7e;\">\r\n                        \"Mewujudkan Generasi Berilmu, Berakhlak Mulia, dan Bermanfaat bagi Agama serta Bangsa.\"\r\n                    </p>\r\n                </div>\r\n                <div>\r\n                    <h3 style=\"color: #1e6b3e; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;\">\r\n                        <i class=\"fas fa-list-check\"></i> Misi\r\n                    </h3>\r\n                    <ul style=\"list-style-type: none; padding-left: 0; margin: 0;\">\r\n                        <li style=\"margin-bottom: 14px; display: flex; gap: 12px; align-items: flex-start;\">\r\n                            <i class=\"fas fa-check-circle\" style=\"color: #27ae60; margin-top: 3px;\"></i>\r\n                            <span style=\"color: #2d3e32;\">Menanamkan akidah Islamiyah yang kuat dan menjauhkan diri dari praktik kemusyrikan.</span>\r\n                        </li>\r\n                        <li style=\"margin-bottom: 14px; display: flex; gap: 12px; align-items: flex-start;\">\r\n                            <i class=\"fas fa-check-circle\" style=\"color: #27ae60; margin-top: 3px;\"></i>\r\n                            <span style=\"color: #2d3e32;\">Melestarikan tradisi keilmuan Islam melalui pengajaran Kitab Kuning.</span>\r\n                        </li>\r\n                        <li style=\"margin-bottom: 14px; display: flex; gap: 12px; align-items: flex-start;\">\r\n                            <i class=\"fas fa-check-circle\" style=\"color: #27ae60; margin-top: 3px;\"></i>\r\n                            <span style=\"color: #2d3e32;\">Membentuk karakter santri yang disiplin, ikhlas, dan beradab.</span>\r\n                        </li>\r\n                        <li style=\"margin-bottom: 14px; display: flex; gap: 12px; align-items: flex-start;\">\r\n                            <i class=\"fas fa-check-circle\" style=\"color: #27ae60; margin-top: 3px;\"></i>\r\n                            <span style=\"color: #2d3e32;\">Menyelenggarakan pendidikan yang memadukan spiritualitas pesantren dengan kebutuhan zaman.</span>\r\n                        </li>\r\n                    </ul>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 2) Program Unggulan -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #1e6b3e; padding-left: 18px;\">\r\n                <i class=\"fas fa-star\" style=\"color: #1e6b3e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a2f; font-size: 1.5rem; font-weight: 600;\">Program Unggulan</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <div style=\"flex: 1; min-width: 240px; background: #f9fbf7; border-radius: 20px; padding: 22px; border: 1px solid #e8eedf;\">\r\n                    <div style=\"background: #1e6b3e15; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-book\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Kajian Kitab Klasik (Kitab Kuning)</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Pendalaman ilmu fikih, tauhid, dan tata bahasa Arab (Nahwu & Shorof).</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 240px; background: #f9fbf7; border-radius: 20px; padding: 22px; border: 1px solid #e8eedf;\">\r\n                    <div style=\"background: #1e6b3e15; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-quran\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Tahsin & Tahfidz Al-Qur\'an</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Bimbingan membaca Al-Qur\'an yang tartil dan program hafalan harian.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 240px; background: #f9fbf7; border-radius: 20px; padding: 22px; border: 1px solid #e8eedf;\">\r\n                    <div style=\"background: #1e6b3e15; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-hands-praying\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Pembiasaan Amalan Sunnah</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Shalat berjamaah, puasa sunnah, dan zikir rutin.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 240px; background: #f9fbf7; border-radius: 20px; padding: 22px; border: 1px solid #e8eedf;\">\r\n                    <div style=\"background: #1e6b3e15; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-hand-holding-heart\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Dakwah Kemasyarakatan</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Melatih santri untuk terjun langsung memberikan manfaat di tengah masyarakat.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 240px; background: #f9fbf7; border-radius: 20px; padding: 22px; border: 1px solid #e8eedf;\">\r\n                    <div style=\"background: #1e6b3e15; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-school\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Integrasi Pendidikan Formal</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Akses langsung ke pendidikan formal melalui SMP Nusantara Cipunagara di lingkungan pesantren.</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 3) Kurikulum Unggulan -->\r\n        <div style=\"margin-bottom: 45px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #e6bc7e; padding-left: 18px;\">\r\n                <i class=\"fas fa-graduation-cap\" style=\"color: #e6bc7e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a2f; font-size: 1.5rem; font-weight: 600;\">Kurikulum Unggulan</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <div style=\"flex: 1; min-width: 220px; background: #fefcf5; border-radius: 20px; padding: 20px; border: 1px solid #e8e0cf;\">\r\n                    <i class=\"fas fa-scroll\" style=\"color: #1e6b3e; font-size: 1.8rem; margin-bottom: 12px; display: block;\"></i>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #1e6b3e; font-size: 1rem;\">Kurikulum Salafiyah</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; font-size: 0.85rem;\">Menggunakan metode tradisional yang teruji dalam mencetak ulama dan tokoh agama.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 220px; background: #fefcf5; border-radius: 20px; padding: 20px; border: 1px solid #e8e0cf;\">\r\n                    <i class=\"fas fa-heart\" style=\"color: #1e6b3e; font-size: 1.8rem; margin-bottom: 12px; display: block;\"></i>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #1e6b3e; font-size: 1rem;\">Penguatan Akidah & Akhlak</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; font-size: 0.85rem;\">Fokus utama dalam membentengi santri dari pengaruh negatif lingkungan luar.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 220px; background: #fefcf5; border-radius: 20px; padding: 20px; border: 1px solid #e8e0cf;\">\r\n                    <i class=\"fas fa-book-quran\" style=\"color: #1e6b3e; font-size: 1.8rem; margin-bottom: 12px; display: block;\"></i>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #1e6b3e; font-size: 1rem;\">Literasi Qur\'ani</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; font-size: 0.85rem;\">Pengembangan kemampuan baca-tulis Al-Qur\'an secara mendalam sejak dini.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 220px; background: #fefcf5; border-radius: 20px; padding: 20px; border: 1px solid #e8e0cf;\">\r\n                    <i class=\"fas fa-hand-sparkles\" style=\"color: #1e6b3e; font-size: 1.8rem; margin-bottom: 12px; display: block;\"></i>\r\n                    <h3 style=\"margin: 0 0 8px 0; color: #1e6b3e; font-size: 1rem;\">Pendidikan Berbasis Keikhlasan</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; font-size: 0.85rem;\">Mencontoh semangat perjuangan pendiri (Bapak H. Mohammad Nur & Ibu Hj. Siti Wasri) dalam menuntut ilmu.</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Nilai Tambah / Daya Tarik Khusus -->\r\n        <div style=\"background: linear-gradient(115deg, #eef5ea, #e2ecdf); border-radius: 28px; padding: 28px 32px; margin: 25px 0 20px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px;\">\r\n                <i class=\"fas fa-gem\" style=\"color: #1e6b3e; font-size: 1.8rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a2f; font-size: 1.3rem; font-weight: 700;\">Nilai Tambah & Daya Tarik Khusus</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <div style=\"flex: 1; min-width: 250px;\">\r\n                    <div style=\"display: flex; gap: 12px; margin-bottom: 20px;\">\r\n                        <i class=\"fas fa-landmark\" style=\"color: #e6bc7e; font-size: 1.3rem;\"></i>\r\n                        <div>\r\n                            <h4 style=\"margin: 0 0 5px 0; color: #1e6b3e;\">Sejarah Perjuangan Nyata</h4>\r\n                            <p style=\"margin: 0; color: #4a624e; font-size: 0.85rem; line-height: 1.5;\">Pesantren ini bukan sekadar sekolah, melainkan lembaga yang lahir dari perjuangan memperbaiki kondisi sosial dan spiritual masyarakat Cipunagara.</p>\r\n                        </div>\r\n                    </div>\r\n                    <div style=\"display: flex; gap: 12px;\">\r\n                        <i class=\"fas fa-tree\" style=\"color: #e6bc7e; font-size: 1.3rem;\"></i>\r\n                        <div>\r\n                            <h4 style=\"margin: 0 0 5px 0; color: #1e6b3e;\">Lingkungan yang Terjaga</h4>\r\n                            <p style=\"margin: 0; color: #4a624e; font-size: 0.85rem; line-height: 1.5;\">Menawarkan suasana belajar yang tenang dan jauh dari hiruk-pikuk negatif, sangat cocok untuk pembentukan karakter putra-putri Anda.</p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 250px;\">\r\n                    <div style=\"display: flex; gap: 12px;\">\r\n                        <i class=\"fas fa-handshake\" style=\"color: #e6bc7e; font-size: 1.3rem;\"></i>\r\n                        <div>\r\n                            <h4 style=\"margin: 0 0 5px 0; color: #1e6b3e;\">Sinergi Pendidikan Lengkap</h4>\r\n                            <p style=\"margin: 0; color: #4a624e; font-size: 0.85rem; line-height: 1.5;\">Orang tua tidak perlu khawatir dengan pendidikan formal, karena anak tetap bisa meraih ijazah nasional melalui SMP Nusantara sambil tetap menjadi santri mukim.</p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Footer Penutup -->\r\n        <div style=\"margin-top: 35px; padding-top: 20px; border-top: 1px solid #dee6da; text-align: center; font-size: 0.75rem; color: #7a927a; display: flex; flex-wrap: wrap; justify-content: center; gap: 28px;\">\r\n            <span><i class=\"fas fa-calendar-alt\"></i> Berdiri: 14 Januari 1996 M / 23 Sya\'ban 1416 H</span>\r\n            <span><i class=\"fas fa-tag\"></i> Nama Awal: PP Syarif Hidayatullah</span>\r\n            <span><i class=\"fas fa-mosque\"></i> Berubah Nama: 10 Januari 2015 M / 19 Rabiul Awal 1436 H</span>\r\n        </div>\r\n        <div style=\"text-align: center; margin-top: 20px; font-weight: 500; color: #2c6b48;\">\r\n            <i class=\"fas fa-star-and-crescent\"></i> Membumikan Al-Qur\'an dan Sunnah, Menebar Rahmat bagi Semesta <i class=\"fas fa-star-and-crescent\"></i>\r\n        </div>\r\n    </article>\r\n</section>\r\n\r\n<!-- Font Awesome CDN -->\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">', 'Publish', 'Non Formal', '1774262375_1a4e121ba1340fa1b557.png', 44, 0, '2025-03-05 23:00:02', '2025-03-05 22:59:00', '2026-04-06 14:51:03'),
(17, 14, 'smp-nusantara-cipunagara', 'SMP NUSANTARA CIPUNAGARA', 'Di bawah naungan Yayasan Al-Hikamussalafie, SMP Nusantara Cipunagara hadir sejak Januari 2022 sebagai sekolah menengah pertama yang memadukan kurikulum nasional dengan nilai luhur pesantren untuk mencetak generasi unggul yang cerdas secara akademik dan kuat secara akhlak.', '<section id=\"profil-smp\" style=\"max-width: 1100px; margin: 0 auto; font-family: \'Segoe UI\', \'Poppins\', system-ui, -apple-system, sans-serif; background: #ffffff; border-radius: 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); overflow: hidden;\">\r\n    \r\n    <!-- Header dengan gradien hijau tosca -->\r\n    <header style=\"background: linear-gradient(135deg, #1e6b3e, #2c9b6e, #1a7a5c); padding: 50px 30px 45px; text-align: center; color: white; position: relative;\">\r\n        <div style=\"position: absolute; top: 20px; right: 20px; opacity: 0.1; font-size: 80px;\">\r\n            <i class=\"fas fa-school\"></i>\r\n        </div>\r\n        <div style=\"font-size: 55px; margin-bottom: 15px;\">\r\n            <i class=\"fas fa-graduation-cap\" style=\"background: rgba(255,255,255,0.2); padding: 15px 22px; border-radius: 60px;\"></i>\r\n        </div>\r\n<h1 style=\"font-size: 2.2rem; margin: 0 0 12px 0; font-weight: 700; letter-spacing: -0.5px; color: white;\">\r\n      SMP Nusantara Cipunagara\r\n</h1>\r\n        <p style=\"font-size: 1rem; opacity: 0.95; margin: 0 auto; max-width: 550px; line-height: 1.5;\">\r\n            <i class=\"fas fa-quote-left\"></i> Memadukan Tradisi Pesantren dengan Pendidikan Modern <i class=\"fas fa-quote-right\"></i>\r\n        </p>\r\n        <div style=\"margin-top: 20px;\">\r\n            <span style=\"background: rgba(255,255,255,0.2); padding: 6px 18px; border-radius: 40px; font-size: 0.8rem;\">\r\n                <i class=\"fas fa-calendar-alt\"></i> Berdiri: 4 Januari 2022\r\n            </span>\r\n        </div>\r\n    </header>\r\n\r\n    <!-- Badge Informasi -->\r\n    <div style=\"display: flex; flex-wrap: wrap; gap: 20px; background: linear-gradient(95deg, #f8fafc, #f0f5f0); padding: 20px 30px; border-bottom: 1px solid #e2e8e6;\">\r\n        <div style=\"display: flex; align-items: center; gap: 12px;\">\r\n            <span style=\"background: #1e6b3e; width: 38px; height: 38px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-building\"></i></span>\r\n            <div>\r\n                <div style=\"font-size: 0.7rem; color: #5a7a6a;\">YAYASAN</div>\r\n                <div style=\"font-weight: 700; color: #1e5631;\">Al-Hikamussalafie</div>\r\n            </div>\r\n        </div>\r\n        <div style=\"display: flex; align-items: center; gap: 12px;\">\r\n            <span style=\"background: #1e6b3e; width: 38px; height: 38px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-user-tie\"></i></span>\r\n            <div>\r\n                <div style=\"font-size: 0.7rem; color: #5a7a6a;\">KEPALA SEKOLAH</div>\r\n                <div style=\"font-weight: 700; color: #1e5631;\">Hamdan Hidayat, S.H.</div>\r\n            </div>\r\n        </div>\r\n        <div style=\"display: flex; align-items: center; gap: 12px;\">\r\n            <span style=\"background: #1e6b3e; width: 38px; height: 38px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; color: white;\"><i class=\"fas fa-map-marker-alt\"></i></span>\r\n            <div>\r\n                <div style=\"font-size: 0.7rem; color: #5a7a6a;\">LOKASI</div>\r\n                <div style=\"font-weight: 700; color: #1e5631;\">Cipunagara, Subang</div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!-- Konten Utama -->\r\n    <article style=\"padding: 35px 32px; background: #ffffff;\">\r\n        \r\n        <!-- 1) Sejarah Singkat -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 18px; border-left: 4px solid #1e6b3e; padding-left: 18px;\">\r\n                <i class=\"fas fa-history\" style=\"color: #1e6b3e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a2f; font-size: 1.5rem; font-weight: 600;\">Sejarah Singkat</h2>\r\n            </div>\r\n            <p style=\"line-height: 1.75; text-align: justify; color: #2d3e32; margin-bottom: 15px;\">\r\n                <strong>SMP Nusantara Cipunagara</strong> merupakan satuan pendidikan di bawah naungan \r\n                <strong>Yayasan Al-Hikamussalafie</strong> yang lahir dari semangat integrasi antara ilmu agama dan ilmu umum. \r\n                Berdiri sebagai jawaban atas aspirasi wali santri dan masyarakat, sekolah ini hadir untuk memastikan \r\n                setiap generasi memiliki bekal intelektual formal tanpa meninggalkan akar spiritualitas pesantren.\r\n            </p>\r\n            <p style=\"line-height: 1.75; text-align: justify; color: #2d3e32;\">\r\n                Lahir dari rahim perjuangan <strong>Pondok Pesantren Al-Hikamussalafie</strong> (sebelumnya bernama \r\n                Syarif Hidayatullah), gagasan pendirian SMP ini muncul pada <strong>Januari 2022</strong>. Didorong oleh \r\n                visi besar untuk memajukan pendidikan di wilayah Cipunagara, sekolah ini resmi memulai \r\n                <strong>Kegiatan Belajar Mengajar (KBM) pada 4 Januari 2022</strong>. Di bawah kepemimpinan kepala sekolah pertama, \r\n                <strong>Bpk. Hamdan Hidayat, S.H.</strong>, SMP Nusantara Cipunagara berkomitmen menjadi jembatan bagi para santri \r\n                dan warga sekitar untuk meraih masa depan yang gemilang.\r\n            </p>\r\n        </div>\r\n\r\n        <!-- 2) Visi & Misi dengan layout grid -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #e6bc7e; padding-left: 18px;\">\r\n                <i class=\"fas fa-bullseye\" style=\"color: #e6bc7e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a2f; font-size: 1.5rem; font-weight: 600;\">Visi & Misi</h2>\r\n            </div>\r\n            <div style=\"background: #f9fcf9; border-radius: 24px; padding: 25px; border: 1px solid #e2eedb;\">\r\n                <div style=\"margin-bottom: 28px;\">\r\n                    <h3 style=\"color: #1e6b3e; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;\">\r\n                        <i class=\"fas fa-eye\"></i> Visi\r\n                    </h3>\r\n                    <p style=\"font-style: italic; color: #3a5a48; font-size: 1rem; line-height: 1.6; margin: 0; padding-left: 20px; border-left: 3px solid #e6bc7e;\">\r\n                        \"Mewujudkan Generasi Unggul yang Berwawasan Luas, Berkarakter Islami, dan Berbakti pada Negeri.\"\r\n                    </p>\r\n                </div>\r\n                <div>\r\n                    <h3 style=\"color: #1e6b3e; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;\">\r\n                        <i class=\"fas fa-list-check\"></i> Misi\r\n                    </h3>\r\n                    <ul style=\"list-style-type: none; padding-left: 0; margin: 0;\">\r\n                        <li style=\"margin-bottom: 12px; display: flex; gap: 12px; align-items: flex-start;\">\r\n                            <i class=\"fas fa-check-circle\" style=\"color: #27ae60; margin-top: 3px;\"></i>\r\n                            <span style=\"color: #2d3e32;\">Menyelenggarakan pendidikan formal yang selaras dengan nilai-nilai luhur pesantren.</span>\r\n                        </li>\r\n                        <li style=\"margin-bottom: 12px; display: flex; gap: 12px; align-items: flex-start;\">\r\n                            <i class=\"fas fa-check-circle\" style=\"color: #27ae60; margin-top: 3px;\"></i>\r\n                            <span style=\"color: #2d3e32;\">Membangun kedisiplinan, kemandirian, dan etika sosial (Adabul Karimah) pada peserta didik.</span>\r\n                        </li>\r\n                        <li style=\"margin-bottom: 12px; display: flex; gap: 12px; align-items: flex-start;\">\r\n                            <i class=\"fas fa-check-circle\" style=\"color: #27ae60; margin-top: 3px;\"></i>\r\n                            <span style=\"color: #2d3e32;\">Mengembangkan potensi akademik dan kreativitas siswa melalui lingkungan belajar yang inklusif.</span>\r\n                        </li>\r\n                        <li style=\"margin-bottom: 12px; display: flex; gap: 12px; align-items: flex-start;\">\r\n                            <i class=\"fas fa-check-circle\" style=\"color: #27ae60; margin-top: 3px;\"></i>\r\n                            <span style=\"color: #2d3e32;\">Memperkuat sinergi antara sekolah, orang tua, dan masyarakat sekitar.</span>\r\n                        </li>\r\n                    </ul>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 3) Program Unggulan dengan grid card -->\r\n        <div style=\"margin-bottom: 40px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 20px; border-left: 4px solid #1e6b3e; padding-left: 18px;\">\r\n                <i class=\"fas fa-star\" style=\"color: #1e6b3e; font-size: 1.6rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a2f; font-size: 1.5rem; font-weight: 600;\">Program Unggulan</h2>\r\n            </div>\r\n            <div style=\"display: flex; flex-wrap: wrap; gap: 20px;\">\r\n                <div style=\"flex: 1; min-width: 240px; background: #fefaf2; border-radius: 20px; padding: 22px; border: 1px solid #f0e5d4;\">\r\n                    <div style=\"background: #1e6b3e20; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-book-quran\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Integrasi Kurikulum Pesantren</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Pembelajaran umum yang diperkuat dengan pendalaman kitab kuning dan nilai-nilai salafiah.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 240px; background: #fefaf2; border-radius: 20px; padding: 22px; border: 1px solid #f0e5d4;\">\r\n                    <div style=\"background: #1e6b3e20; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-quran\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Tahfidz & Tahsin Al-Qur\'an</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Program bimbingan membaca dan menghafal Al-Qur\'an secara intensif.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 240px; background: #fefaf2; border-radius: 20px; padding: 22px; border: 1px solid #f0e5d4;\">\r\n                    <div style=\"background: #1e6b3e20; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-users\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Pembinaan Karakter & Kepemimpinan</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Melalui organisasi kesiswaan dan kegiatan ekstrakurikuler yang aktif.</p>\r\n                </div>\r\n                <div style=\"flex: 1; min-width: 240px; background: #fefaf2; border-radius: 20px; padding: 22px; border: 1px solid #f0e5d4;\">\r\n                    <div style=\"background: #1e6b3e20; width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;\">\r\n                        <i class=\"fas fa-hand-holding-heart\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    </div>\r\n                    <h3 style=\"margin: 0 0 10px 0; color: #1e6b3e; font-size: 1.1rem;\">Local Wisdom & Community Project</h3>\r\n                    <p style=\"margin: 0; color: #5a6e5e; line-height: 1.5; font-size: 0.9rem;\">Melibatkan siswa dalam kegiatan sosial dan kemasyarakatan di lingkungan Cipunagara.</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- 4) Kurikulum & Lingkungan Belajar -->\r\n        <div style=\"margin-bottom: 40px; display: flex; flex-wrap: wrap; gap: 25px;\">\r\n            <div style=\"flex: 1; min-width: 260px; background: #f6f9f3; border-radius: 24px; padding: 22px;\">\r\n                <div style=\"display: flex; align-items: center; gap: 10px; margin-bottom: 15px;\">\r\n                    <i class=\"fas fa-book-open\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    <h3 style=\"margin: 0; color: #1e6b3e;\">Kurikulum Nasional Terpadu</h3>\r\n                </div>\r\n                <p style=\"color: #4a624e; line-height: 1.6; margin: 0;\">Mengacu pada standar nasional dengan pendekatan pembelajaran aktif dan inovatif.</p>\r\n            </div>\r\n            <div style=\"flex: 1; min-width: 260px; background: #f6f9f3; border-radius: 24px; padding: 22px;\">\r\n                <div style=\"display: flex; align-items: center; gap: 10px; margin-bottom: 15px;\">\r\n                    <i class=\"fas fa-tree\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    <h3 style=\"margin: 0; color: #1e6b3e;\">Lingkungan Islami yang Kondusif</h3>\r\n                </div>\r\n                <p style=\"color: #4a624e; line-height: 1.6; margin: 0;\">Terletak di kawasan pesantren yang tenang, mendukung fokus belajar dan pembentukan akhlak.</p>\r\n            </div>\r\n            <div style=\"flex: 1; min-width: 260px; background: #f6f9f3; border-radius: 24px; padding: 22px;\">\r\n                <div style=\"display: flex; align-items: center; gap: 10px; margin-bottom: 15px;\">\r\n                    <i class=\"fas fa-file-alt\" style=\"color: #1e6b3e; font-size: 1.5rem;\"></i>\r\n                    <h3 style=\"margin: 0; color: #1e6b3e;\">Legalitas & Dukungan Lingkungan</h3>\r\n                </div>\r\n                <p style=\"color: #4a624e; line-height: 1.6; margin: 0;\">Memiliki izin resmi dan dukungan penuh dari tokoh masyarakat serta sinergi dengan SMPN Cipunagara.</p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Mengapa Memilih -->\r\n        <div style=\"background: linear-gradient(105deg, #eef6ea, #e2f0e2); border-radius: 28px; padding: 30px 32px; margin-top: 20px;\">\r\n            <div style=\"display: flex; align-items: center; gap: 12px; margin-bottom: 18px;\">\r\n                <i class=\"fas fa-question-circle\" style=\"color: #1e6b3e; font-size: 1.8rem;\"></i>\r\n                <h2 style=\"margin: 0; color: #1e3a2f; font-size: 1.4rem; font-weight: 700;\">Mengapa Memilih SMP Nusantara Cipunagara?</h2>\r\n            </div>\r\n            <p style=\"line-height: 1.7; color: #2d4a3a; text-align: justify; margin-bottom: 0;\">\r\n                Kami memahami bahwa pendidikan adalah investasi terbaik. Di SMP Nusantara Cipunagara, putra-putri Anda \r\n                tidak hanya dididik untuk pintar secara akademik, tetapi juga dibimbing untuk memiliki integritas moral \r\n                yang kuat. Kami menawarkan solusi bagi orang tua yang menginginkan anaknya menempuh pendidikan SMP \r\n                namun tetap mendapatkan bekal agama yang mendalam di bawah asuhan \r\n                <strong>Yayasan Al-Hikamussalafie</strong>.\r\n            </p>\r\n        </div>\r\n\r\n        <!-- Footer Penutup -->\r\n        <div style=\"margin-top: 35px; padding-top: 20px; border-top: 1px solid #dce6dc; text-align: center; font-size: 0.75rem; color: #7a927a; display: flex; flex-wrap: wrap; justify-content: center; gap: 28px;\">\r\n            <span><i class=\"fas fa-calendar-check\"></i> Berdiri: 4 Januari 2022</span>\r\n            <span><i class=\"fas fa-chalkboard-user\"></i> Kepala Sekolah: Hamdan Hidayat, S.H.</span>\r\n            <span><i class=\"fas fa-handshake\"></i> Berkolaborasi dengan SMPN Cipunagara</span>\r\n        </div>\r\n        <div style=\"text-align: center; margin-top: 20px; font-weight: 500; color: #2c6b48;\">\r\n            <i class=\"fas fa-leaf\"></i> Menjadi Jembatan Generasi yang Berilmu, Beriman, dan Berbakti <i class=\"fas fa-leaf\"></i>\r\n        </div>\r\n    </article>\r\n</section>\r\n\r\n<!-- Font Awesome CDN -->\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">', 'Publish', 'Formal', '1773152523_20cff565aeac72df9807.png', 68, 1, '2026-03-09 12:10:32', '2026-03-09 12:10:00', '2026-04-06 14:48:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_admin`, `slug_kategori`, `nama_kategori`, `urutan`) VALUES
(4, 14, 'updates', 'Updates', 2),
(10, 14, 'pengumuman', 'Pengumuman', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_download`
--

CREATE TABLE `kategori_download` (
  `id_kategori_download` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_kategori_download` varchar(255) NOT NULL,
  `nama_kategori_download` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_kategori_download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_download`
--

INSERT INTO `kategori_download` (`id_kategori_download`, `id_admin`, `slug_kategori_download`, `nama_kategori_download`, `keterangan`, `urutan`, `gambar`, `status_kategori_download`) VALUES
(7, 11, 'panduan-ppdb-2026', 'PANDUAN PPDB 2026', 'Panduan pendaftaran siswa', 1, '1774584156_78f4071d5a0af1a99e52.png', 'Publish'),
(9, 11, 'pengumuman-ppdb-2026', 'PENGUMUMAN PPDB 2026', 'Pengumuman penerimaan siswa/santri', 2, '1774890723_8e11b282dba10d757418.png', 'Publish'),
(10, 14, 'informasi-yayasan', 'INFORMASI YAYASAN', 'Informasi umum sekolah', 3, '1774946428_4f96048a8e2cc32ab07b.png', 'Publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_ekstrakurikuler`
--

CREATE TABLE `kategori_ekstrakurikuler` (
  `id_kategori_ekstrakurikuler` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_kategori_ekstrakurikuler` varchar(255) NOT NULL,
  `nama_kategori_ekstrakurikuler` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_kategori_ekstrakurikuler` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_ekstrakurikuler`
--

INSERT INTO `kategori_ekstrakurikuler` (`id_kategori_ekstrakurikuler`, `id_admin`, `slug_kategori_ekstrakurikuler`, `nama_kategori_ekstrakurikuler`, `keterangan`, `urutan`, `gambar`, `status_kategori_ekstrakurikuler`) VALUES
(6, 11, 'bidang-olahraga', 'Bidang Olahraga', 'Kegiatan olahraga dan prestasi atletik', 2, '1774584442_0b0ad7e75dfbb174aba8.png', 'Publish'),
(7, 11, 'bidang-seni-dan-budaya', 'Bidang Seni dan Budaya', 'Kegiatan seni budaya', 1, '1774534197_e8bf666c28ed73292c40.png', 'Publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_fasilitas`
--

CREATE TABLE `kategori_fasilitas` (
  `id_kategori_fasilitas` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_kategori_fasilitas` varchar(255) NOT NULL,
  `nama_kategori_fasilitas` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_kategori_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_fasilitas`
--

INSERT INTO `kategori_fasilitas` (`id_kategori_fasilitas`, `id_admin`, `slug_kategori_fasilitas`, `nama_kategori_fasilitas`, `keterangan`, `urutan`, `gambar`, `status_kategori_fasilitas`) VALUES
(5, 11, 'tempat-ibadah', 'Tempat Ibadah', 'Fasilitas ibadah siswa', 4, '1774584366_f00e7f5d81ae7525a41b.png', 'Publish'),
(6, 11, 'laboratorium-komputer', 'Laboratorium Komputer', 'Fasilitas pembelajaran komputer', 2, '1774538441_684a909c33741ffafb0e.png', 'Publish'),
(7, 11, 'bangunan', 'Bangunan', 'Fasilitas gedung ', 1, '1774538220_2697930d551c309e6793.png', 'Publish'),
(8, 11, 'lapangan', 'Lapangan', 'Area kegiatan olahraga', 3, '1774538354_d242035cbb6d77d64e09.png', 'Publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_galeri`
--

CREATE TABLE `kategori_galeri` (
  `id_kategori_galeri` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_kategori_galeri` varchar(255) NOT NULL,
  `nama_kategori_galeri` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_kategori_galeri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_galeri`
--

INSERT INTO `kategori_galeri` (`id_kategori_galeri`, `id_admin`, `slug_kategori_galeri`, `nama_kategori_galeri`, `keterangan`, `urutan`, `gambar`, `status_kategori_galeri`) VALUES
(4, 11, 'kegiatan', 'Kegiatan', 'Kegiatan Siswa/Santri', 3, '1775139024_e6773440190956a7116a.png', 'Publish'),
(6, 11, 'family-gathering', 'Family gathering', '', 1, '1774595365_8f8693c6b09e119370c8.jpeg', 'Publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_portfolio`
--

CREATE TABLE `kategori_portfolio` (
  `id_kategori_portfolio` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_kategori_portfolio` varchar(255) NOT NULL,
  `nama_kategori_portfolio` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_kategori_portfolio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_portfolio`
--

INSERT INTO `kategori_portfolio` (`id_kategori_portfolio`, `id_admin`, `slug_kategori_portfolio`, `nama_kategori_portfolio`, `keterangan`, `urutan`, `gambar`, `status_kategori_portfolio`) VALUES
(8, 11, 'karya-tulis-ilmiah-kti', 'Karya Tulis Ilmiah (KTI)', 'Tulisan ilmiah siswa', 1, '1774528015_e6c9a909b69604770a8a.png', 'Publish'),
(9, 11, 'kaligrafi-seni-islami', 'Kaligrafi (Seni Islami)', 'Seni kaligrafi islami', 2, '1774528218_917b0cf261fde3e32413.png', 'Publish'),
(10, 11, 'karya-pidato-atau-ceramah-public-speaking', 'Karya Pidato atau Ceramah (Public Speaking)', 'Hasil pidato siswa/santri', 3, '1774528365_696d512e4d641dc67e05.png', 'Publish'),
(11, 11, 'karya-tulis-sederhana', 'Karya Tulis Sederhana', 'Hasil tulisan siswa', 4, '1774533833_f2e017c826bc1f37dbce.png', 'Publish'),
(12, 11, 'karya-seni-gambar-atau-kerajinan', 'Karya Seni (Gambar atau Kerajinan)', 'Hasil karya seni', 5, '1774533898_c1fc6c0f8ed64130686d.png', 'Publish'),
(13, 11, 'karya-proyek-prakarya-atau-ipa', 'Karya Proyek (Prakarya atau IPA)', 'Hasil karya siswa', 6, '1774533976_18c21cff2cc6a18d8f6f.png', 'Publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_prestasi`
--

CREATE TABLE `kategori_prestasi` (
  `id_kategori_prestasi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_kategori_prestasi` varchar(255) NOT NULL,
  `nama_kategori_prestasi` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_kategori_prestasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_prestasi`
--

INSERT INTO `kategori_prestasi` (`id_kategori_prestasi`, `id_admin`, `slug_kategori_prestasi`, `nama_kategori_prestasi`, `keterangan`, `urutan`, `gambar`, `status_kategori_prestasi`) VALUES
(5, 11, 'prestasi-pesantrensekolah', 'Prestasi Pesantren/Sekolah', 'Capaian prestasi lembaga', 4, '1774537899_3456ef79cc684392cfbb.png', 'Publish'),
(6, 11, 'prestasi-guru-staff-dan-tenaga-kependidikan', 'Prestasi Guru, Staff dan Tenaga Kependidikan', 'Capaian prestasi tenaga pendidik', 2, '1774537733_9aa26d254dbf4b7d47fc.png', 'Publish'),
(7, 11, 'prestasi-siswasantri', 'Prestasi Siswa/Santri', 'Capaian prestasi siswa/santri', 1, '1774584238_b56dd6d386e5a0b3a55d.png', 'Publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_staff`
--

CREATE TABLE `kategori_staff` (
  `id_kategori_staff` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `slug_kategori_staff` varchar(255) NOT NULL,
  `nama_kategori_staff` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status_kategori_staff` varchar(20) NOT NULL,
  `urutan` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_staff`
--

INSERT INTO `kategori_staff` (`id_kategori_staff`, `id_admin`, `slug_kategori_staff`, `nama_kategori_staff`, `keterangan`, `status_kategori_staff`, `urutan`, `gambar`) VALUES
(1, 11, 'pimpinan-yayasan-pondok-pesantren', 'PIMPINAN YAYASAN PONDOK PESANTREN', 'Pimpinan yayasan bertugas mengarahkan, mengelola, dan mengawasi seluruh kegiatan pesantren agar berjalan sesuai visi, misi, dan nilai-nilai keislaman.', 'Publish', 1, '1773151137_bfa43b64a5f7be062b67.jpeg'),
(3, 11, 'kepala-pondok', 'KEPALA PONDOK', 'Kepala pondok bertugas memimpin dan mengelola kegiatan harian pesantren serta membina santri dalam aspek keilmuan, ibadah, dan akhlak.', 'Publish', 2, '1773151159_6496226234a9761bac8c.jpeg'),
(4, 11, 'guru-smp-nusantara-cipunagara', 'GURU SMP NUSANTARA CIPUNAGARA', 'Guru bertugas melaksanakan proses pembelajaran, membimbing, dan mendidik siswa agar berkembang secara akademik maupun karakter. Selain itu, guru berperan menanamkan nilai disiplin, tanggung jawab, dan akhlak mulia dalam kehidupan sehari-hari siswa.', 'Publish', 5, '1774409127_58cdf9ae68fbfcd58e0b.png'),
(5, 11, 'kepala-sekolah-smp-nusantara', 'KEPALA SEKOLAH SMP NUSANTARA', 'Kepala sekolah bertugas memimpin dan mengelola seluruh kegiatan pendidikan di sekolah serta memastikan proses pembelajaran berjalan efektif, disiplin, dan berkualitas.', 'Publish', 3, '1774584473_972e8cdadfc7fb1fe75b.jpeg'),
(6, 11, 'wakil-kepala-sekolah-smp-nusantara-cipunagara', 'WAKIL KEPALA SEKOLAH SMP NUSANTARA CIPUNAGARA', 'Wakil kepala sekolah bertugas membantu kepala sekolah dalam mengelola dan mengawasi kegiatan pendidikan serta operasional sekolah. Selain itu, bertanggung jawab mengoordinasikan program akademik maupun non-akademik agar berjalan efektif dan terarah.', 'Publish', 4, '1774584484_f7176e266bef58deeb86.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `singkatan` varchar(255) DEFAULT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_cadangan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(24) NOT NULL,
  `pesan_whatsapp` varchar(500) NOT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `nama_facebook` varchar(255) DEFAULT NULL,
  `nama_instagram` varchar(255) DEFAULT NULL,
  `nama_youtube` varchar(255) DEFAULT NULL,
  `nama_tiktok` varchar(255) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `protocol` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_timeout` int(11) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `paginasi_depan` int(11) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `ringkasan` text DEFAULT NULL,
  `fitur_pendaftaran` varchar(20) NOT NULL,
  `mulai_pendaftaran` date DEFAULT NULL,
  `selesai_pendaftaran` date DEFAULT NULL,
  `pengumuman_pendaftaran` date DEFAULT NULL,
  `keterangan_pendaftaran` text DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_admin`, `namaweb`, `singkatan`, `tagline`, `tentang`, `deskripsi`, `website`, `email`, `email_cadangan`, `alamat`, `telepon`, `whatsapp`, `pesan_whatsapp`, `hp`, `logo`, `icon`, `facebook`, `instagram`, `youtube`, `tiktok`, `nama_facebook`, `nama_instagram`, `nama_youtube`, `nama_tiktok`, `google_map`, `protocol`, `smtp_host`, `smtp_port`, `smtp_timeout`, `smtp_user`, `smtp_pass`, `paginasi_depan`, `banner`, `ringkasan`, `fitur_pendaftaran`, `mulai_pendaftaran`, `selesai_pendaftaran`, `pengumuman_pendaftaran`, `keterangan_pendaftaran`, `login`, `tanggal`) VALUES
(1, 14, 'YAYASAN PENDIDIKAN AL-HIKAMUSSALAFIE', 'ALHIKAM', 'Membentuk Generasi Qurani yang Mandiri dan Berakhlak Mulia Melalui Pendidikan Pesantren dan SMP', '<div style=\"max-width: 1000px; margin: auto; font-family: \'Segoe UI\', sans-serif; background: #ffffff; padding: 30px;\">\r\n\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        <strong style=\"color:#000;\">Selamat datang</strong> di gerbang informasi resmi <strong style=\"color:#000;\">Yayasan Al-Hikamussalafie</strong>. Kami adalah lembaga pendidikan Islam yang berdedikasi untuk menjaga tradisi keilmuan salaf sekaligus adaptif terhadap perkembangan zaman melalui integrasi pendidikan pesantren dan sekolah formal.\r\n    </p>\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        Terletak di <strong style=\"color:#000;\">Kampung Tanjungsari, Desa Tanjung, Cipunagara, Subang</strong>, kami hadir sebagai mercusuar dakwah yang berkomitmen mencetak generasi berilmu, berakhlak mulia, dan bermanfaat bagi bangsa.\r\n    </p>\r\n\r\n    <h2 style=\"color:#000; text-align: center; margin-top:30px;\">Sejarah & Cikal Bakal</h2>\r\n\r\n    <h3 style=\"color:#000; margin-top:20px;\">Berawal dari Niat Memperbaiki Umat</h3>\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        Perjalanan kami dimulai pada <strong style=\"color:#000;\">Ahad, 23 Sya\'ban 1416 H (14 Januari 1996 M)</strong>. Kala itu, pendiri kami mengawali dakwah dengan nama <strong style=\"color:#000;\">Pondok Pesantren Syarif Hidayatullah</strong>. Berdirinya pesantren ini merupakan jawaban atas keresahan kondisi sosial masyarakat saat itu yang masih kental dengan praktik kemusyrikan dan tantangan lingkungan lainnya.\r\n    </p>\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        Dengan semangat doa dan keikhlasan, kegiatan belajar mengajar pertama kali dilaksanakan di kediaman orang tua pendiri, <strong style=\"color:#000;\">Bapak H. Mohammad Nur bin Sukrad</strong> dan <strong style=\"color:#000;\">Ibu Hj. Siti Wasri binti Saryad</strong>. Dari tempat sederhana inilah, nilai-nilai Al-Qur\'an mulai dipancarkan.\r\n    </p>\r\n\r\n    <h3 style=\"color:#000; margin-top:20px;\">Transformasi Menjadi Al-Hikamussalafie</h3>\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        Seiring berkembangnya zaman, pada <strong style=\"color:#000;\">19 Rabiul Awal 1436 H (10 Januari 2015 M)</strong>, pesantren resmi berganti nama menjadi <strong style=\"color:#000;\">Pondok Pesantren Al-Hikamussalafie</strong>. Nama baru ini menjadi simbol penguat identitas kami dalam menjaga tradisi keilmuan Islam salaf yang murni.\r\n    </p>\r\n\r\n    <h2 style=\"color:#000; text-align: center; margin-top:30px;\">Lahirnya SMP Nusantara Cipunagara</h2>\r\n\r\n    <h3 style=\"color:#000; margin-top:20px;\">Menjawab Kebutuhan Pendidikan Formal</h3>\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        Kami menyadari bahwa santri masa kini memerlukan keseimbangan antara ilmu agama dan pendidikan formal. Berawal dari aspirasi para wali murid, pada <strong style=\"color:#000;\">Januari 2022</strong>, muncul gagasan kuat untuk mendirikan sekolah menengah.\r\n    </p>\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        Setelah melalui proses perizinan yang didukung penuh oleh warga setempat dan instansi terkait (termasuk izin dari SMPN Cipunagara), maka berdirilah <strong style=\"color:#000;\">SMP Nusantara Cipunagara</strong>.\r\n    </p>\r\n\r\n    <p style=\"color:#444; text-align: justify;\"><strong style=\"color:#000;\">Awal KBM:</strong> 4 Januari 2022</p>\r\n    <p style=\"color:#444; text-align: justify;\"><strong style=\"color:#000;\">Kepala Sekolah Pertama:</strong> Hamdan Hidayat, S.H. (SK Yayasan 1 Juni 2022)</p>\r\n\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        Kini, santri tidak hanya mengaji kitab kuning dan Al-Qur\'an, tetapi juga mendapatkan pendidikan umum yang berkualitas di bawah naungan satu atap yayasan.\r\n    </p>\r\n\r\n    <h2 style=\"color:#000; text-align: center; margin-top:30px;\">Visi & Misi Kami</h2>\r\n\r\n    <h3 style=\"color:#000; margin-top:20px;\">Visi</h3>\r\n    <p style=\"color:#444; text-align: center; font-style: italic;\">\r\n        \"Mengukir Jejak, Meraih Cita: Memadukan Adab dan Ilmu dalam Satu Tarikan Nafas Pendidikan.\"\r\n    </p>\r\n\r\n    <h3 style=\"color:#000; margin-top:20px;\">Misi</h3>\r\n    <ul style=\"padding-left:20px;\">\r\n        <li style=\"color:#444; text-align: justify;\"><strong style=\"color:#000;\">Pendidikan Salaf:</strong> Melestarikan pengajaran kitab-kitab klasik dan tahfidz Al-Qur\'an.</li>\r\n        <li style=\"color:#444; text-align: justify;\"><strong style=\"color:#000;\">Pendidikan Modern:</strong> Menyelenggarakan sekolah formal (SMP) yang berorientasi pada kecakapan akademik dan karakter.</li>\r\n        <li style=\"color:#444; text-align: justify;\"><strong style=\"color:#000;\">Pengabdian Masyarakat:</strong> Menjadi pusat solusi keagamaan dan sosial bagi warga Cipunagara dan sekitarnya.</li>\r\n    </ul>\r\n\r\n    <h2 style=\"color:#000; text-align: center; margin-top:30px;\">Unit Pendidikan</h2>\r\n\r\n    <p style=\"color:#444; text-align: justify;\"><strong style=\"color:#000;\">Pondok Pesantren:</strong> Al-Hikamussalafie (Fokus pada Kitab Kuning & Al-Qur\'an)</p>\r\n    <p style=\"color:#444; text-align: justify;\"><strong style=\"color:#000;\">SMP Nusantara:</strong> Cipunagara (Pendidikan Formal Tingkat Pertama)</p>\r\n\r\n    <p style=\"color:#444; text-align: justify;\">\r\n        Saat ini, Yayasan Al-Hikamussalafie menaungi kedua lembaga tersebut dalam sinergi pendidikan yang harmonis.\r\n    </p>\r\n\r\n    <h3 style=\"color:#000; text-align: center; margin-top:30px;\">Ingin menjadi bagian dari keluarga besar Al-Hikamussalafie?</h3>\r\n    <p style=\"color:#444; text-align: center;\">\r\n        Kami membuka pintu seluas-luasnya bagi putra-putri Anda untuk menimba ilmu di lingkungan yang asri, religius, dan penuh kekeluargaan.\r\n    </p>\r\n\r\n    <div style=\"margin-top:30px; text-align:center;\">\r\n        <p style=\"color:#666;\">Kampung Tanjungsari, Desa Tanjung, Cipunagara, Subang</p>\r\n        <p style=\"color:#666;\">Berdiri: 14 Januari 1996 M / 23 Sya\'ban 1416 H</p>\r\n        <p style=\"color:#666;\">Perubahan Nama: 10 Januari 2015 M</p>\r\n        <p style=\"color:#000;\"><strong>Menjaga Tradisi Salaf, Adaptif dengan Zaman</strong></p>\r\n    </div>\r\n\r\n</div>', 'Bersama Yayasan Pendidikan Al Hikamussalafie, kami berkomitmen menghadirkan pendidikan terpadu berbasis Al-Qur’an melalui sistem pesantren dan SMP untuk membentuk generasi Qurani yang berakhlak mulia, mandiri, dan siap menjadi pemimpin masa depan.', 'http://localhost:8080/alhikam', 'alhikam@gmail.com', 'alhikam@gmail.com', 'Tanjung, \r\nKec. Cipunagara, \r\nKabupaten Subang, Jawa Barat 41257', '085860009319', '085860009319', 'Halo min, saya tertarik dengan sekolah Anda.', '085860009319', '1773155513_8d872f635dfdb812adee.png', '1773118935_0fe0ffbd7c5e80586276.png', 'https://www.facebook.com/share/1CAYPVq41M/', 'https://www.instagram.com/ponpes_alhikamussalafie?igsh=bWd4emJmNXRpaHMz', 'https://youtube.com/@alhikamussalafie?si=qS0kW3GSCoItxf50', 'https://www.tiktok.com/@ponpes_alhikamussalafie?_r=1&_t=ZS-94ccBUkVvDZ', 'PESANTREN AL-HIKAMUSSALAFIE', 'PESANTREN AL-HIKAMUSSALAFIE', 'PESANTREN AL-HIKAMUSSALAFIE', 'PESANTREN AL-HIKAMUSSALAFIE', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.355112470238!2d107.890582!3d-6.4766268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69370f9e716579%3A0xe1b10321482e10a6!2sYayasan%20Pondok%20Pesantren%20Alhikamussalafie!5e0!3m2!1sen!2sid!4v1773058455530!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'smtp', 'smtp.gmail.com', 465, 7, 'aalhikamussalafie@gmail.com', 'sllt ztpj oisy kuvr', 25, '1775490472_cabd759a88ae63889c38.jpeg', 'Selamat Datang <br>di Yayasan Pendidikan Al-hikamussalafie', 'On', '2026-01-01', '2026-12-01', '2026-12-31', '<p>Silakan melakukan pendaftaran online sesuai jadwal.</p>', '1775379131_0c3ee457393829c4e44a.jpeg', '2026-04-06 15:47:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link_website`
--

CREATE TABLE `link_website` (
  `id_link_website` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_link_website` varchar(255) NOT NULL,
  `nama_link_website` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link_website` varchar(255) NOT NULL,
  `metode_link` varchar(255) DEFAULT NULL,
  `status_link_website` varchar(255) NOT NULL,
  `tanggal_post` datetime DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `link_website`
--

INSERT INTO `link_website` (`id_link_website`, `id_admin`, `slug_link_website`, `nama_link_website`, `keterangan`, `urutan`, `gambar`, `link_website`, `metode_link`, `status_link_website`, `tanggal_post`, `tanggal`) VALUES
(7, 11, 'youtube-smp-nusantara-cipungara', 'YOUTUBE SMP NUSANTARA CIPUNGARA', 'Media berbagi video', 4, '1774540197_a8642582ef8697bd93ec.png', 'https://youtube.com/@smpnusantaracipunagara-g9f4m?si=l5Z2LYhQ0Vs-LD8V', '_blank', 'Publish', '2023-12-13 04:20:05', '2026-04-02 13:40:54'),
(8, 11, 'facebook-smp-nusantara-cipungara', 'FACEBOOK SMP NUSANTARA CIPUNGARA', 'Media sosial komunitas', 3, '1774540187_ff6878f9f5a5c9d8fd33.png', 'https://www.facebook.com/share/1Au3ShPhfL/', '_blank', 'Publish', '2024-01-22 13:19:59', '2026-04-02 13:40:36'),
(9, 11, 'tiktok-smp-nusantara-cipungara', 'TIKTOK SMP NUSANTARA CIPUNGARA', 'Media sosial video', 2, '1774540177_60529ceb3455d465042a.png', 'https://www.tiktok.com/@smpnusantara_?_r=1&_t=ZS-9523y0oemnN', '_blank', 'Publish', '2024-01-22 13:20:23', '2026-04-02 13:40:22'),
(10, 11, 'instagram-smp-nusantara-cipungara', 'INSTAGRAM SMP NUSANTARA CIPUNGARA', 'Media sosial sekolah', 1, '1774540168_ae8cc5ecefbac9e74c55.jpg', 'https://www.instagram.com/smpnusantara.cpg?igsh=MXg1NzY0cml6dTBjZQ==', '_blank', 'Publish', '2024-01-22 13:22:53', '2026-04-02 13:40:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `file_ext` varchar(255) DEFAULT NULL,
  `file_size` decimal(4,3) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id_media`, `id_admin`, `gambar`, `file_ext`, `file_size`, `tanggal_post`, `tanggal`) VALUES
(26, 14, '1775487671_2ebd71ec117aaa57835f.jpg', 'jpg', 0.092, '2026-04-06 15:01:11', '2026-04-06 15:01:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `id_kategori_portfolio` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul_portfolio` varchar(200) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `status_portfolio` varchar(20) NOT NULL,
  `tanggal_post` datetime DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `id_kategori_portfolio`, `id_admin`, `judul_portfolio`, `isi`, `gambar`, `hits`, `status_portfolio`, `tanggal_post`, `tanggal`) VALUES
(7, 8, 11, 'Jendela Literasi: Portofolio Karya Tulis Ilmiah dan Gagasan Terstruktur.', 'Santri sering membuat karya tulis ilmiah sebagai bentuk latihan berpikir kritis dan sistematis. Karya ini biasanya membahas topik keislaman, pendidikan, atau sosial dengan menggunakan metode penelitian sederhana. Tujuannya untuk melatih kemampuan menulis, menganalisis, serta menyampaikan gagasan secara terstruktur.', '1774528722_b310d6b4de529abf0e85.png', 16, 'Publish', '2026-03-26 12:38:42', '2026-04-06 14:22:25'),
(8, 9, 11, 'Seni Kalam & Hikmah.', 'Kaligrafi merupakan salah satu karya seni yang banyak dikembangkan di pesantren. Santri membuat tulisan ayat Al-Qur’an atau kata-kata hikmah dengan berbagai gaya tulisan yang indah. Selain melatih kreativitas, karya ini juga menjadi sarana memperdalam kecintaan terhadap Al-Qur’an.', '1774528964_9fc420f483449b0a1832.png', 6, 'Publish', '2026-03-26 12:42:45', '2026-04-06 14:22:52'),
(9, 10, 11, 'Lentera Lisan.', 'Santri dilatih membuat dan menyampaikan pidato atau ceramah keagamaan. Karya ini biasanya berupa teks pidato yang berisi pesan moral, dakwah, atau motivasi islami. Kegiatan ini bertujuan meningkatkan kemampuan berbicara di depan umum dan menyampaikan ajaran agama dengan baik', '1774529150_8e40d7484195cb0e6fdf.png', 4, 'Publish', '2026-03-26 12:45:50', '2026-03-27 03:19:29'),
(10, 11, 11, 'Jejak Pena Muda: Merangkai Ide, Menyusun Makna', 'Siswa SMP sering membuat karya tulis sederhana seperti laporan, rangkuman, atau makalah dari suatu materi pelajaran. Karya ini bertujuan untuk melatih kemampuan memahami materi, menulis dengan baik, serta menyusun ide secara sistematis.', '1774529692_83212e41ec151bfec52d.png', 1, 'Publish', '2026-03-26 12:54:52', '2026-03-27 03:19:27'),
(11, 12, 11, 'Kreasi Berkelanjutan: Portofolio Seni Ramah Lingkungan', 'Dalam pelajaran seni budaya, siswa menghasilkan karya seperti gambar, lukisan, atau kerajinan tangan dari bahan bekas. Karya ini bertujuan mengembangkan kreativitas, imajinasi, serta keterampilan dalam bidang seni.', '1774529827_1164c5d8d8159cab085c.png', 2, 'Publish', '2026-03-26 12:57:07', '2026-03-31 08:52:17'),
(12, 13, 11, 'Aksi Nyata: Rekam Jejak Proyek Belajar', 'Siswa juga membuat karya proyek seperti alat sederhana, percobaan sains, atau produk prakarya. Contohnya membuat rangkaian listrik sederhana atau kerajinan dari bahan alam. Karya ini bertujuan melatih keterampilan praktik, kerja sama, dan pemecahan masalah.', '1774584276_d64e6b451ee6fa11ae87.png', 25, 'Publish', '2026-03-26 13:01:16', '2026-04-06 14:39:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_kategori_prestasi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_prestasi` varchar(255) NOT NULL,
  `judul_prestasi` varchar(200) DEFAULT NULL,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `penyelenggara` varchar(255) DEFAULT NULL,
  `hadiah_prestasi` varchar(255) NOT NULL,
  `jenjang_prestasi` varchar(200) DEFAULT NULL,
  `tanggal_prestasi` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `status_prestasi` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `id_kategori_prestasi`, `id_admin`, `slug_prestasi`, `judul_prestasi`, `nama_penerima`, `penyelenggara`, `hadiah_prestasi`, `jenjang_prestasi`, `tanggal_prestasi`, `isi`, `gambar`, `hits`, `status_prestasi`, `tanggal`) VALUES
(8, 6, 11, 'guru-berprestasi-tingkat-kabupaten', 'Guru Berprestasi Tingkat Kabupaten', 'Laelatul Lutfiah, S.H', 'Dinas Pendidikan', 'Piagam Penghargaan', 'Kabupaten', '2024-09-05', 'Mendapat penghargaan sebagai guru berprestasi atas dedikasi dalam dunia pendidikan.', '1774586218_2a9ae709bce05dd66322.jpg', 4, 'Publish', '2024-01-22 09:12:08'),
(9, 7, 11, 'juara-2-lomba-cerdas-cermat-ipa', 'Juara 2 Lomba Cerdas Cermat IPA', 'Siti Nurhaliza', 'MGMP IPA Subang ', 'Sertifikat & Medali', 'Kabupaten', '2026-02-15', 'Siti Nurhaliza menunjukkan kemampuan akademik yang unggul dalam lomba cerdas cermat IPA tingkat kabupaten.', '1774585944_c8f39383d5ffceacc820.jpg', 18, 'Publish', '2024-01-22 09:12:50'),
(10, 7, 11, 'juara-1-olimpiade-matematika-tingkat-kabupaten', 'Juara 1 Olimpiade Matematika Tingkat Kabupaten', 'Ahmad Fauzan', 'Dinas Pendidikan Kabupaten Subang ', 'Piala & Uang Pembinaan', 'Kabupaten', '2026-03-09', 'Ahmad Fauzan berhasil meraih juara 1 dalam Olimpiade Matematika tingkat kabupaten setelah bersaing dengan puluhan peserta dari berbagai sekolah.', '1774585690_c0d6ae298edfaed53c62.png', 20, 'Publish', '2026-03-09 13:21:40'),
(14, 7, 11, 'juara-1-musabaqah-hifdzil-quran-mhq-5-juz', 'Juara 1 Musabaqah Hifdzil Qur’an (MHQ) 5 Juz', 'Muhammad Rizki', 'Kementerian Agama', 'Piala & Sertifikat', 'Provinsi', '2025-11-20', 'Muhammad Rizki berhasil meraih juara 1 dalam lomba hafalan Al-Qur’an 5 juz tingkat provinsi.', '1774586059_c0d4db731a7c09c05305.jpg', 2, 'Publish', '2026-03-27 04:34:19'),
(15, 6, 11, 'juara-2-lomba-inovasi-pembelajaran', 'Juara 2 Lomba Inovasi Pembelajaran', 'Vina Maudirantika, A.md.T', 'Kemendikbud', 'Sertifikat & Dana Pembinaan', 'Nasional', '2025-07-18', 'Mengembangkan metode pembelajaran inovatif berbasis digital.', '1774586315_503fb7b1320c264f8633.jpg', 1, 'Publish', '2026-03-27 04:38:35'),
(16, 6, 11, 'narasumber-seminar-pendidikan-nasional', 'Narasumber Seminar Pendidikan Nasional', 'Hamdan Hidayat, S.H', 'Universitas Pendidikan Indonesia', 'Sertifikat', 'Nasional', '2026-03-27', 'Menjadi narasumber dalam seminar pendidikan tingkat nasional.', '1774586405_1df7e1806e974ecd925b.jpg', 2, 'Publish', '2026-03-27 04:40:05'),
(17, 5, 11, 'pesantren-terbaik-dalam-pembinaan-santri', 'Pesantren Terbaik dalam Pembinaan Santri', 'Pondok Pesantren Al-Hikamussalafie', 'Kementerian Agama', 'Piagam Penghargaan', 'Provinsi', '2025-12-01', 'Mendapat penghargaan atas keberhasilan dalam pembinaan karakter dan keilmuan santri.', '1774586503_a6bb9d39d7ca47940ad1.jpg', 5, 'Publish', '2026-03-27 04:41:43'),
(18, 5, 11, 'juara-umum-pekan-olahraga-antar-pesantren', 'Juara Umum Pekan Olahraga Antar Pesantren', 'Pondok Pesantren Al-Hikamussalafie', 'Forum Pesantren Jawa Barat  ', 'Piala Bergilir', 'Provinsi', '2026-02-22', 'Berhasil meraih juara umum dalam ajang olahraga antar pesantren.', '1774586596_3869a667fe8d37c16c2b.jpg', 5, 'Publish', '2026-03-27 04:43:16'),
(19, 5, 11, 'sekolah-adiwiyata-tingkat-nasional', 'Sekolah Adiwiyata Tingkat Nasional', 'SMP Nusantara Cipunagara', 'Kementerian Lingkungan Hidup', 'Piagam & Trofi', 'Nasional', '2025-10-10', 'Sekolah mendapatkan penghargaan Adiwiyata atas kepedulian terhadap lingkungan.', '1774586671_c0fef7a7fbb352231a6b.jpg', 34, 'Publish', '2026-03-27 04:44:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_kategori_staff` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P','') NOT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `keahlian` text DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `status_staff` varchar(20) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id_staff`, `id_admin`, `id_kategori_staff`, `urutan`, `nama`, `jenis_kelamin`, `alamat`, `telepon`, `email`, `jabatan`, `keahlian`, `gambar`, `status_staff`, `tempat_lahir`, `tanggal_lahir`, `tanggal_post`, `tanggal`) VALUES
(4, 11, 3, 0, 'ZAMHARI HAKIM', 'L', '', '', '', 'KEPALA PONDOK', '', '1774584525_055cb36c4436af8eff1b.jpeg', 'Publish', 'CIPUNAGARA', '2004-11-12', '2022-10-05 07:39:36', '2026-03-27 04:08:46'),
(6, 11, 1, 1, 'BUNYAMIN HAKIM', 'L', 'CIPUNAGARA', '085860009319', 'alhikam@gmail.com', 'KEPALA PIMPINAN PONDOK', 'KEAGAMAAN', '1773150936_8a2af2a3440fe060d5f9.jpeg', 'Publish', 'CIPUNAGARA', '2000-01-01', '2026-03-09 12:11:35', '2026-03-10 14:04:36'),
(8, 11, 4, 1, 'Vina Maudirantika, A.md.T', 'P', '', '', '', 'Guru', '', '1774414940_79a55d0d194328bf31eb.jpeg', 'Publish', 'CIPUNAGARA', '2000-01-01', '2026-03-25 05:02:21', '2026-03-25 05:02:21'),
(9, 11, 4, 2, 'Hamdan Hidayat, S.H', 'L', '', '', '', 'Guru', '', '1774414995_6457a4fab6642ccd005d.jpeg', 'Publish', 'CIPUNAGARA', '1970-01-01', '2026-03-25 05:03:16', '2026-03-25 05:03:16'),
(10, 11, 4, 3, 'Laelatul Lutfiah, S.H', 'P', '', '', '', 'Guru', '', '1774415029_99cd7353974fc1fd8d5d.jpeg', 'Publish', 'CIPUNAGARA', '2000-01-01', '2026-03-25 05:03:49', '2026-03-25 05:03:49'),
(11, 11, 4, 4, 'Isro\'i', 'L', '', '', '', 'Guru', '', '1774415056_9cb46fa293c6d6570e7d.jpeg', 'Publish', 'CIPUNAGARA', '2000-01-01', '2026-03-25 05:04:16', '2026-03-25 05:04:16'),
(12, 11, 4, 5, 'Denullah Ahmad Gojali, S.Pd', 'L', '', '', '', 'Guru', '', '1774415084_5c1049ebac7e83919bb0.jpeg', 'Publish', 'CIPUNAGARA', '2000-01-01', '2026-03-25 05:04:44', '2026-03-25 05:04:44'),
(13, 11, 6, 6, 'Pujiyanto, S.Pd', 'L', '', '', '', 'Guru', '', '1774415119_53b29320d82f4eab3a19.jpeg', 'Publish', 'CIPUNAGARA', '1982-10-29', '2026-03-25 05:05:19', '2026-03-26 12:19:10'),
(14, 11, 4, 7, 'Mardiansyah', 'L', '', '', '', 'Guru', '', '1774415155_eeaf49d99b8d6c8cf879.jpeg', 'Publish', 'CIPUNAGARA', '2004-11-12', '2026-03-25 05:05:56', '2026-03-25 05:05:56'),
(15, 11, 5, 1, 'Adi Suparto, S.Pd.I', 'L', 'dadwadawdwad', 'dwadwdwadwdwa', 'wdwadwadwad', 'KEPALA SEKOLAH', 'dwdawdwadwa', '1774415194_2ac8a4a0b77187f8fbf8.jpeg', 'Publish', 'CIPUNAGARA', '2026-03-02', '2026-03-25 05:06:34', '2026-03-29 03:36:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_video` varchar(255) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `video` text NOT NULL,
  `status_video` varchar(255) DEFAULT NULL,
  `posisi_video` varchar(20) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `id_admin`, `slug_video`, `judul`, `keterangan`, `video`, `status_video`, `posisi_video`, `gambar`, `urutan`, `tanggal_post`, `tanggal`) VALUES
(2, 11, 'haflah-akhirussanah-pondok-pesantren-al-hikamussalafie-yang-ke-29', 'HAFLAH AKHIRUSSANAH PONDOK PESANTREN AL HIKAMUSSALAFIE YANG KE 29', 'ACARA HAFLAH AKHIRUSSANAH PONDOK PESANTREN AL HIKAMUSSALAFIE YANG KE 29', 'https://youtu.be/jV3Ja1J_SKQ?si=1hSuw8d_uiqUNCyW', 'Publish', 'Beranda', '1773116682_fb004afdf017f2200552.jpeg', 2, '2022-12-31 08:17:31', '2026-03-10 04:38:16'),
(3, 11, 'haflah-akhirussanah-pondok-pesantren-al-hikamussalafie-yang-ke-29', 'HAFLAH AKHIRUSSANAH PONDOK PESANTREN AL HIKAMUSSALAFIE YANG KE 29', 'Acara Khataman santri pondok Pesantren Al-Hikamussalafie', 'https://youtu.be/UTebE1oP0fI?si=X7l_ynG2mSGU3744', 'Publish', 'Beranda', '1773116880_66c2f9f0e3eff6b9c73b.jpeg', 1, '2024-01-26 07:34:56', '2026-03-10 22:33:55'),
(4, 11, 'selamat-berlibur-idul-fitri-1447-h', 'Selamat berlibur Idul Fitri 1447 H', 'Yaumul ijtima kepulangan santri', 'https://youtu.be/RZSBYMtwyDo?si=b2xTWyO6a11KSbU-', 'Publish', 'Beranda', '1773117439_0cd05621b771098b7f51.jpeg', 3, '2026-03-09 12:00:14', '2026-04-05 08:37:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan`
--

CREATE TABLE `yayasan` (
  `id_yayasan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nsp` varchar(255) NOT NULL,
  `status_yayasan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `luas_tanah` varchar(20) NOT NULL,
  `luas_bangunan` varchar(20) NOT NULL,
  `status_tanah` varchar(30) NOT NULL,
  `imb` varchar(30) NOT NULL,
  `nomor_sertifikat` varchar(30) NOT NULL,
  `nama_yayasan` varchar(255) NOT NULL,
  `tanggal_berdiri` date NOT NULL,
  `jumlah_pegawai` int(11) NOT NULL,
  `nilai_akreditasi` varchar(20) NOT NULL,
  `tanggal_akreditasi` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `nomor_izin` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `yayasan`
--

INSERT INTO `yayasan` (`id_yayasan`, `id_admin`, `nsp`, `status_yayasan`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `telepon`, `email`, `luas_tanah`, `luas_bangunan`, `status_tanah`, `imb`, `nomor_sertifikat`, `nama_yayasan`, `tanggal_berdiri`, `jumlah_pegawai`, `nilai_akreditasi`, `tanggal_akreditasi`, `tanggal_kadaluarsa`, `nomor_izin`, `keterangan`, `tanggal_post`, `tanggal_update`) VALUES
(1, 14, '052324', 'Mandiri', 'Tanjung, Kec. Cipunagara, Kabupaten Subang, Jawa Barat 41257', 'TANJUNG', 'CIPUNAGARA', 'SUBANG', 'Jawa Barat', '41257', '085860009319', 'alhikam@gmail.com', '5080 ', '5080 ', 'Milik Sendiri', 'IMB No.642/808/IMB/BPMP2T', 'adwdaw', 'YAYASAN PENDIDIKAN PONDOK PESANTREN AL-HIKAMUSSALAFIE', '2015-01-10', 10, 'B', '2022-01-15', '2026-03-06', '421.1/0239/DPMPTSP/XII/2021', 'awdwdwa', '2022-10-01 10:02:57', '2026-04-06 15:51:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `calon_peserta_didik`
--
ALTER TABLE `calon_peserta_didik`
  ADD PRIMARY KEY (`id_calon_peserta_didik`),
  ADD KEY `id_gelombang` (`id_gelombang`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_jenjang_pendidikan` (`id_jenjang_pendidikan`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `id_akun` (`id_akun`,`id_calon_peserta_didik`),
  ADD KEY `id_calon_peserta_didik` (`id_calon_peserta_didik`),
  ADD KEY `id_jenis_dokumen` (`id_jenis_dokumen`);

--
-- Indeks untuk tabel `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`),
  ADD KEY `id_kategori_download` (`id_kategori_download`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id_ekstrakurikuler`),
  ADD KEY `id_kategori_ekstrakurikuler` (`id_kategori_ekstrakurikuler`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_kategori_fasilitas` (`id_kategori_fasilitas`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_kategori_galeri` (`id_kategori_galeri`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id_gelombang`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `jenis_dokumen`
--
ALTER TABLE `jenis_dokumen`
  ADD PRIMARY KEY (`id_jenis_dokumen`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `jenjang_pendidikan`
--
ALTER TABLE `jenjang_pendidikan`
  ADD PRIMARY KEY (`id_jenjang_pendidikan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori_download`
--
ALTER TABLE `kategori_download`
  ADD PRIMARY KEY (`id_kategori_download`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori_ekstrakurikuler`
--
ALTER TABLE `kategori_ekstrakurikuler`
  ADD PRIMARY KEY (`id_kategori_ekstrakurikuler`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori_fasilitas`
--
ALTER TABLE `kategori_fasilitas`
  ADD PRIMARY KEY (`id_kategori_fasilitas`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  ADD PRIMARY KEY (`id_kategori_galeri`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori_portfolio`
--
ALTER TABLE `kategori_portfolio`
  ADD PRIMARY KEY (`id_kategori_portfolio`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori_prestasi`
--
ALTER TABLE `kategori_prestasi`
  ADD PRIMARY KEY (`id_kategori_prestasi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori_staff`
--
ALTER TABLE `kategori_staff`
  ADD PRIMARY KEY (`id_kategori_staff`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `link_website`
--
ALTER TABLE `link_website`
  ADD PRIMARY KEY (`id_link_website`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`),
  ADD KEY `id_kategori_portfolio` (`id_kategori_portfolio`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `id_kategori_prestasi` (`id_kategori_prestasi`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kategori_staff` (`id_kategori_staff`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `yayasan`
--
ALTER TABLE `yayasan`
  ADD PRIMARY KEY (`id_yayasan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `calon_peserta_didik`
--
ALTER TABLE `calon_peserta_didik`
  MODIFY `id_calon_peserta_didik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id_ekstrakurikuler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id_gelombang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_dokumen`
--
ALTER TABLE `jenis_dokumen`
  MODIFY `id_jenis_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jenjang_pendidikan`
--
ALTER TABLE `jenjang_pendidikan`
  MODIFY `id_jenjang_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori_download`
--
ALTER TABLE `kategori_download`
  MODIFY `id_kategori_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori_ekstrakurikuler`
--
ALTER TABLE `kategori_ekstrakurikuler`
  MODIFY `id_kategori_ekstrakurikuler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori_fasilitas`
--
ALTER TABLE `kategori_fasilitas`
  MODIFY `id_kategori_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  MODIFY `id_kategori_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori_prestasi`
--
ALTER TABLE `kategori_prestasi`
  MODIFY `id_kategori_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori_staff`
--
ALTER TABLE `kategori_staff`
  MODIFY `id_kategori_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `link_website`
--
ALTER TABLE `link_website`
  MODIFY `id_link_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `yayasan`
--
ALTER TABLE `yayasan`
  MODIFY `id_yayasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `calon_peserta_didik`
--
ALTER TABLE `calon_peserta_didik`
  ADD CONSTRAINT `fk_cpd_agama_ayah` FOREIGN KEY (`id_agama_ayah`) REFERENCES `agama` (`id_agama`),
  ADD CONSTRAINT `fk_cpd_jenjang_ayah` FOREIGN KEY (`id_jenjang_ayah`) REFERENCES `jenjang` (`id_jenjang`),
  ADD CONSTRAINT `fk_cpd_pekerjaan_ayah` FOREIGN KEY (`id_pekerjaan_ayah`) REFERENCES `pekerjaan` (`id_pekerjaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
