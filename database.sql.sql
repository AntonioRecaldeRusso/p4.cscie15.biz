-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2013 at 02:53 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csciebiz_p4_cscie15_biz`
--
CREATE DATABASE IF NOT EXISTS `csciebiz_p4_cscie15_biz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `csciebiz_p4_cscie15_biz`;

-- --------------------------------------------------------

--
-- Table structure for table `trees_users`
--

CREATE TABLE IF NOT EXISTS `trees_users` (
  `trees_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `tree_name` varchar(16) NOT NULL,
  PRIMARY KEY (`trees_users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `trees_users`
--

INSERT INTO `trees_users` (`trees_users_id`, `title`, `username`, `tree_name`) VALUES
(1, 'You dropped food on the floor, do you eat it?', 'JeanAlesi', 'test'),
(2, 'Are you ready to have child #3?', 'JeanAlesi', 'children'),
(3, 'Testing this app', 'JeanAlesi', 'test2'),
(11, 'Should I get the new [enter gadget here]', 'JeanAlesi', 'gadget');

-- --------------------------------------------------------

--
-- Table structure for table `tree_posts`
--

CREATE TABLE IF NOT EXISTS `tree_posts` (
  `tree_posts_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `tree_name` varchar(16) NOT NULL,
  `content` varchar(255) NOT NULL,
  `binary_key` int(11) NOT NULL,
  `link` int(11) DEFAULT NULL,
  PRIMARY KEY (`tree_posts_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `tree_posts`
--

INSERT INTO `tree_posts` (`tree_posts_id`, `username`, `tree_name`, `content`, `binary_key`, `link`) VALUES
(2, 'JeanAlesi', 'test', 'Did anyone see you?', 1, NULL),
(3, 'JeanAlesi', 'test', 'Was it sticky?', 10, NULL),
(4, 'JeanAlesi', 'test', 'Was it a boss/lover/parent?', 11, NULL),
(5, 'JeanAlesi', 'test', 'Is it an Emausaurus?', 100, NULL),
(6, 'JeanAlesi', 'test', 'Is is a raw steak?', 101, NULL),
(7, 'JeanAlesi', 'test', 'EAT IT!', 110, NULL),
(8, 'JeanAlesi', 'test', 'Was it expensive?', 111, NULL),
(9, 'JeanAlesi', 'test', 'Did the cat lick it?', 1000, NULL),
(10, 'JeanAlesi', 'test', 'Are you a Megalosaurus?', 1001, NULL),
(11, 'JeanAlesi', 'test', 'Did the cat lick it?', 1010, NULL),
(12, 'JeanAlesi', 'test', 'Are you a Puma?', 1011, NULL),
(13, 'JeanAlesi', 'test', 'Is it bacon?', 1110, NULL),
(14, 'JeanAlesi', 'test', 'Can you cut off the part that touched the floor?', 1111, NULL),
(15, 'JeanAlesi', 'test', 'EAT IT', 10000, NULL),
(16, 'JeanAlesi', 'test', 'Is your cat healthy?', 10001, NULL),
(17, 'JeanAlesi', 'test', 'DON''T EAT IT!', 10010, NULL),
(18, 'JeanAlesi', 'test', 'EAT IT!', 10011, NULL),
(19, 'JeanAlesi', 'test', 'EAT IT!', 10100, NULL),
(20, 'JeanAlesi', 'test', 'Is your cat healthy?', 10101, NULL),
(21, 'JeanAlesi', 'test', 'DON''T EAT IT!', 10110, NULL),
(22, 'JeanAlesi', 'test', 'EAT IT!', 10111, NULL),
(23, 'JeanAlesi', 'test', 'DON''T EAT IT!', 11100, NULL),
(24, 'JeanAlesi', 'test', 'EAT IT!', 11101, NULL),
(25, 'JeanAlesi', 'test', 'YOUR CALL!', 11110, NULL),
(26, 'JeanAlesi', 'test', 'YOUR CALL!', 100010, NULL),
(27, 'JeanAlesi', 'test', 'EAT IT!', 100011, NULL),
(28, 'JeanAlesi', 'test', 'YOUR CALL!', 101010, NULL),
(29, 'JeanAlesi', 'test', 'EAT IT!', 101011, NULL),
(104, 'JeanAlesi', 'children', 'Do you wish you were more tired?', 1, NULL),
(105, 'JeanAlesi', 'children', 'Do lots of space in your house?', 10, NULL),
(106, 'JeanAlesi', 'children', 'Do you like the look of three-row minivans?', 11, NULL),
(107, 'JeanAlesi', 'children', 'YOU MIGHT NOT BE READY YET!', 100, NULL),
(108, 'JeanAlesi', 'children', '', 101, 11),
(109, 'JeanAlesi', 'children', 'YOU MIGHT NOT BE READY YET!', 110, NULL),
(110, 'JeanAlesi', 'children', 'Do you really like cleaning?', 111, NULL),
(111, 'JeanAlesi', 'children', 'Are you other kids going to help?', 1110, NULL),
(112, 'JeanAlesi', 'children', 'YES, YOU HAVE WHAT IT TAKES', 1111, NULL),
(113, 'JeanAlesi', 'children', 'YOU MIGHT NOT BE READY YET', 10000, NULL),
(114, 'JeanAlesi', 'children', 'STILL, YOU MIGHT NOT BE READY YET!', 10001, NULL),
(115, 'JeanAlesi', 'children', 'YES, YOU ARE READY!', 11101, NULL),
(116, 'JeanAlesi', 'children', 'SORRY, YOU MIGHT NOT BE READY YET!', 11100, NULL),
(117, 'JeanAlesi', 'test', 'EAT IT!', 11111, NULL),
(118, 'JeanAlesi', 'test2', 'Can you see this?', 1, NULL),
(119, 'JeanAlesi', 'test2', 'OOPS!', 10, NULL),
(120, 'JeanAlesi', 'test2', 'IT WORKS!', 11, NULL),
(123, 'JeanAlesi', 'test', 'asdf', 1, NULL),
(124, 'JeanAlesi', 'test', 'asdfadsf', 10, NULL),
(125, 'JeanAlesi', 'test', 'sadfasd', 11, NULL),
(126, 'JeanAlesi', 'gadget', 'Do I really need it?', 1, NULL),
(127, 'JeanAlesi', 'gadget', 'No.. don\\''t get it!', 10, NULL),
(128, 'JeanAlesi', 'gadget', 'If you need it that badly, get it.', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `token`, `last_login`) VALUES
(1, 'JeanAlesi', '70138e7dc226af4cb81161a5b09f551a5f525732', 'a56f17447bce799283bd8b8a473311977d9a4840', 1387419246),
(3, 'test', '70138e7dc226af4cb81161a5b09f551a5f525732', '164eb85814786117ef410f4c10fc5ebf17fba85f', 1387706309),
(4, 'test2', '70138e7dc226af4cb81161a5b09f551a5f525732', '3b6199e5150852985d1afe530edec0ffe4dbaa53', 1387706376),
(5, 'test3', '70138e7dc226af4cb81161a5b09f551a5f525732', 'b7a33eb7aaf6ddead18d3fb998861d728c2d7ff0', 1387706675),
(6, 'test5', '70138e7dc226af4cb81161a5b09f551a5f525732', '84a82d25b8057ff4ed5d6c56ccae11d3a1351383', 1387707031),
(8, 'test4', '70138e7dc226af4cb81161a5b09f551a5f525732', '91a715bcd61e17744ad28ffeb63cb4b895cde12c', 1387708956),
(10, 'test7', '70138e7dc226af4cb81161a5b09f551a5f525732', 'e7f202fe301bd694fc8ebf6047fe6883c7866bf0', 1387709199),
(11, 'test8', '70138e7dc226af4cb81161a5b09f551a5f525732', '727227e4a8e41aeb049b582fb4c0fe430dea9a16', 1387709309),
(12, 'test9', '70138e7dc226af4cb81161a5b09f551a5f525732', 'abf0480243ff94fc8d3d8e4f5037d57ed50d69eb', 1387709862);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
