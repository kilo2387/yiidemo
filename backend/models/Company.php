<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/8/25
 * Time: 10:32
 */

namespace backend\models;

use yii\db\ActiveRecord;

class Company extends ActiveRecord{
    /**
     * @return array
     * 静态绑定
     */
    const EVENT_TEST_BEHAVIOR = 'test_behavior';
//    public $newName;
    public function behaviors()
    {
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }
}