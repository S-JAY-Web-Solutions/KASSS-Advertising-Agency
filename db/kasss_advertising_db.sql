-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 01:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasss_advertising_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `reply` text NOT NULL,
  `reply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `userID`, `email`, `feedback`, `date`) VALUES
(1, 2, 'user@kasss.com', 'Excellent service from this online advertising agency! Their team was responsive, creative, and delivered results beyond our expectations. Highly recommend their expertise to anyone seeking effective digital marketing solutions', '2024-05-07'),
(2, 5, 's.silva@gmail.com', 'I\'m thrilled with the results achieved by this online advertising agency. Their strategic approach and attention to detail have significantly boosted our online presence. Working with them has been a game-changer for our business!', '2024-05-07'),
(3, 3, 'r.prasad@gmail.com', 'Top-notch service provided by this online advertising agency! Their professionalism, expertise, and dedication to our campaign\'s success were evident from day one. Couldn\'t be happier with the outcome. Thank you!', '2024-05-07'),
(4, 4, 'm.perera@gmail.com', 'Impressed by the professionalism and expertise of this online advertising agency. They took the time to understand our goals and delivered targeted campaigns that yielded tangible results. Highly recommend their services to others in need of effective online marketing', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `feature` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(20) DEFAULT '1',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `image`, `description`, `feature`, `price`, `status`, `date`) VALUES
(1, 'Silver Package', 'Silver Package.png', ' The Silver package offers essential features tailored for those seeking a straightforward solution. With a focus on simplicity and efficiency, it provides a reliable foundation to meet your needs.', 'FB Posts / FB Page Boost (1 week) / FB Page Handling ', 4500.00, '1', '2024-05-07'),
(2, 'Gold Package', 'Gold Package.png', 'Elevate your experience with the Gold package, designed to provide advanced functionalities and enhanced performance. Unlock a world of possibilities and streamline your operations with ease', 'FB Posts / FB Page Boost (1 week) / FB Page Handling / FB Group Handling', 6500.00, '1', '2024-05-07'),
(3, 'Platinum Package', 'Platinum Package.png', 'Dive into excellence with the Platinum package, offering premium features and top-notch support. Experience unparalleled quality and optimize your workflow for maximum productivity.', 'FB Posts / FB Page Boost (4 week) / FB Page Handling / FB Group Handling / Group Share', 7500.00, '1', '2024-05-07'),
(4, 'Basic Package', 'Basic Package.png', 'The Basic package serves as a solid starting point, offering fundamental features to get you up and running quickly. It\'s perfect for those looking for simplicity without sacrificing functionality.', 'FB Posts', 1500.00, '1', '2024-05-07'),
(5, 'Premium Package', 'Premium Package.png', 'Step up to the next level with the Premium package, which combines essential features with additional perks for an enhanced user experience. Enjoy added flexibility and efficiency in your operations.', 'FB Posts / FB Page Boost (4 week) / FB Page Handling / FB Group Handling / Group Share / YT Channel / Tiktok Page Handling', 12000.00, '1', '2024-05-07'),
(6, 'Business Package', 'Business Package.png', 'The Business package is tailored for ambitious professionals seeking comprehensive solutions. With a focus on scalability and customization, it empowers you to take your business to new heights', 'FB Posts / FB Page Boost (4 week) / FB Business Manager ', 8000.00, '1', '2024-05-07'),
(7, 'Enterprise Package', 'Enterprise Package.png', 'Experience unparalleled power and versatility with the Enterprise package, designed for large-scale operations and demanding environments. Unlock advanced features and robust capabilities to drive success', 'FB Posts / FB Page Boost (4 week) / FB Page Handling / FB Group Handling / Group Share / YT Channel / Tiktok Page Handling / Meta Business Account Manager / Google Buiness Profile Tracker ', 15000.00, '1', '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `reply` text NOT NULL,
  `reply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `feedback` int(11) NOT NULL DEFAULT 0,
  `post` text NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phoneNumber`, `username`, `password`, `feedback`, `post`) VALUES
(1, 'Admin', 'admin@kasss.com', '94712345678', 'admin', '$10$5aSFtokBwCxp.5uoaNA6/e28E423u.KAL5MIYor8pt4V5t3Puvsta', 0, 'admin'),
(2, 'User', 'user@kasss.com', '94712345678', 'user', '$10$/fpvLPnqtG9tfwf9k3ZGh.EdB9SUKyrYMJwlXNEt38fosbusZ..Li', 1, 'customer'),
(3, 'Ramitha Prasad', 'r.prasad@gmail.com', '0779854698', 'ram_sad1', '$2y$10$3jLW7lGS9pANyeaI8PLAJOB3NVw/ddcRqfGc61zxOYLbSV7zKWyeK', 1, 'customer'),
(4, 'Menuka  Perera', 'm.perera@gmail.com', '0786498519', 'mmenuka05', '$2y$10$2VbJC8MmzzguiGubIIyB1u1onQke6RVUuu998IE1EEJ.Pa/CpQsR2', 1, 'customer'),
(5, 'Suren Silva', 's.silva@gmail.com', '0728468792', 'suren99', '$2y$10$PI4xfFEQ5FZYa7WT5IybmeW6czNkM5gi/txEC8CtGvT9wKofX4iMi', 1, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
