<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;

use app\components\Menu;
use app\components\Blocks;
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
            <div class="col-xs-3 logo">
                <a href="<?=Yii::$app->urlManager->createUrl(["site/index"])?>" title="title">
                    <img src="img/logo.png" alt="Title">
                </a>
            </div>
            <!-- Tools -->
            <div class="col-xs-9 tools">
                <a href="<?= Yii::$app->urlManager->createUrl(["lk/lk/index"]) ?>" class="btn btn-custom"><i class="icon icon-arrow-btn"></i>Личный кабинет</a>
                <?php
                    Modal::begin([
                        'id' => 'application',
                        'header' => '<h4>Оставить заявку</h4>',
                        'toggleButton' => [
                            'label' => 'Оставить заявку',
                            'tag' => 'a',
                            'class' => 'btn btn-default-3',
                            'data-target' => '#application',
                            'href' => Url::toRoute(['site/contact', 'mode' => 'application']),
                        ],
                        'clientOptions' => false
                    ]);
                        echo "Loading...";
                    Modal::end();
                ?>
                <?php
                    Modal::begin([
                    'id' => 'status-cargo',
                    'header' => '<h4>Проверить состояние груза</h4>',
                    'toggleButton' => [
                        'label' => 'Состояние заказа',
                        'tag' => 'a',
                        'class' => 'btn btn-default-2',
                        'data-target' => '#status-cargo',
                        'href' => Url::toRoute(['site/contact', 'mode' => 'cargo']),
                    ],
                    'clientOptions' => false,
                    ]);
                        echo "Loading...";
                    Modal::end();
                ?>
            </div>
            <!-- Menu -->
            <nav class="col-md-9">
                <?= Menu::widget(); ?>
            </nav>
            <!-- <div class="col-sm-12 hidden-desctop">
                /mmenu.php
            </div> -->
        </div>
    </header>
    <!-- Slider -->
    <section class="hidden-mobile-xl">
        <?= Blocks::widget(['id' => 'slide']); ?>
    </section>
</div>
<!-- Типы перевозки -->
<section class="container">
    <?= Blocks::widget(['id' => 'block']); ?>
</section>
<!-- ************** -->
<!-- Services2 -->
<?= $content ?>
<!-- ********* -->
<!-- Delivery -->
<?php require_once Yii::$app->params['basePath'] . '/views/layouts/delivery.php' ?>
<!-- ******** -->
<!-- Rewies -->
<section class="wrp-reviews">
    <div class="container">
        <div class="row reviews">
            <div class="col-md-12">
                <p class="titleh2">Что люди говорят о нас</p>
                <?php
                    Modal::begin([
                        'id' => 'review',
                        'header' => '<h4>Написать отзыв</h4>',
                        'toggleButton' => [
                            'label' => 'Написать отзыв',
                            'tag' => 'a',
                            'class' => 'btn btn-default-3',
                            'data-target' => '#review',
                            'href' => Url::toRoute(['site/contact', 'mode' => 'review']),
                        ],
                        'clientOptions' => false
                    ]);
                        echo "Loading...";
                    Modal::end();
                ?>
                <?= Blocks::widget(['id' => 'review']); ?>
            </div>
        </div>
    </div>
</section>
<!-- ****** -->
<!-- Footer -->
<?php require_once Yii::$app->params['basePath'] . '/views/layouts/footer.php' ?>
<!-- End Body -->
<?php $this->endBody() ?>

<script type='text/javascript'>
(function(){ var widget_id = '8dyujdtygn';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>

</body>
</html>
<?php $this->endPage() ?>
