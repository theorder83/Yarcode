<?php

use yii\db\Migration;

class m170324_010829_add_about_table extends Migration
{
    public function up()
    {
        $this->createTable("{{%about}}", [
            'id' => $this->primaryKey(),
            'time' => $this->string(256),
            'event' => $this->string(256),
            'description' => $this->text(),
            'image' => $this->text(),
            'position' => $this->integer(5)->unsigned(),
            'visible' => $this->integer(1)->notNull()->defaultValue(1),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%about}}');
    }
}
