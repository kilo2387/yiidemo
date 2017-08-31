<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/31 23:34.
 *
 */
namespace amusic\controllers;


use yii\db\Query;

class DataController extends BaseController{
    public function actionExport(){

        $data = (new Query())->from('usertb')->limit(70000)->all();

        $filename = '测试数据-'.date('Y-m-d H:i:s');
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=".$filename.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        return $this->render('excel', [
            'data'=>$data
        ]);
    }
}