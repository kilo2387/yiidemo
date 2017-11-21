<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/10/20
 * Time: 17:16
 */
namespace account\controllers;
use Yii;
use account\logic\LoginLogic;
use milan\controllers\Controller;

class LoginFrameController extends Controller
{
    public $layout = false;

    public function actionGenerate()
    {
        return $this->render('login-frame');
    }

    public function actionMakeQrcode()
    {
        $data = 'http://images.ssting.com.cn/qrcodes/';
        $info = LoginLogic::Generate('http://account.ssting.com.cn/login-frame/login');
        if ($info->ret) {
            return $this->formatResult($data.LoginLogic::$uuid.'.png');
        } else {
            return $this->formatResult(null, $info->errcode);
        }
    }

    public function actionLogin()
    {
        $params = Yii::$app->request->get();
        die('werx');
    }
}
