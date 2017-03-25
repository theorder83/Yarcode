<?php

use yii\db\Migration;

class m170325_020600_add_project_table extends Migration
{
    public function up()
    {
        $this->createTable("{{%project}}", [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
            'description' => $this->text(),
            'title' => $this->string(256),
            'description_title' => $this->text(),
            'text' => $this->text(),
            'preview' => $this->text(),
            'image' => $this->text(),
            'position' => $this->integer(5)->unsigned(),
            'visible' => $this->integer(1)->notNull()->defaultValue(1),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%project}}');
    }
}
