-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2018 at 02:13 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_esmat_shamsodin_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `name`, `lastname`) VALUES
(1, 'Samuel', 'Johnson'),
(2, 'Thomas', 'Paine'),
(3, 'Ruskin', 'Bond'),
(4, 'Malala', 'Yousafzai'),
(5, ' Denise ', 'Di Novi'),
(6, ' Stella ', 'Meghie'),
(7, 'James ', 'Foley'),
(8, ' Bruno', 'Mars'),
(10, 'Eminem', 'Eminem');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `author_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `name`, `author_id_fk`) VALUES
(1, 'The History of Rasselas, Prince of Abissinia ', 1),
(2, 'A Journey to the Western Islands of Scotland', 1),
(3, 'Common Sense', 2),
(4, 'The Age of Reason', 2),
(5, 'Unto This Last and Other Writings', 3),
(6, 'stones of vennis', 3);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `isbn_code` int(11) DEFAULT NULL,
  `statuss` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `author_id_fk` int(11) DEFAULT NULL,
  `publisher_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `name`, `type`, `publish_date`, `isbn_code`, `statuss`, `description`, `picture`, `author_id_fk`, `publisher_id_fk`) VALUES
(1, 'Lives of the poets', 'BOOKS', '1779-01-01', 123456, 'Exist!', 'Lives of the Most Eminent English Poets is a work by Samuel Johnson, comprising short biographies and critical appraisals of 52 poets,...', 'https://pictures.abebooks.com/isbn/9780380699964-us.jpg', 1, 1),
(2, 'The Rights of a man', 'BOOKS', '1979-01-08', 145698, 'Exist!', 'Rights of Man, a book by Thomas Paine, including 31 articles, posits that popular political revolution is permissible when,..', 'https://images-na.ssl-images-amazon.com/images/I/415XH19XWCL._SX295_BO1,204,203,200_.jpg', 2, 1),
(3, 'The blue umberlla', 'BOOKS', '1989-01-06', 789456, 'RESERVED', 'BLU Products, is an American consumer electronic company, founded in 2009, and headquartered in Miami, Florida. ', 'https://images.gr-assets.com/books/1444127685l/26874420.jpg', 3, 3),
(4, 'I am malala', 'BOOKS', '2015-01-01', 147852, 'RESERVED', 'A MEMOIR BY THE YOUNGEST RECIPIENT OF THE NOBEL PEACE PRIZE \"I come from a country that ,..', 'https://images-na.ssl-images-amazon.com/images/I/91jj%2BOWbC1L.jpg', 4, 4),
(5, 'Unforgettable', 'DVD', '2017-04-20', 15948, 'RESERVED', 'Barely coping with the end of her marriage, Tessa Connover learns that her ex-husband, David, is now happily engaged to Julia.', 'https://www.warnerbros.com/sites/default/files/styles/key_art_270x400/public/movies/media/browser/unforgettable_whv_keyart.jpg?itok=VJR0zKm5', 5, 2),
(6, 'Everything, Everything', 'DVD', '2017-05-19', 45612, 'Exist!', 'Maddy (Amandla Stenberg) is a smart, curious and imaginative 18-year-old who is unable to leave the protection of the,..', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjAzMTE1NzQxNF5BMl5BanBnXkFtZTgwNjcwODY3MTI@._V1_UY1200_CR90,0,630,1200_AL_.jpg', 6, 6),
(7, 'fifty shades darker', 'DVD', '2017-02-17', 79542, 'Exist!', 'When a wounded Christian Grey tries to entice a cautious Ana Steele back into his life, she demands a new arrangement before she will give him ,..', 'https://vignette.wikia.nocookie.net/fiftyshadesofgrey/images/4/4c/Fifty_Shades_Darker_-_Teaser_%28HD%29/revision/latest/scale-to-width-down/550?cb=20160912203708', 7, 7),
(8, '24K Magic', 'CD', '2016-01-01', 46547, 'RESERVED', 'Oh shit, I\'m a dangerous man with some money in my pocket (keep up) \r\nSo many pretty girls around me,..', 'https://s3.amazonaws.com/halleonard-coverimages/wl/00278107-wl.jpg', 8, 8),
(9, 'The Beautiful & Damned', 'CD', '2015-02-19', 78941, 'Exist!', 'jhxn jkdvn kdjvnjkf fdkj kvjf jkbjfdkc', 'https://literaryfictions.files.wordpress.com/2016/12/the-beautiful-and-damned-cover.jpg?w=400', 7, 7),
(10, 'Revival', 'CD', '2016-06-14', 78912, 'RESERV', 'hcds kcb dwk cdks kdjcdkjs kdjcbwkjd jc bkwdbjkcbjk.', 'https://austinmccann.files.wordpress.com/2011/12/revival.jpg', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `size_of_publish` int(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `name`, `size_of_publish`, `address`) VALUES
(1, 'Col-Ralph', 100, 'unknown'),
(2, 'GoodReads', 500, 'bhfjd  jsd jhkbijfn knkn vc.'),
(3, 'Marc S. Greenberg', 1000, 'mnbkdc iknfwkj'),
(4, 'Googlebook', 400, 'scnbsdk kjcn wdkjjk'),
(6, 'polp', 145, 'hjvjhbk bjhkjknujnuj'),
(7, 'mnkl', 150, 'cjksdnc jksld'),
(8, 'abcd', 70, 'd,mxc sm,mc'),
(9, 'Eminem: E, ', 456, 'dskjcbsjdkm'),
(10, 'Print Edition', 100, 'hjbc wdskj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'maryam', 'm@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(2, 'ali', 'b@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD KEY `author_id_fk` (`author_id_fk`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `author_id_fk` (`author_id_fk`),
  ADD KEY `publisher_id_fk` (`publisher_id_fk`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id_fk`) REFERENCES `author` (`author_id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`author_id_fk`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`publisher_id_fk`) REFERENCES `publisher` (`publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
