-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2016 at 11:27 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kandepohe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `phone`, `email`, `message`) VALUES
(1, 0, 'ss', 123456, 'ss@gmail.com', 'call me at day time only'),
(2, 3, 'Shivangi Naik', 7385455311, 'shivangi123@gmail.com', 'CALL ME AT AFTERNOON ONLY');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `education_area` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `education_area`, `education`, `start_date`, `end_date`, `institute`, `result`, `place`) VALUES
(1, 3, 'Computers', 'MCA', '2014-06-24', '2017-06-24', 'ZIBACAR', '75', 'Pune'),
(2, 3, 'Computers', 'Bsc', '2011-06-24', '2014-05-24', 'ZIBACAR', '88', 'Pune'),
(3, 3, 'HSC', 'Science', '2009-06-06', '2011-04-02', 'ZIBACAR', '88', 'Pune'),
(4, 3, 'SSC', 'SSC', '2008-06-25', '2009-06-30', 'ZIBACAR', '88', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `venue` text NOT NULL,
  `description` text NOT NULL,
  `organised_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `name`, `type`, `is_active`) VALUES
(1, 'self', 'profile_for', 1),
(2, 'brother', 'profile_for', 1),
(3, 'Daughter', 'profile_for', 1),
(4, 'Son', 'profile_for', 1),
(5, 'Sister', 'profile_for', 1),
(6, 'Marathi', 'mother_tongue', 1),
(7, 'Hindi', 'mother_tongue', 1),
(8, 'Kannada', 'mother_tongue', 1),
(9, 'Telugu', 'mother_tongue', 1),
(10, 'Tamil', 'mother_tongue', 1),
(11, 'Unmarried', 'marital_status', 1),
(13, 'Widowed', 'marital_status', 1),
(14, 'Divorced', 'marital_status', 1),
(15, 'Seperated', 'marital_status', 1),
(16, 'A+', 'blood_group', 1),
(17, 'A-', 'blood_group', 1),
(18, 'B+', 'blood_group', 1),
(19, 'B-', 'blood_group', 1),
(20, 'O+', 'blood_group', 1),
(21, 'O-', 'blood_group', 1),
(22, 'AB+', 'blood_group', 1),
(23, 'AB-', 'blood_group', 1),
(24, 'Anuradha/Anusham/Anizham', 'nakshatra', 1),
(25, 'Ardra/Thiruvathira', 'nakshatra', 1),
(26, 'Ashlesha/Ayilyam', 'nakshatra', 1),
(27, 'Ashwini/Ashwathi', 'nakshatra', 1),
(28, 'Bharani', 'nakshatra', 1),
(29, 'Chitra/Chitha', 'nakshatra', 1),
(30, 'Dhanista/Avittam', 'nakshatra', 1),
(31, 'Hastha/Atham', 'nakshatra', 1),
(32, 'Jyesta / Kettai', 'nakshatra', 1),
(33, 'Krithika/Karthika', 'nakshatra', 1),
(34, 'Makha/Magam', 'nakshatra', 1),
(35, 'Moolam/Moola', 'nakshatra', 1),
(36, 'Mrigasira/Makayiram', 'nakshatra', 1),
(37, 'Poorvabadrapada/Puratathi', 'nakshatra', 1),
(38, 'Poorvapalguni/Puram/Pubbhe', 'nakshatra', 1),
(39, 'Poorvashada/Pooradam', 'nakshatra', 1),
(40, 'Punarvasu/Punarpusam', 'nakshatra', 1),
(41, 'Pushya/Poosam/Pooyam', 'nakshatra', 1),
(42, 'Revathi', 'nakshatra', 1),
(43, 'Rohini', 'nakshatra', 1),
(44, 'Shatataraka/Sadayam/Satabishek', 'nakshatra', 1),
(45, 'Shravan/Thiruvonam', 'nakshatra', 1),
(46, 'Swati/Chothi', 'nakshatra', 1),
(47, 'Uttarabadrapada/Uthratadhi', 'nakshatra', 1),
(48, 'Uttarapalguni/Uthram', 'nakshatra', 1),
(49, 'Uttarashada/Uthradam', 'nakshatra', 1),
(50, 'Vishaka/Vishakam', 'nakshatra', 1),
(51, 'Mesh (Aries)', 'rashi', 1),
(52, 'Vrishabh (Taurus)', 'rashi', 1),
(53, 'Mithun (Gemini)', 'rashi', 1),
(54, 'Karka (Cancer)', 'rashi', 1),
(55, 'Simha (Leo)', 'rashi', 1),
(56, 'Kanya (Virgo)', 'rashi', 1),
(57, 'Tula (Libra)', 'rashi', 1),
(58, 'Vrischika (Scorpio)', 'rashi', 1),
(59, 'Dhanu (Sagittarious)', 'rashi', 1),
(60, 'Makar (Capricorn)', 'rashi', 1),
(61, 'Kumbha (Aquarious)', 'rashi', 1),
(62, 'Meen (Pisces)', 'rashi', 1),
(63, 'Manushya', 'gan', 1),
(64, 'Dev', 'gan', 1),
(65, 'Rakshas', 'gan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `gender` enum('m','f') NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `complextion` varchar(255) DEFAULT NULL,
  `built` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `sub_caste` varchar(255) DEFAULT NULL,
  `diet` varchar(255) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `birthtime` time DEFAULT '00:00:00',
  `rashi` varchar(255) DEFAULT NULL,
  `nakshatra` varchar(255) DEFAULT NULL,
  `charan` int(11) DEFAULT NULL,
  `nadi` varchar(255) DEFAULT NULL,
  `gan` varchar(255) DEFAULT NULL,
  `gotra` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `father` varchar(255) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `brothers` int(11) DEFAULT NULL,
  `sisters` int(11) DEFAULT NULL,
  `expected_caste` varchar(255) DEFAULT NULL,
  `expected_min_age` int(11) DEFAULT NULL,
  `expected_max_age` int(11) DEFAULT NULL,
  `expected_min_height` float DEFAULT NULL,
  `expected_max_height` float DEFAULT NULL,
  `expected_education` varchar(255) DEFAULT NULL,
  `expected_occupation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `name`, `profile_image`, `date_of_birth`, `marital_status`, `gender`, `country`, `state`, `city`, `mobile`, `height`, `weight`, `blood_group`, `complextion`, `built`, `religion`, `caste`, `sub_caste`, `diet`, `birthplace`, `birthtime`, `rashi`, `nakshatra`, `charan`, `nadi`, `gan`, `gotra`, `education`, `occupation`, `income`, `father`, `mother`, `brothers`, `sisters`, `expected_caste`, `expected_min_age`, `expected_max_age`, `expected_min_height`, `expected_max_height`, `expected_education`, `expected_occupation`) VALUES
