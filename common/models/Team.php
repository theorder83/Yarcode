<?php

namespace common\models;

use common\components\behaviors\ModelPositionBehavior;
use common\components\traits\ModelImageUploadTrait;
use common\components\traits\ModelVisibleTrait;


/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name
 * @property string $profession
 * @property string $image
 * @property string $link_twitter
 * @property string $link_facebook
 * @property string $link_linkedin
 * @property string $position
 * @property int $visible
 */
class Team extends \yii\db\ActiveRecord
{
    public $file;

    use ModelVisibleTrait;
    use ModelImageUploadTrait;

    public function behaviors()
    {
        return [
            ModelPositionBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'profession'], 'required'],
            [['name', 'profession','link_facebook','link_twitter','link_linkedin'], 'string', 'max' => 256],
            [['file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'profession' => 'Profession',
            'image' => 'Image',
            'link_twitter' => 'Twitter',
            'link_facebook' => 'Facebook',
            'link_linkedin' => 'Linkedin',
            'position' => 'Position',
            'visible' => 'Visible',
        ];
    }

    public function afterDelete()
    {
        $file = file_exists(\Yii::getAlias('@uploads/images/') . $this->image);
        if ($this->image != null && file_exists($file)) {
            unset($file);
        }
    }
}
