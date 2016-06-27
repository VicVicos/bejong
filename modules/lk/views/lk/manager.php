<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<section class="container">
    <h1>Личный кабинет</h1>
</section>
</div>
<!-- lk row -->
<div class="container">
    <div class="row lk">
        <a class="link link-default" href="<?= Url::to(['/lk/lk/index']) ?>">Вернуться назад</a>
        <?= Html::a("Выйти", ['/lk/lk/logout'], ['data' => ['method' => 'post'],'class' => 'link link-default']);?>
        <div class="col-md-6">
            <p class="title"><?= $model->name ?></p>
            <button class="btn btn-default-4" type="submit">Добавить клиента</button>
        </div>
        <div class="col-md-6">
            <p class="title">Пользователь</p>
            <?php foreach ($member[0] as $key => $item): ?>
                <p><?= Html::a($item, Url::to(['/lk/lk/index', 'user' => $item], true));?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
