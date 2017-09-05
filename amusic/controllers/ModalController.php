<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/6 1:21.
 *
 */
namespace amusic\controllers;
use yii\web\Controller;

/**
 * Class ModalController
 * @package amusic\controllers
 * 模型框
 */
class ModalController extends Controller {

    public function actionEditor(){
        $this->layout = false;
        echo \Yii::getAlias('@basePath');
        return $this->render('editor');
    }
}