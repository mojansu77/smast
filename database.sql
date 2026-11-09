-- ============================================================
-- database.sql — SMA Negeri 1 Kediri (SMAN 1 Kediri)
-- Database Name: smast_kediri
-- ============================================================

CREATE DATABASE IF NOT EXISTS `smast_kediri`
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;
USE `smast_kediri`;

-- ─── 1. USERS (Admin Panel) ───────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `users` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `username`   VARCHAR(50)  NOT NULL UNIQUE,
  `password`   VARCHAR(255) NOT NULL,
  `email`      VARCHAR(100) NOT NULL,
  `fullname`   VARCHAR(100) NOT NULL,
  `role`       ENUM('admin','editor') NOT NULL DEFAULT 'editor',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default admin — password: Smast@2025 (hash bcrypt)
INSERT INTO `users` (`username`, `password`, `email`, `fullname`, `role`)
VALUES (
  'admin',
  '$2y$10$BLW9X4RbULzQybmctXhjbea116oSwsritfiKIU7xma1oVPsNYyE/u',
  'admin@sman1kediri.sch.id',
  'Administrator SMAN 1 Kediri',
  'admin'
) ON DUPLICATE KEY UPDATE `username`=`username`;

-- ─── 2. ARTIKEL / BERITA ─────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `artikel` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `judul`      VARCHAR(200) NOT NULL,
  `slug`       VARCHAR(200) NOT NULL UNIQUE,
  `konten`     LONGTEXT     NOT NULL,
  `gambar`     VARCHAR(255) DEFAULT NULL,
  `kategori`   ENUM('berita','pengumuman','prestasi','kegiatan') NOT NULL DEFAULT 'berita',
  `penulis`    VARCHAR(100) DEFAULT 'Admin',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `artikel` (`judul`, `slug`, `konten`, `kategori`, `penulis`) VALUES
(
  'SMAN 1 Kediri Raih Juara 1 Olimpiade Sains Tingkat Provinsi Jawa Timur',
  'sman1-kediri-juara-olimpiade-sains-provinsi-jatim',
  '<p>SMA Negeri 1 Kediri kembali menorehkan prestasi gemilang di kancah pendidikan Jawa Timur. Tim Olimpiade Sains SMAN 1 Kediri berhasil meraih Juara 1 pada ajang Olimpiade Sains Nasional (OSN) tingkat Provinsi Jawa Timur yang diselenggarakan di Surabaya.</p><p>Keberhasilan ini merupakan buah dari kerja keras siswa dan bimbingan intensif para guru pembimbing. Kepala Sekolah, Drs. Bambang Supriyanto, M.Pd., menyampaikan rasa bangga dan terima kasih kepada seluruh tim yang telah berjuang.</p>',
  'prestasi',
  'Admin SMAN 1 Kediri'
),
(
  'PPDB Online 2025/2026 SMAN 1 Kediri Resmi Dibuka',
  'ppdb-online-2025-2026-sman1-kediri-dibuka',
  '<p>SMA Negeri 1 Kediri resmi membuka Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2025/2026 secara online mulai tanggal 1 Juni 2025. Calon siswa dapat mendaftarkan diri melalui portal resmi PPDB Kota Kediri.</p><p>Tersedia jalur Zonasi, Afirmasi, Perpindahan Tugas Orang Tua, dan Jalur Prestasi. Kuota penerimaan sebanyak 432 siswa untuk 12 rombongan belajar.</p>',
  'pengumuman',
  'Panitia PPDB'
),
(
  'Class Meeting Semester Ganjil 2025 — Semangat Sportivitas Antar Kelas',
  'class-meeting-semester-ganjil-2025',
  '<p>Pekan Class Meeting Semester Ganjil SMAN 1 Kediri berlangsung meriah selama lima hari. Berbagai cabang olahraga dan seni dipertandingkan, mulai dari futsal, basket, voli, bulu tangkis, hingga lomba paduan suara dan menggambar.</p><p>Kegiatan ini bertujuan mempererat keakraban antar siswa sekaligus menjadi ajang pengembangan minat dan bakat di luar akademik.</p>',
  'kegiatan',
  'Tim OSIS'
);

