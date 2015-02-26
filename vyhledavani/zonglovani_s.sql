SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `search_categories`;
CREATE TABLE IF NOT EXISTS `search_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text,
  `parent_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `search_domains`;
CREATE TABLE IF NOT EXISTS `search_domains` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`domain_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `search_domains` (`domain_id`, `domain`) VALUES
(1, 'zongl.info');

DROP TABLE IF EXISTS `search_keywords`;
CREATE TABLE IF NOT EXISTS `search_keywords` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(30) NOT NULL,
  PRIMARY KEY (`keyword_id`),
  UNIQUE KEY `kw` (`keyword`),
  KEY `keyword` (`keyword`(10))
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `search_links`;
CREATE TABLE IF NOT EXISTS `search_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fulltxt` mediumtext,
  `indexdate` date DEFAULT NULL,
  `size` float DEFAULT NULL,
  `md5sum` varchar(32) DEFAULT NULL,
  `visible` int(11) DEFAULT '0',
  `level` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `url` (`url`),
  KEY `md5key` (`md5sum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `search_link_keyword0`;
CREATE TABLE IF NOT EXISTS `search_link_keyword0` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword1`;
CREATE TABLE IF NOT EXISTS `search_link_keyword1` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword2`;
CREATE TABLE IF NOT EXISTS `search_link_keyword2` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword3`;
CREATE TABLE IF NOT EXISTS `search_link_keyword3` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword4`;
CREATE TABLE IF NOT EXISTS `search_link_keyword4` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword5`;
CREATE TABLE IF NOT EXISTS `search_link_keyword5` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword6`;
CREATE TABLE IF NOT EXISTS `search_link_keyword6` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword7`;
CREATE TABLE IF NOT EXISTS `search_link_keyword7` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword8`;
CREATE TABLE IF NOT EXISTS `search_link_keyword8` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyword9`;
CREATE TABLE IF NOT EXISTS `search_link_keyword9` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyworda`;
CREATE TABLE IF NOT EXISTS `search_link_keyworda` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keywordb`;
CREATE TABLE IF NOT EXISTS `search_link_keywordb` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keywordc`;
CREATE TABLE IF NOT EXISTS `search_link_keywordc` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keywordd`;
CREATE TABLE IF NOT EXISTS `search_link_keywordd` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keyworde`;
CREATE TABLE IF NOT EXISTS `search_link_keyworde` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_link_keywordf`;
CREATE TABLE IF NOT EXISTS `search_link_keywordf` (
  `link_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `weight` int(3) DEFAULT NULL,
  `domain` int(4) DEFAULT NULL,
  KEY `linkid` (`link_id`),
  KEY `keyid` (`keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_pending`;
CREATE TABLE IF NOT EXISTS `search_pending` (
  `site_id` int(11) DEFAULT NULL,
  `temp_id` varchar(32) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_query_log`;
CREATE TABLE IF NOT EXISTS `search_query_log` (
  `query` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `elapsed` float DEFAULT NULL,
  `results` int(11) DEFAULT NULL,
  KEY `query_key` (`query`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_sites`;
CREATE TABLE IF NOT EXISTS `search_sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_desc` text,
  `indexdate` date DEFAULT NULL,
  `spider_depth` int(11) DEFAULT '2',
  `required` text,
  `disallowed` text,
  `can_leave_domain` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `search_sites` (`site_id`, `url`, `title`, `short_desc`, `indexdate`, `spider_depth`, `required`, `disallowed`, `can_leave_domain`) VALUES
(1, 'https://zongl.info/', 'slabikar', 'zongleruv slabikar', '2015-02-26', -1, '', 'prihlaseni.php?next=\n*/obrazky.*html/\n*/horoskop.*html/', 0);

DROP TABLE IF EXISTS `search_site_category`;
CREATE TABLE IF NOT EXISTS `search_site_category` (
  `site_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `search_temp`;
CREATE TABLE IF NOT EXISTS `search_temp` (
  `link` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `id` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
