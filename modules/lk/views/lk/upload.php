<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\File */
/* @var $form ActiveForm */
?>
    <section class="container">
        <h1>Загрузить накладную</h1>
    </section>
</div>
<!-- lk row -->
<div class="container">
    <div class="row lk">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($model, 'id_user') ?>
        <?= $form->field($model, 'xlsxFile')->fileInput() ?>
        <?= $form->field($model, 'userId')->hiddenInput(['value' => '15']) ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
