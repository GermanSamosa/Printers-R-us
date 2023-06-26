-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
-- Author: Matthew Rao
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 01, 2022 at 04:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printersrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE `printers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `printer_desc` longtext NOT NULL,
  `price` int(16) NOT NULL,
  `img_src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printers`
--

INSERT INTO `printers` (`id`, `name`, `printer_desc`, `price`, `img_src`) VALUES
(302, '3D-L0KR', 'This printer looks like it can fit everything you\'d want in it while you\'re at the gym. But it\'s not a locker. It\'s a world class 3D printer with a 10 year warranty and model sizes as big as 120 gallons.\r\nHard to go wrong.', 28999, 'bigprinter.png'),
(306, 'EZ-2-YUZPRNT 3000', 'Print from home! A quality printer', 39999, 'niceprinter.jpg'),
(307, 'RX-9000', 'This printer is so quiet, it will put you to sleep!', 129, 'sleeper.jpg'),
(309, 'kewlprintR', '3D printer like never before that you can use from home!', 19999, '3d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`) VALUES
(1, 'admin', '(999) 999-9999', 'admin@admin.net', 'admin1'),
(77230005, 'Fergie', '18007775555', 'fergie@management.com', 'Ferg1'),
(77230006, 'John Paul', '(514) 780-6278', 'j.paul@paulentreprise.com', 'Jpaul99'),
(77230007, 'Jacque Gagne', '514 337 2867', 'jacque@email.com', 'Jac99'),
(77230009, 'James Gordon', '8786665555', 'some@email.com', 'James99'),
(77230010, 'Karl', '9997775555', 'karl@storm.com', 'Storm1'),
(77230011, 'George', '8887776666', 'george@shemus.com', 'cool12'),
(77230012, 'Mike', '2344565555', 'bigmike@gmail.com', 'mikey1'),
(77230013, 'Pargol', '9876543214', 'pargol@email.com', 'pargol1'),
(77230014, 'Hot Sauce', '3334445555', 'hot@sauce.ca', 'hotsauce');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `user_id`, `product_id`) VALUES
(39, 77230014, 306),
(48, 77230009, 302);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `printers`
--
ALTER TABLE `printers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `FK_user_id` (`user_id`),
  ADD KEY `FK_productr_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `printers`
--
ALTER TABLE `printers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77230015;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FK_productr_id` FOREIGN KEY (`product_id`) REFERENCES `printers` (`id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
