<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/8 1:06.
 *
 */
namespace amusic\controllers;
class SystemController extends BaseController{
    public function actionSetting(){
        $this->render('setting');
    }
}