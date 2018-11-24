-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 10:33 AM
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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tag_mail` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPhone`, `userPass`, `userStatus`, `smsStatus`, `tokenCode`, `tokenSMS`, `admin`, `tag_mail`) VALUES
(2, 'IonuÈ› Popescu', 'ionutpopescu10@yahoo.com', '784129540', '05e766f3ea8bf121b5e2f3c725f0f598', 'Y', 'Y', '4f358066170fd1cc5f11a9e57567b11a', 'eaf94561c9540fed57e3918a32a81e45', 1, 'Y');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
