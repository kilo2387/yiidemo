<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/15 0:23.
 *
 */
namespace backend\controllers;

use backend\models\Test;
use function GuzzleHttp\Psr7\_caseless_remove;
use yii\db\ActiveRecord;
use yii\debug\models\Router;
use yii\web\Controller;

class ActiveController extends Controller{
    public function actionRouter(){
        $columns = $this->run('active/test-column', ['ArName'=>new Test()]);
        print_r($columns);

        $columns = $this->run('active/test-field', ['ArName'=>new Test(), 'filed'=>'age']);
        print_r($columns);
    }

    public function actionTestColumn($ArName){
        return $this->getAllColumnNames($ArName);

    }
    public function actionTestField($ArName, $filed){
        return $this->getOneColumnValues($ArName, $filed);
    }

    /**
     * @param ActiveRecord $activeRecord
     * @return array
     *
     * 获取所有字段
     */
    private function getAllColumnNames(ActiveRecord $activeRecord){
        return $activeRecord::getTableSchema()->columnNames;
    }

    /**
     * @param ActiveRecord $activeRecord
     * @param $field
     * @return array
     *
     * 获取一列的值
     */
    private function getOneColumnValues(ActiveRecord $activeRecord, $field){
        return $activeRecord::find()->select($field)->column();
    }

    /**
     * 更新所有
     */
    public function actionUpdate(){
        $test_model = new Test();
        Test::updateAll(['age'=>33], ['and',['age'=>44],['in', 'id', [4,5,6]]]);
    }

}