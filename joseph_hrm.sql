/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : joseph_hrm

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 28/07/2021 13:22:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for absence
-- ----------------------------
DROP TABLE IF EXISTS `absence`;
CREATE TABLE `absence`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `masuk` time NULL DEFAULT NULL,
  `keluar` time NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Hadir',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 191 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of absence
-- ----------------------------
INSERT INTO `absence` VALUES (121, '1234567890123451', '08:00:00', '17:00:00', '2020-01-01', 'Hadir');
INSERT INTO `absence` VALUES (122, '1234567890123451', '08:00:00', '17:00:00', '2020-01-02', 'Hadir');
INSERT INTO `absence` VALUES (123, '1234567890123451', '08:00:00', '17:00:00', '2020-01-03', 'Hadir');
INSERT INTO `absence` VALUES (124, '1234567890123451', '08:00:00', '17:00:00', '2020-01-04', 'Hadir');
INSERT INTO `absence` VALUES (125, '1234567890123451', '08:00:00', '17:00:00', '2020-01-05', 'Hadir');
INSERT INTO `absence` VALUES (126, '1234567890123451', '08:00:00', '17:00:00', '2020-01-06', 'Hadir');
INSERT INTO `absence` VALUES (127, '1234567890123451', '08:00:00', '17:00:00', '2020-01-07', 'Hadir');
INSERT INTO `absence` VALUES (128, '1234567890123451', '08:00:00', '17:00:00', '2020-01-08', 'Hadir');
INSERT INTO `absence` VALUES (129, '1234567890123451', '08:00:00', '17:00:00', '2020-01-09', 'Hadir');
INSERT INTO `absence` VALUES (130, '1234567890123451', '08:00:00', '17:00:00', '2020-01-10', 'Hadir');
INSERT INTO `absence` VALUES (131, '1234567890123451', '08:00:00', '17:00:00', '2020-01-11', 'Hadir');
INSERT INTO `absence` VALUES (132, '1234567890123451', '08:00:00', '17:00:00', '2020-01-12', 'Hadir');
INSERT INTO `absence` VALUES (133, '1234567890123451', '08:00:00', '17:00:00', '2020-01-13', 'Hadir');
INSERT INTO `absence` VALUES (134, '1234567890123451', '08:00:00', '17:13:00', '2020-01-14', 'Hadir');
INSERT INTO `absence` VALUES (135, '1234567890123451', '08:00:00', '17:14:00', '2020-01-15', 'Hadir');
INSERT INTO `absence` VALUES (136, '1234567890123451', '08:00:00', '17:15:00', '2020-01-16', 'Hadir');
INSERT INTO `absence` VALUES (137, '1234567890123451', '08:00:00', '17:16:00', '2020-01-17', 'Hadir');
INSERT INTO `absence` VALUES (138, '1234567890123451', '08:00:00', '17:17:00', '2020-01-18', 'Hadir');
INSERT INTO `absence` VALUES (139, '1234567890123451', '08:00:00', '17:18:00', '2020-01-19', 'Hadir');
INSERT INTO `absence` VALUES (140, '1234567890123451', '08:00:00', '17:19:00', '2020-01-20', 'Hadir');
INSERT INTO `absence` VALUES (141, '1234567890123451', '08:00:00', '17:20:00', '2020-01-21', 'Hadir');
INSERT INTO `absence` VALUES (142, '1234567890123451', '08:00:00', '17:21:00', '2020-01-22', 'Hadir');
INSERT INTO `absence` VALUES (143, '1234567890123451', '08:00:00', '17:22:00', '2020-01-23', 'Hadir');
INSERT INTO `absence` VALUES (144, '1234567890123451', '08:00:00', '17:23:00', '2020-01-24', 'Hadir');
INSERT INTO `absence` VALUES (145, '1234567890123451', '08:00:00', '17:24:00', '2020-01-25', 'Hadir');
INSERT INTO `absence` VALUES (146, '1234567890123451', '08:00:00', '17:25:00', '2020-01-26', 'Hadir');
INSERT INTO `absence` VALUES (147, '1234567890123451', '08:00:00', '17:26:00', '2020-01-27', 'Hadir');
INSERT INTO `absence` VALUES (148, '1234567890123451', '08:00:00', '17:27:00', '2020-01-28', 'Hadir');
INSERT INTO `absence` VALUES (149, '1234567890123451', '08:00:00', '17:28:00', '2020-01-29', 'Hadir');
INSERT INTO `absence` VALUES (150, '1234567890123451', '08:00:00', '17:29:00', '2020-01-30', 'Hadir');
INSERT INTO `absence` VALUES (151, '1234567890123456', '08:00:00', '17:00:00', '2020-01-07', 'Hadir');
INSERT INTO `absence` VALUES (155, '123456', '08:00:00', '17:00:00', '2021-05-24', 'Hadir');
INSERT INTO `absence` VALUES (183, '1234567890123451', '08:00:00', '17:00:00', '2021-06-30', 'Hadir');
INSERT INTO `absence` VALUES (184, 'ACC02', '08:00:00', '17:00:00', '2021-06-30', 'Hadir');
INSERT INTO `absence` VALUES (186, 'ACC04', '08:00:00', '17:00:00', '2021-07-02', 'Hadir');
INSERT INTO `absence` VALUES (187, '123456789', '08:00:00', '17:00:00', '2021-07-03', 'Hadir');
INSERT INTO `absence` VALUES (188, 'ACC02', '08:00:00', '17:00:00', '2021-07-15', 'Hadir');
INSERT INTO `absence` VALUES (189, 'ACC02', '08:00:00', '17:00:00', '2021-07-15', 'Hadir');
INSERT INTO `absence` VALUES (190, 'AKR01', '08:00:00', '17:00:00', '2021-07-15', 'Hadir');

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 77 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES (6, 'Bank Negara Indonesia (BNI)');
INSERT INTO `bank` VALUES (7, 'Bank Mandiri');
INSERT INTO `bank` VALUES (8, 'Bank Rakyat Indonesia (BRI)');
INSERT INTO `bank` VALUES (9, 'Bank Tabungan Negara (BTN)');
INSERT INTO `bank` VALUES (10, 'Bank CIMB Niaga');
INSERT INTO `bank` VALUES (11, 'Bank Central Asia (BCA)');
INSERT INTO `bank` VALUES (12, 'Bank Mega');
INSERT INTO `bank` VALUES (13, 'Panin Bank');
INSERT INTO `bank` VALUES (14, 'Bank Lampung');
INSERT INTO `bank` VALUES (15, 'Commonwealth Bank ');
INSERT INTO `bank` VALUES (16, 'HSBC Holdings');
INSERT INTO `bank` VALUES (17, 'Citibank');
INSERT INTO `bank` VALUES (18, 'JPMorgan Chase');
INSERT INTO `bank` VALUES (19, 'Standard Chartered');
INSERT INTO `bank` VALUES (20, 'Bank BNI Syariah');
INSERT INTO `bank` VALUES (21, 'Bank Mega Syariah');
INSERT INTO `bank` VALUES (22, 'Bank Muamalat Indonesia');
INSERT INTO `bank` VALUES (23, 'Bank Syariah Mandiri');
INSERT INTO `bank` VALUES (24, 'BCA Syariah');
INSERT INTO `bank` VALUES (25, 'Bank BRI Syariah');
INSERT INTO `bank` VALUES (26, 'Bank BJB');
INSERT INTO `bank` VALUES (27, 'Bank BJB Syariah');
INSERT INTO `bank` VALUES (28, 'Bank BRI Syariah');
INSERT INTO `bank` VALUES (29, 'Panin Bank Syariah');
INSERT INTO `bank` VALUES (30, 'Bank BTN Syariah');
INSERT INTO `bank` VALUES (31, 'CIMB Niaga Syariah');
INSERT INTO `bank` VALUES (32, 'Bank of America');
INSERT INTO `bank` VALUES (33, 'Bangkok Bank');
INSERT INTO `bank` VALUES (34, 'Bank of China');
INSERT INTO `bank` VALUES (35, 'Deutsche Bank');
INSERT INTO `bank` VALUES (36, 'Bank DKI');
INSERT INTO `bank` VALUES (37, 'Bank ICBC Indonesia');
INSERT INTO `bank` VALUES (38, 'Bank Maybank Indonesia');
INSERT INTO `bank` VALUES (39, 'Bank Permata');
INSERT INTO `bank` VALUES (40, 'Bank Sinarmas');
INSERT INTO `bank` VALUES (41, 'Bank Tabungan Pensiunan Nasional');
INSERT INTO `bank` VALUES (42, 'Bank BPD Aceh');
INSERT INTO `bank` VALUES (43, 'Bank Sumut');
INSERT INTO `bank` VALUES (44, 'Bank Nagari');
INSERT INTO `bank` VALUES (45, 'Bank Riau Kepri');
INSERT INTO `bank` VALUES (46, 'Bank Jambi');
INSERT INTO `bank` VALUES (47, 'Bank Bengkulu');
INSERT INTO `bank` VALUES (48, 'Bank Sumsel Babel');
INSERT INTO `bank` VALUES (49, 'Bank Jateng');
INSERT INTO `bank` VALUES (50, 'Bank BPD DIY');
INSERT INTO `bank` VALUES (51, 'Bank Jatim');
INSERT INTO `bank` VALUES (52, 'Bank Kalbar');
INSERT INTO `bank` VALUES (53, 'Bank Kalteng');
INSERT INTO `bank` VALUES (54, 'Bank Kalsel');
INSERT INTO `bank` VALUES (55, 'Bank Kaltim');
INSERT INTO `bank` VALUES (56, 'Bank Sulsel');
INSERT INTO `bank` VALUES (57, 'Bank Sultra');
INSERT INTO `bank` VALUES (58, 'Bank BPD Sulteng');
INSERT INTO `bank` VALUES (59, 'Bank Sulut');
INSERT INTO `bank` VALUES (60, 'Bank BPD Bali');
INSERT INTO `bank` VALUES (61, 'Bank NTB');
INSERT INTO `bank` VALUES (62, 'Bank NTT');
INSERT INTO `bank` VALUES (63, 'Bank Maluku');
INSERT INTO `bank` VALUES (64, 'Bank Papua');
INSERT INTO `bank` VALUES (65, 'Bank DBS Indonesia');
INSERT INTO `bank` VALUES (66, 'Banco Santander');
INSERT INTO `bank` VALUES (67, 'Barclays bank');
INSERT INTO `bank` VALUES (68, 'Credit Suisse International');
INSERT INTO `bank` VALUES (69, 'Industrial & Commercial Bank of China (ICBC))');
INSERT INTO `bank` VALUES (70, 'Wells Fargo');
INSERT INTO `bank` VALUES (71, 'Sumitomo Mitsui Financial Group');
INSERT INTO `bank` VALUES (72, 'Mizuho Financial Group');
INSERT INTO `bank` VALUES (73, 'Societe Generale');
INSERT INTO `bank` VALUES (74, 'Goldman Sachs International Bank');
INSERT INTO `bank` VALUES (75, 'C. Hoare & Co');
INSERT INTO `bank` VALUES (76, 'Bank Negara Indonesia (BNI)');

