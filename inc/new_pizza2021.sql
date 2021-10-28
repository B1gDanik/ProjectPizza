-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 15 2021 г., 08:37
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_pizza2021`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category`
(
    `id`       int(10) NOT NULL,
    `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`)
VALUES (1, 'Мясная'),
       (2, 'Вегетарианская'),
       (3, 'Морепродукты');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news`
(
    `id`      int(11) NOT NULL,
    `title`   varchar(150) COLLATE utf8_unicode_ci NOT NULL,
    `text`    text COLLATE utf8_unicode_ci         NOT NULL,
    `picture` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
    `date`    date                                 NOT NULL,
    `idUser`  int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `picture`, `date`, `idUser`)
VALUES (1, 'Ever Given',
        'Когда в Суэцком канале застряло карго-судно Ever Given (водоизмещение 220 тысяч тонн), то участники того, что гордо именуется международной логистикой, испытали несколько неприятных ощущений — в том числе и финансового характера.',
        '1753218720_0 0 3339 2048_1280x0_80_0_0_e8160df15a79678b16c68a141dc92c3f.jpg.webp', '2021-10-07', 1),
       (4, 'дефиците бумаги',
        'Когда же в прессе на этих днях появились сообщения о возможном дефиците бумаги и бумажных изделий (любых, от туалетной бумаги до упаковочного картона), как по команде, полки магазинов, где выложены кухонные полотенца, одноразовые носовые платки и прочие предметы обихода, начали стремительно опустошаться.',
        'img22.webp', '2021-10-07', 1),
       (6, 'прибыль перевозчиков',
        'Только за 12 месяцев прибыль перевозчиков увеличилась четырехкратно, и рост не думает останавливаться: октябрь и, тем более, ноябрь — главные месяцы года, когда торговля пополняет запасы перед новогодними праздниками: от игрушек до парфюмерии и косметики.',
        'img33.webp', '2021-10-07', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_pizza`
--

