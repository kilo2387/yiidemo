<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2018/1/3
 * Time: 15:27
 */

namespace common\behaviors;

use yii\base\Behavior;
use yii\web\Controller;

/**
 * Class NoCsrf
 * @package common\behaviors
 *
 * return [
 *      'csrf' => [
 *          'class' => NoCsrf::className(),
 *          'controller' => $this,
 *          'actions' => [
 *              'request'
 *          ]
 *      ],
 * ]
 */
class NoCsrf extends Behavior
{
    public $actions = [];
    public $controller;

    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    public function beforeAction($event)
    {
        $action = $event->action->id;
        if (in_array($action, $this->actions)){
            $this->controller->enableCsrfValidation = false;
        }
    }
}