-- ----------------------------
-- Table structure for division
-- ----------------------------
DROP TABLE IF EXISTS `division`;
CREATE TABLE `division`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of division
-- ----------------------------
INSERT INTO `division` VALUES (2, 'Administration');
INSERT INTO `division` VALUES (7, 'Klinik Anak');
INSERT INTO `division` VALUES (8, 'Klinik Penyakit Dalam');
INSERT INTO `division` VALUES (9, 'Klinik Jantung');
INSERT INTO `division` VALUES (10, 'Klinik Kebidanan Kandungan');
INSERT INTO `division` VALUES (11, 'Klinik Bedah Umum');
INSERT INTO `division` VALUES (12, 'Klinik Bedah Orthopedik &Traumatologi');
INSERT INTO `division` VALUES (13, 'Klinik Bedah Urologi');
INSERT INTO `division` VALUES (14, 'Klinik THT-KL');
INSERT INTO `division` VALUES (16, 'Klinik Kulit & Kelamin');
INSERT INTO `division` VALUES (17, 'Klinik Mata');
INSERT INTO `division` VALUES (18, 'Klinik Syaraf');
INSERT INTO `division` VALUES (19, 'Klinik Gigi');
INSERT INTO `division` VALUES (20, 'Klinik Paru');
INSERT INTO `division` VALUES (21, 'Klinik Bedah Mulut');
INSERT INTO `division` VALUES (22, 'Klinik Radiologi');
INSERT INTO `division` VALUES (23, 'Klinik Gizi');
INSERT INTO `division` VALUES (24, 'Klinik Rehab Medik');
INSERT INTO `division` VALUES (25, 'Klinik Gastrohepatologi');
INSERT INTO `division` VALUES (26, 'Instalasi Gawat Darurat');
INSERT INTO `division` VALUES (27, 'Instalasi Rawat Inap');
INSERT INTO `division` VALUES (28, 'Instalasi Rawat Jalan');
INSERT INTO `division` VALUES (29, 'Instalasi Farmasi');
INSERT INTO `division` VALUES (30, 'Instalasi Critical Care');
INSERT INTO `division` VALUES (31, 'Instalasi Bedah Central');
INSERT INTO `division` VALUES (32, 'Instalasi Rehab Medik');
INSERT INTO `division` VALUES (33, 'Instalasi Hemodialisa');
INSERT INTO `division` VALUES (34, 'Instalasi Laboratorium');
INSERT INTO `division` VALUES (35, 'Instalasi Radiologi');
INSERT INTO `division` VALUES (36, 'Instalasi Gizi');
INSERT INTO `division` VALUES (37, 'Instalasi Fisio Terapi');
INSERT INTO `division` VALUES (38, 'Instalasi Rekam Medis');
INSERT INTO `division` VALUES (39, 'Ambulans Siaga');
INSERT INTO `division` VALUES (49, 'Klinik Dokter Umum');
INSERT INTO `division` VALUES (50, 'Medical Check Up');
INSERT INTO `division` VALUES (51, 'Anastesi');
INSERT INTO `division` VALUES (52, 'Keperawatan');
INSERT INTO `division` VALUES (53, 'Ners');
INSERT INTO `division` VALUES (54, 'Auditor');
INSERT INTO `division` VALUES (55, 'Acounting');
INSERT INTO `division` VALUES (56, 'Keuangan');
INSERT INTO `division` VALUES (57, 'Pendaftaran BPJS');
INSERT INTO `division` VALUES (58, 'Pendaftaran');
INSERT INTO `division` VALUES (59, 'Instalasi Farmasi Rawat Inap');
INSERT INTO `division` VALUES (60, 'Instalasi Farmasi Rawat Jalan');
INSERT INTO `division` VALUES (61, 'Cafetaria');
INSERT INTO `division` VALUES (62, 'Bakery');
INSERT INTO `division` VALUES (63, 'Electronic Departement (EDP)');
INSERT INTO `division` VALUES (65, 'Marketing');
INSERT INTO `division` VALUES (66, 'Instalasi Ruang Jenazah');
INSERT INTO `division` VALUES (67, 'Skrining');
INSERT INTO `division` VALUES (68, 'Diklat');
INSERT INTO `division` VALUES (69, 'Customer Service');
INSERT INTO `division` VALUES (70, 'Call Center');
INSERT INTO `division` VALUES (71, 'Logistic Medic');
INSERT INTO `division` VALUES (72, 'Logistic Non-Medic');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `position_id` int NOT NULL,
  `division_id` int NOT NULL,
  `religion_id` int NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `place_of_birth` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `account_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bank_id` int NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_bergabung` date NULL DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (2, 1, '1234567890123456', 'Joseph Hamonangan', 1, 2, 14, 'L', 'Jakarta', '1998-11-22', 'Bekasi', '087820801959', 68, 'joseph@gmail.com', '0851323232323', '2020-06-01', 'profile1626236929.png');
INSERT INTO `employees` VALUES (9, 14, 'ACC02', 'Jefriadi Sihotang', 8, 55, 14, 'L', 'Lampung', '1988-01-14', 'Jl KT Dalom Gg Badik Alam, Talangpadang, Lampung', '4333215312340', 8, 'jefriadi@gmail.com', '081896555558', '2009-01-14', 'profile1626216269.png');
INSERT INTO `employees` VALUES (10, 15, 'ACC04', 'Julius Panjaitan', 7, 55, 14, 'L', 'Riau', '1986-12-14', 'Jl Negeri Agung, Bumi Waras, Bumi Jaya ', '4176695168884', 6, 'julius04@gmail.com', '081896324558', '1983-07-14', 'profile1626216541.png');
INSERT INTO `employees` VALUES (11, 16, 'ACC05', 'Romauli Simbolon', 7, 55, 14, 'P', 'Bandung', '1989-07-15', 'Jl Raya Sukasari RT 32/032, Bumi Waras, Bumi Waras, Lampung', '4091657428624', 8, 'romauli03@gmail.com', '0878555504', '2006-10-21', 'profile1626216833.png');
INSERT INTO `employees` VALUES (12, 17, 'ACC06', 'Bastanta Pinem', 11, 55, 14, 'L', 'Jakarta', '1970-05-19', 'Jl Raya Campang, Bumi Waras,Garuntang, Lampung', '5463709134394563', 6, 'bastanta04@gmail.com', '0878555957', '2011-01-09', 'profile1626217615.png');
INSERT INTO `employees` VALUES (13, 18, 'ACC07', 'Yodi Andika Pamungkas', 8, 54, 9, 'L', 'Medan', '2000-06-22', 'Jl Utan Jati, Bumi Waras, Kankung, Lampung', '366137976289650', 11, 'yodi13432@gmail.com', '0878355955', '2010-11-30', 'profile1626218737.png');
INSERT INTO `employees` VALUES (14, 19, 'AKR01', 'Naomi Ritonga', 6, 54, 7, 'P', 'Sulawesi', '1978-07-04', 'Jl Alternatif Ruko Citra Grand Bl R-6/28, Bumi Waras, Sukaraja, Lampung', '5180517572309858', 6, 'naomi092@gmail.com', '0878555957', '2007-06-22', 'profile1626217938.png');
INSERT INTO `employees` VALUES (15, 20, 'AUT01', 'Sugeng Raharjo', 11, 56, 8, 'L', 'Papua', '1959-07-22', 'Jl Jend A Yani 16, Engal, Gunung Sari, Lampung ', '6011051938730279', 7, 'romauli03@gmail.com', '0878515604', '2013-10-24', 'profile1626218351.png');
INSERT INTO `employees` VALUES (16, 21, 'AUT04', 'Stefanus Banggu', 12, 56, 9, 'L', 'Bali', '1979-11-15', 'Kedamaian, Bumi Kedamaian, Lampung', '370866213788876', 8, 'stefanus545@gmail.com', '0854555492', '1994-07-29', 'profile1626218210.png');
INSERT INTO `employees` VALUES (17, 22, 'CAF02', 'Wahyuningsih', 15, 61, 5, 'P', 'Palembang', '1968-11-11', 'Kedaton, Penengahan, Lampung', '4426000423940', 8, 'Wahyuningsih151@gmail.com', '0896555528', '2006-07-11', 'profile1626222947.png');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` int NULL DEFAULT NULL,
  `reciever` int NULL DEFAULT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `filename` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ext` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `datetime` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES (27, 2, 1, 'test message', NULL, NULL, '2021-02-16 12:56:11');
INSERT INTO `message` VALUES (28, 1, 2, 'oke good', NULL, NULL, '2021-02-16 12:56:49');
INSERT INTO `message` VALUES (29, 2, 1, 'seep', NULL, NULL, '2021-02-16 12:57:49');
INSERT INTO `message` VALUES (30, 2, 1, 'asdfasdf', NULL, NULL, '2021-02-16 15:08:55');
INSERT INTO `message` VALUES (31, 2, 1, 'ping', NULL, NULL, '2021-02-18 08:25:07');
INSERT INTO `message` VALUES (43, 2, 0, 'tes', '1617618937', '.zip', '2021-02-18 08:25:07');
INSERT INTO `message` VALUES (44, 2, 0, 'helo', '1617619727', '.png', '2021-04-05 00:00:00');
INSERT INTO `message` VALUES (45, 2, 1, 'kotak', '1617620056', '.jpg', '2021-04-05 17:54:16');
INSERT INTO `message` VALUES (46, 2, 0, 'test', '1625179107', '.png', '2021-07-02 05:38:27');
INSERT INTO `message` VALUES (47, 2, 0, 'test', NULL, NULL, '2021-07-02 05:38:36');
INSERT INTO `message` VALUES (48, 2, 8, 'ping', NULL, NULL, '2021-07-02 05:50:09');
INSERT INTO `message` VALUES (49, 8, 2, 'ping', NULL, NULL, '2021-07-02 05:55:46');
INSERT INTO `message` VALUES (50, 8, 2, 'pinggsadas', NULL, NULL, '2021-07-02 05:55:51');
INSERT INTO `message` VALUES (51, 8, 0, 'test 123', NULL, NULL, '2021-07-02 05:56:32');
INSERT INTO `message` VALUES (52, 8, 2, 'kjlkda', NULL, NULL, '2021-07-02 05:56:38');
INSERT INTO `message` VALUES (53, 8, 2, 'kjlkda', NULL, NULL, '2021-07-02 05:56:41');
INSERT INTO `message` VALUES (54, 8, 2, 'kjlkda', NULL, NULL, '2021-07-02 05:56:41');
INSERT INTO `message` VALUES (55, 8, 2, 'kjlkda', NULL, NULL, '2021-07-02 05:56:41');
INSERT INTO `message` VALUES (56, 8, 2, 'kjlkda', NULL, NULL, '2021-07-02 05:56:41');
INSERT INTO `message` VALUES (57, 8, 2, 'kjlkda', NULL, NULL, '2021-07-02 05:56:42');
INSERT INTO `message` VALUES (58, 8, 6, 'dasd', NULL, NULL, '2021-07-02 05:56:45');
INSERT INTO `message` VALUES (59, 8, 6, 'dasd', NULL, NULL, '2021-07-02 05:56:52');
INSERT INTO `message` VALUES (60, 8, 6, 'dasd', NULL, NULL, '2021-07-02 05:56:52');
INSERT INTO `message` VALUES (61, 8, 6, 'dasd', NULL, NULL, '2021-07-02 05:56:53');
INSERT INTO `message` VALUES (62, 8, 6, 'dasd', NULL, NULL, '2021-07-02 05:56:53');
INSERT INTO `message` VALUES (63, 8, 6, 'dasd', NULL, NULL, '2021-07-02 05:56:53');
INSERT INTO `message` VALUES (64, 8, 6, '123', NULL, NULL, '2021-07-02 05:56:59');
INSERT INTO `message` VALUES (65, 8, 1, 'asd', NULL, NULL, '2021-07-02 05:57:08');
INSERT INTO `message` VALUES (66, 8, 2, 'test 123', NULL, NULL, '2021-07-02 05:57:15');
INSERT INTO `message` VALUES (67, 2, 8, 'ping', NULL, NULL, '2021-07-02 06:02:59');
INSERT INTO `message` VALUES (68, 1, 8, 'tes', NULL, NULL, '2021-07-02 09:45:15');
INSERT INTO `message` VALUES (69, 2, 8, 'tesr', '1626180669', '.pdf', '2021-07-13 19:51:09');
INSERT INTO `message` VALUES (70, 2, 9, 'test', '1626235199', '.docx', '2021-07-14 10:59:59');

-- ----------------------------
-- Table structure for paid_leave
-- ----------------------------
DROP TABLE IF EXISTS `paid_leave`;
CREATE TABLE `paid_leave`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `from_` date NOT NULL,
  `to_` date NOT NULL,
  `cause` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` tinyint(1) NULL DEFAULT NULL COMMENT '1.cuti melahirkan, 2. cuti tahunan',
  `status` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of paid_leave
