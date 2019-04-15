-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 03:11 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembinaan_karakter`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `nis` varchar(6) NOT NULL,
  `nama_alumni` varchar(30) NOT NULL,
  `th_lulus` year(4) NOT NULL,
  `id_jurusan` tinyint(2) NOT NULL,
  `sub_kelas` char(1) NOT NULL,
  `id_ortu` int(5) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`nis`, `nama_alumni`, `th_lulus`, `id_jurusan`, `sub_kelas`, `id_ortu`, `alamat`) VALUES
('12347', 'Baim', 2017, 2, 'A', 2, 'Bantul, Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `detail_poin`
--

CREATE TABLE `detail_poin` (
  `id_detail_poin` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun_ajaran` char(9) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `id_pelanggaran` tinyint(3) DEFAULT NULL,
  `id_prestasi` tinyint(3) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_poin`
--

INSERT INTO `detail_poin` (`id_detail_poin`, `tanggal`, `tahun_ajaran`, `nis`, `id_pelanggaran`, `id_prestasi`, `ket`) VALUES
(1, '2017-11-13', '2016/2017', '16433', 1, NULL, ''),
(2, '2017-11-13', '2016/2017', '16422', 1, NULL, ''),
(3, '2017-11-13', '2016/2017', '16426', 1, NULL, ''),
(4, '2017-11-14', '2016/2017', '16444', 5, NULL, ''),
(6, '2017-11-13', '2016/2017', '16430', 5, NULL, ''),
(7, '2017-11-14', '2016/2017', '16441', 1, NULL, ''),
(8, '2017-11-14', '2016/2017', '12347', NULL, 2, NULL),
(9, '2017-07-05', '2016/2017', '16421', NULL, 6, ''),
(10, '2017-07-05', '2016/2017', '16425', NULL, 6, ''),
(12, '2017-07-05', '2016/2017', '16429', NULL, 6, ''),
(13, '2017-07-05', '2016/2017', '16435', NULL, 6, ''),
(14, '2017-07-05', '2016/2017', '16440', NULL, 6, ''),
(15, '2017-07-05', '2016/2017', '16445', NULL, 6, ''),
(16, '2017-07-05', '2016/2017', '16451', NULL, 6, ''),
(17, '2017-07-05', '2016/2017', '16457', NULL, 6, ''),
(18, '2017-08-20', '2016/2017', '16439', NULL, 4, ''),
(19, '2017-08-20', '2016/2017', '16424', NULL, 4, ''),
(20, '2017-09-21', '2016/2017', '16440', NULL, 2, ''),
(21, '2017-10-14', '2016/2017', '16427', NULL, 3, ''),
(22, '2017-10-14', '2016/2017', '16444', NULL, 3, ''),
(23, '2017-10-14', '2016/2017', '16421', NULL, 3, ''),
(24, '2017-10-19', '2016/2017', '16434', NULL, 12, ''),
(25, '2017-07-05', '2016/2017', '16420', 1, NULL, ''),
(26, '2017-07-05', '2016/2017', '16423', 5, NULL, ''),
(27, '2017-07-14', '2016/2017', '16435', 5, NULL, ''),
(28, '2017-07-21', '2016/2017', '16428', 1, NULL, ''),
(29, '2017-08-08', '2016/2017', '16439', 1, NULL, ''),
(30, '2017-08-10', '2016/2017', '16431', 1, NULL, ''),
(31, '2017-08-23', '2016/2017', '16430', 1, NULL, ''),
(32, '2017-08-24', '2016/2017', '16429', 1, NULL, ''),
(33, '2017-08-12', '2016/2017', '16445', 5, NULL, ''),
(34, '2017-11-09', '2016/2017', '16427', 1, NULL, ''),
(35, '2017-11-10', '2016/2017', '16420', 2, NULL, ''),
(36, '2017-09-05', '2016/2017', '16426', 1, NULL, ''),
(37, '2017-10-14', '2016/2017', '16430', 5, NULL, ''),
(42, '2017-12-05', '2017/2018', '16421', 2, NULL, ''),
(44, '2017-12-11', '2017/2018', '16425', 1, NULL, ''),
(45, '2016-12-01', '2016/2017', '16419', 5, NULL, 'Main Playstation'),
(46, '2016-12-05', '2016/2017', '16419', 5, NULL, 'Main di Alkid'),
(47, '2016-12-08', '2016/2017', '16419', 1, NULL, 'Tidak mendapatkan alat  transportasi dari rumah ke kampus'),
(48, '2017-01-17', '2016/2017', '16426', 7, NULL, 'Berbicara keras dan melempar sapu ke teman lainya'),
(49, '2017-01-20', '2016/2017', '16426', 7, NULL, 'Memukul - mukul meja'),
(50, '2017-02-25', '2016/2017', '16421', 1, NULL, 'Ban sepeda motor bagian belakang bocor'),
(51, '2017-02-25', '2016/2017', '16424', 2, NULL, 'Dijual'),
(52, '2017-02-26', '2016/2017', '16423', 8, NULL, 'Malas'),
(53, '2017-03-17', '2016/2017', '16427', 4, NULL, ''),
(54, '2017-04-17', '2016/2017', '16431', 6, NULL, 'Kelaparan'),
(55, '2017-05-17', '2016/2017', '16446', 9, NULL, 'Bosan mengikuti mata pelajaran'),
(56, '2017-05-17', '2016/2017', '16428', 10, NULL, ''),
(57, '2017-06-17', '2016/2017', '16422', 5, NULL, ''),
(58, '2017-07-17', '2017/2018', '16420', NULL, 6, ''),
(59, '2017-08-17', '2017/2018', '16421', NULL, 1, ''),
(60, '2017-09-17', '2017/2018', '16421', NULL, 2, ''),
(61, '2017-09-27', '2017/2018', '16421', NULL, 3, ''),
(62, '2017-10-17', '2016/2017', '16419', NULL, 8, ''),
(63, '2017-10-17', '2016/2017', '16427', NULL, 8, ''),
(64, '2017-10-17', '2017/2018', '16432', NULL, 8, ''),
(65, '2017-10-17', '2017/2018', '16434', NULL, 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` char(18) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `no_hp`, `jabatan`) VALUES
('1234', 'Yuliani Enie', '080808080808', ''),
('123456712345123456', 'Enie Yuliani', '086432178932', ''),
('123456789100987654', 'Anie', '089765123456', 'Wali Kelas'),
('123456789101112131', 'Yuliani', '085867628434', 'Wali Kelas'),
('195003121212121212', 'Jusuf Kalla', '081299999222', 'Wali Kelas'),
('195602120632179432', 'Drs.Totok Wisnutoro', '085255214895', 'Wali Kelas'),
('195709282003126532', 'Dra. Sri Eko Handayani Ratnawa', '085867354211', 'Wali Kelas'),
('195802129001235743', 'Drs.Sriyana', '085292502250', 'Wali kelas'),
('195807072001021683', 'Dra. Yohana Umiyati', '082109098888', 'Wali Kelas'),
('195912036217893216', 'Cahyono Agus W.,S.Pd', '087325678419', 'Wali Kelas'),
('196002112004001643', 'Drs. Supriyono Wibowo', '081354321166', 'Wali Kelas'),
('196003242001032451', 'Drs.Nugroho Sukowati', '085614895432', 'Wali Kelas'),
('196012124682345721', 'Niken Tyas Utami, S.Pd', '081209321212', 'Wali Kelas'),
('196012210953218765', 'Muh.Wardiyanto', '089867813010', 'Wali kelas'),
('196110061988031004', 'Drs. Agung Widyatmoko, M.Pd', '082109542874', 'Wali Kelas'),
('196203252100021134', 'Erma Ade Susmonowati, S.Pd', '081256321452', 'Wali Kelas'),
('196302031988031010', 'Drs.Aragani mizan zakaria,M.pd', '098134378134', 'Wali Kelas'),
('196601092002345123', 'Budiono', '089876543210', 'Wali Kelas'),
('196601182008012001', 'Diah Herawati, S.Pd', '082134567213', 'Wali Kelas'),
('196603042003017690', 'Evi Suryanti, S.Pd', '089822447788', 'Wali Kelas'),
('197006082004028799', 'Slamet Riyanti, S.Pd', '085867009911', 'Wali Kelas'),
('197103072006042003', 'Siti Ulfiyatul Hoiriyah, S.Pd', '081256790321', 'Wali Kelas'),
('197310062001120011', 'Eka Vicianto, S.Pd.T', '08123451234', 'Guru Kesiswaan'),
('197702098943217654', 'Endang Listyandari, S.Pd', '089854123764', 'Wali Kelas'),
('197808102006042007', 'Rum Ismawati, S.Si', '085729674321', 'Wali Kelas'),
('198204262009022004', 'Himawati Widyastuti, M.Si', '081215346789', 'Wali Kelas'),
('785432190890989096', 'Aragani Mizan Zakaria', '081265789234', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` tinyint(2) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Desain Pemodelan dan Informasi Bangunan'),
(2, 'Teknik Konstruksi Gedung, Sanitasi dan Perawatan'),
(3, 'Geologi Pertambangan'),
(4, 'Teknik Sistem Informasi, Jaringan dan Aplikasi'),
(5, 'Teknik Komputer dan Jaringan'),
(6, 'Teknik Audio Video'),
(7, 'Teknik Otomasi Industri'),
(8, 'Teknik Fabrikasi Logam dan Perawatan Otomotif'),
(9, 'Kimia Industri'),
(10, 'Teknik Pengolahan Migas dan Petrokimia'),
(11, 'Kimia Analis'),
(12, 'Teknik Elektronika Daya dan Komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `kat_pelanggaran`
--

CREATE TABLE `kat_pelanggaran` (
  `id_kat_pelanggaran` tinyint(2) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_pelanggaran`
--

INSERT INTO `kat_pelanggaran` (`id_kat_pelanggaran`, `nama_kategori`) VALUES
(1, 'Komponen Kelakuan'),
(2, 'Komponen Kerapihan'),
(3, 'Komponen Kerajinan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` tinyint(3) NOT NULL,
  `id_jurusan` tinyint(2) NOT NULL,
  `tingkat_kelas` varchar(4) NOT NULL,
  `sub_kelas` char(1) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `jml_siswa` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `tingkat_kelas`, `sub_kelas`, `nip`, `jml_siswa`) VALUES
(1, 1, 'X', 'A', '195802129001235743', 32),
(4, 2, 'XI', 'A', '195912036217893216', 32),
(5, 3, 'X', 'A', '196003242001032451', 32),
(7, 1, 'X', 'B', '195602120632179432', 32),
(8, 2, 'X', 'A', '196012210953218765', 32),
(10, 4, 'X', 'A', '196601182008012001', 32),
(11, 5, 'X', 'A', '197103072006042003', 32),
(12, 6, 'X', 'A', '197702098943217654', 32),
(13, 7, 'X', 'A', '197808102006042007', 32),
(14, 8, 'X', 'A', '198204262009022004', 32),
(15, 3, 'X', 'B', '196012124682345721', 32),
(16, 8, 'X', 'B', '196203252100021134', 32),
(17, 9, 'X', 'A', '195807072001021683', 32),
(18, 10, 'X', 'A', '195709282003126532', 32),
(19, 11, 'X', 'A', '196002112004001643', 32),
(20, 12, 'X', 'A', '196603042003017690', 32),
(21, 2, 'XII', 'A', '196601092002345123', 32),
(24, 2, 'XIII', 'A', '195003121212121212', 32);

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_ortu` int(5) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id_ortu`, `nama_ortu`, `alamat_ortu`, `no_hp`) VALUES
(1, 'Bunga Citra Lestari', 'Yogyakarta', '098764374251'),
(2, 'Krisdayanti', 'Bantul, Yogyakarta', '089999999999'),
(3, 'Chucky', 'Condong Catur, Depok, Sleman, Yogyakarta', '086666666666'),
(4, 'Ridwan Asrori', 'Ngemplak, Sleman Yogyakarta', '083866304002'),
(5, 'HM Aris', 'Grembyangan, Madurejo, Prambanan, Sleman', '0811294783'),
(6, 'Yudha Yumayana', 'Giwangan, Yogyakarta', '085647021807'),
(7, 'Wachid Cahyadi', 'Kramen, Sidoagung, Godean, Sleman, Yogyakarta', '087835312932'),
(8, 'Rahmat Hakim', 'Tumut, Sumbersari, Moyudan, Sleman', '08564021804'),
(9, 'Ridwan', 'Balong, Umbulharjo, Cangkringan, Sleman', '085728000422'),
(10, 'Aris Joko Saraswo', 'Jl. Raya Condet No. 55 Kec. Pasar Rebo, Jakarta Timur', '085728054444'),
(11, 'Bambang', 'Perumahan Griya Kencan Permai, Argorejo, Sedayu, Bantul\r\n', ''),
(12, 'Anton Tedda', 'Karanggayam, Sitimulyo, Piyungan, Bantul, Yogyakarta', '081567629043'),
(13, 'Herry Wicaksono', 'Perum Jambusari Indah, Wedomartani, Ngemplak, Sleman, Yogyakarta', '081393937071'),
(14, 'Ratno hermawan', 'Buyutan, Banyurejo, Tempel, Sleman', '085229624162'),
(15, 'Makmur Amin', 'Banyon, Pendowoharjo, Sewo, Bantul', '085642353664'),
(16, 'Michael Christianto', 'Pugeran, Maguwoharjo, Depok, Sleman', '081225927888'),
(17, 'Arief Rahman', 'Sawungsari, Hargobinangun, Pakem', '081548515774'),
(18, 'Basworo Dibyo', 'Candirejo, Sardonoharjo, Ngaglik, Sleman', '081393365787'),
(19, 'Dodiek Hari', 'Kaliurang Barat, Hargobinangun, Pakem', '081288046553'),
(20, 'N Wicaksono KP', 'Gorongan No. 153, Condong Catur, Depok, Sleman', '085643870947'),
(21, 'Randy', 'Juragan, Sidoluhur, Godean, Sleman', '08156704040'),
(22, 'S. Budi Santoso', 'Jowah, Sidoluhur, Godean, Sleman', '0811327546'),
(23, 'Hadi Sumarsono', 'Perum Bukit Permata, Candi Gebang, Sleman', '081218765349'),
(24, 'Teguh Sumampaw', 'Plemburan, Sariharjo, Ngaglik, Sleman', '08122638778'),
(25, 'Riszki Gunawan', 'Pakisaji, Candibinangun, Pakem', '08812960156'),
(26, 'Rian Sofyan', 'Prokerten, Trimurti, Srandakan, Bantul', '081393358287'),
(27, 'Ali Wijaya', 'Gatak, Sidoluhur, Godean, Sleman', '08122588007'),
(28, 'Satromo', 'Jurugan, Bangunkerto, Turi, Sleman', '085281961396'),
(29, 'Wakik', 'Dadapan Pinggir, Sidomulyo, Bambanglipuro, Bantul', '085281961396'),
(30, 'Anyari', 'Kwangen, Argomulyo, Cangkringan, Sleman', '085281961396'),
(31, 'Abu Hasan', 'Sembego, Depok, Sleman, Yogyakarta', '085235950990'),
(32, 'Isbandi', 'Jl. Swelobumi No. 03 Pringgolayan, Dabag, Condongcatur, Depok, Sleman', '082331983841'),
(33, 'Abdus Salam', 'Ngentak, Umbulharjo, Ngemplak, Sleman', '082234422140'),
(34, 'Jumali', 'Sambilegi Baru, Maguwoharjo, Depok, Sleman', '085257592582'),
(35, 'Kusnadi', 'Banteng, Hargobinangun, Pakem, Sleman', '085281961396'),
(36, 'Didit', 'Payangan Utara, Girirejo, Imogri, Bantul', '085281961396'),
(37, 'Untung', 'Pugeran, Maguwoharjo, Depok, Sleman', '085281961396'),
(38, 'Junaidi', 'Karanglo, Purwomartani, Kalasan, Sleman', '085281961396'),
(39, 'Amas Yunus', 'Krapyak, Wedomartani, Ngemplak, Sleman', '08154701609'),
(40, 'Eddy Machmud', 'Perum Lojajar Indah, Ngaglik, Sleman', '08123942158'),
(41, 'Riza Falepi', 'Jl. Teratai, Perum Concat, Sleman', '0811888039'),
(42, 'Bubun Budiawan', 'Kradenan, Girirejo, Imogiri, Bantul', '081321117604'),
(43, 'Haris Mulyana', 'Jl. Nogomudo No. 293, Gowok, Depok, Sleman', '081221495162'),
(44, 'Slamet Riyadi', 'Tegalngijon, Sumberagung, Moyudan, Sleman', '081321929302');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` tinyint(3) NOT NULL,
  `nama_pelanggaran` varchar(150) NOT NULL,
  `id_sub_kategori` tinyint(2) NOT NULL,
  `poin` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `id_sub_kategori`, `poin`) VALUES
(1, 'Terlambat hadir di sekolah / keg.PBM lebih dari 5 menit', 1, 2),
(2, 'Tidak membawa buku paket/pelajaran', 1, 5),
(3, 'TIdak mengerjakan tugas sesuai dengan batas waktu yang ditentukan', 1, 7),
(4, 'Mencontek/ menconteki', 1, 10),
(5, 'Keluar kampus tanpa ijin guru/ karyawan (membolos)', 1, 10),
(6, 'Makan/ minum/ tidur saat PBM tanpa ijin guru/ karyawan', 1, 10),
(7, 'Membuat gaduh di kelas', 1, 10),
(8, 'Tidak mengikuti ekstrakurikuler wajib di sekolah', 1, 10),
(9, 'Menggunakan media player dan atau alat komunikasi saat PBM', 1, 20),
(10, 'Membawa/ meminjamkan alat selain yang menunjang PBM', 1, 20),
(11, 'Tidak mengikuti kegiatan keagamaan tanpa keterangan', 1, 20),
(12, 'Tidak mengikuti upacara bendera', 1, 10),
(13, 'Menggunakan Narkoba', 5, 127),
(16, 'berkata -kata tidak sopan', 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` tinyint(3) NOT NULL,
  `nama_prestasi` varchar(100) NOT NULL,
  `poin` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nama_prestasi`, `poin`) VALUES
(1, 'Juara lomba tingkat Nasional', 150),
(2, 'Juara lomba tingkat Provinsi', 100),
(3, 'Juara lomba tingkat Kabupaten/Kota', 50),
(4, 'Juara lomba tingkat Kecamatan', 25),
(5, 'Juara lomba tingkat Sekolah', 20),
(6, 'Peringkat 1-3 di kelas', 20),
(7, 'Pengurus aktif OSIS/PK/Pramuka per tahun', 10),
(8, 'Pengurus aktif kelas per tahun', 5),
(9, 'Pengurus aktif organisasi kemasyarakatan', 5),
(10, 'Menjadi panitia kegiatan sekolah', 4),
(11, 'Mengikuti lomba sebagai wakil sekolah', 3),
(12, 'Mendapat nilai tertinggi ulangan harian', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(6) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `th_angkatan` year(4) NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` tinyint(3) NOT NULL,
  `id_ortu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `th_angkatan`, `alamat`, `id_kelas`, `id_ortu`) VALUES
('12345', 'enie', 2014, 'Panjen Maguwoharjo Depok Sleman Yogyakarta', 1, 1),
('16419', 'Ahmad Umar Said', 2014, 'Grembyangan, Madurejo, Prambanan, Sleman', 1, 4),
('16420', 'Anggun Septin Kartika Wulan', 2016, 'Giwangan, Yogyakarta', 1, 5),
('16421', 'Annisah Nur Hidayati', 2016, 'Kramen, Sidoagung, Godean, Sleman, Yogyakarta', 1, 6),
('16422', 'Arif Dwi Susanto', 2016, 'Tumut, Sumbersari, Moyudan, Sleman', 1, 7),
('16423', 'Ariyani Putri Pertiwi', 2016, 'Balong, Umbulharjo, Cangkringan, Sleman', 1, 8),
('16424', 'Asep Cahya Bangkit Kuswandi', 2016, 'Jl. Raya Condet No. 55 Kec. Pasar Rebo, Jakarta Timur', 5, 9),
('16425', 'Avido Tinandhia', 2016, 'Perumahan Griya Kencan Permai, Argorejo, Sedayu, Bantul', 5, 10),
('16426', 'Bayu Wijayanto', 2016, 'Karanggayam, Sitimulyo, Piyungan, Bantul, Yogyakarta', 5, 11),
('16427', 'Benedictus Donny Mahardika', 2016, 'Perum Jambusari Indah, Wedomartani, Ngemplak, Sleman, Yogyakarta', 5, 12),
('16428', 'Cahyo Budi Utomo', 2016, 'Buyutan, Banyurejo, Tempel, Sleman', 5, 13),
('16429', 'Daru Pahlevi', 2016, 'Banyon, Pendowoharjo, Sewo, Bantul', 7, 14),
('16430', 'Deni Setiyawan', 2016, 'Pugeran, Maguwoharjo, Depok, Sleman', 7, 15),
('16431', 'Ditto Krisna Aji', 2016, 'Sawungsari, Hargobinangun, Pakem', 7, 16),
('16432', 'Fathul Husni', 2016, 'Candirejo, Sardonoharjo, Ngaglik, Sleman', 7, 17),
('16433', 'Ferdian Nur Rizky', 2016, 'Kaliurang Barat, Hargobinangun, Pakem', 7, 18),
('16434', 'Fitri Hera Nurviandini', 2016, 'Gorongan No. 153, Condong Catur, Depok, Sleman', 24, 19),
('16435', 'Galih Rizal Basroni', 2016, 'Juragan, Sidoluhur, Godean, Sleman', 24, 20),
('16436', 'Gigih Nur Pratomo', 2016, 'Jowah, Sidoluhur, Godean, Sleman', 24, 21),
('16437', 'Gilang Risky Fauzi Putra', 2016, 'Perum Bukit Permata, Candi Gebang, Sleman', 24, 22),
('16438', 'Harmanto', 2016, 'Plemburan, Sariharjo, Ngaglik, Sleman', 24, 23),
('16439', 'Heri Gusmiyanto', 2016, 'Pakisaji, Candibinangun, Pakem', 10, 24),
('16440', 'Isna Wahyuntari', 2016, 'Prokerten, Trimurti, Srandakan, Bantul', 10, 25),
('16441', 'Kruis Mila Mimi Sabdani', 2016, 'Gatak, Sidoluhur, Godean, Sleman', 10, 26),
('16442', 'Adrian Dwiki Yudha', 2016, 'Jurugan, Bangunkerto, Turi, Sleman', 10, 27),
('16443', 'Bristia Prabowo', 2016, 'Dadapan Pinggir, Sidomulyo, Bambanglipuro, Bantul', 10, 28),
('16444', 'Dewangga Adila Nugraha', 2016, 'Kwangen, Argomulyo, Cangkringan, Sleman', 11, 29),
('16445', 'Eko Puji Lestari', 2016, 'Sembego, Depok, Sleman, Yogyakarta', 11, 30),
('16446', 'Iin Mutaqima', 2016, 'Jl. Swelobumi No. 03 Pringgolayan, Dabag, Condongcatur, Depok, Sleman', 11, 31),
('16447', 'Ahmad Habibi', 2016, 'Ngentak, Umbulharjo, Ngemplak, Sleman', 11, 32),
('16448', 'Heri Purnama', 2016, 'Sambilegi Baru, Maguwoharjo, Depok, Sleman', 11, 33),
('16449', 'Lukito Njono Putro', 2016, 'Banteng, Hargobinangun, Pakem, Sleman', 12, 34),
('16450', 'Nia Suparniatun', 2016, 'Payangan Utara, Girirejo, Imogri, Bantul', 12, 35),
('16451', 'Muhammad Yusuf', 2016, 'Pugeran, Maguwoharjo, Depok, Sleman', 12, 36),
('16452', 'Yoga Arif Santosa', 2016, 'Karanglo, Purwomartani, Kalasan, Sleman', 12, 37),
('16453', 'Tazkiyatun Nihayah', 2016, 'Krapyak, Wedomartani, Ngemplak, Sleman', 12, 38),
('16454', 'Zahir Elfares Wasim', 2016, 'Perum Lojajar Indah, Ngaglik, Sleman', 13, 39),
('16455', 'Mariana Febri Tri Kusdiarti', 2016, 'Jl. Teratai, Perum Concat, Sleman', 13, 40),
('16456', 'Tri Wahyuni Nursiyami', 2016, 'Kradenan, Girirejo, Imogiri, Bantul', 13, 41),
('16457', 'Rika Indriati', 2016, 'Jl. Nogomudo No. 293, Gowok, Depok, Sleman', 13, 42),
('16458', 'Noorshin Tri', 2016, 'Tegalngijon, Sumberagung, Moyudan, Sleman', 13, 43),
('16557', 'andika pradianto', 2015, 'timoho', 20, 23);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_do`
--

