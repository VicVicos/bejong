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
            <div class="col-md-6">
                <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'imageFile')->fileInput() ?>
                <?= Button::widget([
                    'label' => 'Загрузить',
                    'options' => [
                        'class' => 'btn-lg btn-primary',
                        'style' => 'margin:5px',
                        'id' => 'uploadFile'
                    ]
                ]);
                ?>
                <progress id="prog" value="0" min="0" max="100"></progress>
                <? Progress::widget([
                    'percent' => 0,
                    'label' => 'Ход выполнения',

                ]); ?>
            </div>
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
<?php
$url = Url::toRoute(['upload', 'mode' => 'application']);
$script = <<< JS
    $('#uploadFile').on('click', function(e) {
        e.preventDefault();
        $('#article-imagefile').upload("$url", function(success) {
            console.log('success');
        },
        $('#prog'));
    });
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>
