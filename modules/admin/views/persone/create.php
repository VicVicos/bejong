<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Persone */

$this->title = 'Добавление члена команды';
$this->params['breadcrumbs'][] = ['label' => 'Persones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <section class="container">
        <h1><?= Html::encode($this->title) ?></h1>
    </section>
</div>
<div class="container">
    <div class="row lk">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
