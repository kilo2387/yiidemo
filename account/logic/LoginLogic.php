<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/10/20
 * Time: 21:36
 */
namespace account\logic;

use milan\functions\Functions;
use milan\qrcode\GenerateQRCode;

class LoginLogic
{
    public static $uuid;
    public static function Generate($apiUrl)
    {
        static::$uuid = $uuid = Functions::makeUuid();
        $_ = time();
        $data = "{$apiUrl}?token={$uuid}&_={$_}";
        return new GenerateQRCode($data, $uuid);
    }
}