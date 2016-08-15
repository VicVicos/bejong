<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Settings;

AppAsset::register($this);

$phone = Settings::getOption('phone');
$email = Settings::getOption('email');
$address = Settings::getOption('address');
$regim_b = Settings::getOption('regim_b');
$rejim_w = Settings::getOption('rejim_w');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
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
                    <img src="/img/logo.png" alt="Title">
                </a>
            </div>
            <!-- Tools -->
            <div class="col-md-9 tools">
                <a href="<?= Yii::$app->urlManager->createUrl(['lk/lk/index']) ?>" class="btn btn-custom"><i class="icon icon-arrow-btn"></i>Личный кабинет</a>
                <!-- <a href="#" class="btn btn-default-3">Оставить заявку</a>
                <a href="#" class="btn btn-default-2">Состояние заказа</a> -->
                <?php
                    // Modal::begin([
                    //     'id' => 'application',
                    //     'header' => '<h4>Оставить заявку</h4>',
                    //     'toggleButton' => [
                    //         'label' => 'Оставить заявку',
                    //         'tag' => 'a',
                    //         'class' => 'btn btn-default-3',
                    //         'data-target' => '#application',
                    //         'href' => Url::toRoute(['site/contact', 'mode' => 'application']),
                    //     ],
                    //     'clientOptions' => false
                    // ]);
                    //     echo "Loading...";
                    // Modal::end();
                ?>
                <?php
                    // Modal::begin([
                    // 'id' => 'status-cargo',
                    // 'header' => '<h4>Проверить состояние груза</h4>',
                    // 'toggleButton' => [
                    //     'label' => 'Состояние заказа',
                    //     'tag' => 'a',
                    //     'class' => 'btn btn-default-2',
                    //     'data-target' => '#status-cargo',
                    //     'href' => Url::toRoute(['site/contact', 'mode' => 'cargo']),
                    // ],
                    // 'clientOptions' => false,
                    // ]);
                    //     echo "Loading...";
                    // Modal::end();
                ?>
            </div>
            <!-- Menu -->
            <nav class="col-md-9">
                <ul class="nav-menu">
                    <li><a href="<?=Yii::$app->urlManager->createUrl(["admin"])?>">Админка</a></li>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(["admin/article"])?>">Статьи</a></li>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(["admin/persone"])?>">Команда</a></li>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(["admin/user"])?>">Назначить менеджеров</a></li>
                    <li><a href="<?=Yii::$app->urlManager->createUrl(["admin/settings"])?>">Настройки</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php echo $content; ?>
<!-- Footer -->
<?php require_once Yii::$app->params['basePath'] . '/views/layouts/footer.php' ?>
<!-- End Body -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