-- ─── 3. GALERI FOTO (Dikosongkan — foto resmi dapat diunggah melalui Admin Dashboard) ───
CREATE TABLE IF NOT EXISTS `galeri` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `judul`      VARCHAR(150) NOT NULL,
  `nama_file`  VARCHAR(255) NOT NULL,
  `kategori`   ENUM('akademik','kesiswaan','prestasi','fasilitas','kegiatan') NOT NULL DEFAULT 'kegiatan',
  `deskripsi`  TEXT         DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ─── 4. FASILITAS SEKOLAH ─────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `nama`       VARCHAR(100) NOT NULL,
  `deskripsi`  TEXT         NOT NULL,
  `ikon`       VARCHAR(60)  NOT NULL DEFAULT 'fa-school',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fasilitas` (`nama`, `deskripsi`, `ikon`) VALUES
('Laboratorium IPA',        'Laboratorium Fisika, Kimia, dan Biologi yang lengkap dengan peralatan modern untuk mendukung pembelajaran sains.', 'fa-flask'),
('Laboratorium Komputer',   '60 unit komputer dengan koneksi internet cepat, mendukung pembelajaran TIK dan pemrograman dasar.', 'fa-computer'),
('Perpustakaan Digital',    'Koleksi lebih dari 5.000 buku fisik dan akses ke ribuan e-book serta jurnal ilmiah digital.', 'fa-book-open'),
('Lapangan Olahraga',       'Lapangan basket, futsal, voli, dan atletik yang memadai untuk kegiatan olahraga dan turnamen antar kelas.', 'fa-futbol'),
('Aula Serbaguna',          'Aula berkapasitas 500 orang untuk kegiatan wisuda, seminar, pertunjukan seni, dan pertemuan besar.', 'fa-users'),
('Ruang Seni & Musik',      'Studio musik dan ruang kesenian lengkap dengan alat musik, kanvas, dan perangkat audio visual modern.', 'fa-music'),
('Kantin Sehat',            'Kantin bersih dan tertib dengan menu makanan bergizi yang telah lulus uji dari Dinas Kesehatan Kota Kediri.', 'fa-utensils'),
('Koperasi Siswa',          'Koperasi yang dikelola siswa menyediakan alat tulis, seragam, dan kebutuhan belajar dengan harga terjangkau.', 'fa-store');

-- ─── 5. PESAN KONTAK ──────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `kontak` (
  `id`      INT AUTO_INCREMENT PRIMARY KEY,
  `nama`    VARCHAR(100) NOT NULL,
  `email`   VARCHAR(100) NOT NULL,
  `subjek`  VARCHAR(200) NOT NULL,
  `pesan`   TEXT         NOT NULL,
  `tanggal` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `dibaca`  TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ─── 6. PENGUMUMAN ────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `judul`      VARCHAR(200) NOT NULL,
  `isi`        TEXT         NOT NULL,
  `tanggal`    DATE         NOT NULL,
  `aktif`      TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pengumuman` (`judul`, `isi`, `tanggal`) VALUES
('PPDB Online 2025/2026 Dibuka',              'Pendaftaran PPDB Online sudah dibuka. Silakan akses portal resmi PPDB Kota Kediri.', '2025-06-01'),
('UTS Ganjil 10–17 November 2025',            'Ujian Tengah Semester Ganjil dilaksanakan 10–17 November 2025. Belajarlah dengan giat!', '2025-10-20'),
('Beasiswa Prestasi Daerah — Deadline 30 Nov','Pendaftaran Beasiswa Prestasi Daerah masih dibuka hingga 30 November 2025.', '2025-10-15'),
('Class Meeting Akhir Semester Ganjil',       'Turnamen Olahraga Antar Kelas akan diselenggarakan setelah UAS semester ganjil.', '2025-10-01');
