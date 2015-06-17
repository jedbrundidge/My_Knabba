-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2015 at 04:17 PM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `llhosts_ericbuhr`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `distance` float(10,6) DEFAULT NULL,
  `radius` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `distance`, `radius`) VALUES
(1, 'Bob Smit', '1521 1st Ave, Burnsville, MN 55337', 44.767742, -93.277725, 'restaurant', 0.000000, 0),
(2, 'Rhonda Reading', '2222 2nd Ave, Burnsville, MN 55337', 44.699902, -93.411102, 'bar', 0.000000, 0),
(3, 'Mike Bulter', '14 Mercer St, Burnsville, MN 55337', 44.524563, -93.356445, 'restaurant', 0.000000, 0),
(4, 'Jane Gill', '1225 1st Ave, Burnsville, MN 55337', 44.610638, -93.437653, 'restaurant', 0.000000, 0),
(5, 'Steve Cross', '2230 1st Ave, Burnsville, MN', 44.512821, -93.311096, 'bar', 0.000000, 0),
(6, 'Renee Dowd', '1301 Alaskan Way, Burnsville, MN', 44.623001, -93.370003, 'restaurant', 0.000000, 0),
(7, 'Molly Allen', '2234 2nd Ave, Burnsville, MN', 44.613976, -93.654671, 'bar', 0.000000, 0),
(8, 'Walter Beld', '1416 E Olive Way, Burnsville, MN', 44.555172, -93.556587, 'bar', 0.000000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
