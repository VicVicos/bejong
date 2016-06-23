<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

use app\components\Menu;
use app\components\Blocks;
use app\assets\AppAsset;
use app\models\Article;

?>
<header class="container">
    <div class="row">
        <div class="col-md-3 logo">
            <a href="/web/index.html" title="title">
                <img src="img/logo.png" alt="Title">
            </a>
        </div>
        <!-- Tools -->
        <div class="col-md-9 tools">
            <a href="<?= Yii::$app->urlManager->createUrl(["lk/lk/index"]) ?>" class="btn btn-custom"><i class="icon icon-arrow-btn"></i>Личный кабинет</a>
            <a href="#" class="btn btn-default-3">Оставить заявку</a>
            <a href="#" class="btn btn-default-2">Состояние заказа</a>
        </div>
        <!-- Menu -->
        <nav class="col-md-9">
            <?= Menu::widget(); ?>
        </nav>
    </div>
</header>
