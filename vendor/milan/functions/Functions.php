<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/24 0:25.
 *
 */
namespace milan\functions;

//use yii\helpers\BaseArrayHelper;

class Functions
{
    public static function print_pre($params)
    {
        echo '<pre>';
        print_r($params);
        echo '</pre>';
    }

    public static function makeUuid()
    {
        return sha1(static::str_rand());
    }

    public static function str_rand($length = 32, $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        if (!is_int($length) || $length < 0) {
            return false;
        }
        $string = '';
        for ($i = $length; $i > 0; $i--) {
            $string .= $char[mt_rand(0, strlen($char) - 1)];
        }
        return $string;
    }
}