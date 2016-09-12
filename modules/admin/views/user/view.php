<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <section class="container">
        <h1><?= Html::encode($this->title) ?></h1>
    </section>
</div>
<div class="container">
    <div class="row lk">
        <p>
            <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить пользователя?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Вернуться', ['index'], ['class' => 'btn btn-primary']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'contact',
                'email:email',
                'address',
                // 'password',
                'status',
                'created',
                'role',
                'id_manager',
            ],
        ]) ?>

    </div>
</div>