-- ----------------------------
INSERT INTO `paid_leave` VALUES (18, 'AKR01', '2021-07-28', '2021-07-30', 'traveling', 'proof_AKR011627444362.jpg', 2, 1);
INSERT INTO `paid_leave` VALUES (19, 'AKR01', '2021-07-01', '2021-07-03', 'demam', 'proof_AKR011627445754.jpg', 3, 1);
INSERT INTO `paid_leave` VALUES (20, 'AKR01', '2021-06-01', '2021-06-03', 'dinas', 'proof_AKR011627445816.jpg', 4, 1);

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES (1, 'Admin');
INSERT INTO `position` VALUES (2, 'Kepala Bidang');
INSERT INTO `position` VALUES (4, 'Dokter Spesialis');
INSERT INTO `position` VALUES (5, 'Anastesi');
INSERT INTO `position` VALUES (6, 'Kepala Bagian');
INSERT INTO `position` VALUES (7, 'Staff');
INSERT INTO `position` VALUES (8, 'Senior Staff');
INSERT INTO `position` VALUES (9, 'Bendahara');
INSERT INTO `position` VALUES (10, 'Kasir');
INSERT INTO `position` VALUES (11, 'Manager');
INSERT INTO `position` VALUES (12, 'Direktur');
INSERT INTO `position` VALUES (13, 'Penanggung Jawab');
INSERT INTO `position` VALUES (14, 'Supervisor');
INSERT INTO `position` VALUES (15, 'Petugas');

