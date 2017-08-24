<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/8/23
 * Time: 11:18
 */
namespace backend\controllers;

use app\models\Index;

use backend\event\AlipayEvent;

use backend\event\SendComponent;
use backend\event\SendEvent;

use backend\event\SendMessage;
use yii\base\Event;
use yii\web\Controller;
use milan\functions\Functions;
class IndexController extends Controller{

    public function actionList()
    {
        Index::test();
        Functions::print_pre(['sw'=>'sdf']);
        die('there is backend index/list    append something');
    }
    public function actionUpdate(){
        if('update' == true) {
            $event = new AlipayEvent();
            $event->trigger(AlipayEvent::EVENT_UPDATE);
        }
    }

    public function actionOut()
    {
        if (time() > strtotime('2017-08-24 23:30:00')){
            SendEvent::on(
                Index::class,
                Index::EVENT_SEND_SOME,
                function ($event) {
                    echo $event->sender . ' 下班了'."\n";
                }
            );

            SendEvent::trigger(Index::class, Index::EVENT_SEND_SOME);
        }
    }


    /**
     * 触发Event类事件
     * 1、使用Event的 实例||类名 调用
     * 2、要触发的方法所在 类对象||类名   如果传入的是对象$event->sender 保存此对象
     * 3、事件名
     */
    public function actionSend()
    {
        new Index();
        $sendEvent = new SendEvent;
        $sendEvent::trigger(new SendMessage(), Index::EVENT_SEND_SOME); // 触发SendMessage类方法
//        SendEvent::trigger(SendMessage::class, Index::EVENT_SEND_SOME);   //触发Index方法
//        SendEvent::trigger(Index::class, Index::EVENT_SEND_SOME);
        SendEvent::trigger(Index::class, Index::EVENT_SEND_SOME);
    }

    //
    public function actionComponent()
    {   (new Index())->init();
        (new Index())->trigger(Index::EVENT_SEND_COM);
    }

}