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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO admins VALUES("9","Doe Jane","admin@gmail.com","$2y$10$m7dC5ld4.DH/UgkpNbW/6uLQDODLELHJ7JzTrpmE40S9DFvpRtJm6","070 000 000","0","0000-00-00");



DROP TABLE categories;

CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=visible, 1=hidden\r\n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO customers VALUES("2","Doe James","20240214","070 000 000","0700 111 111","teddy@gmail.com","0");
INSERT INTO customers VALUES("3","James  Murange","20240214","0700564879","0700 111 111","james@gmail.com","0");



DROP TABLE expenses;

CREATE TABLE `expenses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `medId` int(10) NOT NULL,
  `Qty` varchar(100) NOT NULL,
  `expenseType` varchar(199) NOT NULL,
  `price` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `adjNo` varchar(199) NOT NULL,
  `note` varchar(199) NOT NULL,
  `expenseDate` varchar(100) NOT NULL,
  `user_placed_by_id` int(10) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE medicine_sales;

CREATE TABLE `medicine_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

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



DROP TABLE minquantities;

CREATE TABLE `minquantities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pharBalance` int(100) NOT NULL,
  `totalSales` int(100) NOT NULL,
  `todayTSales` int(199) NOT NULL,
  `salesOrders` int(100) NOT NULL,
  `invoiceDue` int(100) NOT NULL,
  `profit` int(100) NOT NULL,
  `wastage` int(199) NOT NULL,
  `purchases` int(199) NOT NULL,
  `expired` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO minquantities VALUES("1","0","0","0","0","0","0","0","0","0");



DROP TABLE pharprofile;

CREATE TABLE `pharprofile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `initialCapital` varchar(199) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO pharprofile VALUES("1","Ultimate pharmacy","500000","0700 002 2","Skuta","pharmacy@gmail.com","images/uploads/1717944958.jpg","2024-06-09");



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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

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



DROP TABLE salesorders;

CREATE TABLE `salesorders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `orderId` int(100) NOT NULL,
  `orderNo` int(100) NOT NULL,
  `customerName` varchar(199) NOT NULL,
  `quanitity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `totalAmount` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `shippingStatus` varchar(10) NOT NULL,
  `medicineName` varchar(10) NOT NULL,
  `create_at` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO salesorders VALUES("1","1","2838","Sample 2","2","130","260","Paid","sample2@gmail.com","0700 002 2","Delivered","sample","0");



DROP TABLE services;

CREATE TABLE `services` (
  `serviceId` int(10) NOT NULL AUTO_INCREMENT,
  `cId` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `DOS` date NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE site_activity_log_automation_tbl;

CREATE TABLE `site_activity_log_automation_tbl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `url` varchar(199) NOT NULL,
  `action` text NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4;

