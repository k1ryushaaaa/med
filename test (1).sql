-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2024 г., 20:33
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int NOT NULL,
  `patient_id` int NOT NULL,
  `doctor_id` int NOT NULL,
  `appointment_date` datetime NOT NULL,
  `reason` text,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_date`, `reason`, `status`) VALUES
(1, 1, 1, '2024-01-05 10:00:00', 'Консультація', 'scheduled'),
(2, 2, 2, '2024-02-10 11:30:00', 'Обстеження', 'completed'),
(3, 3, 3, '2024-03-15 09:00:00', 'Рутинний огляд', 'scheduled'),
(4, 4, 4, '2024-04-20 14:00:00', 'Вакцинація', 'cancelled'),
(5, 5, 5, '2024-05-25 13:30:00', 'Діагностика', 'scheduled'),
(6, 6, 6, '2024-06-30 15:00:00', 'Лікування', 'completed'),
(7, 7, 7, '2024-07-05 16:00:00', 'Консультація', 'scheduled'),
(8, 8, 8, '2024-08-10 10:30:00', 'Обстеження', 'completed'),
(9, 9, 9, '2024-09-15 12:00:00', 'Рутинний огляд', 'scheduled'),
(10, 10, 10, '2024-10-20 11:00:00', 'Вакцинація', 'cancelled'),
(11, 11, 11, '2024-11-25 14:30:00', 'Діагностика', 'scheduled'),
(12, 12, 12, '2024-12-30 09:30:00', 'Лікування', 'completed'),
(13, 13, 13, '2024-01-05 15:00:00', 'Консультація', 'scheduled'),
(14, 14, 14, '2024-02-10 10:30:00', 'Обстеження', 'completed'),
(15, 15, 15, '2024-03-15 11:00:00', 'Рутинний огляд', 'scheduled'),
(16, 16, 16, '2024-04-20 12:30:00', 'Вакцинація', 'cancelled'),
(17, 17, 17, '2024-05-25 15:30:00', 'Діагностика', 'scheduled'),
(18, 18, 18, '2024-06-30 10:30:00', 'Лікування', 'completed'),
(19, 19, 19, '2024-07-05 09:00:00', 'Консультація', 'scheduled');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `clinic_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `specialization`, `phone`, `email`, `clinic_address`) VALUES
(1, 'Андрій', 'Семенюк', 'Кардіологія', '067-123-4561', 'semenyuk1@example.com', 'вул. Медична, 1, Київ'),
(2, 'Ольга', 'Дзюба', 'Неврологія', '067-123-4562', 'dzyuba2@example.com', 'вул. Лікарська, 2, Львів'),
(3, 'Іван', 'Кушнір', 'Терапія', '067-123-4563', 'kushnir3@example.com', 'вул. Доктора, 3, Одеса'),
(4, 'Марія', 'Гриценко', 'Педіатрія', '067-123-4564', 'hrytsenko4@example.com', 'вул. Поліклінічна, 4, Харків'),
(5, 'Петро', 'Ковальчук', 'Дерматологія', '067-123-4565', 'kovalchuk5@example.com', 'вул. Діагностична, 5, Дніпро'),
(6, 'Світлана', 'Мартиненко', 'Кардіологія', '067-123-4566', 'martynenko6@example.com', 'вул. Стоматологічна, 6, Запоріжжя'),
(7, 'Юрій', 'Терещенко', 'Неврологія', '067-123-4567', 'tereshchenko7@example.com', 'вул. Хірургічна, 7, Вінниця'),
(8, 'Людмила', 'Савченко', 'Терапія', '067-123-4568', 'savchenko8@example.com', 'вул. Лікарська, 8, Полтава'),
(9, 'Володимир', 'Яковенко', 'Педіатрія', '067-123-4569', 'yakovenko9@example.com', 'вул. Госпітальна, 9, Черкаси'),
(10, 'Катерина', 'Коваль', 'Дерматологія', '067-123-4570', 'koval10@example.com', 'вул. Лікувальна, 10, Житомир'),
(11, 'Олександр', 'Литвиненко', 'Кардіологія', '067-123-4571', 'lytvynenko11@example.com', 'вул. Медична, 11, Суми'),
(12, 'Вікторія', 'Павленко', 'Неврологія', '067-123-4572', 'pavlenko12@example.com', 'вул. Лікарська, 12, Тернопіль'),
(13, 'Сергій', 'Романенко', 'Терапія', '067-123-4573', 'romanenko13@example.com', 'вул. Поліклінічна, 13, Ужгород'),
(14, 'Тетяна', 'Василенко', 'Педіатрія', '067-123-4574', 'vasilenko14@example.com', 'вул. Госпітальна, 14, Рівне'),
(15, 'Ігор', 'Мельник', 'Дерматологія', '067-123-4575', 'melnyk15@example.com', 'вул. Лікувальна, 15, Хмельницький'),
(16, 'Олена', 'Гончаренко', 'Кардіологія', '067-123-4576', 'goncharenko16@example.com', 'вул. Медична, 16, Чернігів'),
(17, 'Роман', 'Кравченко', 'Неврологія', '067-123-4577', 'kravchenko17@example.com', 'вул. Лікарська, 17, Луцьк'),
(18, 'Інна', 'Ковальчук', 'Терапія', '067-123-4578', 'kovalchuk18@example.com', 'вул. Поліклінічна, 18, Миколаїв'),
(19, 'Олексій', 'Мельничук', 'Педіатрія', '067-123-4579', 'melnychuk19@example.com', 'вул. Госпітальна, 19, Чернівці');

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `patient_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `emergency_contact` varchar(100) DEFAULT NULL,
  `emergency_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `address`, `phone`, `email`, `emergency_contact`, `emergency_phone`) VALUES
