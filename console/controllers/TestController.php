<?php
namespace console\controllers;

use common\models\test\Test;
use yii\console\Controller;

class TestController extends Controller
{

    public function actionDeni()
    {
        $test = Test::findOne(1);
        var_dump($test);die();
    }
}