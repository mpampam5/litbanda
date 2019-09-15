/*
 Navicat Premium Data Transfer

 Source Server         : mpampam
 Source Server Type    : MySQL
 Source Server Version : 50532
 Source Host           : localhost:3306
 Source Schema         : balitbang

 Target Server Type    : MySQL
 Target Server Version : 50532
 File Encoding         : 65001

 Date: 15/09/2019 16:32:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agenda
-- ----------------------------
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda`  (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `agenda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `date` date NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_agenda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of agenda
-- ----------------------------
INSERT INTO `agenda` VALUES (3, 'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks', '<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n&lt;!--\r\n /* Font Definitions */\r\n @font-face\r\n {font-family:Calibri;\r\n panose-1:2 15 5 2 2 2 4 3 2 4;\r\n mso-font-charset:0;\r\n mso-generic-font-family:swiss;\r\n mso-font-pitch:variable;\r\n mso-font-signature:-520092929 1073786111 9 0 415 0;}\r\n /* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n {mso-style-unhide:no;\r\n mso-style-qformat:yes;\r\n mso-style-parent:\"\";\r\n margin-top:0in;\r\n margin-right:0in;\r\n margin-bottom:10.0pt;\r\n margin-left:0in;\r\n line-height:115%;\r\n mso-pagination:widow-orphan;\r\n font-size:11.0pt;\r\n font-family:\"Calibri\",\"sans-serif\";\r\n mso-ascii-font-family:Calibri;\r\n mso-ascii-theme-font:minor-latin;\r\n mso-fareast-font-family:Calibri;\r\n mso-fareast-theme-font:minor-latin;\r\n mso-hansi-font-family:Calibri;\r\n mso-hansi-theme-font:minor-latin;\r\n mso-bidi-font-family:\"Times New Roman\";\r\n mso-bidi-theme-font:minor-bidi;}\r\n.MsoChpDefault\r\n {mso-style-type:export-only;\r\n mso-default-props:yes;\r\n font-family:\"Calibri\",\"sans-serif\";\r\n mso-ascii-font-family:Calibri;\r\n mso-ascii-theme-font:minor-latin;\r\n mso-fareast-font-family:Calibri;\r\n mso-fareast-theme-font:minor-latin;\r\n mso-hansi-font-family:Calibri;\r\n mso-hansi-theme-font:minor-latin;\r\n mso-bidi-font-family:\"Times New Roman\";\r\n mso-bidi-theme-font:minor-bidi;}\r\n.MsoPapDefault\r\n {mso-style-type:export-only;\r\n margin-bottom:10.0pt;\r\n line-height:115%;}\r\n@page WordSection1\r\n {size:8.5in 11.0in;\r\n margin:1.0in 1.0in 1.0in 1.0in;\r\n mso-header-margin:.5in;\r\n mso-footer-margin:.5in;\r\n mso-paper-source:0;}\r\ndiv.WordSection1\r\n {page:WordSection1;}\r\n--&gt;\r\n\r\n\r\n\r\n\r\n\r\nTidak\r\nseperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks \r\n\r\n\r\n\r\n</p>', '2018-04-23', 'tidak-seperti-anggapan-banyak-orang-lorem-ipsum-bukanlah-teks-teks', 1, '2018-04-18 01:15:29', 1, '2018-12-03 01:13:52');
INSERT INTO `agenda` VALUES (7, 'Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan', '<p>\r\n\r\nPria selingkuh karena istri tidak cantik ada??? banyak...pdhl bikin cantik aja istrinya..<br>Istri dibikin cantik sm suami trus selingkuh..yg gini ada???\r\n\r\n</p>', '2018-04-23', 'ada-banyak-variasi-tulisan-lorem-ipsum-yang-tersedia-tapi-kebanyakan-sudah-mengalami-perubahan', 2, '2018-04-23 03:28:47', 1, '2018-12-03 01:14:31');
INSERT INTO `agenda` VALUES (8, 'standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di', '<p>a</p>', '2018-04-25', 'standar-dari-teks-lorem-ipsum-yang-digunakan-sejak-tahun-1500an-kini-di-reproduksi-kembali-di', 1, '2018-04-25 02:11:29', 1, '2018-12-03 01:12:03');
INSERT INTO `agenda` VALUES (9, 'Rapat Koordinasi Dalam Rangka Pembahasan Tindak Lanjut Pertemuan Lanjutan', '<p>Rapat Koordinasi Dalam Rangka Pembahasan Tindak Lanjut Pertemuan Lanjutan.</p>\r\n<ul>\r\n<li>tanggal 12/20/2018</li>\r\n<li>jam 10 sampai selesai</li>\r\n<li>tempat rungan rapat</li>\r\n</ul>', '2018-12-20', 'rapat-koordinasi-dalam-rangka-pembahasan-tindak-lanjut-pertemuan-lanjutan', 1, '2018-12-03 01:30:56', 1, '2018-12-04 09:44:17');

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album`  (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `album` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_album`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES (9, 'The latest installment in the post-apocalyptic first-person shooter', '');
INSERT INTO `album` VALUES (10, 'Take a sneak peek at some new footage for The Last Guardian', '<p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit ante, congue sodales orci ac, ultrices pretium lectus. Maecenas lorem enim, dignissim sed lacus non, feugiat iaculis lorem. Integer eu aliquet diam. Suspendisse fringilla porta justo, vel tempus risus. Ut et enim sit amet libero fermentum aliquam et ut sem.</p><p>Maecenas viverra, mi non consectetur scelerisque, erat enim interdum erat, imperdiet elementum sapien metus a odio. Sed sapien sapien, tincidunt quis fringilla vel, eleifend tincidunt nunc. Fusce dapibus leo vestibulum, scelerisque metusnec, imperdiet tortor.usce et urna vel neque fermentum consectetur. Donec vel convallis elit. Nulla et odio a magna aliquam varius a vel ex. Cras sed dolor sapien. Sed sit amet interdum sapien, ut laoreet dui. Fusce vulputate consequat mi et rutrum.</p>\r\n\r\n<br></p>');

-- ----------------------------
-- Table structure for auth
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth`  (
  `id_auth` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `groups` int(11) NULL DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_auth`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth
-- ----------------------------
INSERT INTO `auth` VALUES (1, 'mpampam', '', 'logo68x69.png', 'superadmin@mail.com', '$2y$10$Ug/q.me0MEtY.K0R/LJnducfo3xrBxSsqTdW1Vv7iChfQXgBIdS.2', 36, '1', NULL, 1, '2018-03-20 11:22:17', '2018-04-02 01:57:17');
INSERT INTO `auth` VALUES (2, 'admin', '', 'logo68x69.png', 'admin@mail.com', '$2y$10$jw8itFTr8zTNFBU7jtBCaePnMZASxvSjtlYNWjfYYx.wNHsBGh3X2', 37, '1', NULL, 1, NULL, '2018-05-01 07:05:09');
INSERT INTO `auth` VALUES (3, 'Operator', '', '', 'operator@mail.com', '$2y$10$MNSBYmKpadexVNFennNN0uEdkWXa6wDV67gCkVnm0cX6q6EGzihQy', 38, '1', 1, NULL, '2018-04-07 03:30:59', NULL);

-- ----------------------------
-- Table structure for auth_sess
-- ----------------------------
DROP TABLE IF EXISTS `auth_sess`;
CREATE TABLE `auth_sess`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auth` int(11) NULL DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 122 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_sess
-- ----------------------------
INSERT INTO `auth_sess` VALUES (110, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-01 05:18:13');
INSERT INTO `auth_sess` VALUES (111, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-01 05:29:11');
INSERT INTO `auth_sess` VALUES (112, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-01 05:41:34');
INSERT INTO `auth_sess` VALUES (113, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-01 05:41:54');
INSERT INTO `auth_sess` VALUES (114, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-01 05:47:00');
INSERT INTO `auth_sess` VALUES (115, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-02 12:03:00');
INSERT INTO `auth_sess` VALUES (116, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-03 12:29:58');
INSERT INTO `auth_sess` VALUES (117, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-03 12:41:28');
INSERT INTO `auth_sess` VALUES (118, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-03 11:10:00');
INSERT INTO `auth_sess` VALUES (119, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-04 08:07:32');
INSERT INTO `auth_sess` VALUES (120, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-06 03:10:10');
INSERT INTO `auth_sess` VALUES (121, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', '', '', '2019-02-19 12:48:41');

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner`  (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_banner`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES (2, 'banner33.jpg', 'SELAMAT DATANG DI WEBSITE RESMI BADAN PENELITIAN DAN PENGEMBANGAN PROVINSI SULAWESI TENGGARA');
INSERT INTO `banner` VALUES (3, 'banner2.jpg', '');

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hits` int(11) NULL DEFAULT 1,
  `komentar` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES (24, 2, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting', '<p>Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n<p>Mengapa kita menggunakannya?</p>\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>', '250px-Menara-persatuan-kendari.jpg', 'lorem-ipsum-adalah-contoh-teks-atau-dummy-dalam-industri-percetakan-dan-penataan-huruf-atau-typesetting', 19, '0', 1, 1, '2018-12-03 12:46:29', '2018-12-03 12:59:15');
INSERT INTO `berita` VALUES (25, 2, 'Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari', '<p>Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n<p>Mengapa kita menggunakannya?</p>\r\n<ul>\r\n<li>1234</li>\r\n<li>123456</li>\r\n</ul>\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya.</p>', '285px-Kendari_dari_udara_1.jpg', 'sudah-merupakan-fakta-bahwa-seorang-pembaca-akan-terpengaruh-oleh-isi-tulisan-dari', 24, '0', 1, 1, '2018-12-03 12:58:52', '2018-12-04 09:46:59');
INSERT INTO `berita` VALUES (26, 2, 'seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia', '<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n<p>Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p>', '', 'seorang-professor-bahasa-latin-dari-hampden-sidney-college-di-virginia', 26, '0', 1, NULL, '2018-12-03 01:01:38', NULL);
INSERT INTO `berita` VALUES (27, 2, 'dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum', '<p>Apakah Lorem Ipsum itu?</p>\r\n<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n<p>Mengapa kita menggunakannya?</p>\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>\r\n<p><br /> </p>\r\n<p>Dari mana asalnya?</p>\r\n<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n<p>Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p>\r\n<p>Dari mana saya bisa mendapatkannya?</p>\r\n<p>Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian tertentu. Karena itu inilah generator pertama yang sebenarnya di internet. Ia menggunakan kamus perbendaharaan yang terdiri dari 200 kata Latin, yang digabung dengan banyak contoh struktur kalimat untuk menghasilkan Lorem Ipsun yang nampak masuk akal. Karena itu Lorem Ipsun yang dihasilkan akan selalu bebas dari pengulangan, unsur humor yang sengaja dimasukkan, kata yang tidak sesuai dengan karakteristiknya dan lain sebagainya.</p>', '', 'dengan-diluncurkannya-lembaran-lembaran-letraset-yang-menggunakan-kalimat-kalimat-dari-lorem-ipsum', 98, '0', 1, NULL, '2018-12-03 01:36:01', NULL);

-- ----------------------------
-- Table structure for galery_image
-- ----------------------------
DROP TABLE IF EXISTS `galery_image`;
CREATE TABLE `galery_image`  (
  `id_galery_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_galery_image`) USING BTREE,
  INDEX `id_album`(`id_album`) USING BTREE,
  CONSTRAINT `Album_Delete` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of galery_image
-- ----------------------------
INSERT INTO `galery_image` VALUES (35, 10, 'bf54e6.jpg', '0.175847105266822');
INSERT INTO `galery_image` VALUES (36, 10, '4096b2.jpg', '0.08548666910692959');
INSERT INTO `galery_image` VALUES (37, 10, '793b2a.jpg', '0.988136482792819');
INSERT INTO `galery_image` VALUES (38, 10, '793b2a1.jpg', '0.9120945897766624');
INSERT INTO `galery_image` VALUES (41, 10, '517504.jpg', '0.09918887469471782');
INSERT INTO `galery_image` VALUES (42, 9, '54f7ef.jpg', '0.30006058528077895');
INSERT INTO `galery_image` VALUES (43, 9, '15e534.jpg', '0.7336879452757201');
INSERT INTO `galery_image` VALUES (44, 9, '72de2a.jpg', '0.7861736610012247');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `access` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (36, 'superadmin', 'Akses Semua Modul', '[\"1\",\"6\",\"9\",\"8\",\"25\",\"12\",\"34\",\"33\",\"18\",\"20\",\"19\",\"27\",\"28\",\"29\",\"2\",\"31\",\"3\",\"4\",\"5\",\"21\",\"22\",\"23\",\"24\",\"30\"]', 1, 1, '2018-03-25 10:16:10', '2018-12-01 01:32:43');
INSERT INTO `groups` VALUES (37, 'admin', '-', '[\"1\",\"6\",\"9\",\"8\",\"25\",\"12\",\"15\",\"18\",\"20\",\"19\",\"27\",\"28\",\"29\",\"16\",\"17\",\"26\",\"31\",\"3\",\"5\",\"21\",\"22\",\"23\",\"24\",\"32\",\"30\"]', 1, 1, '2018-03-25 10:17:13', '2018-05-05 01:22:45');
INSERT INTO `groups` VALUES (38, 'operator', '', '[\"1\",\"6\",\"9\",\"8\",\"25\",\"12\",\"15\",\"27\",\"28\",\"29\",\"16\",\"17\",\"26\",\"24\"]', 1, 1, '2018-04-07 03:29:41', '2018-04-21 05:33:49');

-- ----------------------------
-- Table structure for halaman
-- ----------------------------
DROP TABLE IF EXISTS `halaman`;
CREATE TABLE `halaman`  (
  `id_halaman` int(11) NOT NULL AUTO_INCREMENT,
  `halaman` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_halaman`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of halaman
-- ----------------------------
INSERT INTO `halaman` VALUES (1, 'visi dan misi', '<div class=\"post-content\">\r\n<h3>VISI</h3>\r\n<p>Visi adalah pandangan jauh tentang suatu perusahaan ataupun lembaga dan lain-lain, visi juga dapat di artikan sebagai tujuan perusahaan atau lembaga dan apa yang harus dilakukan untuk mencapai tujuannya tersebut pada masa yang akan datang atau masa depan.</p>\r\n<p> </p>\r\n<h3>MISI</h3>\r\n<p>Sebuah misi berbeda dengan visi, di mana misi adalah penyebab dan visi adalah efek dari penyebab tersebut. Sebuah misi merupakan sesuatu yang harus dicapai, sedangkan visi merupakan sesuatu yang harus dikejar untuk mencapai apa yang dimaksud dalam misi tersebut.</p>\r\n</div>', '', 'visi-dan-misi', 1, '2018-04-11 12:16:19', 1, '2018-12-03 08:23:01');
INSERT INTO `halaman` VALUES (2, 'Profile', '<div class=\"post-content\">\r\n<p [removed]=\"text-align: justify;\">\"Mereka para calon mahasiswa yang diterima ini, berhasil masuk UGM setelah rekam jejak prestasi akademiknya unggul bersaing dengan 37.447 peserta SNMPTN yang mendaftar di UGM,\" papar Wakil Rektor Bidang Pendidikan, Pengajaran dan Kemahasiswaan (PPK), Prof. Dr. Ir. Djagal Wiseso Marseno, M.Agr., Selasa (17/4).</p>\r\n<p [removed]=\"text-align: justify;\">Setelah ?dinyatakan diterima di UGM, kata Djagal, calon mahasiswa harus mengisi biodata  melalui laman um.ugm.ac.id.dan mengunggah dokumen yang disyaratkan pada 19 April 2018 mulai jam 10.00 WIB sampai dengan 24 April 2018 jam 10.00 WIB. Djagal mengimbau kepada calon mahasiswa untuk mempersiapkan dokumen yang akan diunggah seawal mungkin supaya dapat menyelesaikan pengisian biodata dengan baik pada waktu yang telah ditentukan.</p>\r\n<p [removed]=\"text-align: justify;\">Calon mahasiswa yang tidak mengunggah data sampai dengan 24 April 2018 jam 10.00 WIB dianggap melepaskan haknya sebagai mahasiswa UGM di Tahun Akademik 2018/2019. (Humas UGM/Satria)</p>\r\n</div>', '', 'profile', 1, '2018-04-18 05:41:22', 1, '2018-04-19 01:27:46');
INSERT INTO `halaman` VALUES (6, 'fasilitas', '<p>Gedung Auditorium Politeknik Kelautan dan Perikanan Bone adalah gedung serba guna yang digunakan sebagai tempat seminar, temu ilmiah, kuliah umum dan berbagai kegiatan lembaga.</p>\r\n<p>gedung ini telah dirancang dengan baik untuk dapat menampung 300 orang dan juga dilengkapi fasilitas multimedia dan audio visual.</p>', '', 'fasilitas', 1, '2018-05-02 02:29:07', 1, '2018-05-02 02:33:46');
INSERT INTO `halaman` VALUES (7, 'sejarah', '<p>Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian tertentu. Karena itu inilah generator pertama yang sebenarnya di internet. Ia menggunakan kamus perbendaharaan yang terdiri dari 200 kata Latin, yang digabung dengan banyak contoh struktur kalimat untuk menghasilkan Lorem Ipsun yang nampak masuk akal. Karena itu Lorem Ipsun yang dihasilkan akan selalu bebas dari pengulangan, unsur humor yang sengaja dimasukkan, kata yang tidak sesuai dengan karakteristiknya dan lain sebagainya.</p>\r\n<p>Visi adalah pandangan jauh tentang suatu perusahaan ataupun lembaga dan lain-lain, visi juga dapat di artikan sebagai tujuan perusahaan atau lembaga dan apa yang harus dilakukan untuk mencapai tujuannya tersebut pada masa yang akan datang atau masa depan.</p>\r\n<p>Sebuah misi berbeda dengan visi, di mana misi adalah penyebab dan visi adalah efek dari penyebab tersebut. Sebuah misi merupakan sesuatu yang harus dicapai, sedangkan visi merupakan sesuatu yang harus dikejar untuk mencapai apa yang dimaksud dalam misi tersebut.</p>', 'L.jpg', 'sejarah', 1, '2018-05-03 07:41:33', 1, '2018-12-03 08:37:22');

-- ----------------------------
-- Table structure for jaskip
-- ----------------------------
DROP TABLE IF EXISTS `jaskip`;
CREATE TABLE `jaskip`  (
  `id_jaskip` int(11) NOT NULL AUTO_INCREMENT,
  `Judul_jaskip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_jaskip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jaskip
-- ----------------------------
INSERT INTO `jaskip` VALUES (6, 'Uncharted The Lost Legacy First Gameplay Details Revealeddas Ut et enim sit amet libero fermentum aliquam et ut sem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit ante, congue sodales orci ac, ultrices pretium lectus. Maecenas lorem enim, dignissim sed lacus non, feugiat iaculis lorem. Integer eu aliquet diam. Suspendisse fringilla porta justo, vel tempus risus. Ut et enim sit amet libero fermentum aliquam et ut sem.', 'jasakip-01122018030731.pdf', '2018-12-01');
INSERT INTO `jaskip` VALUES (7, 'Don\'t Miss This Hidden Contract in Blood and Wine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elit ante, congue sodales orci ac, ultrices pretium lectus. Maecenas lorem enim, dignissim sed lacus non, feugiat iaculis lorem. Integer eu aliquet diam. Suspendisse fringilla porta justo, vel tempus risus. Ut et enim sit amet libero fermentum aliquam et ut sem.', 'jasakip-05122018012233.pdf', '2018-12-05');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (2, 'Pemerintah', 'pemerintah');

-- ----------------------------
-- Table structure for kontak
-- ----------------------------
DROP TABLE IF EXISTS `kontak`;
CREATE TABLE `kontak`  (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` int(15) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `read` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `created_at` datetime NULL DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kontak`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kontak
-- ----------------------------
INSERT INTO `kontak` VALUES (8, 'muhammad irfan', 123456, 'superadmin@mail.com', 'dsadsadsa dsadas', '1', '2018-12-06 03:08:38', '::1');
INSERT INTO `kontak` VALUES (9, 'Dr. Ahmad Darmawan', 123456, 'mpampam5@gmail.com', 'dsadsa dsadsa', '1', '2018-12-06 03:11:13', '::1');

-- ----------------------------
-- Table structure for linkterkait
-- ----------------------------
DROP TABLE IF EXISTS `linkterkait`;
CREATE TABLE `linkterkait`  (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_link`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of linkterkait
-- ----------------------------
INSERT INTO `linkterkait` VALUES (3, 'Litbang Kemendagri', 'http://litbang.kemendagri.go.id/');
INSERT INTO `linkterkait` VALUES (4, 'Kota Kendari', 'http://kendarikota.go.id/');

-- ----------------------------
-- Table structure for litbang
-- ----------------------------
DROP TABLE IF EXISTS `litbang`;
CREATE TABLE `litbang`  (
  `id_litbang` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penyusun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_litbang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of litbang
-- ----------------------------
INSERT INTO `litbang` VALUES (1, 'supervisi-dan-edukasi-sehingga-kedepannya-diharapkan', 'supervisi dan edukasi sehingga kedepannya diharapkan', 'mpampam', '<p>bukan hanya terbatas pada fungsi utamanya sebagaimana tertuang dalam Permendagri UU No.17 Tahun 2016 tapi dapat juga berfungsi sebagai suatu lembaga pendukung dan penunjang berbagai kegiatan pemerintahan lainnya melalui kegiatan fasilitasi, advokasi, asistensi, supervisi dan edukasi sehingga kedepannya diharapkan </p>', 'litbang-01122018031449.pdf', '2018-12-01');
INSERT INTO `litbang` VALUES (3, 'perusahaan-yang-hebat-tidak-percaya-pada-kehebatan-tetapi-percaya-pada-perbaikan-dan-perubahan-berkesinambungan', 'Perusahaan yang hebat tidak percaya pada kehebatan, tetapi percaya pada perbaikan dan perubahan berkesinambungan', 'Muhammad Irfan Ibnu', '<p>“Perusahaan yang hebat tidak percaya pada kehebatan, tetapi percaya pada perbaikan dan perubahan yang Perusahaan yang hebat tidak percaya pada kehebatan, tetapi percaya pada perbaikan dan perubahan”(Tom Peters). Kutipan kata-kata bijak yang diambil dari seorang pakar management berbagai perusahaan top dunia itu mungkin terdengar tidak asing lagi bagi para pengembang bisnis dan usaha. Mengkaji kutipan kata-kata bijak tersebut sedikit dapat memberi masukan yang cukup berharga mengenai strategi kerja bagi para pegawai negeri maupun karyawan swasta, disamping dapat pula menjadi bahan rujukan bagi para pemimpin lembaga ataupun perusahaan dalam pengambilan kebijakan strategi pencapaian kinerja lembaga/perusahaan kedepan. Kehebatan sumber daya manusia ataupun sarana dan prasarana pendukungnya tidak cukup menjadikan suatu lembaga atau perusahaan dapat maju dan bertahan dalam waktu yang lama. Kehebatan tersebut tidak akan berarti apapun jika tidak dibarengi dengan strategi <em>management</em> yang mumpuni untuk dapat mengarahkan dan mengatur serta mengelola faktor kehebatan itu secara maksimal. Dalam memahami dari sistem yang mampu diciptakan untuk dapat mengarahkan, mengatur dan mengelola faktor kehebatan tersebut, perbaikan dan perubahan yang berkesinambungan menjadi faktor pendukung kuat untuk memberikan pengaruh dalam menimbulkan suatu rangkaian kegiatan yang digunakan oleh organisasi lembaga atau perusahaan untuk mengidentifikasi, menciptakan, menjelaskan dan mendistribusikan pengetahuan yang nantinya akan digunakan kembali, diketahui dan dipelajari dalam sebuah organisasi lembaga atau perusahaan, yang biasa dikenal dengan istilah <em>knowledge management</em>. Penerapan konsep <em>knowledge management</em>meliputi keseluruhan dalam pengelolaan Sumber Daya Manusia (SDM) serta sarana dan prasarana yang mendukung terutama faktor penunjang Teknologi Informasi (IT) untuk pencapaian mewujudkan kinerja organisasi lembaga dan perusahaan yang semakin baik setiap tahunnya. Sebagaimana kita ketahui bersama saat ini negara Indonesia sudah berada dalam tahap awal penerapan sistem pasar bebas ASEAN (MEA) yang pada awalnya ditandai dengan disetujuinya MOU kerjasama antar negara dalam berbagai aspek kegiatan perekonomian. Salah satunya melihat yang telah marak terjadi belakangan ini fenomena masuknya tenaga kerja asing cina tanpa melalui proses seleksi yang ketat mengenai kompetensi pekerja asing tersebut untuk bekerja di dalam negeri. Mengamati perkembangan yang terjadi sejak diberlakukannya kerja sama pasar bebas ASEAN (MEA), negara-negara berkembang yang tergabung dalam kawasan MEA kurang memberi batasan untuk dapat mengatur dan membatasi tenaga kerja asing yang datang bekerja di dalam negeri serta kurang memberi kelonggaran hak tenaga kerja lokal untuk bekerja di luar negri. Melihat keadaan tersebut membuat kita tersadar mengenai masih banyaknya tenaga kerja lokal yang mempunyai kompetensi diatas tenaga kerja asing yang dimasukkan pihak investor ke dalam negeri tapi tidak mendapat kesempatan yang layak untuk bekerja di wilayah kerjasama kawasan MEA. Fenomena itu membawa pemikiran bahwa dalam menghadapi era persaingan bebasnya tenaga kerja asing yang masuk akankah tenaga kerja lokal di Indonesia dapat mampu bertahan dengan adanya kebijakan tersebut. Permasalahan tersebut tentu dapat menambah daftar persoalaan dalam negeri perihal angka pengangguran yang setiap tahunnya belum dapat diminimalisir dengan berbagai penambahan sektor lapangan kerja baru. Mengamati berbagai fenomena perkembangan dunia kerja tersebut kompetensi bukan lagi suatu hal yang terlalu istimewa untuk dibanggakan tetapi merupakan suatu kebutuhan yang tidak bisa ditawar lagi harus ada dalam pola pikir setiap calon tenaga kerja maupun para pegawai dan karyawan yang telah terserap dalam dunia kerja untuk sekiranya dituntut mampu memberikan andil yang kuat dan berpengaruh dalam pencapaian kinerja yang berkualitas kedepannya. Jika konsep <em>knowledge management </em>dapat diterapkan dalam pola pikir sistem kinerja tersebut kemungkinan harapan akan kompetensi yang berkualitas masih ada untuk dapat dipertahankan. Sebagaimana yang telah diungkapkan oleh <em>Cut Zurnali 2008</em> istilah <em>knowledge management</em> atau manajemen pengetahuan petama kali digunakan oleh <em>Wig</em> pada tahun 1986 saat menulis buku pertamanya dengan mengangkat topik <em>Knowledge Management Foundation </em>yang diterbitkan tahun 1993. Menurut <em>Wig 1999</em>membangun manajemen pengetahuan adalah sistematis,eksplisit, dan disengaja. Pembaharuan dan penerapan pengetahuan untuk memaksimalkan efektivitas pengetahuan organisasi yang nantinya akan terbentuk menjadi aset pengetahuan organisasi yang bersifat timbal balik. Berdasarkan pemaparan tersebut manajemen pengetahuan bukan hanya terbatas pada seberapa maksimal terbentuknya pengetahuan baru sehingga terkumpulnya informasi organisasi yang pada akhirnya tersimpan dalam database tetapi yang utama adalah proses transfer pengetahuan yang dapat memberikan perubahan yang signifikan sebagai solusi dari berbagai permasalahan yang masih saja selalu membelit perkembangan suatu lembaga/organisasi maupun perusahaan. Pemahaman perbedaaan antara bentuk pengetahuan baru, informasi, dengan database menjadi kunci utama untuk memahami Manajemen Pengetahuan (MP). Transfer pengetahuan merupakan salah satu aspek manajemen pengetahuan yang bersifat timbal balik dalam pengelolaan aset pengetahuan organisasi. Sehingga dalam hal ini penerapan manajemen pengetahuan bukan hanya terbatas pada penciptaan, pengumpulan dan penyimpanan pengetahuan dan informasi dalam database tetapi harus sampai pada proses transfer ilmu informasi kepada para <em>user stakeholder</em>. Sampai saat ini konsep tersebut selalu mendapat perhatian yang luas dan dikaji lebih mendalam mengenai strategi mengubah informasi dan aset intelektual menjadi nilai bertahan suatu organisasi. Manajemen pengetahuan bukan merupakan hal yang lebih baik tapi lebih mentikberatkan pada bagaimana melakukan hal-hal yang lebih baik. Kegiatan manajemen pengetahuan (MP) biasanya dikaitkan dengan tujuan organisasi seperti bagaimana cara atau sistem untuk dapat mencapai tujuan organisasi yang lebih baik setiap tahunnya dengan peningkatan kinerja, keunggulan kompetitif ataupun tingkat yang lebih tinggi yaitu inovasi,  sehingga mampu mempertahankan keberadaan pentingnya organisasi tersebut untuk tetap berdiri. Perubahan dan perbaikan yang berkesinambungan secara sistematis dan terarah memberikan perkembangan yang tanpa disadari dapat membawa pemikiran kepada inovasi strategi kerja yang cerdas dan aplikatif. Keberadaan suatu organisasi dinilai dari seberapa peran penting organisasi tersebut untuk memberi dampak perubahan terhadap organisasi lain dan para pengguna produk layanan organisasi tersebut. Eksistensi organisasi dapat terukur dengan sistem penerapan Manajemen Pengetahuan yang dapat memberi manfaat sebagai sarana alat komunikasi staf dengan administrator, <em>Standar Operasional Procedure</em> (SOP) yang menjadi standar acuan baku dan menjadi alat pengawasan dalam proses bekerja sehingga dapat memaksimalkan kinerja yang efektif dan efisien dalam pencapaian kinerja yang berkualitas dan meminimalisir resiko pemborosan waktu dan anggaran. Badan Penelitian dan Pengembangan Prov.Sultra dalam hal ini sebagai organisasi yang mengusung tupoksi penelitian dan pengembangan sesuai dengan arah kebijakan pemerintah dalam Permendagri UU No.17 Tahun 2016 sebagai suatu organisasi yang mengedepankan penelitian,pengembangan dan penerapan IPTEK guna dilakukan inovasi di berbagai mata rantai pertambahan nilai produk/ jasa, serta inovasi dalam menyelesaikan berbagai masalah kekinian dan mengantisipasi masalah masa depan untuk kemajuan pembangunan bangsa. Salah satu faktor penting yang mendukung kemajuan pembangunan adalah pembangunan IPTEK dalam rangka mewujudkan daya saing. Sebagai bentuk eksistensi organisasi Badan Litbang Provinsi merupakan instansi yang berfokus pada pemecahan solusi atas isu dan topik permasalahan yang terjadi melalui kegiatan penelitian dan pengembangan dengan mengusung konsep “Rumah IPTEK” sebagai bentuk adaptasi konsep <em>Knowledge Management. </em>Konsep tersebut dibangun untuk suatu penguatan sistem organisasi lembaga sebagai perwujudan nilai eksistensi diri dan diharapkan berujung pada perubahan sistem yang mengarah pada peningkatan nilai mutu organisasi lembaga. Dengan memberikan ruang kepada berbagai instansi SKPD Provinsi/Kota/Kabupaten untuk berpartisipasi membawa berbagai isu/topik permasalahan yang menjadi konsentrasi pelaksanaan tujuan pokok dan fungsi di SKPD tersebut, yang selanjutnya akan ditindaklanjuti oleh Badan Penelitian dan Pengembangan Prov.Sultra dengan berbagai kegiatan penelitian, pengkajian, pengembangan, perekayasaan, penerapan, pengoperasian dan evaluasi kebijakan yang pada akhirnya memberikan kontribusi hasil kegiatan kelitbangan dalam bentuk rekomendasi ke berbagai SKPD yang bersangkutan. Penerapan sistem <em>Knowledge Managament</em> yang dilakukan oleh Balitbang Prov.Sultra ini merupakan sarana perwujudan revitalisasi lembaga sebagai suatu Badan yang diharapkan nantinya bukan hanya terbatas pada fungsi utamanya sebagaimana tertuang dalam Permendagri UU No.17 Tahun 2016 tapi dapat juga berfungsi sebagai suatu lembaga pendukung dan penunjang berbagai kegiatan pemerintahan lainnya melalui kegiatan fasilitasi, advokasi, asistensi, supervisi dan edukasi sehingga kedepannya diharapkan tidak hanya mampu menempati garda terdepan pemerintahan tetapi juga mampu mengiringi jalannya sistem pemerintahan dan dapat pula memberikan dukungan dalam pencapaian hasil akhir. Oleh karenanya itu penguatan sistem kelembagaan dengan mengambil > dapat diarahkan dengan strategi yang handal untuk mencapai puncak kompetensi yang </p>', 'litbang-01122018043407.pdf', '2018-12-01');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `is_active` int(11) NOT NULL,
  `is_parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Beranda', 'home', 'fa fa-home', 'esa', 1, 0, 1);
INSERT INTO `menu` VALUES (2, 'Menu Admin', 'menus', 'fa fa-list', '', 1, 0, 14);
INSERT INTO `menu` VALUES (3, 'Manajemen Admin', '#', 'fa fa-user', '', 1, 0, 16);
INSERT INTO `menu` VALUES (4, 'Groups', 'groups', 'fa fa-circle-o', '', 1, 3, 17);
INSERT INTO `menu` VALUES (5, 'Pengguna', 'pengguna', 'fa fa-circle-o', '', 1, 3, 18);
INSERT INTO `menu` VALUES (6, 'Berita', '#', 'fa fa-file-text-o', '', 1, 0, 2);
INSERT INTO `menu` VALUES (8, 'Kategori', 'kategori', 'fa fa-file-text-o', '', 1, 6, 4);
INSERT INTO `menu` VALUES (9, 'berita', 'berita', 'fa fa-file-text-o', '', 1, 6, 3);
INSERT INTO `menu` VALUES (12, 'agenda', 'agenda', 'fa fa-calendar', '', 1, 0, 7);
INSERT INTO `menu` VALUES (18, 'Halaman', '#', 'fa fa-newspaper-o ', '', 1, 0, 8);
INSERT INTO `menu` VALUES (19, 'Tambah halaman', 'halaman/tambah', 'fa fa-newspaper-o ', '', 1, 18, 10);
INSERT INTO `menu` VALUES (20, 'Semua halaman', 'halaman', 'fa fa-newspaper-o ', '', 1, 18, 9);
INSERT INTO `menu` VALUES (21, 'Pengaturan', '#', 'fa fa-cogs', '', 1, 0, 19);
INSERT INTO `menu` VALUES (22, 'Profile', 'profile', 'fa fa-cogs', '', 1, 21, 20);
INSERT INTO `menu` VALUES (23, 'Gambar Slide', 'banner', 'fa fa-cogs', '', 1, 21, 21);
INSERT INTO `menu` VALUES (24, 'Link Terkait', 'linkterkait', 'fa fa-cogs', '', 1, 21, 22);
INSERT INTO `menu` VALUES (27, 'Media', '#', 'fa fa-file', '', 1, 0, 11);
INSERT INTO `menu` VALUES (28, 'Galeri Video', 'video', 'fa fa-file-movie-o', '', 1, 27, 12);
INSERT INTO `menu` VALUES (29, 'Galeri Foto', 'album', 'fa fa-file-image-o', '', 1, 27, 13);
INSERT INTO `menu` VALUES (30, 'Kontak', 'kontak', 'fa fa-envelope', '', 1, 0, 23);
INSERT INTO `menu` VALUES (31, 'Manajemen Menu', 'pmenu/index', 'fa fa-list', '', 1, 0, 15);
INSERT INTO `menu` VALUES (33, 'Jasakip', 'jaskip', 'fa fa-sticky-note-o', '', 1, 0, 6);
INSERT INTO `menu` VALUES (34, 'Litbang', 'litbang', 'fa fa-book', '', 1, 0, 5);

-- ----------------------------
-- Table structure for menus_public
-- ----------------------------
DROP TABLE IF EXISTS `menus_public`;
CREATE TABLE `menus_public`  (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `active` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `posisi` enum('header_top','header','footer') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'header_top',
  `sort` int(11) NOT NULL,
  `ops` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menus_public
-- ----------------------------
INSERT INTO `menus_public` VALUES (3, 'informasi', '#', 1, 0, 'header', 9, '0');
INSERT INTO `menus_public` VALUES (5, 'agenda kegiatan', 'agenda', 1, 3, 'header', 11, '0');
INSERT INTO `menus_public` VALUES (11, 'Translate', '#', 1, 0, 'header_top', 3, '0');
INSERT INTO `menus_public` VALUES (12, 'indonesian', 'index', 1, 11, 'header_top', 4, '0');
INSERT INTO `menus_public` VALUES (13, 'english', 'berita/detail/21/helper-codeigniter-untuk-membuat-tanggal-dalam-bahasa-indonesia', 1, 11, 'header_top', 5, '0');
INSERT INTO `menus_public` VALUES (14, 'ini footer', '#', 1, 0, 'footer', 2, '0');
INSERT INTO `menus_public` VALUES (15, 'dsa', 'dsadas', 1, 0, 'footer', 1, '0');
INSERT INTO `menus_public` VALUES (16, 'dfsa', 'sda', 1, 0, 'footer', 3, '0');
INSERT INTO `menus_public` VALUES (17, 'Kontak', 'kontak', 1, 0, 'header_top', 2, '0');
INSERT INTO `menus_public` VALUES (18, 'Tentang Kami', 'page/profile', 1, 0, 'header', 5, '0');
INSERT INTO `menus_public` VALUES (20, 'sejarah', 'page/sejarah', 1, 0, 'header', 6, '0');
INSERT INTO `menus_public` VALUES (21, 'Visi & Misi', 'page/visi-dan-misi', 1, 0, 'header', 4, '0');
INSERT INTO `menus_public` VALUES (27, 'Berita', 'berita', 1, 0, 'header_top', 1, '0');
INSERT INTO `menus_public` VALUES (28, 'Berita', 'berita', 1, 3, 'header', 10, '0');
INSERT INTO `menus_public` VALUES (29, 'kontak', 'kontak', 1, 0, 'header', 16, '0');
INSERT INTO `menus_public` VALUES (32, 'Galery', '#', 1, 0, 'header', 13, '0');
INSERT INTO `menus_public` VALUES (33, 'Foto', 'album', 1, 32, 'header', 15, '0');
INSERT INTO `menus_public` VALUES (34, 'video', 'video', 1, 32, 'header', 14, '0');
INSERT INTO `menus_public` VALUES (35, 'Litbang', 'litbang', 1, 0, 'header', 12, '0');
INSERT INTO `menus_public` VALUES (36, 'Beranda', 'home', 1, 0, 'header', 3, '0');
INSERT INTO `menus_public` VALUES (37, 'Layanan', '#', 1, 0, 'header', 7, '0');
INSERT INTO `menus_public` VALUES (38, 'SI-IDA', 'https://siida.litbangsultraprov.id', 1, 37, 'header', 8, '1');
INSERT INTO `menus_public` VALUES (42, 'ds', 'sa', 1, 43, 'header', 2, '0');
INSERT INTO `menus_public` VALUES (43, 'dsa', 'dsa', 1, 0, 'header', 1, '0');

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id_profile` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tlp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `web` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_profile`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (1, 'balitbang sultra', 'Kompleks Bumi Praja Anduonouhu', '(0401) 3008846', '(0401) 3008846', 'www.balitbang.com', 'balitbang-sultra@mail.com', '-', '-', '-', '-');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for video
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video`  (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `embed` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_video`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES (3, 'Iksan Skuter - Untukmu Gadisku (Lirik)', '', '8th6hHqd_fc');
INSERT INTO `video` VALUES (4, 'The rain terlatih patah hati', 'I am getting an error when trying to set custom validation messages in CodeIgniter for the min_length and max_length validation constraints.I am getting an error when trying to set custom validation messages in CodeIgniter for the sadsaasd d', 'N9uF8_0bv0k');
INSERT INTO `video` VALUES (5, 'Payung Teduh - Untuk Perempuan yang Sedang Dalam Pelukan (Cover Video Clip)', 'https://www.youtube.com/watch?v=R-91zBrXJaU', 'R-91zBrXJaU');

SET FOREIGN_KEY_CHECKS = 1;
