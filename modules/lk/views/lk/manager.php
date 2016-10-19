<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = "Управление участниками";
?>
<section class="container">
    <h1><?= $this->title ?></h1>
</section>
</div>
<!-- lk row -->
<div class="container">
    <div class="row lk">
        <a class="link link-default back-link" href="<?= Url::to(['/lk/lk/index']) ?>">Вернуться назад</a>
        <?= Html::a("Выйти", ['/lk/lk/logout'], ['data' => ['method' => 'post'],'class' => 'link link-default']);?>
        <div class="col-md-6">
            <p class="title"><?= $model->name ?></p>
            <a class="btn btn-default-4" href="<?= Url::to(['/lk/lk/register', 'add-user' => Yii::$app->user->identity->id]) ?>">Добавить клиента</a>
            <?php if (Yii::$app->user->identity->role === 'admin') : ?>
                <a class="btn btn-default-4" href="<?= Url::to(['/lk/lk/index', 'all-user' => 1]) ?>">Все участники</a>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <p class="title">Пользователь</p>
            <?php if (!empty($member)) : ?>
                <?php foreach ($member as $key => $item): ?>
                    <p><?= Html::a($item['id'], Url::to(['/lk/lk/index', 'user' => $item['id']], true));?></p>
                <?php endforeach; ?>
            <?php else : ?>
                <p>
                    У вас нет участников. Вы можете их добавить.
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>
