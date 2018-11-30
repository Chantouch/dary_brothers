-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2018 at 12:51 PM
-- Server version: 5.6.41-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingk_dary`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `lft` int(10) UNSIGNED DEFAULT NULL,
  `rgt` int(10) UNSIGNED DEFAULT NULL,
  `depth` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `name`, `value`, `description`, `field`, `parent_id`, `lft`, `rgt`, `depth`, `active`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'App Name', 'Dary Brothers', 'Website name', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 2, 13, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(2, 'app_logo', 'Logo', 'storage/logo/logo-5bd3e985850f4.png', 'Website Logo', '{\"name\":\"value\",\"label\":\"Logo\",\"type\":\"image\",\"upload\":\"true\",\"disk\":\"uploads\",\"default\":\"app/default/logo.png\"}', 0, 3, 4, 1, 1, '2018-09-08 13:40:18', '2018-10-27 11:28:53'),
(3, 'app_slogan', 'App Slogan', 'Dary brothers sell type of products......', 'Website slogan (for Meta Title)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 5, 6, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(4, 'about_company', 'About Company', 'Dary brothers sell type of products......', 'Tell about your company profile', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 7, 8, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(5, 'app_email', 'Email', 'admin@darybrothers.biz', 'The email address that all emails from the contact form will go to.', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"email\"}', 0, 9, 10, 1, 1, '2018-09-08 13:40:18', '2018-09-28 23:59:28'),
(6, 'app_phone_number', 'Phone number', '(+855) (0) 17-67-69-53 & (+855) (0) 86-26-23-00', 'Website phone number', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 1, 11, 12, 1, 1, '2018-09-08 13:40:18', '2018-10-27 11:39:23'),
(7, 'activation_geolocation', 'Geolocation activation', '1', 'Before enabling this option you need to download the Maxmind database by following the documentation: http://www.bedigit.com/doc/geo-location/', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 14, 19, 1, 1, '2018-09-08 13:40:18', '2018-10-27 04:03:56'),
(8, 'company_address', 'Company Address', 'អាស័យដ្ឋាន៖ បុរីជារី-តុល លន ផ្ទះលេខ 36 បេ ភូមិក្រាំងដូនទៃ សង្កាត់ចោមចៅ ខណ្ឌពោធិសែនជ័យ ភ្នំពេញ។\r\n<br>\r\nទូរស័ព្ទលេខ៖​ 017 67 69 53 (cellcard) / 086 262 300 (smart)', 'Company address should be provide to show audients', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 15, 16, 1, 1, '2018-09-08 13:40:18', '2018-11-30 19:47:27'),
(9, 'contact_page', 'Contact page', '1', 'Show image background on contact list', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 17, 18, 1, 1, '2018-09-08 13:40:18', '2018-10-22 16:22:45'),
(10, 'about_page', 'About page', '1', 'Show image background on about list', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 20, 25, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(11, 'email_verification', 'Email verification required', '1', 'Email verification required', '{\"name\":\"value\",\"label\":\"Required\",\"type\":\"checkbox\"}', 10, 21, 22, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(12, 'vimeo_url', 'Vimeo - URL', '', 'Phone verification required', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 23, 24, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(13, 'activation_social_login', 'Social Login Activation', '1', 'Allow users to connect via social networks', '{\"name\":\"value\",\"label\":\"Required\",\"type\":\"checkbox\"}', 0, 38, 39, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(14, 'activation_facebook_comments', 'Facebook Comments activation', '1', 'Allow Facebook comments on single page', '{\"name\":\"value\",\"label\":\"Required\",\"type\":\"checkbox\"}', 0, 36, 37, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(15, 'show_powered_by', 'Show Powered by', '1', 'Show Powered by infos', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 26, 27, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(16, 'google_site_verification', 'Google site verification content', 'WwEx0_iOxqyGn862QQcnzB1Ou_GebSoSb7kRaROHOHw', 'Google site verification content', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 28, 31, 1, 1, '2018-09-08 13:40:18', '2018-10-27 15:18:01'),
(17, 'msvalidate', 'Bing site verification content', '2C2C51C2C6297DA2C6D01C73777B48C0', 'Bing site verification content', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 33, 34, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(18, 'alexa_verify_id', 'Alexa site verification content', NULL, 'Alexa site verification content', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 18, 35, 36, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(19, 'serp_left_sidebar', 'Left Sidebar in Search page', '0', 'Left Sidebar activation in Search page', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 29, 30, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(20, 'tracking_code', 'Tracking Code', '(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),   m=s.getElementsByTagName(o)[0];', 'Tracking Code (ex: Google Analytics Code)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"textarea\",\"hint\":\"Paste your Google Analytics (or other) tracking code here. This will be added into the footer. <br>Please <strong>do not</strong> inc', 0, 34, 35, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(21, 'facebook_page_url', 'Facebook - Page URL', 'https://web.facebook.com/turmerickhmer/', 'Website Facebook Page URL', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 40, 47, 1, 1, '2018-09-08 13:40:18', '2018-09-08 14:00:51'),
(22, 'facebook_page_id', 'Facebook - Page ID', '806182476160185', 'Website Facebook Page ID (Not username)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 41, 42, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(23, 'facebook_client_id', 'Facebook Client ID', '1906910106248873', 'Facebook Client ID', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 43, 44, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(24, 'facebook_client_secret', 'Facebook Client Secret', NULL, 'Facebook Client Secret', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 45, 46, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(25, 'google_client_id', 'Google Client ID', NULL, 'Google Client ID', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 48, 49, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(26, 'google_client_secret', 'Google Client Secret', NULL, 'Google Client Secret', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 53, 54, 2, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(27, 'googlemaps_key', 'Google Maps key', NULL, 'Google Maps key', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 55, 56, 2, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(28, 'twitter_url', 'Twitter - URL', 'https://twitter.com/DevidCs83', 'Website Twitter URL', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 50, 57, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(29, 'twitter_username', 'Twitter - Username', 'darybrothers', 'Website Twitter username', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 51, 52, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(30, 'twitter_client_id', 'Twitter Client ID', NULL, 'Twitter Client ID', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 53, 54, 1, 0, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(31, 'twitter_client_secret', 'Twitter Client Secret', NULL, 'Twitter Client Secret', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 55, 56, 1, 0, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(32, 'activation_recaptcha', 'Recaptcha activation', '1', 'Recaptcha activation', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 58, 63, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(33, 'recaptcha_public_key', 'reCAPTCHA public key', NULL, 'reCAPTCHA public key', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 59, 60, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(34, 'recaptcha_private_key', 'reCAPTCHA private key', NULL, 'reCAPTCHA private key', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 61, 62, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(35, 'mail_driver', 'Mail driver', 'smtp', 'e.g. smtp, mailgun, mandrill, ses, sparkpost, mail, sendmail', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"select_from_array\",\"options\":{\"smtp\":\"SMTP\",\"mailgun\":\"Mailgun\",\"mandrill\":\"Mandrill\",\"ses\":\"Amazon SES\",\"sparkpost\":\"Sparkpost\",\"mail\":\"PHP Mail\",\"sendmail\":\"Sendmail\"}}', 0, 64, 75, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(36, 'mail_host', 'Mail host', 'smtp.gmail.com', 'SMTP host', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 65, 66, 1, 1, '2018-09-08 13:40:18', '2018-09-27 15:38:37'),
(37, 'mail_port', 'Mail port', '587', 'SMTP port (e.g. 25, 587, ...)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 67, 68, 1, 1, '2018-09-08 13:40:18', '2018-09-27 15:39:30'),
(38, 'mail_encryption', 'Mail encryption', 'tls', 'SMTP encryption (e.g. tls, ssl, starttls)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 69, 70, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(39, 'mail_username', 'Mail username', 'chantouchsek.cs83@gmail.com', 'SMTP username', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 71, 72, 1, 1, '2018-09-08 13:40:18', '2018-09-27 15:39:14'),
(40, 'mail_password', 'Mail password', 'uvpvjvdlyyqvcbpq', 'SMTP password', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 73, 74, 1, 1, '2018-09-08 13:40:18', '2018-09-27 15:38:18'),
(41, 'mailgun_domain', 'Mailgun domain', NULL, 'Mailgun domain', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 76, 79, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(42, 'mailgun_secret', 'Mailgun secret', NULL, 'Mailgun secret', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 77, 78, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(43, 'mandrill_secret', 'Mandrill secret', NULL, 'Mandrill secret', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 80, 81, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(44, 'ses_key', 'SES key', NULL, 'SES key', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 82, 87, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(45, 'ses_secret', 'SES secret', NULL, 'SES secret', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 83, 84, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(46, 'ses_region', 'SES region', NULL, 'SES region', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 85, 86, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(47, 'instagram_url', 'Instagram - URL', 'https://www.instagram.com/naturalkhmer168/', 'Instagram Account name', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 97, 98, 1, 1, '2018-09-08 13:40:18', '2018-09-08 14:00:30'),
(48, 'youtube_url', 'Youtube - URL', 'https://www.youtube.com/channel/UCCi4xojXVftEUG29mG_4-LQ', 'Youtube channel', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 96, 99, 1, 1, '2018-09-08 13:40:18', '2018-09-08 14:01:03'),
(49, 'g_plus_url', 'Google plus', NULL, 'Google+ account', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 100, 101, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(50, 'app_cache_expiration', 'Cache Expiration Time', '60', 'Cache Expiration Time (in minutes)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 102, 103, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(51, 'app_cookie_expiration', 'Cookie Expiration Time', '2592000', 'Cookie Expiration Time (in seconde)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 111, 112, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(52, 'product_list', 'Product list', '1', 'Show image background on product list', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 113, 114, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(53, 'category_list', 'Category list', '1', 'Show image background on category list', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 115, 116, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(54, 'most_read_posts_number', 'Most read posts number', '6', 'Most read posts number at right side of single post', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 14, 15, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(55, 'show_post_on_googlemap', 'Show Ads on Google Maps', '0', 'Show Ads on Google Maps (Single page only)', '{\"name\":\"value\",\"label\":\"Show\",\"type\":\"checkbox\"}', 0, 22, 23, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(56, 'custom_css', 'Custom CSS', NULL, 'Custom CSS for your site', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"textarea\",\"hint\":\"Please <strong>do not</strong> include the &lt;style&gt; tags.\"}', 0, 124, 125, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(57, 'new_posts_number', 'New Posts number', '4', 'New post number at right side', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 23, 24, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(58, 'most_read', 'Most read', '5', 'Most read for an aritcle', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 6, 7, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(59, 'upload_max_file_size', 'Upload Max File Size', '2500', 'Upload Max File Size (in KB)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 25, 25, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(60, 'admin_email_notification', 'Admin Email Notification', '1', 'Send Email Notifications to the admins when ads was added or users was registered etc.', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 26, 33, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(61, 'payment_email_notification', 'Payment Email Notification', '1', 'Send Email Notifications to user and admins when payments was sent.', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 26, 33, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(62, 'posts_per_page', 'Post per page', '20', 'Number of posts per page (> 4 and < 40)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 18, 19, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(63, 'decimals_superscript', 'Decimals Superscript', '1', 'Decimals Superscript (For Price, Salary, etc.)', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 19, 19, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(64, 'simditor_wysiwyg', 'Simditor WYSIWYG Editor', '1', 'Simditor WYSIWYG Editor', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 19, 19, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(65, 'about_background', 'About background image', 'storage/background/background-5bd3e94c23b45.png', 'Show the image in about page', '{\"name\":\"value\",\"label\":\"Background\",\"type\":\"image\",\"upload\":\"true\",\"disk\":\"uploads\",\"default\":\"app/default/logo.png\"}', 0, 19, 19, 1, 1, '2018-09-08 13:40:18', '2018-10-27 11:27:56'),
(66, 'admin_skin', 'Admin Skin', 'skin-green-light', 'Admin Panel Skin', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"select_from_array\",\"options\":{\"skin-black\":\"Black\",\"skin-blue\":\"Blue\",\"skin-purple\":\"Purple\",\"skin-red\":\"Red\",\"skin-yellow\":\"Yellow\",\"skin-green\":\"Green\",\"skin-blue-light\":\"Blue light\",\"skin-black-light\":\"Black ligh', 0, 13, 13, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(67, 'upload_image_types', 'Upload Image Types', 'jpg,jpeg,gif,png', 'Upload image types (ex: jpg,jpeg,gif,png,...)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 20, 21, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(68, 'upload_file_types', 'Upload File Types', 'pdf,doc,docx,word,rtf,rtx,ppt,pptx,odt,odp,wps,jpeg,jpg,bmp,png', 'Upload file types (ex: pdf,doc,docx,odt,...)', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 20, 21, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(69, 'app_favicon', 'Favicon', 'storage/ico/ico-5bd3e976d2b28.png', 'Favicon (extension: png,jpg)', '{\"name\":\"value\",\"label\":\"Favicon\",\"type\":\"image\",\"upload\":\"true\",\"disk\":\"uploads\",\"default\":\"app/default/ico/favicon.png\"}', 0, 4, 4, 1, 1, '2018-09-08 13:40:18', '2018-10-27 11:28:38'),
(70, 'social_activated', 'Social Activated', '1', 'Social link will show in somewhere in website.', '{\"name\":\"value\",\"label\":\"Activation\",\"type\":\"checkbox\"}', 0, 25, 25, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(71, 'activated_posts_expiration', 'Activated Ads Expiration', '150', 'In days (Archive the activated ads after this expiration) - You need to add \"/usr/bin/php -q /path/to/your/website/artisan ads:clean\" in your Cron Job tab', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 25, 25, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(72, 'category_list_background', 'Category list background image', 'storage/background/background-5bd3e95ad2f5c.png', 'Show the image in category list', '{\"name\":\"value\",\"label\":\"Background\",\"type\":\"image\",\"upload\":\"true\",\"disk\":\"uploads\",\"default\":\"app/default/logo.png\"}', 0, 25, 25, 1, 1, '2018-09-08 13:40:18', '2018-10-27 11:28:11'),
(73, 'serp_display_mode', 'Search page display mode', '.grid-view', 'Search page display mode (Grid, List, Compact) - You need to clear your cookie data, after you are saved your change', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"select_from_array\",\"options\":{\".grid-view\":\"grid-view\",\".list-view\":\"list-view\",\".compact-view\":\"compact-view\"}}', 0, 62, 63, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(74, 'app_email_sender', 'Transactional Email Sender', 'chantouchsek.cs83@gmail.com', 'Transactional Email Sender. Example: noreply@yoursite.com', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"email\"}', 0, 9, 10, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(75, 'linkedin_url', 'Linkedin - URL', '', 'Linkedin - URL', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 86, 86, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(76, 'pinterest_url', 'Pinterest - URL', '', 'Pinterest - URL', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 0, 87, 87, 1, 1, '2018-09-08 13:40:18', '2018-09-08 13:40:45'),
(78, 'contact_page_background', 'Contact Page Background Image', 'storage/background/background-5bd3e96886991.png', 'Contact Page Background Image', '{\"name\":\"value\",\"label\":\"Background\",\"type\":\"image\",\"upload\":\"true\",\"disk\":\"uploads\",\"default\":\"app/default/logo.png\"}', 0, 3, 4, 1, 1, '2018-09-08 13:40:18', '2018-10-27 11:28:24'),
(79, 'product_list_background', 'Product List Background Image', 'storage/background/background-5bd3e991f2306.png', 'Product List Background Image', '{\"name\":\"value\",\"label\":\"Background\",\"type\":\"image\",\"upload\":\"true\",\"disk\":\"uploads\",\"default\":\"app/default/logo.png\"}', 0, 3, 4, 1, 1, '2018-09-08 13:40:18', '2018-10-27 11:29:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_parent_id_foreign` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
