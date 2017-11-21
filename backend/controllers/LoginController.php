<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/10/20
 * Time: 15:23
 */
namespace backend\controllers;

class LoginController extends BaseController {
    public function actionLogin(){
        $this->layout = false;
        return $this->render('login-backend');
    }
}