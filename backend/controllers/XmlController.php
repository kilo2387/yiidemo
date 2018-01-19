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
use common\components\MyXmlResponseFormatter as MXRF;
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
        $request = \Yii::$app->request;
        $t = \Yii::$app->request->absoluteUrl;
        $a = \Yii::$app->request->acceptableContentTypes;
        $b = \Yii::$app->request->getAcceptableContentTypes();
//        Accept-Language:zh-CN,zh;q=0.9,en;q=0.8
        var_dump($request->serverName);die('gf');



        var_dump($a
//            ,
//            $b
        );die();
        return $this->formatXml([
            "ToUserName" => ['$postObject<->FromUserName', MXRF::CDATA => true],
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

