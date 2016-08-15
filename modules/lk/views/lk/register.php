<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

use app\models\RegisterUser;
/* @var $this yii\web\View */
/* @var $model app\models\RegisterUser */
/* @var $form ActiveForm */

$this->title = 'Регистрация нового пользователя';

if (isset(Yii::$app->user->identity->id)) {
    $id_manager = Yii::$app->user->identity->id;
    $add = 'Добавить пользователя';
} else {
    $id_manager = 0;
    $add = 'Зарегестрироваться';
}

?>
<section class="container">
    <h1>Регистрация нового пользователя</h1>
</section>
</div>
<!-- lk row -->
<div class="container">
    <div class="row lk">
        <?php if ($id_manager) : ?>
            <a class="link link-default back-link" href="<?= Url::to(['/lk/lk/manager']) ?>">Вернуться назад</a>
        <?php else : ?>
            <a class="link link-default back-link" href="<?= Url::to(['index.php']) ?>">Вернуться назад</a>
        <?php endif; ?>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => '{label}<div class="col-md-6">{input}</div><div class="col-sm-offset-3 col-sm-6">{error}</div>',
                'labelOptions' => ['class' => 'col-sm-3 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'email')->input('email') ?>
        <?= $form->field($model, 'password')->input('password') ?>
        <?= $form->field($model, 'vpass')->input('password') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'contact') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'id_manager')->input('hidden', ['value' => $id_manager])->label('') ?>
        <div class="form-group">
            <div class="col-sm-offset-3">
                <?= Html::submitButton($add, ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
