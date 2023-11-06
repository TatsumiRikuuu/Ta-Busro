/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `detail_pesanan`;
CREATE TABLE `detail_pesanan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(5) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE `pesanan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(100) NOT NULL,
  `wa_pemesan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `type` enum('makan ditempat','dibawa pulang') NOT NULL DEFAULT 'makan ditempat',
  `bukti_bayar` varchar(100) NOT NULL,
  `status` enum('selesai','menunggu') NOT NULL DEFAULT 'menunggu',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kategori` enum('makanan','minuman','promo','paket','menu baru') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');


INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `nama_produk`, `jumlah`, `harga`) VALUES
(1, 10, 'Teh Hangat', 1, 5000.00);
INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `nama_produk`, `jumlah`, `harga`) VALUES
(2, 10, 'Ayam Bakar', 1, 15000.00);
INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `nama_produk`, `jumlah`, `harga`) VALUES
(3, 11, 'minuman', 1, 10000.00);
INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `nama_produk`, `jumlah`, `harga`) VALUES
(4, 12, 'minuman', 3, 30000.00),
(5, 12, 'Roti', 1, 5000.00);

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(11, '2023-09-25-235803', 'App\\Database\\Migrations\\ProdukMigration', 'default', 'App', 1695939306, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(12, '2023-09-26-000647', 'App\\Database\\Migrations\\PesananMigration', 'default', 'App', 1695939306, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(13, '2023-09-28-220525', 'App\\Database\\Migrations\\UserMigration', 'default', 'App', 1695939306, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(14, '2023-09-26-000653', 'App\\Database\\Migrations\\DetailPesananMigration', 'default', 'App', 1695939338, 2);

INSERT INTO `pesanan` (`id`, `nama_pemesan`, `wa_pemesan`, `tanggal`, `type`, `bukti_bayar`, `status`) VALUES
(10, 'Ratione molestiae re', 'Consectetur aut tot', '2023-09-29', 'dibawa pulang', '1695990856_fb325bc3c6fc08dd1920.jpg', 'selesai');
INSERT INTO `pesanan` (`id`, `nama_pemesan`, `wa_pemesan`, `tanggal`, `type`, `bukti_bayar`, `status`) VALUES
(11, 'Placeat commodi fac', 'Anim quisquam saepe ', '2023-09-29', 'dibawa pulang', '1695997048_e5bad3207a3167699386.png', 'menunggu');
INSERT INTO `pesanan` (`id`, `nama_pemesan`, `wa_pemesan`, `tanggal`, `type`, `bukti_bayar`, `status`) VALUES
(12, 'Aaaa', '9089949204', '2023-09-29', 'makan ditempat', '1696000269_c500c44c9d567bdf78e0.png', 'menunggu');

INSERT INTO `produk` (`id`, `nama`, `harga`, `foto`, `kategori`) VALUES
(5, 'minuman', 10000.00, '1695994854_fc8823fd4e63bd4ef5a8.jpg', 'minuman');
INSERT INTO `produk` (`id`, `nama`, `harga`, `foto`, `kategori`) VALUES
(6, 'Roti', 5000.00, '1695999799_c9522c1366dcc25dd41e.png', 'makanan');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;