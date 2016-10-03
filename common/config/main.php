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
        'tableName' => '{{%static_pages}}',
        'controllerMap' => [
            'manager' => [
                'class' => 'bupy7\pages\controllers\ManagerController',
                'as access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        'allow' => TRUE,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ],
    ],
],
];
