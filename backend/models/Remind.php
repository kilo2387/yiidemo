<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/9/11
 * Time: 15:54
 */
namespace backend\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Remind extends ActiveRecord{

    public static function tableName(){
        return '{{%yiidemo.m_remind}}';
    }
    public function rules()
    {
        // 按顺序执行
        // default validate 后才会赋值
        // skipOnError=true 报错则跳过
        // skipOnEmpty=true 为空测跳过
        // field , callback 把不合法的数据转换成合法的
        // in range
        return [
//
//
//
//            [['title'], 'default', 'value'=>1115],
//            [['title'], function($attribute){
//                if (5<9){
//                    $this->addError($attribute,'价格应大于1000');
//                    return false;
//                }
//                return true;
//            }, 'skipOnEmpty'=>false],
//            [['title'], 'default', 'value'=>'yu', 'when'=>function(){
//                return true; //or false
//            }],

            [['title'], 'default', 'value'=>'123456'],

            [['title'], 'check'],   //把不合法的数据转换成合法的

//            [['title'], 'required', 'message'=> 'title 不能为空！', 'skipOnError' => false,],
////            [['title'], 'integer', 'skipOnError' => false, 'skipOnEmpty'=>false],
//            [['title'], 'string', 'skipOnError' => false, 'skipOnEmpty'=>false],

//            [['content'], 'integer', 'skipOnError' => true, 'skipOnEmpty'=>false],
//            [['title'], 'value'=>function($value){
//                if($value){
//                    return false;
//                }
//            },
//                'skipOnError' => false, 'skipOnEmpty'=>false
//            ],

//            [['title'], 'default', 'value'=>'xxx'],
            ['title', 'compare', 'compareAttribute'=>'content', 'message'=>'title两个值不相等', ],
            [['title'], 'in', 'range'=>['23, 234, 2345'], 'message'=>'title值不在范围内', 'skipOnError'=>false],
            [['content'], 'url', 'skipOnEmpty'=>false],



        ];
    }

    public function check(){
        $this->title .= 'xx';
    }

    public function attributes()
    {
        return [
            'remind_id',
            'title',
            'content',
        ];
    }
}