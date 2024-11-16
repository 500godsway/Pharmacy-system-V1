DROP TABLE admins;

CREATE TABLE `admins` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `is_ban` tinyint(1) NOT NULL COMMENT '0=not_ban, 1=ban',
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admins VALUES("9","Doe Jane","admin@gmail.com","$2y$10$m7dC5ld4.DH/UgkpNbW/6uLQDODLELHJ7JzTrpmE40S9DFvpRtJm6","070 000 000","0","0000-00-00");



DROP TABLE categories;

CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=visible, 1=hidden\r\n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO categories VALUES("5","Capsules","This are capsules drugs, take as prescribed","1");
INSERT INTO categories VALUES("6","Syrup","","1");
INSERT INTO categories VALUES("7","Tablet","","1");



DROP TABLE customers;

CREATE TABLE `customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `previousBalance` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO customers VALUES("2","Doe James","20240214","070 000 000","0700 111 111","teddy@gmail.com","0");
INSERT INTO customers VALUES("3","James  Murange","20240214","0700564879","0700 111 111","james@gmail.com","0");



DROP TABLE medicine_sales;

CREATE TABLE `medicine_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO medicine_sales VALUES("44","44","23","2","30");
INSERT INTO medicine_sales VALUES("45","45","23","2","30");
INSERT INTO medicine_sales VALUES("46","46","24","1","30");
INSERT INTO medicine_sales VALUES("47","47","23","2","30");
INSERT INTO medicine_sales VALUES("48","48","23","1","30");
INSERT INTO medicine_sales VALUES("49","49","24","1","30");
INSERT INTO medicine_sales VALUES("50","50","23","1","30");
INSERT INTO medicine_sales VALUES("51","51","24","1","30");
INSERT INTO medicine_sales VALUES("52","52","23","8","30");
INSERT INTO medicine_sales VALUES("53","53","23","1","30");
INSERT INTO medicine_sales VALUES("54","53","24","5","30");
INSERT INTO medicine_sales VALUES("55","54","23","2","30");
INSERT INTO medicine_sales VALUES("56","54","24","3","30");
INSERT INTO medicine_sales VALUES("57","55","23","1","30");
INSERT INTO medicine_sales VALUES("58","56","25","1","30");
INSERT INTO medicine_sales VALUES("59","57","27","1","60");
INSERT INTO medicine_sales VALUES("60","58","25","2","30");
INSERT INTO medicine_sales VALUES("61","59","23","1","30");
INSERT INTO medicine_sales VALUES("62","60","27","1","60");
INSERT INTO medicine_sales VALUES("63","61","24","4","30");
INSERT INTO medicine_sales VALUES("64","62","24","2","30");
INSERT INTO medicine_sales VALUES("65","63","23","1","30");



DROP TABLE products;

CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `supplierId` int(10) NOT NULL,
  `categoryId` int(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `bPrice` varchar(100) NOT NULL,
  `sPrice` varchar(100) NOT NULL,
  `is_ban` tinyint(4) NOT NULL COMMENT '0=visible 1=hidden',
  `qAlert` int(10) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `expiryDate` date NOT NULL,
  `createdAt` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO products VALUES("23","3","5","Panadol","This is the drug description.","20","30","0","0","416","images/uploads/1713264125.png","2024-02-06","2024-05-04 08:35:56.1251");
INSERT INTO products VALUES("24","3","5","Piliton","description","20","30","0","5","515","images/uploads/1713337576.png","2024-04-21","2024-05-04 09:42:37.3429");
INSERT INTO products VALUES("25","3","5","Haraka","","20","30","0","0","597","images/uploads/1714111562.png","2024-04-21","2024-04-27 13:27:46.4528");
INSERT INTO products VALUES("26","3","5","Mara Moja","","10","15","0","0","60","images/uploads/1714111645.png","2024-04-21","2024-05-03 09:52:06.5487");
INSERT INTO products VALUES("27","0","6","Tanzol","This is the drug description","50","60","0","0","","images/uploads/1714111787.png","2024-04-21","2024-05-04 13:02:13.7802");



DROP TABLE purchases;

CREATE TABLE `purchases` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mId` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` varchar(199) NOT NULL,
  `qAlert` int(10) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `buyingPrice` varchar(100) NOT NULL,
  `profit` varchar(200) NOT NULL,
  `sellingPrice` varchar(200) NOT NULL,
  `DOP` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO purchases VALUES("5","26","Mara Moja","599","5","Doe James","Tablet","50","5","55","2024-04-27");
INSERT INTO purchases VALUES("6","27","Tanzol","4","0","Tanzol","Tanzol","50","5","55","2024-04-27");



DROP TABLE requisitions;

CREATE TABLE `requisitions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mId` int(10) NOT NULL,
  `name` varchar(11) NOT NULL,
  `requestNo` varchar(200) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `status` int(10) NOT NULL COMMENT '0=pending 1=completed',
  `user` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO requisitions VALUES("41","26","Mara Moja","requestNo-7204","2","Pharmacy","0","Doe Jane","2024-05-03");
INSERT INTO requisitions VALUES("42","26","Mara Moja","requestNo-9035","1","Pharmacy","0","Doe Jane","2024-05-03");
INSERT INTO requisitions VALUES("43","27","Tanzol","requestNo-4840","2","Pharmacy","0","Doe Jane","2024-05-03");
INSERT INTO requisitions VALUES("44","26","Mara Moja","requestNo-8572","1","Pharmacy","0","Doe Jane","2024-05-03");
INSERT INTO requisitions VALUES("45","27","Tanzol","requestNo-1934","1","Pharmacy","0","Doe Jane","2024-05-03");
INSERT INTO requisitions VALUES("46","0","Mara Moja","requestNo-5538","4","","0","","2024-05-03");
INSERT INTO requisitions VALUES("47","26","Mara Moja","requestNo-3388","1","Pharmacy","0","Doe Jane","2024-05-03");
INSERT INTO requisitions VALUES("48","27","Tanzol","requestNo-1746","1","Pharmacy","0","Doe Jane","2024-05-03");
INSERT INTO requisitions VALUES("49","26","Mara Moja","requestNo-2917","1","Pharmacy","0","Doe Jane","2024-05-03");
INSERT INTO requisitions VALUES("50","27","Tanzol","requestNo-5745","1","Pharmacy","0","Doe Jane","2024-05-03");



DROP TABLE returns;

CREATE TABLE `returns` (
  `rId` int(10) NOT NULL AUTO_INCREMENT,
  `cId` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `returnDate` date NOT NULL,
  `total` varchar(200) NOT NULL,
  PRIMARY KEY (`rId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE sales;

CREATE TABLE `sales` (
  `sId` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `sales_status` varchar(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `pAmount` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `sales_data` date NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `tracking_no` varchar(100) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `order_placed_by_id` int(100) NOT NULL,
  PRIMARY KEY (`sId`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO sales VALUES("44","2","","60","","","2024-04-21","INV-6998","TrackNo-9459","Mpesa","9");
INSERT INTO sales VALUES("45","2","","60","","","2024-04-21","INV-4887","TrackNo-1111","Cash","9");
INSERT INTO sales VALUES("46","2","","30","","","2024-04-21","INV-6391","TrackNo-7366","Cash","9");
INSERT INTO sales VALUES("47","2","","60","","","2024-04-21","INV-8043","TrackNo-2654","Mpesa","9");
INSERT INTO sales VALUES("48","2","","30","","","2024-04-21","INV-5996","TrackNo-5282","Mpesa","9");
INSERT INTO sales VALUES("49","2","","30","","","2024-04-21","INV-4998","TrackNo-3016","Mpesa","9");
INSERT INTO sales VALUES("50","2","","30","","","2024-04-21","INV-3778","TrackNo-1287","Cash","9");
INSERT INTO sales VALUES("51","2","","30","","","2024-04-21","INV-2811","TrackNo-2831","Cash","9");
INSERT INTO sales VALUES("52","3","","240","","","2024-04-22","INV-3395","TrackNo-8917","Mpesa","9");
INSERT INTO sales VALUES("53","3","","180","","","2024-04-24","INV-4667","TrackNo-7350","Cash","9");
INSERT INTO sales VALUES("54","2","","150","","","2024-04-27","INV-9695","TrackNo-3441","Cash","9");
INSERT INTO sales VALUES("55","3","","30","","","2024-04-27","INV-3827","TrackNo-4792","Cash","9");
INSERT INTO sales VALUES("56","3","","30","","","2024-04-27","INV-9924","TrackNo-1480","Cash","9");
INSERT INTO sales VALUES("57","2","","60","","","2024-04-27","INV-3920","TrackNo-1349","Cash","9");
INSERT INTO sales VALUES("58","3","","60","","","2024-04-27","INV-1353","TrackNo-4868","Cash","9");
INSERT INTO sales VALUES("59","3","","30","","","2024-04-27","INV-8124","TrackNo-9596","Cash","9");
INSERT INTO sales VALUES("60","2","","60","","","2024-04-27","INV-6345","TrackNo-6270","Cash","9");
INSERT INTO sales VALUES("61","3","","120","","","2024-04-27","INV-1422","TrackNo-1907","Mpesa","9");
INSERT INTO sales VALUES("62","3","","60","30","20","2024-04-27","INV-1529","TrackNo-4063","Cash","9");
INSERT INTO sales VALUES("63","3","","30","30","0","2024-05-02","9688","TrackNo-7722","Mode of Payment","9");



DROP TABLE services;

CREATE TABLE `services` (
  `serviceId` int(10) NOT NULL AUTO_INCREMENT,
  `cId` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `DOS` date NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE stock;

CREATE TABLE `stock` (
  `stId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `count` varchar(100) NOT NULL,
  PRIMARY KEY (`stId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE suppliers;

CREATE TABLE `suppliers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `is_ban` tinyint(11) NOT NULL COMMENT '0=active 1=inactive',
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO suppliers VALUES("3","Doe James","070 000 000","Doe@gmail.com","1","2024-04-14");



DROP TABLE units;

CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO units VALUES("1","ml","Milliliters","1");



