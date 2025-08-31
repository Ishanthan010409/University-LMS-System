-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 03:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `semester` decimal NOT NULL,
  `cource_name` varchar(200) NOT NULL,
  `announcement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `semester`, `cource_name`, `announcement`) VALUES
(1, 6, 'Graph Theory', 'All students have to submit their INNOVATIVE assignment till 24-04-2022 '),
(3, 6, 'LAMP Technology', 'This is last day to upload their Innovative assignment, kindly upload till 1 AM'),
(17, 7, 'Compiler', 'All Student report Tommorow at N501');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `semester` decimal NOT NULL,
  `pra_no` int(20) NOT NULL,
  `cource_name` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `semester`, `pra_no`, `cource_name`, `date`) VALUES
(2, 6, 2, 'Graph Theory', '2023-05-01'),
(4, 6, 1, 'Financial Management', '2023-04-28'),
(6, 6, 5, 'LAMP Technology', '2023-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `cources`
--

CREATE TABLE `cources` (
  `semester` decimal NOT NULL,
  `cource_name` varchar(200) NOT NULL,
  `cource_policy` varchar(2000) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cources`
--

INSERT INTO `cources` (`semester`, `cource_name`, `cource_policy`, `id`) VALUES
(6, 'Chemical Analytical Techniques', 'https://drive.google.com/file/d/1nVY3NAVQ67_ZJ-ncWEUjJ1Wb2Bp0zBcx/view', 1),
(6, 'Cloud Computing', 'https://drive.google.com/file/d/1yjbHiNc06BO7w78EAYVj01zClwOZZCRl/view?usp=sharing', 2),
(6, 'Financial Management', 'https://drive.google.com/file/d/1ALLaYy5EeP1HfMOvWrZ-scAHnX6_inrI/view', 3),
(6, 'Graph Theory', 'https://drive.google.com/file/d/1LyPiiQP_FkO5357PsgDJxo1LJlO4PZrv/view', 4),
(6, 'LAMP Technology', 'https://drive.google.com/file/d/1eQDE9ayUdiH0ovFXR2rqIvm3PsngY14K/view', 6),
(6, 'Information Network Security', 'Cryptography and Web Security', 7);

-- --------------------------------------------------------

--
-- Table structure for table `submitted_assignment`
--

CREATE TABLE `submitted_assignment` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `cource_name` varchar(200) NOT NULL,
  `pra_no` int(20) NOT NULL,
  `submission_date` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submitted_assignment`
--

INSERT INTO `submitted_assignment` (`id`, `roll_no`, `cource_name`, `pra_no`, `submission_date`, `date`) VALUES
(10, '20BCE221', 'Financial Management', 1, '2023-04-27', '2023-04-28'),
(11, '20bce223', 'Graph Theory', 2, '2023-04-27', '2023-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `roll_no` varchar(20) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `semester` decimal NOT NULL,
  `cgpa` float NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`roll_no`, `userName`, `email_id`, `semester`, `cgpa`, `password`) VALUES
('19BCE002', 'Jane Doe', 'janedoe@example.com', 5, 8.5, 'mypassword456'),
('19BCE004', 'Alice Johnson', 'alicejohnson@example', 6, 9.1, 'mypasswordabc'),
('19BCE005', 'Samuel Lee', 'samuelle@example.com', 4, 7, 'mypassworddef'),
('20BCE209', 'kushal', 'kushal@gmail.com', 6, 8.1, 'kushal123'),
('20BCE221', 'Shrey', '20bce221@nirmauni.ac', 6, 8.36, 'Alpha77'),
('20bce223', 'Raj', 'raj@gmail.com', 6, 9.4, 'raj345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cources`
--
ALTER TABLE `cources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cource_name` (`cource_name`);

--
-- Indexes for table `submitted_assignment`
--
ALTER TABLE `submitted_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`roll_no`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cources`
--
ALTER TABLE `cources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `submitted_assignment`
--
ALTER TABLE `submitted_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
