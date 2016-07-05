<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use app\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Участники';
$this->params['breadcrumbs'][] = $this->title;
?>
    <section class="container">
        <h1><?= Html::encode($this->title) ?></h1>
    </section>
</div>
<div class="container">
    <div class="row lk">
        <!-- <p>
            <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        </p> -->
        <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    'id',
                    'name',
                    'contact',
                    'email:email',
                    'address',
                    // 'password',
                    'status',
                    'created',
                    // 'role',
                    [
                        'label' => 'Права',
                        'attribute' => 'role',
                        'value' => function ($data) {
                            return $data->role;
                        },
                        'filter' => ['admin' => 'Админ', 'manager' => 'Менеджер', 'member'=>'Участники'],
                        // 'filter' => Html::dropDownList('SearchUser[role]', null,['admin' => 'Админ', 'manager' => 'Менеджер', 'member'=>'Участники'], ['prompt' => 'Выберите статус...']),
                    ],
                    // 'id_manager',
                    [
                        'label' => 'Менеджер',
                        'value' => function($data){
                            $name = User::findOne($data->id_manager);
                            return $data->id_manager . ':' . $name->name;
                        },
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
