<?php

return [
    'adminEmail' => 'admin@example.com',
    'basePath' => dirname(__DIR__),
    'editor' => [
        'options' => ['rows' => 4],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ],
];
