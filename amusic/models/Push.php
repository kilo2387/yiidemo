<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/8/28
 * Time: 14:55
 */
namespace amusic\models;

use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\Query;

class Push extends ActiveRecord {

    const IS_PUSH = 1;
    const UN_PUSH = 0;
    const IS_DEL = 1;
    const UN_DEL = 0;
    const ROUTE_LIST = 0;
    const ROUTE_PUSHED = 1;
    const ROUTE_RECYCLE = 2;

//    public function behaviors()
//    {
//        return [
//            [
//                'class'=>TimestampBehavior::class,
////                'createdAtAttribute' => 'push_time',
////                'updatedAtAttribute' => 'push_time',
//            ]
//        ];
//    }

    public function rules()
    {
        return [
            [['title', 'summary', 'link', 'cover'], 'trim'],
            [['is_del', 'is_push'], 'default', 'value'=>0],
        ];
    }

    public static function tableName()
    {
        return 'push';
    }

    public function attributes()
    {
        return parent::attributes(); // TODO: Change the autogenerated stub
    }

    public function attributeLabels()
    {
        return [
            'id'            =>  'ID',
            'title'         =>  '标题',
            'summary'       =>  '内容',
            'author'        =>  '作者',
            'tag'           =>  'Tag标签',
            'link'          =>  '文章链接',
            'cover'         =>  '封面',
            'url'           =>  'URL',
            'parent_url'    =>  '来源网站',
            'download_time' =>  '下载时间',
            'push_time'     =>  '推送时间',
            'is_del'        =>  '是否删除',
            'table_from'    =>  '来源表',
            'old_id'        =>  '来源表的原ID'
        ];
    }


    public static function push($id)
    {
        $id = intval($id);

        if(!is_integer($id) || !$id){
            throw new BadRequestHttpException('id参数错错误:推送文章');
        }

        $push = static::findOne($id);
        if($push instanceof static) {
            $push->is_push = self::IS_PUSH;
            $push->push_time = time();
        }else{
            throw new BadRequestHttpException('文章不存在:推送文章');
        }
        $transaction = Push::getDb()->beginTransaction();
        try {
            if ($push->save()) {
                $push_id = new PushIds();
//                $push_id->loadDefaultValues();
                $push_id->push_id = $push->id;
                $push_id->title = $push->title;
                $push_id->link = $push->link;
                $push_id->summary = $push->summary;
                $push_id->cover = $push->cover;
                $push_id->author = $push->author;
                $push_id->tag = $push->tag;
                $push_id->push_time = time();

//            $push_id = (new Query())->createCommand()
//                ->insert('pholcus.push_ids',['push_id'=>$push->id, 'created'=>time()])->execute(); //from('pholcus.push_ids')->

                if (!$push_id->save()) {
                    throw new \yii\db\Exception('推送失败:添加记录失败');
                }

            } else {
                throw new \yii\db\Exception('推送失败:修改记录失败');
            }

            $transaction->commit();
        }catch (Exception $e){
            $transaction->rollBack();
            return false;
        }

        return true;
    }

    /**
     * @param int $type | 0=>list,1=>pushed, 2=>recycle
     * @return ActiveDataProvider
     */
    public function search($type = 0)
    {
        $query = Push::find();

        if($type === 0){
            $defaultOrder = 'download_time';
            $query->andFilterWhere(['is_push'=>Push::UN_PUSH, 'is_del'=>Push::UN_DEL]);
        }else{
            $defaultOrder = 'push_time';
            if($type === 1) {
                $query->andFilterWhere(['is_push' => Push::IS_PUSH, 'is_del' => Push::UN_DEL]);
            }else {
                $query->andFilterWhere(['is_del' => Push::IS_DEL]);
            }
        }


        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'defaultOrder' => [
                    $defaultOrder => SORT_DESC
                ],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        //关键词
        if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $query->andwhere([
                'or',
                ['like','title', $_GET['keyword']],
                ['like','author',$_GET['keyword']],
                ['like','summary',$_GET['keyword']],
            ]);
        }

        //媒体
        if(isset($_GET['media']) && !empty($_GET['media'])) {
            $query->andwhere(['table_from'=>$_GET['media']]);
        }

        //结束时间
        if(isset($_GET['end_date']) && !empty($_GET['end_date'])){
            if($type === Push::ROUTE_LIST) {
                $query->andFilterWhere(
                    ['<', 'download_time', date('Y-m-d 23:59:59', strtotime($_GET['end_date']))]
                );
            }else{
                $query->andFilterWhere(
                    ['<', 'push_time', strtotime(date('Y-m-d 23:59:59', strtotime($_GET['end_date'])))]
                );
            }
        }

        //开始时间
        if(isset($_GET['begin_date']) && !empty($_GET['begin_date'])){
            if($type === Push::ROUTE_LIST) {
                $query->andFilterWhere(
                    ['>', 'download_time', date('Y-m-d 00:00:00', strtotime($_GET['begin_date']))]
                );
            }else{
                $query->andFilterWhere(
                    ['>', 'push_time', strtotime(date('Y-m-d 00:00:00', strtotime($_GET['begin_date'])))]
                );
            }
        }

        return $provider;
    }

    /**
     * 今日抓取多少条
     *
     */
    public static function getCountArticle(){
        $sum = Push::find()->where(['between','download_time', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();
        return $sum;
    }

    /**
     * 今日推送多少条
     */

    public static function getCountPush(){
        $sum = PushIds::find()->where(['between','push_time', strtotime(date('Y-m-d 00:00:00')), strtotime(date('Y-m-d 23:59:59'))])->count();

        return $sum;
    }

    public function getCategory(){

        $category = PushArticleController::$tables[$this->table_from];
        return $category;
    }

    public static function media(){
        $media = PushArticleController::$tables;
        return $media;
    }
}