(1, 5, 'ssss', 'profile_image_493004432.png', NULL, 'Unmarried', 'm', '', '', '', NULL, NULL, 0, 'A+', '', '', '', '', '', '', '', NULL, '', '', NULL, '', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, '', ''),
(2, 2, 'sumit', 'profile_image_1172802515.png', NULL, '11', 'm', 'india', 'maharashtra', 'Pune', 7385455311, 5.8, 0, '17', '', '', '', '', '', '', '', NULL, '', '', NULL, '', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, '', ''),
(3, 1, 'shivangi naik', 'profile_image_425866421.jpg', '18-8-1994', 'Unmarried', 'm', 'india', 'maharashtra', 'Pune', 7385455311, 5.9, 56, 'A+', '', '', '', '', '', '', '', '00:00:00', 'Mesh (Aries)', 'Chitra/Chitha', NULL, '', 'Manushya', '', '', '', '1 lac and above', 'Nagnath Naik', 'Padmini Naik', 1, 1, '', 25, 28, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile_promoted`
--

CREATE TABLE `profile_promoted` (
  `id` bigint(20) NOT NULL,
  `profile_id` bigint(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` bigint(20) NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `receiver_id` bigint(20) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `image_file` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `caption`, `image_file`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(2, 'Millions of verified Members', 'Best Webportal for matrimonial', 'slider_image_1414597588.jpg', 1, 0, NULL, 0, '2016-12-08 16:39:53', 0),
(3, 'Hello', 'heloo', 'slider_image_1729862223.jpg', 0, 0, NULL, 0, '2016-12-09 03:06:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` bigint(20) NOT NULL,
  `groom_id` int(11) NOT NULL,
  `bride_id` int(11) NOT NULL,
  `marriage_of_this_groom` varchar(255) NOT NULL,
  `setteled_with_this_bride` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `marriage_date` date NOT NULL,
  `success_story` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `profile_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_tongue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `profile_for`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `mother_tongue`, `status`, `created_at`, `updated_at`) VALUES
(1, 'self', 'sumit', 'TFT6vGjS-d10iiF7_EeXUFEeAsxpLxjd', '$2y$13$U3D4kGvMI.PNFOndrpCR..Rm7NqPZKXWU./xYB5uHZo0ZEA1Aw4t2', NULL, 'ssumit@gmail.com', 'Marathi', 10, 1481088063, 1481088063),
(2, '1', 'shivangi', 'yjRQ1Zyfh0Ml1Q7_yreHHYEgEuqrx-Gs', '$2y$13$2eaLcjpzdUaJA6OPYo3Yb.vu9Ju856Iemk/YSNuo2GiA0TT5luexK', NULL, 'shiva@GMAIL.COM', '1', 10, 1481088174, 1481088174),
(3, '1', 'irfan', 'JU8CY0Y0rBdt1uNovDOA78B2gLbQvEdY', '$2y$13$.toPS/evIstvsWslYiIyHekfLMqzbp6ifE.rIhSkjQLHAj4QpdR1W', NULL, 'irfan@gmail.com', '2', 10, 1481088304, 1481088304),
(4, '1', 'sss', 'm8lGYJ4T4IDzdWxBYrNH_K2eh0GhhHfu', '$2y$13$vqOgjs6Y8kd1SmnIeGipR.0obgdhH72SWw1JCNplNh92XOaczNRse', NULL, 'ssumit123@gmail.com', '1', 10, 1481088877, 1481088877),
(5, '1', 'poonam', 'eyPdRi66ANIn84G_wMSNTxqj1q0TWiLy', '$2y$13$zl2st4mQIUveldYBfnAH3uivLvQyL3PVZ5ocKCfVhrSFqBxG0HRJ.', NULL, 'poonam@gmail.com', '1', 10, 1481090434, 1481090434);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_promoted`
--
ALTER TABLE `profile_promoted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profile_promoted`
--
ALTER TABLE `profile_promoted`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
