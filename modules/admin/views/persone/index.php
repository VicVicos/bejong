<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPersone */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Persones';
$this->params['breadcrumbs'][] = $this->title;
?>
    <section class="container">
        <h1><?= Html::encode($this->title) ?></h1>
    </section>
</div>
<div class="container">
    <div class="row lk">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Создать участника', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'ID',
                        'attribute' => 'id',
                        'options' => ['width' => '50px'],
                    ],
                    'name',
                    'position',
                    [
                        'label' => 'Статья',
                        'attribute' => 'text',
                        'value' => function ($data) {
                            return substr(strip_tags($data->text), 0, 250);
                        }
                    ],
                    [
                        'label' => 'Картинка',
                        'attribute' => 'img',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::img('@web/img/' . $data->img,[
                                'alt'=>$data->name,
                                'style' => 'width:125px;'
                            ]);
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
