-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.41-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица bejong_db.bj_article
DROP TABLE IF EXISTS `bj_article`;
CREATE TABLE IF NOT EXISTS `bj_article` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) DEFAULT NULL,
  `alias` char(255) DEFAULT NULL,
  `type` set('slide','article','block','review','page') DEFAULT NULL COMMENT 'Тип поста, определяет где отображаться',
  `status` set('active','disabled') DEFAULT 'disabled',
  `link` char(250) DEFAULT NULL,
  `intro` varchar(1200) DEFAULT NULL,
  `text` mediumtext,
  `img` char(255) DEFAULT NULL,
  `excerpt` varchar(1200) DEFAULT NULL COMMENT 'отдельное описание для некоторых постов',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='Статьи и материалы';

-- Дамп данных таблицы bejong_db.bj_article: ~29 rows (приблизительно)
DELETE FROM `bj_article`;
/*!40000 ALTER TABLE `bj_article` DISABLE KEYS */;
INSERT INTO `bj_article` (`id`, `title`, `alias`, `type`, `status`, `link`, `intro`, `text`, `img`, `excerpt`) VALUES
	(1, 'Воздушные перевозки', 'test_article', 'block', 'active', '13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'img_01.jpg', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
	(2, 'Морские перевозки', 'test_article_2', 'block', 'active', '15', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'img_02.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
	(3, 'Заголовок слайда', NULL, 'slide', 'active', 'http://google.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 123', '', 'slide.png', NULL),
	(4, 'Заголовок слайда 2', NULL, 'slide', 'active', '#', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '', 'slide.png', NULL),
	(5, 'Наземные перевозки', 'earth', 'block', 'active', '14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa nulla ducimus laudantium sunt architecto, quisquam rem delectus cum totam porro, velit nemo nobis! 2Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit velit facere aliquid magni quaerat nulla ratione quia hic debitis at praesentium, provident veniam quasi cupiditate ad quae, doloremque nemo illo?', 'img_03.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa nulla ducimus laudantium sunt architecto'),
	(6, '&laquo;Таобао&raquo;', 'taobao', 'block', 'active', '16', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa nulla ducimus laudantium sunt architecto, quisquam rem delectus cum totam porro, velit nemo nobis! 2Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit velit facere aliquid magni quaerat nulla ratione quia hic debitis at praesentium, provident veniam quasi cupiditate ad quae, doloremque nemo illo?', 'img_04.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa nulla ducimus laudantium sunt architecto.'),
	(7, 'Иванов Фёдор', NULL, 'review', 'active', NULL, 'Директор', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa nulla ducimus laudantium sunt architecto, quisquam rem delectus cum totam porro, velit nemo nobis! 2Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit velit facere aliquid magni quaerat nulla ratione quia hic debitis at praesentium, provident veniam quasi cupiditate ad quae, doloremque nemo illo?', 'tablo.jpg', NULL),
	(8, 'Александр', NULL, 'review', 'active', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa nulla ducimus laudantium sunt architecto, quisquam rem delectus cum totam porro, velit nemo nobis! 2Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit velit facere aliquid magni quaerat nulla ratione quia hic debitis at praesentium, provident veniam quasi cupiditate ad quae, doloremque nemo illo?', 'tablo.jpg', NULL),
	(9, 'О компании', 'about', 'page', 'active', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', '<h2>Воздушные перевозки грузов</h2>\r\n                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>\r\n                <h3>Виды воздушного транспорта</h3>\r\n                <img src="/img/article.jpg" alt="article" title="article">\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>\r\n                <p>\r\n                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>\r\n                    <a href="#">Ссылка в тексте</a>\r\n                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>\r\n                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>\r\n                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>\r\n                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>\r\n                </p>\r\n                <ul>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                </ul>\r\n                <ol>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                </ol>', 'air-bg.jpg', NULL),
	(10, 'Контакты', NULL, 'page', 'active', NULL, 'Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!', '<h2>Воздушные перевозки грузов</h2>\r\n                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>\r\n                <h3>Виды воздушного транспорта</h3>\r\n                <img src="img/article.jpg" alt="article" title="article">\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>\r\n                <p>\r\n                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>\r\n                    <a href="#">Ссылка в тексте</a>\r\n                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>\r\n                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>\r\n                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>\r\n                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>\r\n                </p>\r\n                <ul>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                </ul>\r\n                <ol>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                </ol>', NULL, NULL),
	(11, 'Сервис', NULL, 'page', 'active', NULL, 'Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!', '<h2>Воздушные перевозки грузов</h2>\r\n                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>\r\n                <h3>Виды воздушного транспорта</h3>\r\n                <img src="img/article.jpg" alt="article" title="article">\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>\r\n                <p>\r\n                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>\r\n                    <a href="#">Ссылка в тексте</a>\r\n                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>\r\n                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>\r\n                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>\r\n                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>\r\n                </p>\r\n                <ul>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                </ul>\r\n                <ol>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                </ol>', 'water-bg.jpg', NULL),
	(12, 'Услуги', NULL, 'page', 'active', NULL, 'Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!', '<h2>Воздушные перевозки грузов</h2>\r\n                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>\r\n                <h3>Виды воздушного транспорта</h3>\r\n                <img src="img/article.jpg" alt="article" title="article">\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>\r\n                <p>\r\n                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>\r\n                    <a href="#">Ссылка в тексте</a>\r\n                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>\r\n                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>\r\n                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>\r\n                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>\r\n                </p>\r\n                <ul>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                </ul>\r\n                <ol>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                </ol>', 'auto-bg.jpg', NULL),
	(13, 'Воздушные перевозки', 'airplane', 'article', 'active', NULL, 'Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!', '<h2>Воздушные перевозки грузов</h2>\r\n                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>\r\n                <h3>Виды воздушного транспорта</h3>\r\n                <img src="img/article.jpg" alt="article" title="article">\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>\r\n                <p>\r\n                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>\r\n                    <a href="#">Ссылка в тексте</a>\r\n                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>\r\n                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>\r\n                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>\r\n                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>\r\n                </p>\r\n                <ul>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                </ul>\r\n                <ol>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                </ol>', 'air-bg.jpg', NULL),
	(14, 'Наземные перевозки', 'earth_transport', 'article', 'active', NULL, 'Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!', '<h2>Воздушные перевозки грузов</h2>\r\n                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>\r\n                <h3>Виды воздушного транспорта</h3>\r\n                <img src="img/article.jpg" alt="article" title="article">\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>\r\n                <p>\r\n                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>\r\n                    <a href="#">Ссылка в тексте</a>\r\n                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>\r\n                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>\r\n                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>\r\n                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>\r\n                </p>\r\n                <ul>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                </ul>\r\n                <ol>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                </ol>', 'auto-bg.jpg', NULL),
	(15, 'Морские перевозки', 'water_transport', 'article', 'active', NULL, 'Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!', '<h2>Воздушные перевозки грузов</h2>\r\n                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>\r\n                <h3>Виды воздушного транспорта</h3>\r\n                <img src="img/article.jpg" alt="article" title="article">\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>\r\n                <p>\r\n                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>\r\n                    <a href="#">Ссылка в тексте</a>\r\n                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>\r\n                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>\r\n                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>\r\n                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>\r\n                </p>\r\n                <ul>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                </ul>\r\n                <ol>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                </ol>', 'water-bg.jpg', NULL),
	(16, '&laquo;Таобао&raquo;', 'taobao', 'article', 'active', NULL, 'Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!', '<h2>Воздушные перевозки грузов</h2>\r\n                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>\r\n                <h3>Виды воздушного транспорта</h3>\r\n                <img src="img/article.jpg" alt="article" title="article">\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>\r\n                <p>\r\n                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>\r\n                    <a href="#">Ссылка в тексте</a>\r\n                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>\r\n                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>\r\n                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>\r\n                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>\r\n                </p>\r\n                <ul>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                    <li>Маркерованный список</li>\r\n                </ul>\r\n                <ol>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                    <li>Нумерованный список</li>\r\n                </ol>', 'auto-bg.jpg', NULL),
	(24, 'Ваня', NULL, 'review', 'active', NULL, 'Молодец', 'Отзыв', 'review/eWhwdXhhYg.png', NULL),
	(25, 'Ваня', NULL, 'review', 'disabled', NULL, 'Молодец', 'Отзыв', 'review/dnh4cXlv.png', NULL),
	(26, 'Ваня', NULL, 'review', 'disabled', NULL, 'Молодец', 'Отзыв', 'review/eGl4YXVqZA.png', NULL),
	(27, 'Ваня', NULL, 'review', 'disabled', NULL, 'Молодец', 'Отзыв', NULL, NULL),
	(28, 'Ваня', NULL, 'review', 'disabled', NULL, 'Молодец', 'Отзыв', NULL, NULL);
/*!40000 ALTER TABLE `bj_article` ENABLE KEYS */;


-- Дамп структуры для таблица bejong_db.bj_cargo
DROP TABLE IF EXISTS `bj_cargo`;
CREATE TABLE IF NOT EXISTS `bj_cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cargo` char(50) DEFAULT NULL COMMENT 'id Накладной',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `destination` char(255) DEFAULT '0' COMMENT 'Пункт назначения',
  `date_depart` date DEFAULT NULL COMMENT 'Дата отправки',
  `date_arrival` date DEFAULT NULL COMMENT 'Ориентировочная дата прибытия',
  `weight` float DEFAULT '0' COMMENT 'Вес',
  `amount` float DEFAULT '0' COMMENT 'Объём',
  `places` tinyint(3) unsigned DEFAULT '0' COMMENT 'Мест',
  `rate` float DEFAULT '0' COMMENT 'Тариф',
  `cost` float DEFAULT '0' COMMENT 'Цена',
  `payment_cond` enum('Y','N') DEFAULT 'N' COMMENT 'Состояние оплаты',
  `order_status` enum('Y','N') DEFAULT 'N' COMMENT 'Состояние заказа',
  PRIMARY KEY (`id`),
  KEY `FK_bj_cargo_bj_user` (`id_user`),
  CONSTRAINT `FK_bj_cargo_bj_user` FOREIGN KEY (`id_user`) REFERENCES `bj_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='Накладные';

-- Дамп данных таблицы bejong_db.bj_cargo: ~5 rows (приблизительно)
DELETE FROM `bj_cargo`;
/*!40000 ALTER TABLE `bj_cargo` DISABLE KEYS */;
INSERT INTO `bj_cargo` (`id`, `id_cargo`, `id_user`, `destination`, `date_depart`, `date_arrival`, `weight`, `amount`, `places`, `rate`, `cost`, `payment_cond`, `order_status`) VALUES
	(16, 'KL06171115-4', 14, 'Воронеж', '2017-06-20', '2001-07-20', 712.2, 3.15, 4, 2.8, 2014.16, 'Y', 'Y'),
	(17, 'L4041016-5', 14, 'Москва', '0000-00-00', '0000-00-00', 131.6, 0.49, 5, 2.8, 0, 'Y', 'Y'),
	(18, 'L4041016-5', 17, 'Москва', '0000-00-00', '0000-00-00', 131.6, 0.49, 5, 2.8, 0, 'N', 'N'),
	(19, 'L4041016-5', 19, 'Москва', '0000-00-00', '0000-00-00', 131.6, 0.49, 5, 2.8, 0, 'N', 'N'),
	(20, 'L4041016-5', 13, 'Москва', '0000-00-00', '0000-00-00', 131.6, 0.49, 5, 2.8, 0, 'N', 'N');
/*!40000 ALTER TABLE `bj_cargo` ENABLE KEYS */;


-- Дамп структуры для таблица bejong_db.bj_file
DROP TABLE IF EXISTS `bj_file`;
CREATE TABLE IF NOT EXISTS `bj_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_cargo` int(11) NOT NULL,
  `file_name` char(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_bj_file_bj_user` (`id_user`),
  KEY `FK_bj_file_bj_cargo` (`id_cargo`),
  CONSTRAINT `FK_bj_file_bj_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `bj_cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_bj_file_bj_user` FOREIGN KEY (`id_user`) REFERENCES `bj_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Файлы накладных';

-- Дамп данных таблицы bejong_db.bj_file: ~0 rows (приблизительно)
DELETE FROM `bj_file`;
/*!40000 ALTER TABLE `bj_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `bj_file` ENABLE KEYS */;


-- Дамп структуры для таблица bejong_db.bj_mailer
DROP TABLE IF EXISTS `bj_mailer`;
CREATE TABLE IF NOT EXISTS `bj_mailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_cargo` int(11) NOT NULL DEFAULT '0',
  `date_send` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `FK__bj_user` (`id_user`),
  KEY `FK__bj_cargo` (`id_cargo`),
  CONSTRAINT `FK__bj_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `bj_cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__bj_user` FOREIGN KEY (`id_user`) REFERENCES `bj_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Расписание отправки уведомлений.';

-- Дамп данных таблицы bejong_db.bj_mailer: ~1 rows (приблизительно)
DELETE FROM `bj_mailer`;
/*!40000 ALTER TABLE `bj_mailer` DISABLE KEYS */;
INSERT INTO `bj_mailer` (`id`, `id_user`, `id_cargo`, `date_send`) VALUES
	(15, 13, 18, '2016-07-08');
/*!40000 ALTER TABLE `bj_mailer` ENABLE KEYS */;


-- Дамп структуры для таблица bejong_db.bj_menu
DROP TABLE IF EXISTS `bj_menu`;
CREATE TABLE IF NOT EXISTS `bj_menu` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id menu',
  `title` char(250) NOT NULL DEFAULT '0' COMMENT 'Имя пункта меню',
  `alias` char(250) NOT NULL DEFAULT '0' COMMENT 'alias',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Меню';

-- Дамп данных таблицы bejong_db.bj_menu: ~5 rows (приблизительно)
DELETE FROM `bj_menu`;
/*!40000 ALTER TABLE `bj_menu` DISABLE KEYS */;
INSERT INTO `bj_menu` (`id`, `title`, `alias`) VALUES
	(1, 'О компании', 'about'),
	(2, 'Услуги', 'uslugi'),
	(3, 'Сервис', 'service'),
	(4, 'Наша команда', 'team'),
	(5, 'Контакты', 'contacts');
/*!40000 ALTER TABLE `bj_menu` ENABLE KEYS */;


-- Дамп структуры для таблица bejong_db.bj_migration
DROP TABLE IF EXISTS `bj_migration`;
CREATE TABLE IF NOT EXISTS `bj_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы bejong_db.bj_migration: ~1 rows (приблизительно)
DELETE FROM `bj_migration`;
/*!40000 ALTER TABLE `bj_migration` DISABLE KEYS */;
INSERT INTO `bj_migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1466675995);
/*!40000 ALTER TABLE `bj_migration` ENABLE KEYS */;


-- Дамп структуры для таблица bejong_db.bj_persone
DROP TABLE IF EXISTS `bj_persone`;
CREATE TABLE IF NOT EXISTS `bj_persone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT '0',
  `position` char(255) DEFAULT '0',
  `text` varchar(21000) DEFAULT '0',
  `img` char(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Команда';

-- Дамп данных таблицы bejong_db.bj_persone: ~4 rows (приблизительно)
DELETE FROM `bj_persone`;
/*!40000 ALTER TABLE `bj_persone` DISABLE KEYS */;
INSERT INTO `bj_persone` (`id`, `name`, `position`, `text`, `img`) VALUES
	(1, 'Анастасия', 'Директор', '<p>\r\n                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur, velit distinctio vitae non odio, voluptatibus optio porro ea aliquam officia maiores, eum quia quisquam deserunt repellat, totam libero veniam.\r\n                    <strong>\r\n                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates nulla, sunt dolor iure tempora maxime minima commodi aspernatur reiciendis quod.\r\n                    </strong>\r\n                </p>', 'face-band_01.jpg'),
	(2, 'Алексей', 'Менеджер по привлечению клиентов', '<p>\r\n                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur, velit distinctio vitae non odio, voluptatibus optio porro ea aliquam officia maiores, eum quia quisquam deserunt repellat, totam libero veniam.\r\n                    <strong>\r\n                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates nulla, sunt dolor iure tempora maxime minima commodi aspernatur reiciendis quod.\r\n                    </strong>\r\n                </p>', 'face-band_02.jpg'),
	(3, 'Сердар', 'Менеджер по проверке товара', '<p>\r\n                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur, velit distinctio vitae non odio, voluptatibus optio porro ea aliquam officia maiores, eum quia quisquam deserunt repellat, totam libero veniam.\r\n                    <strong>\r\n                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates nulla, sunt dolor iure tempora maxime minima commodi aspernatur reiciendis quod.\r\n                    </strong>\r\n                </p>', 'face-band_03.jpg'),
	(4, 'Айкоп', 'Менеджер по проверке товара и общению с клиентами', '<p>\r\n                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur, velit distinctio vitae non odio, voluptatibus optio porro ea aliquam officia maiores, eum quia quisquam deserunt repellat, totam libero veniam.\r\n                    <strong>\r\n                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates nulla, sunt dolor iure tempora maxime minima commodi aspernatur reiciendis quod.\r\n                    </strong>\r\n                </p>', 'face-band_04.jpg');
/*!40000 ALTER TABLE `bj_persone` ENABLE KEYS */;


-- Дамп структуры для таблица bejong_db.bj_settings
DROP TABLE IF EXISTS `bj_settings`;
CREATE TABLE IF NOT EXISTS `bj_settings` (
  `title` char(50) DEFAULT NULL,
  `key` char(50) DEFAULT NULL,
  `value` char(50) DEFAULT NULL,
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Настройки';

-- Дамп данных таблицы bejong_db.bj_settings: ~0 rows (приблизительно)
DELETE FROM `bj_settings`;
/*!40000 ALTER TABLE `bj_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `bj_settings` ENABLE KEYS */;


-- Дамп структуры для таблица bejong_db.bj_user
DROP TABLE IF EXISTS `bj_user`;
CREATE TABLE IF NOT EXISTS `bj_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT '0',
  `contact` char(255) DEFAULT '0',
  `email` char(255) DEFAULT '0',
  `address` varchar(2550) DEFAULT '0',
  `password` char(255) DEFAULT '0',
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` enum('admin','manager','member') NOT NULL DEFAULT 'member',
  `id_manager` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='Таблица юзеров';

-- Дамп данных таблицы bejong_db.bj_user: ~6 rows (приблизительно)
DELETE FROM `bj_user`;
/*!40000 ALTER TABLE `bj_user` DISABLE KEYS */;
INSERT INTO `bj_user` (`id`, `name`, `contact`, `email`, `address`, `password`, `status`, `created`, `role`, `id_manager`) VALUES
	(13, 'Иван', '789654', 'developitb@yandex.ru', 'address', '$2y$10$c/CLQxP92lPB67tL9pZHGusrbbR/ovIw/dRCqBt0YgDwTJBylgwYq', 'active', '2016-07-05 09:59:45', 'admin', 13),
	(14, 'Ваня', '8749646546123', 'vicos@vocis2.ru', 'фывфывф', '$2y$10$kVqxVo1TIDyFRWdaxHTwi.MwkMlXaXzbuJIqTNjs7/Skql6r2Kb7K', 'active', '2016-07-05 15:30:28', 'member', 13),
	(15, 'Иван', '4646546', 'vicos@vocis.ru', 'ллвоаы', '$2y$10$qc8t167ug9uMQi1uC2MpUOdHy3M3Tm.v9EKuE9GFhZRL4g7Yp3/De', 'active', '2016-07-05 15:30:24', 'manager', 13),
	(16, 'Фёдор', '646465', 'developit2b@gm2ail.com', 'Там', '$2y$10$10enqqy7kUQyDNueeOnBJOs7Bzz32YSTsOgqWE8TpEVM7LZzSp5US', 'active', '2016-07-05 15:15:52', 'member', 13),
	(17, 'Федя', '649879', 'dr.snox@yandex.ru', 'Там', '$2y$10$119JLAuF8w9VPcbjU.RKaOxQDzlgjQT6eeBDzcyBZqQDtVBL3ZXZG', 'active', '2016-07-05 15:30:53', 'member', 13),
	(19, 'Тестер', '646456', 'developitb@gmail.com', 'рфофпфап', '$2y$10$BmRTCXgfxmu1YA3Gfq7ZSeepQXsRe5XVB9HgDe.6Irl1WEdRwqBWC', 'active', '2016-07-05 15:25:47', 'member', 15);
/*!40000 ALTER TABLE `bj_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
