-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2018 at 07:08 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itec`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `correct` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Test'),
(2, 'Test 2'),
(3, 'Test 3');

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE `country_code` (
  `id` int(11) NOT NULL,
  `country` varchar(15) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `code` varchar(3) NOT NULL,
  `prefix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`id`, `country`, `code`, `prefix`) VALUES
(1, 'Afganistan', 'AF', 93),
(2, 'Albania', 'AL', 355),
(3, 'Algeria', 'DZ', 213),
(4, 'Samoa Americană', 'AS', 1),
(5, 'Andorra', 'AD', 376),
(6, 'Angola', 'AO', 244),
(7, 'Anguilla', 'AI', 1),
(8, 'Antigua şi Barb', 'AG', 1),
(9, 'Argentina', 'AR', 54),
(10, 'Armenia', 'AM', 374),
(11, 'Aruba', 'AW', 297),
(12, 'Ascension', 'AC', 247),
(13, 'Australia', 'AU', 61),
(14, 'Teritoriile ext', 'AX', 672),
(15, 'Austria', 'AT', 43),
(16, 'Azerbaidjan', 'AZ', 994),
(17, 'Bahamas', 'BS', 1),
(18, 'Bahrain', 'BH', 973),
(19, 'Bangladesh', 'BD', 880),
(20, 'Barbados', 'BB', 1),
(21, 'Belarus', 'BY', 375),
(22, 'Belgia', 'BE', 32),
(23, 'Belize', 'BZ', 501),
(24, 'Benin', 'BJ', 229),
(25, 'Bermuda', 'BM', 1),
(26, 'Bhutan', 'BT', 975),
(27, 'Bolivia', 'BO', 591),
(28, 'Bosnia şi Herţe', 'BA', 387),
(29, 'Botswana', 'BW', 267),
(30, 'Brazilia', 'BR', 55),
(31, 'Insulele virgin', 'VG', 1),
(32, 'Brunei Darussal', 'BN', 673),
(33, 'Bulgaria', 'BG', 359),
(34, 'Burkina Faso', 'BF', 226),
(35, 'Burundi', 'BI', 257),
(36, 'Cambodgia', 'KH', 855),
(37, 'Camerun', 'CM', 237),
(38, 'Canada', 'CA', 1),
(39, 'Capul Verde', 'CV', 238),
(40, 'Insulele Cayman', 'KY', 1),
(41, 'Republica Centr', 'CF', 236),
(42, 'Ciad', 'TD', 235),
(43, 'Chile', 'CL', 56),
(44, 'China', 'CN', 86),
(45, 'Columbia', 'CO', 57),
(46, 'Comore', 'KM', 269),
(47, 'Congo', 'CG', 242),
(48, 'Insulele Cook', 'CK', 682),
(49, 'Costa Rica', 'CR', 506),
(50, 'Coasta de Filde', 'CI', 225),
(51, 'Croaţia', 'HR', 385),
(52, 'Cuba', 'CU', 53),
(53, 'Cipru', 'CY', 357),
(54, 'Republica Cehă', 'CZ', 420),
(55, 'Republica Democ', 'CD', 243),
(56, 'Danemarca', 'DK', 45),
(57, 'Diego Garcia', 'DG', 246),
(58, 'Djibouti', 'DJ', 253),
(59, 'Dominica', 'DM', 1),
(60, 'Republica Domin', 'DO', 1),
(61, 'Timorul de Est', 'TL', 670),
(62, 'Ecuador', 'EC', 593),
(63, 'Egipt', 'EG', 20),
(64, 'El Salvador', 'SV', 503),
(65, 'Guineea Ecuator', 'GQ', 240),
(66, 'Eritreea', 'ER', 291),
(67, 'Estonia', 'EE', 372),
(68, 'Etiopia', 'ET', 251),
(69, 'Insulele Falkla', 'FK', 500),
(70, 'Insulele Feroe', 'FO', 298),
(71, 'Fiji', 'FJ', 679),
(72, 'Finlanda', 'FI', 358),
(73, 'Franţa', 'FR', 33),
(74, 'Guyana Franceză', 'GF', 594),
(75, 'Polinezia Franc', 'PF', 689),
(76, 'Gabon', 'GA', 241),
(77, 'Gambia', 'GM', 220),
(78, 'Georgia', 'GE', 995),
(79, 'Germania', 'DE', 49),
(80, 'Ghana', 'GH', 233),
(81, 'Gibraltar', 'GI', 350),
(82, 'Grecia', 'GR', 30),
(83, 'Groenlanda', 'GL', 299),
(84, 'Grenada', 'GD', 1),
(85, 'Guadelupa', 'GP', 590),
(86, 'Guam', 'GU', 1),
(87, 'Guatemala', 'GT', 502),
(88, 'Guineea', 'GN', 224),
(89, '', 'GW', 245),
(90, 'Guyana', 'GY', 592),
(91, 'Haiti', 'HT', 509),
(92, 'Honduras', 'HN', 504),
(93, 'Hong Kong', 'HK', 852),
(94, 'Ungaria', 'HU', 36),
(95, 'Islanda', 'IS', 354),
(96, 'India', 'IN', 91),
(97, 'Indonezia', 'ID', 62),
(98, 'Iran', 'IR', 98),
(99, 'Irak', 'IQ', 964),
(100, 'Irlanda', 'IE', 353),
(101, 'Israel', 'IL', 972),
(102, 'Italia', 'IT', 39),
(103, 'Jamaica', 'JM', 1),
(104, 'Japan', 'JP', 81),
(105, 'Iordania', 'JO', 962),
(106, 'Kazahstan', 'KZ', 7),
(107, 'Kenya', 'KE', 254),
(108, 'Kiribati', 'KI', 686),
(109, 'Kuweit', 'KW', 965),
(110, 'Kârgâzstan', 'KG', 996),
(111, 'Laos', 'LA', 856),
(112, 'Letonia', 'LV', 371),
(113, 'Liban', 'LB', 961),
(114, 'Lesotho', 'LS', 266),
(115, 'Liberia', 'LR', 231),
(116, 'Libia', 'LY', 218),
(117, 'Liechtenstein', 'LI', 423),
(118, 'Lituania', 'LT', 370),
(119, 'Luxemburg', 'LU', 352),
(120, 'Macao', 'MO', 853),
(121, 'Macedonia', 'MK', 389),
(122, 'Madagascar', 'MG', 261),
(123, 'Malawi', 'MW', 265),
(124, 'Malaysia', 'MY', 60),
(125, 'Maldive', 'MV', 960),
(126, 'Mali', 'ML', 223),
(127, 'Malta', 'MT', 356),
(128, 'Insulele Marsha', 'MH', 692),
(129, 'Martinica', 'MQ', 596),
(130, 'Mauritania', 'MR', 222),
(131, 'Mauritius', 'MU', 230),
(132, 'Mexic', 'MX', 52),
(133, 'Micronezia', 'FM', 691),
(134, 'Moldova', 'MD', 373),
(135, 'Monaco', 'MC', 377),
(136, 'Mongolia', 'MN', 976),
(137, 'Muntenegru', 'ME', 382),
(138, 'Montserrat', 'MS', 1),
(139, 'Maroc', 'MA', 212),
(140, 'Mozambic', 'MZ', 258),
(141, 'Myanmar', 'MM', 95),
(142, 'Namibia', 'NA', 264),
(143, 'Nauru', 'NR', 674),
(144, 'Nepal', 'NP', 977),
(145, 'Olanda', 'NL', 31),
(146, '', 'AN', 599),
(147, 'Noua Caledonie', 'NC', 687),
(148, 'Noua Zeelandă', 'NZ', 64),
(149, 'Nicaragua', 'NI', 505),
(150, 'Niger', 'NE', 227),
(151, 'Nigeria', 'NG', 234),
(152, 'Niue', 'NU', 683),
(153, 'Coreea de Nord', 'KP', 850),
(154, 'Insulele Marian', 'MP', 1),
(155, 'Norvegia', 'NO', 47),
(156, 'Oman', 'OM', 968),
(157, 'Pakistan', 'PK', 92),
(158, 'Palau', 'PW', 680),
(159, 'Palestina', 'PS', 970),
(160, 'Panama', 'PA', 507),
(161, 'Papua Noua Guin', 'PG', 675),
(162, 'Paraguay', 'PY', 595),
(163, 'Peru', 'PE', 51),
(164, 'Filipine', 'PH', 63),
(165, 'Polonia', 'PL', 48),
(166, 'Portugalia', 'PT', 351),
(167, 'Porto Rico', 'PR', 1),
(168, 'Qatar', 'QA', 974),
(169, 'Insulele Reunio', 'RE', 262),
(170, 'România', 'RO', 40),
(171, 'Rusia', 'RU', 7),
(172, 'Rwanda', 'RW', 250),
(173, 'Sfânta Elena', 'SH', 290),
(174, 'Sfântul Cristof', 'KN', 1),
(175, 'Sfânta Lucia', 'LC', 1),
(176, 'Saint Pierre şi', 'PM', 508),
(177, 'Sfântul Vicenţi', 'VC', 1),
(178, 'Samoa', 'WS', 685),
(179, 'San Marino', 'SM', 378),
(180, 'Sao Tome şi Pri', 'ST', 239),
(181, 'Arabia Saudită', 'SA', 966),
(182, 'Senegal', 'SN', 221),
(183, 'Serbia', 'RS', 381),
(184, 'Seychelles', 'SC', 248),
(185, 'Sierra Leone', 'SL', 232),
(186, 'Singapore', 'SG', 65),
(187, 'Slovacia', 'SK', 421),
(188, 'Slovenia', 'SI', 386),
(189, 'Insulele Solomo', 'SB', 677),
(190, 'Somalia', 'SO', 252),
(191, 'Africa de Sud', 'ZA', 27),
(192, 'Coreea de Sud', 'KR', 82),
(193, 'Spania', 'ES', 34),
(194, 'Sri Lanka', 'LK', 94),
(195, 'Sudan', 'SD', 249),
(196, 'Suriname', 'SR', 597),
(197, 'Swaziland', 'SZ', 268),
(198, 'Suedia', 'SE', 46),
(199, 'Elveţia', 'CH', 41),
(200, 'Siria', 'SY', 963),
(201, 'Taiwan', 'TW', 886),
(202, 'Tadjikistan', 'TJ', 992),
(203, 'Tanzania', 'TZ', 255),
(204, 'Thailanda', 'TH', 66),
(205, 'Togo', 'TG', 228),
(206, 'Tokelau', 'TK', 690),
(207, 'Tonga', 'TO', 676),
(208, 'Trinidad-Tobago', 'TT', 1),
(209, 'Tunisia', 'TN', 216),
(210, 'Turcia', 'TR', 90),
(211, 'Turkmenistan', 'TM', 993),
(212, 'Insulele Turks ', 'TC', 1),
(213, 'Tuvalu', 'TV', 688),
(214, 'Insulele Virgin', 'VI', 1),
(215, 'Uganda', 'UG', 256),
(216, 'Ucraina', 'UA', 380),
(217, 'Emiratele Arabe', 'AE', 971),
(218, 'Marea Britanie', 'GB', 44),
(219, 'Statele Unite', 'US', 1),
(220, 'Uruguay', 'UY', 598),
(221, 'Uzbekistan', 'UZ', 998),
(222, 'Vanuatu', 'VU', 678),
(223, 'Oraşul Vatican', 'VA', 379),
(224, 'Venezuela', 'VE', 58),
(225, 'Vietnam', 'VN', 84),
(226, 'Wallis şi Futun', 'WF', 681),
(227, 'Yemen', 'YE', 967),
(228, 'Zambia', 'ZM', 260),
(229, 'Zimbabwe', 'ZW', 263);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `score` int(2) NOT NULL DEFAULT '0',
  `expire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `status`, `score`, `expire`, `date`) VALUES
(1, 'First event', 1, 0, '0000-00-00 00:00:00', '2018-11-25 01:45:39'),
(3, 'Manual', 1, 0, '0000-00-00 00:00:00', '2018-11-25 02:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `events_questions`
--

CREATE TABLE `events_questions` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_questions`
--

