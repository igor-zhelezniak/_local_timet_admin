-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.34 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных timet
CREATE DATABASE IF NOT EXISTS `timet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `timet`;

-- Дамп структуры для таблица timet.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.categories: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `code`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'DemoC1', 'Demo Category 1', 'This is a demo category', NULL, NULL),
	(2, 'CAT2', 'Category 2', 'This is Category Two', NULL, NULL),
	(3, 'CAT2', 'Category 2', 'This is Category Two', NULL, NULL),
	(4, 'CATA2-1', 'Category Admin2 1', 'Admin2 Category 1', NULL, NULL),
	(5, 'VH', 'VH Tasks', 'VH tasks', NULL, NULL),
	(6, 'HCSC', 'HCSC Tasks', 'HCSC Tasks', NULL, NULL),
	(7, 'Other', 'Other', 'Other tasks', NULL, NULL),
	(8, 'RM', 'Remedly', 'Remedly tasks', NULL, NULL),
	(9, 'CatOne', 'CategoryOne', 'fsdkjfasd', NULL, NULL),
	(10, '', '', '', NULL, NULL),
	(11, 'QA', 'Testing', 'Testing category', NULL, NULL),
	(12, 'ttet', 'tte', 'wetwet', NULL, NULL),
	(13, 'CT-ONE', 'Category One', 'Cat One', NULL, NULL),
	(14, 'CT-TWO', 'Category Two', 'Cat TWO', NULL, NULL),
	(15, 'ca1', 'ca1', 'ca1', NULL, NULL),
	(16, '123', '11111111111111111111', 'test', NULL, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица timet.categories_users
CREATE TABLE IF NOT EXISTS `categories_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.categories_users: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `categories_users` DISABLE KEYS */;
INSERT INTO `categories_users` (`id`, `category_id`, `user_id`, `company_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, 0, NULL, NULL),
	(2, 4, 5, 0, NULL, NULL),
	(3, 5, 1, 1, NULL, NULL),
	(4, 6, 1, 1, NULL, NULL),
	(5, 7, 1, 1, NULL, NULL),
	(6, 8, 1, 1, NULL, NULL),
	(7, 9, 14, 0, NULL, NULL),
	(8, 10, 14, 0, NULL, NULL),
	(9, 11, 14, 0, NULL, NULL),
	(10, 12, 14, 8, NULL, NULL),
	(11, 13, 18, 10, NULL, NULL),
	(12, 14, 18, 10, NULL, NULL),
	(13, 15, 18, 10, NULL, NULL),
	(14, 16, 39, 13, NULL, NULL);
/*!40000 ALTER TABLE `categories_users` ENABLE KEYS */;

-- Дамп структуры для таблица timet.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.clients: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `name`, `code`, `status`) VALUES
	(1, 'dima', 'd', '5'),
	(2, 'dimas', 'di', '5'),
	(3, 'Client One', 'CLOne', '1'),
	(4, 'ClientAdmin2', 'CLA2', '5'),
	(5, 'Remedly', 'RM', '5'),
	(6, 'Client1', 'CL1', '5'),
	(7, 'Greg', 'Greg', '5'),
	(9, 'Client3', 'CL3', '1'),
	(10, 'Client4', 'CL4', '2'),
	(11, 'ClientTest1', 'CLT1', '5'),
	(12, 'Client One', 'CL-One', '5'),
	(13, 'Client Two', 'CL-Two', '2'),
	(14, '12', '12', '1'),
	(15, '123', '123', '2'),
	(16, '3221', '3221', '4'),
	(17, 'artem', '1111', '4'),
	(18, 'vasya', ',mdfkjdh', '2');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Дамп структуры для таблица timet.clients_status
CREATE TABLE IF NOT EXISTS `clients_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.clients_status: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `clients_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients_status` ENABLE KEYS */;

-- Дамп структуры для таблица timet.clients_users
CREATE TABLE IF NOT EXISTS `clients_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.clients_users: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `clients_users` DISABLE KEYS */;
INSERT INTO `clients_users` (`id`, `client_id`, `user_id`, `company_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 0, NULL, NULL),
	(2, 2, 1, 0, NULL, NULL),
	(3, 3, 1, 0, NULL, NULL),
	(4, 4, 5, 0, NULL, NULL),
	(5, 5, 1, 0, NULL, NULL),
	(6, 6, 14, 8, NULL, NULL),
	(7, 7, 17, 0, NULL, NULL),
	(9, 9, 14, 8, NULL, NULL),
	(10, 10, 14, 8, NULL, NULL),
	(11, 11, 14, 8, NULL, NULL),
	(12, 12, 18, 10, NULL, NULL),
	(13, 13, 18, 10, NULL, NULL),
	(14, 14, 18, 10, NULL, NULL),
	(15, 15, 18, 10, NULL, NULL),
	(16, 16, 18, 10, NULL, NULL),
	(17, 17, 39, 13, NULL, NULL),
	(18, 18, 39, 13, NULL, NULL);
/*!40000 ALTER TABLE `clients_users` ENABLE KEYS */;

