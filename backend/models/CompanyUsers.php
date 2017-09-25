<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/25 21:20.
 *
 */

namespace backend\models;

use yii\db\ActiveRecord;

class CompanyUsers extends ActiveRecord
{
    public static function tableName()
    {
        return 'company_users';
    }
}