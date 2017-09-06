<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/6 1:27.
 *
 */
namespace amusic\assets;

use yii\web\AssetBundle;

class AmusicAsset extends AssetBundle {
    public $baseUrl = '@baseUrl';

    public $css = [
//        'css/bootstrap.min.css'
    ];

    public $js = [
        'js/jquery-3.2.1.min.js',
        'js/bootstrap.min.js',
//        'css/bootstrap.min.css'
        'js/jquery.validate.js',
//        'js/wer.werwer.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}