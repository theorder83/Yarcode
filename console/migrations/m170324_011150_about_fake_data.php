<?php

use yii\db\Migration;

class m170324_011150_about_fake_data extends Migration
{
    public function up()
    {
        $this->insert('{{%about}}', [
            'time' => '2009-2011',
            'event' => 'Our Humble Beginnings',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.',
            'position' => 1,
        ]);

        $this->insert('{{%about}}', [
            'time' => 'MARCH 2011',
            'event' => 'An Agency is Born',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.',
            'position' => 2,
        ]);

        $this->insert('{{%about}}', [
            'time' => 'DECEMBER 2012',
            'event' => 'Transition to Full Service',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.',
            'position' => 3,
        ]);

        $this->insert('{{%about}}', [
            'time' => 'JULY 2014',
            'event' => 'Phase Two Expansion',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.',
            'position' => 4,
        ]);
    }

    public function down()
    {
        $this->truncateTable('{{%about}}');
    }
}
