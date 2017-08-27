<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 21:24.
 *
 */

namespace amusic\models;
use yii\db\ActiveRecord;

class ClassMaterialCollections extends ActiveRecord{
    public static function tableName()
    {
        return 'class_material_collections';
    }
}