<?php
/**
 * Created by IntelliJ IDEA.
 * User: kilo
 * Date: 2017/9/13
 * Time: 14:32
 */

namespace backend\controllers;

use backend\models\Users;
use milan\functions\Functions;
use yii\db\Exception;
use yii\web\Controller;

class TestController extends Controller
{
    public $layout = false;

    public function actionTest()
    {
        $arr = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];
        $num = 3;
        $info = $this->randMakeExam($arr, $num);
        var_dump($info);
    }

    //随机产生试卷
    private function randMakeExam(array $source, $num = 1)
    {
        $questions = [];
        if (count($source) < $num){
            throw new Exception('题库题数小于抽数量');
        }
        $questions_keys = array_rand($source, $num);
        foreach($questions_keys as $id){
            $questions[] = $source[$id];
        }

        return $questions;
    }

    public function actionImg()
    {
        return $this->render('img');
    }

    public function actionArr()
    {
        $params = [
            'a' => 1,
            'b' => 2,
            //            'c' => [
            //                'd' => [
            //                    'g' => '',//new Users(),
            //                    'h' => 7
            //                ],
            //                'e' => 4,
            //            ],
            'f' => 5,
            'x' => 3,
            'we' => 34

        ];

        $params2 = [
            'a' => 1,
            'b' => 2,
            //            'c' => [
            //                'd' => [
            ////                    'g' => '',//new Users(),
            //                    'h' => 7
            //                ],
            //                'e' => 4,
            //            ],
            'f' => '5',
            'x' => 3,
        ];

        $value = ['we', 'x', 'we'];
        //获取值
        $result = array_values(array_filter($params));
        Functions::print_pre($result);

        //获取keys
        $result = array_keys($params);
        Functions::print_pre($result);

        //唯一
        $result = array_unique($value);
        Functions::print_pre($result);

        //分块
        $result = array_chunk($params, 1, true);
        Functions::print_pre($result);

        //获取一行
        $result = array_column($params, 'd', 'e');
        Functions::print_pre($result);

        //创建新的数组,$params => $params2 要equals
        //        $result = array_combine($params, $params2);
        //        Functions::print_pre($result);

        //统计元素个数
        //        $count = array_count_values($params);
        //        var_dump($count);


        $result = array_diff_assoc($params, $params2);
        Functions::print_pre($result);

        $result = array_diff_key($params, $params2);
        Functions::print_pre($result);


        $array1 = ["a" => "green", "b" => "brown", "c" => "blue", "red"];
        $array2 = ["a" => "green", "red", "yellow"];
        $result = array_diff_uassoc($array1, $array2, function ($a, $b){
            if ($a === $b){
                return 0;
            }

            return ($a > $b) ? 1 : -1;
        });
        print_r($result);

        $result = array_diff_ukey($array1, $array2, function ($a, $b){
            if ($a === $b){
                return 0;
            }

            return ($a > $b) ? 1 : -1;
        });

        Functions::print_pre($result);

        $result = array_diff($params, $params2);
        Functions::print_pre($result);

        $result = array_fill_keys($params, ['xx', 'ee', 'ff']);
        Functions::print_pre($result);

        $result = array_fill(2, 6, 'xerr');
        Functions::print_pre($result);

        Functions::print_pre(array_filter($params));

        Functions::print_pre(array_filter($params, function ($v, $k){
            return $k == 'b' || $v == 4;
        }, ARRAY_FILTER_USE_BOTH));

        //交换数组键值
        $result = array_flip($params);
        Functions::print_pre($result);

    }

    public function actionInsert()
    {
        $params1 = [1, 'dd' => 'dd', 'we', 1];
        $params2 = [1, 'dd' => 'd', 3 => 'we'];

        //对比键与值
        $result = array_intersect_assoc($params1, $params2);
        Functions::print_pre($result);

        //只对比键
        $result = array_intersect_key($params1, $params2);
        Functions::print_pre($result);

        $result = array_intersect_ukey($params1, $params2, function ($k1, $k2){
            if ($k1 === $k2){
                return 0;
            }else{
                return -1;
            }
        });

        Functions::print_pre($result);

        $result = array_intersect_uassoc($params1, $params2, function ($v1, $v2){
            if ($v1 === $v2){
                return 0;
            }
        });
        Functions::print_pre($result);

        $result = array_intersect($params1, $params2);
        Functions::print_pre($result);

        $result = array_key_exists(0, $params2);
        Functions::print_pre($result);

        //返回key,可按参数查找
        $result = array_keys($params1, 1, true);
        Functions::print_pre($result);

    }

    public function actionCallback()
    {
        $params = [1, 2, 3, 4, 5];
        //        array_filter();
        //        array_map();
        //        array_walk();
        //        array_intersect_uassoc();
        //        array_intersect_ukey();
        //        array_diff_ukey();
        //        array_diff_uassoc();

        $func = function ($value){
            return $value * 2;
        };
        $result = array_map(function (){

        }, $params);
        Functions::print_pre($result);

    }

    public function actionMysql()
    {
        $result = Users::find()->all();
        var_dump($result);
        die;
    }


    public function actionSort()
    {
        $params1 = [1, 'dd' => 'df', 'we', '2'];

        //比值，不保留索引
        usort($params1, function ($v1, $v2){
            if ($v1 > $v2){
                return 1;
            }elseif ($v1 == $v2){
                return 0;
            }else{
                return -1;
            }
        });
        Functions::print_pre($params1);

        //比索引值
        $params1 = [1, 'dd' => 'df', 'we', '2'];
        uksort($params1, function ($k1, $k2){
            if ($k1 > $k2){
                return 1;
            }elseif ($k1 == $k2){
                return 0;
            }else{
                return -1;
            }
        });
        Functions::print_pre($params1);

        //比值，保留索引
        uasort($params1, function ($v1, $v2){
            if ($v1 > $v2){
                return 1;
            }elseif ($v1 == $v2){
                return 0;
            }else{
                return -1;
            }
        });
        Functions::print_pre($params1);

        //return true|false
        sort($params1, SORT_FLAG_CASE); //SORT_NATURAL 1、2、11、12
        Functions::print_pre($params1);

        echo sizeof($params1);
        shuffle($params1);
        Functions::print_pre($params1);

        //下一个
        next($params1);
        //上一个
        prev($params1);
        //当前
        current($params1);
        pos($params1);
        //重置第一
        reset($params1);

        $rand = range(0, 99);
        shuffle($rand);
        $rand = array_rand($rand, 10);
        Functions::print_pre($rand);

        $arr = ['2' => 'a', 1 => 'b', 'DD' => 'c', 'dd' => 'we'];
        natcasesort($arr);
        Functions::print_pre($arr);
    }

    public function actionPhpinfo()
    {
        phpinfo();
    }
}