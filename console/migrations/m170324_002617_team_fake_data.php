<?php

use yii\db\Migration;

class m170324_002617_team_fake_data extends Migration
{
    public function up()
    {
        $this->insert('{{%team}}', [
            'name' => 'Kay Garland',
            'profession' => 'Lead Designer',
            'link_facebook' => 'profile1',
            'link_twitter' => 'profile1',
            'link_linkedin' => 'profile1',
            'position' => 1,
        ]);

        $this->insert('{{%team}}', [
            'name' => 'Larry Parker',
            'profession' => 'Lead Marketer',
            'link_facebook' => 'profile2',
            'link_twitter' => 'profile2',
            'link_linkedin' => 'profile2',
            'position' => 2,
        ]);

        $this->insert('{{%team}}', [
            'name' => 'Diana Pertersen',
            'profession' => 'Lead Developer',
            'link_facebook' => 'profile3',
            'link_twitter' => 'profile31',
            'link_linkedin' => 'profile3',
            'position' => 3,
        ]);
    }

    public function down()
    {
        $this->truncateTable('{{%team}}');
    }


}
