<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 3:00.
 *
 */

namespace frontend\controllers;

use milan\qrcode\GenerateQRCode;
use yii\web\Controller;


class SocketController extends Controller{

    public function actionLogin(){
        die('dd');
        $onf = new GenerateQRCode('uuxxxx');
        var_dump($onf);die('ser');
    }
}