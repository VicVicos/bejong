<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchArticle */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="container">
    <h1><?= Html::encode($this->title) ?></h1>
</section>
</div>
<div class="container">
    <div class="row lk">
        <p>
            <?= Html::a('Добавить статью', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => [
                    'class' => 'table table-striped table-bordered'
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'title',
                    [
                        'label' => 'Псевдоним',
                        'attribute' => 'alias',
                        'filter' => false
                    ],
                    [
                        'label' => 'Тип',
                        'attribute' => 'type',
                        'filter' => ['article' => 'Статьи','slide' => 'Слайды', 'block'=>'Блоки', 'review' => 'Отзывы', 'page' => 'Страницы'],
                        'options' => ['width' => '125px'],
                    ],
                    'intro',
                    'text:ntext',
                    // 'img:image',
                    [
                        'label' => 'Картинка',
                        'format' => 'raw',
                        'value' => function($data){
                            return Html::img('@web/img/' . $data->img,[
                                'alt'=>$data->title,
                                'style' => 'width:75px;'
                            ]);
                        },
                    ],
                    'excerpt',
                    [
                        'header' => '<span class="glyphicon glyphicon-eye-open"></span>',
                        'attribute' => 'status',
                        'value' => function($data){
                            return $data->status;
                        },
                    ],
                    // Колонка с действиями над полем
                    [
                        'class' => 'yii\grid\ActionColumn',
                        // 'header'=>'Действия',
                        'headerOptions' => ['width' => '20'],
                        'template' => '{view} {update} {delete}{link}',
                    ],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
