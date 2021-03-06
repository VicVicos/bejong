<?php

use yii\helpers\Html;
use app\components\Menu;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="wrp-header-page" style="background-image: url('img/air-bg.jpg')">
    <!-- Шапка -->
    <header class="container">
        <div class="row">
            <div class="col-md-3 logo">
                <a href="/web/" title="title">
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
                <?= Menu::widget(); ?>
            </nav>
        </div>
    </header>
    <section class="container">
        <h1>Наша команда</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ratione placeat velit, consectetur quaerat quas illum temporibus cumque. Nostrum cum consequuntur similique tempore aliquid quasi iusto voluptatem aliquam, aperiam corrupti.
        </p>
    </section>
</div>
<!-- Header -->
<!-- Content -->
<div class="container">
    <div class="row page">
        <?php foreach ($model as $key => $item): ?>
            <?php $item->img = 'img/' . $item->img; ?>
            <div class="col-md-3">
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
