<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
// var_dump($model);
?>
    <section class="container">
        <h1><?= Html::encode($this->title) ?></h1>
    </section>
</div>
<div class="container">

    <div class="row lk">

        <p>
            <?= Html::a('Все статьи', ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить эту статью?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                'alias',
                'type',
                'status',
                'link',
                'intro',
                'text:html',
                [
                    'label' => 'Картинка',
                    'value' => Html::img('@web/img/' . $model->img,[
                        'alt'=>$model->title,
                        'style' => 'width:250px;'
                    ]),
                    'format' => 'html',
                ],
                'excerpt',
            ],
        ]) ?>

    </div>
</div>
