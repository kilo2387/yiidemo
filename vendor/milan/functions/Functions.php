<?php
/**
 * Created by kilo with IntelliJ IDEA on 2017/8/24 0:25.
 *
 */

namespace milan\functions;

//use yii\helpers\BaseArrayHelper;

class Functions
{
    public static function print_pre($params)
    {
        echo '<pre>';
        print_r($params);
        echo '</pre>';
    }

    /**
     * 1,2,3转a,b,c
     * @param $delimiter
     * @param $string
     * @param $combine
     * @return string
     */
    private function changeIntString($delimiter, $string, $combine)
    {
        $temp = explode($delimiter, $string);

        $forbidden = [];
        foreach($temp as $item){
            $forbidden[] = $combine[$item];
        }

        return join($delimiter, $forbidden);
    }

    /**
     * 计算百分比
     * @param $firstValue
     * @param $nextValue
     * @param int $precision
     * @return float|int
     */
    public static function countPercent($firstValue, $nextValue, $precision = 2)
    {
        return $nextValue != 0 ? round($firstValue / $nextValue * 100, $precision) : 0;
    }

    /**
     * @param $query \yii\db\ActiveQuery
     * @param array $fields
     * $query->andwhere([
     *      'or',
     *       ['like', 'title', $_GET['keyword']],
     *      ['like', 'author', $_GET['keyword']],
     *      ['like', 'summary', $_GET['keyword']],
     * ]);
     */
    private function queryOrKeyword(&$query, array $fields)
    {
        //关键词
        if (!empty($fields)){
            $where = ['or'];

            foreach($fields as $key => $value){
                $where[] = ['like', $key, $value];
            }
            $query->andWhere($where);

        }
    }

    /**
     * @param $query \yii\db\ActiveQuery
     * @param string $fieldFrom
     * @param string $fieldTo
     * @param string $valueFrom
     * @param string $valueTo
     * @param bool $un
     */
    private function queryTimeFrom(&$query, $fieldFrom = 'created_at', $fieldTo = 'created_at', $valueFrom = '', $valueTo = '', $un = false)
    {
        if (boolval(intval($un)) == true){
            $dlt_from = '>';
            $dlt_to = '<';
        }else{
            $dlt_from = '<';
            $dlt_to = '>';
        }

        /** 搜索:按时间 start_time */
        if (!empty($valueFrom)){
            $query->andWhere([$dlt_from, $fieldFrom, strtotime($valueFrom)]);
        }

        /** 搜索:按时间 end_time */
        if (!empty($valueTo)){
            $query->andWhere([$dlt_to, $fieldTo, strtotime($valueTo . ' 23:59:59')]);
        }
    }

    /**
     * 添加关键词
     * @param $query \yii\db\ActiveQuery
     * @param $field
     * @param $value
     */
    private function queryLikeKeyword(&$query, $field, $value)
    {
        if (!empty($field) && !empty($value)){
            $query->andWhere(['like', $field, $value]);
        }
    }

    /**
     * @param $query \yii\db\ActiveQuery
     * @param string $field
     * @param string $value
     */
    private function queryEqual(&$query, $field = '', $value = '')
    {
        if (!empty($field) && !empty($value)){
            $query->andWhere([$field => $value]);
        }
    }
    public static function makeUuid()
    {
        return sha1(static::str_rand());
    }

    public static function str_rand($length = 32, $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        if (!is_int($length) || $length < 0) {
            return false;
        }
        $string = '';
        for ($i = $length; $i > 0; $i--) {
            $string .= $char[mt_rand(0, strlen($char) - 1)];
        }
        return $string;
    }
}