<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход в личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="container">
    <h1><?= $this->title ?></h1>
</section>
</div>
<!-- lk row -->
<div class="container">

    <div class="row lk">
        <a class="link link-default" href="#back">Вернуться назад</a>
        <div class="col-md-12">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-inline', 'role' => 'form'],
                'fieldConfig' => [
                    'template' => "<div class=\"col-md-12\">{input}{error}</div>\n",
                ],
            ]); ?>
                <p>Если вы впервые в личном кабинете - <a href="<?= Url::to(['lk/register']); ?>">Зарегистрируйтесь</a></p>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Ваш email']); ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите пароль']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"checkbox col-md-6\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ]) ?>
                <div class="form-group col-md-12">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-default-2', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