INSERT INTO `events_questions` (`id`, `event`, `question`) VALUES
(1, 1, 6),
(2, 1, 2),
(3, 1, 3),
(4, 1, 5),
(5, 1, 7),
(6, 1, 4),
(7, 2, 6),
(8, 2, 2),
(9, 2, 8),
(10, 2, 3),
(11, 2, 5),
(12, 2, 7),
(13, 2, 4),
(14, 3, 3),
(15, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `events_users`
--

CREATE TABLE `events_users` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `questions` varchar(500) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `completed` datetime DEFAULT CURRENT_TIMESTAMP,
  `expire_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_users`
--

INSERT INTO `events_users` (`id`, `user`, `event`, `status`, `questions`, `score`, `completed`, `expire_time`) VALUES
(3, 2, 1, 0, '5,4,6,7,3', 0, '2018-11-25 04:41:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qrcodes`
--

CREATE TABLE `qrcodes` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `used` int(11) NOT NULL DEFAULT '0',
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qrcodes`
--

INSERT INTO `qrcodes` (`id`, `event`, `code`, `used`, `user`) VALUES
(8, 3, 'a8533e9f0b1aea4196a05e37a1b009c5', 0, NULL),
(9, 3, '8911dfa452b91901b82b4e1da5450bad', 0, NULL),
(10, 3, '9a9fe6bb524667d9005ced7845f4109c', 0, NULL),
(11, 3, '390e75816dfd5b165522d6e0354de516', 0, NULL),
(12, 3, 'e06ca5cd31c4cdadefb683192c191c01', 0, NULL),
(13, 3, '3e46a8a9411999ee65e1f1ff33e215c1', 0, NULL),
(14, 3, 'f74a5201dae475db32494a1f007e81bf', 0, NULL),
(15, 3, '942035f4b934502472080b20e2354f9c', 0, NULL),
(16, 3, 'fead713ea8991561de3246f7bf552a22', 0, NULL),
(17, 3, 'f8a162fd8fb59da9ba944464175f0798', 0, NULL),
(18, 3, 'f7fdcf3b45de867ecb510e1ef27138c3', 0, NULL),
(19, 3, '3c52135f4324d110ee34ab00796e0e79', 0, NULL),
(20, 3, '7bda3ec983546c8ecf39c217c8ffc83e', 0, NULL),
(21, 3, 'b971c037177453d5dd3ad5521d0b8fe4', 0, NULL),
(22, 3, '25ed8d2d8976cb469db1c85f5ee97a1a', 0, NULL),
(23, 3, '4a2cd00d807b3d321d66689ea6c6017f', 0, NULL),
(24, 3, '16a3c941e401fb86e2871d765cc3b85d', 0, NULL),
(25, 3, 'cfcd9e3d897e3be1a277fbf1b81db41a', 0, NULL),
(26, 3, '4f30230e216cde85e2650d70e118699c', 0, NULL),
(27, 3, '459ea1bfcd0ec341407f59deeee8cc7f', 0, NULL),
(28, 3, 'fd486822c171499df2882d782a93205f', 0, NULL),
(29, 1, 'd23a21c0d79a58a24e32b2c139fa81c9', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `difficulty` int(2) NOT NULL DEFAULT '2',
  `answer0` text NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `check0` int(2) NOT NULL DEFAULT '0',
  `check1` int(2) NOT NULL DEFAULT '0',
  `check2` int(2) NOT NULL DEFAULT '0',
  `check3` int(2) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `category`, `type`, `time`, `difficulty`, `answer0`, `answer1`, `answer2`, `answer3`, `check0`, `check1`, `check2`, `check3`, `date`) VALUES
(1, 'Question 0', 1, 1, 300, 3, 'a(correct)', 'b', 'c(correct)', 'd', 1, 0, 1, 0, '2018-11-24 22:55:13'),
(2, 'Question 1', 1, 1, 300, 3, 'a(correct)', 'b', 'c(correct)', 'd', 1, 0, 1, 0, '2018-11-24 22:55:13'),
(3, 'Question 2', 1, 1, 300, 3, 'a(correct)', 'b', 'c(correct)', 'd', 1, 0, 1, 0, '2018-11-24 22:55:13'),
(4, 'Hello world!', 3, 2, 0, 3, 'Hello world!', '', '', '', 0, 0, 0, 0, '2018-11-24 22:55:37'),
(5, '2+2=', 2, 0, 520, 1, '3', '4', '5', '6', 0, 1, 0, 0, '2018-11-24 22:56:13'),
(6, '2+3=', 1, 2, 0, 1, '5', '', '', '', 0, 0, 0, 0, '2018-11-24 22:56:38'),
(7, '3*3=', 3, 0, 0, 2, '1', '2', '9', '6', 0, 0, 1, 0, '2018-11-24 22:58:01'),
(8, 'Do you know how to write the alphabet?', 1, 2, 300, 3, 'yes', '', '', '', 0, 0, 0, 0, '2018-11-24 22:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPhone` varchar(20) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `smsStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `tokenSMS` varchar(100) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `tag_mail` enum('Y','N') NOT NULL DEFAULT 'Y',
  `current_event` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPhone`, `userPass`, `userStatus`, `smsStatus`, `tokenCode`, `tokenSMS`, `admin`, `tag_mail`, `current_event`) VALUES
(2, 'IonuÈ› Popescu', 'ionutpopescu10@yahoo.com', '784129540', '05e766f3ea8bf121b5e2f3c725f0f598', 'Y', 'Y', '4f358066170fd1cc5f11a9e57567b11a', 'eaf94561c9540fed57e3918a32a81e45', 1, 'Y', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_questions`
--
ALTER TABLE `events_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_users`
--
ALTER TABLE `events_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrcodes`
--
ALTER TABLE `qrcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events_questions`
--
ALTER TABLE `events_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events_users`
--
ALTER TABLE `events_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qrcodes`
--
ALTER TABLE `qrcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
