-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 01:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petex_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `medicalRecord_id` int(9) NOT NULL,
  `pet_id` int(9) NOT NULL,
  `date` int(11) NOT NULL,
  `weight` double(8,2) NOT NULL,
  `diagnosis` text NOT NULL,
  `treatment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`medicalRecord_id`, `pet_id`, `date`, `weight`, `diagnosis`, `treatment`) VALUES
(201700001, 201700001, 1506240100, 5.00, 'Moved to common area.', '');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(9) NOT NULL,
  `user_id` int(9) DEFAULT NULL,
  `medicalRecord_id` int(9) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `specie` enum('canine','feline') NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `breed` varchar(255) NOT NULL,
  `status` enum('adoptable','nonAdoptable','adopted') NOT NULL,
  `neutered_spayed` tinyint(1) NOT NULL,
  `admission` enum('foster','parc') NOT NULL,
  `description` text NOT NULL,
  `history` text,
  `picture` blob,
  `added_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `user_id`, `medicalRecord_id`, `name`, `age`, `specie`, `sex`, `breed`, `status`, `neutered_spayed`, `admission`, `description`, `history`, `picture`, `added_at`, `updated_at`) VALUES
(201700001, 201700001, 201700001, 'Chubby', 3, 'canine', 'female', 'Aspin', 'nonAdoptable', 0, 'parc', 'White with brown-spot', 'Found with tattoo on forehead.', NULL, 1506239709, 1506239709),
(201700002, NULL, NULL, 'Missy', 5, 'canine', 'female', 'Aspin', 'adoptable', 0, 'parc', 'Furry, but lovely. :)', 'Energetic.', NULL, 1506250887, 1506250887);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(9) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_access` enum('admin','user') NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `picture` blob,
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `added_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `status`, `user_access`, `email`, `verification_code`, `contact_no`, `picture`, `address`, `province`, `city`, `brgy`, `added_at`, `updated_at`) VALUES
(201700001, 'Juan Carlo', 'Valencia', 'username_jc', 'password_jc', 1, 'admin', 'carlo.valencia066@gmail.com', NULL, '09066991021', NULL, '#61 San Francisco st.', 'Metro Manila', 'Valenzuela', 'karuhatan', 1506239785, 1506239785),
(201700002, 'Angelo Markus', 'Zaguirre', 'username_markus', 'username_markus', 1, 'user', 'abzaguirre', NULL, '09066991022', NULL, '#56 San Domingo st.', 'Metro Manila', 'Taguig', 'Salem', 1506242141, 1506242141);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`medicalRecord_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_medicalRecord_id` (`medicalRecord_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `medicalRecord_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201700002;
--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201700003;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201700003;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `fk_medicalRecord_id` FOREIGN KEY (`medicalRecord_id`) REFERENCES `medical_record` (`medicalRecord_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
