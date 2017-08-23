<?php
//use backend\controllers\IndexController;

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
error_reporting(E_ALL);
ini_set('display_errors', '1');
//__DIR__ /www/web/yiidemo/backend/web

require(__DIR__ . '/../../vendor/autoload.php');    //  自动加载文件

require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');    // YII容器    Yii应用组件 BaseYii
require(__DIR__ . '/../../common/config/bootstrap.php');    // 模块别名

require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php'),
    require(__DIR__ . '/../../my-config.php')   //引入自定义配置文件
);


//$obj = new IndexController('index', null, []); //id module $config
//$obj->actionList();die();

use milan\functions\Functions;  //

// = Yii::$app  // yii\web\Application => yii\web\Application => Module =>ServiceLocator对象 =>yii\base\Component => yii\base\Object

(new yii\web\Application($config));

//Functions::print_pre(Yii::$app);

Yii::$app->run();
