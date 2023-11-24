-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2023 at 04:28 PM
-- Server version: 8.0.30
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eloan_psic`
--

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name_e`, `name_u`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Al Baraka Bank (Pakistan) Limited', 'البرکا بینک (پاکستان) لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(2, 'Allied Bank Limited', 'الائیڈ بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(3, 'Apna Microfinance Bank', 'اپنا مائیکرو فنانس بینک', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(4, 'Askari Bank Limited', 'عسکری بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(5, 'Bank Al-Habib Limited', 'بینک الحبیب لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(6, 'Bank Alfalah Limited', 'بینک الفلاح لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(7, 'Bank Islamic Pakistan Limited', 'بینکاسلامی پاکستان لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(8, 'Burj Bank Limited', 'برج بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(9, 'Citi Bank N.A.', 'سٹی بینک N.A.', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(10, 'Deutsche Bank A.G.', 'ڈوئچے بینک A.G.', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(11, 'Dubai Islamic Bank Pakistan Limited', 'دبئی اسلامک بینک پاکستان لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(12, 'FINCA Microfinance Bank', 'FINCA مائیکروفنانس بینک', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(13, 'Faysal Bank Limited', 'فیسال بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(14, 'First Women Bank Limited', 'فرسٹ ویمن بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(15, 'Habib Bank Limited', 'حبیب بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(16, 'Habib Metropolitan Bank Limited', 'حبیب میٹرو پولیٹن بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(17, 'Industrial and Commercial Bank of China', 'چین کا صنعتی اور تجارتی بینک', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(18, 'Industrial Development Bank of Pakistan', 'انڈسٹریل ڈویلپمنٹ بینک آف پاکستان', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(19, 'JS Bank Limited', 'جے ایس بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(20, 'MCB Bank Limited', 'ایم سی بی بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(21, 'MCB Islamic Bank Limited', 'ایم سی بی اسلامک بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(22, 'Meezan Bank Limited', 'میزان بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(23, 'National Bank of Pakistan', 'نیشنل بینک آف پاکستان', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(24, 'Limited Mobilink Microfinance Bank', 'محدود موبی لنک مائکرو فنانس بینک', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(25, 'NIB Bank Limited', 'این آئی بی بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(26, 'S.M.E. Bank Limited', 'S.M.E. بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(27, 'Samba Bank Limited', 'سمبا بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(28, 'Silk Bank Limited', 'سلک بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(29, 'Sindh Bank Limited', 'سندھ بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(30, 'Soneri Bank Limited', 'سونری بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(31, 'Summit Bank Limited', 'سمٹ بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(32, 'The Bank of Khyber', 'بینک آف خیبر', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(33, 'Standard Chartered Bank (Pakistan) Limited', 'اسٹینڈرڈ چارٹرڈ بینک (پاکستان) لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(34, 'The Bank of Punjab', 'بینک آف پنجاب', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(35, 'Telenor Microfinance Bank', 'ٹیلی نار مائکرو فنانس بینک', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(36, 'U Microfinance Bank United Bank', 'یو مائکرو فنانس بینک یونائیٹڈ بینک', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(37, 'The Bank of Tokyo-Mitsubishi Limited', 'بینک آف ٹوکیو - دوستسبشی لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(38, 'The Punjab Provincial Cooperative Bank Limited', 'پنجاب صوبائی کوآپریٹو بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(39, 'United Bank Limited', 'یونائیٹڈ بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19'),
(40, 'Zarai Taraqiati Bank Limited', 'زرائ تراقیاتی بینک لمیٹڈ', NULL, 1, '2020-01-10 10:38:19', '2020-01-10 10:38:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
