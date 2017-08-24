<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/24 1:48.
 *
 */

namespace app\models;
use backend\event\SendComponent;
use backend\event\SendEvent;
use backend\event\SendMessage;
use yii\base\Component;

/**
 * Class Index
 * @package app\models
 *
 * 4种事件
 * 类:静态、实例
 * 实例:实例
 */
class Index extends Component{
    const EVENT_SEND_COM = 'send_component_event';
    const EVENT_SEND_SOME = 'send_some_thing';  //事件名

    public function __construct(array $config = [])
    {
//        parent::__construct($config);
        self::init();
    }

    public function init(){

//        $this->_static_events_on();
        SendEvent::_static_events_on($this);    //Event
//        $this->_component_events_on();      //Component

    }

    public static function test(){
        echo 'test @app ';
    }
    public function goHome($event){
//        var_dump($event);
        echo 'I\'m to go home dont li you'.'<br>';;
    }
    public static function indexSend($event){
        echo 'idnex Send email'.'<br>';;
    }
    public function toComponent($event){
        echo 'this is Component use this'.'<br>';
    }
    /**
     * class::static event::on
     */
    public function _static_events_on()
    {
        SendEvent::on(Index::class,Index::EVENT_SEND_SOME, ['app\models\Index', 'goHome']);
        SendEvent::on(Index::class,Index::EVENT_SEND_SOME, ['app\models\Index', 'indexSend']);

        SendEvent::on(SendMessage::class,Index::EVENT_SEND_SOME, ['backend\event\SendMessage', 'sendMessage']);
        SendEvent::on(SendMessage::class,Index::EVENT_SEND_SOME, ['backend\event\SendMessage', 'sendNotice']);
    }

    public function _component_events_on(){
//        $this->on(self::EVENT_SEND_COM, [new SendMessage(), 'sendMessage']);
        $this->on(self::EVENT_SEND_COM, [$this, 'toComponent']);

    }

}