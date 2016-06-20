<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Article;

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
<div class="wrp-header">
    <!-- Шапка -->
    <header class="container">
        <div class="row">
            <div class="col-md-3 logo">
                <a href="/web/index.html" title="title">
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
        <div class="row slider">
            <div class="col-md-12 slick-elem">
                <div class="slick-content">
                    <p class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam odit necessitatibus praesentium, sit eos amet molestias, facilis voluptatem eligendi ratione vitae voluptatibus architecto quas non ipsam nostrum harum deserunt nemo. Lorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <a href="#" class="btn btn-default-1">Подробнее</a>
                </div>
                <div class="slick-img">
                    <img src="img/slide.png" alt="Slide" title="Slide">
                </div>
            </div>
            <div class="col-md-12 slick-elem">
                <div class="slick-content">
                    <p class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam odit necessitatibus praesentium, sit eos amet molestias, facilis voluptatem eligendi ratione vitae voluptatibus architecto quas non ipsam nostrum harum deserunt nemo.</p>
                    <a href="#" class="btn btn-default-1">Подробнее</a>
                </div>
                <div class="slick-img">
                    <img src="http://fakeimg.pl/1050x600/?text=Hello" alt="fakeimg">
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Типы перевозки -->
<section class="container">
    <div class="row types">
        <div class="col-md-6">
            <img src="img/img_01.jpg" alt="img" title="img">
            <div>
                <p class="title first-bold">Воздушные перевозки</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium quidem libero ipsam voluptatibus quod optio at, ducimus totam, minima enim eius soluta obcaecati sunt aliquid. Pariatur, architecto, maxime! Ratione, libero?
                </p>
                <a href="#" class="btn btn-default-1">Подробнее</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="img/img_02.jpg" alt="img" title="img">
            <div>
                <p class="title first-bold">Морские перевозки</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium quidem libero ipsam voluptatibus quod optio at, ducimus totam, minima enim eius soluta obcaecati sunt aliquid. Pariatur, architecto, maxime! Ratione, libero?
                </p>
                <a href="#" class="btn btn-default-1">Подробнее</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="img/img_03.jpg" alt="img" title="img">
            <div>
                <p class="title first-bold">Наземные перевозки</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium quidem libero ipsam voluptatibus quod optio at, ducimus totam, minima enim eius soluta obcaecati sunt aliquid. Pariatur, architecto, maxime! Ratione, libero?
                </p>
                <a href="#" class="btn btn-default-1">Подробнее</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="img/img_04.jpg" alt="img" title="img">
            <div>
                <p class="title first-bold">&laquo;Таобао&raquo;</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium quidem libero ipsam voluptatibus quod optio at, ducimus totam, minima enim eius soluta obcaecati sunt aliquid. Pariatur, architecto, maxime! Ratione, libero?
                </p>
                <a href="#" class="btn btn-default-1">Подробнее</a>
            </div>
        </div>
    </div>
</section>
<!-- ************** -->
<!-- Services2 -->
<section class="wrp-services">
    <div class="container">
        <div class="row services">
            <div class="col-md-4">
                <p class="titleh2">Наш сервис</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa nulla ducimus laudantium sunt architecto, quisquam rem delectus cum totam porro, velit nemo nobis!</p>
                <ul class="elems">
                    <li class="active"><a href="#tab1" data-toggle="tab">Логистика</a></li>
                    <li><a href="#tab2" data-toggle="tab">Упаковка</a></li>
                    <li><a href="#tab3" data-toggle="tab">Материал</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab1"><p>1Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, qui    a molestiae. Quo numquam molestiae maxime alias deleniti obcaeca    ti? Vitae soluta temporibus incidunt, perspiciatis odio a vero minus molestias blanditiis commodi.</p></div>

                  <div class="tab-pane" id="tab2"><p>2Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit velit facere aliquid magni quaerat nulla ratione quia hic debitis at praesentium, provident veniam quasi cupiditate ad quae, doloremque nemo illo?</p></div>

                  <div class="tab-pane" id="tab3"><p>3Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem soluta fugit alias rem iure amet odio nemo, quo possimus asperiores voluptatem quia neque, eveniet enim nihil dignissimos dolor sit sapiente.</p></div>
                </div>
                <div class="pilles">
                    <div><i class="icon icon-avia"></i><p>Воздушные перевозки</p></div>
                    <div><i class="icon icon-water"></i><p>Морские перевозки</p></div>
                    <div><i class="icon icon-avto"></i><p>Наземные перевозки</p></div>
                    <div><i class="icon icon-gruz"></i><p>Контейнеры</p></div>
                    <div><i class="icon icon-manager"></i><p>Услуги экспедитора</p></div>
                </div>
            </div>
        </div>
        <i class="icon icon-bouble-bottom"></i>
        <i class="icon icon-bouble-top"></i>
    </div>
