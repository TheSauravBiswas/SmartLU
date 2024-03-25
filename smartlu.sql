-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 04:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartlu`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `sid` varchar(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `orig` varchar(20) NOT NULL,
  `emergency` varchar(10) NOT NULL,
  `fees` int(5) NOT NULL,
  `dregistrar` varchar(20) NOT NULL,
  `acontroller` varchar(20) NOT NULL,
  `librarian` varchar(20) NOT NULL,
  `hstatus` varchar(20) NOT NULL,
  `dfa` varchar(20) NOT NULL,
  `cstatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `permanent` varchar(100) NOT NULL,
  `present` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gnumber` int(11) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `blood` varchar(3) NOT NULL,
  `reg` int(10) NOT NULL,
  `sscyear` int(4) NOT NULL,
  `sscboard` varchar(12) NOT NULL,
  `sscins` varchar(100) NOT NULL,
  `sscgroup` varchar(10) NOT NULL,
  `sscroll` int(6) NOT NULL,
  `sscgpa` varchar(4) NOT NULL,
  `hscyear` int(4) NOT NULL,
  `hscboard` varchar(12) NOT NULL,
  `hscins` varchar(100) NOT NULL,
  `hscgroup` varchar(10) NOT NULL,
  `hscroll` int(6) NOT NULL,
  `hscgpa` varchar(5) NOT NULL,
  `quota` varchar(100) NOT NULL,
  `quotadoc` varchar(25) NOT NULL,
  `waiver` varchar(20) NOT NULL,
  `ap` varchar(25) NOT NULL,
  `gp` varchar(25) NOT NULL,
  `ssctrans` varchar(30) NOT NULL,
  `hsctrans` varchar(30) NOT NULL,
  `testimonial` varchar(30) NOT NULL,
  `gidcard` varchar(25) NOT NULL,
  `bc` varchar(25) NOT NULL,
  `password` varchar(5) NOT NULL,
  `admission` varchar(20) NOT NULL,
  `fees` int(6) NOT NULL,
  `status` varchar(20) NOT NULL,
  `gradyear` int(4) NOT NULL,
  `gradins` varchar(100) NOT NULL,
  `gradsub` varchar(100) NOT NULL,
  `gradroll` varchar(20) NOT NULL,
  `gradgpa` varchar(5) NOT NULL,
  `gradtrans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sid` varchar(16) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `batch` int(3) NOT NULL,
  `fees` int(6) NOT NULL,
  `hstatus` varchar(20) NOT NULL,
  `dregistrar` varchar(20) NOT NULL,
  `librarian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `name`, `sid`, `dept`, `program`, `batch`, `fees`, `hstatus`, `dregistrar`, `librarian`) VALUES
