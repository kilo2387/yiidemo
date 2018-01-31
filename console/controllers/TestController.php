<?php

namespace console\controllers;

use common\models\test\Test;
use yii\console\Controller;

class TestController extends Controller
{

    public function actionDeni()
    {
        $test = Test::findOne(1);
        if ($test === null){
            throw new \Exception("记录不存在!");
        }
        $test->test = time();
        if (!$test->save()){
            throw new \Exception("保存错误!");
        }
        $this->stdout('hahaha'.PHP_EOL);
    }

    public function actionTwice()
    {
        $test = Test::findOne(2);
        if ($test === null){
            $test = new Test();
        }
//        sleep(30);
        $test->test = date('Y-m-d H:i:s');
        if (!$test->save()){
            throw new \Exception("保存错误!");
        }
        throw new \Exception("ok!");
    }
}