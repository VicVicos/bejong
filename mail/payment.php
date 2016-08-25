<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<p>
    Уважаемый <?= $data['name'] ?> , напоминаем Вам что необходимо внести плату за Ваш товар <?= $data['cargo_name'] ?><br>
    <?= Html::a('Личный кабинет', 'http://dragon-cargo.ru/lk/lk/index&user=' . $data['id_user']) ?>
</p>
