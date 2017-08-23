<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/24 0:25.
 *
 */
namespace milan\functions;

//use yii\helpers\BaseArrayHelper;

class Functions {
    public static function print_pre($params){
        echo '<pre>';
        print_r($params);
        echo '</pre>';
    }
}