(1, 'Олексій', 'Петренко', '1985-02-10', 'Чоловік', 'вул. Шевченка, 10, Київ', '098-123-4560', 'petrenko1@example.com', 'Марія Петренко', '098-654-3210'),
(2, 'Марія', 'Іваненко', '1990-05-15', 'Жінка', 'вул. Грушевського, 5, Львів', '098-123-4561', 'ivanenko2@example.com', 'Олексій Іваненко', '098-654-3211'),
(3, 'Ірина', 'Сидоренко', '1987-08-22', 'Жінка', 'вул. Франка, 25, Одеса', '098-123-4562', 'sidorenko3@example.com', 'Петро Сидоренко', '098-654-3212'),
(4, 'Петро', 'Коваленко', '1975-11-30', 'Чоловік', 'вул. Лесі Українки, 12, Харків', '098-123-4563', 'kovalenko4@example.com', 'Ірина Коваленко', '098-654-3213'),
(5, 'Ольга', 'Ткаченко', '1983-03-17', 'Жінка', 'вул. Бандери, 8, Дніпро', '098-123-4564', 'tkachenko5@example.com', 'Сергій Ткаченко', '098-654-3214'),
(6, 'Віктор', 'Шевченко', '1995-06-21', 'Чоловік', 'вул. Пушкіна, 14, Запоріжжя', '098-123-4565', 'shevchenko6@example.com', 'Ганна Шевченко', '098-654-3215'),
(7, 'Анастасія', 'Кравченко', '1994-09-07', 'Жінка', 'вул. Сковороди, 20, Вінниця', '098-123-4566', 'kravchenko7@example.com', 'Юрій Кравченко', '098-654-3216'),
(8, 'Сергій', 'Мельник', '1974-06-18', 'Чоловік', 'вул. Гоголя, 7, Полтава', '098-123-4567', 'melnik8@example.com', 'Катерина Мельник', '098-654-3217'),
(9, 'Тетяна', 'Поліщук', '1989-01-25', 'Жінка', 'вул. Чехова, 9, Черкаси', '098-123-4568', 'polishchuk9@example.com', 'Віктор Поліщук', '098-654-3218'),
(10, 'Дмитро', 'Мороз', '1991-10-26', 'Чоловік', 'вул. Коцюбинського, 3, Житомир', '098-123-4569', 'moroz10@example.com', 'Олена Мороз', '098-654-3219'),
(11, 'Наталія', 'Гончар', '1982-05-23', 'Жінка', 'вул. Шевченка, 6, Суми', '098-123-4570', 'gonchar11@example.com', 'Андрій Гончар', '098-654-3220'),
(12, 'Ігор', 'Мельничук', '1988-05-28', 'Чоловік', 'вул. Ломоносова, 15, Тернопіль', '098-123-4571', 'melnychuk12@example.com', 'Світлана Мельничук', '098-654-3221'),
(13, 'Світлана', 'Лисенко', '1984-08-30', 'Жінка', 'вул. Гончара, 18, Ужгород', '098-123-4572', 'lysenko13@example.com', 'Павло Лисенко', '098-654-3222'),
(14, 'Олег', 'Коваль', '1991-04-28', 'Чоловік', 'вул. Гайдара, 2, Рівне', '098-123-4573', 'koval14@example.com', 'Людмила Коваль', '098-654-3223'),
(15, 'Андрій', 'Романенко', '1981-12-23', 'Чоловік', 'вул. Жуковського, 11, Хмельницький', '098-123-4574', 'romanenko15@example.com', 'Наталія Романенко', '098-654-3224'),
(16, 'Марина', 'Олійник', '2002-01-18', 'Жінка', 'вул. Винниченка, 22, Чернігів', '098-123-4575', 'oliynyk16@example.com', 'Микола Олійник', '098-654-3225'),
(17, 'Валерій', 'Павленко', '2002-01-17', 'Чоловік', 'вул. Сухомлинського, 13, Луцьк', '098-123-4576', 'pavlenko17@example.com', 'Галина Павленко', '098-654-3226'),
(18, 'Людмила', 'Журавель', '2000-12-02', 'Жінка', 'вул. Чорновола, 5, Миколаїв', '098-123-4577', 'zhuravel18@example.com', 'Олександр Журавель', '098-654-3227'),
(19, 'Максим', 'Бондаренко', '1988-07-11', 'Чоловік', 'вул. Мазепи, 17, Чернівці', '098-123-4578', 'bondarenko19@example.com', 'Інна Бондаренко', '098-654-3228');

