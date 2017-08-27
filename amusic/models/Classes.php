<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 21:20.
 *
 */

namespace amusic\models;

use yii\db\ActiveRecord;

class Classes extends ActiveRecord{
    public static function tableName(){
        return 'class_materials';
    }

    public function getTitle()
    {
        return $this->hasOne(ClassMaterialCollections::className(), ['class_material_collection_id' => 'collection']);
    }
}