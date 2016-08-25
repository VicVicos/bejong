<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
$manager = User::find()->where(['role' => ['manager', 'admin']])->all();
$items = ArrayHelper::map($manager,'id','email');
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-4">
        <?= $form->field($model, 'id')->textInput() ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'value' => '']) ?>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'disabled' => 'Disabled', ], ['prompt' => '']) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'created')->textInput() ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'role')->dropDownList([ 'admin' => 'Admin', 'manager' => 'Manager', 'member' => 'Member', ], ['prompt' => '']) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'id_manager')->dropDownList($items) ?>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
