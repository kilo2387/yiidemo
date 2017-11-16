<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
//    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
//    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-account',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'account\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-account',
            'cookieValidationKey' => 'JNDE-BL2E_P4XFiHCoaNXbh6FBEiWySS',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-account', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-account',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];
