<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\File */
/* @var $form ActiveForm */
$id = Yii::$app->request->get('user');
?>
    <section class="container">
        <h1>Загрузить накладную</h1>
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
        <a class="link link-default back-link" href="<?= Url::to(['/lk/lk/index', 'user' => $id]) ?>">Вернуться назад</a>
        <?= Html::a("Выйти", ['/lk/lk/logout'], ['data' => ['method' => 'post'],'class' => 'link link-default']);?>
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

            <?= $form->field($model, 'id_user')->input('text', ['value'=> $id, 'disabled' => 'disabled']) ?>
            <?= $form->field($model, 'xlsxFile')->fileInput() ?>
            <?= $form->field($model, 'userId')->hiddenInput(['value' => $id]) ?>
            <div class="form-group">
                <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