CREATE TABLE `siswa_do` (
  `nis` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `th_keluar` year(4) NOT NULL,
  `id_jurusan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_do`
--

INSERT INTO `siswa_do` (`nis`, `nama`, `th_keluar`, `id_jurusan`) VALUES
('12348', 'Thinkerbell', 2017, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kat_pelanggaran`
--

CREATE TABLE `sub_kat_pelanggaran` (
  `id_sub_kategori` tinyint(2) NOT NULL,
  `nama_sub_kategori` varchar(100) NOT NULL,
  `id_kat_pelanggaran` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kat_pelanggaran`
--

INSERT INTO `sub_kat_pelanggaran` (`id_sub_kategori`, `nama_sub_kategori`, `id_kat_pelanggaran`) VALUES
(1, 'Belajar Mengajar', 1),
(2, 'Penghinaan', 1),
(3, 'Sarana Prasarana', 1),
(4, 'Memakai Perhiasan', 1),
(5, 'Rokok/ Miras/ Narkoba/ Petasan/ Pornografi', 1),
(6, 'Pemalsuan/ Pencurian/ Zina/ Pemerasan/ Perjudian/ Kesopanan/ Penyelewengan/ Geng', 1),
(7, 'Rambut', 2),
(8, 'Pakaian', 2),
(9, 'Kehadiran', 3);

-- --------------------------------------------------------

--
-- Table structure for table `temp_rapat`
--

CREATE TABLE `temp_rapat` (
  `id_temp_rapat` int(12) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `jml_poin_pelanggaran` smallint(3) NOT NULL,
  `lihat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sp_1`
--

CREATE TABLE `temp_sp_1` (
  `id_temp_sp_1` int(12) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `jml_poin_pelanggaran` smallint(3) NOT NULL,
  `lihat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_sp_1`
--

INSERT INTO `temp_sp_1` (`id_temp_sp_1`, `nis`, `jml_poin_pelanggaran`, `lihat`) VALUES
(1, '16430', 22, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `temp_sp_2`
--

CREATE TABLE `temp_sp_2` (
  `id_temp_sp_2` int(12) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `jml_poin_pelanggaran` smallint(3) NOT NULL,
  `lihat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sp_3`
--

CREATE TABLE `temp_sp_3` (
  `id_temp_sp_3` int(12) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `jml_poin_pelanggaran` smallint(3) NOT NULL,
  `lihat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `th_ajaran`
--

CREATE TABLE `th_ajaran` (
  `id_th_ajaran` mediumint(5) NOT NULL,
  `tahun_ajaran` char(9) NOT NULL,
  `sekarang` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `th_ajaran`
--

INSERT INTO `th_ajaran` (`id_th_ajaran`, `tahun_ajaran`, `sekarang`) VALUES
(1, '2016/2017', 'N'),
(2, '2017/2018', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` tinyint(3) NOT NULL,
  `nama_tindakan` varchar(30) NOT NULL,
  `ketentuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`, `ketentuan`) VALUES
(1, 'SP 1', 'Jumlah poin pelanggaran lebih dari 35 dan kurang dari 50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_login` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `nis` varchar(6) DEFAULT NULL,
  `id_ortu` int(5) DEFAULT NULL,
  `hak_akses` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_login`, `username`, `password`, `nip`, `nis`, `id_ortu`, `hak_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '12345', 0, 1),
(3, 'yuliani', 'c9f3b70f59dfb23e28329eb1acd2dcec', '123456789101112131', NULL, NULL, 3),
(8, 'kesiswaan', 'accc7841ce41b0f788a737bf9798ea4f', '123456712345123456', '', 0, 2),
(9, 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', '196302031988031010', '', 0, 4),
(10, 'deni', '43f41d127a81c54d4c8f5f93daeb7118', '', '16430', 0, 5),
(11, 'walikelas', 'dcf52f84dbf511ee4a0abcfc18093ee4', '196012124682345721', '', 0, 3),
(12, 'rumisma', '8b96c1db10e701d69a6f0b58d7cf2bee', '197808102006042007', '', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_ortu` (`id_ortu`);

--
-- Indexes for table `detail_poin`
--
ALTER TABLE `detail_poin`
  ADD PRIMARY KEY (`id_detail_poin`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`),
  ADD KEY `id_prestasi` (`id_prestasi`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kat_pelanggaran`
--
ALTER TABLE `kat_pelanggaran`
  ADD PRIMARY KEY (`id_kat_pelanggaran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_kat_pelanggaran` (`id_sub_kategori`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_ortu` (`id_ortu`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `siswa_do`
--
ALTER TABLE `siswa_do`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `sub_kat_pelanggaran`
--
ALTER TABLE `sub_kat_pelanggaran`
  ADD PRIMARY KEY (`id_sub_kategori`),
  ADD KEY `id_kat_pelanggaran` (`id_kat_pelanggaran`);

--
-- Indexes for table `temp_rapat`
--
ALTER TABLE `temp_rapat`
  ADD PRIMARY KEY (`id_temp_rapat`);

--
-- Indexes for table `temp_sp_1`
--
ALTER TABLE `temp_sp_1`
  ADD PRIMARY KEY (`id_temp_sp_1`);

--
-- Indexes for table `temp_sp_2`
--
ALTER TABLE `temp_sp_2`
  ADD PRIMARY KEY (`id_temp_sp_2`);

--
-- Indexes for table `temp_sp_3`
--
ALTER TABLE `temp_sp_3`
  ADD PRIMARY KEY (`id_temp_sp_3`);

--
-- Indexes for table `th_ajaran`
--
ALTER TABLE `th_ajaran`
  ADD PRIMARY KEY (`id_th_ajaran`),
  ADD UNIQUE KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_ortu` (`id_ortu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_poin`
--
ALTER TABLE `detail_poin`
  MODIFY `id_detail_poin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kat_pelanggaran`
--
ALTER TABLE `kat_pelanggaran`
  MODIFY `id_kat_pelanggaran` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id_ortu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_kat_pelanggaran`
--
ALTER TABLE `sub_kat_pelanggaran`
  MODIFY `id_sub_kategori` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temp_rapat`
--
ALTER TABLE `temp_rapat`
  MODIFY `id_temp_rapat` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_sp_1`
--
ALTER TABLE `temp_sp_1`
  MODIFY `id_temp_sp_1` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_sp_2`
--
ALTER TABLE `temp_sp_2`
  MODIFY `id_temp_sp_2` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_sp_3`
--
ALTER TABLE `temp_sp_3`
  MODIFY `id_temp_sp_3` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `th_ajaran`
--
ALTER TABLE `th_ajaran`
  MODIFY `id_th_ajaran` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `alumni_ibfk_2` FOREIGN KEY (`id_ortu`) REFERENCES `orang_tua` (`id_ortu`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`id_sub_kategori`) REFERENCES `sub_kat_pelanggaran` (`id_sub_kategori`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_ortu`) REFERENCES `orang_tua` (`id_ortu`);

--
-- Constraints for table `sub_kat_pelanggaran`
--
ALTER TABLE `sub_kat_pelanggaran`
  ADD CONSTRAINT `sub_kat_pelanggaran_ibfk_1` FOREIGN KEY (`id_kat_pelanggaran`) REFERENCES `kat_pelanggaran` (`id_kat_pelanggaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
