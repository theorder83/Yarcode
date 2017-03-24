<?php

use yii\db\Migration;

class m170324_011150_about_fake_data extends Migration
{
    public function up()
    {
        $this->insert('{{%about}}', [
            'time' => '2009-2011',
            'event' => 'Our Humble Beginnings',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
            'position' => 1,
        ]);

        $this->insert('{{%about}}', [
            'time' => 'MARCH 2011',
            'event' => 'An Agency is Born',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
            'position' => 2,
        ]);

        $this->insert('{{%about}}', [
            'time' => 'DECEMBER 2012',
            'event' => 'Transition to Full Service',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
            'position' => 3,
        ]);

        $this->insert('{{%about}}', [
            'time' => 'JULY 2014',
            'event' => 'Phase Two Expansion',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!',
            'position' => 4,
        ]);
    }

    public function down()
    {
        $this->truncateTable('{{%about}}');
    }
}
