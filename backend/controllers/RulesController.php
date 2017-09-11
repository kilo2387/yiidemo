<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/9/11
 * Time: 15:30
 */
namespace backend\controllers;

use backend\models\Remind;
use yii\web\Controller;

class RulesController extends Controller{
public $enableCsrfValidation=false;
    public function actionIndex(){
//        $this->validate();
        return $this->render('rules');
    }
    public function actionUpdate(){
//        var_dump(\Yii::$app->request->post());die();
        $model = new Remind;
        var_dump($model->load(\Yii::$app->request->post()));
        var_dump($model->title);
        $model->validate();

        var_dump($model->title);

//       if(!$status) {
            var_dump($model->errors);

            $model->save();

//        }

//        die('we');
    }
}