<?php

use yii\db\Migration;

class m170321_044438_service_fake_data extends Migration
{
    public function up()
    {
        $this->insert('{{%service}}', [
            'name' => 'E-Commerce',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.',
            'icon' => 'fa-shopping-cart',
            'position' => 1,
        ]);

        $this->insert('{{%service}}', [
            'name' => 'Responsive Design',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.',
            'icon' => 'fa-shopping-cart',
            'position' => 2,
        ]);

        $this->insert('{{%service}}', [
            'name' => 'Web Security',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.',
            'icon' => 'fa-shopping-cart',
            'position' => 3,
        ]);
    }

    public function down()
    {
        $this->truncateTable('{{%service}}');
    }

}
