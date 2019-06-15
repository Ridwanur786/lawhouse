-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 12:21 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_932339625_blog`
--
CREATE DATABASE IF NOT EXISTS `db_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment` varchar(63957) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `parent_id`, `comment`, `sender`, `date`) VALUES
(220, 219, 'tis is my last chance', 'ryan', '2019-01-13 11:30:31'),
(223, 222, 'dfsdshdhfh', 'hsdhdghdg', '2019-01-14 04:24:13'),
(232, 231, 'fghfgjgjjfgj', 'dsfgfg', '2019-01-14 09:35:36'),
(235, 234, 'this more awkward', 'phpridwan', '2019-01-15 07:25:08'),
(271, 0, 'dhsyhdfy', 'ryan', '2019-01-21 09:55:42'),
(272, 0, 'fhffghfghfg', 'green', '2019-01-21 09:55:49'),
(273, 271, 'fgjfjfgj', 'gfyjj', '2019-01-27 06:26:11'),
(274, 0, 'fdgjdfjdfj', 'khanphp', '2019-01-27 09:27:09'),
(275, 0, 'dfhdfshdfh', 'ryan', '2019-01-28 05:34:22'),
(276, 275, 'fdgdfghdfgh', 'hsdth', '2019-01-28 05:34:42'),
(277, 0, 'yjtyjgjfgj', 'ryan', '2019-01-28 07:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `contact_num` varchar(10000) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `image`) VALUES
(1, 'Law And Order', ''),
(2, 'Student Revaluation', ''),
(3, 'Rual Area Law', ''),
(4, 'Women\'s Enpowerment', ''),
(5, 'Traffic Law of Banglaesh', ''),
(6, 'Education Law', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, 0, '  hy', 'rid', '2018-12-31 02:00:27'),
(2, 0, 0, '  hy', 'rid', '2018-12-31 02:07:07'),
(3, 0, 0, '  ', '', '2018-12-31 02:12:06'),
(4, 0, 0, '  khan', 'rid', '2018-12-31 02:41:51'),
(5, 0, 0, '', '', '2018-12-31 02:43:51'),
(6, 0, 0, '  ', '', '2018-12-31 03:10:32'),
(7, 0, 0, '  ', '', '2018-12-31 03:18:32'),
(8, 0, 0, '  ', '', '2018-12-31 03:18:32'),
(9, 0, 0, '  ', '', '2018-12-31 04:05:49'),
(10, 0, 0, 'hello this is a comment system  ', 'green', '2018-12-31 04:06:08'),
(11, 0, 0, '  fgjhnfg', 'ghnm', '2018-12-31 04:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `text`) VALUES
(1, 'COPY RIGHT: LAWHOUSE.COM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `image`, `body`) VALUES
(6, 'About Me', '../upload/81d86384a7.png', 'This is me and my page is&lt;a name=&quot;law-house&quot;&gt;&lt;/a&gt;&lt;img id=&quot;462140500646652&quot; style=&quot;float: left; margin: 20px 10px; border: 2px solid black;&quot; title=&quot;image&quot; dir=&quot;ltr&quot; src=&quot;http://i66.tinypic.com/s6uav7.jpg&quot; alt=&quot;image mine&quot; width=&quot;304&quot; height=&quot;320&quot; /&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `body`, `img`, `tags`, `author`, `date`, `cat`, `userid`) VALUES
(1, 'Bangladesh Law House', 'Lorem ipsum dolor sit amet, his nobis constituto et. Eos illud justo tollit ea, an vix suavitate neglegentur. Qui cu modo utinam vulputate, est iusto legendos no, ex malorum nonumes honestatis est. Mel tractatos consequuntur ei. Mentitum suscipit his te, eu mundi comprehensam vis. Sea assueverit complectitur in, mei essent aliquid ei. Nec no platonem inciderint, ea mea falli paulo. No nemore everti noluisse sea, eius propriae perfecto has ei, soleat assueverit scribentur est te. Vocibus nostrum id per, natum nusquam sit at. Malorum omittantur ius cu. Est an doctus nominati. Cibo facer ius ad, cu diam dicam possit sea. Eos dictas eripuit in, usu movet clita interesset ei. No possit appareat disputationi qui, eu eripuit nostrum cum. Te tritani noluisse est, duo mutat maluisset et.<img style=\"float: left;\" title=\"Bangladesh Law House\" src=\"http://i66.tinypic.com/s6uav7.jpg\" alt=\"image mine\" width=\"304\" height=\"320\" />', '../upload/c72aff6342.jpg', 'Bangladesh, Law House', 'mubarak jamal', '2018-08-19 10:11:42', 1, 2),
(2, 'Law And Order Situation Of Bangladesh', 'Lorem ipsum dolor sit amet, his nobis constituto et. Eos illud justo tollit ea, an vix suavitate neglegentur. Qui cu modo utinam vulputate, est iusto legendos no, ex malorum nonumes honestatis est. Mel tractatos consequuntur ei. Mentitum suscipit his te, eu mundi comprehensam vis.Sea assueverit complectitur in, mei essent aliquid ei. Nec no platonem inciderint, ea mea falli paulo. No nemore everti noluisse sea, eius propriae perfecto has ei, soleat assueverit scribentur est te. Vocibus nostrum id per, natum nusquam sit at. Malorum omittantur ius cu.Est an doctus nominati. Cibo facer ius ad, cu diam dicam possit sea. Eos dictas eripuit in, usu movet clita interesset ei. No possit appareat disputationi qui, eu eripuit nostrum cum. Te tritani noluisse est, duo mutat maluisset et.', '../upload/ae451ffda0.jpg', 'Bangladesh, Law House', 'mubarak jamal', '2018-08-19 10:14:05', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `gplus` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `pin`, `gplus`, `ln`) VALUES
(1, 'http://facebook.com', 'http://twitter.com', 'http://pinterest.com', 'http://google.com', 'http://linkedin.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `details`, `role`, `name`) VALUES
(8, 'Admin', 'fcea920f7412b5da7be0cf42b8c93759', 'admin@gmail.com', 'this is admin of the project', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Law House of bangladesh', 'Justice is Blind', '../upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
