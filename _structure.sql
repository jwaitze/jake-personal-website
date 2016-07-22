-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2016 at 11:57 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personalsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogposts`
--

CREATE TABLE `blogposts` (
  `author` varchar(244) NOT NULL,
  `title` varchar(244) NOT NULL,
  `urlkey` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time_added` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`author`, `title`, `urlkey`, `content`, `time_added`) VALUES
('jake', '1 2 3 Test Post One', '2016-07-20_1-2-3-Test-Post-One', '<p>This is a test.</p>\r\n<p><a href="#">testing one two three</a></p>', 1469181330),
('jake', 'a b c Testing testing...', '2016-07-20_a-b-c-Testing-testing...', '<p>Just making a few posts for the pagination to take effect. Blah blah lorem ipsum.', 1469181394),
('jake', 'Alpha Beta Gamma', '2016-07-20_Alpha-Beta-Gamma', '<p>alpha beta gamma delta epsilon zeta eta theta iota kappa lambda mu nu xi omicron pi rho sigma tau upsilon phi chi psi omega</p>', 1469181417),
('jake', 'Hello, World. My First Blog Post', '2016-07-20_Hello,-World.-My-First-Blog-Post', '<p>Hi,</p>\r\n<p>This is my first live post on the blog I am hosting on my personal website. I think I will normally have technical kinds of posts on this site. In my first few posts on this site, I\'ll probably walk through the things I have publicly available before moving on to other stuff.</p>\r\n<p>I\'m going to try and make quality content and update this blog with stuff regularly. An archive section will be implemented for it soon, maybe a search and tags, too, so it will be easy to navigate in the future when there are more posts.</p>\r\n<p>My next write will go in depth about the building of this website. I will be keeping this website open source. (<a href="https://github.com/jwaitze/Personal-Website" target="_blank">GitHub.com/jwaitze/Personal-Website</a>)</p>\r\n<p>See you in the next one hopefully with more in it,</p>\r\n<p>Jake</p>\r\n', 1469181418);


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `admin` tinyint(1) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`admin`, `username`, `password`) VALUES
(1, 'jake', 'e9adadc0df5800f38905a89cbcece70e7cbfd2148f60318d0a890ad35fcdff559be926538b24cc40bd5d3fa6383024c20a2fb09c7936794cc93742ecb40b2c5f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD UNIQUE KEY `urlkey` (`urlkey`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