-- ----------------------------
-- Table structure for religion
-- ----------------------------
DROP TABLE IF EXISTS `religion`;
CREATE TABLE `religion`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of religion
-- ----------------------------
INSERT INTO `religion` VALUES (5, 'Islam');
INSERT INTO `religion` VALUES (7, 'Hindu');
INSERT INTO `religion` VALUES (8, 'Buddha');
INSERT INTO `religion` VALUES (9, 'Katolik');
INSERT INTO `religion` VALUES (14, 'Kristen Protestan');
INSERT INTO `religion` VALUES (16, 'Kong Hu Cu');

-- ----------------------------
-- Table structure for salary
-- ----------------------------
DROP TABLE IF EXISTS `salary`;
CREATE TABLE `salary`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NULL DEFAULT NULL,
  `salary` decimal(10, 2) NULL DEFAULT NULL,
  `allowance` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `overtime` decimal(10, 2) NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  `month` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `year` year NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of salary
-- ----------------------------
INSERT INTO `salary` VALUES (5, 1, 5000000.00, '100000', 100000.00, 5200000.00, '1', 2021);
INSERT INTO `salary` VALUES (6, 1, 5000000.00, '100000', 100000.00, 5200000.00, '2', 2021);
INSERT INTO `salary` VALUES (7, 0, 0.00, '0', 0.00, 0.00, '1', 2021);
INSERT INTO `salary` VALUES (12, 6, 3000000.00, '200000', 100000.00, 3300000.00, '5', 2021);
INSERT INTO `salary` VALUES (13, 6, 3000000.00, '400000', 100000.00, 3500000.00, '6', 2021);
INSERT INTO `salary` VALUES (14, 8, 2000000.00, '500000', 1000000.00, 3500000.00, '7', 2021);
INSERT INTO `salary` VALUES (15, 1, 50000000.00, '1000000', 3.00, 51000003.00, '6', 2021);
INSERT INTO `salary` VALUES (16, 2, 1.00, '1', 1.00, 3.00, '1', 2021);
INSERT INTO `salary` VALUES (17, 2, 1.00, '1', 1.00, 3.00, '1', 2021);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '0;admin,, 1;karyawan',
  `last_login` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$5boHi8O9RMK05E9LApnYOe0qBQBp/V93DRhRS91Xgz1uJNo2H8bx.', '0', '2021-07-02 05:30:04');
