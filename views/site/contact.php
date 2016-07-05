<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

if ($mode === 'application') {
    $this->title = 'Оставить заявку';
} elseif ($mode === 'cargo') {
    $this->title = 'Проверить состояние груза';
} else {
    $this->title = 'Обртаная связь';
}
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="modal-content site-contact">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>
            <?php if ($mode === 'cargo') : ?>
                <div class="alert alert-success">
                    Результат проверки.
                </div>
                Груз: <?= ($status->payment_cond === 'Y') ? 'отправлен' : 'не отправлен' ?><br>
                Зайдите в <a href="<?= Url::to(['lk/lk/index']) ?>">личный кабинет</a> для подробностей.
            <?php elseif ($mode === 'application') : ?>
                <div class="alert alert-success">
                    Спасибо! Ваша заявка принята.
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-md-12">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <?php if ($mode === 'application') : ?>
                            <!-- Заявка -->
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                            <?= $form->field($model, 'contact') ?>
                            <?= $form->field($model, 'email') ?>
                            <?= $form->field($model, 'address') ?>
                            <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                        <?php elseif ($mode === 'cargo') : ?>
                            <!-- Проверка состояния груза -->
                            <!-- Заявка -->
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                            <?= $form->field($model, 'email') ?>
                            <?= $form->field($model, 'idCargo') ?>
                        <?php endif; ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                      'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button'])  ?>
                    </div>
                    <?php ActiveForm::end(); ?>
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
jQuery('#contact-form').on('beforeSubmit', function(){
    var form = jQuery(this);
    jQuery.post(
        form.attr("action"),
        form.serialize()
    )
    .done(function(result) {
        form.parents('.site-contact').replaceWith(result);
        console.log("server success");
    })
    .fail(function() {
        console.log("server error");
    });
    return false;
})
JS;
$this->registerJs($js);
?>
