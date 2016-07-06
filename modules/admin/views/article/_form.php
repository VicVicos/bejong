<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use dosamigos\ckeditor\CKEditor;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
$items = ['article' => 'Статья', 'block' => 'Блок', 'slide' => 'Слайдер', 'review' => 'Отзыв', 'page' => 'Страницы'];
$params = ['prompt' => 'Выберите тип...'];

$status = ['active' => 'Опубликовано', 'disabled' => 'Не опубликовано'];
$paramsStatus = ['prompt' => 'Статус...'];
?>
    <div class="article-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type')->dropDownList($items,$params); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList($status,$paramsStatus); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'intro')->widget(TinyMce::className(), Yii::$app->params['editor']);?>

            <?= $form->field($model, 'text')->widget(TinyMce::className(), Yii::$app->params['editor']);?>

            <?= $form->field($model, 'excerpt')->widget(TinyMce::className(), Yii::$app->params['editor']);?>
        </div>
        <div class="form-group col-md-12">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