(1, 'Md. Afjal Hossain', '1932020053', 'Computer Science and Engineering', 'B.Sc in CSE', 52, 100, 'Approved', 'Approved', 'Approved'),
(2, 'Md. Shazadur Rahman', '1932020013', 'Computer Science and Engineering', 'B.Sc in CSE', 52, 100, 'Approved', 'Approved', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `uid` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `supple` varchar(20) NOT NULL,
  `program` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `batch` int(3) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `codename` varchar(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `indx` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `currentcr` float NOT NULL,
  `completecr` float NOT NULL,
  `percr` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `uid`, `email`, `dept`, `supple`, `program`, `level`, `batch`, `validity`, `codename`, `status`, `indx`, `password`, `currentcr`, `completecr`, `percr`) VALUES
(1, 'Saurav Biswas', 1932020001, 'cse_1932020001@lus.ac.bd', 'Computer Science and Engineering', '', 'B.Sc in CSE', 'Undergraduate', 52, 'Fall-2024', '', 'Student', '', 'optimus', 11.5, 140, 1900),
(2, 'Syeda Tamanna Alam Monisha', 0, 'monisha_cse@lus.ac.bd', 'Computer Science and Engineering', '', '', '', 0, '', 'STA', 'Lecturer', 'CT', 'sustian', 0, 0, 0),
(3, 'Rumel M. S. Rahman Pir', 0, 'head_cse@lus.ac.bd', 'Computer Science and Engineering', '', '', '', 0, '', 'RMS', 'Head', '', 'iutian', 0, 0, 0),
(4, 'Dr. Mohammad Mostak Ahmed', 0, 'controller@lus.ac.bd', 'Controller of Examinations', '', '', '', 0, '', '', 'Controller of Examinations', '', 'ctrl+A', 0, 0, 0),
(5, 'Md. Afjal Hossain', 1932020053, 'cse_1932020053@lus.ac.bd', 'Computer Science and Engineering', '', 'B.Sc in CSE', 'Undergraduate', 52, 'Fall-2024', '', 'Student', '', 'kamalbazar', 2, 150, 1900),
(6, 'S. M. Tanbinul Haque', 0, 'tanbinul_eee@lus.ac.bd', 'Electrical and Electronic Engineering', '', '', '', 0, '', 'STH', 'Lecturer', 'CT', 'aiubian', 0, 0, 0),
(7, 'Rumel M. S. Rahman Pir', 0, 'rumelpir@lus.ac.bd', 'Computer Science and Engineering', '', '', '', 0, '', 'RMS', 'Associate Professor', 'CT', 'iutian2', 0, 0, 0),
(8, 'Rana M Luthfur Rahman Pir', 0, 'ranapir_cse@lus.ac.bd', 'Computer Science and Engineering', '', '', '', 0, '', 'RLP', 'Assistant Professor', 'CT', 'queensland', 0, 0, 0),
(9, 'Ishmam Ahmed Chowdhury', 0, 'ishmamahmed_eee@lus.ac.bd', 'Electrical and Electronic Engineering', '', '', '', 0, '', 'IAC', 'Lecturer', 'CT', 'iutian3', 0, 0, 0),
(10, 'Rafiqul Islam', 0, 'rafiqulzyl@lus.ac.bd', 'Electrical and Electronic Engineering', '', '', '', 0, '', 'MRI', 'Assistant Professor', 'CT', 'sustian2', 0, 0, 0),
(11, 'Md. Shazadur Rahman', 1932020013, 'cse_1932020013@lus.ac.bd', 'Computer Science and Engineering', '', 'B.Sc in CSE', 'Undergraduate', 52, 'Fall-2024', '', 'Student', '', 'johnwick', 20, 130, 1900),
(15, 'Mr. Md. Kawser Hawlader', 0, 'admission@lus.ac.bd', 'Admission', '', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'Deputy Registrar', 'dregistrar', 'luadmit', 0, 0, 0),
(16, 'Md. Abdul Hayee Sameni', 0, 'librarian@lus.ac.bd', 'Library', '', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'Librarian', 'librarian', 'rkccl', 0, 0, 0),
(17, 'Mr. Md. Mofizul Islam', 0, 'registrar@lus.ac.bd', 'Registrar', '', '', '', 0, '', '', 'Registrar', 'registrar', 'mofiz', 0, 0, 0),
(18, 'Mr. Mohammad Kabir Ahmed', 0, 'director_fa@lus.ac.bd', 'Finance and Accounts', '', '', '', 0, '', '', 'Director, F&A', 'dfa', 'kabir', 0, 0, 0),
(19, 'Mr. Suranjan Das', 0, 'asst_controller@lus.ac.bd', 'Controller of Examinations', '', '', '', 0, '', '', 'Assistant Controller', 'acontroller', 'suranjan', 0, 0, 0),
(20, 'Sabia Akter Bhuiyan', 0, 'aktersabia@lus.ac.bd', 'Computer Science and Engineering', 'Member', '', '', 0, '', '', 'Assistant Professor', 'CT', 'maths', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lupay`
--

CREATE TABLE `lupay` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `uid` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dept` varchar(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pin` varchar(4) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `balance` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lupay`
--

INSERT INTO `lupay` (`id`, `name`, `uid`, `email`, `dept`, `status`, `pin`, `otp`, `balance`) VALUES
(1, 'Saurav Biswas', '1932020001', 'cse_1932020001@lus.ac.bd', 'CSE', 'Student', '1646', '190465', 100000),
(2, 'Md. Afjal Hossain', '1932020053', 'cse_1932020053@lus.ac.bd', 'CSE', 'Student', '5353', '705439', 95900),
(3, 'Md. Shazadur Rahman', '1932020013', 'cse_1932020013@lus.ac.bd', 'CSE', 'Student', '0200', '792051', 97000);

-- --------------------------------------------------------

--
-- Table structure for table `makeup`
--

CREATE TABLE `makeup` (
  `id` int(11) NOT NULL,
  `sid` varchar(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `ccode` varchar(8) NOT NULL,
  `ctitle` varchar(50) NOT NULL,
  `ctdept` varchar(100) NOT NULL,
  `cteacher` varchar(50) NOT NULL,
  `codename` varchar(5) NOT NULL,
  `exam` varchar(10) NOT NULL,
  `docp` varchar(100) NOT NULL,
  `date` varchar(12) NOT NULL,
  `time` varchar(10) NOT NULL,
  `ctstatus` varchar(20) NOT NULL,
  `hstatus` varchar(20) NOT NULL,
  `cstatus` varchar(20) NOT NULL,
  `fees` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makeup`
--

INSERT INTO `makeup` (`id`, `sid`, `name`, `semester`, `dept`, `ccode`, `ctitle`, `ctdept`, `cteacher`, `codename`, `exam`, `docp`, `date`, `time`, `ctstatus`, `hstatus`, `cstatus`, `fees`) VALUES
(1, '1932020001', 'Saurav Biswas', 'Fall-2023', 'Computer Science and Engineering', 'CSE-2233', 'Data Communication', 'Computer Science and Engineering', 'Syeda Tamanna Alam Monisha', 'STA', 'Mid-Term', 'files/makeup/1932020001Spring-2024Mid-TermCSE-2236.pdf', '2024-02-04', '10:00 AM', 'Approved', 'Approved', 'Approved', 0),
(2, '1932020001', 'Saurav Biswas', 'Spring-2024', 'Computer Science and Engineering', 'CSE-2236', 'Data Communication', 'Computer Science and Engineering', 'Syeda Tamanna Alam Monisha', 'STA', 'Mid-Term', 'files/makeup/1932020001Spring-2024Mid-TermCSE-2236.pdf', '2024-02-08', '10:00 AM', 'Approved', 'Approved', 'Approved', 2000),
(3, '1932020053', 'Md. Afjal Hossain', 'Spring-2024', 'Computer Science and Engineering', 'EEE-1221', 'Electrical Circuits', 'Electrical and Electronic Engineering', 'S. M. Tanbinul Haque', 'STH', 'Mid-Term', 'files/makeup/1932020053Spring-2024Mid-TermEEE-1221.pdf', '2024-02-24', '02:00 PM', 'Approved', 'Approved', 'Approved', 2000),
(4, '1932020001', 'Saurav Biswas', 'Spring-2024', 'Computer Science and Engineering', 'CSE-2231', 'Data Communication', 'Computer Science and Engineering', 'Syeda Tamanna Alam Monisha', 'STA', 'Mid-Term', 'files/makeup/1932020001Spring-2024Mid-TermCSE-2231.pdf', '2024-02-15', '10:00 AM', 'Approved', 'Approved', 'Approved', 2000),
(5, '1932020001', 'Saurav Biswas', 'Spring-2024', 'Computer Science and Engineering', 'CSE-1151', 'Discrete Mathematics', 'Computer Science and Engineering', 'Syeda Tamanna Alam Monisha', 'STA', 'Final', 'files/makeup/1932020001Spring-2024FinalCSE-1151.pdf', '2024-02-05', '02:00 PM', 'Approved', 'Approved', 'Approved', 3000),
(6, '1932020013', 'Md. Shazadur Rahman', 'Spring-2024', 'Computer Science and Engineering', 'CSE-1151', 'Discrete Mathematics', 'Computer Science and Engineering', 'Rumel M. S. Rahman Pir', 'RMS', 'Final', 'files/makeup/1932020013Spring-2024FinalCSE-1151.pdf', '2024-02-15', '10:00 AM', 'Approved', 'Approved', 'Approved', 3000),
(7, '1932020001', 'Saurav Biswas', 'Spring-2024', 'Computer Science and Engineering', 'CSE-2231', 'Discrete Mathematics', 'Computer Science and Engineering', 'Rumel M. S. Rahman Pir', 'RMS', 'Final', 'files/makeup/1932020001Spring-2024FinalCSE-2231.pdf', '2024-03-07', '10:00 AM', 'Approved', 'Approved', 'Approved', 2000),
(8, '1932020013', 'Md. Shazadur Rahman', 'Spring-2024', 'Computer Science and Engineering', 'CSE-2231', 'Discrete Mathematics', 'Computer Science and Engineering', 'Rumel M. S. Rahman Pir', 'RMS', 'Mid-Term', 'files/makeup/1932020013Spring-2024Mid-TermCSE-2231.pdf', '2024-03-14', '10:00 AM', 'Approved', 'Approved', 'Approved', 2000),
(9, '1932020001', 'Saurav Biswas', 'Spring-2024', 'Computer Science and Engineering', 'CSE-2231', 'Data Communication', 'Computer Science and Engineering', 'Syeda Tamanna Alam Monisha', 'STA', 'Mid-Term', 'files/makeup/1932020001Spring-2024Mid-TermCSE-2231.pdf', '0', '0', 'Pending', 'Pending', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spring2024`
--

CREATE TABLE `spring2024` (
  `id` int(11) NOT NULL,
  `sid` varchar(16) NOT NULL,
  `ccode` varchar(10) NOT NULL,
  `ctitle` varchar(100) NOT NULL,
  `credit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spring2024`
--

INSERT INTO `spring2024` (`id`, `sid`, `ccode`, `ctitle`, `credit`) VALUES
(1, '1932020001', 'EEE-1221', 'Electrical Circuits', 3),
(2, '1932020001', 'EEE-1222', 'Electrical Circuits Sessional', 1.5),
(3, '1932020001', 'CSE-3319', 'Software Engineering and Information System Design', 3),
(4, '1932020001', 'CSE-3320', 'Software Engineering and Information System Design Sessional', 1),
(5, '1932020001', 'CSE-4315', 'Computer Security and Cryptography', 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplement`
--

CREATE TABLE `supplement` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sid` varchar(16) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `completecr` float NOT NULL,
  `currentcr` float NOT NULL,
  `semester` varchar(20) NOT NULL,
  `ccode1` varchar(10) NOT NULL,
  `ctitle1` varchar(100) NOT NULL,
  `cr1` float NOT NULL,
  `ccode2` varchar(10) NOT NULL,
  `ctitle2` varchar(100) NOT NULL,
  `cr2` float NOT NULL,
  `ccode3` varchar(10) NOT NULL,
  `ctitle3` varchar(100) NOT NULL,
  `cr3` float NOT NULL,
  `ccode4` varchar(10) NOT NULL,
  `ctitle4` varchar(100) NOT NULL,
  `cr4` float NOT NULL,
  `totalcr` float NOT NULL,
  `hstatus` varchar(20) NOT NULL,
  `dfa` varchar(20) NOT NULL,
  `cstatus` varchar(20) NOT NULL,
  `totalfee` int(6) NOT NULL,
  `fees` int(6) NOT NULL,
  `assigned` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tuitionfees`
--

CREATE TABLE `tuitionfees` (
  `id` int(11) NOT NULL,
  `sid` varchar(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `batch` int(3) NOT NULL,
  `season` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `credit` float NOT NULL,
  `waiver` int(3) NOT NULL,
  `totalfee` int(6) NOT NULL,
  `otherfees` int(6) NOT NULL,
  `docp` varchar(50) NOT NULL,
  `hstatus` varchar(20) NOT NULL,
  `registrar` varchar(20) NOT NULL,
  `beforemid` int(6) NOT NULL,
  `aftermid` int(6) NOT NULL,
  `fees` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tuitionfees`
--

INSERT INTO `tuitionfees` (`id`, `sid`, `name`, `dept`, `program`, `batch`, `season`, `year`, `semester`, `credit`, `waiver`, `totalfee`, `otherfees`, `docp`, `hstatus`, `registrar`, `beforemid`, `aftermid`, `fees`) VALUES
(1, '1932020001', 'Saurav Biswas', 'Computer Science and Engineering', 'B.Sc in CSE', 52, 'spring', '2024', 'Spring-2024', 11.5, 10, 30000, 10000, 'files/seventy/1932020001Spring-2024.pdf', 'Not applied', 'Not applied', 30000, 0, 0),
(2, '1932020053', 'Md. Afjal Hossain', 'Computer Science and Engineering', 'B.Sc in CSE', 52, 'spring', '2024', 'Spring-2024', 2, 100, 10000, 10000, 'n/a', 'Not applied', 'Not applied', 10000, 0, 0),
(3, '1932020013', 'Md. Shazadur Rahman', 'Computer Science and Engineering', 'B.Sc in CSE', 52, 'spring', '2024', 'Spring-2024', 20, 10, 40000, 10000, 'n/a', 'Not applied', 'Not applied', 40000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `undergrad`
--

CREATE TABLE `undergrad` (
  `id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `permanent` varchar(100) NOT NULL,
  `present` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gnumber` int(11) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `blood` varchar(3) NOT NULL,
  `reg` int(10) NOT NULL,
  `sscyear` int(4) NOT NULL,
  `sscboard` varchar(12) NOT NULL,
  `sscins` varchar(100) NOT NULL,
  `sscgroup` varchar(10) NOT NULL,
  `sscroll` int(6) NOT NULL,
  `sscgpa` varchar(4) NOT NULL,
  `hscyear` int(4) NOT NULL,
  `hscboard` varchar(12) NOT NULL,
  `hscins` varchar(100) NOT NULL,
  `hscgroup` varchar(10) NOT NULL,
  `hscroll` int(6) NOT NULL,
  `hscgpa` varchar(5) NOT NULL,
  `quota` varchar(100) NOT NULL,
  `quotadoc` varchar(25) NOT NULL,
  `waiver` varchar(20) NOT NULL,
  `ap` varchar(25) NOT NULL,
  `gp` varchar(25) NOT NULL,
  `ssctrans` varchar(30) NOT NULL,
  `hsctrans` varchar(30) NOT NULL,
  `testimonial` varchar(30) NOT NULL,
  `gidcard` varchar(25) NOT NULL,
  `bc` varchar(25) NOT NULL,
  `password` varchar(5) NOT NULL,
  `admission` varchar(20) NOT NULL,
  `fees` int(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `undergrad`
--

INSERT INTO `undergrad` (`id`, `program`, `name`, `fname`, `mname`, `permanent`, `present`, `number`, `email`, `gnumber`, `dob`, `gender`, `blood`, `reg`, `sscyear`, `sscboard`, `sscins`, `sscgroup`, `sscroll`, `sscgpa`, `hscyear`, `hscboard`, `hscins`, `hscgroup`, `hscroll`, `hscgpa`, `quota`, `quotadoc`, `waiver`, `ap`, `gp`, `ssctrans`, `hsctrans`, `testimonial`, `gidcard`, `bc`, `password`, `admission`, `fees`, `status`) VALUES
(1, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(2, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(3, 'Choos', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(4, 'Choos', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(5, 'Choos', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'Tribal', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(6, 'Choos', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'Tribal', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(7, 'Choos', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'Siblings', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(8, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(9, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(10, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(11, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(12, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(13, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'Choose...', 'files/', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(14, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', 'files/FB_IMG_167794522813', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(15, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'Siblings', 'files/FB_IMG_167794527878', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(16, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(17, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', '', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(18, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', 'tmp', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(19, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', 'tmp', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(20, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', 'tmp', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(21, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', 'tmp', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(22, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'Siblings', 'files/WD_1411426157jpg', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(23, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', 'files/WD_1411426157.jpg', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(24, 'bba', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', 'FreedomFighter', 'files/WD_1411426157.jpeg', '', '', '', '', '', '', '', '', '0', '', 0, ''),
(25, '', '', '', '', '', '', 0, 'cse_1932020001@lus.ac.bd', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '72135', '', 0, ''),
(26, '', '', '', '', '', '', 0, '', 0, '', '', '', 0, 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '69315', '', 0, ''),
(27, 'bba', 'Saurav', 'Saurav', 'saurav', 'Modina Market, Sylhet', 'modina', 1834996175, 'cse_1932020001@lus.ac.bd', 1834996175, '2023-08-16', 'male', 'Cho', 1411426157, 0, 'Choose Board', '', 'Choose Gro', 0, '', 0, 'Choose Board', '', 'Choose Gro', 0, '', '', '', '', 'files/AP_1411426157.', 'files/GP_1411426157.', 'files/ST_1411426157.', 'files/HT_1411426157.', 'files/TM_1411426157.', 'files/GID_1411426157.', 'files/BC_1411426157.', '57206', '', 0, ''),
(28, 'bba', 'Saurav', 'Saurav', 'saurav', 'Modina Market, Sylhet', 'modina', 1834996175, 'cse_1932020001@lus.ac.bd', 1834996175, '2023-08-16', 'male', 'Cho', 1411426158, 0, 'Choose Board', '', 'Choose Gro', 0, '', 0, 'Choose Board', '', 'Choose Gro', 0, '', '', '', '', 'files/AP_1411426158.', 'files/GP_1411426158.', 'files/ST_1411426158.', 'files/HT_1411426158.', 'files/TM_1411426158.', 'files/GID_1411426158.', 'files/BC_1411426158.', '38470', '', 0, ''),
(29, 'bba', 'Saurav', 'Saurav', 'saurav', 'Modina Market, Sylhet', 'modina', 1834996175, 'cse_1932020001@lus.ac.bd', 1834996175, '2023-08-16', 'male', 'A+', 1411426159, 0, 'Choose Board', '', 'Choose Gro', 0, '', 0, 'Choose Board', '', 'Choose Gro', 0, '', 'FreedomFighter', 'files/WD_1411426159.', '', 'files/AP_1411426159.', 'files/GP_1411426159.', 'files/ST_1411426159.', 'files/HT_1411426159.', 'files/TM_1411426159.', 'files/GID_1411426159.', 'files/BC_1411426159.', '24319', '', 0, ''),
(30, 'Bache', 'afjal hossain', 'afjal hossain', 'afjal hossain', 'afjal', 'afjal', 1666666666, 'afjal@hossain.com', 1666666666, '2024-01-01', 'male', 'Cho', 1010101010, 2017, 'DIBS(Dhaka)', 'silonia', 'commerce', 193391, '5.00', 2019, 'DIBS(Dhaka)', 'sstc', 'science', 105609, '5.00', '', '', '', 'files/AP_1010101010.', 'files/GP_1010101010.', 'files/ST_1010101010.', 'files/HT_1010101010.', 'files/TM_1010101010.', 'files/GID_1010101010.', 'files/BC_1010101010.', '68372', '', 0, ''),
(31, 'Bache', 'afjal hossain', 'afjal hossain', 'afjal hossain', 'afjal', 'afjal', 1666666666, 'afjal@hossain.com', 1666666666, '2024-01-01', 'male', 'Cho', 1010101011, 2017, 'DIBS(Dhaka)', 'silonia', 'commerce', 193391, '5.00', 2019, 'DIBS(Dhaka)', 'sstc', 'science', 105609, '5.00', '', '', '', 'files/AP_1010101011.', 'files/GP_1010101011.', 'files/ST_1010101011.', 'files/HT_1010101011.', 'files/TM_1010101011.', 'files/GID_1010101011.', 'files/BC_1010101011.', '8546', 'Declined', 0, ''),
(32, 'B.Sc in Computer Science and Engineering', 'Saurav Biswas', 'Sudhangsu Biswas', 'Ratna Biswas', 'Modina Market, Sylhet', 'modina', 1834996175, 'cse_1932020001@lus.ac.bd', 1731440016, '2024-02-29', 'Male', 'B+', 1411426160, 2017, 'Comilla', 'Silonia High School', 'Science', 193391, '5.00', 2019, 'Sylhet', 'Sylhet Science and Technology College', 'Science', 105609, '5.00', 'None', '', '50', 'files/AP_1411426160.jpg', 'files/GP_1411426160.jpg', 'files/ST_1411426160.pdf', 'files/HT_1411426160.pdf', 'files/TM_1411426160.pdf', 'files/GID_1411426160.pdf', 'files/BC_1411426160.pdf', '63152', 'Approved', 0, 'ugapplicant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lupay`
--
ALTER TABLE `lupay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makeup`
--
ALTER TABLE `makeup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spring2024`
--
ALTER TABLE `spring2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplement`
--
ALTER TABLE `supplement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuitionfees`
--
ALTER TABLE `tuitionfees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undergrad`
--
ALTER TABLE `undergrad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lupay`
--
ALTER TABLE `lupay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `makeup`
--
ALTER TABLE `makeup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `spring2024`
--
ALTER TABLE `spring2024`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplement`
--
ALTER TABLE `supplement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tuitionfees`
--
ALTER TABLE `tuitionfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `undergrad`
--
ALTER TABLE `undergrad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
