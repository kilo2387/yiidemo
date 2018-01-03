<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2018/1/3
 * Time: 16:25
 */

namespace common\base;

use yii\web\Response;
use yii\web\XmlResponseFormatter;

class Controller extends \yii\web\Controller
{
    public function formatXml($data = null, $rootTag = 'xml', $itemTag = 'ChildrenNode')
    {
        return \Yii::createObject([
            'class' => XmlResponseFormatter::className(),
            'format' => Response::FORMAT_XML,
            'formatters' => [
                Response::FORMAT_XML => [
                    'class' => 'yii\web\XmlResponseFormatter',
                    'rootTag' => (string)$rootTag, //根节点
                    'itemTag' => (string)$itemTag, //单元
                ],
            ],
            'data' => $data
        ]);
    }
}
