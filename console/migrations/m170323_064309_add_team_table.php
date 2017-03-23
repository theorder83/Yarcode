<?php

use yii\db\Migration;

class m170323_064309_add_team_table extends Migration
{
    public function up()
    {
        $this->createTable("{{%team}}", [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
            'profession' => $this->string(256),
            'image' => $this->text(),
            'link_twitter' => $this->string(512),
            'link_facebook' => $this->string(512),
            'link_linkedin' => $this->string(512),
            'position' => $this->integer(5)->unsigned(),
            'visible' => $this->integer(1)->notNull()->defaultValue(1),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%team}}');
    }

}
