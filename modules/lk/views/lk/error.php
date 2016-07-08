<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="container">
    <h1>Личный кабинет</h1>
</section>
</div>
<!-- lk row -->
<div class="container">
    <div class="row lk">
        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            Произошла ошибка во время обработки вашего запроса.
        </p>
    </div>
</div>
