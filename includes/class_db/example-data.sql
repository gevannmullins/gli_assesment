CREATE TABLE `customers` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(220) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customers` (`customer_id`, `name`)
VALUES
	(1,'John Smith'),
	(2,'Johannes Smith'),
	(3,'Joanna Smit'),
	(4,'Mark Smiths');

CREATE TABLE `products` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(220) DEFAULT NULL,
  `product_category` varchar(220) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `cost`)
VALUES
	(1, 'Green mouse', 'Personal computers', 5),
	(2, 'Blue cup', 'Kitchen essentials', 10),
	(3, 'Tea bags', 'Kitchen essentials', 8),
	(4, 'Smart phone', 'Mobile phones', 50);

CREATE TABLE `customer_products` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `purchase_date` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customer_products` (`customer_id`, `product_id`, `purchase_date`)
VALUES
	(1, 1, '12-12-2016'),
	(1, 3, '13-12-2016'),
	(2, 4, '12-12-2016'),
	(4, 2, '14-12-2016');
