<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persone */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Persones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <section class="container">
        <h1><?= Html::encode($this->title) ?></h1>
    </section>
</div>
<div class="container">
    <div class="row lk">
        <p>
            <?= Html::a('Вся команда', ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'position',
                'text:html',
                [
                    'label' => 'Картинка',
                    'value' => Html::img('@web/img/' . $model->img,[
                        'alt'=>$model->name,
                        'style' => 'width:150px;'
                    ]),
                    'format' => 'html',
                ],
            ],
        ]) ?>
    </div>
</div>