</section>
<!-- ********* -->
<!-- Delivery -->
<section class="container delivery">
    <div class="row">
        <a href="#" class="btn btn-default-3">Вопрос-ответ</a>
        <div class="col-md-12 jd">
            <p class="titleh2">Ж/д доставка</p>
            <img src="img/jd.png" alt="avia">
            <div><p class="sroki">Сроки поставки 5-8 дней</p></div>
            <div class="row">
                <div class="col-md-12 d-item">
                    <div>
                        <img src="img/container.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин</p>
                            <p>Небльшой текст описания пункта</p>
                        </div>
                    </div>
                    <div>
                        <img src="img/f-paravoz.png" alt="alt">
                        <span data-day="3-5" data-count="дней"></span>
                        <div class="item-content">
                            <p class="title">Пекин</p>
                            <p>Небльшой текст описания пункта</p>
                        </div>
                    </div>
                    <div>
                        <img src="img/ycik.png" alt="alt">
                        <span data-day="1" data-count="день"></span>
                        <div class="item-content">
                            <p class="title">Таможня КНР</p>
                            <p>Небльшой текст описания пункта</p>
                            <i class="flag flag-kndr"></i>
                        </div>
                    </div>
                    <div>
                        <img src="img/ycik.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин</p>
                            <p>Небльшой текст описания пункта</p>
                            <i class="flag flag-kz"></i>
                        </div>
                    </div>
                    <div>
                        <img src="img/cremle.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин</p>
                            <p>Небльшой текст описания пункта</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 avia">
            <p class="titleh2">Авиа доставка</p>
            <img src="img/avia.png" alt="avia">
            <div><p class="sroki">Сроки поставки 5-8 дней</p></div>
            <div class="row">
                <div class="col-md-12 d-item">
                    <div>
                        <img src="img/container.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин</p>
                            <p>Небльшой текст описания пункта</p>
                        </div>
                    </div>
                    <div>
                        <img src="img/f-avia.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин</p>
                            <p>Небльшой текст описания пункта</p>
                            <i class="flag flag-kndr"></i>
                        </div>
                    </div>
                    <div>
                        <img src="img/f-avia.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин</p>
                            <p>Небльшой текст описания пункта</p>
                            <i class="flag flag-rus"></i>
                        </div>
                    </div>
                    <div>
                        <img src="img/cremle.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин</p>
                            <p>Небльшой текст описания пункта</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ******** -->
<!-- Rewies -->
<section class="wrp-reviews">
    <div class="container">
        <div class="row reviews">
            <div class="col-md-12">
                <p class="titleh2">Что люди говорят о нас</p>
                <a href="#" class="btn btn-default-3">Написать отзыв</a>
                <div class="slick-reviews">
                    <div class="review row">
                        <div class="col-md-3">
                            <div class="img-circle">
                                <img src="img/tablo.jpg" alt="face">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <p class="title">Член партии</p>
                            <p class="position">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non dolor earum hic, consequuntur eaque totam.</p>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam itaque corporis illum veniam expedita alias, quia praesentium consectetur consequuntur officiis eligendi saepe voluptatem, maiores quos, ipsa minus, possimus illo architecto!</p>
                        </div>
                    </div>
                    <div class="review row">
                        <div class="col-md-3">
                            <div class="img-circle">
                                <img src="img/tablo.jpg" alt="face">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <p class="title">Член партии</p>
                            <p class="position">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non dolor earum hic, consequuntur eaque totam.</p>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam itaque corporis illum veniam expedita alias, quia praesentium consectetur consequuntur officiis eligendi saepe voluptatem, maiores quos, ipsa minus, possimus illo architecto!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** -->
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
