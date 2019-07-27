-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 05:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--
create Database `dbclassifiedads`;
use `dbclassifiedads`;
--
-- Database: `dbclassifiedads`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `adId` int(11) NOT NULL,
  `adType` int(11) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expireDate` timestamp NULL DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `adDescription` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `payment` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`adId`, `adType`, `registerDate`, `expireDate`, `userId`, `adDescription`, `categoryId`, `subcategoryId`, `payment`, `discount`, `images`) VALUES
(1, 1, '2019-03-14 04:00:00', '2019-03-22 04:00:00', 3, 'Exelent apartment, $1500 month all incluse. ', 2, 5, '0', '0', 'apt_toronto.jpg'),
(2, 2, '2019-03-08 05:00:00', '2019-03-15 04:00:00', 1, 'Apto 4/5 excellent location $2500 month', 1, 2, '0', '0', 'slide1.jpg'),
(35, 2, '2019-04-27 14:39:24', '2019-05-30 04:00:00', 15, 'Sportive new $250000, 3 left', 2, 5, '0', '0', 'auto-racing-automobiles-automotive-39855.jpg'),
(36, 2, '2019-04-27 14:39:24', NULL, 16, 'Classic renovated $80.000, 1 left', 2, 6, '0', '0', 'auto-show-automobiles-automotives-248687.jpg'),
(37, 2, '2019-04-27 14:46:51', '2019-05-30 04:00:00', 17, 'Classic beautiful $95500 unic', 2, 6, '0', '0', 'action-asphalt-automobile-305223.jpg'),
(38, 1, '2019-04-27 14:48:39', '2019-05-30 04:00:00', 3, 'Beautiful hose, excellent location $450000', 1, 3, '0', '0', ''),
(40, 1, '2019-04-27 14:50:46', '2019-05-30 04:00:00', 1, 'Bike $200 ', 3, 3, '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `adtype`
--

CREATE TABLE `adtype` (
  `adtypeId` int(11) NOT NULL,
  `adtypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adtype`
--

INSERT INTO `adtype` (`adtypeId`, `adtypeName`) VALUES
(1, 'Free ads'),
(2, 'Paid ads');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName_EN` varchar(30) NOT NULL,
  `categoryName_FR` varchar(30) NOT NULL,
  `Subcategories` set('All in Real Estate','For Rent','For Sale','Real Estate Services','All in Cars & Vehicles','Classic Cars','No Subcategory') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName_EN`, `categoryName_FR`, `Subcategories`) VALUES
(1, 'real estate', 'immobilier', ''),
(2, 'cars & vehicles', 'voitures et vehicules', ''),
(3, 'No category', 'Aucune categorie', ''),
(4, 'Real State', 'Real State', 'For Rent');

-- --------------------------------------------------------

--
-- Table structure for table `membertype`
--

CREATE TABLE `membertype` (
  `memberId` int(11) NOT NULL,
  `memberType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membertype`
--

INSERT INTO `membertype` (`memberId`, `memberType`) VALUES
(1, 'Administrator'),
(2, 'Employee'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `add_payment` decimal(10,0) NOT NULL,
  `number_img` int(11) NOT NULL,
  `discount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `ad_id`, `add_payment`, `number_img`, `discount`) VALUES
(1, 1, '10', 5, '0'),
(2, 2, '15', 10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategoryId` int(11) NOT NULL,
  `subcategoryName_EN` varchar(50) NOT NULL,
  `subcategoryName_FR` varchar(50) NOT NULL,
  `Subcategories` set('All in Real Estate','For Rent','For Sale','Real Estate Services','All in Cars & Vehicles','Classic Cars') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategoryId`, `subcategoryName_EN`, `subcategoryName_FR`, `Subcategories`) VALUES
(1, 'All in Real Estate', 'Tout dans l\'immobilier', ''),
(2, 'For Rent', 'A louer', ''),
(3, 'For Sale', 'À vendre', ''),
(4, 'Real Estate Services', 'Services immobiliers', ''),
(5, 'All in Cars & Vehicles', 'Tout en voitures et véhicules', ''),
(6, 'Classic Cars', 'Voitures classiques', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `membertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `address`, `city`, `state`, `phone`, `email`, `password`, `membertype`) VALUES
(1, 'Mary', '2100 St Catherine', 'Montreal', 'Quebec', '5141111111', 'mary.brown@gmail.com', 'mary123', 3),
(2, 'Abraham', 'Central Parc', 'Toronto', 'Ontario', '5112222222', 'abraham@gmail.com', 'abraham123', 1),
(3, 'Luiza', ' St Denis', 'Montreal', 'Quebec', '5141112222', 'luiza@gmail.com', 'luiza01', 3),
(15, 'Charlene Austin', '6183 W Tropical Pkwy', 'Montreal', 'Quebec', '(507)-120-6369', 'charlene.austin24@example.com', 'biteme1', 3),
(16, 'Scott D. Frantz', '4510 Bridgeport Rd\r\n', 'Orangeville', 'Ontario', '519-806-1327', 'ScottDFrantz@dayrep.com', 'Kinglabit', 3),
(17, 'Bryan M. Arriaga', '3697 Haaglund Rd\r\n', 'Bougie Creek', 'Quebec', '250-773-6795', 'BryanMArriaga@teleworm.us', 'Reem1935', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`adId`),
  ADD KEY `adType_fk` (`adType`),
  ADD KEY `userid_fk` (`userId`),
  ADD KEY `categoryId_fk` (`categoryId`),
  ADD KEY `subcategoryId_fk` (`subcategoryId`);

--
-- Indexes for table `adtype`
--
ALTER TABLE `adtype`
  ADD PRIMARY KEY (`adtypeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `membertype`
--
ALTER TABLE `membertype`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `add_id_fk` (`ad_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`) USING BTREE,
  ADD KEY `meberType` (`membertype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `adId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `membertype`
--
ALTER TABLE `membertype`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `adType_fk` FOREIGN KEY (`adType`) REFERENCES `adtype` (`adtypeId`),
  ADD CONSTRAINT `categoryId_fk` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `subcategoryId_fk` FOREIGN KEY (`subcategoryId`) REFERENCES `subcategory` (`subcategoryId`),
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `add_id_fk` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`adId`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `meberType` FOREIGN KEY (`membertype`) REFERENCES `membertype` (`memberId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
