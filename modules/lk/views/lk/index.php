<?php
use app\models\User;

$user = Yii::$app->user->identity;

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
    <?php //Yii::$app->user->logout(); ?>
    <?php //var_dump(Yii::$app->user->identity); ?>
    <div class="row lk">
        <a class="link link-default" href="#back">Вернуться назад</a>
        <a class="link link-default" href="/web/index.php?r=lk/lk/logout">Выйти</a>
        <div class="col-md-6">
            <p class="title">Личные данные клиента</p>
            <div>
                <p><strong>ФИО</strong><?= $user->name ?></p>
                <p><strong>Номер телефона</strong><?= $user->contact ?></p>
                <p><strong>Эл. почта</strong><?= $user->email ?></p>
                <p><strong>Адрес</strong><?= $user->address ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <p class="title">Номера накладных</p>
            <p><a href="#">87494ASD</a>Отправлено</p>
            <p><a href="#">87494ASD</a>Отправлено</p>
            <p><span>87494ASD</span>Доставлено</p>
            <p><span>87494ASD</span>Доставлено</p>
        </div>
    </div>
</div>
