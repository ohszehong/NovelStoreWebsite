-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2018 at 07:47 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `officialdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `User_ID` int(255) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `User_Role` int(1) NOT NULL DEFAULT '1',
  `User_image` varchar(255) DEFAULT 'images/NoPhoto.png',
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`User_ID`, `Username`, `First_Name`, `Last_Name`, `Password`, `Email`, `DOB`, `Gender`, `User_Role`, `User_image`) VALUES
(9, 'sadsad', 'gege', 'gege', 'b447c27a00e3a348881b0030177000cd', 'gege@gege', '2000-02-08', 'Male', 1, NULL),
(10, 'sadsad123', 'Mickey', 'Mouse', 'b37d240161609fd56237f8f109666cef', 'gege@gege123', '2000-02-08', 'Male', 0, 'images/Skadi meme.jpg'),
(11, 'qweqweqwe', 'qweqweqwe', 'qweqwe', 'b26986ceee60f744534aaab928cc12df', 'qweWqwwW@qwe', '2018-11-06', 'Female', 1, NULL),
(12, 'asdasdasd', 'asdasd', 'asdasd', 'a3dcb4d229de6fde0db5686dee47145d', 'asd@asdasd', '1998-06-24', 'Male', 1, NULL),
(13, 'asdasdasd123', 'asdasd', 'asdasd', 'cfc092a9a1e05926ef36482624fac88f', 'asd@asdasd23', '1998-06-24', 'Male', 1, NULL),
(14, 'asdasdasd12323', 'asdasd', 'asdasd', '5276faf57614f5567b601edd2e6df3ca', 'asd@asdasd2323', '1998-06-24', 'Male', 1, NULL),
(15, 'asdasdasd1232323', 'asdasd23', 'asdasd', '2467d3744600858cc9026d5ac6005305', 'asd@asdasd232323', '1998-06-24', 'Male', 1, NULL),
(16, '123123', '123123', '123123', '4297f44b13955235245b2497399d7a93', '123123@123123', '2018-11-22', 'Male', 1, NULL),
(17, '123124124', '12124', '124124', 'ff49cc40a8890e6a60f40ff3026d2730', 'sad@1234', '2018-11-17', 'Male', 1, NULL),
(18, 'sadsadsad', 'sadsadsad', 'sadsadsad', '9f1019eeb4f3b35a43241388c227be57', 'sadsad@sadsad', '2008-02-01', 'Male', 1, 'images/Thriller.jpg'),
(19, 'gegege', 'gegege', 'gegege', 'f74c8347798f4082daf4b4570dba094a', 'gegeGE@gege', '2003-01-28', 'Male', 1, 'images/NoPhoto.png'),
(20, '1234', 'yuyuyu', 'yuyuyu', '0cd76381b0fa3a1f5bd83d27af6ea54a', 'sadfw@war', '2007-03-07', 'Male', 1, 'images/NoPhoto.png'),
(21, '', 'qweqwe', 'qweqwe', 'efe6398127928f1b2e9ef3207fb82663', 'wqeqwe@qweqwe', '2018-08-23', 'Male', 1, 'images/NoPhoto.png'),
(23, '1233sad', '123asd', 'asdasd', 'b37d240161609fd56237f8f109666cef', 'sadasd@sadsad', '2018-10-30', 'Male', 1, 'images/NoPhoto.png'),
(24, 'asdasd\'asdasd123', 'asdas', 'asdasd', '28ecd6323d2657ff89cfc1d7b3c0feef', 'sad123123@123123', '2006-12-20', 'Male', 1, 'images/NoPhoto.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_ID` int(255) NOT NULL AUTO_INCREMENT,
  `LN_NO` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Cart_Price` int(255) NOT NULL,
  PRIMARY KEY (`Cart_ID`),
  KEY `LN_NO_FK` (`LN_NO`),
  KEY `User_ID_FK` (`User_ID`),
  KEY `Quantity` (`Quantity`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `LN_NO`, `User_ID`, `Quantity`, `Cart_Price`) VALUES
(8, 5, 18, 1, 244),
(9, 2, 10, 1, 234);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `Comment_ID` int(255) NOT NULL AUTO_INCREMENT,
  `User_ID` int(255) NOT NULL,
  `Comment_Text` varchar(255) NOT NULL,
  `Comment_Date` date NOT NULL,
  `Comment_Link` varchar(255) NOT NULL,
  `LN_NO` int(255) NOT NULL,
  PRIMARY KEY (`Comment_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `LN_NO` (`LN_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_ID`, `User_ID`, `Comment_Text`, `Comment_Date`, `Comment_Link`, `LN_NO`) VALUES