INSERT INTO `users` VALUES (14, 'jefriadi', '$2y$10$vLUyieaN6MPpUx0VttE8bus3IO2bdoF8yP9sKk0L6toXXA8NLp7Cu', '1', '2021-07-15 12:43:24');
INSERT INTO `users` VALUES (15, 'julius', '$2y$10$DGHOYLgPSds0F.NzDt4oKO6klDLDNH8d3adFFsRjDUj2Q3V4fKyuq', '1', '2021-07-14 06:17:34');
INSERT INTO `users` VALUES (16, 'romauli', '$2y$10$B8bhJP8haxq1UWxH/T9Fsum08PguVdbAxEgB/pcw0OqPMz9zWHKbS', '1', '2021-07-14 06:13:22');
INSERT INTO `users` VALUES (17, 'bastanta', '$2y$10$..5k4aJrULMxtMcwzO8EIu8Q5mEKGVo6FBbsCZKaizSYnUGjha0Ze', '1', '2021-07-14 07:35:23');
INSERT INTO `users` VALUES (18, 'yodi', '$2y$10$aZzYTPDb49tfiSigOzWRiecxl.Z.sdacGf7wstl2VvCutRffJPj/a', '1', NULL);
INSERT INTO `users` VALUES (19, 'naomi', '$2y$10$VctJVnH8QrkGo5AWblujo.JJakG5MYWCRjm/XBKS7/iQogIkvBMTW', '1', NULL);
INSERT INTO `users` VALUES (20, 'sugeng', '$2y$10$9q5Fw3Ki5HLSZVHYO3y03el1GpMj1/Bd642RZojTpRPKTBtXUgkhO', '1', NULL);
INSERT INTO `users` VALUES (21, 'stefanus', '$2y$10$QUSfBtNQtVSA.TOucbqOB.bmsXWZ0Yvb9fvzDkQSDmkMF6qHEZBVO', '1', NULL);
INSERT INTO `users` VALUES (22, 'wahyuningsih', '$2y$10$1fzWnpx/jkLXi4QOBQAhweXU9vUM6eSme43e58tGK2P7hX4tafvd6', '1', NULL);

-- ----------------------------
-- Table structure for vacancies
-- ----------------------------
DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE `vacancies`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `position_id` int NOT NULL DEFAULT 0,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of vacancies
-- ----------------------------
INSERT INTO `vacancies` VALUES (1, 1, 'Lowongan Baru', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n');
INSERT INTO `vacancies` VALUES (7, 2, 'asd', '<p>asdasfasf</p>\r\n');

SET FOREIGN_KEY_CHECKS = 1;
