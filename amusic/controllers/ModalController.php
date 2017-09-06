<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/9/6 1:21.
 *
 */
namespace amusic\controllers;
//use common\models\Push;
use amusic\models\Push;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Class ModalController
 * @package amusic\controllers
 * 模型框
 */
class ModalController extends Controller {

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['list', 'pushed', 'recycle', 'editor', 'detail', 'delete' ,'edit'],
//                        'roles' => ['p.root'],
                    ],
                ]
            ]
        ]);
    }

    public function actionEditor(){
        $this->layout = false;
        $searchModel = new Push();

        $provider = $searchModel->search(Push::ROUTE_LIST);

        return $this->render('editor', [
            'provider'=>$provider,
        ]);
    }

    public function actionEdit(){
        $id = $_POST['id'];
        $article = Push::findOne($id);
        $article->tag = $_POST['tag'];

        if(!$article->save()) {
            throw new Exception('修改标签失败');
        }

        return json_encode(['code'=>200, 'data'=>$article->tag]);
    }
}