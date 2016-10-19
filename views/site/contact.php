<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\file\FileInput;

if ($mode === 'application') {
    $this->title = 'Оставить заявку';
} elseif ($mode === 'cargo') {
    $this->title = 'Проверить состояние груза';
} else {
    $this->title = 'Обратная связь';
}
$this->params['breadcrumbs'][] = $this->title;
$arrayUpload = [
    'name' => 'Выбрать',
    'options' => ['accept' => 'images/*'],
    'pluginOptions' => [
        'maxFileCount' => 1,
        'allowedFileExtensions' => ['jpg', 'png', 'gif'],
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'browseClass' => 'btn btn-primary',
        'showCancel' => true,
        'showUpload' => false,
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'browseLabel' =>  'Выбрать'
    ]
];
?>
<div class="modal-content site-contact">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?php if (Yii::$app->session->hasFlash('contactFormCargo') || Yii::$app->session->hasFlash('contactFormApplication') || Yii::$app->session->hasFlash('contactFormReview')): ?>
            <?php if (Yii::$app->session->hasFlash('contactFormCargo') && $mode === 'cargo') : ?>
                <div class="alert alert-success">
                    Результат проверки.
                    <?php
                    switch ($status->order_status) {
                        case 'nosend':
                            $stt = 'не отправлен';
                            break;
                        case 'send':
                            $stt = 'отправлен';
                            break;
                        case 'border':
                            $stt = 'на границе';
                            break;
                        case 'ready':
                            $stt = 'готов к выдаче';
                            break;
                        default:
                            $stt = 'не найден';
                            break;
                    }
                    ?>
                </div>
                Товар: <?= $status->id_cargo ?> <?= $stt ?><br>
                <?php if ($status !== null) : ?>
                    Зайдите в <a href="<?= Url::to(['lk/lk/index']) ?>">личный кабинет</a> для подробностей.
                <?php endif; ?>
            <?php elseif (Yii::$app->session->hasFlash('contactFormApplication') || $mode === 'application') : ?>
                <div class="alert alert-success">
                    Спасибо! Ваша заявка принята.
                </div>
            <?php elseif (Yii::$app->session->hasFlash('contactFormReview') && $mode === 'review') : ?>
                <div class="alert alert-success">
                    Спасибо! Ваш отзыв будет опубликован после проверки модератором.
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="row">
                <div class="col-md-12">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ['name' => 'megaform', 'enctype' => 'multipart/form-data']]); ?>
                        <?php if ($mode === 'application') : ?>
                            <!-- Заявка -->
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                            <?= $form->field($model, 'contact') ?>
                            <?= $form->field($model, 'email') ?>
                            <?= $form->field($model, 'weight') ?>
                            <?= $form->field($model, 'width') ?>
                            <?= $form->field($model, 'length') ?>
                            <?= $form->field($model, 'height') ?>
                            <?= $form->field($model, 'type') ?>
                        <?php elseif ($mode === 'cargo') : ?>
                            <!-- Проверка состояния груза -->
                            <!-- Заявка -->
                            <? //$form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                            <? //$form->field($model, 'email') ?>
                            <?= $form->field($model, 'idCargo') ?>
                        <?php elseif ($mode === 'review') : ?>
                            <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
                            <?= $form->field($model, 'intro') ?>
                            <?= $form->field($model, 'text')->textarea(['style' => 'resize:vertical', 'rows' => '4']) ?>
                            <?= $form->field($model, 'img')->widget(FileInput::classname(), $arrayUpload); ?>

                        <?php endif; ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                      'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button'])  ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <div class="loader"></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
    </div>
</div><!-- /.modal-content -->
<?php
$js = <<<JS
jQuery('#contact-form [type="submit"]').on('click', function(e){
    e.preventDefault();
    var form = jQuery('#contact-form');
    var formData = new FormData(document.forms.megaform);
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        dataType: 'HTML',
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        data: formData,
        beforeSend: function() {
            $('.loader').html("<pre>Please wait...</pre>");
        },
    })
    .success(function(result) {
        form.parents('.site-contact').replaceWith(result);
    })
    .fail(function(xhr, ajaxOptions, thrownError) {
        console.log('error');
    })
    .always(function() {
        console.log("complete");
    });

});
JS;
$this->registerJs($js);
?>
