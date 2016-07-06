<?php
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
$user = Yii::$app->user->identity;
$i = 0;
?>
<section class="container">
    <h1>Личный кабинет</h1>
</section>
</div>
<!-- lk row -->
<div class="container">
    <?php
        foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
            echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
        }
    ?>
    <div class="row lk">
        <?php if ($manager) : ?>
            <a class="link link-default back-link" href="<?= Url::to(['/lk/lk/manager']) ?>">Вернуться назад</a>
        <?php endif; ?>
        <?= Html::a("Выйти", ['/lk/lk/logout'], ['data' => ['method' => 'post'],'class' => 'link link-default']);?>
        <div class="col-md-6">
            <p class="title">Личные данные клиента</p>
            <?php if ($manager) : ?>
                <div>
                    <p><strong>ФИО</strong><?= $model['name'] ?></p>
                    <p><strong>Номер телефона</strong><?= $model['contact'] ?></p>
                    <p><strong>Эл. почта</strong><?= $model['email'] ?></p>
                    <p><strong>Адрес</strong><?= $model['address'] ?></p>
                </div>
            <?php else : ?>
                <div>
                    <p><strong>ФИО</strong><?= $user->name ?></p>
                    <p><strong>Номер телефона</strong><?= $user->contact ?></p>
                    <p><strong>Эл. почта</strong><?= $user->email ?></p>
                    <p><strong>Адрес</strong><?= $user->address ?></p>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <?php if ($manager) : ?>
                <?= Html::a('Загрузить накладную', Url::to(['/lk/lk/upload', 'user' => $model['id']]), ['class' => 'btn btn-lk']);?>
            <?php else : ?>
            <?php endif; ?>
            <p class="title">Номера накладных</p>
            <?php foreach ($cargo as $key => $item) : ?>
                <p><?= Html::a($item->id_cargo, Url::to(['/lk/lk/cargo', 'user' => $model['id'], 'cargo' => $cargo[$i]->id]));?><?= ($item->payment_cond === 'Y') ? 'Отправлено' : 'Не отправлено' ?></p>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
