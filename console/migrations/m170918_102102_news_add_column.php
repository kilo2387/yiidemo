<?php

use yii\db\Migration;

class m170918_102102_news_add_column extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'exam_sense', 'tinyint(3) NOT NULL DEFAULT "0" comment "考试场景1:常规考试,2严肃考试"');
        $this->addColumn('news', 'qualified_score', 'tinyint(3) NOT NULL DEFAULT "0" comment "合格分数"');
        $this->addColumn('news', 'change_screen', 'tinyint(3) NOT NULL DEFAULT "0" comment "切屏次数"');
        $this->addColumn('news', 'no_operation', 'tinyint(3) NOT NULL DEFAULT "0" comment "无操作"');
    }

    public function down()
    {
        $this->dropColumn('news', 'exam_sense');
        $this->dropColumn('news', 'qualified_score');
        $this->dropColumn('news', 'change_screen');
        $this->dropColumn('news', 'no_operation');
    }
}
