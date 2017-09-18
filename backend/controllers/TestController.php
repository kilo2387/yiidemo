<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/9/13
 * Time: 14:32
 */
namespace backend\controllers;

use yii\db\Exception;
use yii\web\Controller;

class TestController extends Controller{
    public function actionTest(){
        $arr = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];
        $num = 3;
        $info = $this->randMakeExam($arr, $num);
        var_dump($info);
    }
    //随机产生试卷
    private function randMakeExam(array $source, $num = 1)
    {
        $questions = [];
        if(count($source) < $num){
            throw new Exception('题库题数小于抽数量');
        }
        $questions_keys = array_rand($source, $num);
        foreach ($questions_keys as $id){
            $questions[] = $source[$id];
        }
        return $questions;
    }

    public function actionImg(){
        return $this->render('img');
    }
}