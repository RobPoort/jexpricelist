DROP TABLE IF EXISTS `#__jexpricelist`;
 
CREATE TABLE `#__jexpricelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price_item` varchar(250) NOT NULL,
  `price` dec(6,2) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__jexpricelist` (`price_item`,`price`) VALUES
	('Testkip Uitvaarten', 0.00),
	('Testkip crematorium', 0.00);