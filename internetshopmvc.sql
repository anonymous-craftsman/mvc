-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 02 2019 г., 21:01
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `internetshopmvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categoria`
--

INSERT INTO `categoria` (`id`, `name`, `photo`) VALUES
(8, 'Телефони', '1570706449phone.jpg'),
(9, 'Ноутбуки', '1570706467nout.jpg'),
(13, 'Планшети', '1570706655plansh.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(17) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `address`, `note`) VALUES
(23, 'Стащенко Антон Олександрович', 'gdgdg', 'gdg', 'gfdg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `kol` int(11) NOT NULL,
  `har` text NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `kol`, `har`, `photo`, `id_cat`) VALUES
(6, 'Xiaomi Redmi 7A 2/16GB Matte Black', '2999.00', 15, 'Экран (5.45\', IPS, 1440x720)/ Qualcomm Snapdragon 439 (4 x 1.95 ГГц + 4 х 1.45 ГГц)/ основная камера: 13 Мп, фронтальная камера: 5 Мп/ RAM 2 ГБ/ 16 ГБ встроенной памяти + microSD (до 256 ГБ)/ 3G/ LTE/ GPS/ ГЛОНАСС/ поддержка 2х SIM-карт (Nano-SIM)/ Android 9.0 (Pie)/ 4000 мА*ч', '1570972386xiaomi_redmi_7a_2_16gb_matte_black_eu_images_12939803028.jpg', 8),
(7, 'Samsung Galaxy M10 2/16GB Charcoal Black', '3399.00', 8, 'Экран (6.2\", PLS, 1520х720)/ Samsung Exynos 7870 (1.6 ГГц)/ двойная основная камера: 13 Мп + 5 Мп, фронтальная 5 Мп/ RAM 2 ГБ/ 16 ГБ встроенной памяти + microSD (до 512 ГБ)/ 3G/ LTE/ GPS/ ГЛОНАСС/ BDS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 8.1 (SE 9.5) / 3400 мА*ч', '1570972518samsung_sm_m105gdagsek_images_12536067058.jpg', 8),
(8, 'Asus ROG Strix G531GT-BQ132', '24999.00', 5, 'Экран 15.6\" IPS (1920x1080) Full HD, глянцевый с антибликовым покрытием / Intel Core i5-9300H (2.4 - 4.1 ГГц) / RAM 8 ГБ / SSD 256 ГБ / nVidia GeForce GTX 1650, 4 ГБ / без ОД / LAN / Wi-Fi / Bluetooth / без ОС / 2.35 кг / черный', '1570972584asus_90nr01l3_m02530_images_12940351704.jpg', 9),
(9, 'Samsung Galaxy Tab A 10.1 32GB LTE Black', '7499.00', 5, 'Экран 10.1\" (1920x1080) емкостный MultiTouch / Samsung Exynos 7904 (2x1.8 ГГц + 6x1.6 ГГц) / RAM 2 ГБ / 32 ГБ встроенной памяти + microSD / 3G / LTE / Wi-Fi / Bluetooth 5.0 / основная камера 8 Мп, фронтальная - 5 Мп / GPS / ГЛОНАСС / Android 9.0 (Pie) / 470 г / черный', '1570972712samsung_sm_t515nzkdsek_images_12161534788.jpg', 13),
(10, 'Huawei MediaPad T3 10 LTE Gold', '5499.00', 12, 'Экран 9.6\" IPS (1280x800) MultiTouch / Qualcomm Snapdragon 425 (1.4 ГГц) / RAM 2 ГБ / 16 ГБ встроенной памяти + microSD / 3G / LTE / Wi-Fi / Bluetooth / основная камера 5 Мп, фронтальная 2 Мп / GPS / Android 7.0 (Nougat) / 460 г / золотистый', '1570972763huawei_mediapad_t3_10_lte_gold_images_2058669844.jpg', 13),
(11, 'MSI PS42 Modern 8MO', '17999.00', 1, 'Экран 14\" IPS (1920x1080) Full HD, матовый / Intel Core i5-8265U (1.6 - 3.9 ГГц) / RAM 8 ГБ / SSD 256 ГБ / Intel UHD Graphics 620 / без ОД / Wi-Fi / Bluetooth / веб-камера / DOS / 1.18 кг / серебристый / подсветка клавиатуры / сканер отпечатков пальцев / металлический корпус', '1571728989copy_msi_ps42_modern_8rc_098ua_5d554e849c928_images_13441620596.jpg', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `relation`
--

CREATE TABLE `relation` (
  `id_client` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `kolvo` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `email`, `phone`, `avatar`) VALUES
(3, 'Стащенко Антон Олександрович', 'stony', '9adcb29710e807607b683f62e555c22dc5659713', 'tsas@gmail.com', '+380682638388', '1570955226gi1.gif'),
(4, 'Костя', 'kostya', 'e5fe24f1d8856e66c6f6af37925b829a0a024c82', 'tsas@gmail.com', '+380682638388', '15709833331540579682avatar.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
