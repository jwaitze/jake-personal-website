-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2016 at 12:05 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_personalsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogposts`
--

CREATE TABLE `blogposts` (
  `title` varchar(244) NOT NULL,
  `urlkey` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`title`, `urlkey`, `content`) VALUES
('Hello, World. My First Personal-Website Blog Post', '2016-07-18_Hello,-World.-My-First-Personal-Website-Blog-Post', '        <div class="blogpost">\r\n                <a href="../blog/index.php?post=2016-07-18_Hello%2C-World.-My-First-Personal-Website-Blog-Post"><h2 id="inlineElement">Hello, World. My First Personal-Website Blog Post</h2></a>\r\n                <p>Posted: 2016-07-18</p>\r\n<p>Hi,</p>\r\n<p>This is my first live post on the blog I am hosting on my personal website. I think I will normally have technical kinds of posts on this site. In my first few posts on this site, I\'ll probably walk through the things I have publicly available before moving on to other stuff.</p>\r\n<p>I\'m going to try and make quality content and update this blog with stuff regularly. An archive section will be implemented for it soon, maybe a search and tags, too, so it will be easy to navigate in the future when there are more posts.</p>\r\n<p>My next write will go in depth about the building of this website. I will be keeping this website open source. (<a href="https://github.com/jwaitze/Personal-Website" target="_blank">GitHub.com/jwaitze/Personal-Website</a>)</p>\r\n<p>See you in the next one hopefully with more in it,</p>\r\n<p>Jake</p>\r\n        </div>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
