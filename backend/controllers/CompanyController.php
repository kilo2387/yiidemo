<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/8/25
 * Time: 10:38
 */
namespace backend\controllers;

use backend\behaviors\CompanyBehavior;
use backend\models\Company;
use yii\web\Controller;

class CompanyController extends Controller{
    private $_company;

    public function init(){
        $this->_company = new Company();
    }

    public function actionIndex(){
        //动态绑定行为
        $this->_company->attachBehavior('company', new CompanyBehavior());
        $this->_company->attachBehaviors([
            'myBehavior1' => new CompanyBehavior,  // 这是一个命名行为
            CompanyBehavior::className(),          // 这是一个匿名行为
        ]);

        echo $this->_company->updateName();

        $this->getBehaviors();

    }

    public function getBehaviors(){
        $behavior = $this->_company->getBehavior('myBehavior2');
        $behaviors = $this->_company->getBehaviors();
        var_dump($behaviors);
    }
}