<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'jklhdljKLfskJH2389',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'lk/lk/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            // TRUE - send all mails to a file
            // FALSE - send real emails via 'transport'
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'developitb',
                'password' => '6fduecnf06',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '/' => 'site/index',
                'about' => 'page/about',
                'uslugi' => 'page/uslugi',
                'services' => 'page/services',
                'team' => 'page/team',
                'contacts' => 'page/contacts',
                'question' => 'page/question',
                'article' => 'page/page',
                'jobs' => 'page/jobs',
                // ['class' => 'app\components\SefRule', 'connectionID' => 'db']
            ]
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
        ],
        'lk' => [
            'class' => 'app\modules\lk\Lk',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'params' => $params,
    'language'=>'ru',
    'sourceLanguage'=>'ru',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1']
    ];
}

return $config;
