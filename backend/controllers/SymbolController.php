<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/11/27
 * Time: 16:49
 */

namespace backend\controllers;
use Yii;
Class SymbolController extends \yii\web\Controller
{
    public function actionPare()
    {
        $a = 'er';
        $b = 5;

        $c = $a <=> $b;
        var_dump($c);
    }

    public function actionModule()
    {
        \Yii::$app->get('gii');
        \Yii::$app->user;
        \Yii::$app->request->get();
    }

    public function actionAla()
    {
        var_dump(Yii::getAlias('@milan'));

        Yii::setAlias('@milan','er');
        var_dump(Yii::getAlias('@milan',true));
    }
}