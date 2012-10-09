DROP TABLE IF EXISTS `#__jexpricelist`;
 
CREATE TABLE `#__jexpricelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordering` int(11) NOT NULL,
  `published` int(1) NOT NULL DEFAULT '0',
  `price_item` varchar(1024) NOT NULL,
  `price_1` dec(6,2) NOT NULL,
  `price_2` dec(6,2) NOT NULL,
  `price_3` dec(6,2) NOT NULL,
  `catid` int(11) NOT NULL DEFAULT '0',
  `params` varchar(1024) NOT NULL DEFAULT '',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__jexpricelist` (`price_item`,`ordering`,`published`,`price_1`,`price_2`,`price_3`) VALUES
	('Voorbeeld 1', 0, 0, 0.00, 0.00, 0.00),
	('Voorbeeld 2', 0, 0, 0.00, 0.00, 0.00);

DROP TABLE IF EXISTS `#__jexpricelist_valuta`;

CREATE TABLE `#__jexpricelist_valuta` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`active` int(1) NOT NULL DEFAULT '0',
	`name` varchar(15) NOT NULL,
	`html_char` varchar(8) NOT NULL,
	`decimal_char` varchar(1) NOT NULL,
	`m_char` varchar(1) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__jexpricelist_class`;

CREATE TABLE `#__jexpricelist_class` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`catid` int(11) NOT NULL DEFAULT '0',
	`title` varchar(150) NOT NULL DEFAULT 'Title',
	`text_1` varchar(100) NOT NULL DEFAULT '1',
	`text_2` varchar(100) NOT NULL DEFAULT '2',
	`text_3` varchar(100) NOT NULL DEFAULT '3',
	`params` varchar(1024) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


