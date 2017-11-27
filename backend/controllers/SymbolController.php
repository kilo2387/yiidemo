<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/11/27
 * Time: 16:49
 */

namespace backend\controllers;
Class SymbolController extends \yii\web\Controller
{
    public function actionPare()
    {
        $a = 'er';
        $b = 5;

        $c = $a <=> $b;
        var_dump($c);
    }
}