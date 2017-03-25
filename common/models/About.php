<?php

namespace common\models;

use common\components\behaviors\ModelPositionBehavior;
use common\components\traits\ModelImageUrlTrait;
use common\components\traits\ModelVisibleTrait;
use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $time
 * @property string $event
 * @property string $description
 * @property string $image
 * @property string $position
 * @property int $visible
 */
class About extends \yii\db\ActiveRecord
{
    public $file;

    use ModelVisibleTrait;
    use ModelImageUrlTrait;

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
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event','description','time'],'required'],
            [['description'], 'string'],
            [['position', 'visible'], 'integer'],
            [['time', 'event'], 'string', 'max' => 256],
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
            'time' => 'Time',
            'event' => 'Event',
            'description' => 'Description',
            'image' => 'Image',
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
