<?php
use app\components\Menu;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\QuestionForm;

if (!is_null($model->img)) {
    $model->img = '/img/' . $model->img;
} else {
    $model->img = '/img/air-bg.jpg';
}

?>
<div class="wrp-header-page" style="background-image: url('<?= $model->img ?>')">
    <!-- Шапка -->
    <header class="container">
        <div class="row">
            <div class="col-md-3 logo">
                <a href="<?=Yii::$app->urlManager->createUrl(["site/index"])?>" title="title">
                    <img src="/img/logo.png" alt="Title">
                </a>
            </div>
            <!-- Tools -->
            <div class="col-md-9 tools">
                <a href="<?= Yii::$app->urlManager->createUrl(["lk/lk/index"]) ?>" class="btn btn-custom"><i class="icon icon-arrow-btn"></i>Личный кабинет</a>
                <!-- <a href="#" class="btn btn-default-3">Оставить заявку</a>
                <a href="#" class="btn btn-default-2">Состояние заказа</a> -->
                <?php
                    Modal::begin([
                        'id' => 'application',
                        'header' => '<h4>Оставить заявку</h4>',
                        'toggleButton' => [
                            'label' => 'Оставить заявку',
                            'tag' => 'a',
                            'class' => 'btn btn-default-3',
                            'data-target' => '#application',
                            'href' => Url::toRoute(['/site/contact', 'mode' => 'application']),
                        ],
                        'clientOptions' => false
                    ]);
                        echo "Loading...";
                    Modal::end();
                ?>
                <?php
                    Modal::begin([
                    'id' => 'status-cargo',
                    'header' => '<h4>Проверить состояние груза</h4>',
                    'toggleButton' => [
                        'label' => 'Состояние заказа',
                        'tag' => 'a',
                        'class' => 'btn btn-default-2',
                        'data-target' => '#status-cargo',
                        'href' => Url::toRoute(['/site/contact', 'mode' => 'cargo']),
                    ],
                    'clientOptions' => false,
                    ]);
                        echo "Loading...";
                    Modal::end();
                ?>
            </div>
            <!-- Menu -->
            <nav class="col-md-9">
                <?= Menu::widget(); ?>
            </nav>
        </div>
    </header>
    <section class="container">
        <h1><?= $model->title ?></h1>
        <?php if ($model->type !== 'tabs'): ?>
            <div>
                <?= $model->intro ?>
            </div>
        <?php endif; ?>
    </section>
</div>
<!-- Header -->
<!-- Content -->
<div class="container">
    <div class="row page">
        <div class="col-md-12">
            <?php
                foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                    echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
                }
            ?>
            <article>
                <?= $model->text ?>
            </article>
        </div>
        <?php if ($form) : ?>
            <div class="question-form col-md-12">
                <h3>Не нашли интересующий вас вопрос? Вы можите задать его.</h3>
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-md-6">
                    <?= $form->field($elem, 'name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($elem, 'email') ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($elem, 'question')->textarea();?>
                </div>
                <div class="form-group col-md-12">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- Content -->
