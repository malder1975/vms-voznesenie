<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => require(dirname(__DIR__) . '\config\dbvms.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
