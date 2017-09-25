<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/25 21:23.
 *
 */

namespace backend\models;

use yii\db\ActiveRecord;

class UserExamRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_exam_record';
    }
}