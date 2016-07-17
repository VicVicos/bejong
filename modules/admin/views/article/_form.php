<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Button;
use yii\bootstrap\Progress;
use yii\helpers\Url;
// use dosamigos\ckeditor\CKEditor;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;

/* https://github.com/2amigos/yii2-file-upload-widget */
/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */

$items = ['article' => 'Статья', 'block' => 'Блок', 'slide' => 'Слайдер', 'review' => 'Отзыв', 'page' => 'Страницы', 'tabs' => 'Табы'];
$params = ['prompt' => 'Выберите тип...'];

$status = ['active' => 'Опубликовано', 'disabled' => 'Не опубликовано'];
$paramsStatus = ['prompt' => 'Статус...'];
?>
    <div class="article-form">
        <?php $form = ActiveForm::begin(['id' => 'article', 'options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="col-md-12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList($status,$paramsStatus); ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'fileImage')->widget(FileInput::classname(), [
                'name' => 'Выбрать',
                'options' => ['accept' => 'images/*'],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['upload']),
                    'maxFileCount' => 1,
                    'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                    'uploadAsync' => true,
                    'initialPreview'=>[
                        "/img/" . $model->img,
                        ],
                    'initialPreviewAsData'=>true,
                    'initialPreviewConfig' => [
                        ['caption' => $model->img, 'size' => $model->getFileSize($model->img)]
                    ],
                    'browseClass' => 'btn btn-success',
                    'uploadClass' => 'btn btn-info',
                    'removeClass' => 'btn btn-danger',
                    'browseClass' => 'btn btn-primary',
                    'showCancel' => true,
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  'Выбрать'
                ]
            ]); ?>
            <?= $form->field($model, 'img')->textInput(['style' => 'display:none']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'type')->dropDownList($items,$params); ?>
        </div>
        <div class="col-md-6">
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
