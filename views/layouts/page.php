<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Body -->
<div class="wrp-header-page" style="background-image: url('img/air-bg.jpg')">
    <!-- Шапка -->
    <header class="container">
        <div class="row">
            <div class="col-md-3 logo">
                <a href="/html/index.html" title="title">
                    <img src="img/logo.png" alt="Title">
                </a>
            </div>
            <!-- Tools -->
            <div class="col-md-9 tools">
                <a href="/html/lk.html" class="btn btn-custom"><i class="icon icon-arrow-btn"></i>Личный кабинет</a>
                <a href="#" class="btn btn-default-3">Оставить заявку</a>
                <a href="#" class="btn btn-default-2">Состояние заказа</a>
            </div>
            <!-- Menu -->
            <nav class="col-md-9">
                <ul class="nav-menu">
                    <li><a href="#">Item menu 1</a></li>
                    <li><a href="#">Item menu 2</a></li>
                    <li><a href="#">Item menu 3</a></li>
                    <li><a href="#">Item menu 4</a></li>
                    <li><a href="#">Item menu 5</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Slider -->
    <section class="container">
        <h1>Воздушные перевозки</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ratione placeat velit, consectetur quaerat quas illum temporibus cumque. Nostrum cum consequuntur similique tempore aliquid quasi iusto voluptatem aliquam, aperiam corrupti.
        </p>
    </section>
</div>
<!-- Header -->
<!-- Content -->
<div class="container">
    <div class="row page">
        <div class="col-md-12">
            <article>
                <h2>Воздушные перевозки грузов</h2>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum culpa, repellendus dolorum. Fuga harum eveniet, aspernatur mollitia vero ex, consequatur placeat accusantium officia ut nesciunt explicabo obcaecati, fugit, architecto.</span><span>Cumque facilis iure, doloribus esse ullam suscipit! Consequuntur nam beatae, nihil cum ullam, at voluptatum velit consectetur optio veniam, incidunt, et. Accusamus labore maiores amet asperiores, id. Est, consequuntur, omnis?</span></p>
                <h3>Виды воздушного транспорта</h3>
                <img src="img/article.jpg" alt="article" title="article">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore libero quo mollitia similique atque pariatur praesentium, consectetur saepe harum quae eaque quisquam facere, iusto nihil assumenda hic fugiat officia cumque.</p>
                <p>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id atque, ducimus unde eius. Expedita commodi, excepturi aperiam alias incidunt minus assumenda velit molestias rerum illo sequi, impedit eos! Nobis, ut.</span>
                    <a href="#">Ссылка в тексте</a>
                    <span>Odit beatae, est nisi, corporis autem quam iure rem nesciunt iusto ratione alias perspiciatis quidem maiores saepe libero voluptatibus, architecto, omnis et. Nam veritatis, ducimus adipisci, iusto illo suscipit doloribus!</span>
                    <span>Ipsa harum vel blanditiis impedit excepturi, maxime molestias sapiente corporis, magnam quisquam, velit labore! Consequuntur velit sint ratione, dolorum itaque reprehenderit, soluta laboriosam quibusdam quia quasi, pariatur, non tempore beatae!</span>
                    <span>Accusantium quae vitae modi nihil, tempora minima eum, repellendus ad nesciunt harum magnam quia aut laboriosam! Velit dolor voluptate maiores provident at excepturi minima debitis, optio blanditiis, natus esse sit.</span>
                    <span>Ipsa aliquid, quibusdam modi! <a href="#">Nihil</a> iste, quasi repellat, facere at vitae laborum ea rem consequuntur nemo possimus! Assumenda blanditiis quae dolore voluptas alias quis! Saepe consequatur possimus aperiam sapiente quasi.</span>
                </p>
                <ul>
                    <li>Маркерованный список</li>
                    <li>Маркерованный список</li>
                    <li>Маркерованный список</li>
                    <li>Маркерованный список</li>
                </ul>
                <ol>
                    <li>Нумерованный список</li>
                    <li>Нумерованный список</li>
                    <li>Нумерованный список</li>
                    <li>Нумерованный список</li>
                </ol>
            </article>
        </div>
    </div>
</div>
<!-- Content -->
<div class="container">
    <div class="row page">
        <div class="col-md-3">
            <figure>
                <p class="v-text"><img src="img/face-band_01.jpg" alt="Man"></p>
                <figcaption>
                    <p>Иванов Фёдор</p>
                    <p>Директор</p>
                </figcaption>
            </figure>
            <div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur, velit distinctio vitae non odio, voluptatibus optio porro ea aliquam officia maiores, eum quia quisquam deserunt repellat, totam libero veniam.
                    <strong>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates nulla, sunt dolor iure tempora maxime minima commodi aspernatur reiciendis quod.
                    </strong>
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <figure>
                <p class="v-text"><img src="img/face-band_02.jpg" alt="Man"></p>
                <figcaption>
                    <p>Иванов Фёдор</p>
                    <p>Директор</p>
                </figcaption>
            </figure>
            <div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur, velit distinctio vitae non odio, voluptatibus optio porro ea aliquam officia maiores, eum quia quisquam deserunt repellat, totam libero veniam.
                    <strong>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates nulla, sunt dolor iure tempora maxime minima commodi aspernatur reiciendis quod.
                    </strong>
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <figure>
                <p class="v-text"><img src="img/face-band_03.jpg" alt="Man"></p>
                <figcaption>
                    <p>Иванов Фёдор</p>
                    <p>Директор</p>
                </figcaption>
            </figure>
            <div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur, velit distinctio vitae non odio, voluptatibus optio porro ea aliquam officia maiores, eum quia quisquam deserunt repellat, totam libero veniam.
                    <strong>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates nulla, sunt dolor iure tempora maxime minima commodi aspernatur reiciendis quod.
                    </strong>
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <figure>
                <p><img src="img/face-band_04.jpg" alt="Man"></p>
                <figcaption>
                    <p>Иванов Фёдор</p>
                    <p>Директор</p>
                </figcaption>
            </figure>
            <div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur, velit distinctio vitae non odio, voluptatibus optio porro ea aliquam officia maiores, eum quia quisquam deserunt repellat, totam libero veniam.
                    <strong>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde voluptates nulla, sunt dolor iure tempora maxime minima commodi aspernatur reiciendis quod.
                    </strong>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <i class="icon icon-mark"></i>
                <p class="title">Наш адрес</p>
                <p>г. Омск, ул. Красный Путь, 80/1</p>
            </div>
            <div class="col-md-3">
                <i class="icon icon-phone"></i>
                <p class="title">Сотовый телефон</p>
                <p>+7 913 644 34 22</p>
            </div>
            <div class="col-md-3">
                <i class="icon icon-hours"></i>
                <p>ПН-ПТ с <strong>10:00</strong> до <strong>19:00</strong></p>
                <p>СБ <strong>10:00</strong> до <strong>16:00</strong></p>
            </div>
            <div class="col-md-3">
                <i class="icon icon-mail"></i>
                <p><a href="mailto:primer@mail.ru">mail@primer.com</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="copyright">
                    Copyright &laquo; Cargo &raquo; 2016
                </p>
            </div>
            <div class="col-md-6">
                <p class="copyright itb">
                    Создание и продвижение сайта: <a href="http://itb-company.com">ITB-company</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- End Body -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
