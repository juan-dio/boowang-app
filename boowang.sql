-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2024 pada 18.55
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boowang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bukit', '2024-05-31 11:56:09', '2024-05-31 11:56:09'),
(2, 'Sejarah', '2024-05-31 11:56:15', '2024-05-31 11:56:15'),
(3, 'Taman', '2024-05-31 11:56:26', '2024-05-31 11:56:26'),
(4, 'Pantai', '2024-05-31 11:56:32', '2024-05-31 11:56:32'),
(5, 'Religi', '2024-05-31 11:56:52', '2024-05-31 11:56:52'),
(6, 'Kolam Renang', '2024-05-31 13:49:32', '2024-05-31 13:49:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_19_114430_create_categories_table', 1),
(5, '2024_05_19_115153_create_places_table', 1),
(6, '2024_05_19_115844_create_transactions_table', 1),
(8, '2024_06_05_214209_add_metode_to_transactions_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gmaps_link` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `jumlah_tiket_weekday` int(11) NOT NULL,
  `jumlah_tiket_weekend` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `places`
--

INSERT INTO `places` (`id`, `category_id`, `nama`, `alamat`, `gmaps_link`, `deskripsi`, `image`, `harga_tiket`, `jam_buka`, `jam_tutup`, `jumlah_tiket_weekday`, `jumlah_tiket_weekend`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bukit Kapur Jaddih', 'Jakan, Parseh, Kec. Socah, Kabupaten Bangkalan, Jawa Timur 69161', 'https://maps.app.goo.gl/61DnuVv9f4HQbhtz7', '<div>Bukit Jaddih terletak di Desa Jaddih, Kecamatan Socah, Kebupaten Bangkalan, Madura, Jawa Timur. Bukit Jaddih merupakan tambang kapur yang diubah menjadi tempat wisata dan layak untuk dikunjungi. Tempat ini dapat menjadi salah satu agenda wisata saat berada di Madura, terutama penggemar foto.<br><br>Bukit Jaddih memiliki pemandangan yang luar biasa. Bukit tambang kapur ini digali dan dibuka untuk menghadirkan pemandangan buatan yang indah. Uniknya, pertambangan ditempat ini masih berlangsung, sehingga ada pamandangan truk dan alat berat yang lalu lalang. Bukit Jaddih memiliki danau buatan dengan air berwarna hijau, wisatawan akan mendapatkan spot yang indah di tempat ini.<br><br>Danau dikelilingi bukit kapur yang terpahat. Tempat ini semakin memukau dengan kombinasi langit yang cerah. Untuk menikmati pemandangan sekitar danau, tersedia rakit yang disewakan kepada para wisatawan. Wisatawan tidak perlu khawatir dengan kondisi danau, kedalaman danau hanya sekitar 70 sentimeter (cm). Setelah menikmati keliling menggunakan rakit, perjalanan dapat dilanjutkan menuju rongga-rongga bukit. Banyak spot foto di wilayah ini sebagai kenang-kenangan. Ada juga kolam renang yang tersedia untuk bermain-main. Air kolam renang terasa segar di tengah perbukitan kapur yang panas. Bagi wisatawan yang ingin berbelanja tersedia toko aksesoris Goa Pote.</div>', 'wisata-images/rF1OxHxywqDD1LsP9QromFYBPc19bMXxPdQjJX3w.jpg', 10000, '07:00:00', '16:00:00', 100, 300, '2024-05-31 12:02:14', '2024-05-31 13:39:08'),
(2, 2, 'Mercusuar “Dutch East Indies” Bangkalan', 'Jalan Sembilangan, Socah, Slempit, Pernajuh, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69161', 'https://maps.app.goo.gl/xPSxU6f2NZRUrfcG9', '<div><strong>Mercusuar Sembilangan</strong> atau <strong>Mercusuar Ujung Slempit</strong> adalah sebuah mercusuar yang terletak di Pulau Madura, Jawa Timur. Mercusuar tersebut didirikan pada 1879. Mercusuar tersebut memiliki ketinggian 78 meter dan lingkar 5,3 meter. Mercusuar tersebut berbetnuk menara besi bercat putih dengan lentera dan galeri. Mercusuar tersebut terletak di lepas pantai ujung paling barat Madura. Mercusuar tersebut adalah penerangan pendaratan dan penerangan untuk memandu kapal-kapal yang melewati selat antara Madura dan Jawa untuk menuju ke pelabuhan Surabaya.</div>', 'wisata-images/1lQUAluZ1An96DSXEv03YJkrW9bNMHFQ1zPZlmul.png', 5000, '08:00:00', '16:00:00', 100, 200, '2024-05-31 12:52:05', '2024-05-31 13:38:48'),
(3, 3, 'Taman Paseban Bangkalan', 'Jalan Veteran, Kraton, Bangkalan, Demangan Barat, Demangan, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69115', 'https://maps.app.goo.gl/D8fAq394X8U3mLfA7', '<div>Taman Paseban di Kota Bangkalan adalah salah satu ikon wisata kota yang berlokasi strategis di tengah kota, berhadapan langsung dengan Masjid Agung Bangkalan. Taman ini sering menjadi tujuan utama bagi keluarga untuk mengajak anak-anak bermain dan bersantai. Dengan suasana yang hijau dan adem, Taman Paseban menawarkan area yang nyaman untuk berkumpul dan menikmati waktu bersama .<br><br></div><div>Taman ini juga dilengkapi dengan fasilitas pendopo, kantin, dan toilet yang memudahkan pengunjung untuk menikmati waktu mereka dengan lebih nyaman . Renovasi yang dilakukan pada Taman Paseban telah memperluas dan meningkatkan fasilitas yang ada, menjadikannya lebih menarik dan fungsional untuk memenuhi kebutuhan masyarakat Bangkalan .<br><br></div><div>Taman Paseban tidak hanya berfungsi sebagai tempat rekreasi, tetapi juga memiliki nilai sejarah dan budaya yang penting bagi warga setempat. Keberadaannya di pusat kota membuatnya mudah diakses dan sering menjadi tempat untuk berbagai kegiatan sosial dan budaya .</div>', 'wisata-images/BCsiNtMEeqVrl6CgNj8HuMj9y9NpYYWYQ2TflMpM.jpg', 3000, '06:00:00', '17:00:00', 200, 500, '2024-05-31 13:31:52', '2024-05-31 13:38:25'),
(4, 5, 'Makam Aer Mata Ibu', 'Makam Air Mata, Buduran, Kec. Arosbaya, Kabupaten Bangkalan, Jawa Timur 69151', 'https://maps.app.goo.gl/TbdAeWpiz6ZQYDdc8', '<div><strong>Makam Aer Mata Ibu</strong> adalah sebuah kompleks pemakaman bangsawan Madura yang terletak di Desa Buduran, Kecamatan Arosbaya, Kabupaten Bangkalan, di Pulau Madura, diperkirakan dibangun sejak abad ke-15. Di kompleks ini dimakamkan para bangsawan dari Wangsa Cakraningrat, beserta kerabat dan abdi dalem istana lainnya. Kompleks ini dibangun di atas perbukitan kapur, dengan ketinggian + 30 m di atas permukaan laut.</div><div><br>Menurut cerita rakyat, nama kompleks pemakaman ini diambil dari kisah Ratu Ibu (Syarifah Ambami, isteri Adipati Cakraningrat I), yang menangis di pertapaannya.</div>', 'wisata-images/rISX1sXWfDLQKxt0apRyytEeUerGaQbGHQZU84U9.jpg', 5000, '07:00:00', '16:00:00', 150, 200, '2024-05-31 13:37:32', '2024-05-31 16:49:29'),
(5, 4, 'Pantai Pasir Putih Tlangoh', 'Temanah, Tlangoh, Kec. Tj. Bumi, Kabupaten Bangkalan, Jawa Timur 69156', 'https://maps.app.goo.gl/jhAudW71zgqNiz1X6', '<div>Salah satu daya tarik wisata di Pulau Madura adalah pantainya yang indah dan memesona. Salah satunya adalah Pantai Tlangoh yang terletak di Desa Tlangoh, Kecamatan Tanjungbumi, Kabupaten Bangkalan, Jawa Timur.<br><br></div><div>Pantai ini menawarkan panorama alam yang menakjubkan dengan hamparan pasir putih, air laut yang biru, dan angin sepoi-sepoi yang menyegarkan.</div><div><br>Pantai Tlangoh merupakan salah satu wisata pantai yang cukup populer di Bangkalan Madura. Banyak wisatawan yang datang ke pantai ini untuk menikmati keindahan dan keseruan pantai.<br><br></div><div>Di pantai ini, pengunjung bisa bermain pasir, berenang, berfoto, atau sekadar bersantai di tepi pantai.<br><br></div><div>Pantai ini juga memiliki beberapa spot foto yang menarik, seperti ayunan, jembatan kayu, dan gazebo.<br><br></div><div>Untuk menuju Pantai Tlangoh, pengunjung bisa menggunakan kendaraan pribadi atau umum. Jarak pantai ini sekitar 40 km dari kota Bangkalan.</div>', 'wisata-images/Fu8pBkbqxz8V58Qul7mxTGew6WvgYbAHUl1OpDwt.jpg', 15000, '07:00:00', '16:00:00', 100, 300, '2024-05-31 13:41:37', '2024-05-31 13:41:37'),
(6, 4, 'Pantai Siring Kemuning', 'Macajah, Kec. Tj. Bumi, Kabupaten Bangkalan, Jawa Timur 69156', 'https://maps.app.goo.gl/qsRUUmmMZ4AFqQvA8', '<div>Pantai Siring Kemuning merupakan tempat wisata murah yang dapat di kunjungi saat berada di Kabupaten Bangkalan. Pantai ini memiliki pasir yang agak berwarna kuning begitu pula dengan ombaknya.<br><br></div><div>Pantai Siring Kemuning berjarak sekitar 40 km dari pusat kota Bangkalan Madura. Jarak tempuh kurang lebih 1 jam perjalanan dari pusat kota.Tepatnya berada di Desa Macajah, Kecamatan Tanjungbumi, Kabupaten Bangkalan, Jawa Timur.<br><br>Banyak aktifitas yang dapat anda lakukan untuk sekedar menghilangkan kepenatan bekerja atau menghabiskan waktu berwisata bersama teman dan keluarga tercinta. Anda dapat bermandi-mandi, bermain pasir dan bermain voli bersama teman- teman.<br><br></div><div>Saat berkunjung ke pantai Siring Kemuning sebaiknya datang di pagi hari atau di saat sore karena di waktu siang, sinar matahari begitu terik bisa membakar kulit anda.<br><br></div><div>Jangan lupa pula untuk mengabadikan momen berwisata anda di pantai Siring Kemuning, banyak spot foto anti mainstream yang dapat menambah koleksi foto menarik anda.</div>', 'wisata-images/lO1evqiPYeDZkINM052t3neiOmigUfcGB7yWQSwh.jpg', 15000, '08:00:00', '16:00:00', 100, 250, '2024-05-31 13:46:35', '2024-05-31 13:46:35'),
(7, 6, 'Kolam Renang Tretan', 'Area Sawah, Mlajah, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116', 'https://maps.app.goo.gl/jPLNJdjN5jd8t3rs9', '<div>Kolam Renang Tretan adalah sebuah obyek wisata air yang mempunyai lokasi di Kabupaten Bangkalan, Madura. Jika anda sedang berkunjung ke pulau garam ini bersama anak-anak atau keponakan yang masihh kecil, anda bisa mengajak mereka untuk bersenang-senang bermain air di Kolam Renang Tretan.&nbsp;<br><br>Untuk bangunan dari kolam renangnya sendiri, di sini berbentuk bangunan tinggi yang mempunyai dua tingkat lantai. Untuk lantai pertama atau lantai dasar digunakan sebagai tempat kolam renangnya, lalu untuk lantai kedua digunakan sebagai tempat kantin-kantin yang berkonsep cafe yang menjual berbagai makanan dan minuman. Dari tempat ini anda bisa manfaatkan untuk melihat-lihat pemandangan dari atas sambil menikmati snack.<br><br></div><div>Kolam renang yang disediakan di sana memang tidak terlalu besar namun sangat cukup untuk menampung pengunjung yang banyak datang pada saat masa liburan sekolah atau akhir pekan. Ada dua kolam renang yang bisa anda pakai, yang pertama diperuntukan bagi anak-anak atau orang yang tidak bisa berenang dengan kedalaman hanya satu meter saja. Untuk kolam yang kedua digunakan bagi orang dewasa dengan kedalamaannya yang mencapai 1,5 meter.<br><br></div><div>Untuk menambah keseruan saat bermain atau berendam di Kolam Renang Tretan, pihak pengelola juga telah menyediakan beberapa seluncuran yang terdapat di pinggir kolam yang bisa digunakan untuk anak-anak maupun orang dewasa. Dengan biaya yang tidak mahal, anda sudahh bisa mengajak keluarga beserta anak-anak anda untuk menikmati serunya bermain air di pulau Madura. Anda juga bisa memanfaatkan kolam renang di sana untuk mengajari anak-anak anda berenang dan memperkenalkan mereka supaya mereka tidak takut dengan air.</div>', 'wisata-images/1o1hy6U7QTYriGNpaxdVVomsIbqVtJ3ytReXNdRL.jpg', 8000, '07:00:00', '16:00:00', 50, 100, '2024-05-31 13:52:09', '2024-05-31 13:52:09'),
(8, 3, 'Taman Rekreasi Kota Bangkalan', 'Mlajah, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116', 'https://maps.app.goo.gl/qcheBC33xSo2grsy8', '<div>Salah satu obyek wisata minat khusus tengah kota yang dikelola langsung oleh Pemerintah Kabupaten Bangkalan. Taman tengah kota yang di penuhi dengan bermacam – macam wahana bermain anak - anak, kolam renang dan danau buatan yang di desain khusus bagi anda yang hobi memancing atau sekedar ingin bermain perahu mengelilingi danau.</div>', 'wisata-images/tRwzwAXuW3OrJN3hcALu4O5MQOUETCXeJCXUHIjW.jpg', 3000, '08:00:00', '17:00:00', 100, 250, '2024-05-31 13:54:11', '2024-05-31 13:54:11'),
(9, 4, 'Pantai Martajasah', 'Jl. Raya Kramat, Area Sawah, Mertajasah, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur', 'https://maps.app.goo.gl/zthJoLvsxTzKbNfq5', '<div>Pantai Martajasah, yang terletak di Desa Martajasah, Kecamatan Kota Bangkalan, adalah destinasi wisata baru yang mulai menarik perhatian banyak wisatawan meskipun belum resmi dibuka. Pantai ini hanya berjarak sekitar 10 menit dari pusat kota Bangkalan, menjadikannya mudah diakses bagi penduduk lokal maupun wisatawan luar daerah.</div><div><br>Pantai Martajasah menawarkan pemandangan laut yang indah dengan biaya masuk yang sangat terjangkau, yaitu hanya Rp 2.000 untuk parkir roda dua. Tempat ini terkenal dengan pesona matahari terbenamnya yang memukau dan deretan hutan mangrove yang memberikan pengalaman wisata alam yang berbeda dan menarik.<br><br></div><div>Keindahan alam yang ditawarkan Pantai Martajasah membuatnya menjadi pilihan yang cocok untuk tempat berlibur, terutama saat momen libur panjang seperti Lebaran. Keberadaan hutan mangrove juga menambah daya tarik tersendiri, memberikan pengunjung kesempatan untuk menikmati suasana pantai sekaligus keindahan alam liar.</div><div><br>Dengan pemandangan yang menakjubkan dan fasilitas yang cukup memadai, Pantai Martajasah siap menjadi salah satu destinasi wisata favorit di Bangkalan dan sekitarnya.</div>', 'wisata-images/wYkgWeFbKKS5R8LR9UVBHSQprH0Gk6tWUfjBEfit.webp', 3000, '08:00:00', '19:00:00', 100, 150, '2024-05-31 13:57:25', '2024-05-31 13:57:25'),
(10, 5, 'Makam Syaikhona Kholil', 'Jl. Mertajasah, Tajasah, Mertajasah, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69119', 'https://maps.app.goo.gl/j6dMaV1EBSix5j6y9', '<div>Makam Syaikhona Kholil Bangkalan merupakan salah satu objek wisata religi di Madura. Lokasi Makam Syaikhona Kholil Bangkalan terletak di Desa Martajasah, Kabupaten Bangkalan, Madura, Jawa Timur. Syekh Muhammad Kholil bin Abdul Latif sering dikenal dengan nama Syaikhona Kholil atau Syekh Kholil. Syaikhona Kholil adalah guru ulama Indonesia dan juga Bapak Pesantren Indonesia. Murid-muridnya menyebar dan mendirikan pondok pesantren di berbagai tempat. Salah satu murid Syaikhona Kholil adalah KH Hasyim Asy\'ari, pendiri Nahdlatul Ulama (NU).<br><br>Makam Syaikhona Kholil Bangkalan menjadi salah satu destinasi wisata religi di Madura, yang tidak pernah sepi pengunjung. Banyaknya peziarah yang berkunjung ke makam tersebut tidak telepas dari sosok Syaikhona Kholil sebagai ulama besar. Selain makam Syaikhona Kholil juga terdapat makam ayahnya yang bernama Abdul Latif. Ada juga makam anggota keraton dan makam waliyulloh yang disampingnya terdapat sumur tua. Masyarakat setempat mempercayai bahwa jika melempar uang koin ke dalam sumur akan mendapatkan rezeki besar, sedangkan jika meminum airnya akan mendapatkan kesehatan yang panjang.<br><br>Tepat di lokasi pemakaman terdapat masjid yang dibangun sebagai bentuk penghomatan kepada ulama dan diberi nama Masjid Syaikhona Muhammad Kholil. Fasilitas yang ditawarkan makam tersebut, seperti kamar mandi umum, masjid untuk beribadah, dan beberapa bangku untuk beristirahat atau giliran menunggu berziarah. Di bagian luar makam terdapat banyak tempat makan dan beberapa toko souvenir khas Madura.</div>', 'wisata-images/mkS4GDEibl7M1nvWumgZAAQ66wqrlM10U70kMd7o.jpg', 5000, '09:00:00', '17:00:00', 300, 500, '2024-05-31 14:06:56', '2024-05-31 14:06:56'),
(11, 5, 'Masjid Agung Bangkalan', 'Jalan Sultan R Jl. Sultan Abd. Kadirun No.5, Demangan Barat, Demangan, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69115', 'https://maps.app.goo.gl/TrucXVhjyqS138Ci7', '<div>Masjid Agung Bangkalan adalah salah satu masjid bersejarah dan ikonik di Bangkalan, Madura. Didirikan pada tahun 1819 oleh Sultan Abdul Kadirun, masjid ini telah menjadi pusat kegiatan keagamaan dan sosial bagi masyarakat sekitar selama lebih dari dua abad.<br><br></div><div>Masjid ini terletak di Jalan KH. Moh. Kholil dan dikenal karena arsitektur tradisionalnya yang indah, memadukan elemen-elemen khas budaya Madura dengan seni Islam. Dengan bangunan yang megah dan halaman yang luas, Masjid Agung Bangkalan tidak hanya berfungsi sebagai tempat ibadah, tetapi juga sebagai pusat kegiatan masyarakat.<br><br></div><div>Sebagai salah satu masjid tertua di Madura, Masjid Agung Bangkalan menyimpan banyak nilai sejarah. Masjid ini merupakan bukti kejayaan dan pengaruh kerajaan Islam di wilayah tersebut. Berbagai renovasi dan pemeliharaan telah dilakukan untuk menjaga keaslian dan kemegahan bangunan ini, sehingga tetap menjadi daya tarik wisata religi yang populer di Madura.</div><div><br>Pengunjung yang datang ke Masjid Agung Bangkalan tidak hanya dapat menikmati keindahan arsitektur masjid, tetapi juga merasakan suasana religius dan damai yang terpancar dari tempat ini. Masjid ini menjadi saksi bisu perjalanan panjang sejarah Islam di Bangkalan dan tetap menjadi salah satu simbol kebanggaan masyarakat setempat.</div>', 'wisata-images/EwHdDWGK5z3N9edOda977sbmO2EQx1JrxrZ01OAl.jpg', 3000, '06:00:00', '19:00:00', 200, 300, '2024-05-31 14:10:50', '2024-05-31 14:10:50'),
(12, 4, 'Pantai Rongkang', 'Kejawan, Kwanyar Bar., Kec. Kwanyar, Kabupaten Bangkalan, Jawa Timur 69163', 'https://maps.app.goo.gl/a1SukJkiEwVu1YLLA', '<div>Pantai Rongkang terletak di Desa Kwanyar Barat, Kecamatan Kwanyar, Kabupaten Bangkalan, Madura, sekitar 35 km di selatan kota Bangkalan. Pantai ini berada di sebelah timur Jembatan Suramadu, menjadikannya lokasi yang mudah diakses dan menarik bagi wisatawan.<br><br></div><div>Pantai Rongkang terkenal dengan keindahan alamnya yang menakjubkan. Pantai ini memiliki formasi batu karang yang unik dan pemandangan laut yang mempesona. Pengunjung dapat menikmati pemandangan matahari terbenam yang indah dan suasana pantai yang tenang. Selain itu, pantai ini juga menjadi tempat yang ideal untuk menikmati pemandangan Jembatan Suramadu dari kejauhan.<br><br></div><div>Meskipun memiliki potensi wisata yang besar, pengembangan Pantai Rongkang sebagai destinasi wisata utama belum sepenuhnya terealisasi. Beberapa upaya pengembangan telah dilakukan, tetapi perhatian lebih lanjut diperlukan untuk memaksimalkan potensi pantai ini tanpa merusak keasliannya.<br><br></div><div>Pantai Rongkang adalah pilihan yang tepat bagi wisatawan yang mencari tempat yang tenang dan alami untuk bersantai, menikmati pemandangan laut, dan mengeksplorasi formasi batu karang yang menakjubkan.</div>', 'wisata-images/kgZdN6W8NPYkcQnY3pNvHst510VHSfoMgglLfsSl.jpg', 15000, '08:00:00', '17:00:00', 50, 1000, '2024-05-31 14:12:44', '2024-05-31 14:12:44'),
(13, 1, 'Bukit Lampion Beramah', 'Unnamed Road, Tengginah, Daleman, Kec. Galis, Kabupaten Bangkalan, Jawa Timur 69173', 'https://maps.app.goo.gl/1avXTDu4Wgc4uScH7', '<div>Bukit Lampion Beramah (BLB) adalah salah satu destinasi wisata alam yang menarik di Bangkalan, Madura. Terletak di Desa Daleman, Kecamatan Galis, tempat ini menawarkan pemandangan alam yang memukau dan berbagai spot foto yang Instagramable. Bukit ini terkenal dengan keindahan pemandangan alam terbuka yang memanjakan mata para pengunjung.<br><br></div><div>Bukit Lampion Beramah memiliki berbagai fasilitas yang menarik, termasuk spot-spot foto yang didesain dengan lampion-lampion yang indah. Tempat ini sangat cocok untuk wisatawan yang ingin menikmati keindahan alam sambil berfoto ria dengan latar belakang yang menakjubkan. Selain itu, lokasi ini juga menjadi tempat yang populer untuk menikmati pemandangan Kota Bangkalan dari ketinggian.<br><br></div><div>Tempat wisata ini telah berhasil menarik perhatian banyak pengunjung, baik dari dalam maupun luar Bangkalan, karena daya tarik alamnya yang luar biasa dan suasana yang menenangkan. Bukit Lampion Beramah menjadi salah satu rekomendasi terbaik untuk menghabiskan waktu liburan akhir pekan bersama keluarga dan teman.</div>', 'wisata-images/Cwb5rrnFltGSovkKQCV3C4ZhIReJ9J4ceUxjBAn5.jpg', 10000, '07:00:00', '16:00:00', 70, 100, '2024-05-31 14:16:19', '2024-06-02 07:31:17'),
(14, 2, 'Museum Cakraningrat', 'Jl. Soekarno Hatta No.35, Wr 08, Mlajah, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116', 'https://maps.app.goo.gl/FYCEDsp8uUEjzXF98', '<div><strong>Museum Cakraningrat</strong> adalah museum yang terletak di Jalan Soekarno Hatta No. 39 A, Kabupaten Bangkalan, Pulau Madura. Museum ini didirikan pada tahun 2007 oleh Gubernur Jawa Timur, Bapak Imam Utomo. Museum ini diresmikan pada tanggal 13 Maret 2008. Nama Museum Cakraningrat digunakan untuk mengenang dan menghormati jasa dan kebesaran Pangeran Cakraningrat. Pada awal berdiri, benda-benda koleksi museum ini berpindah-pindah tempat dan berganti nama tempatnya. Pada tanggal 13 Maret 2008 Pemerintah Kabupaten Bangkalan mulai antusias memperhatikan peninggalan-peninggalan bersejarah yang ada di Kabupaten Bangkalan sehingga dibangun bangunan gedung museum baru dengan nama Museum Cakraningrat.<br><br>Objek-objek yang dapat ditemui dalam museum ini diantaranya, kain batik Madura, Peralatan batik, Alat membatik ukiran, Menangan, Paeduwan, Bokor, Pengel, Cucuk Sisir, Kereta Kuda, Miniatur Perahu, Kekeyan, Ginggung, Srone, Kleles, Kentongan, dan Gamelan Ratna Dumila.</div>', 'wisata-images/tzFDA8NIccLqrTEXyQ34p6Ud9966wF7A9yc266l9.jpg', 5000, '08:00:00', '16:00:00', 70, 100, '2024-05-31 14:19:04', '2024-05-31 14:19:04'),
(15, 5, 'Perahu Sarimuna', 'Jl. Pelabuhan Telagabiru, Telaga Biru, Kec. Tj. Bumi, Kabupaten Bangkalan, Jawa Timur 69156', 'https://maps.app.goo.gl/QgtFWixfm7kranQW6', '<div>Perahu Sarimuna adalah salah satu peninggalan bersejarah dari Syaikhona Kholil Bangkalan, seorang ulama besar yang dihormati di Nusantara. Terletak di Desa Telaga Biru, Kecamatan Tanjung Bumi, Kabupaten Bangkalan, perahu ini menjadi saksi bisu dari masa kejayaan Syaikhona Kholil. Jaraknya sekitar satu jam perjalanan dari pusat kota Bangkalan.<br><br></div><div>Perahu Sarimuna dikenal karena keajaiban dan nilai sejarahnya. Meski usianya sudah sangat tua, perahu ini masih terawat dengan baik. Bentuknya yang unik dan penuh dengan cerita sejarah menjadikannya daya tarik utama bagi wisatawan yang ingin mengenal lebih dalam tentang warisan Syaikhona Kholil. Perahu ini juga diyakini memiliki beberapa keajaiban, seperti tidak mudah rusak meski telah berusia ratusan tahun.</div><div><br>Pengunjung yang datang ke Perahu Sarimuna biasanya tertarik dengan cerita-cerita mistis dan historis yang melingkupinya. Banyak yang percaya bahwa perahu ini memiliki kekuatan spiritual yang kuat, mengingat sosok Syaikhona Kholil yang sangat dihormati dan dianggap sebagai guru besar para ulama di Indonesia.</div>', 'wisata-images/2TQrnAtVX0Evl2Ri7URECtsGKOHRPjwMoRQSqYt4.jpg', 10000, '08:00:00', '16:00:00', 100, 200, '2024-05-31 14:22:05', '2024-05-31 14:22:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NJLA4v93oG8QcN4ra0BYvIIXPjSjEZdik72Jc8PL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTzdRSG1HZUdKb0FqQjdhSnhRMmI5dENtMnhmRWFOTDY2TXA5cWhGSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1717605516),
('T0N96JU21df95c7Pu7lf4Hc9iSjsaHiQWcXVP8VY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicGFLVGtlSmVxa0Jzbmp0MVFicnJkb09iMkRwUXpibklldzFraHdqUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93aXNhdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1717516914);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_orang` int(11) NOT NULL,
  `tanggal_tiket` date NOT NULL,
  `total` int(11) NOT NULL,
  `metode` varchar(255) NOT NULL DEFAULT 'DANA',
  `status` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `place_id`, `code`, `tanggal`, `jumlah_orang`, `tanggal_tiket`, `total`, `metode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'FHUIFYYG', '2024-06-02 04:23:39', 10, '2024-06-01', 100000, 'DANA', 'Cancelled', '2024-05-31 16:47:03', '2024-06-02 04:23:39'),
(2, 1, 4, 'BFCZ0O3U', '2024-05-31 17:01:58', 10, '2024-05-31', 50000, 'DANA', 'Cancelled', '2024-05-31 16:48:41', '2024-05-31 17:01:58'),
(3, 1, 1, 'R5FINKPV', '2024-06-03 13:48:39', 10, '2024-06-02', 100000, 'DANA', 'Cancelled', '2024-06-02 06:07:04', '2024-06-03 13:48:39'),
(4, 1, 1, 'KNKGMB6P', '2024-06-02 06:07:34', 10, '2024-06-02', 100000, 'DANA', 'Paid', '2024-06-02 06:07:31', '2024-06-02 06:07:34'),
(5, 1, 9, '1OE8QE3T', '2024-06-02 13:03:39', 5, '2024-06-07', 15000, 'DANA', 'Paid', '2024-06-02 13:01:18', '2024-06-02 13:03:39'),
(6, 2, 1, 'GVHNTVPS', '2024-06-03 13:48:39', 10, '2024-06-02', 100000, 'DANA', 'Cancelled', '2024-06-02 13:07:05', '2024-06-03 13:48:39'),
(7, 2, 13, 'YNZFEXNF', '2024-06-03 14:20:37', 10, '2024-06-03', 100000, 'DANA', 'Cancelled', '2024-06-03 14:19:46', '2024-06-03 14:20:37'),
(8, 2, 10, 'WUXMZMCX', '2024-06-03 14:32:08', 2, '2024-06-04', 10000, 'DANA', 'Paid', '2024-06-03 14:32:05', '2024-06-03 14:32:08'),
(9, 2, 10, 'H2NUOFSN', '2024-06-05 14:55:26', 5, '2024-06-06', 25000, 'BNI', 'Unpaid', '2024-06-05 14:55:26', '2024-06-05 14:55:26'),
(10, 2, 4, 'YR1JZRYN', '2024-06-05 15:09:29', 5, '2024-06-07', 25000, 'BRI', 'Unpaid', '2024-06-05 15:09:29', '2024-06-05 15:09:29'),
(11, 2, 9, 'W4W4OFEL', '2024-06-05 15:55:08', 10, '2024-06-06', 30000, 'BRI', 'Paid', '2024-06-05 15:54:37', '2024-06-05 15:55:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, NULL, '$2y$12$gaBGTB9c.k2HdYXtt21DQuOWr3zDUencf0GtTN3KjCnRY.sJfZqhW', NULL, '2024-05-31 11:54:38', '2024-05-31 11:54:38'),
(2, 'Juan', 'juan@gmail.com', 0, NULL, '$2y$12$br1xG0a6sDnZVlPtccQqWODKDYNBccYqE.A9VGOEsny1i.a8tCd9G', NULL, '2024-06-02 13:06:45', '2024-06-02 13:06:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_code_unique` (`code`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_place_id_foreign` (`place_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
