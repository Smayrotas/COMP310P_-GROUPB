-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 01, 2017 at 10:21 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventsys`
--

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`user_id`, `reference_no`, `first_name`, `last_name`, `phone_number`, `age`) VALUES
(2, 164288637, 'Stelios', 'Mavrotas', 2147483647, 34);

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`host_id`, `venue_id`, `event_id`, `event_name`, `duration`, `description`, `event_time`, `category`) VALUES
(3, 'SW3XP', 'BKCSW3XP', 'Black Keys Concert', '2 hours 30 minutes', 'A rock music concert by the Black Keys', '28-02-2017 23:30:00', 'Rock Concert'),
(4, 'SW1 1HU', 'BKCSW3XP', 'Herbie Hancock Conce', '2 hours 30 minutes', 'A  music concert by the Herbie Hancock', '10-02-2017 23:30:00', 'Jazz'),
(6, 'SW1 1HU', 'BKCSW6XP', 'DJ Madlib live', '2 hours 30 minutes', '-', '10-09-2017 23:30:00', 'techno/house '),
(5, 'SW1 1HU', 'BKCSW7XP', 'DJ Madlib live with ', '2 hours 30 minutes', '-', '10-09-2017 23:30:00', 'techno/house w rap ');

--
-- Dumping data for table `ticket_info`
--

INSERT INTO `ticket_info` (`user_id`, `reference_no`, `event_id`, `price`, `sold`, `end_date`, `seat_no`) VALUES
(0, 164288637, 'BKCSW3XP', 25, 'Y', ' 27-02-2017 23:30:00', 1),
(0, 164288638, 'BKCSW3XP', 25, 'N', ' 27-02-2017 23:30:00', 2),
(0, 164288639, 'BKCSW3XP', 25, 'N', ' 27-02-2017 23:30:00', 3),
(0, 164288640, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288641, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288642, 'BKCSW3XP', 40, 'Y', ' 27-02-2017 23:30:00', 0),
(0, 164288643, 'BKCSW3XP', 40, 'Y', ' 27-02-2017 23:30:00', 0),
(0, 164288644, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288645, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288646, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288646, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288647, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288648, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288649, 'BKCSW3XP', 40, 'N', ' 27-02-2017 23:30:00', 0),
(0, 164288650, 'BKCSW3XP', 100, 'Y', ' 27-02-2017 23:30:00', 0);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pass`, `user_type`, `email`) VALUES
(1, 'stelios123', 'steliossmqwerty', 'customer', 'mavrotas.st@gmail.com'),
(2, 'sus123', 'suseeveen', 'admin', 'sus@gmail.com'),
(3, 'Black-Keys', 'BlackKeysband', 'host', 'BlackKeys@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
