-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2022 at 12:55 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Dumisani Zulu', 'admin@admin.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `email`, `password`) VALUES
(1, 'Sky Walker', 966100100, '3307 new mushili', 'sky@gmail.com', 'sky'),
(2, 'Lesley Zulu', 966100001, '3307 new mushili', 'lesley@gmail.com', 'test'),
(3, 'Code Zero', 966123456, 'Lusaka, Zambia', 'code@zero.com', 'code');

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

DROP TABLE IF EXISTS `flight_details`;
CREATE TABLE IF NOT EXISTS `flight_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_city` varchar(255) NOT NULL,
  `to_city` varchar(255) NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `seats_economy` int(11) NOT NULL,
  `seats_business` int(11) NOT NULL,
  `price_economy` int(11) NOT NULL,
  `price_business` int(11) NOT NULL,
  `jet_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_details`
--

INSERT INTO `flight_details` (`id`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `seats_economy`, `seats_business`, `price_economy`, `price_business`, `jet_id`) VALUES
(1, 'Lusaka', 'London', '2022-02-04', '2022-02-04', 100, 80, 1500, 2500, 1),
(2, 'Lusaka', 'London', '2022-02-03', '2022-02-04', 75, 45, 2500, 3500, 1),
(4, 'kitwe', 'Lusaka', '2022-02-04', '2022-02-04', 100, 50, 1200, 1800, 4),
(5, 'Cape Town', 'Ndola', '2022-02-04', '2022-02-04', 65, 35, 1500, 2300, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jet_details`
--

DROP TABLE IF EXISTS `jet_details`;
CREATE TABLE IF NOT EXISTS `jet_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jet_type` varchar(255) NOT NULL,
  `total_capacity` int(20) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jet_details`
--

INSERT INTO `jet_details` (`id`, `jet_type`, `total_capacity`, `active`) VALUES
(1, 'AIRBUS700', 200, 'Yes'),
(2, 'Jetline-VX', 100, 'Yes'),
(3, 'AIRBUS400', 150, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

DROP TABLE IF EXISTS `payment_details`;
CREATE TABLE IF NOT EXISTS `payment_details` (
  `payment_id` varchar(20) NOT NULL,
  `pnr` int(11) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` int(6) DEFAULT NULL,
  `payment_mode` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `pnr`, `payment_date`, `payment_amount`, `payment_mode`) VALUES
('182721386', 7474667, '2022-02-03', 1500, 'credit card'),
('383083290', 6817684, '2022-02-04', 1500, 'credit card'),
('460708512', 2912291, '2022-02-03', 1200, 'credit card'),
('700115096', 6598143, '2022-02-03', 2500, 'credit card'),
('848542214', 3545773, '2022-02-04', 1500, 'credit card'),
('946124256', 7373216, '2022-02-03', 3000, 'credit card');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

DROP TABLE IF EXISTS `ticket_details`;
CREATE TABLE IF NOT EXISTS `ticket_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pnr` int(11) NOT NULL,
  `date_of_reservation` timestamp NOT NULL,
  `flight_no` int(11) NOT NULL,
  `journey_date` date NOT NULL,
  `class` varchar(255) NOT NULL,
  `booking_status` varchar(255) NOT NULL,
  `no_of_passengers` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_details`
--

INSERT INTO `ticket_details` (`id`, `pnr`, `date_of_reservation`, `flight_no`, `journey_date`, `class`, `booking_status`, `no_of_passengers`, `customer_email`) VALUES
(1, 3130609, '2022-01-24 22:00:00', 1, '2022-01-26', 'economy', 'CANCELED', 1, 'sky@gmail.com'),
(9, 6598143, '2022-02-02 22:00:00', 2, '2022-02-04', 'economy', 'CANCELED', 1, 'sky@gmail.com'),
(11, 7360650, '2022-02-03 22:00:00', 1, '2022-02-04', 'economy', 'CONFIRMED', 1, 'code@zero.com'),
(6, 7474667, '2022-02-02 22:00:00', 1, '2022-02-04', 'economy', 'CONFIRMED', 1, 'sky@gmail.com'),
(7, 2912291, '2022-02-02 22:00:00', 4, '2022-02-04', 'economy', 'CONFIRMED', 1, 'sky@gmail.com'),
(10, 3545773, '2022-02-03 22:00:00', 1, '2022-02-04', 'economy', 'CONFIRMED', 1, 'sky@gmail.com'),
(12, 8361780, '2022-02-03 22:00:00', 1, '2022-02-04', 'economy', 'CONFIRMED', 1, 'code@zero.com'),
(13, 6817684, '2022-02-03 22:00:00', 1, '2022-02-04', 'economy', 'CANCELED', 1, 'code@zero.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
