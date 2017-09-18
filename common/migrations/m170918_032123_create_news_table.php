<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170918_032123_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id'            => $this->primaryKey(),
            'exam_id'       => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('考试的id,关联exam表'),
            'user_id'       => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('用户id,关联user表'),
            'user_name'     => $this->string(50)->notNull()->defaultValue('')->comment('真实姓名'),
            'company'       => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('绑定的公司company表'),
            'front_card'    => $this->string(100)->notNull()->defaultValue('')->comment('身份证正面'),
            'back_card'     => $this->string(100)->notNull()->defaultValue('')->comment('身份证背面'),
            'selfie'        => $this->string(100)->notNull()->defaultValue('')->comment('身份证背面'),
            'id_number'     => $this->char(18)->notNull()->defaultValue('')->comment('身体证号码'),
            'status'        => $this->integer(3)->unsigned()->notNull()->defaultValue(0)->comment('审核状态:0未通过,1已通过'),
            'created'       => $this->integer(11)->notNull()->defaultValue(0)->comment('创建时间'),
            'updated'       => $this->integer(11)->notNull()->defaultValue(0)->comment('更新时间'),
        ], 'CHARSET=utf8 COMMENT="考试身份验证表"');

        $this->createIndex(
            'exam_user_id',
            'news',
            'exam_id,user_id'
        );


    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex(
            'exam_user_id',
            'news'
        );

        $this->dropTable('news');
    }
}
