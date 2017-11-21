<?php
return [
    'runtimePath' => '/www/logs/runtime',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',  //定义了vendor目录
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=st_yiidemo',
            'username' => 'root',
            'password' => 'milan_kilo',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true, //false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport'=>[
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.163.com',
                'username'=>'15817487936',
                'password'=>'jkl05398',
                'port'=>'25',
                'encryption'=>'tls'
            ],
        ],
    ],
];
