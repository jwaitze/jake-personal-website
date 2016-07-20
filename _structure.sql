SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `blogposts` (
  `author` varchar(244) NOT NULL,
  `title` varchar(244) NOT NULL,
  `urlkey` varchar(255) NOT NULL,
  `content` TEXT NOT NULL,
  UNIQUE KEY `urlkey` (`urlkey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'jake', 'e9adadc0df5800f38905a89cbcece70e7cbfd2148f60318d0a890ad35fcdff559be926538b24cc40bd5d3fa6383024c20a2fb09c7936794cc93742ecb40b2c5f');
