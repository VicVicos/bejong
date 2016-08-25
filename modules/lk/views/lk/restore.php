<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Востановление пароля';
$this->params['breadcrumbs'][] = $this->title;

?>
<section class="container">
    <h1><?= $this->title ?></h1>
</section>
</div>
<!-- lk row -->
<div class="container">
    <?php
    foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
        echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    }
    ?>
    <div class="row lk">
        <a class="link link-default" href="/">Вернуться назад</a>
        <div class="col-md-12">
            <?php if ($regim === 1) : ?>
                <!-- Запрос на восстановление пароля -->
                <?php $form = ActiveForm::begin([
                    'id' => 'restore-form',
                    'options' => ['class' => 'form-inline', 'role' => 'form'],
                    'fieldConfig' => [
                        'template' => "<div class=\"col-md-12\">{input}{error}</div>\n",
                    ],
                ]); ?>
                    <p>Укажите email, на него придёт одноразовая ссылка, по котороый можно сбросить пароль.</p>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Ваш email']); ?>

                    <div class="form-group col-md-12">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-default-2', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            <?php elseif ($regim === 2) : ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'restore-form-password',
                    'options' => ['class' => 'form-inline', 'role' => 'form'],
                    'fieldConfig' => [
                        'template' => "<div class=\"col-md-12\">{input}{error}</div>\n",
                    ],
                ]); ?>
                    <p>Укажите новый пароль.</p>
                    <div class="col-md-6">
                        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'placeholder' => 'Новый пароль']); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'vpass')->passwordInput(['autofocus' => true, 'placeholder' => 'Повторите пароль']); ?>
                    </div>
                    <?= $form->field($model, 'email')->hiddenInput(['value' => $email]); ?>
                    <?= $form->field($model, 'hash')->hiddenInput(['value' => $hash]); ?>
                    <div class="form-group col-md-12">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-default-2', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
