<?php

use yii\db\Migration;

class m170323_042137_clients_fake_data extends Migration
{
    public function up()
    {
        $this->insert('{{%clients}}', [
            'name' => 'Company 1',
            'link' => 'http://site1.com',
            'position' => 1,
        ]);

        $this->insert('{{%clients}}', [
            'name' => 'Company 2',
            'link' => 'http://site2.com',
            'position' => 2,
        ]);

        $this->insert('{{%clients}}', [
            'name' => 'Company 3',
            'link' => 'http://site3.com',
            'position' => 3,
        ]);

        $this->insert('{{%clients}}', [
            'name' => 'Company 4',
            'link' => 'http://site4.com',
            'position' => 4,
        ]);
    }

    public function down()
    {
        $this->truncateTable('{{%clients}}');
    }
}
