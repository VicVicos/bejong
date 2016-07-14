<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\Menu;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="wrp-header-page" style="background-image: url('/img/air-bg.jpg')">
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
                            'href' => Url::toRoute(['/site/contact', 'mode' => 'application']),
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
                        'href' => Url::toRoute(['/site/contact', 'mode' => 'cargo']),
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
        </div>
    </header>
    <section class="container">
        <h1>Наша команда</h1>
        <p>
            Наша команда - это профессиональные сотрудники, закончившие Вузы РФ и Китая.  Мы набираем только профессионалов в нашу команду. Отличное знание языков: китайский, английский, что позволяет нам общаться с фабриками изготовителя, выезжать на производство. Мы любим свою работу и делаем ее хорошо.
            <br>
            Спасибо, что Вы выбрали именно нас, мы знаем, что  у Вас был большой выбор!!!
        </p>
    </section>
</div>
<!-- Header -->
<!-- Content -->
<div class="container">
    <div class="row page">
        <?php foreach ($model as $key => $item): ?>
            <?php $item->img = '/img/' . $item->img; ?>
            <div class="col-md-3 team">
                <figure>
                    <p class="v-text"><?= Html::tag('img', null, ['src' => $item->img, 'alt' => $item->name, 'title' => $item->name]); ?></p>
                    <figcaption>
                        <p><?=$item->name?></p>
                        <p><?=$item->position?></p>
                    </figcaption>
                </figure>
                <div>
                    <?=$item->text?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
