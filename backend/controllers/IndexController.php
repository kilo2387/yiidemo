<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/8/23
 * Time: 11:18
 */
namespace backend\controllers;

use app\models\Index;

use yii\web\Controller;
use milan\functions\Functions;
class IndexController extends Controller{

    public function actionList()
    {
        Index::test();
        Functions::print_pre(['sw'=>'sdf']);
        die('there is backend index/list    append something');
    }

}