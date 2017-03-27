<?php

namespace common\models;


use common\components\ActiveRecord;
use common\components\behaviors\ModelPositionBehavior;
use common\components\traits\ModelImageUploadTrait;
use common\components\traits\ModelVisibleTrait;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property string $datetime
 */
class Clients extends ActiveRecord
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
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'required'],
            [['name'], 'string', 'max' => 256],
            [['link'], 'url'],
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
            'link' => 'Link',
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
