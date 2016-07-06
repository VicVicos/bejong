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

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'value' => '']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'disabled' => 'Disabled', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'role')->dropDownList([ 'admin' => 'Admin', 'manager' => 'Manager', 'member' => 'Member', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_manager')->dropDownList($items) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
