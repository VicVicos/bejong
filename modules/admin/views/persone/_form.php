<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Persone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persone-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(TinyMce::className(), Yii::$app->params['editor']);?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group col-md-3">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
