-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 06:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'The rock ', 3),
(31, 'Entertainment', 2),
(32, 'Sports', 2),
(33, 'Cinema', 2),
(34, 'Events', 2),
(35, 'Education', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(59, 'PM pushpa kamal dahal', 'pushpa kamal dahal became the prime minister of nepal with 125 votes of house of representative (parliment) and after two days he gonna take a safad from the president of nepal bidhya devi vhandari at a tudi khel. along with him home minister and finance minister also is gonna take a safad.\r\nin this election the PM of nepal pushpa kamal dahal is senn as a revolutionary and agressive leader                ', '30', '18 Mar, 2023', 49, '1679154752-Pushpa_Kamal_Dahal_2016.jpg'),
(51, 'React JS', '                  React has been designed from the start for gradual adoption, and you can use as little or as much React as you need. Whether you want to get a taste of React, add some interactivity to a simple HTML page, or start a complex React-powered app, the links in this section will help you get started.\r\n\r\n                ', '34', '03 Jun, 2022', 49, 'pic235.png'),
(50, 'Suoer Man', 'this is the marvel cinematic universe which is fantastic', '33', '03 Jun, 2022', 50, 'maksym-tymchyk-bGOBoZorNoQ-unsplash.jpg'),
(49, 'This is the image of Lorem isuum 100', 'there are many types of people', '34', '03 Jun, 2022', 50, 'mariola-grobelska-gR9LJ1NKMzE-unsplash.jpg'),
(47, 'Chris Hamesworth ', 'he is top actor in hollywood cinema', '31', '03 Jun, 2022', 49, 'Chris-Hemsworth-Thor-Body-Workout.jpg'),
(48, 'KGF Chapter 2', 'this is the highest grossers movie in indian cinema 2022', '33', '03 Jun, 2022', 49, 'best-luxury-car-brand-bmw-luxe-digital@2x.jpg'),
(56, 'Avatar2', 'The screening rooms were closed. The festivals were virtual. The blockbusters were in storage. Even so, our critics found abundant and inspiring signs of cinematic life in the pandemic.The screening rooms were closed. The festivals were virtual. The blockbusters were in storage. Even so, our critics found abundant and inspiring signs of cinematic life in the pandemic.', '30', '03 Jun, 2022', 49, 'pic8.png'),
(53, 'Tallying the Costs, Shirts and All, of Missing the World Cup', 'Failure to qualify for Qatar has condemned Nigeria to a humbling summer instead of months of World Cup hype. Then there’s the fate of its famous jersey.Failure to qualify for Qatar has condemned Nigeria to a humbling summer instead of months of World Cup hype. Then there’s the fate of its famous jersey.', '32', '03 Jun, 2022', 49, 'Pilgrimage-exploring-Lord-Krishna-childhood.jpg'),
(54, 'Focus Turns to Harry and Meghan at Queen', 'Prince Harry and his wife, Meghan, are expected to attend a service on Friday to celebrate Queen Elizabeth II’s 70 year-reign. Follow updates.Prince Harry and his wife, Meghan, are expected to attend a service on Friday to celebrate Queen Elizabeth II’s 70 year-reign. Follow updates.', '31', '03 Jun, 2022', 49, 'jessica-da-rosa-pEbZuhENtjg-unsplash (1).jpg'),
(60, 'Trump says he expects to be arrested on Tuesday', 'Former US President Donald Trump says he is expecting to be arrested on Tuesday in a case about alleged hush money paid to an ex-porn star.\r\n\r\nMr Trump called on his supporters to protest against such a move in a post on his Truth Social platform.\r\n\r\nOne of Mr Trump\'s lawyers said his claim was based on media reports that he could be indicted next week.\r\n\r\nIf Mr Trump is indicted, it would be the first criminal case ever brought against a former US president.\r\n\r\nIt would also have serious ramifications for his campaign to become the Republican nominee for president in the 2024 presidential election.\r\n\r\nFor five years, prosecutors in New York have been investigating allegations that hush money was paid on Mr Trump\'s behalf to former porn star Stormy Daniels prior to the 2016 presidential election.\r\n\r\nMs Daniels says she was paid $130,000 (£107,000) by Mr Trump\'s former lawyer Michael Cohen before the 2016 election in exchange for silence about an alleged affair. Mr Trump denies they had sexual relations and has dismissed the case as being politically motivated.', '30', '18 Mar, 2023', 49, '1679154946-download (1).jpeg'),
(57, 'Facebook', '                  This is for only Entertainment purpose                ', '32', '04 Jun, 2022', 49, '1654334764-pic8.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(53, 'Akriti', 'Poudel', 'Akriti', '$2y$10$7OGtDhCBdYrAQl4Akb6H3OfTWARF7L5r0ug7Y3MM.yns0hqvKY82C', 0),
(51, 'kisshor', 'kc', 'kisshor', '$2y$10$CgOIVu8dyWKQLgwU04pxkeClplljVGJ2JvMBR0Db/tLV5eCfbwuuq', 0),
(54, 'kabindra', 'khanal', 'kabindra', '$2y$10$H1CdxldEz0I2hfZovQvdgO6w4FNyb4hbocF6TII5mP2JCpYulKxdS', 0),
(55, 'bipin', 'oli', 'bipin1', '$2y$10$x67IRd7JJ.jVg4v3qJClJOhejTdjGDKY8hYgFxSkjRJDSDK3GB7f2', 0),
(56, 'kiran', 'kc', 'kiran', '$2y$10$fX7P.BuKtSVd6Rp5AJm2beux3NlBeAyjHuUcLKuefq7STl2046HI6', 0),
(52, 'Naveen', 'khatri', 'hatta', '$2y$10$PH4fUKZ8lqirm4Yy3uvRhez7X6Xst2KNTuCFs77sv8iy8K6KHoqAW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