INSERT INTO site_activity_log_automation_tbl VALUES("1","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("2","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("3","9","::1","http://localhost/ultimatePharmacy/src/authenticate/login_code.php","Logged In admin@gmail.com","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("4","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("5","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("6","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("7","9","::1","http://localhost/ultimatePharmacy/src/authenticate/login_code.php","Logged In admin@gmail.com","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("8","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("9","9","::1","http://localhost/ultimatePharmacy/src/authenticate/login_code.php","Logged In admin@gmail.com","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("10","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("11","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("12","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("13","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("14","9","::1","http://localhost/ultimatePharmacy/src/pages/customers/customers.php","accessed the Customers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("15","9","::1","http://localhost/ultimatePharmacy/src/pages/customers/customers.php","accessed the Customers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("16","9","::1","http://localhost/ultimatePharmacy/src/pages/customers/customers.php","accessed the Customers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("17","9","::1","http://localhost/ultimatePharmacy/src/pages/suppliers/suppliers.php","accessed the Suppliers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("18","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("19","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("20","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Category sample category name","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("21","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("22","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("23","9","::1","http://localhost/ultimatePharmacy/src/pages/medicineSize/medicineSize.php","accessed the Medicine Size page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("24","9","::1","http://localhost/ultimatePharmacy/src/pages/medicineSize/medicineSize.php","accessed the Medicine Size page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("25","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Unit syrup 100ml","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("26","9","::1","http://localhost/ultimatePharmacy/src/pages/medicineSize/medicineSize.php","accessed the Medicine Size page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("27","9","::1","http://localhost/ultimatePharmacy/src/pages/suppliers/suppliers.php","accessed the Suppliers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("28","9","::1","http://localhost/ultimatePharmacy/src/pages/suppliers/addSuppliers.php","accessed the Add Supplier page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("29","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Product sample supplier","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("30","9","::1","http://localhost/ultimatePharmacy/src/pages/suppliers/suppliers.php","accessed the Suppliers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("31","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Product sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("32","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Product sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("33","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Product sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("34","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Product sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("35","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("36","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("37","0","::1","http://localhost/ultimatePharmacy/src/authenticate/login_code.php","Logged In admin@gmail.com","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("38","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("39","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("40","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("41","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("42","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("43","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("44","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("45","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("46","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("47","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("48","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("49","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("50","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("51","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("52","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("53","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("54","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("55","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("56","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("57","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("58","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("59","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("60","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("61","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("62","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("63","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Business information Ultimate pharmacy","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("64","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Minimum Quantities ","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("65","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("66","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("67","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("68","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("69","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("70","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("71","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("72","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("73","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("74","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("75","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("76","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("77","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("78","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("79","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("80","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("81","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("82","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("83","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("84","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("85","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("86","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("87","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("88","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("89","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("90","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("91","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("92","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("93","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("94","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("95","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("96","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("97","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("98","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("99","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("100","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("101","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("102","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("103","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("104","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("105","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("106","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("107","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("108","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("109","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("110","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("111","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("112","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("113","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added a Purchase of sample","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("114","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("115","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("116","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("117","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("118","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Customer sample customer","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("119","9","::1","http://localhost/ultimatePharmacy/src/pages/customers/customers.php","accessed the Customers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("120","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Customer sample customer","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("121","9","::1","http://localhost/ultimatePharmacy/src/pages/customers/customers.php","accessed the Customers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("122","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("123","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Added Customer sample customer","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("124","9","::1","http://localhost/ultimatePharmacy/src/pages/customers/customers.php","accessed the Customers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("125","9","::1","http://localhost/ultimatePharmacy/src/pages/customers/customers.php","accessed the Customers page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("126","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("127","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("128","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("129","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("130","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("131","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("132","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("133","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("134","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("135","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("136","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("137","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("138","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/posInvoice.php","accessed the POS page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("139","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("140","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("141","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales_view.php?track=TrackNo-3351","accessed the Sales page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("142","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales_view.php?track=TrackNo-3351","accessed the Sales page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("143","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("144","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrder.php","accessed the Sales Orders page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("145","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrder.php","accessed the Sales Orders page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("146","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/orders-summery.php","accessed the Oders Summery page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("147","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("148","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("149","9","::1","http://localhost/ultimatePharmacy/src/pages/admins/code.php","Edited Sales Orders ","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("150","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php?id=2838","accessed the Sales Orders page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("151","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php?id=2838","accessed the Sales Orders page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("152","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("153","9","::1","http://localhost/ultimatePharmacy/src/pages/stock/stock.php","accessed the Stock page","2024-06-09");
INSERT INTO site_activity_log_automation_tbl VALUES("154","0","::1","http://localhost/ultimatePharmacy/src/pages/stock/stock.php","accessed the Stock page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("155","0","127.0.0.1","http://localhost/ultimatePharmacy/src/pages/stock/stock.php","accessed the Stock page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("156","0","::1","http://localhost/ultimatePharmacy/src/authenticate/login_code.php","Logged In admin@gmail.com","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("157","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("158","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("159","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("160","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("161","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("162","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("163","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("164","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("165","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("166","9","::1","http://localhost/ultimatePharmacy/src/pages/main/index.php","accessed the home page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("167","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("168","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("169","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("170","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("171","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("172","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("173","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("174","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php?start_date=2024-06-12&end_date=2024-06-12&payment_status=","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("175","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php?start_date=2024-06-12&end_date=2024-06-12&payment_status=Cash","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("176","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php?start_date=2024-06-05&end_date=2024-06-12&payment_status=Cash","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("177","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php?start_date=2024-06-05&end_date=2024-06-12&payment_status=Mpesa","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("178","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php?start_date=2024-06-05&end_date=2024-06-12&payment_status=","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("179","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("180","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("181","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("182","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("183","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("184","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("185","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("186","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("187","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("188","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales_view.php?track=TrackNo-3351","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("189","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("190","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("191","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/sales.php","accessed the Sales page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("192","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("193","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("194","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("195","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("196","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("197","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("198","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("199","9","::1","http://localhost/ultimatePharmacy/src/pages/sales/salesOrdersList.php","accessed the Sales Orders page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("200","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("201","9","::1","http://localhost/ultimatePharmacy/src/pages/purchases/purchases.php","accessed the Purchases page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("202","9","::1","http://localhost/ultimatePharmacy/src/pages/stock/stock.php","accessed the Stock page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("203","9","::1","http://localhost/ultimatePharmacy/src/pages/stock/stock.php","accessed the Stock page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("204","9","::1","http://localhost/ultimatePharmacy/src/pages/stock/stock.php","accessed the Stock page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("205","9","::1","http://localhost/ultimatePharmacy/src/pages/stock/stock.php","accessed the Stock page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("206","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("207","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("208","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("209","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("210","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("211","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("212","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("213","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("214","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("215","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("216","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("217","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("218","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("219","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("220","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("221","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("222","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("223","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("224","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("225","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("226","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("227","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("228","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("229","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("230","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("231","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("232","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("233","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("234","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("235","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("236","9","::1","http://localhost/ultimatePharmacy/src/pages/expenses/expenses.php","accessed the Expenses page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("237","9","::1","http://localhost/ultimatePharmacy/src/pages/medicineSize/medicineSize.php","accessed the Medicine Size page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("238","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("239","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("240","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("241","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("242","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-11");
INSERT INTO site_activity_log_automation_tbl VALUES("243","9","::1","http://localhost/ultimatePharmacy/src/pages/categories/categories.php","accessed the Categories page","2024-06-11");



DROP TABLE stock;

CREATE TABLE `stock` (
  `stId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `count` varchar(100) NOT NULL,
  PRIMARY KEY (`stId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE suppliers;

CREATE TABLE `suppliers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `is_ban` tinyint(11) NOT NULL COMMENT '0=active 1=inactive',
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO suppliers VALUES("3","Doe James","070 000 000","Doe@gmail.com","1","2024-04-14");



DROP TABLE units;

CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO units VALUES("1","ml","Milliliters","1");



DROP TABLE users;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(199) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `role` varchar(100) NOT NULL,
  `is_ban` tinyint(10) NOT NULL COMMENT '0=not_ban 1=banned\r\n',
  `image` varchar(199) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("9","Doe Jane","admin@gmail.com","$2y$10$W.HVXItj9mdbQMrjop/NMurWTn7IEzm.nTo9Ca2lgZ20.v14g9HTu","070 000 00","administrator","0","images/uploads/1716548439.png","0000-00-00");
INSERT INTO users VALUES("10","user","user@gmail.com","$2y$10$DWVKkgO2zYIqIjDVbaGCm.PkDDx.6l81N87D0FvphYEI.v1ZALHbe","070","standard","0","images/uploads/1717508954.png","2024-05-11");
INSERT INTO users VALUES("11","admin","admini@gmail.com","$2y$10$Qve66NuI/WaIZ8lQsNkmE.JOHp2KfggcMRPP988/dUnACvGXjeepG","070 000 00","administrator","0","","2024-05-13");



