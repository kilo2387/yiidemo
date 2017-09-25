<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/25 21:22.
 *
 */

namespace backend\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }
}