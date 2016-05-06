-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2016 at 12:58 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appiride_mvp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ar_instance`
--

CREATE TABLE IF NOT EXISTS `ar_instance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `ar_instance`
--

INSERT INTO `ar_instance` (`id`, `user_id`, `user_name`, `subject`, `message`, `datetime`, `status`) VALUES
(21, '1', 'Bala', '', 'Hi every one @appiride development process is going on, it will launch soon, please wait for this journey world @Director of appiride', '2014-08-17 20:21:06', 1),
(23, '1', 'Bala', '', 'Tested in small screen', '2014-08-23 12:39:24', 1),
(24, '6', 'Chandhra', '', 'hi', '2016-05-03 11:58:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ar_joiner`
--

CREATE TABLE IF NOT EXISTS `ar_joiner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `via` varchar(100) NOT NULL,
  `stime` time NOT NULL,
  `ampm` varchar(10) NOT NULL,
  `fixed` varchar(50) NOT NULL,
  `seats` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `pic_place` varchar(500) NOT NULL,
  `date` varchar(15) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `deleted` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ar_joiner`
--

INSERT INTO `ar_joiner` (`id`, `user_id`, `from`, `to`, `via`, `stime`, `ampm`, `fixed`, `seats`, `contact`, `pic_place`, `date`, `desc`, `deleted`, `status`, `entrytime`) VALUES
(1, '1', 'sdsd', 'asdasdas', 'dasdsd', '00:00:00', 'am', 'YES', 0, 'asdsad', 'asdsad', '2014-08-21', 'asdsad', 0, 1, '0000-00-00 00:00:00'),
(2, '3', 'Pondicherry', 'Chennai', 'Marakkanam', '01:00:00', 'pm', 'NO', 1, '8865235689', 'flexible', '2014-08-29', 'dasdasdasd sdasd asd asd', 0, 1, '0000-00-00 00:00:00'),
(3, '3', 'Muthialpet', 'Jipmer', 'Lawspet', '11:00:00', 'am', 'NO', 1, '5623589656', 'Muthialpet', '2014-08-29', 'sdfg dslkfghdfogeity ogk h sdkfhgksdjfhgl dfghsd fjkgshfdgkjshdfkgjshfdkg skdjfhgskdfhgsdkflghsd fgsldfkjghslkjdfhg', 0, 1, '0000-00-00 00:00:00'),
(4, '2', 'Test arun', 'Test arun', 'Test arun', '01:00:00', 'am', 'NO', 5, '2568965369', 'Test arun', '2014-08-30', 'Test arunTest arunTest arunTest arunTest arunTest arunTest arunTest arunTest arunTest arunTest arunTest arunTest arunTest arunTest arun', 0, 1, '0000-00-00 00:00:00'),
(5, '3', 'pondicherry', 'Coimbatore', '', '11:00:00', 'am', 'YES', 3, '7894561239', 'Gandhi Stattue', '2014-08-15', 'fbdh fdhsv hds sd vsdvcsdwdnsa sa', 0, 1, '0000-00-00 00:00:00'),
(6, '7', 'China', 'USA', 'India', '01:00:00', 'pm', 'YES', 2, '5689365896', 'Chaina , china kurukku santhu', '2014-08-31', 'k askshalglasfj hgafskdhgdfgsdkkieruwiroituryt yeriuweoryt euwioeghdfvdkg ydfg', 0, 1, '2014-08-18 17:15:34'),
(7, '1', 'tindivanam', 'thiruchi', 'villupuram', '14:50:00', 'pm', 'NO', 2, '9568478965', 'tindivanam bus stop', '2014-08-30', 'what you want to tell somthing about ride, rules, and conditions etc. you can share via this message', 0, 1, '2014-08-23 14:20:38'),
(8, '6', 'asdsadsad', 'asdasdasdsad', 'asdasdsad', '17:05:00', 'pm', 'NO', 1, '9865235689', 'ddsfdsfdfsdf', '2014-08-28', 'dasdasdsadasdasdasdsa', 0, 1, '2014-08-23 18:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `ar_journer`
--

CREATE TABLE IF NOT EXISTS `ar_journer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `ampm` varchar(5) NOT NULL,
  `fixed` varchar(50) NOT NULL,
  `seats` int(3) NOT NULL,
  `fair` int(5) NOT NULL,
  `via` varchar(500) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `entrytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ar_journer`
--

INSERT INTO `ar_journer` (`id`, `user_id`, `from`, `to`, `date`, `stime`, `ampm`, `fixed`, `seats`, `fair`, `via`, `desc`, `contact`, `deleted`, `status`, `vehicle`, `entrytime`) VALUES
(4, '1', 'Pondicherry', 'Chennai', '2014-08-30', '01:00:00', '', 'YES', 0, 100, 'ECR', '', '9865896326', 0, 1, 'Byke', '0000-00-00 00:00:00'),
(5, '1', 'Pondicherry', 'Bangalore', '2015-01-01', '01:00:00', 'pm', 'NO', 8, 200, 'Chennai', 'xfgxfgg dgsdfgsdfg', '1896582365', 0, 1, 'Innova', '0000-00-00 00:00:00'),
(7, '3', 'Thiruvanmiyur', 'Koyambedu', '2014-08-30', '00:30:00', 'pm', 'YES', 1, 0, 'Ashok Nagar', 'what you want to tell somthing about ride, rules, and conditions etc. you can share via this message', '98652356', 0, 1, 'two wheeler', '0000-00-00 00:00:00'),
(8, '3', 'From place', 'to place', '2014-08-31', '01:00:00', 'am', 'NO', 1, 0, 'via place', 'shga sklkfja;dls hflaskdfhaslkdhfkjsdfgkdf gndfkjg hdfkgdkjfhg kjdlfhgdkfj bksjdlfhg osdhgjkd', '2895635874', 0, 1, 'car', '0000-00-00 00:00:00'),
(9, '1', 'Delhi', 'Pune', '0000-00-00', '01:00:00', 'am', 'YES', 2, 0, 'Mumbai', 'what you want to tell somthing about ride, rules, and conditions etc. you can share via this message', '9865235689', 0, 1, 'car', '0000-00-00 00:00:00'),
(10, '6', 'Mynew', 'Journey', '2014-09-27', '01:03:00', 'am', 'NO', 3, 2, 'Please come', 'they easy to contact to you with this number. Note: we will show your number after you accepted the request  Gift Price (optional)\r\nif you want, put affordable price, otherwise you share free ride with them\r\n Comment Ride', '1234569878', 1, 1, 'car', '2014-08-23 18:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `ar_user`
--

CREATE TABLE IF NOT EXISTS `ar_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `verify` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ar_user`
--

INSERT INTO `ar_user` (`id`, `fname`, `lname`, `email`, `mobile`, `password`, `verify`, `status`) VALUES
(1, 'Bala', 'Subramanian', 'bala@bala.com', '9876543215', 'bala', '', 1),
(2, 'Arun', 'Karthik', 'arunkarthik@gmail.com', '9865325689', 'arun', '', 1),
(3, 'Bala Murugan', 'Murugan', 'balamurugan@gmail.com', '9638745269', 'balamurugan', 'XytDKCrZls4MOka2LX7a', 1),
(6, 'Chandhra', 'Kanth', 'chandra@gmail.com', '2568974589', 'chandra', 'bYJYQ7lz7EUG5Jhik8OT', 1),
(7, 'Dahush', 'D', 'dhanush@gmail.com', '8568932568', 'dhanush', 'T3MefxY5qWJSicFmcOQJ', 1),
(8, 'New', 'User', 'admin@gmail.com', '9852145689', 'admin', 'Ap422AxrIeAwIA4cDljZ', 1),
(9, 'CEO', 'appride', 'ceoappride@gmail.com', '9876543215', 'ceo', 'uR402i0mg9zETLeXc1XQ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `req_joiner`
--

CREATE TABLE IF NOT EXISTS `req_joiner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `join_id` varchar(10) NOT NULL,
  `jour_user_id` varchar(10) NOT NULL,
  `req_status` varchar(10) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `req_joiner`
--

INSERT INTO `req_joiner` (`id`, `join_id`, `jour_user_id`, `req_status`, `entry_date`, `status`) VALUES
(1, '7', '6', 'not_accept', '2014-08-23 18:10:36', 0),
(3, '5', '6', 'not_accept', '2014-08-23 18:20:45', 0),
(4, '6', '6', 'not_accept', '2014-08-23 18:21:10', 0),
(5, '1', '6', 'not_accept', '2014-08-23 18:22:13', 0),
(6, '8', '1', 'not_accept', '2014-08-23 18:28:32', 0),
(7, '2', '6', 'not_accept', '2014-09-27 06:15:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `req_journer`
--

CREATE TABLE IF NOT EXISTS `req_journer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour_id` varchar(10) NOT NULL,
  `join_user_id` varchar(10) NOT NULL,
  `req_status` varchar(10) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `req_journer`
--

INSERT INTO `req_journer` (`id`, `jour_id`, `join_user_id`, `req_status`, `entry_date`, `status`) VALUES
(23, '9', '6', 'not_accept', '2014-08-23 16:58:00', 0),
(24, '8', '6', 'not_accept', '2014-08-23 16:58:16', 0),
(25, '7', '6', 'not_accept', '2014-08-23 16:58:17', 0),
(26, '8', '1', 'not_accept', '2014-08-23 17:54:25', 0),
(27, '9', '3', 'not_accept', '2014-08-23 17:55:14', 0),
(28, '5', '3', 'not_accept', '2014-08-23 17:56:11', 0),
(29, '5', '6', 'not_accept', '2014-08-23 17:56:48', 0),
(31, '10', '1', 'not_accept', '2014-08-23 18:32:33', 0),
(32, '4', '6', 'not_accept', '2014-09-27 06:15:16', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
