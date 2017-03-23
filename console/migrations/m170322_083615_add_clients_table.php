<?php

use yii\db\Migration;

class m170322_083615_add_clients_table extends Migration
{
    public function up()
    {
        $this->createTable("{{%clients}}", [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
            'image' => $this->text(),
            'link' => $this->string(512),
            'position' => $this->integer(5)->unsigned(),
            'visible' => $this->integer(1)->notNull()->defaultValue(1),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%clients}}');
    }


}
