-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 21 2018 г., 19:06
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `id760437_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `latin_url` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `latin_url`, `parent_id`) VALUES
(1, 'Компьютеры и ноутбуки', 'Компьютеры и ноутбуки', 0),
(2, 'Смартфоны и телефоны ', 'Phones-and-tables', 0),
(3, 'Автотовары', 'Auto', 0),
(7, 'Ноутбуки', 'notebooks', 1),
(8, 'Планшеты', 'tablets', 1),
(9, 'Смартфоны', 'Смартфоны', 2),
(10, 'Аксессуары для телефонов ', 'mobile-smart-accessories', 2),
(11, 'Аксессуары для ноутбуков и ПК', 'computers-notebooks-accessories', 1),
(12, 'Видеорегистраторы', 'videoregistratory', 3),
(13, 'Видеокарты', 'videocards', 16),
(16, 'Комплектующие для ПК', 'Accessories', 0),
(17, 'Процессоры', 'processors', 16),
(28, 'Бытовая техника', 'Бытовая техника', 0),
(29, 'Холодильники', 'Холодильники', 28),
(30, 'Стиральные машины', 'Стиральные машины', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `latin_url` varchar(100) NOT NULL,
  `Image_url` varchar(50) NOT NULL,
  `hit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `category_id`, `description`, `price`, `latin_url`, `Image_url`, `hit`) VALUES
