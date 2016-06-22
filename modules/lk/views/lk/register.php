<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

use app\models\RegisterUser;
/* @var $this yii\web\View */
/* @var $model app\models\RegisterUser */
/* @var $form ActiveForm */
?>
<section class="container">
    <h1>Регистрация нового пользователя</h1>
</section>
</div>
<!-- lk row -->
<div class="container">
    <div class="row lk">
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
        <div class="form-group">
            <div class="col-sm-offset-3">
                <?= Html::submitButton('Зарегестрироваться', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <!-- <div class="form-group">
                <label class="col-sm-3 control-label">Повторите пароль</label>
                <div class="col-sm-9">
                <? Html::passwordInput('RegisterUser[vpass]', null, ['class' => 'form-control']); ?>
            </div>
            <div class="col-sm-9">
            <div class="help-block">
            </div>
            </div>
        </div> -->
        <?php ActiveForm::end(); ?>
    </div>
</div>
