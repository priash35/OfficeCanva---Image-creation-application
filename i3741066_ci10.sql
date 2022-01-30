-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2019 at 05:44 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i3741066_ci10`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `business_category` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `website_url` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `company_name`, `client_name`, `address`, `email`, `password`, `contact`, `business_category`, `logo`, `photo`, `website_url`, `start_date`, `end_date`, `status`) VALUES
(1, 'Gravity Business Services', 'Gravity Business Services', 'pune', 'punegravity@gmail.com', 'gbs@123', '8380083535', 'IT', 'http://localhost/web-comp/assets/images/logo/logo.png', 'http://localhost/web-comp/assets/images/deo-sir.jpg', 'http://gravitybusinessservices.com', '2018-03-30 00:00:00', '2018-07-31 00:00:00', 'ACTIVE'),
(2, 'Gravity Edification', 'Gravity Edification', 'pune', 'punegravity@gmail.com', 'ge@123', '8380083535', 'Education', 'http://localhost/web-comp/assets/images/logo/footer_logo.png', 'http://localhost/web-comp/assets/images/deo-sir.jpg', 'http://gravityedification.com', '2018-03-30 00:00:00', '2018-07-31 00:00:00', 'ACTIVE'),
(3, 'Ajanta Holidays', 'Prabhavati Phadnis', 'Karve Nagar, Pune', 'contact.ajantaholidays@gmail.com', 'ajantaholidays', '8208062505', 'Travel', 'http://officecanva.gravitybusinessservices.com/assets/images/logo/aj.png', 'http://officecanva.gravitybusinessservices.com/assets/images/profile-no-picture-female.png', 'www.ajantaholidays.in', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `company_name`, `image`) VALUES
(1, 'Gravity Edification', 'http://officecanva.gravitybusinessservices.com/assets/images/kit.jpg'),
(7, 'Gravity Business Services', 'http://officecanva.gravitybusinessservices.com/assets/images/logos.png'),
(8, '', 'http://officecanva.gravitybusinessservices.com/assets/images/Bhutan 1.jpg'),
(9, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/camera.jpg'),
(12, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/LEH LADAKH.png'),
(13, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/RAJASTHAN.png'),
(14, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/RAMESHWAR KANYAKUMARI MADURAI.png'),
(15, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/SINGAPORE MALAYSIA.png'),
(16, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/SRI LANKA.png'),
(17, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/TIRUPATI BALAJI.png'),
(18, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/KERALA.png'),
(19, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/KASHMIR.png'),
(20, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/KAILAS MANSAROVAR.png'),
(21, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/HAMPI BADAMI.png'),
(22, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/GOA.png'),
(23, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/DUDHSAGAR.png'),
(24, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/DELHI AGRA JAIPUR.png'),
(25, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/COASTAL KARNATAKA.png'),
(26, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGLORE MYSORE OOTY 5N%2F6D.png'),
(27, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/ASSAM MEGHALAYA ARUNACHAL PRADESH.png'),
(28, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BALI.png'),
(29, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/AMRITSAR WAGAH BORDER VAISHNO DEVI.png'),
(30, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/Bangkok321.png'),
(31, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/Krabi-3.jpg'),
(32, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/TASHKENT (1).png'),
(33, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/MADHYA PRADESH.png'),
(36, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/AMARNATH.png'),
(38, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/offthe_grid.png'),
(40, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGKOK_PATTAYA_(1).png'),
(41, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/urbana.png'),
(42, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/central_PW_big_apple_blues.png'),
(43, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/the_hills.png'),
(44, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/Sip.png'),
(45, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/1512923508_cover.jpg.webp'),
(48, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGLOREMYSOREOOTY5N%2F6D(4).png'),
(50, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGLORE_MYSORE_OOTY_5N%2F6D_(4).png'),
(51, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGLORE_MYSORE_OOTY_5N%2F6D_(5).png'),
(52, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGLORE_MYSORE_OOTY_5N%2F6D_(5).png'),
(53, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGLORE_MYSORE_OOTY_5N%2F6D_(5).png'),
(54, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGLORE.png'),
(55, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/BANGLORE_(2).png'),
(56, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/char-dham-package.jpg'),
(57, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/delhi-agra-jaipur.jpg'),
(58, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/NARMADA_PARIKRAMA.jpg'),
(59, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/NARMADA_PARIKRAMA_(2).jpg'),
(60, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/I_miss_you_a_little.png'),
(61, 'Ajanta Holidays', 'http://officecanva.gravitybusinessservices.com/assets/images/holiday_promo!.png'),
(62, 'Gravity Business Services', 'http://officecanva.gravitybusinessservices.com/assets/images/Cambodia-Vietnam-Holiday.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `role` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `name`, `email`, `password`, `phone`, `address`, `designation`) VALUES
(1, 'Admin', 'Admin', 'admin@punegravity.com', 'admin@123', '1234567890', 'Pune', 'Director'),
(2, 'Employee', 'Rajashree Gulhane', 'rajshree@gmail.com', 'raj@123', '9876543210', 'Pune', 'Digital Marketing '),
(3, 'Employee', 'Ruddhi Kendhe', 'kendheruddhi@gmail.com', '1322021998', '8888811244', 'Pune', 'Digital Marketing Executive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
