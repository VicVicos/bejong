<?php
use app\components\Menu;

if (!is_null($model->img)) {
    $model->img = 'img/' . $model->img;
} else {
    $model->img = 'img/air-bg.jpg';
}
?>
<div class="wrp-header-page" style="background-image: url('<?= $model->img ?>')">
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
        <h1><?= $model->title ?></h1>
        <p>
            <?= $model->intro ?>
        </p>
    </section>
</div>
<!-- Header -->
<!-- Content -->
<div class="container">
    <div class="row page">
        <div class="col-md-12">
            <article>
                <?= $model->text ?>
            </article>
        </div>
    </div>
</div>
<!-- Content -->