-- Дамп структуры для таблица timet.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyLogo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` int(11) DEFAULT NULL,
  `phone_number` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.companies: ~20 rows (приблизительно)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name`, `code`, `url`, `description`, `companyLogo`, `country`, `city`, `adress`, `timezone`, `phone_number`, `nominal`, `created_at`, `updated_at`) VALUES
	(1, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-16 22:30:15', '2017-03-16 22:30:15'),
	(2, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-16 22:34:56', '2017-03-16 22:34:56'),
	(3, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-16 22:40:45', '2017-03-16 22:40:45'),
	(4, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-16 22:41:32', '2017-03-16 22:41:32'),
	(5, 'com1', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 23:14:26', '2017-03-24 23:14:26'),
	(6, 'testcomp', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 23:15:17', '2017-03-24 23:15:17'),
	(7, 'testcomp1', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 23:16:46', '2017-03-24 23:16:46'),
	(8, 'comp2', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-24 23:19:02', '2017-03-24 23:19:02'),
	(9, 'Aspins', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-27 15:10:28', '2017-03-27 15:10:28'),
	(10, 'TestC', '', '', '', 'company-logo.png', NULL, NULL, NULL, NULL, NULL, NULL, '2017-04-04 22:10:48', '2017-04-04 22:10:48'),
	(11, 'CompanyA', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-08 15:23:19', '2017-05-08 15:23:19'),
	(12, 'Aspins Media', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-21 22:43:03', '2017-05-21 22:43:03'),
	(13, 'test_test', '', '', '', NULL, 'AG', 'Liberta', '', 6, '', 2, '2017-05-23 12:32:49', '2017-05-30 14:40:43'),
	(27, 'ghfgfghfgh', '', '', '', '', 'CU', 'Camagüey', 'dsfgdfhfg', 16, '5464567567567', NULL, '2017-05-26 06:52:47', '2017-05-26 06:52:47'),
	(28, 'fgjhfghf', '', '', '', 'company-logo.jpg', 'TG', 'Lomé', '122334234534', 14, '3464564567567567', 0, '2017-05-29 10:37:39', '2017-05-29 12:06:24'),
	(29, 'jkhgkjfgkjdhb', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-30 15:09:55', '2017-05-30 15:09:55'),
	(30, 'jkhgkjfgkjdhb', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-30 15:10:36', '2017-05-30 15:10:36'),
	(31, 'gsdkjhdkfjgh', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-30 15:11:29', '2017-05-30 15:11:29'),
	(32, 'gsdkjhdkfjgh', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-30 15:11:50', '2017-05-30 15:11:50'),
	(33, 'gsdkjhdkfjgh', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-30 15:12:15', '2017-05-30 15:12:15'),
	(34, 'gsdkjhdkfjgh', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-30 15:13:40', '2017-05-30 15:13:40'),
	(35, 'gsdkjhdkfjgh', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-30 15:14:52', '2017-05-30 15:14:52');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Дамп структуры для таблица timet.companies_plans
CREATE TABLE IF NOT EXISTS `companies_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL DEFAULT '0',
  `expiration` date DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы timet.companies_plans: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `companies_plans` DISABLE KEYS */;
INSERT INTO `companies_plans` (`id`, `company_id`, `expiration`, `status`, `type`) VALUES
	(1, 13, '2017-06-30', b'1', 3),
	(2, 35, '2017-06-30', b'1', 1);
/*!40000 ALTER TABLE `companies_plans` ENABLE KEYS */;

-- Дамп структуры для таблица timet.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.departments: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `department_code`, `department_name`) VALUES
	(1, 'DEV', 'Developers'),
	(2, 'QA', 'QA Department'),
	(3, 'PM', 'Project Manager'),
	(4, 'HR', 'Head Hunter'),
	(5, 'DEV', 'Developers'),
	(6, 'DEV', 'Developers'),
	(7, 'QA', 'QA Department'),
	(8, 'DEV', 'Development'),
	(9, 'DEV', 'Developers'),
	(10, '', ''),
	(11, 'Mgr', 'Manager'),
	(12, 'DEV', 'Developers'),
	(13, 'QA', 'Testing'),
	(14, 'DEV', 'Developers'),
	(15, 'ghjghjgh', '-1'),
	(16, '346456456', 'fgfgjghjghtyjgh');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Дамп структуры для таблица timet.departments_users
CREATE TABLE IF NOT EXISTS `departments_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.departments_users: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `departments_users` DISABLE KEYS */;
INSERT INTO `departments_users` (`id`, `department_id`, `user_id`) VALUES
	(2, 4, 1),
	(3, 5, 1),
	(4, 6, 5),
	(5, 7, 5),
	(6, 8, 14),
	(7, 9, 17),
	(8, 10, 14),
	(9, 11, 14),
	(10, 12, 18),
	(11, 13, 18),
	(12, 14, 38),
	(13, 15, 39),
	(14, 16, 39);
/*!40000 ALTER TABLE `departments_users` ENABLE KEYS */;

-- Дамп структуры для таблица timet.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.migrations: ~22 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_10_10_070703_create_roles_table', 1),
	(4, '2016_10_10_070739_create_users_status_table', 1),
	(5, '2016_10_10_130305_create_projects_table', 1),
	(6, '2016_10_10_131242_create_projects_status_table', 1),
	(7, '2016_10_10_131735_create_projects_type_table', 1),
	(8, '2016_10_10_135659_create_user_roles_table', 1),
	(9, '2016_10_10_150907_create_projects_users_table', 1),
	(10, '2017_02_17_205700_create_departments', 1),
	(11, '2017_02_17_214011_create_clients', 1),
	(12, '2017_02_17_221143_create_departments_users', 1),
	(13, '2017_02_24_161223_create_timesheet_table', 1),
	(14, '2017_02_24_170409_create_projects_clients_table', 1),
	(15, '2017_02_24_171251_create_clients_users_table', 1),
	(16, '2017_02_24_195548_create_clients_status_table', 1),
	(17, '2017_03_06_204004_create_categories_table', 1),
	(18, '2017_03_06_220851_create_categories_users_table', 1),
	(19, '2017_03_06_223408_create_users_departments_table', 2),
	(20, '2017_03_16_215003_create_company_info_table', 3),
	(21, '2017_03_16_215429_create_users_company_table', 3),
	(22, '2017_03_28_182810_create_statuses_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица timet.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('a@a.com', '3112fd82cfdbd96155300bee0314b251f50895f9c9e8aae6ec13daf308c94aa8', '2017-05-08 15:36:02');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица timet.payment_plan
CREATE TABLE IF NOT EXISTS `payment_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `mounths` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы timet.payment_plan: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `payment_plan` DISABLE KEYS */;
INSERT INTO `payment_plan` (`id`, `name`, `price`, `mounths`, `type`) VALUES
	(1, 'Free', 0, 3, 1),
	(2, 'Pro', 12.3, 3, 2),
	(3, 'Enterprice', 120.99, 3, 3);
/*!40000 ALTER TABLE `payment_plan` ENABLE KEYS */;

-- Дамп структуры для таблица timet.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_customer` int(11) DEFAULT NULL,
  `project_budget_time` int(11) DEFAULT NULL,
  `project_budget_money` double(8,2) DEFAULT NULL,
  `project_lead` int(10) DEFAULT NULL,
  `project_type` int(11) NOT NULL,
  `project_status` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.projects: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `project_name`, `project_description`, `project_customer`, `project_budget_time`, `project_budget_money`, `project_lead`, `project_type`, `project_status`, `company_id`) VALUES
	(1, 'Demo Project', 'First Demo Project', 1, 101, 12002.00, 0, 1, 1, 1),
	(2, 'VirtualHealth', 'VirtualHealth project', 1, 180, 999999.99, 0, 1, 1, 1),
	(3, 'Remedly', 'Remedly project', 5, 160, 198765.00, 0, 1, 1, 1),
	(4, 'PR1', 'fhksdjfal', 6, 1000348, 12002.00, 0, 1, 1, 0),
	(5, 'PR2', 'dsafkh', 6, 234234, 231.00, NULL, 1, 1, 0),
	(6, 'Project one', 'Pr descr', 6, 98998, 8888.00, NULL, 1, 1, 0),
	(7, 'Project two', 'asdfdsgk', 6, 3242, 235.00, 16, 1, 1, 0),
	(8, 'NewProj', 'fkjhdskj', 9, 555, 5454.00, 14, 1, 1, 8),
	(9, 'ProjName2', 'dsakfhj', 10, 32, 324.00, 15, 1, 1, 8),
	(10, 'Project One Test 1', 'dkshfkjkjkjjk', 12, 252, 988.00, 19, 1, 1, 10),
	(11, 'AdminLte1', 'jekgedfjh', 12, 33, 232.00, 19, 1, 1, 10),
	(12, 'kejfgkfdjghb', 'KJHFDKJHFDHB', 17, 345345, 564564.00, NULL, 2, 4, 13),
	(13, 'fhfghfhf', 'ghjfgjfgj', 17, 345, 545.00, 39, 1, 1, 13);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Дамп структуры для таблица timet.projects_clients
CREATE TABLE IF NOT EXISTS `projects_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.projects_clients: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `projects_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_clients` ENABLE KEYS */;

-- Дамп структуры для таблица timet.projects_status
CREATE TABLE IF NOT EXISTS `projects_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.projects_status: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `projects_status` DISABLE KEYS */;
INSERT INTO `projects_status` (`id`, `status_name`) VALUES
	(1, 'Not approved'),
	(2, 'Pending'),
	(3, 'In progress'),
	(4, 'Rejected'),
	(5, 'Approved');
/*!40000 ALTER TABLE `projects_status` ENABLE KEYS */;

-- Дамп структуры для таблица timet.projects_type
CREATE TABLE IF NOT EXISTS `projects_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.projects_type: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `projects_type` DISABLE KEYS */;
INSERT INTO `projects_type` (`id`, `type_name`) VALUES
	(1, 'Project'),
	(2, 'Sub Project');
/*!40000 ALTER TABLE `projects_type` ENABLE KEYS */;

-- Дамп структуры для таблица timet.projects_users
CREATE TABLE IF NOT EXISTS `projects_users` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.projects_users: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `projects_users` DISABLE KEYS */;
INSERT INTO `projects_users` (`project_id`, `user_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 14),
	(5, 14),
	(6, 14),
	(7, 14),
	(8, 14),
	(9, 14),
	(10, 18),
	(11, 18),
	(12, 39),
	(13, 39);
/*!40000 ALTER TABLE `projects_users` ENABLE KEYS */;

-- Дамп структуры для таблица timet.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.roles: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role_name`) VALUES
	(1, 'admin'),
	(2, 'manager'),
	(3, 'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Дамп структуры для таблица timet.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.statuses: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
	(1, 'Not approved', NULL, NULL),
	(2, 'Pending', NULL, NULL),
	(3, 'In progress', NULL, NULL),
	(4, 'Rejected', NULL, NULL),
	(5, 'Approved', NULL, NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Дамп структуры для таблица timet.timesheet
CREATE TABLE IF NOT EXISTS `timesheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `worked_time` time DEFAULT NULL,
  `logged_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.timesheet: ~258 rows (приблизительно)
/*!40000 ALTER TABLE `timesheet` DISABLE KEYS */;
INSERT INTO `timesheet` (`id`, `user_id`, `project_id`, `category_id`, `description`, `worked_time`, `logged_date`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 3, '', '00:00:05', '2017-03-07', NULL, NULL),
	(2, 1, 1, 3, '', '00:00:01', '2017-03-08', NULL, NULL),
	(3, 1, 2, 5, 'VH-4003', '00:00:01', '2017-03-10', NULL, NULL),
	(4, 1, 2, 6, 'HCSC-1212', '00:00:01', '2017-03-10', NULL, NULL),
	(5, 1, 2, 6, 'HCSC-1200', '00:00:01', '2017-03-09', NULL, NULL),
	(6, 1, 1, 6, 'HCSC-1137', '00:00:01', '2017-03-09', NULL, NULL),
	(7, 1, 2, 7, 'Move test rans to the new project', '00:00:01', '2017-03-10', NULL, NULL),
	(8, 1, 2, 5, 'VH-4806 Анализ результатов авто тестов', '00:00:01', '2017-03-10', NULL, NULL),
	(9, 2, 1, 3, 'test desc', '00:00:12', '2017-03-10', NULL, NULL),
	(10, 4, NULL, NULL, NULL, NULL, '2017-03-10', NULL, NULL),
	(11, 1, 2, 5, 'VH-4769', '00:00:01', '2017-03-13', NULL, NULL),
	(12, 1, 2, 5, 'VH-4753', '00:00:01', '2017-03-13', NULL, NULL),
	(13, 1, 2, 6, 'HCSC-1257', '00:00:01', '2017-03-13', NULL, NULL),
	(14, 1, 2, 5, 'VH-4790', '00:00:01', '2017-03-13', NULL, NULL),
	(15, 1, 2, 5, 'VH-4788', '00:00:01', '2017-03-13', NULL, NULL),
	(16, 1, 2, 5, 'VH-4790', '00:00:01', '2017-03-14', NULL, NULL),
	(17, 1, 2, 5, 'VH-4788', '00:00:01', '2017-03-14', NULL, NULL),
	(18, 1, 2, 6, 'HCSC-1219', '00:00:01', '2017-03-14', NULL, NULL),
	(19, 1, 2, 6, 'HCSC-1285', '00:00:01', '2017-03-15', NULL, NULL),
	(20, 1, 2, 6, 'HCSC-1248', '00:00:01', '2017-03-15', NULL, NULL),
	(21, 1, 2, 6, 'HCSC-1279', '00:00:01', '2017-03-15', NULL, NULL),
	(22, 1, 2, 6, 'HCSC-1279', '00:00:01', '2017-03-16', NULL, NULL),
	(23, 1, 2, 5, 'VH-4770', '00:00:01', '2017-03-16', NULL, NULL),
	(24, 1, 2, 5, 'VH-4833', '00:00:01', '2017-03-16', NULL, NULL),
	(25, 1, 2, 5, 'VH-4844', '00:00:01', '2017-03-16', NULL, NULL),
	(27, 1, 2, 6, 'HCSC-1300', '00:00:01', '2017-03-16', NULL, NULL),
	(28, 1, 2, 7, 'Meeting with Jack', '00:00:02', '2017-03-16', NULL, NULL),
	(29, 1, 2, 6, 'HCSC-1278', '00:00:01', '2017-03-17', NULL, NULL),
	(30, 1, 2, 5, 'VH-4853', '00:00:01', '2017-03-17', NULL, NULL),
	(31, 1, 2, 5, 'VH-4815', '00:00:01', '2017-03-17', NULL, NULL),
	(32, 1, 2, 5, 'VH-4854', '00:00:01', '2017-03-17', NULL, NULL),
	(33, 1, 2, 5, 'VH-4855', '00:00:01', '2017-03-17', NULL, NULL),
	(34, 1, 2, 6, 'HCSC-1270', '00:00:01', '2017-03-17', NULL, NULL),
	(35, 1, 2, 6, 'HCSC-1297', '00:00:01', '2017-03-17', NULL, NULL),
	(36, 1, 2, 5, 'VH-4770', '00:00:01', '2017-03-21', NULL, NULL),
	(37, 1, 2, 6, 'HCSC-1284', '00:00:01', '2017-03-21', NULL, NULL),
	(38, 1, 3, 8, 'RM-752', '00:00:00', '2017-03-21', NULL, NULL),
	(39, 1, 2, 6, 'HCSC-1318', '00:00:01', '2017-03-21', NULL, NULL),
	(40, 1, 2, 5, 'VH-4770', '00:00:01', '2017-03-20', NULL, NULL),
	(41, 1, 2, 5, 'VH-4865', '00:00:01', '2017-03-20', NULL, NULL),
	(42, 1, 2, 6, 'HCSC-1299', '00:00:01', '2017-03-20', NULL, NULL),
	(43, 1, 2, 6, 'HCSC-1311', '00:00:01', '2017-03-21', NULL, NULL),
	(44, 1, 2, 6, 'HCSC-1311', '00:00:01', '2017-03-22', NULL, NULL),
	(45, 1, 2, 6, 'HCSC-1289', '00:00:01', '2017-03-22', NULL, NULL),
	(46, 1, 2, 5, 'VH-4815', '00:00:01', '2017-03-22', NULL, NULL),
	(47, 1, 2, 5, 'VH-4855', '00:00:01', '2017-03-22', NULL, NULL),
	(48, 1, 2, 6, 'HCSC-1136', '00:00:01', '2017-03-22', NULL, NULL),
	(49, 1, 2, 6, 'HD-601', '00:00:01', '2017-03-22', NULL, NULL),
	(50, 1, 2, 6, 'HCSC-1136', '00:00:01', '2017-03-24', NULL, NULL),
	(51, 1, 2, 5, 'МР-4896', '00:00:01', '2017-03-24', NULL, NULL),
	(52, 1, 2, 5, 'HCSC-1136', '00:00:01', '2017-03-23', NULL, NULL),
	(53, 1, 2, 7, 'HD-601', '00:00:01', '2017-03-23', NULL, NULL),
	(54, 14, NULL, NULL, NULL, NULL, '2017-03-25', NULL, NULL),
	(55, 1, 2, 5, 'VH-4888', '00:00:01', '2017-03-27', NULL, NULL),
	(56, 1, 2, 6, 'HCSC-1345', '00:00:01', '2017-03-27', NULL, NULL),
	(57, 1, 2, 6, 'HCSC-1355', '00:00:01', '2017-03-28', NULL, NULL),
	(58, 1, 2, 5, 'VH-4874', '00:00:01', '2017-03-28', NULL, NULL),
	(59, 14, NULL, NULL, NULL, NULL, '2017-03-28', NULL, NULL),
	(60, 15, 5, 9, '', '00:00:00', '2017-03-29', NULL, NULL),
	(61, 1, 2, 5, 'VH-4914', '00:00:01', '2017-03-29', NULL, NULL),
	(62, 14, 8, 12, 'j', '00:00:00', '2017-03-29', NULL, NULL),
	(63, 1, 2, 7, 'NLHENCARE-118', '00:00:01', '2017-03-29', NULL, NULL),
	(65, 1, 2, 5, 'VH-4849', '00:00:01', '2017-03-29', NULL, NULL),
	(66, 1, 2, 5, 'HCSC-1225', '00:00:01', '2017-03-29', NULL, NULL),
	(67, 1, 2, 7, 'NLHENCARE-118', '00:00:01', '2017-03-30', NULL, NULL),
	(69, 16, 8, 12, 'jhk', '00:00:00', '2017-03-30', NULL, NULL),
	(70, 1, 2, 6, 'HCSC-1363', '00:00:01', '2017-03-31', NULL, NULL),
	(71, 1, 2, 6, 'HCSC-1390', '00:00:01', '2017-03-31', NULL, NULL),
	(72, 1, 2, 6, 'HCSC-1214', '00:00:01', '2017-03-31', NULL, NULL),
	(73, 1, 2, 6, 'HCSC-1367 - добавить тесткейс', '00:00:01', '2017-03-31', NULL, NULL),
	(74, 1, 2, 6, 'HCSC-1351', '00:00:01', '2017-03-31', NULL, NULL),
	(75, 1, 2, 7, 'NLHENCARE-115', '00:00:01', '2017-04-03', NULL, NULL),
	(76, 1, 2, 6, 'HCSC-1404', '00:00:01', '2017-04-03', NULL, NULL),
	(77, 1, 2, 6, 'HCSC-1346', '00:00:01', '2017-04-03', NULL, NULL),
	(78, 1, 2, 6, 'HCSC-1351', '00:00:01', '2017-04-04', NULL, NULL),
	(79, 1, 2, 6, 'HCSC-1325', '00:00:01', '2017-04-04', NULL, NULL),
	(80, 1, 2, 6, 'HCSC-1214', '00:00:01', '2017-04-04', NULL, NULL),
	(81, 1, 2, 7, 'NLH-655', '00:00:01', '2017-04-04', NULL, NULL),
	(82, 1, 3, 8, 'rm-1202, rm-1203, rm-1204, rc-1205, rc-1206, rc-1207, RM-1209', '00:00:00', '2017-04-04', NULL, NULL),
	(83, 18, 10, 13, 'test', '01:00:00', '2017-04-03', NULL, NULL),
	(84, 18, 10, 14, 'test 2', '00:00:00', '2017-04-03', NULL, NULL),
	(85, 18, 10, 13, 'test 3', '00:00:01', '2017-04-03', NULL, NULL),
	(86, 18, 10, 13, 'test 4', '00:00:04', '2017-04-03', NULL, NULL),
	(87, 18, 10, 14, 'test 5', '00:00:02', '2017-04-03', NULL, NULL),
	(88, 18, 10, 14, 'te', '00:00:03', '2017-04-04', NULL, NULL),
	(89, 18, 10, 13, 'tes', '00:00:02', '2017-04-04', NULL, NULL),
	(90, 18, 10, 14, 'eee', '00:00:32', '2017-04-04', NULL, NULL),
	(92, 18, 10, 14, 'rr', '00:00:02', '2017-04-05', NULL, NULL),
	(93, 18, 10, 13, 'r', '00:00:02', '2017-04-05', NULL, NULL),
	(94, 18, 10, 13, 'f', '00:00:01', '2017-04-05', NULL, NULL),
	(95, 1, 2, 7, 'PJ-135', '00:00:01', '2017-04-05', NULL, NULL),
	(96, 1, 2, 5, 'VH-4927', '00:00:01', '2017-04-05', NULL, NULL),
	(97, 1, 2, 7, 'PJ-134 добавить тесткейс в tastrail', '00:00:01', '2017-04-05', NULL, NULL),
	(98, 1, 2, 6, 'HCSC-1214', '00:00:01', '2017-04-05', NULL, NULL),
	(99, 1, 3, 8, 'RM-1203,', '00:00:01', '2017-04-05', NULL, NULL),
	(100, 1, 2, 6, 'HCSC-1214', '00:00:01', '2017-04-06', NULL, NULL),
	(101, 1, 3, 8, 'RM-752', '00:00:00', '2017-04-06', NULL, NULL),
	(102, 1, 3, 8, 'RM-908', '00:00:00', '2017-04-06', NULL, NULL),
	(103, 1, 3, 8, 'RM-1237', '00:00:00', '2017-04-06', NULL, NULL),
	(104, 1, 3, 8, 'RM-1157', '00:00:00', '2017-04-06', NULL, NULL),
	(105, 1, 3, 8, 'RM-1158', '00:00:00', '2017-04-06', NULL, NULL),
	(106, 1, 3, 8, 'RM-1185', '00:00:00', '2017-04-06', NULL, NULL),
	(107, 1, 3, 8, 'RM-1143', '00:00:00', '2017-04-06', NULL, NULL),
	(108, 1, 3, 8, 'RM-1184', '00:00:00', '2017-04-06', NULL, NULL),
	(109, 1, 3, 8, 'RM-1183', '00:00:00', '2017-04-06', NULL, NULL),
	(110, 1, 3, 8, 'RM-1238', '00:00:00', '2017-04-06', NULL, NULL),
	(111, 1, 3, 8, 'rm-1249+', '00:00:00', '2017-04-07', NULL, NULL),
	(112, 1, 3, 8, 'RM-1205+', '00:00:00', '2017-04-07', NULL, NULL),
	(113, 1, 3, 8, 'RM-1251+', '00:00:00', '2017-04-07', NULL, NULL),
	(115, 1, 3, 8, 'RM-1184', '00:00:00', '2017-04-07', NULL, NULL),
	(116, 1, 3, 8, 'RM-1179', '00:00:01', '2017-04-07', NULL, NULL),
	(117, 1, 3, 8, 'RM-1159', '00:00:01', '2017-04-07', NULL, NULL),
	(118, 1, 3, 8, 'RM-1253', '00:00:00', '2017-04-07', NULL, NULL),
	(119, 1, 3, 8, 'RM-1254', '00:00:01', '2017-04-07', NULL, NULL),
	(120, 1, 3, 8, 'RM-1255', '00:00:00', '2017-04-07', NULL, NULL),
	(121, 1, 3, 8, 'RM-1256', '00:00:00', '2017-04-07', NULL, NULL),
	(122, 1, 3, 8, 'RM-1185', '00:00:00', '2017-04-07', NULL, NULL),
	(123, 1, 3, 8, 'RM-1257', '00:00:00', '2017-04-07', NULL, NULL),
	(124, 1, 3, 8, 'RM-1160', '00:00:00', '2017-04-07', NULL, NULL),
	(125, 1, 3, 8, 'RM-908', '00:00:00', '2017-04-07', NULL, NULL),
	(126, 1, 2, 6, 'HCSC-1402', '00:00:01', '2017-04-07', NULL, NULL),
	(127, 1, 1, 5, 'VH-4963', '00:00:01', '2017-04-07', NULL, NULL),
	(128, 1, 2, 6, 'HCSC-1393', '00:00:01', '2017-04-10', NULL, NULL),
	(129, 1, 2, 6, 'HCSC-1430', '00:00:01', '2017-04-10', NULL, NULL),
	(130, 1, 2, 7, 'NLHENCARE-131', '00:00:01', '2017-04-10', NULL, NULL),
	(131, 1, 3, 8, 'RM-1271', '00:00:00', '2017-04-10', NULL, NULL),
	(132, 1, 3, 8, 'RM-1171', '00:00:00', '2017-04-10', NULL, NULL),
	(133, 1, 3, 8, 'RM-1003', '00:00:00', '2017-04-10', NULL, NULL),
	(134, 1, 3, 8, 'RM-1240', '00:00:00', '2017-04-10', NULL, NULL),
	(135, 1, 2, 7, 'NLHENCARE-133', '00:00:01', '2017-04-10', NULL, NULL),
	(136, 1, 3, 8, 'RM-1188', '00:00:00', '2017-04-10', NULL, NULL),
	(137, 1, 3, 8, 'RM-1152', '00:00:00', '2017-04-10', NULL, NULL),
	(138, 1, 3, 8, 'RM-1273', '00:00:00', '2017-04-10', NULL, NULL),
	(139, 1, 3, 8, 'RM-1272', '00:00:00', '2017-04-10', NULL, NULL),
	(140, 1, 3, 8, 'RM-1234', '00:00:00', '2017-04-10', NULL, NULL),
	(141, 1, 3, 8, 'RM-1274', '00:00:00', '2017-04-10', NULL, NULL),
	(142, 1, 2, 5, 'VH-4957', '00:00:01', '2017-04-11', NULL, NULL),
	(143, 1, 2, 5, 'VH-4965', '00:00:00', '2017-04-11', NULL, NULL),
	(144, 1, 2, 5, 'VH-4969', '00:00:01', '2017-04-11', NULL, NULL),
	(145, 1, 3, 8, 'RM-1280', '00:00:00', '2017-04-11', NULL, NULL),
	(146, 1, 2, 7, 'NLH-661', '00:00:01', '2017-04-11', NULL, NULL),
	(147, 1, 3, 8, 'RM-1237', '00:00:00', '2017-04-11', NULL, NULL),
	(148, 1, 3, 8, 'RM-1003', '00:00:00', '2017-04-11', NULL, NULL),
	(149, 1, 3, 8, 'RM-1264', '00:00:00', '2017-04-11', NULL, NULL),
	(150, 1, 3, 8, 'RM-1261', '00:00:00', '2017-04-11', NULL, NULL),
	(151, 1, 3, 8, 'RM-1281', '00:00:00', '2017-04-11', NULL, NULL),
	(152, 1, 3, 8, 'RM-1282', '00:00:00', '2017-04-11', NULL, NULL),
	(153, 1, 3, 8, 'RM-1283', '00:00:00', '2017-04-11', NULL, NULL),
	(154, 1, 3, 8, 'RM-1284', '00:00:00', '2017-04-11', NULL, NULL),
	(155, 1, 2, 7, 'NLH-670', '00:00:01', '2017-04-11', NULL, NULL),
	(156, 1, 3, 8, 'RM-1251', '00:00:00', '2017-04-11', NULL, NULL),
	(157, 1, 3, 8, 'RM-1285', '00:00:00', '2017-04-11', NULL, NULL),
	(158, 1, 2, 5, 'VH-4984', '00:00:01', '2017-04-12', NULL, NULL),
	(159, 1, 2, 5, 'VH-4884', '00:00:01', '2017-04-12', NULL, NULL),
	(160, 1, 2, 6, 'HCSC-1254', '00:00:00', '2017-04-12', NULL, NULL),
	(161, 1, 2, 5, 'VH-4985', '00:00:00', '2017-04-12', NULL, NULL),
	(162, 1, 3, 8, 'RM-1272', '00:00:00', '2017-04-12', NULL, NULL),
	(163, 1, 3, 8, 'RM-1238', '00:00:00', '2017-04-12', NULL, NULL),
	(164, 1, 3, 8, 'RM-1183', '00:00:00', '2017-04-12', NULL, NULL),
	(165, 1, 3, 8, 'RM-1271', '00:00:00', '2017-04-12', NULL, NULL),
	(166, 1, 3, 8, 'RM-1288', '00:00:00', '2017-04-12', NULL, NULL),
	(167, 1, 3, 8, 'RM-1289', '00:00:00', '2017-04-12', NULL, NULL),
	(168, 1, 3, 8, 'RM-1290', '00:00:00', '2017-04-12', NULL, NULL),
	(169, 1, 3, 8, 'RM-1291', '00:00:00', '2017-04-12', NULL, NULL),
	(170, 1, 3, 8, 'RM-1292', '00:00:00', '2017-04-12', NULL, NULL),
	(171, 1, 3, 8, 'RM-1293', '00:00:00', '2017-04-12', NULL, NULL),
	(172, 18, 10, 13, 'ty', '00:00:07', '2017-04-13', NULL, NULL),
	(173, 18, 10, 13, 'yh', '00:00:00', '2017-04-13', NULL, NULL),
	(174, 18, 10, 13, 'n', '00:00:01', '2017-04-13', NULL, NULL),
	(175, 1, 2, 7, 'NLH-673', '00:00:00', '2017-04-13', NULL, NULL),
	(176, 1, 2, 5, 'VH-4959', '00:00:00', '2017-04-13', NULL, NULL),
	(177, 1, 2, 5, 'VH-4991', '00:00:01', '2017-04-13', NULL, NULL),
	(178, 1, 2, 5, 'VH-4884', '00:00:01', '2017-04-13', NULL, NULL),
	(179, 1, 3, 8, 'RM-1307', '00:00:00', '2017-04-13', NULL, NULL),
	(180, 1, 3, 8, 'RM-1308', '00:00:00', '2017-04-13', NULL, NULL),
	(181, 1, 3, 8, 'RM-1309', '00:00:00', '2017-04-13', NULL, NULL),
	(182, 1, 2, 7, 'NLH-682', '00:00:01', '2017-04-13', NULL, NULL),
	(183, 1, 3, 8, 'RM-1310', '00:00:00', '2017-04-13', NULL, NULL),
	(184, 1, 3, 8, 'RM-1311', '00:00:00', '2017-04-13', NULL, NULL),
	(185, 18, 10, 13, '6', '00:00:06', '2017-04-13', NULL, NULL),
	(189, 19, 10, 14, 'ewe', '03:18:00', '2017-04-14', NULL, NULL),
	(190, 18, NULL, NULL, NULL, NULL, '2017-04-14', NULL, NULL),
	(191, 1, 2, 6, 'HCSC-1478', '01:00:00', '2017-04-14', NULL, NULL),
	(192, 1, 2, 6, 'HCSC-1376', '01:00:00', '2017-04-14', NULL, NULL),
	(193, 1, 2, 5, 'VH-4994', '01:00:00', '2017-04-14', NULL, NULL),
	(194, 1, 3, 8, 'RM-1287', '01:00:00', '2017-04-14', NULL, NULL),
	(195, 1, 3, 8, 'RM-1183', '01:00:00', '2017-04-14', NULL, NULL),
	(196, 1, 3, 8, 'RM-1253', '01:00:00', '2017-04-14', NULL, NULL),
	(197, 1, 3, 8, 'RM-1266', '01:00:00', '2017-04-14', NULL, NULL),
	(198, 1, 3, 8, 'RM-1308', '01:00:00', '2017-04-14', NULL, NULL),
	(199, 1, 3, 8, 'RM-1317', '01:00:00', '2017-04-14', NULL, NULL),
	(200, 1, 2, 7, 'NLH-674', '01:00:00', '2017-04-14', NULL, NULL),
	(201, 1, 3, 8, 'RM-1246', '01:00:00', '2017-04-14', NULL, NULL),
	(202, 1, 2, 6, 'HCSC-1522', '01:00:00', '2017-04-18', NULL, NULL),
	(204, 1, 2, 7, 'NLH-669', '01:00:00', '2017-04-18', NULL, NULL),
	(205, 1, 2, 5, 'VH-4985', '01:00:00', '2017-04-18', NULL, NULL),
	(206, 1, 3, 8, 'RM-1324', '01:00:00', '2017-04-18', NULL, NULL),
	(207, 1, 2, 5, 'VH-4970', '01:00:00', '2017-04-18', NULL, NULL),
	(208, 1, NULL, NULL, NULL, NULL, '2017-04-18', NULL, NULL),
	(209, 1, 2, 5, 'VH-4983', '01:00:00', '2017-04-19', NULL, NULL),
	(210, 1, 3, 8, 'RM-1288', '01:00:00', '2017-04-19', NULL, NULL),
	(211, 1, 2, 7, 'PJ-138', '01:00:00', '2017-04-19', NULL, NULL),
	(212, 1, 2, 5, 'VH-4949', '01:00:00', '2017-04-19', NULL, NULL),
	(213, 1, 3, 8, 'RM-1330', '01:00:00', '2017-04-19', NULL, NULL),
	(214, 1, 2, 5, 'VH-5024', '01:00:00', '2017-04-19', NULL, NULL),
	(215, 1, 3, 8, 'RM-1331', '01:00:00', '2017-04-19', NULL, NULL),
	(216, 1, 2, 6, 'HCSC-1380', '01:00:00', '2017-04-20', NULL, NULL),
	(217, 1, 2, 6, 'HCSC-1539', '01:00:00', '2017-04-20', NULL, NULL),
	(218, 1, 2, 6, 'HCSC-1223', '01:00:00', '2017-04-20', NULL, NULL),
	(219, 1, 2, 7, 'NLH-657', '01:00:00', '2017-04-20', NULL, NULL),
	(220, 1, 3, 8, 'RM-1331', '01:00:00', '2017-04-20', NULL, NULL),
	(221, 1, 3, 8, 'RM-1336', '01:00:00', '2017-04-20', NULL, NULL),
	(222, 1, 3, 8, 'RM-1355', '01:00:00', '2017-04-24', NULL, NULL),
	(223, 1, 2, 5, 'NLH-674', '01:00:00', '2017-04-24', NULL, NULL),
	(224, 1, 2, 5, 'HCSC-1529', '01:00:00', '2017-04-24', NULL, NULL),
	(225, 1, 2, 5, 'VH-5034', '01:00:00', '2017-04-24', NULL, NULL),
	(226, 1, 2, 5, 'NLHENCARE-141', '01:00:00', '2017-04-24', NULL, NULL),
	(227, 1, 3, 8, 'RM-1357', '01:00:00', '2017-04-24', NULL, NULL),
	(228, 1, 3, 8, 'RM-1358', '01:00:00', '2017-04-24', NULL, NULL),
	(229, 1, 2, 6, 'HCSC-1539', '01:00:00', '2017-04-25', NULL, NULL),
	(230, 1, 2, 7, 'NLH-692', '01:00:00', '2017-04-25', NULL, NULL),
	(231, 1, 3, 8, 'RM-1370', '01:00:00', '2017-04-25', NULL, NULL),
	(232, 1, 3, 8, 'RM-1371', '01:00:00', '2017-04-25', NULL, NULL),
	(233, 1, 2, 5, 'VH-5024', '01:00:00', '2017-04-25', NULL, NULL),
	(234, 1, 2, 5, 'VH-5059', '01:00:00', '2017-04-25', NULL, NULL),
	(235, 1, 3, 8, 'RM-1373', '01:00:00', '2017-04-25', NULL, NULL),
	(236, 1, 3, 8, 'RM-1374', '01:00:00', '2017-04-25', NULL, NULL),
	(237, 1, 3, 8, 'RM-1375', '01:00:00', '2017-04-25', NULL, NULL),
	(238, 1, 2, 7, 'NLH-672', '01:00:00', '2017-04-25', NULL, NULL),
	(239, 1, 2, 5, 'VH-4991', '01:00:00', '2017-04-26', NULL, NULL),
	(240, 1, 2, 5, 'VH-4939', '01:00:00', '2017-04-26', NULL, NULL),
	(241, 1, 2, 7, 'NLH-672', '01:00:00', '2017-04-26', NULL, NULL),
	(242, 1, 2, 5, 'VH-5063', '01:00:00', '2017-04-26', NULL, NULL),
	(243, 1, 2, 6, 'HCSC-1579', '01:00:00', '2017-04-26', NULL, NULL),
	(244, 1, 3, 8, 'RM-1387', '01:00:00', '2017-04-26', NULL, NULL),
	(245, 1, 3, 8, 'RM-1384', '01:00:00', '2017-04-26', NULL, NULL),
	(246, 1, 3, 8, 'RM-1388', '01:00:00', '2017-04-26', NULL, NULL),
	(247, 1, 3, 8, 'RM-1209', '01:00:00', '2017-04-05', NULL, NULL),
	(248, 1, 3, 8, 'RM-1205', '00:00:00', '2017-04-05', NULL, NULL),
	(249, 18, NULL, NULL, NULL, NULL, '2017-05-10', NULL, NULL),
	(250, 18, 10, 13, 'dfsg', '04:00:00', '2017-05-02', NULL, NULL),
	(251, 18, 10, 14, 'ewr', '04:00:00', '2017-05-02', NULL, NULL),
	(252, 18, 10, 13, 'h', '04:00:00', '2017-05-04', NULL, NULL),
	(253, 18, 10, 13, 'rewt', '43:00:00', '2017-05-04', NULL, NULL),
	(254, 23, NULL, NULL, NULL, NULL, '2017-05-10', NULL, NULL),
	(255, 23, NULL, NULL, NULL, NULL, '2017-05-10', NULL, NULL),
	(256, 18, 10, 13, 'test', '21:00:00', '2017-05-11', NULL, NULL),
	(257, 20, 10, 13, 'test1', '01:00:00', '2017-05-03', NULL, NULL),
	(258, 20, 11, 14, 'test2', '01:00:00', '2017-05-03', NULL, NULL),
	(259, 20, 11, 15, 'test3', '01:00:00', '2017-05-03', NULL, NULL),
	(260, 22, 10, 13, '5rt', '05:00:00', '2017-05-16', NULL, NULL),
	(261, 22, 11, 14, '434', '03:00:00', '2017-05-15', NULL, NULL),
	(262, 22, NULL, NULL, NULL, NULL, '2017-05-15', NULL, NULL),
	(263, 22, 10, 13, 'h', '07:22:00', '2017-05-17', NULL, NULL),
	(264, 22, 10, 13, '33', '33:03:00', '2017-05-17', NULL, NULL),
	(265, 22, 10, 13, 'ee', '12:00:00', '2017-05-17', NULL, NULL),
	(266, 18, 10, 13, 'test', '01:00:00', '2017-05-21', NULL, NULL),
	(269, 18, NULL, NULL, NULL, NULL, '2017-05-22', NULL, NULL),
	(274, 39, NULL, 16, '', '00:00:00', '2017-05-23', NULL, NULL),
	(275, 39, 12, 16, 'dfg', '01:02:00', '2017-04-03', NULL, NULL),
	(276, 39, 12, 16, 'rdgtdtg', '01:00:00', '2017-05-26', NULL, NULL),
	(277, 39, 12, 16, 'desafgdfg', '02:00:00', '2017-05-26', NULL, NULL),
	(278, 39, 12, 16, 'hjhgjghjghjghj', '01:15:00', '2017-05-23', NULL, NULL),
	(279, 39, 12, 16, 'bmgvhbmgbhnmgh', '02:50:00', '2017-05-29', NULL, NULL),
	(280, 39, 12, 16, 'rtghfghfgh', '01:52:00', '2017-05-29', NULL, NULL),
	(281, 39, 12, 16, 'dfgdfgd', '00:03:00', '2017-05-29', NULL, NULL);
/*!40000 ALTER TABLE `timesheet` ENABLE KEYS */;

-- Дамп структуры для таблица timet.timezones
CREATE TABLE IF NOT EXISTS `timezones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timezone` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы timet.timezones: ~37 rows (приблизительно)
/*!40000 ALTER TABLE `timezones` DISABLE KEYS */;
INSERT INTO `timezones` (`id`, `timezone`) VALUES
	(1, 'GMT+00:00 - Casablanca, Dublin, Edinburgh, Lisbon'),
	(2, 'GMT+01:00 - Amsterdam, Berlin, Paris, Madrid, Oslo'),
	(3, 'GMT+02:00 - Athens, Helsinki, Istanbul, Jerusalem '),
	(4, 'GMT+03:00 - Baggdad, Kuwait, Moscow, Nairobi (BT)'),
	(5, 'GMT+03:30 - Tehran'),
	(6, 'GMT+04:00 - Kabul, Muscat, Tblisi, Volgograd'),
	(7, 'GMT+04:30 - Afghanistan'),
	(8, 'GMT+05:00 - Ekaterinburg, Islamabad, Karachi'),
	(9, 'GMT+05:30 - India '),
	(10, 'GMT+06:00 - Almaty, Astana, Dhaka, Novosibirsk'),
	(11, 'GMT+06:30 - Cocos Islands'),
	(12, 'GMT+07:00 - Bangkok, Hanoi, Jakarta'),
	(13, 'GMT+08:00 - Beijing, Hong Kong, Irkutsk, Perth'),
	(14, 'GMT+09:00 - Osaka, Saporro, Seoul, Tokyo, Yakutsk '),
	(15, 'GMT+09:30 - Adelaide, Darwin (ACST)'),
	(16, 'GMT+10:00 - Brisbane, Canberra, Guam, Melbourne'),
	(17, 'GMT+10:30 - Lord Howe Island '),
	(18, 'GMT+11:00 - Magadan, New Caledonia, Solomon Island'),
	(19, 'GMT+11:30 - Norfolk Island'),
	(20, 'GMT+12:00 - Auckland, Fiji, Marshall Islands, Well'),
	(21, 'GMT+13:00 - Rawaki Islands'),
	(22, 'GMT+14:00 - Line Islands'),
	(23, 'GMT-01:00 - Azores, Cape Verde Islands (WAT)'),
	(26, 'GMT-02:00 - Azores, Mid-Atlantic (AT)'),
	(27, 'GMT-03:00 - Brasilia, Buenos Aires, Georgetown'),
	(28, 'GMT-03:30 - Newfoundland'),
	(29, 'GMT-04:00 - Caracas, La Paz, Santiago (AST)'),
	(30, 'GMT-05:00 - Bogota, Lima, New York (EST)'),
	(31, 'GMT-06:00 - Mexico City, Monterrey, Saskatchewan'),
	(32, 'GMT-07:00 - Arizona, Chihuahua, Mazatlan (MST)'),
	(33, 'GMT-08:00 - Los Angeles, Tijuana (PST)'),
	(34, 'GMT-08:30'),
	(35, 'GMT-09:00 - Alaska, Yukon (YST)'),
	(36, 'GMT-09:30 '),
	(37, 'GMT-10:00 - Alaska, Hawaii (AHST, CAT, HST)'),
	(38, 'GMT-11:00 - Nome, Samoa (NT)'),
	(39, 'GMT-12:00 - International Date Line West');
/*!40000 ALTER TABLE `timezones` ENABLE KEYS */;

-- Дамп структуры для таблица timet.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_parent` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `profile_img` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.users: ~37 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `user_parent`, `company_id`, `profile_img`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', '$2y$10$VEIvgu79DPDKJNC2ROT5pO4f3WML9a3mBAJevqcViqsBlBl6ayFMy', 1, 5, NULL, 1, NULL, '7AbtCxLXLNV8ADgocZAQARGbCBFsBvDmUQeffSJNDB58aRrZ5iylrDYcSQEe', NULL, '2017-04-18 19:03:58'),
	(2, 'ldima', 'ldima@timet.com', '$2y$10$eu92K504edChU8foNEVfmuSJIZmLMJQx25/PX/49J2MHEP4v2TmiS', 3, 5, 1, 0, NULL, 'QIIxkeoyhKr0F5cNZl3pFc5TrVqwS3vKXHBa75A8MkPA50j90wfHlI3JwA3p', NULL, '2017-03-10 18:38:42'),
	(3, 'dimon', 'dimon@timet.com', '$2y$10$o/X08HbH9CoMdFEm84oel.LO6sRHGcvkETDFVyVYTyte/Pb6tmR22', 3, 5, 1, 0, NULL, NULL, NULL, NULL),
	(4, 'Manager', 'manager@timet.com', '$2y$10$CF71sEdP/hESoWs1rjkQUuwX5Rbb7RhcVzMHlTkoiz/Dn3DE0BPui', 2, 5, 1, 0, NULL, 'pVhTDu4GlPX2br1GQX8H5VQrnAw02iPirLMsiTqnhhofEOMN6tdZtqt2UhjP', NULL, '2017-03-24 23:25:45'),
	(5, 'Admin2', 'admin2@admin.com', '$2y$10$7tWHwPO5EQoZBW1SS2U73.zsp7JVWcqYJFf9NG2CyA1eCVj05lR3y', 1, 1, NULL, 0, NULL, 'r5DZEs2DzuR0yzLb8hLHBaVGvaScJ57ctCqaiPyRhf5dt5yjmaLWF6OeyEKI', '2017-03-09 20:56:34', '2017-03-09 22:11:30'),
	(6, 'Dima2', 'ldima2@timet.com', '$2y$10$cO4lr9X8.vmFUnjdrpY62OObjI1kpOneDCQ4CCblfxjN8Ja8w4fQq', 2, 5, 5, 0, NULL, NULL, NULL, NULL),
	(7, 'Manag1', 'manag@timet.com', '$2y$10$AFIaaqjVvZgub5KD8kSzzOO/FMosVG1YlmDGpC2obnpQzMrwLPo.q', 1, 5, 4, 0, NULL, NULL, NULL, NULL),
	(8, 'Admin3', 'admin3@admin.com', '$2y$10$KZS3i/DKplEMbSmkscwIGenWxHNgFyY2GHPxc2cucbaPb0CPGD7Bq', 1, 1, NULL, 0, NULL, NULL, '2017-03-16 22:25:51', '2017-03-16 22:25:51'),
	(9, 'Admin4', 'admin4@admin.com', '$2y$10$5Vea2zQs0fRE87aQmnYQhuGQEEUYt5mSy50h2wF/sFQaCuwrRL2.u', 1, 1, NULL, 0, NULL, NULL, '2017-03-16 22:27:00', '2017-03-16 22:27:00'),
	(10, 'Admin5', 'admin5@admin.com', '$2y$10$8BQvU1RhiQ0egFnBbqwrKeIF1XJG.2Gq00kgBbcU5oI60DEjCL93y', 1, 1, NULL, 0, NULL, 'JkojYMAc31Qer1sQ0ZRzKM2QfEX4J4aBo5qLqbcKdQMHPLofm9ZjdIu2pIpA', '2017-03-16 22:30:15', '2017-03-16 22:34:24'),
	(11, 'Admin7', 'admin7@admin.com', '$2y$10$0lk.jrCyj4Egy38d3Kjt.OCUISIwAMuBFL54wyv6UTNQioi40oa..', 1, 1, NULL, 0, NULL, NULL, '2017-03-16 22:34:56', '2017-03-16 22:34:56'),
	(12, 'Admin8', 'admin8@admin.com', '$2y$10$w9L0xyBxH1/jpM49Ew99duTRiMKY7kG26M9E25OKD8LKwk.fJQPJC', 1, 1, NULL, 0, NULL, NULL, '2017-03-16 22:40:45', '2017-03-16 22:40:45'),
	(13, 'Admin9', 'admin9@admin.com', '$2y$10$sFN4RPIkw3SBoI4izZ122uA4Rvg9yyYB3pBDT5Czr5CL.1rMeep5q', 1, 1, NULL, 0, NULL, NULL, '2017-03-16 22:41:32', '2017-03-16 22:41:32'),
	(14, 'dimac2', 'a2@a2.com', '$2y$10$coPn9jiciWS2Z8VigmPsUudnbJ8xNu.JPFaKM4hvCFt0AD73bIQHC', 1, 1, NULL, 8, NULL, 'CjPOyTvFmdjnxJMqh7GuCM5H4uR5SHadeuGe0NvEVlUQ4FotcpD4cv8npt6J', '2017-03-24 23:19:02', '2017-04-04 22:10:13'),
	(15, 'mUser1', 'm1@m1.com', '$2y$10$Z9f42qDRIHYa1T6IhlzQ1.UurFtnPjc6ZgTQby4unWrXz9yCTBOSq', 2, 5, 14, 8, NULL, NULL, NULL, NULL),
	(16, 'workUser', 'w1@w1.com', '$2y$10$FEXyMIl.53V.LwFy37kquuM./3BjRl4zDb0W9RVUwfmWDd/Uky7EK', 3, 5, 15, 8, NULL, NULL, NULL, NULL),
	(17, 'Admin', 'admin@aspins.com', '$2y$10$LlyQsf2ZEuYqIA3lgAJuGuIyaSn7sXoaxOjATB7fuOBBvVz3i6NlO', 1, 1, NULL, 9, NULL, 'zs2iF6m7t3FMWiNP1ji9Hmo25A5mP20WwIBbQkMtRojp5MBdcnCyPpF152g7', '2017-03-27 15:10:28', '2017-03-27 15:20:08'),
	(18, 'Dima4', 'info@aspins-media.com', '$2y$10$63T/34lrB8nj9h5AiZxO..lfd2Kg/uQlAKnRF1mn3KRtaYWzog.nq', 1, 1, NULL, 10, 'profile-image.jpg', 'IicvlLX77H0raA9Y7cxh5HEHc3NwmOJfec2XLAUANDa8Mrx4c64qUnH59sAY', '2017-04-04 22:10:48', '2017-05-21 22:58:51'),
	(19, 'ManagerTestC', 'man@testc.com', '$2y$10$diZI2BsUfvikWzSEgNqjj.ppHfOwb6VyjC0OPBiOJeyKuCfDYEQIO', 2, 5, 18, 10, NULL, 'fKJwd3Gudjasqc4ZE8tiEb0QCGWVq8ioVBZ34nJ8nbPj0GZ8pwSFZkF9kNin', NULL, '2017-05-21 19:50:54'),
	(20, 'UserTestC', 'user1@testc.com', '$2y$10$OK3TyVdFGuFt6362InPt/On3fhZBXf1TLTH0h4C63OepE6RaTQfOa', 3, 5, 18, 10, NULL, NULL, NULL, NULL),
	(21, 'UserTestC2', 'user2@testc.com', '$2y$10$lvNU92u/BXrS7LdmUKbrS.SPYrtP7vvVoUC2o1h2e3yp/FPuRGp9O', 3, 5, 18, 10, NULL, NULL, NULL, NULL),
	(22, 'UserManWork', 'user3@testc.com', '$2y$10$ifWOh.WgzHWEm5wZr2/zx.vHXUDzQFxqO8CjTqZBuOI7AQ.xwNF5K', 3, 5, 19, 10, NULL, NULL, NULL, NULL),
	(23, 'Dima CompanyA', 'a@a.com', '$2y$10$ZDoSQ/GypqPvw7AKt/8vPelJuEp6uD7MnZ3N7y6XCVvAL1GWMaf1G', 1, 1, NULL, 11, NULL, '6LvyfGhVInfWapNIyP43pLXPWlnGwegITo8804S1Za3reWTX71htkFrs58fw', '2017-05-08 15:23:19', '2017-05-10 19:39:00'),
	(24, 'TestName1-1', 'testname1-1@a.com', '$2y$10$Mt78KIzdAbzObGNmMlzBjuKViDeGF8LCZQJK5XTVO8CrTM3yh0hgS', 3, 5, 18, 10, NULL, NULL, NULL, NULL),
	(25, 'nT1', 'a@a1.com', '$2y$10$mCaV6jFAeGIKMaHC7nUxGOHcijb1Me.y3UlUPWVe.K/LDMaieRKFW', 1, 1, 18, 10, NULL, NULL, NULL, NULL),
	(26, 'nT2', 'a@a2.com', '$2y$10$FR.5O7WvTYsnA1vHEBxn4OqayduLnustXTcfCKVniDkkaSBAsCUQK', 1, 1, 18, 10, NULL, NULL, NULL, NULL),
	(28, 'nT3', 'a@a3.com', '$2y$10$ojkF0nUhmrKIyk4YRsP9C.0zH4.OWE8Fi40MXbivsmMFBCGYRpA6y', 1, 1, 18, 10, NULL, NULL, NULL, NULL),
	(29, 'nT4', 'a@a4.com', '$2y$10$BJ8WG1UdB/b44.5vGOqwYuErK2BrdOuzlqWeK3fXVJ.9VY0gRDFZ6', 3, 1, 18, 10, NULL, NULL, NULL, NULL),
	(30, 'nT5', 'a@a5.com', '$2y$10$gT7YBG9.5WRXmUaGmJY1qucPNsgEotED0/WAmTZIR5zF3zKd0m.Uu', 2, 3, 18, 10, NULL, NULL, NULL, NULL),
	(31, 'nT6', 'a@a6.com', '$2y$10$v0rsd7dkHf8aUwYYftM9W.in8KgTabBae815gPa1WBImaKsUGsdkm', 1, 1, 18, 10, NULL, NULL, NULL, NULL),
	(33, 'nT7', 'a@a7.com', '$2y$10$vOQDHwtvckkTQfltA0RaoeG1rvCPrd8mnF2VHMftHIwBdt/qJTUPe', 1, 1, 18, 10, NULL, NULL, NULL, NULL),
	(35, 'nT8', 'a@a8.com', '$2y$10$sKu58pVhRuFpP8DqNlAW5eweYBxc1vqbxbSKdqWgXa/lTxCtlk22a', 1, 1, 18, 10, NULL, NULL, NULL, NULL),
	(36, 'nT9', 'a@a9.com', '$2y$10$Z6ITqT/BTi6E74qkA3FSQeGSSzsB.Xq1pgvXKPyNre6EMGKmq23oy', 2, 4, 18, 10, 'profile-image.jpg', NULL, NULL, NULL),
	(37, 'nT11-1', 'a@a11-1.com', '$2y$10$UtYmv5SqKg13cCQUcZkK6uOnKul98lTYPd/7QGBGF6kaCrOmHV/TK', 1, 1, 18, 10, 'profile-image.jpg', 'VMPtizxedr1gKxjwOQDS8emr9VlcaF6siZyVl1EHo8pVIMb3DkIzdDdAp9dG', NULL, '2017-05-21 22:42:17'),
	(38, 'Dima', 'info1@aspins-media.com', '$2y$10$RpzpRnGG0D0BIXa3dSFLxueiYuskcB3c3TMlKQczkTQ.k6/SJv4Tq', 1, 1, NULL, 12, 'profile-image.jpg', 'Ye88tNupcbOrwPL0RQWXjS0tFoYkQfSMtJjetuz5ud9XUq2ruzg8NdXMylgh', '2017-05-21 22:43:04', '2017-05-21 22:59:15'),
	(39, 'test_test', 'test_test@test.com', '$2y$10$NFFkb7/i0rQ/KcVpze7BWeKYA2/YPiSOsjyfVb9h.LMLOKqUC2P3u', 1, 1, NULL, 13, 'profile-image.jpg', '2Dg9UWEGoA12uIqu6DqY4KAI74NVnnPwlSLPczCadnkSJW1L5L3Yux01LCVj', '2017-05-23 12:32:49', '2017-05-30 15:09:30'),
	(45, 'fghfghfgh', 'test_thgjghjgest@test.com', '$2y$10$CIk8yCycz25MSZaCyVL6ROVFyKF2EDBEwd.t4/uEgk/BiYlAbX9aG', 1, 1, NULL, 27, 'profile-image.jpg', 'Vy1MO6hqOvVUa7VnYPlyzOWBTkbayoKqLtPVmRqHQtalNQeovPOPntv4s7Na', '2017-05-26 06:52:48', '2017-05-26 07:29:25'),
	(47, 'dhfghghfdghfghfghfgh', 'test_test@test.com1', '$2y$10$esftTgmPHMFHNLhiT5QM7e0Pnw6KeM7nIo.Dd91BjXaOnXh2z/r1a', 1, 3, 39, 13, NULL, NULL, NULL, NULL),
	(48, 'tyjtyj', 'ytjyjt@ru.ru', '$2y$10$iI8Dzz3wJ/XhXNfR3E4h7OlloEtys2EfnNzMwAOw4Um0Xq5rU7CJm', 1, 1, NULL, 28, 'profile-image.jpg', '58qnGM2mW6kZQSWbhA4UTzMk0VfOjIssad1KfAMTyCSLehPipZpupRKWrHRq', '2017-05-29 10:37:39', '2017-05-29 12:20:27'),
	(49, 'jkfkjghfdkjh', 'mofkfgkjsakovskijj@rambler.ru', '$2y$10$AQLcr3Ck9OXsO7uBrrGyieSVHd9ibPmiJutxqLZreXbfpDaWQYVRm', 1, 1, NULL, 30, NULL, 'M9g3LUoYCU2YtiyKRXwZuYuYNoXEymN9V8d4bbx5cmKS24REcngjcbiPfOvl', '2017-05-30 15:10:36', '2017-05-30 15:10:39'),
	(50, 'kjhkjfhkjfhg', 'mgdfgdosakovskijj@rambler.ru', '$2y$10$3vwmH6uAppZaronpgXuel.RQo.Kf5.lKjoq5yOL.BNBn631m7YtzS', 1, 1, NULL, 35, NULL, NULL, '2017-05-30 15:14:52', '2017-05-30 15:14:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица timet.users_company
CREATE TABLE IF NOT EXISTS `users_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.users_company: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users_company` DISABLE KEYS */;
INSERT INTO `users_company` (`id`, `user_id`, `company_id`, `created_at`, `updated_at`) VALUES
	(1, 13, 4, '2017-03-16 22:41:32', '2017-03-16 22:41:32');
/*!40000 ALTER TABLE `users_company` ENABLE KEYS */;

-- Дамп структуры для таблица timet.users_departments
CREATE TABLE IF NOT EXISTS `users_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.users_departments: ~21 rows (приблизительно)
/*!40000 ALTER TABLE `users_departments` DISABLE KEYS */;
INSERT INTO `users_departments` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 2, NULL, NULL),
	(2, 4, 2, NULL, NULL),
	(3, 6, 4, NULL, NULL),
	(4, 7, 2, NULL, NULL),
	(5, 15, 6, NULL, NULL),
	(6, 16, 6, NULL, NULL),
	(7, 19, 10, NULL, NULL),
	(8, 20, 10, NULL, NULL),
	(9, 21, 10, NULL, NULL),
	(10, 22, 10, NULL, NULL),
	(11, 24, 13, NULL, NULL),
	(12, 25, 10, NULL, NULL),
	(13, 26, 10, NULL, NULL),
	(14, 28, 10, NULL, NULL),
	(15, 29, 11, NULL, NULL),
	(16, 30, 11, NULL, NULL),
	(17, 31, 10, NULL, NULL),
	(18, 33, 10, NULL, NULL),
	(19, 35, 10, NULL, NULL),
	(20, 36, 11, NULL, NULL),
	(21, 37, 12, NULL, NULL),
	(22, 40, 15, NULL, NULL),
	(23, 47, 15, NULL, NULL);
/*!40000 ALTER TABLE `users_departments` ENABLE KEYS */;

-- Дамп структуры для таблица timet.users_roles
CREATE TABLE IF NOT EXISTS `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.users_roles: ~22 rows (приблизительно)
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
	(2, 3),
	(3, 3),
	(4, 2),
	(6, 2),
	(7, 1),
	(15, 2),
	(16, 3),
	(19, 2),
	(20, 3),
	(21, 3),
	(22, 3),
	(24, 3),
	(25, 1),
	(26, 1),
	(28, 1),
	(29, 3),
	(30, 2),
	(31, 1),
	(33, 1),
	(35, 1),
	(36, 3),
	(37, 1),
	(40, 1),
	(47, 1);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;

-- Дамп структуры для таблица timet.users_status
CREATE TABLE IF NOT EXISTS `users_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы timet.users_status: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `users_status` DISABLE KEYS */;
INSERT INTO `users_status` (`id`, `status_name`) VALUES
	(1, 'Not approved'),
	(2, 'Pending'),
	(3, 'In progress'),
	(4, 'Rejected'),
	(5, 'Approved');
/*!40000 ALTER TABLE `users_status` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
