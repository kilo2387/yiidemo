<?php
/**
 * Created by PhpStorm.
 * User: kilo
 * Date: 2017/11/14
 * Time: 13:51
 */

namespace milan\functions;

class QueryShort
{
    /**
     * 多个or like 关键词
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
        if (!empty($fields)){
            $where = ['or'];

            foreach($fields as $key => $value){
                $where[] = ['like', $key, $value];
            }
            $query->andWhere($where);

        }
    }

    /**
     * 时间段
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
     * 等值
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
}