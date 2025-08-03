-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 08:41 AM
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
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `become_a_donor`
--

CREATE TABLE `become_a_donor` (
  `ID` int(11) NOT NULL,
  `Full_name` varchar(55) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `become_a_donor`
--

INSERT INTO `become_a_donor` (`ID`, `Full_name`, `email`, `blood_group`, `phone_number`, `location`) VALUES
(1, 'mamun', 'alm90459@gmail.com', 'O+', 2147483647, 'chittagong'),
(2, 'mamun', 'alm90459@gmail.com', 'O+', 2147483647, 'chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `blood_request_form`
--

CREATE TABLE `blood_request_form` (
  `ID` int(11) NOT NULL,
  `full_name` varchar(55) NOT NULL,
  `age` int(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_request_form`
--

INSERT INTO `blood_request_form` (`ID`, `full_name`, `age`, `blood_group`, `location`, `phone_number`, `Date`, `message`) VALUES
(1, 'Masum', 30, 'A-', 'chittagong', 188888888, '2025-06-26', 'Hello'),
(2, 'mamun', 33, 'A+', 'chittagong', 515477444, '2025-06-04', 'jjjj'),
(4, 'farhad hossain', 22, 'B+', 'cumilla cantonment', 1717919940, '2026-11-06', 'need for my beta'),
(5, 'farhad hossain', 44, 'A+', 'chittagong', 2147483647, '2025-06-24', 'trtrrtr'),
(6, 'farhad hossain', 55, 'A+', 'cumilla cantonment', 1839515470, '2025-06-24', 'vvvvvv'),
(7, 'Masum', 50, 'A+', 'chittagong', 4445666, '2025-06-26', 'Hello'),
(8, 'Al mamun', 12, 'AB-', 'Dhaka', 2147483647, '2025-06-26', 'ddf'),
(9, 'Abdullah ', 33, 'O+', 'Dhaka', 1866418423, '2025-08-03', 'want blood emergency');

-- --------------------------------------------------------

--
-- Table structure for table `plasma_form`
--

CREATE TABLE `plasma_form` (
  `ID` int(11) NOT NULL,
  `Full_name` varchar(20) NOT NULL,
  `Age` int(10) NOT NULL,
  `Gender` varchar(67) NOT NULL,
  `Blood_group` varchar(10) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Phone_number` int(15) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `hospital_name` varchar(55) NOT NULL,
  `relation_to_patient` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plasma_form`
--

INSERT INTO `plasma_form` (`ID`, `Full_name`, `Age`, `Gender`, `Blood_group`, `Location`, `Phone_number`, `Date`, `hospital_name`, `relation_to_patient`, `message`) VALUES
(2, 'Al Mamun', 11, 'Male', 'O+', 'cumilla cantonment', 555, '2025-06-24', 'Dhaka medical', 'Relative', 'be carefull'),
(3, 'Abdullah al mamun', 57, 'Male', 'O+', 'Dhaka', 1866418423, '2025-06-26', 'Dhaka medical', 'Friend', 'Emergency'),
(4, 'masum', 21, 'Male', 'AB+', 'cumilla', 1766710124, '2025-07-14', 'Dhaka medical', 'Friend', 'xyz'),
(5, 'Abdullah', 87, 'Male', 'B+', 'Dhaka', 987, '2025-08-03', 'comilla medical', 'Father', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `ID` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ID`, `full_name`, `username`, `phone_number`, `email`, `password`, `gender`) VALUES
(1, 'Abdullah Al Mamun', 'Mamun', 1866418423, 'alm90459@gmail.com', '$2y$10$eheh', 'Male'),
(3, 'mamun', 'Mamun', 1866418428, '12@gmail.com', '$2y$10$JGSU', 'Male'),
(4, 'mamun', 'Mamun', 1866418428, '12@gmail.com', '$2y$10$9N0U', 'Male'),
(5, 'a', 'a', 1866418422, 'alm903459@gmail.com', '$2y$10$ktzx', 'Female'),
(6, 'farhad hossain', 'farhad', 1717370350, 'farhadhossain@gmail.com', '$2y$10$kWzH', 'Male'),
(7, 'farhad hossain', 'farhad', 1717370350, 'farhadhossain@gmail.com', '$2y$10$qYjq', 'Male'),
(8, 'Al masum', 'masum', 98874847, 'alm@gmail.com', '$2y$10$Dz/M', 'Male'),
(9, 'mamun', 'a', 111111, 'alm90459@gmail.com', '$2y$10$Zmap', 'Male'),
(10, 'q', 'q', 343434343, 'q@gmail.com', '$2y$10$IaEV', 'Female'),
(11, 'w', 'w', 222, 'w@gmail.com', '$2y$10$Ilku', 'Male'),
(12, 'c', 'c', 0, 'c@gmail.com', '$2y$10$4ZxY', 'Female'),
(13, 's', 's', 1866418428, 'alm90459@gmail.com', '$2y$10$sbFJsPLrzo5Jn27d9Sw56e/k4KIihkT9C2sOs6QPZ1cm4KlRAhE4W', 'Female'),
(14, 'e', 'e', 44444, 'md9957419@gmail.com', 'e', 'Female'),
(15, 'Abdullah Al mamun', 'Al mamun', 1866418423, 'alm9045d9@gmail.com', 'mamun', 'Male'),
(16, 'Al masum', 'masum', 7777, 'alm90459@gmail.com', 'q', 'Male'),
(17, 'Fardin Faraz', 'F', 0, 'far@gmail.com', 'f', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `thalassemia_blood_form`
--

CREATE TABLE `thalassemia_blood_form` (
  `ID` int(11) NOT NULL,
  `patient_name` varchar(40) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `type_of_thalassemia` varchar(50) NOT NULL,
  `contact_person` varchar(15) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `location` varchar(270) NOT NULL,
  `hospital_name` varchar(500) NOT NULL,
  `units` int(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `recurring` varchar(300) NOT NULL,
  `urgency_level` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thalassemia_blood_form`
--

INSERT INTO `thalassemia_blood_form` (`ID`, `patient_name`, `age`, `gender`, `blood_group`, `type_of_thalassemia`, `contact_person`, `phone_number`, `location`, `hospital_name`, `units`, `date`, `recurring`, `urgency_level`, `message`) VALUES
(1, 'mamun', 33, 'Male', 'O+', 'Beta Thalassemia Major', 'friend', 8989, 'chittagong', 'Dhaka medical', 1, '2025-06-04', 'Yes', 'Low', '34333f'),
(2, 'j', 555, 'Male', 'AB+', 'Beta Thalassemia Major', 'friend', 2147483647, 'chittagong', 'Dhaka medical', 1, '2025-06-04', 'Yes', 'High', 'gfrtg'),
(3, 'Al mamun', 50, 'Male', 'O-', 'Beta Thalassemia Major', 'friend', 44444, 'Khulna', 'Dhaka medical', 35, '2025-06-24', 'Yes', 'Low', 'Emergency'),
(4, 'k', 44, 'Female', 'B+', 'Beta Thalassemia Major', 'father', 8787876, 'Khulna', 'khulna medical', 8, '2025-08-03', 'No', 'High', 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `become_a_donor`
--
ALTER TABLE `become_a_donor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blood_request_form`
--
ALTER TABLE `blood_request_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `plasma_form`
--
ALTER TABLE `plasma_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thalassemia_blood_form`
--
ALTER TABLE `thalassemia_blood_form`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `become_a_donor`
--
ALTER TABLE `become_a_donor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_request_form`
--
ALTER TABLE `blood_request_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plasma_form`
--
ALTER TABLE `plasma_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `thalassemia_blood_form`
--
ALTER TABLE `thalassemia_blood_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
