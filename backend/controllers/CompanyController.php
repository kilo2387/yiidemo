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
use yii\base\Component;
use yii\web\Controller;

class CompanyController extends Controller
{
    private $_company;

    //    public function init(){
    //        $this->_company = new Company();    //Company类的对象
    //    }

    /**
     * 行为绑定的原理
     */
    public function desc()
    {
        //1、调用attachBehavior绑定 行为键名为 sfd, CompanyBehavior行为
        $company = new Company();
        $company->attachBehavior('sfd', new CompanyBehavior());
        //2、确保之前的行为已经绑定
        Component::ensureBehaviors();
        //3、绑定行为  $name=sfd; $behavior=new CompanyBehavior()
        //Component::attachBehaviorInternal($name, $behavior);
        /*
        //如果不是行为，那么创建他
        $behavior = Yii::createObject($behavior);
        //如果是匿名行为
        $behavior->attach($this);
        $this->_behaviors[] = $behavior;

        //否则是命名行为
        if (isset($this->_behaviors[$name])) {
            //如果有这个行为,解除注入
            $this->_behaviors[$name]->detach();
        }
        //注入行为
        $behavior->attach($this);
        $this->_behaviors[$name] = $behavior;

        return $behavior;
        */

        //4、注入行为
        //        $behavior->attach($this);


        //        yii\base\Component::behaviors();  返回一个数组用于描述行为
        //        yii\base\Component::ensureBehaviors();    确保 behaviors() 中所描述的行为已经进行了绑定

        /*
            yii\base\Component::attachBehaviorInternal();     // // 不是 Behavior 实例，说是只是类名、配置数组，那么就创建出来吧
                //只是类名、配置数组，那么就创建对象
                if (!($behavior instanceof Behavior)) {
                    $behavior = Yii::createObject($behavior);
                }
                //如果是匿名行为,直接注入
                if (is_int($name)) {
                    $behavior->attach($this);
                    $this->_behaviors[] = $behavior;
                }else{
                     // 已经有一个同名的行为，要先解除，再将新的行为绑定上去。
                    if (isset($this->_behaviors[$name])) {
                        $this->_behaviors[$name]->detach();
                    }
                    $behavior->attach($this);
                    $this->_behaviors[$name] = $behavior;
                }
                return $behavior;
        */

        /*
            yii\base\Behavior::attach();
            public function attach($owner)
            {
                $this->owner = $owner;
                foreach ($this->events() as $event => $handler) {
                    $owner->on($event, is_string($handler) ? [$this, $handler] :
                        $handler);
                }
            }
            设置好行为的 $owner ，使得行为可以访问、操作所依附的对象
            遍历行为中的 events() 返回的数组，将准备响应的事件，通过所依附类的 on() 绑定到类上
        */
    }

    /**
     * 动态绑定行为
     */
    public function actionIndex()
    {
        $company = new Company();
        //动态绑定行为
        $company->attachBehaviors(['ser' => 'backend\behaviors\CompanyBehavior', 'erw' => new CompanyBehavior()]);
        //        $this->_company->attachBehaviors([
        //            'myBehavior1' => new CompanyBehavior,  // 这是一个命名行为
        //            CompanyBehavior::className(),          // 这是一个匿名行为
        //        ]);

        echo $company->updateName() . '<br>';
        //        echo  (new Company())->updateName();  //动态绑定只对当前对象起作用

        $company->trigger(Company::EVENT_TEST_BEHAVIOR);
        echo $company->updateName() . '<br>';

        //        $behaviors = $company->getBehaviors();
        //        var_dump($behaviors);die;
        //        $this->getBehaviors();

    }

    /**
     * 获取行为
     * s所有
     */
    public function getBehaviors()
    {
        $behavior = $this->_company->getBehavior('myBehavior2');
        $behaviors = $this->_company->getBehaviors();
        var_dump($behaviors);
    }

    /**
     * 删除
     */
    public function delBehaviors()
    {
        (new Company())->detachBehavior('myBehavior2');
        (new Company())->detachBehaviors();
    }

    public function actionTest()
    {
        $c_ids = [15, 16];
        $info = $query = CompanyUsers::find()->where(['in', CompanyUsers::tableName() . '.user', $c_ids]);
        //var_dump($info);die;
        $query->join('LEFT JOIN', UserExamRecord::tableName(), UserExamRecord::tableName() . '.user = ' . CompanyUsers::tableName() . '.user');

        $query->joinWith(UserExamRecord::tableName() . '.user = ' . CompanyUsers::tableName() . '.user', true, 'LEFT JOIN');

        $query->select(CompanyUsers::tableName() . '.*,' . UserExamRecord::tableName() . '.*');
        $info = $query->all();
        var_dump($info);

        die('2');
    }


    public function actionTest2()
    {
        $subQuery = new Query();

        //        $subQuery = (new Query())->from('user_exam_record')->orderBy('created desc');
        //        $users_records = UserExamRecord::find()->from(['tmpA' => $subQuery])->where(['target' => $params->id])->groupBy('user')->all();


        $oser = $subQuery->select('max(created) as created')->from('user_exam_record')->where('user = ftb.user')->andWhere(['exam' => 1]); // 考试id


        $uew = (new Query());
        $uew->from('user_exam_record ftb')->where(['=', 'ftb.created', $subQuery])->orderBy('ftb.created desc');


        //var_dump($uew);die;
        $com = new Query();
        $id = 77;
        $coms = $com->from('company_users')->leftJoin(['ftb' => $uew], 'ftb.user = company_users.user')->where("FIND_IN_SET('{$id}', groups)")//部门
            ->select('company_users.*,ftb.created')->all();

        var_dump($coms);

    }
}