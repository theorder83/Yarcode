<?php

use yii\db\Migration;

class m170325_211902_project_fake_data extends Migration
{
    public function up()
    {
        $this->insert('{{%project}}', [
            'name' => 'Round Icons',
            'description' => 'Graphic Design',
            'title' => 'PROJECT NAME',
            'description_title' => 'Lorem ipsum dolor sit amet consectetur.',
            'text' => '<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>',
            'position' => 1,
        ]);

        $this->insert('{{%project}}', [
            'name' => 'Startup Framework',
            'description' => 'Website Design',
            'title' => 'PROJECT NAME',
            'description_title' => 'Lorem ipsum dolor sit amet consectetur.',
            'text' => '<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>',
            'position' => 2,
        ]);

        $this->insert('{{%project}}', [
            'name' => 'Treehouse',
            'description' => 'Website Design',
            'title' => 'PROJECT NAME',
            'description_title' => 'Lorem ipsum dolor sit amet consectetur.',
            'text' => '<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>',
            'position' => 3,
        ]);

        $this->insert('{{%project}}', [
            'name' => 'Golden',
            'description' => 'Website Design',
            'title' => 'PROJECT NAME',
            'description_title' => 'Lorem ipsum dolor sit amet consectetur.',
            'text' => '<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>',
            'position' => 4,
        ]);

        $this->insert('{{%project}}', [
            'name' => 'Escape',
            'description' => 'Website Design',
            'title' => 'PROJECT NAME',
            'description_title' => 'Lorem ipsum dolor sit amet consectetur.',
            'text' => '<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>',
            'position' => 5,
        ]);

        $this->insert('{{%project}}', [
            'name' => 'Dreams',
            'description' => 'Website Design',
            'title' => 'PROJECT NAME',
            'description_title' => 'Lorem ipsum dolor sit amet consectetur.',
            'text' => '<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>',
            'position' => 6,
        ]);
    }

    public function down()
    {
        $this->truncateTable('{{%project}}');
    }
}