CREATE TABLE `order_pizza`
(
    `id`           int(8) NOT NULL,
    `orderedPizza` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
    `orderdDate`   date                                 NOT NULL,
    `totalPrice`   decimal(6, 2)                        NOT NULL,
    `clientName`   varchar(200) COLLATE utf8_unicode_ci NOT NULL,
    `aadress`      varchar(200) COLLATE utf8_unicode_ci NOT NULL,
    `phone`        varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    `email`        varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `order_pizza`
--

INSERT INTO `order_pizza` (`id`, `orderedPizza`, `orderdDate`, `totalPrice`, `clientName`, `aadress`, `phone`, `email`)
VALUES (1, '8:2,9:1', '2021-09-01', '32.70', 'Peter Ivanov', 'Jõhvi, Rakvere 10-2', '22-33-55', 'peter@test.ee'),
       (2, '8:2', '2021-09-05', '21.80', 'Maria Morozova', 'Jõhvi, Narva mnt 7-12', '33-55-77', 'maria@test.ee'),
       (3, '13:1,', '2021-10-13', '10.90', 'danil', '', '545455', 'danilvrenita@gmail.com'),
       (4, '13:1,', '2021-10-13', '10.90', 'danil', '', '45515', 'danilvrenita@gmail.com'),
       (5, '13:1,', '2021-10-13', '10.90', 'danil', 'Jõhvi, Narva mnt 7-12', '42441051', '4'),
       (6, '7:2,', '2021-10-14', '21.80', 'danil', 'Jõhvi, Narva mnt 7-12', '454546', 'danilvrenita@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product`
(
    `id`          int(4) NOT NULL,
    `idCategory`  int(4) NOT NULL,
    `name`        varchar(100) NOT NULL,
    `description` text         NOT NULL,
    `price`       float(10, 2
) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `idCategory`, `name`, `description`, `price`, `photo`)
VALUES (1, 1, 'Пепперони', 'Соус фирменный, Сыр Моцарелла, Помидоры, Пепперони, Прованские травы, Маслины', 8.90,
        'pepperoni.jpg'),
       (2, 1, 'Гавайская пицца', 'Цыпленок, томатный соус, моцарелла и ананасы', 8.90, 'hawaiian.jpg'),
       (3, 2, 'Пицца 4 сыра', 'Соус сливочный, сыр Моцарелла, сыр Дор блю, сыр Чеддер, сыр Пармезан, Прованские травы',
        8.90, '4cheese.jpg'),
       (4, 1, 'Мексиканская пицца',
        'Цыпленок, томатный соус, сладкий перец, лук красный, моцарелла, острый перец халапеньо, томаты и соус сальса',
        10.90, 'mexican.jpg'),
       (5, 1, 'Мясная', 'Цыпленок, ветчина, пикантная пепперони, томатный соус, острая чоризо и моцарелла', 8.90,
        'meat.jpg'),
       (6, 1, 'Четыре сезона',
        'Ветчина, пикантная пепперони, томатный соус, кубики брынзы, шампиньоны, моцарелла, томаты и орегано', 10.90,
        'seasons.jpg'),
       (7, 1, 'Итальянская', 'Пикантная пепперони, томатный соус, шампиньоны, моцарелла, маслины и орегано', 10.90,
        'italian.jpg'),
       (8, 3, 'Морская', 'Томатный соус, сладкий перец, лук красный, моцарелла, маслины и креветки', 10.90, 'sea.jpg'),
       (9, 3, 'Пицца с тунцом', 'Томатный соус, лук красный, моцарелла, маслины, орегано и тунец', 10.90, 'tunec.jpg'),
       (10, 1, 'Чизбургер-Пицца',
        'Говядина (фарш), сырный соус, бекон, лук красный, моцарелла, томаты и огурцы консервированные', 10.90,
        'cheeseburger.jpg'),
       (11, 1, 'Сырный цыпленок', 'Сырный соус, цыпленок, томаты и моцарелла', 8.90, 'cheesechicken.jpg'),
       (12, 2, 'Сальса', 'Томатный соус, шампиньоны, моцарелла и соус сальса', 8.90, 'salsa.jpg'),
       (13, 1, 'Жар-Баран', 'Томатный соус, моцарелла, томаты, колбаски из баранины и овощи-гриль', 10.90, 'baran.jpg'),
       (14, 2, 'Маргарита', 'Томатный соус, моцарелла, томаты и орегано', 8.90, 'margarita.jpg'),
       (15, 2, 'Овощи и грибы',
        'Томатный соус, кубики брынзы, шампиньоны, сладкий перец, лук красный, моцарелла, маслины, томаты и базилик',
        8.90, 'vegetables.jpg'),
       (16, 2, 'Сырная', 'Томатный соус и моцарелла', 8.90, 'cheese.jpg'),
       (17, 2, 'asd', 'asd', 234.00, 'загружено.jfif'),
       (18, 2, 'asd', 'asd', 234.00, 'загружено.jfif');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user`
(
    `id`       int(4) NOT NULL,
    `username` varchar(50)                                             NOT NULL,
    `epost`    varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `password` varchar(100)                                            NOT NULL,
    `role`     enum('admin','client') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `epost`, `password`, `role`)
VALUES (1, 'admin', 'admin@test.ee', '$2y$10$01234567890123456789aOY2rIRRxCnt6qxqtst5rnLuKDrDoYU8O', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
    ADD PRIMARY KEY (`id`),
  ADD KEY `linna_ibfk_1` (`idUser`);

--
-- Индексы таблицы `order_pizza`
--
ALTER TABLE `order_pizza`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
    ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
    MODIFY `id` int (10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `order_pizza`
--
ALTER TABLE `order_pizza`
    MODIFY `id` int (8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
    MODIFY `id` int (4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
    MODIFY `id` int (4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
    ADD CONSTRAINT `linna_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
    ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
