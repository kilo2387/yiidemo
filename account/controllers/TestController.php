<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/10/20
 * Time: 17:16
 */
namespace account\controllers;

use yii\web\Controller;

class TestController extends Controller {
    public function actionTest(){
        return $this->render('login-frame');
    }
}
