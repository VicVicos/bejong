<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\models\User;

NavBar::begin([
    'brandLabel' => 'Yii Navbar',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default'
    ]
]);
echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav navbar-right'
    ],
    'items' => [
        [
            'label' => 'Главная',
            'url' => [
                '#'
            ]
        ],
        [
            'label' => 'About',
            'url' => [
                '#'
            ]
        ],
        [
            'label' => 'Обратная связь',
            'url' => [
                '#'
            ]
        ],
        Yii::$app->user->isGuest ? [
            'label' => 'Войти',
            'url' => [
                '#'
            ]
        ] : [
            'label' => 'Выйти ('.Yii::$app->user->identity->user.')',
            'url' => [
                '#'
            ],
            'linkOptions' => [
                'data-method' => 'post'
            ]
        ]
    ]
]);
NavBar::end();
?>
