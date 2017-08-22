<?php
return [
    'runtimePath' => '/www/logs/runtime',

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'db' => [
//            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=localhost;dbname=test',
//            'username' => 'root',
//            'password' => 'pTZsHdJa',
//            'charset' => 'utf8',
//        ],
    ],
];