(29, 10, 'This is good!', '2018-11-10', 'http://localhost/WDTproj2/WDTproj/details.php?2=baba', 2),
(30, 10, 'LOL this is so hype !', '2018-11-10', 'http://localhost/WDTproj2/WDTproj/details.php?4=popo', 4),
(31, 10, 'What a Mess!', '2018-11-11', 'http://localhost/WDTproj2/WDTproj/details.php?10=qweqwe', 10),
(32, 10, 'Fair price to be honest', '2018-11-11', 'http://localhost/WDTproj2/WDTproj/details.php?9=ewrwer', 9),
(34, 18, 'sad', '2018-11-11', 'http://localhost/WDTproj2/WDTproj/details.php?14=When', 14),
(35, 18, 'asd', '2018-11-11', 'http://localhost/WDTproj2/WDTproj/details.php?4=popo', 4),
(36, 19, 'sad', '2018-11-11', 'http://localhost/WDTproj2/WDTproj/details.php?4=popo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `Events_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Events_Title` varchar(255) NOT NULL,
  `Events_Text` text NOT NULL,
  `Events_Image` varchar(50) NOT NULL,
  PRIMARY KEY (`Events_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Events_ID`, `Events_Title`, `Events_Text`, `Events_Image`) VALUES
(1, 'Halloween~', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo magna sed diam feugiat gravida. Aenean posuere urna in leo varius molestie. Phasellus eu rhoncus sapien, eu facilisis nulla. Sed malesuada sed lectus non efficitur. Curabitur eu rhoncus urna. Suspendisse potenti. Nullam vitae sagittis erat.', 'images/Halloween.gif'),
(2, 'Halloween~', 'Pellentesque quam leo, interdum suscipit sapien quis, semper aliquet mi. Aenean lacinia, nisi in luctus accumsan, eros ligula auctor ex, eget scelerisque elit metus nec tellus. Donec neque lectus, placerat et lectus eu, aliquam finibus urna. Vivamus mollis diam velit, sed convallis mi consectetur sed. Etiam sit amet ante diam. Nulla posuere venenatis leo, nec faucibus sapien aliquet id. Proin dapibus laoreet lacinia. Morbi dignissim, nunc at malesuada vestibulum, quam odio blandit nunc, sed pharetra erat nunc a nunc. Aliquam vestibulum finibus volutpat. Nunc suscipit enim vitae maximus pharetra. Mauris in venenatis leo, ut varius metus.', 'images/Halloween2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lnovels`
--

DROP TABLE IF EXISTS `lnovels`;
CREATE TABLE IF NOT EXISTS `lnovels` (
  `LN_NO` int(255) NOT NULL AUTO_INCREMENT,
  `LN_Name` varchar(50) NOT NULL,
  `LN_Author` varchar(50) NOT NULL,
  `LN_Price` float NOT NULL,
  `LN_Category_1` varchar(15) NOT NULL,
  `LN_Category_2` varchar(15) NOT NULL,
  `LN_Summary` varchar(200) NOT NULL,
  `LN_Image` varchar(30) NOT NULL,
  `LN_Total` int(255) NOT NULL,
  PRIMARY KEY (`LN_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnovels`
--

INSERT INTO `lnovels` (`LN_NO`, `LN_Name`, `LN_Author`, `LN_Price`, `LN_Category_1`, `LN_Category_2`, `LN_Summary`, `LN_Image`, `LN_Total`) VALUES
(1, 'lala', 'lolo', 12.5, 'Thriller', 'Horror ', 'Baba blacksheep ', 'images/ln1.png', 120),
(2, 'baba ', 'miya ', 234, 'Comedy ', 'Horror ', 'SAD ', 'images/ln2.jpg', 414),
(4, 'popo', 'pipi', 238, 'Sci-Fi', 'Slice of Life ', 'LOL', 'images/ln4.png', 0),
(5, 'kuku', 'kaka', 244, 'Romance', 'Comedy', 'sadsad', 'images/ln5.jpg', 536),
(6, 'sdfsdf', 'sdfsdf', 1231, 'Horror', 'Adventure', 'sadasdas', 'images/ln6.jpg', 198),
(7, 'asdasf', 'qwewqeq', 345, 'Sports', 'Romance', 'addgsdf', 'images/ln7.jpg', 973),
(8, 'afaasd', 'asfasdasd', 4252, 'Sci-Fi', 'Comedy', 'askjl', 'images/ln8.jpg', 88),
(9, 'ewrwer', 'qweqwe', 452, 'Adventure', 'Sci-Fi', 'egrt', 'images/ln9.jpg', 774),
(10, 'qweqwe', 'qwetrr', 984, 'Comedy', 'Sports', 'werwre', 'images/ln10.jpg', 553),
(11, 'qwewqe', 'qweqwe', 123, 'Comedy', 'Sports', 'dfsdf', 'images/ln11.jpg', 553),
(12, 'qweqwe', 'qweqwe', 434, 'Sports', 'Horror', 'asd32', 'images/ln12.jpg', 667),
(13, 'qeqwe', 'qwewqe', 485, 'Adventure', 'Comedy', 'sdkjsdf', 'images/ln12.jpg', 0),
(14, 'When sakura falls', 'Tomoe Shishou', 189, 'Romance', 'Comedy', 'When sakura falls, a boy look up to the sky and two lines of tears flow from the edges of his eyes, what\'s going to happen in his life? ', 'images/featuredln.png', 500);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `News_ID` int(11) NOT NULL AUTO_INCREMENT,
  `News_Title` varchar(255) NOT NULL,
  `News_Text` text NOT NULL,
  `News_Image` varchar(50) NOT NULL,
  PRIMARY KEY (`News_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`News_ID`, `News_Title`, `News_Text`, `News_Image`) VALUES
(16, 'NEW NOVEL ~ PURU KIRURU!! vol.2', 'Pellentesque quam leo, interdum suscipit sapien quis, semper aliquet mi. Aenean lacinia, nisi in luctus accumsan, eros ligula auctor ex, eget scelerisque elit metus nec tellus. Donec neque lectus, placerat et lectus eu, aliquam finibus urna. Vivamus mollis diam velit, sed convallis mi consectetur sed. Etiam sit amet ante diam. Nulla posuere venenatis leo, nec faucibus sapien aliquet id. Proin dapibus laoreet lacinia. Morbi dignissim, nunc at malesuada vestibulum, quam odio blandit nunc, sed pharetra erat nunc a nunc. Aliquam vestibulum finibus volutpat. Nunc suscipit enim vitae maximus pharetra. Mauris in venenatis leo, ut varius metus.', 'images/SliceofLife.png');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `Receipt_ID` int(255) NOT NULL AUTO_INCREMENT,
  `LN_NO` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Receipt_Price` int(255) NOT NULL,
  PRIMARY KEY (`Receipt_ID`),
  KEY `LN_NO` (`LN_NO`),
  KEY `USER_ID` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`Receipt_ID`, `LN_NO`, `User_ID`, `Quantity`, `Receipt_Price`) VALUES
(66, 2, 10, 1, 234),
(67, 2, 10, 1, 234);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`LN_NO`) REFERENCES `lnovels` (`LN_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`LN_NO`) REFERENCES `lnovels` (`LN_NO`) ON UPDATE CASCADE;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`LN_NO`) REFERENCES `lnovels` (`LN_NO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `account` (`User_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
