# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.9)
# Database: rapidphpme
# Generation Time: 2013-02-15 22:36:17 +0000
# ************************************************************

/* Customers Table */
DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(220) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;

INSERT INTO `customers` (`customer_id`, `name`)
VALUES
	(1,'John Smith'),
	(2,'Johannes Smith'),
	(3,'Joanna Smit'),
	(4,'Mark Smiths');

/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

/* products Table */
DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(220) DEFAULT NULL,
  `product_category` varchar(220) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `cost`)
VALUES
	(1, 'Green mouse', 'Personal computers', 5),
	(2, 'Blue cup', 'Kitchen essentials', 10),
	(3, 'Tea bags', 'Kitchen essentials', 8),
	(4, 'Smart phone', 'Mobile phones', 50);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

/* customer_products Table */
DROP TABLE IF EXISTS `customer_products`;

CREATE TABLE `customer_products` (
  `customer_id` int(11) unsigned NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `purchase_date` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `customer_products` WRITE;
/*!40000 ALTER TABLE `customer_products` DISABLE KEYS */;

INSERT INTO `customer_products` (`customer_id`, `product_id`, `purchase_date`)
VALUES
	(1, 1, '12-12-2016'),
	(1, 3, '13-12-2016'),
	(2, 4, '12-12-2016'),
	(4, 2, '14-12-2016');

/*!40000 ALTER TABLE `customer_products` ENABLE KEYS */;
UNLOCK TABLES;
