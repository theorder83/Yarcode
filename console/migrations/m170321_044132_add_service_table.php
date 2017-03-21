<?php

use yii\db\Migration;

class m170321_044132_add_service_table extends Migration
{
    public function up()
    {
        $this->createTable("{{%service}}", [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
            'description' => $this->text(),
            'icon' => $this->string(256),
            'position' => $this->integer(5)->unsigned(),
            'visible' => $this->integer(1)->notNull()->defaultValue(1),
            'datetime' => $this->dateTime(0)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%service}}');
    }

}