-- --------------------------------------------------------

--
-- Структура таблицы `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` int NOT NULL,
  `appointment_id` int NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `frequency` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `instructions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `prescriptions`
--

INSERT INTO `prescriptions` (`prescription_id`, `appointment_id`, `medicine_name`, `dosage`, `frequency`, `duration`, `instructions`) VALUES
(1, 1, 'Анальгін', '500mg', 'Тричі на день', '7 днів', 'Приймати після їжі'),
(2, 2, 'Парацетамол', '500mg', 'Двічі на день', '5 днів', 'Запивати великою кількістю води'),
(3, 3, 'Аспірин', '100mg', 'Один раз на день', '10 днів', 'Не приймати на голодний шлунок'),
(4, 4, 'Нурофен', '200mg', 'Чотири рази на день', '3 дні', 'Приймати після їжі'),
(5, 5, 'Цитрамон', '300mg', 'Двічі на день', '5 днів', 'Запивати великою кількістю води'),
(6, 6, 'Амоксицилін', '250mg', 'Тричі на день', '7 днів', 'Приймати після їжі'),
(7, 7, 'Азитроміцин', '500mg', 'Один раз на день', '3 дні', 'Приймати до їжі'),
(8, 8, 'Кетанов', '10mg', 'Тричі на день', '5 днів', 'Приймати після їжі'),
(9, 9, 'Діазолін', '100mg', 'Двічі на день', '10 днів', 'Запивати великою кількістю води'),
(10, 10, 'Цефтріаксон', '1g', 'Один раз на день', '7 днів', 'Приймати після їжі'),
(11, 11, 'Лоратадин', '10mg', 'Один раз на день', '14 днів', 'Приймати до їжі'),
(12, 12, 'Ібупрофен', '400mg', 'Чотири рази на день', '7 днів', 'Приймати після їжі'),
(13, 13, 'Еритроміцин', '500mg', 'Двічі на день', '7 днів', 'Запивати великою кількістю води'),
(14, 14, 'Доксициклін', '100mg', 'Один раз на день', '10 днів', 'Не приймати на голодний шлунок'),
(15, 15, 'Супрастин', '25mg', 'Чотири рази на день', '5 днів', 'Приймати після їжі'),
(16, 16, 'Амброксол', '30mg', 'Тричі на день', '7 днів', 'Приймати до їжі'),
(17, 17, 'Левоцетиризин', '5mg', 'Один раз на день', '14 днів', 'Приймати до їжі'),
(18, 18, 'Флемоксин', '250mg', 'Тричі на день', '5 днів', 'Запивати великою кількістю води'),
(19, 19, 'Амоксицилін', '500mg', 'Двічі на день', '7 днів', 'Приймати після їжі');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Индексы таблицы `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescription_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`);

--
-- Ограничения внешнего ключа таблицы `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
