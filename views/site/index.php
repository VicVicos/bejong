<?php

/* @var $this yii\web\View */

$this->title = 'Beijing Zhong';

$i = 1;
$j = 1;
?>
<section class="wrp-services">
    <div class="container">
        <div class="row services">
            <div class="col-md-4">
                <p class="titleh2">Наш сервис</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod voluptate modi provident tenetur at maiores ipsa nulla ducimus laudantium sunt architecto, quisquam rem delectus cum totam porro, velit nemo nobis!</p>
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
            <div class="col-md-8">
                <div class="tab-content">
                    <?php foreach ($model as $key => $item) : ?>
                        <?php if ($j == 1): ?>
                            <div class="tab-pane active" id="tab<?= $j ?>">
                                <?= $item->text ?>
                            </div>
                        <?php else : ?>
                            <div class="tab-pane" id="tab<?= $j ?>">
                                <?= $item->text ?>
                            </div>
                        <?php endif; ?>
                        <?php $j++ ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <i class="icon icon-bouble-bottom"></i>
        <i class="icon icon-bouble-top"></i>
    </div>
</section>
