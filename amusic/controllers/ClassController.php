<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/27 21:04.
 *
 */

namespace amusic\controllers;

//use yii\web\Controller;

use amusic\models\Classes;
use yii\data\ActiveDataProvider;

class ClassController extends BaseController {
    public function actionRead(){
        $query = Classes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=>10],
            'sort'=>[
                'defaultOrder'=>[
                    'class_material_id'=>SORT_DESC
                ],
//                'attributes'=>['id','title']
            ]
        ]);

        var_dump($dataProvider);

        return $this->render('read', [
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionTest(){
        $model = new Classes();

        $records = $model->findOne(1);
        var_dump($records->title->title);die();
    }
}