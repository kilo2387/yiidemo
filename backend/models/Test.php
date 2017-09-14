<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/15 0:26.
 *
 */

namespace backend\models;

use yii\db\ActiveRecord;

class Test extends ActiveRecord{
    public static function tableName()
    {
        return 'test';
    }
}