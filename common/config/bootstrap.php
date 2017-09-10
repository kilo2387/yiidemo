<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@amusic', dirname(dirname(__DIR__)) . '/amusic');

Yii::setAlias('@milan', dirname(dirname(__DIR__)) . '/vendor/milan');   // 使用个人的第三方类库
Yii::setAlias('@backend_baseUrl', 'http://yii2.ssting.com.cn/');   // backend_baseUrl
