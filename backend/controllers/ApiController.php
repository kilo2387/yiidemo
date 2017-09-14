<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/12 0:53.
 *
 */

namespace backend\controllers;

use yii\web\Controller;

class ApiController extends Controller{

    public function actionIndex(){
        return json_encode(['code'=>200,'message'=>'你好！']);
    }
}