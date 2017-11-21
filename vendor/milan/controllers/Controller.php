<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/10/20
 * Time: 18:01
 */
namespace milan\controllers;
class Controller extends \yii\web\Controller
{
    public static $format = [
        'content' => [
            'data' => [],
            'resultCode' => 100,
            '_' => 0,
            'status' => 0,
            'success' => true,
        ],
        'hasError' => false
    ];

    public function formatResult($data, $code = 100, $status = 0, $success = true, $hasError = false)
    {
        static::$format['content']['data'] = $data;
        static::$format['content']['resultCode'] = intval($code);
        static::$format['content']['status'] = intval($status);
        static::$format['content']['success'] = boolval($success);
        static::$format['content']['_'] = time();
        static::$format['hasError'] = $hasError;
        return json_encode(static::$format, JSON_UNESCAPED_SLASHES);
    }
}