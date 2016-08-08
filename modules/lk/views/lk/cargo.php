<?php
use app\models\Mailer;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Накладаня " . $model->id_cargo;

$role = Yii::$app->user->identity->role;
$user = Yii::$app->request->get('user');

$mailer = new Mailer();

$cargo = [];
foreach ($model as $key => $value) {
        $cargo[] = $value;
}

unset($cargo['0'], $cargo['2']);

$optionField = ['class' => 'nake-input form-control', 'disabled' => 'disabled'];
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
    <div class="row lk-row lk">
        <div class="col-md-12">
            <a class="link link-default back-link" href="<?= Url::to(['/lk/lk/index', 'user' => $user]) ?>">Вернуться назад</a>
            <?= Html::a("Выйти", ['/lk/lk/logout'], ['data' => ['method' => 'post'],'class' => 'link link-default']);?>
        </div>
    </div>
    <div class="row lk">
        <div class="col-md-12">
            <?= Html::a('Скачать накладную' , '/web/xlsxfile/'. $file->id_user . '/' . $file->file_name, ['class' => 'btn btn-lk']); ?>
            <?php $form = ActiveForm::begin([
                'id' => 'cargoForm',
                'fieldConfig' => [
                    'template' => "{input}",
                ]
            ]); ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>Номер груза</td>
                        <td>Пункт назначения</td>
                        <td>Дата отправки</td>
                        <td>Ориентировочная<br> дата прибытия</td>
                        <td class="min-input">Вес</td>
                        <td class="min-input">Объем</td>
                        <td class="min-input">Мест</td>
                        <td class="mid-input">Ставка, дол</td>
                        <td class="mid-input">Общая<br> стоимость</td>
                        <td class="big-input">Состояние оплаты</td>
                        <td class="big-input">Состояние заказа</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($role === 'member'): ?>
                        <tr>
                            <?php foreach ($cargo as $key => $value) : ?>
                                    <td>
                                        <?= $value ?>
                                    </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td><?= $form->field($model, 'id_cargo')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'destination')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'date_depart')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'date_arrival')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'weight')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'amount')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'places')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'rate')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'cost')->input('text', $optionField) ?></td>
                            <td><?= $form->field($model, 'payment_cond')->dropDownList(['Y' => 'Оплачено', 'N' => 'Не оплачено'], ['class' => 'drop-dl form-control']) ?></td>
                            <td><?= $form->field($model, 'order_status')->dropDownList([
                                'nosend' => 'Не отправлено',
                                'send' => 'Отправлен',
                                'border' => 'На границе',
                                'ready' => 'Готов к выдаче'
                            ], ['class' => 'drop-dl form-control']) ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6">
            <?php if ($model->order_status === 'N') : ?>
                <?php if (empty($send)) : ?>
                    <?php $form = ActiveForm::begin();?>
                    <?= $form->field($mailer, 'day')->radioList([
                        '1' => 'Оплата при получении',
                        '5' => 'Через 5 дней',
                        '10' => 'Через 10 дней',
                        ]) ?>
                        <button type="submit" class="btn btn-default-2">Сохранить</button>
                        <?php ActiveForm::end() ?>
                    <?php else : ?>
                        <p class="title">Уведомление о платеже запланировано</p>
                    <?php endif; ?>
            <?php else : ?>
                <p class="title">Счёт оплачен</p>
            <?php endif; ?>
        </div>
    </div>
</div>
