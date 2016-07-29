<?php
use yii\helpers\Url;
?>
<section class="container delivery">
    <div class="row">
        <a href="<?= Url::to(['page/question', 'id' => 45])?>" class="btn btn-default-3">Вопрос-ответ</a>
        <div class="col-md-12 jd">
            <p class="titleh2">Ж/д доставка</p>
            <img src="img/jd.png" alt="avia">
            <div><p class="sroki">Сроки поставки 5-8 дней</p></div>
            <div class="row">
                <div class="col-md-12 d-item">
                    <div>
                        <img src="img/container.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин.</p>
                            <p>Загрузка товара и подготовка товара к отправке</p>
                        </div>
                    </div>
                    <div>
                        <img src="img/f-paravoz.png" alt="alt">
                        <span data-day="4" data-count="дней"></span>
                        <div class="item-content">
                            <p class="title">Урумчи.</p>
                            <p>Отправка товара с Пекина до Урумчи</p>
                        </div>
                    </div>
                    <div>
                        <img src="img/ycik.png" alt="alt">
                        <span data-day="1" data-count="день"></span>
                        <div class="item-content">
                            <p class="title">Таможня (КНР).</p>
                            <p>Досмотр на томожне</p>
                            <i class="flag flag-kndr"></i>
                        </div>
                    </div>
                    <div>
                        <img src="img/ycik.png" alt="alt">
                        <span data-day="3-5" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Томожня (Казахстан).</p>
                            <p>Проверка товара на таможне в Алма-Ате</p>
                            <i class="flag flag-kz"></i>
                        </div>
                    </div>
                    <div>
                        <img src="img/cremle.png" alt="alt">
                        <span data-day="5-7" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Отправка до Москвы.</p>
                            <p>Доставка товара в Москву.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 avia">
            <p class="titleh2">Авиа доставка</p>
            <img src="img/avia.png" alt="avia">
            <div><p class="sroki">Сроки поставки 5-8 дней</p></div>
            <div class="row">
                <div class="col-md-12 d-item">
                    <div>
                        <img src="img/container.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Пекин.</p>
                            <p>Загрузка товара и подготовка товара к отправке</p>
                        </div>
                    </div>
                    <div>
                        <img src="img/f-avia.png" alt="alt">
                        <span data-day="1-2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Шицзячжуан.</p>
                            <p>Отправка товара из Пекина до Шицзячжуан</p>
                            <i class="flag flag-kndr"></i>
                        </div>
                    </div>
                    <div>
                        <img src="img/f-avia.png" alt="alt">
                        <span data-day="1-2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Санкт-Петербург.</p>
                            <p>Отправка товара из Шицзячжуан до Санкт-Петербурга</p>
                            <i class="flag flag-rus"></i>
                        </div>
                    </div>
                    <div>
                        <img src="img/cremle.png" alt="alt">
                        <span data-day="2" data-count="дня"></span>
                        <div class="item-content">
                            <p class="title">Отправка до Москвы.</p>
                            <p>Доставка товара в Москву</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
