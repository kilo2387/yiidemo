<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/8/25
 * Time: 10:35
 */

namespace backend\behaviors;

use backend\models\Company;
use yii\base\Behavior;

class CompanyBehavior extends Behavior
{

    /**
     * @var \yii\base\Component object 成员变量用于指向行为的依附对象,用于指向行为的依附对象
     */
    public $owner;

    /**
     * @var string 注入Component的属性
     */
    protected $name = 'This is CompanyBehavior\'s name belong to Company class';

    /**
     * @return array 重载yii\base\behavior基类的方法
     */
    public function events()
    {
        $event = [
            Company::EVENT_TEST_BEHAVIOR => [[$this, 'handlerOne'], ['backend\models\Company', 'handlerTwo']]
        ];
        /*
        $event = [
            Company::EVENT_TEST_BEHAVIOR=> [$this,'handlerOne']
        ];
        */
        return $event;
    }


    /**
     * @param \yii\base\Component $owner
     */
    public function attach($owner)
    {
        $this->owner = $owner;

        //遍历事件,绑定到宿主对象
        /*
        foreach ($this->events() as $event => $handler) {
            $owner->on($event, is_string($handler) ? [$this, $handler] : $handler);
        }
        */
        foreach ($this->events() as $event => $handlers) {
            foreach ($handlers as $handler) {
                $owner->on($event, is_string($handler) ? [$this, $handler] : $handler);
            }
        }
    }


    /**
     * @return string
     */
    public function updateName()
    {
        return $this->name;
    }

    /**
     * @param $event | 事件对象
     */
    public static function handlerOne($event)
    {
        echo 'handlerOne';
    }

    /**
     * @param $event | 事件对象
     */
    public function handlerTwo($event)
    {
        $this->name = 'newName';
//        echo 'handlerTwo';
    }
}