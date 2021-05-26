-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 08:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cicas`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

CREATE TABLE `accountants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unhash_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountants`
--

INSERT INTO `accountants` (`id`, `name`, `unhash_password`, `address`, `phone`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Samina khan', 'samina', 'Muzaffarabad Azad Kashmir', '03028765557', 'http://localhost/Clinic-Automation-system/assets/uploads/accountants/download_(2)1.jpg', 1, '2021-05-01 04:51:48', '2021-05-01 04:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-04-20 05:32:56', '2021-04-20 05:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `is_requested` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `time`, `is_requested`, `patient_id`, `doctor_id`, `created_at`, `updated_at`, `status`) VALUES
(15, '05/05/2021', '14:50', 0, 7, 16, '2021-05-05 09:46:58', '2021-05-05 09:46:58', 1),
(19, '05/14/2021', '18:57', 0, 9, 16, '2021-05-05 09:55:02', '2021-05-05 09:55:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bed_number` int(11) NOT NULL,
  `bed_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`bed_number`, `bed_type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'icu', '2021-05-04 02:09:33', '2021-05-04 02:09:33', 1),
(2, 'air mattresses', '2021-05-04 02:10:48', '2021-05-04 02:10:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bed_allotments`
--

CREATE TABLE `bed_allotments` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `bed_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `allotment_time` varchar(255) NOT NULL,
  `discharge_time` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bed_allotments`
--

INSERT INTO `bed_allotments` (`id`, `doctor_id`, `created_at`, `bed_id`, `patient_id`, `allotment_time`, `discharge_time`, `updated_at`, `status`) VALUES
(3, 16, '2021-05-04 08:33:11', 2, 10, '05/07/2021', '05/12/2021', '2021-05-04 08:33:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `send_by` varchar(255) NOT NULL,
  `recieved_by` varchar(255) NOT NULL,
  `msg` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `patient_id`, `doctor_id`, `send_by`, `recieved_by`, `msg`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 16, 'patient', 'doctor', 'Hello Sir!', 1, '2021-05-17 17:25:51', '2021-05-17 17:25:51'),
(2, 9, 16, 'patient', 'doctor', 'Hi Sir!', 1, '2021-05-17 17:25:51', '2021-05-17 17:25:51'),
(3, 9, 16, 'patient', 'doctor', 'What is your Name?', 1, '2021-05-17 17:25:51', '2021-05-17 17:25:51'),
(4, 9, 16, 'patient', 'doctor', 'How are you?', 1, '2021-05-17 17:25:51', '2021-05-17 17:25:51'),
(6, 9, 16, 'doctor', 'patient', 'I am fine', 1, '2021-05-18 17:25:51', '2021-05-18 17:25:51'),
(7, 9, 16, 'doctor', 'patient', 'What is your name', 1, '2021-05-18 05:55:59', '2021-05-18 05:55:59'),
(10, 9, 16, 'doctor', 'patient', 'My name is Ahtesham', 0, '2021-05-18 16:47:25', '2021-05-18 16:47:25'),
(11, 7, 16, 'doctor', 'patient', 'hello', 0, '2021-05-18 16:48:18', '2021-05-18 16:48:18'),
(12, 10, 16, 'doctor', 'patient', 'Assalam-wa-alaikum', 0, '2021-05-18 16:54:09', '2021-05-18 16:54:09'),
(13, 10, 16, 'doctor', 'patient', 'hdhfjsdkhfjk', 1, '2021-05-18 17:09:25', '2021-05-18 17:09:25'),
(14, 7, 16, 'doctor', 'patient', 'Mein kal a jaonga', 0, '2021-05-18 17:12:10', '2021-05-18 17:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`, `status`) VALUES
(7, 'Cardiology', 'http://localhost/Clinic-Automation-system/assets/uploads/departments/2.png', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '2021-04-04 05:00:00', '2021-04-04 05:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department_facilities`
--

CREATE TABLE `department_facilities` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_facilities`
--

INSERT INTO `department_facilities` (`id`, `department_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(19, 7, 'Facility 1', 'Facility 1 Des', 1, '2021-04-05 06:34:07', '2021-04-05 06:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_reports`
--

CREATE TABLE `diagnosis_reports` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `report_file_type` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis_reports`
--

INSERT INTO `diagnosis_reports` (`id`, `doctor_id`, `patient_id`, `time`, `date`, `report_type`, `report_file`, `report_file_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(14, 16, 7, '11:18', '04/29/2021', 'sperm_test', '', 'doc', '<p>jkfklgjfklgjkld</p>', 1, '2021-05-17 06:15:44', '2021-05-17 06:15:44'),
(15, 16, 7, '11:18', '04/29/2021', 'sperm_test', '', 'doc', '<p>jkfklgjfklgjkld</p>', 1, '2021-05-17 06:15:44', '2021-05-17 06:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unhash_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `profile` longtext NOT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `googleplus_link` varchar(255) DEFAULT NULL,
  `Linkedin_link` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `unhash_password`, `address`, `phone`, `department_id`, `profile`, `fb_link`, `twitter_link`, `googleplus_link`, `Linkedin_link`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Ahtesham ul haq', 'ahtesham', 'Mohalla Khyzrabad Khushab street no.3 Khushab', '03120881044', 7, '                                                                                                                                                                                                        \r\n                                                \r\n                                                \r\n                                                \r\n                                                \r\n                                                \r\n                                                                                                                                                                                                                                                                                                                                                                                                                                                            \r\n                                                \r\n                                                \r\n                                                \r\n                        <p style=\"padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 27px; font-family: Colfax, Helvetica, Arial, sans-serif; vertical-align: baseline; border: 0px; color: rgb(84, 107, 129);\">The Individual doctor\'s profile page will give all the professional details which they wish to display on the site. It will also host links to the articles and videos published by the doctor. This is the page through which the users can decide to post a specific query or book a direct consultation to a doctor.</p><p style=\"padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 27px; font-family: Colfax, Helvetica, Arial, sans-serif; vertical-align: baseline; border: 0px; color: rgb(84, 107, 129);\">Each and every Doctor can maintain their profile to represent in the iCliniq web page or <b>Application. The Doctor will be able to edit the profile at any time using the “Update Profile” option in the doctor\'s dashboard. In the Doctor\'s Profile, the user can view the below details.</b></p><ul style=\"padding: 0px 0px 0px 1.25rem; margin: 1.25rem 0px 1.875rem 1.25rem; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 20px; font-family: Colfax, Helvetica, Arial, sans-serif; font-size: 13px; vertical-align: baseline; border: 0px; list-style-position: initial; list-style-image: initial; color: rgb(84, 107, 129);\"><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Doctor Name with Qualification</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Specialty</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Photo</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Specialized Treatments</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Professional Bio</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Consulting Languages</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Experience in Industry</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Academic Details</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Profile Video</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Awards & Publications</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Clinic Details</li><li style=\"padding: 0px; margin: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 27px; font-family: inherit; font-size: 1rem; vertical-align: baseline; border: 0px; list-style: disc;\">Recent Articles</li></ul>                        \r\n                        \r\n                    \r\n                    \r\n                    \r\n                    \r\n                                                                                                                                                                                                                                                                                                                                                                                            \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                                                                                                                                                                                    ', 'www.fb/michel.com', 'www.Twitter /ahtesham.com', 'www.g+/ahtesham.com', 'www.Linkedin/ahtesham.com', 'http://localhost/Clinic-Automation-system/assets/uploads/doctors/depositphotos_33044395-stock-photo-doctor-smiling3.jpg', 1, '2021-04-29 23:29:39', '2021-04-29 23:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `title` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) DEFAULT NULL,
  `backgroundColor` varchar(255) NOT NULL DEFAULT '#28a745',
  `borderColor` varchar(255) DEFAULT NULL,
  `allDay` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`title`, `start`, `end`, `backgroundColor`, `borderColor`, `allDay`, `url`, `id`) VALUES
('Ahmad Operation', '1620154800000', '1620327600000', 'rgb(60, 141, 188)', 'rgb(60, 141, 188)', 'true', NULL, 8),
('Send documents to John.', '1619982000000', '1619982000000', 'rgb(26, 179, 148)', 'rgb(26, 179, 148)', 'true', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorists`
--

CREATE TABLE `laboratorists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unhash_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratorists`
--

INSERT INTO `laboratorists` (`id`, `name`, `unhash_password`, `address`, `phone`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Asif Shazad', 'asif', 'Khushab Pakistan', '03007678654', 'http://localhost/Clinic-Automation-system/assets/uploads/laboratorists/cytotechnology-career-3782668_0012-hero-mobile.jpg', 1, '2021-05-01 04:50:36', '2021-05-01 04:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unhash_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `name`, `unhash_password`, `address`, `phone`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Ms Shylla Raza', 'shylla', 'Peshawar Pakistan', '03458777922', 'http://localhost/Clinic-Automation-system/assets/uploads/nurses/Unitex-Nursing-Shortage-11.jpg', 1, '2021-05-01 04:39:20', '2021-05-01 04:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unhash_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `unhash_password`, `address`, `phone`, `birth_date`, `age`, `gender`, `blood_group`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Tanveer Ali 2', 'tanveer', 'Lahore Pakistan                                                ', '03120881044', '2006-06-14', 15, 'female', 'O+', 'http://localhost/Clinic-Automation-system/assets/uploads/patients/download_(3)1.jpg', 1, '2021-05-01 04:38:14', '2021-05-01 04:38:14'),
(9, 'Tanzilla wahab', 'tanzilla', 'MZD', '03338678922', '10/28/2009', 10, 'female', 'O-', 'http://localhost/Clinic-Automation-system/assets/uploads/patients/download_(1)2.jpg', 1, '2021-05-04 07:00:55', '2021-05-04 07:00:55'),
(10, 'Hamza Shahbaz', 'hamza', 'khushab pakistan', '0346789229', '05/04/2021', 22, 'male', 'AB+', 'http://localhost/Clinic-Automation-system/assets/uploads/patients/robot.jpg', 1, '2021-05-06 06:50:03', '2021-05-06 06:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists`
--

CREATE TABLE `pharmacists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unhash_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacists`
--

INSERT INTO `pharmacists` (`id`, `name`, `unhash_password`, `address`, `phone`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Nawaz Ahmad', 'nawaz', 'Sargodha Pakistan', '03472327723', 'http://localhost/Clinic-Automation-system/assets/uploads/pharmacists/download2.jpg', 1, '2021-05-01 04:49:23', '2021-05-01 04:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `case_history` longtext NOT NULL,
  `meditation` longtext NOT NULL,
  `note` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `doctor_id`, `date`, `time`, `case_history`, `meditation`, `note`, `status`, `created_at`, `updated_at`) VALUES
(9, 7, 16, '05/20/2021', '04:14', 'Tanveer Medical History', 'Tanveer Medical History                                                                ', 'Tanveer Medical History                                                            ', 1, '2021-05-17 06:15:11', '2021-05-17 06:15:11'),
(10, 9, 16, '05/27/2021', '11:42', 'dsgfdjfjsdlkf', 'dfjsdklfjklsdjfkljl', 'djkfhsdjkfhjksdhfk', 1, '2021-05-17 06:38:37', '2021-05-17 06:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unhash_password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `name`, `unhash_password`, `address`, `phone`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Ayesha Khalid', 'ayesha', 'Peshawar Pakistan', '03427654708', 'http://localhost/Clinic-Automation-system/assets/uploads/receptionists/Receptionist.jpg', 1, '2021-05-01 04:52:50', '2021-05-01 04:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `report_file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `doctor_id`, `patient_id`, `type`, `date`, `description`, `report_file_path`, `created_at`, `updated_at`, `status`) VALUES
(2, 16, 9, 'birth_report', '05/06/2021', 'Birth Report for Tanzilla wahab', '', '2021-05-06 06:48:16', '2021-05-06 06:48:16', 1),
(3, 16, 10, 'death_report', '05/06/2021', 'Death Day for Hamza Shahbaz', '', '2021-05-06 06:51:22', '2021-05-06 06:51:22', 1),
(6, 16, 10, 'operation_report', '05/12/2021', 'Opr report', '', '2021-05-17 05:53:25', '2021-05-17 05:53:25', 1),
(7, 16, 7, 'operation_report', '05/29/2021', 'jshfgjhfjkghjk', '', '2021-05-17 06:42:44', '2021-05-17 06:42:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `system_name` varchar(255) NOT NULL,
  `system_title` varchar(255) NOT NULL,
  `system_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `system_currency` varchar(255) NOT NULL,
  `system_email` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_name`, `system_title`, `system_address`, `phone`, `system_currency`, `system_email`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Clinic Automation System', 'Clinic Automation System', 'www.AhteshamProjects.com', '+923120881044', 'rs', 'freelancerahtesham@gmail.com', 'http://localhost/Clinic-Automation-system/assets/uploads/system/2.png', '2021-03-28 13:48:55', '2021-03-28 13:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `online_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `profile_id`, `online_status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$qCq5zhx1QwIeyHJAJUODz.8YA6DETf0NnYEpajZIhkhOg3ZzBAjSe', 'admin', 1, 0, '2021-04-20 05:32:56', '2021-04-20 05:32:56'),
(13, 'ahtesham@gmail.com', '$2y$10$pquEPVtrni.Q25JCKy118Oi6VROplmTGtlaUf4H6K.h6Wpa/xS94a', 'doctor', 16, 1, '2021-04-29 23:29:39', '2021-04-29 23:29:39'),
(14, 'tanveer2@gmail.com', '$2y$10$vAOCDd7M0FRBd6m5SeCfO.3Og6yhkwNqukZDYx0ibDtcnz0d0qlEG', 'patient', 7, 0, '2021-05-01 04:38:15', '2021-05-01 04:38:15'),
(15, 'shylla@gmail.com', '$2y$10$ZZHxiUVrFgl5jM5mHB9jOOifmmNVZHMo6W267PzW2bapdGNJ7tyhC', 'nurse', 6, 0, '2021-05-01 04:39:20', '2021-05-01 04:39:20'),
(16, 'nawaz@gmail.com', '$2y$10$nFleSD9IA0MsVNKMwxfLouIc0rArUCNWmlcSBs/png2zJWqRzmY52', 'pharmacist', 7, 0, '2021-05-01 04:49:23', '2021-05-01 04:49:23'),
(17, 'asif@gmail.com', '$2y$10$4/5ZnRS1I0aDuPCVoukvEOCLOONHlsFehL5z.oqnlLNbB/oBAz6qC', 'laboratorist', 5, 0, '2021-05-01 04:50:36', '2021-05-01 04:50:36'),
(18, 'samina@gmail.com', '$2y$10$xTCOkUeiLzUAkEk.q3194OASJBSr2ulySqrTAONCflQi0oiDnmsMa', 'accountant', 5, 0, '2021-05-01 04:51:49', '2021-05-01 04:51:49'),
(19, 'ayesha@gmail.com', '$2y$10$TOGkCpnX0CghUY9gMZcFWed/Q.BH9PJKLtvvh5Ve4vTT19nvDVp7q', 'receptionist', 4, 0, '2021-05-01 04:52:50', '2021-05-01 04:52:50'),
(21, 'tanzila@gmail.com', '$2y$10$rMaJh5H5uHAPZbKrpeParuSH2rFc2kBK8SPHC0A54hQgTzhUmanoy', 'patient', 9, 0, '2021-05-04 07:00:55', '2021-05-04 07:00:55'),
(22, 'hamza@gmail.com', '$2y$10$6qWTI3sEHNWMnBTqw/.39unoprB.hRJskRa2rLgriaHLZr2rX/Jo6', 'patient', 10, 0, '2021-05-06 06:50:03', '2021-05-06 06:50:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountants`
--
ALTER TABLE `accountants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bed_number`);

--
-- Indexes for table `bed_allotments`
--
ALTER TABLE `bed_allotments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_facilities`
--
ALTER TABLE `department_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `diagnosis_reports`
--
ALTER TABLE `diagnosis_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorists`
--
ALTER TABLE `laboratorists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `accountants`
--
ALTER TABLE `accountants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `bed_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bed_allotments`
--
ALTER TABLE `bed_allotments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `department_facilities`
--
ALTER TABLE `department_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `diagnosis_reports`
--
ALTER TABLE `diagnosis_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laboratorists`
--
ALTER TABLE `laboratorists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pharmacists`
--
ALTER TABLE `pharmacists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department_facilities`
--
ALTER TABLE `department_facilities`
  ADD CONSTRAINT `department_facilities_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