(1, 'Asus k501ux', 7, 'The ASUS MeMO Pad 7 was created for those looking for a value tablet. The 7-inchASUS MeMO Pad 7 punches well above its weight, boasting features and specifications more commonly found on high-end tablets.', 16000, 'asus-k501ux', 'Asus k501ux.jpg', 0),
(2, 'Apple Macbook Pro 15', 7, 'Несмотря на невероятную компактность и лёгкость, новый MacBook Pro с дисплеем Retina поражает своей мощностью. Чтобы добиться такого сочетания возможностей в едином корпусе, требовалось чрезвычайное внимание к деталям и готовность принимать смелые решения. Каждый миллиметр создавался, продумывался и разрабатывался по самым строгим стандартам. Громоздкие устаревшие технологии, такие как вращающийся жёсткий диск или оптический дисковод, остались в прошлом, уступив место инновационным решениям — флэш-накопителям PCIe. Они намного быстрее и значительно надёжнее обычного жёсткого диска. И при этом занимают на 90% меньше места. Поэтому MacBook Pro отличается не только потрясающими возможностями, но и невероятной портативностью.\n\nКогда на экране умещается более 5 миллионов — результат просто поражает. Плотность пикселей настолько высока, что глаз уже не способен различить отдельные из них. Изображения выходят на новый уровень реалистичности. Благодаря впечатляющему разрешению экрана (2880x1800 пикселей) вы видите ещё больше деталей в каждом изображении — с точностью до пикселя. Текст отображается настолько чётко, что электронные письма, веб-страницы и документы выглядят как будто на печатной странице.\n\nНовый дисплей Retina уменьшает блики, обеспечивая при этом превосходные цвета и качество изображения. А высокая контрастность делает оттенки белого и чёрного ещё глубже. И все остальные цвета также отличаются богатством и яркостью. Благодаря технологии IPS угол обзора экрана составляет 178° — вы почувствуете разницу практически под любым углом. И не сомневайтесь — то, что вы увидите, вам понравится.\n', 35000, 'appple-mackbook', 'appple-mackbook.jpg', 1),
(3, 'Apple iPhone 7', 9, 'The ASUS MeMO Pad 7 was created for those looking for a value tablet. The 7-inchASUS MeMO Pad 7 punches well above its weight, boasting features and specifications more commonly found on high-end tablets.', 21000, 'apple-iphone-7', 'apple-iphone-7.jpg', 0),
(4, 'Google Pixel xl', 9, 'The ASUS MeMO Pad 7 was created for those looking for a value tablet. The 7-inchASUS MeMO Pad 7 punches well above its weight, boasting features and specifications more commonly found on high-end tablets.', 18000, 'google-pixel-xl', 'google-pixel-xl.jpg', 0),
(5, 'Lenovo ZUK Z1', 9, 'кран (5.5\", IPS, 1920x1080)/ Qualcomm Snapdragon 801 (2.5 ГГц)/ основная камера: 13 Мп, фронтальная камера: 8 Мп/ RAM 3 ГБ/ 64 ГБ встроенной памяти/ 3G/ LTE/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 5.1.1 (Lollipop) / 4100 мА*ч\nПодробнее: http://rozetka.com.ua/lenovo_zuk_z1_3_64gb_gry_www_eu/p17918718/', 7000, 'Lenovo_ZUK_Z1', 'Lenovo_ZUK_Z1.jpg', 0),
(6, 'Asus PCI-Ex GeForce GTX 1060 ROG Strix ', 13, 'ROG Strix — это новая серия геймерских устройств в рамках бренда Republic of Gamers. Их отличительной особенностью являются высочайшая производительность, использование инновационных технологий, безупречный уровень надежности и стильный дизайн, подчеркивающий индивидуальность каждого геймера. Устройства серии ROG Strix – это скорость и функциональность, необходимая для победы в любой игре!\r\nПодробнее: https://hard.rozetka.com.ua/asus_rog_strix_gtx1060_6g_gaming/p10219640/', 13999, 'AsusPCI-Ex_GeForce_GTX_1060', 'GTX1060.jpg', 0),
(7, 'Видеорегистратор Xiaomi Yi Smart Dash WiFi', 12, 'Устройство Xiaomi Yi Smart Dash и может выступать в роли видеорегистратора в автомобиле. Камера имеет сенсор на 3 Мп и апертуру f/1.8, при этом Smart Dash поддерживает запись видео 2K Super HD (1296p).\r\n\r\nСъемка ведется под широким углом 165°, а количество кадров в секунду можно выставить на 30 или 60 fps. Емкость встроенной батареи составляет 240 мА*ч.\r\n\r\nГлавной особенностью Yi Smart Dash является наличие 2.7\" дюймового LCD дисплея. Также у камеры есть поддержка Wi-Fi, с помощью которого можно стримить видео на экран смартфона, а также управлять камерой с него.\r\n\r\nSmart система ADAS\r\nВстроенная интеллектуальная система помощи водителям повышает безопасность вождения. В ее основе лежит специальный алгоритм, который в режиме реального времени определяет расстояние автомобиля до разметки или машины, едущей впереди вас, и в случае превышения допустимых лимитов дает системе команду предупредить вас скорректировать езду.\r\n', 2199, 'Xiaomi_Yi_Smart', 'XiaomiYiSmart .jpg', 0),
(9, 'Meizu mx5 ', 9, 'крутой телефон', 5000, 'Meizu)_mx5 ', 'meizu-mx5.jpg', 0),
(10, 'Цепная пила Daewoo DACS 2500E', 5, 'Электрическая цепная пила Daewoo DACS 2500Е предназначена для бытового использования. Идеально подходит для распила стволов деревьев, деревянного бруса, обрезания веток.\r\n\r\nВАЖНО! Пилой можно пилить только материалы из дерева!\r\n\r\nДлина шины цепной пилы определяет толщину бревна, которое можно ею распилить. Так, при длине шины в 40 см, как у этой модели, минуты за 2 можно справиться со стволом диаметром 35 см. А при наличии специальных навыков у лесоруба этой пилой можно без труда распилить и более толстое дерево.\r\n\r\nВ этой модели применен электрический двигатель собственного производства фирмы Daewoo. Это гарантирует высокий уровень надежности базового компонента системы благодаря непосредственному контролю производства. Разработчики позаботились об оптимальном соотношении крутящего момента и скорости вращения, за счет чего удалось добиться хорошей производительности. Мотор раcположен поперечно для передачи на цепь 100% крутящего момента.\r\n\r\nВысокая эргономичность устройства достигается за счет малого веса, небольших габаритов и предусмотренных двух ручек — передней и задней, которые определяют надежный захват с двух сторон. Корпус инструмента выполнен из ударопрочного ABS-пластика. Он служит надежной защитой внутренних компонентов пилы и при этом существенно не увеличивает ее массу. Удобной в обслуживании ее делает система привода SDS, позволяющая установить и натянуть цепь без применения специальных инструментов.\r\n\r\nСледить за своевременной смазкой пильной цепи позволяет индикатор уровня цепного масла. Безопасность обеспечивают зубчатый упор, способствующий фиксации бревна, а также предохранитель, препятствующий непроизвольному запуску. Кроме того, предусмотрен ленточный тормоз для моментальной остановки цепи при сильной отдаче во избежание получения травм оператором.\r\n\r\nДля смазки самой цепи следует применять специальное масло для пильной цепи.\r\n\r\nДополнительная гарантия XXL\r\nНа этот товар помимо основной фирменной гарантии в 1 год распространяется также дополнительная гарантия 24 месяца. Таким образом, при соблюдении некоторых простых условий срок сервисного обслуживания купленной вами техники составит три года. \r\n*Подробности — на официальном сайте Daewoo Power Products Украина\r\n', 2950, 'Daewoo_DACS_2500E', 'Daewoo DACS 2500E.jpg', 0),
(12, 'Мышь Razer Abyssus 2014 ', 11, 'Razer Abyssus 2014 Essential создана для геймеров, ищущих качество, надежность и производительность в простой игровой мышке, без программных \"наворотов\". Razer Abyssus вооружена высокочувствительными кнопками с максимальной осязательной обратной связью. Высочайшую точность обеспечивает оптический сенсор с разрешением 3500 dpi.\nПодробнее: https://hard.rozetka.com.ua/razer_abyssus_rz01_01190100_r3g1/p1314112/', 999, 'razer_abyssus_rz01', 'Razer Abyssus 2014.jpg', 1),
(13, 'Xiaomi Mi Power Bank ', 10, 'Для устройства подобного типа, Xiaomi Mi Power Bank 16000 мА*ч обладает достаточно компактным размером и удивительно малым весом. Благодаря этому аккумулятор несложно транспортировать, что сможет прекрасно выручить вас, к примеру, при длительной поездке за город на природу. Xiaomi Mi Power Bank 16000 мА*ч совместим практически со всеми возможными устройствами, поддерживающими подключение через порт USB. Аккумулятор имеет два USB-выхода. Каждый из USB-выходов по отдельности обеспечивает 2.1 А. Одновременно же оба порта на выходе суммарно дают ток 3.6 А.\r\nПодробнее: https://rozetka.com.ua/xiaomi_mi_power_bank_16000/p1999862/', 589, 'xiaomi_mi_power_ban', 'Xiaomi Mi Power Bank.jpg', 0),
(14, 'intel Core i3-6100 ', 17, 'Новый процессор Intel Core i3-6100 6-го поколения, с кодовым названием микроархитектуры Skylake. Предназначен для настольной платформы Intel LGA 1151.\n\nIntel Core i3-6100 производится по стандарту 14-нм техпроцесса, имеет 2 ядра, которые работают в 4 потока на штатной тактовой частоте 3.7 ГГц. Объем кэш-памяти 3 уровня равен 3 МБ. Имеет 2-х канальный контроллер памяти DDR4 / DDR3L.\n\n', 3399, 'intel_core_i3_6100', 'intel_core_i3_6100.jpg', 1),
(18, 'Холодильник SAMSUNG RB37J5100SA', 29, 'Имеет большее внутреннее пространство для хранения продуктов, чем обычный холодильник с нижней морозильной камерой, но с такими же внешними габаритами. Благодаря технологии Space Max Technology, стенки холодильника тоньше, что обеспечивает дополнительный объем без уменьшения эффективности использования энергии.\n', 15999, 'samsung_rb37j', 'Холодильник SAMSUNG RB37J5100SA.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `good__orders`
--

CREATE TABLE `good__orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(50) NOT NULL,
  `sum_item` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good__orders`
--

INSERT INTO `good__orders` (`id`, `order_id`, `goods_id`, `name`, `price`, `qty_item`, `sum_item`, `created_at`, `updated_at`) VALUES
(30, 84, 12, 'Мышь Razer Abyssus 2014 ', 999, 1, 999, '2017-07-20 20:06:32', '2017-07-20 20:06:32'),
(31, 84, 2, 'Apple Macbook Pro 15', 2000, 1, 2000, '2017-07-20 20:06:32', '2017-07-20 20:06:32'),
(32, 85, 13, 'Xiaomi Mi Power Bank ', 589, 1, 589, '2017-07-21 12:15:18', '2017-07-21 12:15:18'),
(33, 86, 1, 'Asus k501ux', 1000, 2, 2000, '2017-07-27 21:42:25', '2017-07-27 21:42:25'),
(34, 87, 3, 'Apple iPhone 7', 1000, 1, 1000, '2017-08-01 18:16:12', '2017-08-01 18:16:12'),
(38, 90, 7, 'Видеорегистратор Xiaomi Yi Smart Dash WiFi', 2199, 1, 2199, '2017-08-13 12:41:17', '2017-08-13 12:41:17'),
(39, 91, 3, 'Apple iPhone 7', 1000, 2, 2000, '2017-08-14 06:09:46', '2017-08-14 06:09:46'),
(40, 91, 13, 'Xiaomi Mi Power Bank ', 589, 1, 589, '2017-08-14 06:09:46', '2017-08-14 06:09:46'),
(41, 92, 1, 'Asus k501ux', 1000, 1, 1000, '2017-08-16 07:10:45', '2017-08-16 07:10:45'),
(42, 92, 12, 'Мышь Razer Abyssus 2014 ', 999, 1, 999, '2017-08-16 07:10:45', '2017-08-16 07:10:45'),
(44, 94, 6, 'Asus PCI-Ex GeForce GTX 1060 ROG Strix ', 13999, 2, 27998, '2017-08-17 05:51:52', '2017-08-17 05:51:52'),
(45, 94, 14, 'intel Core i3-6100 ', 3399, 1, 3399, '2017-08-17 05:51:52', '2017-08-17 05:51:52'),
(46, 95, 1, 'Asus k501ux', 1000, 2, 2000, '2017-08-18 19:19:18', '2017-08-18 19:19:18'),
(47, 96, 2, 'Apple Macbook Pro 15', 35000, 1, 35000, '2017-08-21 06:32:56', '2017-08-21 06:32:56'),
(48, 96, 12, 'Мышь Razer Abyssus 2014 ', 999, 1, 999, '2017-08-21 06:32:56', '2017-08-21 06:32:56'),
(49, 97, 18, 'Холодильник SAMSUNG RB37J5100SA', 15999, 1, 15999, '2017-08-28 06:11:49', '2017-08-28 06:11:49'),
(50, 97, 3, 'Apple iPhone 7', 21000, 1, 21000, '2017-08-28 06:11:49', '2017-08-28 06:11:49'),
(51, 97, 6, 'Asus PCI-Ex GeForce GTX 1060 ROG Strix ', 13999, 1, 13999, '2017-08-28 06:11:49', '2017-08-28 06:11:49'),
(52, 97, 14, 'intel Core i3-6100 ', 3399, 1, 3399, '2017-08-28 06:11:49', '2017-08-28 06:11:49'),
(53, 98, 1, 'Asus k501ux', 16000, 1, 16000, '2017-09-25 08:51:42', '2017-09-25 08:51:42'),
(54, 99, 1, 'Asus k501ux', 16000, 1, 16000, '2017-11-15 15:15:43', '2017-11-15 15:15:43');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `sum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `phone`, `created_at`, `updated_at`, `qty`, `email`, `city`, `sum`) VALUES
(84, 'Дарья', '87786510617', '2017-07-20 20:06:32', '2017-07-20 20:06:32', 2, 'frostiq@mail.ru', 'Костанай', 2999),
(85, 'Анастасия', '0684422844', '2017-07-21 12:15:18', '2017-07-21 12:15:18', 1, '', 'Харьков', 589),
(86, 'Александр', '063232323232', '2017-07-27 21:42:25', '2017-07-27 21:42:25', 2, 'frostiqq@bk.ru', 'Кирилловка', 2000),
(87, 'Валера', '0664380191', '2017-08-01 18:16:12', '2017-08-01 18:16:12', 1, 'Frostiq98@gmail.com', 'Кирилловка', 1000),
(90, 'Инна', '0664380191', '2017-08-13 12:41:16', '2017-08-13 12:41:16', 1, 'asasins5@bk.ru', 'Рогань', 2199),
(91, 'Саша', '0664380191', '2017-08-14 06:09:46', '2017-08-14 06:09:46', 3, 'frostiqq@bk.ru', 'Харьков', 2589),
(92, 'Валера', '65645645645', '2017-08-16 07:10:45', '2017-08-16 07:10:45', 2, 'test1@bk.ru', 'Харьков', 1999),
(95, 'Саша', '0664380191', '2017-08-18 19:19:18', '2017-08-18 19:19:18', 2, 'asasins5@bk.ru', 'Рогань', 2000),
(96, 'Саша', '063232323232', '2017-08-21 06:32:56', '2017-08-21 06:32:56', 2, 'Frostiq98@gmail.com', 'Харьков', 35999),
(97, 'Саша', '0664380191', '2017-08-28 06:11:49', '2017-08-28 06:11:49', 4, 'frostiqq@bk.ru', 'Харьков', 54397),
(98, 'Артур', '0664380191', '2017-09-25 08:51:42', '2017-09-25 08:51:42', 1, 'test1@bk.ru', 'Харьков', 16000),
(99, 'Валера', '+38(066) 438-01-91', '2017-11-15 15:15:43', '2017-11-15 15:15:43', 1, 'test1@bk.ru', 'Харьков', 16000);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(530) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(530) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@bk.ru', '421ada19b328e4a420d08fce723ee1db68eca118a4b16d43f8586f365b97d81e', '2017-07-02 12:14:21'),
('Frostiqq@bk.ru', '171c7464e7b2360b781598db248aac6738c7a7c8aaea42e61f208202a3e7c0c0', '2017-07-02 12:37:50');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Саша', 'frostiqq@bk.ru', '$2y$10$JVXsw4Jb/FG8HQlbo4IZUOU86w57GGPHRkz9SWPxxXbwQenjgE7C2', 'admin', 'IaxBusAjW5KWQr8h7Jt6wT1opoS6bFpH8hIbu7LGK3yRQdFe1FQvIRnOInCt', '2017-08-06 20:23:26', '2018-02-20 14:30:20'),
(7, 'Валера', 'test1@bk.ru', '$2y$10$/O2GktHMFshyU1Np0cF0H.sTUeyXyczaDPSZwujSij0LWvYNatUWi', 'admin', 'cPDKrnwhVQKPpGd1sJ14gi657q8ViqRn93dwBSeLLzjpayzJ7FBHO5epYVIF', '2017-08-16 07:07:23', '2017-08-16 07:10:53');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `good__orders`
--
ALTER TABLE `good__orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(255)),
  ADD KEY `password_resets_token_index` (`token`(255));

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `good__orders`
--
ALTER TABLE `good__orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
