<?php
use app\components\Menu;
use yii\bootstrap\Modal;
use yii\helpers\Url;

if (!is_null($model->img)) {
    $model->img = '/img/' . $model->img;
} else {
    $model->img = '/img/air-bg.jpg';
}
?>
<div class="wrp-header-page" style="background-image: url('<?= $model->img ?>')">
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
                <!-- <a href="#" class="btn btn-default-3">Оставить заявку</a>
                <a href="#" class="btn btn-default-2">Состояние заказа</a> -->
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
        <h1><?= $model->title ?></h1>
        <div>
            <?= $model->intro ?>
        </div>
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
