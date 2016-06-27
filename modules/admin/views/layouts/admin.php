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
<div class="wrp-header-lk">
    <!-- Шапка -->
    <header class="container">
        <div class="row">
            <div class="col-md-3 logo">
                <a href="<?=Yii::$app->urlManager->createUrl(["site/index"])?>" title="title">
                    <img src="img/logo.png" alt="Title">
                </a>
            </div>
            <!-- Tools -->
            <div class="col-md-9 tools">
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/lk/index']) ?>" class="btn btn-custom"><i class="icon icon-arrow-btn"></i>Личный кабинет</a>
                <a href="#" class="btn btn-default-3">Оставить заявку</a>
                <a href="#" class="btn btn-default-2">Состояние заказа</a>
            </div>
            <!-- Menu -->
            <nav class="col-md-9">
                <ul class="nav-menu">
                    <li><a href="<?=Yii::$app->urlManager->createUrl(["admin"])?>">Админка</a></li>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(["admin/article"])?>">Статьи</a></li>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(["admin/persone"])?>">Команда</a></li>
                    <li><a href="#">Item menu 4</a></li>
                    <li><a href="#">Item menu 5</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- <section class="container">
        <h1>Личный кабинет</h1>
    </section>
</div>
<div class="container">

    <div class="row lk"> -->
        <?php echo $content; ?>
    <!-- </div>

</div> -->
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
