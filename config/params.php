<?php

return [
    'adminEmail' => 'developitb@yandex.ru',
    'basePath' => dirname(__DIR__),
    'editor' => [
        'options' => ['rows' => 4],
        'language' => 'ru',
        'clientOptions' => [
            'automatic_uploads' => true,
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste image imagetools textcolor textpattern"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image forecolor backcolor | fontsizeselect",
            'fontsize_formats' => '8px 10px 12px 14px 18px 24px 36px'
        ]
    ],
];
