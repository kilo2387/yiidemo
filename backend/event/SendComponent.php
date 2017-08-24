<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/25 2:16.
 *
 */
namespace backend\event;

use app\models\Index;
use yii\base\Component;

class SendComponent extends Component{
    public function onload(){
        (new SendComponent())->on(Index::EVENT_SEND_COM, [$this, 'toComponent']);
    }
    public function toComponent($event){
        echo 'this is Component use this'.'<br>';
    }
}