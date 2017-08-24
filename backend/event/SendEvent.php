<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/25 0:09.
 *
 */

namespace backend\event;
use yii\base\Event;
use app\models\Index;
class SendEvent extends Event{

    /**
     * @param $object
     * 绑定事件 [类名||对象, 方法]
     */
    public static function _static_events_on($object)
    {
//        SendEvent::on(Index::class,Index::EVENT_SEND_SOME, ['app\models\Index', 'goHome']);
        SendEvent::on(Index::class,Index::EVENT_SEND_SOME, [$object, 'goHome']);
        SendEvent::on(Index::class,Index::EVENT_SEND_SOME, ['app\models\Index', 'indexSend']);
//        SendEvent::on(Index::class,Index::EVENT_SEND_SOME, [$object, 'indexSend']);

        SendEvent::on(SendMessage::class,Index::EVENT_SEND_SOME, ['backend\event\SendMessage', 'sendMessage']);
        SendEvent::on(SendMessage::class,Index::EVENT_SEND_SOME, ['backend\event\SendMessage', 'sendNotice']);

        $object->on(Index::EVENT_SEND_COM, [$object, 'toComponent']);
    }

}