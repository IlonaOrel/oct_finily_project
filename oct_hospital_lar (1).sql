-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 31 2021 г., 00:24
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oct_hospital_lar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialization_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `photo`, `name`, `phone`, `email`, `password`, `specialization_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'doc1.jpg', 'Petr Volk', '315-15-15', 'asd@gmail.com', 'qwerty', 10, NULL, '2021-08-24 18:26:46', '2021-08-24 18:26:46'),
(2, 'doc2.jpg', 'Rita Dydko', '0974895623', 'zxc45@gmail.com', 'qwerty', 10, NULL, '2021-08-25 16:17:19', '2021-08-25 16:17:19'),
(4, 'doc3.jpg', 'Alice Bybka', '0974895623', 'zxc@gmail.com', 'asdfgh', 10, NULL, '2021-08-25 16:28:52', '2021-08-25 16:28:52');

-- --------------------------------------------------------

--
-- Структура таблицы `doctor_patients`
--

CREATE TABLE `doctor_patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `conclusion` text COLLATE utf8_unicode_ci NOT NULL,
  `treatment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_visit` datetime NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `examination_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `doctor_patients`
--

INSERT INTO `doctor_patients` (`id`, `conclusion`, `treatment`, `date_visit`, `patient_id`, `doctor_id`, `examination_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'dffdf fdgbdgbvg', 'qwerwrwrert fbdgdg dff ', '2021-08-01 00:00:00', 1, 4, 6, 1, NULL, NULL),
(2, 'fdbvcvdfbb dfgfghfgh', 'fdfddgbgfb gbfgbfgb', '2021-08-17 00:00:00', 1, 2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `examinations`
--

CREATE TABLE `examinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `examinations`
--

INSERT INTO `examinations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Электрокардиография (ЭКГ)', NULL, NULL),
(2, 'ХОЛТЕРОВСКОЕ МОНИТОРИРОВАНИЕ ЭКГ', NULL, NULL),
(3, 'СУТОЧНОЕ МОНИТОРИРОВАНИЕ АРТЕРИАЛЬНОГО ДАВЛЕНИЯ (СМАД)', NULL, NULL),
(4, 'СПИРОГРАФИЯ ', NULL, NULL),
(5, 'МУЛЬТИСПИРАЛЬНАЯ КОМПЬЮТЕРНАЯ ТОМОГРАФИЯ (МСКТ)', NULL, NULL),
(6, 'МАГНИТНО-РЕЗОНАНСНАЯ ТОМОГРАФИЯ (МРТ)', NULL, NULL),
(7, 'Общий (клинический) анализ крови (ОАК)', NULL, NULL),
(8, 'Общий анализ мочи', NULL, NULL),
(9, 'Биохимические исследование крови', NULL, NULL),
(10, 'Микробиологические (бактериологические) исследования', NULL, NULL),
(11, 'Иммунологические исследования методом иммуноферментного анализа', NULL, NULL),
(12, 'Ультразвуковое исследование ', NULL, NULL),
(13, 'Флюрография', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2021_08_16_164130_create_specializations_table', 1),
('2021_08_16_164328_create_examinations_table', 1),
('2021_08_16_164403_create_status_table', 1),
('2021_08_16_164527_create_patients_table', 1),
('2021_08_16_164800_create_doctor_patients_table', 1),
('2021_08_16_181856_drop_doctos_table', 1),
('2021_08_23_181946_create_doctors_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confidant` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `photo`, `name`, `birthday`, `address`, `phone`, `email`, `confidant`, `created_at`, `updated_at`) VALUES
(1, 'photo1.jpg', 'Ivan Bybko', '1981-02-01', 'Dnepr, st. Kazakova, 12/45', '745-12-23', 'bybko@qwe.qwe', '{\"key1\": \"Svetlana\", \"key2\": \"7891566\"}', NULL, NULL),
(2, 'photo2.jpg', 'Artem Filipov', '1987-10-11', 'Dnepr, st Kazakova, 13', '099715-89-63', 'Art@qwe.qwe', 'Alisa:823-47-11', NULL, NULL),
(3, 'photo3.jpg', 'Sveta Soroka', '1995-12-23', 'Dnepr, st. Titova, 17/23', '063451-23-74', 'sorok@asd.as', 'Den:122-44-55', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `specializations`
--

CREATE TABLE `specializations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL),
(2, 'Педіатр', NULL, NULL),
(3, 'Ортопед-травматолог', NULL, NULL),
(4, 'Сімейний лікар', NULL, NULL),
(5, 'Навролог', NULL, NULL),
(6, 'Отоларинголог', NULL, NULL),
(7, 'Офтальмолог', NULL, NULL),
(8, 'Ендокринолог', NULL, NULL),
(9, 'Хірург', NULL, NULL),
(10, 'Кардіолог', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'discharged', NULL, NULL),
(2, 'undergoing examinal', NULL, NULL),
(3, 'undergoing treatment', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialization_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `doctors_specialization_id_foreign` (`specialization_id`);

--
-- Индексы таблицы `doctor_patients`
--
ALTER TABLE `doctor_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_patients_patient_id_foreign` (`patient_id`),
  ADD KEY `doctor_patients_examination_id_foreign` (`examination_id`),
  ADD KEY `doctor_patients_status_id_foreign` (`status_id`),
  ADD KEY `doctor_patients_doctor_id_foreign` (`doctor_id`) USING BTREE;

--
-- Индексы таблицы `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `specialization_id` (`specialization_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `doctor_patients`
--
ALTER TABLE `doctor_patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_specialization_id_foreign` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`);

--
-- Ограничения внешнего ключа таблицы `doctor_patients`
--
ALTER TABLE `doctor_patients`
  ADD CONSTRAINT `doctor_patients_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctor_patients_examination_id_foreign` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`),
  ADD CONSTRAINT `doctor_patients_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `doctor_patients_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
