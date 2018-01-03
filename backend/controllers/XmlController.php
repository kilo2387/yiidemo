<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2018/1/2
 * Time: 17:23
 */

namespace backend\controllers;

use common\base\Controller;
use common\behaviors\NoCsrf;
use yii\filters\ContentNegotiator;
use yii\helpers\Json;

use yii\web\Response;
use yii\web\XmlResponseFormatter;
use milan\functions\Functions;

class XmlController extends Controller
{
    public function behaviors()
    {
        return [
            'csrf' => [
                'class' => NoCsrf::className(),
                'controller' => $this,
                'actions' => [
                    'for',
                ],
            ],
            'content' => [
                'class' => ContentNegotiator::className(),
                'formatParam' => null,          #YII_DEBUG ? '_format' : null,
                'languageParam' => null,        #YII_DEBUG ? '_lang' : null,
                'formats' => [
                    //'application/json' => Response::FORMAT_JSON,
                    //                    'application/xml' => Response::FORMAT_XML,
                ],
                'languages' => [
                    'zh-CN'
                ]
            ],
        ];
    }

    public function actionFor()
    {
        //        return $this->asJson(['code' => 200, 'data' => ['id' => 1]]);
        //        \Yii::$app->response->formatters = [
        //            Response::FORMAT_XML => [
        //                'class' => XmlResponseFormatter::className(),
        //                'rootTag' => 'xml',
        //                'itemTag' => 'CreateTime', //单元
        //            ]
        //        ];


        return $this->formatXml([
            "ToUserName" => '$postObject->FromUserName',
            "FromUserName" => '\'$postObject->ToUserName',
            time(),
            "MsgType" => "music",
            "Music" => [
                "Title" => '\'$recognition',
                "Description" => '\'$decode',
                "MusicUrl" => '\'$musicurl',
                "HQMusicUrl" => '\'$musicurl',
            ]
        ]);
    }

    public function actionXmlob()
    {
        return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_XML,
            'formatters' => [
                \yii\web\Response::FORMAT_XML => [
                    'class' => 'yii\web\XmlResponseFormatter',
                    'rootTag' => 'urlset', //根节点
                    'itemTag' => 'url', //单元
                ],
            ],
            'data' => [ //要输出的数据
                [
                    'loc' => 'http://********',
                ],
            ],
        ]);
    }
}

