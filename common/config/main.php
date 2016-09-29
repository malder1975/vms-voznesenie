<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => require(dirname(__DIR__) . '\config\dbvms.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],

    'modules' => [

    'pages' => [
        'class' => 'bupy7\pages\Module',
        'tableName' => '{{%your_table_name}}',
    ],
],
];
