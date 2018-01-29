<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2018/1/26
 * Time: 18:11
 */
namespace common\models\test;

use yii\db\ActiveRecord;

class Test extends ActiveRecord{
    public static function tableName()
    {
        return 'test';
    }
}