<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Добавление статьи';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="container">
    <h1><?= Html::encode($this->title) ?></h1>
</section>
</div>
<div class="container">
    <div class="row lk">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]); ?>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
