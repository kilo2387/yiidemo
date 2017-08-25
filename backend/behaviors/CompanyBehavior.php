<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/8/25
 * Time: 10:35
 */

namespace backend\behaviors;
use yii\base\Behavior;

class CompanyBehavior extends Behavior{
    protected $name = 'This is CompanyBehavior\'s name';

    public function updateName(){
        return $this->name;
    }
}