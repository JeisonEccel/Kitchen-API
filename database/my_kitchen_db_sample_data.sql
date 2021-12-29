-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 12:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_kitchen_db`
--
CREATE DATABASE IF NOT EXISTS `my_kitchen_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `my_kitchen_db`;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `description`, `available`) VALUES
(1, 'Water', 0),
(2, 'Egg', 0),
(3, 'Milk', 1),
(4, 'Rice', 0),
(5, 'Pasta', 1),
(6, 'Oil', 1),
(8, 'Sugar', 1),
(9, 'Vinager', 1),
(10, 'Salt', 0);

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `instructions`, `prep_time`, `serves`) VALUES
(1, 'Test', 'Here are the instructions', 30, 4),
(2, 'New Recipe', 'A few instructions', 90, 8),
(3, 'Coffee', 'Prepare coffee!!', 10, 4);

--
-- Dumping data for table `recipes_ingredients`
--

INSERT INTO `recipes_ingredients` (`id`, `recipe_ID`, `ingredient_ID`, `quantity`, `unit`, `optional`) VALUES
(1, 1, 1, 300, 1, 0),
(2, 1, 4, 2, 3, 0),
(3, 1, 5, 200, 1, -1);

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `symbol`) VALUES
(1, 'grams', 'g'),
(2, 'teaspoon', 'tsp'),
(3, 'tablespoon', 'Tbsp'),
(4, 'Cup', 'c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
