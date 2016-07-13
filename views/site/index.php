<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Beijing Zhong';

$i = 1;
$j = 1;

?>
<section class="wrp-services">
    <div class="container">
        <div class="row services">
            <div class="col-md-4 col-sm-6">
                <p class="titleh2">Наш сервис</p>
                <p>Наша миссия в логистических услугах - быстро, качественно , в срок с минимальными издержками обработать и доставить груз до места назначения. Мы заинтересованы в построении долгосрочных и взаимовыгодных отношений со своими клиентами и партнёрами.</p>
                <ul class="elems">
                    <?php foreach ($model as $key => $item) : ?>
                        <?php if ($i == 1): ?>
                            <li class="active"><a href="#tab<?= $i ?>" data-toggle="tab"><?= $item->title ?></a></li>
                        <?php else : ?>
                            <li><a href="#tab<?= $i ?>" data-toggle="tab"><?= $item->title ?></a></li>
                        <?php endif; ?>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-8 col-sm-6">
                <div class="tab-content">
                    <?php foreach ($model as $key => $item) : ?>
                        <?php
                            if ($item->link) {
                                $typeLink = (int)$item->link;
                                if ($typeLink) {
                                    $link =  Url::to(['page/page', 'id' => $item->link]);
                                } else {
                                    $link = $item->link;
                                }
                            } else {
                                $link = false;
                            }
                        ?>
                        <?php if ($j == 1) : ?>
                            <div class="tab-pane active" id="tab<?= $j ?>">
                                <?= $item->intro ?>
                        <?php else : ?>
                            <div class="tab-pane" id="tab<?= $j ?>">
                                <?= $item->intro ?>
                        <?php endif; ?>
                            <?php if ($link) : ?>
                                <a class="btn btn-default-2" href="<?= $link ?>">Подробнее</a>
                            <?php endif; ?>
                            </div>
                        <?php $j++ ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <i class="icon icon-bouble-bottom"></i>
        <i class="icon icon-bouble-top"></i>
    </div>
</section>
