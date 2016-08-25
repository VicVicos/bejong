<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Settings;

$phone = Settings::getOption('phone');
$email = Settings::getOption('email');
$address = Settings::getOption('address');
$rejim_b = Settings::getOption('rejim_b');
$rejim_w = Settings::getOption('rejim_w');
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <i class="icon icon-mark"></i>
                <p class="title">Наш адрес</p>
                <p><?= $address['value'] ?></p>
            </div>
            <div class="col-sm-3">
                <i class="icon icon-phone"></i>
                <p class="title">Сотовый телефон</p>
                <div>
                    <p>
                        <?= $phone['value'] ?>
                    </p>
                </div>
            </div>
            <div class="col-sm-3">
                <i class="icon icon-hours"></i>
                <div>
                    <?= $rejim_b['value'] ?>
                    <?= $rejim_w['value'] ?>
                </div>
            </div>
            <div class="col-sm-3">
                <i class="icon icon-mail"></i>
                <div>
                    <p><a href="mailto:<?= $email['value'] ?>"><?= $email['value'] ?></a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright">
                    Copyright &laquo; Cargo &raquo; 2016
                </p>
            </div>
            <div class="col-sm-6">
                <p class="copyright itb">
                    Создание и продвижение сайта: <a href="http://itb-company.com">ITB-company</a>
                </p>
            </div>
        </div>
    </div>
</footer>
