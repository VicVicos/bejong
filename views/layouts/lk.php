<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Body -->
<div class="wrp-header-lk">
    <!-- Шапка -->
    <header class="container">
        <div class="row">
            <div class="col-md-3 logo">
                <a href="/html/index.html" title="title">
                    <img src="img/logo.png" alt="Title">
                </a>
            </div>
            <!-- Tools -->
            <div class="col-md-9 tools">
                <a href="/html/lk.html" class="btn btn-custom"><i class="icon icon-arrow-btn"></i>Личный кабинет</a>
                <a href="#" class="btn btn-default-3">Оставить заявку</a>
                <a href="#" class="btn btn-default-2">Состояние заказа</a>
            </div>
            <!-- Menu -->
            <nav class="col-md-9">
                <ul class="nav-menu">
                    <li><a href="#">Item menu 1</a></li>
                    <li><a href="#">Item menu 2</a></li>
                    <li><a href="#">Item menu 3</a></li>
                    <li><a href="#">Item menu 4</a></li>
                    <li><a href="#">Item menu 5</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="container">
        <h1>Личный кабинет</h1>
    </section>
</div>
<div class="container">
    <!-- lk row -->
    <div class="row lk">
        <a class="link link-default" href="#back">Вернуться назад</a>
        <div class="col-md-12">
            <form action="" class="form-inline" role="form">
                <p>Если вы впервые в личном кабинете - <a href="#">Зарегистрируйтесь</a></p>
                <div class="form-group col-md-6">
                    <label class="sr-only" for="exampleInputEmail2">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                </div>
                <div class="form-group col-md-6">
                    <label class="sr-only" for="exampleInputPassword2">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                </div>
                <div class="checkbox">
                    <label class="col-md-6">
                        <input type="checkbox"> Запомнить меня
                    </label>
                    <div class="col-md-6">
                        <a href="#">Забыли пароль?</a>
                    </div>
                </div>
                <div class="form-group">

                </div>
                <button type="submit" class="btn btn-default-2">Войти</button>
            </form>
        </div>
    </div>
    <!-- lk row -->
    <div class="row lk">
        <?php echo $content; ?>
    </div>

    <div class="row lk">
        <a class="link link-default" href="#back">Вернуться назад</a>
        <div class="col-md-6">
            <p class="title">Личные данные клиента</p>
            <div>
                <p><strong>ФИО</strong>Иванов Фёдор Иванович</p>
                <p><strong>Номер телефона</strong>Иванов Фёдор Иванович</p>
                <p><strong>Эл. почта</strong>Иванов Фёдор Иванович</p>
                <p><strong>email</strong>Иванов Фёдор Иванович</p>
                <p><strong>Адрес</strong>Иванов Фёдор Иванович</p>
            </div>
        </div>
        <div class="col-md-6">
            <p class="title">Номера накладных</p>
            <p><a href="#">87494ASD</a>Отправлено</p>
            <p><a href="#">87494ASD</a>Отправлено</p>
            <p><span>87494ASD</span>Доставлено</p>
            <p><span>87494ASD</span>Доставлено</p>
        </div>
    </div>

    <div class="row lk">
        <div class="col-md-12">
            <button class="btn btn-lk" type="submit">Загрузить накладную</button>
            <table class="table">
                <thead>
                    <tr>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row lk">
        <div class="col-md-6">
            <p class="title">Напомнить произвести оплату</p>
            <form action="" class="form-horizontal" role="form">
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Оплата при получении
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Через 10 дней
                    </label>
                </div>
            </form>
        </div>
    </div>

    <div class="row lk">
        <div class="col-md-6">
            <p class="title">Алексей</p>
            <button class="btn btn-default-4" type="submit">Добавить клиента</button>
        </div>
        <div class="col-md-6">
            <p class="title">Накладная</p>
            <p><a href="#">4654</a></p>
            <p><a href="#">4654</a></p>
            <p><a href="#">4654</a></p>
            <p><a href="#">4654</a></p>
        </div>
    </div>
</div>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <i class="icon icon-mark"></i>
                <p class="title">Наш адрес</p>
                <p>г. Омск, ул. Красный Путь, 80/1</p>
            </div>
            <div class="col-md-3">
                <i class="icon icon-phone"></i>
                <p class="title">Сотовый телефон</p>
                <p>+7 913 644 34 22</p>
            </div>
            <div class="col-md-3">
                <i class="icon icon-hours"></i>
                <p>ПН-ПТ с <strong>10:00</strong> до <strong>19:00</strong></p>
                <p>СБ <strong>10:00</strong> до <strong>16:00</strong></p>
            </div>
            <div class="col-md-3">
                <i class="icon icon-mail"></i>
                <p><a href="mailto:primer@mail.ru">mail@primer.com</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="copyright">
                    Copyright &laquo; Cargo &raquo; 2016
                </p>
            </div>
            <div class="col-md-6">
                <p class="copyright itb">
                    Создание и продвижение сайта: <a href="http://itb-company.com">ITB-company</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- End Body -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
