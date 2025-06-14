/*
 Navicat Premium Dump SQL

 Source Server         : Foodie
 Source Server Type    : MySQL
 Source Server Version : 80035 (8.0.35)
 Source Host           : foodiepemweb-foodie2.b.aivencloud.com:23801
 Source Schema         : db_foodie

 Target Server Type    : MySQL
 Target Server Version : 80035 (8.0.35)
 File Encoding         : 65001

 Date: 15/06/2025 00:31:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for credit_score
-- ----------------------------
DROP TABLE IF EXISTS `credit_score`;
CREATE TABLE `credit_score`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `paylater_user_id` int NULL DEFAULT NULL,
  `credit_score` int NULL DEFAULT 0,
  `datetime` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `paylater_user_id`(`paylater_user_id` ASC) USING BTREE,
  CONSTRAINT `credit_score_ibfk_1` FOREIGN KEY (`paylater_user_id`) REFERENCES `paylater_user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of credit_score
-- ----------------------------
INSERT INTO `credit_score` VALUES (1, 1, 750, '2025-06-01 10:00:00');
INSERT INTO `credit_score` VALUES (2, 2, 680, '2025-06-02 11:30:00');
INSERT INTO `credit_score` VALUES (3, 3, 820, '2025-06-03 14:15:00');
INSERT INTO `credit_score` VALUES (4, 4, 720, '2025-06-04 09:45:00');
INSERT INTO `credit_score` VALUES (5, 5, 650, '2025-06-05 16:20:00');

-- ----------------------------
-- Table structure for foodcourt
-- ----------------------------
DROP TABLE IF EXISTS `foodcourt`;
CREATE TABLE `foodcourt`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `latitude` decimal(10, 8) NULL DEFAULT NULL,
  `longitude` decimal(11, 8) NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of foodcourt
-- ----------------------------
INSERT INTO `foodcourt` VALUES (1, 'Foodcourt Plaza Central', 'Jl. Sudirman No. 123, Jakarta Pusat', -6.20880000, 106.84560000, 'logo_plaza_central.png');
INSERT INTO `foodcourt` VALUES (2, 'Mall Foodcourt Mega', 'Jl. Thamrin No. 456, Jakarta Pusat', -6.19440000, 106.82290000, 'logo_mall_mega.png');
INSERT INTO `foodcourt` VALUES (3, 'Food Street Senayan', 'Jl. Senayan No. 789, Jakarta Selatan', -6.22970000, 106.80610000, 'logo_food_street.png');

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategori_menu_id` int NULL DEFAULT NULL,
  `nama_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga_item` decimal(10, 2) NOT NULL,
  `foto_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kategori_menu_id`(`kategori_menu_id` ASC) USING BTREE,
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`kategori_menu_id`) REFERENCES `kategori_menu` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES (1, 1, 'Margherita Pizza', 45000.00, 'margherita_pizza.jpg', 'Pizza klasik dengan saus tomat segar, keju mozzarella premium dan daun basil Italia. Dipanggang dengan oven batu tradisional untuk rasa yang autentik.');
INSERT INTO `item` VALUES (2, 1, 'Pepperoni Pizza', 55000.00, 'pepperoni_pizza.jpg', 'Pizza dengan topping pepperoni berkualitas tinggi, keju mozzarella yang melimpah dan saus tomat spesial. Pedas dan gurih dalam setiap gigitan.');
INSERT INTO `item` VALUES (3, 1, 'Hawaiian Pizza', 50000.00, 'hawaiian_pizza.jpg', 'Perpaduan sempurna antara ham manis, nanas segar dan keju mozzarella. Cita rasa manis dan gurih yang menggugah selera.');
INSERT INTO `item` VALUES (4, 2, 'Spaghetti Bolognese', 35000.00, 'spaghetti_bolognese.jpg', 'Pasta spaghetti al dente dengan saus bolognese daging sapi cincang, tomat segar, dan rempah Italia. Disajikan dengan parmesan cheese.');
INSERT INTO `item` VALUES (5, 2, 'Fettuccine Alfredo', 38000.00, 'fettuccine_alfredo.jpg', 'Fettuccine lembut dengan saus alfredo krim yang kaya, keju parmesan aged, dan sentuhan lada hitam. Creamy dan lezat.');
INSERT INTO `item` VALUES (6, 3, 'Classic Beef Burger', 25000.00, 'classic_beef_burger.jpg', 'Burger daging sapi juicy dengan sayuran segar, keju cheddar, saus burger spesial dalam roti brioche yang lembut.');
INSERT INTO `item` VALUES (7, 3, 'Chicken Burger', 23000.00, 'chicken_burger.jpg', 'Burger ayam crispy dengan lettuce segar, tomat, mayo dan saus honey mustard. Roti sesame yang harum dan empuk.');
INSERT INTO `item` VALUES (8, 3, 'Cheese Burger', 27000.00, 'cheese_burger.jpg', 'Double cheese burger dengan daging sapi premium, keju cheddar dan swiss cheese, pickles dan saus thousand island.');
INSERT INTO `item` VALUES (9, 4, 'Regular French Fries', 12000.00, 'regular_fries.jpg', 'Kentucky potatoes yang dipotong fresh dan digoreng hingga golden crispy. Cocok sebagai side dish atau snack.');
INSERT INTO `item` VALUES (10, 4, 'Curly Fries', 15000.00, 'curly_fries.jpg', 'French fries spiral dengan bumbu cajun spices yang gurih dan pedas. Tekstur crispy diluar dan fluffy didalam.');
INSERT INTO `item` VALUES (11, 5, 'Chicken Noodle Soup', 20000.00, 'chicken_noodle_soup.jpg', 'Mie kuah hangat dengan kaldu ayam yang kaya rasa, potongan ayam tender, sayuran segar dan telur rebus.');
INSERT INTO `item` VALUES (12, 5, 'Beef Noodle', 22000.00, 'beef_noodle.jpg', 'Mie dengan irisan daging sapi empuk, kaldu sapi yang gurih, pak choy segar dan bawang goreng crispy.');
INSERT INTO `item` VALUES (13, 5, 'Vegetable Noodle', 18000.00, 'vegetable_noodle.jpg', 'Mie vegetarian dengan berbagai sayuran segar seperti wortel, brokoli, jamur dan tahu dalam kaldu sayuran yang lezat.');
INSERT INTO `item` VALUES (14, 6, 'Wonton Soup', 16000.00, 'wonton_soup.jpg', 'Sup pangsit isi udang dan daging dengan kuah kaldu yang jernih dan gurih. Dilengkapi dengan sayuran hijau segar.');
INSERT INTO `item` VALUES (15, 6, 'Hot & Sour Soup', 14000.00, 'hot_sour_soup.jpg', 'Sup asam pedas dengan campuran jamur, tomat, dan rempah khas Asia. Menghangatkan dan menyegarkan.');
INSERT INTO `item` VALUES (16, 7, 'Espresso', 8000.00, 'espresso.jpg', 'Espresso murni dari biji kopi arabica pilihan yang di-roast medium. Cita rasa strong dan aroma yang kuat.');
INSERT INTO `item` VALUES (17, 7, 'Cappuccino', 12000.00, 'cappuccino.jpg', 'Perpaduan espresso dengan susu steamed dan foam milk yang creamy. Balance sempurna antara coffee dan milk.');
INSERT INTO `item` VALUES (18, 7, 'Latte', 15000.00, 'latte.jpg', 'Espresso dengan steamed milk yang lembut dan sedikit foam. Milky coffee yang smooth dan comforting.');
INSERT INTO `item` VALUES (19, 8, 'Croissant', 10000.00, 'croissant.jpg', 'Croissant butter yang flaky dan buttery, dipanggang fresh setiap hari. Crispy diluar dan soft didalam.');
INSERT INTO `item` VALUES (20, 8, 'Chocolate Muffin', 13000.00, 'chocolate_muffin.jpg', 'Muffin coklat yang moist dengan chocolate chips melimpah. Manis dan lembut, perfect untuk coffee companion.');
INSERT INTO `item` VALUES (21, 9, 'Original Fried Chicken', 18000.00, 'original_fried_chicken.jpg', 'Ayam goreng crispy dengan bumbu rahasia 11 herbs and spices. Crispy diluar, juicy dan tender didalam.');
INSERT INTO `item` VALUES (22, 9, 'Spicy Fried Chicken', 20000.00, 'spicy_fried_chicken.jpg', 'Ayam goreng pedas dengan level kepedasan yang pas. Bumbu meresap hingga kedalam, crispy coating yang addictive.');
INSERT INTO `item` VALUES (23, 10, 'Coleslaw', 8000.00, 'coleslaw.jpg', 'Salad kubis dan wortel dengan mayo dressing yang creamy dan sedikit manis. Segar dan crunchy sebagai side dish.');
INSERT INTO `item` VALUES (24, 10, 'Mashed Potato', 10000.00, 'mashed_potato.jpg', 'Kentang tumbuk halus dengan butter dan susu. Creamy dan smooth texture yang melting di mulut.');
INSERT INTO `item` VALUES (25, 11, 'Caesar Salad', 25000.00, 'caesar_salad.jpg', 'Salad romaine lettuce dengan dressing caesar yang creamy, crouton crispy, parmesan cheese dan grilled chicken.');
INSERT INTO `item` VALUES (26, 11, 'Greek Salad', 23000.00, 'greek_salad.jpg', 'Salad Mediterania dengan olive, feta cheese, tomat cherry, cucumber dan olive oil dressing yang fresh.');
INSERT INTO `item` VALUES (27, 12, 'Buddha Bowl', 28000.00, 'buddha_bowl.jpg', 'Bowl sehat dengan quinoa, avocado, edamame, wortel, dan tahini dressing. Nutritious dan filling.');
INSERT INTO `item` VALUES (28, 12, 'Quinoa Bowl', 30000.00, 'quinoa_bowl.jpg', 'Superfood bowl dengan quinoa sebagai base, berbagai vegetables, nuts dan seeds dengan lemon vinaigrette.');
INSERT INTO `item` VALUES (29, 13, 'Nasi Gudeg', 15000.00, 'nasi_gudeg.jpg', 'Nasi dengan gudeg Jogja yang manis legit, ayam kampung, telur pindang, krecek dan sambal krecek pedas.');
INSERT INTO `item` VALUES (30, 13, 'Nasi Padang', 18000.00, 'nasi_padang.jpg', 'Nasi dengan rendang daging yang empuk, sayur nangka, telur balado dan kerupuk. Cita rasa Minang yang autentik.');
INSERT INTO `item` VALUES (31, 14, 'Gado-Gado', 12000.00, 'gado_gado.jpg', 'Salad Indonesia dengan sayuran rebus, tahu, tempe, telur rebus dan bumbu kacang yang gurih dan pedas.');
INSERT INTO `item` VALUES (32, 14, 'Sayur Asem', 8000.00, 'sayur_asem.jpg', 'Sup sayuran asam dengan kangkung, kacang panjang, jagung dan bumbu asam jawa yang menyegarkan.');
INSERT INTO `item` VALUES (33, 15, 'Salmon Sushi', 35000.00, 'salmon_sushi.jpg', 'Sushi salmon fresh dengan nori dan sushi rice yang perfectly seasoned. Salmon grade sashimi yang melt in mouth.');
INSERT INTO `item` VALUES (34, 15, 'Tuna Sushi', 38000.00, 'tuna_sushi.jpg', 'Sushi tuna premium dengan tekstur yang firm dan flavor yang rich. Disajikan dengan wasabi dan pickled ginger.');
INSERT INTO `item` VALUES (35, 16, 'Shoyu Ramen', 32000.00, 'shoyu_ramen.jpg', 'Ramen dengan kuah shoyu yang clear namun flavorful, chashu pork yang tender dan telur ajitsuke.');
INSERT INTO `item` VALUES (36, 16, 'Miso Ramen', 35000.00, 'miso_ramen.jpg', 'Ramen dengan kuah miso yang rich dan creamy, corn, green onion dan chashu pork yang melt in mouth.');
INSERT INTO `item` VALUES (37, 17, 'Orange Juice', 12000.00, 'orange_juice.jpg', 'Jus jeruk segar yang diperas langsung dari jeruk pilihan. Kaya vitamin C dan menyegarkan tanpa tambahan gula.');
INSERT INTO `item` VALUES (38, 17, 'Apple Juice', 13000.00, 'apple_juice.jpg', 'Jus apel hijau yang segar dan crisp. Natural sweetness dengan sedikit rasa asam yang menyegarkan.');
INSERT INTO `item` VALUES (39, 18, 'Mango Smoothie', 18000.00, 'mango_smoothie.jpg', 'Smoothie mangga dengan tekstur yang creamy dan thick. Manis natural dari buah mangga matang pilihan.');
INSERT INTO `item` VALUES (40, 18, 'Berry Smoothie', 20000.00, 'berry_smoothie.jpg', 'Smoothie mixed berries dengan blueberry, strawberry dan raspberry. Antioksidan tinggi dan menyegarkan.');
INSERT INTO `item` VALUES (41, 19, 'Vanilla Ice Cream', 15000.00, 'vanilla_ice_cream.jpg', 'Es krim vanilla premium dengan vanilla bean asli Madagascar. Creamy texture dengan aroma vanilla yang harum.');
INSERT INTO `item` VALUES (42, 19, 'Chocolate Ice Cream', 15000.00, 'chocolate_ice_cream.jpg', 'Es krim coklat yang rich dengan dark chocolate Belgium. Intensive chocolate flavor yang memanjakan lidah.');
INSERT INTO `item` VALUES (43, 20, 'Strawberry Milkshake', 22000.00, 'strawberry_milkshake.jpg', 'Milkshake strawberry dengan buah strawberry segar dan vanilla ice cream. Pink, creamy dan manis yang menyenangkan.');
INSERT INTO `item` VALUES (44, 20, 'Chocolate Milkshake', 22000.00, 'chocolate_milkshake.jpg', 'Milkshake coklat dengan chocolate ice cream dan chocolate syrup. Double chocolate indulgence yang decadent.');

-- ----------------------------
-- Table structure for kategori_menu
-- ----------------------------
DROP TABLE IF EXISTS `kategori_menu`;
CREATE TABLE `kategori_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `merchant_id` int NULL DEFAULT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `merchant_id`(`merchant_id` ASC) USING BTREE,
  CONSTRAINT `kategori_menu_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_menu
-- ----------------------------
INSERT INTO `kategori_menu` VALUES (1, 1, 'Pizza');
INSERT INTO `kategori_menu` VALUES (2, 1, 'Pasta');
INSERT INTO `kategori_menu` VALUES (3, 2, 'Burger');
INSERT INTO `kategori_menu` VALUES (4, 2, 'French Fries');
INSERT INTO `kategori_menu` VALUES (5, 3, 'Noodles');
INSERT INTO `kategori_menu` VALUES (6, 3, 'Soup');
INSERT INTO `kategori_menu` VALUES (7, 4, 'Coffee');
INSERT INTO `kategori_menu` VALUES (8, 4, 'Pastry');
INSERT INTO `kategori_menu` VALUES (9, 5, 'Fried Chicken');
INSERT INTO `kategori_menu` VALUES (10, 5, 'Side Dishes');
INSERT INTO `kategori_menu` VALUES (11, 6, 'Salad');
INSERT INTO `kategori_menu` VALUES (12, 6, 'Healthy Bowl');
INSERT INTO `kategori_menu` VALUES (13, 7, 'Nasi');
INSERT INTO `kategori_menu` VALUES (14, 7, 'Sayur');
INSERT INTO `kategori_menu` VALUES (15, 8, 'Sushi');
INSERT INTO `kategori_menu` VALUES (16, 8, 'Ramen');
INSERT INTO `kategori_menu` VALUES (17, 9, 'Fresh Juice');
INSERT INTO `kategori_menu` VALUES (18, 9, 'Smoothie');
INSERT INTO `kategori_menu` VALUES (19, 10, 'Ice Cream');
INSERT INTO `kategori_menu` VALUES (20, 10, 'Milkshake');

-- ----------------------------
-- Table structure for keranjang
-- ----------------------------
DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE `keranjang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `meja_id` int NULL DEFAULT NULL,
  `pelanggan_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `meja_id`(`meja_id` ASC) USING BTREE,
  INDEX `pelanggan_id`(`pelanggan_id` ASC) USING BTREE,
  CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`meja_id`) REFERENCES `meja` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of keranjang
-- ----------------------------
INSERT INTO `keranjang` VALUES (1, 1, 1);
INSERT INTO `keranjang` VALUES (2, 1, 1);
INSERT INTO `keranjang` VALUES (3, 2, 2);
INSERT INTO `keranjang` VALUES (4, 2, 2);
INSERT INTO `keranjang` VALUES (5, 3, 3);
INSERT INTO `keranjang` VALUES (6, 4, 4);
INSERT INTO `keranjang` VALUES (7, 4, 4);
INSERT INTO `keranjang` VALUES (8, 5, 5);
INSERT INTO `keranjang` VALUES (9, 6, 6);
INSERT INTO `keranjang` VALUES (10, 7, 7);
INSERT INTO `keranjang` VALUES (11, 8, 8);
INSERT INTO `keranjang` VALUES (12, 1, 1);
INSERT INTO `keranjang` VALUES (13, 9, 3);
INSERT INTO `keranjang` VALUES (14, 10, 4);
INSERT INTO `keranjang` VALUES (15, 2, 2);

-- ----------------------------
-- Table structure for keranjang_item
-- ----------------------------
DROP TABLE IF EXISTS `keranjang_item`;
CREATE TABLE `keranjang_item`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `keranjang_id` int NOT NULL,
  `item_id` int NOT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `catatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `keranjang_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of keranjang_item
-- ----------------------------
INSERT INTO `keranjang_item` VALUES (1, 1, 1, 2, 'Extra cheese please');
INSERT INTO `keranjang_item` VALUES (2, 1, 4, 1, 'Less spicy');
INSERT INTO `keranjang_item` VALUES (3, 2, 6, 1, 'Medium rare');
INSERT INTO `keranjang_item` VALUES (4, 2, 9, 1, 'Extra crispy');
INSERT INTO `keranjang_item` VALUES (5, 3, 11, 2, 'No onions');
INSERT INTO `keranjang_item` VALUES (6, 4, 25, 1, 'Dressing on the side');
INSERT INTO `keranjang_item` VALUES (7, 5, 17, 2, NULL);
INSERT INTO `keranjang_item` VALUES (8, 6, 21, 3, 'Extra spicy sauce');
INSERT INTO `keranjang_item` VALUES (9, 7, 33, 4, 'Fresh wasabi');
INSERT INTO `keranjang_item` VALUES (10, 7, 29, 1, 'Extra sambal');
INSERT INTO `keranjang_item` VALUES (11, 8, 37, 2, 'Less ice');
INSERT INTO `keranjang_item` VALUES (12, 8, 41, 1, 'In a cup');
INSERT INTO `keranjang_item` VALUES (13, 9, 35, 1, 'Extra nori');
INSERT INTO `keranjang_item` VALUES (14, 9, 39, 1, 'Extra mango');
INSERT INTO `keranjang_item` VALUES (15, 9, 43, 1, 'Whipped cream on top');

-- ----------------------------
-- Table structure for log_akses
-- ----------------------------
DROP TABLE IF EXISTS `log_akses`;
CREATE TABLE `log_akses`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `role_id` int NULL DEFAULT NULL,
  `datetime` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_akses
-- ----------------------------
INSERT INTO `log_akses` VALUES (1, 1, 1, '2025-06-14 08:00:00');
INSERT INTO `log_akses` VALUES (2, 2, 2, '2025-06-14 08:30:00');
INSERT INTO `log_akses` VALUES (3, 3, 3, '2025-06-14 09:00:00');
INSERT INTO `log_akses` VALUES (4, 4, 3, '2025-06-14 09:00:00');
INSERT INTO `log_akses` VALUES (5, 5, 4, '2025-06-14 10:00:00');
INSERT INTO `log_akses` VALUES (6, 6, 4, '2025-06-14 10:00:00');
INSERT INTO `log_akses` VALUES (7, 7, 5, '2025-06-14 10:30:00');
INSERT INTO `log_akses` VALUES (8, 8, NULL, '2025-06-14 12:00:00');
INSERT INTO `log_akses` VALUES (9, 9, NULL, '2025-06-14 13:00:00');
INSERT INTO `log_akses` VALUES (10, 10, NULL, '2025-06-14 13:30:00');

-- ----------------------------
-- Table structure for log_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `log_pembayaran`;
CREATE TABLE `log_pembayaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `datetime` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_pembayaran
-- ----------------------------
INSERT INTO `log_pembayaran` VALUES (1, 1, 3, '2025-06-14 12:30:00');
INSERT INTO `log_pembayaran` VALUES (2, 2, 3, '2025-06-14 12:35:00');
INSERT INTO `log_pembayaran` VALUES (3, 3, 4, '2025-06-14 13:15:00');
INSERT INTO `log_pembayaran` VALUES (4, 4, 4, '2025-06-14 13:20:00');
INSERT INTO `log_pembayaran` VALUES (5, 5, 3, '2025-06-14 14:00:00');
INSERT INTO `log_pembayaran` VALUES (6, 6, 4, '2025-06-14 14:30:00');
INSERT INTO `log_pembayaran` VALUES (7, 7, 4, '2025-06-14 14:35:00');
INSERT INTO `log_pembayaran` VALUES (8, 8, 3, '2025-06-14 15:00:00');
INSERT INTO `log_pembayaran` VALUES (9, 9, 4, '2025-06-14 15:30:00');
INSERT INTO `log_pembayaran` VALUES (10, 10, 3, '2025-06-14 16:00:00');

-- ----------------------------
-- Table structure for meja
-- ----------------------------
DROP TABLE IF EXISTS `meja`;
CREATE TABLE `meja`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `foodcourt_id` int NULL DEFAULT NULL,
  `nama_meja` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `foodcourt_id`(`foodcourt_id` ASC) USING BTREE,
  CONSTRAINT `meja_ibfk_1` FOREIGN KEY (`foodcourt_id`) REFERENCES `foodcourt` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of meja
-- ----------------------------
INSERT INTO `meja` VALUES (1, 1, 'Meja A1');
INSERT INTO `meja` VALUES (2, 1, 'Meja A2');
INSERT INTO `meja` VALUES (3, 1, 'Meja A3');
INSERT INTO `meja` VALUES (4, 1, 'Meja B1');
INSERT INTO `meja` VALUES (5, 1, 'Meja B2');
INSERT INTO `meja` VALUES (6, 2, 'Meja C1');
INSERT INTO `meja` VALUES (7, 2, 'Meja C2');
INSERT INTO `meja` VALUES (8, 2, 'Meja C3');
INSERT INTO `meja` VALUES (9, 3, 'Meja D1');
INSERT INTO `meja` VALUES (10, 3, 'Meja D2');

-- ----------------------------
-- Table structure for merchant
-- ----------------------------
DROP TABLE IF EXISTS `merchant`;
CREATE TABLE `merchant`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `foodcourt_id` int NULL DEFAULT NULL,
  `nama_merchant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `foodcourt_id`(`foodcourt_id` ASC) USING BTREE,
  CONSTRAINT `merchant_ibfk_1` FOREIGN KEY (`foodcourt_id`) REFERENCES `foodcourt` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of merchant
-- ----------------------------
INSERT INTO `merchant` VALUES (1, 1, 'Pizza Corner');
INSERT INTO `merchant` VALUES (2, 1, 'Burger Station');
INSERT INTO `merchant` VALUES (3, 1, 'Asian Noodles');
INSERT INTO `merchant` VALUES (4, 2, 'Coffee & Pastry');
INSERT INTO `merchant` VALUES (5, 2, 'Fried Chicken Express');
INSERT INTO `merchant` VALUES (6, 2, 'Healthy Salad Bar');
INSERT INTO `merchant` VALUES (7, 3, 'Indonesian Traditional');
INSERT INTO `merchant` VALUES (8, 3, 'Japanese Kitchen');
INSERT INTO `merchant` VALUES (9, 1, 'Juice Bar');
INSERT INTO `merchant` VALUES (10, 2, 'Ice Cream Paradise');

-- ----------------------------
-- Table structure for metode_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `metode_pembayaran`;
CREATE TABLE `metode_pembayaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `foodcourt_id` int NULL DEFAULT NULL,
  `metode_pembayaran` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `foodcourt_id`(`foodcourt_id` ASC) USING BTREE,
  CONSTRAINT `metode_pembayaran_ibfk_1` FOREIGN KEY (`foodcourt_id`) REFERENCES `foodcourt` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of metode_pembayaran
-- ----------------------------
INSERT INTO `metode_pembayaran` VALUES (1, 1, 'Cash');
INSERT INTO `metode_pembayaran` VALUES (2, 1, 'Debit Card');
INSERT INTO `metode_pembayaran` VALUES (3, 1, 'Credit Card');
INSERT INTO `metode_pembayaran` VALUES (4, 1, 'Qris');
INSERT INTO `metode_pembayaran` VALUES (5, 1, 'PayLater');
INSERT INTO `metode_pembayaran` VALUES (6, 2, 'Cash');
INSERT INTO `metode_pembayaran` VALUES (7, 2, 'Debit Card');
INSERT INTO `metode_pembayaran` VALUES (8, 2, 'Qris');
INSERT INTO `metode_pembayaran` VALUES (9, 3, 'Cash');
INSERT INTO `metode_pembayaran` VALUES (10, 3, 'Qris');
INSERT INTO `metode_pembayaran` VALUES (11, 2, 'Paylater');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `keranjang_id` int NOT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `keranjang_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for paylater_user
-- ----------------------------
DROP TABLE IF EXISTS `paylater_user`;
CREATE TABLE `paylater_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `ktp_user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `paylater_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of paylater_user
-- ----------------------------
INSERT INTO `paylater_user` VALUES (1, 8, '3171234567890001', '08111234567');
INSERT INTO `paylater_user` VALUES (2, 9, '3171234567890002', '08222345678');
INSERT INTO `paylater_user` VALUES (3, 11, '3171234567890003', '08444567890');
INSERT INTO `paylater_user` VALUES (4, 13, '3171234567890004', '08666789012');
INSERT INTO `paylater_user` VALUES (5, 15, '3171234567890005', '08888901234');

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `foodcourt_id` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `role_id` int NULL DEFAULT NULL,
  `merchant_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `foodcourt_id`(`foodcourt_id` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  INDEX `role_id`(`role_id` ASC) USING BTREE,
  CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`foodcourt_id`) REFERENCES `foodcourt` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES (1, 1, 1, 1, NULL);
INSERT INTO `pegawai` VALUES (2, 1, 2, 2, NULL);
INSERT INTO `pegawai` VALUES (3, 1, 3, 3, 1);
INSERT INTO `pegawai` VALUES (4, 2, 4, 3, 2);
INSERT INTO `pegawai` VALUES (5, 1, 5, 4, NULL);
INSERT INTO `pegawai` VALUES (6, 2, 6, 4, NULL);

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (1, 8);
INSERT INTO `pelanggan` VALUES (2, 9);
INSERT INTO `pelanggan` VALUES (3, 10);
INSERT INTO `pelanggan` VALUES (4, 11);
INSERT INTO `pelanggan` VALUES (5, 12);
INSERT INTO `pelanggan` VALUES (6, 13);
INSERT INTO `pelanggan` VALUES (7, 14);
INSERT INTO `pelanggan` VALUES (8, 15);

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `keranjang_id` int NULL DEFAULT NULL,
  `nominal_bayar` decimal(10, 2) NOT NULL,
  `tanggal_bayar` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_bayar` time NULL DEFAULT NULL,
  `metode_pembayaran_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `keranjang_id`(`keranjang_id` ASC) USING BTREE,
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjang` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES (1, 1, 90000.00, '2025-06-14 12:30:00', '12:30:00', 4);
INSERT INTO `pembayaran` VALUES (2, 2, 35000.00, '2025-06-14 12:35:00', '12:35:00', 4);
INSERT INTO `pembayaran` VALUES (3, 3, 25000.00, '2025-06-14 13:15:00', '13:15:00', 1);
INSERT INTO `pembayaran` VALUES (4, 4, 12000.00, '2025-06-14 13:20:00', '13:20:00', 1);
INSERT INTO `pembayaran` VALUES (5, 5, 40000.00, '2025-06-14 14:00:00', '14:00:00', 2);
INSERT INTO `pembayaran` VALUES (6, 6, 25000.00, '2025-06-14 14:30:00', '14:30:00', 2);
INSERT INTO `pembayaran` VALUES (7, 7, 24000.00, '2025-06-14 14:35:00', '14:35:00', 2);
INSERT INTO `pembayaran` VALUES (8, 8, 54000.00, '2025-06-14 15:00:00', '15:00:00', 1);
INSERT INTO `pembayaran` VALUES (9, 9, 140000.00, '2025-06-14 15:30:00', '15:30:00', 11);
INSERT INTO `pembayaran` VALUES (10, 10, 15000.00, '2025-06-14 16:00:00', '16:00:00', 8);
INSERT INTO `pembayaran` VALUES (11, 11, 24000.00, '2025-06-14 16:15:00', '16:15:00', 6);
INSERT INTO `pembayaran` VALUES (12, 12, 15000.00, '2025-06-14 12:40:00', '12:40:00', 4);
INSERT INTO `pembayaran` VALUES (13, 13, 32000.00, '2025-06-14 14:05:00', '14:05:00', 10);
INSERT INTO `pembayaran` VALUES (14, 14, 18000.00, '2025-06-14 14:40:00', '14:40:00', 10);
INSERT INTO `pembayaran` VALUES (15, 15, 22000.00, '2025-06-14 13:25:00', '13:25:00', 1);

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Admin');
INSERT INTO `role` VALUES (2, 'Kasir');
INSERT INTO `role` VALUES (3, 'Manager');
INSERT INTO `role` VALUES (4, 'Pelanggan');

-- ----------------------------
-- Table structure for system_log
-- ----------------------------
DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `request` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `datetime` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_log
-- ----------------------------
INSERT INTO `system_log` VALUES (1, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"login\", \"user_id\": 1}', '2025-06-14 08:00:00');
INSERT INTO `system_log` VALUES (2, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"create_order\", \"user_id\": 8}', '2025-06-14 12:30:00');
INSERT INTO `system_log` VALUES (3, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"payment_process\", \"payment_id\": 1}', '2025-06-14 12:30:00');
INSERT INTO `system_log` VALUES (4, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"create_order\", \"user_id\": 9}', '2025-06-14 13:15:00');
INSERT INTO `system_log` VALUES (5, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"payment_process\", \"payment_id\": 3}', '2025-06-14 13:15:00');
INSERT INTO `system_log` VALUES (6, '{\"status\": \"error\", \"code\": 400}', '{\"action\": \"invalid_login\", \"email\": \"wrong@email.com\"}', '2025-06-14 14:00:00');
INSERT INTO `system_log` VALUES (7, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"update_menu\", \"user_id\": 2}', '2025-06-14 15:00:00');
INSERT INTO `system_log` VALUES (8, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"generate_report\", \"user_id\": 1}', '2025-06-14 16:00:00');
INSERT INTO `system_log` VALUES (9, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"paylater_approval\", \"user_id\": 13}', '2025-06-14 15:30:00');
INSERT INTO `system_log` VALUES (10, '{\"status\": \"success\", \"code\": 200}', '{\"action\": \"logout\", \"user_id\": 1}', '2025-06-14 17:00:00');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `nohp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Admin Foodie', 'admin@foodie.com', '$2y$10$3ABQPMWTY1M6ypc/EQww/.hJzXxfv.a68TEKFrA6JWPATlq/PG0LO', 'Jl. Admin No. 1', '08111111111');
INSERT INTO `user` VALUES (2, 'Manager Foodcourt', 'manager@foodie.com', 'hashed_password_2', 'Jl. Manager No. 2', '08222222222');
INSERT INTO `user` VALUES (3, 'Kasir Satu', 'kasir1@foodie.com', 'hashed_password_3', 'Jl. Kasir No. 3', '08333333333');
INSERT INTO `user` VALUES (4, 'Kasir Dua', 'kasir2@foodie.com', 'hashed_password_4', 'Jl. Kasir No. 4', '08444444444');
INSERT INTO `user` VALUES (5, 'Chef Pizza', 'chef1@foodie.com', 'hashed_password_5', 'Jl. Chef No. 5', '08555555555');
INSERT INTO `user` VALUES (6, 'Chef Noodle', 'chef2@foodie.com', 'hashed_password_6', 'Jl. Chef No. 6', '08666666666');
INSERT INTO `user` VALUES (7, 'Pelayan Satu', 'pelayan1@foodie.com', 'hashed_password_7', 'Jl. Pelayan No. 7', '08777777777');
INSERT INTO `user` VALUES (8, 'Andi Setiawan', 'andi@gmail.com', 'hashed_password_8', 'Jl. Merdeka No. 10', '08111234567');
INSERT INTO `user` VALUES (9, 'Sari Dewi', 'sari.dewi@gmail.com', 'hashed_password_9', 'Jl. Sudirman No. 25', '08222345678');
INSERT INTO `user` VALUES (10, 'Budi Pratama', 'budi.pratama@yahoo.com', 'hashed_password_10', 'Jl. Thamrin No. 15', '08333456789');
INSERT INTO `user` VALUES (11, 'Nina Sari', 'nina.sari@gmail.com', 'hashed_password_11', 'Jl. Gatot Subroto No. 30', '08444567890');
INSERT INTO `user` VALUES (12, 'Rudi Hermawan', 'rudi.hermawan@hotmail.com', 'hashed_password_12', 'Jl. Kuningan No. 8', '08555678901');
INSERT INTO `user` VALUES (13, 'Lisa Anggraini', 'lisa.anggraini@gmail.com', 'hashed_password_13', 'Jl. Senayan No. 12', '08666789012');
INSERT INTO `user` VALUES (14, 'Ahmad Fauzi', 'ahmad.fauzi@gmail.com', 'hashed_password_14', 'Jl. Casablanca No. 5', '08777890123');
INSERT INTO `user` VALUES (15, 'Maya Putri', 'maya.putri@yahoo.com', 'hashed_password_15', 'Jl. Kemang No. 18', '08888901234');
INSERT INTO `user` VALUES (1001, 'Ahsandsasss', 'ahsan@upi.edu', '123', 'Kost Ahsan', '082211271828');

-- ----------------------------
-- Table structure for user_saldo
-- ----------------------------
DROP TABLE IF EXISTS `user_saldo`;
CREATE TABLE `user_saldo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `saldo` decimal(10, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `user_saldo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_saldo
-- ----------------------------
INSERT INTO `user_saldo` VALUES (1, 8, 150000.00);
INSERT INTO `user_saldo` VALUES (2, 9, 200000.00);
INSERT INTO `user_saldo` VALUES (3, 10, 75000.00);
INSERT INTO `user_saldo` VALUES (4, 11, 300000.00);
INSERT INTO `user_saldo` VALUES (5, 12, 120000.00);
INSERT INTO `user_saldo` VALUES (6, 13, 180000.00);
INSERT INTO `user_saldo` VALUES (7, 14, 90000.00);
INSERT INTO `user_saldo` VALUES (8, 15, 250000.00);

SET FOREIGN_KEY_CHECKS = 1;
